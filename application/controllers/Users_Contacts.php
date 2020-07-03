<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users_Contacts Extends Designandbuy_Controller {

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
            //$this->web['items'] = ucwords(str_replace('_',' ',$this->_model));
            $this->web['items'] = 'Contacts';
            $this->web['item'] = ucwords(str_replace('_', ' ', $this->inflect->singularize($this->_model)));
        } else {
            return false;
            die();
        }
        $this->web['ajax_url'] = $this->ajax_url . "/save_" . strtolower($this->_model) . "_data?token=" . $this->web['ip_address'];
        $this->web['ajax_url_delete_item'] = $this->ajax_url_delete_item . "?token=" . $this->web['ip_address'];
        $this->web['edit_url'] = $this->edit_url;
        $this->web['listpage_url'] = $this->listpage_url;
    }

    private function initLoad() {

        if (isset($this->web['request']['reset']) && $this->web['request']['reset'] == 'reset') {
            unset($this->web['request']['search_by']);
            unset($this->web['request']['search_for']);
        }
        $this->{$this->model_name}->table_properties['join_tables'][] = array('users', 'users.id = ' . $this->_model . '.user_id ', 'right');
        $this->{$this->model_name}->table_properties['cross_fields']['first_name'] = array(
            'caption' => array('first_name ', 'first_name ', 'first_name   of Employee'),
            'type' => 'varchar',
            'len' => 100,
            'value' => null,
            'in_select' => 1,
            'in_insert' => 0,
            'modified' => ' users.first_name as first_name'
        );
        $this->{$this->model_name}->table_properties['cross_fields']['title'] = array(
            'caption' => array('first_name ', 'title ', 'title   of title'),
            'type' => 'varchar',
            'len' => 100,
            'value' => null,
            'in_select' => 1,
            'in_insert' => 0,
            'modified' => ' users.title as title'
        );
        $this->{$this->model_name}->table_properties['cross_fields']['username'] = array(
            'caption' => array('username ', 'username ', 'username   of Employee'),
            'type' => 'varchar',
            'len' => 100,
            'value' => null,
            'in_select' => 1,
            'in_insert' => 0,
            'modified' => ' users.username as username'
        );
        $this->{$this->model_name}->table_properties['cross_fields']['middle_name'] = array(
            'caption' => array('middle Name', 'middle Name', 'middle name  of Employee'),
            'type' => 'varchar',
            'len' => 100,
            'value' => null,
            'in_select' => 1,
            'in_insert' => 0,
            'modified' => ' users.middle_name as middle_name'
        );
        $this->{$this->model_name}->table_properties['cross_fields']['last_name'] = array(
            'caption' => array('last_name ', 'last_name ', 'last_name   of Employee'),
            'type' => 'varchar',
            'len' => 100,
            'value' => null,
            'in_select' => 1,
            'in_insert' => 0,
            'modified' => ' users.last_name as last_name'
        );
        $this->{$this->model_name}->setCols();
        $this->{$this->model_name}->setJoins();

        $this->web['postdata']['search_by'] = (isset($this->web['request']['search_by'])) ? $this->web['request']['search_by'] : '';
        $this->web['postdata']['search_for'] = (isset($this->web['request']['search_for'])) ? $this->web['request']['search_for'] : '';
        $this->web['postdata']['page'] = (isset($this->web['request']['page'])) ? $this->web['request']['page'] : 1;
        $this->web['postdata']['limit'] = (isset($this->web['request']['limit'])) ? $this->web['request']['limit'] : 10;
        $this->web['postdata']['sort_by'] = (isset($this->web['request']['sort_by'])) ? $this->web['request']['sort_by'] : 'users.username';
        $this->web['postdata']['order_type'] = (isset($this->web['request']['order_type'])) ? $this->web['request']['order_type'] : 'ASC';
        $this->web['search']['users.first_name'] = 'First Name';
        $this->web['search']['users.middle_name'] = 'Middle Name';
        $this->web['search']['users.last_name'] = 'Last Name';
        $this->web['search'][$this->_model . 'phone'] = 'Phone No';
        $this->web['search'][$this->_model . 'mobile_1'] = 'Mobile 1';
        $this->web['search'][$this->_model . 'mobile_2'] = 'Mobile 2';
        $this->web['search'][$this->_model . '.status'] = 'Status';
        if (isset($this->web['request']['search_by']) && $this->web['request']['search_by'] != '') {
            $this->{$this->model_name}->ci_where_like[$this->web['request']['search_by']] = $this->web['request']['search_for'];
        }
    }

    public function index() {
        //$config = array('paths' => TWIG_TEMPLATE_PATH_ADMIN, 'cache' => APPPATH . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . 'cache');
        //$this->load->library('twig', $config);
        $this->initLoad();
        $obArr['order_by'] = 'users.first_name';
        $obArr['order_type'] = 'ASC';
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
        }
        //Ends to save data on form submit
        $this->web['model']['id'] = 0;
        if (isset($this->web['request']['task']) && ($this->web['request']['task'] == 'add_edit')) {

            $this->web['model']['where'] = $this->{$this->model_name}->where;
            $this->web['model']['id'] = isset($this->web['request']['id']) ? base64_decode($this->web['request']['id']) : 0;
            if ($this->web['model']['id'] > 0) {
                $this->{$this->model_name}->where[$this->_model . ".id"] = $this->web['model']['id'];
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
        $this->web['row']['skills'] = "Not available";
        $this->load->model('users_model');
        $condArr[0] = 'users.user_type="employee" and users.active_status="1" and users.is_archived="0"  ';
        $this->web['employees'] = $this->users_model->getAllWithKeyValue(null, null, array(), array(), $condArr);
        $this->web['section'][] = $this->web['view'] . DIRECTORY_SEPARATOR . 'add_edit';
        if (isset($this->web['model']['id']) && $this->web['model']['id'] > 0) {
            $item_name = strtolower($this->inflect->singularize($this->class_name)) . "_name";
        }
        $this->web['page_heading'] = ($this->web['model']['id'] > 0) ? "Edit " . $this->web['item'] . " [ " . $this->web['row'][$item_name] . " ]" : "Add New " . $this->web['item'];
        $this->web['model']['id'] = base64_encode($this->web['model']['id']);
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
        $this->{$this->model_name}->setCols();
        foreach ($this->{$this->model_name}->fields_insert as $key => $val) {
            $this->{$this->model_name}->fields_insert[$key] = (isset($this->web['request'][$key])) ? $this->web['request'][$key] : $val['value'];
        }
        $data = $this->{$this->model_name}->fields_insert;
        $id = $this->{$this->model_name}->save_record($id, $data);
        return $id;
    }

}
