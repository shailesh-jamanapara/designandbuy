<?php defined('BASEPATH') OR exit('No direct script access allowed'); 


/*
* 12-20-2016
* edit_detail page(view/employee)
*/
//echo '<pre>'; print_r($Employee_info); //exit;
if(isset($Employee_info) && !empty($Employee_info)){
	$Emp_Title = ucfirst($Employee_info[0]['First_Name']).' '.ucfirst($Employee_info[0]['Last_Name']).'/'.$Employee_info[0]['Emp_ID'];
} //echo $Emp_Title; exit;
?>
<?php $query = $this->db->query("SELECT Position,Role_ID,Prefix,Role_Assign,First_Name,Middle_Name,Last_Name,Gender,DOB,Phone_Number,Zipcode1,Zipcode2,Mobile1,Email,Secondary_Email,Assign_Manager,Mobile2,Emergancy_Contact_Number1,Emergancy_Contact_Name1,Emergancy_Contact_Relation1,Emergancy_Contact_Name2,Emergancy_Contact_Relation2,Emergancy_Contact_Number2,Blood_Group,Past_Criminal_Record,Past_Criminal_Detail,Short_Name,Address,Permanent_Address,Pan_Number,Joining_Date,Employeement_Status,Emp_Active_Status,Odinary_Work_Hours_To,Odinary_Work_Hours_From,Months_Bond,Bond_To_Date,
 Referance_Name_1,Referance_Relation_1,Referance_Number_1,Referance_Name_2,Referance_Relation_2,Referance_Number_2,Referance_Name_3,Referance_Relation_3,Referance_Number_3 FROM employe where status='1' and Emp_ID='".$Emp_ID."'");
			$row = $query->row();
			/*echo '<PRE>';
			print_r($row); 
			exit;*/
			?>


			  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 
                  <div class="x_content">
				 <div class="" id="emp_detail" >
						<?php if(validation_errors() ){
							echo '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'.validation_errors().'</div><script>setTimeout(function(){$("#emp_detail").slideUp();},3000);</script>';
						}?>
					</div>
                  
                    <form class="form-horizontal form-label-left" novalidate method="post" action="<?php echo base_url(); ?>index.php/Employee/emp_detail_insert" id="Emp_Detail_Form">
					  <input type="hidden" id="Emp_ID" name="Emp_ID" value="<?php echo $Emp_ID; ?>">
                      <span class="section">Personal Information
					
					  </span>

                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="First_Name"><span class="requireds">*</span> FIRST NAME:</label>
						<div class="col-md-1 col-sm-3 col-xs-12">   
						
						<select class="form-control col-md-1 col-xs-4" id="Prefix" name="Prefix">
							   <option value="1"  <?php if(isset($row->Prefix) && $row->Prefix == '1' ){echo 'selected';}else{ set_select('Prefix[]','1');}?> >Mr.</option>
								<option value="2" <?php if(isset($row->Prefix) && $row->Prefix == '2' ){echo 'selected';}else{ set_select('Prefix[]','2');}?> >Mrs.</option>
								<option value="3" <?php if(isset($row->Prefix) && $row->Prefix == '3' ){echo 'selected';}else{ set_select('Prefix[]','3');}?> >Dr.</option>
								<option value="4" <?php if(isset($row->Prefix) && $row->Prefix == '4' ){echo 'selected';}else{ set_select('Prefix[]','4');}?> >Prof.</option>								
								<option value="5" <?php if(isset($row->Prefix) && $row->Prefix == '5' ){echo 'selected';}else{ set_select('Prefix[]','5');}?> >Miss.</option>						
							  </select>
							  </div>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" id="First_Name" name="First_Name" value="<?php if(set_value('First_Name')){echo set_value('First_Name');}else{ echo $row->First_Name;} ?>"  placeholder="First Name" maxlength="50" required="required" type="text">
                        </div>
						
						<label class="control-label col-md-1 col-sm-3 col-xs-12" for="Middle_Name">MIDDLE NAME:</label>
                        <div class="col-md-1 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" id="Middle_Name" maxlength="10" name="Middle_Name" value="<?php if(set_value('Middle_Name')){echo set_value('Middle_Name');}else{ echo $row->Middle_Name;} ?>"  placeholder="Middle Name" type="text">
                        </div>
						
						<label class="control-label col-md-2 col-sm-3 col-xs-12" for="Last_Name"><span class="requireds">*</span> LAST NAME:</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" id="Last_Name" name="Last_Name" maxlength="50" value="<?php if(set_value('Last_Name')){echo set_value('Last_Name');}else{ echo $row->Last_Name;} ?>" placeholder="Last Name" required="required" type="text">
                        </div>
                      </div>
                      
					  
                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Short_Name"><span class="requireds">*</span> INITIAL NAME:</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input id="Short_Name" class="form-control col-md-7 col-xs-12" name="Short_Name"  value="<?php if(set_value('Short_Name')){echo set_value('Short_Name');}else{ echo $row->Short_Name;} ?>" placeholder="Initial Name" minlength="3" maxlength="10"required="required" type="text">
                        </div>
						
						<label class="control-label col-md-2 col-sm-3 col-xs-12" for="Dob"><span class="requireds">*</span> DATE OF BIRTH:</label>
                        <div class="col-md-2 col-sm-6 col-xs-12 has-feedback">
                          <input id="Dob" name="Dob" value="<?php if(set_value('Dob')){echo set_value('Dob');}
						  elseif($row->DOB!="0000-00-00"){
						  $dt2 =  date_create($row->DOB);
						  $DOB =  date_format($dt2,'m/d/Y');  
						  echo $DOB; 
						   }else { echo "";}
				
							?>" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" required="required" type="text" placeholder="eg.01/01/2017" >
							<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                        </div>
						
						<label class="control-label col-md-2 col-sm-3 col-xs-12"><span class="requireds">*</span> GENDER:</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <div id="Gender1" class="btn-group" data-toggle="buttons">    
						 
                           <?php if($row->Gender == 0){ ?>						  
							<input checked data-toggle="toggle" data-on="Male" data-off="Female" id="Gender"   <?php echo set_checkbox('Gender', '0'); ?>   name="Gender" data-onstyle="primary" data-offstyle="default" type="checkbox">
							<?php } else{?>
							<input  data-toggle="toggle" data-on="Male" data-off="Female" id="Gender"   <?php echo set_checkbox('Gender', '1'); ?>    name="Gender" data-onstyle="primary" data-offstyle="default" type="checkbox">
							<?php }?>
                          </div>
                        </div>
						
                      </div>
                      
					  <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Phone_Number"><span class="requireds">*</span> PHONE NUMBER(S):
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="Phone_Number" name="Phone_Number"  value="<?php if(set_value('Phone_Number')){echo set_value('Phone_Number');}else{ echo $row->Phone_Number;} ?>" maxlength="10" placeholder="Phone Number(S)" class="form-control col-md-7 col-xs-12">
                        </div>
						
						<label class="control-label col-md-2 col-sm-3 col-xs-12" for="Mobile1">MOBILE 1:</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="Mobile1" name="Mobile1" maxlength="13" value="<?php if(set_value('Mobile1')){echo set_value('Mobile1');}else{ echo $row->Mobile1;} ?>" placeholder="Mobile1" class="form-control col-md-7 col-xs-12">
                        </div>
						
						<label class="control-label col-md-2 col-sm-3 col-xs-12" for="Mobile2">MOBILE 2:</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="Mobile2" name="Mobile2" maxlength="13" value="<?php if(set_value('Mobile2')){echo set_value('Mobile2');}else{ echo $row->Mobile2;} ?>"  placeholder="Mobile2"class="form-control col-md-7 col-xs-12">
                        </div>						
                      </div>
					  
					  
					  <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Email"><span class="requireds">*</span> EMAIL:</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="email" id="Email" name="Email" maxlength="50" value="<?php if(set_value('Email')){echo set_value('Email');}else{ echo $row->Email;} ?>" placeholder="Email" class="form-control col-md-7 col-xs-12">
                        </div>
						
						<label class="control-label col-md-2 col-sm-3 col-xs-12" for="Secondary_Email">SECONDARY EMAIL:</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="email" id="Secondary_Email" name="Secondary_Email" value="<?php if(set_value('Secondary_Email')){echo set_value('Secondary_Email');}else{ echo $row->Secondary_Email;} ?>" placeholder="Secondary Email" maxlength="50" class="form-control col-md-7 col-xs-12">
                        </div>						
                      </div>
					  
					  
					  
					  <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Email">POSITION:</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
							<select class="select2_single form-control" id="Position" name="Position" maxlength="2" >
								<option value="" selected>--Select Position--</option>
								<?php
								//$pos_count = 1;
								foreach($pos_list as $pos){
								?>
								<option value="<?php echo $pos['Pos_ID']; ?>" <?php if($row->Position == $pos['Pos_ID']){ echo "selected";}else{echo set_select('Position','<?php echo $pos[\'Pos_ID\']; ?>');}?> ><?php echo $pos['Position_Name']; ?></option>
								<?php								
									//$pos_count++;
								}
								?>
								<?php /* <option value="1" <?php if($row->Position == 1){ echo "selected";}else{echo set_select('Position','1');}?> >Project Manager</option>
								<option value="2" <?php if($row->Position == 2){ echo "selected";}else{echo set_select('Position','2');}?> >Team Manager</option>
								<option value="3" <?php if($row->Position == 3){ echo "selected";}else{echo set_select('Position','3');}?> >Superviser Manager</option>
								<option value="4" <?php if($row->Position == 4){ echo "selected";}else{echo set_select('Position','4');}?> >Team Leader Manager</option>
								<option value="5" <?php if($row->Position == 5){ echo "selected";}else{echo set_select('Position','5');}?> >Senior PHP Devloper</option>
								<option value="6" <?php if($row->Position == 6){ echo "selected";}else{echo set_select('Position','6');}?> >PHP Devloper</option>
								<option value="7" <?php if($row->Position == 7){ echo "selected";}else{echo set_select('Position','7');}?> >Marketing Manager</option> */ ?>
							</select>
                        </div>
						
						<label class="control-label col-md-2 col-sm-3 col-xs-12" for="Email"><span class="requireds">*</span> EMPLOYEE MANAGER:</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
							<select class="select2_single form-control" id="Assign_Manager" name="Assign_Manager" maxlength="2" required="required">
								<option value="" selected>--Please Manager--</option>
								<option value="1" <?php if($row->Assign_Manager == 1){ echo "selected";}else{echo set_select('Assign_Manager','1');}?> >Admin</option>
								<option value="2" <?php if($row->Assign_Manager == 2){ echo "selected";}else{echo set_select('Assign_Manager','2');}?> >Vinit(VNT)</option>
								<option value="3" <?php if($row->Assign_Manager == 3){ echo "selected";}else{echo set_select('Assign_Manager','3');}?> >Sneha(SNH)</option>
								<option value="4" <?php if($row->Assign_Manager == 4){ echo "selected";}else{echo set_select('Assign_Manager','4');}?> >Divya(DVY)</option>
								<option value="5" <?php if($row->Assign_Manager == 5){ echo "selected";}else{echo set_select('Assign_Manager','5');}?> >aminsneha(ASN)</option>
								<option value="6" <?php if($row->Assign_Manager == 6){ echo "selected";}else{echo set_select('Assign_Manager','6');}?> >Swati(SWT)</option>
								<option value="7" <?php if($row->Assign_Manager == 7){ echo "selected";}else{echo set_select('Assign_Manager','7');}?> >Bhavesh Sir(BHV)</option>
								<option value="8" <?php if($row->Assign_Manager == 8){ echo "selected";}else{echo set_select('Assign_Manager','8');}?> >Pritesh Sir(PRT)</option>
								<option value="9" <?php if($row->Assign_Manager == 9){ echo "selected";}else{echo set_select('Assign_Manager','9');}?> >Dharmendu Sir</option>
								<option value="10" <?php if($row->Assign_Manager == 10){ echo "selected";}else{echo set_select('Assign_Manager','10');}?> >Dhirendra Sir</option>
								<option value="11" <?php if($row->Assign_Manager == 11){ echo "selected";}else{echo set_select('Assign_Manager','11');}?> >Hardik(HRD)</option>
								<option value="12" <?php if($row->Assign_Manager == 12){ echo "selected";}else{echo set_select('Assign_Manager','12');}?> >Poonam(PNM)</option>
								<option value="13" <?php if($row->Assign_Manager == 13){ echo "selected";}else{echo set_select('Assign_Manager','13');}?> >Shay</option>
								<option value="14" <?php if($row->Assign_Manager == 14){ echo "selected";}else{echo set_select('Assign_Manager','14');}?> >Kirtan</option>
								<option value="15" <?php if($row->Assign_Manager == 15){ echo "selected";}else{echo set_select('Assign_Manager','15');}?> >Dharmik(DMK)</option>
								<option value="16" <?php if($row->Assign_Manager == 16){ echo "selected";}else{echo set_select('Assign_Manager','16');}?> >Avani(AVN)</option>
							</select>							
                        </div>
						
                      </div>					  
					  
					  <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Emergancy_Contact_Name1"><span class="requireds">*</span> DEPARTMENT: </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
						 <?php //echo $row->Role_Assign;?>
                          <?php  
						       $value = $row->Role_Assign; 
						       $value1 =  explode(',',$value);
						  ?>
							<select class="form-control col-md-7 col-xs-12" id="Role" name="Role_ID"  required="required">
							    <option value="" selected disabled>--Select Department--</option>
								<?php
								//$dept_count = 2;
								foreach($dept_list as $dept){
								?>
									<option value="<?php echo $dept['Dept_ID']; ?>" <?php if($row->Role_ID == $dept['Dept_ID']){ echo "selected";}else{echo set_select('Role','<?php echo $dept[\'Dept_ID\']; ?>');}?> ><?php echo $dept['Dept_Name']; ?></option>
								
								<?php
									//echo "<option value='".$dept_count."' ".set_select('Role', $dept_count)." >".$dept['Dept_Name']."</option>";
									//$dept_count++;
								}
								?>
								<!--<option value="2" <?php echo  set_select('Role', '2'); ?> >HR Head</option>-->
								<!--<option value="3" <?php echo  set_select('Role', '3'); ?> >HR Support</option>-->
								<!--<option value="4" <?php echo  set_select('Role', '4'); ?> >HR Manager</option>-->
								<!--<option value="5" <?php echo  set_select('Role', '5'); ?> >Employee</option>-->
								<!--<option value="6" <?php echo  set_select('Role', '6'); ?> >Technical</option>-->
								<!--<option value="7" <?php echo  set_select('Role', '7'); ?> >Support</option>-->
							</select>
                        </div>
						
					  </div> 
					  
					  <?php /*
					   <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Emergancy_Contact_Name1"><span class="requireds">*</span> ROLE ASSIGN:</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
						 <?php //echo $row->Role_Assign;?>
                          <?php  
						       $value = $row->Role_Assign; 
						       $value1 =  explode(',',$value);
							  /*  print_r($value1);
							     
								
								 
								 
						        if(in_array('5', $value1))
								{
								  echo "test";
								  } 
						  ?>
						  <select class="selectpicker" name="Role_Assign[]" multiple id="Role_Assign">
								
								<option value="1" <?php  if(in_array("1", $value1)){echo "selected";}else{echo set_select('Role_Assign','1');} ?> >Project Manager</option>
								<option value="2" <?php  if(in_array("2", $value1)){echo "selected";}else{echo set_select('Role_Assign','1');} ?> >Team Manager</option>
								<option value="3" <?php  if(in_array("3", $value1)){echo "selected";}else{echo set_select('Role_Assign','1');} ?> >Superviser Manager</option>
								<option value="4" <?php if(in_array("4", $value1)){echo "selected";}else{echo set_select('Role_Assign','1');} ?> >Team Leader Manager</option>
								<option value="5"  <?php  if(in_array("5", $value1)){echo "selected";}else{echo set_select('Role_Assign','1');} ?>>Senior PHP Devloper</option>
								<option value="6" <?php  if(in_array("6", $value1)){echo "selected";}else{echo set_select('Role_Assign','1');} ?>>PHP Devloper</option>
								<option value="7"  <?php if(in_array("7", $value1)){echo "selected";}else{echo set_select('Role_Assign','1');} ?>>Marketing Manager</option>
							</select>
                        </div>
						
					  </div> */ ?>
					  
					  
					  
                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Emergancy_Contact_Name1"><span class="requireds">*</span> EMERGANCY CONTACT NAME 1:</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="Emergancy_Contact_Name1" maxlength="13" value="<?php if(set_value('Emergancy_Contact_Name1')){echo set_value('Emergancy_Contact_Name1');}else{ echo $row->Emergancy_Contact_Name1;} ?>" placeholder="Emergancy Contact Name1" name="Emergancy_Contact_Name1" maxlength="10" class="form-control col-md-7 col-xs-12">
                        </div>
						<label class="control-label col-md-2 col-sm-3 col-xs-12" for="Emergancy_Contact_Relation1"><span class="requireds">*</span> RELATION 1:</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="Emergancy_Contact_Relation1" maxlength="13" value="<?php if(set_value('Emergancy_Contact_Relation1')){echo set_value('Emergancy_Contact_Relation1');}else{ echo $row->Emergancy_Contact_Relation1;} ?>" placeholder="Emergancy Contact Relation 1" name="Emergancy_Contact_Relation1" maxlength="10" class="form-control col-md-7 col-xs-12">
                        </div>
						<label class="control-label col-md-2 col-sm-3 col-xs-12" for="Emergancy_Contact_Number1"><span class="requireds">*</span> NUMBER 1:</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="Emergancy_Contact_Number1" maxlength="13" value="<?php if(set_value('Emergancy_Contact_Number1')){echo set_value('Emergancy_Contact_Number1');}else{ echo $row->Emergancy_Contact_Number1;} ?>" placeholder="Emergancy Contact Number 1" name="Emergancy_Contact_Number1" maxlength="10" class="form-control col-md-7 col-xs-12">
                        </div>
					  </div> 
					  
					  <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Emergancy_Contact_Name2"> EMERGANCY CONTACT NAME 2:</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="Emergancy_Contact_Name2" maxlength="13" value="<?php if(set_value('Emergancy_Contact_Name2')){echo set_value('Emergancy_Contact_Name2');}else{ echo $row->Emergancy_Contact_Name2;} ?>" placeholder="Emergancy Contact Name2" name="Emergancy_Contact_Name2" maxlength="10" class="form-control col-md-7 col-xs-12">
                        </div>
						<label class="control-label col-md-2 col-sm-3 col-xs-12" for="Emergancy_Contact_Relation2"> RELATION 2:</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="Emergancy_Contact_Relation2" maxlength="13" value="<?php if(set_value('Emergancy_Contact_Relation2')){echo set_value('Emergancy_Contact_Relation2');}else{ echo $row->Emergancy_Contact_Relation2;} ?>" placeholder="Emergancy Contact Relation 2" name="Emergancy_Contact_Relation2" maxlength="10" class="form-control col-md-7 col-xs-12">
                        </div>
						<label class="control-label col-md-2 col-sm-3 col-xs-12" for="Emergancy_Contact_Number1"> NUMBER 2:</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="Emergancy_Contact_Number2" maxlength="13" value="<?php if(set_value('Emergancy_Contact_Number2')){echo set_value('Emergancy_Contact_Number2');}else{ echo $row->Emergancy_Contact_Number2;} ?>" placeholder="Emergancy Contact Number 2" name="Emergancy_Contact_Number2" maxlength="10" class="form-control col-md-7 col-xs-12">
                        </div>
					  </div> 
                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Address"><span class="requireds">*</span> TEMPERORY ADDRESS:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="Address" name="Address" required="required" placeholder="Address" maxlength="300" class="form-control col-md-7 col-xs-12"><?php if(set_value('Address')){echo set_value('Address');}else{ echo $row->Address;} ?></textarea>
                        </div>
						
						<label class="control-label col-md-2 col-sm-3 col-xs-12" for="Address"><span class="requireds">*</span> ZIPCODE1:
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="Zipcode1" maxlength="6" value="<?php if(set_value('Zipcode1')){echo set_value('Zipcode1');}else{ echo $row->Zipcode1;} ?>" placeholder="Zipcode1" name="Zipcode1" maxlength="6" class="form-control col-md-7 col-xs-12">
                        </div>					
                      </div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Permanent_Address"><span class="requireds">*</span> PERMANENT ADDRESS:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="Permanent_Address" name="Permanent_Address" placeholder="Permanent Address" maxlength="300" required="required" class="form-control col-md-7 col-xs-12"><?php if(set_value('Permanent_Address')){echo set_value('Permanent_Address');}else{ echo $row->Permanent_Address;} ?></textarea>
                        </div>
						
						<label class="control-label col-md-2 col-sm-3 col-xs-12" for="Address"> ZIPCODE 2:
                        </label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="Zipcode2" maxlength="6" value="<?php if(set_value('Zipcode2')){echo set_value('Zipcode2');}else{ echo $row->Zipcode2;} ?>" placeholder="Zipcode2" name="Zipcode2" maxlength="6" class="form-control col-md-7 col-xs-12">
                        </div>
						
                      </div>
					  
					  
					  <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Pan_Number">PAN NUMBER:</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text" id="Pan_Number" name="Pan_Number" maxlength="10" placeholder="Pan Number" value="<?php if(set_value('Pan_Number')){echo set_value('Pan_Number');}else{ echo $row->Pan_Number;} ?>" class="form-control col-md-7 col-xs-12">
                        </div>									
                      </div> 
					  
					  <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Blood_Group">BLOOD GROUP:</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input id="Blood_Group" name="Blood_Group" maxlength="3" placeholder="eg. O+" value="<?php if(set_value('Blood_Group')){echo set_value('Blood_Group');}else{ echo $row->Blood_Group;} ?>" class="form-control col-md-7 col-xs-12" placeholder="" type="text">
                        </div>
						
						<label class="control-label col-md-2 col-sm-3 col-xs-12">PAST CRIMINAL RECORD:</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <div  class="btn-group" data-toggle="buttons">   
                           <?php if($row->Past_Criminal_Record == 0){ ?>						  
							<input id="Past_Criminal_Record" data-toggle="toggle" data-on="Yes" data-off="No" value="<?php if(set_value('Past_Criminal_Record')){echo set_value('Past_Criminal_Record');}else{ echo $row->Past_Criminal_Record;} ?>" name="Past_Criminal_Record" data-onstyle="primary" data-offstyle="default" type="checkbox">
							<?php }else{?>
						  <input checked id="Past_Criminal_Record" data-toggle="toggle" data-on="Yes" data-off="No" value="<?php if(set_value('Past_Criminal_Record')){echo set_value('Past_Criminal_Record');}else{ echo $row->Past_Criminal_Record;} ?>" name="Past_Criminal_Record" data-onstyle="primary" data-offstyle="default" type="checkbox">
						  <?php }?>
                          </div>
                        </div>
                      </div>
					  
					  <?php if($row->Past_Criminal_Record == 1){ ?>
					  
					  <div class="item form-group"  id="Past_Criminal_Detail_box">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for=""><span class="requireds">*</span> PAST CRIMINAL RECORD DETAIL:
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12">
                          <textarea id="Past_Criminal_Detail" name="Past_Criminal_Detail" maxlength="400" placeholder="Past Criminal Detail" class="form-control col-md-7 col-xs-12" required="required"><?php if(set_value('Past_Criminal_Detail')){echo set_value('Past_Criminal_Detail');}else{ echo $row->Past_Criminal_Detail;} ?></textarea>
                        </div>
                      </div>
					  <?php }else{?>
					  <div class="item form-group"  style="display:none;"id="Past_Criminal_Detail_box">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for=""><span class="requireds">*</span> PAST CRIMINAL RECORD DETAIL:
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12">
                          <textarea id="Past_Criminal_Detail" name="Past_Criminal_Detail" maxlength="400" placeholder="Past Criminal Detail" class="form-control col-md-7 col-xs-12" required="required"><?php if(set_value('Past_Criminal_Detail')){echo set_value('Past_Criminal_Detail');}else{ echo $row->Past_Criminal_Detail;} ?></textarea>
                        </div>
                      </div>
					  <?php } ?>
					  
					  <div class="item form-group">
					    <label class="control-label col-md-2 col-sm-3 col-xs-12">EMPLOYMENT TYPE:</label>                      
                        <div class="col-md-4 col-sm-6 col-xs-12">
							<label class="control-label">
							
							<input type="radio"  class="flat" name="Employeement_Status" <?php echo ($row->Employeement_Status == 1) ?  "checked" : "" ;  ?> value="1" <?php echo  set_radio('Employeement_Status', '1'); ?> id="Employeement_Status0" value="1" /> &nbsp;&nbsp;FULLTIME</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<label class="control-label"><input type="radio" class="flat" <?php echo ($row->Employeement_Status == 2) ?  "checked" : "" ;  ?> name="Employeement_Status" value="2" <?php echo  set_radio('Employeement_Status', '2'); ?> id="Employeement_Status1" value="2" /> &nbsp;&nbsp;PARTTIME </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<label class="control-label"><input type="radio" class="flat" <?php echo ($row->Employeement_Status == 3) ?  "checked" : "" ;  ?> name="Employeement_Status" value="3" <?php echo  set_radio('Employeement_Status', '3'); ?> id="Employeement_Status2" value="3" /> &nbsp;&nbsp;TEMPORARY </label>
						</div>
						
						<label class="control-label col-md-3 col-sm-3 col-xs-12">EMPLOYMENT ACTIVE STATUS:</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <div id="Employement_Active_Status" class="btn-group" data-toggle="buttons">  
                           <?php if($row->Emp_Active_Status == 1){ ?>
							<input checked data-toggle="toggle" data-on="Active" name="Emp_Active_Status" value="<?php echo set_value('Emp_Active_Status'); ?>" id="Emp_Active_Status" data-off="Inactive" data-onstyle="primary" data-offstyle="default" type="checkbox">							
                          <?php }else{?>
						  <input data-toggle="toggle" data-on="Active" name="Emp_Active_Status" value="<?php echo set_value('Emp_Active_Status'); ?>" id="Emp_Active_Status" data-off="Inactive" data-onstyle="primary" data-offstyle="default" type="checkbox">							
						  <?php }?>
						  </div>
                        </div>
					  </div>			  
					  
					 
					  <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">ORDINARY HOURS OF WORK:
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
							<div class="input-group bootstrap-timepicker timepicker">
								<input id="Odinary_Work_Hours_From" name="Odinary_Work_Hours_From" value="<?php if(set_value('Odinary_Work_Hours_From')){echo set_value('Odinary_Work_Hours_From');}else{ echo $row->Odinary_Work_Hours_From;} ?>" type="text" class="form-control input-small">
								<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
							</div>
                        </div>
						<div class="col-md-1 col-sm-1 col-xs-12" style="text-align:center">
							<label class="control-label">TO</label>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<div class="input-group bootstrap-timepicker timepicker">
								<input id="Odinary_Work_Hours_To" name="Odinary_Work_Hours_To" value="<?php if(set_value('Odinary_Work_Hours_To')){echo set_value('Odinary_Work_Hours_To');}else{ echo $row->Odinary_Work_Hours_To;} ?>" type="text" class="form-control input-small">
								<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
							</div>
                        </div>
                      </div>
					  
					 
					  <div class="item form-group">
					  
					  	<label class="control-label col-md-2 col-sm-3 col-xs-12" for="Joining_Date"><span class="requireds">*</span> DATE EMPLOYMENT COMMENCED:</label>
                        <div class="col-md-3 col-sm-6 col-xs-12 has-feedback">
                          <input id="Joining_Date" name="Joining_Date" value="<?php if(set_value('Joining_Date')){echo set_value('Joining_Date');}else{ if(isset($row->Joining_Date)){
						  $dt2 =  date_create($row->Joining_Date);
						  $DOB =  date_format($dt2,'m/d/Y');  
						  echo $DOB; 
						  } }?>" onChange="GetNextDate();" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" required="required" type="text" placeholder="eg.01/01/2017">
						  <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                        </div>		 
						
                        <label class="control-label col-md-1 col-sm-3 col-xs-12">MONTHS BOND:</label>
                       <div class="col-md-3 col-sm-6 col-xs-12 has-feedback">
                          <select class="select2_single form-control" id="Months_Bond" name="Months_Bond" onChange="GetNextDate();">
						  <option value="" selected >--Select Role--</option>
                           <option value="1" <?php echo  set_select('Months_Bond', '1'); ?> <?php echo ($row->Months_Bond == 1) ?  "selected" : "" ;  ?> >12 Months</option>
                            <option value="2" <?php echo  set_select('Months_Bond', '2'); ?> <?php echo ($row->Months_Bond == 2) ?  "selected" : "" ;  ?>>18 Months</option>
                            <option value="3" <?php echo  set_select('Months_Bond', '3'); ?> <?php echo ($row->Months_Bond == 3) ?  "selected" : "" ;  ?>>24 Months</option>
					      </select>
                        </div>
						
						<div class="col-md-3 col-sm-6 col-xs-12 has-feedback">
                          <input id="Bond_To_Date" name="Bond_To_Date" class="form-control col-md-7 col-xs-12 has-feedback-right" value="<?php if(set_value('Bond_To_Date')){echo set_value('Bond_To_Date');}
						  elseif($row->Bond_To_Date!="0000-00-00"){
						  $dt2 =  date_create($row->Bond_To_Date);
						  $btd =  date_format($dt2,'m/d/Y');  
						  echo $btd; 
						  }else{ echo "";} ?>" type="text" placeholder="eg.01/01/2017" readonly>
						  <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
					  
					  <span class="section" style="margin-top:30px;">Back Ground Check</span>
					  <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Referance_Name_1"> REFERANCE NAME 1:</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="Referance_Name_1" maxlength="50" value="<?php if(set_value('Referance_Name_1')){echo set_value('Referance_Name_1');}else{ echo $row->Referance_Name_1;} ?>" placeholder="Referance Name 1" name="Referance_Name_1"  class="form-control col-md-7 col-xs-12">
                        </div>
						<label class="control-label col-md-2 col-sm-3 col-xs-12" for="Referance_Relation_1">RELATION 1:</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="Referance_Relation_1" maxlength="50" value="<?php if(set_value('Referance_Relation_1')){echo set_value('Referance_Relation_1');}else{ echo $row->Referance_Relation_1;} ?>" placeholder="Referance Relation 1" name="Referance_Relation_1" class="form-control col-md-7 col-xs-12">
                        </div>
						<label class="control-label col-md-2 col-sm-3 col-xs-12" for="Referance_Number_1"> NUMBER 1:</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="Referance_Number_1" maxlength="13" value="<?php if(set_value('Referance_Number_1')){echo set_value('Referance_Number_1');}else{ echo $row->Referance_Number_1;} ?>" placeholder="Referance Number 1" name="Referance_Number_1"  class="form-control col-md-7 col-xs-12">
                        </div>
					  </div> 
					  
					  <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Referance_Name_2"> REFERANCE NAME 2:</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="Referance_Name_2" maxlength="50" value="<?php if(set_value('Referance_Name_2')){echo set_value('Referance_Name_2');}else{ echo $row->Referance_Name_2;} ?>" placeholder="Referance Name 2" name="Referance_Name_2"  class="form-control col-md-7 col-xs-12">
                        </div>
						<label class="control-label col-md-2 col-sm-3 col-xs-12" for="Referance_Relation_2"> RELATION 2:</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="Referance_Relation_2" maxlength="50" value="<?php if(set_value('Referance_Relation_2')){echo set_value('Referance_Relation_2');}else{ echo $row->Referance_Relation_2;} ?>" placeholder="Referance Name 2" name="Referance_Relation_2"  class="form-control col-md-7 col-xs-12">
                        </div>
						<label class="control-label col-md-2 col-sm-3 col-xs-12" for="Referance_Number_2"> NUMBER 2:</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="Referance_Number_2" maxlength="13" value="<?php if(set_value('Referance_Number_2')){echo set_value('Referance_Number_2');}else{ echo $row->Referance_Number_2;} ?>" placeholder="Referance Number 2" name="Referance_Number_2" class="form-control col-md-7 col-xs-12">
                        </div>
					  </div> 
					  
					  <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Referance_Name_3"> REFERANCE NAME 3:</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="Referance_Name_3" maxlength="50" value="<?php if(set_value('Referance_Name_3')){echo set_value('Referance_Name_3');}else{ echo $row->Referance_Name_3;} ?>" placeholder="Referance Name 3" name="Referance_Name_3"  class="form-control col-md-7 col-xs-12">
                        </div>
						<label class="control-label col-md-2 col-sm-3 col-xs-12" for="Referance_Relation_3">RELATION 3:</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="Referance_Relation_3" maxlength="50" value="<?php if(set_value('Referance_Relation_3')){echo set_value('Referance_Relation_3');}else{ echo $row->Referance_Relation_3;} ?>" placeholder="Referance Relation 3" name="Referance_Relation_3"  class="form-control col-md-7 col-xs-12">
                        </div>
						<label class="control-label col-md-2 col-sm-3 col-xs-12" for="Referance_Number_3">NUMBER 3:</label>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                          <input type="text" id="Referance_Number_3" maxlength="13" value="<?php if(set_value('Referance_Number_3')){echo set_value('Referance_Number_3');}else{ echo $row->Referance_Number_3;} ?>" placeholder="Referance Number 3" name="Referance_Number_3"  class="form-control col-md-7 col-xs-12">
                        </div>
					  </div>
					  
<!----- family detail 02-07-2017  ------------------------------------->				  
					 <span class="section" style="margin-top:30px;">Official Detail</span> 
					  <div class="item form-group">
					    <label class="control-label col-md-2 col-sm-3 col-xs-12">IF ALRREADY REGISTER IN ESIC:</label>                      
                        <div class="col-md-4 col-sm-6 col-xs-12">
							<label class="control-label">
							
							<input type="radio"  class="flat" name="Esic_status" value="1" <?php echo  set_radio('Esic_status', '1'); ?> id="Esic_status_1" onchange="Check_Esic():"/> &nbsp;&nbsp;YES</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							
							<label class="control-label">
							<input type="radio" class="flat" name="Esic_status" value="2" <?php echo  set_radio('Esic_status', '2'); ?> id="Esic_status_2" /> &nbsp;&nbsp;NO </label>
							
						</div>
						
						<label class="control-label col-md-2 col-sm-3 col-xs-12">IF YES INSURANCE NO:</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text" id="Insurance_No" name="Insurance_No" value="<?php echo set_value('Insurance_No') ?>" placeholder="INSURANCE NO" maxlength="50" class="form-control col-md-7 col-xs-12">
                        </div>
					  </div>
					 
					  
					  <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Email"> PREVIOUS PF CODE NO/UAN NO:</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text" id="" name="Pre_PF" maxlength="20" value="<?php echo set_value('Pre_PF')?>" placeholder="PREVIOUS PF CODE NO/UAN NO" class="form-control col-md-7 col-xs-12">
                        </div>
						
						<label class="control-label col-md-2 col-sm-3 col-xs-12" for="Secondary_Email">DATE OF EXIT(PREVIOUS COMPANY):</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text" id="Date_Exit_Pre_Comp" name="Date_Exit_Pre_Comp" value="<?php echo set_value('Date_Exit_Pre_Comp') ?>" placeholder="DATE OF EXIT(PREVIOUS COMPANY)" maxlength="16" class="form-control col-md-7 col-xs-12 date-picker">
                        </div>						
                      </div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Email"><span class="requireds">*</span> NAME (AS PER AADHAR CARD):</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text" id="" name="Name_Aadhar" maxlength="50" value="<?php echo set_value('Name_Aadhar')?>" placeholder="NAME (AS PER AADHAR CARD)" class="form-control col-md-7 col-xs-12">
                        </div>
						
						<label class="control-label col-md-2 col-sm-3 col-xs-12" for="Secondary_Email">AADHAR CARD NUMBER:</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text" id="Aadhar_Number" name="Aadhar_Number" value="<?php echo set_value('Aadhar_Number') ?>" placeholder="AADHAR CARD NUMBER" maxlength="16" class="form-control col-md-7 col-xs-12">
                        </div>						
                      </div>
					  
					  <div class="item form-group">
					    <label class="control-label col-md-2 col-sm-3 col-xs-12">MARRIAGE STATUS:</label>                      
                        <div class="col-md-4 col-sm-6 col-xs-12">
							<label class="control-label">
							
							<input type="radio"  class="flat" name="Marriage_Status" value="1" <?php echo  set_radio('Marriage_Status', '1'); ?> id="" /> &nbsp;&nbsp;MARRIED</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							
							<label class="control-label">
							<input type="radio" class="flat" name="Marriage_Status" value="2" <?php echo  set_radio('Marriage_Status', '2'); ?> id="" /> &nbsp;&nbsp;SINGLE </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							
							<label class="control-label">
							<input type="radio" class="flat" name="Marriage_Status" value="3" <?php echo  set_radio('Marriage_Status', '3'); ?> id="" /> &nbsp;&nbsp;OTHER </label>
						</div>
						
						<label class="control-label col-md-2 col-sm-3 col-xs-12">MENTIONED MARRIAGE STATUS:</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input type="text" id="Marriage_Status_Other" name="Marriage_Status_Other" value="<?php echo set_value('Marriage_Status_Other') ?>" placeholder="MENTIONED MARRIAGE STATUS" maxlength="50" class="form-control col-md-7 col-xs-12">
                        </div>
					  </div>
					  
					  
					  
					<span class="section" style="margin-top:30px;">Family Detail</span>
					  <div class="item form-group">
                        <table class="table table-bordered">
						  <thead>
							<tr>
							  <th>FAMILY DETAILS</th>
							  <th>NAME AS PER AADHAR CARD</th>
							  <th>DATE OF BIRTH</th>
							  <th>AADHAR CARD NO</th>
							</tr>
						  </thead>
						  <tbody>
							<tr>
							  <th scope="row">FATHER</th>
							  <td><input type="text" maxlength="50" value="" placeholder="NAME AS PER AADHAR CARD" name="Aadhar_Name_Father"  class="form-control col-md-7 col-xs-12"></td>
							  <td><input type="text" maxlength="50" value="" placeholder="eg.01/01/2017" name="Aadhar_BDO_Father"  class="form-control col-md-7 col-xs-12 date-picker"></td>
							  <td><input type="text" maxlength="16" value="" placeholder="AADHAR CARD NO" name="Father_aadhar"  class="form-control col-md-7 col-xs-12 aadhar"></td>
							</tr>
							<tr>
							  <th scope="row">MOTHER</th>
							  <td><input type="text" maxlength="50" value="" placeholder="NAME AS PER AADHAR CARD" name="Aadhar_Name_Mother"  class="form-control col-md-7 col-xs-12"></td>
							  <td><input type="text" maxlength="50" value="" placeholder="eg.01/01/2017" name="Aadhar_BDO_Mother"  class="form-control col-md-7 col-xs-12 date-picker"></td>
							  <td><input type="text" maxlength="16" value="" placeholder="AADHAR CARD NO" name="Mother_aadhar"  class="form-control col-md-7 col-xs-12 aadhar"></td>
							</tr>
							
							<tr>
							  <th scope="row">HUSBAND</th>
							  <td><input type="text" maxlength="50" value="" placeholder="NAME AS PER AADHAR CARD" name="Aadhar_Name_Husband"  class="form-control col-md-7 col-xs-12"></td>
							  <td><input type="text" maxlength="50" value="" placeholder="eg.01/01/2017" name="Aadhar_BDO_Husband"  class="form-control col-md-7 col-xs-12 date-picker"></td>
							  <td><input type="text" maxlength="16" value="" placeholder="AADHAR CARD NO" name="Husband_aadhar"  class="form-control col-md-7 col-xs-12 aadhar"></td>
							</tr>
							
							<tr>
							  <th scope="row">WIFE</th>
							  <td><input type="text" maxlength="50" value="" placeholder="NAME AS PER AADHAR CARD" name="Aadhar_Name_Wife"  class="form-control col-md-7 col-xs-12"></td>
							  <td><input type="text" maxlength="50" value="" placeholder="eg.01/01/2017" name="Aadhar_BDO_Wife"  class="form-control col-md-7 col-xs-12 date-picker"></td>
							  <td><input type="text" maxlength="16" value="" placeholder="AADHAR CARD NO" name="Wife_aadhar"  class="form-control col-md-7 col-xs-12 aadhar"></td>
							</tr>
							
							<tr>
							  <th scope="row">SON</th>
							  <td><input type="text" maxlength="50" value="" placeholder="NAME AS PER AADHAR CARD" name="Aadhar_Name_Son"  class="form-control col-md-7 col-xs-12"></td>
							  <td><input type="text" maxlength="50" value="" placeholder="eg.01/01/2017" name="Aadhar_BDO_Son"  class="form-control col-md-7 col-xs-12 date-picker"></td>
							  <td><input type="text" maxlength="16" value="" placeholder="AADHAR CARD NO" name="Son_aadhar"  class="form-control col-md-7 col-xs-12 aadhar"></td>
							</tr>
							<tr>
							  <th scope="row">DAUGHTER</th>
							  <td><input type="text" maxlength="50" value="" placeholder="NAME AS PER AADHAR CARD" name="Aadhar_Name_Daughter"  class="form-control col-md-7 col-xs-12"></td>
							  <td><input type="text" maxlength="50" value="" placeholder="eg.01/01/2017" name="Aadhar_BDO_Daughter"  class="form-control col-md-7 col-xs-12 date-picker"></td>
							  <td><input type="text" maxlength="16" value="" placeholder="AADHAR CARD NO" name="Daughter_aadhar"  class="form-control col-md-7 col-xs-12 aadhar"></td>
							</tr>
														
							
						  </tbody>
					</table>
				</div> 




<!----- family detail 02-07-2017  ------------------------------------------------------>					  
					  
					  
					  
					  
					  
					  
					  
					  
						
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="<?php echo base_url()?>index.php/Employee/add_emp_list"><button type="button" class="btn btn-danger">Cancel</button></a>
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
					  
					  <span class="requireds"> Fields marked with an * are required </span>
                    </form>                  
					
                  </div>
                </div>
              </div>
			  
            </div>
          </div>
        </div>
        <!-- /page content -->
	
	
	
	
    <script>	
	function Check_Esic(){
			alert('helo');
			if($(this).prop('checked' == true) ){
				$('#Insurance_No').attr('required', true);
			}else{
				$('#Insurance_No').attr('required', false);
			}
		}
	
	
	$(document).ready(function(){
		
		/****************** Bosstrap Timepicker **********************/
		$('#Odinary_Work_Hours_From').timepicker({
			minuteStep:30,
			defaultTime:'10:00 AM'
			
		});
		$('#Odinary_Work_Hours_To').timepicker({
			minuteStep:30,
			defaultTime:'08:00 PM'
		});
	
	/****************** Pan Number Uppercase function **********************/
		$("#Pan_Number").bind('keyup', function (e) {
			if (e.which >= 97 && e.which <= 122) {
				var newKey = e.which - 32;
				// I have tried setting those
				e.keyCode = newKey;
				e.charCode = newKey;
			}

			$("#Pan_Number").val(($("#Pan_Number").val()).toUpperCase());
		});


		/***************** Criminal Record detail field ************************/
		$('#Past_Criminal_Record').change(function(){
			if($(this).prop("checked") == true){
				//$('#Past_Criminal_Detail_box').css("display","block");
				$('#Past_Criminal_Detail_box').slideDown();
			}
			else{
				$('#Past_Criminal_Detail_box').slideUp();
			}
			
		});

		
		/********** add method for pancard validation *********/
		$.validator.addMethod("pan", function(value, element) {
			return this.optional(element) || /^[A-Z]{5}\d{4}[A-Z]{1}$/.test(value);
		}, "Invalid Pan Number");
		
		/******* add method for blood group verify *******/
		$.validator.addMethod("blood", function(value, element)	{
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
			
				if(age < 18) {
					return false;
				}else{
					return true;
				}

			//return true;
		}, 'Age must be 18 Year or above!');
		
		
		/************** Jquery validation rules,messages and submit handler ****************/
		$('#Emp_Detail_Form').validate({
			rules:{
				Phone_Number: {
					required:true,
					number:true,
					minlength:10
				},
				Email:{
					required:true,
					email:true
				},
				Pan_Number:{
					pan: true
				},
				Blood_Group:{
					blood:true
				},
				Dob:{
					ageverify:true
				},
				Emergancy_Contact_Name1: {
					required:true,
					minlength:5
				},				
				Emergancy_Contact_Relation1: {
					required:true,
					minlength:2
				},
				Zipcode1:{
				    required:true,
					minlength:6
					
				},
				Emergancy_Contact_Number1: {
					required:true,
					number:true,
					minlength:10
				}
				
			},
			
			
			errorElement: 'span',
			submitHandler: function(form){
                form.submit();
			}
		});	
      	GetNextDate();	
	});	
	
	

	/****** get date after particular month *********/
	function GetNextDate(){
		
		var addmonthcode = $('#Months_Bond').val(); //or whatever offset
		if(addmonthcode == 1){addmonth = 12;}else if(addmonthcode == 2){addmonth = 18;}else if(addmonthcode == 3){addmonth = 24;}else{addmonth = 0;}
		var CurrentDate = $('#Joining_Date').val();
		//alert(addmonth+'---'+CurrentDate); //return false;
		if(CurrentDate){
			CurrentDate = new Date(CurrentDate.substring(6,10),
									 CurrentDate.substring(0,2)-1,                   
									 CurrentDate.substring(3,5)                  
									 );
									 
			CurrentDate.setMonth(CurrentDate.getMonth() + addmonth);
			var year = CurrentDate.getFullYear();
			var month = (1 + CurrentDate.getMonth()).toString();			
			var day = CurrentDate.getDate().toString();
			//day = day.length > 1 ? day : '0' + day;
			if(day > 14){
				month = parseInt(month) + 1;
			}
			//month = month.length > 1 ? month : '0' + month;
			if(month == 1){month = 'January';}else if(month == 2){month = 'February';}else if(month == 3){month = 'March';}else if(month == 4){month = 'April';}else if(month == 5){month = 'May';}else if(month == 6){month = 'June';}else if(month == 7){month = 'July';}else if(month == 8){month = 'August';}else if(month == 9){month = 'September';}else if(month == 10){month = 'October';}else if(month == 11){month = 'November';}else if(month == 12){month = 'December';}
			
			var nextDate = month + ' ' + year;
			$('#Bond_To_Date').val(nextDate);
			//alert(nextDate);
		}else{
			return false;
		}
	}	
    </script>