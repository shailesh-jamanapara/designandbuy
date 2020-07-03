<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Content Header (Page header) -->
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
	<section class="content-header">
		<h1>
			<?php echo $page_heading; ?>
		</h1>
	</section>
    <!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-sm-12">
				<div class="box box-primary">
		   			<form class="form-horizontal form-label-left" novalidate method="post" action="" id="editform" data-bv-message="This value is not valid" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" enctype="multipart/form-data" autocomplete="off">
						<input type="hidden" name="task" id="task" value="save" />
						<input type="hidden" name="id" id="id" value="<?php echo $model['id']; ?>" />
						<input type="hidden" name="search_for" id="order_type" value="<?php echo $postdata['search_for']; ?>" />
						<input type="hidden" name="search_by" id="sort_by" value="<?php echo $postdata['search_by']; ?>" />
						<input type="hidden" name="sort_by" id="order_type" value="<?php echo $postdata['sort_by']; ?>" />
						<input type="hidden" name="order_type" id="order_type" value="<?php echo $postdata['order_type']; ?>" />
						<input type="hidden" name="page" id="order_type" value="<?php echo $postdata['page']; ?>" />
						<input type="hidden" name="limit" id="limit" value="<?php echo $postdata['limit']; ?>" />
						<input type="hidden" name="customer_type" id="customer_type" value="franchisee" />
						<input type="hidden" name="role_id" id="role_id" value="14" />
						<input type="hidden" name="status" id="status" value="1" />
								
						<div class="box-body">
						<!-- left side div -->
							<div class="col-sm-9">
								<div class="form-group">
									<label class="control-label col-lg-4 col-md-4 label-title-upper" for="title">Prefix<span class="requireds">*</span></label>
									<div class="col-lg-8 col-sm-6 col-xs-12 form-group">   
										<select class="form-control col-lg-2 " id="title" name="title">
											<option value="Mr."<?php if( $row['title']  == "Mr." ) { ?> selected="selected"<?php } ?>>Mr.</option>
											<option value="Mrs."<?php if ( $row['title'] == "Mrs." ) { ?> selected="selected"<?php } ?>>Mrs.</option>
											<option value="Miss."<?php if ( $row['title'] == "Miss." ) { ?> selected="selected"<?php } ?>>Miss.</option>
										</select>						
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-lg-4 col-md-4 label-title-upper" for="first_name">First Name<span class="requireds">*</span> </label>
									<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
										<input type="text" class="form-control" name="first_name" id="first_name" placeholder="First name" value="<?php echo $row['first_name']; ?>"
										data-bv-notempty="true" data-bv-notempty-message="Please enter First name"  data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z\ .]+$" data-bv-regexp-message="Special Characters are not allowed" data-bv-stringlength="true" data-bv-stringlength-max="50" data-bv-stringlength="true" data-bv-stringlength-min="3">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-4 col-md-4 label-title-upper" for="last_name">Last Name<span class="requireds">*</span> </label>
									<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
										<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last name" value="<?php echo $row['last_name']; ?>"
										data-bv-notempty="true" data-bv-notempty-message="Please enter Last name"  data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z\ .]+$" data-bv-regexp-message="Special Characters are not allowed" data-bv-stringlength="true" data-bv-stringlength-max="50" data-bv-stringlength="true" data-bv-stringlength-min="3">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-4 col-md-4 label-title-upper" for="contact_no">Mobile<span class="requireds">*</span> </label>
									<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
										<input type="text" class="form-control" name="contact_no" id="contact_no" placeholder="Enter Contact Number" value="<?php echo $row['contact_no']; ?>" data-bv-stringlength="true" data-bv-stringlength-max="10" data-bv-stringlength="true" data-bv-stringlength-min="10">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-4 col-md-4 label-title-upper" for="address">Address<span class="requireds">*</span> </label>
									<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
										<textarea class="form-control" name="address" id="address" placeholder="Address"  data-bv-notempty="true" data-bv-notempty-message="Please enter Address"  data-bv-regexp-regexp="^[A-Za-z\#/,& .]+$" data-bv-stringlength="true" data-bv-stringlength-min="10"  data-bv-stringlength-max="150"><?php echo $row['address']; ?></textarea>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-4 col-md-4 label-title-upper" for="city_id">City<span class="requireds">*</span> </label>
									<div class="col-lg-8 col-sm-6 col-xs-12 form-group">   
										<select  class="form-control " id="city_id" name="city_id" data-bv-notempty="true" data-bv-notempty-message="Please select City" >
											<option value="">--Please Select--</option>
											<?php foreach ( $cities as $key => $value ){ ?>
											<option value="<?php echo $key; ?>" <?= ($row['city_id'] == $key) ? ' selected ':''; ?> ><?php echo $value; ?></option>
											<?php } ?>
										</select>					
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-4 col-md-4 label-title-upper" for="email">Email <span class="requireds">*</span> </label>
									<div class="col-lg-8 col-sm-6 col-xs-12 form-group">   
										<input data-bv-notempty="true" data-bv-notempty-message="Please enter email id" value="<?php echo $row['email']; ?>" type="email" class="form-control" name="email" id="email" placeholder="Email ID" data-bv-stringlength="true" data-bv-stringlength-max="30" data-bv-stringlength-message="Max. 30 Characters Allows"  >							
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-4 col-md-4 label-title-upper" for="login_code">Franchisee URL <span class="requireds">*</span> </label>
									<div class="col-lg-8 col-sm-6 col-xs-12 form-group">   
										<input data-bv-notempty="true" data-bv-notempty-message="Please enter Franchisee URL" value="<?php echo $row['franchisee_url']; ?>"  type="url" class="form-control" name="franchisee_url" id="franchisee_url" placeholder="Enter Franchisee URL"  >							
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-lg-4 col-md-4 label-title-upper" for="login_code">Login Code <span class="requireds">*</span> </label>
									<div class="col-lg-8 col-sm-6 col-xs-12 form-group">   
										<input data-bv-notempty="true" data-bv-notempty-message="Please enter Login Code" value="<?php echo $row['login_code']; ?>"  type="text" class="form-control" name="login_code" id="login_code" placeholder="Enter Login Code"  >							
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-4 col-md-4 label-title-upper" for="effective_date">Effective Date<span class="requireds">*</span></label>
									<div class="col-lg-8 col-sm-6 col-xs-12 form-group init_div"  >   
										<input data-bv-notempty="true" data-bv-notempty-message="Please Select Effective Date" id="effective_date" name="effective_date" value="<?php echo $row['effective_date']; ?>" class="date-picker form-control col-md-7 col-xs-12" type="text" placeholder="eg.mm/dd/yyyy" >
										<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>				
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-4 col-md-4 label-title-upper" for="expiration_date">Franchisee Expiration Date<span class="requireds">*</span></label>
									<div class="col-lg-8 col-sm-6 col-xs-12 form-group init_div"  >   
										<input data-bv-notempty="true" data-bv-notempty-message="Please Select Expiration Date" id="expiration_date" name="expiration_date" value="<?php echo $row['expiration_date']; ?>" class="date-picker form-control col-md-7 col-xs-12" type="text" placeholder="eg.mm/dd/yyyy" >
										<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>				
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-4 col-md-4 label-title-upper" for="active_status"> Active Status<span class="requireds">*</span></label>
									<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
										<?php $checked = ($row['active_status'] == '1') ? ' checked ':''; ?>
										<input type="checkbox" name="active_status" value="1" id="active_status" <?php echo $checked; ?> data-toggle="toggle" data-onstyle="primary" data-on="Active"data-off="Inactive" value="<?php echo $row['active_status'] ; ?>" data-offstyle="default" >
									</div>
								</div>

								<div class="form-group">
									<div class="col-lg-2 pull-left">
										<button type="button" onclick="this.form.action='<?php echo $listpage_url;?>';this.form.submit();" class=" btn bg-red btn-flat">Cancel</button>
									</div>
									<div class="col-lg-2 pull-right">
										<button type="submit" class="form-control btn bg-green btn-flat">Save</button>
									</div>
								</div>
							</div>	
						</div>	
													
						<!-- left side div end -->	
						<!-- <div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<div class="col-lg-2 pull-left">
										<button type="button" onclick="this.form.action='<?php echo $listpage_url;?>';this.form.submit();" class=" btn bg-red btn-flat">Cancel</button>
									</div>
									<div class="col-lg-2 pull-right">
										<button type="submit" class="form-control btn bg-green btn-flat">Save</button>
									</div>
								</div>
							</div>
						</div> -->
					</div>
					<!-- /.box-footer -->
				</form>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.col -->
	</div>
<!-- /.row -->
</section>
<!-- /.content -->
<?php endif; ?>		
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>	
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

	$(document).ready(function() {
		$('.date-picker').datepicker({ format: "yyyy/mm/dd" });
	}); 
</script>	
 <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>	