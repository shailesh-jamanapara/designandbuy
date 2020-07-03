<?php

ini_set('display_errors', 1);

class Ajax Extends Vect_Controller {

    public $web = array();
    private $model_name;

    public function __construct() {
        parent::__construct();
        $this->web['request'] = $this->request;
        $this->web['request']['is_archived'] = '0';
        $this->web['request']['updated_on'] = date('Y:m:d');
        $this->web['request']['updated_by'] = (isset($this->session->userdata['loggedin']['id'])) ? $this->session->userdata['loggedin']['id'] : 0;
        $this->web['months_arr'] = $this->months_arr;

        $this->web['relation_types'] = array('spouse', 'dependent');
        //$this->getManagers();
    }
	public function downloadData(){
        echo "<pre>";print_r($this->web['request']); echo "</pre>"; exit;
		if(isset($this->web['request']['school_id']) && $this->web['request']['school_id'] != '' ){
			$this->load->model('cutomer_templates_model');
			$this->cutomer_templates_model->ci_where = array();
			$this->cutomer_templates_model->ci_where['cutomer_templates.id'] = $this->web['request']['school_id'];
            $rows = $this->id_cards_model->getAll();

			if( count($rows) > 0 ){
				$this->load->library('excel_writer');
				$filename = strtolower(str_replace(' ', '-', $this->web['request']['school_name'])).".xls";
				$this->excel_writer->load($filename, $rows);
			}
		}
    }


    private function loadModel($model, $setwhere = false, $where = array()) {
        $this->model_name = $model . '_model';
        $this->load->model($this->model_name);
	  $this->{$this->model_name}->ci_where = array();
        if ($setwhere) {
            if (empty($where)) {
                $where['column'] = $model . ".user_id";
                $where['value'] = $this->web['request']['id'];
            }
            $this->{$this->model_name}->ci_where[$where['column']] = $where['value'];
        }
    }

    public function save_users_data() {
        if (isset($this->web['request']['id'])) {
            $this->web['request']['id'] = base64_decode($this->web['request']['id']);
        }
        if ($this->web['request']['id'] > 0) {
            if (isset($this->web['request']['section']) && $this->web['request']['section'] == 'personal_info') {
                $this->model_name = 'users_model';
                $this->load->model($this->model_name);
                $data = array();
                if ($this->checkEmailExists($this->web['request']['id'], 'email')) {
                    $return['status'] = 'failed';
                    $return['message'] = "Error^email^Email ID Already Exists";
                    $return['task'] = 'edit';
                    $return['response'] = $this->web['request'];
                    echo json_encode($return);
                    exit;
                }
                //$data['email_secondary'] = $this->web['request']['email_secondary'];
                $data['first_name'] = $this->web['request']['first_name'];
                $data['middle_name'] = $this->web['request']['middle_name'];
                $data['last_name'] = $this->web['request']['last_name'];
                $data['email'] = $this->web['request']['email'];
                $data['title'] = $this->web['request']['title'];
                $data['gender'] = (isset($this->web['request']['gender'])) ? $this->web['request']['gender'] : '0';
                $this->{$this->model_name}->save_record($this->web['request']['id'], $data);
                unset($data);
                $tbl = "users_personals";
                $this->model_name = $tbl . '_model';
                $this->load->model($this->model_name);
                $data = array();
                $data['dob'] = date('Y:m:d', strtotime($this->web['request']['dob']));
                $data['blood_group'] = $this->web['request']['blood_group'];
                $data['is_archived'] = '0';
                $data['marital_status'] = $this->web['request']['marital_status'];
                $this->web['request']['name'] = $this->web['request']['title'] . " " . $this->web['request']['first_name'] . " " . $this->web['request']['middle_name'] . " " . $this->web['request']['last_name'];
                if (!$this->{$this->model_name}->save_record($this->web['request'][$tbl . '_id'], $data)) {
                    $return['status'] = 'failed';
                    $return['message'] = 'Failed to save Personal Info';
                    $return['task'] = 'edit';
                    $return['response'] = $this->web['request'];
                    echo json_encode($return);
                    exit;
                }
                unset($data);
                $tbl = "users_id_proofs";
                $this->model_name = $tbl . '_model';
                $this->load->model($this->model_name);
                $data = array();
                $data['aadhar_name'] = $this->web['request']['aadhar_name'];
                $data['aadhar_no'] = $this->web['request']['aadhar_no'];
                $data['pan'] = $this->web['request']['pan'];
                $data['is_archived'] = '0';
                if (!$this->{$this->model_name}->save_record($this->web['request'][$tbl . '_id'], $data)) {
                    $return['status'] = 'failed';
                    $return['message'] = 'Failed to save Personal Info';
                    $return['task'] = 'edit';
                    $return['response'] = $this->web['request'];
                    echo json_encode($return);
                    exit;
                }

                if ($this->web['request']['gender'] == '1')
                    $this->web['request']['gender'] = "Male";
                if ($this->web['request']['gender'] == '0')
                    $this->web['request']['gender'] = "Female";

                if ($this->web['request']['marital_status'] == '0')
                    $this->web['request']['marital_status'] = "Married";
                if ($this->web['request']['marital_status'] == '1')
                    $this->web['request']['marital_status'] = "Single";
                if ($this->web['request']['marital_status'] == '2')
                    $this->web['request']['marital_status'] = "Divorced";
                $this->web['request']['aadhar_no'] = substr($this->web['request']['aadhar_no'], 0, 4) . "-" . substr($this->web['request']['aadhar_no'], 4, 4) . "-" . substr($this->web['request']['aadhar_no'], 8, 4);
                $return['status'] = 'success';
                $return['task'] = 'edit';
                $this->web['request']['dob'] = date('M d Y', strtotime($this->web['request']['dob']));
                $return['response'] = $this->web['request'];
                echo json_encode($return);
                exit;
            }
            // Saving Profile Data
            if (isset($this->web['request']['section']) && $this->web['request']['section'] == 'profile') {
                $this->model_name = 'users_model';
                $this->load->model($this->model_name);
                $data = array();
                if ($this->checkEmployeeCodeExists($this->web['request']['id'], 'username')) {
                    $return['status'] = 'failed';
                    $return['message'] = "Error^username^Employee Code Already Exists";
                    $return['task'] = 'edit';
                    $return['response'] = $this->web['request'];
                    echo json_encode($return);
                    exit;
                }
                if ($this->checkEmailExists($this->web['request']['id'], 'official_email')) {

                    $return['status'] = 'failed';
                    $return['message'] = "Error^official_email^Email ID Already Exists";
                    $return['task'] = 'edit';
                    $return['response'] = $this->web['request'];
                    echo json_encode($return);
                    exit;
                }

                if ($this->checkSkypeExists($this->web['request']['id'])) {
                    $return['status'] = 'failed';
                    $return['message'] = "Error^skype_id^Skype ID Already Exists";
                    $return['task'] = 'edit';
                    $return['response'] = $this->web['request'];
                    echo json_encode($return);
                    exit;
                }
                $data['username'] = $this->web['request']['username'];
                $data['skype_id'] = $this->web['request']['skype_id'];
                $data['active_status'] = $this->web['request']['active_status'];
                $this->{$this->model_name}->save_record($this->web['request']['id'], $data);
                unset($data);

                $data['is_archived'] = '0';
                $data['position_id'] = $this->web['request']['position_id'];
                $data['department_id'] = $this->web['request']['department_id'];
                $data['user_id'] = $this->web['request']['id'];

                if ($this->web['request']['users_positions_id'] == 0) {
                    $data['created_at'] = date('y:m:d h:i:s');
                    $data['created_by'] = $this->session->userdata['loggedin']['id'];
                }
                if ($this->web['request']['users_positions_id'] > 0) {
                    $data['updated_on'] = date('y:m:d h:i:s');
                    $data['updated_by'] = $this->session->userdata['loggedin']['id'];
                }
                $this->model_name = 'users_positions_model';
                $this->load->model($this->model_name);
                if (!$this->{$this->model_name}->save_record($this->web['request']['users_positions_id'], $data)) {
                    $return['status'] = 'failed';
                    $return['message'] = "Error^position_id^Problem with Position ID";
                    $return['task'] = 'edit';
                    $return['response'] = $this->web['request'];
                    echo json_encode($return);
                    exit;
                }
                unset($data);
                $this->model_name = 'users_officials_model';
                $this->load->model($this->model_name);
                $data['reporting_manager_id'] = ( isset($this->web['request']['reporting_manager_id']) ) ? $this->web['request']['reporting_manager_id'] : 0;
                $data['employment_status'] = $this->web['request']['employment_status'];
                $data['working_hours_from'] = $this->web['request']['working_hours_from'];
                $data['working_hours_to'] = $this->web['request']['working_hours_to'];
                $data['official_email'] = $this->web['request']['official_email'];
                if (!$this->{$this->model_name}->save_record($this->web['request']['users_officials_id'], $data)) {
                    $return['status'] = 'failed';
                    $return['message'] = "Error^employment_status^Problem Employee Data ID";
                    $return['task'] = 'edit';
                    $return['response'] = $this->web['request'];
                    echo json_encode($return);
                    exit;
                }
                $return['status'] = 'success';
                $return['task'] = 'edit';
                $this->web['request']['reporting_manager'] = $this->web['managers'][$data['reporting_manager_id']];
                if ($this->web['request']['employment_status'] == '0')
                    $this->web['request']['employment_status'] = "Full Time";
                if ($this->web['request']['employment_status'] == '1')
                    $this->web['request']['employment_status'] = "Part Time";
                if ($this->web['request']['employment_status'] == '2')
                    $this->web['request']['employment_status'] = "Temparory";
                $return['response'] = $this->web['request'];

                echo json_encode($return);
                exit;
            }
            // Saving Official Information Data
            if (isset($this->web['request']['section']) && $this->web['request']['section'] == 'official_info') {

                $this->model_name = 'users_personals_model';
                $this->load->model($this->model_name);
                $data = array();
                if (isset($this->web['request']['date_of_exit']) && $this->web['request']['date_of_exit'] != '')
                    $data['date_of_exit	'] = date('Y:m:d', strtotime($this->web['request']['date_of_exit']));

                if (isset($this->web['request']['past_criminal_record'])) {
                    $data['past_criminal_record'] = $this->web['request']['past_criminal_record'];
                    if ($this->web['request']['past_criminal_record'] == '1') {
                        $data['past_criminal_detail'] = trim($this->web['request']['past_criminal_detail']);
                    }
                }
                $users_personals_id = $this->web['request']['users_personals_id'];
                if (!empty($data)) {
                    if (!$this->{$this->model_name}->save_record($users_personals_id, $data)) {
                        $return['status'] = 'failed';
                        $return['message'] = "Error^position_id^Problem with Position ID";
                        $return['task'] = 'edit';
                        $return['response'] = $this->web['request'];
                        echo json_encode($return);
                        exit;
                    }
                }
                $data = array();
                $this->model_name = 'users_officials_model';
                $this->load->model($this->model_name);
                if (isset($this->web['request']['joining_date']) && $this->web['request']['joining_date'] != '')
                    $data['joining_date	'] = date('Y:m:d', strtotime($this->web['request']['joining_date']));
                if (isset($this->web['request']['bond_period']) && $this->web['request']['bond_period'] != '')
                    $data['bond_period'] = $this->web['request']['bond_period'];
                if (isset($this->web['request']['bond_to_date']) && $this->web['request']['bond_to_date'] != '')
                    $data['bond_to_date	'] = date('Y:m:d', strtotime($this->web['request']['bond_to_date']));

                if (isset($this->web['request']['insurance_no']) && $this->web['request']['insurance_no'] != '')
                    $data['insurance_no'] = $this->web['request']['insurance_no'];

                if (isset($this->web['request']['pf_code_no']) && $this->web['request']['pf_code_no'] != '')
                    $data['pf_code_no'] = $this->web['request']['pf_code_no'];


                $users_officials_id = $this->web['request']['users_officials_id'];



                if (!empty($data)) {
                    if (!$this->{$this->model_name}->save_record($users_officials_id, $data)) {
                        $return['status'] = 'failed';
                        $return['message'] = "Error^joining_date^Problem with Official Information";
                        $return['task'] = 'edit';
                        $return['response'] = $this->web['request'];
                        echo json_encode($return);
                        exit;
                    }
                }
                $data = array();
                $return['status'] = 'success';
                $return['task'] = 'edit';
                if ($this->web['request']['past_criminal_record'] == '0')
                    $this->web['request']['past_criminal_record'] = "No";
                if ($this->web['request']['past_criminal_record'] == '1') {
                    $this->web['request']['past_criminal_record'] = 'Yes<i class="fa fa-eye" title="View Past Criminal Detail" data-target="#modal_past_criminal_detail" > </i>';
                }
                $this->web['request']['joining_date'] = date('M d Y', strtotime($this->web['request']['joining_date']));
                $this->web['request']['date_of_exit'] = date('M d Y', strtotime($this->web['request']['date_of_exit']));
                $this->web['request']['bond_to_date'] = date('M d Y', strtotime($this->web['request']['bond_to_date']));
                $return['response'] = $this->web['request'];
                echo json_encode($return);
                exit;
            }
            // Saving Address and Contacts info
            if (isset($this->web['request']['section']) && $this->web['request']['section'] == 'contact_info') {
                $this->web['request']['user_id'] = $this->web['request']['id'];
                $this->load->model('users_contacts_model');
                foreach ($this->users_contacts_model->fields_insert as $key => $val) {
                    if (isset($this->web['request'][$key])) {
                        $this->users_contacts_model->fields_insert[$key] = $this->web['request'][$key];
                    }
                }
                unset($this->users_contacts_model->fields_insert['users_contacts_id']);
                //Archiving old contacts data
                if ($this->web['request']['users_contacts_id'] > 0) {
                    $data = array();
                    $data['updated_on'] = date('Y:m:d');
                    $data['updated_by'] = $this->session->userdata['loggedin']['id'];
                    $data['is_archived'] = '1';
                    $this->users_contacts_model->save_record($this->web['request']['users_contacts_id'], $data);
                }
                // Adding contacts as a new entry
                if (!$this->users_contacts_model->save_record(0, $this->users_contacts_model->fields_insert)) {
                    echo "Error^persona_data^Failed to save Contact Info";
                    exit;
                }
                $this->web['request']['users_contacts_id'] = $this->users_contacts_model->last_insert_id;
                //Saving Permanent address
                $this->web['request']['primary']['user_id'] = $this->web['request']['id'];
                $this->web['request']['primary']['address_type_id'] = '1';
                $this->web['request']['primary']['sort_order'] = '1';
                $this->web['request']['primary']['is_archived'] = '0';
                $this->web['request']['primary']['updated_on'] = date('Y:m:d');
                $this->web['request']['primary']['updated_by'] = $this->session->userdata['loggedin']['id'];
                $this->load->model('users_addresses_model');
                foreach ($this->users_addresses_model->fields_insert as $key => $val) {
                    if (isset($this->web['request']['primary'][$key])) {
                        $this->users_addresses_model->fields_insert[$key] = $this->web['request']['primary'][$key];
                    }
                }
                unset($this->users_addresses_model->fields_insert['users_addresses_id']);
                //Archiving previous address data
                if ($this->web['request']['users_primary_addresses_id'] > 0) {
                    $data = array();
                    $data['updated_on'] = date('Y:m:d');
                    $data['updated_by'] = $this->session->userdata['loggedin']['id'];
                    $data['is_archived'] = '1';
                    $data['sort_order'] = '0';
                    $this->users_addresses_model->save_record($this->web['request']['users_primary_addresses_id'], $data);
                }
                //Adding new one and it will be as an active record
                if (!$this->users_addresses_model->save_record(0, $this->users_addresses_model->fields_insert)) {
                    echo "Error^persona_data^Failed to save Address Info";
                    exit;
                }
                $this->load->model('states_model');
                $this->web['states'] = $this->states_model->getAllWithKeyValue();
                $this->load->model('cities_model');
                $this->web['cities'] = $this->cities_model->getAllWithKeyValue();
                $this->web['request']['primary']['state'] = $this->web['states'][$this->web['request']['primary']['state_id']];
                $this->web['request']['primary']['city'] = $this->web['cities'][$this->web['request']['primary']['city_id']];
                //Saving Temparory address
                $this->web['request']['temp']['user_id'] = $this->web['request']['id'];
                $this->web['request']['temp']['address_type_id'] = '2';
                $this->web['request']['temp']['sort_order'] = '2';
                $this->web['request']['temp']['is_archived'] = '0';
                $this->web['request']['temp']['updated_on'] = date('Y:m:d');
                $this->web['request']['temp']['updated_by'] = $this->session->userdata['loggedin']['id'];
                foreach ($this->users_addresses_model->fields_insert as $key => $val) {
                    if (isset($this->web['request']['temp'][$key])) {
                        $this->users_addresses_model->fields_insert[$key] = $this->web['request']['temp'][$key];
                    }
                }
                unset($this->users_addresses_model->fields_insert['users_addresses_id']);
                //Archiving previous address data
                if ($this->web['request']['users_temp_addresses_id'] > 0) {
                    $data = array();
                    $data['updated_on'] = date('Y:m:d');
                    $data['updated_by'] = $this->session->userdata['loggedin']['id'];
                    $data['is_archived'] = '1';
                    $data['sort_order'] = '0';
                    $this->users_addresses_model->save_record($this->web['request']['users_temp_addresses_id'], $data);
                }
                //Adding new one and it will be as an active record
                if (!$this->users_addresses_model->save_record(0, $this->users_addresses_model->fields_insert)) {
                    echo "Error^persona_data^Failed to save Temporary  Address Info";
                    exit;
                }
                $this->load->model('states_model');
                $this->web['states'] = $this->states_model->getAllWithKeyValue();
                $this->web['request']['temp']['state'] = $this->web['states'][$this->web['request']['temp']['state_id']];
                $this->web['request']['temp']['city'] = $this->web['cities'][$this->web['request']['temp']['city_id']];
                //Saving References Contacts
                $this->load->model('users_references_model');
                $cnt = count($this->web['request']['references']);
                for ($i = 1; $i < $cnt + 1; $i++) {
                    foreach ($this->users_references_model->fields_insert as $key => $val) {
                        $this->web['request']['references']['sort_order'][$i] = $i;
                        if (isset($this->web['request']['references'][$key][$i])) {
                            $this->users_references_model->fields_insert[$key] = $this->web['request']['references'][$key][$i];
                        }
                    }
                    $this->users_references_model->fields_insert['user_id'] = $this->web['request']['id'];
                    unset($this->users_references_model->fields_insert['users_references_id']);
                    if (isset($this->web['request']['references']['users_references_id'][$i])) {
                        // Archiving users References Data
                        if ($this->web['request']['references']['users_references_id'][$i] > 0) {
                            $users_references_id = $this->web['request']['references']['users_references_id'][$i];
                            $data = array();
                            $data['updated_on'] = date('Y:m:d');
                            $data['updated_by'] = $this->session->userdata['loggedin']['id'];
                            $data['is_archived'] = '1';
                            $data['sort_order'] = '0';
                            $this->users_references_model->save_record($users_references_id, $data);
                        }
                        $this->users_references_model->fields_insert['updated_on'] = date('Y:m:d');
                        $this->users_references_model->fields_insert['updated_by'] = $this->session->userdata['loggedin']['id'];
                        $this->users_references_model->fields_insert['sort_order'] = $i;
                        $this->users_references_model->fields_insert['is_archived'] = '0';
                        if (!$this->users_references_model->save_record(0, $this->users_references_model->fields_insert)) {
                            echo "Error^persona_data^Failed to save References info ";
                            exit;
                        }
                    }
                }
                $return['status'] = 'success';
                $return['task'] = 'edit';
                $return['response'] = $this->web['request'];
                echo json_encode($return);
                exit;
            }
            // Saving Employment History to user_employers table
            if (isset($this->web['request']['section']) && $this->web['request']['section'] == 'employers') {
                $return = array();
                $this->model_name = 'users_employers_model';
                $this->load->model($this->model_name);
                $data = array();
                if ($this->checkEmployersDurationExists()) {
                    $return['status'] = 'failed';
                    $return['message'] = "Error^duration_from_year^Problem with Duration From or Duration To Information";
                    $return['task'] = 'edit';
                    echo json_encode($return);
                    exit;
                }
                $this->web['request']['user_id'] = $this->web['request']['id'];
                $users_employers_id = $this->web['request']['users_employers_id'];
                $this->web['request']['sort_order'] = $this->getNextSortOrderToInsert();
                if ($this->web['request']['users_employers_id'] == 0) {
                    $this->web['request']['created_at'] = date('y:m:d h:i:s');
                    $this->web['request']['created_by'] = $this->session->userdata['loggedin']['id'];
                }
                if ($this->web['request']['users_employers_id'] > 0) {
                    $this->web['request']['updated_on'] = date('y:m:d h:i:s');
                    $this->web['request']['updated_by'] = $this->session->userdata['loggedin']['id'];
                }
                foreach ($this->{$this->model_name}->fields_insert as $key => $val) {
                    if (isset($this->web['request'][$key])) {
                        $this->{$this->model_name}->fields_insert[$key] = $this->web['request'][$key];
                    }
                }

                if ($this->{$this->model_name}->save_record($users_employers_id, $this->{$this->model_name}->fields_insert)) {
                    $this->load->model('states_model');
                    $this->web['states'] = $this->states_model->getAllWithKeyValue();
                    $this->load->model('cities_model');
                    $this->web['cities'] = $this->cities_model->getAllWithKeyValue();
                    $this->web['request']['users_employers_id'] = $this->{$this->model_name}->last_insert_id;
                    $return['response'] = $this->web['request'];
                    $return['status'] = 'success';
                    $return['message'] = 'Data saved successfully';
                    $return['task'] = ($users_employers_id == 0) ? 'add' : 'edit';
                    if (isset($this->web['request']['duration_from_month']) && isset($this->web['request']['duration_from_year']))
                        $return['response']['duration_from'] = $this->months_arr[$this->web['request']['duration_from_month']]['abbr'] . " " . $this->web['request']['duration_from_year'];
                    if (isset($this->web['request']['duration_to_month']) && isset($this->web['request']['duration_to_year']))
                        $return['response']['duration_to'] = $this->months_arr[$this->web['request']['duration_to_month']]['abbr'] . " " . $this->web['request']['duration_to_year'];
                    $return['response']['count'] = ($users_employers_id == 0) ? $this->web['request']['count'] + 1 : 0;
                    $return['response']['state'] = $this->web['states'][$this->web['request']['state_id']];
                    $return['response']['city'] = $this->web['cities'][$this->web['request']['city_id']];
                    echo json_encode($return);
                    exit;
                }else {
                    $return['status'] = 'failed';
                    $return['message'] = "Error^duration_from_year^Problem with Qualifications Data";
                    $return['task'] = 'edit';
                    echo json_encode($return);
                    exit;
                }
                // echo $id ;
            }

            // Saving qualifications Data
            if (isset($this->web['request']['section']) && $this->web['request']['section'] == 'qualifications') {
                $users_educational_qualifications_id = $this->web['request']['users_educational_qualifications_id'];
                $return = array();
                $this->model_name = 'users_educational_qualifications_model';
                $this->load->model($this->model_name);
                $this->web['request']['user_id'] = $this->web['request']['id'];
                $this->web['request']['no_of_years'] = $this->web['request']['duration_to_year'] - $this->web['request']['duration_from_year'];
                foreach ($this->{$this->model_name}->fields_insert as $key => $val) {
                    if (isset($this->web['request'][$key])) {
                        $this->{$this->model_name}->fields_insert[$key] = $this->web['request'][$key];
                    }
                }
                if ($users_educational_qualifications_id > 0) {
                    $data = array();
                    $data['is_archived'] = '1';
                    $data['updated_on'] = date('y:m:d h:i:s');
                    $data['updated_by'] = $this->session->userdata['loggedin']['id'];
                    $this->{$this->model_name}->save_record($users_educational_qualifications_id, $data);
                }
                $this->{$this->model_name}->fields_insert['is_archived'] = '0';
                if ($this->{$this->model_name}->save_record(0, $this->{$this->model_name}->fields_insert)) {
                    $this->load->model('educational_qualifications_model');
                    $this->web['qualifications'] = $this->educational_qualifications_model->getAllWithKeyValue();
                    $this->load->model('streams_model');
                    $this->web['streams'] = $this->streams_model->getAllWithKeyValue();
                    $this->web['request']['users_educational_qualifications_id'] = ($users_educational_qualifications_id > 0) ? $users_educational_qualifications_id : $this->{$this->model_name}->last_insert_id;
                    $str_name = ( isset($this->web['request']['stream_id']) && $this->web['request']['stream_id'] != '' ) ? $this->web['streams'][$this->web['request']['stream_id']] : '';
                    $this->web['request']['name'] = $this->web['qualifications'][$this->web['request']['educational_qualification_id']] . "  " . $str_name;
                    $this->web['request']['count'] = ($users_educational_qualifications_id == 0) ? $this->web['request']['count'] + 1 : $this->web['request']['count'];
                    $return['status'] = 'success';
                    $return['task'] = $this->web['request']['task'];
                    $return['response'] = $this->web['request'];
                    if (isset($this->web['request']['duration_from_month']) && isset($this->web['request']['duration_from_year']))
                        $return['response']['duration_from'] = $this->months_arr[$this->web['request']['duration_from_month']]['abbr'] . " " . $this->web['request']['duration_from_year'];
                    if (isset($this->web['request']['duration_to_month']) && isset($this->web['request']['duration_to_year']))
                        $return['response']['duration_to'] = $this->months_arr[$this->web['request']['duration_to_month']]['abbr'] . " " . $this->web['request']['duration_to_year'];
                    echo json_encode($return);
                }else {
                    $return['status'] = 'failed';
                    $return['message'] = "Error^duration_from_year^Problem with Qualifications Data";
                    $return['task'] = 'edit';
                    echo json_encode($return);
                    exit;
                }
            }
        }
    }

    private function save() {

        $id = $this->web['request']['id'];
        $this->web['request']['is_archived'] = 0;
        $this->web['request']['user_type'] = 'employee';
        $this->web['request']['role_id'] = 1;
        if ($this->web['request']['id'] == 0) {
            $this->web['request']['created_at'] = date('y:m:d h:i:s');
            $this->web['request']['created_by'] = $this->session->userdata['loggedin']['id'];
        }
        if ($this->web['request']['id'] > 0) {
            $this->web['request']['updated_on'] = date('y:m:d h:i:s');
            $this->web['request']['updated_by'] = $this->session->userdata['loggedin']['id'];
        }

        foreach ($this->{$this->model_name}->fields_insert as $key => $val) {
            $this->{$this->model_name}->fields_insert[$key] = (isset($this->web['request'][$key])) ? $this->web['request'][$key] : $val['value'];
        }
        $data = $this->{$this->model_name}->fields_insert;
        $id = $this->{$this->model_name}->save_record($id, $data);
        return $id;
    }

    /**
     * private function checkEmailExists.
     * @param $id is User id
     * $param $field is email of secondary_email of Users table
     * @return boolean True if exists or False on Not exists
     *
     */
    private function checkEmailExists($id, $fld) {
        return false;
        $this->load->model('users_model');
        $to_check = $this->web['request'][$fld];
        if (!isset($this->web['request'][$fld])) {
            return false;
        }
        $check = "  ( `users`.`email`='" . $to_check . "' and users_officials.id !='" . $this->web['request']['users_officials_id'] . "' ) or ( `users_officials`.`official_email`='" . $to_check . "' and users_officials.id !='" . $this->web['request']['users_officials_id'] . "' ) ";

        $this->users_model->group_start = true;
        $this->users_model->where_group['users.email'] = $to_check;
        $this->users_model->where_group['users.id !='] = $this->web['request']['users_officials_id'];
        $this->users_model->or_group_start = true;
        $this->users_model->where_group['users_officials.official_email'] = $to_check;
        $this->users_model->where_group['users_officials.id !='] = $this->web['request']['users_officials_id'];
        $result = $this->users_model->getAll();
        $this->users_model->group_start = false;
        $this->users_model->or_group_start = false;
        if (count($result) > 0) {
            return true;
        }
        if (empty($result) && count($result) == 0) {
            return false;
        }
    }

    public function checkEmployeeCodeExists($id, $fld) {
        $this->load->model('users_model');

        if (!isset($this->web['request'][$fld])) {
            return true;
        }
        $to_check = $this->web['request'][$fld];
        $this->load->model('users_model');
        $this->users_model->ci_where = array();
        $check = " `users`.`username`='" . $to_check . "' and users.id !='" . $id . "' ";
        $this->users_model->ci_where["users.username"] = $to_check;
        $this->users_model->ci_where["users"] = $id;
        $result = $this->users_model->getAll();
        if (count($result) > 0) {
            return true;
        }
        if (empty($result) && count($result) == 0) {
            return false;
        }
        exit;
    }

    public function checkEmployeeDuplicateEmail() {

        $this->load->model('users_model');
	   $this->users_model->params = array();
        $this->users_model->ci_where = array();
        $this->users_model->ci_where_group = array();
        $to_check = $this->web['request']['value'];

        if (isset($this->web['request']['id'])) {
            $this->web['request']['id'] = base64_decode($this->web['request']['id']);
            //$check = "  users_officials.user_id !='" . $this->web['request']['id'] . "' and  ( `users`.`email`='" . $to_check . "' or `users_officials`.`official_email`='" . $to_check . "' ) ";
		  $this->users_model->is_custom = true;
		  $this->sql =  "  users_officials.user_id !=? and  ( `users`.`email`=? or `users_officials`.`official_email`=?) ";
		  $this->users_model->params[] = $this->web['request']['id'];
		  $this->users_model->params[] = $to_check;
		  $this->users_model->params[] = $to_check;
		  $result = $this->users_model->getAll();

        } else {
            //$check = " `users`.`user_type` = 'employee' and  ( `users`.`email`='" . $to_check . "' or `users`.`email_secondary`='" . $to_check . "' ) ";
            $this->users_model->is_custom = true;
		  $this->sql = " `users`.`user_type` = ? and  ( `users`.`email`=? or `users`.`email_secondary`= ? ) ";
		  $this->users_model->params[] = 'employee';
		  $this->users_model->params[] = $to_check;
		  $this->users_model->params[] = $to_check;
		  $result = $this->users_model->getAll();
        }
        if (count($result) > 0) {
            echo "invalid";
        }
        if (empty($result) && count($result) == 0) {
            echo "valid";
        }
        exit;
    }

    public function checkEmployeeDuplicateOfficialEmail() {

        $this->load->model('users_officials_model');
	$this->users_officials_model->params = array();
        $to_check = $this->web['request']['value'];
        $this->users_officials_model->table_properties['join_tables'][] = array('users', ' `users`.`id` = `users_officials`.`user_id` ', 'left');
        $this->users_officials_model->setJoins();
        if (isset($this->web['request']['id'])) {
            $this->web['request']['id'] = base64_decode($this->web['request']['id']);

		 //$check = " 1 AND ( users_officials.user_id !='" . $this->web['request']['id'] . "' AND `users`.`email`='" . $to_check . "' ) OR (users_officials.user_id !='" . $this->web['request']['id'] . "' AND `users_officials`.`official_email`='" . $to_check . "' )  ";
            $this->users_officials_model->is_custom = true;
            $this->users_officials_model->sql =  " ? AND ( users_officials.user_id !=? AND `users`.`email`=? ) OR (users_officials.user_id !=? AND `users_officials`.`official_email` = ? )  " ;
		  $this->users_officials_model->params[]= 1 ;
		  $this->users_officials_model->params[]= $this->web['request']['id'];
		  $this->users_officials_model->params[]= $to_check;
		  $this->users_officials_model->params[]= $this->web['request']['id'];
		  $this->users_officials_model->params[]= $to_check;
		 $result = $this->users_officials_model->getAll();
        } else {
		//$check = " `users`.`user_type` = 'employee' and  ( `users`.`email`='" . $to_check . "' or `users`.`email_secondary`='" . $to_check . "' ) ";
		$this->users_officials_model->is_custom = true;
		$this->users_officials_model->sql = " `users`.`user_type` = ? and  ( `users`.`email`='" . $to_check . "' or `users`.`email_secondary`='" . $to_check . "' ) ";
		$this->users_officials_model->params[]= 'employee';
		$this->users_officials_model->params[]= $to_check;
		$this->users_officials_model->params[]= $to_check;
		$result = $this->users_officials_model->getAll();
        }
        if (count($result) > 0) {
            echo "invalid";
        }
        if (empty($result) && count($result) == 0) {
            echo "valid";
        }
        exit;
    }

    public function checkEmployeeDuplicateCode() {

        $this->load->model('users_model');
	   $this->users_model->ci_where = array();
	   $to_check = $this->web['request']['value'];
        if (isset($this->web['request']['id'])) {
            $this->web['request']['id'] = base64_decode($this->web['request']['id']);
		  $this->users_model->ci_where["users.user_type"] = 'employee';
		  $this->users_model->ci_where["users.username"] = 'employee';
		  $this->users_model->ci_where["users.username !="] = $this->web['request']['id'];
            //$check = " `users`.`user_type` = 'employee' and  `users`.`username`='" . $to_check . "' and users.id !='" . $this->web['request']['id'] . "' ";
        } else {
            //$check = " `users`.`user_type` = 'employee' and  `users`.`username`='" . $to_check . "' ";
            $this->users_model->ci_where["users.user_type"] = 'employee';
            $this->users_model->ci_where["users.username"] = $to_check;

        }
        $result = $this->users_model->getAll();
        if (count($result) > 0) {
            echo "invalid";
        }
        if (empty($result) && count($result) == 0) {
            echo "valid";
        }
        exit;
    }

    /**
     * private function checkSkypeExists.
     * @param $id is User id
     * @return boolean True if exists or False on Not exists
     *
     */
    private function checkSkypeExists($id) {
        if (!isset($this->web['request']['skype_id'])) {
            return true;
        }
        $this->model_name = 'users_model';
        $this->load->model($this->model_name);
        $to_check = $this->web['request']['skype_id'];
       $this->{$this->model_name}->ci_where = array();
        $check = " `users`.`user_type` = 'employee' and   `users`.`skype_id`='" . $to_check . "' ";
        $this->{$this->model_name}->ci_where["users.user_type"] = "employee";
        $this->{$this->model_name}->ci_where["users.skype_id"] = $to_check;
        if($id>0){
             $this->{$this->model_name}->ci_where["users.id !="] = $id;
        }
        $result = $this->{$this->model_name}->getAll();
        if (count($result) > 0) {
            return true;
        }
        if (empty($result) && count($result) == 0) {
            return false;
        }
    }

    /**
     * private function checkQualificationsExists.
     * @param $id is User id
     * $param $field is email of secondary_email of Users table
     * @return boolean True if exists or False on Not exists
     *
     */
    private function checkQualificationsExists($id, $user_id, $qual_id, $stream_id) {
        return false;
        if (!isset($qual_id) && !isset($stream_id)) {
            return false;
        }
        $this->load->model('users_educational_qualifications_model');
       $this->users_educational_qualifications_model->ci_where = array();
        $this->users_educational_qualifications_model->ci_where["users_educational_qualifications.educational_qualification_id"]=$qual_id;
        $this->users_educational_qualifications_model->ci_where["users_educational_qualifications.stream_id"]=$stream_id;
        if($id > 0){
           $this->users_educational_qualifications_model->ci_where["users_educational_qualifications.user_id"] =  $user_id;
           $this->users_educational_qualifications_model->ci_where["users_educational_qualifications.id !="] = $id;
        }
        //$check = "  `users_educational_qualifications`.`educational_qualification_id` =" . $qual_id . " and   `users_educational_qualifications`.`stream_id`=" . $stream_id . " ";
        //$check .= ($id > 0) ? " and `users_educational_qualifications`.`user_id` =" . $user_id . " and  `users_educational_qualifications`.`id`!=" . $id . "  " : " ";
        $result = $this->users_educational_qualifications_model->getAll();
        if (count($result) > 0) {
            return true;
        }
        if (empty($result) && count($result) == 0) {
            return false;
        }
    }

    public function get_skills_data() {
        $return_arr = array();
        $this->load->model('skills_model');
        $skills = $this->skills_model->getAllWithKeyValue();
        if (count($skills) > 0) {
            foreach ($skills as $key => $val) {
                $return_arr[] = array("value" => $key, "text" => $val);
            }
        }
        if (count($return_arr) > 0) {
            echo json_encode($return_arr);
        }
    }

    public function get_roles_accesses() {
        $return = array();
        if (isset($this->web['request']['role_id'])) {
            $this->web['request']['role_id'] = base64_decode($this->web['request']['role_id']);
        }
        if (isset($this->web['request']['module_id'])) {
            $this->web['request']['module_id'] = base64_decode($this->web['request']['module_id']);
        }
        /* Getting All Available System Modules List */
        $this->load->model('system_modules_model');
        $this->system_modules_model->ci_where =array();
	   $this->system_modules_model->ci_or_where =array();
        $this->system_modules_model->ci_where['system_modules.parent_id'] = $this->web['request']['module_id'];
        $this->system_modules_model->ci_or_where['system_modules.id'] = $this->web['request']['module_id'];
        $system_modules = $this->system_modules_model->getAllWithKeyValue();
        //$system_module_ids = array();
        $system_module_ids = array();
        if (!empty($system_modules)) {
            foreach ($system_modules as $key => $val){
                $system_module_ids[] = $key;
            }
        }

        $this->load->model('roles_accesses_model');
	   $this->roles_accesses_model->ci_where =array();
	   $this->roles_accesses_model->ci_where_in =array();
        $this->roles_accesses_model->ci_where["role_id"] = $this->web['request']['role_id'];
        $this->roles_accesses_model->ci_where_in_column= 'system_module_id'; //array('column' => 'system_module_id', 'values'=> $system_module_ids);
        $this->roles_accesses_model->ci_where_in_values = $system_module_ids; //array('column' => 'system_module_id', 'values'=> $system_module_ids);
        //$this->roles_accesses_model->ci_where_in = array('system_module_id', $system_module_ids);
        $rows = $this->roles_accesses_model->getAll();
        $this->web['request']['role_id'] = base64_encode($this->web['request']['role_id']);
        $this->web['request']['module_id'] = base64_encode($this->web['request']['module_id']);
        $this->web['request']['task'] = 'get_lists';
        $this->web['request']['rows'] = $rows;
        $return['count'] = count($rows);
        $return['status'] = 'success';
        $return['task'] = $this->web['request']['task'];
        $return['response'] = $rows;
        echo json_encode($return);
        exit;
    }

    private function checkEmployersDurationExists() {
        return false;
	 /*
        if ($this->web['request']['users_employer_type'] == 1) {
            $from_year = $this->web['request']['duration_from_year'];
            $to_year = $this->web['request']['duration_to_year'];
            if ($this->web['request']['users_employers_id'] == 0) {
                //$this->{$this->model_name}->where[0] = " ( ( `users_employers`.`duration_from_year`  BETWEEN " . $from_year . " AND " . $to_year . " ) OR (  `users_employers`.`duration_to_year`  BETWEEN " . $from_year . " AND " . $to_year . " )) AND  `users_employers`.`user_id`='" . $this->web['request']['id'] . "' ";
                $this->{$this->model_name}->group_start = true;
                $this->{$this->model_name}->where_group['`users_employers`.`duration_from_year` >='] = $from_year;
                $this->{$this->model_name}->where_group['`users_employers`.`duration_from_year` <='] = $to_year;
                $this->{$this->model_name}->or_group_start = true;
                $this->{$this->model_name}->where_group['`users_employers`.`duration_to_year` >='] = $from_year;
                $this->{$this->model_name}->where_group['`users_employers`.`duration_to_year` <='] = $to_year;
                $this->{$this->model_name}->or_group_start = false;
                $this->{$this->model_name}->group_start = false;
            }
            if ($this->web['request']['users_employers_id'] > 0) {
                //$this->{$this->model_name}->where[0] = " ( ( `users_employers`.`duration_from_year`  BETWEEN " . $from_year . " AND " . $to_year . " ) OR (  `users_employers`.`duration_to_year`  BETWEEN " . $from_year . " AND " . $to_year . " )) AND  `users_employers`.`user_id`='" . $this->web['request']['id'] . "' AND  `users_employers`.`id`!='" . $this->web['request']['users_employers_id'] . "' ";
                $this->{$this->model_name}->where['`users_employers`.`user_id`'] =  $this->web['request']['id'];
                $this->{$this->model_name}->group_start = true;
                $this->{$this->model_name}->where_group['`users_employers`.`duration_from_year` >='] = $from_year;
                $this->{$this->model_name}->where_group['`users_employers`.`duration_from_year` <='] = $to_year;
                $this->{$this->model_name}->or_group_start = true;
                $this->{$this->model_name}->where_group['`users_employers`.`duration_to_year` >='] = $from_year;
                $this->{$this->model_name}->where_group['`users_employers`.`duration_to_year` <='] = $to_year;
                $this->{$this->model_name}->or_group_start = false;
                $this->{$this->model_name}->group_start = false;
            }
            $result = $this->{$this->model_name}->getAll();
            if (count($result) > 0) {
                return true;
            }
            if (empty($result) && count($result) == 0) {
                return false;
            }
        }
        return true;
		*/
    }

    public function getNextSortOrderToInsert() {
        $sort_order = 1;
        if ($this->web['request']['sort_order'] > 0) {
            $sort_order = $this->web['request']['sort_order'] + 1;
        }
        return $sort_order;
    }

    public function getEmployerById() {
        if (!isset($this->web['request']['users_employers_id'])) {
            $return['status'] = 'failed';
            $return['message'] = 'Failed to get Employers Data';
            $return['task'] = 'edit';
            $return['response'] = $this->web['request'];
        }
        if (isset($this->web['request']['users_employers_id'])) {
            $this->model_name = 'users_employers_model';
            $this->load->model($this->model_name);
            $row = $this->{$this->model_name}->getById($this->web['request']['users_employers_id']);
            $return['status'] = 'success';
            $return['message'] = 'Failed to get Employers Data';
            $return['task'] = 'edit';
            $return['response'] = $row;
        }
        echo json_encode($return);
        exit;
    }

    public function assignRole() {
        if (!isset($this->web['request']['id'])) {
            $return['status'] = 'failed';
            $return['message'] = "Error^duration_from_year^Problem with Data";
            $return['task'] = 'edit';
            echo json_encode($return);
            exit;
        }
        if (isset($this->web['request']['id'])) {
            $this->web['request']['id'] = base64_decode($this->web['request']['id']);
        }
        $data = array();
        $this->model_name = 'users_model';
        $this->load->model($this->model_name);
        $data['role_id'] = $this->web['request']['role_id'];
        if ($this->{$this->model_name}->save_record($this->web['request']['id'], $data)) {
            $this->load->model('roles_model');
            $this->web['roles'] = $this->roles_model->getAllWithKeyValue();
            $return['status'] = 'success';
            $return['message'] = "Role Assigned Successfully";
            $return['task'] = 'edit';
            $return['response'] = array('id' => $this->web['request']['id'], 'role' => $this->web['roles'][$this->web['request']['role_id']]);
            echo json_encode($return);
            exit;
        }
    }

    public function changePassword() {
        if (!isset($this->web['request']['id'])) {
            $return['status'] = 'failed';
            $return['message'] = "Error^duration_from_year^Problem with Data";
            $return['task'] = 'edit';
            echo json_encode($return);
            exit;
        }
        if (isset($this->web['request']['id'])) {
            $this->web['request']['id'] = base64_decode($this->web['request']['id']);
        }
        $data = array();
        $this->model_name = 'users_model';
        $this->load->model($this->model_name);
        $data['password'] = md5($this->web['request']['password']);
        if ($this->{$this->model_name}->save_record($this->web['request']['id'], $data)) {
            $return['status'] = 'success';
            $return['message'] = "Password Changed Successfully";
            $return['task'] = 'edit';
            $return['response'] = array('id' => $this->web['request']['id']);
            echo json_encode($return);
            exit;
        }
    }

    public function getFamilyById() {
        if (!isset($this->web['request']['users_family_id'])) {
            $return['status'] = 'failed';
            $return['message'] = "Family detail could not be find";
            $return['task'] = $this->web['request']['task'];
            $return['state'] = "1001";
            echo json_encode($return);
            exit;
        }
        if (isset($this->web['request']['users_family_id'])) {
            $this->model_name = 'users_family_model';
            $this->load->model($this->model_name);
            $row = $this->{$this->model_name}->getById($this->web['request']['users_family_id']);
            $return['status'] = 'success';
            $return['message'] = 'Returning Family Info';
            $return['task'] = 'edit';
            $return['response'] = $row;
        }
        echo json_encode($return);
        exit;
    }

    public function saveFamilyInfo() {
        if (!isset($this->web['request']['id'])) {
            $return['status'] = 'failed';
            $return['message'] = "Family detail could not be saved";
            $return['task'] = $this->web['request']['task'];
            $return['state'] = "1001";
            echo json_encode($return);
            exit;
        }
        if (isset($this->web['request']['id'])) {
            $this->web['request']['id'] = base64_decode($this->web['request']['id']);
        }
        $this->load->model('relations_model');
        $this->web['relations'] = $this->relations_model->getAllWithKeyValue();
        if (!isset($this->web['request']['full_name']) || $this->web['request']['full_name'] == '' || !array_key_exists($this->web['request']['relation_id'], $this->web['relations'])) {
            $return['status'] = 'failed';
            $return['message'] = "Family detail could not be saved";
            $return['state'] = "1002";
            $return['task'] = $this->web['request']['task'];
            echo json_encode($return);
            exit;
        }
        $this->model_name = 'users_family_model';
        $this->web['request']['user_id'] = $this->web['request']['id'];
        $users_family_id = $this->web['request']['users_family_id'];
        $this->load->model($this->model_name);
        if ($this->web['request']['id'] == 0) {
            $this->web['request']['created_at'] = date('y:m:d h:i:s');
            $this->web['request']['created_by'] = $this->session->userdata['loggedin']['id'];
        }
        if ($this->web['request']['id'] > 0) {
            $this->web['request']['updated_on'] = date('y:m:d h:i:s');
            $this->web['request']['updated_by'] = $this->session->userdata['loggedin']['id'];
            $data = array();
            $data['is_archived'] = '1';
            $data['sort_order'] = '0';
            $this->{$this->model_name}->save_record($users_family_id, $data);
        }

        foreach ($this->{$this->model_name}->fields_insert as $key => $val) {
            $this->{$this->model_name}->fields_insert[$key] = (isset($this->web['request'][$key])) ? $this->web['request'][$key] : $val['value'];
        }
        $this->{$this->model_name}->fields_insert['is_archived'] = '0';
        if ($this->{$this->model_name}->save_record(0, $this->{$this->model_name}->fields_insert)) {
            $return['status'] = 'success';
            $return['message'] = "Family detail saved successfully";
            $return['task'] = 'edit';
            $return['response']['id'] = ($users_family_id > 0) ? $users_family_id : $this->{$this->model_name}->last_insert_id;
            $return['response']['relation_id'] = $this->web['relations'][$this->web['request']['relation_id']];
            $return['response']['relation_type'] = ($this->web['request']['relation_type'] != 'none') ? ucfirst($this->web['request']['relation_type']) : '';
            $return['response']['full_name'] = $this->web['request']['full_name'];
            $return['response']['task'] = ( $users_family_id == 0 ) ? "add" : "edit";
            echo json_encode($return);
            exit;
        }
    }

    public function getEmergencyContactById() {
        if (!isset($this->web['request']['users_emergency_contacts_id'])) {
            $return['status'] = 'failed';
            $return['message'] = "Emergency Contact could not  be find";
            $return['task'] = $this->web['request']['task'];
            $return['state'] = "1001";
            echo json_encode($return);
            exit;
        }
        if (isset($this->web['request']['users_emergency_contacts_id'])) {
            $this->model_name = 'users_emergency_contacts_model';
            $this->load->model($this->model_name);
            $row = $this->{$this->model_name}->getById($this->web['request']['users_emergency_contacts_id']);
            $return['status'] = 'success';
            $return['message'] = 'Returning Emergency Contact Info';
            $return['task'] = 'edit';
            $return['response'] = $row;
        }
        echo json_encode($return);
        exit;
    }

    public function saveEmergencyContact() {
        if (!isset($this->web['request']['id'])) {
            $return['status'] = 'failed';
            $return['message'] = "Emergency Contact could not be saved";
            $return['task'] = $this->web['request']['task'];
            $return['state'] = "1001";
            echo json_encode($return);
            exit;
        }
        if (isset($this->web['request']['id'])) {
            $this->web['request']['id'] = base64_decode($this->web['request']['id']);
        }

        $this->model_name = 'users_emergency_contacts_model';
        $this->web['request']['user_id'] = $this->web['request']['id'];

        $users_emergency_contacts_id = $this->web['request']['users_emergency_contacts_id'];
        $this->load->model($this->model_name);
        if ($this->web['request']['id'] == 0) {
            $this->web['request']['created_at'] = date('y:m:d h:i:s');
            $this->web['request']['created_by'] = $this->session->userdata['loggedin']['id'];
        }
        if ($this->web['request']['id'] > 0) {
            $this->web['request']['updated_on'] = date('y:m:d h:i:s');
            $this->web['request']['updated_by'] = $this->session->userdata['loggedin']['id'];
            $data = array();
            $data['is_archived'] = '1';
            $data['updated_on'] = date('y:m:d h:i:s');
            $data['updated_on'] = $this->session->userdata['loggedin']['id'];
            $this->{$this->model_name}->save_record($users_emergency_contacts_id, $data);
        }

        foreach ($this->{$this->model_name}->fields_insert as $key => $val) {
            $this->{$this->model_name}->fields_insert[$key] = (isset($this->web['request'][$key])) ? $this->web['request'][$key] : $val['value'];
        }
        $this->{$this->model_name}->fields_insert['is_archived'] = '0';
        if ($this->{$this->model_name}->save_record(0, $this->{$this->model_name}->fields_insert)) {
            $return['status'] = 'success';
            $return['message'] = "Emergency Contact saved successfully";
            $return['task'] = 'edit';
            $return['response']['id'] = ($users_emergency_contacts_id > 0) ? $users_emergency_contacts_id : $this->{$this->model_name}->last_insert_id;
            $return['response']['users_emergency_contacts_id'] = $this->{$this->model_name}->last_insert_id;
            $return['response']['relation'] = $this->web['request']['relation'];
            $return['response']['full_name'] = $this->web['request']['full_name'];
            $return['response']['contact_no'] = $this->web['request']['contact_no'];
            $return['response']['task'] = ( $users_emergency_contacts_id == 0 ) ? "add" : "edit";
            echo json_encode($return);
            exit;
        }
    }

    public function forgotPassword() {
        if (!isset($this->web['request']['email_id']) || !isset($this->web['request']['task'])) {
            $return['status'] = 'failed';
            $return['message'] = "Please provide Email ID";
            $return['task'] = $this->web['request']['task'];
            $return['state'] = "1001";
            echo json_encode($return);
            exit;
        }
        $official_email = $this->web['request']['email_id'];
        $rows = $this->getUserByEmailID($official_email);
        if (!empty($rows)) {
            if (count($rows) > 1) {
                $return['status'] = 'failed';
                $return['message'] = "Something went wrong. Email could not be sent. Please Contact to Admin to Reset Password";
                $return['task'] = $this->web['request']['task'];
                $return['state'] = "1001";
                echo json_encode($return);
                exit;
            }
            if (isset($rows[0]['user_id'])) {
                $user_id = $rows[0]['user_id'];
                $name = $rows[0]['first_name'] . " " . $rows[0]['middle_name'] . " " . $rows[0]['last_name'];
                //$from = $this->getAdminEmailID();
                $from = 'admin@bimsym.com';
                if ($from) {
                    $expires = strtotime('+10 Minutes');
                    $token = base64_encode($official_email);
                    $this->session->set_userdata('expires', $expires);
                    $this->session->set_userdata('token', $token);
                    $link = $this->url_reset_password . "?token=" . $token;
                    $subject = 'Reset Password Link :: BimSym HR  Management';
                    $body = '';
                    $body .= '<p> Dear ' . $name . ', </p>';
                    $body .= '<p>  </p>';
                    $body .= '<p> Please click <a href="' . $link . '"> here </a> or copy and past below link to browser to  reset your password. </p>';
                    $body .= '<p> URL : ' . $link . ' </p>';
                    $body .= '<p> This link will be expired after 10 Minutes. </p>';
                    $body .= '<p>  </p>';
                    $body .= '<p> You can contact us at ' . $from . ' for more assistance. </p>';
                    $body .= '<p>  </p>';
                    $body .= '<p>  </p>';
                    $body .= '<p>  </p>';
                    $body .= '<p> Thank you, </p>';
                    $body .= '<p> Team BimSym HR Management. </p>';
                    if ($this->sendEmail(trim($official_email), $from, $subject, $body)) {
                        $return['status'] = 'success';
                        //$return['message']=  " Reset password link has been sent to your official Email ID. Please check inbox.";
                        $return['message'] = " Please click this link to reset password. This link will be expired after 10 Minutes.";
                        $return['link'] = $link;
                        $return['token'] = $token;
                        $return['task'] = '';
                        echo json_encode($return);
                        exit;
                    } else {
                        $return['status'] = 'failed';
                        $return['message'] = "Something went wrong.Please Contact to Admin to Reset Password";
                        $return['state'] = "1001";
                        echo json_encode($return);
                        exit;
                    }
                }
            } else {
                $return['status'] = 'failed';
                $return['message'] = "Something went wrong.Please Contact to Admin to Reset Password";
                $return['state'] = "1001";
                echo json_encode($return);
                exit;
            }
        }
    }

    public function resetPassword() {
        if ($this->session->userdata('expires')) {
            $expires = $this->session->userdata('expires');

            if ($expires - (strtotime('now') ) < 1) {
                $return['status'] = 'failed';
                $return['message'] = "Your reset password link has been expired. Please try again";
                $return['state'] = "1001";
                $return['login_url'] = $this->login_url;
                echo json_encode($return);
                exit;
            }
            $official_email = base64_decode($this->session->userdata('token'));

            $rows = $this->getUserByEmailID($official_email);
            if (!empty($rows)) {
                if (count($rows) > 1) {
                    $return['status'] = 'failed';
                    $return['message'] = "Something went wrong.Please Contact to Admin to Reset Password";
                    $return['task'] = $this->web['request']['task'];
                    $return['login_url'] = $this->login_url;
                    $return['state'] = "1001";
                    echo json_encode($return);
                    exit;
                }
                if (isset($rows[0]['user_id'])) {
                    $this->load->model('users_model');
                    $data = array();
                    $data['password'] = MD5(trim($this->web['request']['password']));
                    $data['token'] = '';
                    if (!$this->users_model->save_record($rows[0]['user_id'], $data)) {
                        $return['status'] = 'failed';
                        $return['message'] = "Something went wrong.Please contact to admin to reset password";
                        $return['task'] = $this->web['request']['task'];
                        $return['state'] = "1001";
                        echo json_encode($return);
                        exit;
                    }
                    $return['status'] = 'success';
                    $return['message'] = "Password reset successfully";
                    $return['task'] = '';
                    $return['state'] = "200";
                    $return['login_url'] = $this->login_url;
                    echo json_encode($return);
                    exit;
                } else {
                    $return['status'] = 'failed';
                    $return['message'] = "Something went wrong.Please contact to admin to reset password";
                    $return['task'] = $this->web['request']['task'];
                    $return['state'] = "1001";
                    $return['login_url'] = $this->login_url;
                    echo json_encode($return);
                    exit;
                }
            }
            // Getting Admin Email ID
        }
    }

    private function getUserByEmailID($official_email) {

        $this->model_name = 'users_officials_model';
        $this->load->model($this->model_name);
        $this->{$this->model_name}->table_properties['cross_fields']['username'] = array(
            'caption' => array('username', 'username', 'username Employee'),
            'type' => 'varchar',
            'len' => 100,
            'value' => null,
            'in_select' => 1,
            'in_insert' => 0,
            'modified' => ' users.username as username'
        );
        $this->{$this->model_name}->table_properties['cross_fields']['first_name'] = array(
            'caption' => array('first_name', 'first_name', 'first_name Employee'),
            'type' => 'varchar',
            'len' => 100,
            'value' => null,
            'in_select' => 1,
            'in_insert' => 0,
            'modified' => ' users.first_name as first_name'
        );
        $this->{$this->model_name}->table_properties['cross_fields']['middle_name'] = array(
            'caption' => array('middle_name', 'middle_name', 'middle_name Employee'),
            'type' => 'varchar',
            'len' => 100,
            'value' => null,
            'in_select' => 1,
            'in_insert' => 0,
            'modified' => ' users.middle_name as middle_name'
        );
        $this->{$this->model_name}->table_properties['cross_fields']['last_name'] = array(
            'caption' => array('last_name', 'last_name', 'last_name Employee'),
            'type' => 'varchar',
            'len' => 100,
            'value' => null,
            'in_select' => 1,
            'in_insert' => 0,
            'modified' => ' users.last_name as last_name'
        );
        $this->{$this->model_name}->table_properties['cross_fields']['active_status'] = array(
            'caption' => array('active_status', 'active_status', 'active_status Employee'),
            'type' => 'varchar',
            'len' => 100,
            'value' => null,
            'in_select' => 1,
            'in_insert' => 0,
            'modified' => ' users.active_status as active_status'
        );

        $this->{$this->model_name}->table_properties['join_tables'][] = array('users', 'users.id = users_officials.user_id AND users.active_status = 1 ', 'left');
        $this->{$this->model_name}->setCols();
        $this->{$this->model_name}->setJoins();
        $this->{$this->model_name}->ci_where = array();
	   $this->{$this->model_name}->ci_where["users_officials.official_email"] = $official_email;
        $rows = $this->{$this->model_name}->getAll();
        return $rows;
    }

    public function getDepartmentIdByPositionId() {
        if (!isset($this->web['request']['position_id'])) {
            $return['status'] = 'failed';
            $return['message'] = "Something went wrong. Department Not  Found";
            $return['state'] = "404";
            echo json_encode($return);
            exit;
        }
        if (isset($this->web['request']['position_id']) && $this->web['request']['position_id'] > 0) {
            $this->model_name = 'positions_model';
            $this->load->model($this->model_name);
            $row = $this->{$this->model_name}->getById($this->web['request']['position_id']);
            if (!empty($row)) {
                $department_id = $row['department_id'];
                $return['status'] = 'success';
                $return['message'] = " Found Department Name";
                $return['state'] = "200";
                $return['response'] = array('department_id' => $department_id);
                echo json_encode($return);
                exit;
            }
        }
    }

    public function deleteRecord() {
        if (!isset($this->web['request']['id'])) {
            $return['status'] = 'failed';
            $return['message'] = "Something went wrong. Please try again later";
            $return['state'] = "404";
            echo json_encode($return);
            exit;
        }
        $this->web['request']['id'] = base64_decode($this->web['request']['id']);
        $model = 'users';
        $where = $model . ".user_id=" . $this->web['request']['id'] . " ";
        $this->loadModel($model);
        $data['is_archived'] = '1';
        $data['active_status'] = '0';
        if ($this->{$this->model_name}->softDelete($this->web['request']['id'], $data)) {
            $data = array('is_archived' => '1');
            $this->loadModel('users_addresses', true);
            $this->{$this->model_name}->getAllId();
            if (!empty($this->{$this->model_name}->ids)) {
                foreach ($this->{$this->model_name}->ids as $id) {
                    $this->{$this->model_name}->softDelete($id, $data);
                }
            }

            $this->loadModel('users_applications', true);
            $this->{$this->model_name}->getAllId();
            if (!empty($this->{$this->model_name}->ids)) {
                foreach ($this->{$this->model_name}->ids as $id) {
                    $this->{$this->model_name}->softDelete($id, $data);
                }
            }

            $this->loadModel('users_banks', true);
            $this->{$this->model_name}->getAllId();
            if (!empty($this->{$this->model_name}->ids)) {
                foreach ($this->{$this->model_name}->ids as $id) {
                    $this->{$this->model_name}->softDelete($id, $data);
                }
            }

            $this->loadModel('users_contacts', true);
            $this->{$this->model_name}->getAllId();
            if (!empty($this->{$this->model_name}->ids)) {
                foreach ($this->{$this->model_name}->ids as $id) {
                    $this->{$this->model_name}->softDelete($id, $data);
                }
            }


            $this->loadModel('users_personals', true);
            $this->{$this->model_name}->getAllId();
            if (!empty($this->{$this->model_name}->ids)) {
                foreach ($this->{$this->model_name}->ids as $id) {
                    $this->{$this->model_name}->softDelete($id, $data);
                }
            }

            $this->loadModel('users_documents', true);
            $this->{$this->model_name}->getAllId();
            if (!empty($this->{$this->model_name}->ids)) {
                foreach ($this->{$this->model_name}->ids as $id) {
                    $this->{$this->model_name}->softDelete($id, $data);
                }
            }

            $this->loadModel('users_educational_qualifications', true);
            $this->{$this->model_name}->getAllId();
            if (!empty($this->{$this->model_name}->ids)) {
                foreach ($this->{$this->model_name}->ids as $id) {
                    $this->{$this->model_name}->softDelete($id, $data);
                }
            }

            $this->loadModel('users_emergency_contacts', true);
            $this->{$this->model_name}->getAllId();
            if (!empty($this->{$this->model_name}->ids)) {
                foreach ($this->{$this->model_name}->ids as $id) {
                    $this->{$this->model_name}->softDelete($id, $data);
                }
            }

            $this->loadModel('users_employers', true);
            $this->{$this->model_name}->getAllId();
            if (!empty($this->{$this->model_name}->ids)) {
                foreach ($this->{$this->model_name}->ids as $id) {
                    $this->{$this->model_name}->softDelete($id, $data);
                }
            }

            $this->loadModel('users_expenses', true);
            $this->{$this->model_name}->getAllId();
            if (!empty($this->{$this->model_name}->ids)) {
                foreach ($this->{$this->model_name}->ids as $id) {
                    $this->{$this->model_name}->softDelete($id, $data);
                }
            }

            $this->loadModel('users_family', true);
            $this->{$this->model_name}->getAllId();
            if (!empty($this->{$this->model_name}->ids)) {
                foreach ($this->{$this->model_name}->ids as $id) {
                    $this->{$this->model_name}->softDelete($id, $data);
                }
            }

            $this->loadModel('users_id_proofs', true);
            $this->{$this->model_name}->getAllId();
            if (!empty($this->{$this->model_name}->ids)) {
                foreach ($this->{$this->model_name}->ids as $id) {
                    $this->{$this->model_name}->softDelete($id, $data);
                }
            }

            $this->loadModel('users_interviews', true);
            $this->{$this->model_name}->getAllId();
            if (!empty($this->{$this->model_name}->ids)) {
                foreach ($this->{$this->model_name}->ids as $id) {
                    $this->{$this->model_name}->softDelete($id, $data);
                }
            }

            $this->loadModel('users_officials', true);
            $this->{$this->model_name}->getAllId();
            if (!empty($this->{$this->model_name}->ids)) {
                foreach ($this->{$this->model_name}->ids as $id) {
                    $this->{$this->model_name}->softDelete($id, $data);
                }
            }

            $this->loadModel('users_personals', true);
            $this->{$this->model_name}->getAllId();
            if (!empty($this->{$this->model_name}->ids)) {
                foreach ($this->{$this->model_name}->ids as $id) {
                    $this->{$this->model_name}->softDelete($id, $data);
                }
            }

            $this->loadModel('users_positions', true);
            $this->{$this->model_name}->getAllId();
            if (!empty($this->{$this->model_name}->ids)) {
                foreach ($this->{$this->model_name}->ids as $id) {
                    $this->{$this->model_name}->softDelete($id, $data);
                }
            }

            $this->loadModel('users_references', true);
            $this->{$this->model_name}->getAllId();
            if (!empty($this->{$this->model_name}->ids)) {
                foreach ($this->{$this->model_name}->ids as $id) {
                    $this->{$this->model_name}->softDelete($id, $data);
                }
            }

            $this->loadModel('users_technical_skills', true);
            $this->{$this->model_name}->getAllId();
            if (!empty($this->{$this->model_name}->ids)) {
                foreach ($this->{$this->model_name}->ids as $id) {
                    $this->{$this->model_name}->softDelete($id, $data);
                }
            }

            $this->loadModel('users_training_centres', true);
            $this->{$this->model_name}->getAllId();
            if (!empty($this->{$this->model_name}->ids)) {
                foreach ($this->{$this->model_name}->ids as $id) {
                    $this->{$this->model_name}->softDelete($id, $data);
                }
            }

            $return['status'] = 'success';
            $return['message'] = "Record Deleted Successfully !";
            $return['state'] = "200";
            echo json_encode($return);
            exit;
        } else {
            $return['status'] = 'failed';
            $return['message'] = "Something went wrong with users data . Please try again later";
            $return['state'] = "404";
            echo json_encode($return);
            exit;
        }
    }

    public function getQualificatinsStreamFlag() {
        if (!isset($this->web['request']['qualifications_id'])) {
            $return['status'] = 'failed';
            $return['message'] = "Something went wrong. Please try again later";
            $return['state'] = "404";
            echo json_encode($return);
            exit;
        }
        $id = $this->web['request']['qualifications_id'];
        $row = $this->educational_qualifications_model->getById($id);
        if (!empty($row)) {
            $return['status'] = 'success';
            $return['message'] = "Record Get Successfully !";
            $return['state'] = "200";
            $return['response'] = array('stream_id' => $row['stream_id']);
            echo json_encode($return);
            exit;
        }
    }

    public function uploadDoc() {
        if (!isset($this->web['request']['id'])) {
            $return['status'] = 'failed';
            $return['message'] = "Something went wrong. Please try again later";
            $return['state'] = "404";
            echo json_encode($return);
            exit;
        }
        $this->web['request']['id'] = base64_decode($this->web['request']['id']);
        $file = $_FILES['document'];
        $file_detail = $this->uploadFile($this->web['request']['id'], $file, 'myfile');
        if (empty($file_detail)) {
            $return['status'] = 'failed';
            $return['message'] = "Something went wrong. Please try again later";
            $return['state'] = "404";
            echo json_encode($return);
            exit;
        }
        if (!empty($file_detail)) {
            $data = array();
            $data['user_id'] = $this->web['request']['id'];
            $data['document_id'] = $this->web['request']['document_id'];
            $data['document_path'] = $file_detail['path'];
            $data['is_archived'] = '0';
            $data['sort_order'] = '1';
            $data['created_at'] = date('y:m:d h:i:s');
            $data['created_by'] = $this->session->userdata['loggedin']['id'];
            $model = 'users_documents';
            $this->loadModel($model);
            $response = $this->{$this->model_name}->save_record(0, $data);
            if ($response) {
                $this->load->model('documents_model');
                $this->web['documents'] = $this->documents_model->getAllWithKeyValue();
                $return['status'] = 'success';
                $return['message'] = "Document Uploaded Successfully !";
                $return['state'] = "200";
                $data['document_type'] = $this->web['documents'][$data['document_id']];
                $data['user_documents_id'] = $this->{$this->model_name}->last_insert_id;
                $data['uploaded_on'] = date('M d Y');
                $return['response'] = $data;
                echo json_encode($return);
                exit;
            }
        }
    }

    private function uploadFile($user_id, $file, $lable) {
        $file_detail = array();
        $upload_path = 'uploads/';
        if (!empty($file['name'])) {
            $filename = $file['name'];
            $arr = explode('.', $filename);
            $arr = array_reverse($arr);
            $exts = array('gif', 'png', 'jpg', 'jpeg', 'docx', 'pdf');
            if (in_array($arr[0], $exts)) {
                $filename = $user_id . '_' . date('mdY') . '_' . $lable . '.' . $arr[0];
                if (move_uploaded_file($file['tmp_name'], $upload_path . $filename)) {
                    $file_detail['filename'] = $filename;
                    $file_detail['path'] = $upload_path . $filename;
                } else {
                    $file_detail['file_status'] = '0';
                    $file_detail['error_msg'] = 'File not uploaded! Please try again';
                }
            } else {
                $file_detail['file_status'] = '0';
                $file_detail['error_msg'] = 'Not Proper Extension';
            }
        }
        return $file_detail;
    }

    public function deleteDocument() {
        if (!isset($this->web['request']['id']) || !isset($this->web['request']['document_id'])) {
            $return['status'] = 'failed';
            $return['message'] = "Something went wrong. Please try again later";
            $return['state'] = "404";
            echo json_encode($return);
            exit;
        }
        $this->web['request']['id'] = base64_decode($this->web['request']['id']);
        $this->web['request']['document_id'] = base64_decode($this->web['request']['document_id']);
        $this->load->model('users_documents_model');
        $row = $this->users_documents_model->getById($this->web['request']['document_id']);
        if (!empty($row)) {
            $data = array('is_archived' => '1');
            if ($this->users_documents_model->softDelete($this->web['request']['document_id'], $data)) {
                 $this->users_documents_model->ci_where = array();
			  $this->users_documents_model->ci_where["users_documents.user_id"] = $this->web['request']['id'];
                 $this->users_documents_model->ci_where["users_documents.is_archived"] = '0';
                $rows = $this->users_documents_model->getAll();
                $return['status'] = 'success';
                $return['message'] = "Document removed successfully";
                $return['state'] = "200";
                $return['count'] = count($rows);
                echo json_encode($return);
                exit;
            }
        }
    }

    function updateSkills() {
        if (!isset($this->web['request']['id'])) {
            $return['status'] = 'failed';
            $return['message'] = "Something went wrong. Please try again later";
            $return['state'] = "404";
            echo json_encode($return);
            exit;
        }
        $this->web['request']['id'] = base64_decode($this->web['request']['id']);
        $data = array();
        if (isset($this->web['request']['skills']) && count($this->web['request']['skills']) > 0) {
            $skills = json_encode($this->web['request']['skills']);
            if (count($this->web['request']['skills']) > 0) {
                $this->load->model('skill_experts_model');

                foreach ($this->web['request']['skills'] as $arr) {
                    $this->skill_experts_model->ci_where = array();
                    $this->skill_experts_model->ci_where["skill_experts.user_id"] = $this->web['request']['id'];
                    $this->skill_experts_model->ci_where["skill_experts.skill_id"] =  $arr;
                    $row_arr = $this->skill_experts_model->getAll();
                    $id = 0;
                    if (count($row_arr) > 0) {
                        $id = $row_arr[0]['id'];
                    }
                    if ($id == 0) {
                        $data['added_on'] = date('Y:m:d');
                    }
                    $data['updated_on'] = date('Y:m:d');
                    $data['user_id'] = $this->web['request']['id'];
                    $data['skill_id'] = $arr;
                    $data['grade'] = 8;
                    $this->skill_experts_model->save_record($id, $data);
                }
            }
            $data = array();
            $data['user_id'] = $this->web['request']['id'];
            $users_skills_id = (isset($this->web['request']['users_skills_id'])) ? $this->web['request']['users_skills_id'] : 0;
            $data['skills'] = $skills;
            $data['is_archived'] = '0';
            if ($users_skills_id == 0) {
                $data['created_at'] = date('y:m:d h:i:s');
                $data['created_by'] = $this->session->userdata['loggedin']['id'];
            }
            $data['updated_on'] = date('y:m:d h:i:s');
            $data['updated_by'] = $this->session->userdata['loggedin']['id'];
            $model = 'users_skills';
            $this->loadModel($model);
            $response = $this->{$this->model_name}->save_record($users_skills_id, $data);
            if ($response) {
                $this->load->model('skills_model');
                $this->web['skills'] = $this->skills_model->getAllWithKeyValue();
                $data = '';
                if (count($this->web['request']['skills']) > 0) {
                    foreach ($this->web['request']['skills'] as $key => $val) {
                        $data .= '<div class="col-lg-3 tag">' . $this->web['skills'][$val] . '</div>';
                    }
                } else {
                    $data = 'No skill added';
                }
                $return['status'] = 'success';
                $return['message'] = "Skills Updated Successfully !";
                $return['state'] = "200";
                $return['response'] = $data;
                echo json_encode($return);
                exit;
            }
        }
    }

    private function getManagers() {
        $this->load->model('users_model');
        $this->users_model->ci_where['users.is_archived'] = '0';
        $this->users_model->ci_where_in['users.role_id'] = array('1','2','3','4','6','7','8','10');
        $rows = $this->users_model->getAll();
        if (!empty($rows)) {
            foreach ($rows as $manager) {
                $this->web['managers'][$manager['id']] = $manager['first_name'] . " " . $manager['last_name'] . "(" . $manager['initial'] . ")";
            }
        }
        if (empty($rows)) {
            $this->web['managers'] = array('0' => 'Not available');
        }
    }

    public function getNotification() {

        if (!isset($this->web['request']['id'])) {
            $return['status'] = 'failed';
            $return['message'] = "Something went wrong. Please try again later";
            $return['state'] = "404";
            echo json_encode($return);
            exit;
        }

        if (isset($this->web['request']['id'])) {
            $this->web['request']['id'] = base64_decode($this->web['request']['id']);
        }
        $user_id = $this->web['request']['user_id'];
        $role_id = $this->web['request']['role_id'];
        $module = $this->web['request']['module'];
        $method = 'getUpdateFor' . $module;
        $row = $this->{$method}($user_id, $role_id);
        if (!empty($row)) {
            $return['status'] = 'success';
            $return['message'] = "Skills Updated Successfully !";
            $return['state'] = "200";
            $return['response'] = $data;
            echo json_encode($return);
            exit;
        }
    }

    private function getUpdateForTrainigns($user_id, $role_id) {
        $return = '';
    }

    public function getInvitedEmployees() {
        if (!isset($this->web['request']['id'])) {
            $return['status'] = 'failed';
            $return['message'] = "Something went wrong. Please try again later";
            $return['state'] = "404";
            echo json_encode($return);
            exit;
        }
        $return = array();
        $data = array();
        if (isset($this->web['request']['id'])) {
            $this->web['request']['id'] = base64_decode($this->web['request']['id']);
            $this->load->model('trainings_model');
		  $this->trainings_model->ci_where = array();
            $this->trainings_model->ci_where["trainings.id"] = $this->web['request']['id'];
            $training = $this->trainings_model->getAll();
            if (!empty($training)) {
                $return['training_topic'] = $training[0]['training_topic_name'];
                $return['training_name'] = $training[0]['training_name'];
                $return['training_date'] = date('M d , Y', strtotime($training[0]['training_date']));
            }
            $this->load->model('users_trainings_model');
		  $this->users_trainings_model->ci_where	= array();
            $this->users_trainings_model->ci_where["users_trainings.training_id"] = $this->web['request']['id'];
            $rows = $this->users_trainings_model->getAll();
            if (count($rows) > 0) {
                foreach ($rows as $row) {
                    $data[] = $row['user_id'];
                }
            }
            if (!empty($data)) {
                $user_ids = implode(',', $data);
                $this->load->model('users_model');
                $this->users_model->where_in = array();
                $this->users_model->where_in["users.id"] = $data;
                $rows = $this->users_model->getAll();
                if (count($rows) > 0) {
                    $data = $rows;
                }
            }
            $return['status'] = 'success';
            $return['message'] = "Skills Updated Successfully !";
            $return['state'] = "200";
            $return['response'] = $data;
            echo json_encode($return);
            exit;
        }
    }

    public function uploadPic() {
        $return = array();
        if (!isset($this->web['request']['id'])) {
            $return['status'] = 'failed';
            $return['message'] = "Something went wrong. Please try again later";
            $return['state'] = "404";
            echo json_encode($return);
            exit;
        }
        $this->web['request']['id'] = base64_decode($this->web['request']['id']);
        $file = $_FILES['users_avatar'];
        $user_id = $this->web['request']['id'];
        $upload_path = 'uploads/userspics/';
        if (!empty($file['name'])) {
            $filename = $file['name'];
            $arr = explode('.', $filename);
            $arr = array_reverse($arr);
            $exts = array('png', 'jpg', 'jpeg');
            if (in_array($arr[0], $exts)) {
                $filename = $user_id . '_' . date('mdY_his') . '.' . $arr[0];
                if (move_uploaded_file($file['tmp_name'], $upload_path . $filename)) {
                    $fullpath = $upload_path . $filename;
                    $phototag = 1;
                } else {
                    $file_detail['file_status'] = '0';
                    $file_detail['error_msg'] = 'File not uploaded! Please try again';
                }
            } else {
                $file_detail['file_status'] = '0';
                $file_detail['error_msg'] = 'Not Proper Extension';
            }
        }
        $this->load->model('users_photos_model');
	   $this->users_photos_model->ci_where = array();
        $this->users_photos_model->ci_where["users_photos.user_id"] = $this->web['request']['id'];
        $rows = $this->users_photos_model->getAll();
        if (!empty($rows)) {
            foreach ($rows as $row) {
                $data = array();
                $data['is_archived'] = 1;
                $this->users_photos_model->save_record($row['id'], $data);
            }
        }
        $data = array();

        $data['user_id'] = $user_id;
        $data['users_photo_name'] = $filename;
        $data['phototag'] = $phototag;
        $data['fullpath'] = $fullpath;
        $data['updated_on'] = $this->web['request']['updated_on'];
        $data['updated_by'] = $this->web['request']['updated_by'];
        $data['is_archived'] = 0;
        $data['status'] = 1;
        $this->users_photos_model->save_record(0, $data);
        $loggedin = $this->session->userdata['loggedin'];
        $loggedin['avatar'] = $fullpath;
        $this->session->set_userdata('loggedin', $loggedin);
        $return['state'] = "404";
        $return['status'] = "success";
        $return['fullpath'] = $fullpath;
        echo json_encode($return);
        exit;
    }

    public function approveLeave() {
        if (!isset($this->web['request']['application_id'])) {
            $return['status'] = 'failed';
            $return['message'] = "Something went wrong. Please try again later";
            $return['state'] = "404";
            echo json_encode($return);
            exit;
        }

        $this->load->model('application_model_setups_model');
        $this->load->model('leave_types_model');
        $this->load->model('leave_actions_model');
        $this->web['leave_types'] = $this->leave_types_model->getAllWithKeyValue();
        $this->load->model('leave_applications_model');
        $data = array();
        $application_id = (int) $this->web['request']['application_id'];
        $applicant_id = $this->web['request']['applicant_id'];
        $next_status = $this->web['request']['next_status'];
        $data['status'] = $next_status;
        $data['updated_on'] = date('Y:m:d');
        if (isset($application_id) && isset($applicant_id) && $application_id > 0) {
            $updated = $this->leave_applications_model->save_record($application_id, $data);
            if ($updated) {
                if ($next_status == 1) {
                    $leave_detail = $this->leave_applications_model->getById($application_id);
                    $return_arr = $this->getManager($this->session->userdata['loggedin']['reporting_manager_id']);
                    $manager_id = $return_arr['manager_id'];
                    $next_status = 2;
                    $this->load->model('users_model');
                    $applicant_profile = $this->users_model->getById($applicant_id);
                    $reporting_manager_profile = $this->getReportingManagerProfile($this->session->userdata['loggedin']['reporting_manager_id']);
                    if ($reporting_manager_profile) {
                        $reporting_manager = $reporting_manager_profile['first_name'] . " " . $reporting_manager_profile['last_name'];
                        $to = $reporting_manager_profile['official_email'];
                        $token = rand(5000, 100000);
                        $query = 'task=view_leave&id=' . $application_id . '&manager=' . $reporting_manager_profile['id'] . '&call_action=pending_leaves&next_status=' . $next_status . '&applicant_id=' . $applicant_id . '&token=' . $token;
                        $link = $query;
                        $token = rand(5000, 100000);
                        $query = 'task=approve_leave&id=' . $application_id . '&manager=' . $reporting_manager_profile['id'] . '&call_action=pending_leaves&next_status=' . $next_status . '&applicant_id=' . $applicant_id . '&token=' . $token;
                        $link_cta = $query;
                        $response = $this->sendLeaveApplicationMail($reporting_manager, $to, $link, $link_cta, $applicant_profile, $leave_detail);
                        redirect('Dashboards');
                    }
                }
            }
        }
    }

    /*
      Getting Manager ID of Employee`s reporting  Manager`s ID
      Employee -> Reporting Manager ID -> Manager ID
     */

    private function getManager($reporting_manager_id) {
        $return_arr = array();
        $this->load->model('users_model');
        $row = $this->users_model->getById($reporting_manager_id);
        if (!empty($row)) {
            if ($row['role_id'] == '1') {
                $return_arr['next_status'] = 2;
                $return_arr['manager_id'] = $reporting_manager_id;
            } else {
                $return_arr['next_status'] = 1;
                $return_arr['manager_id'] = $row['reporting_manager_id'];
            }
        }
        return $return_arr;
    }

    private function getReportingManagerProfile($reporting_manager_id) {
        $row = array();
        $this->load->model('users_model');
        $row = $this->users_model->getById($reporting_manager_id);
        if (!empty($row)) {
            return $row;
        }
    }

    private function sendLeaveApplicationMail($reporting_manager, $to, $link, $link_cta, $applicant_profile, $leave_detail) {
	   return true;
        // $reporting_manager, $to, $link, $link_cta
        //$from = $this->getAdminEmailID();
        $from = 'admin@bimsym.com';
        $applicant = $applicant_profile['first_name'] . " " . $applicant_profile['middle_name'] . " " . $applicant_profile['last_name'];
        $leave_date = ( $leave_detail['days'] == 'more_than_one' ) ? "From " . date('M, d, Y', strtotime($leave_detail['leave_from'])) . " to " . date('M, d, Y', strtotime($leave_detail['leave_to'])) : " On " . date('M, d, Y', strtotime($leave_detail['leave_from']));
        if ($from) {
            $subject = 'New Leave Request From ' . $applicant . '  ' . $leave_date . '  :: BimSym HR  Management';
            $body = '';
            $body .= '<p> Dear ' . $reporting_manager . ', </p>';
            $body .= '<p> ' . $applicant . ' has applied for ' . $this->web['leave_types'][$leave_detail['leave_type_id']] . '. </p>';
            $body .= '<p> <b>Employee Code :</b> ' . $this->session->userdata['loggedin']['username'] . ' </p>';
            if ($leave_detail == 'more_than_one') {
                $body .= '<p> <b>From ' . date('M, d, Y', strtotime($leave_detail['leave_from'])) . ' to ' . date('M, d, Y', strtotime($leave_detail['leave_to'])) . ' </b>. </p>';
            }
            if ($leave_detail != 'more_than_one') {
                $body .= '<p> <b> Date </b> ' . date('M, d, Y', strtotime($leave_detail['leave_from'])) . ' ' . ucwords(str_replace('_', ' ', $leave_detail['days'])) . '. </p>';
            }
            $body .= '<p> </p>';
            $body .= '<p><b>Reason :</b></p>';
            $body .= '<p> ' . $leave_detail['leave_reason'] . ' </p>';

            $body .= '<p> Please click <a href="' . base_url() . 'index.php/Login/autoLoginAndRedirect?q=' . base64_encode($link) . '" target="_blank"> here </a> to view detail.</p>';
            $body .= '<p> Click  <a href="' . base_url() . 'index.php/Login/autoLoginAndRedirect?q=' . base64_encode($link_cta) . '" target="_blank" > here </a> to approve this leave request. </p>';
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

    public function viewRequisitionDetail() {
        $return = array();
        if (!isset($this->web['request']['id'])) {
            $return['status'] = 'failed';
            $return['message'] = "Something went wrong. Please try again later";
            $return['state'] = "404";
            echo json_encode($return);
            exit;
        }
        $this->web['request']['id'] = base64_decode($this->web['request']['id']);
        $this->load->model('project_requisitions_model');
        $row = $this->project_requisitions_model->getById($this->web['request']['id']);
        if (!empty($row)) {
            $return['status'] = 'success';
            $return['message'] = "Record found";
            $return['state'] = "200";
            $return['response'] = $row;
            echo json_encode($return);
            exit;
        }
    }
    public function deleteItem(){
		 if ( !isset($this->web['request']['id']) || !isset($this->web['request']['task']) || !isset($this->web['request']['remove_from'])) {
			$return['status'] = 'failed';
			$return['message'] = "Something went wrong. Please try again later";
			$return['state'] = "404";
			echo json_encode($return);
			exit;
		}
		$id = base64_decode($this->web['request']['id']);
		$task = base64_decode($this->web['request']['task']);
		$remove_from = base64_decode($this->web['request']['remove_from']);

		if($task != 'delete_record'){
			$return['status'] = 'failed';
			$return['message'] = "Something went wrong. Please try again later";
			$return['state'] = "404";
			echo json_encode($return);
			exit;
		}
		if($id  == 0 || $id  < 0 || !is_numeric($id)){
			$return['status'] = 'failed';
			$return['message'] = "Something went wrong. Please try again later";
			$return['state'] = "404";
			echo json_encode($return);
			exit;
		}
		if( strpos($remove_from, '_') === false){
			$return['status'] = 'failed';
			$return['message'] = "Something went wrong. Please try again later";
			$return['state'] = "404";
			echo json_encode($return);
			exit;
		}
		$table =  substr($remove_from, 4, strlen($remove_from));

		$this->load->model($table);
		$this->{$table}->id=$id;
		$this->{$table}->data= array('is_archived'=>'1');
		if($this->{$table}->removeItem()){
			$return['status'] = 'success';
			$return['message'] = "Record removed successfully";
			$return['state'] = "200";
			echo 'success';
			exit;
		}
   }
   public function undoItem(){
	   	if ( !isset($this->web['request']['id']) || !isset($this->web['request']['task']) || !isset($this->web['request']['undo_from'])) {
			$return['status'] = 'failed';
			$return['message'] = "Something went wrong. Please try again later";
			$return['state'] = "404";
			echo json_encode($return);
			exit;
		}
		$id = base64_decode($this->web['request']['id']);
		$task = base64_decode($this->web['request']['task']);
		$undo_from = base64_decode($this->web['request']['undo_from']);

		if($task != 'undo_record'){
			$return['status'] = 'failed';
			$return['message'] = "Something went wrong. Please try again later";
			$return['state'] = "404";
			echo json_encode($return);
			exit;
		}
		if($id  == 0 || $id  < 0 || !is_numeric($id)){
			$return['status'] = 'failed';
			$return['message'] = "Something went wrong. Please try again later";
			$return['state'] = "404";
			echo json_encode($return);
			exit;
		}
		if( strpos($undo_from, '_') === false){
			$return['status'] = 'failed';
			$return['message'] = "Something went wrong. Please try again later";
			$return['state'] = "404";
			echo json_encode($return);
			exit;
		}
		$table =  substr($undo_from, 4, strlen($undo_from));

		$this->load->model($table);
		$this->{$table}->id=$id;
		$this->{$table}->data= array('is_archived'=>'0');
		if($this->{$table}->removeItem()){
			$return['status'] = 'success';
			$return['message'] = "Record removed successfully";
			$return['state'] = "200";
			echo 'success';
			exit;
		}
   }
   public function viewincanvas(){
	  	if ( !isset($this->web['request']['id']) || !isset($this->web['request']['task']) ) {
			$return['status'] = 'failed';
			$return['message'] = "Something went wrong. Please try again later";
			$return['state'] = "200";
			echo 'failed';
			exit;
		}
		$id = base64_decode($this->web['request']['id']);
		$task = $this->web['request']['task'];
		$customer_id = $this->web['request']['customer_id'];
		if($task  == 'select_template'){
			$this->load->model('customer_templates_model');
			$this->customer_templates_model->ci_where = array();
			$this->customer_templates_model->ci_where['template_id'] = $id ;
			$this->customer_templates_model->ci_where['customers_id'] = $customer_id ;
			$rows = $this->customer_templates_model->getAll();
			if(!empty($rows)){
				$this->session->set_userdata('template_id',$id);
				$this->session->set_userdata('customer_id',$customer_id);
				$return['status'] = 'success';
				$return['message'] = "Template selected";
				$return['state'] = "200";
				echo 'success';
				exit;
			}
			if(empty($rows)){
					$data = array();
					$data['template_id'] = $id;
					$data['customer_id'] = $customer_id;
					$data['status'] = 1;
					$this->load->model('customer_templates_model');
					$this->customer_templates_model->save_record(0, $data);
					$this->session->set_userdata('template_id',$id);
					$this->session->set_userdata('customer_id',$customer_id);
					$return['status'] = 'success';
					$return['message'] = "Template selected";
					$return['state'] = "200";
					echo 'success';
					exit;
			}
		}
   }
   public function ontimelinkforstudentparent(){


	   if(isset($this->web['request']['student_id']) && $this->web['request']['student_id'] != ''){
			$student_id = base64_decode($this->web['request']['student_id']);
			$school_id = base64_decode($this->web['request']['school_id']);
			$task =$this->web['request']['task'];

			if($task == 'submitform'){

				$data = array();
				$dob = $this->web['request']['year'].':'.$this->web['request']['month'].':'.$this->web['request']['date'];
				$data['dob'] = $dob;
				$data['emergency_contact_no'] = $this->web['request']['emergency_contact_no'];
				$data['address'] = $this->web['request']['address'];
				$data['updated_on'] = date('Y:m:d h:i:s');
				$data['token'] = 'null';
				$this->load->model('students_model');
				$this->students_model->ci_where = array();
				if($this->students_model->save_record($student_id, $data)){
					$file = $_FILES['student_photo'];
					 $file_name = strtolower(str_replace(' ','',  $this->web['request']['full_name']));
					$file_detail = $this->uploadStudentPhoto($file, $student_id, $school_id, $file_name);
					if(!empty($file_detail) && isset($file_detail['path']) && $file_detail['path'] != ''){
						$this->load->model('student_photos_model');
						$data_arr = array();
						$data_arr['student_id'] = $student_id;
						$data_arr['school_id'] = $school_id;
						$data_arr['photo_of'] ='self';
						$data_arr['original'] = $file_detail['path'];
						 $this->students_model->savePhoto(0, $data_arr);
					}
				}
				redirect(base_url().'index.php/Ajax/thankyou');
			}

		}
		$this->load->model('students_model');
		$this->students_model->ci_where = array();
		$q= $this->web['request']['q'];

		$token = $q;
		$arr = explode("_",  $q);
		$mobile = base64_decode($arr[1]);
		$this->load->model('students_model');
		$this->students_model->ci_where = array();
		$this->students_model->ci_where['students.token'] = $token;
		$this->students_model->ci_where['users_contacts.contact_no'] = $mobile;
		$row = $this->students_model->getAll();
		if(count($row) > 1 ||  !isset($row[0])){
			redirect(base_url());
		}
		if($mobile == $row[0]['mobile_no']){
				$this->web['data'] = $row[0];
				//echo "<pre>";
				//print_r($this->web['data']);
				//echo "</pre>";
				//$this->load->view('layout/front/header',  $this->web);
				$this->load->view('ajax/ontimelinkforstudentparent',  $this->web);
				//$this->load->view('layout/front/footer',  $this->web);

		}


	}
	public function thankyou(){
		$this->load->view('layout/front/header',  $this->web);
		$this->load->view('ajax/thankyou',  $this->web);
		$this->load->view('layout/front/footer',  $this->web);
	}
	private function uploadStudentPhoto($file, $student_id,$school_id, $file_name) {
        $file_detail = array();
		$upload_path = 'uploads/templates/'.$school_id.'/students';
		if(!file_exists($upload_path)) mkdir($upload_path,0777, true);

        if (!empty($file['name'])) {
            $filename = $file['name'];
            $arr = explode('.', $filename);
            $arr = array_reverse($arr);
            $exts = array('jpg', 'jpeg');
            if (in_array($arr[0], $exts)) {
                $filename = $file_name. '_' . $student_id . '.' . $arr[0];
                if (move_uploaded_file($file['tmp_name'], $upload_path ."/". $filename)) {
                    $file_detail['filename'] = $filename;
                    $file_detail['path'] = $upload_path ."/". $filename;
                } else {
                    $file_detail['file_status'] = '0';
                    $file_detail['error_msg'] = 'File not uploaded! Please try again';
                }
            } else {
                $file_detail['file_status'] = '0';
                $file_detail['error_msg'] = 'Not Proper Extension';
            }
        }
        return $file_detail;
    }
    public function saveUsersCard(){
        $this->load->model('carts_model');
        echo "<pre>";print_r( $this->web['request']); echo "</pre>"; exit;
        //$this->carts_model->save_tamplate();
    }
    public function saveCustomersTemplate(){
        $return = array();
        $data=array();
        if(!isset($this->session->userdata['loggedin']['id'])){
            $return['status'] = 'failed';
            $return['message'] = "Something went wrong. Please try again later";
            $return['state'] = "404";
            echo json_encode($return);
            exit;
        }
        $this->load->model('customer_templates_model');
      
        $template_unique_id_prefix = false;
        if(isset($this->web['request']['task'])  &&  $this->web['request']['task'] == 'edit_template'){
            $id = $this->web['request']['id'];
        }else{
            $id = 0;
            $data['template_name'] =$this->web['request']['template_name'];
            $template_unique_id_prefix = 'TMPL000';
        }
       $arr_fields = (array) json_decode( $this->web['request']['fields']);
       $obj_canvas = json_decode( $this->web['request']['canvas']);
       /*  foreach( $obj_canvas->objects as $key => $obj_json ){
            if(isset($obj_json->id) ){
                $col_name = $obj_json->id;
                if(array_key_exists($col_name,$arr_fields) ){
                    $obj_json->fontFamily = $arr_fields[$col_name]->fontFamily;
                    $obj_json->fontSize = $arr_fields[$col_name]->fontSize;
                    $obj_json->fill = $arr_fields[$col_name]->fill;
                    $obj_json->fontStyle = $arr_fields[$col_name]->fontStyle;
                    if(isset($arr_fields[$col_name]->backgroundColor)){
                        $obj_json->backgroundColor = $arr_fields[$col_name]->backgroundColor;
                    }
                    if(isset($arr_fields[$col_name]->textAlign)){
                        $obj_json->textAlign = $arr_fields[$col_name]->textAlign;
                    }
                    if(isset($arr_fields[$col_name]->stroke)){
                        $obj_json->stroke = $arr_fields[$col_name]->stroke;
                    }
                    if(isset($arr_fields[$col_name]->clipTo)){
                        $obj_json->clipTo = $arr_fields[$col_name]->clipTo;
                    }
                    if(isset($arr_fields[$col_name]->underline) && $arr_fields[$col_name]->underline !== ''){
                        $obj_json->underline = 'true';
                    }else{
                        unset($obj_json->underline);
                    }
                   
                }
            }
            $obj_canvas->objects[$key] = $obj_json;
        } */
        $data['template_data_json'] = json_encode($obj_canvas);
        $data['templates_id'] = $this->web['request']['templates_id'];
        $data['template_svg'] = $this->web['request']['to_svg'];
        $data['template_fields'] = $this->web['request']['fields'];
        $data['template_variables'] = $this->web['request']['variables'];
        $data['products_id'] = $this->web['request']['product_id'];
        $data['date_time'] = date('y-m-d h:i:s');
        $data['customers_id'] = $this->session->userdata['loggedin']['customer_id'];
        
        $data['template_preferences'] = (isset($this->web['request']['preferences'])) ? json_encode($this->web['request']['preferences']) :'';
        $id = $this->customer_templates_model->save_record($id, $data);
        if( $id  == true ) {
            $return['status'] = 'success';
            $return['message'] = "Template saved successfully";
            $return['state'] = "200";
            $last_id = $this->customer_templates_model->last_insert_id;
            $return['encoded_id'] = base64_encode($last_id);
            if( $template_unique_id_prefix !== false){
                $data=array();
                $data['template_unique_id'] = $template_unique_id_prefix.$last_id;
                $this->customer_templates_model->save_record($last_id, $data);
            }
            echo json_encode($return);
        }else{
            $return['status'] = 'failed';
            $return['message'] = "Something went wrong. Please try again later";
            $return['state'] = "404";
            echo json_encode($return);
            exit;
        }
    }
    public function saveCustomersTemplateBackSide(){
        $return = array();
        if(!isset($this->session->userdata['loggedin']['id'])){
            $return['status'] = 'failed';
            $return['message'] = "Something went wrong. Please try again later";
            $return['state'] = "404";
            echo json_encode($return);
            exit;
        }
        $this->load->model('customer_templates_model');
        
        if(isset($this->web['request']['customer_templates_id'])){
            $customer_templates_id  = base64_decode($this->web['request']['customer_templates_id']);
            if($customer_templates_id === 0 || $customer_templates_id < 0 ){
                $return['status'] = 'failed';
                $return['message'] = "Something went wrong. Please try again later";
                $return['state'] = "404";
                echo json_encode($return);
                exit;
            }
        }
      
        $data = array();
        $data['template_data_json_back'] = $this->web['request']['canvas'];
        $data['template_svg_back'] = $this->web['request']['to_svg'];
        $data['template_fields_back'] = $this->web['request']['fields'];
        $data['template_variables_back'] = $this->web['request']['variables'];
        $id = $this->customer_templates_model->save_record($customer_templates_id, $data);
        if( $id  == true ) {
            $return['status'] = 'success';
            $return['message'] = "Template saved successfully";
            $return['state'] = "200";
            $return['encoded_id'] = base64_encode($this->customer_templates_model->last_insert_id);
            echo json_encode($return);
        exit;
        }else{
            $return['status'] = 'failed';
            $return['message'] = "Something went wrong. Please try again later";
            $return['state'] = "404";
            echo json_encode($return);
            exit;
        }
    }
	public function getProductPrice(){
		if ( !isset($this->web['request']['products_id']) || !isset($this->web['request']['task']) ) {
			$return['status'] = 'failed';
			$return['message'] = "Something went wrong. Please try again later";
			$return['state'] = "200";
			echo 'failed';
			exit;
		}
		$products_id = base64_decode($this->web['request']['products_id']);
		$task = $this->web['request']['task'];
		if($task  == 'get_base_price'){
			$this->load->model('product_prices_model');
			$this->product_prices_model->ci_where = array();
			$this->product_prices_model->ci_where['product_prices.products_id'] = $products_id;
			$this->product_prices_model->ci_where['product_prices.price_type'] = 'base';
			$row = $this->product_prices_model->getAll();
			if(count($row) > 0 ){
				$return['status'] = 'success';
				$return['message'] = "Price found";
				$return['state'] = "200";
				$return['price'] = $row[0]['price'];
				$return['id'] = $row[0]['id'];
				echo json_encode($return);
				exit;
			}else{
				$return['status'] = 'success';
				$return['message'] = "Price not found";
				$return['state'] = "200";
				$return['price'] = 0;
				$return['id'] = 0;
				echo json_encode($return);
				exit;
			}

		}

	}
	function savePrice(){
		if ( !isset($this->web['request']['products_id']) || !isset($this->web['request']['task'])  || !isset($this->web['request']['product_base_price']) || (isset($this->web['request']['product_base_price']) && $this->web['request']['product_base_price'] == '')) {
		$return['status'] = 'failed';
		$return['message'] = "Something went wrong. Please try again later";
		$return['state'] = "200";
		echo 'failed';
		exit;
	}
	$id = $this->web['request']['product_prices_id'];
	$products_id = base64_decode($this->web['request']['products_id']);
	$task = $this->web['request']['task'];
	if($task  == 'save_base_price'){
		$price = $this->web['request']['product_base_price'];
		$this->load->model('product_prices_model');
		if(isset($id) && $id > 0){
			$data = array();
			$data['price'] = $price;
			$data['updated_on'] = date('y:m:d h:i:s');
            $data['updated_by'] = $this->session->userdata['loggedin']['id'];
			$saved = $this->product_prices_model->save_record($id, $data);
			if($saved  == true ){
				$return['status'] = 'success';
				$return['message'] = "Price updated";
				$return['state'] = "200";
				echo json_encode($return);
				exit;
			}
		}else{
			$data = array();
			$data['products_id'] = $products_id;
			$data['price_type'] = 'base';
			$data['created_at'] = date('y:m:d h:i:s');
            $data['created_by'] = $this->session->userdata['loggedin']['id'];
			$data['price'] = $price;
			$saved = $this->product_prices_model->save_record(0, $data);
			if($saved  == true ){
				$return['status'] = 'success';
				$return['message'] = "Price saved";
				$return['state'] = "200";
				echo json_encode($return);
				exit;
			}
		}


	}
    }
    public function initiateCustomerPreferencesSession(){
        $icard = array();
        $icard['template_id'] = '';     // template id
        $icard['product_id'] = '';      // product id
        $icard['orientation'] =  $this->web['request']['orientation'];     // vertical or horizontal
        $icard['category'] = $this->web['request']['category'];        // student employee teacher marketing agent corporate identity consultant  
        $icard['card_type'] = $this->web['request']['card_type'];       // smart or chemical or shape 
        $icard['sides'] = '';           // signle or both 
        $icard['has_chip'] = '';        // with chip or without chip
        $icard['chip_type'] = '';       // Mifare or RFID
        $icard['finish'] = '';          // matt or glossy
        $icard['scanner'] = '';         // bar qr or both
        $this->session->set_userdata('icard', $icard);
    }
    public function saveCustomerPreferencesSession(){
        $icard = $this->session->userdata['icard'];
        if(isset($this->web['request']['key']) &&  isset($this->web['request']['value']) ){
            $icard[$this->web['request']['key']] =   $this->web['request']['value'];
        }
        $this->session->set_userdata('icard', $icard);
        echo "<pre>"; print_r($this->session->userdata['icard']); echo "</pre>"; exit;
    }

    public function checkUserName(){
       
        if(isset($this->web['request']['username']) ){
            $this->load->model('users_model');
            $this->users_model->ci_where = array();
            $this->users_model->ci_where["users.username"] = $this->web['request']['username'];
            $result = $this->users_model->getAll();
             if (count($result) > 0) {
                 echo "invalid";
             }
             if (empty($result) && count($result) == 0) {
                 echo "valid";
             }
             exit;
        }

    }
    public function uploadSheet(){
		$template_fields = json_decode($my_template['template_fields']);
		if(isset($template_fields[1]) && count($template_fields[1]) > 0 ){

			echo $template_fields[1][0];
		}
		$this->web['profile'] = $this->session->userdata['loggedin'];
		$template_name = strtolower(str_replace(' ','', $this->web['request']['template_name']));
		$template_id = $this->web['request']['template_id'];
        $customer_id = $this->web['profile']['customer_id'];
        $customer_type = $this->web['profile']['customer_type'];
		$customers_template_id = $this->web['request']['customers_template_id'];
		$file = $_FILES['student_data'];
		$file_name = $template_name."_".$template_id."_".$customer_id;
		$file_detail = $this->uploadFile($template_id, $file, $customer_id,$file_name);
		$this->load->library('excel_reader');
		$factory = new $this->excel_reader();
		$factory->filepath =$file_detail['path'];
		$obj = $factory->load();
		if($obj){
			$html = '<table>';
			foreach($obj->getWorksheetIterator() as $worksheet ){
				$max = $worksheet->getHighestRow();
				$data = array();
				$data_to_grab = array();
				$this->load->model('users_model');
				$this->load->model('users_contacts_model');
				$this->load->model('students_model');
				$this->load->model('id_cards_model');
				for($row=2;$row<=$max;$row++){
					$html .='<tr>';
					$name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$mobile= $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$std = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$div = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$hs = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$random_str = $this->generateRandomString(100)."_".base64_encode($mobile);
					$sms_link = base_url()."Schools/ontimelinkforstudentparent?q=".$random_str;

					$html .= '<td>'.$name.'</td>';
					$html .= '<td>'.$mobile.'</td>';
					$html .= '<td>'.$std.'</td>';
					$html .= '<td>'.$div.'</td>';
					$html .= '<td>'.$hs.'</td>';
					$html .='</tr>';
					$password = strtolower(str_replace(' ', '', trim( $name ) )). '@123';
					$password = md5($password);
					$username = strtolower(str_replace(' ', '', trim( $name ))).rand(50000,100000);
					$this->users_model->save_record(0, array('role_id'=>'9', 'username'=>$username,'password'=> $password));
					$user_id = $this->users_model->last_insert_id;
					$this->users_contacts_model->save_record(0, array('user_id'=>$user_id, 'contact_of'=>'father','contact_no'=>$mobile));
					$this->students_model->save_record(0, array('school_id'=>$customer_id, 'user_id'=>$user_id, 'full_name'=>$name, 'sms_link'=>$sms_link,'token'=>$random_str,'is_expired' => 0));
					$student_id = $this->students_model->last_insert_id;
					$std = (is_numeric($std)) ? $std : 0;
					$this->id_cards_model->save_record(0, array('standard_id'=>$std,'customer_id'=>$customer_id, 'customer_template_id'=>$customers_template_id, 'student_id'=> $student_id ,'user_id'=>$user_id,'class_id' =>$div, 'house_id'=>$hs,'template_id'=>$template_id ));
				}

			}
			$html .='</table>';
		 //echo $html;
		  echo '<br> Data read';
		  redirect(base_url().'index.php/Schools/myaccount#students');
		}

    }
    public function saveCustomersIdCards(){
        $return = array();
        $data=array();
        if(!isset($this->session->userdata['loggedin']['id'])){
            $return['status'] = 'failed';
            $return['message'] = "Something went wrong. Please try again later";
            $return['state'] = "404";
            echo json_encode($return);
            exit;
        }
        $this->load->model('users_model');
        $template_unique_id_prefix = false;
        $templates_id = $this->web['request']['templates_id'];
        $pwd = trim($this->web['request']['pwd']);
        $this->users_model->ci_where["users.id"] = $this->session->userdata['loggedin']['id'];
        $this->users_model->ci_where["users.username"] = $this->session->userdata['loggedin']['username'];
		$this->users_model->ci_where["users.password"] = md5($pwd);
		$this->users_model->ci_where["users.active_status"] = '1' ;
        $row = $this->users_model->getAll();
        if(empty($row)){
            $return['status'] = 'failed';
            $return['message'] = "Password does not matched. Please try again later";
            $return['state'] = "404";
            echo json_encode($return);
            exit;
        }
		if(!empty($row) && isset($row[0])){
            $this->web['profile'] = $this->session->userdata['loggedin'];
            if(is_array($this->web['profile'])){
                $this->load->model('customers_model');
                $customer = $this->customers_model->getById($this->web['profile']['customer_id']);
            }
            //echo $customer['customer_type'];
            $table = (isset($customer['customer_type']) && $customer['customer_type'] == 'school' )?'students':'customer_employees';
            $modelname = $table.'_model';
            $this->load->model($modelname);
            $this->{$modelname}->ci_where = array();
            //$this->{$modelname}->save_record();
            if( !empty($this->web['request']['icards']) ){
                $icards = (array) json_decode($this->web['request']['icards']);
                foreach($icards as $icard_id => $icard){
                    $data = array('status'=>'reviewed');
                    $this->{$modelname}->save_record($icard_id, $data);
                }
                    $return['status'] = 'success';
                    $return['message'] = "I cards saved saved";
                    $return['state'] = "200";
                    echo json_encode($return);
                    exit;
            }

        }

    }
    public function proceedOrderCustomersIdCards(){
        $return = array();
        $data=array();
        $order_templates_arr = array();
        if(!isset($this->session->userdata['loggedin']['id'])){
            $return['status'] = 'failed';
            $return['message'] = "Something went wrong. Please try again later";
            $return['state'] = "404";
            echo json_encode($return);
            exit;
        }
        $this->load->model('users_model');
        $template_unique_id_prefix = false;
        $templates_id = $this->web['request']['templates_id'];
       
            $this->web['profile'] = $this->session->userdata['loggedin'];
            if(is_array($this->web['profile'])){
                $this->load->model('customers_model');
                $customer = $this->customers_model->getById($this->web['profile']['customer_id']);
            }
            //echo $customer['customer_type'];
            $table = (isset($customer['customer_type']) && $customer['customer_type'] == 'school' )?'students':'customer_employees';
            $this->load->model('orders_model');
            //echo $this->orders_model->getNewOrderId('orders');;
            $data = array();
            $data['customers_id'] = $this->web['profile']['customer_id'];
            $data['order_no'] = $this->orders_model->getNewOrderId('orders');
            $data['order_date'] = date('Y-m-d h:i:s');
            $data['status'] = 0;
            $data['created_at'] = date('Y-m-d h:i:s');
            $data['created_by'] = $this->web['profile']['id'];
            $this->orders_model->save_record(0, $data);
            $last_orders_id = $this->orders_model->last_insert_id;
            $order_items = array();
            $modelname = $table.'_model';
            $this->load->model($modelname);
            
            //$this->{$modelname}->save_record();
            if( !empty($this->web['request']['icards']) ){
                $icards = (array) json_decode($this->web['request']['icards']);
                $unique_ids = (array) json_decode($this->web['request']['unique_ids']);
                $template_ids = (array) json_decode($this->web['request']['template_ids']);
                foreach($icards as $icard_id => $icard){
                    $data = array();
                    $this->{$modelname}->ci_where = array();
                    $just_row = $this->{$modelname}->getEntityById($icard_id);
                    $icard_json = (isset($just_row['icard_json']) && !empty($just_row['icard_json'])) ? $just_row['icard_json'] : '{}';
                    $reference_column = $table.'_id';
                    $reference_value = $just_row['id'];
                    $order_items[] = array(
                        'orders_id'=>$last_orders_id, 
                        'customers_id'=>$this->web['profile']['customer_id'],
                        'reference_column' =>$table.'_id',
                        'reference_value' => $just_row['id'],
                        'icard_json' => $icard_json,
                        'status' => 0);
                    $template_unique_id = $just_row['customer_templates_id'];
                    if( !array_key_exists($template_unique_id, $order_templates_arr) ){
                        $order_templates_arr[$template_unique_id] = array(
                            'orders_id'=>$last_orders_id, 
                            'templates_id'=>$template_ids['template_ids_'.$icard_id],
                            'template_unique_id'=>$unique_ids['template_unique_ids_'.$icard_id],
                        );
                    }    
                    $data = array('status'=>'ordered');
                    // updating i cards order status from  draft to ordered
                    $this->{$modelname}->save_record($icard_id, $data);
                }
                if(count($order_items)>0){
                    $this->load->model('order_items_model');
                    foreach($order_items as $order_item){
                        $this->order_items_model->ci_where = array();
                        $this->order_items_model->save_record(0, $order_item);
                    }
                    

                }
                if(count($order_templates_arr)>0){
                    $this->load->model('order_templates_model');
                    foreach($order_templates_arr as $order_template){
                        $this->order_templates_model->ci_where = array();
                        $this->order_templates_model->save_record(0, $order_template);
                    }
                }
                $return['status'] = 'success';
                $return['message'] = "I cards has been proceed for order";
                $return['state'] = "200";
                echo json_encode($return);
                exit;
            }

    }
    public function deleteCustomersSelectedRecords(){
        $this->load->model('users_model');
        $pwd = trim($this->web['request']['pwd']);
        $this->users_model->ci_where["users.id"] = $this->session->userdata['loggedin']['id'];
        $this->users_model->ci_where["users.username"] = $this->session->userdata['loggedin']['username'];
		$this->users_model->ci_where["users.password"] = md5($pwd);
		$this->users_model->ci_where["users.active_status"] = '1' ;
        $row = $this->users_model->getAll();
        if(empty($row)){
            $return['status'] = 'failed';
            $return['message'] = "Password does not matched. Please try again later";
            $return['state'] = "404";
            echo json_encode($return);
            exit;
        }
        $this->web['profile'] = $this->session->userdata['loggedin'];
        if(is_array($this->web['profile'])){
            $this->load->model('customers_model');
            $customer = $this->customers_model->getById($this->web['profile']['customer_id']);
        }
        //echo $customer['customer_type'];
        $table = (isset($customer['customer_type']) && $customer['customer_type'] == 'school' )?'students':'customer_employees';
        $_model_name = $table.'_model';
        $this->load->model($_model_name);
        $deleted = true;
        if( !empty($this->web['request']['icards']) ){
            $icards = (array) json_decode($this->web['request']['icards']);
            foreach($icards as $icard_id => $icard){
                $data = array('status'=>'reviewed');
                if($this->{$_model_name}->delete_row($table, 'id', $icard_id)){
                    $deleted = true;
                }else{
                    $deleted = false;
                    $return['status'] = 'failed';
                    $return['message'] = "Something went wrong. Please try again later";
                    $return['state'] = "404";
                    echo json_encode($return);
                    exit;
                }
            }
        }
		if($deleted == true){
            $return['status'] = 'success';
            $return['message'] = "Records deleted successfully";
            $return['state'] = "200";
            echo json_encode($return);
            exit;
        }		
    }
}
