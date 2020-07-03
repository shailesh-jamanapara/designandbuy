<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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

  <form class="form-horizontal form-label-left" novalidate method="post" action="" id="frm" data-bv-message="This value is not valid" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" autocomplete="off">
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
				<input type="hidden" name="listpage_url" id="listpage_url" value="<?php echo $postdata['listpage_url']; ?>" />
				<input type="hidden" name="marital_status_id" id="marital_status_id" value="" />
				<input type="hidden" name="user_type" id="user_type" value="employee" />
					<div class="row"> 
					<span class="section tab-title-upper screen_title"> Add New Employee</span>
					 <div class="item form-group col-lg-2 ">
						 <label class="control-label col-lg-6 label-title-upper" for="title">Prefix<span class="requireds">*</span></label>
						 <div class="col-lg-6 form-group init_div"  >   
									<select class="form-control col-lg-2 " id="title" name="title">
									   <option value="Mr.">Mr.</option>
									   <option value="Mrs.">Mrs.</option>
									   <option value="Miss.">Miss.</option>
									</select>						
							</div>
					 </div>
					  <div class="item form-group col-lg-2 ">
						 <label class="control-label col-lg-0 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="first_name"> </label>
						 <div class="col-lg-12 form-group">   
									<input type="text"  data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z\ .]+$" data-bv-regexp-message="Special Characters are not allowed" class="form-control" name="first_name" id="first_name" placeholder="First name" value="" <?php echo $data_bv['first_name']; ?> >						
							</div>
					 </div>
					 <div class="item form-group col-lg-4 col-md-1 col-sm-3 col-xs-12">
						 <label class="control-label col-lg-6 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="middle_name">Middle Name<span class="requireds">*</span> </label>
						 <div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group">   
									<input type="text" data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z\ .]+$" data-bv-regexp-message="Special Characters are not allowed" class="form-control" name="middle_name" id="middle_name" placeholder="Middle name" value=""  >						
							</div>
					 </div>
					  <div class="item form-group col-lg-4 col-md-1 col-sm-3 col-xs-12">
						 <label class="control-label col-lg-5 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="last_name">Last Name<span class="requireds">*</span> </label>
						 <div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group">   
									<input data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z\ .]+$" data-bv-regexp-message="Special Characters are not allowed" type="text" class="form-control" name="last_name" id="last_name" placeholder="Last name" value="" <?php echo $data_bv['last_name']; ?>>						
							</div>
					 </div>
					</div>
					<div class="row"> 
					 <div class="item form-group col-lg-4 col-md-1 col-sm-3 col-xs-12">
						 <label class="control-label col-lg-3 col-md-2 col-sm-3 col-xs-12 label-title-upper" for="title">Gender <span class="requireds">*</span> </label>
						 <div class="col-lg-9 col-md-1 col-sm-3 col-xs-12 form-group">   
							<label class="control-label label-title-upper">
													<input type="radio" class="flat form-control" name="gender" id="gender_1" value="1" /> Male
									</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<label class="control-label label-title-upper">
													<input   type="radio" class="flat form-control" name="gender" id="gender_0" value="0"   /> Female
									</label>
						</div>
					 </div>
					  <div class="item form-group col-lg-1 col-md-1 col-sm-3 col-xs-12">
					  </div>
					<!-- 
					<div class="item form-group col-lg-2 col-md-1 col-sm-3 col-xs-12">
						<label class="control-label col-lg-6 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="initial">Initial<span class="requireds">*</span> </label>
						<div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group init_div">   
						<input data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z\ .]+$" data-bv-regexp-message="Special Characters are not allowed" type="text" class="form-control" name="initial" id="initial" placeholder="Initial" value="" <?php echo $data_bv['initial']; ?>>						
						</div>
					</div>
					-->
					<!-- 
					 <div class="item form-group col-lg-3 col-md-1 col-sm-3 col-xs-12">
						 <label class="control-label col-lg-3 col-md-2 col-sm-3 col-xs-12 label-title-upper" for="title">Gender<span class="requireds">*</span> </label>
						 <div class="col-lg-9 col-md-1 col-sm-3 col-xs-12 form-group">   
							<label class="control-label label-title-upper">
													<input type="radio" class="flat form-control" name="gender" id="gender_1" value="1"  /> Male
									</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<label class="control-label label-title-upper">
													<input   type="radio" class="flat form-control" name="gender" id="gender_0" value="0"  /> Female
									</label>					
						</div>
					 </div>
					-->
					 <div class="item form-group col-lg-3 ">
						 <label class="control-label col-lg-4  label-title-upper" for="aadhar_no">Aadhar No.<span class="requireds">*</span> </label>
						 <div class="col-lg-8 col-md-1 form-group">   
									<input type="text" class="form-control" name="aadhar_no" id="aadhar_no" placeholder="Aadhar No." value="" <?php echo $data_bv['aadhar_no']; ?>>						
							</div>
					 </div>
					 <div class="item form-group col-lg-4 col-md-1 col-sm-3 col-xs-12">
						 <label class="control-label col-lg-5 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="position_id">Full Name <small class="small"><br>[As Per Aadhar]</small><span class="requireds">*</span> </label>
						 <div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group">   
									<input type="text" class="form-control" name="aadhar_name" id="aadhar_name" placeholder="Full Name as per Aadhar card" value="" <?php echo $data_bv['aadhar_name']; ?>>						
							</div>
					 </div>
					</div>
					<div class="row"> 
					 <div class="item form-group col-lg-4 col-md-1 col-sm-3 col-xs-12">
						 <label class="control-label col-lg-3 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="dob" id="lbl_dob">DoB<span class="requireds">*</span> </label>
						 <div class="col-lg-4 col-md-1 col-sm-3 col-xs-12 form-group">   
									<input required id="dob" name="dob" value=" " class="date-picker form-control col-md-7 col-xs-12 " type="text" placeholder="mm/dd/yyyy" >
								<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>						
						  </div>
						   <label class="control-label col-lg-3 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="blood_group">Initial<span class="requireds">*</span> </label>
						 <div class="col-lg-2 col-md-1 col-sm-3 col-xs-12 form-group">   
									<input data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z\ .]+$" data-bv-regexp-message="Special Characters are not allowed" type="text" class="form-control" name="initial" id="initial" placeholder="Initial" value="" <?php echo $data_bv['initial']; ?>>	
												
							</div>
					 </div>
					    <div class="item form-group col-lg-4 col-md-1 col-sm-3 col-xs-12">
					<label class="control-label col-lg-6 col-md-5 col-sm-3 col-xs-12 label-title-upper" for="date_applied">Blood Group:</label>   
					 <div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group">   
									<input type="text" class="form-control col-md-7 col-xs-12 input-small" placeholder="eg. O+"  maxlength="6" name="blood_group" id="blood_group" value="" <?php echo $data_bv['blood_group']; ?>>			
						</div>
					</div>
					 <div class="item form-group col-lg-4 col-md-1 col-sm-3 col-xs-12 text-right">
						 <div class="col-lg-11 col-md-1 col-sm-3 col-xs-12 form-group pull-right div_radios">   
							 <label class="control-label col-lg-4 col-md-0 col-sm-0 col-xs-0 label-title-upper text-right" for="marital_status">Marital Status<span class="requireds">*</span> </label>
									<label class="control-label label-title-upper">
															<input  type="radio" class="flat form-control" name="marital_status" id="marital_status_1" value="0"  /> Married
											</label>
											<label class="control-label label-title-upper">
															<input  type="radio" class="flat form-control" name="marital_status" id="marital_status_2" value="1"  /> Single
											</label>
											<label class="control-label label-title-upper">		
															<input  type="radio" class="flat form-control" name="marital_status" id="marital_status_3" value="2"  /> Divorced
											</label>						
							</div>
					 </div>
					
					</div>
					<div class="row"> 
					<div class="item form-group col-lg-4 text-right">
					 <label class="control-label col-lg-3 col-md-2 col-sm-3 col-xs-12 label-title-upper" for="title">Bond<span class="requireds">*</span> </label>
					 <div class="col-lg-3 col-md-1 col-sm-3 col-xs-12 form-group">   
							<select class="form-control" id="bond_period" name="bond_period" <?php echo $data_bv['bond_period']; ?>>
							   <option value=""> Months </option>
								<option value="12" > 12 </option>
								<option value="18" > 18 </option>
								<option value="24" > 24 </option>
							</select>					
					</div>
					 <label class="control-label col-lg-2 col-md-2 col-sm-3 col-xs-12 label-title-upper" for="title">Date:<span class="requireds">*</span> </label>
					 <div class="col-lg-4 col-md-1 col-sm-3 col-xs-12 form-group">   
						<input id="bond_to_date" name="bond_to_date" value="" class="date-picker form-control col-md-7 col-xs-12 "  type="text" placeholder="mm/dd/yyyy" >
							<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>						
					</div>
					</div>
					<div class="item form-group col-lg-6 col-md-1 col-sm-3 col-xs-12">
					 <label class="control-label col-lg-4 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="reporting_manager_id">Employment Type<span class="requireds">*</span> </label>
					 <div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group div_radios">   
							<label class="control-label label-title-upper">
									<input    type="radio" class="flat form-control" name="employment_status" id="employment_status_1" value="0" checked="checked" /> Full Time</label>
							<label class="control-label label-title-upper">	
									<input   type="radio" class="flat form-control" name="employment_status" id="employment_status_2" value="1"  /> Part Time</label>
							<label class="control-label label-title-upper">	
									<input   type="radio" class="flat form-control" name="employment_status" id="employment_status_2" value="2" /> Temporary</label>							
						</div>
					</div>
					</div>
					<div class="row">  
					<div class="item form-group col-lg-4 col-md-1 col-sm-3 col-xs-12">
						 <label class="control-label col-lg-3 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="phone_no">Phone<span class="requireds">*</span> </label>
						 <div class="col-lg-9 col-md-1 col-sm-3 col-xs-12 form-group">   
									<input data-bv-regexp="true" data-bv-regexp-regexp="^[0-9]+$" data-bv-regexp-message="Only numeric value allowed"  type="text" class="form-control" name="phone_no" id="phone_no" placeholder="Phone No." value=""  <?php echo $data_bv['phone_no']; ?>>						
							</div>
					 </div>
					 <div class="item form-group col-lg-4 col-md-1 col-sm-3 col-xs-12">
						 <label class="control-label col-lg-6 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="mobile_1">Mobile 1 <small class="small"> [Optional] </small></label>
						 <div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group">   
									<input  data-bv-regexp="true" data-bv-regexp-regexp="^[0-9]+$" data-bv-regexp-message="Only numeric value allowed" type="text" class="form-control" name="mobile_1" id="mobile_1" placeholder="Mobile 1" value="" <?php echo $data_bv['mobile_1']; ?>>						
							</div>
					 </div>
					 <div class="item form-group col-lg-4 col-md-1 col-sm-3 col-xs-12">
						 <label class="control-label col-lg-5 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="mobile_2">Mobile 2 <small class="small"> [Optional] </small></label>
						 <div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group">   
									<input  data-bv-regexp="true" data-bv-regexp-regexp="^[0-9]+$" data-bv-regexp-message="Only numeric value allowed" type="text" class="form-control" name="mobile_2" id="mobile_2" placeholder="Mobile 2" value="" <?php echo $data_bv['mobile_2']; ?>>						
							</div>
					 </div>
					</div>
					<div class="row"> 			
					<div class="item form-group col-lg-4 col-md-1 col-sm-3 col-xs-12">
						 <label class="control-label col-lg-3 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="email">Email<span class="requireds">*</span> </label>
						 <div class="col-lg-9 col-md-1 col-sm-3 col-xs-12 form-group">   
									<input type="email" class="form-control" name="email" id="email" placeholder="Email" value=""  <?php echo $data_bv['email']; ?>>						
							</div>
					 </div>
					 <div class="item form-group col-lg-4 col-md-1 col-sm-3 col-xs-12">
						 <label class="control-label col-lg-6 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="official_email">Email <small class="small"> [Official] </small></label>
						 <div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group">   
									<input type="email" class="form-control" name="official_email" id="official_email" placeholder="Email Official" />						
							</div>
					 </div>
					 <div class="item form-group col-lg-4 col-md-1 col-sm-3 col-xs-12">
						 <label class="control-label col-lg-5 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="skype_id">Skype <small class="small"> [Official] </small></label>
						 <div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group">   
									<input type="text" class="form-control" name="skype_id" id="skype_id" placeholder="Skype Official" value="" <?php echo $data_bv['skype_id']; ?>>						
							</div>
					 </div>
					</div>
					<div class="row"> 		
					<div class="item form-group col-lg-2 col-md-1 col-sm-3 col-xs-12">
					<label class="control-label col-lg-6 col-md-6 col-sm-3 col-xs-12 label-title-upper">PAN</label>   
					<div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group">   
								<input  data-bv-regexp="true" data-bv-regexp-regexp="^[A-Z0-9]+$" data-bv-regexp-message="Only numeric &  capital letters  allowed" type="text" class="form-control col-md-7 col-xs-12" name="pf_code_no" id="pf_code_no" maxlength="20" placeholder="PAN" value=""  <?php echo $data_bv['pf_code_no']; ?>>				
						</div>
					</div>
					<div class="item form-group col-lg-2 col-md-1 col-sm-3 col-xs-12">
					<label class="control-label col-lg-4 col-md-6 col-sm-3 col-xs-12 label-title-upper">PF NO. :  <small class="small"> </small></label>   
					 <div class="col-lg-8 col-md-1 col-sm-3 col-xs-12 form-group">   
								<input type="text" class="form-control col-md-7 col-xs-12" name="pf_code_no" id="pf_code_no" maxlength="20" placeholder=" [UAN NO]" value=""  <?php echo $data_bv['pf_code_no']; ?>>				
						</div>
					</div>
					<div class="item form-group col-lg-4 col-md-1 col-sm-3 col-xs-12">
					 <label class="control-label col-lg-6 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="username">Employee CODE<span class="requireds">*</span> </label>
					 <div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group">   
								<input  data-bv-regexp="true" data-bv-regexp-regexp="^[A-Z0-9]+$" data-bv-regexp-message="Only numeric &  capital letters  allowed" type="text" class="form-control" name="username" id="username" placeholder="Employee Code" value="" <?php echo $data_bv['username']; ?>>						
						</div>
					</div>
					<div class="item form-group col-lg-4 col-md-1 col-sm-3 col-xs-12">
					 <label class="control-label col-lg-5 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="position_id">Insurance Policy No.<span class="requireds">*</span> </label>
					 <div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group">   
								<input type="text" class="form-control" name="insurance_no" id="insurance_no" placeholder="Insurance Policy No." value="" <?php echo $data_bv['insurance_no']; ?>>						
						</div>
					</div>

					</div>
					<div class="row" >	 
					<div class="item form-group col-lg-4 col-md-1 col-sm-3 col-xs-12">
					 <label class="control-label col-lg-3 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="department">Department <span class="requireds">*</span> </label>
					 <div class="col-lg-9 col-md-1 col-sm-3 col-xs-12 form-group">   
								<select  class="form-control col-md-7 col-xs-12" id="department_id" name="department_id" <?php echo $data_bv['department_id']; ?>>
										 <option value="">--Please Select Department--</option>
												 <?php foreach ( $departments as $key => $value ): ?>
												   <option value="<?php echo $key; ?>" ><?php echo $value; ?></option>
												 <?php endforeach; ?>
								 </select>						
						</div>
					</div>
					<div class="item form-group col-lg-4 col-md-1 col-sm-3 col-xs-12">
						 <label class="control-label col-lg-6 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="reporting_manager_id">Reporting Manager </label>
						 <div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group">   
								<select <?php echo $data_bv['reporting_manager_id']; ?>  class="form-control select2_single" id="reporting_manager_id" name="reporting_manager_id" maxlength="2">
									 <option value="">--Please Select Manager-- </option>
											 <?php foreach ( $managers as $key => $value ): ?>
											   <option value="<?php echo $key; ?>" ><?php echo $value; ?></option>
											 <?php endforeach; ?>
							 </select>						
							</div>
					 </div>
					 <div class="item form-group col-lg-4 col-md-1 col-sm-3 col-xs-12">
						 <label class="control-label col-lg-7 label-title-upper pull-left" for="reporting_manager_id">Date of Employment Commenced<span class="requireds">*</span> </label>
						 <div class="col-lg-5 col-md-1 col-sm-3 col-xs-12 form-group">   
								<input data-bv-notempty="true" data-bv-notempty-message="This field is required"   id="joining_date" name="joining_date" value="" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right"   type="text" placeholder="eg.mm/dd/yyyy" >
							<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>						
							</div>
					 </div>
					</div>
					<div class="row"> 		 
					 <div class="item form-group col-lg-4 col-md-1 col-sm-3 col-xs-12">
					 <label class="control-label col-lg-3 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="position_id">Position<span class="requireds">*</span> </label>
					 <div class="col-lg-9 col-md-1 col-sm-3 col-xs-12 form-group">   
								 <select class="form-control" id="position_id" name="position_id" <?php echo $data_bv['position_id']; ?>>
										 <option value="">--  Select Position-- </option>
												 <?php foreach ( $positions as $key => $value ): ?>
												   <option value="<?php echo $key; ?>" ><?php echo $value; ?></option>
												 <?php endforeach; ?>
								 </select>					
						</div>
					</div>
					<div class="item form-group col-lg-4 col-md-1 col-sm-3 col-xs-12 ">
						 <label class="control-label col-lg-6 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="working_hours_from">Ordinary Working Hours:<span class="requireds">*</span> </label>
						 <div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group input-group bootstrap-timepicker timepicker">   
								<input   <?php echo $data_bv['working_hours_from']; ?>  type="text" class="form-control input-small"  maxlength="10" name="working_hours_from" id="working_hours_from" value="">
									<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>					
						</div>
					 </div>

					<div class="item form-group col-lg-4 col-md-1 col-sm-3 col-xs-12 ">
					 <label class="control-label col-lg-5 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="working_hours_to">To:<span class="requireds">*</span> </label>
					 <div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group input-group bootstrap-timepicker timepicker">   
							<input   <?php echo $data_bv['working_hours_to']; ?>  type="text" class="form-control input-small"  maxlength="10" name="working_hours_to" id="working_hours_to" value="">
								<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>					
					</div>
					</div>
					</div>
					<div class="row" >
					<div class="item form-group col-lg-4 col-md-1 col-sm-3 col-xs-12">
						 <label class="control-label col-lg-3 label-title-upper pull-left" for="reporting_manager_id">Date of Exit<span class="requireds">*</span> </label>
						 <div class="col-lg-9 col-md-1 col-sm-3 col-xs-12 form-group">   
								<input data-bv-notempty="true" data-bv-notempty-message="This field is required" id="date_of_exit" name="date_of_exit" value="" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right"   type="text" placeholder="eg.mm/dd/yyyy" >
							<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>						
							</div>
					 </div>
					<div class="item form-group col-lg-4 col-md-1 col-sm-3 col-xs-12 ">
					<label class="control-label col-md-6 col-sm-3 col-xs-12 label-title-upper " for="past_criminal_record">PAST CRIMINAL RECORD:</label>
					<div class="col-lg-6 col-md-3 col-sm-3 col-xs-12 form-group">   
						<label class="control-label label-title-upper"  for="past_criminal_record_0">
								<input  type="radio" class="flat form-control" name="past_criminal_record" id="past_criminal_record_0" value="0" /> No</label>
						<label class="control-label label-title-upper" for="past_criminal_record_1">	
								<input   type="radio" class="flat form-control" name="past_criminal_record" id="past_criminal_record_1" value="1"  /> Yes</label>	
					</div>
					</div>
					<div class="item form-group col-lg-4 col-lg-offset-1 col-md-1 col-sm-3 col-xs-12 ">
					<label class="control-label col-lg-5 col-md-4 col-sm-3 col-xs-12 label-title-upper " for="active_status">Active Status:</label>
					<div class="col-lg-6 col-md-3 col-sm-3 col-xs-12 form-group">   
						<label class="control-label label-title-upper"  for="active_status0">
								<input  type="radio" class="flat form-control" name="active_status" id="active_status0" value="1" /> Active</label>
						<label class="control-label label-title-upper" for="active_status1">	
								<input   type="radio" class="flat form-control" name="active_status" id="active_status1" value="0" /> Inactive</label>	
					</div>
					</div>
					</div>
					<div class="row">
						<div class="col-lg-9 col-lg-offset-3" style="display:none" id="past_criminal_detail_box" >
							<label class="control-label col-lg-4 col-md-4 col-sm-3 col-xs-12 label-title-upper" for="past_criminal_detail">PAST CRIMINAL DETAIL:</label>
							 <div class="col-lg-8 col-md-1 col-sm-3 col-xs-12 form-group">   
									<textarea id="past_criminal_detail" name="past_criminal_detail" maxlength="400" placeholder="Past Criminal Detail" class="form-control col-md-7 col-xs-12"  <?php echo $data_bv['past_criminal_detail']; ?>></textarea>
								</div>
						 </div>
						
					</div>
					<div class="form-group action_buttons">
						<div class="col-md-3 col-md-offset-1">
							<button type="button" onclick="$('input#task').val('');this.form.action='<?php echo base_url().'index.php/users/list_employees'; ?>';this.form.submit();" class="btn btn-danger">Cancel</button>
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
            //$('#Bond_To_Date').val(nextDate);
            //alert(nextDate);
        } else {
            return false;
        }
    }
/*
Starts added by shailesh
*/
$(document).ready(function() {
	
	$('#dob').on('change', function(e) { $('#frm').bootstrapValidator('revalidateField', 'dob');});
	$('#bond_to_date').on('change', function(e) { $('#frm').bootstrapValidator('revalidateField', 'bond_to_date');});
	$('#date_of_exit').on('change', function(e) { $('#frm').bootstrapValidator('revalidateField', 'date_of_exit');});
	$('#joining_date').on('change', function(e) { $('#frm').bootstrapValidator('revalidateField', 'joining_date');});

	$('input#email').on('change', function(){
		$('input#email').attr('data-bv-notempty-message', 'Please enter Email ID' );
        validateEmail($(this).val());
	});
	$('input#username').on('change', function(){
		validateEmployeeCode($(this).val());
	});
	$('input#official_email').on('change', function(){
		$('input#official_email').attr('data-bv-notempty-message', 'Please enter Official  Email ID' );
        validateOfficialEmail($(this).val());
	});
	$('input[name="past_criminal_record"]').on('ifClicked', function(event){
		if( (this.value) == 0 ){
			//$('#past_criminal_detail_box').css('display','block');	
			$('#past_criminal_detail_box').slideUp();
		}
		if( (this.value) == 1 ){
			//$('#past_criminal_detail_box').css('display','none');
			$('#past_criminal_detail_box').slideDown();			
		}
	});
	$('input#email').on('change', function(){
		$('small.error_email').remove();
	});
	$('input#email_secondary').on('change', function(){
		$('small.error_email').remove();
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
	
});
function validateEmployeeCode(val){
	var url = '<?php echo $ajax_url; ?>checkEmployeeDuplicateCode';
		// Use Ajax to submit form data
		$.post(url, {'id' : 0, 'value' : val}, function(result){
			if(result == 'invalid'){
				$('input#username').val('');
				 $('#frm').bootstrapValidator('revalidateField', 'username');
				
			}
		});
}
function validateEmail(val){
	var url = '<?php echo $ajax_url; ?>checkEmployeeDuplicateEmail';
		// Use Ajax to submit form data
		$.post(url, {'id' : 0, 'value' : val}, function(result){
			if(result == 'invalid'){
				$('input#email').val('');
				 $('#frm').bootstrapValidator('revalidateField', 'email');
			}
		});
}
function validateOfficialEmail(val){
	var url = '<?php echo $ajax_url; ?>checkEmployeeDuplicateOfficialEmail';
		// Use Ajax to submit form data
		$.post(url, {'id' : 0, 'value' : val}, function(result){
			if(result == 'invalid'){
				$('input#official_email').val('');
				 $('#frm').bootstrapValidator('revalidateField', 'official_email');
			}
		});
}
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
/*
Ends added by shailesh
*/	
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>