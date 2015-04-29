<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	public $name = 'User';
	public $username = 'username';
	public $password = 'password';
	public $validate = array( 
		'name' => array(
			'between' => array(
				'rule'		=> array('lengthBetween', 5, 35),
				'message' 	=> 'Name should be between 5 to 35 characters'
			)
		),
		'password' => array(
			'length' => array(
				'rule' 		=> array('minLength', 8),
				'message' 	=> 'Password should have a minimum of 8 characters long'
			),
			'compare' 		=> array(
				'rule' 		=> array('validatePassword'),
				'message' 	=> 'The password you entered does not match'
			)
		),
		'email' => 'email',
		'username' => array(
			'between' => array(
				'rule'		=> array('minLength', 6),
				'message'	=> 'Username must be atleast 6 characters in length'
			)
		)
		
	);
	
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
				$this->data[$this->alias]['password']
			);
		}
		return true;
	}
	
	public function validatePassword() {
		return $this->data[$this->alias]['password'] === $this->data[$this->alias]['password_confirm'];
	}
}