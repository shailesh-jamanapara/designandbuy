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
						<div class="col-lg-6"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="city_name"><span class="requireds">*</span> City Name:</label>
							<div class="col-lg-8 col-sm-6 col-xs-12">
									<input type="text" class="form-control" name="city_name" id="city_name" placeholder="City name" value="<?php echo $row['city_name']; ?>"
									required
									>
							</div>
						</div>
					  </div>
					  <div class="row row-edit-form">
						<div class="col-lg-6"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="country_id"><span class="requireds">*</span> Country:</label>
							<div class="col-lg-8 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" id="country_id" name="country_id" required>
									<option value="">--Please Select Country--</option>
										 <?php foreach ( $countries as $key => $value ): ?>
										   <option value="<?php echo $key; ?>"<?php if ( isset($row['country_id']) &&  $row['country_id'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
										 <?php endforeach; ?>
									</select>
							</div>
						</div>
					  </div>
					  <div class="row row-edit-form">
						<div class="col-lg-6"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="state_id"><span class="requireds">*</span> State:</label>
							<div class="col-lg-8 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" id="state_id" name="state_id" required>
									<option value="">--Please Select State--</option>
										 <?php foreach ( $states as $key => $value ): ?>
										   <option value="<?php echo $key; ?>"<?php if ( isset($row['state_id']) &&  $row['state_id'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
										 <?php endforeach; ?>
									</select>
							</div>
						</div>
					  </div>
					  <div class="row row-edit-form">
						<div class="col-lg-6"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="status"><span class="requireds">*</span> Status:</label>
							<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
								<?php $checked = ($row['status'] == '1') ? ' checked ':''; ?>
								<input type="checkbox" name="status" value="1" id="status" <?php echo $checked; ?> data-toggle="toggle" data-onstyle="primary" data-on="Active"data-off="Inactive" data-offstyle="default" >
							</div>
						</div>
					  </div>
					<div class="row row-edit-form">
						<div class="form-group">
						<div class="col-lg-6 col-lg-offset-2">

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
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>