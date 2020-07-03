<?php

ini_set('display_errors', 1);

class Customers Extends Vect_Controller {

    public $web = array();
    private $model_name;
    private $_model;
    private $rules = array();
    private $other_model;

    public function __construct() {
        parent::__construct();
        is_loggedin();
        $this->_model = strtolower(__CLASS__);
        $this->setModel($this->_model);
        $model = (string) $this->getModel();
        $this->web['request'] = $this->request;
		$this->web['request']['customer_type']  = (isset($this->web['request']['ACTION']) && $this->web['request']['ACTION'] === 'schools' ) ?'school':'corporate'; 
		//echo "<pre>";print_r($this->web['request'] ); echo "</pre>";
        $this->model_name = $model;
        if ($this->load->model(trim($this->model_name))) {
            $this->web['view'] = $this->{$this->model_name}->getView();
            $this->{$this->model_name}->setCols();
            $this->{$this->model_name}->setJoins();
            $this->web['ip_address'] = base64_encode($this->ip_address);
            $this->web['items'] = ucfirst($this->_model);
            $this->web['item'] = ucfirst($this->inflect->singularize($this->_model));
        } else {
            return false;
            die();
        }
        $this->web['ajax_url'] = $this->ajax_url . "/save_" . strtolower($this->_model) . "_data?token=" . $this->web['ip_address'];
        $this->web['ajax_url_delete_item'] = $this->ajax_url_delete_item . "?token=" . $this->web['ip_address'];
        $this->web['edit_url'] = $this->edit_url;
        $this->web['listpage_url'] = $this->listpage_url;
        $this->web['type_of_schools_arr'] = $this->type_of_schools_arr;
    }

    private function initLoad() {

        if (isset($this->web['request']['reset']) && $this->web['request']['reset'] == 'reset') {
            unset($this->web['request']['search_by']);
            unset($this->web['request']['search_for']);
            unset($this->web['request']['page']);
            unset($this->web['request']['limit']);
        }
        $this->web['postdata']['search_by'] = (isset($this->web['request']['search_by'])) ? $this->web['request']['search_by'] : '';
        $this->web['postdata']['search_for'] = (isset($this->web['request']['search_for'])) ? $this->web['request']['search_for'] : '';
        $this->web['postdata']['page'] = (isset($this->web['request']['page'])) ? $this->web['request']['page'] : 1;
        $this->web['postdata']['limit'] = (isset($this->web['request']['limit'])) ? $this->web['request']['limit'] : 10;
        $this->web['postdata']['sort_by'] = (isset($this->web['request']['sort_by'])) ? $this->web['request']['sort_by'] : $this->_model . '.customer_name';
        $this->web['postdata']['order_type'] = (isset($this->web['request']['order_type'])) ? $this->web['request']['order_type'] : 'ASC';
        $this->web['search'][$this->_model . '.customer_name'] = 'Name';
        $this->web['search'][$this->_model . '.email'] = 'Email';
		$this->web['search']['contacts.phone'] = 'Phone';
        $this->web['search'][$this->_model . '.status'] = 'Status';
	    $this->{$this->model_name}->ci_where = array();	
		$this->{$this->model_name}->ci_where_like = array();	
		$this->{$this->model_name}->ci_where['customers.customer_type'] = $this->web['request']['customer_type'];
        if (isset($this->web['request']['search_by']) && $this->web['request']['search_by'] != '') {
            $this->{$this->model_name}->ci_where_like[$this->web['request']['search_by']] = $this->web['request']['search_for'];
        }
    }

    public function schools() {
        //$config = array('paths' => TWIG_TEMPLATE_PATH_ADMIN, 'cache' => APPPATH . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . 'cache');
        //$this->load->library('twig', $config);
        $this->initLoad();
        $result = $this->{$this->model_name}->getAll($this->web['postdata']['page'], $this->web['postdata']['limit'], array('sort_by' => $this->web['postdata']['sort_by'], 'order_type' => $this->web['postdata']['order_type']));
        if ($result) {
            $this->web['rows'] = $result;
        } else {
            $this->web['rows'] = array();
        }
        $this->web['total_records'] = $this->{$this->model_name}->total_records;
        $this->web['total_pages'] = $this->{$this->model_name}->total_pages;
        $this->web['model']['new'] = base64_encode(0);
        $this->web['section'][] = $this->web['view'] . DIRECTORY_SEPARATOR . 'schools';
        $rand = rand(500, 10000);
		$this->general_model->load_my_view($this->web);
    }
	 public function corporate() {
        //$config = array('paths' => TWIG_TEMPLATE_PATH_ADMIN, 'cache' => APPPATH . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . 'cache');
        //$this->load->library('twig', $config);
        $this->initLoad();
        $result = $this->{$this->model_name}->getAll($this->web['postdata']['page'], $this->web['postdata']['limit'], array('sort_by' => $this->web['postdata']['sort_by'], 'order_type' => $this->web['postdata']['order_type']));
        if ($result) {
            $this->web['rows'] = $result;
        } else {
            $this->web['rows'] = array();
        }
        $this->web['total_records'] = $this->{$this->model_name}->total_records;
        $this->web['total_pages'] = $this->{$this->model_name}->total_pages;
        $this->web['model']['new'] = base64_encode(0);
        $this->web['section'][] = $this->web['view'] . DIRECTORY_SEPARATOR . 'schools';
        $rand = rand(500, 10000);
		$this->general_model->load_my_view($this->web);
    }
	public function index() {
        //$config = array('paths' => TWIG_TEMPLATE_PATH_ADMIN, 'cache' => APPPATH . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . 'cache');
        //$this->load->library('twig', $config);
        $this->initLoad();
        $result = $this->{$this->model_name}->getAll($this->web['postdata']['page'], $this->web['postdata']['limit'], array('sort_by' => $this->web['postdata']['sort_by'], 'order_type' => $this->web['postdata']['order_type']));
        if ($result) {
            $this->web['rows'] = $result;
        } else {
            $this->web['rows'] = array();
        }
        $this->web['total_records'] = $this->{$this->model_name}->total_records;
        $this->web['total_pages'] = $this->{$this->model_name}->total_pages;
        $this->web['model']['new'] = base64_encode(0);
        $this->web['section'][] = $this->web['view'] . DIRECTORY_SEPARATOR . 'index';
        $rand = rand(500, 10000);
        $this->general_model->load_my_view($this->web);
    }

    public function add_edit() {
        $this->initLoad();
        $this->web['postdata']['task'] = (isset($this->web['request']['task'])) ? $this->web['request']['task'] : '';
        //Starts to save data on form submit
        if ($this->web['postdata']['task'] == 'save') {
            $id = $this->save(); // getting last user id on new insert
			if($id == true){
				$this->load->model('users_model');
				 foreach ($this->users_model->fields_insert as $key => $val) {
					$this->users_model->fields_insert[$key] = (isset($this->web['request'][$key])) ? $this->web['request'][$key] : $val['value'];
				}
				
				redirect($this->listpage_url);
			}	
        }
        //Ends to save data on form submit
        $this->web['model']['id'] = 0;
        if (isset($this->web['request']['task']) && ($this->web['request']['task'] == 'add_edit')) {

            //$this->web['model']['where'] = $this->{$this->model_name}->where;
            $this->web['model']['id'] = isset($this->web['request']['id']) ? base64_decode($this->web['request']['id']) : 0;
		  $this->{$this->model_name}->ci_where =array();	
            if ($this->web['model']['id'] > 0) {
                $this->{$this->model_name}->ci_where[$this->_model . ".id"] = $this->web['model']['id'];
            }
        }
        $cols = $this->{$this->model_name}->fields;
        foreach ($cols as $key => $col) {
            $this->web['row'][trim($key)] = (isset($this->{$this->model_name}->fields_pro[$key]['value'])) ? $this->{$this->model_name}->fields_pro[$key]['value'] : '';
        }
		$customer = $this->{$this->model_name}->getById($this->web['model']['id']);
		if (!empty($customer)) {
            $this->web['row'] = $customer; //array_merge($this->web['row'], $user ) ;		
        }
		
		$this->web['row']['address'] 		= null;
		$this->web['row']['city_id'] 		= null;
		$this->web['row']['pincode'] 		= null;
		$this->web['row']['landline_no'] 	=  null;
		$this->web['row']['mobile_no'] 		=  null;
		$this->web['row']['title'] 			=  null;
		$this->web['row']['first_name'] 	=  null;
		$this->web['row']['last_name'] 		=  null;
		$this->web['row']['role_id'] 		=  null;
		$this->web['row']['designation'] 		=  null;
		if($this->web['model']['id'] > 0 ){
			$this->load->model('school_mediums_model');
			$this->school_mediums_model->ci_where = array();
			$this->school_mediums_model->ci_where['customer_id'] = $this->web['model']['id'];	
			$row = $this->school_mediums_model->getAll();
			if(!empty($row) ){
				$this->web['row']['school_medium_name'] =$row [0]['school_medium_name'];
			}
			$this->load->model('school_types_model');
			$this->school_types_model->ci_where = array();
			$this->school_types_model->ci_where['customer_id'] = $this->web['model']['id'];	
			$row = $this->school_types_model->getAll();
			if(!empty($row) ){
				$this->web['row']['school_type_name'] = $row[0]['school_type_name'];
			}
			$this->load->model('customer_addresses_model');
			$this->customer_addresses_model->ci_where = array();
			$this->customer_addresses_model->ci_where['customer_id'] = $this->web['model']['id'];	
			$row = $this->customer_addresses_model->getAll();
			if(!empty($row) ){
				$this->web['row']['address'] = $row[0]['address'];
				$this->web['row']['city_id'] = $row[0]['city_id'];
				$this->web['row']['zipcode'] = $row[0]['zipcode'];
			}
			$this->load->model('customer_contacts_model');
			$this->customer_contacts_model->ci_where = array();
			$this->customer_contacts_model->ci_where['customer_id'] = $this->web['model']['id'];	
			$row = $this->customer_contacts_model->getAll();
			if(!empty($row) ){
				$this->web['row']['landline_no'] = $row[0]['landline_no'];
				$this->web['row']['mobile_no'] = $row[0]['mobile_no'];
			}
			$this->load->model('users_model');
			$this->users_model->ci_where = array();
			$this->users_model->ci_where['customer_id'] = $this->web['model']['id'];	
			$row = $this->users_model->getAll();
			if(!empty($row) ){
				$this->web['row']['title'] = $row[0]['title'];
				$this->web['row']['first_name'] = $row[0]['first_name'];
				$this->web['row']['last_name'] = $row[0]['last_name'];
				$this->web['row']['role_id'] = $row[0]['role_id'];
				$this->web['row']['designation'] = $row[0]['designation'];
			}
		}
		
		
        $this->load->model('departments_model');
        $this->web['departments'] = $this->departments_model->getAllWithKeyValue();
        $this->web['section'][] = $this->web['view'] . DIRECTORY_SEPARATOR . 'add_edit';
        if (isset($this->web['model']['id']) && $this->web['model']['id'] > 0) {
            $item_name = strtolower($this->inflect->singularize($this->class_name)) . "_name";
        }
        $this->web['page_heading'] = ($this->web['model']['id'] > 0) ? "Edit " . $this->web['item'] . " [ " . $this->web['row'][$item_name] . " ]" : "Add New " . $this->web['item'];
        $this->web['model']['id'] = base64_encode($this->web['model']['id']);
		$this->web['listpage_url'] = 'schools';
        $this->general_model->load_my_view($this->web);
    }

    private function save() {
        if (isset($this->web['request']['id'])) {
            $this->web['request']['id'] = base64_decode($this->web['request']['id']);
        }
        $id = $this->web['request']['id'];
        $this->web['request']['is_archived'] = 0;
        if ($this->web['request']['id'] == 0) {
            $this->web['request']['created_at'] = date('y:m:d h:i:s');
            $this->web['request']['created_by'] = $this->session->userdata['loggedin']['username'];
        }
        $this->web['request']['updated_on'] = date('y:m:d h:i:s');
        $this->web['request']['updated_by'] = $this->session->userdata['loggedin']['username'];
		//echo "<pre>";
		//print_r($this->{$this->model_name}->fields_insert);
		//exit;
        foreach ($this->{$this->model_name}->fields_insert as $key => $val) {
            $this->{$this->model_name}->fields_insert[$key] = (isset($this->web['request'][$key])) ? $this->web['request'][$key] : $val['value'];
        }
        $data = $this->{$this->model_name}->fields_insert;
        $id = $this->{$this->model_name}->save_record($id, $data);
        return $id;
    }

}
