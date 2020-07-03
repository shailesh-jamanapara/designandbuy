<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- page content -->
<?php if (!empty($postdata['task']) && $postdata['task'] == 'save' ) : ?>

<form name="frmsave" id="frmsave" method="post" action="<?php echo $listpage_url;?>">
		<input type="hidden" name="id" id="id" value="<?php if(isset($model['id'])) { echo $model['id']; } ?>" />
		<input type="hidden" name="search_for" id="order_type" value="<?php echo $postdata['search_for']; ?>" />
		<input type="hidden" name="search_by" id="sort_by" value="<?php echo $postdata['search_by']; ?>" />
		<input type="hidden" name="sort_by" id="sort_by" value="<?php echo $postdata['sort_by']; ?>" />
		<input type="hidden" name="order_type" id="order_type" value="<?php echo $postdata['order_type']; ?>" />
		<input type="hidden" name="page" id="order_type" value="<?php echo $postdata['page']; ?>" />
		<input type="hidden" name="limit" id="limit" value="<?php echo $postdata['limit']; ?>" />
  </form>
<?php endif; ?>
<?php if ( !$postdata['task']  ||  $postdata['task'] != 'save' ) : ?>
	<div class="right_col" role="main">
	  <div class="">
		<div class="clearfix"></div>       
		<div class="row">
		  <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			    <div class="x_title">
				<h2><?php echo $page_heading; ?></h2>
				<div class="clearfix"></div>
			  </div>
			  <!-- x_content -->
			  <div class="x_content">
				 <!-- form-horizontal -->
				  <form class="form-horizontal form-label-left" novalidate method="post" action="" id="editform" data-bv-message="This value is not valid" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" enctype="multipart/form-data">
					<input type="hidden" name="task" id="task" value="save" />
					<input type="hidden" name="id" id="id" value="<?php echo $model['id']; ?>" />
					<input type="hidden" name="search_for" id="order_type" value="<?php echo $postdata['search_for']; ?>" />
					<input type="hidden" name="search_by" id="sort_by" value="<?php echo $postdata['search_by']; ?>" />
					<input type="hidden" name="sort_by" id="sort_by" value="<?php echo $postdata['sort_by']; ?>" />
					<input type="hidden" name="order_type" id="order_type" value="<?php echo $postdata['order_type']; ?>" />
					<input type="hidden" name="page" id="order_type" value="<?php echo $postdata['page']; ?>" />
					<input type="hidden" name="limit" id="limit" value="<?php echo $postdata['limit']; ?>" />
					  <div class="row row-edit-form">
	<div class="col-lg-6 form-group"> 
		<label class="control-label col-lg-4 col-md-4 label-title-upper" for="training_topic_id"><span class="requireds">*</span> Topic:</label>
		<div class="col-lg-8 col-sm-6 col-xs-12">
				<select class="form-control col-md-7 col-xs-12" id="training_topic_id" name="training_topic_id" required>
				<option value="">-- Please Select Topic --</option>
					 <?php foreach ( $training_topics as $key => $value ): ?>
					   <option value="<?php echo $key; ?>" <?php if( $row['training_topic_id'] == $key ) echo ' selected="selected" '; ?>><?php echo $value; ?></option>
					 <?php endforeach; ?>
				</select>
		</div>
	</div>
  <div class="col-lg-6 form-group"> 
		<label class="control-label col-lg-4 col-md-4 label-title-upper" for="training_name"><span class="requireds">*</span> Training Title:</label>
		<div class="col-lg-8 col-sm-6 col-xs-12">
				<input type="text" class="form-control" name="training_name" id="training_name" placeholder="Training title" required  data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z\ .]+$" data-bv-regexp-message="Special Characters are not allowed"	value="<?php echo $row['training_name']; ?>">
		</div>
	</div>
 
<div class="col-lg-6 form-group"> 
	<label class="control-label col-lg-4 col-md-4 label-title-upper" for="training_description"><span class="requireds">*</span> Training Short description:</label>
	<div class="col-lg-8 col-sm-6 col-xs-12">
			<textarea  class="form-control" cols="6" name="training_description" id="training_description" placeholder="Training description"required  data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z\ .]+$" data-bv-regexp-message="Special Characters are not allowed"	><?php echo $row['training_description']; ?></textarea>
	</div>
</div>
	<div class="col-lg-6 form-group"> 
		<label class="control-label col-lg-4 col-md-4 label-title-upper" for="status"><span class="requireds">*</span> Status:</label>
		<div class="col-lg-8 col-sm-6 col-xs-12">
				<select class="form-control col-md-7 col-xs-12" id="status" name="status" required>
					<option value="up_coming" <?php if($row['status'] == 'up_coming' ) echo 'selected="selected"' ;?>>Up coming</option>
					<option value="approved"  <?php if($row['status'] == 'approved' ) echo 'selected="selected"' ;?>>Approved</option>
					<option value="on_going"  <?php if($row['status'] == 'on_going' ) echo 'selected="selected"' ;?>>On going</option>
					<option value="completed"  <?php if($row['status'] == 'completed' ) echo 'selected="selected"' ;?>>Completed</option>
					<option value="signed"  <?php if($row['status'] == 'signed' ) echo 'selected="selected"' ;?>>Signed </option>
					<option value="re_open"  <?php if($row['status'] == 're_open' ) echo 'selected="selected"' ;?>>Re open</option>
					<option value="closed"  <?php if($row['status'] == 'closed' ) echo 'selected="selected"' ;?>>Closed</option>
				</select>
		</div>
	</div>

	<div class="col-lg-6 form-group"> 
		<label class="control-label col-lg-4 col-md-4 label-title-upper" for="mentor_id"><span class="requireds">*</span> Mentor:</label>
		<div class="col-lg-8 col-sm-6 col-xs-12">
				<select class="form-control col-md-7 col-xs-12" id="mentor_id" name="mentor_id" required>
				<option value="">-- Please Select Mentor --</option>
					 <?php foreach ( $mentors as $key => $value ): ?>
					   <option value="<?php echo $key; ?>" <?php if( $row['mentor_id'] == $key ) echo ' selected="selected" '; ?>><?php echo ucfirst(strtolower($value)); ?></option>
					 <?php endforeach; ?>
				</select>
		</div>
	</div>
	<div class="row"> 
	<div class="col-lg-6 form-group"> 
		<label class="control-label col-lg-4 col-md-4 label-title-upper" for="signed_by"><span class="requireds">*</span> Reporting Authority:</label>
		<div class="col-lg-8 col-sm-6 col-xs-12">
				<select class="form-control col-md-7 col-xs-12" id="signed_by" name="signed_by" required>
				<option value="">-- Please Select Reporting Authority --</option>
					 <?php foreach ( $mentors as $key => $value ): ?>
					   <option value="<?php echo $key; ?>" <?php if( $row['signed_by'] == $key ) echo ' selected="selected" '; ?>><?php echo ucfirst(strtolower($value)); ?></option>
					 <?php endforeach; ?>
				</select>
		</div>
	</div>

	<div class="col-lg-6  form-group"> 
		<label class="control-label col-lg-4 col-md-4 label-title-upper" for="training_date"><span class="requireds">*</span> Training Date:</label>
		<div class="col-lg-8 col-sm-6 col-xs-12">
					<input required id="training_date" name="training_date" value="<?php echo $row['training_date']; ?>" class="date-picker form-control col-md-7 col-xs-12 " type="text" placeholder="mm/dd/yyyy" >
								<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>			
		</div>
	</div>
	</div>
	<div class="row"> 
	<div class="col-lg-6  form-group"> 
		<label class="control-label col-lg-4 col-md-4 label-title-upper" for="time_from"><span class="requireds">*</span> From :</label>
		<div class="col-lg-8  form-group input-group bootstrap-timepicker timepicker ">   
			<input    type="text" class="form-control input-small"  maxlength="10" name="time_from" id="time_from" value="<?php echo $row['time_from']; ?>">
			<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>					
		</div>
	</div>
	<div class="col-lg-6  form-group"> 
		<label class="control-label col-lg-4 col-md-4 label-title-upper" for="time_to"><span class="requireds">*</span> To :</label>
		<div class="col-lg-8 form-group input-group bootstrap-timepicker timepicker">   
			<input  type="text" class="form-control input-small"  maxlength="10" name="time_to" id="time_to" value="<?php echo $row['time_to']; ?>" >
			<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>					
		</div>
	</div>
	</div>
	<div class="row"> 
	<div class="col-lg-6  form-group"> 
		<label class="control-label col-lg-4 col-md-4 label-title-upper" for="reference_doc"> Reference Document:</label>
		<div class="col-lg-8 col-sm-6 col-xs-12">
				<input type="file" class="form-control custom-file-input" id="reference_doc" name="reference_doc">		
				<?php if(isset($row['reference_doc'])){ echo $row['reference_doc'];} ?>
		</div>
	</div>
	</div>
	<div class="col-lg-6  form-group"> 
		<label class="control-label col-lg-4 col-md-4 label-title-upper" for="reference_doc"> Uploaded Document:</label>
		<div class="col-lg-8 col-sm-6 col-xs-12">
							<?php if (isset($row['docs'])) {?>
								<?php if (count($row['docs']) > 0) { $i = 1;?>
									<?php  foreach ( $row['docs'] as $key => $val) {
									
									?><div class="col-lg-12 doc_list" >
										<?php echo "<strong>".$i ." </strong>&nbsp;&nbsp; ". $val['training_document_name'];?> 
									  </div>
									<div class="col-lg-12 byline text-right">
										Uploaded on <span> <?php echo date('d M Y', strtotime($val['created_at']));?> </span> </a>
									</div>
									<?php 
										$i++;
										}
									}
								}else {	?>	
							  <li style="">
								<div class="block">
								  <div class="block_content text-center">
									No document uploaded.
								  </div>
								</div>
							  </li>
								<?php } ?>
								
							</ul>
		</div>
	</div>
  </div>
    <div class="col-lg-10 col-lg-offset-2 col-md-12 col-sm-6 col-xs-12">
		<div class="x_panel">
			<h2><i class="fa fa-users"></i> Select employee to invite in training <a class="collapse-link  pull-right"><i class="fa fa-chevron-up"></i></a></h2>
			<!-- <div class="col-lg-12 col-md-1 col-sm-3 col-xs-12 form-group ">   
				<input type="checkbox" value="1" name="check_all" id="check_all"  class="flat form-control" > <label class="lbl_check_all">Invite All</label>
			</div> -->
			<div class="clearfix"></div>
				<?php if(!empty($training_users)){ ?>
					<div class="x_content" style="display: block; border:none !important">
					<?php foreach($training_users as $key => $val ){ ?>
						<div class="col-lg-3 col-md-1 col-sm-3 col-xs-12 form-group ">   
									 <input type="checkbox" value="<?php echo  $key ;?>" name="training_users[]" id="training_users_<?php echo  $key ;?>"  class="flat form-control check_user" <?php if( in_array($key, $selected_users)) echo ' checked="checked" ';?> > <label class="lbl_username"> <?php echo  ucfirst(strtolower($val)) ;?></label>
									
						</div>
			
					<?php } ?>
				</div>
				<?php } ?>
		</div>
	  </div>
			 <div class="row row-edit-form-bottom">
	<div class="form-group">
		<div class="col-md-6 col-md-offset-2">
			
				<button type="button" onclick="this.form.action='<?php echo $listpage_url;?>';this.form.submit();" class="btn btn-danger">Cancel</button>
				<button id="send" type="submit" class="btn btn-success">Submit</button>
		</div>
	</div>
  </div>
				 </form>	
				 <!-- form-horizontal -->	
			</div>
			 <!-- /x_content -->
		  </div>
		</div>
	  </div>
	</div>
	</div>
<?php endif; ?>	
<form class="form-horizontal" name="frmdownload" id="frmdownload" method="post" action="" target="blank">
    <input type="hidden" name="task" id="task" value="download_doc" />
    <input type="hidden" name="id" id="id" value="" />
</form>
<!-- /page content -->
<script>
<?php if (!empty($postdata['task']) && $postdata['task'] == 'save' ){ ?>
		$(document).ready(function() {
			$('#frmsave').submit();
		});
	<?php } ?>
function toggle_modal_invited_employees(training_id){
	var url =  '<?php echo $ajax_url; ?>getInvitedEmployees';
	$.post(url, {id : training_id}, function(result) {
		console.log(result);
		var obj = $.parseJSON(result);
		if(obj.status == 'success'){
			if(obj.response){
				console.log(obj.response);
				$('#training_name').text('Topic  : '+obj.training_topic);
				$('#training_title').text('Title :'+obj.training_name);
				$().text();
				var _html = '';
				var cls = '';
				$(obj.response).each(function(){
					if(this.role_id == '5'){
						cls = 'aero';
					}
					if(this.role_id == '1'){
						cls = 'blue';
					}
					if(this.role_id == '2'){
						cls = 'green';
					}
					var user_name = this.title+ ' '+this.first_name+ ' ';
					if( this.middle_name !== 'undefined'  && this.middle_name !== ''){
						user_name = user_name+ this.middle_name+ ' ';
					}
					if( typeof this.last_name != undefined  && this.last_name != ''){
						user_name = user_name+ this.last_name+ ' ';
					}
					 _html =  _html+ '<li class="media event col-lg-4">';
							_html = _html+  '<a class="pull-left border-'+cls+' profile_thumb">';
									_html = _html+ '<i class="fa fa-user '+cls+'"></i>';
							_html = _html+ '</a>';
						_html = _html+ '<div class="media-body">';
						  var show_users = '<?php echo base_url();?>Users/list_employees/employee?search_by=username&search_for='+this.username;
							_html = _html+ '<a class="title" href="'+show_users+'">' +user_name+'</a>';
							_html = _html+ '<p><strong>'+this.username+'</strong> '+ this.position_name+' </p>';
							_html = _html+ '<p> <small>'+this.department_name+'</small>';
							_html = _html+ '</p>';
						_html = _html+ '</div>';
					_html = _html+ '</li>';
				});
				if(_html != ''){
					$("ul#users_list").html(_html);
				}
			}
		}
	});
	$("#modal_invited_employees").modal('toggle');
}
$(document).ready(function() {
	var search_by = '<?php echo $postdata['search_by']; ?>';
	if(search_by == 'trainings.training_date'){
		$('div.search_box').find('#search_for_text').css('display','none');
		$('div.search_box').find('#search_for_text').prop('disabled',true);
		$('div.search_box').find('#search_for_date').css('display','inline');
		$('div.search_box').find('.fa-calendar ').css('display','inline');
		$('div.search_box').find('#search_for_date').prop('disabled',false);
	}
	if(search_by !== 'trainings.training_date'){
		$('div.search_box').find('#search_for_text').css('display','inline');
		$('div.search_box').find('#search_for_text').prop('disabled',false);
		$('div.search_box').find('#search_for_date').css('display','none');
		$('div.search_box').find('.fa-calendar ').css('display','none');
		$('div.search_box').find('#search_for_date').prop('disabled',true);
	}
	$('select#search_by').on('change', function(){
		if( this.value == 'trainings.status' || this.value== 'trainings.training_date'){
				var _html = '';
				/*
				if( this.value == 'trainings.status'){
					var searched_for = '<?php  $postdata['search_for'];?>';
					var _selecr = 
					_html = _html+'<select class="form-control" id="search_for" name="search_for" data-bv-notempty="true" data-bv-notempty-message="Please select one" data-bv-field="search_by">';
						_html = _html+'<option value="">Please select status</option>';
						_html = _html+'<option value="0"';
						if( searched_for == '0' ){ _html = _html+' selected="selected"'; }
						_html = _html+'>Upcoming</option>';
						_html = _html+'<option value="1"';
						if( searched_for == '1' ){ _html = _html+' selected="selected"'; }	
						_html = _html+'	>On Going</option>';
						_html = _html+'<option value="2"';
						if( searched_for == '2' ){ _html = _html+' selected="selected"'; }	
						_html = _html+'>Completed</option>';
					_html = _html+'</select>';
					$('div#div_search_for').html('');
					$('div#div_search_for').html(_html);
				}
				*/
				if( this.value == 'trainings.training_date'){
					$('#search_for_text').prop('disabled',true);
					$('#search_for_text').css('display','none');
					$('#search_for_date').prop('disabled',false);
					$('#search_for_date').css('display','inline');
					//_html = _html+'<input required id="search_for" name="search_for" value="" class="date-picker form-control" type="text" placeholder="mm/dd/yyyy" ><span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>';	
					 //datepicker_call();
				}
				if( this.value !== 'trainings.training_date' ){
					$('#search_for_text').prop('disabled',false);
					$('#search_for_text').css('display','inline');
					$('#search_for_date').prop('disabled',true);
					$('#search_for_date').css('display','none');
				}
			
		}else{
			_html = _html+'<input type="text" class="form-control" name="search_for" id="search_for" placeholder="Search Keyword" value="<?php echo $postdata['search_for']; ?>"  data-bv-notempty="true" data-bv-notempty-message="Please enter value ">';
		}

	});
	$('#editform').bootstrapValidator();
});
function downloaddoc(id){
	 $('form#frmdownload').find('#id').val(id);
	var form_action_url = '<?php echo base_url()?>index.php/Training_Documents/downloadDoc';
		 $('#frmdownload').attr('action', form_action_url).submit();
}
 </script>	
 <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
<script src="<?php echo vendor_url();?>fastclick/lib/fastclick.js"></script>