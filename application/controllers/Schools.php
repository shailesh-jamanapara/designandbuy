<?php

ini_set('display_errors', 0);

class Schools Extends Vect_Controller {

    public $web = array();
    private $model_name;
    private $_model;
    private $rules = array();
    private $other_model;
	private $school_id;
    public function __construct() {
        parent::__construct();
		$this->web['profile'] = false;
		$this->web['request'] = $this->request;
        if(isset($this->web['request']['q']) && $this->web['request']['q'] != ''){
			$redirect = base_url().'index.php/Ajax/ontimelinkforstudentparent?q='.$this->web['request']['q'];
			redirect($redirect);
		}
		if(!isset($this->session->userdata['loggedin']['id'])){
			redirect(base_url());
		}
		
		$this->web['states'] 	= array();
		$this->web['cities'] 	= array();
		$this->web['mediums'] 	= array();
		$this->web['types'] 	= array();
		$this->web['departments'] 	= array();
		//states
		$this->web['states'][1] = 'Gujarat';
		//cities
		$this->web['cities'][1] = 'Ahmedabad';
		$this->web['cities'][2] = 'Gandhinagar';
		$this->web['cities'][3] = 'Mehsana';
		$this->web['cities'][4] = 'Baroda';
		$this->web['cities'][5] = 'Surat';
		//school mediums
		$this->web['mediums']['english'] 	= 'English' ;
		$this->web['mediums']['hindi'] 	= 'Hindi' ;
		$this->web['mediums']['gujarati'] 	= 'Gujarati' ;
		// school type
		$this->web['types']['pre-primary'] = 'Pre-primary';
		$this->web['types']['primary'] = 'Primary';
		$this->web['types']['secondary'] = 'Secondary';
		$this->web['types']['higher-secondary'] = 'Higher-secondary';
		// departments
		$this->web['departments'][1] = 'Head of School';
		$this->web['departments'][2] = 'Primary Teachers';
		$this->web['departments'][3] = 'Secondary Teachers';
		$this->web['departments'][4] = 'Higher-secondary Teachers';
		$this->web['departments'][5] = 'Account';
		$this->web['departments'][6] = 'Registrar';
		$this->web['attributes'] = $this->loadTemplateAttributeName();
	
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
        $this->web['postdata']['sort_by'] = (isset($this->web['request']['sort_by'])) ? $this->web['request']['sort_by'] : $this->_model . '.school_name';
        $this->web['postdata']['order_type'] = (isset($this->web['request']['order_type'])) ? $this->web['request']['order_type'] : 'ASC';
        $this->web['search'][$this->_model . '.school_name'] = 'School name';
        $this->web['search'][$this->_model . '.type_of_school'] = 'Medium';
        $this->web['search'][$this->_model . '.phone'] = 'Phone';
        $this->web['search'][$this->_model . '.status'] = 'Status';
	    $this->{$this->model_name}->ci_where_like = array();	
        if (isset($this->web['request']['search_by']) && $this->web['request']['search_by'] != '') {
            $this->{$this->model_name}->ci_where_like[$this->web['request']['search_by']] = $this->web['request']['search_for'];
        }
    }	

    public function index() {
        //$config = array('paths' => TWIG_TEMPLATE_PATH_ADMIN, 'cache' => APPPATH . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . 'cache');
        //$this->load->library('twig', $config);
        //$this->initLoad();
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
		$school_id = $this->session->userdata['loggedin']['id'];
		redirect(base_url().'index.php/Schools/profile?id='.$school_id );
        $rand = rand(500, 10000);
       $this->general_model->load_front_view($this->web);
    }
	 public function myaccount() {
        //$config = array('paths' => TWIG_TEMPLATE_PATH_ADMIN, 'cache' => APPPATH . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . 'cache');
        //$this->load->library('twig', $config);
        //$this->initLoad();
		
        /*
		$result = $this->{$this->model_name}->getAll($this->web['postdata']['page'], $this->web['postdata']['limit'], array('sort_by' => $this->web['postdata']['sort_by'], 'order_type' => $this->web['postdata']['order_type']));
        if ($result) {
            $this->web['rows'] = $result;
        } else {
            $this->web['rows'] = array();
        }
		*/
		$this->web['rows'] = array();
		$this->web['school_templates'] = array();
		$this->web['profile'] = $this->session->userdata['loggedin'];
		//echo "<pre>";print_r($this->web['profile'] ); exit;
		$this->web['profile']['department_name'] = $this->web['departments'][$this->web['profile']['department_id']];
		if(is_array($this->web['profile'])){
			$this->load->model('customers_model');
			$customer = $this->customers_model->getById($this->web['profile']['customer_id']);
			$this->web['profile']['customer_name'] = $customer['customer_name']; 
			$this->web['profile']['registration_no'] = $customer['registration_no']; 
			$this->web['profile']['email'] = $customer['email']; 
			$this->web['profile']['website'] = $customer['website'];
			
			// getting address 
			$this->load->model('customer_addresses_model');
			$this->customer_addresses_model->ci_where = array();
			$this->customer_addresses_model->ci_where['customer_id'] = $this->web['profile']['customer_id'];
			$row = $this->customer_addresses_model->getAll();
			if(!empty($row) && $row[0]['customer_id'] == $this->web['profile']['customer_id']){
				$this->web['profile']['address'] = $row[0]['address'];
				$this->web['profile']['city'] = $this->web['cities'][$row[0]['city_id']];
				$this->web['profile']['state'] = $this->web['cities'][$row[0]['state_id']];
				$this->web['profile']['zipcode'] =  $row[0]['zipcode'];
			}
			
			// getting contact 
			$this->load->model('customer_contacts_model');
			$this->customer_contacts_model->ci_where = array();
			$this->customer_contacts_model->ci_where['customer_id'] = $this->web['profile']['customer_id'];
			$row = $this->customer_contacts_model->getAll();
			if(!empty($row) && $row[0]['customer_id'] == $this->web['profile']['customer_id']){
				$this->web['profile']['landline_no'] 	= $row[0]['landline_no'];
				$this->web['profile']['mobile_no'] 		= $row[0]['mobile_no'];
			}
			
			// getting selected template 
			$this->load->model('customer_templates_model');
			$this->customer_templates_model->ci_where = array();
			$this->customer_templates_model->ci_where['customer_id'] = $this->web['profile']['customer_id'];
			$rows = $this->customer_templates_model->getAll();
			if(!empty($rows) ){
				$this->load->model('templates_model');
				foreach($rows as $row){
					if(isset($row['template_id'])){
					$this->templates_model->ci_where = array();
					$arr = $this->templates_model->getById($row['template_id']);
					$json_to_arr = (array) json_decode($row['template_data_json']);
					$arr['preferences'] = $this->getPreference($json_to_arr);
					$arr['customers_template_id'] = $row['id'];
					$arr['template_data_json'] =$row['template_data_json'];
					$this->web['my_templates'][] = $arr ;
					if( $this->getMyIdCards( $this->web['profile']['customer_id'], $row['template_id'] ) ){
						$this->web['ordered'][]= $row['template_id'];
					}
				}
				}
			}
	
		}
		$this->web['students'] = $this->getAllStudents($this->web['profile']['customer_id']);
		
		if(isset($this->web['request']['view_page']) && $this->web['request']['view_page'] == 'a4'){
			$this->web['photos'] = $this->getAllPhotos($this->web['profile']['customer_id']);
			$this->web['completed'] = $this->getAllFilledStudents($this->web['profile']['customer_id']);
			$this->load->view('schools/popup_window',  $this->web);
		}else{
			$this->load->view('layout/front/header',  $this->web);
			//$this->load->view('layout/front/main_content', $data);
			$this->web['completed'] = $this->getAllFilledStudents($this->web['profile']['customer_id']);
			$this->load->view('schools/myaccount',  $this->web);
			$this->load->view('layout/front/footer',  $this->web);
		}
    }
    
	 public function idcards() {
       $this->web['rows'] = array();
		$this->web['profile'] = $this->session->userdata['loggedin'];
		if(is_array($this->web['profile'])){
			$this->load->model('customers_model');
			$customer = $this->customers_model->getById($this->web['profile']['customer_id']);
			$this->web['profile']['customer_name'] = $customer['customer_name']; 
			$this->web['profile']['registration_no'] = $customer['registration_no']; 
			$this->web['profile']['email'] = $customer['email']; 
			$this->web['profile']['website'] = $customer['website']; 
		}
        $this->load->view('layout/front/header',  $this->web);
        //$this->load->view('layout/front/main_content', $data);
        $this->load->view('schools/idcards',  $this->web);
		$this->load->view('layout/front/footer',  $this->web);
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
		  $this->{$this->model_name}->ci_where =array();	
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
        $this->load->model('departments_model');
        $this->web['departments'] = $this->departments_model->getAllWithKeyValue();
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
        foreach ($this->{$this->model_name}->fields_insert as $key => $val) {
            $this->{$this->model_name}->fields_insert[$key] = (isset($this->web['request'][$key])) ? $this->web['request'][$key] : $val['value'];
        }
        $data = $this->{$this->model_name}->fields_insert;
        $id = $this->{$this->model_name}->save_record($id, $data);
        return $id;
    }
	function loadTemplateAttributeName(){
		$rows = array();
		$this->load->model('attribute_options_model');
		$rows = $this->attribute_options_model->getAllWithKeyValue();
		return $rows;
	}
	private function getPreference($preference){
		$arr = array();
		if(isset($preference) && !empty($preference)){
		$arr['orientation'] =  array('label' => ucfirst($preference['orientation']), 'value' => $preference['orientation'], 'form_value' => $preference['orientation']);
			
		$arr['chemical_or_smart']  = array('label' => 'None', 'value'=>'',  'form_value' => '');
			if(isset($preference['chemical_or_smart'])){
					if(isset($preference['chemical_or_smart']->smart) && $preference['chemical_or_smart']->smart == 1){
						$arr['chemical_or_smart']  = array('label' => 'Smart Card', 'value'=>'16', 'form_value' => 'smart');
					}
					if(isset($preference['chemical_or_smart']->chemical) && $preference['chemical_or_smart']->chemical == 1){
						$arr['chemical_or_smart']  = array('label' => 'Chemical Card', 'value'=>'17', 'form_value' => 'chemical');
					}
					if(isset($preference['chemical_or_smart']->shape) && $preference['chemical_or_smart']->shape == 1){
						$arr['chemical_or_smart']  = array('label' => 'Shape Card', 'value'=>'24',  'form_value' => 'shape');
					}
			}
			$arr['card_type'] =  array('label' => 'Without Chip', 'value'=>'0',  'form_value' => 'simple');
			$arr['rfid_or_mifre'] =  array('label' => 'With Chip', 'value'=>'0',  'form_value' => '');
			if(isset($preference['card_type'])){
					if(isset($preference['card_type']->with_chip) && $preference['card_type']->with_chip == 1){
						if(isset($preference['rfid_or_mifre']->mifare) && $preference['rfid_or_mifre']->mifare == 1){
							$arr['card_type']  =  array('label' => '1 K MiFare', 'value'=>'19',   'form_value' => 'with_chip');
							$arr['rfid_or_mifre'] =  array('label' => '1 K MiFare', 'value'=>'19',  'form_value' => 'mifare');
						}
						if(isset($preference['rfid_or_mifre']->rfid) && $preference['rfid_or_mifre']->rfid == 1){
							$arr['card_type']  =  array('label' => '1 K MiFare', 'value'=>'19',   'form_value' => 'simple');
							$arr['rfid_or_mifre'] =  array('label' => 'RFID', 'value'=>'18',  'form_value' => 'rfid');
						}
					}
			}
			$arr['sides'] = array('label' => 'Single', 'value'=>'20',  'form_value' => 'single');
			if(isset($preference['sides'])){
					if(isset($preference['sides']->both) && $preference['sides']->both == 1){
						$arr['sides'] = array('label' => 'Both sides', 'value'=>'21',  'form_value' => 'both');
					}
			}
			$arr['scanner'] = array('label' => 'None', 'value'=>'',  'form_value' => '');
			if(isset($preference['scanner'])){
					if(isset($preference['scanner']->barcode) && $preference['scanner']->barcode == 1){
						$arr['scanner'] = array('label' => 'Barcode', 'value'=>'1',   'form_value' => 'barcode');
					}
			}
			if(isset($preference['scanner'])){
					if(isset($preference['scanner']->qrcode) && $preference['scanner']->qrcode == 1){
						$arr['scanner'] = array('label' => 'QR Code', 'value'=>'2',   'form_value' => 'qrcode');
					}
			}
			$arr['finish'] = array('label' => 'None', 'value'=>' ',   'form_value' => '');
			if(isset($preference['finish'])){
					if(isset($preference['finish']->glossy) && $preference['finish']->glossy == 1){
						$arr['finish'] = array('label' => 'Glossy', 'value'=>'3' ,   'form_value' => 'glossy');
					}
					if(isset($preference['finish']->matt) && $preference['finish']->matt == 1){
						$arr['finish'] = array('label' => 'Matt', 'value'=>'4' ,   'form_value' => 'matt');
					}
			}
		}
			return $arr;
	}
	public function downloadSample(){
		$fileName = 'uploads/samples/school_data.xlsx';
		ob_clean();
		//content type
		header('Content-type: application/vnd.ms-excel');
		//open/save dialog box
		header('Content-Disposition: attachment; filename=sample-sheet.xls');
		//read from server and write to buffer
		readfile($fileName);
	}
	public function uploadSheet(){
		$this->web['profile'] = $this->session->userdata['loggedin'];
		$template_name = strtolower(str_replace(' ','', $this->web['request']['template_name']));
		$template_id = $this->web['request']['template_id'];
		$customer_id = $this->web['profile']['customer_id'];
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
					$sms_link = base_url()."index.php/Schools/ontimelinkforstudentparent?q=".$random_str;
					
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
	private function uploadFile($template_id, $file, $customer_id, $file_name) {
        $file_detail = array();
		$upload_path = 'uploads/templates/'.$customer_id;
		if(!file_exists($upload_path)) mkdir($upload_path,0777, true);
        
        if (!empty($file['name'])) {
            $filename = $file['name'];
            $arr = explode('.', $filename);
            $arr = array_reverse($arr);
            $exts = array('.xlsx', 'xls');
            if (in_array($arr[0], $exts)) {
                $filename = $file_name. '_' . date('mdYhis') . '.' . $arr[0];
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
	private function getAllStudents($customer_id){
		$this->load->model('id_cards_model');
		$this->id_cards_model->ci_where = array();
		$this->id_cards_model->ci_where['id_cards.customer_id'] = $customer_id;
		$rows = $this->id_cards_model->getAll();
		return $rows ;
	}
	private function getAllFilledStudents($customer_id){
		$this->load->model('id_cards_model');
		$this->id_cards_model->ci_where = array();
		$this->id_cards_model->ci_where['id_cards.customer_id'] = $customer_id;
		$this->id_cards_model->ci_where['students.updated_on !='] = '0000-00-00 00:00:00';
		$rows = $this->id_cards_model->getAll();
		return $rows ;
	}
	public function ontimelinkforstudentparent(){
		$q= $this->web['request']['q']; 
		//echo $q;
		//echo base64_decode($q);
		$this->load->view('layout/front/header',  $this->web);
		$this->load->view('schools/ontimelinkforstudentparent',  $this->web);
		$this->load->view('layout/front/footer',  $this->web);
	}
	public function sendMessagesToParents(){
		$this->web['profile'] = $this->session->userdata['loggedin'];
		$this->school_id = $this->web['profile']['customer_id'];
		$this->sendMessages();
	}
	public function sendMessages(){
		
		$this->load->model('students_model');
		$this->students_model->ci_where = array();
		$this->students_model->ci_where['school_id'] = $this->school_id;
		$students = $this->students_model->getAll();
		if(count($students) > 0 ){
			$failed_arr = array();
			foreach( $students as $row ){
				$id = $row['id'];
				$name = $row['full_name'];
				$link = $row['sms_link'];
				$mobile = $row['mobile_no'];
				if($mobile != ''){
					$school_name = $row['school_name'];
					if($this->sendSMS($mobile, $link, $name, $school_name)){
						$expired = 1;
					}else{
						$expired = 2;
						$failed_arr[] = array('student_id'=>$id,'mobile'=>$mobile, 'name' => $name); 
					}
						$this->students_model->save_record($id, array('is_expired' => $expired));
				}else{
					$failed_arr[] = array('student_id'=>$id, 'name' => $name); 
				}
			}
			 $this->session->set_userdata('failed_arr',$failed_arr);
			echo "success";
			exit;
		}
		
	}
	private function getMyIdCards($customer_id, $template_id){
		$arr = array();
		$this->load->model('id_cards_model');
		$this->id_cards_model->ci_where = array();
		$this->id_cards_model->ci_where['id_cards.customer_id'] = $customer_id;
		$this->id_cards_model->ci_where['id_cards.template_id'] = $template_id;
		$rows = $this->id_cards_model->getAll();
		return ( count($rows) > 0 ) ? true : false;
	}
	private function getAllPhotos($customer_id){
		$arr = array();
		$this->load->model('student_photos_model');
		$this->student_photos_model->ci_where = array();
		$this->student_photos_model->ci_where['student_photos.school_id'] = $customer_id;
		$rows  = $this->student_photos_model->getAll();
		if(!empty($rows)){
			foreach($rows as $row){
				$arr[$row['student_id']] = $row['original'];
			}
		}
		return $arr;
	}
}
