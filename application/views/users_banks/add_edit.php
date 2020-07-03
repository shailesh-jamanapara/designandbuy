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
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="user_id"><span class="requireds">*</span> Employees :</label>
							<div class="col-lg-8 col-sm-6 col-xs-12  form-group">
									<select class="form-control col-md-7 col-xs-12 select2_single " id="user_id" name="user_id" data-bv-notempty="true" data-bv-notempty-message="Please select employee ">
									<option value="">--Please Select employee--</option>
										 <?php foreach ( $employees as $key => $value ): ?>
										   <option value="<?php echo $key; ?>"<?php if ( isset($row['user_id']) &&  $row['user_id'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
										 <?php endforeach; ?>
									</select>
							</div>
						</div>
					  </div>
					<div class="row row-edit-form">
						<div class="col-lg-6"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="account_no"><span class="requireds">*</span> Account No. :</label>
							<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
									<input type="text" class="form-control" name="account_no" id="account_no" placeholder="Account No." value="<?php echo $row['account_no']; ?>"
									data-bv-notempty="true" data-bv-notempty-message="Please enter account no." data-bv-stringlength="true" data-bv-stringlength-min="4" data-bv-stringlength-max="20" data-bv-stringlength-message="Allows Min. 1 & Max. 20 numbers">
							</div>
						</div>
					  </div>
					  <div class="row row-edit-form">
						<div class="col-lg-6"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="users_bank_name"><span class="requireds">*</span> Bank Name:</label>
							<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
									<input type="text" class="form-control" name="users_bank_name" id="users_bank_name" placeholder="Bank Name" value="<?php echo $row['users_bank_name']; ?>"
									 data-bv-stringlength="true"  data-bv-stringlength-min="1" data-bv-stringlength-max="150" data-bv-stringlength-message="Allows Min. 4 & Max. 150 Characters" data-bv-notempty="true" data-bv-notempty-message="Please enter bank name ">
							</div>
						</div>
					  </div>	
					   <div class="row row-edit-form">
						<div class="col-lg-6"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="bank_ifsc"><span class="requireds">*</span> IFSC Code:</label>
							<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
									<input type="text" class="form-control" name="bank_ifsc" id="bank_ifsc" placeholder="IFSC Code" value="<?php echo $row['bank_ifsc']; ?>"
									data-bv-notempty="true" data-bv-notempty-message="Please enter IFSC Code " data-bv-stringlength="true" data-bv-stringlength-min="11" data-bv-stringlength-max="11" data-bv-stringlength-message="Must be 11 Characters code " data-bv-regexp="true" data-bv-regexp-regexp="^[A-Z0-9]+$" data-bv-regexp-message="Allows only numeric & capital letters value">
							</div>
						</div>
					  </div>
					  <div class="row row-edit-form">
						<div class="col-lg-6"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="branch_name"><span class="requireds">*</span>Branch Name:</label>
							<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
									<textarea class="form-control" placeholder="Branch name" name="branch_name" id="branch_name" data-bv-notempty="true" data-bv-notempty-message="Please enter branch name" data-bv-stringlength="true"  data-bv-regexp="true" data-bv-regexp-regexp="^[a-zA-Z0-9_\ .]+$" data-bv-regexp-message="Special characters not allow" ><?php echo  $row['branch_name'];?></textarea>
							</div>
						</div>
					  </div>
					  <div class="row row-edit-form">
						<div class="col-lg-6"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="status"><span class="requireds">*</span> Status:</label>
							<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
								<?php $checked = ($row['status'] == '1') ? ' checked ':''; ?>
								<input type="checkbox" name="status" value="1" id="status" <?php echo $checked; ?> data-toggle="toggle" data-onstyle="primary" data-on="Open"data-off="Closed" value="<?php echo $row['status'] ; ?>" data-offstyle="default" >
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
		 $(".select2_single").select2({
          placeholder: "Select an employee",
          allowClear: false
        });	
			$('#editform').bootstrapValidator();
		});
	function callback(){
		return "Here is custom message";
	}	
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
 <link href="<?php echo vendor_url(); ?>/select2/dist/css/select2.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>