<?php
App::uses('AppController', 'Controller');

class AuthorsController extends AppController {

	public $components = array('Image');

	public function manager_index() {
		$this->Author->recursive = 0;
		$this->set('authors', $this->paginate());
	}

	public function manager_edit($id = null) {
		$this->Author->id = $id;

		if ($this->request->is('post') || $this->request->is('put')) {
			$image = $this->Image->upload($this->modelKey, 660, 322, 130);
			unset($this->request->data['Author']['image']);
			if($image){
				$this->Image->crop($image, 660, 320, $this->modelKey);
				$this->Image->crop($image, 322, 177, $this->modelKey);
				$this->Image->crop($image, 130, 130, $this->modelKey);
				$this->request->data['Author']['image'] = $image;
			}

			if ($this->Author->save($this->request->data)) {
				$this->Session->setFlash(__('Autor salvo com sucesso.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Autor não pode ser salvo. Por favor tente novamente.'));
			}
		} else {
			$this->request->data = $this->Author->read(null, $id);
		}
	}

	public function manager_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Author->id = $id;
		if (!$this->Author->exists()) {
			throw new NotFoundException(__('Autor Inválido.'));
		}
		if ($this->Author->delete()) {
			$this->Session->setFlash(__('Autor deletado.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Autor não pode ser deletado.'));
		$this->redirect(array('action' => 'index'));
	}
}
