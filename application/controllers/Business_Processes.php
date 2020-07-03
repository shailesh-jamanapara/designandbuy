<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Business_Processes Extends Designandbuy_Controller {

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
        $this->model_name = $model;
        if ($this->load->model(trim($this->model_name))) {
            $this->web['view'] = $this->{$this->model_name}->getView();
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
		$this->load->model('attributes_model');
	}

    private function initLoad() {
        if (isset($this->web['request']['reset']) && $this->web['request']['reset'] == 'reset') {
            unset($this->web['request']['search_by']);
            unset($this->web['request']['search_for']);
        }
        $this->web['postdata']['search_by'] = (isset($this->web['request']['search_by'])) ? $this->web['request']['search_by'] : '';
        $this->web['postdata']['search_for'] = (isset($this->web['request']['search_for'])) ? $this->web['request']['search_for'] : '';
        $this->web['postdata']['page'] = (isset($this->web['request']['page'])) ? $this->web['request']['page'] : 1;
        $this->web['postdata']['limit'] = (isset($this->web['request']['limit'])) ? $this->web['request']['limit'] : 10;
        $this->web['postdata']['sort_by'] = (isset($this->web['request']['sort_by'])) ? $this->web['request']['sort_by'] : 'users.first_name';
        $this->web['postdata']['order_type'] = (isset($this->web['request']['order_type'])) ? $this->web['request']['order_type'] : 'ASC';
        $this->web['search']['users.first_name'] = 'First Name';
        $this->web['search']['users.last_name'] = 'Last Name';
        //$this->web['search'][$this->_model . '.status'] = 'Status';
        $this->{$this->model_name}->ci_where_like = array();
        $this->{$this->model_name}->ci_where = array();
	    //$this->{$this->model_name}->ci_where[$this->_model.'.is_archived'] = '0';	
        
        if (isset($this->web['request']['search_by']) && $this->web['request']['search_by'] != '') {
            $this->{$this->model_name}->ci_where_like[$this->web['request']['search_by']] = $this->web['request']['search_for'];
        }

        $this->load->model('cities_model');
        $this->web['cities'] = $this->cities_model->getAllWithKeyValue();
    }

    private function loadRequiredModels() {
        $this->load->model('users_model');
        $this->load->model('users_addresses_model');
        $this->load->model('users_contacts_model');
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
        
        //return $this->web;
        $this->general_model->load_my_view($this->web);
    }

    public function add_edit() {
        $this->initLoad();
        $this->web['postdata']['task'] = (isset($this->web['request']['task'])) ? $this->web['request']['task'] : '';
        //Starts to save data on form submit
        if ($this->web['postdata']['task'] == 'save') {
            $this->loadRequiredModels();

            $this->saveUsersData(); // getting last user id on new insert 
            $this->saveUsersContactsData();
            $this->saveUsersAdderessData();
            $this->save(); // getting last user id on new insert 
			//redirect($this->listpage_url);
        }
        //Ends to save data on form submit
        $this->web['model']['id'] = 0;
        if (isset($this->web['request']['task']) && ($this->web['request']['task'] == 'add_edit')) {
            
            //$this->web['model']['where'] = $this->{$this->model_name}->where;
            $this->web['model']['id'] = isset($this->web['request']['id']) ? base64_decode($this->web['request']['id']) : 0;
            if ($this->web['model']['id'] > 0) {
                $this->{$this->model_name}->ci_where[$this->_model . ".id"] = $this->web['model']['id'];
            }
            
        }
        $cols = $this->{$this->model_name}->fields;
        foreach ($cols as $key => $col) {
            $this->web['row'][trim($key)] = (isset($this->{$this->model_name}->fields_pro[$key]['value'])) ? $this->{$this->model_name}->fields_pro[$key]['value'] : '';
        }
        $position = $this->{$this->model_name}->getById($this->web['model']['id']);
        if (!empty($position)) {
            $this->web['row'] = $position; //array_merge($this->web['row'], $user ) ;		
        }

        // $this->load->model('products_model');
        // $this->web['products'] = $this->products_model->getAllWithKeyValue();
        $this->web['section'][] = $this->web['view'] . DIRECTORY_SEPARATOR . 'add_edit';
		// $this->web['attributes'] = array();
        // if (isset($this->web['model']['id']) && $this->web['model']['id'] > 0) {
        //     $item_name = strtolower($this->inflect->singularize($this->class_name)) . "_name";
		// 	$this->web['attributes'] = $this->templateAttributes($this->web['model']['id']);
        // }
        $this->web['page_heading'] = ($this->web['model']['id'] > 0) ? "Edit " . $this->web['item'] . " [ " . $this->web['row']['first_name'] . " ]" : "Add New " . $this->web['item'];
        $this->web['model']['id'] = base64_encode($this->web['model']['id']);
        // echo "<pre>";
        // print_r($this->web['row']);
        $this->general_model->load_my_view($this->web);
    }

    private function saveUsersData()
    {
        // Saving basic data
        $id = $this->web['request']['id'];
        $this->web['request']['is_archived'] = '0';
        $this->web['request']['customer_id'] = '1';
        $this->web['request']['role_id'] = '14';
        $this->web['request']['created_at'] = date('y:m:d h:i:s');
        $this->web['request']['updated_on'] = date('y:m:d h:i:s');
        $this->web['request']['created_by'] = $this->session->userdata['loggedin']['id'];
        $this->web['request']['status'] = '1';
        $this->web['request']['username'] = $this->web['request']['login_code'];
        $password = strtolower(str_replace(' ', '', trim($this->web['request']['login_code'])));
        $this->web['request']['password'] = md5($password);
        //$this->users_model->setCols();
        foreach ($this->users_model->fields_insert as $key => $val) {
            if (isset($this->web['request'][$key])) {
                $this->users_model->fields_insert[$key] = $this->web['request'][$key];
            }
        }
        $data = $this->users_model->fields_insert;
        $id = ( $this->users_model->save_record($id, $data) ) ? $this->users_model->last_insert_id : false;
        if ($id == false)
            return array('status' => 'FALSE', 'message' => 'Users data could not be saved');
        //Saving users personal data
        // $user_email = $this->web['request']['email'];
        // $login_code = $this->web['request']['login_code'];
        // $user_name = $this->web['request']['title'] . " " . $this->web['request']['first_name'] . " " . $this->web['request']['last_name'];
        // $this->sendSignUpEmail($user_name, $user_email, $login_code, $password);
        $this->web['request']['user_id'] = $id;
    }

    private function saveUsersContactsData() {
        $id = $this->web['request']['id'];
        $this->web['request']['contact_of'] = 'self';
        //$this->model_name = 'users_addresses_model';
        foreach ($this->users_contacts_model->fields_insert as $key => $val) {
            if (isset($this->web['request'][$key])) {
                $this->users_contacts_model->fields_insert[$key] = $this->web['request'][$key];
            }
        }
        unset($this->users_contacts_model->fields_insert['users_contacts_id']);
        return ($this->users_contacts_model->save_record($id, $this->users_contacts_model->fields_insert)) ? true : false;
    }

    private function saveUsersAdderessData() {
        $id = $this->web['request']['id'];
        //$this->model_name = 'users_addresses_model';
        $this->web['request']['sort_order'] = '1';
        $this->web['request']['address_type_id'] = '6';
        $this->web['request']['address'] = $this->web['request']['address'];
        $this->web['request']['city_id'] = $this->web['request']['city_id'];
        //$this->web['request']['state_id'] = $this->web['request']['state_id']['candidate'];
        foreach ($this->users_addresses_model->fields_insert as $key => $val) {
            if (isset($this->web['request'][$key])) {
                $this->users_addresses_model->fields_insert[$key] = $this->web['request'][$key];
            }
        }
        $this->users_addresses_model->save_record($id, $this->users_addresses_model->fields_insert);
    }

    private function save() {
        if (isset($this->web['request']['id'])) {
            $this->web['request']['id'] = base64_decode($this->web['request']['id']);
        }
        $id = $this->web['request']['id'];
        
        if ($this->web['request']['id'] == 0) {
		  $this->web['request']['is_archived'] = 0;	
           
        }
        foreach ($this->{$this->model_name}->fields_insert as $key => $val) {
            $this->{$this->model_name}->fields_insert[$key] = (isset($this->web['request'][$key])) ? $this->web['request'][$key] : $val['value'];
        }
        
        $id = $this->{$this->model_name}->save_record($id, $this->{$this->model_name}->fields_insert);
		return $id;
    }
}