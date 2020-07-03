<?php

class Categories Extends Vect_Controller {
    public $web = array();
    private $model_name;
    private $_model;
    private $rules = array();
    private $other_model;

    public function __construct() {
		
        parent::__construct();
		 $this->web['ip_address'] = base64_encode($this->ip_address);
        $this->web['ajax_url'] = $this->ajax_url . "/save_" . strtolower($this->_model) . "_data?token=" . $this->web['ip_address'];
        $this->web['request'] = $this->request;
    }

    private function initLoad() {
		return true;
    }

    public function index() {
        $this->web['rows'] = array();
        $rand = rand(500, 10000);
		$this->web['profile'] = ( isset($this->session->userdata['loggedin'])) ? $this->session->userdata['loggedin'] : array();
		if(!empty($this->web['profile'])){
			$this->load->model('customers_model');
			$customer = $this->customers_model->getById($this->web['profile']['customer_id']);
			$this->web['profile']['customer_name'] = $customer['customer_name']; 
			$this->web['profile']['registration_no'] = $customer['registration_no']; 
			$this->web['profile']['email'] = $customer['email']; 
			$this->web['profile']['website'] = $customer['website']; 
			
		}
		$this->web['attributes'] = $this->loadAttributes();
		//$this->web['templates']['vertical'] = $this->loadVerticalCards();
		//$this->web['templates']['horizontal'] = $this->loadHorizonCards();
		$this->web['products'] = $this->loadProducts();
		//echo "<pre>";
		//print_r($this->web['attributes']);
		//exit;
		$this->load->view('layout/front/header',  $this->web);
        //$this->load->view('layout/front/main_content', $data);
        $this->load->view('categories/index',  $this->web);
		$this->load->view('layout/front/footer',  $this->web);
    }
	 public function featured_templates() {
        $this->web['rows'] = array();
        $rand = rand(500, 10000);
		$this->web['profile'] = ( isset($this->session->userdata['loggedin'])) ? $this->session->userdata['loggedin'] : array();
		if(!empty($this->web['profile'])){
			$this->load->model('customers_model');
			$customer = $this->customers_model->getById($this->web['profile']['customer_id']);
			$this->web['profile']['customer_name'] = $customer['customer_name']; 
			$this->web['profile']['registration_no'] = $customer['registration_no']; 
			$this->web['profile']['email'] = $customer['email']; 
			$this->web['profile']['website'] = $customer['website']; 
			
		}
		$this->web['attributes'] = $this->loadAttributes();
		//echo "<pre>";
		//print_r($this->web['attributes']);
		//exit;
		$this->load->view('layout/front/header',  $this->web);
        //$this->load->view('layout/front/main_content', $data);
        $this->load->view('home/featured_templates',  $this->web);
		$this->load->view('layout/front/footer',  $this->web);
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
	private function loadAttributes(){
			$return = array();
			$this->load->model('attributes_model');
			$this->attributes_model->ci_where = array();
			$rows = $this->attributes_model->getAll(null,null, array('sort_by' => 'sort_order', 'order_type' => 'ASC'));
			if(!empty($rows)){
				$this->load->model('attribute_options_model');
				
				foreach($rows as $row){
				
					$this->attribute_options_model->ci_where = array('attribute_id' => $row['id']);
					$arr = $this->attribute_options_model->getAll(null,null, array('sort_by' => 'id', 'order_type' => 'ASC'));
					$return[$row['id']] = array('name'=>$row['attribute_name'],'options'=> $arr); 
				}
			}
			return $return;
	}
	private function loadHorizonCards(){
		$this->load->model('templates_model');
		$this->templates_model->ci_where = array();
		$this->templates_model->ci_where['templates.orientation'] = 'horizontal';
		$rows = $this->templates_model->getAll();
		return $rows;
	}
	private function loadVerticalCards(){
		$this->load->model('templates_model');
		$this->templates_model->ci_where = array();
		$this->templates_model->ci_where['templates.orientation'] = 'vertical';
		$rows = $this->templates_model->getAll();
		return $rows;
	}
	private function loadProducts(){
		$this->load->model('products_model');
		$this->products_model->ci_where = array();
		//$this->products_model->ci_where['templates.orientation'] = 'vertical';
		$rows = $this->products_model->getAll();
		return $rows;
	}
	public function product_info(){
		    $this->web['rows'] = array();
        $rand = rand(500, 10000);
		$this->web['profile'] = ( isset($this->session->userdata['loggedin'])) ? $this->session->userdata['loggedin'] : array();
		if(!empty($this->web['profile'])){
			$this->load->model('customers_model');
			$customer = $this->customers_model->getById($this->web['profile']['customer_id']);
			$this->web['profile']['customer_name'] = $customer['customer_name']; 
			$this->web['profile']['registration_no'] = $customer['registration_no']; 
			$this->web['profile']['email'] = $customer['email']; 
			$this->web['profile']['website'] = $customer['website']; 
			
		}
		$id=$this->web['request']['id'];
		$this->web['attributes'] = $this->loadAttributes();
		$this->load->model('products_model');
		$this->products_model->ci_where = array();
		$row= $this->products_model->getById($id);
		$this->web['product'] = $row;
		//echo "<pre>";print_r($this->web['product'] ); exit;
		$this->load->view('layout/front/header',  $this->web);
        //$this->load->view('layout/front/main_content', $data);
        $this->load->view('home/product_info',  $this->web);
		$this->load->view('layout/front/footer',  $this->web);
	}
}
