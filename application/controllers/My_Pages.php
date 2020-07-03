<?php
ini_set("include_path", '/home/ej1gl7d95ont/php:' . ini_get("include_path") );
ini_set('display_errors', 0);

class My_Pages Extends Designandbuy_Controller {

    public $web = array();
    private $model_name;
    private $_model;
    private $rules = array();
    private $other_model;
	private $school_id;
	private $default_template_unique_id;
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
		$this->web['listpage_url'] = $this->listpage_url;
		$this->web['ajax_url'] = $this->ajax_url;
		$this->web['profile'] = $this->session->userdata['loggedin'];

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
        $this->web['postdata']['limit'] = (isset($this->web['request']['limit'])) ? $this->web['request']['limit'] : 100;
        $this->web['postdata']['sort_by'] = (isset($this->web['request']['sort_by'])) ? $this->web['request']['sort_by'] : $this->_model . '.id';
		$this->web['postdata']['order_type'] = (isset($this->web['request']['order_type'])) ? $this->web['request']['order_type'] : 'DESC';
		$this->web['postdata']['templates_id'] = (isset($this->web['request']['templates_id'])) ? $this->web['request']['templates_id'] : '';
		$this->web['postdata']['view_type'] = (isset($this->web['request']['view_type'])) ? $this->web['request']['view_type'] : 'list';
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
		//$school_id = $this->session->userdata['loggedin']['id'];
		//redirect(base_url().'index.php/Schools/profile?id='.$school_id );
        //$rand = rand(500, 10000);
       //$this->general_model->load_front_view($this->web);
	}
	public function data_upload() {
		$this->load->model('customer_templates_model');
        $this->web['total_records'] = '';
        $this->web['total_pages'] = '';
		$this->web['model']['new'] = base64_encode(0);
		$this->web['rows'] = array();
		$this->web['school_templates'] = array();
		$this->web['profile'] = $this->session->userdata['loggedin'];
		//echo "<pre>";print_r($this->web['profile'] ); exit;
		$this->web['profile']['department_name'] = $this->web['departments'][$this->web['profile']['department_id']];

		$school_id = $this->session->userdata['loggedin']['id'];
		$id = base64_decode($this->web['request']['id']);
		$row = $this->customer_templates_model->getById($id);
		$this->web['my_template'] = $row;
		$rand = rand(500, 10000);
		$this->load->view('layout/front/header',  $this->web);
		$this->web['title'] = 'MY DATA';
		$this->web['sub_title'] = 'ACTION';
		$this->web['last_node'] = 'DATA UPLOAD';
			$this->web['completed'] = $this->getAllFilledStudents($this->web['profile']['customer_id']);
			$this->load->view('my_pages/user_pages_header',  $this->web);
			$this->load->view('my_pages/user_menu',  $this->web);
			$this->load->view('my_pages/data_upload',  $this->web);
			$this->load->view('my_pages/user_pages_footer',  $this->web);
			//$this->load->view('layout/front/main_content', $data);
			$this->load->view('layout/front/footer',  $this->web);

	}
	public function send_link() {
        //$config = array('paths' => TWIG_TEMPLATE_PATH_ADMIN, 'cache' => APPPATH . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . 'cache');
        //$this->load->library('twig', $config);
        //$this->initLoad();

		$this->web['profile'] = $this->session->userdata['loggedin'];
		//echo "<pre>";print_r($this->web['profile'] ); exit;
		$this->web['profile']['department_name'] = $this->web['departments'][$this->web['profile']['department_id']];

        $this->web['total_records'] = '';
        $this->web['total_pages'] = '';
        $this->web['model']['new'] = base64_encode(0);

		$school_id = $this->session->userdata['loggedin']['id'];

		$rand = rand(500, 10000);
		$this->web['title'] = 'MY DATA';
		$this->web['sub_title'] = 'ACTION';
		$this->web['last_node'] = 'DATA ENTRY VIA LINK';

		$this->load->view('layout/front/header',  $this->web);
			$this->web['completed'] = $this->getAllFilledStudents($this->web['profile']['customer_id']);
			$this->load->view('my_pages/user_pages_header',  $this->web);
			$this->load->view('my_pages/user_menu',  $this->web);
			$this->load->view('my_pages/send_link',  $this->web);
			$this->load->view('my_pages/user_pages_footer',  $this->web);
			//$this->load->view('layout/front/main_content', $data);
			$this->load->view('layout/front/footer',  $this->web);

    }
	 public function myaccount() {
		$this->web['rows'] = array();
		$this->web['school_templates'] = array();
		$this->web['profile'] = $this->session->userdata['loggedin'];
		
		$this->load->library('templates');
		//First need to provie customer id
		$this->templates->customers_ids_arr = array($this->web['profile']['customer_id']);
		// Now get cards and templates
		$this->templates->getIdCards();
		
		$this->_model = ($this->templates->customer_type === 'corporate')?'customer_employees':'students';
		$this->initLoad();
		$this->templates->request = $this->request;
		$this->templates->postdata = $this->web['postdata'];
		if(isset($this->templates->customer_type) && $this->templates->customer_type === 'school'){
			$upload_path = 'uploads/school/idcard_photos/'.$this->web['profile']['customer_id'].'/';
		}else{
			$upload_path = 'uploads/corporate/idcard_photos/'.$this->web['profile']['customer_id'].'/';
		}
		
		defined('UPLOAD_PHOTO_PATH') || define('UPLOAD_PHOTO_PATH', $upload_path);
		$this->templates->getData($this->templates->customer_type );
		$columns = $this->getTemplateFields($this->web['profile']['customer_id'], $this->templates->customer_type);
		
		if( !isset($this->templates->postdata['templates_id']) || ( isset($this->templates->postdata['templates_id']) && $this->templates->postdata['templates_id'] == '') ){
			$this->web['postdata']['templates_id'] = $this->templates->default_template_unique_id;
		}
		$this->web['my_templates'] = $this->templates->templates_arr[$this->web['profile']['customer_id']]['templates'];
		$this->templates->getColumnsAndCanvases();
		
		$this->web['template_type'] = (isset($this->web['my_templates'][$this->web['postdata']['templates_id']]['template_type']))?$this->web['my_templates'][$this->web['postdata']['templates_id']]['template_type']:array();
		$this->web['rows'] = (isset($this->templates->templates_arr[$this->web['profile']['customer_id']]['data']))?$this->templates->templates_arr[$this->web['profile']['customer_id']]['data']:array();
		
		$this->web['columns'] = $columns;
		$this->web['table_name'] = $this->templates->table_name;
		$this->web['profile']['department_name'] = $this->web['departments'][$this->web['profile']['department_id']];
		$this->web['total_records'] = $this->templates->total_records;
		$this->web['total_pages'] = $this->templates->total_pages;
	
		
		$this->web['title'] = 'MY DATA';
		$this->web['sub_title'] = 'ACTION';
		$this->web['last_node'] = 'DATA UPLOAD';
		
		if(isset($this->web['request']['view_page']) && $this->web['request']['view_page'] == 'a4'){
			$this->web['completed'] = $this->getAllFilledStudents($this->web['profile']['schools_id']);
			$this->load->view('my_pages/popup_window',  $this->web);
			return;
		}
		$viewname = (isset($customer['customer_type']) && $customer['customer_type'] == 'school' )?'my_pages/school/mydata':'my_pages/corporate/mydata';


		$this->load->view('layout/front/header',  $this->web);
		$this->load->view('layout/front/main_menu',  $this->web);
		$this->load->view('my_pages/user_pages_header',  $this->web);
		$this->load->view('my_pages/user_menu',  $this->web);
		$this->load->view('my_pages/user_data_menu',  $this->web);
		$this->load->view($viewname,  $this->web);
		
		$this->load->view('my_pages/user_pages_footer',  $this->web);
		
    }	
	 public function draftidcards() {
		
		if(isset($customer['customer_type']) && $customer['customer_type'] == 'school' ){
			$this->_model = 'temp_students';
			$this->initLoad();
			$rows = $this->school_id_cards('draft');
		}else{
			$this->_model = 'customer_employees';
			$this->initLoad();
			$rows = $this->corporate_id_cards('draft');
			
		}
		
		$temp_cards = array();
		if(!empty($rows)){
			$i = 0;
			$columns = array('customer_templates_id');
			foreach($rows as $row){
				$template_unique_id = $row['customer_templates_id'];
				$canvas = $this->getCustomerTemplate($this->web['profile']['customer_id'], $template_unique_id,  $row);
				if($i===0){
					if(count($row) > 0){
					$c=0;
						foreach($row as $col => $values){
							if( $values && $c > 4)	
								$columns[] =$col;
							$c++;
						}
					}

				}
				$row['idcard'] = $canvas[$template_unique_id];
				$temp_cards[] = $row;
				$i++;
			}
		}

		$this->web['rows'] = $temp_cards;
		$this->web['columns'] = (isset($columns) && count($columns)>0) ? $columns:array();
		//echo "<pre>";print_r($columns); echo"</pre>";

		$this->load->view('layout/front/header',  $this->web);
		$this->load->view('layout/front/main_menu',  $this->web);
	
		$this->load->view('my_pages/user_pages_header',  $this->web);
		$this->load->view('my_pages/user_menu',  $this->web);
		$this->load->view('my_pages/user_data_menu',  $this->web);
		$this->load->view('my_pages/draftidcards',  $this->web);
		$this->load->view('my_pages/user_pages_footer',  $this->web);
		//$this->load->view('layout/front/main_content', $data);
		//$this->load->view('layout/front/footer',  $this->web);
	}
	private function school_id_cards($status = 'draft'){
		$this->load->model('temp_students_model');
		$this->web['search']['temp_students.school_name'] = 'School name';
        $this->web['search']['temp_students.type_of_school'] = 'Medium';
        $this->web['search']['temp_students.phone'] = 'Phone';
        $this->web['search']['temp_students.status'] = 'Status';
		$this->temp_students_model->ci_where_like = array();
		$this->temp_students_model->ci_where = array();
        if (isset($this->web['request']['search_by']) && $this->web['request']['search_by'] != '') {
            $this->temp_students_model->ci_where_like[$this->web['request']['search_by']] = $this->web['request']['search_for'];
        }
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
		//echo $customer['customer_type'];
		if(isset($customer['customer_type']) && $customer['customer_type'] == 'school' ){
			// getting school details
				$this->load->model('schools_model');
				$this->schools_model->ci_where = array();
				$this->schools_model->ci_where['schools.customers_id'] = $this->web['profile']['customer_id'];
				$rows = $this->schools_model->getAll();
				if(!empty($rows) && $rows[0]['customers_id'] == $this->web['profile']['customer_id']){
					$this->web['profile']['schools_id'] = $rows[0]['id'];
					$this->web['completed'] = $this->getAllFilledStudents($this->web['profile']['schools_id']);
				}
		}
		$this->temp_students_model->ci_where['temp_students.customers_id'] =  $this->web['profile']['customer_id'];
		$rows = $this->temp_students_model->getAll($this->web['postdata']['page'], $this->web['postdata']['limit'], array('sort_by' => $this->web['postdata']['sort_by'], 'order_type' => $this->web['postdata']['order_type']));
		$this->web['total_records'] = $this->temp_students_model->total_records;
		$this->web['total_pages'] = $this->temp_students_model->total_pages;
		return $rows;
		
	}
	private function corporate_id_cards($status){
		$this->load->model('customer_employees_model');
		$this->web['search']['customer_employees.employee_name'] = 'Employee name';
        $this->web['search']['customer_employees.employee_code'] = 'Employee code';
        $this->web['search']['customer_employees.status'] = 'Status';
		$this->customer_employees_model->ci_where_like = array();
		$this->customer_employees_model->ci_where = array();
        if (isset($this->web['request']['search_by']) && $this->web['request']['search_by'] != '') {
            $this->customer_employees_model->ci_where_like[$this->web['request']['search_by']] = $this->web['request']['search_for'];
        }
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
		
		$this->customer_employees_model->ci_where['customer_employees.customers_id'] =  $this->web['profile']['customer_id'];
		if(isset($status )  && $status != '' ){
			$this->customer_employees_model->ci_where['customer_employees.status'] =  $status;
		}
		
		$rows = $this->customer_employees_model->getAll($this->web['postdata']['page'], $this->web['postdata']['limit'], array('sort_by' => $this->web['postdata']['sort_by'], 'order_type' => $this->web['postdata']['order_type']));
		$this->web['total_records'] = $this->customer_employees_model->total_records;
		$this->web['total_pages'] = $this->customer_employees_model->total_pages;
		return $rows;
		
	}
	public function idcards() {
		$this->web['rows'] = array();
		 $this->web['profile'] = $this->session->userdata['loggedin'];
		 
		 $this->load->library('templates');
		//First need to provie customer id
		$this->templates->customers_ids_arr = array($this->web['profile']['customer_id']);
		// Now get cards and templates
		$this->templates->getIdCards();
		$this->_model = ($this->templates->customer_type === 'corporate')?'customer_employees':'students';
		$this->initLoad();
		$this->templates->request = $this->request;
		$this->templates->postdata = $this->web['postdata'];
		if(isset($this->templates->customer_type) && $this->templates->customer_type === 'school'){
			$upload_path = 'uploads/school/idcard_photos/'.$this->web['profile']['customer_id'].'/';
		}else{
			$upload_path = 'uploads/corporate/idcard_photos/'.$this->web['profile']['customer_id'].'/';
		}

		defined('UPLOAD_PHOTO_PATH') || define('UPLOAD_PHOTO_PATH', $upload_path);
		$this->templates->status = 'draft';
		if(isset($this->request['SUB_ACTION'])){
			if(  $this->request['SUB_ACTION'] === 'reviewed')
				$this->templates->status = 'reviewed';
			if(  $this->request['SUB_ACTION'] === 'inprocess')
				$this->templates->status = 'inprocess';
			
		}
		$this->templates->getData($this->templates->customer_type );

		$columns = $this->getTemplateFields($this->web['profile']['customer_id'], $this->templates->customer_type);
		if( !isset($this->templates->postdata['templates_id']) || ( isset($this->templates->postdata['templates_id']) && $this->templates->postdata['templates_id'] == '') ){
			$this->web['postdata']['templates_id'] = $this->default_template_unique_id;
		}
		//echo "<pre> columns"; print_r($columns); echo "</pre>";
		
		if( !isset($this->templates->postdata['templates_id']) || ( isset($this->templates->postdata['templates_id']) && $this->templates->postdata['templates_id'] == '') ){
			$this->web['postdata']['templates_id'] = $this->templates->default_template_unique_id;
		}
		$this->web['my_templates'] = $this->templates->templates_arr[$this->web['profile']['customer_id']]['templates'];
		$this->web['template_type'] = (isset($this->web['my_templates'][$this->web['postdata']['templates_id']]['template_type']))?$this->web['my_templates'][$this->web['postdata']['templates_id']]['template_type']:array();
		//$this->templates->getColumnsAndCanvases();
		//echo "<pre>"; print_r($this->templates->templates_arr[$this->web['profile']['customer_id']]); echo "</pre>";
		$this->web['rows'] = (isset($this->templates->templates_arr[$this->web['profile']['customer_id']]['data']))?$this->templates->templates_arr[$this->web['profile']['customer_id']]['data']:array();
		$this->web['columns'] = (isset($columns[$this->web['postdata']['templates_id']]))? $columns[$this->web['postdata']['templates_id']] :  array();
		$this->web['table_name'] = $this->templates->table_name;
		 $this->web['profile']['department_name'] = $this->web['departments'][$this->web['profile']['department_id']];
		 $this->web['total_records'] = $this->templates->total_records;
		 $this->web['total_pages'] = $this->templates->total_pages;
		 $this->load->view('layout/front/header',  $this->web);
		 $this->load->view('layout/front/main_menu',  $this->web);
		 $this->load->view('my_pages/user_pages_header',  $this->web);
		 $this->load->view('my_pages/user_menu',  $this->web);
		 $this->load->view('my_pages/user_data_menu',  $this->web);
		 if(isset($this->request['SUB_ACTION'])){
			if($this->request['SUB_ACTION'] === 'reviewed'){
				$view_page = 'my_pages/idcards_reviewed';
			}elseif($this->request['SUB_ACTION'] === 'inprocess'){
				$view_page = 'my_pages/order_process';
			}
		 }else{
			$view_page = 'my_pages/idcards';
		 }
		 $this->load->view($view_page, $this->web);
		 $this->load->view('my_pages/user_pages_footer',  $this->web);
	 }
	function getCustomerTemplate($customers_id, $template_unique_id, $data_array = array()){
		$year = date('Y');
		$upload_qrcodes_path = UPLOADS_QRCODES_PATH.$customers_id;
		if(!file_exists($upload_qrcodes_path)) mkdir($upload_qrcodes_path,0777, true);
		$return = array();
		$this->load->library('image_lib');
		$this->load->model('customer_templates_model');
		$this->customer_templates_model->ci_where = array();
		$this->customer_templates_model->ci_where['customer_templates.customers_id'] =  $customers_id;
		$this->customer_templates_model->ci_where['customer_templates.template_unique_id'] =  $template_unique_id;
		$rows = $this->customer_templates_model->getAll();
		if(count($rows) > 0 ){
			$j=0;
			foreach($rows as $row){
				$variables_arr =  $row['template_variables'];
				
				// $variables_back_arr =  $row['template_variables_back']; 
				 $fields_arr =  (array) json_decode($row['template_fields']);
				// $fields_back_arr =  $row['template_fields_back'];
				$template_data_json = json_decode($row['template_data_json']);
				//echo "<pre> objects  ";print_r($template_data_json); echo "</pre>";
				$i=0;
				if(isset($template_data_json->objects) && !empty($template_data_json->objects)){
					$text_for_qr_code = '';
					if(!empty($data_array)){
						foreach($data_array as $data_item){
							if(strpos('uploads', $data_item) === false){
								$text_for_qr_code .= $data_item ." ";
							}
						}
					}
					foreach($template_data_json->objects as $key => $object){
						if($object->type === 'i-text'){
							
							if(isset($object->id) && strpos($object->id, 'control_') !== false){
								$temp_arr = explode('control_', $object->id);
								$obj_id = $temp_arr[1];
								if(array_key_exists($obj_id, $data_array)){
									//echo "<pre> data_json object <br>"; print_r($object); echo "</pre>";
									$template_data_json->objects{$i}->text =  $data_array[$obj_id];
									$template_data_json->objects{$i}->fill =  $fields_arr[$object->id]->fill;
									$template_data_json->objects{$i}->fontSize =  $fields_arr[$object->id]->fontSize;
									$template_data_json->objects{$i}->fontFamily =  $fields_arr[$object->id]->fontFamily;
									
									
								}
							}
							if(isset($object->id) && strpos($object->id, 'control_') === false){
								if(array_key_exists($object->id, $fields_arr)){
									//echo "<pre> data_json object <br>"; print_r($object); echo "</pre>";
									$template_data_json->objects{$i}->fill =  $fields_arr[$object->id]->fill;
									$template_data_json->objects{$i}->fontSize =  $fields_arr[$object->id]->fontSize;
									$template_data_json->objects{$i}->fontFamily =  $fields_arr[$object->id]->fontFamily;
									
								}
							}
							$template_data_json->objects{$i}->lockMovementX =  'true';
							$template_data_json->objects{$i}->lockMovementY =  'true';
						}
						if($object->type === 'image'){
							
							if(strpos($object->src, 'image_control_photo_1') !== false){
								$wd = $template_data_json->objects{$i}->width;
								$targetFile = str_replace('.', '_new.',$data_array['photo_1']);	
								$originalFile = $data_array['photo_1'];
								$img = $this->resize_photo($wd, $targetFile, $originalFile);
								$template_data_json->objects{$i}->src =base_url().'/'.$targetFile;
							}
							if(strpos($object->src, 'image_control_photo_2') !== false){
								$wd = $template_data_json->objects{$i}->width;
								$targetFile = str_replace('.', '_new.',$data_array['photo_2']);	
								$originalFile = $data_array['photo_2'];
								$img = $this->resize_photo($wd, $targetFile, $originalFile);
								$template_data_json->objects{$i}->src =base_url().'/'.$targetFile;
							}
							if(strpos($object->src, 'image_control_photo_3') !== false){
								$wd = $template_data_json->objects{$i}->width;
								$targetFile = str_replace('.', '_new.',$data_array['photo_3']);	
								$originalFile = $data_array['photo_3'];
								$img = $this->resize_photo($wd, $targetFile, $originalFile);
								$template_data_json->objects{$i}->src =base_url().'/'.$targetFile;
							}
							if(strpos($object->src, 'qrcode') !== false){
								$this->load->library('ciqrcode');
								$qr_image= rand().'.png';
								$params['data'] = $text_for_qr_code;
								$params['level'] = 'H';
								$params['size'] = 8;
								$params['savename'] = $upload_qrcodes_path.$qr_image;
								if($this->ciqrcode->generate($params))
								{
									$object->src= base_url().'/'. $upload_qrcodes_path.$qr_image;	
								}
							}
							$template_data_json->objects{$i}->lockMovementX =  'true';
							$template_data_json->objects{$i}->lockMovementY =  'true';
						}
						$i++;	 
					}
				}	
				$return[$template_unique_id] = str_replace("\r\n",'\r\n', json_encode($template_data_json));
				$j++;
			}
		}
		
		return $return;
	}
	private function xml2array( $xmlObject, $out = array () )
	{
		foreach ( (array) $xmlObject as $index => $node )
			$out[$index] = ( is_object ( $node ) ) ? self::xml2array ( $node ) : $node;

		return $out;
	}
	function resize_photo($newWidth, $targetFile, $originalFile) {

		$info = getimagesize($originalFile);
		$mime = $info['mime'];
	
		switch ($mime) {
				case 'image/jpeg':
						$image_create_func = 'imagecreatefromjpeg';
						$image_save_func = 'imagejpeg';
						$new_image_ext = 'jpg';
						break;
	
				case 'image/png':
						$image_create_func = 'imagecreatefrompng';
						$image_save_func = 'imagepng';
						$new_image_ext = 'png';
						break;
	
				case 'image/gif':
						$image_create_func = 'imagecreatefromgif';
						$image_save_func = 'imagegif';
						$new_image_ext = 'gif';
						break;
	
				default: 
						throw new Exception('Unknown image type.');
		}
	
		$img = $image_create_func($originalFile);
		list($width, $height) = getimagesize($originalFile);
	
		$newHeight = ($height / $width) * $newWidth;
		$tmp = imagecreatetruecolor($newWidth, $newHeight);
		imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
	
		if (file_exists($targetFile)) {
				unlink($targetFile);
		}
		$image_save_func($tmp, "$targetFile");
	}
	private function replaceSvgProperties($svg, $variables_array = array(), $flds = array()){
		$updated_svg = '';
		$arr_temp = json_decode(json_encode(simplexml_load_string($svg)), true);
		if(count($arr_temp) > 0 ){
			$return['template'] = array();
			$return['flds'] = array();
			if(isset($arr_temp['g'])){
				$i = 0;
				foreach($arr_temp['g'] as $attr_g){
					$attr_g = (array) $attr_g;
					if(count($attr_g) > 0 ){
						$element_id = '';
						$fld = $flds;
						
						foreach($attr_g as $key =>  $elements){
							$elements = (array) $elements;
							if( $key == '@attributes' ){
								if(isset($elements['id'])){
									$element_id = $elements['id'];	
								}
							}
							if($key === 'text'){
								$arr_temp = explode('control_',$element_id);
								if( isset($arr_temp[1])  &&  !empty($arr_temp[1]) ){
									$return['template'][] =  trim($elements['tspan']);
									$return['variable'][] = trim($variables_array[$arr_temp[1]]);
									$return['flds'][] = $flds[$element_id];////$fld[$arr_temp];
									
								}
							}
							//echo "<pre>"; print_r($elements); echo "</pre>";
						}
					}
					$i++;
				}
			}
		}
		//echo "<pre>"; print_r($return); echo "</pre>";
		if(!empty($return) && isset($return['template']) && count($return['template']) > 0  && isset($return['variable']) && count($return['variable']) > 0  ){
			$updated_svg = str_replace($return['template'], $return['variable'], $svg);
		}
		return $updated_svg;
	}
	private function replaceJsonProperties($json_str, $variables_array = array(), $flds = array()){
		$json_obj = (array) json_decode($json_str);
		return $json_obj;
		$updated_svg = '';
		$arr_temp = json_decode(json_encode(simplexml_load_string($svg)), true);
		if(count($arr_temp) > 0 ){
			$return['template'] = array();
			$return['flds'] = array();
			if(isset($arr_temp['g'])){
				$i = 0;
				foreach($arr_temp['g'] as $attr_g){
					$attr_g = (array) $attr_g;
					if(count($attr_g) > 0 ){
						$element_id = '';
						$fld = $flds;
						
						foreach($attr_g as $key =>  $elements){
							$elements = (array) $elements;
							if( $key == '@attributes' ){
								if(isset($elements['id'])){
									$element_id = $elements['id'];	
								}
							}
							if($key === 'text'){
								$arr_temp = explode('control_',$element_id);
								if( isset($arr_temp[1])  &&  !empty($arr_temp[1]) ){
									$return['template'][] =  trim($elements['tspan']);
									$return['variable'][] = trim($variables_array[$arr_temp[1]]);
									$return['flds'][] = $flds[$element_id];////$fld[$arr_temp];
									
								}
							}
							//echo "<pre>"; print_r($elements); echo "</pre>";
						}
					}
					$i++;
				}
			}
		}
		//echo "<pre>"; print_r($return); echo "</pre>";
		if(!empty($return) && isset($return['template']) && count($return['template']) > 0  && isset($return['variable']) && count($return['variable']) > 0  ){
			$updated_svg = str_replace($return['template'], $return['variable'], $svg);
		}
		return $updated_svg;
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
	public function importData(){
		$errors = $this->uploadSheet();
		if($errors){
			$this->web['profile'] = $this->session->userdata['loggedin'];
			$this->web['errors'] = $errors;
			$this->load->view('layout/front/header',  $this->web);
			$this->load->view('layout/front/main_menu',  $this->web);
			
			$this->load->view('my_pages/user_pages_header',  $this->web);
			$this->load->view('my_pages/user_menu',  $this->web);
			$this->load->view('my_pages/import_error',  $this->web);
			$this->load->view('my_pages/user_pages_footer',  $this->web);
		}
	}
	public function importImages(){
		$this->web['profile'] = $this->session->userdata['loggedin'];
		$this->load->model('customers_model');
		$customer = $this->customers_model->getById($this->web['profile']['customer_id']);
		$this->web['profile']['customer_type'] = $customer['customer_type'];
		$customer_id = $this->web['profile']['customer_id'];
		if(isset($_FILES['photoszip'])){
			$year = date('Y');
			if(isset($this->web['profile']['customer_type']) && $this->web['profile']['customer_type'] === 'school'){
				$upload_path = 'uploads/school/idcard_photos/'.$customer_id.'/';
			}else{
				$upload_path = 'uploads/corporate/idcard_photos/'.$customer_id.'/';
			}
			defined('UPLOAD_PHOTO_PATH') || define('UPLOAD_PHOTO_PATH', $upload_path);
			$file = $_FILES['photoszip'];
			if($this->uploadPhotosZipFile($file)){
				$this->load->view('layout/front/header',  $this->web);
				$this->load->view('layout/front/main_menu',  $this->web);
				$this->load->view('my_pages/user_pages_header',  $this->web);
				$this->load->view('my_pages/user_menu',  $this->web);
				$this->load->view('my_pages/user_data_menu',  $this->web);
				$this->load->view('my_pages/imported_successfully', $this->web);
				$this->load->view('my_pages/user_pages_footer',  $this->web);
			}
		 }
	}
	private function uploadSheet(){
		$error_message = array();
		$this->web['profile'] = $this->session->userdata['loggedin'];
		$customer_id = $this->web['profile']['customer_id'];
		$file = $_FILES['dataexcel'];
		$file_name = $this->web['profile']['customer_id'].rand(5000, 10000);
		$file_detail = $this->uploadFile($file, $customer_id,$file_name);

		$this->load->library('excel_reader');
		$factory = new $this->excel_reader();
		$factory->filepath =$file_detail['path'];
		$obj = $factory->load();
		$is_valid = true;
			if($obj){
				$template_ids = array();
				$highestCol =  $obj->setActiveSheetIndex(0)->getHighestColumn();
				$highestRow =  $obj->setActiveSheetIndex(0)->getHighestRow();
				$template_flds = array();
				if($highestRow > 0){
					for($i=1;$i<$highestRow+1;$i++){
							$columnRow = $highestCol.$i;
							$template_id =  $obj->getActiveSheet()->getCell($columnRow)->getValue();
							$template_ids[] = $template_id;
					}
				}
			}
			
			if(!empty($template_ids)){
				unset($template_ids[0]);
			}
			if(count($template_ids) == 0 ){
				return array('Please enter template ID(s) or other missing values in sheet');
			}
			$html = '<table>';
			$this->load->model('customer_templates_model');
			$template_variables = array();
			$template_variables_back = array();
			
			
			if(!empty($template_ids)){
				foreach($template_ids as $template_id){
					$template_id =  trim($template_id);
					$this->customer_templates_model->ci_where = array();
					$this->customer_templates_model->ci_where['customer_templates.template_unique_id'] = $template_id;
					$this->customer_templates_model->ci_where['customer_templates.customers_id'] = $customer_id;
					$rows = $this->customer_templates_model->getAll();
					
					if(!empty($rows)){
						foreach($rows as $row){
							$variable_json = null;
							if(isset($row['template_variables']) && ($row['template_variables'] !== ''  ||  $row['template_variables'] !== null )){
								$variable_arr = (array) json_decode($row['template_variables']);
								$temp_obj = json_decode($row['template_data_json']);
								$master_template_data_json[$template_id] = $temp_obj;
							}
							if(isset($row['template_variables_back']) && ($row['template_variables_back'] !== '' )){
								
								$variable_back_arr = (array) json_decode($row['template_variables_back']);
								$temp_obj_back =  json_decode($row['template_data_json_back']);
								$master_template_data_json_back[$template_id] = $temp_obj_back;
							}

							if( count($variable_arr) ){
								$flds_back_arr = array();
								if(isset($variable_back_arr) && count($variable_back_arr) > 0 ){
									foreach($variable_back_arr as $key => $val){
										$arr = explode('control_', $key);
										if(isset($arr[1]) && $arr[1] !== '' ){
											$flds_back_arr[] = $arr[1];
										}
									}
									$variable_arr = array_merge_recursive($variable_arr, $variable_back_arr);
								}
								$flds_arr = array();
								
								foreach($variable_arr as $key => $val){
									//$fld_name = key($variable_arr);
									$arr = explode('control_', $key);
									if(isset($arr[1]) && $arr[1] !== '' ){
										$flds_arr[] = $arr[1];
									}
								}
								
								if(!array_key_exists($template_id, $template_variables)){
									$template_variables[$template_id] = $flds_arr;
								}
								if(!array_key_exists($template_id, $template_variables_back)){
									$template_variables_back[$template_id] = $flds_back_arr;
								}
							}
						}
					}
				}
			}			
			if(count($template_variables) > 0 ){
				$highestCol = $factory->Column_Names[$highestCol];
				$removed_last_columns = $highestCol-1;
				$variables_arr = array();
				foreach($template_variables as $variable_arr){
					if(count($variable_arr) !== $removed_last_columns ){
						$is_valid = false;
						$error_message[] = 'Failed data import. Some records has invalid value or missing value.Please try again later';
						
					}else{
						$variables_arr = $variable_arr;
					}
				}
				$variables_arr[] = 'customer_templates_id';
				
			}
			if(count($template_variables_back) > 0 ){
				$variables_arr_back = array();
				foreach($template_variables_back as $arr_back){
					$variables_arr_back = $arr_back;
				}
				
			}
			if($is_valid === false){
				return $error_message;
			}
			$tablename = 'customer_employees';
			$model_to_load = 'customer_employees_model';
			$images_uploads_path = 'uploads\/corporate\/idcard_photos\/'. $this->web['profile']['customer_id'];
			 if($is_valid === true){
				
				$schools_id = '';
				$this->load->model('customers_model');
				$customer = $this->customers_model->getById($this->web['profile']['customer_id']);
				$this->web['profile']['customer_name'] = $customer['customer_name'];
				$this->web['profile']['registration_no'] = $customer['registration_no'];
				$this->web['profile']['email'] = $customer['email'];
				$this->web['profile']['website'] = $customer['website'];
				//echo $customer['customer_type'];
				if(isset($customer['customer_type']) && $customer['customer_type'] == 'school' ){
					$model_to_load = 'students_model';
					$tablename = 'students';
					// getting school details
						$this->load->model('schools_model');
						$this->schools_model->ci_where = array();
						$this->schools_model->ci_where['schools.customers_id'] = $this->web['profile']['customer_id'];
						$row = $this->schools_model->getAll();
						if(!empty($row) && $row[0]['customers_id'] == $this->web['profile']['customer_id']){
							$schools_id = $row[0]['id'];
							$customer_ids_column_value = $row[0]['id'];
						}
						$images_uploads_path = 'uploads\/school\/idcard_photos\/'. $this->web['profile']['customer_id'];
				}
			 }
			
			$data_temp = array();
			$icard_json_obj =  array();
			$qr_code_arr = array();
			foreach($obj->getWorksheetIterator() as $worksheet ){
				$max = $worksheet->getHighestRow();
				$i=0;
				$this->load->library('ciqrcode');
				$photos_cols_arr = array('photo_1','photo_3','photo_3');
				for($row=2;$row<=$max;$row++){
					$text_for_qr_code = '';
					$html .='<tr>';
					$data_temp[$i] = array();
					$error = false;
					for($j=0; $j<$highestCol;$j++){
						$column_name = $variables_arr[$j];
						if($column_name  !== 'scanning_method'){
							if(isset($schools_id) && $schools_id != '' ){
								$data_temp[$i]['schools_id'] = $schools_id;
							}
							$data_temp[$i]['customers_id'] = $customer_id;
							if($column_name === 'address'){
								
								$value = $worksheet->getCellByColumnAndRow($j, $row)->getValue();
								if($value == '' || $value == null){
									$error = true;
								}else{
									/* echo  strpos($value, ' ',2 );
									if( strpos($value, ' ',2 ) !== false ){
										$value = substr_replace($value, "\n", 2, 1);
									}
									echo  strpos($value, ' ',2 );
									if( strpos($value, ' ',2 ) !== false ){
										$value = substr_replace($value, "\n", 2, 1);
									}
									echo  strpos($value, ' ',2 );
									if( strpos($value, ' ',2 ) !== false ){
										$value = substr_replace($value, "\n", 2, 1);
									}
										echo  strpos($value, ' ',2 );
									if( strpos($value, ' ',2 ) !== false ){
										$value = substr_replace($value, "\n", 2, 1);
									} */
									$data_temp[$i][$column_name] = $value;					
								}
							}else{
								$data_temp[$i]['customers_id'] = $customer_id;
								$value = $worksheet->getCellByColumnAndRow($j, $row)->getValue();
								if($value == '' || $value == null) {
									$error = true;
									
								}else{
									$data_temp[$i][$column_name] = $value;
									if( strpos($value, 'TMPL000') === false ){
										$text_for_qr_code .= str_replace("\n"," ", $value). " ";
									}						
								}
							}	
						}
					}
					$qr_code_arr[$i]['text_for_qr_code'] = $text_for_qr_code;
					$icard_json = json_encode($master_template_data_json[$data_temp[$i]['customer_templates_id']]);
					
					if( strpos($icard_json, "assets\/\/images\/image_control_photo_1.png") !==  false ){
						$upath = $images_uploads_path. '\/'.$data_temp[$i]['customer_templates_id'].'\/'.str_replace('.','_new.',$data_temp[$i]['photo_1']) ; 
						$icard_json = str_replace("assets\/\/images\/image_control_photo_1.png", $upath,$icard_json);
					}

					if( strpos($icard_json, "assets\/\/images\/image_control_photo_2.png") !==  false ){
						$upath = $images_uploads_path. '\/'.$data_temp[$i]['customer_templates_id'].'\/'.str_replace('.','_new.',$data_temp[$i]['photo_2']) ; 
						$icard_json = str_replace("assets\/\/images\/image_control_photo_2.png", $upath,$icard_json);
					}

					if( strpos($icard_json, "assets\/\/images\/image_control_photo_3.png") !==  false ){
						$upath = $images_uploads_path. '\/'.$data_temp[$i]['customer_templates_id'].'\/'.str_replace('.','_new.',$data_temp[$i]['photo_3']) ; 
						$icard_json = str_replace("assets\/\/images\/image_control_photo_3.png", $upath,$icard_json);
					}
					if(isset($master_template_data_json_back[$data_temp[$i]['customer_templates_id']]) && !empty($master_template_data_json_back[$data_temp[$i]['customer_templates_id']])){
						$icard_json_back = json_encode($master_template_data_json_back[$data_temp[$i]['customer_templates_id']]);
						if(strpos($icard_json_back, "assets\/\/images\/image_control_photo_1.png") !==  false ){
							$upath = $images_uploads_path. '\/'.$data_temp[$i]['customer_templates_id'].'\/'.str_replace('.','_new.',$data_temp[$i]['photo_1']) ; 
							$icard_json_back = str_replace("assets\/\/images\/image_control_photo_1.png", $upath,$icard_json_back);
						}
						if(strpos($icard_json_back, "assets\/\/images\/image_control_photo_2.png") !==  false ){
							$upath = $images_uploads_path. '\/'.$data_temp[$i]['customer_templates_id'].'\/'.str_replace('.','_new.',$data_temp[$i]['photo_2']) ; 
							$icard_json_back = str_replace("assets\/\/images\/image_control_photo_2.png", $upath,$icard_json_back);
						}
						if(strpos($icard_json_back, "assets\/\/images\/image_control_photo_3.png") !==  false ){
							$upath = $images_uploads_path. '\/'.$data_temp[$i]['customer_templates_id'].'\/'.str_replace('.','_new.',$data_temp[$i]['photo_3']) ; 
							$icard_json_back = str_replace("assets\/\/images\/image_control_photo_3.png", $upath,$icard_json_back);
						}
					}

					$data_temp[$i]['icard_json'] = $icard_json;
					if(isset($icard_json_back) &&  !empty($icard_json_back) ){
						$data_temp[$i]['icard_json_back'] = $icard_json_back;
					}
					if($error === true){
						$number =  $i + 1;
						$error_message[] = 'Record No <b>'.$number.'</b>. Invalid value or missing value';
						
					}
					$i++; 
				}
				/*Start traversing data_temp loop */
				if($error === false){
					if(count($data_temp) > 0){
						foreach($data_temp as $key => $record ){
							$record['icard_json'] = $this->replaceVariableTextOfJsonString($record);
							$record['icard_json'] = $this->generateAndReplaceQRCodeImage($record, $customer_id, $qr_code_arr[$key]['text_for_qr_code']);
							if(isset($record['icard_json_back']) && $record['icard_json_back'] !== '' ){
								$record['icard_json_back'] = $this->replaceVariableTextOfJsonString($record, 'icard_json_back');
								$record['icard_json_back'] = $this->generateAndReplaceQRCodeImage($record, $customer_id, $qr_code_arr[$key]['text_for_qr_code'], 'icard_json_back');
							}
							$this->load->model($model_to_load);
							$this->{$model_to_load}->ci_where = array();
							$this->{$model_to_load}->save_record(0,$record);
							$last_id = $this->{$model_to_load}->last_insert_id;
							if(defined('UPLOAD_PHOTO_PATH') && isset($record['photo_1']) ){
								$photo_arr = array();
								$photo_arr['photo_1'] =  UPLOAD_PHOTO_PATH.'/'.$record['customer_templates_id'].'/'.$record['photo_1'];
								$this->{$model_to_load}->save_record($last_id, $photo_arr);
								
							}
						}	
					}
				}
				/* End traversing data_temp loop*/
				if(count($error_message) > 0 ){
					return $error_message;
				}
				
			}
		  redirect(base_url().'My_Pages/myaccount/');	
	
	}
	private function getCustomerTemplateFieldsByTemplateId($template_id, $customer_id){
		return array();
	}
	private function replaceVariableTextOfJsonString($record = array(), $side = 'icard_json'){
		$return = '';
		$icard_json = $side;
		if(!isset($record[$icard_json])){ return $return; }
		$obj = json_decode($record[$icard_json]);
		foreach($obj->objects as $key => $obj_json ){
			if(isset($obj_json->id) && strpos($obj_json->id, 'control_') !== false ){
				$col_name = str_replace('control_', '', $obj_json->id);
				if(array_key_exists($col_name, $record) ){
					$obj->objects[$key]->text = (is_numeric($record[$col_name])) ?  (string) $record[$col_name]: $record[$col_name];
				}
			}
			if(!isset($obj_json->id) && isset($obj_json->text) && strpos(strtolower($obj_json->text), 'uf') !== false ){
				$obj->objects[$key]->text = str_replace('uf', '\uf', $obj_json->text);
			}
		}
		$return = json_encode($obj);
		return $return;
	}
	private function generateAndReplaceQRCodeImage($record=array(), $customer_id, $text_for_qr_code,  $side = 'icard_json'){
		$return = '';
		$upload_qrcodes_path = UPLOADS_QRCODES_PATH.$customer_id.'/';
		if(!file_exists($upload_qrcodes_path)) mkdir($upload_qrcodes_path,0777, true);
		$icard_json = $side;
		$this->load->library('ciqrcode');
		$obj = json_decode($record[$icard_json]);
		foreach($obj->objects as $key => $obj_json ){
			if( isset($obj_json->src) && strpos($obj_json->src, 'qrcode') !== false){
				$params = array();
				$qr_image= rand().'.png';
				$params['data'] = $text_for_qr_code;
				$params['level'] = 'H';
				$params['size'] = 8;
				$params['savename'] = $upload_qrcodes_path.$qr_image;
				if($this->ciqrcode->generate($params))
				{
					$obj->objects[$key]->src= base_url(). $upload_qrcodes_path.$qr_image;	
					
				}
			}
		}
		$return = json_encode($obj);
		return $return;
	}
	private function uploadPhotosZipFile($file_arr) {
		if(!isset($this->request['template_id'])){
			return false;
		}
		$upath = UPLOAD_PHOTO_PATH.'/'.$this->request['template_id'];
		if(!file_exists($upath)) mkdir($upath,0777, true);
		if (!empty($file_arr['name'])) {
			foreach($file_arr['name'] as $key => $arr ){
				if (move_uploaded_file($file_arr['tmp_name'][$key], $upath ."/". $arr)) {}else{return false;}
				
			}
		}
       return true;
	}
	
	private function updateIcardJson($dir, $customer_id, $template_unique_id, $cutomer_type){
		
		if (is_dir($dir)){
			if ($dh = opendir($dir)){
				if($cutomer_type == 'school'){
					$tbl = 'students';
				}else{
					$tbl = 'customer_employees';
				}
				$modelname = $tbl.'_model';
				$this->load->model($modelname);
				while (($files = readdir($dh)) !== false){
					// Start to save photo 1 record and json
					$this->{$modelname}->ci_where = array();
					$this->{$modelname}->ci_where['photo_1'] = trim($files);
					$row_arr = $this->{$modelname}->getAll();
					//echo "<pre>";print_r($row_arr); echo "<pre>";
					$record_id = false;
					if(isset($row_arr[0]) && count($row_arr[0]) > 0 ){
						$record_id = $row_arr[0][$tbl.'_id'];
						$this->{$modelname}->ci_where = array();
						$record_to_update = $this->{$modelname}->getbyId($record_id);
						if(!empty($record_to_update)){
							$targetFile = '';
							$json_to_update = json_encode($record_to_update['icard_json']);
							if(isset($json_to_update->objects) && !empty($json_to_update->objects)){
								$i=0;
								foreach( $json_to_update->objects as $object ){
									if($object->type === 'image'){
										if(strpos($object->src, 'image_control_photo_1') !== false){
											$wd = $object->width;
											$targetFile = str_replace('.', '_new.', $dir .'/'. $files);	
											$originalFile = $dir .'/'. $files;
											$img = $this->resize_photo($wd, $targetFile, $originalFile);
											$json_to_update->objects->{$i}->src = base_url().'/'.$targetFile;
										}
										
									}
									$i++;
								}
							}
							$data = array();
							$data['photo_1'] = $targetFile;
							$data['icard_json'] = json_decode($json_to_update);
							$this->{$modelname}->ci_where = array();
							$this->{$modelname}->save_record($record_id, $data);
						}
					}
					if( $record_id === false){
						// Start to save photo 2 record and json
						$this->{$modelname}->ci_where = array();
						$this->{$modelname}->ci_where['photo_2'] = trim($files);
						$row_arr = $this->{$modelname}->getAll();
						if(isset($row_arr[0]) && count($row_arr[0]) > 0 ){
							$record_id = $row_arr[0][$tbl.'_id'];
							$this->{$modelname}->ci_where = array();
							$record_to_update = $this->{$modelname}->getbyId($record_id);
							if(!empty($record_to_update)){
								$targetFile = '';
								$json_to_update = json_encode($record_to_update['icard_json']);
								if(isset($json_to_update->objects) && !empty($json_to_update->objects)){
									$i=0;
									foreach( $json_to_update->objects as $object ){
										if($object->type === 'image'){
											if(strpos($object->src, 'image_control_photo_2') !== false){
												$wd = $object->width;
												$targetFile = str_replace('.', '_new.', $dir .'/'. $files);	
												$originalFile = $dir .'/'. $files;
												$img = $this->resize_photo($wd, $targetFile, $originalFile);
												$json_to_update->objects->{$i}->src = base_url().'/'.$targetFile;
											}
											
										}
										$i++;
									}
								}
								$data = array();
								$data['photo_1'] = $targetFile;
								$data['icard_json'] = json_decode($json_to_update);
								$this->{$modelname}->ci_where = array();
								$this->{$modelname}->save_record($record_id, $data);
							}
						}
					}
					if( $record_id === false){
						
						// Start to save photo 3 record and json
						$this->{$modelname}->ci_where = array();
						$this->{$modelname}->ci_where['photo_3'] = trim($files);
						$row_arr = $this->{$modelname}->getAll();
						if(isset($row_arr[0]) && count($row_arr[0]) > 0 ){
							$record_id = $row_arr[0][$tbl.'_id'];
							$this->{$modelname}->ci_where = array();
							$record_to_update = $this->{$modelname}->getbyId($record_id);
							if(!empty($record_to_update)){
								$targetFile = '';
								$json_to_update = json_encode($record_to_update['icard_json']);
								if(isset($json_to_update->objects) && !empty($json_to_update->objects)){
									$i=0;
									foreach( $json_to_update->objects as $object ){
										if($object->type === 'image'){
											if(strpos($object->src, 'image_control_photo_3') !== false){
												$wd = $object->width;
												$targetFile = str_replace('.', '_new.', $dir .'/'. $files);	
												$originalFile = $dir .'/'. $files;
												$img = $this->resize_photo($wd, $targetFile, $originalFile);
												$json_to_update->objects->{$i}->src = base_url().'/'.$targetFile;
											}
											
										}
										$i++;
									}
								}
								$data = array();
								$data['photo_1'] = $targetFile;
								$data['icard_json'] = json_decode($json_to_update);
								$this->{$modelname}->ci_where = array();
								$this->{$modelname}->save_record($record_id, $data);
						
							}	
						}
					}
					echo "filename:" . $files . "<br>";
				}
				closedir($dh);
			}
		}

	}
	private function uploadFile($file, $customer_id, $file_name) {
        $file_detail = array();
		$upload_path = 'uploads/templates/'.$customer_id;
		if(!file_exists($upload_path)) mkdir($upload_path,0777, true);

        if (!empty($file['name'])) {
            $filename = $file['name'];
            $arr = explode('.', $filename);
            $arr = array_reverse($arr);
            $exts = array('xlsx', 'xls');
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
	private function getAllStudents($schools_id){
		$this->load->model('student_id_cards_model');
		$this->student_id_cards_model->ci_where = array();
		$this->student_id_cards_model->ci_where['student_id_cards.schools_id'] = $schools_id;
		$this->student_id_cards_model->ci_where['student_id_cards.is_archived'] = '0';
		$rows = $this->student_id_cards_model->getAll();
		return $rows ;
	}
	private function getAllFilledStudents($schools_id){
		$this->load->model('student_id_cards_model');
		$this->student_id_cards_model->ci_where = array();
		$this->student_id_cards_model->ci_where['student_id_cards.schools_id'] = $schools_id;
		$this->student_id_cards_model->ci_where['student_id_cards.is_archived'] = '0';
		//$this->student_id_cards_model->ci_where['students.updated_on !='] = '0000-00-00 00:00:00';
		$rows = $this->student_id_cards_model->getAll();
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

	public function selected_templates() {

		$this->web['rows'] = array();
		$this->web['school_templates'] = array();
		$this->web['profile'] = $this->session->userdata['loggedin'];

		$this->web['profile']['department_name'] = $this->web['departments'][$this->web['profile']['department_id']];
		if(is_array($this->web['profile'])){
			$this->load->model('customers_model');
			$customer = $this->customers_model->getById($this->web['profile']['customer_id']);
			$this->web['profile']['customer_name'] = $customer['customer_name'];
			$this->web['profile']['registration_no'] = $customer['registration_no'];
			$this->web['profile']['email'] = $customer['email'];
			$this->web['profile']['website'] = $customer['website'];

			// getting selected template
			$this->load->model('customer_templates_model');
			$this->customer_templates_model->ci_where = array();
			$this->customer_templates_model->ci_where['customers_id'] = $this->web['profile']['customer_id'];
			$this->customer_templates_model->ci_where['template_type'] = '0';
			$rows = $this->customer_templates_model->getAll();
			$this->web['my_templates'] = $rows;


		}

		$this->web['title'] = 'MY TEMPLATES';
		$this->web['sub_title'] = 'SELECTED TEMPLATE';
		if(isset($this->web['request']['view_page']) && $this->web['request']['view_page'] == 'a4'){
			$this->web['photos'] = $this->getAllPhotos($this->web['profile']['customer_id']);
			$this->web['completed'] = $this->getAllFilledStudents($this->web['profile']['customer_id']);
			$this->load->view('schools/popup_window',  $this->web);
		}else{
			$this->load->view('layout/front/header',  $this->web);
			$this->web['completed'] = $this->getAllFilledStudents($this->web['profile']['customer_id']);
			$this->load->view('my_pages/user_pages_header',  $this->web);
			$this->load->view('my_pages/user_menu',  $this->web);
			//$this->load->view('my_pages/myaccount',  $this->web);
			$this->load->view('my_pages/selected_templates',  $this->web);
			//$this->load->view('layout/front/main_content', $data);
			$this->load->view('layout/front/footer',  $this->web);
		}
	}
	public function created_templates() {

		$this->web['rows'] = array();
		$this->web['school_templates'] = array();
		$this->web['profile'] = $this->session->userdata['loggedin'];

		$this->web['profile']['department_name'] = $this->web['departments'][$this->web['profile']['department_id']];
		if(is_array($this->web['profile'])){
			$this->load->model('customers_model');
			$customer = $this->customers_model->getById($this->web['profile']['customer_id']);
			$this->web['profile']['customer_name'] = $customer['customer_name'];
			$this->web['profile']['registration_no'] = $customer['registration_no'];
			$this->web['profile']['email'] = $customer['email'];
			$this->web['profile']['website'] = $customer['website'];

			// getting created template
			$this->load->model('customer_templates_model');
			$this->customer_templates_model->ci_where = array();
			$this->customer_templates_model->ci_where['customers_id'] = $this->web['profile']['customer_id'];
			$rows = $this->customer_templates_model->getAll(null, null, array('sort_by' => 'customer_templates.id', 'order_type' =>'DESC' ));
			$this->web['my_templates'] = $rows;


		}

		$this->web['title'] = 'MY TEMPLATES';
		$this->web['sub_title'] = 'CREATED TEMPLATE';
		if(isset($this->web['request']['view_page']) && $this->web['request']['view_page'] == 'a4'){
			$this->web['photos'] = $this->getAllPhotos($this->web['profile']['customer_id']);
			$this->web['completed'] = $this->getAllFilledStudents($this->web['profile']['customer_id']);
			$this->load->view('schools/popup_window',  $this->web);
		}else{
			$this->load->view('layout/front/header',  $this->web);
			$this->load->view('layout/front/main_menu',  $this->web);
			$this->web['title'] = 'Multjivan Pixels My Account';
			$this->web['sub_title'] = 'My Templates';
			$this->web['last_node'] = 'All Templates';
			// getting created template
			$this->web['completed'] = $this->getAllFilledStudents($this->web['profile']['customer_id']);
			$this->load->view('my_pages/user_pages_header',  $this->web);
			$this->load->view('my_pages/user_menu',  $this->web);
			$this->load->view('my_pages/user_templates_menu',  $this->web);
			$this->load->view('my_pages/created_templates',  $this->web);
			$this->load->view('my_pages/user_pages_footer',  $this->web);
		
		}
	}

	public function review_my_template() {

		if(!isset($this->web['request']['template_id'])){
			redirect(base_url().'My_Pages/myaccount');
		}

		$this->web['rows'] = array();
		$this->web['school_templates'] = array();
		$this->web['profile'] = $this->session->userdata['loggedin'];
		if(!$this->session->userdata['loggedin']){
			redirect(base_url().'My_Pages/myaccount');
		}
		$this->web['profile']['department_name'] = $this->web['departments'][$this->web['profile']['department_id']];
		if(is_array($this->web['profile'])){
			$this->load->model('customers_model');
			$customer = $this->customers_model->getById($this->web['profile']['customer_id']);
			$this->web['profile']['customer_name'] = $customer['customer_name'];
			$this->web['profile']['registration_no'] = $customer['registration_no'];
			$this->web['profile']['email'] = $customer['email'];
			$this->web['profile']['website'] = $customer['website'];

			// getting created template
			$this->load->model('customer_templates_model');
			$this->customer_templates_model->ci_where = array();
			$this->customer_templates_model->ci_where['customers_id'] = $this->web['profile']['customer_id'];
			$this->customer_templates_model->ci_where['id'] = $this->web['request']['template_id'];
			$rows = $this->customer_templates_model->getAll();
			//print_r($this->web['request']);
			$this->web['template'] = $rows[0];


		}

		$this->web['title'] = 'MY TEMPLATES';
		$this->web['sub_title'] = 'CREATED TEMPLATE';
		if(isset($this->web['request']['view_page']) && $this->web['request']['view_page'] == 'a4'){
			$this->web['photos'] = $this->getAllPhotos($this->web['profile']['customer_id']);
			$this->web['completed'] = $this->getAllFilledStudents($this->web['profile']['customer_id']);
			$this->load->view('schools/popup_window',  $this->web);
		}else{
			$this->load->view('layout/front/header',  $this->web);
			$this->web['completed'] = $this->getAllFilledStudents($this->web['profile']['customer_id']);
			$this->load->view('my_pages/user_pages_header',  $this->web);
			$this->load->view('my_pages/user_menu',  $this->web);
			//$this->load->view('my_pages/myaccount',  $this->web);
			$this->load->view('my_pages/review_my_template',  $this->web);
			//$this->load->view('layout/front/main_content', $data);
			$this->load->view('my_pages/user_pages_footer',  $this->web);
			$this->load->view('layout/front/footer',  $this->web);

		}
	}

	public function download_sample_sheet() {

        $this->web['total_records'] = '';
        $this->web['total_pages'] = '';
		$this->web['model']['new'] = base64_encode(0);
		$this->web['rows'] = array();
		$this->web['school_templates'] = array();
		$this->web['profile'] = $this->session->userdata['loggedin'];
		//echo "<pre>";print_r($this->web['profile'] ); exit;
		$this->web['profile']['department_name'] = $this->web['departments'][$this->web['profile']['department_id']];

		$school_id = $this->session->userdata['loggedin']['id'];

		$rand = rand(500, 10000);
		$this->load->view('layout/front/header',  $this->web);
		$this->load->view('layout/front/main_menu',  $this->web);
		$this->web['title'] = 'MY DATA';
		$this->web['sub_title'] = 'ACTION';
		$this->web['last_node'] = 'MANUAL DATA ENTRY';
		// getting created template
		$this->load->model('customer_templates_model');
		$this->customer_templates_model->ci_where = array();
		$this->customer_templates_model->ci_where['customers_id'] = $this->web['profile']['customer_id'];
		$rows = $this->customer_templates_model->getAll();
		
		$this->web['my_templates'] = $rows;
			$this->web['completed'] = $this->getAllFilledStudents($this->web['profile']['customer_id']);
			$this->load->view('my_pages/user_pages_header',  $this->web);
			$this->load->view('my_pages/user_menu',  $this->web);
			$this->load->view('my_pages/user_action_menu',  $this->web);
			$this->load->view('my_pages/download_sample_sheet',  $this->web);
			$this->load->view('my_pages/user_pages_footer',  $this->web);
			//$this->load->view('layout/front/main_content', $data);
			//$this->load->view('layout/front/footer',  $this->web);

	}
	public function upload_sheet() {

        $this->web['total_records'] = '';
        $this->web['total_pages'] = '';
		$this->web['model']['new'] = base64_encode(0);
		$this->web['rows'] = array();
		$this->web['school_templates'] = array();
		$this->web['profile'] = $this->session->userdata['loggedin'];
		//echo "<pre>";print_r($this->web['profile'] ); exit;
		$this->web['profile']['department_name'] = $this->web['departments'][$this->web['profile']['department_id']];

		$school_id = $this->session->userdata['loggedin']['id'];

		$rand = rand(500, 10000);
		$this->load->view('layout/front/header',  $this->web);
		$this->load->view('layout/front/main_menu',  $this->web);
		$this->web['title'] = 'MY DATA';
		$this->web['sub_title'] = 'ACTION';
		$this->web['last_node'] = 'MANUAL DATA ENTRY';
		// getting created template
		$this->load->model('customer_templates_model');
		$this->customer_templates_model->ci_where = array();
		$this->customer_templates_model->ci_where['customers_id'] = $this->web['profile']['customer_id'];
		$rows = $this->customer_templates_model->getAll();
		
		$this->web['my_templates'] = $rows;
			$this->web['completed'] = $this->getAllFilledStudents($this->web['profile']['customer_id']);
			$this->load->view('my_pages/user_pages_header',  $this->web);
			$this->load->view('my_pages/user_menu',  $this->web);
			$this->load->view('my_pages/user_action_menu',  $this->web);
			$this->load->view('my_pages/upload_sheet',  $this->web);
			$this->load->view('my_pages/user_pages_footer',  $this->web);
			//$this->load->view('layout/front/main_content', $data);
			//$this->load->view('layout/front/footer',  $this->web);

	}
	public function upload_photos() {

        $this->web['total_records'] = '';
        $this->web['total_pages'] = '';
		$this->web['model']['new'] = base64_encode(0);
		$this->web['rows'] = array();
		$this->web['school_templates'] = array();
		$this->web['profile'] = $this->session->userdata['loggedin'];
		//echo "<pre>";print_r($this->web['profile'] ); exit;
		$this->web['profile']['department_name'] = $this->web['departments'][$this->web['profile']['department_id']];

		$school_id = $this->session->userdata['loggedin']['id'];

		$rand = rand(500, 10000);
		$this->load->view('layout/front/header',  $this->web);
		$this->load->view('layout/front/main_menu',  $this->web);
		$this->web['title'] = 'MY DATA';
		$this->web['sub_title'] = 'ACTION';
		$this->web['last_node'] = 'MANUAL DATA ENTRY';
		// getting created template
		$this->load->model('customer_templates_model');
		$this->customer_templates_model->ci_where = array();
		$this->customer_templates_model->ci_where['customers_id'] = $this->web['profile']['customer_id'];
		$rows = $this->customer_templates_model->getAll();
		
		$this->web['my_templates'] = $rows;
			$this->web['completed'] = $this->getAllFilledStudents($this->web['profile']['customer_id']);
			$this->load->view('my_pages/user_pages_header',  $this->web);
			$this->load->view('my_pages/user_menu',  $this->web);
			$this->load->view('my_pages/user_action_menu',  $this->web);
			$this->load->view('my_pages/upload_photos',  $this->web);
			$this->load->view('my_pages/user_pages_footer',  $this->web);
			//$this->load->view('layout/front/main_content', $data);
			//$this->load->view('layout/front/footer',  $this->web);

	}

	public function data_entry_manual() {

        $this->web['total_records'] = '';
        $this->web['total_pages'] = '';
		$this->web['model']['new'] = base64_encode(0);
		$this->web['rows'] = array();
		$this->web['school_templates'] = array();
		$this->web['profile'] = $this->session->userdata['loggedin'];
		//echo "<pre>";print_r($this->web['profile'] ); exit;
		$this->web['profile']['department_name'] = $this->web['departments'][$this->web['profile']['department_id']];

		$rand = rand(500, 10000);
		$this->load->view('layout/front/header',  $this->web);
		$this->load->view('layout/front/main_menu',  $this->web);
		$this->web['title'] = 'MY DATA';
		$this->web['sub_title'] = 'ACTION';
		$this->web['last_node'] = 'MANUAL DATA ENTRY';
		// getting created template
		$this->load->model('customer_templates_model');
		$this->customer_templates_model->ci_where = array();
		$this->customer_templates_model->ci_where['customers_id'] = $this->web['profile']['customer_id'];
		$rows = $this->customer_templates_model->getAll();
		$my_templates = array();
		if(!empty($rows)){
			$i=0;
			foreach($rows as $template_arr){
				$my_templates[$i]['id'] = $template_arr['id'];
				$my_templates[$i]['template_unique_id'] = $template_arr['template_unique_id'];
				$my_templates[$i]['customer_templates_id'] = $template_arr['customer_templates_id'];
				if(isset($template_arr['template_variables']) && !empty($template_arr['template_variables'])){
					$my_templates[$i]['template_variables'] = (array) json_decode($template_arr['template_variables']);
				}
				if(isset($template_arr['template_variables_back']) && !empty($template_arr['template_variables_back'])){
					$my_templates[$i]['template_variables_back'] = (array) json_decode($template_arr['template_variables_back']);
				}
				$i++;
			}
		}
		$this->web['my_templates'] = $my_templates;
			
			$this->load->view('my_pages/user_pages_header',  $this->web);
			$this->load->view('my_pages/user_menu',  $this->web);
			$this->load->view('my_pages/user_action_menu',  $this->web);
			$this->load->view('my_pages/data_entry_manual',  $this->web);
			$this->load->view('my_pages/user_pages_footer',  $this->web);
			//$this->load->view('layout/front/main_content', $data);
			//$this->load->view('layout/front/footer',  $this->web);

	}
	public function buy_lace() {

        $this->web['total_records'] = '';
        $this->web['total_pages'] = '';
		$this->web['model']['new'] = base64_encode(0);
		$this->web['rows'] = array();
		$this->web['school_templates'] = array();
		$this->web['profile'] = $this->session->userdata['loggedin'];
		//echo "<pre>";print_r($this->web['profile'] ); exit;
		$this->web['profile']['department_name'] = $this->web['departments'][$this->web['profile']['department_id']];

		$rand = rand(500, 10000);
		$this->load->view('layout/front/header',  $this->web);
		$this->load->view('layout/front/main_menu',  $this->web);
		$this->web['title'] = 'MY DATA';
		$this->web['sub_title'] = 'ACTION';
		$this->web['last_node'] = 'MANUAL DATA ENTRY';
		// getting created template
		$this->load->model('customer_templates_model');
		$this->customer_templates_model->ci_where = array();
		$this->customer_templates_model->ci_where['customers_id'] = $this->web['profile']['customer_id'];
		$rows = $this->customer_templates_model->getAll();
		$my_templates = array();
		if(!empty($rows)){
			$i=0;
			foreach($rows as $template_arr){
				$my_templates[$i]['id'] = $template_arr['id'];
				$my_templates[$i]['template_unique_id'] = $template_arr['template_unique_id'];
				$my_templates[$i]['customer_templates_id'] = $template_arr['customer_templates_id'];
				if(isset($template_arr['template_variables']) && !empty($template_arr['template_variables'])){
					$my_templates[$i]['template_variables'] = (array) json_decode($template_arr['template_variables']);
				}
				if(isset($template_arr['template_variables_back']) && !empty($template_arr['template_variables_back'])){
					$my_templates[$i]['template_variables_back'] = (array) json_decode($template_arr['template_variables_back']);
				}
				$i++;
			}
		}
		$this->web['my_templates'] = $my_templates;
			
			$this->load->view('my_pages/user_pages_header',  $this->web);
			$this->load->view('my_pages/user_menu',  $this->web);
			$this->load->view('my_pages/user_action_menu',  $this->web);
			$this->load->view('my_pages/buy_lace',  $this->web);
			$this->load->view('my_pages/user_pages_footer',  $this->web);
			//$this->load->view('layout/front/main_content', $data);
			//$this->load->view('layout/front/footer',  $this->web);

	}

	public function download_sheet() {
		$template_id = ( isset($this->web['request']['check_template_id']))? $this->web['request']['check_template_id'] : 0;
		$this->web['total_records'] = '';
        $this->web['total_pages'] = '';
		$this->web['model']['new'] = base64_encode(0);
		$this->web['rows'] = array();
		$this->web['school_templates'] = array();
		$this->web['profile'] = $this->session->userdata['loggedin'];
		//echo "<pre>";print_r($this->web['profile'] ); exit;
		$this->web['profile']['department_name'] = $this->web['departments'][$this->web['profile']['department_id']];
		$template_status = 0; // to be updated in customer_templates table  when downloaded template by customer to fill data and upload for the selected template
		if($template_id > 0 ){
			$user_template_id = ( isset($this->web['request']['user_template_id']))? $this->web['request']['user_template_id'] : $template_id ;
			$this->load->model('customer_templates_model');
			$this->customer_templates_model->ci_where = array();
			$this->customer_templates_model->ci_where['customers_id'] = $this->web['profile']['customer_id'];
			$this->customer_templates_model->ci_where['id'] = $template_id;
			$rows = $this->customer_templates_model->getAll();
			//echo "<pre>";print_r($rows);echo"</pre>"; exit;
			
			$template_data_json = array();
			$filtered = array();
			if(!empty($rows) && isset($rows[0])){
				$template_status = $rows[0]['status'];
				if(!empty( $rows[0]['template_variables'])){
					$template_variables =  (array)json_decode($rows[0]['template_variables']);
					if(!empty($template_variables)){
						foreach($template_variables as $key => $val){
							$arr = explode('control_',$key);
							if(isset($arr[1]) && $arr[1] !== '' ){
								$variable = str_replace('_',' ', $arr[1]);
								$variable = ucwords($variable);
								$filtered[] = $variable;
							}
						}
					}
				}
				if(!empty( $rows[0]['template_variables_back'])){
					$template_variables_back =  (array)json_decode($rows[0]['template_variables_back']);
					if(!empty($template_variables_back)){
						foreach($template_variables_back as $key => $val){
							$arr = explode('control_',$key);
							if(isset($arr[1]) && $arr[1] !== '' ){
								$variable = str_replace('_',' ', $arr[1]);
								$variable = ucwords($variable);
								$filtered[] = $variable;
							}
						}
					}
				}
				$filtered[]='Template ID';
			}
		}
		$task = (isset($this->web['request']['task'])) ?  $this->web['request']['task'] : '';

		$customer_name = (isset($this->web['profile']['customer_name'])) ?  $this->web['profile']['customer_name'] : 'sample-sheet';
		
		if($task == 'download_sheet'){
			$template_status = (int) $template_status;
			$new_status = $template_status + 1;
			$data = array('status'=> $new_status);
			$this->load->model('customer_templates_model');
			$this->customer_templates_model->ci_where = array();
			$this->customer_templates_model->save_record($template_id, $data);
			$this->load->library('excel_writer');
			$filename = strtolower($customer_name).rand(5000,10000).".xls";
			$this->excel_writer->downloadSheet( $filename, $filtered, $user_template_id);
		}

	}
	public function ordered_templates() {

	    $this->web['rows'] = array();
	    $this->web['school_templates'] = array();
	    $this->web['profile'] = $this->session->userdata['loggedin'];

	    $this->web['profile']['department_name'] = $this->web['departments'][$this->web['profile']['department_id']];
	    if(is_array($this->web['profile'])){
	        $id = 1; //base64_decode($this->web['request']['id']);
	        $this->load->model('customers_model');
	        $customer = $this->customers_model->getById($this->web['profile']['customer_id']);
	        $this->web['profile']['customer_name'] = $customer['customer_name'];
	        $this->web['profile']['registration_no'] = $customer['registration_no'];
	        $this->web['profile']['email'] = $customer['email'];
	        $this->web['profile']['website'] = $customer['website'];

	    	$this->load->view('layout/front/header',  $this->web);
		$this->load->view('layout/front/main_menu',  $this->web);
		$this->load->view('my_pages/user_pages_header',  $this->web);
		$this->load->view('my_pages/user_menu',  $this->web);
		$this->load->view('my_pages/user_data_menu',  $this->web);
		$this->load->view('my_pages/ordered_templates',  $this->web);
		
		$this->load->view('my_pages/user_pages_footer',  $this->web);

	    }

	    $this->web['title'] = 'MY TEMPLATES';
	    $this->web['sub_title'] = 'CREATED TEMPLATE';
	    if(isset($this->web['request']['view_page']) && $this->web['request']['view_page'] == 'a4'){
	        $this->web['photos'] = $this->getAllPhotos($this->web['profile']['customer_id']);
	        $this->web['completed'] = $this->getAllFilledStudents($this->web['profile']['customer_id']);
	        $this->load->view('schools/popup_window',  $this->web);
	    }else{
			$this->load->view('layout/front/header',  $this->web);
			$this->load->view('layout/front/main_menu',  $this->web);
			$this->web['completed'] = $this->getAllFilledStudents($this->web['profile']['customer_id']);
			$this->load->view('my_pages/user_pages_header',  $this->web);
			$this->load->view('my_pages/user_menu',  $this->web);
			$this->load->view('my_pages/order_process',  $this->web);
			$this->load->view('my_pages/user_pages_footer',  $this->web);
			//$this->load->view('layout/front/main_content', $data);
			$this->load->view('layout/front/footer',  $this->web);

	    }
	}
	public function save_data_entry_manual(){
		if(empty($this->request['template_id'])){
			$this->load->view('layout/front/header',  $this->web);
			$this->load->view('layout/front/main_menu',  $this->web);
			$this->web['error_message'] = 'Something went wrong. Please check you entered data.';
			$this->load->view('my_pages/user_pages_header',  $this->web);
			$this->load->view('my_pages/user_menu',  $this->web);
			$this->load->view('my_pages/data_entry_error',  $this->web);
			$this->load->view('my_pages/user_pages_footer',  $this->web);
			//$this->load->view('layout/front/main_content', $data);
			$this->load->view('layout/front/footer',  $this->web);

		}
		$data=array();
		if(isset($this->web['profile'])){
			$this->load->model('customers_model');
			$this->customers_model->ci_where = array();
			$customer = $this->customers_model->getById($this->web['profile']['customer_id']);
			$this->web['profile']['customer_name'] = $customer['customer_name'];
			$this->web['profile']['customer_type'] = $customer['customer_type'];
	        $this->web['profile']['registration_no'] = $customer['registration_no'];
	        $this->web['profile']['email'] = $customer['email'];
	        $this->web['profile']['website'] = $customer['website'];
		}
		
		if(isset($this->web['profile']['customer_type']) && $this->web['profile']['customer_type'] === 'school'){
			// model students
			$mname = 'students_model';
		}else{
			$mname = 'customer_employees_model';
		}
		$this->load->model($mname);
		foreach($this->request as $key => $val ){
			if(array_key_exists($key, $this->{$mname}->table_properties['fields']) ){
				$data[$key]= trim($val);
			}
		}
		$customer_id = $this->web['profile']['customer_id'];
		
		 if(isset($_FILES) && !empty($_FILES)){
			$year = date('Y');
			if(isset($this->web['profile']['customer_type']) && $this->web['profile']['customer_type'] === 'school'){
				$upload_path = 'uploads/school/idcard_photos/'.$customer_id.'/'.trim($this->request['customer_templates_id']).'/';
			}else{
				$upload_path = 'uploads/corporate/idcard_photos/'.$customer_id.'/'.trim($this->request['customer_templates_id']).'/';
			}
			defined('UPLOAD_PHOTO_PATH') || define('UPLOAD_PHOTO_PATH', $upload_path);
			if(!file_exists(UPLOAD_PHOTO_PATH)) mkdir(UPLOAD_PHOTO_PATH,0777, true);
			$file_detail = array();
			foreach($_FILES as $fname => $file){
				if(array_key_exists( $fname, $this->{$mname}->table_properties['fields']) ){
					if (!empty($file['name'])) {
						$filename = $file['name'];
						$arr = explode('.', $filename);
						$arr = array_reverse($arr);
						$exts = array('jpg', 'jpeg','png');
						if (in_array($arr[0], $exts)) {
							if (move_uploaded_file($file['tmp_name'], UPLOAD_PHOTO_PATH ."/". $filename)) {
								$file_detail['filename'] = $filename;
								$file_detail['path'] = $upload_path ."/". $filename;
								$file_detail['file_status'] = '1';
							} else {
								$file_detail['file_status'] = '0';
								$file_detail['error_msg'] = 'File not uploaded! Please try again';
							}
						} else {
							$file_detail['file_status'] = '0';
							$file_detail['error_msg'] = 'Invalid file type';
						}
					}
					if($file_detail['file_status'] === '1'){
						$data[$fname]= $filename;
					}
					
				}
			}
		}
		$this->load->model('customer_templates_model');
		$this->customer_templates_model->ci_where = array();
		$master_template = $this->customer_templates_model->getById($this->request['template_id']);
		
		$icard_json_obj = json_decode($master_template['template_data_json']);
		$text_for_qr_code = '';
		$upload_qrcodes_path = UPLOADS_QRCODES_PATH.$customer_id.'/';
		if(!file_exists($upload_qrcodes_path)) mkdir($upload_qrcodes_path,0777, true);
		foreach($icard_json_obj->objects as $key => $obj_json ){
			if(isset($obj_json->id) && strpos($obj_json->id, 'control_') !== false ){
				$col_name = str_replace('control_', '', $obj_json->id) ;
				if(array_key_exists($col_name, $data) ){
					$obj_json->text = (is_numeric($data[$col_name])) ?  (string) $data[$col_name]: $data[$col_name];
					$text_for_qr_code .= $data[$col_name];
				}
			}
			if(!isset($obj_json->id) && isset($obj_json->text) && strpos(strtolower($obj_json->text), 'uf') !== false ){
				$obj_json->text = str_replace('uf', '\uf', $obj_json->text);
			}
			if( isset($obj_json->src) && strpos($obj_json->src, 'qrcode') !== false){
				$this->load->library('ciqrcode');
				$qr_image= rand().'.png';
				$params['data'] = $text_for_qr_code;
				$params['level'] = 'H';
				$params['size'] = 8;
				$params['savename'] = $upload_qrcodes_path.$qr_image;
				if($this->ciqrcode->generate($params))
				{
					$obj_json->src= base_url().'/'. $upload_qrcodes_path.$qr_image;	
				}
			}
			if( isset($obj_json->src) && strpos($obj_json->src, 'photo_1') !== false){
				$wd = $obj_json->width;
				$targetFile = UPLOAD_PHOTO_PATH.str_replace('.', '_new.',$data['photo_1']);	
				$originalFile = UPLOAD_PHOTO_PATH.$data['photo_1'];
				$img = $this->resize_photo($wd, $targetFile, $originalFile);
				$obj_json->src = base_url().'/'.$targetFile;
			}
			if( isset($obj_json->src) && strpos($obj_json->src, 'photo_2') !== false){
				$wd = $obj_json->width;
				$targetFile = UPLOAD_PHOTO_PATH.str_replace('.', '_new.',$data['photo_2']);	
				$originalFile = UPLOAD_PHOTO_PATH.$data['photo_2'];
				$img = $this->resize_photo($wd, $targetFile, $originalFile);
				$obj_json->src = base_url().'/'.$targetFile;
			}
			if( isset($obj_json->src) && strpos($obj_json->src, 'photo_3') !== false){
				$wd = $obj_json->width;
				$targetFile = UPLOAD_PHOTO_PATH.str_replace('.', '_new.',$data['photo_3']);	
				$originalFile = UPLOAD_PHOTO_PATH.$data['photo_2'];
				$img = $this->resize_photo($wd, $targetFile, $originalFile);
				$obj_json->src = base_url().'/'.$targetFile;
			}
			$icard_json_obj->objects[$key] = $obj_json;
		}
		if(!empty($data)){
			$data['created_at'] = date('Y-m-d'); 
			$data['customers_id'] = $this->web['profile']['customer_id'];
			$data['customer_templates_id'] = $this->request['customer_templates_id'];
			$data['created_by'] = $this->session->userdata['loggedin']['id'];
			$data['status'] = 'draft';
			$data['icard_json'] = stripslashes(json_encode($icard_json_obj) );
			$id = (isset($this->request['id']))?$this->request['id']:0;
			if($this->{$mname}->save_record($id, $data)){
				if(isset($this->request['save_and_add']) && !empty($this->request['save_and_add'])){
					$redirect = base_url().'My_Pages/data_entry_manual?q='.$this->request['template_id'];
				}else{
					$redirect = base_url().'My_Pages/myaccount';
				}
				
				redirect($redirect);
			}

		}
	}
	public function mydata() {
		$status = (isset($this->request['SUB_ACTION']) && !empty($this->request['SUB_ACTION'])) ? $this->request['SUB_ACTION'] : null ;
		
		if(isset($customer['customer_type']) && $customer['customer_type'] == 'school' ){
			$this->_model = 'temp_students';
			$this->initLoad();
			$rows = $this->school_id_cards($status);
		}else{
			$this->_model = 'customer_employees';
			$this->initLoad();
			$rows = $this->corporate_id_cards($status);
			
		}
		
		$temp_cards = array();
		if(!empty($rows)){
			$i = 0;
			$columns = array('customer_templates_id');
			foreach($rows as $row){
				$template_unique_id = $row['customer_templates_id'];
				$canvas = $this->getCustomerTemplate($this->web['profile']['customer_id'], $template_unique_id,  $row);
				if($i===0){
					if(count($row) > 0){
					$c=0;
						foreach($row as $col => $values){
							if( $values && $c > 4)	
								$columns[] =$col;
							$c++;
						}
					}

				}
				$row['idcard'] = $canvas[$template_unique_id];
				$temp_cards[] = $row;
				$i++;
			}
		}

		$this->web['rows'] = $temp_cards;
		$this->web['columns'] = (isset($columns) && count($columns)>0) ? $columns:array();
		//echo "<pre>";print_r($columns); echo"</pre>";

		$this->load->view('layout/front/header',  $this->web);
		$this->load->view('layout/front/main_menu',  $this->web);
	
		$this->load->view('my_pages/user_pages_header',  $this->web);
		$this->load->view('my_pages/user_menu',  $this->web);
		$this->load->view('my_pages/user_data_menu',  $this->web);
		$this->load->view('my_pages/draftidcards',  $this->web);
		$this->load->view('my_pages/user_pages_footer',  $this->web);
		//$this->load->view('layout/front/main_content', $data);
		//$this->load->view('layout/front/footer',  $this->web);
	}
	
 private function getTemplateFields($customers_id, $customer_type){
	 if(!$customers_id || $customers_id === '' || $customers_id == '' || !$customer_type || $customer_type == '' )
	 return array();
	 $cols = array();
	if($customer_type === 'school'){
		$customer_table = 'students';
		$customer_model = 'students_model';
	}else{
		$customer_table = 'customer_employees';
		$customer_model = 'customer_employees_model';
	}
	$this->load->model($customer_model);
	 $this->load->model('customer_templates_model');
	 $this->customer_templates_model->ci_where = array();
	 $this->customer_templates_model->ci_where['customer_templates.customers_id'] = $customers_id;
	 $rows = $this->customer_templates_model->getAll();
	 if(!empty($rows)){
		 foreach($rows as $row){
			 $this->{$customer_model}->ci_where = array();
			 $this->{$customer_model}->ci_where['customer_templates_id'] = $row['template_unique_id'];
			 if( !empty($this->{$customer_model}->getAll())  ){
				$this->default_template_unique_id = $row['template_unique_id'];
			 }
			 $flds_front = (array) json_decode($row['template_variables']);
			 if(isset($row['template_variables_back']) && $row['template_variables_back'] != '' )
				 $flds_back = (array) json_decode($row['template_variables']);

			$flds = (isset($flds_back) && !empty($flds_back)) ? array_merge($flds_front, $flds_back) :  $flds_front;
			if(count($flds) > 0 ){
				foreach($flds as $fld_name => $fld_obj ){
					$table_col = trim(str_replace(array('control_','image_'), array('',''), $fld_name));
					$cols[$row['template_unique_id']][$table_col] = ucfirst(trim(str_replace(array('control_','_'), array(' ',' '), $fld_name)));
				}
			}	 
			
		 }
	 }
	 return $cols;
 }
}
