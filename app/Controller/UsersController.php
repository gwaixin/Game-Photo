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
		if (!$this->Auth->login()) {
			$this->redirect(array('action' => 'login'));
		}
	}
	
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$data = $this->request->data;
				$user = $this->User->find('first', array(
					'conditions' => array(
						'username' => ($data['User']['username'])
					)
				));
				$this->Session->write('User.id', $user['User']['id']);
				$this->Session->write('User.name', $user['User']['name']);
				$this->Session->write('User.email', $user['User']['email']);
				$this->Session->write('User.isLogin', true);
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
		if ($this->Session->read('User.isLogin')) {
			$this->Session->delete('User');
			return $this->redirect($this->Auth->logout());
			exit();
		}
		
	}
}