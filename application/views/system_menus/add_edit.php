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
					<input type="hidden" name="sort_by" id="order_type" value="<?php echo $postdata['sort_by']; ?>" />
					<input type="hidden" name="order_type" id="order_type" value="<?php echo $postdata['order_type']; ?>" />
					<input type="hidden" name="page" id="order_type" value="<?php echo $postdata['page']; ?>" />
					<input type="hidden" name="limit" id="limit" value="<?php echo $postdata['limit']; ?>" />
					<input type="hidden" name="sort_order" id="sort_order" value="<?php echo $row['sort_order']; ?>" />
					 <div class="row row-edit-form">
						<div class="col-lg-6"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="system_menu_name"><span class="requireds">*</span> Menu Name:</label>
							<div class="col-lg-8 col-sm-6 col-xs-12">
									<input type="text" class="form-control" name="system_menu_name" id="system_menu_name" placeholder="Menu name" value="<?php echo $row['system_menu_name']; ?>"
									required
									>
							</div>
						</div>
					  </div>
						<div class="row row-edit-form">
						<div class="col-lg-6"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for=""><span class="requireds">*</span> Menu Type:</label>
							 <div class="col-lg-8 col-md-1 col-sm-3 col-xs-12 form-group pull-right">   
										<label class="control-label label-title-upper" for="menu_type0">
														<input <?php if($row['parent_id'] == 0) echo 'checked="checked" '; ?> type="radio" class="flat" name="menu_type" id="menu_type0" value="0"  /> Main Menu 
										</label>
										<label class="control-label label-title-upper" for="menu_type1" >
														<input  <?php if($row['parent_id'] > 0) echo 'checked="checked" '; ?> type="radio" class="flat" name="menu_type" id="menu_type1" value="1"  /> Child Menu
										</label>
						</div>
						</div>
						</div>
					 <div class="row row-edit-form" id="div_parent_menu">
						<div class="col-lg-6"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="parent_id"> Parent Menu:</label>
							<div class="col-lg-8 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" id="parent_id" name="parent_id">
									<option value="0">--Please Select Menu--</option>
										 <?php foreach ( $parent_menus as $key => $value ): ?>
										   <option value="<?php echo $key; ?>"<?php if ( isset($row['parent_id']) &&  $row['parent_id'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
										 <?php endforeach; ?>
									</select>
							</div>
						</div>
					</div> 
					 <div class="row row-edit-form" id="div_show_after">
						<div class="col-lg-6"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="show_after"> Show After Menu:</label>
							<div class="col-lg-8 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" id="show_after" name="show_after">
									<option value="0">--Please Select Menu--</option>
										 <?php foreach ( $parent_menus as $key => $value ): ?>
										   <option value="<?php echo $key; ?>"<?php if ( isset($row['show_after']) &&  $row['show_after'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
										 <?php endforeach; ?>
									</select>
							</div>
						</div>
					</div> 
					<div class="row row-edit-form" id="div_menu_icon">
						<div class="col-lg-6"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="menu_icon"> Menu Icon:</label>
							<div class="col-lg-8 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" id="menu_icon" name="menu_icon">
									<option value="0">--Please Select Icon--</option>
										 <?php foreach ( $menu_icons as $key => $value ): ?>
										   <option value="<?php echo $key; ?>"<?php if ( isset($row['menu_icon']) &&  $row['menu_icon'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
										 <?php endforeach; ?>
									</select>
							</div>
						</div>
					</div> 
					<div class="row row-edit-form">
						<div class="col-lg-6"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for=""><span class="requireds">*</span> Is Custom:</label>
							 <div class="col-lg-8 col-md-1 col-sm-3 col-xs-12 form-group pull-right">   
											<label class="control-label label-title-upper" for="is_custom0">
															<input <?php if($row['is_custom'] == 0) echo 'checked="checked" '; ?> type="radio" class="flat" name="is_custom" id="is_custom0" value="0"  /> No
											</label>
											<label class="control-label label-title-upper" for="is_custom1" >
															<input  <?php if($row['is_custom'] > 0) echo 'checked="checked" '; ?> type="radio" class="flat" name="is_custom" id="is_custom0" value="1"  />Yes
											</label>
							</div>
						</div>
					</div>
					<div class="row row-edit-form" id="div_menu_custom_link">
						<div class="col-lg-6"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="menu_custom_link"><span class="requireds">*</span> Menu URL:</label>
							<div class="col-lg-8 col-sm-6 col-xs-12">
									<input type="text" class="form-control" name="menu_custom_link" id="menu_custom_link" placeholder="http://weburl.com" value="<?php echo $row['menu_custom_link']; ?>"
									
									>
							</div>
						</div>
					  </div>
					<div class="row row-edit-form" id="div_menu_system_modume_id">
						<div class="col-lg-6"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="first_name"><span class="requireds">*</span> Module:</label>
							<div class="col-lg-8 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" id="system_module_id" name="system_module_id" >
									<option value="">--Please Select Module--</option>
										 <?php foreach ( $system_modules as $key => $value ): ?>
										   <option value="<?php echo $key; ?>"<?php if ( isset($row['system_module_id']) &&  $row['system_module_id'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
										 <?php endforeach; ?>
									</select>
							</div>
						</div>
					</div>
					 <div class="row row-edit-form">
					 <div class="col-lg-6"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for=""><span class="requireds">*</span> Is Active:</label>
							 <div class="col-lg-8 col-md-1 col-sm-3 col-xs-12 form-group pull-right">   
										<label class="control-label label-title-upper" for="status_1">
														<input <?php if($row['status'] == 1) echo 'checked="checked" '; ?> type="radio" class="flat" name="status" id="is_custom_0" value="1"  /> Active 
										</label>
										<label class="control-label label-title-upper" for="status_0" >
														<input  <?php if($row['status'] == 0) echo 'checked="checked" '; ?> type="radio" class="flat" name="status" id="status_0" value="0"  /> Inactive
										</label>
						</div>
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
<!-- /page content -->
<!-- /page content -->
<script>
<?php if (!empty($postdata['task']) && $postdata['task'] == 'save' ){ ?>
		$(document).ready(function() {
			$('#frmsave').submit();
		});
	<?php } ?>	
	$(document).ready(function() {
			$('#editform').bootstrapValidator();
		});
	function callback(){
		return "Here is custom message";
	}	
$(document).ready(function(){
	<?php if($row['parent_id'] == 0){ ?>
		$('div#div_parent_menu').css('display', 'none');
	
	<?php } ?>
	<?php if($row['parent_id'] > 0){ ?>
		$('div#div_parent_menu').css('display', 'block');
	<?php } ?>
	$('input[name="menu_type"]').on('ifClicked', function(event){
		if(this.value == 0 ){
			$('div#div_parent_menu').css('display', 'none');
			$('#parent_id').prop('disabled', false);
			$('div#div_menu_icon').css('display', 'block');
			$('#menu_icon').prop('disabled', false);
		}
		if(this.value == 1 ){
			$('div#div_parent_menu').css('display', 'block');
			$('#parent_id').prop('disabled', false);
			$('div#div_menu_icon').css('display', 'none');
			$('#menu_icon').prop('disabled', false);
		}
	});
<?php if($row['is_custom'] == 0){ ?>
		$('div#div_menu_custom_link').css('display','none'); 
			$('#menu_custom_link').prop('disabled', true);
	<?php } ?>
	<?php if($row['is_custom'] == 1){ ?>
		$('div#div_menu_custom_link').css('display','block'); 
			$('#menu_custom_link').prop('disabled', false);
	<?php } ?>
	$('input[name="is_custom"]').on('ifClicked', function(event){
		if(this.value == 0 ){
			$('div#div_menu_custom_link').css('display','none'); 
			$('#menu_custom_link').prop('disabled', true);
		}
		if(this.value == 1 ){
			$('div#div_menu_custom_link').css('display','block'); 
			$('#menu_custom_link').prop('disabled', false);
		}
	});
});	
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>