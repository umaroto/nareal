<?php
App::uses('AppController', 'Controller');

class SubcategoriesController extends AppController {

	public $components = array('Image');

	public function manager_index() {
		$this->Subcategory->recursive = 0;
		$this->set('subcategories', $this->paginate());
	}

	public function manager_view($id = null) {
		$this->Subcategory->id = $id;
		if (!$this->Subcategory->exists()) {
			throw new NotFoundException(__('Subcategoria inválida.'));
		}
		$this->set('subcategory', $this->Subcategory->read(null, $id));
	}

	public function manager_edit($id = null) {
		$this->Subcategory->id = $id;

		if ($this->request->is('post') || $this->request->is('put')) {
			$image = $this->Image->upload($this->modelKey, 660, 180);
			unset($this->request->data['Subcategory']['image']);
			if($image){
				$this->Image->crop($image, 660, 110, $this->modelKey);
				$this->Image->crop($image, 180, 30, $this->modelKey);
				$this->request->data['Subcategory']['image'] = $image;
			}
			
			if ($this->Subcategory->save($this->request->data)) {
				$this->Session->setFlash(__('Subcategoria salva com sucesso.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Subcategoria não pode ser salva. Tente novamente.'));
			}
		} else {
			$this->request->data = $this->Subcategory->read(null, $id);
		}
		$categories = $this->Subcategory->Category->find('list');
		$templates = $this->Subcategory->Template->find('list');
		$this->set(compact(array('categories', 'templates')));
	}

	public function manager_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Subcategory->id = $id;
		if (!$this->Subcategory->exists()) {
			throw new NotFoundException(__('Subcategoria inválida.'));
		}
		if ($this->Subcategory->delete()) {
			$this->Session->setFlash(__('Subcategoria deletada.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Subcategoria não pode ser deletada.'));
		$this->redirect(array('action' => 'index'));
	}
}
