<?php
App::uses('AppController', 'Controller');

class PostsController extends AppController {

	public function manager_index() {
		$this->Post->recursive = 0;
		$this->set('posts', $this->paginate());
	}

	public function manager_edit($id = null) {
		$this->Post->id = $id;

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('Post salvo com sucesso.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Post não pode ser salvo. Tente novamente.'));
			}
		} else {
			$this->request->data = $this->Post->read(null, $id);
		}
		$authors = $this->Post->Author->find('list');
		$categories = $this->Post->Category->find('list');
		$this->set(compact('authors', 'categories'));
	}

	public function manager_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Post Inválido.'));
		}
		if ($this->Post->delete()) {
			$this->Session->setFlash(__('Post deletedo.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Post não pode ser deletada.'));
		$this->redirect(array('action' => 'index'));
	}
}
