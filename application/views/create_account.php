  <!-- ======== @Region: #content ======== -->
  <div id="content">
             <div class="container">
	<form id="frm_create_account"  method="post" action="" class="form-horizontal form-login form-wrapper form-large">
    <input type="hidden" name="task" id="task" value="create_account" />
	   <input type="hidden" name="department_id" id="department_id" value="5" />
	   <input type="hidden" name="school_type_name" id="school_type_name" value="all" />
	   <input type="hidden" name="random" id="random" value="<?php echo $postdata['random']; ?>" />
      <!-- Product view -->
      <div class="row">
	 
							<!-- left side div -->
										<div class="col-lg-6">
											<div class="row form-group">
												<label for="customer_type" class="col-lg-4 control-label">Profile</label>
												<div class="col-lg-8">
													<select class="form-control"  name="customer_type" id="customer_type" data-bv-notempty="true" data-bv-notempty-message="Please select" onchange="javascript:changePreset($(this).val());" >
															<option value="" > --Select-- </option>
															<option value="corporate" <?php if( isset($row['customer_type']) && $row['customer_type'] == 'Corporate' ) echo 'selected="selected"'; ?>  > Corporate</option>
															<option value="institute" <?php if(  isset($row['customer_type']) &&  $row['customer_type'] == 'Institute' ) echo 'selected="selected"'; ?>  > Institute</option>
															<option value="school" <?php if(  isset($row['customer_type']) &&  $row['customer_type'] == 'School' ) echo 'selected="selected"'; ?>  > School </option>
															<option value="organization" <?php if(  isset($row['customer_type']) &&  $row['customer_type'] == 'organization' ) echo 'selected="selected"'; ?>  > Organization</option>
														</select>
												</div>
											</div>
											<div class="row form-group">
												<label for="customer_name" class="col-lg-4 control-label" id="label_customer_name"> Name</label>
												<div class="col-lg-8">
													<input type="text" class="form-control" id="customer_name" name="customer_name"placeholder=" Name" data-bv-notempty="true" data-bv-notempty-message="Please enter  name" value="" >
												</div>
											</div>
											<div class="row form-group   school-div">
												<label for="registration_no" class="col-lg-4 control-label">Registration No.</label>
												<div class="col-lg-8">
													<input type="text" class="form-control" id="registration_no" name="registration_no" placeholder="Registration No."  data-bv-notempty="true" data-bv-notempty-message="Please enter registration no." data-bv-regexp="true" data-bv-regexp-regexp="^[a-zA-Z0-9]+$" data-bv-regexp-message="Registration number must be  alphabet only" data-bv-stringlength="true" data-bv-stringlength-min="4" data-bv-stringlength-max="15" data-bv-stringlength-message="Registration must be 4 to 15 characters" value="">
												</div>
											</div>
											<!-- 
											<div class="row form-group school-div  ">
												<label for="language" class="col-lg-4 control-label">Type</label>
													<div class="col-lg-8">
														<select class="form-control"  name="school_type_name" id="school_type_name" data-bv-notempty="true" data-bv-notempty-message="Please select school"  >
															<option value="" > --Select-- </option>
															<option value="pre-primary" <?php if( isset($row['school_type_name']) && $row['school_type_name'] == 'pre-primary' ) echo 'selected="selected"'; ?> > Pre-primary </option>
															<option value="primary" <?php if( isset($row['school_type_name']) && $row['school_type_name'] == 'primary' ) echo 'selected="selected"'; ?> > Primary </option>
															<option value="secondary" <?php if( isset($row['school_type_name']) && $row['school_type_name'] == 'secondary' ) echo 'selected="selected"'; ?> >Secondary </option>
															<option value="higher-secondary" <?php if( isset($row['school_type_name']) && $row['school_type_name'] == 'higher-secondary' ) echo 'selected="selected"'; ?>  > Higher-secondary </option>
														</select>
													</div>
											</div>
											-->
											<div class="row form-group  school-div ">
												<label for="language" class="col-lg-4 control-label">Meduim</label>
													<div class="col-lg-8">
														<select class="form-control"  name="school_medium_name" id="school_medium_name" data-bv-notempty="true" data-bv-notempty-message="Please select medium"  >
															<option value="" > --Select-- </option>
															<option value="english" <?php if( isset($row['school_medium_name']) && $row['school_medium_name'] == 'english' ) echo 'selected="selected"'; ?> >  English</option>
															<option value="hindi" <?php if( isset($row['school_medium_name']) && $row['school_medium_name'] == 'hindi' ) echo 'selected="selected"'; ?> >   Hindi </option>
															<option value="gujarati" <?php if( isset($row['school_medium_name']) && $row['school_medium_name'] == 'gujarati' ) echo 'selected="selected"'; ?> >  Gujarati </option>
														</select>
													</div>
											</div>
											<div class="row form-group   ">
												<label for="address" class="col-lg-4 control-label">Address</label>
												<div class="col-lg-8">
													<textarea class="form-control" name="address" id="address" placeholder="Address" data-bv-notempty="true" data-bv-notempty-message="Please enter address" data-bv-regexp="true" data-bv-regexp-regexp="^[a-zA-Z0-9_\/, .]+$" data-bv-regexp-message="Please enter valid address" data-bv-stringlength="true" data-bv-stringlength-min="20" data-bv-stringlength-max="300" data-bv-stringlength-message="Allowed min 20 & max. 300 characters " ></textarea>
												</div>
											</div>
											<div class="row form-group   ">
												<label for="city" class="col-lg-4 control-label">City</label>
												<div class="col-lg-4">
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
												<div class="col-lg-4">
													<input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="Pincode" data-bv-notempty="true" data-bv-notempty-message="Please enter pincode" data-bv-regexp="true" data-bv-regexp-regexp="^[0-9]+$" data-bv-regexp-message="Please enter valid pincode" data-bv-stringlength="true" data-bv-stringlength-min="6" data-bv-stringlength-max="6" data-bv-stringlength-message="Pincode must be of 6 digits only" value="" >
												</div>
											</div>
											<div class="row form-group   ">
												<label for="customer_name" class="col-lg-4 control-label">Billing Name</label>
												<div class="col-lg-8">
													<input type="text" class="form-control" id="billing_name" name="billing_name"placeholder="Billing Name" data-bv-notempty="true" data-bv-notempty-message="Please enter Billing Name" value="" >
												</div>
											</div>
											<div class="row form-group   ">
												<label for="customer_name" class="col-lg-4 control-label">Billing Address</label>
												<div class="col-lg-8">
													<textarea class="form-control" name="billing_address" id="billing_address" placeholder="Billing Address" data-bv-notempty="true" data-bv-notempty-message="Please enter Billing Address" data-bv-regexp="true" data-bv-regexp-regexp="^[a-zA-Z0-9_\/, .]+$" data-bv-regexp-message="Please enter valid address" data-bv-stringlength="true" data-bv-stringlength-min="20" data-bv-stringlength-max="300" data-bv-stringlength-message="Allowed min 20 & max. 300 characters " ></textarea>
												</div>
											</div>
											<div class="row form-group  ex-school-div ">
												<label for="customer_name" class="col-lg-4 control-label">GST Number</label>
												<div class="col-lg-8">
													<input type="text" value=""  class="form-control" id="gst_no" name="gst_no"placeholder="GST Number" data-bv-regexp="true" data-bv-regexp-regexp="^[a-zA-Z0-9]+$" data-bv-regexp-message="Please enter valid GST Number" data-bv-stringlength="true" data-bv-stringlength-min="5" data-bv-stringlength-max="20" data-bv-stringlength-message="Allowed min 5 & max. 20 characters " >
												</div>
											</div>
											<!-- 
											<div class="row form-group">
												<label for="latitude" class="col-lg-4 control-label">Lat-Long</label>
												<div class="col-lg-4">
													<input type="text" class="form-control" name="customer[lat]" id="latitude" placeholder="Latitude"  data-bv-regexp="true" data-bv-regexp-regexp="^[0-9\.]+$" data-bv-regexp-message="Please enter valid latitude" data-bv-stringlength="true" data-bv-stringlength-min="6" data-bv-stringlength-max="30" data-bv-stringlength-message="Latitute must be of 6 to 30 digits only">
												</div>
												<div class="col-lg-4">
													<input type="text" class="form-control" name="customer[long]" id="longitude" placeholder="Longitude" data-bv-regexp="true" data-bv-regexp-regexp="^[0-9\.]+$" data-bv-regexp-message="Please enter valid longitude" data-bv-stringlength="true" data-bv-stringlength-min="6" data-bv-stringlength-max="30" data-bv-stringlength-message="Longitude must be of 6 to 30 digits only">
												</div>
											</div>
											-->
										</div>
									<!-- left side div end -->	
									<!-- right side div -->
									<div class="col-lg-6">
										<div class="row form-group   ">
											<label for="title" class="col-lg-4 control-label">Contact Person Name</label>
											<div class="col-lg-3">
												<select class="form-control"  name="title" id="title" data-bv-notempty="true" data-bv-notempty-message="Please select"  >
															<option value="" > --Select-- </option>
															<option value="Mr" <?php if( isset($row['title']) && $row['title'] == 'Mr' ) echo 'selected="selected"'; ?>  > Mr.</option>
															<option value="Mrs" <?php if(  isset($row['title']) &&  $row['title'] == 'Mrs' ) echo 'selected="selected"'; ?>  > Mrs.</option>
															<option value="Miss" <?php if(  isset($row['title']) &&  $row['title'] == 'Miss' ) echo 'selected="selected"'; ?>  > Miss </option>
															<option value="Dr" <?php if(  isset($row['title']) &&  $row['title'] == 'Dr' ) echo 'selected="selected"'; ?>  > Dr. </option>
															<option value="Prof" <?php if(  isset($row['title']) &&  $row['title'] == 'Prof' ) echo 'selected="selected"'; ?>  > Professor</option>
														</select>
											</div>
											<div class="col-lg-5">
												<input type="text" class="form-control" id="first_name" name="first_name"placeholder="Contact Person" data-bv-notempty="true" data-bv-notempty-message="Please enter contact person name"  data-bv-regexp="true" data-bv-regexp-regexp="^[a-zA-Z0-9_\ . ]+$" data-bv-regexp-message="Please enter valid name" data-bv-stringlength="true" data-bv-stringlength-min="3" data-bv-stringlength-max="60" data-bv-stringlength-message="Allowed min 3 & max. 60 characters " value="" >
											</div>
										</div>
										<div class="row form-group   ">
											<label for="designation" class="col-lg-4 control-label">Login Username</label>
											<div class="col-lg-8">
												<input type="text" class="form-control" id="username" name="username" placeholder="Your Login Username" data-bv-notempty="true" data-bv-notempty-message="Please enter designation" data-bv-regexp="true" data-bv-regexp-regexp="^[a-z]+$" data-bv-regexp-message="Please enter valid username" data-bv-stringlength="true" data-bv-stringlength-min="5" data-bv-stringlength-max="12" data-bv-stringlength-message="Allowed min 5 & max. 12 characters " value="" >
											</div>
										</div>
										<div class="row form-group   ">
											<label for="designation" class="col-lg-4 control-label">Designation</label>
											<div class="col-lg-8">
												<input type="text" class="form-control" id="designation" name="designation" placeholder="" data-bv-notempty="true" data-bv-notempty-message="Please enter designation" data-bv-regexp="true" data-bv-regexp-regexp="^[a-zA-Z0-9_\ ]+$" data-bv-regexp-message="Please enter valid designation" data-bv-stringlength="true" data-bv-stringlength-min="3" data-bv-stringlength-max="40" data-bv-stringlength-message="Allowed min 3 & max. 40 characters " value="" >
											</div>
										</div>
										<div class="row form-group   ">
											<label for="customer_name" class="col-lg-4 control-label">Contact No.</label>
											<div class="col-lg-4">
												<input type="text" class="form-control" id="landline_no" name="landline_no" placeholder="Landline" data-bv-notempty="true" data-bv-notempty-message="Please enter landline number" value="">
											</div>
											<div class="col-lg-4">
												<input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Mobile Number" data-bv-notempty="true" data-bv-notempty-message="Please enter mobile number" data-bv-regexp="true" data-bv-regexp-regexp="^[0-9]+$" data-bv-regexp-message="Please enter valid mobile number" data-bv-stringlength="true" data-bv-stringlength-min="10" data-bv-stringlength-min="10" data-bv-stringlength-message="Mobile number should be 10 digits only"   value=""  >
											</div>
										</div>
										<div class="row form-group   ">
											<label for="email" class="col-lg-4 control-label">Email</label>
											<div class="col-lg-8">
												<input type="email" class="form-control" id="email" name="email"placeholder="Email ID" data-bv-notempty="true" data-bv-notempty-message="Please enter email id"  value="" >
											</div>
										</div>
										<div class="row form-group   ">
										  <label for="website" class="col-lg-4 control-label">Website</label>

										  <div class="col-lg-8">
											<input type="url" class="form-control" id="website" name="website"placeholder="Website"  value="">
										  </div>
										</div>
										<div class="row form-group">
										  	<div class="col-lg-12">
											  <input type="checkbox" name="agreed_terms" data-bv-notempty="true" data-bv-notempty-message="Please check to agree our terms and policy"  /> I agree <a href="<?php echo base_url();?>index.php/Cms/terms" target="_blank" >Terms</a> and <a href="<?php echo base_url();?>index.php/Cms/policies" target="_blank"> Policy </a>.
										  	</div>
										</div>
										<div class="row form-group   ">
										  	<div class="col-lg-12">
										  		<button type="submit" class="btn btn-primary btn-rounded btn-md mt-3 pull-right"> Submit </button>
										  	</div>
										</div>
									</div>
									<!-- right side div end -->
                               </div> 
	   </form>
       </div> 
      </div>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>	
<script>
$(document).ready(function() {
	$('#frm_create_account').bootstrapValidator();
	
});
function changePreset(ctype){
	if(ctype == 'school' || ctype == 'institute'){
		$('div.school-div').css('display','flex');
		$('div.ex-school-div').css('display','none');
		
	}
	if(ctype != 'school'){
		$('div.school-div').css('display','none');
		$('div.ex-school-div').css('display','flex');
	}
	$('label#label_customer_name').text(ctype+' Name');
	$('label#label_customer_name').css('text-transform','capitalize');
}
$('input#username').on('change', function(){
	var uname = $(this).val();
	var ajax_url = '<?php echo $ajax_url; ?>';
	var url = ajax_url+'checkUserName';
	$.ajax({
		url:url,
		data:{username:uname},
		dataType: 'html',  // what to expect back from the PHP script, if anything
		cache: false,
		type:"post",
		success:function(response){
			var resp = response;
			console.log(resp);
			if(resp == 'invalid'){
				$('input#username').val('');
				alert('User name '+uname+' is not available. please choose another.');
				return false;	
			}
		}
	});

});
</script>