<?php
class Home Extends Designandbuy_Controller {
    public $web = array();
    private $model_name;
    private $_model;
    private $rules = array();
    private $other_model;

    public function __construct() {
        parent::__construct();
		$this->web['ip_address'] = base64_encode($this->ip_address);
        $this->web['ajax_url'] = $this->ajax_url;
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
		$this->web['ex_home_menus'] = array('studio','contact-us','services','inquiry','about-us');
		//echo "<pre>";
		//print_r($this->web['attributes']);
		//exit;
		$this->load->view('layout/front/header',  $this->web);
		$this->load->view('layout/front/main_menu',  $this->web);
		$this->load->view('layout/front/homepage_banner',  $this->web);
        $this->load->view('home/index',  $this->web);
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
        $this->load->view('layout/front/main_menu',  $this->web);
        $this->load->view('home/featured_templates',  $this->web);
        $this->load->view('layout/front/footer',  $this->web);
	}
	public function cards() {
		//echo "<pre>";print_r($this->web['request']);echo "</pre>";
        $this->web['rows'] = array();
        $rand = rand(500, 10000);
		$this->web['profile'] = ( isset($this->session->userdata['loggedin'])) ? $this->session->userdata['loggedin'] : array();
		if(!empty($this->web['profile'])){
			$this->load->model('customers_model');
			$customer = $this->customers_model->getById($this->web['profile']['customer_id']);
			$this->web['profile']['customer_name'] = $customer['customer_name']; 
			$this->web['profile']['customer_type'] = $customer['customer_type'];
			$this->web['profile']['registration_no'] = $customer['registration_no']; 
			$this->web['profile']['email'] = $customer['email']; 
			$this->web['profile']['website'] = $customer['website']; 
		}
		$this->load->view('layout/front/header',  $this->web);
        $this->load->view('layout/front/main_menu',  $this->web);
		$this->web['attributes'] = $this->loadAttributes();
		$page_name = $this->web['request']['ACTION'];
		if(isset($page_name)){
			$this->web['horizontal_cards'] = $this->loadHorizonCards();
			$this->web['vertical_cards'] = $this->loadVerticalCards();
			if($page_name == 'smart-card.html'){
				$this->load->view('home/smart_card',  $this->web);
				$this->web['card_type'] = 'smart';
			}
			if($page_name == 'chemical-card.html'){
				$this->load->view('home/chemical_card',  $this->web);
				$this->web['card_type'] = 'chemical';
			}
			if($page_name == 'shape-card.html'){
				$this->load->view('home/shape_card',  $this->web);
				$this->web['card_type'] = 'shape';
			}

		}else{
			$this->load->view('home/smart_card_vertical',  $this->web);
			$this->web['card_type'] = 'smart';
		}
		$this->load->view('layout/front/footer',  $this->web);
	}
	public function thankyou() {
        $this->web['rows'] = array();
        $rand = rand(500, 10000);
		if(isset($this->web['request']['token']) && $this->web['request']['token'] > 4999 ){
				$this->load->view('layout/front/header',  $this->web);
        		$this->load->view('layout/front/main_menu',  $this->web);
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
		
		$slug=$this->web['request']['ACTION'];
	
		$template_id = $this->web['request']['template'];
		$this->web['attributes'] = $this->loadAttributes();
		$this->load->model('products_model');
		$this->products_model->ci_where = array();
		$this->products_model->ci_where['products.product_slug'] = $slug;
		$row = $this->products_model->getAll();
		if(!empty($row )){
			$this->web['product'] = $row[0];
			$this->load->model('templates_model');
			$this->templates_model->ci_where = array();
			$this->web['template'] = $this->templates_model->getById($template_id);
		}else{
			$this->web['product'] = array();
		}
		if(isset($this->session->userdata['icard'])){
			$this->web['icard'] = $this->session->userdata['icard'];
		}
		
		//echo "<pre>";print_r($this->web['template']); echo "</pre>";
		$this->load->view('layout/front/header',  $this->web);
		$this->load->view('layout/front/main_menu',  $this->web);
        //$this->load->view('layout/front/main_content', $data);
        $this->load->view('home/product_info',  $this->web);
		$this->load->view('layout/front/footer',  $this->web);
	}
}
