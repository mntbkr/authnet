<?php

App::import('Core', 'HttpSocket');

class AuthnetSource extends DataSource {

/**
 * The description of this data source
 * 
 * @var string
 * @access public
 */
	public $description = 'Authorize.net DataSource';
	
/**
 * Default configuration
 * 
 * note: Set to public because DataSource::_baseConfig is public in CakePHP 1.3.
 * In CakePHP 2.0, this will be set to protected
 * 
 * @var array
 * @access public
 */	
	public $_baseConfig = array(
		'server' => 'test',
		'test_request' => false,
		'login' => NULL,
		'key' => NULL,
		'default_type' => 'AUTH_CAPTURE',
		'payment_method' => 'CC',
		'email_customer' => false,
		'duplicate_window' => '120',
	);

/**
 * API Settings that are specific to this datasource. These can't be overridden
 * by configuration or data input.
 * 
 * @var array
 * @access protected
 */
	protected $_apiSettings = array(
		'version' => '3.1',
		'delim_data' => true,
		'delim_char' => '|',
		'encap_char' => '',
		'relay_response' => false
	);
	
/**
 * Translation for Authnet POST data keys from default config keys
 *
 * @var array
 */
	public $_configTranslation = array(
		'type' => 'default_type',
		'login' => 'login',
		'tran_key' => 'key',
		'method' => 'payment_method',
	);

	protected $_schema = array(
		'authnet_transactions' => array(
			// Transaction Information
			'transaction_type' => array('type' => 'text', 'null' => true, 'default' => NULL),
			'method' => array('type' => 'text', 'null' => true, 'default' => NULL),
			'recurring_billing' => array('type' => 'boolean', 'null' => false, 'default' => 0), // not an ARB setting
			'amount' => array('type' => 'float', 'null' => false, 'default' => 0),
			'trans_id' => array('type' => 'string', 'length' => 255, 'null' => true, 'default' => NULL),
			'auth_code' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'test_request' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
			'duplicate_window' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		
			// Credit Card Information
			'card_num' => array('type' => 'string', 'length' => '16', 'null' => false, 'default' => NULL),
			'exp_date' => array('type' => 'string', 'length' => 6, 'null' => false, 'default' => NULL),
			'card_code' => array('type' => 'string', 'length' => 4, 'null' => true, 'default' => NULL),
		
			// E-Check Information
			'bank_aba_code' => array('type' => 'string', 'length' => 9, 'null' => false, 'default' => NULL),
			'bank_acct_num' => array('type' => 'string', 'length' => 20, 'null' => false, 'default' => NULL),
			'bank_acct_type' => array('type' => 'string', 'length' => 20, 'null' => true, 'default' => NULL),
			'bank_name' => array('type' => 'string', 'length' => 50, 'null' => true, 'default' => NULL),
			'bank_acct_name' => array('type' => 'string', 'length' => 50, 'null' => true, 'default' => NULL),
			'echeck_type' => array('type' => 'string', 'length' => 3, 'null' => true, 'default' => NULL),
			'bank_check_number' => array('type' => 'string', 'length' => 15, 'null' => true, 'default' => NULL),
		
			// Order Information
			'invoice_num' => array('type' => 'string', 'length' => 20, 'null' => true, 'default' => NULL),
			'description' => array('type' => 'string', 'length' => 255, 'null' => true, 'default' => NULL),
	
			// Itemized Order Information
			'line_item' => array('type' => 'text', 'null' => true, 'default' => NULL),
			
			// Customer Information
			'first_name' => array('type' => 'string', 'length' => 50, 'null' => true, 'default' => NULL),
			'last_name' => array('type' => 'string', 'length' => 50, 'null' => true, 'default' => NULL),
			'company' => array('type' => 'string', 'length' => 50, 'null' => true, 'default' => NULL),
			'address' => array('type' => 'string', 'length' => 60, 'null' => true, 'default' => NULL),
			'city' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'state' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'zip' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'country' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'phone' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'fax' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'email' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'cust_id' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'customer_ip' => array('type' => 'string', 'null' => true, 'default' => NULL),
		
			// Shipping Information
			'ship_to_first_name' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'ship_to_last_name' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'ship_to_company' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'ship_to_address' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'ship_to_city' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'ship_to_state' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'ship_to_zip' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'ship_to_country' => array('type' => 'string', 'null' => true, 'default' => NULL),
		
			// Additional Shipping Information (Level 2 Data)
			'tax' => array('type' => 'text', 'null' => true, 'default' => NULL),
			'freight' => array('type' => 'text', 'null' => true, 'default' => NULL),
			'duty' => array('type' => 'text', 'null' => true, 'default' => NULL),
			'tax_exempt' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
			'po_num' => array('type' => 'string', 'length' => 25, 'null' => true, 'default' => NULL),
		
			// Cardholder Authentication
			'authentication_indicator' => array('type' => 'string', 'null' => true, 'default' => NULL),
			'cardholder_authentication_value' => array('type' => '', 'null' => true, 'default' => NULL),
		),
	);

	//public $cacheSources = false;
	
/**
 * HttpSocket object
 *
 * @var object
 */
	public $Http;
	
/**
 * Set configuration and establish HttpSocket with appropriate test/production url.
 *
 * @param config an array of configuratives to be passed to the constructor to overwrite the default
 */
	public function __construct($config = array()) {
		parent::__construct($config);
		$this->Http = new HttpSocket();
	}
	
/**
 * Not currently possible to read data from authorize.net. Method not implemented.
 */
	public function read(&$Model, $queryData = array()) {
		return false;
	}
	
/**
 * Create a new single or ARB transaction
 */
	public function create(&$Model, $fields = array(), $values = array()) {
		$data = array_combine($fields, $values);
		$data = Set::merge($this->_translateConfig($this->config), $data);
		return $this->__request($Model, $data);
	}
	
/**
 * Capture a previously authorized transaction
 */
	public function update(&$Model, $fields = null, $values = null) {
		$data = array_combine($fields, $values);
		if ((float)$data['amount'] >= 0) {
			$data = Set::merge($data, array('transaction_type' => 'PRIOR_AUTH_CAPTURE'));
		} else {
			// if a negative value is passed, assuming refund
			$data = Set::merge($data, array('transaction_type' => 'CREDIT'));
		}
		$data = Set::merge($this->_translateConfig($this->config), $data);
		return $this->__request($Model, $data);
	}
	
/**
 * Void an authorize.net transaction
 */
	public function delete(&$Model, $id = null) {
		if (empty($id)) {
			$id = $Model->id;
		}
		$data = array(
			'transaction_id' => $id,
			'default_type' => 'VOID'
		);		
		$data = Set::merge($this->_translateConfig($this->config), $data);
		return $this->__request($Model, $data);	
	}
	
/**
 * Unsupported methods other CakePHP model and related classes require.
 */
	public function listSources() {}
	
/**
 * Translate the config option keys into keys Authorize.net expects in posted data.
 */
	protected function _translateConfig($data = null) {
		$_translator = array_combine(array_values($this->_configTranslation), array_keys($this->_configTranslation));
		$returnData = array();
		
		foreach ($data as $key => $value) {
			if (in_array($key, $this->_configTranslation)) {
				$key = $_translator[$key];
			}
			
			$returnData[$key] = $value;
		}
		
		return $returnData;
	}

/**
 * Translate keys to a value Authorize.net expects in posted data, as well as encapsulating where relevant. Returns false
 * if no data is passed, otherwise array of translated data.
 *
 * @param array $data
 * @return mixed
 */
	private function __prepareDataForPost($data = null) {
		if (empty($data)) {
			return false;
		}
		
		unset($data['datasource']);
		
		$encapsulators = array('line_item','tax','freight','duty');
		$return = array();
		
		// Override default tranasction type
		if (!empty($data['transaction_type'])) {
			$data['type'] = $data['transaction_type'];
			unset($data['transaction_type']);
		}
		
		foreach ($data as $key => $value) {
			if (in_array($key, $encapsulators)) {
				if (is_array($value)) {
					$value = implode('<|>', $value);
				}
			}
			
			// Strip out any | in the value
			if ($key != 'delim_char') {
				$value = str_replace('|', '', $value);
			}
			
			//prefix the key with x_
			$return["x_{$key}"] = $value;
		}
		
		return $return;
	}

/**
 * Parse the response data from a post to authorize.net
 *
 * @param array $response
 * @return array
 */
	private function __parseResponse(&$Model, $responseString) {
		$result = false;
		if (!empty($responseString)) {
			$responseArray = explode($this->_apiSettings['delim_char'], $responseString);
		}

		// Apply key names to the transaction response
		$response = array(
			'ResponseCode' 			=> $responseArray[0],
			'ResponseSubcode'		=> $responseArray[1],
			'ResponseReasonCode'	=> $responseArray[2],
			'ResponseReasonText'	=> $responseArray[3],
			'AuthorizationCode'		=> $responseArray[4],
			'AVS Response'			=> $responseArray[5],
			'TransactionId'			=> $responseArray[6],
		);

		if ($response['ResponseCode'] == 1) {
			// Transaction Approved
			
			// Set a transaction ID if received
			if (!empty($response['TransactionId'])) {
				$Model->setInsertID($response['TransactionId']);
				$Model->id = $response['TransactionId'];
				$data[$Model->alias]['trans_id'] = $response['TransactionId'];
			}
			
			// Set an authorization code if received
			if (!empty($response['AuthorizationCode'])) {
				$data[$Model->alias]['auth_code'] = $response['AuthorizationCode'];
			}
			
			// Merge the response back into the model
			$data = Set::merge($Model->data, $data);
			$Model->set($data);
			$result = true;
		} else {
			// Transaction was declined, errored, or was held for review
			
			$subcodesToFields = array(
				'5' => 'amount',
				'6' => 'card_num',
				'7' => 'exp_date',
				'8' => 'exp_date',
				'15' => 'trans_id',
				'16' => 'trans_id',
				'17' => 'card_num',
				'27' => 'address',
				'28' => 'card_num',
				'33' => 'VARIED',
				'37' => 'card_num',
				'47' => 'amount',
				'48' => 'amount',
				'49' => 'amount',
				'50' => 'trans_id',
				'51' => 'amount',
				'54' => 'trans_id',
				'55' => 'amount',
				'72' => 'auth_code',
				'74' => 'duty',
				'75' => 'freight',
				'76' => 'tax',
				'127' => 'address',
				'243' => 'recurring_billing',
				//'310' => 'trans_id',
				//'311' => 'trans_id',
				'315' => 'card_num',
				'316' => 'exp_date',
				'317' => 'exp_date'				
			);
			
			if (array_key_exists($response['ResponseReasonCode'], $subcodesToFields)) {
				if ($response['ResponseReasonCode'] == 33) {
					if (stristr($response['ResponseReasonText'], 'expiration date')) {
						$field = 'exp_date';
					} elseif (stristr($response['ResponseReasonText'], 'transaction ID')) {
						$field = 'trans_id';
					} else {
						$field = 'card_num';
					}
				} else {
					$field = $subcodesToFields[$response['ResponseReasonCode']];
				}
				$Model->invalidate($field, $response['ResponseReasonText'] . ' (error code: ' . $response['ResponseReasonCode'] . ')');
			} else {
				$responses = array(
					'2' => 'Declined',
					'3' => 'Error',
					'4' => 'Held for review'
				);
				$Model->invalidate('declined', array($responses[$response['ResponseCode']], $response['ResponseReasonCode'], $response['ResponseReasonText'] . ' (error code: ' . $response['ResponseReasonCode'] . ')'));
			}
		}
		return $result;
	}

/**
 * Post data to authorize.net. Returns false if there is an error, 
 * or an array of the parsed response from authorize.net if valid
 *
 * @param array $request
 * @return mixed
 */
	private function __request(&$Model, $data) {
		if (empty($data)) {
			return false;
		}
		
		$data = Set::merge($data, $this->_apiSettings);
		
		if (!empty($data['server'])) {
			$server = $data['server'];
			unset($data['server']);
		} else {
			$server = $this->config['server'];
		}
		
		if ($server == 'live') {
			$url = 'https://secure.authorize.net/gateway/transact.dll';
		} else {
			$url = 'https://test.authorize.net/gateway/transact.dll';
		}

		$data = $this->__prepareDataForPost($data);
		
		debug($data);
		
		$response = $this->Http->post($url, $data, true);

		if ($this->Http->response['status']['code'] != 200) {
			// There was a problem connecting to the payment gateway, the
			// transaction should not proceed
			$Model->invalidate('transaction', 'Unable to connect to payment gateway.');
			return false;
		}

		return $this->__parseResponse($Model, $response);		
	}
	
	public function describe(&$model) {
		return $this->_schema['authnet_transactions'];
	}
}

