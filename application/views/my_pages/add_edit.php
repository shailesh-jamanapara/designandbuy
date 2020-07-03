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
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="school_name"><span class="requireds">*</span> School Name:</label>
							<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
									<input type="text" class="form-control" name="school_name" id="school_name" placeholder="School name" value="<?php echo $row['school_name']; ?>"
									data-bv-notempty="true" data-bv-notempty-message="Please enter school name"  data-bv-regexp="true" data-bv-regexp-regexp="^[0-9A-Za-z\ .]+$" data-bv-regexp-message="Special Characters are not allowed"
									>
							</div>
						</div>
					  </div>
					   <div class="row row-edit-form">
						<div class="col-lg-6"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="reg_number"><span class="requireds">*</span> Regstration No. :</label>
							<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
									<input type="text" class="form-control" name="reg_number" id="reg_number" placeholder="Regstration No." value="<?php echo $row['reg_number']; ?>"
									data-bv-notempty="true" data-bv-notempty-message="Please enter school name"  data-bv-regexp="true" data-bv-regexp-regexp="^[0-9A-Za-z\ .]+$" data-bv-regexp-message="Special Characters are not allowed"
									>
							</div>
						</div>
					  </div>
					  <div class="row row-edit-form">
						<div class="col-lg-6"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="type_of_school"><span class="requireds">*</span> Type of Medium:</label>
							<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
								<select class="form-control col-md-7 col-xs-12" id="type_of_school" name="type_of_school" required>
									<option value="">--Please Select--</option>
										 <?php foreach ( $type_of_schools_arr as $key => $value ): ?>
										   <option value="<?php echo $key; ?>"<?php if ( isset($row['type_of_school']) &&  $row['type_of_school'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
										 <?php endforeach; ?>
									</select>
							</div>
						</div>
					  </div>
					  <div class="row row-edit-form">
						<div class="col-lg-6"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="email"><span class="requireds">*</span> Email ID. :</label>
							<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
									<input type="email" class="form-control" name="email" id="email" placeholder="Email No." value="<?php echo $row['email']; ?>"
									data-bv-notempty="true" data-bv-notempty-message="Please enter email ID" >							
							</div>
						</div>
					  </div>
					  <div class="row row-edit-form">
						<div class="col-lg-6"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="phone"><span class="requireds">*</span> Phone. :</label>
							<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
									<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone No." value="<?php echo $row['phone']; ?>" data-bv-notempty="true" data-bv-notempty-message="Please enter phone no."  data-bv-regexp="true" data-bv-regexp-regexp="^[0-9]+$" data-bv-regexp-message="Special Characters are not allowed">
							</div>
						</div>
					  </div>
					  <div class="row row-edit-form">
						<div class="col-lg-6"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="email"> Website :</label>
							<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
									<input type="url" class="form-control" name="website" id="website" placeholder="Website URL" value="<?php echo $row['website']; ?>" >	
							</div>
						</div>
					  </div>
					  <div class="row row-edit-form">
						<div class="col-lg-6"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="status"><span class="requireds">*</span> Status:</label>
							<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
								<?php $checked = ($row['status'] == '1') ? ' checked ':''; ?>
								<input type="checkbox" name="status" value="1" id="status" <?php echo $checked; ?> data-toggle="toggle" data-onstyle="primary" data-on="Active"data-off="Inactive" value="<?php echo $row['status'] ; ?>" data-offstyle="default" >
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