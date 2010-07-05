<?php

class AuthnetTransaction extends AuthnetAppModel {
	
	public $useDbConfig = 'authnet';
	
	public $primaryKey = 'trans_id';
	
	public $displayField = 'trans_id';
	
	public $validate = array(
		'trans_id' => array(
			'numeric' => array(
				'rule' => 'numeric',
				'message' => 'Invalid transaction id.',
				'required' => false,
				'allowEmpty' => true
			)
		),
		'amount' => array(
			'numeric' => array(
				'rule' => 'numeric',
				'message' => 'Invalid amount.',
				'required' => false,
				'allowEmpty' => true
			)
		),
		'card_num' => array(
			'cc' => array(
				'rule' => array('cc', 'fast'),
				'message' => 'Invalid credit card number.',
				'required' => false,
				'allowEmpty' => true
			)
		),
		'exp_date' => array(
			'mmyyyy' => array(
				'rule' => array('mmyyyy'),
				'message' => 'Invalid expiration date.',
				'required' => false,
				'allowEmpty' => true,
				'last' => true,
			),
			'notExpired' => array(
				'rule' => array('notExpired', 'expiration'),
				'message' => 'Credit card is expired according to date provided.',
				'required' => false,
				'allowEmpty' => true
			)
		)
		
	);

/**
 * Authorize a payment and return the data array
 */
	public function authorizePayment($data) {
		$data['transaction_type'] = 'AUTH_ONLY';
		if ($result = $this->save($data)) {
			return $result;
		} else {
			return false;
		}
	}

/**
 * Capture a previously authorized payment
 */
	public function capturePayment($data) {
		// All we need is the transaction id, type, and amount
		$data = array(
			'trans_id'			=> $data['trans_id'],
			'transaction_type'	=> 'PRIOR_AUTH_CAPTURE',
			'amount'			=> $data['amount'],
		);
		if ($result = $this->save($data)) {
			return $result;
		} else {
			return false;
		}
	}
	
	public function notExpired($check) {
		$value = array_pop($check);
		if (preg_match('/\d{6}/', $value)) {
			$month = substr($value, 0,2);
			$year = substr($value, 2);
			
			if ($year > date('Y')) {
				return true;
			} elseif ($year = date('Y')) {
				if ($month >= date('m')) {
					return true; 
				}
			}
		}
	}
	
	public function mmyyyy($check) {
		$value = array_pop($check);
		if (preg_match('/\d{6}/', $value)) {
			$month = substr($value, 0,2);
			$year = substr($value, 2);
			
			if ($month >= 1 && $month <= 12 && $year >= 1900 && $year <= date('Y')+100) { 
				return true;
			}
		}
	}
	
	public function exists() {
		if (!empty($this->data)) {
			if (!empty($this->data[$this->alias]['trans_id'])) {
				$this->__exists = true;
				$this->id = $this->data[$this->alias]['trans_id'];
				return $this->__exists;
			}
		}
		return false;
	}
}

