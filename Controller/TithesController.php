<?php
App::uses('AppController', 'Controller');
/**
 * Tithes Controller
 *
 * @property Tithe $Tithe
 * @property PaginatorComponent $Paginator
 */
class TithesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Tithe->recursive = 0;
		$this->set('tithes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Tithe->exists($id)) {
			throw new NotFoundException(__('Invalid tithe'));
		}
		$options = array('conditions' => array('Tithe.' . $this->Tithe->primaryKey => $id));
		$this->set('tithe', $this->Tithe->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tithe->create();
			if ($this->Tithe->save($this->request->data)) {
				$this->Session->setFlash(__('The tithe has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tithe could not be saved. Please, try again.'));
			}
		}
		$people = $this->Tithe->Person->find('list',array('order' => array('Person.name ASC')));
		$this->request->data["Tithe"]["month"] = date("m");
		$this->request->data["Tithe"]["year"] = date("Y");
		$this->set(compact('people'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Tithe->exists($id)) {
			throw new NotFoundException(__('Invalid tithe'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tithe->save($this->request->data)) {
				$this->Session->setFlash(__('The tithe has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tithe could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tithe.' . $this->Tithe->primaryKey => $id));
			$this->request->data = $this->Tithe->find('first', $options);
		}
		$people = $this->Tithe->Person->find('list');
		$this->set(compact('people'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Tithe->id = $id;
		if (!$this->Tithe->exists()) {
			throw new NotFoundException(__('Invalid tithe'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tithe->delete()) {
			$this->Session->setFlash(__('The tithe has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tithe could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
