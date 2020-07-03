<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Roles_Accesses Extends Designandbuy_Controller {

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
        if (!isset($this->web['request']['role_id'])) {
            redirect('Dashboards');
        }
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
        $this->web['ajax_url_get_roles_accesses'] = $this->ajax_url . "/get_roles_accesses?token=" . $this->web['ip_address'];
		$this->{$this->model_name}->ci_where_like = array();	
		$this->{$this->model_name}->ci_where = array();	
    }

    private function initLoad() {

        if (isset($this->web['request']['reset']) && $this->web['request']['reset'] == 'reset') {
            unset($this->web['request']['search_by']);
            unset($this->web['request']['search_for']);
        }
        $this->web['postdata']['search_by'] = (isset($this->web['request']['search_by'])) ? $this->web['request']['search_by'] : '';
        $this->web['postdata']['search_for'] = (isset($this->web['request']['search_for'])) ? $this->web['request']['search_for'] : '';
        $this->web['postdata']['page'] = (isset($this->web['request']['page'])) ? $this->web['request']['page'] : 1;
        $this->web['postdata']['limit'] = (isset($this->web['request']['limit'])) ? $this->web['request']['limit'] : 100;
        $this->web['postdata']['sort_by'] = (isset($this->web['request']['order_by'])) ? $this->web['request']['sort_by'] : $this->_model . '.first_name';
        $this->web['postdata']['order_type'] = (isset($this->web['request']['order_type'])) ? $this->web['request']['order_type'] : 'ASC';
        $this->web['search'][$this->_model . '.role_name'] = 'Role';
        $this->web['search'][$this->_model . '.status'] = 'Status';
        if (isset($this->web['request']['search_by']) && $this->web['request']['search_by'] != '') {
            $this->{$this->model_name}->ci_where_like[$this->web['request']['search_by']] = $this->web['request']['search_for'];
        }
        $this->web['edit_url'] = base_url() . "index.php/" . $this->_model . "/add_edit?token=" . $this->web['ip_address'];
    }
    public function index() {
        if (isset($this->web['request']['roles_accesses_ids'])) {

            if (isset($this->web['request']['role_id'])) {
                $this->web['request']['role_id'] = base64_decode($this->web['request']['role_id']);
            }
            if (isset($this->web['request']['module_id'])) {
                $this->web['request']['module_id'] = base64_decode($this->web['request']['module_id']);
            }

            // Getting all IDs of roles_accesses table which will be used to update value for respective module against user role 
            if (isset($this->web['request']['roles_accesses_ids']) && count($this->web['request']['roles_accesses_ids']) > 0) {
                $sort_order = 1;

                foreach ($this->web['request']['roles_accesses_ids'] as $key => $roles_accesses_id) {
                    $id = $roles_accesses_id;

                    foreach ($this->{$this->model_name}->fields_insert as $k => $v) {
                        $this->{$this->model_name}->fields_insert[$k] = ( isset($this->web['request'][$k][$id]) ) ? $this->web['request'][$k][$id] : 0;
                    }

                    $this->{$this->model_name}->fields_insert['role_id'] = $this->web['request']['role_id'];
                    $this->{$this->model_name}->fields_insert['system_module_id'] = $this->web['request']['system_module_id'][$key];
                    $last_id = $this->{$this->model_name}->save_record($id, $this->{$this->model_name}->fields_insert);
                    if (!$last_id) {
                        echo "Error^Problem with Access Control Settings  Data";
                        exit;
                    }
                }
            }
        }
        //$config = array('paths' => TWIG_TEMPLATE_PATH_ADMIN, 'cache' => APPPATH . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . 'cache');
        //$this->load->library('twig', $config);
        $this->initLoad();
        $result = $this->{$this->model_name}->getAll($this->web['postdata']['page'], $this->web['postdata']['limit']);
        if ($result) {
            $this->web['rows'] = $result;
        } else {
            $this->web['rows'] = array();
        }
        $this->web['model']['new'] = base64_encode(0);
        $this->web['section'][] = $this->web['view'] . DIRECTORY_SEPARATOR . 'index';
        /* Getting All Available Roles List */
        $this->load->model('roles_model');
        $this->web['request']['role_id'] = (is_numeric($this->web['request']['role_id'])) ? $this->web['request']['role_id'] : base64_decode($this->web['request']['role_id']);
        $this->web['role'] = $this->roles_model->getById($this->web['request']['role_id']);
        /* Getting All Available System Modules List */
        $this->load->model('system_modules_model');
	   $this->system_modules_model->ci_where =array();	
	   $this->system_modules_model->ci_where_like =array();	
        $this->system_modules_model->ci_where["system_modules.parent_id"] = '0';
        $this->web['system_modules'] = $this->system_modules_model->getAll();
        foreach ($this->web['system_modules'] as $module) {
		  $this->system_modules_model->ci_where =array();	
		  $this->system_modules_model->ci_where_like =array();	
            $this->system_modules_model->ci_where["system_modules.parent_id"] = $module['id'];
            $rows = $this->system_modules_model->getAllWithKeyValue();
            if (!empty($rows)) {
                $this->web['module_sections'][$module['id']] = $rows;
            }
        }
        //print_r($this->web['system_modules']); exit;
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
        $row = $this->{$this->model_name}->getById($this->web['model']['id']);
        if (!empty($row)) {
            $this->web['row'] = $row;
        }
        $this->web['section'][] = $this->web['view'] . DIRECTORY_SEPARATOR . 'add_edit';
        $this->web['page_heading'] = "Add New " . $this->web['item'];
        if (isset($this->web['model']['id'])) {
            $this->web['model']['id'] = base64_encode($this->web['model']['id']);
            $item_name = strtolower($this->web['item']) . "_name";
            if ($this->web['model']['id'] > 0)
                $this->web['page_heading'] = "Edit " . $this->web['item'] . " [ " . $this->web['row'][$item_name] . " ]";
        }

        $this->web['listpage_url'] = base_url() . "/index.php/" . strtolower($this->_model) . "?token=" . $this->web['ip_address'];

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
        foreach ($this->{$this->model_name}->fields_insert as $key => $val) {
            $this->{$this->model_name}->fields_insert[$key] = (isset($this->web['request'][$key])) ? $this->web['request'][$key] : $val['value'];
        }
        $this->{$this->model_name}->fields_insert['status'] = (isset($this->web['request']['status'])) ? $this->web['request']['status'] : '0';
        $data = $this->{$this->model_name}->fields_insert;
        $id = $this->{$this->model_name}->save_record($id, $data);
        return $id;
    }

}
