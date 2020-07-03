<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Orders Extends Vect_Controller {

    public $web = array();
    private $model_name;
    private $_model;
    private $rules = array();
    private $other_model;

    public function __construct() {
        parent::__construct();
        is_loggedin();
        $this->_model = strtolower(__CLASS__);
        $this->setModel($this->_model);
        $model = (string) $this->getModel();
        $this->web['request'] = $this->request;
		//echo "<pre>"; print_r($this->web['request']); echo "<pre>";
        $this->model_name = $model;
        if ($this->load->model(trim($this->model_name))) {
            $this->web['view'] = $this->{$this->model_name}->getView();
            $this->web['ip_address'] = base64_encode($this->ip_address);
            $this->web['items'] = ucfirst($this->_model);
            $this->web['item'] = ucfirst($this->inflect->singularize($this->_model));
        } else {
            return false;
            die();
        }
        $this->web['ajax_url'] = $this->ajax_url . "/save_" . strtolower($this->_model) . "_data?token=" . $this->web['ip_address'];
        $this->web['ajax_url_delete_item'] = $this->ajax_url_delete_item . "?token=" . $this->web['ip_address'];
        $this->web['view_url'] = $this->view_url;
        $this->web['edit_url'] = $this->edit_url;
        $this->web['listpage_url'] = $this->listpage_url;
    }

    private function initLoad() {

        if (isset($this->web['request']['reset']) && $this->web['request']['reset'] == 'reset') {
            unset($this->web['request']['search_by']);
            unset($this->web['request']['search_for']);
        }
        $this->web['postdata']['search_by'] = (isset($this->web['request']['search_by'])) ? $this->web['request']['search_by'] : '';
        $this->web['postdata']['search_for'] = (isset($this->web['request']['search_for'])) ? $this->web['request']['search_for'] : '';
        $this->web['postdata']['page'] = (isset($this->web['request']['page'])) ? $this->web['request']['page'] : 1;
        $this->web['postdata']['limit'] = (isset($this->web['request']['limit'])) ? $this->web['request']['limit'] : 10;
        $this->web['postdata']['sort_by'] = (isset($this->web['request']['sort_by'])) ? $this->web['request']['sort_by'] : $this->_model . '.id';
        $this->web['postdata']['order_type'] = (isset($this->web['request']['order_type'])) ? $this->web['request']['order_type'] : 'ASC';
        $this->web['search'][$this->_model . '.id'] = 'Order ID';
        $this->web['search']['c.customer_name'] = 'Customer Name';
        $this->web['search'][$this->_model . '.status'] = 'Status';
        $this->{$this->model_name}->ci_where_like = array();
        $this->{$this->model_name}->ci_where = array();
        $this->{$this->model_name}->ci_where[$this->_model.'.is_archived'] = '0';	
        if (isset($this->web['request']['search_by']) && $this->web['request']['search_by'] != '') {
            $this->{$this->model_name}->ci_where_like[$this->web['request']['search_by']] = $this->web['request']['search_for'];
        }

        $this->load->model('customers_model');
        $this->web['customers'] = $this->customers_model->getAllWithKeyValue();

        $this->load->model('customer_templates_model');
        $this->web['customer_templates'] = $this->customer_templates_model->getAllWithKeyValue();
        
        $this->load->model('products_model');
        $this->web['products'] = $this->products_model->getAllWithKeyValue();

    }

    public function index() {
        //$config = array('paths' => TWIG_TEMPLATE_PATH_ADMIN, 'cache' => APPPATH . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . 'cache');
        //$this->load->library('twig', $config);
        $this->initLoad();
        $this->{$this->model_name}->ci_where = array();
        $this->{$this->model_name}->group_by=array(' orders.id ');
        $result = $this->{$this->model_name}->getAll($this->web['postdata']['page'], $this->web['postdata']['limit'], array('sort_by' => $this->web['postdata']['sort_by'], 'order_type' => $this->web['postdata']['order_type']));
        // print_r($result);
        // exit;
        if ($result) {
            $this->web['rows'] = $result;
        } else {
            $this->web['rows'] = array();
        }
        //echo "<pre>"; print_r( $this->web['rows']); "</pre>"; exit;
        $this->web['total_records'] = $this->{$this->model_name}->total_records;
        $this->web['total_pages'] = $this->{$this->model_name}->total_pages;
        $this->web['model']['new'] = base64_encode(0);
        $this->web['section'][] = $this->web['view'] . DIRECTORY_SEPARATOR . 'index';
        $rand = rand(500, 10000);
        $this->general_model->load_my_view($this->web);
    }
	
    public function myitems() {
        //$config = array('paths' => TWIG_TEMPLATE_PATH_ADMIN, 'cache' => APPPATH . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . 'cache');
        //$this->load->library('twig', $config);
        $this->initLoad();
		if(isset($this->web['request']['last_cart_id'])){
			 $this->{$this->model_name}->ci_where = array();
			 $cart_item = $this->{$this->model_name}->getById($this->web['request']['last_cart_id']);
			 if(!empty($cart_item)){
				 if($cart_item['customer_id'] ==  $this->web['profile']['customer_id'] ){
					 $this->load->model('customer_templates_model');
					 $cart_arr = (array) json_decode($cart_item['cart_json']);
					 $data = array();
					 $data['customer_id'] = $this->web['profile']['customer_id'];
					 $data['template_id'] = $cart_arr['template_id'];
					 $data['template_name'] = "Template ". $cart_item['id'];
					 $data['template_data_json '] = $cart_item['cart_json'];
					 $this->customer_templates_model->save_record(0, $data);
				 }
			 }
			redirect(base_url()."index.php/Schools/myaccount");	
		}
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
            if ($this->web['model']['id'] > 0) {
                $this->{$this->model_name}->where[$this->_model . ".id"] = $this->web['model']['id'];
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
        $this->load->model('states_model');
        $this->web['states'] = $this->states_model->getAllWithKeyValue();
        $this->load->model('countries_model');
        $this->web['countries'] = $this->countries_model->getAllWithKeyValue();
        $this->web['section'][] = $this->web['view'] . DIRECTORY_SEPARATOR . 'add_edit';

        if (isset($this->web['model']['id']) && $this->web['model']['id'] > 0) {
            $item_name = strtolower($this->inflect->singularize($this->class_name)) . "s_id";
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
        
        if ($this->web['request']['id'] == 0) {
		  $this->web['request']['is_archived'] = 0;	
            $this->web['request']['created_at'] = date('y:m:d h:i:s');
            $this->web['request']['created_by'] = $this->session->userdata['loggedin']['username'];
        }
        $this->web['request']['updated_on'] = date('y:m:d h:i:s');
        $this->web['request']['updated_by'] = $this->session->userdata['loggedin']['username'];
        foreach ($this->{$this->model_name}->fields_insert as $key => $val) {
            $this->{$this->model_name}->fields_insert[$key] = (isset($this->web['request'][$key])) ? $this->web['request'][$key] : $val['value'];
        }
		$this->{$this->model_name}->fields_insert['status'] = (isset($this->web['request']['status'])) ? $this->web['request']['status'] : '0';
        $data = $this->{$this->model_name}->fields_insert;
        $id = $this->{$this->model_name}->save_record($id, $data);
        return $id;
    }
	public function save_tamplate($data){
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
    
    public function view() {
        $this->initLoad();
        $this->web['postdata']['task'] = (isset($this->web['request']['task'])) ? $this->web['request']['task'] : '';
        //Starts to save data on form submit
        if ($this->web['postdata']['task'] == 'save') {
            $id = $this->save(); // getting last user id on new insert 
        }
        //Ends to save data on form submit
        $this->web['model']['id'] = 0;
        if (isset($this->web['request']['task']) && ($this->web['request']['task'] == 'view_only')) {

            //$this->web['model']['where'] = $this->{$this->model_name}->where;
            $this->web['model']['id'] = isset($this->web['request']['id']) ? base64_decode($this->web['request']['id']) : 0;
            if ($this->web['model']['id'] > 0) {
                $this->{$this->model_name}->where[$this->_model . ".id"] = $this->web['model']['id'];
            }
        }
        $cols = $this->{$this->model_name}->fields;
        foreach ($cols as $key => $col) {
            $this->web['row'][trim($key)] = (isset($this->{$this->model_name}->fields_pro[$key]['value'])) ? $this->{$this->model_name}->fields_pro[$key]['value'] : '';
        }
        echo $this->web['model']['id'];
        $position = $this->{$this->model_name}->getById($this->web['model']['id']);
        if (!empty($position)) {
            $this->web['row'] = $position; //array_merge($this->web['row'], $user ) ;		
        }
        //echo "<pre>"; print_r( $this->web['row']);echo "</pre>"; exit;
        //$this->load->model('states_model');
        //$this->web['states'] = $this->states_model->getAllWithKeyValue();
        //$this->load->model('countries_model');
        //$this->web['countries'] = $this->countries_model->getAllWithKeyValue();
        $this->web['section'][] = $this->web['view'] . DIRECTORY_SEPARATOR . 'view_record';

        if (isset($this->web['model']['id']) && $this->web['model']['id'] > 0) {
            $item_name = strtolower($this->inflect->singularize($this->class_name)) . "s_id";
        }
        $this->web['page_heading'] = ($this->web['model']['id'] > 0) ? "View " . $this->web['item'] . " [ #" . $this->web['row']['order_no'] . " ]" : "View " . $this->web['item'];
        $this->web['model']['id'] = base64_encode($this->web['model']['id']);

        $this->general_model->load_my_view($this->web);
    }
    public function view_order_icards() {

        $this->model_name = 'order_items_model';
        $this->_model = 'order_items';
        $this->load->model($this->model_name);
        $this->initLoad();
        $this->web['postdata']['task'] = (isset($this->web['request']['task'])) ? $this->web['request']['task'] : '';
        
        //Starts to save data on form submit
        if ($this->web['postdata']['task'] == 'save') {
            $id = $this->save(); // getting last user id on new insert 
        }
      
        //Ends to save data on form submit
        $this->web['model']['id'] = 0;
        if (isset($this->web['request']['task']) && ($this->web['request']['task'] == 'view_only')) {

            //$this->web['model']['where'] = $this->{$this->model_name}->where;
            $this->web['model']['id'] = isset($this->web['request']['id']) ? base64_decode($this->web['request']['id']) : 0;
            if ($this->web['model']['id'] > 0) {
                $this->{$this->model_name}->ci_where[$this->_model . ".orders_id"] = $this->web['model']['id'];
            }
        }
        $this->web['model']['id'] = isset($this->web['request']['id']) ? base64_decode($this->web['request']['id']) : 0;
       
        if ($this->web['model']['id'] > 0) {
            $this->{$this->model_name}->ci_where[$this->_model . ".orders_id"] = $this->web['model']['id'];
        }
        $cols = $this->{$this->model_name}->fields;
        foreach ($cols as $key => $col) {
            $this->web['row'][trim($key)] = (isset($this->{$this->model_name}->fields_pro[$key]['value'])) ? $this->{$this->model_name}->fields_pro[$key]['value'] : '';
        }
        //echo $this->web['model']['id'];
        $position = $this->{$this->model_name}->getAll();
        if (!empty($position)) {
            $this->web['icards'] = $position; //array_merge($this->web['row'], $user ) ;		
        }
       
        //$this->load->model('orders_model');
        $this->orders_model->ci_where = array();
        $this->web['row'] = $this->orders_model->getById( $this->web['model']['id']);
        //$this->load->model('countries_model');
        //$this->web['countries'] = $this->countries_model->getAllWithKeyValue();
        $this->web['section'][] = $this->web['view'] . DIRECTORY_SEPARATOR . 'view_order_icards';

        if (isset($this->web['model']['id']) && $this->web['model']['id'] > 0) {
            $item_name = strtolower($this->inflect->singularize($this->class_name)) . "s_id";
        }
        $this->web['page_heading'] = ($this->web['model']['id'] > 0) ? "View " . $this->web['item'] . " [ #" . $this->web['row']['order_no'] . " ]" : "View " . $this->web['item'];
        $this->web['model']['id'] = base64_encode($this->web['model']['id']);

        $this->general_model->load_my_view($this->web);
    }
}
