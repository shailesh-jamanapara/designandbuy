<?php

class Studio Extends Vect_Controller {
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
        $this->web['customer_preference'] = $this->customer_preference;
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
	public function draw() {
		$this->initLoad();
		$this->web['template'] = array();
		
		$this->web['profile'] =  array();
		
		if( isset($this->session->userdata['loggedin']) ){
			
			$this->web['profile'] = $this->session->userdata['loggedin'];
			$this->load->model('customers_model');
			$customer = $this->customers_model->getById($this->web['profile']['customer_id']);
			$this->web['profile']['customer_name'] = $customer['customer_name']; 
			$this->web['profile']['registration_no'] = $customer['registration_no']; 
			$this->web['profile']['email'] = $customer['email']; 
			$this->web['profile']['website'] = $customer['website']; 
			$this->load->model('id_cards_model');
			$this->id_cards_model->ci_where = array();
			$this->id_cards_model->ci_where['customer_id'] = $this->web['profile']['customer_id']; 
			$this->id_cards_model->ci_where['template_id'] = $this->session->userdata['template_id'];
			$rows = $this->id_cards_model->getAll();
			$this->web['id_cards'] = $rows;
			$this->load->model('templates_model');
			$this->templates_model->ci_where = array();
			$this->web['template'] = $this->templates_model->getById($this->session->userdata('template_id'));
			$rand = rand(500, 10000);
			$this->load->view('layout/front/header',  $this->web);
			//$this->load->view('layout/front/main_content', $data);
			$this->load->view('studio/draw',  $this->web);
			$this->load->view('layout/front/footer',  $this->web);
			
		}else{
			redirect(base_url());
		}
    }
	public function templateAct() {
		$this->initLoad();
		$this->web['template'] = array();
		
		$this->web['profile'] =  array();
		
		if( isset($this->session->userdata['loggedin']) ){
			
			$this->web['profile'] = $this->session->userdata['loggedin'];
			$this->load->model('customers_model');
			$customer = $this->customers_model->getById($this->web['profile']['customer_id']);
			$this->web['profile']['customer_name'] = $customer['customer_name']; 
			$this->web['profile']['registration_no'] = $customer['registration_no']; 
			$this->web['profile']['email'] = $customer['email']; 
			$this->web['profile']['website'] = $customer['website']; 
			$this->load->model('id_cards_model');
			$this->id_cards_model->ci_where = array();
			$this->id_cards_model->ci_where['customer_id'] = $this->web['profile']['customer_id']; 
			$this->id_cards_model->ci_where['template_id'] = $this->session->userdata['template_id'];
			$rows = $this->id_cards_model->getAll();
			$this->web['id_cards'] = $rows;
			$this->load->model('templates_model');
			$this->templates_model->ci_where = array();
			$this->web['template'] = $this->templates_model->getById($this->session->userdata('template_id'));
			$rand = rand(500, 10000);
			$this->load->view('layout/front/header',  $this->web);
			//$this->load->view('layout/front/main_content', $data);
			$this->load->view('studio/template_act',  $this->web);
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
}
