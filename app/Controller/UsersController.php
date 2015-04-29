<?php
class UsersController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('session','Email');

	public function beforeRender() {
		parent::beforeRender();
		$this->layout = 'main';
	}
	
	public function beforeFilter() {
		parent::beforeFilter();
		// Allow users to register and logout.
		Security::setHash('Blowfish');
		$this->Auth->allow('add', 'logout');
	}

	public function index() {
		if ($this->request->is('post')) {
			
	        if ($this->Auth->login()) {
	            return $this->redirect($this->Auth->redirect());
	        }
	     
	        $this->Session->setFlash(__('Invalid username or password, try again'));
	    }
	}
	
	public function register() {
		if ($this->request->is('post')) {
			$this->User->set($this->request->data);
			if ($this->User->validates()) {
				$this->User->create();
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('You have successfully registered'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			} else {
				
				$errors = $this->User->invalidFields();
				$str = '';
				foreach ($errors as $e) {
					$str .= $e[0] . '<br/>';
				}
				$this->Session->setFlash(__($str));
				$this->set('post', $this->request->data);
			}
		}
		
	}
	
	public function logout() {
		return $this->redirect($this->Auth->logout());
	}
}