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
	public function index($month = null, $year = null) {
		$this->Tithe->recursive = 0;
		
		if(!isset($month)) $month = date("m");
		if(!isset($year)) $year = date("Y");
		$sum = $this->Tithe->find('first',array(
			'conditions' => array(					
				'Tithe.month =' => $month,
				'Tithe.year =' => $year), //array of conditions
			'recursive' => 0, //int
			//array of field names
			'fields' => array('SUM(Tithe.value) as total'),			
			)
		);
		
		$this->set('tithes', $this->Paginator->paginate(
				'Tithe',
		    	array(
					'Tithe.month =' => $month,
					'Tithe.year =' => $year
				),
				array(
					'Tithe.value',
					'Tithe.month',
					'Tithe.year',
					'Tithe.person_id',

				)
			)
		);
		
		$this->set('sum',$sum);
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
		$this->request->data["Tithe"]["month_ref"] = date("m");
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
	}


        public function report_simplify(){

			$query = "SELECT SUM( value ) , DATE(created)
							FROM  `tithes` 
							WHERE month = 2 AND year = 2014
							GROUP BY DAY( created ) 
							LIMIT 0 , 30";
  /*          $totais = '';
            $option['material'] = 11;
            $select = "SELECT  Material.name, Material.balance, UnitType.name, Shelf.name";
            $from = " FROM  materials AS Material
                        INNER JOIN  material_groups AS  MaterialGroup ON (  Material.material_group_id =  MaterialGroup.id )
                        INNER JOIN  shelves AS  Shelf ON (  Material.shelf_id =  Shelf.id)
                        INNER JOIN unit_types AS  UnitType ON (  Material.unit_type_id =  UnitType.id ) ";
            $order = ' ORDER BY';
            if($this->request->data['grupo']=='grupo'){
                $select .= ", MaterialGroup.name";
                $order .= " MaterialGroup.name";
                $option['grupo'] = 'grupo';
                $query2 = 'SELECT MaterialGroup.name AS grupo, SUM( Material.balance ) as total
                            FROM materials AS Material
                            INNER JOIN material_groups AS MaterialGroup ON ( Material.material_group_id = MaterialGroup.id )
                            GROUP BY MaterialGroup.name';
                $totais = $this->Material->query($query2);
                if($this->request->data['asc']=='asc'){
                    $order .= ", Material.name ASC";
                }
            }else if($this->request->data['asc']=='asc'){
                $order .= " Material.name ASC";
            }
            if($this->request->data['codebar']=='codebar'){
                $select .= ", Material.codebar";
                $option['codebar'] = 3;
                $option['material'] = 8;
                if($this->request->data['man']=='man'){
                    $select .= ", Material.manufacturer";
                    $option['man'] = 3;
                    $option['material'] = 5;
                }
            }else if($this->request->data['man']=='man'){
                $select .= ", Material.manufacturer";
                $option['man'] = 3;
                $option['material'] = 8;
            }
            $query = $select.$from;
            if($order != ' ORDER BY') $query .= $order;*/
            $this->layout = 'report';
            $tithes = $this->Tithe->query($query);
            $this->set('tithes',$tithes);
            //$this->set('options',$option);
            //$this->set('totais',$totais);
            $this->render();
        }
}
