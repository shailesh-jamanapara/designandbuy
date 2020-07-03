<?php

ini_set('display_errors', 1);

class Users Extends Designandbuy_Controller {

    public $web = array();
    private $model_name;
    private $_model;
    private $rules = array();
    private $other_model;

    public function __construct() {
        parent::__construct();
        $this->_model = strtolower(__CLASS__);
        $this->setModel($this->_model);
        $model = (string) $this->getModel();
        $this->web['request'] = $this->request;
        $this->web['months_arr'] = $this->months_arr;
        $this->model_name = $model;
        if ($this->load->model(trim($this->model_name))) {
            $this->web['view'] = $this->{$this->model_name}->getView();
            $this->web['ip_address'] = base64_encode($this->ip_address);
            $this->web['ajax_url_delete_item'] = $this->ajax_url_delete_item;
        } else {
            return false;
            die();
        }
        //is_loggedin();
        $this->web['loggedin'] = $this->session->userdata['loggedin'];
        $this->web['model']['id'] = isset($this->web['request']['id']) ? base64_decode($this->web['request']['id']) : 0;
	   $this->web['apply_leave_url'] = base_url().'index.php/Leave_Applications/add_edit';	
    }

    private function initLoad() {
        if (isset($this->web['request']['reset']) && $this->web['request']['reset'] == 'reset') {
            unset($this->web['request']['search_by']);
            unset($this->web['request']['search_for']);
        }
        $this->web['postdata']['view_type'] = (isset($this->web['request']['view_type'])) ? $this->web['request']['view_type'] : 'grid';
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

        $this->{$this->model_name}->ci_where["users.is_archived"] = '0';
        $this->{$this->model_name}->ci_where_in["users.role_id"] = array('1','2','3','4','6','7','8','10');
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
        redirect("users/list_employees");
    }

    public function add_edit() {

        $this->web['postdata']['task'] = (isset($this->web['request']['task'])) ? $this->web['request']['task'] : '';
        //Starts to save data on form submit
        if ($this->web['postdata']['task'] == 'save') {
            if ($this->web['request']['user_type'] == 'employee') {
                $response = $this->save(); // getting last user id on new insert 
                redirect($this->url_users);
            }
            if ($this->web['request']['user_type'] == 'candidate') {
                $response = $this->saveCandidatesData(); // getting last user id on new insert 
                if ($response)
                    redirect($this->web['postdata']['listpage_url']);
                else
                    exit('here 2');
            }
        }
        //Ends to save data on form submit
        if (isset($this->web['request']['user_type'])) {
            if ($this->web['request']['user_type'] == 'employee') {
                $this->addEmployee();
            }
            if ($this->web['request']['user_type'] == 'candidate') {
                $this->addCandidate();
            }
        }
    }

    public function list_employees() {

        if ($this->checkAccessForModule($this->module_access_id) == false) {
            redirect('Dashboards/index');
        }
        $user_type = 'employee';
        //$this->roles_accesses[$this->module_access_id]['add_button'] = str_replace( ucfirst($this->_model), $user_type, $this->roles_accesses[$this->module_access_id]['add_button']);
        $this->web['roles_accesses'] = null;
        if (in_array($this->session->userdata['loggedin']['role_id'], array('1', '2'))) {
            $this->web['roles_accesses'] = $this->roles_accesses[$this->module_access_id];
        }

        ////$config = array('paths' => TWIG_TEMPLATE_PATH_ADMIN, 'cache' => APPPATH . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . 'cache');
        ////$this->load->library('twig', $config);
        $this->setUrls();
        $this->initLoad();
        $this->web['search']['positions.position_name'] = 'Position';
        $this->web['search']['departments.department_name'] = 'Department';
        $this->web['search'][$this->_model . '.status'] = 'Status';
        $this->{$this->model_name}->ci_where["users.is_archived"] = '0';
        $this->{$this->model_name}->ci_where["users.user_type"] = 'employee';
        if (isset($this->web['request']['search_by']) && $this->web['request']['search_by'] != '') {
            $this->{$this->model_name}->ci_where_like[$this->web['request']['search_by']] = $this->web['request']['search_for'];
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
        $this->web['section'][] = $this->web['view'] . DIRECTORY_SEPARATOR . 'list';
        $this->web['items'] = 'employees';
        $this->web['item'] = 'employee';
        $rand = rand(500, 10000);
        $this->web['edit_url'] = base_url() . "index.php/" . $this->_model . "/add_edit?token=" . $this->web['ip_address'];
        $this->general_model->load_my_view($this->web);
    }

    public function my_profile() {
        $user_type = 'employee';
        $my_acceses = array();
	   $this->web['mode'] = 'self';	
	   $this->web['listpage_url'] = base_url().'/users/my_profile';	
        foreach ($this->roles_accesses as $roles_access) {
            if (
                    isset($roles_access['module_controller']) &&
                    ( array_key_exists($roles_access['module_controller'], $this->{$this->model_name}->table_properties['has_many']) || array_key_exists($roles_access['module_controller'], $this->{$this->model_name}->table_properties['has_one']) || array_key_exists($roles_access['module_controller'], $this->{$this->model_name}->table_properties['belongs_to']))
            ) {
                $my_acceses[$roles_access['module_controller']] = $roles_access;
            }
        }

        $this->web['request']['task'] = 'view_only';
        $this->web['request']['user_type'] = 'employee';
        $this->web['my_acceses'] = $my_acceses;
        $this->web['request']['id'] = base64_encode($this->session->userdata['loggedin']['id']);
        $this->setUrls();
        $this->initLoad();
        $this->getQualificationsTypes();
        $user = $this->{$this->model_name}->getById($this->web['model']['id']);
        if (!empty($user)) {
            $this->web['row'] = $user; //array_merge($this->web['row'], $user ) ;		
        }
        $rows = $this->getUsersIdProofs();
        $this->web['row']['users_positions_id'] = (isset($this->web['row']['users_positions_id'])) ? $this->web['row']['users_positions_id'] : 0;
        // Users contacts numbers 
        $this->web['row'] = array_merge($this->web['row'], $this->getUsersAddress());
        $this->web['row'] = array_merge($this->web['row'], $this->getUsersContacts());

        $this->web['row'] = array_merge($this->web['row'], $this->getUsersEmergencyContacts());
        $this->web['row'] = array_merge($this->web['row'], $this->getUsersEmployers());
        $this->web['row'] = array_merge($this->web['row'], $this->getUsersFamily());
        $this->web['row'] = array_merge($this->web['row'], $this->getUsersDocuments());
        $this->web['row'] = array_merge($this->web['row'], $this->getUsersOfficialsDetail());
        $this->web['row'] = array_merge($this->web['row'], $this->getUsersPersonalsDetail());
        $this->web['row'] = array_merge($this->web['row'], $this->usersEducationalQualifications());
        $this->web['row'] = array_merge($this->web['row'], $this->getUsersReferences());

        $this->web['row'] = (empty($rows)) ? array_merge($this->web['row'], $this->erase_val($this->users_id_proofs_model->fields)) : array_merge($this->web['row'], $rows[0]);
        $this->web['row'] = array_merge($this->web['row'], $this->getUsersFamily());
        $this->web['items'] = 'employees';
        $this->web['item'] = 'employee';
        //$this->web['section'][] = $this->web['view'].DIRECTORY_SEPARATOR.'emp_menu_view';
        $this->web['section'][] = $this->web['view'] . DIRECTORY_SEPARATOR . 'my_profile';
        $this->web['data_bv'] = $this->setDataBvToField($this->getBootsrtapValidations());
        //echo "<pre>";
        //print_r($this->web['row'] ); 
        //exit;
        $this->general_model->load_my_view($this->web);
    }

    public function addEmployee() {
        $this->setUrls();
        $this->initLoad();
        $this->loadRequiredModels();
        $this->web['postdata']['task'] = (isset($this->web['request']['task'])) ? $this->web['request']['task'] : '';
        //Starts to save data on form submit
        if ($this->web['postdata']['task'] == 'save') {
            
        }
        //$this->web['section'][] = $this->web['view'].DIRECTORY_SEPARATOR.'emp_menu';	
        $this->web['section'][] = $this->web['view'] . DIRECTORY_SEPARATOR . 'addEmployee';
        $this->web['data_bv'] = $this->setDataBvToField($this->getBootsrtapValidations());

        $this->web['model']['id'] = base64_encode($this->web['model']['id']);
        $this->general_model->load_my_view($this->web);
    }

    public function addCandidate() {
        $this->setUrls();
        $this->initLoad();
        $this->loadRequiredModels();
        $this->web['postdata']['task'] = (isset($this->web['request']['task'])) ? $this->web['request']['task'] : '';
        //Starts to save data on form submit
        if ($this->web['postdata']['task'] == 'save') {
            $response = $this->save(); // getting last user id on new insert 
            redirect($this->web['postdata']['listpage_url']);
        }
        //$this->web['section'][] = $this->web['view'].DIRECTORY_SEPARATOR.'emp_menu';	
        $this->web['section'][] = $this->web['view'] . DIRECTORY_SEPARATOR . 'addCandidate';
        $this->web['data_bv'] = $this->setDataBvToField($this->getBootsrtapValidations());
        $this->web['model']['id'] = base64_encode($this->web['model']['id']);
        $this->general_model->load_my_view($this->web);
    }

    public function viewEmployeeDetail() {
        $this->setUrls();
        $this->initLoad();
        $this->getQualificationsTypes();
        $user = $this->{$this->model_name}->getById($this->web['model']['id']);
        if (!empty($user)) {
            $this->web['row'] = $user; //array_merge($this->web['row'], $user ) ;		
        }
        $rows = $this->getUsersIdProofs();
        $this->web['row']['users_positions_id'] = (isset($this->web['row']['users_positions_id'])) ? $this->web['row']['users_positions_id'] : 0;
        // Users contacts numbers 
        $this->web['row'] = array_merge($this->web['row'], $this->getUsersAddress());
        $this->web['row'] = array_merge($this->web['row'], $this->getUsersContacts());

        $this->web['row'] = array_merge($this->web['row'], $this->getUsersEmergencyContacts());
        $this->web['row'] = array_merge($this->web['row'], $this->getUsersEmployers());
        $this->web['row'] = array_merge($this->web['row'], $this->getUsersFamily());
        $this->web['row'] = array_merge($this->web['row'], $this->getUsersDocuments());
        $this->web['row'] = array_merge($this->web['row'], $this->getUsersOfficialsDetail());
        $this->web['row'] = array_merge($this->web['row'], $this->usersEducationalQualifications());
        $this->web['row'] = array_merge($this->web['row'], $this->getUsersPersonalsDetail());
        $this->web['row'] = array_merge($this->web['row'], $this->getUsersReferences());
        $this->web['row'] = array_merge($this->web['row'], $this->getUserProfileInfo());
        $this->web['row'] = (empty($rows)) ? array_merge($this->web['row'], $this->erase_val($this->users_id_proofs_model->fields)) : array_merge($this->web['row'], $rows[0]);
        $this->web['items'] = 'employees';
        $this->web['item'] = 'employee';
        $this->web['user_type'] = 'employee';
        //$this->web['section'][] = $this->web['view'].DIRECTORY_SEPARATOR.'emp_menu_view';
        $this->web['section'][] = $this->web['view'] . DIRECTORY_SEPARATOR . 'view_detail';
        $this->web['data_bv'] = $this->setDataBvToField($this->getBootsrtapValidations());
	   $employee_record_accesses = $this->getEmployRecordAccess();
	   $this->web['employee_record_accesses'] = $employee_record_accesses;
	   //echo "<pre>";  print_r($employee_record_accesses);echo "</pre>";  exit;
        $this->general_model->load_my_view($this->web);
    }

    public function viewCandidateDetail() {
        $this->setUrls();
        $this->initLoad();

        $user = $this->{$this->model_name}->getById($this->web['model']['id']);
        if (!empty($user)) {
            $this->web['row'] = $user; //array_merge($this->web['row'], $user ) ;		
        }
        $rows = $this->getUsersIdProofs();
        $this->web['row']['users_positions_id'] = (isset($this->web['row']['users_positions_id'])) ? $this->web['row']['users_positions_id'] : 0;
        // Users contacts numbers 
        $this->web['row'] = array_merge($this->web['row'], $this->getUsersAddress());
        $this->web['row'] = array_merge($this->web['row'], $this->getUsersContacts());

        //$this->web['row'] = array_merge($this->web['row'], $this->getUsersEmergencyContacts());
        $this->web['row'] = array_merge($this->web['row'], $this->getUsersEmployers());
        //$this->web['row'] = array_merge($this->web['row'], $this->getUsersFamily());	
        //$this->web['row'] = array_merge($this->web['row'], $this->getUsersIdProofs());	
        //$this->web['row'] = array_merge($this->web['row'], $this->getUsersOfficialsDetail());	
        $this->web['row'] = array_merge($this->web['row'], $this->usersEducationalQualifications());
        $this->web['row'] = array_merge($this->web['row'], $this->getUsersPersonalsDetail());
        $this->web['row'] = array_merge($this->web['row'], $this->getUsersReferences());

        $this->web['row'] = (empty($rows)) ? array_merge($this->web['row'], $this->erase_val($this->users_id_proofs_model->fields)) : array_merge($this->web['row'], $rows[0]);
        //$this->web['section'][] = $this->web['view'].DIRECTORY_SEPARATOR.'emp_menu_view';
        $this->web['section'][] = $this->web['view'] . DIRECTORY_SEPARATOR . 'view_candidate';
        $this->web['data_bv'] = $this->setDataBvToField($this->getBootsrtapValidations());
        //echo "<pre>";
        //print_r($this->web['row'] ); 
        //exit;
        $this->general_model->load_my_view($this->web);
    }

    public function dashboard() {
        $this->initLoad();
        $this->web['section'][] = $this->web['view'] . DIRECTORY_SEPARATOR . 'list';
    }

    public function list_candidates() {
        $user_type = 'candidate';
        $this->roles_accesses[$this->module_access_id]['add_button'] = str_replace(ucfirst($this->_model), $user_type, $this->roles_accesses[$this->module_access_id]['add_button']);
        $this->web['roles_accesses'] = $this->roles_accesses[$this->module_access_id];
        //$config = array('paths' => TWIG_TEMPLATE_PATH_ADMIN, 'cache' => APPPATH . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . 'cache');
        //$this->load->library('twig', $config);
        $this->setUrls();
        $this->initLoad();
        $this->web['search']['positions.position_name'] = 'Position';
        $this->web['search'][$this->_model . '.status'] = 'Status';

        $obArr['order_by'] = $this->_model . "." . $this->inflect->singularize($this->_model) . '_name';
        $obArr['order_by'] = $this->_model . ".id";
        $obArr['order_type'] = 'DESC';
        $this->{$this->model_name}->table_properties['join_tables'][] = array('users_addresses', 'users_addresses.user_id = ' . $this->_model . '.id AND users_addresses.address_type_id = 1', 'left');
        $this->{$this->model_name}->table_properties['join_tables'][] = array('cities', 'cities.id = users_addresses.city_id AND users_addresses.address_type_id = 1', 'left');
        $this->{$this->model_name}->table_properties['join_tables'][] = array('states', 'states.id = users_addresses.state_id AND users_addresses.address_type_id = 1', 'left');
        $this->{$this->model_name}->table_properties['join_tables'][] = array('users_personals', 'users_personals.user_id = ' . $this->_model . '.id ', 'left');
        $this->{$this->model_name}->table_properties['cross_fields']['address'] = array(
            'caption' => array('Address', 'Address', 'Address  of Employee'),
            'type' => 'varchar',
            'len' => 100,
            'value' => null,
            'in_select' => 1,
            'in_insert' => 0,
            'modified' => ' users_addresses.address as address'
        );
        $this->{$this->model_name}->table_properties['cross_fields']['city_name'] = array(
            'caption' => array('city', 'city', 'city  of Employee'),
            'type' => 'varchar',
            'len' => 100,
            'value' => null,
            'in_select' => 1,
            'in_insert' => 0,
            'modified' => ' cities.city_name as city_name'
        );
        $this->{$this->model_name}->table_properties['cross_fields']['state'] = array(
            'caption' => array('state', 'state', 'state  of Employee'),
            'type' => 'varchar',
            'len' => 100,
            'value' => null,
            'in_select' => 1,
            'in_insert' => 0,
            'modified' => ' states.state_name as state_name'
        );

        $this->{$this->model_name}->setCols();
        $this->{$this->model_name}->setJoins();
        
        if (isset($this->web['request']['search_by']) && $this->web['request']['search_by'] != '') {
                $this->{$this->model_name}->ci_where_like[$this->web['request']['search_by']] =  $this->web['request']['search_for'];
                $this->{$this->model_name}->ci_where['users.is_archived'] = '0';
                $this->{$this->model_name}->ci_where['users.user_type'] = 'candidate';
        }else{
                $this->{$this->model_name}->ci_where['users.is_archived'] = '0';
                $this->{$this->model_name}->ci_where['users.user_type'] = 'candidate'; 
        }
        $result = $this->{$this->model_name}->getAll();
        if ($result) {
            $this->web['rows'] = $result;
        } else {
            $this->web['rows'] = array();
        }
        $this->web['items'] = 'candidates';
        $this->web['item'] = 'candidate';
        $this->web['model']['new'] = base64_encode(0);
        $this->web['view_url'] = base_url() . "index.php/" . $this->_model . "/view_candidate?token=" . $this->web['ip_address'];
        $this->web['section'][] = $this->web['view'] . DIRECTORY_SEPARATOR . 'list_candidates';
        $rand = rand(500, 10000);
        $this->general_model->load_my_view($this->web);
    }

    private function loadRequiredModels() {
        $this->load->model('users_addresses_model');
        $this->load->model('users_contacts_model');
        $this->load->model('users_documents_model');
        $this->load->model('users_educational_qualifications_model');
        $this->load->model('users_employers_model');
        $this->load->model('users_emergency_contacts_model');
        $this->load->model('users_family_model');
        $this->load->model('users_id_proofs_model');
        $this->load->model('users_interviews_model');
        $this->load->model('users_officials_model');
        $this->load->model('users_personals_model');
        $this->load->model('users_positions_model');
        $this->load->model('users_references_model');
        $this->load->model('users_technical_skills_model');
        $this->load->model('users_applications_model');
        $this->load->model('users_training_centres_model');
    }

    private function save() {
        $return = array();
        if (isset($this->web['request']['id'])) {
            $this->web['request']['id'] = base64_decode($this->web['request']['id']);
        }
        $this->loadRequiredModels();
        // Saving data when user is employee
        if ($this->web['request']['user_type'] == 'employee') {
            // Saving basic data
            $id = $this->web['request']['id'];
            $this->web['request']['is_archived'] = '0';
            $this->web['request']['role_id'] = 1;
            $this->web['request']['created_at'] = date('y:m:d h:i:s');
            $this->web['request']['created_by'] = $this->session->userdata['loggedin']['id'];
            $this->web['request']['status'] = '1';
            $password = strtolower(str_replace(' ', '', trim($this->web['request']['first_name']))) . '@123';
            $this->web['request']['password'] = md5($password);
            $this->{$this->model_name}->setCols();
            foreach ($this->{$this->model_name}->fields_insert as $key => $val)
                $this->{$this->model_name}->fields_insert[$key] = (isset($this->web['request'][$key])) ? $this->web['request'][$key] : $val['value'];
            $data = $this->{$this->model_name}->fields_insert;
            $id = ( $this->{$this->model_name}->save_record($id, $data) ) ? $this->{$this->model_name}->last_insert_id : false;
            if ($id == false)
                return array('status' => 'FALSE', 'message' => 'Employee data could not be saved');
            //Saving users personal data
            $user_email = $this->web['request']['official_email'];
            $login_code = $this->web['request']['username'];
            $user_name = $this->web['request']['title'] . " " . $this->web['request']['first_name'] . " " . $this->web['request']['last_name'];
            $this->sendSignUpEmail($user_name, $user_email, $login_code, $password);
            $this->web['request']['user_id'] = $id;
            if ($this->saveUsersPersonalsData() == false)
                return false;
            if ($this->saveUsersContactsData() == false)
                return false;
            if ($this->saveUsersPositionsData() == false)
                return false;
            if ($this->saveUsersIdProofsData() == false)
                return false;
            if ($this->saveUsersOfficialsData() == false)
                return false;
        }
        if ($id == false) {
            return false;
        }
        return true;
    }

    public function view_profile() {
        if (!isset($this->web['request']['id']) || (isset($this->web['request']['id']) && is_numeric($this->web['request']['id']))) {
            redirect('Dashboards/index');
        }

        $this->web['model']['id'] = base64_decode($this->web['request']['id']);
        $user = $this->{$this->model_name}->getById($this->web['model']['id']);
        if (!empty($user)) {
            $this->web['row'] = $user; //array_merge($this->web['row'], $user ) ;		
        }
        if (isset($this->web['request']['user_type']) && $this->web['request']['user_type'] == 'candidate') {
            //$this->web['section'][] = $this->web['view'].DIRECTORY_SEPARATOR.'emp_menu_view';
            $this->web['section'][] = $this->web['view'] . DIRECTORY_SEPARATOR . 'view_candidate';
        }
        if (isset($this->web['request']['user_type']) && $this->web['request']['user_type'] == 'employee') {
            //$this->web['section'][] = $this->web['view'].DIRECTORY_SEPARATOR.'emp_menu_view';
            $this->web['section'][] = $this->web['view'] . DIRECTORY_SEPARATOR . 'view_detail';
        }
        $rand = rand(500, 10000);
        $this->general_model->load_my_view($this->web);
    }

    public function getUsersPersonalsDetail() {
        $row = array();
        $this->load->model('users_personals_model');
        unset($this->users_personals_model->fields['id']);
        unset($this->users_personals_model->fields_pro['id']);
        if ($this->web['model']['id'] > 0) {
            $this->users_personals_model->ci_where["users_personals.user_id"]=$this->web['model']['id'];
            $this->users_personals_model->ci_where["users_personals.is_archived"] = '0';
            $rows = $this->users_personals_model->getAll();
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
            $this->users_officials_model->ci_where["users_officials.user_id"]=$this->web['model']['id']; 
            $this->users_officials_model->ci_where["users_officials.is_archived"] = '0';
            $rows = $this->users_officials_model->getAll();
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
            $this->users_contacts_model->ci_where["users_contacts.user_id"] =  $this->web['model']['id'];
            $this->users_contacts_model->ci_where["users_contacts.is_archived"] = '0';
            $rows = $this->users_contacts_model->getAll();
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
            $this->users_addresses_model->ci_where["users_addresses.user_id"] = $this->web['model']['id'];
            $this->users_addresses_model->ci_where["users_addresses.is_archived"] = '0';
            $obAr = array('order_by' => 'sort_order', 'order_type' => 'ASC');
            $rows = $this->users_addresses_model->getAll();
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

    private function getUsersEmergencyContacts() {
        $row = array();
        $this->load->model('users_emergency_contacts_model');
        unset($this->users_emergency_contacts_model->fields['id']);
        unset($this->users_emergency_contacts_model->fields_pro['id']);
        if ($this->web['model']['id'] > 0) {
            $this->users_emergency_contacts_model->ci_where["users_emergency_contacts.user_id"] = $this->web['model']['id'];
            $this->users_emergency_contacts_model->ci_where["users_emergency_contacts.is_archived !="] = '1'; 
            $obAr = array('order_by' => 'id', 'order_type' => 'ASC');
            $rows = $this->users_emergency_contacts_model->getAll(null, null, $obAr);
        }
        if (isset($rows) && count($rows) > 0) {
            $i = 1;
            foreach ($rows as $emergency) {
                $row[$i] = $emergency;
                $i++;
            }
        }
        return array('emergency' => $row);
    }

    private function getUsersReferences() {
        // References contacts
        $row = array();
        $this->load->model('users_references_model');
        for ($a = 1; $a < 4; $a++) {
            $row['references'][$a]['users_references_id'] = 0;
            $row['references'][$a]['title'] = null;
            $row['references'][$a]['full_name'] = null;
            $row['references'][$a]['designation'] = null;
            $row['references'][$a]['contact_no'] = null;
        }
        unset($this->users_references_model->fields['id']);
        unset($this->users_references_model->fields_pro['id']);
        if ($this->web['model']['id'] > 0) {
            $this->users_references_model->ci_where["users_references.user_id"] =  $this->web['model']['id'];
            $obAr = array('order_by' => 'sort_order', 'order_type' => 'ASC');
            $rows = $this->users_references_model->getAll(null, null, $obAr);
        }
        if (isset($rows) && count($rows) > 0) {
            $a = 1;
            foreach ($rows as $_reference) {
                $row['references'][$a] = $_reference;
                $a++;
            }
        }
        return $row;
    }

    private function getUsersIdProofs() {
        $rows = array();
        $this->load->model('users_id_proofs_model');
        unset($this->users_id_proofs_model->fields['id']);
        unset($this->users_id_proofs_model->fields_pro['id']);
        unset($this->users_id_proofs_model->fields['created_by']);
        unset($this->users_id_proofs_model->fields_pro['created_by']);
        unset($this->users_id_proofs_model->fields['created_at']);
        unset($this->users_id_proofs_model->fields_pro['created_at']);
        if ($this->web['model']['id'] > 0) {
            $this->users_id_proofs_model->ci_where["users_id_proofs.user_id"] =  $this->web['model']['id'];
            $rows = $this->users_id_proofs_model->getAll(null, null);
        }
        return $rows;
    }

    private function getUsersEmployers() {
        $row = array();
        $this->load->model('users_employers_model');
        unset($this->users_employers_model->fields['id']);
        unset($this->users_employers_model->fields_pro['id']);
        if ($this->web['model']['id'] > 0) {
            $this->users_employers_model->ci_where["users_employers.user_id"] =  $this->web['model']['id'];
            $obAr = array('order_by' => 'sort_order', 'order_type' => 'ASC');
            $rows = $this->users_employers_model->getAll(null, null, $obAr);
        }
        if (isset($rows) && count($rows) > 0) {
            unset($row['users_employers']);
            foreach ($rows as $employer) {
                $row['users_employers'][$employer['users_employers_id']] = $employer;
            }
        }
        return $row;
    }

    private function getUsersFamily() {
        $row = array();
        $this->load->model('users_family_model');
        unset($this->users_family_model->fields['id']);
        unset($this->users_family_model->fields_pro['id']);
        $this->users_family_model->ci_where["users_family.user_id"] = $this->web['model']['id']; 
        $this->users_family_model->ci_where["users_family.is_archived !="] = '1';
        $rows = $this->users_family_model->getAll(null, null);
        if (count($rows) > 0) {
            foreach ($rows as $family) {
                $row[$family['users_family_id']] = $family;
            }
        }
        return array('family' => $row);
    }

    private function getUsersDocuments() {
        $row = array();
        /* Starts getting users documents */
        $this->load->model('users_documents_model');
        //unset($this->users_documents_model->fields['id']);
        //unset($this->users_documents_model->fields_pro['id']);
        $this->users_documents_model->ci_where["users_documents.user_id"] = $this->web['model']['id'];
        $obAr = array('order_by' => 'id', 'order_type' => 'ASC');
        $rows = $this->users_documents_model->getAll();
        if (count($rows) > 0) {
            foreach ($rows as $document) {
                $row['documents'][] = $document;
            }
        }
        return $row;
    }

    private function usersEducationalQualifications() {
        $row = array();
        $this->load->model('users_educational_qualifications_model');
        //unset($this->users_educational_qualifications_model->fields['id']);
        //unset($this->users_educational_qualifications_model->fields_pro['id']);
        $this->users_educational_qualifications_model->ci_where["users_educational_qualifications.user_id"] =  $this->web['model']['id'];
        $this->users_educational_qualifications_model->ci_where["users_educational_qualifications.is_archived !="] = '1';
        $obAr = array('order_by' => 'id', 'order_type' => 'ASC');
        $rows = $this->users_educational_qualifications_model->getAll();
        if (count($rows) > 0) {
            foreach ($rows as $qualification) {
                $row['qualifications'][] = $qualification;
            }
        }
        return $row;
    }

    private function getBootsrtapValidations() {
        $fields_arr = array();
        if ($this->web['request']['user_type'] == 'employee') {
            $this->loadRequiredModels();
            $fields_arr = array_merge($fields_arr, $this->{$this->model_name}->fields_pro);
            $fields_arr = array_merge($fields_arr, $this->users_personals_model->fields_pro);
            $fields_arr = array_merge($fields_arr, $this->users_officials_model->fields_pro);
            $fields_arr = array_merge($fields_arr, $this->users_positions_model->fields_pro);
            $fields_arr = array_merge($fields_arr, $this->users_addresses_model->fields_pro);
            $fields_arr = array_merge($fields_arr, $this->users_contacts_model->fields_pro);
            $fields_arr = array_merge($fields_arr, $this->users_emergency_contacts_model->fields_pro);
            $fields_arr = array_merge($fields_arr, $this->users_family_model->fields_pro);
            $fields_arr = array_merge($fields_arr, $this->users_references_model->fields_pro);
            $fields_arr = array_merge($fields_arr, $this->users_id_proofs_model->fields_pro);
            $fields_arr = array_merge($fields_arr, $this->users_technical_skills_model->fields_pro);
        }
        return $fields_arr;
    }

    private function saveUsersPersonalsData() {
        $this->web['request']['dob'] = date('Y:m:d', strtotime($this->web['request']['dob']));
        if (isset($this->web['request']['date_of_exit'])) {
            $this->web['request']['date_of_exit'] = date('Y:m:d', strtotime($this->web['request']['date_of_exit']));
        }
        
        foreach ($this->users_personals_model->fields_insert as $key => $val) {
            if (isset($this->web['request'][$key])) {
                $this->users_personals_model->fields_insert[$key] = $this->web['request'][$key];
            }
        }
        unset($this->users_personals_model->fields_insert['users_personals_id']);
        return ( $this->users_personals_model->save_record(0, $this->users_personals_model->fields_insert) ) ? true : false;
    }

    private function saveUsersOfficialsData() {
        $this->web['request']['joining_date'] = date('Y:m:d', strtotime($this->web['request']['joining_date']));
        $this->web['request']['bond_to_date	'] = date('Y:m:d', strtotime($this->web['request']['bond_to_date']));
        $this->web['request']['date_of_exit'] = date('Y:m:d', strtotime($this->web['request']['date_of_exit']));
        $this->load->model('users_officials_model');

        foreach ($this->users_officials_model->fields_insert as $key => $val) {
            if (isset($this->web['request'][$key])) {
                $this->users_officials_model->fields_insert[$key] = $this->web['request'][$key];
            }
        }
        unset($this->users_officials_model->fields_insert['users_officials_id']);
        return ($this->users_officials_model->save_record(0, $this->users_officials_model->fields_insert)) ? true : false;
    }

    private function saveUsersPositionsData() {

        foreach ($this->users_positions_model->fields_insert as $key => $val) {
            if (isset($this->web['request'][$key])) {
                $this->users_positions_model->fields_insert[$key] = $this->web['request'][$key];
            }
        }
        unset($this->users_positions_model->fields_insert['users_contacts_id']);
        return ($this->users_positions_model->save_record(0, $this->users_positions_model->fields_insert)) ? true : false;
    }

    private function saveUsersContactsData() {
        foreach ($this->users_contacts_model->fields_insert as $key => $val) {
            if (isset($this->web['request'][$key])) {
                $this->users_contacts_model->fields_insert[$key] = $this->web['request'][$key];
            }
        }
        unset($this->users_contacts_model->fields_insert['users_contacts_id']);
        return ($this->users_contacts_model->save_record(0, $this->users_contacts_model->fields_insert)) ? true : false;
    }

    private function saveUsersIdProofsData() {

        foreach ($this->users_id_proofs_model->fields_insert as $key => $val) {
            if (isset($this->web['request'][$key])) {
                $this->users_id_proofs_model->fields_insert[$key] = $this->web['request'][$key];
            }
        }
        unset($this->users_id_proofs_model->fields_insert['users_id_proofs_id']);
        return ($this->users_id_proofs_model->save_record(0, $this->users_id_proofs_model->fields_insert)) ? true : false;
    }

    private function setDefaultValuesToInsertCommon() {
        
    }

    private function saveCandidatesData() {
        $return = array();
        if (isset($this->web['request']['id'])) {
            $this->web['request']['id'] = base64_decode($this->web['request']['id']);
        }
        $this->loadRequiredModels();
        // Saving data when user is employee
        if ($this->web['request']['user_type'] == 'candidate') {
            // Saving basic data
            //echo "<pre>";
            //print_r($this->web['request']);
            //exit;
            $id = $this->web['request']['id'];
            $this->web['request']['is_archived'] = '0';
            $this->web['request']['created_at'] = date('y:m:d h:i:s');
            $this->web['request']['created_by'] = $this->session->userdata['loggedin']['id'];
            $this->web['request']['status'] = '1';
            $this->web['request']['username'] = 'CANDT' . rand(1000, 10000);
            $this->web['request']['user_type'] = 'candidate';
            $this->web['request']['role_id'] = '0';
            $this->web['request']['active_status'] = '1';
            $this->web['request']['gender'] = ( strtolower(trim($this->web['request']['title'])) == 'mr.') ? '1' : '0';
            $password = strtolower(str_replace(' ', '', trim($this->web['request']['first_name']))) . '@123';
            $this->web['request']['password'] = md5($password);
            
            foreach ($this->{$this->model_name}->fields_insert as $key => $val)
                $this->{$this->model_name}->fields_insert[$key] = (isset($this->web['request'][$key])) ? $this->web['request'][$key] : $val['value'];
            $data = $this->{$this->model_name}->fields_insert;
            $id = ( $this->{$this->model_name}->save_record($id, $data) ) ? $this->{$this->model_name}->last_insert_id : false;
            if ($id == false)
                return array('status' => 'FALSE', 'message' => 'Employee data could not be saved');
            //Saving users personal data
            $this->web['request']['user_id'] = $id;

            if ($this->saveUsersPersonalsData() == false)
                return false;
            if ($this->saveUsersContactsData() == false)
                return false;
            if ($this->saveUsersApplicationsData() == false)
                return false;
            if ($this->web['request']['candidate_type'] == '1') {
                if ($this->saveCandidatesEmployerData() == false)
                    return false;
            }
            if ($this->web['request']['candidate_type'] == '0') {

                if ($this->web['request']['attended_training'] == '1') {
                    if ($this->saveCandidatesTrainingCentreData() == false)
                        return false;
                    if ($this->saveCandidatesTrainingCentreAdderessData() == false)
                        return false;
                }
            }
        }
        if ($id == false) {
            return false;
        }
        return true;
    }

    private function saveUsersApplicationsData() {

        if (isset($this->web['request']['date_applied'])) {
            $this->web['request']['date_applied'] = date('Y:m:d', strtotime($this->web['request']['date_applied']));
        }
        
        foreach ($this->users_applications_model->fields_insert as $key => $val) {
            if (isset($this->web['request'][$key])) {
                $this->users_applications_model->fields_insert[$key] = $this->web['request'][$key];
            }
        }
        unset($this->users_applications_model->fields_insert['users_id_proofs_id']);
        return ($this->users_applications_model->save_record(0, $this->users_applications_model->fields_insert)) ? true : false;
    }

    private function saveCandidatesEmployerData() {
        $return = array();
        $this->model_name = 'users_employers_model';
        $this->load->model($this->model_name);
        $data = array();
        $users_employers_id = $this->web['request']['users_employers_id'];
        $this->web['request']['sort_order'] = '1';
        $this->web['request']['address'] = $this->web['request']['address']['employer'];
        $this->web['request']['city_id'] = $this->web['request']['city_id']['employer'];
        $this->web['request']['state_id'] = $this->web['request']['state_id']['employer'];

        foreach ($this->{$this->model_name}->fields_insert as $key => $val) {
            if (isset($this->web['request'][$key])) {
                $this->{$this->model_name}->fields_insert[$key] = $this->web['request'][$key];
            }
        }
        $this->{$this->model_name}->save_record($users_employers_id, $this->{$this->model_name}->fields_insert);
        // echo $id ;
    }

    private function saveCandidatesTrainingCentreData() {
        $this->model_name = 'users_training_centres_model';
        $this->web['request']['sort_order'] = '1';
        $this->web['request']['phone_no'] = '';
        foreach ($this->{$this->model_name}->fields_insert as $key => $val) {
            if (isset($this->web['request'][$key])) {
                $this->{$this->model_name}->fields_insert[$key] = $this->web['request'][$key];
            }
        }
        $this->{$this->model_name}->save_record($users_employers_id, $this->{$this->model_name}->fields_insert);
    }

    private function saveCandidatesTrainingCentreAdderessData() {
        $this->model_name = 'users_addresses_model';
        $this->web['request']['sort_order'] = '1';
        $this->web['request']['address_type_id'] = '6';
        $this->web['request']['address'] = $this->web['request']['address']['centre'];
        $this->web['request']['city_id'] = $this->web['request']['city_id']['centre'];
        $this->web['request']['state_id'] = $this->web['request']['state_id']['centre'];
        foreach ($this->{$this->model_name}->fields_insert as $key => $val) {
            if (isset($this->web['request'][$key])) {
                $this->{$this->model_name}->fields_insert[$key] = $this->web['request'][$key];
            }
        }
        $this->{$this->model_name}->save_record($users_employers_id, $this->{$this->model_name}->fields_insert);
    }

    private function saveCandidatesAdderessData() {
        $this->model_name = 'users_addresses_model';
        $this->web['request']['sort_order'] = '1';
        $this->web['request']['address_type_id'] = '6';
        $this->web['request']['address'] = $this->web['request']['address']['candidate'];
        $this->web['request']['city_id'] = $this->web['request']['city_id']['candidate'];
        $this->web['request']['state_id'] = $this->web['request']['state_id']['candidate'];
        foreach ($this->{$this->model_name}->fields_insert as $key => $val) {
            if (isset($this->web['request'][$key])) {
                $this->{$this->model_name}->fields_insert[$key] = $this->web['request'][$key];
            }
        }
        $this->{$this->model_name}->save_record($users_employers_id, $this->{$this->model_name}->fields_insert);
    }

    private function getQualificationsTypes() {
        $row = array();
        $this->load->model('educational_qualifications_model');
        $array = $this->educational_qualifications_model->getAll();
        if (count($array) > 0) {
            foreach ($array as $arr) {
                $row['id_' . $arr['id']] = $arr['stream_id'];
            }
        }
        if (!empty($row))
            $this->web['required_stream'] = json_encode($row);
    }

    private function getUserProfileInfo() {
        $profile_pics = array();
        $this->load->model('users_photos_model');
        $this->users_photos_model->ci_where["`users_photos`.`user_id`"] =  $this->web['model']['id'];
        $rows = $this->users_photos_model->getAll();

        if (!empty($rows)) {
            $profile_pics['avatars'] = $rows;
            foreach ($rows as $avatar) {
                if ($avatar['is_archived'] == '0')
                    $profile_pics['avatars']['active'] = $rows[0]['fullpath'];
            }
        }else {
            $profile_pics['avatars']['active'] = 'Images/BranchUserImage/user2.jpg';
        }
        return $profile_pics;
    }
	private function getEmployRecordAccess(){
		$return =array();
		$ids =array();
		$accesses = array();
		$this->load->model('system_modules_model');
		$this->system_modules_model->is_row_array = false;
		$this->system_modules_model->ci_where = array();
		$this->system_modules_model->ci_where['system_modules.parent_id'] = 11;
		$modules = $this->system_modules_model->getAll();
		if(!empty($modules)){
			foreach($modules as $row){
			 $ids[] = $row['id'];
			}
		}
		$this->load->model('roles_accesses_model');
		$this->roles_accesses_model->ci_where = array();
		$this->roles_accesses_model->ci_where_in_column = 'roles_accesses.system_module_id' ;
		$this->roles_accesses_model->ci_where_in_values = $ids;
		$this->roles_accesses_model->ci_where['roles_accesses.role_id'] = $this->session->userdata['loggedin']['role_id'];
		$rows = $this->roles_accesses_model->getAll();
		$access_id = array();
		if(!empty($rows)){
			$i=0;
			foreach($rows as $row){
				$accesses[$modules[$i]['module_sub_action']] = array('add'=>$row['add_entity'],'edit'=>$row['edit_entity'],'view'=>$row['view_entity'],'delete'=>$row['delete_entity']);
			$i++;
			}
		}
		return $accesses;
	}
}
