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
		<input type="hidden" name="mode" id="mode" value="<?php echo $postdata['mode']; ?>" />
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
				  <form autocomplete="off" class="form-horizontal form-label-left" novalidate method="post" action="" id="editform" data-bv-message="This value is not valid" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" enctype="multipart/form-data">
					<input type="hidden" name="task" id="task" value="save" />
					<input type="hidden" name="id" id="id" value="<?php echo $model['id']; ?>" />
					<input type="hidden" name="search_for" id="order_type" value="<?php echo $postdata['search_for']; ?>" />
					<input type="hidden" name="search_by" id="sort_by" value="<?php echo $postdata['search_by']; ?>" />
					<input type="hidden" name="sort_by" id="order_type" value="<?php echo $postdata['sort_by']; ?>" />
					<input type="hidden" name="order_type" id="order_type" value="<?php echo $postdata['order_type']; ?>" />
					<input type="hidden" name="page" id="order_type" value="<?php echo $postdata['page']; ?>" />
					<input type="hidden" name="limit" id="limit" value="<?php echo $postdata['limit']; ?>" />
					<input type="hidden" name="mode" id="mode" value="<?php echo $postdata['mode']; ?>" />
					<?php if( $postdata['mode'] != 'self' ){ ?>
					 <div class="row row-edit-form">
						<div class="col-lg-10 form-group"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="leave_type_id"><span class="requireds">*</span> Employee:</label>
							<div class="col-lg-8 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" id="leave_type_id" name="leave_type_id" data-bv-notempty="true"  data-bv-notempty-message="Please select"  >
									<option value="">-- Please Select Employee--</option>
										 <?php foreach ( $employees as $key => $value ): ?>
										   <option value="<?php echo $key; ?>"<?php if ( isset($row['user_id']) &&  $row['user_id'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
										 <?php endforeach; ?>
									</select>
							</div>
						</div>
					  </div>
					 
					<?php } ?>
					<div class="row row-edit-form">
						<div class="col-lg-10 form-group"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="leave_type_id"><span class="requireds">*</span> Leave Type:</label>
							<div class="col-lg-8 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" id="leave_type_id" name="leave_type_id" data-bv-notempty="true"  data-bv-notempty-message="Please select"  >
									<option value="">-- Please Select --</option>
										 <?php foreach ( $leave_types as $key => $value ): ?>
										   <option value="<?php echo $key; ?>"<?php if ( isset($row['leave_type_id']) &&  $row['leave_type_id'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
										 <?php endforeach; ?>
									</select>
							</div>
						</div>
					  </div>
					  <div class="row row-edit-form">
						<div class="col-lg-10 form-group"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="leave_reason"><span class="requireds">*</span> Leave Reason:</label>
							<div class="col-lg-8 col-sm-6 col-xs-12">
								<textarea type="text" class="form-control" name="leave_reason" id="leave_reason" placeholder="Leave Reason" data-bv-notempty="true"  data-bv-notempty-message="Please enter reason of leave" data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z\ .]+$" data-bv-regexp-message="Special Characters are not allowed"  ><?php echo $row['leave_reason']; ?></textarea>
									
							</div>
						</div>
					  </div>
					  <div class="row row-edit-form">
						<div class="col-lg-10 "> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="leave_from"><span class="requireds">*</span> Leave From:</label>
							<div class="col-lg-2  form-group col-sm-6 col-xs-12">
									<input required id="leave_from" name="leave_from" value="<?php if(isset($row['leave_from'])){ echo $row['leave_from']; } ?>" class="date-picker form-control col-md-7 col-xs-12 " type="text" placeholder="mm/dd/yyyy" data-bv-notempty-message="Enter Date">
									<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>	
							</div>
							<label class="control-label col-lg-1 col-md-4 label-title-upper" for="leave_to"><span class="requireds">*</span> To:</label>
							<div class="col-lg-2  form-group col-sm-6 col-xs-12">
									<input required id="leave_to" name="leave_to" value="<?php if(isset($row['leave_to'])){ echo $row['leave_to']; } ?>" class="date-picker form-control col-md-7 col-xs-12 " type="text" placeholder="mm/dd/yyyy" data-bv-notempty="true"  data-bv-notempty-message="Enter Date"  >
									<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>	
							</div>
							<div class="col-lg-3 col-sm-6 col-xs-12  form-group">
									<select name="days" id="days" class="form-control col-md-7 col-xs-12" data-bv-notempty="true"  data-bv-notempty-message="Please select" >
										<option value="full_day" <?php if($row['days'] == 'full_day' ) echo ' selected="selected" '; ?> > Full Day </option>
										<option value="more_than_one" <?php if($row['days'] == 'more_than_one' ) echo ' selected="selected" '; ?>> More Than One Day </option>
										<option value="more_than_one" <?php if($row['days'] == 'first_half' ) echo ' selected="selected" '; ?>> First Half </option>
										<option value="more_than_one" <?php if($row['days'] == 'second_half' ) echo ' selected="selected" '; ?>> Second Half </option>
									</select>
							</div>
						</div>
					  </div>
					   <div class="row row-edit-form-bottom">
						<div class="col-lg-10 form-group">
							<div class="col-lg-12 col-lg-offset-4">
								
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
$(function () {
     $('#leave_from').datepicker({  
         minDate:new Date()
      });
 });	
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>