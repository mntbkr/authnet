<?php

class AuthnetTransaction extends AuthnetAppModel {
	
	public $useDbConfig = 'authnet';
	
	public $primaryKey = 'trans_id';
	
	public $displayField = 'trans_id';
	
	public $validate = array(
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
				'rule' => array('mmyyyy', 'expiration'),
				'message' => 'Invalid expiration date.',
				'required' => false,
				'allowEmpty' => true
			),
			'notExpired' => array(
				'rule' => array('notExpired', 'expiration'),
				'message' => 'Credit card is expired according to date provided.',
				'required' => false,
				'allowEmpty' => true
			)
		)
		
	);
	
	public function beforeSave() {
		return true;
	}
	
	public function mmyyyy($data) {
		$value = array_values($data);
		//return preg_match('^[0-9]+$');
		return true;
	}
	
	public function notExpired($data) {
		// do something
		return true;
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

?>
