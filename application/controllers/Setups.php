<?php

ini_set('display_errors', 1);

class Setups Extends Vect_Controller {

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
        $this->loadMasters();
    }

    public function index() {
        //$config = array('paths' => TWIG_TEMPLATE_PATH_ADMIN, 'cache' => APPPATH . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . 'cache');
        //$this->load->library('twig', $config);
        $this->initLoad();
        $result = $this->{$this->model_name}->getAll(  $this->web['postdata']['page'], $this->web['postdata']['limit']);
        if ($result) {
            $this->web['rows'] = $result;
        } else {
            $this->web['rows'] = array();
        }
        $this->load->model('roles_model');
        $this->web['roles'] = $this->roles_model->getAllWithKeyValue();
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

    private function loadMasters() {

        $this->load->model('countries_model');
        $this->web['countries'] = $this->countries_model->getAllWithKeyValue();
        $this->load->model('states_model');
        $this->web['states'] = $this->states_model->getAllWithKeyValue();
        $this->load->model('cities_model');
        $this->web['cities'] = $this->cities_model->getAllWithKeyValue();
        $this->load->model('relations_model');
        $this->web['relations'] = $this->relations_model->getAllWithKeyValue();
        $this->load->model('educational_qualifications_model');
        $this->web['qualifications'] = $this->educational_qualifications_model->getAllWithKeyValue();
        $this->load->model('streams_model');
        $this->web['streams'] = $this->streams_model->getAllWithKeyValue();
        $this->load->model('departments_model');
        $this->web['departments'] = $this->departments_model->getAllWithKeyValue();
        $this->load->model('positions_model');
        $this->web['positions'] = $this->positions_model->getAllWithKeyValue();
        $this->load->model('roles_model');
        $this->web['user_roles'] = $this->roles_model->getAllWithKeyValue();

        $this->load->model('documents_model');
        $this->web['documents'] = $this->documents_model->getAllWithKeyValue();
        $this->web['openings'] = array('1' => 'Jr. PHP Developer', '2' => 'Sr. PHP Developer', '3' => 'Jr. Support Er.');
        $this->load->model('id_proofs_model');
        $this->web['id_proofs'] = $this->id_proofs_model->getAllWithKeyValue();
        $this->load->model('skills_model');
        $this->web['skills'] = $this->skills_model->getAllWithKeyValue();
        $this->load->model('questions_model');
        $this->web['questions'] = $this->questions_model->getAllWithKeyValue();

        $this->load->model('leave_types_model');
        $this->web['leave_types'] = $this->leave_types_model->getAllWithKeyValue();
    }

}
