<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Vect_Controller Extends CI_Controller
{
	/*
	Protected $instance_id will be used to check if application being used under valid instance or not;
	*/
	protected $instance_id;
	/*
	Protected $instance_id will be used to check if application being used under valid instance or not;
	*/
	public $model;
	/*
	private $request to convert all POST REQUST GET PUT DELETE in one object
	*/
	public  $request = array();
	/*
	private $timestamp to be used to set Date Time format for SQL operation in common manner for entire application
	*/
	public $timestamp;	
	/*
	private $request_type to get Content of request type is json or raw data 
	*/
	public $request_type;
	/*
	private $response_type will be used to set Which type of response will be allowed from controller 
	*/
	public $response_type;
	/*
	private $auth_required to check if Create of Add action will required user authentication or not
	*/
	public $auth_required = true;
	/*
	Public $auth_type Authentication Type 
	*/
	public $auth_type;
	/*
	Exceptions on failure 
	*/
	public $exception;
	
	/*
	public $data_bv;
	*/
	public $data_bv = array();
	const LISTINGS_DEFAULT_PER_PAGE = 10;
	
	
	public $draft_arr = array();
	public $ajax_url = '';
	public $ip_address = '';
	public $months_arr = array();
	public $type_of_schools_arr = array();
	public $roles_accesses = array();
	public $add_new_btn = '';
	public $entity = '';
	public $module_id = 0;
	public $module_access_id = 0;
	public $system_modules = array();
	public $class_name = '';
	public $edit_url = '';
	public $listpage_url = '';
	public $url_users = '';
	public $url_login = '';
	public $payable_modes = array();
	public $users_icons = array();
	public $leave_statuses = array();
	public $db_host = 'localhost';
	public $db_name = 'bimhr';
	public $db_user = 'empuser';
	public $db_password = 'emp@bim16';
	public $setups_module_id;
	public $cart_count = 0;
	public $last_cart_id = 0;
	public $preferences = array();
	public function __construct(){
		//$conn = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name, $this->db_user, $this->db_password);
		parent::__construct();
		//$this->model = $model;
		//$this->load->model($this->model);
        $this->request();
        $this->setDataBv();
		$this->login_url = base_url()."Login/";
		$this->ajax_url = base_url()."Ajax/";
		$this->ajax_url_upload_pic = base_url()."Ajax/uploadPic";
		$this->ajax_url_delete_item = base_url()."Ajax/DeleteItem";
		$this->ajax_url_undo_item = base_url()."Ajax/undoItem";
		$this->ajax_url_forgot_password = base_url()."Ajax/forgotPassword";
		$this->ajax_url_reset_password = base_url()."Ajax/resetPassword";
		$this->url_forgot_password = base_url()."Login/resetPassword";
		$this->url_reset_password = base_url()."Login/resetPassword";
		$this->url_login = base_url()."Login/";
		$this->url_users = base_url()."Users/list_employees/employee";
		$this->url_thankyou = base_url()."Home/thankyou";
		$this->ip_address = $this->input->ip_address();
		$this->setMonthsArr();
		$this->getSystemModules();
		$this->class_name = $this->childClass();
		$this->edit_url =  base_url()."".$this->class_name."/add_edit?token=".base64_encode($this->ip_address);
		$this->view_url =  base_url()."".$this->class_name."/view?token=".base64_encode($this->ip_address);
		$this->listpage_url =  base_url()."".$this->class_name."/index?token=".base64_encode($this->ip_address);
		$this->payableModes();
		$this->setUsersIcons();
		$this->setLeaveStatuses();
		$this->request['ajax_url_undo_item'] = $this->ajax_url_undo_item;
		$this->request['CONTROLLER'] = $this->uri->segment(1);
		$this->request['ACTION'] = $this->uri->segment(2);
		$this->request['SUB_ACTION'] = $this->uri->segment(3);
		$this->type_of_schools_arr = array('english'=>'English', 'hindi'=>'Hindi','gujarati'=>'Gujarati');
		
		$this->steCustomerpreferences();
		if($this->session->userdata('preferences') ){
			$this->preferences = $this->session->userdata('preferences');
		}
	}
	
        public  function setModel($_model){
			$this->entity = $_model;
			$this->model = $_model.'_model';
			$this->getRolesAccesses();
			$this->setModuleId();
			$this->setupsModuleId();
			$this->request['remove_from'] = $this->entity;
			//$this->checkAccess();
			//if($this->checkAccess() == false){
				//redirect('Dashboards/');
			//}
        }
        public function getModel(){
            return $this->model;
        }
	public function request(){
		if(isset($_REQUEST) && !empty($_REQUEST) ){
			foreach($_REQUEST as $key => $value){
				if(is_array($value)){
					if(is_numeric($key)){
						$k = (int) $key;
					}
					if(!is_numeric($key)){
						$k = trim($key);
					}
					$this->request[$k] = $value; // $this->preventxss->encodeForHTML($value);
				}
				if(!is_array($value)){
					if(is_numeric($key)){
						$k = (int) $key;
					}
					if(!is_numeric($key)){
						$k = trim($key);
					}
					
					$v = trim($value);
					$this->request[$k] = $value; // $this->preventxss->encodeForHTML($v);
				}
			}
		 unset($_REQUEST);		 
		}
                /*
		if(isset($_POST) && !empty($_POST) ){
			foreach($_POST as $key => $value){
				if(!in_array($key, $this->request)){
					if(is_array($value)){
						if(is_numeric($key)){
							$k = (int) $key;
						}
						if(!is_numeric($key)){
							$k = trim($key);
						}
						$this->request[] = $value;
					}
					if(!is_array($value)){
						if(is_numeric($key)){
							$k = (int) $key;
						}
						if(!is_numeric($key)){
							$k = trim($key);
						}
						$v = trim($value);
						$this->request[] = $v;
					}
				}
			}
			 unset($_POST);	
		}
                  */
                 /*
		if(isset($_GET) && !empty($_GET) ){
			foreach($_GET as $key => $value){
				if(!in_array($key, $this->request)){
					if(is_array($value)){
						if(is_numeric($key)){
							$k = (int) $key;
						}
						if(!is_numeric($key)){
							$k = trim($key);
						}
						$this->request[] = $value;
					}
					if(!is_array($value)){
						if(is_numeric($key)){
							$k = (int) $key;
						}
						if(!is_numeric($key)){
							$k = trim($key);
						}
						$v = trim($value);
						$this->request[] = $v;
					}
				}
			}
			unset($_GET);			
		}
                  **/
                  
	}
	public function setDataBv(){
		$this->data_bv['data-bv-message']=' data-bv-message=" ##fld## is not valid" ';
		$this->data_bv['data-bv-notempty']=' data-bv-notempty="##boolen##" ';
		$this->data_bv['data-bv-notempty-message']=' data-bv-notempty-message="The ##fld## is required" ';
		$this->data_bv['data-bv-regexp']=' data-bv-regexp="##boolen##" ';
		$this->data_bv['data-bv-regexp-regexp']=' data-bv-regexp="##exp##" ';
		$this->data_bv['data-bv-regexp-message']=' data-bv-regexp-message="The ##fld## can only consist of ##msg##" ';
		$this->data_bv['data-bv-stringlength']=' data-bv-stringlength="##boolen##" ';
		$this->data_bv['data-bv-stringlength-min']=' data-bv-stringlength="##int##" ';
		$this->data_bv['data-bv-stringlength-max']=' data-bv-stringlength=##int##" ';
		$this->data_bv['data-bv-stringlength-message']=' data-bv-stringlength="The ##fld## must be more than ##int_min## and less than ##int_max## characters long" ';
	}
	/*
	@params $fld 		for data-bv-message
	@params $ne_msg 	for data-bv-notempty
	@params $re 		for data-bv-notempty-regexp for e.g.( data-bv-notempty-regexp="true")
	@params $re_re 		for data-bv-notempty-regexp-regexp for e.g.( data-bv-regexp-regexp="^[a-zA-Z0-9_\.]+$" )
	@params $re_msg 	for data-bv-notempty-regexp-message for e.g.( data-bv-regexp-message="The username can only consist of alphabetical, number, dot and underscore" )
	@params $sl 		for data-bv-stringlength for e.g.( data-bv-stringlength="true" )
	@params $sl_min 	for data-bv-stringlength for e.g.( data-bv-stringlength-min="6" )
	@params $sl_max 	for data-bv-stringlength for e.g.( data-bv-stringlength-max="30" )
	@params $sl_msg 	for data-bv-stringlength for e.g.( data-bv-stringlength-message="The username must be more than 6 and less than 30 characters long" )
	
	*/
	public function getDataBvArr($fld='', $ne_msg='', $re='', $re_re='', $re_msg='', $sl=false, $sl_min=1, $sl_max=2, $sl_msg='' ){
		$data_bv_arr = array();
		// for invalid value
		if($mgs !=''){
			$data_bv_arr[]= str_replace("##fld##", $fld, $this->data_bv['data-bv-message']);
		}
		// for not empty
		if($ne_msg && $ne_msg != '' ){
			$data_bv_arr[]= str_replace("##boolen##", 'true', $this->data_bv['data-bv-notempty']);
			$data_bv_arr[]= str_replace("##fld##", $ne_msg, $this->data_bv['data-bv-notempty-message']);
		}
		
		if($re && $re == true ){
			$data_bv_arr[]= str_replace("##fld##", $ne_msg, $this->data_bv['data-bv-regexp']);
			$data_bv_arr[]= str_replace("##fld##", $ne_msg, $this->data_bv['data-bv-regexp-regexp']);
			$data_bv_arr[]= str_replace("##fld##", $ne_msg, $this->data_bv['data-bv-regexp-message']);
		}
		if($sl && $sl == true ){
			$data_bv_arr[]= str_replace("##fld##", $sl, $this->data_bv['data-bv-stringlength']);
			if($sl_min)
				$data_bv_arr[]= str_replace("##fld##", $sl_min, $this->data_bv['data-bv-stringlength-min']);
			if($sl_max)
				$data_bv_arr[]= str_replace("##fld##", $sl_max, $this->data_bv['data-bv-stringlength-max']);
			if($sl_msg)
				$data_bv_arr[]= str_replace("##fld##", $sl_msg, $this->data_bv['data-bv-stringlength-msg']);
			
			
		}
		return $data_bv_arr;
	}
	public function erase_val($myarr) {
		$myarr = array_map(create_function('$n', 'return null;'), $myarr);
		return $myarr;
	}
	public function validateDataType(&$fieldsArr = array()){
		$returnArr = array('errors' => 'Please provide Values');
		$errors = array();
		if(empty($fieldsArr)){
			return $returnArr;
		}
		if(!empty($fieldsArr)){
			foreach( $fieldsArr as $key => $val){
				$type = (isset($val['type'])) ? $val['type'] : 'varchar';
				$len = (isset($val['len'])) ? $val['len'] : '1';
				if($type == 'enum'){
					if(in_array($this->web['request'][$key], $len)){
						$returnArr[$key] = $this->web['request'][$key];
					}else{
						$errors[] = ' In valid '.$val['caption'][2];
					}
				}
				if($type == 'email'){
					if(filter_var($this->web['request'][$key], FILTER_VALIDATE_EMAIL)){
						$returnArr[$key] = $this->web['request'][$key];
					}else{
						$errors[] = ' In valid '.$val['caption'][2];
					}
				}
				if($type == 'varchar'){
					if(isset($val['rules']) && !empty($val['rules'])  && isset($val['rules']['regex']['server'])){
						if( preg_match($val['rules']['regex']['server'], $this->web['request'][$key]) == 0 ){
							$returnArr[$key] = $this->web['request'][$key];
						}else{
							$errors[] = ' In valid '.$val['caption'][2];
						}
					}
					
				}
				if($type == 'int'){
					if( is_numeric(trim($this->web['request'][$key])) && (  strlen($this->web['request'][$key]) <= $len)){
						$returnArr[$key] = $this->web['request'][$key];
					}else{
						$errors[] = ' In valid '.$val['caption'][2];
					}
				}
				if($type == 'date'){
					$returnArr[$key] = date('m/d/Y', strtotime(trim($this->web['request'][$key])));
				}
				if($type == 'timestamp'){
					$returnArr[$key] = date('m/d/Y h:i:s', strtotime(trim($this->web['request'][$key])));
				}
				if($type == 'boolean'){
					$returnArr[$key] = $this->web['request'][$key];
				}
				if($type == 'text'){
					$returnArr[$key] = $this->web['request'][$key];
				}
			}
			if(count($errors) > 0){
				$returnArr['errors'] = $errors;
			}
			return $returnArr;
		}
		
		
	}
	public function setDraft($token){
		if($token == '' || $token == null ){
			$this->draft_arr = array();
		}
		$this->draft_arr = $this->web['request'];
	}
	public function getDraft($token, $json){
		if($token == '' || $token == null ||  $json == '' || $token == json ){
			$this->draft_arr = array();
		}
		return $this->draft_arr = json_decode($json);
	}
	/*
	@function setDataBvToField
	@param array $fields_arr
	@return array $fld_arr;
	*/
	public function setDataBvToField($fields_arr){
		//$data_bv = array();
			$fld_arr = array();
			$attributes = '';
			$attributes_arr = array();
			foreach( $fields_arr  as $field => $data_bv){
				
				$ne = '';
				$ne_msg = '';
				$reg_exp = '';
				$reg_exp_msg = '';
				$str_len = '';
				$str_len_min = '';
				$str_len_max = '';
				$str_len_message = '';
				
				if(isset($data_bv['rules']) && count($data_bv['rules']) > 0){
					$field_label =  $data_bv['label'];
					if(isset($data_bv['rules']['is_required']) && $data_bv['rules']['is_required'] == 1){
						$ne = ' data-bv-notempty="true" ';
						$ne_msg = ' data-bv-notempty-message="'.$field_label.' is required" ';
						if(isset($data_bv['rules']['regex']) && isset($data_bv['rules']['regex']['client']) && ($data_bv['rules']['regex']['client'] != '')){
							$reg_exp = ' data-bv-regexp-regexp=" '.$data_bv['rules']['regex']['client'].'" ';
							if(isset($data_bv['rules']['regex']['message']))
								$reg_exp_msg = ' data-bv-regexp-regexp-message=" '.$data_bv['rules']['regex']['message'].'" ';
						}
					}
					if(!isset($data_bv['rules']['is_required'])){
						if(isset($data_bv['rules']['regex']) && isset($data_bv['rules']['regex']['client']) && ($data_bv['rules']['regex']['client'] != '')){
							$reg_exp = ' data-bv-regexp-regexp=" '.$data_bv['rules']['regex']['client'].'" ';
							if(isset($data_bv['rules']['regex']['message']))
								$reg_exp_msg = ' data-bv-regexp-regexp-message=" '.$data_bv['rules']['regex']['message'].'" ';
						}
					}
				}
				if( isset($data_bv['type']) &&  ($data_bv['type'] == 'int' || $data_bv['type'] == 'varchar' || $data_bv['type'] == 'text') ){
					if(isset($data_bv['len']) && $data_bv['len'] != ''){
						$str_len = 'data-bv-stringlength="true"';
						if( strpos($field, 'zipcode') === false && strpos($field, 'mobile') === false && strpos($field, 'mobile') === false ){
							$str_len_min = ' data-bv-stringlength-min="0" ';
						}
						if(isset($data_bv['min'])){
							$str_len_min = ' data-bv-stringlength-min="'.$data_bv['min'].'" ';
						}
						$str_len_min = 'data-bv-stringlength-max="'. $data_bv['len'] .'"';
						 $str_len_message = 'data-bv-stringlength-max="'. $field_label .' must less than '.$data_bv['len'].' and minimum 0"';
					}		
				}
				$attributes_arr = array($ne, $ne_msg, $reg_exp, $str_len, $str_len_min, $str_len_max, $str_len_message);
				if(count($attributes_arr) > 0){
					$fld_arr[$field] = 	implode(' ',$attributes_arr); 
				}
				
			}	
		return $fld_arr;	
	}
	function json_decode_array($input) { 
	  $from_json =  json_decode($input, true);  
	  return $from_json ? $from_json : $input; 
	}
	public function jsonObjectToArray($json_string){
		$_array = array();
		if( isset($json_string)){
			$drafted_array =  (array) json_decode($json_string);
			foreach( $drafted_array as $key => $obj){
				if(!is_object($obj)){
					$_array[$key] = $obj;
				}
				if(is_object($obj)){
					foreach( (array) $obj as $k => $ob ){
						if(!is_object($obj)){
							$_array[$key][$k] = $ob;
						}
						if(is_object($ob)){
							foreach( (array) $ob as $_k => $_ob){
								$_array[$key][$k][$_k] = $_ob;
							}
						}
					}	
				}
			}
		}
		return $_array;
	}
	public function do_upload()
    {
		    //$fname= $_FILES['userfile']['tmp_name'];
			  $loc = './uploads/';
             
				/*
                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {	
						
                        //$data = array('upload_data' => $this->upload->data());

                        //$this->load->view('upload_success', $data);
                }
				*/
        }
	public function setMonthsArr(){
		$this->months_arr[1] = array('abbr'=> 'Jan', 'full'=>'January');
		$this->months_arr[2] = array('abbr'=> 'Feb', 'full'=>'February');
		$this->months_arr[3] = array('abbr'=> 'Mar', 'full'=>'March');
		$this->months_arr[4] = array('abbr'=> 'Apr', 'full'=>'April');
		$this->months_arr[5] = array('abbr'=> 'May', 'full'=>'May');
		$this->months_arr[6] = array('abbr'=> 'Jun', 'full'=>'June');
		$this->months_arr[7] = array('abbr'=> 'Jul', 'full'=>'July');
		$this->months_arr[8] = array('abbr'=> 'Aug', 'full'=>'August');
		$this->months_arr[9] = array('abbr'=> 'Sept', 'full'=>'September');
		$this->months_arr[10] = array('abbr'=> 'Oct', 'full'=>'October');
		$this->months_arr[11] = array('abbr'=> 'Nov', 'full'=>'November');
		$this->months_arr[12] = array('abbr'=> 'Dec', 'full'=>'December');
	}	
	public function getEntityActionButton($uid, $module, $button_for, $optional = array()){
		if(!$uid)
			return null;
		
		
	}
	private function getRolesAccesses(){
		
		if(isset($this->session->userdata['loggedin']['role_id'])){
			
			//echo $this->session->userdata['loggedin']['role_id']; exit;
			$this->load->model('roles_accesses_model');
			$this->roles_accesses_model->where['roles_accesses.role_id'] = $this->session->userdata['loggedin']['role_id'];
			$rows = $this->roles_accesses_model->getAll();
			if(!empty($rows)){
				foreach($rows as $row){
					$_arr = array();
					//$this->roles_accesses[$row['module_controller']] = $row;
					if(strpos($row['module_controller'], '_') !== false){
						$_arr = explode('_', $row['module_controller']);
						$_arr[0] = $this->inflect->singularize($_arr[0]); 
					}
					if(isset($row['module_sub_action'])){
						$_arr[0] = $this->inflect->singularize($row['module_sub_action']);
					}
					if(isset($_arr[1])){
						$_arr[1] = ucfirst($this->inflect->singularize($_arr[1]));
					}
					$label = implode(' ', $_arr);
					
					$add_new 	= $this->printAddNewButton($label, $row['module_controller'] , $row['module_action'],$row['add_entity']  , $this->ip_address); 
					$key  =  (isset($row['module_sub_action'])) ? $row['module_controller']."_".$row['module_action']."_".$row['module_sub_action']  : $row['module_controller']."_".$row['module_action'];
					$this->roles_accesses[$row['id']] = array(
							'module_controller' => $row['module_controller'],
							'module_action' => $row['module_action'],
							'system_module_id' => $row['system_module_id'],
							'full_control' => $row['full_control'],
							'add_entity' => $row['add_entity'],
							'edit_entity' => $row['edit_entity'],
							'view_entity' => $row['view_entity'],
							'delete_entity' => $row['edit_entity'],
							'upload_image' => $row['upload_image'],
							'max_upload_image' => $row['max_upload_image'],
							'upload_doc' => $row['upload_doc'],
							'max_upload_doc' => $row['max_upload_doc'],
							'download_doc' => $row['download_doc'],
							'import_entity' => $row['import_entity'],
							'max_import_entity' => $row['max_import_entity'],
							'export_entity' => $row['export_entity'],
							'max_export_entity' => $row['max_export_entity'],
							'add_button' => $add_new
					);
				}
				
			}
			$this->request['roles_accesses'] = $this->roles_accesses;
		}
	}
	public function checkAccess(){
		if(isset($_SERVER['PATH_INFO'])){
			//exit('here');
			//$controller = $this->router->fetch_class();
			//$method = $this->router->fetch_method();
			//$accesses = $this->getRolesAccess();
			//echo "<pre>";
			//print_r($accesses);
			//exit;
			//echo $controller ." -- ".	$method; 
			$path_info = explode('/',$_SERVER['PATH_INFO']); 
			if(count($path_info) > 0){
				$controller = $path_info[1];
				$method  = strtolower($path_info[2]);
				if(isset($controller) && isset($method)){
					if(isset($this->roles_accesses[$method]) && $this->roles_accesses[$method]['add_entity'] == 0 ){
						return false;
					}else{
						return true;
					}
				}else{
						return true;
				}
			}
		return true;	
		}
		return true;
	}
	private function printAddNewButton( $label, $controller, $action, $allowed = false, $ip_address = null){
			$html = '';
			
			if($allowed ==  '1' ){
				 $label = (strpos( $label, '_') !== false) ? str_replace('_', ' ', $label) : $label;
				$id = base64_encode(0);	
				$token = ($ip_address != null) ? base64_encode($ip_address): base64_encode(date('Ymdhis'));
				$url = base_url().''.$controller.'/add_edit?token='.$token;
				$onclick = "javascript:editrecord('".$id ."','".$url."');";
				$html .= '<a  href="javascript:void(0);" onclick="'.$onclick.'"><button title = "Add New '.ucfirst($label).' " type="button" class="btn btn-primary"> Add New '.ucfirst($label).' </button></a>';
			}
			return $html;
	}
	public function setModuleId($module_controller = '', $module_action = ''){
		$id  = '';
		if(isset($_SERVER['PATH_INFO'])){
			$path_info = explode('/',$_SERVER['PATH_INFO']); 
			$controller = strtolower($path_info[1]);
			$action  = (isset($path_info[2])) ? strtolower($path_info[2]) : 'index' ;
		}
		$controller = $this->uri->rsegments[1];
		$action = $this->uri->rsegments[2];
		$this->load->model('system_modules_model');
		$this->system_modules_model->ci_where["`system_modules`.`module_controller`"] = $this->entity;
		$this->system_modules_model->ci_where["`system_modules`.`module_action`"] = $action;
		$rows = $this->system_modules_model->getAll();
		if(!empty($rows)){
			$this->module_id = $rows[0]['id'];
			foreach($this->roles_accesses as $key => $accsess){
				if($accsess['system_module_id'] == $this->module_id){
					$this->module_access_id = $key;
					break;
				}
			}
		}
	}
	public function setupsModuleId($module_controller = '', $module_action = ''){
		$id  = '';
		if(isset($_SERVER['PATH_INFO'])){
			$path_info = explode('/',$_SERVER['PATH_INFO']); 
			$controller = strtolower($path_info[1]);
			$action  = (isset($path_info[2])) ? strtolower($path_info[2]) : 'index' ;
		}
		$controller = $this->uri->rsegments[1];
		$action = $this->uri->rsegments[2];
		$this->load->model('system_modules_model');
		$this->system_modules_model->ci_where["`system_modules`.`module_controller`"] = $this->entity;
		$this->system_modules_model->ci_where["`system_modules`.`parent_id`"] = 0;
		$this->system_modules_model->ci_where["`system_modules`.`module_action`"] = 'index';
		$rows = $this->system_modules_model->getAll();
		if(!empty($rows)){
			$this->setups_module_id = $rows[0]['id'];
		}
	}
	public function getSystemModules(){
		$this->load->model('system_modules_model');
		$this->system_modules_model->where['system_modules.status'] = '1';
		$rows = $this->system_modules_model->getAll();
		if(!empty($rows)){
			foreach($rows as $row){
				$this->system_modules[$row['id']] = array('parent_id'=>$row['parent_id'], 'system_module_name'=>$row['system_module_name'], 'module_controller'=>$row['module_controller'], 'module_action'=>$row['module_action'], 'module_sub_action'=>$row['module_sub_action']);
			}
			
		}
		
	}
	public function sendEmail($to, $from, $subject, $body ){
		        //Sending email using CI Email library
				/*
				$config = array(
					'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
					'smtp_host' => 'ssl://smtp.gmail.com', 
					'smtp_port' => 465,
					'smtp_user' => 'shailesh.gajjar83@gmail.com',
					'smtp_pass' => 'Constentinople#13',
					//'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
					'mailtype' => 'html', //plaintext 'text' mails or 'html'
					'smtp_timeout' => '4', //in seconds
					'newline' => '\r\n',
					'charset' => 'iso-8859-1',
					'wordwrap' => TRUE
				);
				$this->load->library('email', $config);
                $this->email->from($from);
                $this->email->to($to);
                $this->email->subject($subject);
				$this->email->message($body);
				$result = $this->email->send();
				*/
				$this->load->library('email');
				$config['protocol']    = 'smtp';
				$config['smtp_host']    = 'ssl://smtp.gmail.com';
				$config['smtp_port']    = '465';
				$config['smtp_timeout'] = '7';
				$config['smtp_user']    = 'shailesh.gajjar83@gmail.com';
				$config['smtp_pass']    = 'Constentinople#13';
				$config['charset']    = 'utf-8';
				$config['newline']    = "\r\n";
				$config['mailtype'] = 'html'; // or html
				$config['validation'] = TRUE; // bool whether to validate email or not      
				$this->email->initialize($config);

				$this->email->from(' Muktjivan pixel');
                $this->email->to($to);
                $this->email->subject($subject);
				$this->email->message($body);  
				if($this->email->send()) return true; else return false;
			
	}
	
	public function getAdminEmailID(){
		
		$this->load->model( 'users_officials_model');
		$this->users_officials_model->table_properties['cross_fields']['username']= array(
					 'caption' => array('username', 'username', 'username Employee'),		
					 'type'=>'varchar',
					 'len' => 100,
					 'value' => null,
					 'in_select' => 1,
					 'in_insert' => 0,
					 'modified' => ' users.username as username'
		);
		$this->users_officials_model->table_properties['cross_fields']['active_status']= array(
					 'caption' => array('active_status', 'active_status', 'active_status Employee'),		
					 'type'=>'varchar',
					 'len' => 100,
					 'value' => null,
					 'in_select' => 1,
					 'in_insert' => 0,
					 'modified' => ' users.active_status as active_status'
		);
		$this->users_officials_model->table_properties['join_tables'][]= array('users', 'users.id = users_officials.user_id AND users.active_status = 1 AND  users.role_id = 1', 'left');
                $this->users_officials_model->setCols();
		$this->users_officials_model->setJoins();
		$this->users_officials_model->where["users_officials.official_email !="] ='';
		$rows = $this->users_officials_model->getAll();
		if(!empty($rows)){
			if(isset($rows[0]['official_email']))
				return $rows[0]['official_email'];
		}
		return false;
	}
	public function sendSignUpEmail( $customer_name, $contact_name, $email, $username, $password, $token)
	{
		//$from = $this->getAdminEmailID();
		$from = 'info@muktjivanpixel.com';
		$login = base_url().'user-login';
		if($from){
			$link = $login."?token=".$token;
			$subject = 'Muktjivan Pixel : New Account Created :: '. $customer_name;
			$body = '';
			$body .= '<p> Dear '.$contact_name.', </p>';
			$body .= '<p>  </p>';
			$body .= '<p> Welcome to Muktjivan Pixel </p>';
			$body .= '<p> Please click <a href="'.$link.'"> here </a> or copy and paste below link to login Muktjivan Pixel. </p>';
			$body .= '<p> URL : '.$link.' </p>';
			$body .= '<p>  </p>';
			$body .= '<p> Login username  : '.$username.' </p>';
			$body .= '<p>  </p>';
			$body .= '<p> Password : '.$password.' </p>';
			$body .= '<p>  </p>';
			$body .= '<p> You can contact us at '.$from.' for more assistance. </p>';
			$body .= '<p>  </p>';
			$body .= '<p>  </p>';
			$body .= '<p>  </p>';
			$body .= '<p> Thank you, </p>';
			$body .= '<p> Muktjivan Pixel. </p>';
			if($this->sendEmail(trim($email), $from, $subject, $body)){
				//echo "success"; exit;
				$return['status']= 'success';
				//$return['message']=  " Reset password link has been sent to your official Email ID. Please check inbox.";
				$return['message']=  " Please click this link to reset password. This link will be expired after 10 Minutes.";
				$return['link']= $link ;
				$return['token']= $token ;
				$return['task']= '';
				
			}else{
				//echo "failed"; exit;
				$return['status']= 'failed';
				$return['message']=  "Something went wrong.Please Contact to Admin to Reset Password";
				$return['state']=  "1001";
			}
		}
	}

	public function sendInquiryEmail( $crm_contact_name, $contact_email, $contact_subject, $contact_number, $contact_message, $contact_for)
	{
		//$from = $this->getAdminEmailID();
		$from = 'noreply@muktjivanpixel.com';
		if($from){
			//$subject = 'Muktjivan Pixel : : New Inquiry Received :: '. $school_name;
			$subject = 'Thank you for writing us.';
			$body = '';
			$body .= '<p> Hello  '.$crm_contact_name.', </p>';
			$body .= '<p> Thank you for writting us.</p>';
			$body .= '<p> </p>';
			$body .= '<p> Our representetive will contact you very soon.</p>';
			$body .= '<p>  </p>';
			$body .= '<p> Regards. </p>';
			$body .= '<p> Muktjivan Pixel. </p>';
			$body .= '<p>  </p>';
			$body .= '<p> Email : inquiry@muktjivanpixel.com</p>';
			$body .= '<p> Ahmedabad IN 38008</p>';
			$this->sendEmail(trim($contact_email), $from, $subject, $body);
			// $subject2 = 'New Inquiry From '. $crm_contact_name;
			// $body2 = '';
			// $body2 .= '<p> Hello Admin, </p>';
			// $body2 .= '<p> New inquiry for '. $contact_for.'</p>';
			// $body2 .= '<p> Name  : '.$crm_contact_name.'</p>';
			// $body2 .= '<p> Email : '.$crm_contact_name.'</p>';
			// $body2 .= '<p> Phone : '.$crm_contact_name.'</p>';
			// $body2 .= '<p> Message : '.$crm_contact_name.'</p>';
			// $body2 .= '<p> Date : '.$crm_contact_name.'</p>';
			// $body2 .= '<p> System Generate Email.</p>';
			// if($this->sendEmail(trim($contact_email), $from, $subject, $body) && $this->sendEmail(trim('apurv.bhavsar.09@gmail.com'), $from, $subject2, $body2)){
			// 	//echo "success"; exit;
			// 	$return['status']= 'success';
			// 	// $return['message']=  " Please click this link to reset password. This link will be expired after 10 Minutes.";
			// 	// $return['link']= $link ;
			// 	// $return['token']= $token ;
			// 	// $return['task']= '';
				
			// }else{
			// 	//echo "failed"; exit;
			// 	$return['status']= 'failed';
			// 	$return['message']=  "Something went wrong.Please Contact to Admin to Reset Password";
			// 	$return['state']=  "1001";
			// }
		}
		//return $return;
	}

	public static function childClass() {
        return get_called_class();
    }
	private function payableModes(){
		$this->payable_modes[1] 	= "Per Month";
		$this->payable_modes[3] 	= "Quarterly";
		$this->payable_modes[12] 	= "Per Annum";
		$this->payable_modes[48] 	= "After Four Years";
	}
	
	private function setUsersIcons(){
		$this->users_icons[5] = 'aero';
		$this->users_icons[2] = 'green';
		$this->users_icons[4] = 'blue';
	}
    public function getModuleIdByModuleAction($action){
		$this->load->model('system_modules_model');
		$this->system_modules_model->ci_where['system_modules.module_action'] = $action;
		$row = $this->system_modules_model->getAll();
		if(!empty($row)){
			return $row[0]['id'];
		}
		return false;
	}
	public function checkAccessForModule($access_id){
		if( isset($this->roles_accesses[$access_id]) && isset($this->roles_accesses[$access_id]['view_entity']) && $this->roles_accesses[$access_id]['view_entity'] != 0 ){
			return true;
		}
		return false;
	}
		public function getAccessForModule($module_id){
		$arr = array();
		$this->load->model('roles_accesses_model');
		$this->roles_accesses_model->ci_where['role_id'] =$this->session->userdata['loggedin']['role_id'];
		$this->roles_accesses_model->ci_where['system_module_id'] = $module_id;
		$arr = $this->roles_accesses_model->getAll();
		if(!empty($arr)){
			return $arr[0]['id'];
		}
		return false;

	}
	private function setLeaveStatuses(){
		$this->leave_statuses[0] ='Applied'; 
		$this->leave_statuses[1] ='Approved By Reporting Manager'; 
		$this->leave_statuses[2] ='Approved By Manager'; 
		$this->leave_statuses[3] ='Rejected'; 
	}
	public function convertDateFormat($sql_date){
		$arr = explode('-', $sql_date);
		$date = $arr[1].'/'.$arr[2].'/'.$arr[0];
		return $date;
	}
	public function steCustomerpreferences(){
		if(isset($this->request['preferences']) && !empty($this->request['preferences'])){
				$this->session->set_userdata('preferences', $this->request['preferences']);
				if(isset( $this->request['target_url'])){
					$this->session->set_userdata('target_url', $this->request['target_url']);
				}
			}
		
	}
	public function add_to_cart($data){
		$this->load->model('carts_model');
		if($this->carts_model->save_record(0, $data)){
			if(isset($this->session->userdata['cart_count'])){
				$this->session->userdata['cart_count'] = $this->session->userdata['cart_count'] + 1 ;
				$this->cart_count  =  $this->session->userdata['cart_count'];
			}else{
				 $this->session->set_userdata('cart_count',1);
				 $this->cart_count = 1;
			}
			$this->last_cart_id = $this->carts_model->last_insert_id;
		}
	}
	function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
	}
	public function sendSMS($mobile, $link, $student, $school=''){
		$content = "Dear parent of ". $student.", We are happy to inform you that now you can fill up you children's detail for schools ID card. Please click on below link.".$link." Thank you From Muktjivan school";
		$url="https://www.way2sms.com/api/v1/sendCampaign";
		$message = urlencode($content);// urlencode your message
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
		curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=5MZFC7C7IAJJNC68RUKUHD1ACE63BCI0&secret=HKT2VNUXF81VIPP3&usetype=stage&phone=".$mobile."senderid=active&message=[$message]");// post data
		// query parameter values must be given without squarebrackets.
		// Optional Authentication:
		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);
		curl_close($curl);
		return json_decode($result);		
		}
		public function sendForgotPasswordEmail( $customer_name, $email, $username, $token)
		{
			//$from = $this->getAdminEmailID();
			$from = 'info@muktjivanpixel.com';
			$reset_password = base_url().'reset-password';
			if($from){
				$link = $reset_password."?token=".$token;
				$subject = 'Forgot Password at Muktjivan Pixel';
				$body = '';
				$body .= '<p> Dear '.$customer_name.', </p>';
				$body .= '<p>  </p>';
				$body .= '<p> We have received a request of password recovery from  username '.$username.' and email ID '.$email.' at Muktjivan Pixel </p>';
				$body .= '<p> Please click <a href="'.$link.'"> '.$link.' </a> or copy and paste below link to reset password of your account at Muktjivan Pixel. </p>';
				$body .= '<p>  </p>';
				$body .= '<p> You can contact us at '.$from.' for more assistance. </p>';
				$body .= '<p>  </p>';
				$body .= '<p>  </p>';
				$body .= '<p>  </p>';
				$body .= '<p> Thank you, </p>';
				$body .= '<p> Muktjivan Pixel. </p>';
				if($this->sendEmail(trim($email), $from, $subject, $body)){
					return true;
				}else{
					echo "Failed";
					return false;
				}
			}
		}
		
	
}
