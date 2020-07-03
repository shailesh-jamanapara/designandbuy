<?php

class Templates {

    public $customer_type = null;
	public $customer = array();
	public $has_multiple_customers = false;
	public $templates_arr = array();
    public $customers_id_arr = array();
    public $customer_templates_id = null;
    public $template_unique_id = null;
    public $table_name = null;
    public $model_name = null;
    public $request= array();
    public $postdata = array();
    public $status = null;
	public $columns = array();
	public $rows = array();
	public $total_records;
	public $total_pages;
	public $default_template_unique_id;

    public function __construct() {
		
	   $this->CI =& get_instance();
	   $this->CI->load->library('ciqrcode');
       $this->CI->load->model('customers_model');
       $this->CI->load->model('customer_templates_model');
       $this->CI->load->model('customer_employees_model');

    }

    public function getIdCards(){
		if(!empty($this->customers_ids_arr) ){
			if(count($this->customers_ids_arr) == 1 ){
				$this->set_has_multiple_customers(false); 
			}
			if(count($this->customers_ids_arr)  > 1 ){
				$this->set_has_multiple_customers(true); 
			}
			
			
		}
		// If called from the admin for multiple customers icards to get in grid and table view data
		if($this->get_has_multiple_customers() === false){
			foreach($this->customers_ids_arr as $customer_id){
				$this->CI->customer_templates_model->ci_where = array();
				$this->CI->customer_templates_model->ci_where['customers_id'] = $customer_id;
				$arr = $this->CI->customer_templates_model->getAll();
				$this->customer = $this->getCustomerProfileById($customer_id);
				$this->customer_type = $this->customer['customer_type'];
				$arr_new = array();
				if(!empty($arr)){
					foreach($arr as $new_arr){
						$arr_new[$new_arr['template_unique_id']] = $new_arr;
					}
				}
				$this->templates_arr[$customer_id] = array('templates'=>$arr_new, 'customer'=>$this->customer);
			}
			
		}
	}
	public function getColumnsAndCanvases(){
		if(!empty($this->customers_ids_arr)){
			
			foreach($this->customers_ids_arr as $customer_id){
				$temp_cards = array();
				
				if(!empty($this->templates_arr[$customer_id]['data'])  && !empty($this->templates_arr[$customer_id]['templates'])){
					$rows = $this->templates_arr[$customer_id]['data'];
					$i = 0;
					foreach($rows as $row){
						$template_unique_id = $row['customer_templates_id'];
						$canvas = $this->getCustomerTemplateArr($customer_id, $template_unique_id, $this->templates_arr[$customer_id]['templates'], $row);
						$row['idcard'] = $canvas[$template_unique_id];
						$temp_cards[] = $row;
						$i++;
					}
					$this->templates_arr[$customer_id]['temp_cards'] = $temp_cards;
					//$this->templates_arr[$customer_id]['columns'] = $columns;
				}
				
				
			}
			
			
		}
	}
    public function getIdCardsInGrid(){
        $this->icards['rows'] = array();
		 $this->icards['profile'] = $this->session->userdata['loggedin'];
		 if(is_array($this->icards['profile'])){
			 $this->CI->load->model('customers_model');
			 $customer = $this->CI->customers_model->getById($this->icards['profile']['customer_id']);
			 $this->icards['profile']['customer_name'] = $customer['customer_name'];
			 $this->icards['profile']['registration_no'] = $customer['registration_no'];
			 $this->icards['profile']['email'] = $customer['email'];
			 $this->icards['profile']['website'] = $customer['website'];
		 }
		 //echo $customer['customer_type'];
		 if($this->customer_type === 'school' ){
			 // getting school details
				 $this->CI->load->model('schools_model');
				 $this->schools_model->ci_where = array();
				 $this->schools_model->ci_where['schools.customers_id'] = $this->icards['profile']['customer_id'];
				 $rows = $this->schools_model->getAll();
				 if(!empty($rows) && $rows[0]['customers_id'] == $this->icards['profile']['customer_id']){
					 $this->icards['profile']['schools_id'] = $rows[0]['id'];
					 $this->icards['completed'] = $this->getAllFilledStudents($this->icards['profile']['schools_id']);
				 }
				$this->_model = 'students';
				$this->initLoad();
				$rows =  $this->school_students_data('');
		 }else{
			$this->_model = 'customer_employees';
			$this->initLoad();
			$rows =  $this->corporate_id_cards('');
		 }
		 $temp_cards = array();
		 if(!empty($rows)){
			 $i = 0;
			 $columns = array();
			 foreach($rows as $row){
				 $template_unique_id = $row['customer_templates_id'];
				 //echo "<pre>"; print_r($row); echo"</pre>";
				 $canvas = $this->getCustomerTemplate($this->icards['profile']['customer_id'], $template_unique_id,  $row);
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

		 $this->icards['rows'] = $temp_cards;
		 $this->icards['columns'] = (isset($columns) && count($columns) > 0 )?$columns:array();
		 $this->CI->load->view('layout/front/header',  $this->icards);
		 $this->CI->load->view('layout/front/main_menu',  $this->icards);
		
		 $this->CI->load->view('my_pages/user_pages_header',  $this->icards);
		 $this->CI->load->view('my_pages/user_menu',  $this->icards);
		 $this->CI->load->view('my_pages/user_data_menu',  $this->icards);
		 $this->CI->load->view('my_pages/idcards',  $this->icards);
		 $this->CI->load->view('my_pages/user_pages_footer',  $this->icards);
		 //$this->CI->load->view('layout/front/main_content', $data);
		 //$this->CI->load->view('layout/front/footer',  $this->icards);
    }
    public function getIdCardsInTable(){

	}
	public function set_has_multiple_customers($flag){
		$this->has_multiple_customers = $flag;
	}
	public function get_has_multiple_customers(){
		return $this->has_multiple_customers;
	}
	private function getCustomerProfileById($id){
		$this->CI->load->model('customers_model');
		$row = $this->CI->customers_model->getById($id);
		if(isset($row['customer_type']) && strtolower($row['customer_type']) === 'school' ){
				// getting school details
				$this->CI->load->model('schools_model');
				$this->CI->schools_model->ci_where = array();
				$this->CI->schools_model->ci_where['schools.customers_id'] = $id;
				$school = $this->CI->schools_model->getAll();
				$row['schools_id']  = (!empty($school) && $school[0]['customers_id'] == $row['id'])? $school[0]['id']:null;
		}
		return $row;
	}
	public function getData($type){
		$this->model_name = '';
		$records = array();
		if($type == 'school'){
			$this->model_name = 'students_model';
			$this->table_name = 'students';
			$this->search['students.school_name'] = 'School name';
			$this->search['students.type_of_school'] = 'Medium';
			$this->search['students.essential_mobile_no'] = 'Essential Mo. No.';
			$this->search['students.status'] = 'Status';
		}
		if($type == 'corporate'){
			$this->model_name = 'customer_employees_model';
			$this->table_name = 'customer_employees';
			$this->search['customer_employees.employee_name'] = 'Employee name';
			$this->search['customer_employees.designation'] = 'Designation';
			$this->search['customer_employees.essential_mobile_no'] = 'Essential Mo. No.';
			$this->search['customer_employees.status'] = 'Status';
		}

		$this->CI->load->model($this->model_name);
		$this->CI->{$this->model_name}->ci_where_like = array();
		$this->CI->{$this->model_name}->ci_where = array();
		if (isset($this->postdata['search_by']) && $this->postdata['search_by'] != '') {
            $this->CI->{$this->model_name}->ci_where_like[$this->postdata['search_by']] = $this->postdata['search_for'];
        }
		if($this->get_has_multiple_customers() === false){
			$customer_id = $this->customers_ids_arr[0];
			$this->CI->{$this->model_name}->ci_where[$this->table_name.'.customers_id'] = $customer_id;
		}
		if(isset($this->postdata['templates_id']) && $this->postdata['templates_id'] !== ''){
			$this->CI->{$this->model_name}->ci_where[$this->table_name.'.customer_templates_id'] = $this->postdata['templates_id'];
		}
		if($this->status){
			$this->CI->{$this->model_name}->ci_where[ $this->table_name.'.status'] = $this->status;
		}
		
		$records = $this->CI->{$this->model_name}->getAll($this->postdata['page'], $this->postdata['limit'], array('sort_by' => $this->postdata['sort_by'], 'order_type' => $this->postdata['order_type']));
		$this->total_records = $this->CI->{$this->model_name}->total_records;
		$this->total_pages =  $this->CI->{$this->model_name}->total_pages;
		$row = array();
		if(!empty($records)){
			
			foreach($records as $record){
				$row[$record['customers_id']][] = $record;
			}
		}
		if(!empty($this->customers_ids_arr)){
			foreach($this->customers_ids_arr as $arr){
				if(isset($row[$arr]))
					$this->templates_arr[$arr]['data'] = $row[$arr];
					if(!empty($row[$arr])){
						$this->default_template_unique_id =$row[$arr][0]['customer_templates_id'];
					}
			}
		}

	}
	public function idcards() {
		$this->icards['rows'] = array();
		 $this->icards['profile'] = $this->session->userdata['loggedin'];
		 if(is_array($this->icards['profile'])){
			 $this->CI->load->model('customers_model');
			 $customer = $this->CI->customers_model->getById($this->icards['profile']['customer_id']);
			 $this->icards['profile']['customer_name'] = $customer['customer_name'];
			 $this->icards['profile']['registration_no'] = $customer['registration_no'];
			 $this->icards['profile']['email'] = $customer['email'];
			 $this->icards['profile']['website'] = $customer['website'];
		 }
		 //echo $customer['customer_type'];
		 if(isset($customer['customer_type']) && $customer['customer_type'] == 'school' ){
			 // getting school details
				 $this->CI->load->model('schools_model');
				 $this->schools_model->ci_where = array();
				 $this->schools_model->ci_where['schools.customers_id'] = $this->icards['profile']['customer_id'];
				 $rows = $this->schools_model->getAll();
				 if(!empty($rows) && $rows[0]['customers_id'] == $this->icards['profile']['customer_id']){
					 $this->icards['profile']['schools_id'] = $rows[0]['id'];
					 $this->icards['completed'] = $this->getAllFilledStudents($this->icards['profile']['schools_id']);
				 }
				$this->_model = 'temp_students';
				$this->initLoad();
				$rows =  $this->school_id_cards('');
		 }else{
			$this->_model = 'customer_employees';
			$this->initLoad();
			$rows =  $this->corporate_id_cards('');
		 }
		 $temp_cards = array();
		 if(!empty($rows)){
			 $i = 0;
			 $columns = array();
			 foreach($rows as $row){
				 $template_unique_id = $row['customer_templates_id'];
				 //echo "<pre>"; print_r($row); echo"</pre>";
				 $canvas = $this->getCustomerTemplate($this->icards['profile']['customer_id'], $template_unique_id,  $row);
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

		 $this->icards['rows'] = $temp_cards;
		 $this->icards['columns'] = (isset($columns) && count($columns) > 0 )?$columns:array();
		 $this->CI->load->view('layout/front/header',  $this->icards);
		 $this->CI->load->view('layout/front/main_menu',  $this->icards);
		
		 $this->CI->load->view('my_pages/user_pages_header',  $this->icards);
		 $this->CI->load->view('my_pages/user_menu',  $this->icards);
		 $this->CI->load->view('my_pages/user_data_menu',  $this->icards);
		 $this->CI->load->view('my_pages/idcards',  $this->icards);
		 $this->CI->load->view('my_pages/user_pages_footer',  $this->icards);
		 //$this->CI->load->view('layout/front/main_content', $data);
		 //$this->CI->load->view('layout/front/footer',  $this->icards);
	 }

	function getCustomerTemplateArr($customers_id, $template_unique_id, $templates, $data_array = array()){
		$year = date('Y');
		$upload_qrcodes_path = UPLOADS_QRCODES_PATH.$customers_id;
		if(!file_exists($upload_qrcodes_path)) mkdir($upload_qrcodes_path,0777);
		$return = array();
		//$this->CI->load->library('image_lib');
		if(count($templates) > 0 ){
			$j=0;
			foreach($templates as $row){
				$variables_arr =  $row['template_variables'];
				$fields_arr =  (array) json_decode($row['template_fields']);
				$template_data_json = json_decode($row['template_data_json']);
				$template_data_json_back = json_decode($row['template_data_json_back']);
				$variables_arr_back =  $row['template_variables'];
				$fields_arr_back =  (array) json_decode($row['template_fields']);
				$i=0;
				if(isset($template_data_json->objects) && !empty($template_data_json->objects)){
					
					$text_for_qr_code = '';
					if(!empty($data_array)){
						foreach($data_array as $data_item){
							if(strpos($data_item, 'uploads') === false){
								$text_for_qr_code .= $data_item ." ";
							}
						}
					}
					foreach($template_data_json->objects as $key => $object){
						if(trim($data_array['customer_templates_id']) === $row['template_unique_id']){
							if($object->type === 'i-text'){
								
								if(isset($object->id) && strpos($object->id, 'control_') !== false && strpos($object->id, 'common_text') === false){
									$temp_arr = explode('control_', $object->id);
									$obj_id = $temp_arr[1];
									if(array_key_exists($obj_id, $data_array)){
										$template_data_json->objects{$i}->text =  $data_array[$obj_id];
										//$template_data_json->objects{$i}->fill =  $fields_arr[$object->id]->fill;
										//$template_data_json->objects{$i}->fontSize =  $fields_arr[$object->id]->fontSize;
										//$template_data_json->objects{$i}->fontFamily =  $fields_arr[$object->id]->fontFamily;
									}
								}
								if(isset($object->id) && strpos($object->id, 'control_') === false && strpos($object->id, 'common_text') === false){
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
									if(file_exists(UPLOAD_PHOTO_PATH.$template_unique_id.'/'.$data_array['photo_1'])){
										$targetFile = str_replace('.', '_new.',UPLOAD_PHOTO_PATH.$template_unique_id.'/'.$data_array['photo_1']);	
										$originalFile = UPLOAD_PHOTO_PATH.$template_unique_id.'/'.$data_array['photo_1'];
										$img = $this->resize_photo($wd, $targetFile, $originalFile);
										$template_data_json->objects{$i}->src =base_url().'/'.$targetFile ;
									}
									
								}
								if(strpos($object->src, 'image_control_photo_2') !== false){
									$wd = $template_data_json->objects{$i}->width;
									if(file_exists(UPLOAD_PHOTO_PATH.$template_unique_id.'/'.$data_array['photo_2'])){
										$targetFile = str_replace('.', '_new.',UPLOAD_PHOTO_PATH.$template_unique_id.'/'.$data_array['photo_2']);	
										$originalFile = UPLOAD_PHOTO_PATH.$template_unique_id.'/'.$data_array['photo_2'];
										$img = $this->resize_photo($wd, $targetFile, $originalFile);
										$template_data_json->objects{$i}->src =base_url().'/'.$targetFile ;
									}
									
								}
								if(strpos($object->src, 'image_control_photo_3') !== false){
									$wd = $template_data_json->objects{$i}->width;
									if(file_exists(UPLOAD_PHOTO_PATH.$template_unique_id.'/'.$data_array['photo_3'])){
										$targetFile = str_replace('.', '_new.',UPLOAD_PHOTO_PATH.$template_unique_id.'/'.$data_array['photo_3']);	
										$originalFile = UPLOAD_PHOTO_PATH.$template_unique_id.'/'.$data_array['photo_3'];
										$img = $this->resize_photo($wd, $targetFile, $originalFile);
										$template_data_json->objects{$i}->src =base_url().'/'.$targetFile ;
									}
									
								}
								$template_data_json->objects{$i}->lockMovementX =  'true';
								$template_data_json->objects{$i}->lockMovementY =  'true';
							}
							$i++;
						} 
					}
				}	
				$i=0;
				if(isset($template_data_json_back->objects) && !empty($template_data_json_back->objects)){
					
					$text_for_qr_code = '';
					if(!empty($data_array)){
						foreach($data_array as $data_item){
							if(strpos($data_item, 'uploads') === false){
								$text_for_qr_code .= $data_item ." ";
							}
						}
					}
					foreach($template_data_json_back->objects as $key => $object){
						if(trim($data_array['customer_templates_id']) === $row['template_unique_id']){
							if($object->type === 'i-text'){
								
								if(isset($object->id) && strpos($object->id, 'control_') !== false && strpos($object->id, 'common_text') === false){
									$temp_arr = explode('control_', $object->id);
									$obj_id = $temp_arr[1];
									if(array_key_exists($obj_id, $data_array)){
										$template_data_json_back->objects{$i}->text =  $data_array[$obj_id];
										//$template_data_json->objects{$i}->fill =  $fields_arr[$object->id]->fill;
										//$template_data_json->objects{$i}->fontSize =  $fields_arr[$object->id]->fontSize;
										//$template_data_json->objects{$i}->fontFamily =  $fields_arr[$object->id]->fontFamily;
									}
								}
								if(isset($object->id) && strpos($object->id, 'control_') === false && strpos($object->id, 'common_text') === false){
									if(array_key_exists($object->id, $fields_arr)){
										//echo "<pre> data_json object <br>"; print_r($object); echo "</pre>";
										$template_data_json_back->objects{$i}->fill =  $fields_arr[$object->id]->fill;
										$template_data_json_back->objects{$i}->fontSize =  $fields_arr[$object->id]->fontSize;
										$template_data_json_back->objects{$i}->fontFamily =  $fields_arr[$object->id]->fontFamily;
										
									}
								}
								$template_data_json_back->objects{$i}->lockMovementX =  'true';
								$template_data_json_back->objects{$i}->lockMovementY =  'true';
							}
							if($object->type === 'image'){
								if(strpos($object->src, 'image_control_photo_1') !== false){
									$wd = $template_data_json_back->objects{$i}->width;
									if(file_exists(UPLOAD_PHOTO_PATH.$template_unique_id.'/'.$data_array['photo_1'])){
										$targetFile = str_replace('.', '_new.',UPLOAD_PHOTO_PATH.$template_unique_id.'/'.$data_array['photo_1']);	
										$originalFile = UPLOAD_PHOTO_PATH.$template_unique_id.'/'.$data_array['photo_1'];
										$img = $this->resize_photo($wd, $targetFile, $originalFile);
										$template_data_json_back->objects{$i}->src =base_url().'/'.$targetFile ;
									}
									
								}
								if(strpos($object->src, 'image_control_photo_2') !== false){
									$wd = $template_data_json_back->objects{$i}->width;
									if(file_exists(UPLOAD_PHOTO_PATH.$template_unique_id.'/'.$data_array['photo_2'])){
										$targetFile = str_replace('.', '_new.',UPLOAD_PHOTO_PATH.$template_unique_id.'/'.$data_array['photo_2']);	
										$originalFile = UPLOAD_PHOTO_PATH.$template_unique_id.'/'.$data_array['photo_2'];
										$img = $this->resize_photo($wd, $targetFile, $originalFile);
										$template_data_json_back->objects{$i}->src =base_url().'/'.$targetFile ;
									}
									
								}
								if(strpos($object->src, 'image_control_photo_3') !== false){
									$wd = $template_data_json_back->objects{$i}->width;
									if(file_exists(UPLOAD_PHOTO_PATH.$template_unique_id.'/'.$data_array['photo_3'])){
										$targetFile = str_replace('.', '_new.',UPLOAD_PHOTO_PATH.$template_unique_id.'/'.$data_array['photo_3']);	
										$originalFile = UPLOAD_PHOTO_PATH.$template_unique_id.'/'.$data_array['photo_3'];
										$img = $this->resize_photo($wd, $targetFile, $originalFile);
										$template_data_json_back->objects{$i}->src =base_url().'/'.$targetFile ;
									}
									
								}
								$template_data_json->objects{$i}->lockMovementX =  'true';
								$template_data_json->objects{$i}->lockMovementY =  'true';
							}
							$i++;
						} 
					}
				}
				$return[$template_unique_id] = json_encode($template_data_json);
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


    private function save() {
        if (isset($this->request['id'])) {
            $this->request['id'] = base64_decode($this->request['id']);
        }
        $id = $this->request['id'];
        $this->request['is_archived'] = 0;
        if ($this->request['id'] == 0) {
            $this->request['created_at'] = date('y:m:d h:i:s');
            $this->request['created_by'] = $this->session->userdata['loggedin']['username'];
        }
        $this->request['updated_on'] = date('y:m:d h:i:s');
        $this->request['updated_by'] = $this->session->userdata['loggedin']['username'];
        foreach ($this->CI->{$this->model_name}->fields_insert as $key => $val) {
            $this->CI->{$this->model_name}->fields_insert[$key] = (isset($this->request[$key])) ? $this->request[$key] : $val['value'];
        }
        $data = $this->CI->{$this->model_name}->fields_insert;
        $id = $this->CI->{$this->model_name}->save_record($id, $data);
        return $id;
    }
	function loadTemplateAttributeName(){
		$rows = array();
		$this->CI->load->model('attribute_options_model');
		$rows = $this->attribute_options_model->getAllWithKeyValue();
		return $rows;
	}
	private function getPreference($preference){
		$arr = array();
		if(isset($preference) && !empty($preference)){
		$arr['orientation'] =  array('label' => ucfirst($preference['orientation']), 'value' => $preference['orientation'], 'form_value' => $preference['orientation']);

		$arr['chemical_or_smart']  = array('label' => 'None', 'value'=>'',  'form_value' => '');
			if(isset($preference['chemical_or_smart'])){
					if(isset($preference['chemical_or_smart']->smart) && $preference['chemical_or_smart']->smart == 1){
						$arr['chemical_or_smart']  = array('label' => 'Smart Card', 'value'=>'16', 'form_value' => 'smart');
					}
					if(isset($preference['chemical_or_smart']->chemical) && $preference['chemical_or_smart']->chemical == 1){
						$arr['chemical_or_smart']  = array('label' => 'Chemical Card', 'value'=>'17', 'form_value' => 'chemical');
					}
					if(isset($preference['chemical_or_smart']->shape) && $preference['chemical_or_smart']->shape == 1){
						$arr['chemical_or_smart']  = array('label' => 'Shape Card', 'value'=>'24',  'form_value' => 'shape');
					}
			}
			$arr['card_type'] =  array('label' => 'Without Chip', 'value'=>'0',  'form_value' => 'simple');
			$arr['rfid_or_mifre'] =  array('label' => 'With Chip', 'value'=>'0',  'form_value' => '');
			if(isset($preference['card_type'])){
					if(isset($preference['card_type']->with_chip) && $preference['card_type']->with_chip == 1){
						if(isset($preference['rfid_or_mifre']->mifare) && $preference['rfid_or_mifre']->mifare == 1){
							$arr['card_type']  =  array('label' => '1 K MiFare', 'value'=>'19',   'form_value' => 'with_chip');
							$arr['rfid_or_mifre'] =  array('label' => '1 K MiFare', 'value'=>'19',  'form_value' => 'mifare');
						}
						if(isset($preference['rfid_or_mifre']->rfid) && $preference['rfid_or_mifre']->rfid == 1){
							$arr['card_type']  =  array('label' => '1 K MiFare', 'value'=>'19',   'form_value' => 'simple');
							$arr['rfid_or_mifre'] =  array('label' => 'RFID', 'value'=>'18',  'form_value' => 'rfid');
						}
					}
			}
			$arr['sides'] = array('label' => 'Single', 'value'=>'20',  'form_value' => 'single');
			if(isset($preference['sides'])){
					if(isset($preference['sides']->both) && $preference['sides']->both == 1){
						$arr['sides'] = array('label' => 'Both sides', 'value'=>'21',  'form_value' => 'both');
					}
			}
			$arr['scanner'] = array('label' => 'None', 'value'=>'',  'form_value' => '');
			if(isset($preference['scanner'])){
					if(isset($preference['scanner']->barcode) && $preference['scanner']->barcode == 1){
						$arr['scanner'] = array('label' => 'Barcode', 'value'=>'1',   'form_value' => 'barcode');
					}
			}
			if(isset($preference['scanner'])){
					if(isset($preference['scanner']->qrcode) && $preference['scanner']->qrcode == 1){
						$arr['scanner'] = array('label' => 'QR Code', 'value'=>'2',   'form_value' => 'qrcode');
					}
			}
			$arr['finish'] = array('label' => 'None', 'value'=>' ',   'form_value' => '');
			if(isset($preference['finish'])){
					if(isset($preference['finish']->glossy) && $preference['finish']->glossy == 1){
						$arr['finish'] = array('label' => 'Glossy', 'value'=>'3' ,   'form_value' => 'glossy');
					}
					if(isset($preference['finish']->matt) && $preference['finish']->matt == 1){
						$arr['finish'] = array('label' => 'Matt', 'value'=>'4' ,   'form_value' => 'matt');
					}
			}
		}
			return $arr;
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
			$this->icards['profile'] = $this->session->userdata['loggedin'];
			$this->icards['errors'] = $errors;
			$this->CI->load->view('layout/front/header',  $this->icards);
			$this->CI->load->view('layout/front/main_menu',  $this->icards);
			
			$this->CI->load->view('my_pages/user_pages_header',  $this->icards);
			$this->CI->load->view('my_pages/user_menu',  $this->icards);
			$this->CI->load->view('my_pages/import_error',  $this->icards);
			$this->CI->load->view('my_pages/user_pages_footer',  $this->icards);
		}
	}

	public function ontimelinkforstudentparent(){
		$q= $this->request['q'];
		//echo $q;
		//echo base64_decode($q);
		$this->CI->load->view('layout/front/header',  $this->icards);
		$this->CI->load->view('schools/ontimelinkforstudentparent',  $this->icards);
		$this->CI->load->view('layout/front/footer',  $this->icards);
	}
	public function sendMessagesToParents(){
		$this->icards['profile'] = $this->session->userdata['loggedin'];
		$this->school_id = $this->icards['profile']['customer_id'];
		$this->sendMessages();
	}
	public function sendMessages(){

		$this->CI->load->model('students_model');
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
		$this->CI->load->model('id_cards_model');
		$this->id_cards_model->ci_where = array();
		$this->id_cards_model->ci_where['id_cards.customer_id'] = $customer_id;
		$this->id_cards_model->ci_where['id_cards.template_id'] = $template_id;
		$rows = $this->id_cards_model->getAll();
		return ( count($rows) > 0 ) ? true : false;
	}
	private function getAllPhotos($customer_id){
		$arr = array();
		$this->CI->load->model('student_photos_model');
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

		$this->icards['rows'] = array();
		$this->icards['school_templates'] = array();
		$this->icards['profile'] = $this->session->userdata['loggedin'];

		$this->icards['profile']['department_name'] = $this->icards['departments'][$this->icards['profile']['department_id']];
		if(is_array($this->icards['profile'])){
			$this->CI->load->model('customers_model');
			$customer = $this->CI->customers_model->getById($this->icards['profile']['customer_id']);
			$this->icards['profile']['customer_name'] = $customer['customer_name'];
			$this->icards['profile']['registration_no'] = $customer['registration_no'];
			$this->icards['profile']['email'] = $customer['email'];
			$this->icards['profile']['website'] = $customer['website'];

			// getting selected template
			$this->CI->load->model('customer_templates_model');
			$this->CI->customer_templates_model->ci_where = array();
			$this->CI->customer_templates_model->ci_where['customers_id'] = $this->icards['profile']['customer_id'];
			$this->CI->customer_templates_model->ci_where['template_type'] = '0';
			$rows = $this->CI->customer_templates_model->getAll();
			$this->icards['my_templates'] = $rows;


		}

		$this->icards['title'] = 'MY TEMPLATES';
		$this->icards['sub_title'] = 'SELECTED TEMPLATE';
		if(isset($this->request['view_page']) && $this->request['view_page'] == 'a4'){
			$this->icards['photos'] = $this->getAllPhotos($this->icards['profile']['customer_id']);
			$this->icards['completed'] = $this->getAllFilledStudents($this->icards['profile']['customer_id']);
			$this->CI->load->view('schools/popup_window',  $this->icards);
		}else{
			$this->CI->load->view('layout/front/header',  $this->icards);
			$this->icards['completed'] = $this->getAllFilledStudents($this->icards['profile']['customer_id']);
			$this->CI->load->view('my_pages/user_pages_header',  $this->icards);
			$this->CI->load->view('my_pages/user_menu',  $this->icards);
			//$this->CI->load->view('my_pages/myaccount',  $this->icards);
			$this->CI->load->view('my_pages/selected_templates',  $this->icards);
			//$this->CI->load->view('layout/front/main_content', $data);
			$this->CI->load->view('layout/front/footer',  $this->icards);
		}
	}
	public function created_templates() {

		$this->icards['rows'] = array();
		$this->icards['school_templates'] = array();
		$this->icards['profile'] = $this->session->userdata['loggedin'];

		$this->icards['profile']['department_name'] = $this->icards['departments'][$this->icards['profile']['department_id']];
		if(is_array($this->icards['profile'])){
			$this->CI->load->model('customers_model');
			$customer = $this->CI->customers_model->getById($this->icards['profile']['customer_id']);
			$this->icards['profile']['customer_name'] = $customer['customer_name'];
			$this->icards['profile']['registration_no'] = $customer['registration_no'];
			$this->icards['profile']['email'] = $customer['email'];
			$this->icards['profile']['website'] = $customer['website'];

			// getting created template
			$this->CI->load->model('customer_templates_model');
			$this->CI->customer_templates_model->ci_where = array();
			$this->CI->customer_templates_model->ci_where['customers_id'] = $this->icards['profile']['customer_id'];
			$this->CI->customer_templates_model->ci_where['template_type'] = '1';
			$rows = $this->CI->customer_templates_model->getAll(null, null, array('sort_by' => 'customer_templates.id', 'order_type' =>'DESC' ));
			$this->icards['my_templates'] = $rows;


		}

		$this->icards['title'] = 'MY TEMPLATES';
		$this->icards['sub_title'] = 'CREATED TEMPLATE';
		if(isset($this->request['view_page']) && $this->request['view_page'] == 'a4'){
			$this->icards['photos'] = $this->getAllPhotos($this->icards['profile']['customer_id']);
			$this->icards['completed'] = $this->getAllFilledStudents($this->icards['profile']['customer_id']);
			$this->CI->load->view('schools/popup_window',  $this->icards);
		}else{
			$this->CI->load->view('layout/front/header',  $this->icards);
			$this->CI->load->view('layout/front/main_menu',  $this->icards);
			$this->icards['title'] = 'Multjivan Pixels My Account';
			$this->icards['sub_title'] = 'My Templates';
			$this->icards['last_node'] = 'All Templates';
			// getting created template
			$this->icards['completed'] = $this->getAllFilledStudents($this->icards['profile']['customer_id']);
			$this->CI->load->view('my_pages/user_pages_header',  $this->icards);
			$this->CI->load->view('my_pages/user_menu',  $this->icards);
			$this->CI->load->view('my_pages/user_templates_menu',  $this->icards);
			$this->CI->load->view('my_pages/created_templates',  $this->icards);
			$this->CI->load->view('my_pages/user_pages_footer',  $this->icards);
	
		}
	}

	public function review_my_template() {

		if(!isset($this->request['template_id'])){
			redirect(base_url().'My_Pages/myaccount');
		}

		$this->icards['rows'] = array();
		$this->icards['school_templates'] = array();
		$this->icards['profile'] = $this->session->userdata['loggedin'];
		if(!$this->session->userdata['loggedin']){
			redirect(base_url().'My_Pages/myaccount');
		}
		$this->icards['profile']['department_name'] = $this->icards['departments'][$this->icards['profile']['department_id']];
		if(is_array($this->icards['profile'])){
			$this->CI->load->model('customers_model');
			$customer = $this->CI->customers_model->getById($this->icards['profile']['customer_id']);
			$this->icards['profile']['customer_name'] = $customer['customer_name'];
			$this->icards['profile']['registration_no'] = $customer['registration_no'];
			$this->icards['profile']['email'] = $customer['email'];
			$this->icards['profile']['website'] = $customer['website'];

			// getting created template
			$this->CI->load->model('customer_templates_model');
			$this->CI->customer_templates_model->ci_where = array();
			$this->CI->customer_templates_model->ci_where['customers_id'] = $this->icards['profile']['customer_id'];
			$this->CI->customer_templates_model->ci_where['id'] = $this->request['template_id'];
			$rows = $this->CI->customer_templates_model->getAll();
			//print_r($this->request);
			$this->icards['template'] = $rows[0];


		}

		$this->icards['title'] = 'MY TEMPLATES';
		$this->icards['sub_title'] = 'CREATED TEMPLATE';
		if(isset($this->request['view_page']) && $this->request['view_page'] == 'a4'){
			$this->icards['photos'] = $this->getAllPhotos($this->icards['profile']['customer_id']);
			$this->icards['completed'] = $this->getAllFilledStudents($this->icards['profile']['customer_id']);
			$this->CI->load->view('schools/popup_window',  $this->icards);
		}else{
			$this->CI->load->view('layout/front/header',  $this->icards);
			$this->icards['completed'] = $this->getAllFilledStudents($this->icards['profile']['customer_id']);
			$this->CI->load->view('my_pages/user_pages_header',  $this->icards);
			$this->CI->load->view('my_pages/user_menu',  $this->icards);
			//$this->CI->load->view('my_pages/myaccount',  $this->icards);
			$this->CI->load->view('my_pages/review_my_template',  $this->icards);
			//$this->CI->load->view('layout/front/main_content', $data);
			$this->CI->load->view('my_pages/user_pages_footer',  $this->icards);
			$this->CI->load->view('layout/front/footer',  $this->icards);

		}
	}

	public function download_sample_sheet() {

        $this->icards['total_records'] = '';
        $this->icards['total_pages'] = '';
		$this->icards['model']['new'] = base64_encode(0);
		$this->icards['rows'] = array();
		$this->icards['school_templates'] = array();
		$this->icards['profile'] = $this->session->userdata['loggedin'];
		//echo "<pre>";print_r($this->icards['profile'] ); exit;
		$this->icards['profile']['department_name'] = $this->icards['departments'][$this->icards['profile']['department_id']];

		$school_id = $this->session->userdata['loggedin']['id'];

		$rand = rand(500, 10000);
		$this->CI->load->view('layout/front/header',  $this->icards);
		$this->CI->load->view('layout/front/main_menu',  $this->icards);
		$this->icards['title'] = 'MY DATA';
		$this->icards['sub_title'] = 'ACTION';
		$this->icards['last_node'] = 'MANUAL DATA ENTRY';
		// getting created template
		$this->CI->load->model('customer_templates_model');
		$this->CI->customer_templates_model->ci_where = array();
		$this->CI->customer_templates_model->ci_where['customers_id'] = $this->icards['profile']['customer_id'];
		$this->CI->customer_templates_model->ci_where['template_type'] = '1';
		$rows = $this->CI->customer_templates_model->getAll();
		
		$this->icards['my_templates'] = $rows;
			$this->icards['completed'] = $this->getAllFilledStudents($this->icards['profile']['customer_id']);
			$this->CI->load->view('my_pages/user_pages_header',  $this->icards);
			$this->CI->load->view('my_pages/user_menu',  $this->icards);
			$this->CI->load->view('my_pages/user_action_menu',  $this->icards);
			$this->CI->load->view('my_pages/download_sample_sheet',  $this->icards);
			$this->CI->load->view('my_pages/user_pages_footer',  $this->icards);
			//$this->CI->load->view('layout/front/main_content', $data);
			//$this->CI->load->view('layout/front/footer',  $this->icards);

	}
	public function upload_sheet() {

        $this->icards['total_records'] = '';
        $this->icards['total_pages'] = '';
		$this->icards['model']['new'] = base64_encode(0);
		$this->icards['rows'] = array();
		$this->icards['school_templates'] = array();
		$this->icards['profile'] = $this->session->userdata['loggedin'];
		//echo "<pre>";print_r($this->icards['profile'] ); exit;
		$this->icards['profile']['department_name'] = $this->icards['departments'][$this->icards['profile']['department_id']];

		$school_id = $this->session->userdata['loggedin']['id'];

		$rand = rand(500, 10000);
		$this->CI->load->view('layout/front/header',  $this->icards);
		$this->CI->load->view('layout/front/main_menu',  $this->icards);
		$this->icards['title'] = 'MY DATA';
		$this->icards['sub_title'] = 'ACTION';
		$this->icards['last_node'] = 'MANUAL DATA ENTRY';
		// getting created template
		$this->CI->load->model('customer_templates_model');
		$this->CI->customer_templates_model->ci_where = array();
		$this->CI->customer_templates_model->ci_where['customers_id'] = $this->icards['profile']['customer_id'];
		$this->CI->customer_templates_model->ci_where['template_type'] = '1';
		$rows = $this->CI->customer_templates_model->getAll();
		
		$this->icards['my_templates'] = $rows;
			$this->icards['completed'] = $this->getAllFilledStudents($this->icards['profile']['customer_id']);
			$this->CI->load->view('my_pages/user_pages_header',  $this->icards);
			$this->CI->load->view('my_pages/user_menu',  $this->icards);
			$this->CI->load->view('my_pages/user_action_menu',  $this->icards);
			$this->CI->load->view('my_pages/upload_sheet',  $this->icards);
			$this->CI->load->view('my_pages/user_pages_footer',  $this->icards);
			//$this->CI->load->view('layout/front/main_content', $data);
			//$this->CI->load->view('layout/front/footer',  $this->icards);

	}
	public function upload_photos() {

        $this->icards['total_records'] = '';
        $this->icards['total_pages'] = '';
		$this->icards['model']['new'] = base64_encode(0);
		$this->icards['rows'] = array();
		$this->icards['school_templates'] = array();
		$this->icards['profile'] = $this->session->userdata['loggedin'];
		//echo "<pre>";print_r($this->icards['profile'] ); exit;
		$this->icards['profile']['department_name'] = $this->icards['departments'][$this->icards['profile']['department_id']];

		$school_id = $this->session->userdata['loggedin']['id'];

		$rand = rand(500, 10000);
		$this->CI->load->view('layout/front/header',  $this->icards);
		$this->CI->load->view('layout/front/main_menu',  $this->icards);
		$this->icards['title'] = 'MY DATA';
		$this->icards['sub_title'] = 'ACTION';
		$this->icards['last_node'] = 'MANUAL DATA ENTRY';
		// getting created template
		$this->CI->load->model('customer_templates_model');
		$this->CI->customer_templates_model->ci_where = array();
		$this->CI->customer_templates_model->ci_where['customers_id'] = $this->icards['profile']['customer_id'];
		$this->CI->customer_templates_model->ci_where['template_type'] = '1';
		$rows = $this->CI->customer_templates_model->getAll();
		
		$this->icards['my_templates'] = $rows;
			$this->icards['completed'] = $this->getAllFilledStudents($this->icards['profile']['customer_id']);
			$this->CI->load->view('my_pages/user_pages_header',  $this->icards);
			$this->CI->load->view('my_pages/user_menu',  $this->icards);
			$this->CI->load->view('my_pages/user_action_menu',  $this->icards);
			$this->CI->load->view('my_pages/upload_photos',  $this->icards);
			$this->CI->load->view('my_pages/user_pages_footer',  $this->icards);
			//$this->CI->load->view('layout/front/main_content', $data);
			//$this->CI->load->view('layout/front/footer',  $this->icards);

	}

	public function data_entry_manual() {

        $this->icards['total_records'] = '';
        $this->icards['total_pages'] = '';
		$this->icards['model']['new'] = base64_encode(0);
		$this->icards['rows'] = array();
		$this->icards['school_templates'] = array();
		$this->icards['profile'] = $this->session->userdata['loggedin'];
		//echo "<pre>";print_r($this->icards['profile'] ); exit;
		$this->icards['profile']['department_name'] = $this->icards['departments'][$this->icards['profile']['department_id']];

		$rand = rand(500, 10000);
		$this->CI->load->view('layout/front/header',  $this->icards);
		$this->CI->load->view('layout/front/main_menu',  $this->icards);
		$this->icards['title'] = 'MY DATA';
		$this->icards['sub_title'] = 'ACTION';
		$this->icards['last_node'] = 'MANUAL DATA ENTRY';
		// getting created template
		$this->CI->load->model('customer_templates_model');
		$this->CI->customer_templates_model->ci_where = array();
		$this->CI->customer_templates_model->ci_where['customers_id'] = $this->icards['profile']['customer_id'];
		$this->CI->customer_templates_model->ci_where['template_type'] = '1';
		$rows = $this->CI->customer_templates_model->getAll();
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
		$this->icards['my_templates'] = $my_templates;
			
			$this->CI->load->view('my_pages/user_pages_header',  $this->icards);
			$this->CI->load->view('my_pages/user_menu',  $this->icards);
			$this->CI->load->view('my_pages/user_action_menu',  $this->icards);
			$this->CI->load->view('my_pages/data_entry_manual',  $this->icards);
			$this->CI->load->view('my_pages/user_pages_footer',  $this->icards);
			//$this->CI->load->view('layout/front/main_content', $data);
			//$this->CI->load->view('layout/front/footer',  $this->icards);

	}
	public function buy_lace() {

        $this->icards['total_records'] = '';
        $this->icards['total_pages'] = '';
		$this->icards['model']['new'] = base64_encode(0);
		$this->icards['rows'] = array();
		$this->icards['school_templates'] = array();
		$this->icards['profile'] = $this->session->userdata['loggedin'];
		//echo "<pre>";print_r($this->icards['profile'] ); exit;
		$this->icards['profile']['department_name'] = $this->icards['departments'][$this->icards['profile']['department_id']];

		$rand = rand(500, 10000);
		$this->CI->load->view('layout/front/header',  $this->icards);
		$this->CI->load->view('layout/front/main_menu',  $this->icards);
		$this->icards['title'] = 'MY DATA';
		$this->icards['sub_title'] = 'ACTION';
		$this->icards['last_node'] = 'MANUAL DATA ENTRY';
		// getting created template
		$this->CI->load->model('customer_templates_model');
		$this->CI->customer_templates_model->ci_where = array();
		$this->CI->customer_templates_model->ci_where['customers_id'] = $this->icards['profile']['customer_id'];
		$this->CI->customer_templates_model->ci_where['template_type'] = '1';
		$rows = $this->CI->customer_templates_model->getAll();
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
		$this->icards['my_templates'] = $my_templates;
			
			$this->CI->load->view('my_pages/user_pages_header',  $this->icards);
			$this->CI->load->view('my_pages/user_menu',  $this->icards);
			$this->CI->load->view('my_pages/user_action_menu',  $this->icards);
			$this->CI->load->view('my_pages/buy_lace',  $this->icards);
			$this->CI->load->view('my_pages/user_pages_footer',  $this->icards);
			//$this->CI->load->view('layout/front/main_content', $data);
			//$this->CI->load->view('layout/front/footer',  $this->icards);

	}

	public function download_sheet() {
		$template_id = ( isset($this->request['check_template_id']))? $this->request['check_template_id'] : 0;
		$this->icards['total_records'] = '';
        $this->icards['total_pages'] = '';
		$this->icards['model']['new'] = base64_encode(0);
		$this->icards['rows'] = array();
		$this->icards['school_templates'] = array();
		$this->icards['profile'] = $this->session->userdata['loggedin'];
		//echo "<pre>";print_r($this->icards['profile'] ); exit;
		$this->icards['profile']['department_name'] = $this->icards['departments'][$this->icards['profile']['department_id']];
		$template_status = 0; // to be updated in customer_templates table  when downloaded template by customer to fill data and upload for the selected template
		if($template_id > 0 ){
			$user_template_id = ( isset($this->request['user_template_id']))? $this->request['user_template_id'] : $template_id ;
			$this->CI->load->model('customer_templates_model');
			$this->CI->customer_templates_model->ci_where = array();
			$this->CI->customer_templates_model->ci_where['customers_id'] = $this->icards['profile']['customer_id'];
			$this->CI->customer_templates_model->ci_where['id'] = $template_id;
			$rows = $this->CI->customer_templates_model->getAll();
			
			
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
		$task = (isset($this->request['task'])) ?  $this->request['task'] : '';

		$customer_name = (isset($this->icards['profile']['customer_name'])) ?  $this->icards['profile']['customer_name'] : 'sample-sheet';
		
		if($task == 'download_sheet'){
			$template_status = (int) $template_status;
			$new_status = $template_status + 1;
			$data = array('status'=> $new_status);
			$this->CI->load->model('customer_templates_model');
			$this->CI->customer_templates_model->ci_where = array();
			$this->CI->customer_templates_model->save_record($template_id, $data);
			$this->CI->load->library('excel_writer');
			$filename = strtolower($customer_name).rand(5000,10000).".xls";
			$this->excel_writer->downloadSheet( $filename, $filtered, $user_template_id);
		}

	}
	public function order_process() {

	    $this->icards['rows'] = array();
	    $this->icards['school_templates'] = array();
	    $this->icards['profile'] = $this->session->userdata['loggedin'];

	    $this->icards['profile']['department_name'] = $this->icards['departments'][$this->icards['profile']['department_id']];
	    if(is_array($this->icards['profile'])){
	        $id = 1; //base64_decode($this->request['id']);
	        $this->CI->load->model('customers_model');
	        $customer = $this->CI->customers_model->getById($this->icards['profile']['customer_id']);
	        $this->icards['profile']['customer_name'] = $customer['customer_name'];
	        $this->icards['profile']['registration_no'] = $customer['registration_no'];
	        $this->icards['profile']['email'] = $customer['email'];
	        $this->icards['profile']['website'] = $customer['website'];

	        // getting created template
	        $this->CI->load->model('customer_templates_model');
	       // $this->CI->customer_templates_model->ci_where = array();
	        $row = $this->CI->customer_templates_model->getById($id);
	        $this->icards['my_template'] = $row;



	    }

	    $this->icards['title'] = 'MY TEMPLATES';
	    $this->icards['sub_title'] = 'CREATED TEMPLATE';
	    if(isset($this->request['view_page']) && $this->request['view_page'] == 'a4'){
	        $this->icards['photos'] = $this->getAllPhotos($this->icards['profile']['customer_id']);
	        $this->icards['completed'] = $this->getAllFilledStudents($this->icards['profile']['customer_id']);
	        $this->CI->load->view('schools/popup_window',  $this->icards);
	    }else{
			$this->CI->load->view('layout/front/header',  $this->icards);
			$this->CI->load->view('layout/front/main_menu',  $this->icards);
			$this->icards['completed'] = $this->getAllFilledStudents($this->icards['profile']['customer_id']);
			$this->CI->load->view('my_pages/user_pages_header',  $this->icards);
			$this->CI->load->view('my_pages/user_menu',  $this->icards);
			$this->CI->load->view('my_pages/order_process',  $this->icards);
			$this->CI->load->view('my_pages/user_pages_footer',  $this->icards);
			//$this->CI->load->view('layout/front/main_content', $data);
			$this->CI->load->view('layout/front/footer',  $this->icards);

	    }
	}

	public function ordered_templates() {

		$this->icards['rows'] = array();
		$this->icards['school_templates'] = array();
		$this->icards['profile'] = $this->session->userdata['loggedin'];

		$this->icards['profile']['department_name'] = $this->icards['departments'][$this->icards['profile']['department_id']];
		if(is_array($this->icards['profile'])){
			$this->CI->load->model('customers_model');
			$customer = $this->CI->customers_model->getById($this->icards['profile']['customer_id']);
			$this->icards['profile']['customer_name'] = $customer['customer_name'];
			$this->icards['profile']['registration_no'] = $customer['registration_no'];
			$this->icards['profile']['email'] = $customer['email'];
			$this->icards['profile']['website'] = $customer['website'];

			// getting created template
			$this->CI->load->model('customer_templates_model');
			$this->CI->customer_templates_model->ci_where = array();
			$this->CI->customer_templates_model->ci_where['customers_id'] = $this->icards['profile']['customer_id'];
			$this->CI->customer_templates_model->ci_where['template_type'] = '1';
			$rows = $this->CI->customer_templates_model->getAll(null, null, array('sort_by' => 'customer_templates.id', 'order_type' =>'DESC' ));
			$this->icards['my_templates'] = $rows;


		}

		$this->icards['title'] = 'MY TEMPLATES';
		$this->icards['sub_title'] = 'CREATED TEMPLATE';
		if(isset($this->request['view_page']) && $this->request['view_page'] == 'a4'){
			$this->icards['photos'] = $this->getAllPhotos($this->icards['profile']['customer_id']);
			$this->icards['completed'] = $this->getAllFilledStudents($this->icards['profile']['customer_id']);
			$this->CI->load->view('schools/popup_window',  $this->icards);
		}else{
			$this->CI->load->view('layout/front/header',  $this->icards);
			$this->CI->load->view('layout/front/main_menu',  $this->icards);
			$this->icards['title'] = 'Multjivan Pixels My Account';
			$this->icards['sub_title'] = 'My Templates';
			$this->icards['last_node'] = 'All Templates';
			// getting created template
			$this->icards['completed'] = $this->getAllFilledStudents($this->icards['profile']['customer_id']);
			$this->CI->load->view('my_pages/user_pages_header',  $this->icards);
			$this->CI->load->view('my_pages/user_menu',  $this->icards);
			$this->CI->load->view('my_pages/user_templates_menu',  $this->icards);
			$this->CI->load->view('my_pages/ordered_templates',  $this->icards);
			$this->CI->load->view('my_pages/user_pages_footer',  $this->icards);
		}
	}
	private function get_idcards($customer_id, $status, $templates_id, $template_unique_id ) {
		
	 }
	

}
