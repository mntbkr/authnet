<?php
/**
 * Authnet behavior class.
 * 
 * Enables a credit card or echeck model to interact with Authorize.net.
 */

class AuthnetBehavior extends ModelBehavior {
	public $depends = array(
		'Plugins' => array(
			'ValidationPlus' => array(
				'version' => 'v0.1',
				'location' => 'git://github.com/ricog/validation_plus.git',
			)
		)
	);

/**
 * Default settings for this behavior
 *
 * @var array
 * @access protected
 */
	protected $_baseConfig = array(
		'authDuringValidation' => true,
	);

/**
 * Request Fields
 * 
 * An associative array listing all request fields that can be submitted by this
 * behavior. The key is the field name that Authorize.net expects. The value
 * is the field name as defined on Model->data of the model it attaches to.
 * 
 * @var array
 * @access public
 */
	public $requestFields = array(
		'transaction_type'		=> 'transaction_type',
		'amount'				=> 'amount',
		'card_num'	 			=> 'card_number',
		'exp_date'	 			=> 'expiration',
		'card_code'  			=> 'card_code',
		'trans_id'				=> 'transaction_id',
		'auth_code'				=> 'auth_code',
		'test_request'			=> 'test_request',
		'duplicate_window'		=> 'duplicate_window',
		'invoice_num'			=> 'invoice_num',
		'description'			=> 'description',
		'line_item'				=> 'line_item',
		'first_name'			=> 'first_name',
		'last_name'				=> 'last_name',
		'company'				=> 'company',
		'address'				=> 'address',
		'city'					=> 'city',
		'state'					=> 'state',
		'zip'					=> 'zip',
		'country'				=> 'country',
		'phone'					=> 'phone',
		'fax'					=> 'fax',
		'email'					=> 'email',
		'cust_id'				=> 'cust_id',
		'customer_ip'			=> 'customer_ip',
		'ship_to_first_name'	=> 'ship_to_first_name',
		'ship_to_last_name'		=> 'ship_to_last_name',
		'ship_to_company'		=> 'ship_to_company',
		'ship_to_address'		=> 'ship_to_address',
		'ship_to_city'			=> 'ship_to_city',
		'ship_to_state'			=> 'ship_to_state',
		'ship_to_zip'			=> 'ship_to_zip',
		'ship_to_country'		=> 'ship_to_country',
		'tax'					=> 'tax',
		'freight'				=> 'freight',
		'duty'					=> 'duty',
		'tax_exempt'			=> 'tax_exempt',
		'po_num'				=> 'po_num',
	);

	protected $_Authnet;
	
/**
 * Setup the Authnet behavior
 *
 * @param object $Model instance of model
 * @param array $config array of configuration settings.
 * @return void
 * @access public
 */
	function setup(&$Model, $config = array()) {
		if (!is_array($config)) {
			$config = array($config);
		}
		
		$this->_baseConfig['fields'] = $this->requestFields;
		
		$settings = Set::merge($this->_baseConfig, $config);

		if (!isset($this->settings[$Model->alias])) {
			$this->settings[$Model->alias] = $settings;
		} else {
			$this->settings[$Model->alias] = Set::merge($this->settings[$Model->alias], (array)$settings);
		}
		
		$this->Model = $Model;
		
		App::import('Model', 'Authnet.AuthnetTransaction');
		$this->_Authnet = new AuthnetTransaction;
	}
	
/**
 * Before validate method. Called before validation is run.
 * 
 * Modifies the $validate array to include credit card authorization, authorizing
 * funds and returning an authorization code to be used in capturing the funds.
 */
	function beforeValidate(&$Model) {
		// Make sure proper validation is setup on the fields we will be accepting
		$Model->Behaviors->attach('ValidationPlus.Validatorator');
		if (!$Model->checkValidation($this->settings[$Model->alias]['fields']['card_num'], 'cc')) {
			$Model->addValidation($this->settings[$Model->alias]['fields']['card_num'], array($this->_Authnet->validate['card_num']['cc']));
		}

		// Setup authorization of funds as an additional validation rule
		if ($this->settings[$Model->alias]['authDuringValidation'] == true) {
			$Model->addValidation($this->settings[$Model->alias]['fields']['card_num'], 'authorizePayment');
		}
		
		return true;
	}

/**
 * Validation rule: Authorize Payment
 * 
 * Returns true if payment is authorized, returns nothing otherwise, causing
 * validation to fail.
 */
	function authorizePayment(&$Model, $check) {
		if (empty($Model->validationErrors)) {
			$data = $this->__prepareTransaction($Model->data[$Model->alias]);
			
			// Run the authorization
			if ($response = $this->_Authnet->authorizePayment($data)) {
				// Reverse field names and set them back to the model
				$returnData = array(
					'trans_id' => $response['AuthnetTransaction']['trans_id'],
					'auth_code' => $response['AuthnetTransaction']['auth_code'],
				);
				$Model->set(Set::merge($Model->data[$Model->alias], $this->__translateFieldNames($returnData, 'reverse')));
				return true;
			} else {
				// Set any Authnet validation errors into the model
				$Model->validationErrors = $this->__translateFieldNames($this->_Authnet->validationErrors, 'reverse');
				unset($this->_Authnet->validationErrors);
				return true;
			}
		} else {
			// Skip payment authorization if other validationErrors exist
			return true;
		}
	}
	
/**
 * Before save method. Called before the model is saved.
 * 
 * By default it captures the pre-authorized funds and returns a transaction id. 
 */
	function beforeSave(&$Model) {
		$data = $this->__prepareTransaction($Model->data[$Model->alias]);
				
		// Capture the pre-authorized funds and set the returned transaction code
		if ($response = $this->_Authnet->capturePayment($data)) {
			return true;
		} else {
			// Set any Authnet validation errors into the model
			$Model->validationErrors = $this->__translateFieldNames($this->_Authnet->validationErrors, 'reverse');
			unset($this->_Authnet->validationErrors);
			return false;
		}
	}
	
/**
 * Prepare the data prior to a transaction request
 * 
 * @param $data
 * @return array
 */
	private function __prepareTransaction($data) {
					// Adjust field names for Authnet plugin
			$data = $this->__translateFieldNames($data);

			// Convert standard mysql date into mmyyyy format
			$data['exp_date'] = date('mY', strtotime($data['exp_date']));
		
			return $data;
	}
	
/**
 * Translate keys from the application model to the Authnet plugin standard. Returns false
 * if no data is passed, otherwise array of translated data.
 *
 * @param array $data
 * @return mixed
 */

	private function __translateFieldNames($data = null, $reverse = null) {
		if (empty($data)) {
			return false;
		}
		
		$return = array();
		$fieldNames = $this->settings[$this->Model->alias]['fields'];
		
		if ($reverse) {
			$fieldNames = array_combine(array_values($fieldNames), array_keys($fieldNames));
		}
		$_translator = array_combine(array_values($fieldNames), array_keys($fieldNames));
		
		foreach ($data as $key => $value) {
			if (in_array($key, $fieldNames)) {
				$key = $_translator[$key];
			}
						
			$return[$key] = $value;
		}
		
		return $return;
	}
	
}