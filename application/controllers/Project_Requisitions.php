<?php

ini_set('display_errors', 1);

class Project_Requisitions Extends Designandbuy_Controller {

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
            $this->web['items'] = (strpos(ucwords($this->_model), '_') !== false) ? str_replace('_', ' ', ucwords($this->_model)) : ucwords($this->_model);
            $this->web['item'] = ucwords($this->inflect->singularize($this->_model));
        } else {
            return false;
            die();
        }
        $this->web['ajax_url'] = $this->ajax_url;
        $this->web['ajax_save_url'] = $this->ajax_url . "/save_" . strtolower($this->_model) . "_data?token=" . $this->web['ip_address'];
        $this->web['ajax_url_delete_item'] = $this->ajax_url_delete_item . "?token=" . $this->web['ip_address'];
        $this->web['edit_url'] = $this->edit_url;
        $this->web['listpage_url'] = $this->listpage_url;
    }

    private function initLoad() {

        $this->load->model('projects_model');
        $this->web['projects'] = $this->projects_model->getAllWithKeyValue();
        $this->load->model('users_model');
        $this->web['users'] = $this->users_model->getAllWithKeyValue();
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
        $this->web['postdata']['sort_by'] = (isset($this->web['request']['sort_by'])) ? $this->web['request']['sort_by'] : $this->_model . '.project_requisition_name';
        $this->web['postdata']['order_type'] = (isset($this->web['request']['order_type'])) ? $this->web['request']['order_type'] : 'ASC';
        $this->web['search'][$this->_model . '.project_requisition_name'] = 'Requisition Name';
        $this->web['search']['projects.project_name'] = 'Project';
        $this->web['search'][$this->_model . '.status'] = 'Status';
        $this->web['search'][$this->_model . '.minimum_budget'] = 'Min. Budget';
        $this->web['search'][$this->_model . '.maximum_budget'] = 'Max. Budget';
        $this->web['search'][$this->_model . '.expected_date_of_fullfill'] = 'Expected Date of Required';
        $this->web['search'][$this->_model . '.authorized_person_id'] = 'Authorized Person';
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
        $this->web['roles_accesses'] = null;
        //if (in_array($this->session->userdata['loggedin']['role_id'], array('1', '2'))) {
          //  $this->web['roles_accesses'] = $this->roles_accesses[$this->module_access_id];
        //}
	  //echo $this->module_access_id; exit;
	   $this->web['roles_accesses'] = $this->roles_accesses[$this->module_access_id];	
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

            //$this->web['model']['where'] = $this->{$this->model_name}->where;
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
        $this->web['request']['expected_date_of_fullfill'] = (isset($this->web['request']['expected_date_of_fullfill'])) ? date('Y:m:d h:i:s', strtotime($this->web['request']['expected_date_of_fullfill'])) : date('Y:m:d h:i:s');
        $this->web['request']['estimated_date_of_longlast'] = (isset($this->web['request']['estimated_date_of_longlast'])) ? date('Y:m:d h:i:s', strtotime($this->web['request']['estimated_date_of_longlast'])) : date('Y:m:d h:i:s', strtotime('+1 month'));
        foreach ($this->{$this->model_name}->fields_insert as $key => $val) {
            $this->{$this->model_name}->fields_insert[$key] = (isset($this->web['request'][$key])) ? $this->web['request'][$key] : $val['value'];
        }
        $token = rand(5000, 100000);
        $data = $this->{$this->model_name}->fields_insert;
        $data['token'] = $token;
        $id = $this->{$this->model_name}->save_record($id, $data);
        $last_insert_id = $this->{$this->model_name}->last_insert_id;
        if ($id) {
            $query = 'task=view_request&id=' . $last_insert_id . '&manager=' . $this->web['request']['authorized_person_id'] . '&call_action=pending_request&next_status=approve_request&applicant_id=' . $this->session->userdata['loggedin']['id'] . '&token=' . $token;
            $link = $query;
            $this->sendNewRequisitionMail($link);
        }
        return $id;
    }

    private function sendNewRequisitionMail($link) {
        //$from = $this->getAdminEmailID();
        $from = 'admin@bimsym.com';
        $this->load->model('users_model');
        $manager = $this->users_model->getById($this->web['request']['authorized_person_id']);
        if (empty($manager)) {
            return false;
        }
        $to = $manager['official_email'];
        $reporting_manager = $manager['first_name'] . " " . $manager['last_name'];
        $required_date = date('M, d, Y', strtotime($this->web['request']['expected_date_of_fullfill']));
        $longlast = date('M, d, Y', strtotime($this->web['request']['estimated_date_of_longlast']));
        $project_name = $this->web['projects'][$this->web['request']['project_id']];
        $checklist = $this->web['request']['require_check_list'];
        $recommendation = $this->web['request']['recommendation'];
        $special_note = $this->web['request']['special_note'];
        $applicant = $this->session->userdata['loggedin']['first_name'] . " " . $this->session->userdata['loggedin']['middle_name'] . " " . $this->session->userdata['loggedin']['last_name'];
        if ($from) {
            $subject = 'New Requisition for  ' . $project_name . ' From ' . $applicant . ' :: BimSym HR  Management';
            $body = '';
            $body .= '<p> Dear ' . $reporting_manager . ', </p>';
            $body .= '<p> ' . $applicant . ' has created a requisition of ' . $this->web['request']['project_requisition_name'] . '. </p>';
            $body .= '<p> <b>Employee Code :</b> ' . $this->session->userdata['loggedin']['username'] . ' </p>';
            $body .= '<p> </p>';
            $body .= '<p> <b>Required Unit</b> :' . $this->web['request']['no_of_units'] . '. </p>';
            $body .= '<p> <b>Project Name :</b> ' . $project_name . ' </p>';
            $body .= '<p> <b>Required Date :</b> ' . $required_date . ' </p>';
            $body .= '<p> <b>Estimated Date of Long Last :</b> ' . $longlast . ' </p>';
            $body .= '<p> <b>Checklist  :</b> </p>';
            $body .= '<p> &nbsp;&nbsp;&nbsp;' . $checklist . ' </p>';
            $body .= '<p> <b>Recommendation  :</b> </p>';
            $body .= '<p> &nbsp;&nbsp;&nbsp;' . $recommendation . ' </p>';
            $body .= '<p> <b>Special Note :</b> </p>';
            $body .= '<p> &nbsp;&nbsp;&nbsp;' . $special_note . ' </p>';
            $body .= '<p> Please click <a href="' . base_url() . 'index.php/Login/autoLoginAndRedirect?q=' . base64_encode($link) . '" target="_blank"> here </a> to view detail.</p>';
            $body .= '<p>&nbsp;</p>';
            $body .= '<p>&nbsp;</p>';
            $body .= '<p>&nbsp;</p>';
            $body .= '<p> Thank you, </p>';
            $body .= '<p> Team BimSym HR Management. </p>';
            if ($this->sendEmail(trim($to), $from, $subject, $body)) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

}
