<?php
App::uses('AppController', 'Controller');
/**
 * Templates Controller
 *
 * @property Template $Template
 */
class TemplatesController extends AppController {

/**
 * manager_index method
 *
 * @return void
 */
	public function manager_index() {
		$this->Template->recursive = 0;
		$this->set('templates', $this->paginate());
	}

	public function manager_edit($id = null) {
		$this->Template->id = $id;

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Template->save($this->request->data)) {
				$this->Session->setFlash(__('The template has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The template could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Template->read(null, $id);
		}
	}

	public function manager_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Template->id = $id;
		if (!$this->Template->exists()) {
			throw new NotFoundException(__('Invalid template'));
		}
		if ($this->Template->delete()) {
			$this->Session->setFlash(__('Template deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Template was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function manager_alimentar(){
		if($this->Template->find('count') == 0){
			$data = array(
				array(
					'template' => 'Artigos com foto / Sem foto principal / 8 artigos por página'
				),
				array(
					'template' => 'Artigos sem foto / Com foto principal / 8 artigos por página'
				),
				array(
					'template' => 'Artigos destacados / Sem foto principal / 6 artigos por página'
				),
				array(
					'template' => 'Artigos destacados / Com foto principal / 6 artigos por página'
				),
			);
			$this->Template->saveAll($data);
		}		
		exit;
	}
}
