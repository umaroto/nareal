<?php
App::uses('AppController', 'Controller');

class CommentRelationsController extends AppController {

	public function manager_index() {
		$this->CommentRelation->recursive = 0;
		$this->set('commentRelations', $this->paginate());
	}

	public function manager_view($id = null) {
		$this->CommentRelation->id = $id;
		if (!$this->CommentRelation->exists()) {
			throw new NotFoundException(__('Invalid comment relation'));
		}
		$this->set('commentRelation', $this->CommentRelation->read(null, $id));
	}

	public function manager_add() {
		if ($this->request->is('post')) {
			$this->CommentRelation->create();
			if ($this->CommentRelation->save($this->request->data)) {
				$this->Session->setFlash(__('The comment relation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comment relation could not be saved. Please, try again.'));
			}
		}
		$comments = $this->CommentRelation->Comment->find('list');
		$this->set(compact('comments'));
	}

	public function manager_edit($id = null) {
		$this->CommentRelation->id = $id;
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CommentRelation->save($this->request->data)) {
				$this->Session->setFlash(__('The comment relation has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comment relation could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->CommentRelation->read(null, $id);
		}
		$comments = $this->CommentRelation->Comment->find('list');
		$this->set(compact('comments'));
	}

	public function manager_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->CommentRelation->id = $id;
		if (!$this->CommentRelation->exists()) {
			throw new NotFoundException(__('Invalid comment relation'));
		}
		if ($this->CommentRelation->delete()) {
			$this->Session->setFlash(__('Comment relation deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Comment relation was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
