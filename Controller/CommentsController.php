<?php
App::uses('AppController', 'Controller');

class CommentsController extends AppController {

	public function manager_index() {
		$this->Comment->recursive = 0;
		$this->set('comments', $this->paginate());
	}

	public function manager_edit($id = null) {
		$this->Comment->id = $id;

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__('Comentário salvo com sucesso.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Comentário não pode ser salvo. Tente novamente.'));
			}
		} else {
			$this->request->data = $this->Comment->read(null, $id);
		}
		$posts = $this->Comment->Post->find('list');
		$this->set(compact('posts'));
	}

	public function manager_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
			throw new NotFoundException(__('Comentário inválido.'));
		}
		if ($this->Comment->delete()) {
			$this->Session->setFlash(__('Comentário deletado.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Comentário não pode ser deletado.'));
		$this->redirect(array('action' => 'index'));
	}
}
