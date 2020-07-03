<?php

ini_set('display_errors', 1);

class Products Extends Designandbuy_Controller {

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
        $this->model_name = $model;
        if ($this->load->model(trim($this->model_name))) {
            $this->web['view'] = $this->{$this->model_name}->getView();
            $this->{$this->model_name}->setCols();
            $this->{$this->model_name}->setJoins();
            $this->web['ip_address'] = base64_encode($this->ip_address);
            $this->web['items'] = ucfirst($this->_model);
            $this->web['item'] = ucfirst($this->inflect->singularize($this->_model));
        } else {
            return false;
            die();
        }
        $this->web['ajax_url'] = $this->ajax_url . "/save_" . strtolower($this->_model) . "_data?token=" . $this->web['ip_address'];
        $this->web['ajax_url_delete_item'] = $this->ajax_url_delete_item . "?token=" . $this->web['ip_address'];
        $this->web['edit_url'] = $this->edit_url;
        $this->web['listpage_url'] = $this->listpage_url;
        $this->web['type_of_schools_arr'] = $this->type_of_schools_arr;
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
        $this->web['postdata']['sort_by'] = (isset($this->web['request']['sort_by'])) ? $this->web['request']['sort_by'] : $this->_model . '.product_name';
        $this->web['postdata']['order_type'] = (isset($this->web['request']['order_type'])) ? $this->web['request']['order_type'] : 'ASC';
        $this->web['search'][$this->_model . '.product_name'] = 'Product Name';
        $this->web['search']['product_categories.product_category_name'] = 'Category Name';
        $this->web['search'][$this->_model . '.status'] = 'Status';
	    $this->{$this->model_name}->ci_where_like = array();	
        if (isset($this->web['request']['search_by']) && $this->web['request']['search_by'] != '') {
            $this->{$this->model_name}->ci_where_like[$this->web['request']['search_by']] = $this->web['request']['search_for'];
        }
    }

	public function index() {
        //$config = array('paths' => TWIG_TEMPLATE_PATH_ADMIN, 'cache' => APPPATH . DIRECTORY_SEPARATOR . 'temp' . DIRECTORY_SEPARATOR . 'cache');
        //$this->load->library('twig', $config);
        $this->initLoad();
        $result = $this->{$this->model_name}->getAll($this->web['postdata']['page'], $this->web['postdata']['limit'], array('sort_by' => $this->web['postdata']['sort_by'], 'order_type' => $this->web['postdata']['order_type']));
        if ($result) {
            $this->web['rows'] = $result;
        } else {
            $this->web['rows'] = array();
        }
		$this->web['ajax_url'] = $this->ajax_url;
        $this->web['total_records'] = $this->{$this->model_name}->total_records;
        $this->web['total_pages'] = $this->{$this->model_name}->total_pages;
        $this->web['model']['new'] = base64_encode(0);
        $this->web['section'][] = $this->web['view'] . DIRECTORY_SEPARATOR . 'index';
        $rand = rand(500, 10000);
        $this->general_model->load_my_view($this->web);
    }

    public function add_edit() {
        $this->initLoad();
        $this->web['postdata']['task'] = (isset($this->web['request']['task'])) ? $this->web['request']['task'] : '';
        //Starts to save data on form submit
        if ($this->web['postdata']['task'] == 'save') {
            $id = $this->save(); // getting last user id on new insert
			if($id == true){
				$this->load->model('users_model');
				 foreach ($this->users_model->fields_insert as $key => $val) {
					$this->users_model->fields_insert[$key] = (isset($this->web['request'][$key])) ? $this->web['request'][$key] : $val['value'];
				}
				
				redirect($this->listpage_url);
			}	
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
		$customer = $this->{$this->model_name}->getById($this->web['model']['id']);
		if (!empty($customer)) {
            $this->web['row'] = $customer; //array_merge($this->web['row'], $user ) ;		
        }
		
		$this->web['row']['attributes'] 		= null;
		$this->web['row']['attribute_options'] 		= null;
		$this->web['attributes'] = array();
        if (isset($this->web['model']['id']) && $this->web['model']['id'] > 0) {
            $item_name = strtolower($this->inflect->singularize($this->class_name)) . "_name";
			$this->web['attributes'] = $this->productAttributes($this->web['model']['id']);
        }
		
        $this->load->model('product_categories_model');
        $this->web['product_categories'] = $this->product_categories_model->getAllWithKeyValue();
        $this->web['section'][] = $this->web['view'] . DIRECTORY_SEPARATOR . 'add_edit';
        if (isset($this->web['model']['id']) && $this->web['model']['id'] > 0) {
            $item_name = strtolower($this->inflect->singularize($this->class_name)) . "_name";
        }
        $this->web['page_heading'] = ($this->web['model']['id'] > 0) ? "Edit " . $this->web['item'] . " [ " . $this->web['row'][$item_name] . " ]" : "Add New " . $this->web['item'];
        $this->web['model']['id'] = base64_encode($this->web['model']['id']);
		$this->web['listpage_url'] = 'index';
		
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
		$this->web['request']['product_meta'] = $this->web['request']['product_name'];
        $this->web['request']['updated_on'] = date('y:m:d h:i:s');
        $this->web['request']['updated_by'] = $this->session->userdata['loggedin']['username'];
		//echo "<pre>";
		//print_r($this->{$this->model_name}->fields_insert);
		//exit;
        foreach ($this->{$this->model_name}->fields_insert as $key => $val) {
            $this->{$this->model_name}->fields_insert[$key] = (isset($this->web['request'][$key])) ? $this->web['request'][$key] : $val['value'];
        }
        $data = $this->{$this->model_name}->fields_insert;
        $id = $this->{$this->model_name}->save_record($id, $data);
		if($id ){
			$product_id = $this->{$this->model_name}->last_insert_id;
			$this->load->model('product_attribute_options_model');
			$this->product_attribute_options_model->ci_where = array();
			$this->product_attribute_options_model->ci_where['product_attribute_options.products_id'] = $product_id;
			$rows = $this->product_attribute_options_model->getAll();
			if(!empty($rows)){
				foreach($rows as $row){
					$this->db->delete('product_attribute_options', array('id' => $row['id']));  
				}
			}	
			if( isset($this->web['request']['attribute']) && !empty($this->web['request']['attribute']) ) {
				$options =array();
					
				foreach($this->web['request']['attribute'] as $key => $attr){
					foreach($attr as $k => $optionsArr){
						//$options[option] = 	attribute_id;
						$options[$k] = array('attributes_id'	=> $key, 'products_id'=>$product_id, 'attribute_options_id'=> $k);
					}
				}
				foreach($options as $option){
					$this->saveProductAttribute($option);
				}
			}
			 $this->load->model('product_images_model');
			if(isset($_FILES['product_image_main']) ){
				$file = $_FILES['product_image_main'];
				$file_name = str_replace(' ','', $this->web['request']['product_name'] );
				$file_detail = $this->uploadFile($product_id, $file, $file_name);
				if (empty($file_detail)) {
						return $product_id;
				}
				if (!empty($file_detail)) {
					if(isset($file_detail['path']) && $file_detail['path'] != '' ){
						$data = array();
						$data['products_id'] = $product_id;
						$data['product_image_name'] = $file_detail['filename'];
						$data['product_image_path'] = $file_detail['path'];
						$data['is_main'] = 'yes';
						$data['status'] = '1';
						$id = $this->product_images_model->save_record(0, $data);
					}
				}
			}
			if(isset($_FILES['product_image_optional']) ){
				$file = $_FILES['product_image_optional'];
				$file_name = str_replace(' ','', $this->web['request']['product_name'] )."_optional";
				$file_detail = $this->uploadFile($product_id, $file, $file_name);
				if (empty($file_detail)) {
						return $product_id;
				}
				if (!empty($file_detail)) {
					if(isset($file_detail['path']) && $file_detail['path'] != '' ){
						$data = array();
						$data['products_id'] = $product_id;
						$data['product_image_name'] = $file_detail['filename'];
						$data['product_image_path'] = $file_detail['path'];
						$data['is_main'] = 'no';
						$data['status'] = '1';
						$id = $this->product_images_model->save_record(0, $data);
					}
				}
			}
		}
		
        return $id;
    }
	private function saveProductAttribute($arr){
		
		$this->load->model('product_attribute_options_model');
		$data = array();
		$data['products_id'] = $arr['products_id'];
		$data['attributes_id'] = $arr['attributes_id'];
		$data['attribute_options_id'] = $arr['attribute_options_id'];
		$this->product_attribute_options_model->save_record(0, $data);
		return true;
		
	}
	private function getAttributeOptions($product_id, $attribute_id){
		$ret = array();
		$this->load->model('product_attribute_options_model');
		$this->product_attribute_options_model->ci_where = array();
		$this->product_attribute_options_model->ci_where['products_id'] = $product_id;
		$this->product_attribute_options_model->ci_where['attributes_id'] = $attribute_id;
		$rows = $this->product_attribute_options_model->getAll();
		if(!empty($rows)){
			foreach($rows as $row){
				$ret[$row['id']] = $row;
			}
		}
		return $ret; 
	}
	private function uploadFile($product_id, $file, $label) {
        $file_detail = array();
        $upload_path = 'uploads/products/'.$product_id.'/';
		if (!file_exists($upload_path)) {
			mkdir($upload_path, 0777, true);
		}
        if (!empty($file['name'])) {
            $filename = $file['name'];
            $arr = explode('.', $filename);
            $arr = array_reverse($arr);
            $exts = array('gif', 'png', 'jpg', 'jpeg');
            if (in_array($arr[0], $exts)) {
                $filename = $product_id . '_' . $label . '_' . rand(5000,10000) . '.' . $arr[0];
                if (move_uploaded_file($file['tmp_name'], $upload_path . $filename)) {
                    $file_detail['filename'] = $filename;
                    $file_detail['path'] = $upload_path . $filename;
					$this->resizeImage($filename, $file_detail['path'], $upload_path,'original', 52, 75);
					//$this->resizeImage($filename, $file_detail['path'], $upload_path,'original', 260, 378);
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

	public function resizeImage($filename, $source_path, $target_path,$thumb_marker, $width, $height){

		$config = array(
			'image_library' => 'gd2',
			'source_image' => $source_path,
			'new_image' => $target_path,
			'maintain_ratio' => TRUE,
			'create_thumb' => TRUE,
			'thumb_marker' => $thumb_marker,
			'width' => $width,
			'height' => $height
		);
		$this->load->library('image_lib', $config);
		if (!$this->image_lib->resize()) {
			echo $this->image_lib->display_errors();
		}
		// clear //
		$this->image_lib->clear();
	}
	private function productAttributes($products_id){
		$return = array();
			$this->load->model('product_attribute_options_model');
			$this->product_attribute_options_model->ci_where = array();
			$this->product_attribute_options_model->ci_where['products_id'] = $products_id;
			$rows = $this->product_attribute_options_model->getAll(null,null, array('sort_by' => 'id', 'order_type' => 'ASC'));
			if(!empty($rows)){
				foreach($rows as $row){
					$return[$row['id']] = $row['attribute_options_id']; 
				}
			}
			return $return;
		
	}

	
}
