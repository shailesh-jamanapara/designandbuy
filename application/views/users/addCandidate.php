<?php
defined('BASEPATH') OR exit('No direct script access Allows');
if (isset($Employee_info) && !empty($Employee_info)) {
    $Emp_Title = ucfirst($Employee_info[0]['First_Name']) . ' ' . ucfirst($Employee_info[0]['Last_Name']) . '/' . $Employee_info[0]['Emp_ID'];
}
if(isset($model['entity'])){
	$btn_save = ( $model['entity'] == 'new' ) ? false : true;
}
?>
<div class="right_col" role="main">
    <div class="container">
 <form name="frmsave" id="frmsave" method="post" action="<?php echo $listpage_url;?>">
                <input type="hidden" name="id" id="id" value="<?php if(isset($model['id'])) { echo $model['id']; } ?>" />
                <input type="hidden" name="user_role_id" id="user_role_id" value="employee" />
                <input type="hidden" name="search_for" id="order_type" value="<?php echo $postdata['search_for']; ?>" />
                <input type="hidden" name="search_by" id="sort_by" value="<?php echo $postdata['search_by']; ?>" />
                <input type="hidden" name="sort_by" id="order_type" value="<?php echo $postdata['sort_by']; ?>" />
                <input type="hidden" name="order_type" id="order_type" value="<?php echo $postdata['order_type']; ?>" />
                <input type="hidden" name="page" id="order_type" value="<?php echo $postdata['page']; ?>" />
                <input type="hidden" name="limit" id="limit" value="<?php echo $postdata['limit']; ?>" />
  </form>           

  <form class="form-horizontal form-label-left" novalidate method="post" action="" id="frm" name="frm"
						data-bv-message="This value is not valid"
						data-bv-feedbackicons-validating="glyphicon glyphicon-refresh"

				>
	<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="tab-content clearfix">
				<div class="tab-pane active" id="section_1">
				<input type="hidden" name="last_tab" id="last_tab" value="" />
				<input type="hidden" name="active_tab" id="active_tab" value="section_1" />
				<input type="hidden" name="action_to" id="action_to" value="" />
				<input type="hidden" name="task" id="task" value="save" />
				<input type="hidden" name="id" id="id" value="<?php echo $model['id']; ?>" />
				<input type="hidden" name="search_for" id="order_type" value="<?php echo $postdata['search_for']; ?>" />
				<input type="hidden" name="search_by" id="sort_by" value="<?php echo $postdata['search_by']; ?>" />
				<input type="hidden" name="sort_by" id="order_type" value="<?php echo $postdata['sort_by']; ?>" />
				<input type="hidden" name="order_type" id="order_type" value="<?php echo $postdata['order_type']; ?>" />
				<input type="hidden" name="page" id="order_type" value="<?php echo $postdata['page']; ?>" />
				<input type="hidden" name="limit" id="limit" value="<?php echo $postdata['limit']; ?>" />
				<input type="hidden" name="marital_status_id" id="marital_status_id" value="" />
					<input type="hidden" name="user_type" id="user_type" value="candidate" />
					<div class="row"> 
						<span class="section tab-title-upper screen_title"> Add New Candidate</span>
						 <div class="item form-group col-lg-5 col-lg-offset-1">
							<label class="control-label col-lg-4 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="first_name"> First Name</label>
							<div class="col-lg-3 form-group init_div"  >   
								<select class="form-control col-lg-1 " id="title" name="title">
								<option value="Mr.">Mr.</option>
								<option value="Mrs.">Mrs.</option>
								<option value="Miss.">Miss.</option>
								</select>						
							</div>
							<div class="col-lg-5 form-group">   
								<input type="text" data-bv-notempty="true" data-bv-notempty-message="Please enter first name" data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z\ .]+$" data-bv-regexp-message="Special Characters are not Allows" class="form-control" name="first_name" id="first_name" placeholder="First name" data-bv-stringlength="true" data-bv-stringlength-max="25" data-bv-stringlength-message="Max. 25 Characters Allows" type="text" class="form-control"   >						
							</div>
						 </div>
						 <div class="item form-group col-lg-3">
							<label class="control-label col-lg-5 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="middle_name">Middle Name<span class="requireds">*</span> </label>
							<div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group">   
								<input type="text" data-bv-notempty="true" data-bv-notempty-message="Please enter middle name" data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z\ .]+$" data-bv-regexp-message="Special Characters are not Allows" class="form-control" name="middle_name" id="middle_name" placeholder="Middle name" data-bv-stringlength="true" data-bv-stringlength-max="25" data-bv-stringlength-message="Max. 25 Characters Allows"  >						
							</div>
						 </div>
						 <div class="item form-group col-lg-3">
							<label class="control-label col-lg-5 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="last_name">Last Name<span class="requireds">*</span> </label>
							<div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group">   
								<input data-bv-notempty="true" data-bv-notempty-message="Please enter last name" data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z\ .]+$" data-bv-regexp-message="Special Characters are not Allows" type="text" class="form-control" name="last_name" id="last_name" placeholder="Last name" data-bv-stringlength="true" data-bv-stringlength-max="25" data-bv-stringlength-message="Max. 25 Characters Allows" >						
							</div>
						 </div>
					 </div>
					 <div class="row"> 
						 <div class="item form-group col-lg-5 col-lg-offset-1">
							<label class="control-label col-lg-4 label-title-upper" for="address">Marital Status<span class="requireds">*</span></label>
							<div class="col-lg-8 form-group init_div"  >   
										<label class="control-label label-title-upper">
															<input type="radio" class="flat form-control" name="marital_status" id="marital_status_1" value="0"  /> Married
											</label>
											<label class="control-label label-title-upper">
															<input  type="radio" class="flat form-control" name="marital_status" id="marital_status_2" value="1"  /> Single
											</label>
											<label class="control-label label-title-upper">		
															<input type="radio" class="flat form-control" name="marital_status" id="marital_status_3" value="2"  /> Divorced
											</label>	
						 </div>
						</div> 
						<div class="item form-group col-lg-3">
							<label class="control-label col-lg-5 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="email">Email <span class="requireds">*</span> </label>
							<div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group">   
								<input data-bv-notempty="true" data-bv-notempty-message="Please enter email id"  type="email" class="form-control" name="email" id="email" placeholder="Email ID" data-bv-stringlength="true" data-bv-stringlength-max="30" data-bv-stringlength-message="Max. 30 Characters Allows"  >							
							</div>
							</div>
						 <div class="item form-group col-lg-3">	
							<label class="control-label col-lg-5 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="state_id">Mobile No.<span class="requireds">*</span> </label>
							<div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group">   
								<input data-bv-notempty="true" data-bv-notempty-message="Please enter mobile no." data-bv-regexp="true" data-bv-regexp-regexp="^[0-9]+$" data-bv-regexp-message="Please enter only numeric value" data-bv-stringlength="true" data-bv-stringlength-min="10" data-bv-stringlength-max="10" type="text" class="form-control" data-bv-stringlength-message="Please enter 10 digits" name="phone_no" id="phone_no" placeholder="Mobile No" >							
							</div>
						 </div>
					</div>
						<div class="row"> 
							<div class="item form-group col-lg-4 col-lg-offset-1">
								<label class="control-label col-lg-5 label-title-upper" for="dob">DoB<span class="requireds">*</span></label>
								<div class="col-lg-6 form-group init_div"  >   
									<input data-bv-notempty="true" data-bv-notempty-message="Please enter dob" id="dob" name="dob" value="" class="date-picker form-control col-md-7 col-xs-12 " onChange="GetNextDate();"  type="text" placeholder="eg.mm/dd/yyyy" >
									<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>				
								</div>
							</div>
							<div class="item form-group col-lg-4">
								<label class="control-label col-lg-8 label-title-upper left-align" for="dob">Willing to work as per UK/USA Timings? <span class="requireds">*</span></label>
								<div class="col-lg-4 form-group init_div"  >   
									<label class="control-label label-title-upper candidate_type" for="to_work_offshore_timings1">
											<input  type="radio" class="flat form-control" name="to_work_offshore_timings" id="to_work_offshore_timings1" value="1" checked="checked" /> Yes
										</label>&nbsp;
							<label class="control-label label-title-upper candidate_type" for="to_work_offshore_timings0">
											<input   type="radio" class="flat form-control" name="to_work_offshore_timings" id="to_work_offshore_timings0" value="0"  /> No
							</label>			
								</div>
							</div>
							<div class="item form-group col-lg-3">
							<label class="control-label col-lg-5 label-title-upper" for="notice_period">Notice Period<span class="requireds">*</span></label>
								<div class="col-lg-7 form-group init_div"  >   
								<input type="text"  data-bv-notempty="true" data-bv-notempty-message="Please enter Notice Period"  data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z0-9 .]+$" data-bv-regexp-message="Please enter only numeric value" class="form-control" name="notice_period" id="notice_period" placeholder="e.g. 1 month" data-bv-stringlength="true" data-bv-stringlength-max="10" data-bv-stringlength-message="Max. 10 Characters Allows" >				
								</div>
							</div>
						</div>
					
					<div class="row"> 
						  <div class="item  col-lg-5">
						 <div class="col-lg-4 form-group  form-group init_div"  > 
						</div>						 
						 <div class="col-lg-8 form-group  form-group init_div"  >   
							<label class="control-label label-title-upper candidate_type">
											<input  type="radio" class="flat form-control" name="candidate_type" id="candidate_type_1" value="1" checked="checked" /> Experienced
							</label>&nbsp;
							<label class="control-label label-title-upper candidate_type">
											<input   type="radio" class="flat form-control" name="candidate_type" id="candidate_type_0" value="0"  /> Fresher
							</label>			
						 </div>
						</div> 
						 <div class="item form-group col-lg-3" id="div_attended_training">
							<label class="control-label col-lg-5 col-md-0 col-sm-0 col-xs-0 label-title-upper" >Taken Training <span class="requireds">*</span> </label>
							<div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group">   
								<label class="control-label label-title-upper candidate_type" for="attended_training_1">
											<input  type="radio" class="flat form-control" name="attended_training" id="attended_training_1" value="1"  /> Yes
							</label>&nbsp;
							<label class="control-label label-title-upper candidate_type" for="attended_training_0">
											<input   type="radio" class="flat form-control" name="attended_training" id="attended_training_0" value="0" checked="checked"  /> No
							</label>					
							</div>
							</div>
						 <div class="item form-group col-lg-3" id="div_current_ctc">
							<label class="control-label col-lg-5 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="current_ctc">Current CTC <span class="requireds">*</span> </label>
							<div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group">   
								<input data-bv-notempty="true" data-bv-notempty-message="Please enter Notice Period"  data-bv-regexp="true" data-bv-regexp-regexp="^[0-9]+$" data-bv-regexp-message="Please enter only numeric value"  type="text" class="form-control" name="current_ctc" id="current_ctc" placeholder="Current CTC" data-bv-stringlength="true" data-bv-stringlength-min="4" data-bv-stringlength-max="7" data-bv-stringlength-message="Allows between 1000 to 9999999"  >							
							</div>
							</div>
							 <div class="item form-group col-lg-3">	
							<label class="control-label col-lg-5 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="expected_ctc">Expected CTC<span class="requireds">*</span> </label>
							<div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group">   
								<input data-bv-notempty="true" data-bv-notempty-message="Please enter Notice Period"  data-bv-regexp="true" data-bv-regexp-regexp="^[0-9]+$" data-bv-regexp-message="Please enter only numeric value" type="text" class="form-control" name="expected_ctc" id="expected_ctc" placeholder="Expected CTC" data-bv-stringlength="true" data-bv-stringlength-min="4" data-bv-stringlength-max="7" data-bv-stringlength-message="Allows between 1000 to 9999999"  >							
							</div>
						 </div>
					</div>
					 <div class="row" id="div_experience_detail"> 
						
						 <div class="item form-group col-lg-5 col-lg-offset-1">
							<label class="control-label col-lg-4 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="users_employer_name">Current Employer <span class="requireds">*</span> </label>
							<div class="col-lg-8 col-md-1 col-sm-3 col-xs-12 form-group">   
								<input data-bv-notempty="true" data-bv-notempty-message="Please enter Notice Period" data-bv-regexp-regexp="^[A-Za-z0-9/,\ .]+$" data-bv-regexp-message="Special Characters are not Allows" type="text" class="form-control" name="users_employer_name" id="users_employer_name" placeholder="Employer Name" data-bv-stringlength="true" data-bv-stringlength-max="50" data-bv-stringlength-message="Max 50 Characters Allows"  >							
							</div>
							</div>
						 <div class="item form-group col-lg-3">	
							<label class="control-label col-lg-5 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="expected_ctc"> Phone No.<span class="requireds">*</span> </label>
							<div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group">   
								<input type="text"  data-bv-notempty="true" data-bv-notempty-message="Please enter Notice Period"  data-bv-regexp="true" data-bv-regexp-regexp="^[0-9]+$" data-bv-regexp-message="Please enter only numeric value"  class="form-control" name="users_employer_phone" id="users_employer_phone" placeholder="Phone No" data-bv-stringlength="true" data-bv-stringlength-min="8" data-bv-stringlength-max="10" data-bv-stringlength-message="Allows Min. 7 and Max. 10 Digits"  >							
							</div>
						 </div>
						 <div class="item form-group col-lg-3">
							<label class="control-label col-lg-5 label-title-upper" for="experience_years"> Website:<br></label>
							<div class="col-lg-7 form-group init_div" >   
								<input type="url" class="form-control" name="users_employer_website" id="users_employer_website" placeholder="Employer website URL" data-bv-stringlength="true" data-bv-stringlength-max="50" data-bv-stringlength-message="Allows Max. 50 Characters"  >		
							</div>
							
						</div> 
					</div>
					 <div class="row" id="div_employer_address"> 
						 <div class="item form-group col-lg-5 col-lg-offset-1">
							<label class="control-label col-lg-4 label-title-upper" for="users_employer_address">Current Designation<span class="requireds">*</span></label>
							<div class="col-lg-8 form-group init_div"  >   
									<input data-bv-notempty="true" data-bv-notempty-message="Please enter Address"  data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z0-9/,\ .]+$" data-bv-regexp-message="Special Characters are not Allows" type="text" class="form-control" name="users_employer_designation_joining" id="users_employer_designation_joining" placeholder="Current Designation"  data-bv-stringlength="true" data-bv-stringlength-max="50" data-bv-stringlength-message="Allows Max. 50 Characters" >			
						 </div>
						</div> 
						<div class="item form-group col-lg-3">
							<label class="control-label col-lg-5 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="duration_from_month"> Working From <span class="requireds">*</span> </label>
							<div class="col-lg-3 col-md-1 col-sm-3 col-xs-12 form-group">   
								<select  class="form-control " id="duration_from_month" name="duration_from_month" data-bv-notempty="true" data-bv-notempty-message="Please select month">
									<option value="">Month</option>
									<?php foreach ( $months_arr as $key => $value ){ ?>
									<option value="<?php echo $key; ?>"><?php echo $value['abbr']; ?></option>
									<?php } ?>
								</select>					
							</div>
							<div class="col-lg-4 col-md-1 col-sm-3 col-xs-12 form-group">   
								<select  class="form-control " id="duration_from_year" name="duration_from_year" data-bv-notempty="true" data-bv-notempty-message="Please select year">
									<option value="">Year </option>
									<?php for($i= date('Y'); $i>1980; $i--){ ?>
									<option value="$i"><?php echo $i; ?></option>
									<?php } ?>
								</select>					
							</div>
						</div>
						 <div class="item form-group col-lg-3">
							<label class="control-label col-lg-5 label-title-upper" for="experience_years"> Experience<span class="requireds">*</span><br><small>[Total]</small></label>
							<div class="col-lg-3 form-group init_div"  >   
								<select class="form-control col-lg-1 " id="experience_years" name="experience_years">
									<option value="0"> Years </option>
									<?php for($i=1; $i<50; $i++){ ?>
										<option value="<?php echo $i; ?>" > <?php echo $i; ?> Years</option>
									<?php } ?>
								</select>			
							</div>
							<div class="col-lg-4 form-group init_div"  >   
								<select class="form-control col-lg-1 " id="experience_months" name="experience_months">
									<option value="0"> Months </option>
									<?php for($i=1; $i<13; $i++){ ?>
										<option value="<?php echo $i; ?>" ><?php echo $i; ?>  Months</option>
									<?php } ?>
								</select>			
							</div>
						</div> 
					</div>	
					
					 <div class="row" id="div_employer_address"> 
						 <div class="item form-group col-lg-5 col-lg-offset-1">
							<label class="control-label col-lg-4 label-title-upper" for="users_employer_address">Employer Address<span class="requireds">*</span></label>
							<div class="col-lg-8 form-group init_div"  >   
									<input data-bv-notempty="true" data-bv-notempty-message="Please enter Address"  data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z0-9/,\ .]+$" data-bv-regexp-message="Special Characters are not Allows" type="text" class="form-control" name="address[employer]" id="users_employer_address" placeholder="Current Employer Address" data-bv-stringlength="true" data-bv-stringlength-max="200" data-bv-stringlength-message="Allows Max. 200 Characters">			
						 </div>
						</div> 
						<div class="item form-group col-lg-3">
							<label class="control-label col-lg-5 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="city_id">City<span class="requireds">*</span> </label>
							<div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group">   
								<select  class="form-control " id="city_id" name="city_id[employer]" data-bv-notempty="true" data-bv-notempty-message="Please select City" >
									<option value="">--Please Select--</option>
									<?php foreach ( $cities as $key => $value ){ ?>
									<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
									<?php } ?>
								</select>					
							</div>
							</div>
						 <div class="item form-group col-lg-3">	
							<label class="control-label col-lg-5 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="state_id">State<span class="requireds">*</span> </label>
							<div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group" data-bv-notempty="true" data-bv-notempty-message="Please select state">   
								<select  class="form-control " id="city_id" name="state_id[employer]">
									<option value="">--Please Select--</option>
									<?php foreach ( $states as $key => $value ){ ?>
									<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
									<?php } ?>
								</select>				
							</div>
						 </div>
					</div>	
					 <div class="row" id="div_centre_detail"> 
						 <div class="item form-group col-lg-5 col-lg-offset-1">
							<label class="control-label col-lg-4 label-title-upper" for="users_training_centre_name">Training Centre Name<span class="requireds">*</span></label>
							<div class="col-lg-8 form-group init_div"  >   
									<input data-bv-notempty="true" data-bv-notempty-message="Please Enter Centre Name"  data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z0-9/,\ .]+$" data-bv-regexp-message="Special Characters are not Allows" type="text" class="form-control" name="users_training_centre_name" id="users_training_centre_name" placeholder="Training Centre Name" data-bv-stringlength="true" data-bv-stringlength-max="50" data-bv-stringlength-message="Allows Max. 50 Characters" >			
						 </div>
						</div> 
						<div class="item form-group col-lg-3">
							<label class="control-label col-lg-5 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="from_month">From <span class="requireds">*</span> </label>
							<div class="col-lg-3 col-md-1 col-sm-3 col-xs-12 form-group">   
								<select  class="form-control " id="from_month" name="from_month" data-bv-notempty="true" data-bv-notempty-message="Please select month">
									<option value="">Month</option>
									<?php foreach ( $months_arr as $key => $value ){ ?>
									<option value="<?php echo $key; ?>"><?php echo $value['abbr']; ?></option>
									<?php } ?>
								</select>					
							</div>
							<div class="col-lg-4 col-md-1 col-sm-3 col-xs-12 form-group">   
								<select  class="form-control " id="from_year" name="from_year" data-bv-notempty="true" data-bv-notempty-message="Please select year">
									<option value="">Year </option>
									<?php for($i= date('Y'); $i>1980; $i--){ ?>
									<option value="$i"><?php echo $i; ?></option>
									<?php } ?>
								</select>					
							</div>
						</div>
						<div class="item form-group col-lg-3">
							<label class="control-label col-lg-5 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="to_month">To <span class="requireds">*</span> </label>
							<div class="col-lg-3 col-md-1 col-sm-3 col-xs-12 form-group">   
								<select  class="form-control " id="to_month" name="to_month" data-bv-notempty="true" data-bv-notempty-message="Please select month">
									<option value="">Month</option>
									<?php foreach ( $months_arr as $key => $value ){ ?>
									<option value="<?php echo $key; ?>"><?php echo $value['abbr']; ?></option>
									<?php } ?>
								</select>					
							</div>
							<div class="col-lg-4 col-md-1 col-sm-3 col-xs-12 form-group">   
								<select  class="form-control " id="to_year" name="to_year" data-bv-notempty="true" data-bv-notempty-message="Please select year">
									<option value="">Year </option>
									<?php for($i= date('Y'); $i>1980; $i--){ ?>
									<option value="$i"><?php echo $i; ?></option>
									<?php } ?>
								</select>					
							</div>
						</div>
					</div>
					 <div class="row" id="div_centre_address"> 
						 <div class="item form-group col-lg-5 col-lg-offset-1">
							<label class="control-label col-lg-4 label-title-upper" for="users_employer_address">Training Centre Address<span class="requireds">*</span></label>
							<div class="col-lg-8 form-group init_div"  >   
									<input data-bv-notempty="true" data-bv-notempty-message="Please Enter Address"  data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z0-9/,\ .]+$" data-bv-regexp-message="Special Characters are not Allows" type="text" class="form-control" name="address[centre]" id="users_employer_address" placeholder="Training Centre Address" data-bv-stringlength="true" data-bv-stringlength-max="200" data-bv-stringlength-message="Allows Max. 200 Characters">			
						 </div>
						</div> 
						<div class="item form-group col-lg-3">
							<label class="control-label col-lg-5 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="city_id">City<span class="requireds">*</span> </label>
							<div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group">   
								<select  class="form-control " id="city_id" name="city_id[centre]" data-bv-notempty="true" data-bv-notempty-message="Please select city">
									<option value="">--Please Select--</option>
									<?php foreach ( $cities as $key => $value ){ ?>
									<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
									<?php } ?>
								</select>					
							</div>
							</div>
						 <div class="item form-group col-lg-3">	
							<label class="control-label col-lg-5 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="state_id">State<span class="requireds">*</span> </label>
							<div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group">   
								<select  class="form-control " id="city_id" name="state_id[centre]" data-bv-notempty="true" data-bv-notempty-message="Please select state">
									<option value="">--Please Select--</option>
									<?php foreach ( $states as $key => $value ){ ?>
									<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
									<?php } ?>
								</select>				
							</div>
						 </div>
					</div>	
					<div class="row"> 
						 <div class="item form-group col-lg-5 col-lg-offset-1">
							<label class="control-label col-lg-4 label-title-upper" for="test_address">Candidate`s Address<span class="requireds">*</span></label>
							<div class="col-lg-8 form-group init_div"  >   
									<input data-bv-notempty="true" data-bv-notempty-message="Please enter address" type="text" class="form-control" name="address[candidate]" id="test_address" placeholder="Candidate`s Address" data-bv-stringlength="true" data-bv-stringlength-max="200" data-bv-stringlength-message="Allows Max. 200 Characters">			
						 </div>
						</div> 
						<div class="item form-group col-lg-3">
							<label class="control-label col-lg-5 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="city_id">City<span class="requireds">*</span> </label>
							<div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group">   
								<select  class="form-control " id="city_id" name="city_id[candidate]" data-bv-notempty="true" data-bv-notempty-message="Please select city">
									<option value="">--Please Select--</option>
									<?php foreach ( $cities as $key => $value ){ ?>
									<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
									<?php } ?>
								</select>					
							</div>
							</div>
						 <div class="item form-group col-lg-3">	
							<label class="control-label col-lg-5 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="state_id">State<span class="requireds">*</span> </label>
							<div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group">   
								<select  class="form-control " id="city_id" name="state_id[candidate]" data-bv-notempty="true" data-bv-notempty-message="Please select state">
									<option value="">--Please Select--</option>
									<?php foreach ( $states as $key => $value ){ ?>
									<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
									<?php } ?>
								</select>				
							</div>
						 </div>
					</div>
					<div class="row"> 
						 <div class="item form-group col-lg-5 col-lg-offset-1">
							<label class="control-label col-lg-4 label-title-upper" for="opening_id">Applied For<span class="requireds">*</span></label>
							<div class="col-lg-8 form-group init_div"  >   
								<select  class="form-control " id="opening_id" name="opening_id" data-bv-notempty="true" data-bv-notempty-message="Please select opening">
									<option value="">--Please Select--</option>
									<?php foreach ( $openings as $key => $value ){ ?>
									<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
									<?php } ?>
								</select>		
						 </div>
						</div> 
						<div class="item form-group col-lg-3">
							<label class="control-label col-lg-5 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="date_applied">Applied On<span class="requireds">*</span> </label>
							<div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group">   
								<input data-bv-notempty="true" data-bv-notempty-message="Please enter date" id="date_applied" name="date_applied" value="" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" onChange="GetNextDate();"  type="text" placeholder="eg.mm/dd/yyyy" >
								<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>						
							</div>
							</div>
						 <div class="item form-group col-lg-3">	
							<label class="control-label col-lg-5 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="status"> Status<span class="requireds">*</span> </label>
							<div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group">   
								<select  class="form-control " id="status" name="status" data-bv-notempty="true" data-bv-notempty-message="Please select application status">
									<option value="">--Application Status--</option>
									<option value="2"> Applied </option>
									<option value="3"> Selected </option>
									<option value="4"> Rejected</option>
									<option value="5"> On Hold</option>
								</select>				
							</div>
						 </div>
					</div>
					
					<div class="form-group action_buttons">
						<div class="col-md-3 col-md-offset-1">
							<button type="button" onclick="$('input#task').val('');this.form.action='<?php echo base_url();?>index.php/Users/list_candidates/candidate';this.form.submit();" class="btn btn-danger">Cancel</button>
							<button type="submit"  name="btn_1" value="Save" class="btn btn-success">Save</button>	
						</div>
					</div>	
			</div>
			<!--  Tab 3 -->
			<div class="ln_solid"></div>	
		</div>
		</div>
   </form>				
</div>
</div>
<!-- /page content -->
<script>
<?php if (!empty($postdata['task']) && $postdata['task'] == 'save' ){ ?>
		$(document).ready(function() {
			$('#frmsave').submit();
		});
	<?php } ?>	
		
	$(document).ready(function () {
        $('input.flat.insurance').on('ifChecked', function (event) {
            if ($(this).val() == 1) {
                $('.Insurance_No').show();
            } else {
                $('.Insurance_No').hide();
            }
        });
		
        // $( "input.insurance" ).trigger( "click" );

        /*$("div .iCheck-helper").click({
         if ($(this).prop("checked") == true) {
         $('#Insurance_No').attr('required', true);
         } else {
         $('#Insurance_No').attr('required', false);
         }
         });*/

        /****************** Bosstrap Timepicker **********************/
        $('#working_hours_from').timepicker({
            minuteStep: 30,
            defaultTime: '10:00 AM'

        });
        $('#working_hours_to').timepicker({
            minuteStep: 30,
            defaultTime: '08:00 PM'
        });

        /****************** Pan Number Uppercase function **********************/
        $("#pan").bind('keyup', function (e) {
            if (e.which >= 97 && e.which <= 122) {
                var newKey = e.which - 32;
                // I have tried setting those
                e.keyCode = newKey;
                e.charCode = newKey;
            }

            $("#pan").val(($("#pan").val()).toUpperCase());
        });




        /***************** Criminal Record detail field ************************/
        $('input [name=past_criminal_record]').change(function () {
            if ($(this).val() == '0') {
                //$('#past_criminal_detail').css("display","block");
                $('#past_criminal_detail_box').slideDown();
            } else {
                $('#past_criminal_detail_box').slideUp();
            }

        });


        /********** add method for pancard validation *********/
        $.validator.addMethod("pan", function (value, element) {
            return this.optional(element) || /^[A-Z]{5}\d{4}[A-Z]{1}$/.test(value);
        }, "Invalid Pan Number");

        /******* add method for blood group verify *******/
        $.validator.addMethod("blood", function (value, element) {
            return this.optional(element) || /^(a|b|ab|o|A|B|AB|O)[+-]$/.test(value);
        }, "Invalid Blood Group");

        /********* add method for age verify **********/
        $.validator.addMethod("ageverify", function (value, element) {
            if (this.optional(element)) {
                return true;
            }
            var today = new Date();
            var birthDate = new Date(value);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }

            if (age < 18) {
                return false;
            } else {
                return true;
            }

            //return true;
        }, 'Age must be 18 Year or above!');

        /*************** append and remove class ****************/


        $(document).on('click', '.add-btn', function (e) {

            e.preventDefault();
            var controlForm = $(this).parents('.tbl-family .append_section_family:first'),
                    currentEntry = $(this).parents('.entry_family:first'),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);

            newEntry.find('input, select').val('');
            // controlForm.find('.entry_family:first a').remove();

            controlForm.find('.entry_family:not(:last) a').empty().append('<i style="font-size:25px;color:#da1818 ;" class="fa fa-remove remove-btn" data-toggle="tooltip" data-placement="top" title="Remove"></i>');

            controlForm.find('.entry_family:last a').empty().append('<i style="font-size:25px;color:#da1818 ;" class="fa fa-remove remove-btn" data-toggle="tooltip" data-placement="top" title="Remove"></i>&nbsp;<i style="font-size:25px;color:#26b99a;" class="fa fa-plus add-btn" data-toggle="tooltip" data-placement="top" title="Add"></i>');
            tooltip();
            datepicker_call();

        }).on('click', '.remove-btn', function (e) {
            var controlForm = $(this).parents('.tbl-family .append_section_family:first');

            if ($(this).is(".entry_family:last .remove-btn") && $(this).is(".entry_family:first .remove-btn")) {
                alert('first-last');

            } else if ($(this).is(".entry_family:last .remove-btn")) {

                controlForm.find('.entry_family:nth-last-child(2) a ').empty().append('<i style="font-size:25px;color:#da1818 ;" class="fa fa-remove remove-btn" data-toggle="tooltip" data-placement="top" title="Remove"></i>&nbsp;<i style="font-size:25px;color:#26b99a;" class="fa fa-plus add-btn" data-toggle="tooltip" data-placement="top" title="Add"></i>');

                $(this).parents('.entry_family:first').remove();

                controlForm.find('.entry_family:first .remove-btn');
            } else {
                $(this).parents('.entry_family:first').remove();
            }
            e.preventDefault();
            tooltip();
            return false;
        });

        GetNextDate();
    });

    /****** get date after particular month *********/
    function GetNextDate() {

        var addmonthcode = $('#Months_Bond').val(); //or whatever offset
        if (addmonthcode == 1) {
            addmonth = 12;
        } else if (addmonthcode == 2) {
            addmonth = 18;
        } else if (addmonthcode == 3) {
            addmonth = 24;
        } else {
            addmonth = 0;
        }
        var CurrentDate = $('#joining_date').val();
        //alert(addmonth+'---'+CurrentDate); //return false;
        if (CurrentDate) {
            CurrentDate = new Date(CurrentDate.substring(6, 10),
                    CurrentDate.substring(0, 2) - 1,
                    CurrentDate.substring(3, 5)
                    );

            CurrentDate.setMonth(CurrentDate.getMonth() + addmonth);
            var year = CurrentDate.getFullYear();
            var month = (1 + CurrentDate.getMonth()).toString();
            var day = CurrentDate.getDate().toString();
            //day = day.length > 1 ? day : '0' + day;
            if (day > 14) {
                month = parseInt(month) + 1;
            }
            //month = month.length > 1 ? month : '0' + month;
            if (month == 1) {
                month = 'January';
            } else if (month == 2) {
                month = 'February';
            } else if (month == 3) {
                month = 'March';
            } else if (month == 4) {
                month = 'April';
            } else if (month == 5) {
                month = 'May';
            } else if (month == 6) {
                month = 'June';
            } else if (month == 7) {
                month = 'July';
            } else if (month == 8) {
                month = 'August';
            } else if (month == 9) {
                month = 'September';
            } else if (month == 10) {
                month = 'October';
            } else if (month == 11) {
                month = 'November';
            } else if (month == 12) {
                month = 'December';
            }

            var nextDate = month + ' ' + year;
            $('#Bond_To_Date').val(nextDate);
            //alert(nextDate);
        } else {
            return false;
        }
    }
/*
Starts added by shailesh
*/
$(document).ready(function() {
	$('#date_applied').on('change', function(e) { $('#frm').bootstrapValidator('revalidateField', 'date_applied');});
	//$('#div_attended_training').find('input, select, radio').prop('disabled', true);
	$('#div_attended_training').css('display', 'none');
	
	$('#div_centre_address').css('display', 'none');
	$('#div_centre_detail').css('display', 'none');
	
	$('input[name="candidate_type"]').on('ifClicked', function(event){
		$('input#attended_training_0').attr('checked', false);
		$('input#attended_training_1').attr('checked', false);
		if( (this.value) == 1 ){
			$('#div_current_ctc').find('input, select, radio').prop('disabled', false);
			$('#div_current_ctc').slideUp();
			$('#div_current_ctc').css('display', 'block');
			$('#div_attended_training').find('input, select, radio').prop('disabled', true);
			$('#div_attended_training').css('display', 'none');
			$('#div_employer_address').find('input, select').prop('disabled', false);
			$('#div_employer_address').css('display', 'block');
			$('#div_employer_address').find('input, select').prop('disabled', false);
			$('#div_employer_address').css('display', 'block');
			$('#div_experience_detail').css('display', 'block');
			$('#div_centre_address').find('input, select').prop('disabled', true);
			$('#div_centre_address').css('display', 'none');
			$('#div_centre_detail').css('display', 'none');
			
		}
		if( (this.value) == 0 ){
			$('#div_current_ctc').find('input, select, radio').prop('disabled', true);
			$('#div_current_ctc').slideDown();
			$('#div_current_ctc').css('display', 'none');
			$('#div_attended_training').find('input, select, radio').prop('disabled', false);
			$('#div_attended_training').css('display', 'block');
			$('#div_employer_address').find('input, select').prop('disabled', true);
			$('#div_employer_address').css('display', 'none');
			$('#div_employer_address').find('input, select').prop('disabled', true);
			$('#div_employer_address').css('display', 'none');
			$('#div_experience_detail').css('display', 'none');
			
		}
	});
	
	$('input[name="attended_training"]').on('ifClicked', function(event){
		if( (this.value) == 1 ){
			$('#div_centre_address').find('input, select').prop('disabled', false);
			$('#div_centre_address').css('display', 'block');
			$('#div_centre_detail').css('display', 'block');
		}
		if( (this.value) == 0 ){
			$('#div_centre_address').find('input, select').prop('disabled', true);
			$('#div_centre_address').css('display', 'none');
			$('#div_centre_detail').css('display', 'none');
		}
	});
	//enable_section(1);
	$('#frm').bootstrapValidator();
	/*
	$('#frm').bootstrapValidator().on('success.form.bv', function(e) {
		// Prevent form submission
		e.preventDefault();
		var url = '<?php echo $ajax_url; ?>';
		var $form = $(e.target);
		var bv = $form.data('bootstrapValidator');
		// Use Ajax to submit form data
		$.post(url, $form.serialize(), function(result) {
			if(result != 'success'){
				var arr = result.split('^');
				var err ='<small class="help-block error_email" data-bv-validator="emailAddress" data-bv-for="email" data-bv-result="INVALID" style="display: block;" display="block"> '+arr[2]+' </small>';
				$("input#"+arr[1]).parent('div.form-group ').append(err);
				$("input#"+arr[1]).parent('div.form-group ').addClass('has-error');
				return false;
			}
			var active_tab = $("#active_tab").val();
			var arr = active_tab.split("_");
			var next_id = Number(Number(arr[1])+1);	
			var next_tab = "li_"+next_id;
			var next_a = "a"+next_id;
			$("li#"+next_tab).css("display","block");
			$("a#"+next_a).trigger('click');
			if(  active_tab == 'section_4'){
				var form_action_url = '<?php echo $listpage_url ;?>';
				$('form#frmsave').attr('action', form_action_url).submit();
			}
		});
		$('.btn-success').prop("disabled", false);
	});
	*/
	$('input#dob').on('change', function(){
		var is_valid = validateDoB($(this).val());
		if(is_valid == false){
			$(this).css('border-color', '#a94442');
			$(this).parent().parent().css('font-color', '#a94442');
			$(this).val('');
			$(this).append('<small class="help-block" data-bv-validator="notEmpty" data-bv-for="dob" data-bv-result="INVALID" style="display:block">Invalid Date. Age Should be greater then 18 years</small>');
		}
		if(is_valid == true){
			$('#lbl_dob').css('border-color', '#3c763d');
			$('#lbl_dob').css('color', '#3c763d');
			
		}		
	});
	
});
function showEmployerDiv(){}
function showTrainerDiv(){}
function hideEmployerDiv(){}
function hideTrainerDiv(){}
function enable_section(section_no){
	$('form#frm').find('input#active_tab').val('section_'+section_no);
	var section = 'div#section_2';
	$('#frm').find('.form-control').each(function(){ $(this).prop('disabled',true); });
	var section = 'div#section_'+section_no;
	
	$(section).find('.form-control').each(function(){
		$(this).prop('disabled',false);
	});
}
function validateDoB(dob){
	 var today = new Date();
		var birthDate = new Date(dob);
		var age = today.getFullYear() - birthDate.getFullYear();
		var m = today.getMonth() - birthDate.getMonth();
		if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
			age--;
		}
		if (age < 18) {
			return false;
		} else {
			return true;
		}
			
}
function activaTab(tab){
    $('.nav-tabs a[href="#' + tab + '"]').tab('show');
};
function setvalidations(){
	// data-bv-regexp="true" data-bv-regexp-regexp="^[0-9]+$" data-bv-regexp-message="Only numeric value Allows"
	$('#current_ctc').attr('data-bv-notempty', 'true');
	$('#current_ctc').attr('data-bv-notempty-message', 'Please enter value');
	$('#current_ctc').attr('data-bv-regexp', 'true');
	$('#current_ctc').attr('data-bv-regexp-regexp', '^[0-9]+$');
	$('#current_ctc').attr('data-bv-regexp-message', 'Only numeric value Allows');
	// data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z0-9/,\ .]+$" data-bv-regexp-message="Please enter valid value" 
	$('#users_employer_name').attr('data-bv-notempty', 'true');
	$('#users_employer_name').attr('data-bv-notempty-message', 'Please enter value');
	$('#users_employer_name').attr('data-bv-regexp', 'true');
	$('#users_employer_name').attr('data-bv-regexp-regexp', '^[A-Za-z0-9/,\ .]+$');
	$('#users_employer_name').attr('data-bv-regexp-message', 'Please enter valid value');
	
	$('#users_employer_phone').attr('data-bv-notempty', 'true');
	$('#users_employer_phone').attr('data-bv-notempty-message', 'Please enter value');
	$('#users_employer_phone').attr('data-bv-regexp', 'true');
	$('#users_employer_phone').attr('data-bv-regexp-regexp', '^[0-9]+$');
	$('#users_employer_phone').attr('data-bv-regexp-message', 'Please enter valid value');
	
	$('#experience_years').attr('data-bv-notempty', 'true');
	$('#experience_years').attr('data-bv-notempty-message', 'Please enter value');
	$('#experience_years').attr('data-bv-regexp', 'true');
	
	$('#experience_months').attr('data-bv-notempty', 'true');
	$('#experience_months').attr('data-bv-notempty-message', 'Please enter value');
	
}
/*
Ends added by shailesh
*/	
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>