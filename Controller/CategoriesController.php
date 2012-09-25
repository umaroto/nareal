<?php
App::uses('AppController', 'Controller');

class CategoriesController extends AppController {

	public $components = array('Image');

	public function manager_index() {
		$this->Category->recursive = 0;
		$this->set('categories', $this->paginate());
	}

	public function manager_edit($id = null) {
		$this->Category->id = $id;

		if ($this->request->is('post') || $this->request->is('put')) {
			$image = $this->Image->upload($this->modelKey, 660, 180);
			unset($this->request->data['Category']['image']);
			if($image){
				$this->Image->crop($image, 660, 110, $this->modelKey);
				$this->Image->crop($image, 180, 30, $this->modelKey);
				$this->request->data['Category']['image'] = $image;
			}

			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('Categoria salvo com sucesso.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Categoria não pode ser salvo. Tente novamente.'));
			}
		} else {
			$this->request->data = $this->Category->read(null, $id);
		}
		$templates = $this->Category->Template->find('list');
		$this->set(compact('templates'));
	}

	public function manager_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Categoria inválida.'));
		}
		if ($this->Category->delete()) {
			$this->Session->setFlash(__('Categoria deletada.'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Categoria não pode ser deletada.'));
		$this->redirect(array('action' => 'index'));
	}

	public function manager_alimentar(){
		if($this->Category->find('count') == 0){
			$data = array(
				array(
					'title' => 'Tempo Real',
					'slug' => 'tempo-real',
					'template_id' => '2'
				),
				array(
					'title' => 'Colunas na Real',
					'slug' => 'colunas-na-real',
					'template_id' => '1'
				),
				array(
					'title' => 'Colaboradores na Real',
					'slug' => 'colaboradores-na-real',
					'template_id' => '3'
				),
				array(
					'title' => 'Cultura na real',
					'slug' => 'cultura-na-real',
					'template_id' => '2'
				),
				array(
					'title' => 'Especial na real',
					'slug' => 'especial-na-real',
					'template_id' => '2'
				),
				array(
					'title' => 'Mídia',
					'slug' => 'midia',
					'template_id' => '2'
				),
				array(
					'title' => 'Por aí na Real',
					'slug' => 'por-ai-na-real',
					'template_id' => '2'
				),
				array(
					'title' => 'Leitura na Real',
					'slug' => 'leitura-na-real',
					'template_id' => '2'
				),
				array(
					'title' => 'Vídeos',
					'slug' => 'videos',
					'template_id' => '3'
				),
			);
			$this->Category->saveAll($data);
		}		
		exit;
	}
}
