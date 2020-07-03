<?php
ini_set('display_errors', 1);
class Studio Extends Vect_Controller {
    public $web = array();
    private $model_name;
    private $_model;
    private $rules = array();
    private $other_model;
	public $template_property = array();
	public $template_exists_in_cart = false;

    public function __construct() {
        parent::__construct();
		 $this->web['ip_address'] = base64_encode($this->ip_address);
        $this->web['ajax_url'] = $this->ajax_url . "/save_" . strtolower($this->_model) . "_data?token=" . $this->web['ip_address'];
        $this->web['request'] = $this->request;
        $this->web['preferences'] = $this->preferences;
		if(isset($this->web['request']['task']) && $this->web['request']['task'] == 'add_to_cart'){
			$data = array();
			$data['customer_id'] = $this->session->userdata['loggedin']['customer_id'];
			$data['cart_name'] = $this->session->userdata['loggedin']['customer_name'].'s cart';
			$data['cart_json'] = json_encode($this->web['preferences']);
			$data['status'] = 0;
			$this->add_to_cart($data);
			$this->web['last_cart_id'] = $this->last_cart_id; 
		}
    }

    private function initLoad() {
		$this->web['profile'] = array();
		if($this->session->userdata['loggedin']){
			$this->web['profile'] = $this->session->userdata['loggedin'];
		}else{
			redirect(base_url());
		}
		
    }

    public function index() {
        $this->web['rows'] = array();
        $rand = rand(500, 10000);
		$this->load->view('layout/front/header',  $this->web);
        //$this->load->view('layout/front/main_content', $data);
        $this->load->view('studio/index',  $this->web);
		$this->load->view('layout/front/footer',  $this->web);
    }

	public function template_act() {
		$this->initLoad();
		$this->web['profile'] =  array();
		$this->web['icard'] = array();
		if( isset($this->session->userdata['loggedin']) ){
			if(isset($this->web['request']['task']) && $this->web['request']['task'] == 'edit_template'){
				$customer_templates_id = base64_decode($this->web['request']['customer_templates_id']);
				if(!$customer_templates_id) return false;
				$this->load->model('customer_templates_model');
				$this->customer_templates_model->ci_where = array();
				$customer_template = $this->customer_templates_model->getById($customer_templates_id);
				$template_preferences = json_decode($customer_template['template_preferences']);
				//echo "before merge <pre>"; print_r($customer_template['template_data_json']); echo "</pre>";
				if(isset($customer_template['template_fields']) && isset($customer_template['template_data_json']) ){
					
					$arr_template_fields = (array) json_decode($customer_template['template_fields']);
					$arr_template_data =  (array)  json_decode($customer_template['template_data_json']);
					//echo "after template_fields <pre>"; print_r($arr_template_fields); echo "</pre>";
					//echo "after arr_template_data <pre>"; print_r($arr_template_data); echo "</pre>";exit;
					if(isset($arr_template_data['objects']) && count($arr_template_data['objects']) > 0 ){
						$i = 0;
						$arr_fields = array();
						foreach($arr_template_data['objects'] as $obj){
							
							$obj = (array) $obj;
							//echo "before Merged <pre>";print_r($obj); echo "</pre>";
							//echo "<pre>";print_r($arr_template_data); echo "</pre>";
							//if(isset($arr_template_data[$i]->id))
							if( isset($obj['id']) && array_key_exists($obj['id'], $arr_template_fields) ){
								$temp_arr = array();
								$temp_arr['id'] = $arr_template_data['objects'][$i]->id;
								$temp_arr['fill'] = $arr_template_fields[$arr_template_data['objects'][$i]->id]->fill;
								$temp_arr['fontSize'] = $arr_template_fields[$arr_template_data['objects'][$i]->id]->fontSize;
								$temp_arr['fontFamily'] = $arr_template_fields[$arr_template_data['objects'][$i]->id]->fontFamily;
								$arr_template_data['objects'][$i] = (object) array_merge($obj, $temp_arr);
								$arr_fields[$arr_template_data['objects'][$i]->id] = $temp_arr;
								//echo "Merged <pre>";print_r($arr_template_data['objects'][$i]); echo "</pre>";
							}
							
							//	$arr_template_data['objects'][$i]->id = $obj['id'];
							
							$i++;
						}
					}
					$customer_template['template_data_json'] = json_encode($arr_template_data);
					$this->web['icard']['arr_fields'] = json_encode($arr_fields);
				}
				
				$this->web['icard']['preferences'] = (array) $template_preferences;
				$this->web['icard']['customer_template'] = 	$customer_template;
				$this->load->model('templates_model');
				$this->templates_model->ci_where = array();
				$this->web['icard']['master_template'] =  $this->templates_model->getById($this->web['icard']['preferences']['template_id']);
			}else{
				if(isset( $this->session->userdata['icard'])){
					$icard = $this->session->userdata['icard'];
					$this->web['icard']['preferences'] = $icard;
					$this->load->model('templates_model');
					$this->templates_model->ci_where = array();
					$this->web['icard']['master_template'] =  $this->templates_model->getById($this->web['icard']['preferences']['template_id']);
					//$this->web['icard']['customer_template'] = array();
				}
			}
			$this->web['body_class'] = 'page-elements-animation';
			$this->web['templates'] = (isset($this->web['icard']['preferences']['orientation']) && strtolower($this->web['icard']['preferences']['orientation'] ) == 'horizontal')?$this->loadHorizonCards(): $this->loadVerticalCards();
			$this->web['profile'] = $this->session->userdata['loggedin'];
			$this->load->model('customers_model');
			$customer = $this->customers_model->getById($this->web['profile']['customer_id']);
			$this->web['profile']['customer_name'] = $customer['customer_name']; 
			$this->web['profile']['registration_no'] = $customer['registration_no']; 
			$this->web['profile']['type'] = $customer['customer_type']; 
			$this->web['profile']['email'] = $customer['email']; 
			$this->web['profile']['website'] = $customer['website']; 
			$this->web['form_go_back_id'] = 'form_'.rand(5000,10000);
			$this->web['form_confirm_id'] = 'form_'.rand(5000,10000);
			$this->web['ajax_url'] = $this->ajax_url;
			$this->load->view('layout/front/header',  $this->web);
			$this->load->view('layout/front/main_menu',  $this->web);
			$this->load->view('studio/template_act',  $this->web);
			$this->load->view('layout/front/footer',  $this->web);
		}else{
			redirect(base_url());
		}
	}
	public function template_act_backside() {
		$this->initLoad();
		$this->web['profile'] =  array();
		$this->web['icard'] = array();
		
		if( isset($this->session->userdata['loggedin']) ){
			if(isset($this->web['request']['task']) && $this->web['request']['task'] == 'edit_template'){
				$customer_templates_id = base64_decode($this->web['request']['customer_templates_id']);
				if(!$customer_templates_id) return false;
				$this->load->model('customer_templates_model');
				$this->customer_templates_model->ci_where = array();
				$customer_template = $this->customer_templates_model->getById($customer_templates_id);
				
				if(!empty($customer_template) ){
					$template_preferences = json_decode($customer_template['template_preferences']);
					$this->web['icard']['preferences'] = (array) $template_preferences;
					$this->web['icard']['customer_template'] = 	$customer_template;
					if(isset($customer_template['template_fields'])){
						$template_fields  = (array) 	json_decode($customer_template['template_fields']);
						if(count($template_fields) > 0 ){
							$flds_arr = array();
							foreach($template_fields as $key => $val){
								$flds_arr[]= $key;
							}
							$this->web['icard']['used_fields'] = $flds_arr;
						}
					}
					
				}
				$this->load->model('templates_model');
				$this->templates_model->ci_where = array();
				$this->web['icard']['master_template'] =  $this->templates_model->getById($this->web['icard']['preferences']['template_id']);
			}else{
				if(isset( $this->session->userdata['icard'])){
					$icard = $this->session->userdata['icard'];
					$this->web['icard']['preferences'] = $icard;
					$this->load->model('templates_model');
					$this->templates_model->ci_where = array();
					$this->web['icard']['master_template'] =  $this->templates_model->getById($this->web['icard']['preferences']['template_id']);
					//$this->web['icard']['customer_template'] = array();
				}
			}
			//echo "<pre>";print_r($this->web['icard']); echo "</pre>";
			$this->web['templates'] = (strtolower($this->web['preferences']['orientation'] ) == 'horizontal')?$this->loadHorizonCards(): $this->loadVerticalCards();
			$this->web['profile'] = $this->session->userdata['loggedin'];
			$this->load->model('customers_model');
			$customer = $this->customers_model->getById($this->web['profile']['customer_id']);
			$this->web['profile']['customer_name'] = $customer['customer_name']; 
			$this->web['profile']['registration_no'] = $customer['registration_no']; 
			$this->web['profile']['type'] = $customer['customer_type']; 
			$this->web['profile']['email'] = $customer['email']; 
			$this->web['profile']['website'] = $customer['website']; 
			$this->web['form_go_back_id'] = 'form_'.rand(5000,10000);
			$this->web['form_confirm_id'] = 'form_'.rand(5000,10000);
			$this->web['ajax_url'] = $this->ajax_url;
			$this->load->view('layout/front/header',  $this->web);
			$this->load->view('layout/front/main_menu',  $this->web);
			//$this->load->view('layout/front/main_content', $data);
			$this->load->view('studio/template_act_backside',  $this->web);
			$this->load->view('layout/front/footer',  $this->web);
			
		}else{
			redirect(base_url());
		}
    }
	public function thankyou() {
        $this->web['rows'] = array();
        $rand = rand(500, 10000);
		if(isset($this->web['request']['token']) && $this->web['request']['token'] > 4999 ){
				$this->load->view('layout/front/header',  $this->web);
				//$this->load->view('layout/front/main_content', $data);
				$this->load->view('home/thankyou',  $this->web);
				$this->load->view('layout/front/footer',  $this->web);
		}else{
			redirect(base_url());
		}

    }
	public function getTemplateProperties($id){
		if(!$id){
			return false;
		}
		$this->load->model('templates_model');
		$this->templates_model->ci_where = array();
		$this->template_property = $this->templates_model->getById($id);
		if( !empty($this->template_property) ){
			return true;
		}else{
			return false;	
		}
		
	}
	private function loadHorizonCards(){
		$this->load->model('templates_model');
		$this->templates_model->ci_where = array();
		$this->templates_model->ci_where['templates.status'] = '1';
		$this->templates_model->ci_where['templates.orientation'] = 'horizontal';
		$rows = $this->templates_model->getAll();
		return $rows;
	}
	private function loadVerticalCards(){
		$this->load->model('templates_model');
		$this->templates_model->ci_where = array();
		$this->templates_model->ci_where['templates.status'] = '1';
		$this->templates_model->ci_where['templates.orientation'] = 'vertical';
		$rows = $this->templates_model->getAll();
		return $rows;
	}
}
