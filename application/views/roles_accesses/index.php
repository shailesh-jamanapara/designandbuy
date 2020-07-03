<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- page content -->
	<div class="right_col" role="main">
	  <div class="">
		<div class="clearfix"></div>       
		<div class="row">
		  <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			    <div class="x_title">
				<h2>User Role Access Management For <strong> <?php echo $role['role_name']; ?> </strong></h2>
				<a class="pull-right" href="<?php echo base_url();?>index.php/Setups/index/all" ><button type="button" class="btn btn-primary"> Go Back</button></a>
				<div class="clearfix"></div>
			  </div>
			  <div class="x_content">
			 <form class="form-horizontal" name="frmsearch" id="frmsearch" method="post" action="" >	
				<div id="external_filter_container">
					<?php if(isset($role)){ ?>
						<div class="row">
							
						<?php if(isset($system_modules) && count($system_modules) > 0){ ?>
								<?php foreach($system_modules as $module ){ 
								?>
									<div class="btn btn-info col-lg-3" onclick="javascript:toggle_modal('<?php echo base64_encode($module['id']);?>','<?php echo base64_encode($role['id']);?>','<?php echo $module['system_module_name']; ?> Management','<?php echo $role['role_name']; ?>' );" >
										<h4 class=" text-left "> <?php echo $module['system_module_name']; ?> </h4>
									</div>
								<?php } ?>
						<?php } ?>
						</div>									
					<?php } ?>
					</div>
				</form>
			</div>
		  </div>
		</div>
	  </div>
	</div>
<!-- Starts Modal for Modules Sections Settings-->
<div class="modal" tabindex="-2" role="dialog" id="modal_access_control">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	<form class=" form-label-left" novalidate method="post" name="frm_role_accesses" action="" id="frm_role_accesses">
		<input type="hidden" name="task" id="task" value="save" />
		<input type="hidden" name="role_id" id="role_id"  />
		<input type="hidden" name="system_module" id="system_module"  />
	  <div class="modal-header">
		<h3 class="modal-title" id="modal_title_1"> </h3>
		<h4 class="modal-title" id="modal_title_2"> </h5>
		
	  </div>
	  <div class="modal-body" id="modal_body">
	  
	   </div>
	<div class="form-group row" id="action_buttons">
	</div>
	</div>
  </div>
</div>
<!-- /Modal for Modules Sections Settings-->
<!-- -->
<!-- /page content -->
<script>
$(document).ready(function() {
	$('#frmsearch').bootstrapValidator();
	//Edit Address and contact number detail
	if(document.getElementById('frm_roles_access_control')){
		$('#frm_roles_access_control').bootstrapValidator().on('success.form.bv', function(e) {
			// Prevent form submission
			e.preventDefault();
			var url ='';
			var $form = $(e.target);
			var bv = $form.data('bootstrapValidator');
			// Use Ajax to submit form data
			$.post(url, $form.serialize(), function(result) {
				var _html = set_access(result);
				if(_html != ''){
					$("#fs_contact_info").html(' ');
					$("#fs_contact_info").html(_html);
				}
				
			});
		});
	}
	
});

function toggle_modal(module_id, role_id, module_name, role_name){
		var url ='<?php echo $ajax_url_get_roles_accesses; ?>';
		// Use Ajax to submit form data
		$("#modal_title_1").html("Access Control for <b>"+role_name+" </b>");
		$("#modal_title_2").text("Module : "+module_name+" ");
		$.post(url, {module_id : module_id, role_id: role_id }, function(result) {
			var _html = '';
			$("form#frm_role_accesses #role_id").val(role_id);
			$("form#frm_role_accesses #system_module").val(module_id);
			
			
			var grids  = set_access_table(result);
			if( grids != ''){
				var lbl_a = ' <span class="span-lbl"> Add </span>';
				var lbl_e = '<span class="span-lbl"> Edit</span>';
				var lbl_d = '<span  class="span-lbl"> Delete</span>';
				var lbl_v = '<span  class="span-lbl"> View </span>';
				var lbl_max_a = '<span  class="span-lbl"> Max. Add </span>';
				var lbl_max_d = '<span  class="span-lbl"> Max. Del.</span>';
				var lbl_max_e = '<span  class="span-lbl"> Max. Edit </span>';
				var lbl_max_v =  '<span  class="span-lbl"> Max. view </span>';
				//var full_ctrl =  '&nbsp;&nbsp;&nbsp;<i class="fa fa-download" title="Can Download Document"></i> <span  class="span-lbl pull-right"> Full Control</span>';
				var full_ctrl =  '&nbsp;&nbsp;&nbsp;<span  class="span-lbl pull-right"> Full Control</span>';
				//console.log(_html);
				 _html = _html + '<div class="row heading">';
				 _html = _html + '<div class="col-lg-3 ">Section </div>';
				 _html = _html + '<div class="col-lg-3"> Custom Field </div>';
				 _html = _html + '<div class="col-lg-3"> Item <small>[ Can Add New,Edit or Delete ] </small></div>';
				// _html = _html + '<div class="col-lg-1"> Add Image </div>';
				 _html = _html + '<div class="col-lg-1"> Add Doc </div>';
				 _html = _html + '<div class="col-lg-1"> Full Control </div>';
				// _html =_html + '<div class="col-lg-1"> Export</div>';
				// _html =_html + '<div class="col-lg-1"> Import</div>';
				 _html = _html + '</div>';
				  _html = _html + '<div class="row ">';
				 _html = _html + '<div class="col-lg-3 "> </div>';
				 _html = _html + '<div class="col-lg-3">'+lbl_a+''+lbl_e+''+lbl_d+'</div>';
				 _html = _html + '<div class="col-lg-3">'+lbl_a+''+lbl_e+''+lbl_v+''+lbl_d+' </div>';
				// _html = _html + '<div class="col-lg-1"> Add Image </div>';
				 _html = _html + '<div class="col-lg-1"> '+lbl_a+'</div>';
				 _html = _html + '<div class="col-lg-1">'+full_ctrl+'</div>';
				// _html =_html + '<div class="col-lg-1"> Export</div>';
				// _html =_html + '<div class="col-lg-1"> Import</div>';
				 _html = _html + '</div>';
				 _html =  _html +grids ;
				 var _btns = '' ;
					_btns =  _btns +'<div class="col-lg-12">';
						_btns =  _btns +'<button type="submit"  class="btn btn-success  pull-right">Save</button>';	
						_btns =  _btns +'<button type="button" data-dismiss="modal" aria-label="Close" onclick="" class="btn btn-danger pull-right">Cancel</button>';
						
					_btns =  _btns +'</div>';				 
				 $('#action_buttons').html(_btns);
				
				 $("div#modal_body").html(_html);
			}
			
			
		});
		$("#modal_access_control").modal('toggle');
		/*	
		<div class="row-fluid">
			<div class="span2 offset1">Section Name</div>
			<div class="span2"></div>
			<div class="span2"></div>
			<div class="span2"></div>
			<div class="span2"></div>
		</div>
			<div class="row-fluid">
				<div class="span2 offset1"></div>
				<div class="span2"></div>
				<div class="span2"></div>
				<div class="span2"></div>
				<div class="span2"></div>
			</div>
		*/
		
}
function set_access_table(result){
	var obj = $.parseJSON(result);
	var is_checked = [];
	is_checked[0] = ' ';
	is_checked[1] = ' checked="checked" ';
	
	var can_edit = [];
	can_edit[0] = 'Can Not Edit ';
	can_edit[1] = 'Can Edit ';
	
	var keys = [];
	
	keys[0] = 'full_control';
	keys[1] = 'add_attribute';
	keys[2] = 'edit_attribute';
	keys[3] = 'delete_attribute';
	keys[4] = 'max_add_attribute';
	keys[5] = 'max_edit_attribute';
	keys[6] = 'max_delete_attribute';
	
	keys[7] = 'add_entity';
	keys[8] = 'edit_entity';
	keys[9] = 'view_entity';
	keys[10] = 'delete_entity';
	keys[11] = 'max_add_entity';
	keys[12] = 'max_edit_entity';
	keys[13] = 'max_view_entity';
	keys[14] = 'max_delete_entity';
	
	keys[15] = 'export_entity';
	keys[16] = 'max_export_entity';
	
	keys[17] = 'import_entity';
	keys[18] = 'max_import_entity';
	
	keys[19] = 'upload_doc';
	keys[20] = 'max_upload_doc';
	keys[21] = 'download_doc';
	
	keys[22] = 'upload_image';
	keys[23] = 'max_upload_image';
	
	if(obj.status && obj.status == 'success'){
		var _html = '';	
		var i=1;
		$(obj.response).each( function(key, value){
			
			if(isOdd(i)){
				var _cls = 'odd';
			}else{
				var _cls = 'even';
			} 
			console.log(value['system_module_name']);
		var id = value['id'];
		var system_module_id = value['system_module_id'];
		var lbl_a = '';
		var lbl_e = '';
		var lbl_d = '';
		var lbl_v = '';
		var lbl_max_a = '';
		var lbl_max_d = '';
		var lbl_max_e = '';
		var lbl_max_v = '';
		var full_ctrl = '';
		if(i == 1){
			var lbl_a = ' <span class="span-lbl"> Add </span>';
			var lbl_e = '<span class="span-lbl"> Edit</span>';
			var lbl_d = '<span  class="span-lbl"> Delete</span>';
			var lbl_v = '<span  class="span-lbl"> View </span>';
			var lbl_max_a = '<span  class="span-lbl"> Max. Add </span>';
			var lbl_max_d = '<span  class="span-lbl"> Max. Del.</span>';
			var lbl_max_e = '<span  class="span-lbl"> Max. Edit </span>';
			var lbl_max_v =  '<span  class="span-lbl"> Max. view </span>';
			var full_ctrl =  '&nbsp;&nbsp;&nbsp;<i class="fa fa-download" title="Can Download Document"></i> <span  class="span-lbl pull-right"> Full Control</span>';
		}
		_html =_html + '<div class="row row-'+_cls+'" id="row_'+id+'">';
			_html =_html + '<div class="col-lg-3 tab-title"> '+value['system_module_name']+' </div>';
			 //_html =_html + '<div class="col-lg-2 lbl-div">'+lbl_a + lbl_e + lbl_d + lbl_max_a;
			 _html =_html + '<div class="col-lg-3 lbl-div">';
				_html =_html + '<input  type="hidden" name="roles_accesses_ids[]" value="'+id+'" >' ;
				_html =_html + '<input  type="hidden" name="sort_order['+id+']" value="'+i+'" >' ;
				_html =_html + '<input  type="hidden" name="system_module_id[]" value="'+system_module_id+'" >' ;
				_html =_html + '<input class="form-control  access-setting col-lg-2 " type="checkbox" onchange="javascript:unset_full_control('+id+', this.checked);" name="'+keys[1]+'['+id+']" id="'+keys[1]+'['+id+']"  value="1" '+ is_checked[value[keys[1]]] +' >' ;
				_html =_html + '<input class="form-control  access-setting col-lg-2" type="checkbox" onchange="javascript:unset_full_control('+id+', this.checked);" name="'+keys[2]+'['+id+']" id="'+keys[2]+'['+id+']"  value="1"  '+ is_checked[value[keys[2]]] +'  >' ;
				_html =_html + '<input class="form-control  access-setting col-lg-2" type="checkbox" onchange="javascript:unset_full_control('+id+', this.checked);" name="'+keys[3]+'['+id+']" id="'+keys[3]+'['+id+']" value="1"  '+ is_checked[value[keys[3]]] +' >' ;
				//_html =_html + '<input class="form-control  access-setting-text col-lg-3" type="text" name="'+keys[4]+'['+id+']" id="'+keys[4]+'['+id+']"  value="'+value[keys[4]]+'"  >' ;
			 _html =_html + '</div>';
			 //_html =_html + '<div class="col-lg-4 ">'+lbl_a + lbl_e + lbl_v + lbl_d + lbl_max_a + lbl_max_e + lbl_max_d;
			 _html =_html + '<div class="col-lg-3">';
				_html =_html + '<input class="form-control  access-setting col-lg-2" type="checkbox" onchange="javascript:unset_full_control('+id+', this.checked);" name="'+keys[7]+'['+id+']" id="'+keys[7]+'['+id+']"  value="1"  '+ is_checked[value[keys[7]]] +' >';
				_html =_html + '<input class="form-control  access-setting col-lg-2" type="checkbox" onchange="javascript:unset_full_control('+id+', this.checked);" name="'+keys[8]+'['+id+']" id="'+keys[8]+'['+id+']"  value="1" '+ is_checked[value[keys[8]]] +' >' ;
				_html =_html + '<input class="form-control  access-setting col-lg-2" type="checkbox" onchange="javascript:unset_full_control('+id+', this.checked);" name="'+keys[9]+'['+id+']" id="'+keys[9]+'['+id+']" value="1" '+ is_checked[value[keys[9]]] +'>' ;
				_html =_html + '<input class="form-control  access-setting col-lg-2" type="checkbox" onchange="javascript:unset_full_control('+id+', this.checked);" name="'+keys[10]+'['+id+']" id="'+keys[10]+'['+id+']" value="1" '+ is_checked[value[keys[10]]] +'>' ;
				
				//_html =_html + '<input class="form-control  access-setting-text col-lg-3" type="text" name="'+keys[11]+'['+id+']" id="'+keys[11]+'['+id+']" value="'+value[keys[11]]+'" >' ;
				//_html =_html + '<input class="form-control  access-setting-text col-lg-3" type="text" name="'+keys[12]+'['+id+']" id="'+keys[12]+'['+id+']" value="'+value[keys[12]]+'" >' ;
				//_html =_html + '<input class="form-control  access-setting-text col-lg-3" type="text" name="'+keys[14]+'['+id+']" id="'+keys[14]+'['+id+']" value="'+value[keys[14]]+'" >' ;
			 _html =_html + '</div>';
			 //_html =_html + '<div class="col-lg-1">'+lbl_a + lbl_max_a ;
			 _html =_html + '<div class="col-lg-1">';
				_html =_html + '<input class="form-control  access-setting col-lg-3" type="checkbox" onchange="javascript:unset_full_control('+id+', this.checked);" name="'+keys[19]+'['+id+']" id="'+keys[19]+'['+id+']"  value="1" '+ is_checked[value[keys[19]]] +' >' ;
				//_html =_html + '<input class="form-control  access-setting-text col-lg-3" type="text" name="'+keys[20]+'['+id+']" id="'+keys[20]+'['+id+']" value="'+value[keys[20]]+'" >' ;
				
			 _html =_html + '</div>';
			 //_html =_html + '<div class="col-lg-1">'+lbl_a + lbl_max_a ;
			 //_html =_html + '<div class="col-lg-1">';
			//	_html =_html + '<input class="form-control  access-setting col-lg-3" type="checkbox"  onchange="javascript:unset_full_control('+id+', this.checked);" name="'+keys[21]+'['+id+']" id="'+keys[21]+'['+id+']"  value="1" '+ is_checked[value[keys[21]]] +'>' ;
				//_html =_html + '<input class="form-control  access-setting-text col-lg-3" type="text" name="'+keys[23]+'['+id+']" id="'+keys[23]+'['+id+']" value="'+value[keys[23]]+'" >' ;
			 //_html =_html + '</div>';
			 _html =_html + '<div class="col-lg-1">';
			 //_html =_html + '<input class="form-control  access-setting col-lg-3" type="checkbox" onchange="javascript:unset_full_control('+id+', this.checked);" name="'+keys[21]+'['+id+']" id="'+keys[21]+'['+id+']" value="1" '+ is_checked[value[keys[21]]] +'>' ;
				_html =_html + '<input class="form-control  access-setting col-lg-3 full_control pull-right" onchange="javascript:set_access_setting('+id+', this.checked);" type="checkbox" name="'+keys[0]+'['+id+']" id="'+keys[0]+'_'+id+'"  value="1" '+ is_checked[value[keys[0]]] +' >' ;
			 _html =_html + '</div>';
		_html =_html + '</div>';
			
		i = i+1;	
		});
	}
	return _html;
}
function set_access_setting(row_id, is_checked){
	var id = row_id
	if(is_checked) {
		var id = row_id
		if($("div#row_"+id)){
			$("div#row_"+id).find('input.access-setting').prop('checked','checked');
			$("div#row_"+id).find('input.access-setting').addClass('just_checked_'+id);
			$("div#row_"+id).find('input.access-setting-text').prop('disabled', 'disabled');
		}
		
	}
	if(!is_checked) {
		if($("div#row_"+id)){
			$("div#row_"+id).find('input.access-setting').removeAttr('checked');
			$("div#row_"+id).find('input.access-setting-text').removeAttr('disabled');
		}
		
	}
}
function unset_full_control(row_id, is_checked){
	var id = row_id;
	if(!is_checked) {
		if($("div#row_"+id)){
			$("div#row_"+id).find('input.full_control').removeAttr('checked');
			$("div#row_"+id).find('input.access-setting-text').removeAttr('disabled');
		}
		
	}
}
function enable_section(section_no){
	$('#frm').find('.form-control').each(function(){ $(this).prop('disabled',true); });
	var section = 'div#section_'+section_no;
	
	$(section).find('.form-control').each(function(){
		$(this).prop('disabled',false);
	});
}
function isOdd(num) { return num % 2;}

 </script>	
 <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>