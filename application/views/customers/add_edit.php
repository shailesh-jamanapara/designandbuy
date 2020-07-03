<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Add New School
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
					<input type="hidden" name="customer_type" id="customer_type" value="school" />
					<input type="hidden" name="role_id" id="role_id" value="5" />
					<input type="hidden" name="status" id="status" value="1" />
							<div class="box-body">
							<!-- left side div -->
								<div class="col-sm-6">
									<div class="form-group">
										<label for="customer_name" class="col-sm-4 control-label">School Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="School Name" data-bv-notempty="true" data-bv-notempty-message="Please enter school name" value="<?php echo $row['customer_name']; ?>" >
										</div>
									</div>
									<div class="form-group">
										<label for="registration_no" class="col-sm-4 control-label">Registration No.</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="registration_no" name="registration_no" placeholder="Registration No."  data-bv-notempty="true" data-bv-notempty-message="Please enter registration no." data-bv-regexp="true" data-bv-regexp-regexp="^[a-zA-Z0-9]+$" data-bv-regexp-message="Registration number must be  alphabet only" data-bv-stringlength="true" data-bv-stringlength-min="4" data-bv-stringlength-max="15" data-bv-stringlength-message="Registration must be 4 to 15 characters" value="<?php echo $row['registration_no']; ?>">
										</div>
									</div>
									<div class="form-group">
										<label for="language" class="col-sm-4 control-label">Type</label>
											<div class="col-sm-8">
												<select class="form-control"  name="school_type_name" id="school_type_name" data-bv-notempty="true" data-bv-notempty-message="Please select school"  >
													<option value="" > --Select-- </option>
													<option value="pre-primary" <?php if( isset($row['school_type_name']) && $row['school_type_name'] == 'pre-primary' ) echo 'selected="selected"'; ?> > Pre-primary </option>
													<option value="primary" <?php if( isset($row['school_type_name']) && $row['school_type_name'] == 'primary' ) echo 'selected="selected"'; ?> > Primary </option>
													<option value="secondary" <?php if( isset($row['school_type_name']) && $row['school_type_name'] == 'secondary' ) echo 'selected="selected"'; ?> >Secondary </option>
													<option value="higher-secondary" <?php if( isset($row['school_type_name']) && $row['school_type_name'] == 'higher-secondary' ) echo 'selected="selected"'; ?>  > Higher-secondary </option>
												</select>
											</div>
									</div>
									<div class="form-group">
										<label for="language" class="col-sm-4 control-label">Meduim</label>
											<div class="col-sm-8">
												<select class="form-control"  name="school_medium_name" id="school_medium_name" data-bv-notempty="true" data-bv-notempty-message="Please select medium"  >
													<option value="" > --Select-- </option>
													<option value="english" <?php if( isset($row['school_medium_name']) && $row['school_medium_name'] == 'english' ) echo 'selected="selected"'; ?> >  English</option>
													<option value="hindi" <?php if( isset($row['school_medium_name']) && $row['school_medium_name'] == 'hindi' ) echo 'selected="selected"'; ?> >   Hindi </option>
													<option value="gujarati" <?php if( isset($row['school_medium_name']) && $row['school_medium_name'] == 'gujarati' ) echo 'selected="selected"'; ?> >  Gujarati </option>
												</select>
											</div>
									</div>
									<div class="form-group">
										<label for="address" class="col-sm-4 control-label">Address</label>
										<div class="col-sm-8">
											<textarea class="form-control" name="address" id="address" placeholder="School address" data-bv-notempty="true" data-bv-notempty-message="Please enter school address" data-bv-regexp="true" data-bv-regexp-regexp="^[a-zA-Z0-9_\.]+$" data-bv-regexp-message="Please enter valid address" data-bv-stringlength="true" data-bv-stringlength-min="20" data-bv-stringlength-max="300" data-bv-stringlength-message="Allowed min 20 & max. 300 characters " ><?php echo $row['address']; ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label for="city" class="col-sm-4 control-label">City</label>
										<div class="col-sm-4">
											<select class="form-control"  name="city_id" id="city_id" data-bv-notempty="true" data-bv-notempty-message="Please select city"  >
													<option value="" > --Select-- </option>
													<option value="1" <?php if( isset($row['city_id']) && $row['city_id'] == '1' ) echo 'selected="selected"'; ?> > Ahmedabad</option>
													<option value="2"  <?php if(  isset($row['city_id']) && $row['city_id'] == '2' ) echo 'selected="selected"'; ?>  > Gandhinagar </option>
													<option value="3" <?php if( isset($row['city_id']) && $row['city_id'] == '3' ) echo 'selected="selected"'; ?>  > Mehsana </option>
													<option value="4" <?php if( isset($row['city_id']) && $row['city_id'] == '4' ) echo 'selected="selected"'; ?>  > Baroda </option>
													<option value="5"  <?php if( isset($row['city_id']) && $row['city_id'] == '5' ) echo 'selected="selected"'; ?> > Surat </option>
													<option value="6"  <?php if( isset($row['city_id']) && $row['city_id'] == '6' ) echo 'selected="selected"'; ?> > Rajkot </option>
												</select>
										</div>
										<div class="col-sm-4">
											<input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode" data-bv-notempty="true" data-bv-notempty-message="Please enter school pincode" data-bv-regexp="true" data-bv-regexp-regexp="^[0-9]+$" data-bv-regexp-message="Please enter valid pincode" data-bv-stringlength="true" data-bv-stringlength-min="6" data-bv-stringlength-max="6" data-bv-stringlength-message="Pincode must be of 6 digits only" value="<?php echo $row['pincode']; ?>" >
										</div>
									</div>
									<!-- 
									<div class="form-group">
										<label for="latitude" class="col-sm-4 control-label">Lat-Long</label>
										<div class="col-sm-4">
											<input type="text" class="form-control" name="customer[lat]" id="latitude" placeholder="Latitude"  data-bv-regexp="true" data-bv-regexp-regexp="^[0-9\.]+$" data-bv-regexp-message="Please enter valid latitude" data-bv-stringlength="true" data-bv-stringlength-min="6" data-bv-stringlength-max="30" data-bv-stringlength-message="Latitute must be of 6 to 30 digits only">
										</div>
										<div class="col-sm-4">
											<input type="text" class="form-control" name="customer[long]" id="longitude" placeholder="Longitude" data-bv-regexp="true" data-bv-regexp-regexp="^[0-9\.]+$" data-bv-regexp-message="Please enter valid longitude" data-bv-stringlength="true" data-bv-stringlength-min="6" data-bv-stringlength-max="30" data-bv-stringlength-message="Longitude must be of 6 to 30 digits only">
										</div>
									</div>
									-->
								</div>
							<!-- left side div end -->	
							<!-- right side div -->
							<div class="col-sm-6">
								<div class="form-group">
									<label for="title" class="col-sm-4 control-label">Contact Person Name</label>
									<div class="col-sm-3">
										<select class="form-control"  name="title" id="title" data-bv-notempty="true" data-bv-notempty-message="Please select"  >
													<option value="" > --Select-- </option>
													<option value="Mr" <?php if( isset($row['title']) && $row['title'] == 'Mr' ) echo 'selected="selected"'; ?>  > Mr.</option>
													<option value="Mrs" <?php if(  isset($row['title']) &&  $row['title'] == 'Mrs' ) echo 'selected="selected"'; ?>  > Mrs.</option>
													<option value="Miss" <?php if(  isset($row['title']) &&  $row['title'] == 'Miss' ) echo 'selected="selected"'; ?>  > Miss </option>
													<option value="Dr" <?php if(  isset($row['title']) &&  $row['title'] == 'Dr' ) echo 'selected="selected"'; ?>  > Dr. </option>
													<option value="Prof" <?php if(  isset($row['title']) &&  $row['title'] == 'Prof' ) echo 'selected="selected"'; ?>  > Professor</option>
												</select>
									</div>
									<div class="col-sm-5">
										<input type="text" class="form-control" id="first_name" name="first_name"placeholder="Contact Person" data-bv-notempty="true" data-bv-notempty-message="Please enter contact person name"  data-bv-regexp="true" data-bv-regexp-regexp="^[a-zA-Z0-9_\.]+$" data-bv-regexp-message="Please enter valid name" data-bv-stringlength="true" data-bv-stringlength-min="3" data-bv-stringlength-max="60" data-bv-stringlength-message="Allowed min 3 & max. 60 characters " value="<?php echo $row['first_name']; ?>" >
									</div>
								</div>
								<div class="form-group">
									<label for="designation" class="col-sm-4 control-label">Designation</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="designation" name="designation" placeholder="e.g. Headmaster or Teacher " data-bv-notempty="true" data-bv-notempty-message="Please enter designation" data-bv-regexp="true" data-bv-regexp-regexp="^[a-zA-Z0-9_\.]+$" data-bv-regexp-message="Please enter valid designation" data-bv-stringlength="true" data-bv-stringlength-min="3" data-bv-stringlength-max="40" data-bv-stringlength-message="Allowed min 3 & max. 40 characters " value="<?php echo $row['designation']; ?>" >
									</div>
								</div>
								<div class="form-group">
									<label for="customer_name" class="col-sm-4 control-label">Department</label>
									<div class="col-sm-8">
										<select class="form-control" id="department_id" name="department_id"placeholder="e.g. Headmaster or Teacher "    >
													<option value="" > -- Please select -- </option>
													<option value="1" <?php if(  isset($row['department_id']) &&  $row['department_id'] == '1' ) echo 'selected="selected"'; ?> > Science </option>
													<option value="2" <?php if( isset($row['department_id']) &&   $row['department_id'] == '2' ) echo 'selected="selected"'; ?> > Commerce</option>
													<option value="3" <?php if( isset($row['department_id']) &&   $row['department_id'] == '3' ) echo 'selected="selected"'; ?> > Mathemetics</option>
													<option value="4" <?php if( isset($row['department_id']) &&  $row['department_id'] == '4' ) echo 'selected="selected"'; ?> > Account </option>
													<option value="5" <?php if( isset($row['department_id']) &&  $row['department_id'] == '5' ) echo 'selected="selected"'; ?> > Registrar </option>
													<option value="6" <?php if( isset($row['department_id']) &&  $row['department_id'] == '6' ) echo 'selected="selected"'; ?> > Head </option>
												</select>
									</div>
								</div>
								<div class="form-group">
									<label for="customer_name" class="col-sm-4 control-label">Contact No.</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="landline_no" name="landline_no" placeholder="Landline" data-bv-notempty="true" data-bv-notempty-message="Please enter landline number" value="<?php echo $row['landline_no']; ?>">
									</div>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="customer_mobile" name="customer_mobile" placeholder="Mobile Number" data-bv-notempty="true" data-bv-notempty-message="Please enter mobile number" data-bv-regexp="true" data-bv-regexp-regexp="^[0-9]+$" data-bv-regexp-message="Please enter valid mobile number" data-bv-stringlength="true" data-bv-stringlength-min="10" data-bv-stringlength-min="10" data-bv-stringlength-message="Mobile number should be 10 digits only"   value="<?php echo $row['mobile_no']; ?>"  >
									</div>
								</div>
								<div class="form-group">
									<label for="email" class="col-sm-4 control-label">Email</label>
									<div class="col-sm-8">
										<input type="email" class="form-control" id="email" name="email"placeholder="Email ID" data-bv-notempty="true" data-bv-notempty-message="Please enter email id"  value="<?php echo $row['email']; ?>" >
									</div>
								</div>
								<div class="form-group">
								  <label for="website" class="col-sm-4 control-label">Website</label>

								  <div class="col-sm-8">
									<input type="url" class="form-control" id="website" name="website"placeholder="Website"  value="<?php echo $row['website']; ?>">
								  </div>
								</div>
							</div>
							<!-- right side div end -->
							<div class="row">
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
							</div>
							
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
<script>
<?php if (!empty($postdata['task']) && $postdata['task'] == 'save' ){ ?>
		$(document).ready(function() {
			$('#frmsave').submit();
		});
	<?php } ?>	
	$(document).ready(function() {
			//$('#editform').bootstrapValidator();
		});
	function callback(){
		return "Here is custom message";
	}	
</script>	
 <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>	