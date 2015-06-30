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

		$this->Paginator->settings = array(
		        	'limit' => 50,
					'order' => array(
							'day' => 'ASC'
					)
				);
		
		$this->set('tithes', $this->Paginator->paginate(
				'Tithe',
		    	array(
					'Tithe.month =' => $month,
					'Tithe.year =' => $year
				),
				array(
					'value',
					'day',
					'month',
					'month_ref',
					'year',
					'Person.name',

				)
			)
		);
		
        $report_simplify_year = $this->Tithe->find('list',array(
                'fields'=>array(
                        'Tithe.year'						
                ),
                'group'=>array(
                        'Tithe.year'
                ),
                'recursive'=>0
        ));
		
		$this->set('report_simplify_year', $report_simplify_year);
		
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
	public function add($id = null) {
		if ($this->request->is('post')) {
			$this->Tithe->create();
			if ($this->Tithe->save($this->request->data)) {
				$this->Session->setFlash(__('The tithe has been saved.'),'flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tithe could not be saved. Please, try again.'),'flash_error');
			}
		}
		$people = $this->Tithe->Person->find('list',array('order' => array('Person.name ASC')));
		$this->request->data["Tithe"]["month"] = date("m");
		$this->request->data["Tithe"]["month_ref"] = date("m");
		$this->request->data["Tithe"]["year"] = date("Y");
		$this->set(compact('people'));
		$this->set('person_id', $id);
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
				$this->Session->setFlash(__('The tithe has been saved.'),'flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tithe could not be saved. Please, try again.'),'flash_error');
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
			$this->Session->setFlash(__('The tithe has been deleted.'),'flash_success');
		} else {
			$this->Session->setFlash(__('The tithe could not be deleted. Please, try again.'),'flash_error');
		}
		return $this->redirect(array('action' => 'index'));
	}


    public function report_simplify($month = null, $year = null){
		
		$meses = array(__('January'),__('February'),__('March'),__('April'),__('May'),__('June'),__('July'),__('August'),__('September'),
					__('October'),__('November'),__('December'));				

            $tithes = $this->Tithe->find('all',array(
                    'fields'=>array(
                            'SUM(Tithe.value) as value',
							'Concat(Tithe.year,"-",Tithe.month,"-",Tithe.day) as data',
							'DATE(Tithe.created) as created'						
                    ),
					'conditions'=>array(
						'Tithe.month'=>$month, 
						'Tithe.year'=>$year
					),
                    'group'=>array(
                            'DAY(data)'
                    ),
                    'recursive'=>0
            ));
			$total = $this->Tithe->find('first',array(
                    'fields'=>array(
                            'SUM(Tithe.value) as value',						
                    ),
					'conditions'=>array(
						'Tithe.month'=>$month, 
						'Tithe.year'=>$year
					),
                    'recursive'=>0
            ));
            $this->layout = 'report';	
			$this->set('month',$meses[$month-1]);		
            $this->set('tithes',$tithes);
			$this->set('total',$total[0]['value']);
            $this->render();
        }
}
