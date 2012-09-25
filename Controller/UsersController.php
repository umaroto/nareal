<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

	public function beforeFilter() {
	    parent::beforeFilter();
	}

	public function manager_login() {
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            $this->redirect($this->Auth->redirect());
	        } else {
	            $this->Session->setFlash(__('Invalid username or password, try again'));
	        }
	    }
	}

	public function logout() {
	    $this->redirect($this->Auth->logout());
	}

	public function manager_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	public function manager_edit($id = null) {
		$this->User->id = $id;

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Usuario salvo com sucesso'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Usuario nao pode ser salvo. Por favor tente novamente.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
	}

	public function manager_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if ($this->User->delete()) {
			$this->Session->setFlash(__('Usuario deletado com sucesso.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Usuario nao pode ser deletado'));
		$this->redirect(array('action' => 'index'));
	}
}
