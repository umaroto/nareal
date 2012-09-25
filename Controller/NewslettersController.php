<?php
App::uses('AppController', 'Controller');

class NewslettersController extends AppController {

	public function manager_index() {
		$this->Newsletter->recursive = 0;
		$this->set('newsletters', $this->paginate());
	}

	public function manager_view($id = null) {
		$this->Newsletter->id = $id;
		if (!$this->Newsletter->exists()) {
			throw new NotFoundException(__('Newsletter inválida.'));
		}
		$this->set('newsletter', $this->Newsletter->read(null, $id));
	}

	public function manager_add() {
		if ($this->request->is('post')) {
			$this->Newsletter->create();
			if ($this->Newsletter->save($this->request->data)) {
				$this->Session->setFlash(__('Newsletter salva com sucesso.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Newsletter não pode ser salvo. Tente novamente.'));
			}
		}
	}

	public function manager_edit($id = null) {
		$this->Newsletter->id = $id;

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Newsletter->save($this->request->data)) {
				$this->Session->setFlash(__('Newsletter salva com sucesso.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Newsletter não pode ser salvo. Tente novamente.'));
			}
		} else {
			$this->request->data = $this->Newsletter->read(null, $id);
		}
	}

	public function manager_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Newsletter->id = $id;
		if (!$this->Newsletter->exists()) {
			throw new NotFoundException(__('Newsletter inválida.'));
		}
		if ($this->Newsletter->delete()) {
			$this->Session->setFlash(__('Newsletter deleteda.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Newsletter não pode ser deletada.'));
		$this->redirect(array('action' => 'index'));
	}
}
