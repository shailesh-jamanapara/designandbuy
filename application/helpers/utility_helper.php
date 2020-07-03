<?php
ini_set('display_errors',1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');




/* * ********* URL for assets ************ */
if (!function_exists('asset_url()')) {

    function asset_url() {
        return base_url() . 'assets/';
    }

}


/* * ********* URL for vendors- all plugin library ************ */
if (!function_exists('vendor_url()')) {

    function vendor_url() {
        return base_url() . 'vendors/';
    }

}


/* * ************* is_loggedin function is for check if session is set or not ************** */
if (!function_exists('is_loggedin()')) {

    function is_loggedin() {
        $CI = & get_instance();  //get instance, access the CI superobject
        $isLoggedIn = $CI->session->userdata('loggedin');
        if ($isLoggedIn) {
            return TRUE;
        }
        redirect('Login');
    }

}


/* * *********** Print Menu list to page ************* */
if (!function_exists('print_menu()')) {

    function print_menu($roles_aacesses) {
		//echo "<pre style='display:none;'>";
		//echo "<pre >";
		//print_r($roles_aacesses);
		//echo "</pre>";
		//exit;
		
        $ci = & get_instance();
		$LoggedIn = $ci->session->userdata('loggedin');
		$ci->load->model('system_menus_model');
		$ci->system_menus_model->fields['roles_aacesses_id'] = 'roles_accesses.id as roles_aacesses_id';
		$ci->system_menus_model->joins[] = array('roles_accesses', '`roles_accesses`.`system_module_id` = system_menus.system_module_id AND `roles_accesses`.`role_id` = '.$LoggedIn['role_id'] , 'left' );
		$ci->system_menus_model->ci_where['system_menus.status'] = '1';
		$menus = $ci->system_menus_model->getAll(null,null,array('sort_by'=>'show_after','order_type'=>'asc'));
		//echo "<pre >";
		//print_r($menus);
		//echo "</pre>";
		//exit;
		$menu_items = '';
		if (count($menus) == 0 ) {
            //if (check_privilege($role_id, $parent_id, 'Pri_View')) {
				if(isset($menu_url) && isset( $menu_name ))
					$menu_items = '<li><a href="' . base_url() . '/' . $menu_url . '"><i class="fa fa-desktop"></i> ' . $menu_name . '</a></li>';
            //}
        } else if ( count($menus) > 0 ) {
				$parent_id = false;
				$menu_id = null;
				$i = 1;
				foreach ($menus as $menu) {
					
                    //if (check_privilege($role_id, $sub_menu->id, 'Pri_View')) {
                        if ($menu['parent_id'] == 0) {
								if(isset($menu_id) &&  $menu['id'] != $menu_id ){
									$menu_items .=  "</ul>";	
									$menu_items .=  "</li>";
									unset($menu_id);
								}
								$display = ( isset($roles_aacesses[$menu['roles_aacesses_id']]) && ( $roles_aacesses[$menu['roles_aacesses_id']]['view_entity'] == 1 || $roles_aacesses[$menu['roles_aacesses_id']]['full_control'] == 1))?'style="display:block"':'style="display:none"';
								$display  = ($menu['is_custom'] == 1) ? 'style="display:block"': $display;
								$menu_items .= '<li '.$display.' class="treeview" id="'.str_replace(' ','', strtolower($menu['system_menu_name'])).'" >';
								$menu_items .=  '<a href="javascript:void(0);"><i class="'.$menu['menu_icon'].'"></i> ' .$menu['system_menu_name'] . '  <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>';
								$menu_items .=  '<ul class="treeview-menu">';
								$is_parent = true;
								$menu_id = $menu['id'];
                        }
						if($menu['parent_id'] != 0){
							if($menu['is_custom'] == 1){
								$menu_url = $menu['menu_custom_link'];
								$menu_items .=  '<li title="'.$menu['system_module_id'].'><a href="'.$menu_url.'">'.$menu['system_menu_name'] . '</a></li>';
							}
							if( $menu['is_custom'] == 0 ){
								$menu_url  = (isset($menu['module_sub_action']) && $menu['module_sub_action'] != '' ) ? $menu['module_controller']."/".$menu['module_action']."/". $menu['module_sub_action'] : $menu['module_controller']."/".$menu['module_action'] ;
								
								
								if(strpos($menu_url, 'roles_accesses') !== false){
									//$menu_url = '--';
									$arr = explode('/',$menu_url);
									$arr = array_reverse($arr);
									if ( strpos($arr[0], '=') !== false){
										
										$split = explode("=", $arr[0]);
										$split = array_reverse($split);
										$role_id = $split[1]."=".$split[0];
										$arr[0] = $role_id;
									}
									$arr =  array_reverse($arr);
									$menu_url = implode("/", $arr);
									//$menu_url = '--';
								}
								$action = ( isset($menu['module_sub_action']) &&  $menu['module_sub_action'] != '') ?  $menu['module_controller']."_".$menu['module_action']."_".$menu['module_sub_action'] : $menu['module_controller']."_".$menu['module_action'];
								
								if( isset($roles_aacesses[$menu['roles_aacesses_id']]) && ( $roles_aacesses[$menu['roles_aacesses_id']]['view_entity'] == 1 || $roles_aacesses[$menu['roles_aacesses_id']]['full_control'] == 1)){
									$menu_items .=  '<li title="'.$menu['system_menu_name'].'" > <a href="'. base_url().$menu_url.'">'.$menu['system_menu_name'] . '</a></li>';
								}
							}
								
						}
						if($i == count($menus )){
							$menu_items .=  "</ul>";	
							$menu_items .=  "</li>";
						}
					$i++;	
				    //}
                }
        }
		echo $menu_items;
    }

}
if (!function_exists('print_child_menu()')) {
	function print_child_menu($parent_id){
		$ci = & get_instance();
		$LoggedIn = $ci->session->userdata('loggedin');
		$ci->load->model('system_menus_model');
		$ci->system_menus_model->table_properties['join_tables'][] = array('roles_accesses', '`roles_accesses`.`system_module_id` = system_menus.system_module_id AND `roles_accesses`.`role_id` = '.$LoggedIn['role_id'] , 'left' );
		$ci->system_menus_model->ci_where[0] = "system_menus.status ='1' AND system_menus.parent_id='".$parent_id."' ";
		$ci->system_menus_model->table_properties['cross_fields']['roles_aacesses_id']= array(
					 'caption' => array('roles_aacesses_id', 'roles_aacesses_id', 'roles_aacesses_id'),		
					 'type'=>'int',
					 'len' => 5,
					'value' => null,
					'in_select' => 1,
					'in_insert' => 0,
					'modified' => ' roles_accesses.id as roles_aacesses_id');
		$menus = $ci->system_menus_model->getAll();
		//echo "<pre >";
		//print_r($menus);
		//echo "</pre>";
		//exit;
	}
}
if (!function_exists('check_privilege()')) {

    function check_privilege($Role_ID, $Menu_ID, $Pri_For) {
		return true;
		/*
        $privilege = get_privileges($Role_ID);

        if (count($privilege[$Pri_For]) != 0) {
            if (in_array($Menu_ID, $privilege[$Pri_For])) {
                return true;
            }
        }
        return false;
		*/
    }

}

if (!function_exists('get_privileges()')) {

    function get_privileges($Role_ID) {
        $ci = & get_instance();
        $ci->load->database();
        $privilege = $ci->db->ci_where(array('Role_ID' => $Role_ID))->get('privileges')->result();
        /*echo '<pre>';
        print_r($privilege);*/
        if (count($privilege) != 0) {
            $privileges['Pri_View'] = json_decode($privilege[0]->Pri_View, true);
            $privileges['Pri_Add'] = json_decode($privilege[0]->Pri_Add, true);
            $privileges['Pri_Edit'] = json_decode($privilege[0]->Pri_Edit, true);
            $privileges['Pri_Delete'] = json_decode($privilege[0]->Pri_Delete, true);
        }
        $privileges['Pri_View'][] = -1;
        $privileges['Pri_Add'][] = -1;
        $privileges['Pri_Edit'][] = -1;
        $privileges['Pri_Delete'][] = -1;

        /*echo '<pre>';
        print_r($privileges);
        exit;*/
        return $privileges;
    }

}
if (!function_exists('print_search_form()')) {
	function print_search_form($search, $postdata, $listpage_url){
		$html = '';
		$_opts = '';
		if ( count($search) > 0 ){
			$onchange = "$('#page').val(1); this.form.submit();";
			
			$html .= '<input type="hidden" name="task" id="task" value="" />';
			$html .= '<input type="hidden" name="user_type" id="user_type" value="employee" />';
			$html .= '<input type="hidden" name="id" id="id" value="" />';
			$html .= '<input type="hidden" name="page" id="page" value="'.$postdata['page'].'" />';
			$html .= '<input type="hidden" name="sort_by" id="sort_by" value="'.$postdata['sort_by'].'" />';
			$html .= '<input type="hidden" name="order_type" id="order_type" value="'. $postdata['order_type'].'" />';
			$html .= '<input type="hidden" name="listpage_url" id="listpage_url" value="'. $listpage_url.'" />';
			$view_type = (isset($postdata['view_type'])) ? $postdata['view_type'] : 'list';
				$html .= '<input type="hidden" name="view_type" id="view_type" value="'. $view_type.'" />';
		
			$html .= '<div id="external_filter_container">';
			$html .= '<div class="panel panel-default">';
				$toggle = "$('div.panel-body').toggle('5000');";
				$html .= '<div class="panel-heading" onclick="'.$toggle.'">';
					$html .= '<h3 class="panel-title"><i class="fa fa-filter"></i> <a class=" pull-right"></a> </h3>';
			  $html .= '</div>';
			  $html .= '<div class="panel-body">';
				$html .= '<div class="row">';
						$html .= '<div class="col-lg-4 col-sm-3" style="margin-top: 5px;">';
						$html .= '<div class="form-group">';
							$html .= '<label class="col-lg-4" for="search_by" id="lbl_search_by">Search By</label>';
							$html .= '<div class="col-lg-8 col-sm-4">';
								$_opts .='<select class="form-control " id="search_by" name="search_by" >';
									$_opts .='<option value="">Please select </option>';
											 foreach ( $search as $key => $value ) {
												 $selected = ( $postdata['search_by'] == $key) ? ' selected="selected"' : '' ;
											  $_opts .='<option value="'.$key.'" '.$selected.' >'.$value.'</option>';
											 }
								$_opts .='</select>';
								
							$html .= $_opts;
							$html .='</div>';							
							$html .='</div>';
						$html .='</div>';
							$html .='<div class="col-lg-4 col-sm-2" style="margin-top: 5px;">';
							  $html .='<div class="">';
								$html .='<div class="search_box">';
									$html .='<label class="col-lg-4" for="search_for" id="lbl_search_for" class="search-for">Search For</label>';
										$html .='<div class="col-lg-8 col-sm-4" id="div_search_for">';
											$is_active = ($postdata['search_for'] == 1)? 'selected="selected" ': '' ;
											$is_inactive = ($postdata['search_for'] == 0)? 'selected="selected" ': '' ;
											$html .='<select class="form-control pull-right" id="search_for_status" name="search_for" disabled="disabled" style="display:none;"  >';
												$html .='<option value="1" '. $is_active.' >Active</option>';
												$html .='<option value="0" '. $is_inactive.' >Inactive</option>';
											$html .='</select>';		
											$html .='<input type="text" class="form-control" name="search_for" id="search_for_text" placeholder="Search Keyword" value="'. $postdata['search_for'].'"  >';
											$html .='<input type="text" class="date-picker form-control" name="search_for" disabled="disabled" style="display:none;" id="search_for_date" placeholder="mm/dd/yyyy" value="'.$postdata['search_for'].'"  ><span class="fa fa-calendar form-control-feedback right" aria-hidden="true"  style="display:none;"></span>';
										$html .='</div>';
									$html .='</div>';
							  $html .='</div>';
							$html .='</div>';
							$html .='<div class="col-lg-2 ">';
							  $html .='<div class="input-group">';
								//$html .='<div class=" form-group search_box">';
									//$html .='<span class="input-group-btn">';
									$html .='<button class="btn bg-orange btn-flat margin" name="search_data_by_select" id="search_data_by_select" type="submit" >Go</button>';
									$html .='<button title="Reset Filter"class="btn bg-orange btn-flat margin resetfilter" id="configreset" type="submit"  name="reset"  value="reset">Reset</button>';
									//$html .='</span>';
							  //$html .='</div>';
							$html .='</div>';
							$html .='</div>';
							$html .='<div class="col-lg-2 col-sm-1 pull-right" style="margin-top: 5px;">';
									 $html .=' <div class="form-group">';
										$html .='<label class="col-lg-4" for="pagelimit" id="lbl_pagelimit" >Show</label>';
											$html .= '<div class="col-lg-8 col-sm-4">';
												
												$html .='<select class="form-control pull-right" id="limit" name="limit" onchange="'.$onchange.'">';
													$html .='<option value="10" '.get_selected($postdata['limit'], 10).' >10</option>';
													$html .='<option value="20" '.get_selected($postdata['limit'], 20).' >20</option>';
													$html .='<option value="30" '.get_selected($postdata['limit'], 30).' >30</option>';
													$html .='<option value="50" '.get_selected($postdata['limit'], 50).' >50</option>';
													$html .='<option value="100" '.get_selected($postdata['limit'], 100).' >100</option>';
												$html .='</select>';
										$html .='</div>';
									$html .='</div>';
								$html .='</div>';
							$html .='</div>';
							$html .='<div class="col-lg-8">';
								$html .='<div class="row" id="div_dates" style="display:none;" >';
									$html .='<label class="col-lg-2" for="search_by">From</label>';
									$html .='<div class="col-lg-4">';
									$from = ( isset($postdata['search_for']) && isset($postdata['search_for']['from'])&& $postdata['search_for']['from'] != '') ? $postdata['search_for']['from'] : '';
									$to = (isset($postdata['search_for']) && isset($postdata['search_for']['to']) && $postdata['search_for']['to'] != '') ? $postdata['search_for']['to'] : '';
										$html .='<input type="text" class="form-control date-picker form-control" name="search_for[from]" disabled="disabled" style="display:none;" id="search_from_date" placeholder="mm/dd/yyyy" value="'.$from.'"  ><span class="fa fa-calendar form-control-feedback right" aria-hidden="true"  style="display:none;"></span>';
									$html .='</div>';
									$html .='<label class="col-lg-2" for="search_by">To</label>';
									$html .='<div class="col-lg-4">';
										$html .='<input type="text" class="form-control date-picker form-control" name="search_for[to]" disabled="disabled" style="display:none;" id="search_to_date" placeholder="mm/dd/yyyy" value="'.$to.'"  ><span class="fa fa-calendar form-control-feedback right" aria-hidden="true"  style="display:none;"></span>';
									$html .='</div>';
								$html .='</div>';
							$html .='</div>';
							$html .='</div>';
						$html .='</div>';
						$html .='<div class="col-lg-12 text-center btn btn-warning" id="alert_div" style="display:none">';
							$html .='<input type="hidden" name="last_id" id="last_id"  value="">';
							$html .='<input type="hidden" name="row_id" id="row_id"  value="">';
							$html .='<i class="fa fa-warning"></i> Record Deleted. Click <i class="fa fa-undo" onclick="javascript:undo_last_action();"> here </i> to undo last action';
						$html .=' <i id="i_alert_div" class="fa fa-close pull-right" onclick="javascript:closeDiv(0)" ></i></div>';
						$html .='<div class="col-lg-12 text-center btn btn-success" id="success_div"  style="display:none">';
							$html .='Last deleted record restored successfully';
						$html .='<i id="i_success_div" class="fa fa-close pull-right" onclick="javascript:closeDiv(1)" ></i></div>';		
					$html .='</div>';	
		}
		return 	$html;	
	}
}
if (!function_exists('print_search_form_front()')) {
	function print_search_form_front($search, $postdata, $listpage_url){
		$html = '';
		$_opts = '';
		if ( count($search) > 0 ){
			$onchange = "$('#page').val(1); this.form.submit();";
			
			$html .= '<input type="hidden" name="task" id="task" value="" />';
			$html .= '<input type="hidden" name="user_type" id="user_type" value="employee" />';
			$html .= '<input type="hidden" name="id" id="id" value="" />';
			$html .= '<input type="hidden" name="page" id="page" value="'.$postdata['page'].'" />';
			$html .= '<input type="hidden" name="sort_by" id="sort_by" value="'.$postdata['sort_by'].'" />';
			$html .= '<input type="hidden" name="order_type" id="order_type" value="'. $postdata['order_type'].'" />';
			$html .= '<input type="hidden" name="listpage_url" id="listpage_url" value="'. $listpage_url.'" />';
			$view_type = (isset($postdata['view_type'])) ? $postdata['view_type'] : 'list';
				$html .= '<input type="hidden" name="view_type" id="view_type" value="'. $view_type.'" />';
		
			$html .= '<div id="external_filter_container">';
			$html .= '<div class="panel panel-default">';
				$toggle = "$('div.panel-body').toggle('5000');";
				$html .= '<div class="panel-heading" onclick="'.$toggle.'">';
					$html .= '<h3 class="panel-title"><i class="fa fa-filter"></i> <a class=" pull-right"></a> </h3>';
			  $html .= '</div>';
			  $html .= '<div class="panel-body">';
				$html .= '<div class="row">';
						$html .= '<div class="col-lg-4 col-sm-3" style="margin-top: 5px;">';
						$html .= '<div class="form-group">';
							$html .= '<label class="col-lg-4" for="search_by" id="lbl_search_by">Search by</label>';
							$html .= '<div class="col-lg-8 col-sm-4">';
								$_opts .='<select class="form-control form-control-sm " id="search_by" name="search_by" >';
									$_opts .='<option value="">Please select </option>';
											 foreach ( $search as $key => $value ) {
												 $selected = ( $postdata['search_by'] == $key) ? ' selected="selected"' : '' ;
											  $_opts .='<option value="'.$key.'" '.$selected.' >'.$value.'</option>';
											 }
								$_opts .='</select>';
								
							$html .= $_opts;
							$html .='</div>';							
							$html .='</div>';
						$html .='</div>';
							$html .='<div class="col-lg-4 col-sm-2" style="margin-top: 5px;">';
							  $html .='<div class="">';
								$html .='<div class="search_box">';
									$html .='<label class="col-lg-4" for="search_for" id="lbl_search_for" class="search-for">Search for</label>';
										$html .='<div class="col-lg-8 col-sm-4" id="div_search_for">';
											$is_active = ($postdata['search_for'] == 1)? 'selected="selected" ': '' ;
											$is_inactive = ($postdata['search_for'] == 0)? 'selected="selected" ': '' ;
											$html .='<select class="form-control form-control-sm pull-right" id="search_for_status" name="search_for" disabled="disabled" style="display:none;"  >';
												$html .='<option value="1" '. $is_active.' >Active</option>';
												$html .='<option value="0" '. $is_inactive.' >Inactive</option>';
											$html .='</select>';		
											$html .='<input type="text" class="form-control form-control-sm" name="search_for" id="search_for_text" placeholder="Search Keyword" value="'. $postdata['search_for'].'"  >';
											$html .='<input type="text" class="date-picker form-control-sm" name="search_for" disabled="disabled" style="display:none;" id="search_for_date" placeholder="mm/dd/yyyy" value="'.$postdata['search_for'].'"  ><span class="fa fa-calendar form-control-feedback right" aria-hidden="true"  style="display:none;"></span>';
										$html .='</div>';
									$html .='</div>';
							  $html .='</div>';
							$html .='</div>';
							$html .='<div class="col-lg-2 ">';
							  $html .='<div class="input-group mt-4">';
								//$html .='<div class=" form-group search_box">';
									//$html .='<span class="input-group-btn">';
									$html .='<button class="btn bg-orange btn-flat mr-2" name="search_data_by_select" id="search_data_by_select" type="submit" >Go</button>';
									$html .='<button title="Reset Filter"class="btn bg-orange btn-flat margin resetfilter" id="configreset" type="submit"  name="reset"  value="reset">Reset</button>';
									//$html .='</span>';
							  //$html .='</div>';
							$html .='</div>';
							$html .='</div>';
							$html .='<div class="col-lg-2 col-sm-1 pull-right" style="margin-top: 5px;">';
									 $html .=' <div class="form-group">';
										$html .='<label class="col-lg-4" for="pagelimit" id="lbl_pagelimit" >Show</label>';
											$html .= '<div class="col-lg-8 col-sm-4">';
												
												$html .='<select class="form-control form-control-sm pull-right" id="limit" name="limit" onchange="'.$onchange.'">';
													$html .='<option value="10" '.get_selected($postdata['limit'], 10).' >10</option>';
													$html .='<option value="20" '.get_selected($postdata['limit'], 20).' >20</option>';
													$html .='<option value="30" '.get_selected($postdata['limit'], 30).' >30</option>';
													$html .='<option value="50" '.get_selected($postdata['limit'], 50).' >50</option>';
													$html .='<option value="100" '.get_selected($postdata['limit'], 100).' >100</option>';
												$html .='</select>';
										$html .='</div>';
									$html .='</div>';
								$html .='</div>';
							$html .='</div>';
							$html .='<div class="col-lg-8">';
								$html .='<div class="row" id="div_dates" style="display:none;" >';
									$html .='<label class="col-lg-2" for="search_by">From</label>';
									$html .='<div class="col-lg-4">';
									$from = ( isset($postdata['search_for']) && isset($postdata['search_for']['from'])&& $postdata['search_for']['from'] != '') ? $postdata['search_for']['from'] : '';
									$to = (isset($postdata['search_for']) && isset($postdata['search_for']['to']) && $postdata['search_for']['to'] != '') ? $postdata['search_for']['to'] : '';
										$html .='<input type="text" class="form-control-sm date-picker form-control" name="search_for[from]" disabled="disabled" style="display:none;" id="search_from_date" placeholder="mm/dd/yyyy" value="'.$from.'"  ><span class="fa fa-calendar form-control-feedback right" aria-hidden="true"  style="display:none;"></span>';
									$html .='</div>';
									$html .='<label class="col-lg-2" for="search_by">To</label>';
									$html .='<div class="col-lg-4">';
										$html .='<input type="text" class="form-control-sm date-picker form-control" name="search_for[to]" disabled="disabled" style="display:none;" id="search_to_date" placeholder="mm/dd/yyyy" value="'.$to.'"  ><span class="fa fa-calendar form-control-feedback right" aria-hidden="true"  style="display:none;"></span>';
									$html .='</div>';
								$html .='</div>';
							$html .='</div>';
							$html .='</div>';
						$html .='</div>';
						$html .='<div class="col-lg-12 text-center btn btn-warning" id="alert_div" style="display:none">';
							$html .='<input type="hidden" name="last_id" id="last_id"  value="">';
							$html .='<input type="hidden" name="row_id" id="row_id"  value="">';
							$html .='<i class="fa fa-warning"></i> Record Deleted. Click <i class="fa fa-undo" onclick="javascript:undo_last_action();"> here </i> to undo last action';
						$html .=' <i id="i_alert_div" class="fa fa-close pull-right" onclick="javascript:closeDiv(0)" ></i></div>';
						$html .='<div class="col-lg-12 text-center btn btn-success" id="success_div"  style="display:none">';
							$html .='Last deleted record restored successfully';
						$html .='<i id="i_success_div" class="fa fa-close pull-right" onclick="javascript:closeDiv(1)" ></i></div>';		
					$html .='</div>';	
		}
		return 	$html;	
	}
}
if (!function_exists('get_selected()')) {
	function get_selected($val, $match){
		$_first_opt = (isset($match) && $match == $val)? 'selected="selected"' : '';
		return $_first_opt;
	}
}
if (!function_exists('pr()')) {
	function pr($arr){
		echo "<pre>";
		print_r($arr);
		echo "</pre>";
		exit;
	}
}
if (!function_exists('login_username()')) {
	function login_username(){
		
		 $CI = & get_instance();  //get instance, access the CI superobject
		 $isLoggedIn = $CI->session->userdata('loggedin');
		return  $CI->session->userdata['loggedin']['first_name'];

	}
}

if (!function_exists('get_user_id()')) {
	function get_user_id(){
		
		 $CI = & get_instance();  //get instance, access the CI superobject
		 if($CI->session->userdata('loggedin')){
			return base64_encode($CI->session->userdata['loggedin']['id']);
		 }else{
			 return false;
		 }

	}
}
if (!function_exists('get_user_role()')) {
	function get_user_role(){
		
		 $CI = & get_instance();  //get instance, access the CI superobject
		 if($CI->session->userdata('loggedin')){
			return base64_encode($CI->session->userdata['loggedin']['role_id']);
		 }else{
			 return false;
		 }

	}
}
if (!function_exists('ajax_url()')) {
	function ajax_url(){
		return base_url().'/Ajax';
	}
}
if (!function_exists('print_pagination_front()')) {
	function print_pagination_front($recs, $pages, $page_no, $limit, $entity = ''){
		$html = '';
		$from = 1;
		$to = $limit;
		if($page_no > 1){
			$from = (($page_no-1) * $limit ) + 1;
			
			$to = ($from - 1) + $limit;	
			$to = ($recs < $to) ? $recs : $to;
		}
		if($pages == 1){
			$to = $recs;
		}		
		$entities = ($entity != '') ? $entity : 'entries' ; 
		$html .= '<div class="row" id="div_pagination">';
			$html .= '<div class="col-lg-4 show-count">';
					$html .= '<span>';
						$html .= 'Showing '.$from.' to '.$to.' of '.$recs.' entries';
					$html .= '</span>';
			$html .= '</div>';
			$html .= '<div class="col-lg-8 text-right">';
				$html .= '<ul class="pagination pull-right">';
				if($page_no > 1  ){
					$onchange = "gotopage('".( $page_no-1)."')";	
					$html .= '<li  onclick="'.$onchange.'" class="btn btn-white btn-rounded text-primary btn-shadow-lg pull-right mr-2 pl-2 pr-2 bg-hover-secondary previous" id="datatable-checkbox_previous">Previous</li>';
				}
				for($i=1; $i<=$pages;$i++ ){
					//$onchange = "this.form.submit();";
					if($page_no == $i ){
						
						$html .= '<li class="btn btn-white btn-rounded text-primary btn-shadow-lg pull-right mr-2 pl-2 pr-2 bg-hover-secondary active">&nbsp;'.$i.'&nbsp;</li>';
					}
					if($page_no != $i ){
						$onchange = "gotopage('".( $i)."')";	
						$html .= '<li class="btn btn-white btn-rounded text-primary btn-shadow-lg pull-right mr-2 pl-2 pr-2 bg-hover-secondary" onclick="'.$onchange.'">&nbsp;'.$i.'&nbsp;</li>';
					}
				}
				
				//$onchange = "this.form.submit();";
				if( $recs > $limit && $page_no < $pages ){	
				$onchange = "gotopage('".( $page_no+1)."')";	
					$html .= '<li class="btn btn-white btn-rounded text-primary btn-shadow-lg pull-right mr-2 pl-2 pr-2 bg-hover-secondary next"  onclick="'.$onchange.'" id="datatable-checkbox_next">Next</li>';
				}
				$html .= '</ul>';
			$html .= '</div>';
		$html .= '</div>';
	  return $html ;
	}
}
if (!function_exists('print_pagination()')) {
	function print_pagination($recs, $pages, $page_no, $limit, $entity = ''){
		$html = '';
		$from = 1;
		$to = $limit;
		if($page_no > 1){
			$from = (($page_no-1) * $limit ) + 1;
			
			$to = ($from - 1) + $limit;	
			$to = ($recs < $to) ? $recs : $to;
		}
		if($pages == 1){
			$to = $recs;
		}		
		$entities = ($entity != '') ? $entity : 'entries' ; 
		$html .= '<div class="row" id="div_pagination">';
			$html .= '<div class="col-lg-4 show-count">';
					$html .= '<span>';
						$html .= 'Showing '.$from.' to '.$to.' of '.$recs.' entries';
					$html .= '</span>';
			$html .= '</div>';
			$html .= '<div class="col-lg-8 text-right">';
				$html .= '<ul class="pagination pull-right">';
				if($page_no > 1  ){
					$onchange = "gotopage('".( $page_no-1)."')";	
					$html .= '<li  onclick="'.$onchange.'" class="paginate_button previous" id="datatable-checkbox_previous"><a href="#" aria-controls="datatable-checkbox" data-dt-idx="0" tabindex="0">Previous</a></li>';
				}
				for($i=1; $i<=$pages;$i++ ){
					//$onchange = "this.form.submit();";
					if($page_no == $i ){
						
						$html .= '<li class="paginate_button active"><a href="javascript:void(0);" aria-controls="datatable-checkbox"  tabindex="0">'.$i.'</a></li>';
					}
					if($page_no != $i ){
						$onchange = "gotopage('".( $i)."')";	
						$html .= '<li class="paginate_button" onclick="'.$onchange.'"><a href="javascript:void(0);"  aria-controls="datatable-checkbox" data-dt-idx="1" tabindex="0">'.$i.'</a></li>';
					}
				}
				
				//$onchange = "this.form.submit();";
				if( $recs > $limit && $page_no < $pages ){	
				$onchange = "gotopage('".( $page_no+1)."')";	
					$html .= '<li class="paginate_button next"  onclick="'.$onchange.'" id="datatable-checkbox_next"><a href="javascript:void(0);" aria-controls="datatable-checkbox" data-dt-idx="7" tabindex="0"  >Next</a></li>';
				}
				$html .= '</ul>';
			$html .= '</div>';
		$html .= '</div>';
	  return $html ;
	}
}
function get_profile_pic(){
	 $CI = & get_instance();  //get instance, access the CI superobject
	 $isLoggedIn = $CI->session->userdata('loggedin');
	 return $isLoggedIn['avatar'];
	
}
if (!function_exists('get_leave_applications()')) {
	function get_leave_applications(){
		$CI = & get_instance();  //get instance, access the CI superobject
		$isLoggedIn = $CI->session->userdata('loggedin');
		$CI->load->model('leave_actions_model');
		$CI->leave_actions_model->ci_where["leave_actions.user_role "] = $isLoggedIn['role_id'];	
		$CI->leave_actions_model->ci_where["leave_actions.user_id "] = $isLoggedIn['id'];	
		$CI->leave_actions_model->ci_or_where["leave_actions.status "] = '0';	
		$rows = $CI->leave_actions_model->getAll();	
		return count($rows);
	}
}
if (!function_exists('get_feedbacks()')) {
	function get_feedbacks(){
		$CI = & get_instance();  //get instance, access the CI superobject
		$CI->load->model('leave_applications_model');
		$CI->leave_applications_model->ci_where["leave_applications.status"] =  '0';
		$rows = $CI->leave_applications_model->getAll();
		return count($rows);
	}
}
if (!function_exists('get_cart_count()')) {
	function get_cart_count(){
		$cart_count = 0;
		$CI = & get_instance();  //get instance, access the CI superobject
		if($CI->session->userdata('cart_count')){
			$cart_count = $CI->session->userdata('cart_count');
		}
		return $cart_count;
	}
}
