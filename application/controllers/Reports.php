<?php

ini_set('display_errors', 1);

class Reports Extends Vect_Controller {

    public $web = array();
    private $model_name;
    private $_model;
    private $rules = array();
    private $other_model;

    public function __construct() {
        parent::__construct();
        $this->_model = 'users';
        $this->setModel($this->_model);
        $model = (string) $this->getModel();
        $this->web['request'] = $this->request;
        $this->web['months_arr'] = $this->months_arr;
        $this->model_name = $model;
        if ($this->load->model(trim($this->model_name))) {
            $this->web['view'] = 'reports';
            $this->web['ip_address'] = base64_encode($this->ip_address);
            $this->web['ajax_url_delete_item'] = $this->ajax_url_delete_item;
        } else {
            return false;
            die();
        }
        is_loggedin();
        $this->web['loggedin'] = $this->session->userdata['loggedin'];
        $this->web['model']['id'] = isset($this->web['request']['id']) ? base64_decode($this->web['request']['id']) : 0;
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
        $this->web['postdata']['sort_by'] = (isset($this->web['request']['sort_by'])) ? $this->web['request']['sort_by'] : $this->_model . '.first_name';
        $this->web['postdata']['order_type'] = (isset($this->web['request']['order_type'])) ? $this->web['request']['order_type'] : 'ASC';
        $this->web['search'][$this->_model . '.username'] = 'Employee code';
        $this->web['search'][$this->_model . '.first_name'] = 'Employee name';
        $this->web['search'][$this->_model . '.middle_name'] = 'Middle name';
        $this->web['search'][$this->_model . '.last_name'] = 'Last name';
        $this->web['search']['users_contacts.phone_no'] = 'Contact No.';
        $this->web['postdata']['listpage_url'] = (isset($this->web['request']['listpage_url'])) ? $this->web['request']['listpage_url'] : 'Dashboards';
        $this->web['listpage_url'] = $this->web['postdata']['listpage_url'];

        $this->loadMasters();
        $this->getManagers();
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
        $this->web['roles'] = $this->roles_model->getAllWithKeyValue();

        $this->load->model('documents_model');
        $this->web['documents'] = $this->documents_model->getAllWithKeyValue();
        $this->load->model('openings_model');
        $this->web['openings'] = $this->openings_model->getAllWithKeyValue();

        $this->load->model('skills_model');
        $this->web['skills'] = $this->skills_model->getAllWithKeyValue();
    }

    private function getManagers() {

        $this->{$this->model_name}->where[" users.is_archived "] = '0';
        $this->{$this->model_name}->where_in[" users.role_id "] = array('2','8','9');
        $rows = $this->{$this->model_name}->getAll();
        if (!empty($rows)) {
            foreach ($rows as $manager) {
                $this->web['managers'][$manager['id']] = $manager['first_name'] . " " . $manager['last_name'] . "(" . $manager['initial'] . ")";
            }
        }
        if (empty($rows)) {
            $this->web['managers'] = array('0' => 'Not available');
        }
    }

    private function setUrls() {
        $this->web['add_edit'] = base_url() . "index.php/" . $this->_model . "/add_edit?token=" . $this->web['ip_address'];
        $this->web['add_employee'] = base_url() . "index.php/" . $this->_model . "/addEmployee?token=" . $this->web['ip_address'];
        $this->web['add_candidate'] = base_url() . "index.php/" . $this->_model . "/addCandidate?token=" . $this->web['ip_address'];
        $this->web['view_employee_url'] = base_url() . "index.php/" . $this->_model . "/viewEmployeeDetail?token=" . $this->web['ip_address'];
        $this->web['view_candidate_url'] = base_url() . "index.php/" . $this->_model . "/viewCandidateDetail?token=" . $this->web['ip_address'];
        $this->web['add_new_btn'] = $this->add_new_btn;
        $this->web['listpage_url'] = base_url() . "index.php/" . $this->router->class . "/" . $this->router->method . "?token=" . $this->web['ip_address'];
        $this->web['ajax_url'] = $this->ajax_url;
        $this->web['ajax_url_save'] = $this->ajax_url . "/save_" . strtolower($this->_model) . "_data?token=" . $this->web['ip_address'];
        $this->web['ajax_url_skills'] = $this->ajax_url . "/get_skills_data?token=" . $this->web['ip_address'];
        $this->web['ajax_url_upload_pic'] = $this->ajax_url_upload_pic . "?token=" . $this->web['ip_address'];
    }

    public function index() {
        if ($this->checkAccessForModule($this->module_access_id) == false) {
            redirect('Dashboards/index');
        }
        $user_type = 'employee';
        $this->roles_accesses[$this->module_access_id]['add_button'] = str_replace(ucfirst($this->_model), $user_type, $this->roles_accesses[$this->module_access_id]['add_button']);
        $this->web['roles_accesses'] = null;
        if (in_array($this->session->userdata['loggedin']['role_id'], array('1', '2'))) {
            $this->web['roles_accesses'] = $this->roles_accesses[$this->module_access_id];
        }

        //$config = array('paths' => TWIG_TEMPLATE_PATH_ADMIN, 'cache' => APPPATH . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . 'cache');
        //$this->load->library('twig', $config);
        $this->setUrls();
        $this->initLoad();
        $this->web['search']['positions.position_name'] = 'Position';
        $this->web['search']['departments.department_name'] = 'Department';
        $this->web['search'][$this->_model . '.status'] = 'Status';
        $this->{$this->model_name}->where["users.is_archived"]= '0';
        $this->{$this->model_name}->where["users.user_type"] = 'employee' ; 
       
       
        if (isset($this->web['request']['search_by']) && $this->web['request']['search_by'] != '') {
            $this->{$this->model_name}->ci_where_like[$this->web['request']['search_by']] = $this->web['request']['search_for'];
            $this->{$this->model_name}->where["users.is_archived"]= '0';
            $this->{$this->model_name}->where["users.user_type"] = 'employee' ;  
        }else{
            $this->{$this->model_name}->where["users.is_archived"]= '0';
            $this->{$this->model_name}->where["users.user_type"] = 'employee' ;  
        }
        
        $result = $this->{$this->model_name}->getAll($this->web['postdata']['page'], $this->web['postdata']['limit'], array('sort_by' => $this->web['postdata']['sort_by'], 'order_type' => $this->web['postdata']['order_type']));
        if ($result) {
            $this->web['rows'] = $result;
        } else {
            $this->web['rows'] = array();
        }

        $this->web['total_records'] = $this->{$this->model_name}->total_records;
        $this->web['total_pages'] = $this->{$this->model_name}->total_pages;
        $this->web['total_records'] = $this->{$this->model_name}->total_records;
        $this->web['total_pages'] = $this->{$this->model_name}->total_pages;
        $this->web['model']['new'] = base64_encode(0);
        $this->web['section'][] = $this->web['view'] . DIRECTORY_SEPARATOR . 'index';
        $this->web['items'] = 'employees';
        $this->web['item'] = 'employee';
        $rand = rand(500, 10000);
        $this->web['edit_url'] = base_url() . "index.php/" . $this->_model . "/add_edit?token=" . $this->web['ip_address'];
        $this->general_model->load_my_view($this->web);
    }

    private function loadRequiredModels() {
        $this->load->model('users_addresses_model');
        $this->users_addresses_model->setCols();
        $this->load->model('users_contacts_model');
        $this->users_contacts_model->setCols();
        $this->load->model('users_documents_model');
        $this->users_documents_model->setCols();
        $this->load->model('users_educational_qualifications_model');
        $this->users_educational_qualifications_model->setCols();
        $this->load->model('users_employers_model');
        $this->users_employers_model->setCols();
        $this->load->model('users_emergency_contacts_model');
        $this->users_emergency_contacts_model->setCols();
        $this->load->model('users_family_model');
        $this->users_family_model->setCols();
        $this->load->model('users_id_proofs_model');
        $this->users_id_proofs_model->setCols();
        $this->load->model('users_interviews_model');
        $this->users_interviews_model->setCols();
        $this->load->model('users_officials_model');
        $this->users_officials_model->setCols();
        $this->load->model('users_personals_model');
        $this->users_personals_model->setCols();
        $this->load->model('users_positions_model');
        $this->users_positions_model->setCols();
        $this->load->model('users_references_model');
        $this->users_references_model->setCols();
        $this->load->model('users_technical_skills_model');
        $this->users_technical_skills_model->setCols();
        $this->load->model('users_applications_model');
        $this->users_applications_model->setCols();
        $this->load->model('users_training_centres_model');
        $this->users_training_centres_model->setCols();
    }

    public function getUsersPersonalsDetail() {
        $row = array();
        $this->load->model('users_personals_model');
        $this->users_personals_model->setCols();
        unset($this->users_personals_model->fields['id']);
        unset($this->users_personals_model->fields_pro['id']);
        if ($this->web['model']['id'] > 0) {
            $this->users_personals_model->where["users_personals.user_id"] = $this->web['model']['id'];
            $this->users_personals_model->where["users_personals.is_archived"]= '0';
            $rows = $this->users_personals_model->getAll(null, null, $this->users_personals_model->where);
        }

        if (isset($rows) && !empty($rows)) {
            $row = $rows[0];
            $row['dob'] = date('m/d/Y', strtotime($row['dob']));
        } else {
            $row = array_merge($row, $this->erase_val($this->users_personals_model->fields));
            $row['dob'] = date('m/d/Y', strtotime('-19 Years'));
        }
        if (isset($row['date_applied'])) {
            $row['date_applied'] = date('m/d/Y', strtotime($row['date_applied']));
        }
        return $row;
    }

    private function getUsersOfficialsDetail() {
        $row = array();
        $this->load->model('users_officials_model');
        unset($this->users_officials_model->fields['id']);
        unset($this->users_officials_model->fields_pro['id']);
        if ($this->web['model']['id'] > 0) {
            $this->users_officials_model->where["users_officials.user_id"] = $this->web['model']['id'];
            $this->users_officials_model->where["users_officials.is_archived"] = '0' ;
            $rows = $this->users_officials_model->getAll(null, null, $this->users_officials_model->where);
        }
        if (isset($rows) && !empty($rows)) {
            $row = array_merge($row, $rows[0]);
        } else {
            $row = array_merge($row, $this->erase_val($this->users_officials_model->fields));
            $row['joining_date'] = date('m/d/Y', strtotime('today'));
        }

        return $row;
    }

    private function getUsersContacts() {

        $this->load->model('users_contacts_model');
        unset($this->users_contacts_model->fields['id']);
        unset($this->users_contacts_model->fields_pro['id']);
        if ($this->web['model']['id'] > 0) {
            //$this->users_contacts_model->where[0] = "users_contacts.user_id=" . $this->web['model']['id'] . " AND is_archived = '0'  ";
            $this->users_contacts_model->where["users_contacts.user_id"] = $this->web['model']['id'] ;
            $this->users_contacts_model->where["users_contacts.is_archived"] = '0';
            $rows = $this->users_contacts_model->getAll(null, null, $this->users_contacts_model->where);
        }
        $row = (isset($rows[0])) ? $rows[0] : array();
        $row['users_contacts_id'] = (isset($row['users_contacts_id'])) ? $row['users_contacts_id'] : 0;
        $row['phone_no'] = (isset($row['phone_no'])) ? $row['phone_no'] : null;
        $row['mobile_1'] = (isset($row['mobile_1'])) ? $row['mobile_1'] : null;
        $row['mobile_2'] = (isset($row['mobile_2'])) ? $row['mobile_2'] : null;
        $row['extension'] = (isset($row['extension'])) ? $row['extension'] : null;

        return $row;
    }

    private function getUsersAddress() {
        $row = array();
        $this->load->model('users_addresses_model');
        unset($this->users_addresses_model->fields['id']);
        unset($this->users_addresses_model->fields_pro['id']);
        if ($this->web['model']['id'] > 0) {
            $this->users_addresses_model->where["users_addresses.user_id"]= $this->web['model']['id'];
            $this->users_addresses_model->where["users_addresses.is_archived"] = '0';
            $obAr = array('order_by' => 'sort_order', 'order_type' => 'ASC');
            $rows = $this->users_addresses_model->getAll(null, null, $this->users_addresses_model->where, $obAr);
        }
        if (!empty($rows) && isset($rows[0]) && count($rows[0])) {
            $row['primary']['users_addresses_id'] = $rows[0]['users_addresses_id'];
            $row['primary']['address'] = $rows[0]['address'];
            $row['primary']['country_id'] = $rows[0]['country_id'];
            $row['primary']['state_id'] = $rows[0]['state_id'];
            $row['primary']['state_name'] = $rows[0]['state_name'];
            $row['primary']['city_id'] = $rows[0]['city_id'];
            $row['primary']['city_name'] = $rows[0]['city_name'];
            $row['primary']['zipcode'] = $rows[0]['zipcode'];
            $row['primary']['country_icon'] = $rows[0]['country_icon'];
        } else {
            $row['primary']['users_addresses_id'] = 0;
            $row['primary']['address'] = null;
            $row['primary']['country_id'] = null;
            $row['primary']['state_id'] = null;
            $row['primary']['state_name'] = null;
            $row['primary']['city_id'] = null;
            $row['primary']['city_name'] = null;
            $row['primary']['zipcode'] = null;
            $row['primary']['country_icon'] = null;
        }
        if (isset($this->web['request']['user_type']) && $this->web['request']['user_type'] == 'candidate') {
            return $row;
        }
        if (!empty($rows) && isset($rows[1]) && count($rows[1])) {
            $row['temp']['users_addresses_id'] = $rows[1]['users_addresses_id'];
            $row['temp']['address'] = $rows[1]['address'];
            $row['temp']['country_id'] = $rows[1]['country_id'];
            $row['temp']['state_name'] = $rows[1]['state_name'];
            $row['temp']['state_id'] = $rows[1]['state_id'];
            $row['temp']['city_id'] = $rows[1]['city_id'];
            $row['temp']['city_name'] = $rows[1]['city_name'];
            $row['temp']['zipcode'] = $rows[1]['zipcode'];
            $row['temp']['country_icon'] = $rows[0]['country_icon'];
        } else {
            $row['temp']['users_addresses_id'] = 0;
            $row['temp']['address'] = null;
            $row['temp']['country_id'] = null;
            $row['temp']['state_id'] = null;
            $row['temp']['state_name'] = null;
            $row['temp']['city_id'] = null;
            $row['temp']['city_name'] = null;
            $row['temp']['zipcode'] = null;
            $row['temp']['country_icon'] = null;
        }
        return $row;
    }
}
