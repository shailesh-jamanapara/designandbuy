<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
* 12-20-2016
* Login (controller)
*/


class Admin extends Vect_Controller {
	public $web = array();	
	public function __construct(){
		parent::__construct();	
		$this->web['ip_address'] = base64_encode($this->ip_address);
        $this->web['request'] = $this->request;
		$this->load->model('users_model');
		$this->load->helper('captcha');
	}
	
	
	/************* Default load login view page **************/
	public function index(){		
		if(!$this->session->userdata('loggedin')){			
			$this->load->view('admin');
		}else{
			redirect('Dashboards/index');
		}		
	}
	public function school(){		
		$rand = rand(500, 10000);
		$this->load->view('layout/front/header',  $this->web);
        $this->load->view('school_login',  $this->web);
		$this->load->view('layout/front/footer',  $this->web);	
	}
	public function create_account(){		
		//Starts to save data on form submit
		$CI = & get_instance(); 
		if ( isset($this->web['request']['task']) && $this->web['request']['task'] == 'create_account' ) {
			$id = $this->save_customer(); // getting last user id on new insert
			if($id > 0 ){
				$data = array();
				$this->load->model('users_model');
				$data['customer_id'] =$id ; 
				$data['username'] = str_replace(' ', '', strtolower($this->web['request']['first_name']));
				$data['title'] = $this->web['request']['title'];
				$data['designation'] = $this->web['request']['designation'];
				$data['first_name'] = $this->web['request']['first_name'];
				$data['department_id'] = $this->web['request']['department_id'];
				$password = 'user'.rand(5000,10000).'@123';
				$data['password'] =  md5($password);
				$data['role_id'] = 5; 
				$data['active_status'] = 1; 
				$data['updated_on'] = date('Y:m:d');
				$data['updated_by'] = $id;
				$data['created_at'] = date('Y:m:d');
				$data['created_by'] = $id;
				$seed = str_split('abcdefghijklmnopqrstuvwxyz'
                 .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                 .'0123456789!@#$%^&*()'); // and any other characters
				shuffle($seed); // probably optional since array_is randomized; this may be redundant
				$token = '';
				foreach (array_rand($seed, 20) as $k) $token .= $seed[$k];
				$data['token'] = $token; 
				$this->users_model->save_record(0, $data);
				
				$school_name = $this->web['request']['customer_name'];
				$contact_name = $this->web['request']['first_name'];
				$email = $this->web['request']['email'];
				$username = $data['username'];
				
				$data = array();
				$this->load->model('customer_addresses_model');
				$data['customer_id'] 		= $id ; 
				$data['address_type_id '] 	= 1 ; 
				$data['address '] 			= $this->web['request']['address'];
				$data['city_id '] 			= $this->web['request']['city_id']; 
				$data['state_id '] 			= 1 ; 
				$data['zipcode '] 			= $this->web['request']['zipcode'];
				$this->customer_addresses_model->save_record(0, $data);

				$data = array();
				$this->load->model('customer_contacts_model');
				$data['customer_id'] 	= $id ; 
				$data['landline_no '] 	= $this->web['request']['landline_no']; 
				$data['mobile_no '] 	= $this->web['request']['mobile_no'];
				$this->customer_contacts_model->save_record(0, $data);	
				$this->sendSignUpEmail( $school_name, $contact_name, $email, $username, $password, $token);
				redirect($this->url_thankyou.'?token='.rand(5000,10000));
			}	
		}
		$random = rand(500, 10000);
		
		
		$CI->session->set_userdata('random',$random);
		$this->web['postdata']['random'] = $random;
		$this->load->view('layout/front/header',  $this->web);
		$this->load->view('create_account',  $this->web);
		$this->load->view('layout/front/footer',  $this->web);	
		$this->web['postdata']['task'] = (isset($this->web['request']['task'])) ? $this->web['request']['task'] : '';	
	}
	private function save_customer() {
		$this->load->model('customers_model');
        $id = $this->web['request']['id'] = 0;
        $this->web['request']['is_archived'] = 0;
        if ($this->web['request']['id'] == 0) {
            $this->web['request']['created_at'] = date('y:m:d h:i:s');
            $this->web['request']['created_by'] = 0;
        }
        $this->web['request']['updated_on'] = date('y:m:d h:i:s');
        $this->web['request']['updated_by'] = 0;
		 $this->web['request']['status'] = 0;
		foreach ($this->customers_model->fields_insert as $key => $val) {
            $this->customers_model->fields_insert[$key] = (isset($this->web['request'][$key])) ? $this->web['request'][$key] : $val['value'];
        }
		$data = $this->customers_model->fields_insert;
 		//echo "<pre>"; print_r( $data); echo "</pre>"; exit;
        if($this->customers_model->save_record($id, $data)){
			return $this->customers_model->last_insert_id;
		}else{
			return 0;
		}
        
    }
	public function forgotPassword(){		
		if(!$this->session->userdata('loggedin')){			
			$this->load->view('forgotpassword_view');
		}else{
			redirect('Dashobards/index');
		}
	}
	public function resetPassword(){		
		if(!$this->session->userdata('loggedin')){			
			$this->load->view('resetpassword_view');
		}else{
			redirect('Dashboards/index');
		}
	}
	
	
	/************* Login_Validate function to verify login user **************/
	public function loginValidate(){
		//
		//print_r($_POST); exit;	
		$this->load->model('users_model');
		$this->users_model->ci_where = array();
		$this->users_model->ci_where["users.username"] = $this->request['User_ID'];
		$this->users_model->ci_where["users.password"] = md5($this->request['Password']);
		$row = $this->users_model->getAll();
		//echo "<pre>";print_r($row); exit;
		if(!empty($row) && isset($row[0])){
			if($row['active_status'] == '0'  && ( isset($this->request['token']) && $this->request['token'] == $row['token'] ) ){
				$data = array();
				$data['token'] = '';
				$data['active_status'] = '1';
				$this->users_model->save($row[0]['id'], $data);	
			}
			$row[0]['avatar'] = 'Images/BranchUserImage/user2.jpg';
			$CI = & get_instance();  //get instance, access the CI superobject
			//pr($CI->session->userdata('loggedin'));
			$this->load->model('users_photos_model');
			
			$this->users_photos_model->where["`users_photos`.`user_id`"] = $row[0]['id'];
                        $this->users_photos_model->where["`users_photos`.`is_archived`"]  = '0';
			$rows = $this->users_photos_model->getAll();
			if(!empty($rows)){
				if(isset($rows[0]['fullpath'])){
					$row[0]['avatar'] = $rows[0]['fullpath'];
				}
			}
			$CI->session->set_userdata('loggedin', $row[0]);
			if($row[0]['role_id'] == 1){
				redirect('Dashboards/index');	
				
			}
			if($row[0]['role_id'] == 5){
				$school_id = $this->session->userdata['loggedin']['id'];
				redirect(base_url().'index.php/Schools/profile?id='.$school_id );
			}
		}else{
			redirect(base_url());
		}
	}
	
	public function autoLoginAndRedirect(){
		//
		$current_user = 0;
		if(isset($this->request['q']) && $this->request['q'] != ''){
				$query = base64_decode($this->request['q']);
				$params = explode('&', $query);
				$arr = explode('=', $params[0]);
				$task = $arr[1]; // Extracting task
				$arr = explode('=', $params[1]);
				$id = $arr[1]; // Extracting leave application id
				$arr = explode('=', $params[2]);
				$manager_id = $arr[1]; // Extracting Employees Reporting Manager ID
				$query .= '&status=pending';
				
			}
		if($this->session->userdata('loggedin')){
			
			if($this->session->userdata['loggedin']['id'] == $manager_id){
				$current_user = 1;	
			}
		}
		if( $current_user == 1 && ($task == 'approve_leave' || $task == 'view_leave')){
				redirect('Leave_Applications/index?q='.base64_encode($query));
		}
		
		// If user is already logged in then redirect to leave applications else first get log in and then redirect to leave applications 
		$CI = & get_instance();  //get instance, access the CI superobject
		$CI->load->model('users_model');
		if($current_user ==  0){
			$row =  $CI->users_model->getById($manager_id);
			$row['avatar'] = 'Images/BranchUserImage/user2.jpg';
			$CI->load->model('users_photos_model');
			$CI->users_photos_model->where["`users_photos`.`user_id`"] = $manager_id;
                        $CI->users_photos_model->where["`users_photos`.`is_archived`"]  = '0';
                        $rows = $CI->users_photos_model->getAll();
			if(!empty($rows)){
				if(isset($rows[0]['fullpath'])){
					$row['avatar'] = $rows[0]['fullpath'];
				}
			}
			
			$CI->session->set_userdata('loggedin', $row);
			$query .= '&status=pending';
			if($task == 'approve_leave' || $task == 'view_leave'){
				redirect('Leave_Applications/index?q='.base64_encode($query));
			}
		}
		
		$this->form_validation->set_rules('User_ID', 'UserID', 'trim|xss_clean|required|max_length[50]');
        $this->form_validation->set_rules('Phrase', 'Phrase', 'trim|xss_clean|required|max_length[20]');		
		$CI->users_model->ci_where["users.username"] = $this->request['User_ID'];
		$CI->users_model->ci_where["users.password"] = md5($this->request['Password']);
		$CI->users_model->ci_where["users.active_status"] = '1' ;
		$row = $CI->users_model->getAll();
		if(!empty($row) && isset($row[0])){
			$row[0]['avatar'] = 'Images/BranchUserImage/user2.jpg';
			$CI = & get_instance();  //get instance, access the CI superobject
			//pr($CI->session->userdata('loggedin'));
			$CI->load->model('users_photos_model');
			$CI->users_photos_model->where["`users_photos`.`user_id`"] = $row[0]['id'];
                        $CI->users_photos_model->where["`users_photos`.`is_archived`"]  = '0';
			$rows = $CI->users_photos_model->getAll();
			if(!empty($rows)){
				if(isset($rows[0]['fullpath'])){
					$row[0]['avatar'] = $rows[0]['fullpath'];
				}
			}
			$CI->session->set_userdata('loggedin', $row[0]);
			redirect('Dashboards/index');
		}else{
			redirect(base_url());
		}
	}
	
	/*************** Logout function is to destroysession and redirect to login page ********************/
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());		
	}

	
	// This function generates CAPTCHA image and store in "image folder".
	public function captcha_setting(){
		$values = array(
			'word' => '',
			'word_length' => 6,
			'img_path' => './images/captcha/',
			'img_url' => base_url() .'images/captcha/',
			'font_path' => base_url() . 'system/fonts/texb.ttf',
			'img_width'     => '150',
			'img_height'    => 30,
			'expiration'    => 3600,
			'font_size'     => 25,
			'img_id'        => 'Imageid',
			'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
			/* 'colors'        => array(
					'background' => array(255, 255, 255),
					//'border' => array(255, 255, 255),
					'text' => array(0, 0, 0),
					'grid' => array(255, 40, 40)
			) */
			);
		$data = create_captcha($values);
		$_SESSION['captchaWord'] = $data['word'];
		return $data;
		// image will store in "$data['image']" index and its send on view page
		//$this->load->view('login_view',$data);
	}
	
	
	// For new image on click refresh button.
	public function captcha_refresh(){
		$values = array(
			'word' => '',
			'word_length' => 6,
			'img_path' => './images/captcha/',
			'img_url' => base_url() .'images/captcha/',
			'font_path' => base_url() . 'system/fonts/texb.ttf',
			'img_width'     => '150',
			'img_height'    => 30,
			'expiration'    => 3600,
			'font_size'     => 25,
			'img_id'        => 'Imageid',
			'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
			);
		$data = create_captcha($values);
		$_SESSION['captchaWord'] = $data['word'];
		print_r(json_encode($data));
		
	}
	
	
	/****** Test purpose function for check failure attempt ******/
	public function count_failure_attempt(){
		$User_ID = 'BIM0100002';
		$result = $this->login_model->count_failure_attempt($User_ID);
		print_r($result);
	}
}