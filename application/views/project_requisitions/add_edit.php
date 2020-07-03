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
					 <div class="row row-edit-form">
						<div class="col-lg-12 form-group"> 
							<label class="control-label col-lg-3 col-md-4 label-title-upper" for="project_id"><span class="requireds">*</span> Project:</label>
							<div class="col-lg-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" id="project_id" name="project_id" required>
									<option value="">--Please Select Project--</option>
										 <?php foreach ( $projects as $key => $value ): ?>
										   <option value="<?php echo $key; ?>"<?php if ( isset($row['project_id']) &&  $row['project_id'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
										 <?php endforeach; ?>
									</select>
							</div>
						</div>
					  </div>
					  <div class="row row-edit-form">
						<div class="col-lg-12 form-group"> 
							<label class="control-label col-lg-3 col-md-4 label-title-upper" for="requisition_type"><span class="requireds">*</span> Requisition for:</label>
							<div class="col-lg-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" id="requisition_type" name="requisition_type" required>
									<option value="">--Please Select --</option>
										<option value="human_resource"<?php if ( isset($row['requisition_type']) &&  $row['requisition_type'] == 'human_resource' ) { ?> selected="selected"<?php } ?>>Human Resource</option>
										<option value="equipment"<?php if ( isset($row['requisition_type']) &&  $row['requisition_type'] == 'equipment' ) { ?> selected="selected"<?php } ?>>Equipment</option>
										<option value="tools"<?php if ( isset($row['requisition_type']) &&  $row['requisition_type'] == 'tools' ) { ?> selected="selected"<?php } ?>>Tools</option>
										<option value="software"<?php if ( isset($row['requisition_type']) &&  $row['requisition_type'] == 'software' ) { ?> selected="selected"<?php } ?>>Software</option>
										<option value="hardware"<?php if ( isset($row['requisition_type']) &&  $row['requisition_type'] == 'hardware' ) { ?> selected="selected"<?php } ?>>Hardware</option>
										<option value="stationary"<?php if ( isset($row['requisition_type']) &&  $row['requisition_type'] == 'stationary' ) { ?> selected="selected"<?php } ?>>Stationary</option>
										<option value="financial"<?php if ( isset($row['requisition_type']) &&  $row['requisition_type'] == 'financial' ) { ?> selected="selected"<?php } ?>>Financial</option>
									</select>
							</div>
						</div>
					  </div>
					  <div class="row row-edit-form">
						<div class="col-lg-12 form-group"> 
							<label class="control-label col-lg-3 col-md-4 label-title-upper" for="project_requisition_name"><span class="requireds">*</span> Project Requisition Name:</label>
							<div class="col-lg-6 col-sm-6 col-xs-12">
									<input type="text" class="form-control" name="project_requisition_name" id="project_requisition_name" placeholder="Project Requisition Name" value="<?php echo $row['project_requisition_name']; ?>" required  data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z\,%&@$ .]+$" data-bv-regexp-message="Special Characters are not allowed">
							</div>
						</div>
					  </div>
					   <div class="row row-edit-form">
						<div class="col-lg-12 form-group"> 
							<label class="control-label col-lg-3 col-md-4 label-title-upper" for="no_of_units"><span class="requireds">*</span> Required No. </label>
							<div class="col-lg-6 col-sm-6 col-xs-12">
									<input type="text" class="form-control" name="no_of_units" id="no_of_units" placeholder="Required numbers" value="<?php echo $row['no_of_units']; ?>" required  data-bv-regexp="true" data-bv-regexp-regexp="^[0-9]+$" data-bv-regexp-message="Allows only numeric value">
							</div>
						</div>
					  </div>
					   <div class="row row-edit-form">
						<div class="col-lg-12 form-group"> 
							<label class="control-label col-lg-3 col-md-4 label-title-upper" for="require_check_list"><span class="requireds">*</span> Required Check list:</label>
							<div class="col-lg-6 col-sm-6 col-xs-12">
								<textarea  class="form-control" name="require_check_list" id="require_check_list" placeholder="Check list" data-bv-notempty="true"  data-bv-notempty-message="Please enter reason of leave" data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z\ .]+$" data-bv-regexp-message="Special Characters are not allowed"  ><?php echo $row['require_check_list']; ?></textarea>	
							</div>
						</div>
					  </div>
					   <div class="row row-edit-form">
						<div class="col-lg-12 form-group"> 
							<label class="control-label col-lg-3 col-md-4 label-title-upper" for="minimum_budget"><span class="requireds">*</span> Minimum Budget:</label>
							<div class="col-lg-2 col-sm-6 col-xs-12 form-group">
									<input type="text" class="form-control" name="minimum_budget" id="minimum_budget" placeholder="Minimum budget" value="<?php echo $row['minimum_budget']; ?>"  data-bv-regexp="true" data-bv-regexp-regexp="^[0-9.]+$" data-bv-regexp-message="Allows only numeric value">
							</div>
							<label class="control-label col-lg-2 col-md-4 label-title-upper" for="maximum_budget"><span class="requireds">*</span> Maximum Budget:</label>
							<div class="col-lg-2 col-sm-6 col-xs-12 form-group">
									<input type="text" class="form-control" name="maximum_budget" id="maximum_budget" placeholder="Maximum budget" value="<?php echo $row['maximum_budget']; ?>"  data-bv-regexp="true" data-bv-regexp-regexp="^[0-9.]+$" data-bv-regexp-message="Allows only numeric value">
							</div>
						</div>
					  </div>
					   <div class="row row-edit-form">
						<div class="col-lg-12 form-group"> 
							<label class="control-label col-lg-3 col-md-4 label-title-upper" for="expected_date_of_fullfill"><span class="requireds">*</span> Date of Requirement:</label>
							<div class="col-lg-2 col-sm-6 col-xs-12">
									<input type="text" class="date-picker form-control" name="expected_date_of_fullfill" id="expected_date_of_fullfill" placeholder="e.g. mm/dd/yyyy" value="<?php echo $row['minimum_budget']; ?>" required >
									<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"> </span>	
							</div>
							<label class="control-label col-lg-2 col-md-4 label-title-upper" for="estimated_date_of_longlast"><span class="requireds">*</span> Estimated Date of Long Last:</label>
							<div class="col-lg-2 col-sm-6 col-xs-12">
									<input type="text" class="date-picker  form-control" name="estimated_date_of_longlast" id="estimated_date_of_longlast" placeholder="e.g. mm/dd/yyyy" value="<?php echo $row['estimated_date_of_longlast']; ?>" required >
									<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"> </span>	
							</div>
						</div>
					  </div>
					  <div class="row row-edit-form">
						<div class="col-lg-12 form-group"> 
							<label class="control-label col-lg-3 col-md-4 label-title-upper" for="recommendation">Recommendation :</label>
							<div class="col-lg-6 col-sm-6 col-xs-12">
								<textarea  class="form-control" name="recommendation" id="recommendation" placeholder="Recommendation "  data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z\,%&@$ .]+$" data-bv-regexp-message="Special Characters are not allowed"  ><?php echo $row['recommendation']; ?></textarea>	
							</div>
						</div>
					  </div>
					  <div class="row row-edit-form">
						<div class="col-lg-12 form-group"> 
							<label class="control-label col-lg-3 col-md-4 label-title-upper" for="special_note">Special Note :</label>
							<div class="col-lg-6 col-sm-6 col-xs-12">
								<textarea  class="form-control" name="special_note" id="special_note" placeholder="Special Note " data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z\,%&@$ .]+$" data-bv-regexp-message="Special Characters are not allowed"  ><?php echo $row['special_note']; ?></textarea>	
							</div>
						</div>
					  </div>
					   <div class="row row-edit-form">
						<div class="col-lg-12 form-group"> 
							<label class="control-label col-lg-3 col-md-4 label-title-upper" for="authorized_person_id"><span class="requireds">*</span> Authorized Person:</label>
							<div class="col-lg-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" id="authorized_person_id" name="authorized_person_id" required>
									<option value="">--Please Select Project--</option>
										 <?php foreach ( $users as $key => $value ): ?>
										   <option value="<?php echo $key; ?>"<?php if ( isset($row['authorized_person_id']) &&  $row['authorized_person_id'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
										 <?php endforeach; ?>
									</select>
							</div>
						</div>
					  </div>
					<div class="row row-edit-form">
						<div class="form-group">
						<div class="col-lg-12 col-lg-offset-3">

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
			$('#expected_date_of_fullfill').on('change', function(e) { $('#editform').bootstrapValidator('revalidateField', 'expected_date_of_fullfill');});
			$('#estimated_date_of_longlast').on('change', function(e) { $('#editform').bootstrapValidator('revalidateField', 'estimated_date_of_longlast');});
			$('#editform').bootstrapValidator();
		});
	function callback(){
		return "Here is custom message";
	}	
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>