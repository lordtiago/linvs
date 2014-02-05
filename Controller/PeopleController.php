<?php
App::uses('AppController', 'Controller');
/**
 * People Controller
 *
 * @property Person $Person
 * @property PaginatorComponent $Paginator
 */
class PeopleController extends AppController {

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
		$this->Person->recursive = 0;
		$this->Paginator->settings = array(
		        'limit' => 10,
		        'order' => array(
							'Person.name' => 'asc'
						)
		);
		$this->set('people', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Person->exists($id)) {
			throw new NotFoundException(__('Invalid person'));
		}
		$options = array('conditions' => array('Person.' . $this->Person->primaryKey => $id));
		$person = $this->Person->find('first', $options);
		$options2 = array('conditions' => array('Person.' . $this->Person->primaryKey => $person['Person']['father_id']));
		$options3 = array('conditions' => array('Person.' . $this->Person->primaryKey => $person['Person']['father2_id']));
		$options4 = array('conditions' => array('Person.' . $this->Person->primaryKey => $person['Person']['spouse_id']));
		$options_child = array('conditions' => array('Person.father_id' => $person['Person']['id']));
		$options_child2 = array('conditions' => array('Person.father2_id' => $person['Person']['id']));
		$options_child = array_merge($options_child, $options_child2);
		$this->set(compact('person'));
		$this->set('father', $this->Person->find('first', $options2));
		$this->set('father2', $this->Person->find('first', $options3));
		$this->set('spouse', $this->Person->find('first', $options4));
		$this->set('childs', $this->Person->find('all', $options_child));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Person->create();
			//In the future to check, what is the parish that user work
			$this->request->data["Person"]["parish_id"] = 1;
			if ($this->Person->save($this->request->data)) {
				$this->Session->setFlash(__('The person has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The person could not be saved. Please, try again.'));
			}
		}
		$parishes = $this->Person->Parish->find('list');
		$fathers = $spouses = $this->Person->find("list",array('order' => array('Person.name ASC')));
		$this->set(compact('fathers'));
		$this->set(compact('spouses'));
		$this->set(compact('parishes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Person->exists($id)) {
			throw new NotFoundException(__('Invalid person'));
		}
		if ($this->request->is(array('post', 'put'))) {
			//In the future to check, what is the parish that user work
			$this->request->data["Person"]["parish_id"] = 1;
			$spouse = $this->request->data["Person"]["spouse_id"];
			
			if ($this->Person->save($this->request->data)) {
				if($spouse != 0){
					//set in spouse, the same value
					$options = array('conditions' => array('Person.id' => $spouse));
					$spouse = $this->Person->find('first', $options);
					//var_dump($spouse);exit;
					$spouse["Person"]["spouse_id"] = $this->request->data["Person"]["id"];
					$this->Person->save($spouse);					
				}else{
					$options = array('conditions' => array('Person.spouse_id' => $this->request->data["Person"]["id"]));
					$spouse = $this->Person->find('first', $options);
					$spouse["Person"]["spouse_id"] = 0;
					$this->Person->save($spouse);										
				}
				
				$this->Session->setFlash(__('The person has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The person could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Person.' . $this->Person->primaryKey => $id));
			$this->request->data = $this->Person->find('first', $options);
		}
		$parishes = $this->Person->Parish->find('list');
		$fathers = $spouses = $this->Person->find("list",array('order' => array('Person.name ASC')));
		$this->set(compact('fathers'));
		$this->set(compact('spouses'));
		$this->set(compact('parishes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Person->id = $id;
		if (!$this->Person->exists()) {
			throw new NotFoundException(__('Invalid person'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Person->delete()) {
			$this->Session->setFlash(__('The person has been deleted.'));
		} else {
			$this->Session->setFlash(__('The person could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
