<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Templates Extends Vect_Controller {

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
		$this->load->model('attributes_model');
		
		
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
        $this->web['postdata']['sort_by'] = (isset($this->web['request']['sort_by'])) ? $this->web['request']['sort_by'] : $this->_model . '.template_name';
        $this->web['postdata']['order_type'] = (isset($this->web['request']['order_type'])) ? $this->web['request']['order_type'] : 'ASC';
        $this->web['search'][$this->_model . '.template_name'] = 'Template Name';
        $this->web['search']['products.product_name'] = 'Product Name';
        $this->web['search'][$this->_model . '.status'] = 'Status';
	$this->{$this->model_name}->ci_where_like = array();
	$this->{$this->model_name}->ci_where = array();
	$this->{$this->model_name}->ci_where[$this->_model.'.is_archived'] = '0';	
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
			//redirect($this->listpage_url);
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

        $this->load->model('products_model');
        $this->web['products'] = $this->products_model->getAllWithKeyValue();
        $this->web['section'][] = $this->web['view'] . DIRECTORY_SEPARATOR . 'add_edit';
		$this->web['attributes'] = array();
        if (isset($this->web['model']['id']) && $this->web['model']['id'] > 0) {
            $item_name = strtolower($this->inflect->singularize($this->class_name)) . "_name";
			$this->web['attributes'] = $this->templateAttributes($this->web['model']['id']);
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
           
        }
        foreach ($this->{$this->model_name}->fields_insert as $key => $val) {
            $this->{$this->model_name}->fields_insert[$key] = (isset($this->web['request'][$key])) ? $this->web['request'][$key] : $val['value'];
        }
        
		$this->{$this->model_name}->fields_insert['orientation'] = (isset($this->web['request']['orientation']) && $this->web['request']['orientation'] == '1') ? 'vertical': 'horizontal';
		$this->{$this->model_name}->fields_insert['status'] = (isset($this->web['request']['status'])) ? $this->web['request']['status'] : '0';
        $data = $this->{$this->model_name}->fields_insert;
        $id = $this->{$this->model_name}->save_record($id, $data);
		if($id ){
			$template_id = $this->{$this->model_name}->last_insert_id;
			$this->load->model('template_attribute_options_model');
			$this->template_attribute_options_model->ci_where = array();
			$this->template_attribute_options_model->ci_where['template_attribute_options.template_id'] = $template_id;
			$rows = $this->template_attribute_options_model->getAll();
			if(!empty($rows)){
				foreach($rows as $row){
					$this->db->delete('template_attribute_options', array('id' => $row['id']));  
				}
			}	
			if( isset($this->web['request']['attribute']) && !empty($this->web['request']['attribute']) ) {
				$options =array();
					
				foreach($this->web['request']['attribute'] as $key => $attr){
					foreach($attr as $k => $optionsArr){
						//$options[option] = 	attribute_id;
						$options[$k] = array('attribute_id'	=> $key, 'template_id'=>$template_id, 'attribute_option_id'=> $k);
					}
				}
				foreach($options as $option){
					$this->saveTemplateAttribute($option);
				}
			}
			if(isset($_FILES['template_image']['name']) && isset( $_FILES['template_image']['name']) ){
				$file = $_FILES['template_image'];
				$file_name = str_replace(' ','', $this->web['request']['template_name'] );
				$file_detail = $this->uploadFile($template_id, $file, $file_name);
				
				if (!empty($file_detail)) {
					if(isset($file_detail['path']) && $file_detail['path'] != '' ){
						$data = array();
						$data['template_image_path'] = $file_detail['filename'];
						$id = $this->{$this->model_name}->save_record($template_id, $data);
					}
				}
            }
            if(isset($_FILES['template_image_back']['name']) && isset( $_FILES['template_image_back']['name']) ){
				$file = $_FILES['template_image_back'];
				$file_name = str_replace(' ','', $this->web['request']['template_name'].'_backside' );
				$file_detail = $this->uploadFile($template_id, $file, $file_name);
				
				if (!empty($file_detail)) {
					if(isset($file_detail['path']) && $file_detail['path'] != '' ){
						$data = array();
						$data['template_image_path_back'] = $file_detail['filename'];
						$id = $this->{$this->model_name}->save_record($template_id, $data);
					}
				}
			}
		}
		
        return $id;
    }
	private function uploadFile($template_id, $file, $label) {
        $file_detail = array();
        $upload_path = 'uploads/templates/';
        if (!empty($file['name'])) {
            $filename = $file['name'];
            $arr = explode('.', $filename);
            $arr = array_reverse($arr);
            $exts = array('gif', 'png', 'jpg', 'jpeg', 'docx', 'pdf');
            if (in_array($arr[0], $exts)) {
                $filename = $template_id . '_' . $label . '_' . date('mdYhis') . '.' . $arr[0];
                if (move_uploaded_file($file['tmp_name'], $upload_path . $filename)) {
                    $targetFile = str_replace('.', '_resized.', $filename);	
                    $img = $this->resize_photo($upload_path . $targetFile, $upload_path . $filename);
                    $file_detail['filename'] = $targetFile;
                    $file_detail['path'] = $upload_path . $targetFile;
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
	private function saveTemplateAttribute($arr){
		
		$this->load->model('template_attribute_options_model');
		$data = array();
		$data['template_id'] = $arr['template_id'];
		$data['attribute_id'] = $arr['attribute_id'];
		$data['attribute_option_id'] = $arr['attribute_option_id'];
		$this->template_attribute_options_model->save_record(0, $data);
		return true;
		
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
	private function templateAttributes($template_id){
		$return = array();
			$this->load->model('template_attribute_options_model');
			$this->template_attribute_options_model->ci_where = array();
			$this->template_attribute_options_model->ci_where['template_id'] = $template_id;
			$rows = $this->template_attribute_options_model->getAll(null,null, array('sort_by' => 'id', 'order_type' => 'ASC'));
			if(!empty($rows)){
				foreach($rows as $row){
					$return[$row['id']] = $row['attribute_option_id']; 
				}
			}
			return $return;
		
    }
    private function resize_photo( $targetFile, $originalFile) {
        $newWidth = '286';
        $newHeight = '195';
        if(isset($this->web['request']['orientation'])){
          
            if($this->web['request']['orientation'] == '1'){
                $newWidth = '195';
                $newHeight = '286';
            }
        }
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
	    $tmp = imagecreatetruecolor($newWidth, $newHeight);
		imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
	
		if (file_exists($targetFile)) {
				unlink($targetFile);
		}
		$image_save_func($tmp, "$targetFile");
	}

}