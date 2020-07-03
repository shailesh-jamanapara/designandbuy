<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class System_Menus Extends Vect_Controller {

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
            $this->web['items'] = ucwords(str_replace('_', ' ', $this->_model));
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
            unset($this->web['request']['page']);
            unset($this->web['request']['limit']);
        }
        $this->web['postdata']['search_by'] = (isset($this->web['request']['search_by'])) ? $this->web['request']['search_by'] : '';
        $this->web['postdata']['search_for'] = (isset($this->web['request']['search_for'])) ? $this->web['request']['search_for'] : '';
        $this->web['postdata']['page'] = (isset($this->web['request']['page'])) ? $this->web['request']['page'] : 1;
        $this->web['postdata']['limit'] = (isset($this->web['request']['limit'])) ? $this->web['request']['limit'] : 10;
        $this->web['postdata']['sort_by'] = (isset($this->web['request']['sort_by'])) ? $this->web['request']['sort_by'] : $this->_model . '.system_menu_name';
        $this->web['postdata']['order_type'] = (isset($this->web['request']['order_type'])) ? $this->web['request']['order_type'] : 'ASC';
        $this->web['search'][$this->_model . '.system_menu_name'] = 'Menu name';
        $this->web['search']['pm.system_menu_name'] = 'Parent Menu Name';
        $this->web['search']['system_modules.system_module_name'] = 'System Module Name';
        $this->web['search'][$this->_model . '.status'] = 'Status';
        if (isset($this->web['request']['search_by']) && $this->web['request']['search_by'] != '') {
            $this->{$this->model_name}->ci_where_like[$this->web['request']['search_by']] = $this->web['request']['search_for'];
        }
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
        }
        //Ends to save data on form submit
        $this->web['model']['id'] = 0;
        if (isset($this->web['request']['task']) && ($this->web['request']['task'] == 'add_edit')) {

            $this->web['model']['where'] = $this->{$this->model_name}->where;
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
        $this->load->model('system_modules_model');
	  $this->system_modules_model->ci_where = array();	
        $this->system_modules_model->ci_where["system_modules.status"]='1';
        $this->web['system_modules'] = $this->system_modules_model->getAllWithKeyValue();
        $this->web['menu_icons'] = array('fa fa-user' => 'fa-user', 'fa fa-users' => 'fa-users', 'fa fa-cog' => 'fa-cog', 'fa fa-list-alt' => 'fa-list-alt', 'fa fa-indent' => 'fa-indent', 'fa fa-cog' => 'fa-cog', 'fa fa-cog' => 'fa-cog', 'fa fa-cogs' => 'fa-cogs', 'fa fa-mortar-board' => 'mortar-board', 'fa fa-calendar' => 'fa-calendar', 'fa fa-calculator' => 'fa-calculator', 'fa fa-globe' => 'fa-globe', 'fa fa-graduation-cap' => 'fa-graduation-cap', 'fa fa-briefcase' => 'fa-briefcase', 'fa fa-university' => 'fa-university');
        $this->{$this->model_name}->ci_where = array();
        $this->{$this->model_name}->ci_where[$this->_model . ".parent_id"] = "0";
        $this->web['parent_menus'] = $this->{$this->model_name}->getAllWithKeyValue();
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
        $this->web['request']['is_custom'] = (isset($this->web['request']['is_custom'])) ? $this->web['request']['is_custom'] : '0';
        $this->web['request']['updated_by'] = $this->session->userdata['loggedin']['username'];
        $this->web['request']['parent_id'] = (isset($this->web['request']['parent_id'])) ? $this->web['request']['parent_id'] : 0;
        $this->web['request']['show_after'] = (isset($this->web['request']['show_after']) && $this->web['request']['show_after'] > 0) ? $this->web['request']['show_after'] + 1 : $this->getMenusNextSortOrder();
        unset($this->web['request']['menu_type']);
        foreach ($this->{$this->model_name}->fields_insert as $key => $val) {
            $this->{$this->model_name}->fields_insert[$key] = (isset($this->web['request'][$key])) ? $this->web['request'][$key] : $val['value'];
        }

        $data = $this->{$this->model_name}->fields_insert;
        $id = $this->{$this->model_name}->save_record($id, $data);
        return $id;
    }

    private function getParentMenusSortOrder($parent_id) {
        $sort_order = 0;
         $this->{$this->model_name}->ci_where = array();
        $this->{$this->model_name}->ci_where[$this->_model.".parent_id"] = $parent_id;
        $ob = array();
        $ob['order_by'] = 'sort_order';
        $ob['order_type'] = 'DESC';
        $rows = $this->web['parent_menus'] = $this->{$this->model_name}->getAll(null, null, $ob);
        if (!empty($rows)) {
            $sort_order = $rows[0]['sort_order'] + 1;
        }
        return $sort_order;
    }

    private function getMenusNextSortOrder() {
        $sort_order = 0;
        $ob = array();
        $ob['order_by'] = 'id';
        $ob['order_type'] = 'DESC';
        $rows = $this->web['parent_menus'] = $this->{$this->model_name}->getAll(null, null, $ob);

        if (!empty($rows)) {
            $sort_order = $rows[0]['id'];
        }
        return (int) $sort_order + $sort_order;
    }

}
