<?php
class UsersController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('session','Email');

	public function beforeRender() {
		parent::beforeRender();
		$this->layout = 'main';
	}

	public function index() {
		
	}
	
	public function register() {
		
	}
}