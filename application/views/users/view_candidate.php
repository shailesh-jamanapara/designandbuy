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
 <form name="frmview" id="frmview" method="post" action="index.php">
                <input type="hidden" name="id" id="id" value="<?php if(isset($model['id'])) { echo $model['id']; } ?>" />
                <input type="hidden" name="task" id="task" />
                <input type="hidden" name="user_role_id" id="user_role_id" value="employee" />
                <input type="hidden" name="search_for" id="search_for" value="<?php echo $postdata['search_for']; ?>" />
                <input type="hidden" name="search_by" id="search_by" value="<?php echo $postdata['search_by']; ?>" />
                <input type="hidden" name="sort_by" id="sort_by" value="<?php echo $postdata['sort_by']; ?>" />
                <input type="hidden" name="order_type" id="order_type" value="<?php echo $postdata['order_type']; ?>" />
                <input type="hidden" name="page" id="page" value="<?php echo $postdata['page']; ?>" />
                <input type="hidden" name="limit" id="limit" value="<?php echo $postdata['limit']; ?>" />
                <input type="hidden" name="user_type" id="user_type" value="employee" />
 	<div class="col-md-12 col-sm-12 col-xs-12">
		<button id="send" type="button" class="btn btn-info pull-right" onclick="javascript:goback('<?php echo $model['id']; ?>','<?php echo base_url();?>index.php/Users/list_candidates/candidate');">Back</button>
		<button  type="button" class="btn btn-success pull-right" onclick="javascript:toggle_modal_change_password('<?php echo $model['id']; ?>');">Change Password</button>
		<div class="tab-content clearfix">
		
		<span class="section tab-title-upper"> Candidate Detail</span>
		<!-- 
		<div class="row">	
			<div class="item col-lg-12 col-md-1 col-sm-3 col-xs-12 users_avatar text-center">
				<img src="<?php echo asset_url(); ?>/images/default-profile.jpg" class="user-avatar" name="" id="" title="">
				
			</div>	
		</div>
		-->
		<div class="ln_solid"></div>
		<div class="row" >
					<div class="item col-lg-5 col-md-5 col-sm-3 col-xs-12 col-lg-offset-1">
						<fieldset class="well demo-content" id="fs_personal_info">
						<legend class="well-legend">Personal Information</legend>
						<button type="button" name="btn1" id="btn1" class="btn btn-success edit-btn pull-right" data-toggle="modal" data-target="#modal_personal_info<?php echo $row['id']; ?>" title="Edit Personal Information"><i class="fa fa-pencil" > </i></button>
						<label class="col-lg-6 col-md-2 col-sm-3 col-xs-12 label-title-upper">Name </label>
						<div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group" >
							<?php echo $row['title']; ?> <?php echo $row['first_name']; ?> <?php echo $row['middle_name']; ?> <?php echo $row['last_name']; ?> 
						</div>
						<label class="col-lg-6 col-md-2 col-sm-3 col-xs-12 label-title-upper">Date of Birth  </label>
						<div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group"   id="div_dob">
						<?php echo date('M d Y', strtotime($row['dob']));?>
						</div>
						<label class="col-lg-6 col-md-2 col-sm-3 col-xs-12 label-title-upper">Marital Status </label>
						<div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group" id="div_marital_status" >
							<?php 
							   $status = 'Single';
								if($row['marital_status'] == '0')
										$status = "Married";
								if($row['marital_status'] == '1')
										$status = "Single";
								if($row['marital_status'] == '2')
										$status = "Divorced";	
								echo  $status; ?>
						</div>
						<label class="col-lg-6 col-md-2 col-sm-3 col-xs-12 label-title-upper" >Gender  </label>
						<div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group" id="div_gender">
							<?php $gender = ($row['gender'] == '1' ) ?"Male" : "Female" ; echo  $gender;?>
						</div>
						<label class="col-lg-6 col-md-2 col-sm-3 col-xs-12 label-title-upper">Email <small  class="pull-right">(PERSONAL)</small>  </label>
						<div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group" id="email">
						<a href="mailto:<?php echo $row['email'];?>" title="Email to : <?php echo $row['email'];?>"><i class="fa fa-envelope-o fa_evelope" > </i> <?php echo $row['email'];?></a>
						</div>
						<label class="col-lg-6 col-md-2 col-sm-3 col-xs-12 label-title-upper">FULL NAME  <small class="pull-right">(AS PER AADHAR CARD)</small>  </label>
						<div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group"  id="div_aadhar_name">
							N A
							
						</div>
						<label class="col-lg-6 col-md-2 col-sm-3 col-xs-12 label-title-upper">Aadhar Card Number  </label>
						<div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group" id="div_aadhar_no">
							N A
						</div>
						<label class="col-lg-6 col-md-2 col-sm-3 col-xs-12 label-title-upper">PAN  </label>
						<div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group" id="div_pan">
							N A
						</div>
					  </fieldset>
					</div>	
					<div class="item col-lg-5 col-md-5 col-sm-3 col-xs-12 ">
						<fieldset class="well demo-content" id="fs_contact_info">
							<legend class="well-legend">Address & Contacts </legend>
							<button type="button" name="btn1" id="btn4" class="btn btn-success edit-btn pull-right" data-toggle="modal" data-target="#modal_contacts_info<?php echo $row['id']; ?>" title="Edit Address & Contacts"><i class="fa fa-pencil" > </i></button>
							<label class="col-lg-6 col-md-2 col-sm-3 col-xs-12 label-title-upper"> Permanent Address :</label>
							<div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group">
									<?php if( isset($row['primary']['address']) && $row['primary']['address'] != '' ){ ?>
									<?php echo $row['primary']['address']; ?>, 
									<?php echo $row['primary']['state_name']; ?>, <?php echo $row['primary']['city_name']; ?>  <?php echo $row['primary']['zipcode']; ?>, <?php echo $row['primary']['country_icon']; ?>
									<?php }else{ ?>
									  Not Available 
									<?php } ?>
							</div>
							<label class="col-lg-6 col-md-2 col-sm-3 col-xs-12 label-title-upper"> Temporary Address :</label>
							<div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group">
								<?php if( isset($row['temp']['address']) && $row['temp']['address'] != '' ){ ?>
										<?php echo $row['temp']['address']; ?>, 
										<?php echo $row['temp']['state_name']; ?>, <?php echo $row['temp']['city_name']; ?>  <?php echo $row['temp']['zipcode']; ?>, <?php echo $row['temp']['country_icon']; ?>
									<?php }else{ ?>
										Not Available 
									<?php } ?>
							</div>
							<label class="col-lg-6 col-md-2 col-sm-3 col-xs-12 label-title-upper"> Phone  &nbsp;No. :</label>
							<div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group">
									<?php echo "<i class='fa fa-phone fa_mobile' aria-hidden='true'></i>".$row['phone_no']; ?>
									<?php if(isset($row['extension']) && $row['extension'] != ''){
										echo "<strong>  Ext.  </strong> ".$row['extension'];
									}
									?>
							</div>
							<label class="col-lg-6 col-md-2 col-sm-3 col-xs-12 label-title-upper"> Mobile No. :</label>
							<div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group">
									<?php if(isset($row['mobile_1']) && $row['mobile_1'] != ''){
											echo " <i class='fa fa-mobile fa_mobile' aria-hidden='true'></i> ".$row['mobile_1'];
										}
										if(isset($row['mobile_2']) && $row['mobile_2'] != ''){
											echo "&nbsp;&nbsp;&nbsp;&nbsp;<i class='fa fa-mobile fa_mobile' aria-hidden='true'></i> ".$row['mobile_2'];
										}
										if(!isset($row['mobile_1']) && !isset($row['mobile_2'])){
											echo "Not Available";
										}
									?>
							</div>
							<label class="col-lg-12 col-md-2 col-sm-3 col-xs-12 label-title-upper"> References Contact:</label>
								<?php if(isset($row['references'][1]['full_name'])) { ?>
										<div class="col-lg-5 col-md-1 col-sm-3 col-xs-12 form-group no-label">
											<?php
												echo "1. ". $row['references'][1]['title'] ." ". $row['references'][1]['full_name']." ,". $row['references'][1]['designation'];
											?>		
										</div>		
										<div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group no-label">	
											   <?php echo $row['references'][1]['contact_no'];?>
										
										</div>
								<?php 	}?>	
								<?php if(isset($row['references'][2]['full_name'])) { ?>
										<div class="col-lg-5 col-md-1 col-sm-3 col-xs-12 form-group no-label">
											<?php
												echo  "2. ". $row['references'][2]['title'] ." ". $row['references'][2]['full_name']." ,". $row['references'][2]['designation'];
											?>		
										</div>		
										<div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group no-label">	
											   <?php echo $row['references'][2]['contact_no'];?>
										
										</div>
								<?php 	}?>	
								<?php if(isset($row['references'][3]['full_name'])) { ?>
										<div class="col-lg-5 col-md-1 col-sm-3 col-xs-12 form-group no-label">
											<?php
												echo  "3. ". $row['references'][3]['title'] ." ". $row['references'][3]['full_name']." ,". $row['references'][3]['designation'];
											?>		
										</div>		
										<div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group no-label">	
											   <?php echo $row['references'][3]['contact_no'];?>
										
										</div>
								<?php 	}?>	
										
						</fieldset>
					</div>	
					<div class="item col-lg-10 col-md-5 col-sm-3 col-xs-12 col-lg-offset-1">
						<fieldset class="well demo-content" id="fs_employers_list">
						<?php if( isset($my_acceses['users_employers']) && $my_acceses['users_employers']['add_entity'] == '1') { ?>
							<button type="button" name="btn1" class="btn btn-success pull-right add_new_item" onclick="javascript:toggle_modal_employers(0, '<?php echo $model['id']; ?>');" title="Add New"><i class="fa fa-plus" > </i></button>
						<?php } ?>
							<legend class="well-legend">Employment History </legend>
								<div class="form-group col-lg-12 col-md-1 col-sm-3 col-xs-12 ">
									 <label class="col-lg-3 label-title-upper with-bordered">Company   </label>
									 <label class="col-lg-2 label-title-upper with-bordered">Designation </label>
									 <label class="col-lg-2 label-title-upper with-bordered">Duration [Months] </label>
									 <label class="col-lg-2 label-title-upper with-bordered">Package [PER ANNUM] </label>
									 <label class="col-lg-2 label-title-upper with-bordered">Location  </label>
									 <label class="col-lg-1 label-title-upper with-bordered-last">Phone No.</label>
								</div>
								<?php if( isset($row['users_employers']) && count($row['users_employers']) > 0 ){ ?>
									<?php $i = 1; ?>
									
									<?php foreach($row['users_employers'] as $arr){ ?>
									<?php $_id = $arr['users_employers_id']; ?>
										<div class="col-lg-12 col-md-1 col-sm-3 col-xs-12 " id="row_employers_list_<?php echo $_id; ?>">
											 <label class="col-lg-3  with-bordered-text" id="col_1_<?php echo $_id ;?>"> <?php echo $arr['users_employer_name']; ?><br/>
												Web : <a href="<?php echo $arr['users_employer_website']; ?>" > <?php echo $arr['users_employer_website']; ?></a>
											 </label>
											 <label class="col-lg-2 with-bordered-text" id="col_2_<?php echo $_id ;?>">At Joining <?php echo $arr['users_employer_designation_joining']; ?> </br> At Leaving <?php echo $arr['users_employer_designation_leaving']; ?></label>
											 <label class="col-lg-2  with-bordered-text" id="col_3_<?php echo $_id ;?>">From <?php echo $months_arr[$arr['duration_from_month']]['abbr']." ".$arr['duration_from_year'] ;?> To  <?php echo $months_arr[$arr['duration_to_month']]['abbr']." ".$arr['duration_to_year'] ;?></label>
											 <label class="col-lg-2  with-bordered-text" id="col_4_<?php echo $_id ;?>">At Joining <?php echo $arr['users_employer_package_joining']; ?> </br> At Leaving <?php echo $arr['users_employer_package_leaving']; ?></label>
											 <label class="col-lg-2 with-bordered-text" id="col_5_<?php echo $_id ;?>"><?php  if(isset($states[$arr['city_id']])) echo $cities[$arr['city_id']]; ?> <?php if(isset($states[$arr['state_id']])) echo $states[$arr['state_id']]; ?></label>
											 <label class="col-lg-1  with-bordered-text-last" id="col_6_<?php echo $_id ;?>"><?php echo $arr['users_employer_phone']; ?> </label>
											 <button type="button" name="btn1"  class="btn btn-warning pull-right edit_item" onclick="javascript:toggle_modal_employers(<?php echo $arr['users_employers_id']; ?>, '<?php echo $model['id']; ?>');" title="Edit this record"><i class="fa fa-pencil" > </i></button>
											 <?php $obj_resp = array('response' => $arr); ?>
										</div>
										<?php $i++; ?>
									<?php  } // foreach ?>	
								<?php }else{ //  end if ?>	
								<div class="col-lg-12 col-md-1 col-sm-3 col-xs-12 " id="emptyrow">
									<label class="col-lg-12 label-title-upper noborder text-center" > No record found</label>
								</div>
								<?php }//  end if ?>	
						</fieldset>
					</div>	
					<div class="item col-lg-10 col-md-5 col-sm-3 col-xs-12 col-lg-offset-1">
						<fieldset class="well demo-content" id="fs_degree_list">
							<?php if( isset($my_acceses['users_educational_qualifications']) && $my_acceses['users_educational_qualifications']['add_entity'] == '1') { ?>
							<button type="button" name="btn1" class="btn btn-success pull-right add_new_item" onclick="javascript:toggle_modal('modal_qualifications<?php echo $row['id']; ?>', 0);" title="Add New"><i class="fa fa-plus" > </i></button>
							<?php }//  end if ?>	
							<legend class="well-legend">Qualifications & Skills </legend>
								<div class="form-group col-lg-12 col-md-1 col-sm-3 col-xs-12 ">
									 <label class="col-lg-1 label-title-upper with-bordered"> Sr. #</label>
									 <label class="col-lg-2 label-title-upper with-bordered">School/College   </label>
									 <label class="col-lg-2 label-title-upper with-bordered">Board / Uni.  </label>
									 <label class="col-lg-2 label-title-upper with-bordered">Degree / Certification  </label>
									 <label class="col-lg-2 label-title-upper with-bordered">No. Of Years Completed  </label>
									 <label class="col-lg-1 label-title-upper with-bordered">% Obtain </label>
									 <label class="col-lg-1 label-title-upper with-bordered">Major </label>
									 <label class="col-lg-1 label-title-upper with-bordered-last ">Minor </label>
								</div>
								<?php if( isset($row['qualifications']) && count($row['qualifications']) > 0 ){ ?>
									<?php $i = 1; ?>
									
									<?php foreach($row['qualifications'] as $arr){ ?>
									<?php $_id = $arr['users_educational_qualifications_id']; ?>
										<div class="col-lg-12 col-md-1 col-sm-3 col-xs-12 " id="row_degree_list_<?php echo $arr['users_educational_qualifications_id']; ?>">
										
											 <label class="col-lg-1  with-bordered-text" id="col_1_<?php echo $_id ;?>"> <?php echo $i; ?></label>
											 <label class="col-lg-2 with-bordered-text" id="col_2_<?php echo $_id ;?>"><?php echo $arr['institute_name']; ?></label>
											 <label class="col-lg-2  with-bordered-text" id="col_3_<?php echo $_id ;?>"><?php echo $arr['board_name']; ?></label>
											 <label class="col-lg-2  with-bordered-text" id="col_4_<?php echo $_id ;?>"><?php echo $arr['name']; ?></label>
											 <label class="col-lg-2  with-bordered-text " id="col_5_<?php echo $_id ;?>"><?php echo $arr['no_of_years']; ?>&nbsp; Year(s)&nbsp; <small class="inline">[<?php echo $months_arr[$arr['duration_from_month']]['abbr']." ".$arr['duration_from_year'] ;?> - <?php echo $months_arr[$arr['duration_to_month']]['abbr']." ".$arr['duration_to_year'] ;?>] </small> </label>
											 <label class="col-lg-1 with-bordered-text" id="col_6_<?php echo $_id ;?>"><?php echo $arr['obtained_grade']; ?></label>
											 <label class="col-lg-1 with-bordered-text" id="col_7_<?php echo $_id ;?>"><?php echo $arr['major']; ?> </label>
											 <label class="col-lg-1  with-bordered-text-last" id="col_8_<?php echo $_id ;?>"><?php echo $arr['minor']; ?> </label>
											<?php if( isset($my_acceses['users_educational_qualifications']) && $my_acceses['users_educational_qualifications']['edit_entity'] == '1') { ?>
												<button type="button" name="btn1" 	 class="btn btn-warning pull-right edit_item" onclick="javascript:toggle_modal('modal_qualifications<?php echo $row['id']; ?>', <?php echo $arr['users_educational_qualifications_id']; ?>);" title="Edit this record"><i class="fa fa-pencil" > </i></button>
											 <?php }//  end if ?>	
											 <?php $obj_resp = array('response' => $arr); ?>
										<div  id="q<?php echo $_id; ?>" style="display:none"><?php echo json_encode($obj_resp) ;?></div>
										</div>
										
										<?php $i++; ?>
									<?php  } // foreach ?>	
								<?php }else{ //  end if ?>	
								<div class="col-lg-12 col-md-1 col-sm-3 col-xs-12 " id="emptyrow">
									<label class="col-lg-12 label-title-upper noborder text-center" > No record found</label>
								</div>
								<?php }//  end if ?>	
						</fieldset>
					</div>	
			
					<div class="item col-lg-5 col-md-5 col-sm-3 col-xs-12 col-lg-offset-1">
						<fieldset class="well demo-content">
							<legend class="well-legend">Family Detail & Emergency Contacts</legend>
							
							<label class="col-lg-12 col-md-2 col-sm-3 col-xs-12 label-title-upper"> Family Members: 
								<?php if ((isset($row['family']) && count($row['family']) < 2) || !isset($row['family'])) { ?>
									<button type="button" name="btn1" id="btn_1" class="btn btn-success add-btn pull-right" title="Add Family Member" onclick="javascript:toggle_modal_family('0', '<?php echo $model['id'];?>');"><i class="fa fa-plus" > </i></button>
								<?php } ?>	
							</label>
							<div class="row" id="div_users_family_list">
							<?php if (count($row['family']) > 0) { $i = 1;?>
								<?php  foreach ($row['family'] as $key => $val) {?>
										<div class="col-lg-11 col-lg-offset-1" id="row_family_list_<?php echo $val['users_family_id'];?>" >
											<?php if(isset($val['relation_name'])  && isset($val['full_name'])){ ?>
											<label class="col-lg-4 col-md-2 col-sm-3 col-xs-12 label-title-upper" id="users_family_relation_id<?php echo $val['users_family_id'];?>"> <?php echo $val['relation_name'];?> </label>
											
											<div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group " title="Edit Family Member" >
												<span id="users_family_full_name<?php echo $val['users_family_id'];?>">
												<?php echo $val['full_name'];?>
												</span>
												<small class="margin-left" id="users_family_relation_type<?php echo $val['users_family_id'];?>" >[ <?php echo ucfirst($val['relation_type']);?> ] </small> 
											</div>
											<div class="col-lg-2 text-center div-editor" onclick="javascript:toggle_modal_family('<?php echo $val['users_family_id'];?>', '<?php echo $model['id'];?>');"  >
											<i class="fa fa-pencil " title="Edit Family Member"> </i>
											</div>
										</div>
										<?php } ?>
								<?php $i++; } ?>	
							<?php } ?>	
							</div>
							<label class="col-lg-12 col-md-2 col-sm-3 col-xs-12 label-title-upper"> Emergency Contacts:
								<?php if ((isset($row['emergency']) && count($row['emergency']) < 2) || !isset($row['emergency'])) { ?>
									<button type="button" name="btn1" id="btn_1" class="btn btn-success add-btn pull-right" title="Add Emergency Contact" onclick="javascript:toggle_modal_emergency_contact('0', '<?php echo $model['id'];?>');"><i class="fa fa-plus" > </i></button>
								<?php } ?>	
							</label>
								<div class="row" id="div_users_emergency_contacts_list">
									<div class="col-lg-11 col-lg-offset-1" >
									<?php if(isset($row['emergency'][1]['full_name']) && isset($row['emergency'][1]['users_emergency_contacts_id'])) { ?>
										<div class="col-lg-4 col-md-1 col-sm-3 col-xs-12 form-group no-label" id="emergency_contacts_name_<?php echo $row['emergency'][1]['users_emergency_contacts_id']; ?>" >
											<?php
												echo " ". $row['emergency'][1]['full_name']." [ ". $row['emergency'][1]['relation']." ] ";
											?>		
										</div>		
										<div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group no-label" id="emergency_contacts_no_<?php echo $row['emergency'][1]['users_emergency_contacts_id']; ?>">	
											   <?php echo  $row['emergency'][1]['contact_no'];?>
										
										</div>
										<div class="col-lg-1 text-center" onclick="javascript:toggle_modal_emergency_contact('<?php echo $row['emergency'][1]['users_emergency_contacts_id'];?>', '<?php echo $model['id'];?>');"  >
											<i class="fa fa-pencil pull-right" title="Edit this"> </i>
										</div>
									<?php 	}?>	
									</div>
										<div class="col-lg-11 col-lg-offset-1" >
											<?php if(isset($row['emergency'][2]['full_name']) && isset($row['emergency'][2]['users_emergency_contacts_id'])) { ?>
											<div class="col-lg-4 col-md-1 col-sm-3 col-xs-12 form-group no-label"  id="emergency_contacts_name_<?php echo $row['emergency'][1]['users_emergency_contacts_id']; ?>">
												<?php
													echo " ". $row['emergency'][2]['full_name']."  [ ". $row['emergency'][2]['relation']." ] ";
												?>		
											</div>		
											<div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group no-label" id="emergency_contacts_no_<?php echo $row['emergency'][1]['users_emergency_contacts_id']; ?>">	
												   <?php echo  $row['emergency'][2]['contact_no'];?>
											
											</div>
											<div class="col-lg-1 text-center " onclick="javascript:toggle_modal_emergency_contact('<?php echo $row['emergency'][2]['users_emergency_contacts_id'];?>', '<?php echo $model['id'];?>');"  >
												<i class="fa fa-pencil pull-right" title="Edit this"> </i>
												</div>
											<?php 	}?>	
										</div>
									</div>
						</fieldset>
					</div>
					<div class="item col-lg-5 col-md-5 col-sm-3 col-xs-12 ">
						<fieldset class="well demo-content">
							<legend class="well-legend">Documents</legend>
							<?php if (isset($row['documents'])) {?>
							<?php if (count($row['documents']) > 0) { $i = 1;?>
								<?php  foreach ( $row['documents'] as $key => $val) {
										$on_date = "Download ".$row['first_name']." ".$row['last_name']."'s ". $val['document_name'] ." . Uploaded on ".date('d M Y', strtotime($val['created_at']));
										
									?>
									<label class="col-lg-10 col-md-2 col-sm-3 col-xs-12 label-title-upper"> <?php echo $i .". " .$val['document_name'];?></label>
										<a href="javascript:void(0);"  onclick="download_doc('<?php echo $val['id'];?>', '<?php echo $model['id']; ?>');">
										<div class="col-lg-2 col-md-1 col-sm-3 col-xs-12 text-center" title="<?php echo $on_date; ?>">
											<i class="fa fa-download fa_mobile" aria-hidden="true"></i> 
										</div>
										</a>
								<?php $i++; } ?>	
							<?php } ?>
							<?php } ?>
						</fieldset>
					</div>
					
		</div>
	</div>
	</div>
   </form>			
</div>
</div>
<!-- Modal for upload profile Picture -->
<div class="modal" tabindex="-1" role="dialog" id="modal_upload">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Change Profile Picture </h4>
        <h5 class="modal-title"><?php echo $row['first_name'] . " " . $row['last_name'] ;?> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="input-group-prepend input-group mb-3">
			<span class="input-group-text">Upload</span>
		</div>
		<form name="frm_upload" id="frm_upload" method="post" enctype="multipart/form-data" data-bv-message="This value is not valid"
						data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" action="">
		 <input type="hidden" name="id" id="id" value="<?php if(isset($model['id'])) { echo $model['id']; } ?>" />				
		  <div class="custom-file form-group ">
			<input required data-bv-notempty="true" data-bv-notempty-message="Please choose file" type="file" class="form-control custom-file-input" id="userfile" name="userfile">
		  </div>
	   </div>
      <div class="modal-footer form-group">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
	  </form>
    </div>
  </div>
</div>

<!-- Modal for Assign Role  -->
<div class="modal" tabindex="-1" role="dialog" id="modal_assignrole">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Assign Role To <?php echo $row['first_name'] . " " . $row['last_name'] ;?> </h4>
        <h5 class="modal-title">Current Role : <?php if( isset($row['role_id']) && $row['role_id'] == 0) echo "Not Assigned"; else echo $roles[$row['role_id']]; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     	<form name="frm_assignrole" id="frm_assignrole" method="post" enctype="multipart/form-data" action="">
		<input type="hidden" name="id" id="id" value="<?php if(isset($model['id'])) { echo $model['id']; } ?>" />				
		<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
			<div class="col-lg-11 col-lg-offset-1 col-md-1 col-sm-3 col-xs-12 form-group">
			<?php foreach ( $roles as $key => $value ): ?>
			<label class="col-lg-12 control-label label-title-upper">		
				<input  <?php if ( isset($row['role_id']) &&  $row['role_id'] == $key ) { ?> checked="checked"<?php } ?> type="radio" class="flat" name="role_id" id="role_id<?php echo $key; ?>" value="<?php echo $key; ?>"  /> <?php echo $value; ?>
			</label>	
			<?php endforeach; ?>			
			</div>
		</div>
		<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12"></div>
		<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
			<button type="submit"  name="btn_2" value="Save" class="btn btn-success  pull-right" title="Save Profile"><i class="fa fa-floppy-o" > </i></button>	
			<button type="button" class="btn btn-danger pull-right" data-dismiss="modal" title="Cancel"><i class="fa fa-times" > </i></button>
		</div>
	   </div>
		
	  </form>
    </div>
  </div>
</div>
<!-- Modal for Change Password -->
<div class="modal" tabindex="-1" role="dialog" id="modal_change_password">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Change Password of  <?php echo $row['first_name'] . " ". $row['middle_name']. " " . $row['last_name'] ;?> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     	<form name="frm_changepassword" id="frm_changepassword" method="post" action="" data-bv-message="This value is not valid" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
		<input type="hidden" name="id" id="id" value="<?php if(isset($model['id'])) { echo $model['id']; } ?>" />				
		<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
				 <label class="control-label col-lg-4 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="password" id="lbl_dob">Password<span class="requireds">*</span> </label>
				 <div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group">   
							<input id="password" name="password" class="form-control col-md-7 col-xs-12" type="password" placeholder="New Password" required>
				</div>
		</div>
		<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
				 <label class="control-label col-lg-4 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="password" id="lbl_dob">Conform Password<span class="requireds">*</span> </label>
				 <div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group">   
							<input id="confirm_password" name="confirm_password" class="form-control col-md-7 col-xs-12" type="password" placeholder="Conform Password" required >
				</div>
		</div>
		<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12"></div>
		<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
			<button type="submit"  name="btn_2" value="Save" class="btn btn-success  pull-right" title="Save Password"><i class="fa fa-floppy-o" > </i></button>	
			<button type="button" class="btn btn-danger pull-right" data-dismiss="modal" title="Cancel"><i class="fa fa-times" > </i></button>
		</div>
		</div>
		
	   </div>
		
	  </form>
    </div>
  </div>
</div>
<!-- Modal for Personal Info -->

<div class="modal" tabindex="-2" role="dialog" id="modal_personal_info<?php echo $row['id'];?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
	  <h4> <?php echo $row['first_name'] . " " . $row['last_name'] ;?> </h4>
	  <fieldset class="well demo-content">
		<legend class="well-legend-popup">Edit Personal Info </legend>
		<form class="form-horizontal form-label-left" novalidate method="post" action="" id="frm_personal_info"
			data-bv-message="This value is not valid" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
			<input type="hidden" name="task" id="task" value="save" />
			<input type="hidden" name="id" id="id" value="<?php echo $model['id']; ?>" />
			<input type="hidden" name="users_personals_id"   value="<?php echo $row['users_personals_id']; ?>" />
			<input type="hidden" name="users_id_proofs_id"   value="<?php echo $row['users_id_proofs_id']; ?>" />
			<input type="hidden" name="section" value="personal_info" />
			<div class="row"> 
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
					<label class="control-label col-lg-4 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="first_name" id="lbl_dob">First Name<span class="requireds">*</span> </label>
					<div class="col-lg-4 col-md-1 col-sm-3 col-xs-12 form-group">   
							<select class="form-control col-lg-2 " id="title" name="title">
							   <option value="Mr."<?php if( $row['title']  == "Mr." ) { ?> selected="selected"<?php } ?>>Mr.</option>
							   <option value="Mrs."<?php if ( $row['title'] == "Mrs." ) { ?> selected="selected"<?php } ?>>Mrs.</option>
							   <option value="Miss."<?php if ( $row['title'] == "Miss." ) { ?> selected="selected"<?php } ?>>Miss.</option>
							   <option value="Miss."<?php if ( $row['title'] == "Dr." ) { ?> selected="selected"<?php } ?>>Dr.</option>
							   <option value="Miss."<?php if ( $row['title'] == "Prof." ) { ?> selected="selected"<?php } ?>>Prof.</option>
							</select>						
					</div>
					 <div class="col-lg-4 col-md-1 col-sm-3 col-xs-12 form-group">   
						<input type="text"  data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z\ .]+$" data-bv-regexp-message="Special Characters are not allowed" class="form-control" name="first_name" id="first_name" placeholder="First name" value="<?php echo $row['first_name']; ?>" <?php echo $data_bv['first_name']; ?> >	
					</div>
					<label class="control-label col-lg-4 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="first_name" id="lbl_dob">Middle Name<span class="requireds">*</span> </label>
					<div class="col-lg-4 col-md-1 col-sm-3 col-xs-12 form-group">   
						<input type="text"  data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z\ .]+$" data-bv-regexp-message="Special Characters are not allowed" class="form-control" name="middle_name" id="middle_name" placeholder="Middle name" value="<?php echo $row['middle_name']; ?>" <?php echo $data_bv['middle_name']; ?> >	
					</div>
					<div class="col-lg-4 col-md-1 col-sm-3 col-xs-12 form-group">   
						<input type="text"  data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z\ .]+$" data-bv-regexp-message="Special Characters are not allowed" class="form-control" name="last_name" id="last_name" placeholder="Last name" value="<?php echo $row['last_name']; ?>" <?php echo $data_bv['last_name']; ?> >	
					</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
				 <label class="control-label col-lg-4 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="dob" id="lbl_dob">Date of Birth<span class="requireds">*</span> </label>
				 <div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group">   
							<input <?php echo $data_bv['dob']; ?> id="dob" name="dob" value="<?php echo $row['dob'];?>" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" onChange="GetNextDate();"  type="text" placeholder="eg. mm/dd/yyyy" >
						<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>						
					</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
				 <label class="control-label col-lg-4 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="blood_group" id="lbl_dob">Blood Group<span class="requireds">*</span> </label>
				 <div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group">   
							<input type="text" class="form-control col-md-7 col-xs-12 input-small" placeholder="eg. O+"  maxlength="6" name="blood_group" id="blood_group" value="<?php echo $row['blood_group']; ?>" <?php echo $data_bv['blood_group']; ?>>					
					</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12 ">
						 <label class="control-label col-lg-4 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="marital_status">Marital Status<span class="requireds">*</span> </label>
						 <div class="col-lg-8 col-md-1 col-sm-3 col-xs-12 form-group pull-right">   
									<label class="control-label label-title-upper">
													<input <?php if($row['marital_status'] == 0) echo 'checked="checked" '; ?> type="radio" class="flat" name="marital_status" id="marital_status_1" value="0"  /> Married
									</label>
									<label class="control-label label-title-upper">
													<input  <?php if($row['marital_status'] == 1) echo 'checked="checked" '; ?> type="radio" class="flat" name="marital_status" id="marital_status_2" value="1"  /> Single
									</label>
									<label class="control-label label-title-upper">		
													<input  <?php if($row['marital_status'] == 2) echo 'checked="checked" '; ?> type="radio" class="flat" name="marital_status" id="marital_status_3" value="2"  /> Divorced
									</label>						
							</div>
				</div>
				 <div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
						 <label class="control-label col-lg-4 col-md-2 col-sm-3 col-xs-12 label-title-upper" for="title">Gender<span class="requireds">*</span> </label>
						 <div class="col-lg-8 col-md-2 col-sm-3 col-xs-12 form-group">   
							<div id="Gender1" class="btn-group" data-toggle="buttons">    
									<label class="control-label label-title-upper">
													<input <?php if($row['gender'] == 1) echo 'checked="checked" '; ?> type="radio" class="flat" name="gender" id="gender_1" value="1"  /> Male
									</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<label class="control-label label-title-upper">
													<input  <?php if($row['gender'] == 0) echo 'checked="checked" '; ?> type="radio" class="flat" name="gender" id="gender_0" value="0"  /> Female
									</label>
							</div>						
							</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
					<label class="control-label col-lg-4 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="email_secondary">Email <small>[Personal] </small></label>
					<div class="col-lg-8 col-md-1 col-sm-3 col-xs-12 form-group">   
						<input type="email" class="form-control" name="email_secondary" id="email_secondary" placeholder="Personal Email" value="<?php echo $row['email_secondary']; ?>" <?php echo $data_bv['email_secondary']; ?>>						
					</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
					<label class="control-label col-lg-4 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="aadhar_name">Full Name <small>[AS PER AADHAR ] </small></label>
					<div class="col-lg-8 col-md-1 col-sm-3 col-xs-12 form-group">   
						<input type="text" class="form-control" name="aadhar_name" id="aadhar_name" placeholder="Full Name" value="<?php echo $row['aadhar_name']; ?>" <?php echo $data_bv['aadhar_name']; ?>>						
					</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
					<label class="control-label col-lg-4 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="aadhar_no">Aadhar Card Number</label>
					<div class="col-lg-8 col-md-1 col-sm-3 col-xs-12 form-group">   
						<input type="text" class="form-control" name="aadhar_no" id="aadhar_no" placeholder="Aadhar Card Number" value="<?php echo $row['aadhar_no']; ?>" <?php echo $data_bv['aadhar_no']; ?>>						
					</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
					<label class="control-label col-lg-4 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="pan">PAN</label>
					<div class="col-lg-8 col-md-1 col-sm-3 col-xs-12 form-group">   
						<input type="text" class="form-control" name="pan" id="pan" placeholder="PAN" value="<?php echo $row['pan']; ?>" <?php echo $data_bv['pan']; ?>>						
					</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
						<button type="submit"  name="btn_1" value="Save" class="btn btn-success  pull-right" title="Save Personal Info"><i class="fa fa-floppy-o" > </i></button>	
						<button type="button" class="btn btn-danger pull-right" data-dismiss="modal" title="Cancel"><i class="fa fa-times" > </i></button>
				</div>
			</div>
			</form>			
	</fieldset>
    </div>
  </div>
</div>
</div>

<!-- Modal for Profile Edit -->
<div class="modal" tabindex="-2" role="dialog" id="modal_profile<?php echo $row['id'];?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
	  <h4> <?php echo $row['first_name'] . " " . $row['last_name'] ;?> </h4>
	  <fieldset class="well demo-content">
		<legend class="well-legend-popup">Edit Profile </legend>
		
		<form class="form-horizontal form-label-left" novalidate method="post" name="frm_profile" action="" id="frm_profile"
			data-bv-message="This value is not valid" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" >
			<input type="hidden" name="task" id="task" value="save" />
			<input type="hidden" name="id" id="id" value="<?php echo $model['id']; ?>" />
            <input type="hidden" name="users_officials_id" id="users_officials_id"  value="<?php echo $row['users_officials_id']; ?>" />
            <input type="hidden" name="users_positions_id" id="users_positions_id" value="<?php echo $row['users_positions_id']; ?>" />
     		<input type="hidden" name="section"  value="profile" />
                       
			<div class="row"> 
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
				 <label class="control-label col-lg-4 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="dob" id="lbl_dob">Employee Code<span class="requireds">*</span> </label>
				 <div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group">   
							<input type="text" class="form-control col-md-7 col-xs-12 input-small" placeholder="Please enter Employee Code" name="username" id="username" value="<?php echo $row['username']; ?>" <?php echo $data_bv['username']; ?>>						
					</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
				 <label class="control-label col-lg-4 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="position_id">Position<span class="requireds">*</span> </label>
				 <div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group">   
							<select class="form-control" id="position_id" name="position_id" <?php echo $data_bv['position_id']; ?>>
											 <option value="">--  Select Position-- </option>
													 <?php foreach ( $positions as $key => $value ): ?>
													   <option value="<?php echo $key; ?>"<?php if ( isset($row['position_id']) &&  $row['position_id'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
													 <?php endforeach; ?>
									 </select>				
					</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
				 <label class="control-label col-lg-4 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="department_id" >Department<span class="requireds">*</span> </label>
				 <div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group">   
							<select class="form-control" id="department_id" name="department_id" <?php echo $data_bv['department_id']; ?>>
											 <option value="">--  Select Department-- </option>
													 <?php foreach ( $departments as $key => $value ): ?>
													   <option value="<?php echo $key; ?>"<?php if ( isset($row['department_id']) &&  $row['department_id'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
													 <?php endforeach; ?>
									 </select>				
					</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
				 <label class="control-label col-lg-4 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="reporting_manager_id" >Manager<span class="requireds">*</span> </label>
				 <div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group">   
							<select class="form-control" id="reporting_manager_id" name="reporting_manager_id" <?php echo $data_bv['reporting_manager_id']; ?>>
											 <option value="">--  Select Manager-- </option>
													 <?php foreach ( $managers as $key => $value ): ?>
													   <option value="<?php echo $key; ?>"<?php if ( isset($row['reporting_manager_id']) &&  $row['reporting_manager_id'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
													 <?php endforeach; ?>
									 </select>				
					</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
					<label class="control-label col-lg-4 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="email">Email <small>[
					Official] </small></label>
					<div class="col-lg-8 col-md-1 col-sm-3 col-xs-12 form-group">   
						<input type="email" class="form-control" name="email" id="email" placeholder="Official Email ID" value="<?php echo $row['email']; ?>" <?php echo $data_bv['email']; ?>>						
					</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
					<label class="control-label col-lg-4 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="skype_id">Skype <small>[
					Official] </small></label>
					<div class="col-lg-8 col-md-1 col-sm-3 col-xs-12 form-group">   
						<input type="text" class="form-control" name="skype_id" id="skype_id" placeholder="Official Skype ID" value="<?php echo $row['skype_id']; ?>" <?php echo $data_bv['skype_id']; ?>>						
					</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12 ">
				 <label class="control-label col-lg-4 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="employment_status_1">Employment Type<span class="requireds">*</span> </label>
				 <div class="col-lg-8 col-md-1 col-sm-3 col-xs-12 form-group pull-right">   
							<label class="control-label label-title-upper">
									<input    type="radio" class="flat" name="employment_status" id="employment_status_1" value="0" <?php if ($row['employment_status']  == 0 )  echo 'checked="checked" '; ?> /> Full Time</label>
							<label class="control-label label-title-upper">	
									<input   type="radio" class="flat" name="employment_status" id="employment_status_2" value="1" <?php if ($row['employment_status']  == 1 )  echo 'checked="checked" '; ?> /> Part Time</label>
							<label class="control-label label-title-upper">	
									<input   type="radio" class="flat" name="employment_status" id="employment_status_3" value="2"<?php if ($row['employment_status']  == 2 )  echo 'checked="checked" '; ?> /> Temporary</label>							
						</div>						
				</div>
				</div>
				 <div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
						 <label class="control-label col-lg-4 col-md-2 col-sm-3 col-xs-12 label-title-upper" for="working_hours_from">Ordinary Working Hours of work:<span class="requireds">*</span> </label>
						 <div class="col-lg-4 col-md-2 col-sm-3 col-xs-12 form-group">   
							<div id="Gender1" class="btn-group" data-toggle="buttons">    
									<strong> FROM </strong><input   <?php echo $data_bv['working_hours_from']; ?>  type="text" class="form-control col-lg-8 input-small pull-left"  maxlength="10" name="working_hours_from" id="working_hours_from" value="<?php echo $row['working_hours_from']; ?>">
										
							</div>						
						</div>
						<div class="col-lg-4 col-md-2 col-sm-3 col-xs-12 form-group">   
							<div id="Gender1" class="btn-group" data-toggle="buttons">    
									<strong> TO  </strong><input   <?php echo $data_bv['working_hours_to']; ?>  type="text" class="form-control col-lg-8 input-small pull-left"  maxlength="10" name="working_hours_to" id="working_hours_to" value="<?php echo $row['working_hours_to']; ?>">
										
							</div>						
						</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12 ">
				 <label class="control-label col-lg-4 col-md-0 col-sm-0 col-xs-0 label-title-upper" >Status<span class="requireds">*</span> </label>
				 <div class="col-lg-8 col-md-1 col-sm-3 col-xs-12 form-group pull-right">   
							<label class="control-label label-title-upper" for="active_status0">
									<input    type="radio" class="flat" name="active_status" id="active_status0" value="1" <?php if ($row['active_status']  == 1 )  echo 'checked="checked" '; ?> /> Active </label>
							<label class="control-label label-title-upper" for="active_status1">	
									<input   type="radio" class="flat" name="active_status" id="active_status1" value="0" <?php if ($row['active_status']  == 0 )  echo 'checked="checked" '; ?> /> Inactive </label>
						</div>						
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
						<button type="submit"  name="btn_2" value="Save" class="btn btn-success  pull-right" title="Save Profile"><i class="fa fa-floppy-o" > </i></button>	
						<button type="button" class="btn btn-danger pull-right" data-dismiss="modal" title="Cancel"><i class="fa fa-times" > </i></button>
				</div>
			</div>
			</form>			
			</legend>
	</fieldset>
    </div>
  </div>
</div>


<!-- Modal for Official Information Edit Section -->
<div class="modal" tabindex="-2" role="dialog" id="modal_official_info<?php echo $row['id'];?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
	  <h4> <?php echo $row['first_name'] . " " . $row['last_name'] ;?> </h4>
	  <fieldset class="well demo-content">
		<legend class="well-legend-popup">Edit Official Information </legend>
		
		<form class="form-horizontal form-label-left" novalidate method="post" name="frm_official_info" action="" id="frm_official_info"
			data-bv-message="This value is not valid" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" >
			<input type="hidden" name="task" id="task" value="save" />
			<input type="hidden" name="id" id="id" value="<?php echo $model['id']; ?>" />
            <input type="hidden" name="users_personals_id"   value="<?php echo $row['users_personals_id']; ?>" />
            <input type="hidden" name="users_officials_id"   value="<?php echo $row['users_officials_id']; ?>" />
            <input type="hidden" name="users_id_proofs_id"   value="<?php echo $row['users_id_proofs_id']; ?>" />
     		<input type="hidden" name="section"   value="official_info" />
                       
			<div class="row"> 
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
				 <label class="control-label col-lg-4 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="joining_date" id="lbl_joining_date">Date Of Employment<span class="requireds">*</span> </label>
				 <div class="col-lg-4 col-md-1 col-sm-3 col-xs-12 form-group">   
							<input <?php echo $data_bv['joining_date']; ?> id="joining_date" name="joining_date" value="<?php echo $row['joining_date'];?>" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" onChange="GetNextDate();"  type="text" placeholder="eg.  mm/dd/yyyy" >
						<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>							
					</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
					 <label class="control-label col-lg-4 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="position_id">Moths of Bond <span class="requireds">*</span> </label>
					 <div class="col-lg-4 col-md-1 col-sm-3 col-xs-12 form-group">   
						<select class="form-control" id="bond_period" name="bond_period" <?php echo $data_bv['bond_period']; ?>>
						       <option value="">-- Select Months-- </option>
								<option value="12" <?php if($row['bond_period'] == '12') echo ' selected="selected" ' ;?>> 12 Months </option>
								<option value="18"  <?php if($row['bond_period'] == '18') echo ' selected="selected" ' ;?>> 18 Months </option>
								<option value="24"  <?php if($row['bond_period'] == '24') echo ' selected="selected" ' ;?>> 24 Months </option>
						</select>				
					 </div>
					 <div class="col-lg-4 col-md-1 col-sm-3 col-xs-12 form-group">   
						<input <?php echo $data_bv['bond_to_date']; ?> id="bond_to_date" name="bond_to_date" value="<?php echo $row['bond_to_date'];?>" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" onChange="GetNextDate();"  type="text" placeholder="eg.  mm/dd/yyyy" >
						<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>		
					 </div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
				 <label class="control-label col-lg-4 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="insurance_no" >Insurance Policy No.<span class="requireds">*</span> </label>
					<div class="col-lg-8 col-md-1 col-sm-3 col-xs-12 form-group">   
						<input type="text" class="form-control" name="insurance_no" id="insurance_no" placeholder="Insurance Policy No." value="<?php echo $row['insurance_no']; ?>" <?php echo $data_bv['insurance_no']; ?>>				
					</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
				<label class="control-label col-lg-4 col-md-6 col-sm-3 col-xs-12">PF CODE NO/UAN NO:</label>   
				<div class="col-lg-8 col-md-1 col-sm-3 col-xs-12 form-group">   
						<input type="text" class="form-control col-md-7 col-xs-12" name="pf_code_no" id="pf_code_no" maxlength="20" placeholder="PREVIOUS PF CODE NO/UAN NO" value="<?php echo $row['pf_code_no']; ?>"  <?php echo $data_bv['pf_code_no']; ?>>				
				</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
				 <label class="control-label col-lg-4 col-md-6 col-sm-3 col-xs-12">DATE OF EXIT:<br>(PREVIOUS COMPANY)<span class="requireds">*</span>:</label>
				 <div class="col-lg-4 col-md-1 col-sm-3 col-xs-12 form-group">   
							<input id="date_of_exit" name="date_of_exit" value="<?php echo $row['date_of_exit'];?>" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" type="text" placeholder="eg.mm/dd/yyyy"  <?php echo $data_bv['date_of_exit']; ?> >
						<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>			
					</div>
				</div>
				 <div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
						<label class="control-label col-lg-4 col-md-3 col-sm-3 col-xs-12" for="Insurance_No">PAST CRIMINAL RECORD:</label>
						 <div class="col-lg-8 col-md-3 col-sm-3 col-xs-12 form-group">   
						 <label class="control-label col-lg-3 label-title-upper" for="past_criminal_record_1" onclick="javascript:alert(1);">
								<input <?php if($row['past_criminal_record'] == '1' ) echo 'checked="checked" '; ?> type="radio" class="flat" name="past_criminal_record" id="past_criminal_record_1" value="1"  /> Yes
						</label>
						<label class="control-label col-lg-3 label-title-upper" for="past_criminal_record_2" onclick="javascript:alert(0);" >
								<input  <?php if($row['past_criminal_record'] == '0') echo 'checked="checked" '; ?> type="radio" class="flat" name="past_criminal_record" id="past_criminal_record_2" value="0"  /> No
									</label>
						</div>
					 </div>
				
					<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12"  id="past_criminal_detail_box">
						<label class="control-label col-lg-4 col-md-4 col-sm-3 col-xs-12 label-title-upper" for="past_criminal_detail">PAST CRIMINAL DETAIL IF YES ? :</label>
						 <div class="col-lg-8 col-md-1 col-sm-3 col-xs-12 form-group">   
								<textarea id="past_criminal_detail" name="past_criminal_detail" maxlength="400" placeholder="Past Criminal Detail" class="form-control col-md-7 col-xs-12"  <?php echo $data_bv['past_criminal_detail']; ?>><?php echo $row['past_criminal_detail']; ?></textarea>
							</div>
					 </div>	 
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
						<button type="submit"  name="btn_2" value="Save" class="btn btn-success  pull-right" title="Save Profile"><i class="fa fa-floppy-o" > </i></button>	
						<button type="button" class="btn btn-danger pull-right" data-dismiss="modal" title="Cancel"><i class="fa fa-times" > </i></button>
				</div>
			</div>
			</form>			
			</legend>
	</fieldset>
    </div>
  </div>
</div>
</div>

<!-- Modal for Address and Contacts  Edit Section -->
<div class="modal" tabindex="-2" role="dialog" id="modal_contacts_info<?php echo $row['id'];?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
	  <h4> <?php echo $row['first_name'] . " " . $row['last_name'] ;?> </h4>
	  <fieldset class="well demo-content">
		<legend class="well-legend-popup">Edit Address & Contacts </legend>
		
		<form class="form-horizontal form-label-left" novalidate method="post" name="frm_contacts_info" action="" id="frm_contacts_info"
			data-bv-message="This value is not valid" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" >
			<input type="hidden" name="task" id="task" value="save" />
			<input type="hidden" name="id" id="id" value="<?php echo $model['id']; ?>" />
            <input type="hidden" name="users_contacts_id" id="users_contacts_id" value="<?php echo $row['users_contacts_id']; ?>" />
            <input type="hidden" name="users_primary_addresses_id" id="users_primary_addresses_id" value="<?php echo $row['primary']['users_addresses_id']; ?>" />
            <input type="hidden" name="users_temp_addresses_id" id="users_temp_addresses_id" value="<?php echo $row['temp']['users_addresses_id']; ?>" />
     		<input type="hidden" name="section"   value="contact_info" />
                       
			<div class="row"> 
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
				 <label class="control-label col-lg-3 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="joining_date" id="lbl_joining_date">Permanent Address<span class="requireds">*</span> </label>
				 <div class="col-lg-9 col-md-1 col-sm-3 col-xs-12 form-group">   
							<textarea    id="address_1" name="primary[address]" placeholder="Permanent Address" maxlength="300" class="form-control col-lg-12 textdata" <?php echo $data_bv['address']; ?>><?php echo $row['primary']['address'] ; ?></textarea>					
					</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
					 <label class="control-label col-lg-3 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="cities_id_1"></label>
					<div class="col-lg-3 form-group">   
							<select  <?php echo $data_bv['city_id']; ?>  class="form-control col-md-7 col-xs-12" id="cities_id_1" name="primary[city_id]" required="required">
							<option value="">--  Select City--</option>
							<?php foreach ( $cities as $key => $value ): ?>
								<option value="<?php echo $key; ?>"<?php if ( isset($row['primary']['city_id']) &&  $row['primary']['city_id'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
							<?php endforeach; ?>
							</select>
					</div>
					<div class="col-lg-3 col-md-1 col-sm-4 col-xs-12 form-group ">   
						<select  class="form-control col-md-7 col-xs-12" id="states_id_1" name="primary[state_id]" required="required">
							<option value="">--  Select State--</option>
							<?php foreach ( $states as $key => $value ): ?>
									<option value="<?php echo $key; ?>"<?php if ( isset($row['primary']['state_id']) &&  $row['primary']['state_id'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
							<?php endforeach; ?>
						</select>		
					 </div>
					<div class="item form-group col-lg-3 ">
							 <div class="form-group">   
										<input  <?php echo $data_bv['zipcode']; ?>  type="text" class="form-control col-md-7 col-xs-12"  maxlength="6" name="primary[zipcode]" id="zipcode_1" placeholder="Zipcode " value="<?php echo $row['primary']['zipcode']; ?>">
							</div>
						</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
				 <label class="control-label col-lg-3 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="joining_date" id="lbl_joining_date">Temporary Address<span class="requireds">*</span> </label>
				 <div class="col-lg-9 col-md-1 col-sm-3 col-xs-12 form-group">   
							<textarea    id="address_2" name="temp[address]" placeholder="Temporary Address" maxlength="300" class="form-control col-lg-12 textdata" <?php echo $data_bv['address']; ?>><?php echo $row['temp']['address'] ; ?></textarea>					
					</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
					 
					 <label class="control-label col-lg-3 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="cities_id_2"></label>
					   <div class="col-lg-3 form-group">   
							<select  <?php echo $data_bv['city_id']; ?>  class="form-control col-md-7 col-xs-12" id="cities_id_2" name="temp[city_id]" required="required">
							<option value="">--  Select City--</option>
							<?php foreach ( $cities as $key => $value ): ?>
								<option value="<?php echo $key; ?>"<?php if ( isset($row['temp']['city_id']) &&  $row['temp']['city_id'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
							<?php endforeach; ?>
							</select>
					</div>
					 <div class="col-lg-3 col-md-1 col-sm-4 col-xs-12 form-group ">   
						<select  class="form-control col-md-7 col-xs-12" id="states_id_2" name="temp[state_id]" required="required">
							<option value="">--  Select State--</option>
							<?php foreach ( $states as $key => $value ): ?>
									<option value="<?php echo $key; ?>"<?php if ( isset($row['temp']['state_id']) &&  $row['temp']['state_id'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
							<?php endforeach; ?>
						</select>		
					 </div>
					<div class="item form-group col-lg-3 ">
							 <div class="form-group">   
										<input  <?php echo $data_bv['zipcode']; ?>  type="text" class="form-control col-md-7 col-xs-12"  maxlength="6" name="temp[zipcode]" id="zipcode_2" placeholder="Zipcode " value="<?php echo $row['temp']['zipcode']; ?>">
							</div>
						</div>
				</div>
				
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
					 <label class="control-label col-lg-3 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="position_id">Phone No. </label>
					 <div class="col-lg-3 col-md-1 col-sm-4 col-xs-12 form-group ">   
						<input   data-bv-regexp="true" data-bv-regexp-regexp="^[0-9]+$" data-bv-regexp-message="Please enter valid value"  type="text" class="form-control col-md-7 col-xs-12" name="phone_no" id="phone_no" placeholder="Phone Number(S)" value="<?php echo $row['phone_no']; ?>"  <?php echo $data_bv['phone_no']; ?>>				
					 </div>
					  <div class="col-lg-3 col-md-1 col-sm-4 col-xs-12 form-group ">   
						<input   data-bv-regexp="true" data-bv-regexp-regexp="^[0-9]+$" data-bv-regexp-message="Please enter valid value"  type="text" class="form-control col-md-7 col-xs-12" name="mobile_1" id="mobile_1" placeholder="Mobile 1" value="<?php echo $row['mobile_1']; ?>"  <?php echo $data_bv['mobile_1']; ?>>				
					 </div>
					  <div class="col-lg-3 col-md-1 col-sm-4 col-xs-12 form-group ">   
						<input   data-bv-regexp="true" data-bv-regexp-regexp="^[0-9]+$" data-bv-regexp-message="Please enter valid value"  type="text" class="form-control col-md-7 col-xs-12" name="mobile_2" id="mobile_2" placeholder="Mobile 2" value="<?php echo $row['mobile_2']; ?>"  <?php echo $data_bv['mobile_2']; ?>>				
					 </div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
					
					 <label class="col-lg-3 label-title-upper text-right">References : </label>
					 <label class="col-lg-2 label-title-upper ">Title  </label>
					 <label class="col-lg-3 label-title-upper ">Full Name  </label>
					 <label class="col-lg-2 label-title-upper ">Designation  </label>
					 <label class="col-lg-2 label-title-upper ">Contact No.  </label>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
				<input type="hidden" name="references[users_references_id][1]" value="<?php echo $row['references'][1]['users_references_id']; ?>" >
				<input type="hidden" name="references[users_references_id][2]" value="<?php echo $row['references'][2]['users_references_id']; ?>" >
				<input type="hidden" name="references[users_references_id][3]" value="<?php echo $row['references'][3]['users_references_id']; ?>" >
					<label class="col-lg-3 label-title-upper text-right ">1:</label>
					<div class="col-lg-2 ">
						<select class="form-control col-lg-2 " id="title_1" name="references[title][1]">
						   <option value="Mr."<?php if( $row['references'][1]['title']  == "Mr." ) { ?> selected="selected"<?php } ?>>Mr.</option>
						   <option value="Mrs."<?php if ( $row['references'][1]['title'] == "Mrs." ) { ?> selected="selected"<?php } ?>>Mrs.</option>
						   <option value="Miss."<?php if ( $row['references'][1]['title'] == "Miss." ) { ?> selected="selected"<?php } ?>>Miss.</option>
						</select>
					</div>
					<div class="col-lg-3 ">
						<input type="text" <?php echo $data_bv['full_name']; ?> class="form-control col-md-7 col-xs-12" name="references[full_name][1]" id="full_name_1" maxlength="100" placeholder="Reference Name" value="<?php echo $row['references'][1]['full_name']; ?>">
					</div>
					<div class="col-lg-2 ">
						<input type="text" <?php echo $data_bv['designation']; ?> class="form-control col-md-7 col-xs-12" name="references[designation][1]" id="contact_references_relation_1" maxlength="100" placeholder="Reference Designation " value="<?php echo $row['references'][1]['designation']; ?>">
					</div>
					<div class="col-lg-2 ">
						<input  data-bv-regexp="true" data-bv-regexp-regexp="^[0-9]+$" data-bv-regexp-message="Please enter valid value" type="text" <?php echo $data_bv['phone_no']; ?> class="form-control col-md-7 col-xs-12" name="references[contact_no][1]" id="contact_no_1" maxlength="100" placeholder="Reference Phone No." value="<?php echo $row['references'][1]['contact_no']; ?>">
					</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
					<label class="col-lg-3 label-title-upper text-right "> 2:</label>
					<div class="col-lg-2 ">
						<select class="form-control col-lg-2 " id="title_2" name="references[title][2]">
						   <option value="Mr."<?php if( $row['references'][2]['title']  == "Mr." ) { ?> selected="selected"<?php } ?>>Mr.</option>
						   <option value="Mrs."<?php if ( $row['references'][2]['title'] == "Mrs." ) { ?> selected="selected"<?php } ?>>Mrs.</option>
						   <option value="Miss."<?php if ( $row['references'][2]['title'] == "Miss." ) { ?> selected="selected"<?php } ?>>Miss.</option>
						</select>
					</div>
					<div class="col-lg-3 ">
						<input type="text" <?php echo $data_bv['full_name']; ?> class="form-control col-md-7 col-xs-12" name="references[full_name][2]" id="full_name_2" maxlength="100" placeholder="Reference Name" value="<?php echo $row['references'][2]['full_name']; ?>">
					</div>
					<div class="col-lg-2 ">
						<input type="text" <?php echo $data_bv['designation']; ?> class="form-control col-md-7 col-xs-12" name="references[designation][2]" id="contact_references_relation_2" maxlength="100" placeholder="Reference Designation " value="<?php echo $row['references'][2]['designation']; ?>">
					</div>
					<div class="col-lg-2 ">
						<input  data-bv-regexp="true" data-bv-regexp-regexp="^[0-9]+$" data-bv-regexp-message="Please enter valid value" type="text" <?php echo $data_bv['phone_no']; ?> class="form-control col-md-7 col-xs-12" name="references[contact_no][2]" id="contact_no_2" maxlength="100" placeholder="Reference Phone No." value="<?php echo $row['references'][2]['contact_no']; ?>">
					</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
					<label class="col-lg-3 label-title-upper text-right "> 3:</label>
					<div class="col-lg-2 ">
						<select class="form-control col-lg-2 " id="title_3" name="references[title][3]">
						   <option value="Mr."<?php if( $row['references'][3]['title']  == "Mr." ) { ?> selected="selected"<?php } ?>>Mr.</option>
						   <option value="Mrs."<?php if ( $row['references'][3]['title'] == "Mrs." ) { ?> selected="selected"<?php } ?>>Mrs.</option>
						   <option value="Miss."<?php if ( $row['references'][3]['title'] == "Miss." ) { ?> selected="selected"<?php } ?>>Miss.</option>
						</select>
					</div>
					<div class="col-lg-3 ">
						<input type="text" <?php echo $data_bv['full_name']; ?> class="form-control col-md-7 col-xs-12" name="references[full_name][3]" id="full_name_3" maxlength="100" placeholder="Reference Name" value="<?php echo $row['references'][3]['full_name']; ?>">
					</div>
					<div class="col-lg-2 ">
						<input type="text" <?php echo $data_bv['designation']; ?> class="form-control col-md-7 col-xs-12" name="references[designation][3]" id="contact_references_relation_3" maxlength="100" placeholder="Reference Designation " value="<?php echo $row['references'][3]['designation']; ?>">
					</div>
					<div class="col-lg-2 ">
						<input  data-bv-regexp="true" data-bv-regexp-regexp="^[0-9]+$" data-bv-regexp-message="Please enter valid value" type="text" <?php echo $data_bv['phone_no']; ?> class="form-control col-md-7 col-xs-12" name="references[contact_no][3]" id="contact_no_3" maxlength="100" placeholder="Reference Phone No." value="<?php echo $row['references'][3]['contact_no']; ?>">
					</div>
				</div>
				
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12"></div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
						<button type="submit"  name="btn_2" value="Save" class="btn btn-success  pull-right" title="Save Profile"><i class="fa fa-floppy-o" > </i></button>	
						<button type="button" class="btn btn-danger pull-right" data-dismiss="modal" title="Cancel"><i class="fa fa-times" > </i></button>
				</div>
			</div>
			</form>			
	</fieldset>
    </div>
  </div>
</div>
</div>


<!-- Modal for Family  and Contacts  Edit Section -->
<div class="modal" tabindex="-2" role="dialog" id="modal_family_info">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
	   <h4> <?php echo $row['first_name'] . " " . $row['last_name'] ;?> </h4>
	  <fieldset class="well demo-content">
		<legend class="well-legend-popup">Edit Family Detail </legend>
		
		<form class="form-horizontal form-label-left" novalidate method="post" name="frm_family_info" action="" id="frm_family_info"
			data-bv-message="This value is not valid" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" >
			<input type="hidden" name="task" id="task" value="save" />
			<input type="hidden" name="id" id="id" value="<?php echo $model['id']; ?>" />
            <input type="hidden" name="users_family_id" id="users_family_id"   value="" />
     		<div class="row"> 
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
				 <label class="control-label col-lg-3 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="full_name" >Full Name <span class="requireds">*</span> </label>
				 <div class="col-lg-4 col-md-1 col-sm-3 col-xs-12 form-group">   
						<input   data-bv-notempty="true" data-bv-notempty-message="Full name is required"  data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z\ .]+$" data-bv-regexp-message="Please enter valid value" type="text" class="form-control col-md-7 col-xs-12" name="full_name" id="full_name" maxlength="100" placeholder="Full Name [As per Aadhar card]" value="" >				
					</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
					<label class="control-label col-lg-3 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="relation_type" >Spouse / Dependent :  </label>
					<div class="col-lg-4 col-md-1 col-sm-3 col-xs-12 form-group">   
							<select  class="form-control col-md-7 col-xs-12" id="relation_type" name="relation_type" data-bv-notempty="true" data-bv-notempty-message="Please select one">
							<option value="">--  Please select --</option>
							<option value="spouse">Spouse</option>
							<option value="dependent">Dependent</option>
						</select>				
					</div>
					</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">	
					<label class="control-label col-lg-3 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="relation_type" >Relation type:<span class="requireds">*</span>  </label>
					<div class="col-lg-4 col-md-1 col-sm-3 col-xs-12 form-group">   
							<select  class="form-control col-md-7 col-xs-12" id="relation_id" name="relation_id" data-bv-notempty="true" data-bv-notempty-message="Please select relation type ">
							<option value="">--  Please select --</option>
							<?php foreach($relations as $key => $val){ ?>
								<option value="<?php echo $key; ?>"> <?php echo $val; ?> </option>
							<?php } ?>
						</select>				
					</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12"></div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
						<button type="submit"  name="btn_2" value="Save" class="btn btn-success  pull-right" title="Save Profile"><i class="fa fa-floppy-o" > </i></button>	
						<button type="button" class="btn btn-danger pull-right" data-dismiss="modal" title="Cancel"><i class="fa fa-times" > </i></button>
				</div>
			</div>
			</form>			
	</fieldset>
    </div>
  </div>
</div>
</div>


<!-- Modal for Add Edit Emergency Contacts Section -->
<div class="modal" tabindex="-2" role="dialog" id="modal_emergency_contact">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
	   <h4> <?php echo $row['first_name'] . " " . $row['last_name'] ;?> </h4>
	  <fieldset class="well demo-content">
		<legend class="well-legend-popup">Edit Emergency Contact </legend>
		<form class="form-horizontal form-label-left" novalidate method="post" name="frm_emergency_contact" action="" id="frm_emergency_contact"
			data-bv-message="This value is not valid" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" >
			<input type="hidden" name="task" id="task" value="save" />
			<input type="hidden" name="id" id="id" value="<?php echo $model['id']; ?>" />
            <input type="hidden" name="users_emergency_contacts_id" id="users_emergency_contacts_id"   value="" />
     		<div class="row"> 
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
					<label class="control-label col-lg-3 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="full_name" >Full Name <span class="requireds">*</span> </label>
					<div class="col-lg-4 col-md-1 col-sm-3 col-xs-12 form-group">   
					<input   data-bv-notempty="true" data-bv-notempty-message="Full name is required"  data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z\ .]+$" data-bv-regexp-message="Please enter valid value" type="text" class="form-control col-md-7 col-xs-12" name="full_name" id="full_name" maxlength="100" placeholder="Full Name " value="" >				
					</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
					<label class="control-label col-lg-3 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="relation" >Relation<span class="requireds">*</span> </label>
					<div class="col-lg-4 col-md-1 col-sm-3 col-xs-12 form-group">   
					<input   data-bv-notempty="true" data-bv-notempty-message="Contact Relation is required"  data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z\ .]+$" data-bv-regexp-message="Please enter valid value" type="text" class="form-control col-md-7 col-xs-12" name="relation" id="relation" maxlength="50" placeholder="Emergency Contact Relation" value="" >				
					</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
					<label class="control-label col-lg-3 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="contact_no" >Contact No.<span class="requireds">*</span> </label>
					<div class="col-lg-4 col-md-1 col-sm-3 col-xs-12 form-group">   
					<input   data-bv-notempty="true" data-bv-notempty-message="Contact No. is required"  data-bv-regexp="true" data-bv-regexp-regexp="^[0-9]+$" data-bv-regexp-message="Please enter valid value" type="text" class="form-control col-md-7 col-xs-12" name="contact_no" id="contact_no" maxlength="13" placeholder="Contact No." value="" >				
					</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12"></div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
						<button type="submit"  name="btn_2" value="Save" class="btn btn-success  pull-right" title="Save Profile"><i class="fa fa-floppy-o" > </i></button>	
						<button type="button" class="btn btn-danger pull-right" data-dismiss="modal" title="Cancel"><i class="fa fa-times" > </i></button>
				</div>
			</div>
			</form>			
	</fieldset>
    </div>
  </div>
</div>
</div>


<!-- Modal for Educational Qualifications   Edit Section -->
<div class="modal" tabindex="-2" role="dialog" id="modal_qualifications<?php echo $row['id'];?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
	  <h4> <?php echo $row['first_name'] . " " . $row['last_name'] ;?> </h4>
	 
		<fieldset class="well demo-content">
		<legend class="well-legend-popup">Educational Qualifications & Skills</legend>
		 <form class="form-horizontal form-label-left" novalidate method="post" name="frm_qualifications" action="" id="frm_qualifications"
			data-bv-message="This value is not valid" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" >
			<input type="hidden" name="task" id="task" value="" />
			<input type="hidden" name="id" id="id" value="<?php echo $model['id']; ?>" />
            <input type="hidden" name="section"   value="qualifications" />
            <input type="hidden" name="users_educational_qualifications_id" id="users_educational_qualifications_id" value="0" />
            <input type="hidden" name="count"  value="<?php if( isset($row['qualifications']) && count($row['qualifications']) > 0) echo count($row['qualifications']); else echo "0"; ?>" />
		<div class="row">
				
			 <div class="col-lg-2 col-md-1 col-sm-4 col-xs-12 form-group col-lg-offset-3" id="div_education">   
				<label class="label-title-upper text-middle">
					<input    type="radio" class="flat" name="qualification_or_skill" id="qualification_or_skill_1" value="1" <?php if ($row['employment_status']  == 0 )  echo 'checked="checked" '; ?> /> Education 
				</label>
			</div>
			<div class="col-lg-2 col-md-1 col-sm-4 col-xs-12 form-group " id="div_training">   	
				<label class="label-title-upper text-middle">	
					<input   type="radio" class="flat" name="qualification_or_skill" id="qualification_or_skill_2" value="2" <?php if ($row['employment_status']  == 1 )  echo 'checked="checked" '; ?> />Training
				</label>		
			 </div>
			 <!-- 
			 <div class="col-lg-2 col-md-1 col-sm-4 col-xs-12 form-group " id="div_skill">   	
				<label class=" label-title-upper text-middle">	
					<input   type="radio" class="flat" name="qualification_or_skill" id="qualification_or_skill_3" value="3" <?php if ($row['employment_status']  == 1 )  echo 'checked="checked" '; ?> />Skills
				</label>		
			 </div>
			 -->
			 <div class="row">   	
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12" id="div_school_institute_name">
					 <label class="control-label col-lg-3 col-md-0 col-sm-0 col-xs-0 label-title-upper text-right text-middle" for="institute_name" id="lbl_institute_name">School / College <span class="requireds">*</span> :</label>
					 <div class="form-group col-lg-9 col-md-1 col-sm-3 col-xs-12 ">   
								<input  id="institute_name" name="institute_name" value="" class="form-control" data-bv-notempty="true" data-bv-notempty-message="Please enter value" >
												
					</div>
				</div>	
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12" id="div_board_name">
				 <label class="control-label col-lg-3 col-md-0 col-sm-0 col-xs-0 label-title-upper text-right text-middle" for="board_name" id="lbl_board_name">Board/ University<span class="requireds">*</span> :</label>
				 <div class="col-lg-9 col-md-1 col-sm-3 col-xs-12 form-group">   
							<input type="text" id="board_name" name="board_name" value="" class="form-control col-lg-12 col-md-7 col-xs-12 has-feedback-right"   data-bv-notempty="true" data-bv-notempty-message="Please enter value">
											
					</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12" id="div_degree_name">
					 <label class="control-label col-lg-3 col-md-0 col-sm-0 col-xs-0 label-title-upper text-right text-middle" for="degree_name" id="lbl_degree_name">Degree<span class="requireds">*</span> :</label>
					<div class="col-lg-2 col-md-1 col-sm-3 col-xs-12 form-group">   
						<select class="form-control col-md-7 col-xs-12" id="educational_qualification_id" name="educational_qualification_id"  data-bv-notempty="true" data-bv-notempty-message="Please select" >
						<option value="">--  Select --</option>
						<?php foreach ( $qualifications as $key => $value ): ?>
							<option value="<?php echo $key; ?>" ><?php echo $value; ?></option>
						<?php endforeach; ?>
						</select>
					</div>
					<div class="col-lg-3 col-md-1 col-sm-3 col-xs-12 form-group">   
						<select class="form-control col-md-7 col-xs-12" id="stream_id" name="stream_id"  data-bv-notempty="true" data-bv-notempty-message="Please select stream">
						<option value="">--  Select --</option>
						<?php foreach ( $streams as $key => $value ): ?>
							<option value="<?php echo $key; ?>" ><?php echo $value; ?></option>
						<?php endforeach; ?>
						</select>
					</div>
					 <label class="control-label col-lg-2 col-md-0 col-sm-0 col-xs-0 label-title-upper text-right text-middle" for="to_years" id="lbl_institute_name">% Obtain</label>
					 <div class="col-lg-2 col-md-1 col-sm-3 col-xs-12 form-group">   
								<input type="text"  name="obtained_grade" id="obtained_grade" placeholder="Obtained " class="form-control"  data-bv-notempty="true" data-bv-notempty-message="Please enter Year"  >
					</div>
				</div>	
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12" id="div_major_minor">
					 <label class="control-label col-lg-3 col-md-0 col-sm-0 col-xs-0 label-title-upper text-right text-middle" for="degree_name" id="lbl_degree_name">Major :</label>
					<div class="col-lg-4 col-md-1 col-sm-3 col-xs-12 form-group">   
						<input type="text"  name="major" id="major" placeholder="Major Subject" class="form-control"  data-bv-notempty="true" data-bv-notempty-message="Please enter value"  >
					</div>
					 <label class="control-label col-lg-1 col-md-0 col-sm-0 col-xs-0 label-title-upper text-right text-middle" for="to_years" id="lbl_institute_name">Minor</label>
					 <div class="col-lg-4 col-md-1 col-sm-3 col-xs-12 form-group">   
								<input type="text"  name="minor" id="minor" placeholder="Minor Subject" class="form-control"  data-bv-notempty="true" data-bv-notempty-message="Please enter value"  >
					</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
				 <label class="control-label col-lg-3 col-md-0 col-sm-0 col-xs-0 label-title-upper text-right text-middle" for="duration_from_month_1" id="lbl_institute_name">Duration From <span class="requireds">*</span> :</label>
				 <div class="col-lg-2 col-md-1 col-sm-3 col-xs-12 form-group">   
						<select name="duration_from_month" id="duration_from_month_1" class="form-control" data-bv-notempty="true" data-bv-notempty-message="Please select month">
							<option value=""> --Month--</option>
							<option value="1"> Jan </option>
							<option value="2"> Feb </option>
							<option value="3"> Mar </option>
							<option value="4"> April </option>
							<option value="5"> May </option>
							<option value="6"> Jun </option>
							<option value="7"> July </option>
							<option value="8"> Aug </option>
							<option value="9"> Sept </option>
							<option value="10"> Oct </option>
							<option value="11"> Nov </option>
							<option value="12"> Dec </option>
						</select>	
				 </div>
				  <div class="col-lg-2 col-md-1 col-sm-3 col-xs-12 form-group">   
							<input type="text"  name="duration_from_year" id="duration_from_year" placeholder="Year " class="form-control"  data-bv-notempty="true" data-bv-notempty-message="Please enter Year" value="" >
				</div>
				 <label class="control-label col-lg-1 col-md-0 col-sm-0 col-xs-0 label-title-upper text-right text-middle" for="duration_to_month" id="lbl_institute_name">To</label>
					<div class="col-lg-2 col-md-1 col-sm-3 col-xs-12 form-group">   
						<select name="duration_to_month" id="duration_to_month" class="form-control" data-bv-notempty="true" data-bv-notempty-message="Please select month">
							<option value=""> --Month--</option>
							<option value="1"> Jan </option>
							<option value="2"> Feb </option>
							<option value="3"> Mar </option>
							<option value="4"> April </option>
							<option value="5"> May </option>
							<option value="6"> Jun </option>
							<option value="7"> July </option>
							<option value="8"> Aug </option>
							<option value="9"> Sept </option>
							<option value="10"> Oct </option>
							<option value="11"> Nov </option>
							<option value="12"> Dec </option>
						</select>	
					</div>	
					<div class="col-lg-2 col-md-1 col-sm-3 col-xs-12 form-group">   
							<input type="text"  name="duration_to_year" id="duration_to_year" placeholder="Year " class="form-control" ata-bv-notempty="true" data-bv-notempty-message="Please enter Year" value="" >
				</div>		
				</div>
			 </div>
		<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
					<button type="submit"  name="btn_2" value="Save" class="btn btn-success  pull-right" title="Save Profile"><i class="fa fa-floppy-o" > </i></button>	
					<button type="button" class="btn btn-danger pull-right" data-dismiss="modal" title="Cancel"><i class="fa fa-times" > </i></button>
				</div>
		 </form>		
	 </fieldset>	
		
	 
 </div>	
</div>	
</div>	
</div>	
</div>	

<!-- Modal for Skills   Edit Section -->
<div class="modal" tabindex="-2" role="dialog" id="modal_skills<?php echo $row['id'];?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
	  <h4> <?php echo $row['first_name'] . " " . $row['last_name'] ;?> </h4>
	 
		<fieldset class="well demo-content">
		<legend class="well-legend-popup"> Edit Skills</legend>
		 <form class="form-horizontal form-label-left" novalidate method="post" name="frm_skills" action="" id="frm_skills"
			data-bv-message="This value is not valid" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" >
			<input type="hidden" name="task" id="task" value="" />
			<input type="hidden" name="id" id="id" value="<?php echo $model['id']; ?>" />
            <input type="hidden" name="section"   value="skills" />
            <input type="hidden" name="users_technical_skills_id" id="users_technical_skills_id" value="0" />
           
		<div class="row">
			 <div class="row">   	
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12" id="div_school_institute_name">
					 <div class="form-group col-lg-9 col-md-1 col-sm-3 col-xs-12 "> 
							
							<input type="text" class="form-control" name="users_skills" id="users_skills" value="Amsterdam,Washington" data-role="tagsinput" />
								
												
					</div>
				</div>	
				
				 		
				</div>
			 </div>
		<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
					<button type="submit"  name="btn_2" value="Save" class="btn btn-success  pull-right" title="Save Profile"><i class="fa fa-floppy-o" > </i></button>	
					<button type="button" class="btn btn-danger pull-right" data-dismiss="modal" title="Cancel"><i class="fa fa-times" > </i></button>
				</div>
		 </form>		
	 </fieldset>	
		
	 
 </div>	
</div>	
</div>	
</div>	

<!-- Modal for Employment History Add / Edit Section -->
<div class="modal" tabindex="-2" role="dialog" id="modal_employers">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
	  <h3> <?php echo $row['first_name'] . " " . $row['last_name'] ;?> </h3>
		<fieldset class="well demo-content">
		<legend class="well-legend-popup"> Update Employment History </legend>
		 <form class="form-horizontal form-label-left" novalidate method="post" name="frm_employers" action="" id="frm_employers"
			data-bv-message="This value is not valid" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" >
			<input type="hidden" name="task" id="task" value="" />
			<input type="hidden" name="id" id="id" value="<?php echo $model['id']; ?>" />
            <input type="hidden" name="section"   value="employers" />
            <input type="hidden" name="users_employers_id" id="users_employers_id" value="0" />
            <input type="hidden" name="sort_order" id="sort_order" value="0" />
            <input type="hidden" name="count"  value="<?php if( isset($row['employers']) && count($row['employers']) > 0) echo count($row['employers']); else echo "0"; ?>" />
		<div class="row">
				
			 <div class="col-lg-12" >
				<label class="control-label col-lg-3 col-md-0 col-sm-0 col-xs-0 label-title-upper text-right text-middle" for="users_employer_name" id="lbl_institute_name">Employment Name <span class="requireds">*</span> :</label>	
				<div class="col-lg-3  form-group col-lg-offset-3" >   
					<label class="label-title-upper text-middle">
						<input    type="radio" class="flat" name="users_employer_type" id="users_employer_type_1" value="1" checked="checked" /> Full Time Job 
					</label>
				</div>
				<div class="col-lg-3  form-group col-lg-offset-3" >   
					<label class="label-title-upper text-middle">
						<input    type="radio" class="flat" name="users_employer_type" id="users_employer_type_2" value="2" /> Part Time Job 
					</label>
				</div>
				<div class="col-lg-3 form-group " id="div_training">   	
					<label class="label-title-upper text-middle">	
						<input   type="radio" class="flat" name="users_employer_type" id="users_employer_type_3" value="0"  />Training
					</label>		
				 </div>
			 </div>
			 <div class="row">   	
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12" id="div_school_institute_name">
					 <label class="control-label col-lg-3 col-md-0 col-sm-0 col-xs-0 label-title-upper text-right text-middle" for="users_employer_name" id="lbl_institute_name">Company Name <span class="requireds">*</span> :</label>
					 <div class="form-group col-lg-3 col-md-1 col-sm-3 col-xs-12 ">   
								<input  id="users_employer_name" name="users_employer_name" value="" class="form-control" data-bv-notempty="true" data-bv-notempty-message="Please enter value" >
												
					</div>
					<label class="control-label col-lg-1 col-md-0 col-sm-0 col-xs-0 label-title-upper text-right text-middle" for="users_employer_name" id="lbl_institute_name">Phone No <span class="requireds">*</span> :</label>
					 <div class="form-group col-lg-2 col-md-1 col-sm-3 col-xs-12 ">   
								<input  id="users_employer_phone" name="users_employer_phone" value="" class="form-control" data-bv-notempty="true" data-bv-notempty-message="Please enter value" >
												
					</div>
					 <label class="control-label col-lg-1 col-md-0 col-sm-0 col-xs-0 label-title-upper text-right text-middle" for="users_employer_website" id="lbl_institute_name">Website <span class="requireds">*</span> :</label>
					 <div class="form-group col-lg-2 col-md-1 col-sm-3 col-xs-12 ">   
								<input  id="users_employer_website" name="users_employer_website" value="" class="form-control" data-bv-notempty="true" data-bv-notempty-message="Please enter url" >
												
					</div>
				</div>	
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
					<label class="control-label col-lg-3 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="users_employer_address" id="lbl_joining_date">Address<span class="requireds">*</span> :</label>
					<div class="col-lg-3 col-md-1 col-sm-3 col-xs-12 form-group">   
						<textarea    id="users_employer_address" name="users_employer_address" placeholder="Address" maxlength="300" class="form-control col-lg-12 textdata" required="required" ></textarea>					
					</div>
					<label class="control-label col-lg-1 col-md-0 col-sm-0 col-xs-0 label-title-upper text-right text-middle" for="city_id" id="lbl_institute_name">City <span class="requireds">*</span> :</label>
					<div class="col-lg-2 form-group">   
							<select class="form-control col-md-7 col-xs-12" id="city_id" name="city_id" required="required">
							<option value="">--  Select City--</option>
							<?php foreach ( $cities as $key => $value ): ?>
								<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
							<?php endforeach; ?>
							</select>
					</div>
					<label class="control-label col-lg-1 col-md-0 col-sm-0 col-xs-0 label-title-upper text-right text-middle" for="state_id" id="lbl_institute_name">State <span class="requireds">*</span> :</label>
					<div class="col-lg-2 col-md-1 col-sm-4 col-xs-12 form-group ">   
						<select  class="form-control col-md-7 col-xs-12" id="state_id" name="state_id" required="required">
							<option value="">--  Select State--</option>
							<?php foreach ( $states as $key => $value ): ?>
									<option value="<?php echo $key; ?>" ><?php echo $value; ?></option>
							<?php endforeach; ?>
						</select>		
					 </div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12" id="div_major_minor">
					 <label class="control-label col-lg-3 col-md-0 col-sm-0 col-xs-0 label-title-upper text-right text-middle" for="users_employer_designation_joining" id="lbl_degree_name">Designation At Joining <span class="requireds">*</span>:</label>
					<div class="col-lg-3 col-md-1 col-sm-3 col-xs-12 form-group">   
						<input type="text"  name="users_employer_designation_joining" id="users_employer_designation_joining" placeholder="Designation  at Joining" class="form-control"  data-bv-notempty="true" data-bv-notempty-message="Please Enter Designation  at Joining" required="required" >
					</div>
					 <label class="control-label col-lg-1 col-md-0 col-sm-0 col-xs-0 label-title-upper text-right text-middle" for="users_employer_designation_leaving" id="lbl_institute_name">At Leaving<span class="requireds">*</span>:</label>
					 <div class="col-lg-2 col-md-1 col-sm-3 col-xs-12 form-group">   
								<input type="text"  name="users_employer_designation_leaving" id="users_employer_designation_leaving" placeholder="Designation  at Leaving" class="form-control"  data-bv-notempty="true" data-bv-notempty-message="Please Enter Designation  at Leaving"  required="required" >
					</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12" id="div_major_minor">
					 <label class="control-label col-lg-3 col-md-0 col-sm-0 col-xs-0 label-title-upper text-right text-middle" for="users_employer_package_joining" id="lbl_degree_name">Package at Joining <span class="requireds">*</span>:</label>
					<div class="col-lg-3 col-md-1 col-sm-3 col-xs-12 form-group">   
						<input type="text"  name="users_employer_package_joining" id="users_employer_package_joining" placeholder="Package at Joining [Per Annum]" class="form-control"  data-bv-notempty="true" data-bv-notempty-message="Please Enter Package  at Joining"  >
					</div>
					 <label class="control-label col-lg-1 col-md-0 col-sm-0 col-xs-0 label-title-upper text-right text-middle" for="users_employer_package_leaving" id="lbl_institute_name">At Leaving<span class="requireds">*</span>:</label>
					 <div class="col-lg-2 col-md-1 col-sm-3 col-xs-12 form-group">   
								<input type="text"  name="users_employer_package_leaving" id="users_employer_package_leaving" placeholder="Package at Leaving [Per Annum]" class="form-control"  data-bv-notempty="true" data-bv-notempty-message="Please Enter Package  at Leaving"  >
					</div>
				</div>
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
				 <label class="control-label col-lg-3 col-md-0 col-sm-0 col-xs-0 label-title-upper text-right text-middle" for="duration_from_month" id="lbl_institute_name">Duration From <span class="requireds">*</span> :</label>
				 <div class="col-lg-1 col-md-1 col-sm-3 col-xs-12 form-group">   
						<select name="duration_from_month" id="duration_from_month" class="form-control" data-bv-notempty="true" data-bv-notempty-message="Please select month">
							<option value=""> Month </option>
							<option value="1"> Jan </option>
							<option value="2"> Feb </option>
							<option value="3"> Mar </option>
							<option value="4"> April </option>
							<option value="5"> May </option>
							<option value="6"> Jun </option>
							<option value="7"> July </option>
							<option value="8"> Aug </option>
							<option value="9"> Sept </option>
							<option value="10"> Oct </option>
							<option value="11"> Nov </option>
							<option value="12"> Dec </option>
						</select>	
				 </div>
				  <div class="col-lg-1 col-md-1 col-sm-3 col-xs-12 form-group">   
							<input type="text"  name="duration_from_year" id="duration_from_year" placeholder="Year " class="form-control"  data-bv-notempty="true" data-bv-notempty-message="Please enter Year"  >
				</div>
				 <label class="control-label col-lg-2 col-md-0 col-sm-0 col-xs-0 label-title-upper text-right text-middle" for="duration_to_month" id="lbl_institute_name">To</label>
					<div class="col-lg-1 col-md-1 col-sm-3 col-xs-12 form-group">   
						<select name="duration_to_month" id="duration_to_month" class="form-control" data-bv-notempty="true" data-bv-notempty-message="Please select month">
							<option value=""> Month</option>
							<option value="1"> Jan </option>
							<option value="2"> Feb </option>
							<option value="3"> Mar </option>
							<option value="4"> April </option>
							<option value="5"> May </option>
							<option value="6"> Jun </option>
							<option value="7"> July </option>
							<option value="8"> Aug </option>
							<option value="9"> Sept </option>
							<option value="10"> Oct </option>
							<option value="11"> Nov </option>
							<option value="12"> Dec </option>
						</select>	
					</div>	
					<div class="col-lg-1 col-md-1 col-sm-3 col-xs-12 form-group">   
							<input type="text"  name="duration_to_year" id="duration_to_year" placeholder="Year " class="form-control" ata-bv-notempty="true" data-bv-notempty-message="Please enter Year"  >
				</div>		
				</div>
			 </div>
		<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
					<button type="submit"  name="btn_2" value="Save" class="btn btn-success  pull-right" title="Save Profile"><i class="fa fa-floppy-o" > </i></button>	
					<button type="button" class="btn btn-danger pull-right" data-dismiss="modal" title="Cancel"><i class="fa fa-times" > </i></button>
				</div>
		 </form>		
	 </fieldset>	
		
	 
 </div>	
</div>	
</div>	
</div>	
</div>	


</div>	

<!-- -->
<!-- /page content -->
<script>
$(document).ready(function(){
	/*
	$('form#frm_upload').bootstrapValidator().on('success.form.bv', function(e) {
		// Prevent form submission
		e.preventDefault();
		var url = '<?php echo $ajax_url_upload_pic; ?>';
		var $form = $(e.target);
		var bv = $form.data('bootstrapValidator');
		var _allowed = [".jpg", ".jpeg", ".png"]; 
		var fname= document.getElementById('userfile').value;
		var _is_valid = false;
		if(fname.length > 0){
			for(i=0; i<_allowed.length; i++){
				var this_ext = _allowed[i];
				if(fname.substr(fname.length - this_ext.length, this_ext.length).toLowerCase() == this_ext.toLowerCase()){
						_is_valid = true;
						break;
				}
			}
		}
		if( _is_valid == false){
			alert('Please select .jpg or .jpeg or .png file only  ');
			return false;
		}
		var file_data = $("#userfile").prop('files')[0];
		var form_data = new FormData();
		form_data.append('userfile', file_data);
		form_data.append('id', $("form#frm_upload").find("#id").val());
		form_data.append('task', 'upload_file');
		if( _is_valid == true){
			$.ajax({
				url:url,
				data:form_data,
				dataType: 'text',  // what to expect back from the PHP script, if anything
				cache: false,
				contentType: false,
				processData: false,
				type:"post",
				success:function(response){
					alert(response);
				}
			});
			$.post(url, form_data, function(result) {
				console.log(result);
			});
		}
	});
	*/
});

function goback(id, url)
{
	if(id){
        var form_action_url  = url;
        $('form#frmview').find('#id').val(id);
        $('form#frmview').find('#task').val('listing');
        $('form#frmview').find('#task').val('listing');
        $('form#frmview').attr('action', form_action_url).submit();
        }
}
function editrecord(id, url)
{
	if(id){
        var form_action_url  = url;
        $('form#frmview').find('#id').val(id);
        $('form#frmview').find('#task').val('add_edit');
        $('form#frmview').attr('action', form_action_url).submit();
        }
}
$(document).ready(function() {
	$('input#confirm_password').on('change', function(){
		$('small.erro_confirm_password').remove();
	});
	/*
	$('input#email').on('change', function(){
		$('small.error_email').remove();
	});
	$('input#email_secondary').on('change', function(){
		$('small.error_email').remove();
	});
	*/
	
	<?php if($row['past_criminal_record'] == 1){ ?>
		$('button#btn_past_criminal_detail').css('display','block');
	<?php }?>
		<?php if($row['past_criminal_record'] == 0){ ?>
		$('button#btn_past_criminal_detail').css('display','none');
	<?php }?>
	
	$('#frm_personal_info').bootstrapValidator().on('success.form.bv', function(e) {
		// Prevent form submission
		e.preventDefault();
		var url = '<?php echo $ajax_url_save; ?>';
		var $form = $(e.target);
		var bv = $form.data('bootstrapValidator');
		// Use Ajax to submit form data
		$.post(url, $form.serialize(), function(result) {
			var obj = $.parseJSON(result);
			if(obj.status == 'success'){
				if( update_personal_info(obj)) 
					$("#modal_personal_info<?php echo $row['id'];?>").modal('toggle');
			}
			if(obj.status == 'failed'){
				
				var arr = result.split('^');
				var err ='<small class="help-block error_email" data-bv-validator="emailAddress" data-bv-for="email" data-bv-result="INVALID" style="display: block;" display="block"> '+arr[2]+' </small>';
				$("input#"+arr[1]).parent('div.form-group ').append(err);
				$("input#"+arr[1]).parent('div.form-group ').addClass('has-error');
				return false;
			}
			
			
		});
		$('.btn-success').prop("disabled", false);
	});
	$('#frm_profile').bootstrapValidator().on('success.form.bv', function(e) {
		// Prevent form submission
		e.preventDefault();
		var url = '<?php echo $ajax_url_save; ?>';
		var $form = $(e.target);
		var bv = $form.data('bootstrapValidator');
		// Use Ajax to submit form data
		$.post(url, $form.serialize(), function(result) {
			var obj = $.parseJSON(result);
			if(obj.status == 'success'){
				if( update_profile_info(obj)) 
					$("#modal_profile<?php echo $row['id'];?>").modal('toggle');
			}
			if(obj.status == 'failed'){
				var arr = obj.message.split('^');
				var err ='<small class="help-block error_email" data-bv-validator="emailAddress" data-bv-for="email" data-bv-result="INVALID" style="display: block;" display="block"> '+arr[2]+' </small>';
				$("input#"+arr[1]).parent('div.form-group ').append(err);
				$("input#"+arr[1]).parent('div.form-group ').addClass('has-error');
				return false;
			}
			
			
		});
		$('.btn-success').prop("disabled", false);
	});
	 $('#frm_official_info').bootstrapValidator().on('success.form.bv', function(e) {
		// Prevent form submission
		e.preventDefault();
		var url = '<?php echo $ajax_url_save; ?>';
		var $form = $(e.target);
		var bv = $form.data('bootstrapValidator');
		// Use Ajax to submit form data
		$.post(url, $form.serialize(), function(result) {
			var obj = $.parseJSON(result);
			if(obj.status == 'success'){
				if( update_official_info(obj)) 
				$("#modal_official_info<?php echo $row['id'];?>").modal('toggle');
			}
		});
		$('.btn-success').prop("disabled", false);
	});
	//Edit Address and contact number detail
	$('#frm_contacts_info').bootstrapValidator().on('success.form.bv', function(e) {
		// Prevent form submission
		e.preventDefault();
		var url = '<?php echo $ajax_url_save; ?>';
		var $form = $(e.target);
		var bv = $form.data('bootstrapValidator');
		// Use Ajax to submit form data
		$.post(url, $form.serialize(), function(result) {
			var _html = update_contact_info(result);
			if(_html != ''){
				$("#fs_contact_info").html(' ');
				$("#fs_contact_info").html(_html);
			}
			$("#modal_contacts_info<?php echo $row['id'];?>").modal('toggle');
			
		});
		$('.btn-success').prop("disabled", false);
	});
	//Edit employers History
	 $('#frm_employers').bootstrapValidator().on('success.form.bv', function(e) {
		// Prevent form submission
		e.preventDefault();
		var url = '<?php echo $ajax_url_save; ?>';
		var $form = $(e.target);
		var bv = $form.data('bootstrapValidator');
		// Use Ajax to submit form data
		//if(){}
		//if(){}
		$.post(url, $form.serialize(), function(result) {
			if(result != ''){
				var obj = $.parseJSON(result);
				if(obj.status == 'fail'){
					var err ='<small class="help-block error_email col-lg-12 col-lg-offset-3" data-bv-validator="emailAddress" data-bv-for="email" data-bv-result="INVALID" style="display: block;" display="block" id="err_degree_name"> '+obj.response+' </small>';
					$("div#div_degree_name").append(err);
					$("div#div_degree_name").addClass('has-error');
					return false;
				}
				var new_entry = '';
				var $_id = obj.response.users_employers_id;
				console.log(obj);
				if(obj.status == 'success' ){
					if( obj.task == 'edit' ){
						var col_1 = obj.response.users_employer_name+'<br>Web : <a href="'+obj.response.users_employer_website+'">'+obj.response.users_employer_website+'</a>';
						var col_2 = 'At Joining '+obj.response.users_employer_designation_joining+' <br> At Leaving  '+obj.response.users_employer_designation_leaving+' ';
						var col_3 = 'From '+obj.response.duration_from+' To '+obj.response.duration_to;
						var col_4 = 'At Joining  '+obj.response.users_employer_package_joining+' <br> At Leaving  '+obj.response.users_employer_package_leaving+' ';
						$('div#row_employers_list_'+$_id).find('#col_1_'+$_id).html(col_1);
						$('div#row_employers_list_'+$_id).find('#col_2_'+$_id).html(col_2);
						$('div#row_employers_list_'+$_id).find('#col_3_'+$_id).text(col_3);
						$('div#row_employers_list_'+$_id).find('#col_4_'+$_id).html(col_4);
						$('div#row_employers_list_'+$_id).find('#col_5_'+$_id).text(obj.response.city +', '+obj.response.state);
						$('div#row_employers_list_'+$_id).find('#col_6_'+$_id).text(obj.response.users_employer_phone);
					}
					if( obj.task == 'add' ){
						
						var onclick="javascript:toggle_modal_employers("+obj.response.$_id+",'<?php echo $model['id']; ?>');";
						var col_1 = obj.response.users_employer_name+'<br>Web : <a href="'+obj.response.users_employer_website+'">'+obj.response.users_employer_website+'</a>';
						var col_2 = 'At Joining '+obj.response.users_employer_designation_joining+' <br> At Leaving  '+obj.response.users_employer_designation_leaving+' ';
						var col_3 = 'From '+obj.response.duration_from+' To '+obj.response.duration_to;
						var col_4 = 'At Joining  '+obj.response.users_employer_package_joining+' <br> At Leaving  '+obj.response.users_employer_package_leaving+' ';
						new_entry = '<div class="col-lg-12 col-md-1 col-sm-3 col-xs-12 " id="row_employers_list_'+$_id+'" >';
							new_entry = new_entry+'<label class="col-lg-3  with-bordered-text" id="col_1_'+ $_id+'" > '+col_1+'</label>';
							new_entry = new_entry+'<label class="col-lg-2 with-bordered-text" id="col_2_'+ $_id+'"> '+col_2+'</label>';
							new_entry = new_entry+'<label class="col-lg-2  with-bordered-text" id="col_3_'+ $_id+'">'+col_3+'</label>';
							new_entry = new_entry+'<label class="col-lg-2  with-bordered-text"id="col_4_'+ $_id+'" >'+col_4+'</label>';
							new_entry = new_entry+'<label class="col-lg-2  with-bordered-text " id="col_5_'+ $_id+'">'+obj.response.city +', '+obj.response.state+'</label>';
							new_entry = new_entry+'<label class="col-lg-1 with-bordered-text" id="col_6_'+ $_id+'">'+obj.response.users_employer_phone+'</label>';
							new_entry = new_entry+'<button type="button" name="btn1" id="edit_employers'+$_id+'" class="btn btn-warning pull-right edit_item" onclick="'+onclick+'" title="Edit this record"><i class="fa fa-pencil"> </i></button>';
						new_entry = new_entry+'</div>';
						$('fieldset#fs_employers_list').append(new_entry);
						console.log(new_entry);
					}
				}
				new_entry = '';
				
			}
			$("#modal_employers").modal('toggle');
			
		});
		$('.btn-success').prop("disabled", false);
	});
	
	//Edit Educational Qualifications
	 $('#frm_qualifications').bootstrapValidator().on('success.form.bv', function(e) {
		// Prevent form submission
		e.preventDefault();
		var url = '<?php echo $ajax_url_save; ?>';
		var $form = $(e.target);
		var bv = $form.data('bootstrapValidator');
		// Use Ajax to submit form data
		$.post(url, $form.serialize(), function(result) {
			if(result != ''){
				var obj = $.parseJSON(result);
				if(obj.status == 'fail'){
					var err ='<small class="help-block error_email col-lg-12 col-lg-offset-3" data-bv-validator="emailAddress" data-bv-for="email" data-bv-result="INVALID" style="display: block;" display="block" id="err_degree_name"> '+obj.response+' </small>';
					$("div#div_degree_name").append(err);
					$("div#div_degree_name").addClass('has-error');
					return false;
				}
				
				new_entry = '';
				var new_entry = '';
				var $_id = obj.response.users_educational_qualifications_id;
				console.log(obj);
				if(obj.status == 'success' ){
					//alert(obj.task);
					if( obj.task == 'edit' ){
						$('div#row_degree_list_'+$_id).find('#col_2_'+$_id).text(obj.response.institute_name);
						$('div#row_degree_list_'+$_id).find('#col_3_'+$_id).text(obj.response.board_name);
						$('div#row_degree_list_'+$_id).find('#col_4_'+$_id).text(obj.response.name);
						var $no_of_years = obj.response.no_of_years+'&nbsp; Year(s)&nbsp; <small class="inline">['+obj.response.duration_from+' - '+obj.response.duration_to+'] </small>';
						$('div#row_degree_list_'+$_id).find('#col_5_'+$_id).html($no_of_years);
						$('div#row_degree_list_'+$_id).find('#col_6_'+$_id).text(obj.response.obtained_grade);
						$('div#row_degree_list_'+$_id).find('#col_7_'+$_id).text(obj.response.major);
						$('div#row_degree_list_'+$_id).find('#col_8_'+$_id).text(obj.response.minor);
					}
					if( obj.task == 'add' ){
						var onclick="javascript:toggle_modal('modal_qualifications<?php echo $model['id']; ?>', "+obj.response.users_educational_qualifications_id+");";
						new_entry = '<div class="col-lg-12 col-md-1 col-sm-3 col-xs-12 " id="row_degree_list_'+obj.response.users_educational_qualifications_id+'" >';
							new_entry = new_entry+'<label class="col-lg-1  with-bordered-text" id="col_1_'+ $_id+'" > '+obj.response.count+'</label>';
							new_entry = new_entry+'<label class="col-lg-2 with-bordered-text" id="col_2_'+ $_id+'"> '+obj.response.institute_name+'</label>';
							new_entry = new_entry+'<label class="col-lg-2  with-bordered-text" id="col_3_'+ $_id+'">'+obj.response.board_name+'</label>';
							new_entry = new_entry+'<label class="col-lg-2  with-bordered-text"id="col_4_'+ $_id+'" >'+obj.response.name+'</label>';
							new_entry = new_entry+'<label class="col-lg-2  with-bordered-text " id="col_5_'+ $_id+'">'+obj.response.no_of_years+'&nbsp; Year(s)&nbsp; <small class="inline">['+obj.response.duration_from+' - '+obj.response.duration_to+'] </small> </label>';
							new_entry = new_entry+'<label class="col-lg-1 with-bordered-text" id="col_6_'+ $_id+'">'+obj.response.obtained_grade+'</label>';
							new_entry = new_entry+'<label class="col-lg-1 with-bordered-text"id="col_7_'+ $_id+'">'+obj.response.major+' </label>';
							new_entry = new_entry+'<label class="col-lg-1  with-bordered-text-last" id="col_8_'+ $_id+'">'+obj.response.minor+' </label>';
							new_entry = new_entry+'<button type="button" name="btn1" class="btn btn-warning pull-right edit_item" onclick="'+onclick+'" title="Edit this record"><i class="fa fa-pencil"> </i></button>';
							new_entry = new_entry+'<div  id="q'+obj.response.users_educational_qualifications_id+'" style="display:none">'+result+'</div>';
						new_entry = new_entry+'</div>';
						$('fieldset#fs_degree_list').append(new_entry);
						console.log(new_entry);
					}
				}
				new_entry = '';
			}
			$("#modal_qualifications<?php echo $row['id'];?>").modal('toggle');
			
		});
		$('.btn-success').prop("disabled", false);
	});
	 $('#frm_assignrole').bootstrapValidator().on('success.form.bv', function(e) {
		// Prevent form submission
		e.preventDefault();
		var url =  '<?php echo $ajax_url; ?>assignRole';
		var $form = $(e.target);
		var bv = $form.data('bootstrapValidator');
		// Use Ajax to submit form data
		$.post(url, $form.serialize(), function(result) {
			var obj = $.parseJSON(result);
			if(obj.status == 'success'){
				$('#employee_status').html('');
				var employee_role =  '<i class="fa fa-users tag-1" id="employee_role_id"></i> '+obj.response.role;
				$('#employee_status').html(employee_role);
				$("#modal_assignrole").modal('toggle');
			}
		});
	});
	 $('#frm_changepassword').bootstrapValidator().on('success.form.bv', function(e) {
		// Prevent form submission
		e.preventDefault();
		var url =  '<?php echo $ajax_url; ?>changePassword';
		var $form = $(e.target);
		var bv = $form.data('bootstrapValidator');
		// Use Ajax to submit form data
		var pwd = $("input#password").val().toString().trim();
		var cpwd = $("input#confirm_password").val().toString().trim();
		if(pwd != cpwd){
				var err ='<small class="help-block erro_confirm_password" data-bv-validator="confirm_password" data-bv-for="confirm_password" data-bv-result="INVALID" style="display: block;" display="block">Password and Confirm password deas not match </small>';
				$("input#confirm_password").parent('div.form-group ').append(err);
				$("input#confirm_password").parent('div.form-group ').addClass('has-error');
		}
		$.post(url, $form.serialize(), function(result) {
			var obj = $.parseJSON(result);
			if(obj.status == 'failed'){
				var err ='<small class="help-block erro_confirm_password" data-bv-validator="confirm_password" data-bv-for="confirm_password" data-bv-result="INVALID" style="display: block;" display="block">Password and Confirm password deas not match </small>';
				$("input#confirm_password").parent('div.form-group ').append(err);
				$("input#confirm_password").parent('div.form-group ').addClass('has-error');
			}
			if(obj.status == 'success'){
				//$("#modal_change_password").modal('toggle');
				setTimeout(function() {$('#modal_change_password').modal('hide');}, 1000);
			}
		});
	});
	 $('#frm_family_info').bootstrapValidator().on('success.form.bv', function(e) {
		// Prevent form submission
		e.preventDefault();
		var url =  '<?php echo $ajax_url; ?>saveFamilyInfo';
		var $form = $(e.target);
		var bv = $form.data('bootstrapValidator');
		// Use Ajax to submit form data
		$.post(url, $form.serialize(), function(result) {
			var obj = $.parseJSON(result);
			var $_id = obj.response.users_family_id;
			if(obj.status == 'failed'){
				var error = '<label class=" col-lg-12 text-center text-danger" for="full_name">Family Info could not be saved. Please try again later.</label>';
				$('div#modal_family_info div.row').prepend(error);
				return false;
			}
			if(obj.status == 'success'){
				if(obj.response.task == "add"){
					var onclick="javascript:toggle_modal_family("+obj.response.$_id+",'<?php echo $model['id']; ?>');";
					var html = '<div class="col-lg-11 col-lg-offset-1" id="row_family_list_9">';
							html = html+'<label class="col-lg-6 col-md-2 col-sm-3 col-xs-12 label-title-upper" id="users_family_relation_id9"> '+obj.response.relation_id+' </label>';
							html = html+'<div class="col-lg-5 col-md-1 col-sm-3 col-xs-12 form-group " title="Edit Family Member">';
								html = html+'<span id="users_family_full_name9">  '+obj.response.full_name+' </span>';
								html = html+'<small class="margin-left" id="users_family_relation_type9">[ '+obj.response.relation_type+' ] </small>'; 
							html = html+'</div>';
							html = html+'<div class="col-lg-1 text-center div-editor" onclick="'+onclick+'">';
								html = html+'	<i class="fa fa-pencil pull-right" title="Edit Family Member"> </i>';
							html = html+'</div>';
					html = html+'</div>';
					$('div#div_users_family_list').append(html);
				}
				if(obj.response.task == "edit"){
					$('#users_family_relation_id'+obj.response.id).text(obj.response.relation_id);
					$('#users_family_full_name'+obj.response.id).text(obj.response.full_name);
					$('#users_family_relation_type'+obj.response.id).text(obj.response.relation_type);
					var error = '<label class="text-center col-lg-12 text-success" for="full_name">Family Info Saved Successfully.</label>';
					$('div#modal_family_info div.row').prepend(error);
				}
				setTimeout(function() {$('#modal_family_info').modal('hide');}, 1000);
			}
		});
	});
	
	 $('#frm_emergency_contact').bootstrapValidator().on('success.form.bv', function(e) {
		// Prevent form submission
		e.preventDefault();
		var url =  '<?php echo $ajax_url; ?>saveEmergencyContact';
		var $form = $(e.target);
		var bv = $form.data('bootstrapValidator');
		// Use Ajax to submit form data
		$.post(url, $form.serialize(), function(result) {
			var obj = $.parseJSON(result);
			var $_id = obj.response.users_family_id;
			if(obj.status == 'failed'){
				var error = '<label class=" col-lg-12 text-center text-danger" for="full_name">Family Info could not be saved. Please try again later.</label>';
				$('div#modal_family_info div.row').prepend(error);
				return false;
			}
			if(obj.status == 'success'){
				if(obj.response.task == "add"){
					var onclick="javascript:toggle_modal_emergency_contact("+obj.response.$_id+",'<?php echo $model['id']; ?>');";
					var html = '';
						html = html+'<div class="col-lg-11 col-lg-offset-1">';
							html = html+'<div class="col-lg-4 col-md-1 col-sm-3 col-xs-12 form-group no-label" id="emergency_contacts_name_1">';
							html = html + obj.response.full_name+' [ '+obj.response.relation+' ]'; 		
							html = html+'</div>';		
							html = html+'<div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group no-label" id="emergency_contacts_no_1">';	
							html = html+ obj.response.contact_no;										
							html = html+'</div>';
								html = html+'<div class="col-lg-1 text-center" onclick="'+onclick+'">';
								html = html+'<i class="fa fa-pencil pull-right" title="Edit this"> </i>';
								html = html+'</div>';
							html = html+'</div>';
					$('div#div_users_emergency_contacts_list').append(html);
				}
				if(obj.response.task == "edit"){
					$('#emergency_contacts_name_'+obj.response.id).text(obj.response.full_name+ ' ['+obj.response.relation+']');
					$('#emergency_contacts_no_'+obj.response.id).text(obj.response.contact_no);
					var message = '<label class="text-center col-lg-12 text-success" for="full_name">Emergency Contact Saved Successfully.</label>';
					$('div#modal_emergency_contact div.row').prepend(message);
				}
				setTimeout(function() {$('#modal_emergency_contact').modal('hide');}, 1000);
			}
		});
	});
	
	$('#stream_id,  #educational_qualification_id').on('change',function(){
		$('small#err_degree_name').remove();
	});
	
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
	 /****************** Bosstrap Timepicker **********************/
        $('#working_hours_from').timepicker({
            minuteStep: 30,
            defaultTime: '10:00 AM'

        });
        $('#working_hours_to').timepicker({
            minuteStep: 30,
            defaultTime: '08:00 PM'
        });
		  /***************** Criminal Record detail field ************************/
        $('input[name="past_criminal_record"]').click(function () {
           

        });
		var skills = new Bloodhound({
			datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
			queryTokenizer: Bloodhound.tokenizers.whitespace,
			prefetch: '<?php echo $ajax_url_skills; ?>'
		});
		skills.initialize();
		var elt = $('input#users_skills');
		elt.tagsinput({
			tagClass: function(item) {
				switch (item.text) {
				  case 'PHP'   : return 'label label-primary';
				  case 'MySql'  : return 'label label-danger ';
				  case 'jQuery': return 'label label-success';
				  case 'XML'   : return 'label label-default';
				  case 'PDO'     : return 'label label-warning';
				}
			},
			itemValue: 'value',
			itemText: 'text',
			typeahead: {
			name: 'users_skills',
			displayKey: 'text',
			//source:  ['Amsterdam', 'Washington', 'Sydney', 'Beijing', 'Cairo']
			source: function(query){
				return $.get('<?php echo $ajax_url_skills; ?>');
			}
			}
		});
		elt.tagsinput('add', { "value": 1 , "text": "PHP"  });
		elt.tagsinput('add', { "value": 4 , "text": "MySql" });
		elt.tagsinput('add', { "value": 7 , "text": "jQuery"});
		elt.tagsinput('add', { "value": 10, "text": "XML"});
		elt.tagsinput('add', { "value": 13, "text": "PDO"});
});
function toggle_modal(modal_id, id){
		
		if( Number(id) == 0 ){
			$("form#frm_qualifications #task").val('add');
			$('#frm_qualifications').trigger("reset");
			$("select#educational_qualification_id option[value='']").attr('selected','selected');
			$("select#stream_id option[value='']").attr('selected','selected');
			$("select#duration_from_month option[value='']").attr('selected','selected');
			$("select#duration_to_month option[value='']").attr('selected','selected');
			$('div#div_education').css('display','block');
			$('div#div_training').css('display','block');
			$("#"+modal_id).modal('toggle');
		}
		if( Number(id)  !=  0 ){
			$("form#frm_qualifications #task").val('edit');
			var qual_obj = $.parseJSON($('div#q'+id).text());
			$('div#div_education').css('display','none');
			$('div#div_training').css('display','none');
			if(qual_obj.response){
				console.log(qual_obj.response);
				var $_id = qual_obj.response.users_educational_qualifications_id;
				$("#institute_name").val(qual_obj.response.institute_name);
				$("#board_name").val(qual_obj.response.board_name);
				$("#board_name").val(qual_obj.response.board_name);
				$("select#educational_qualification_id option[value="+qual_obj.response.educational_qualification_id+"]").attr('selected','selected');
				$("select#stream_id option[value="+qual_obj.response.stream_id+"]").attr('selected','selected');
				$("select#duration_from_month option[value="+qual_obj.response.duration_from_month+"]").attr('selected','selected');
				$("#duration_from_year").val(qual_obj.response.duration_from_year);
				$("select#duration_to_month option[value="+qual_obj.response.duration_to_month+"]").attr('selected','selected');
				$("#duration_to_year").val(qual_obj.response.duration_to_year);
				$("#obtained_grade").val(qual_obj.response.obtained_grade);
				$("#major").val(qual_obj.response.major);
				$("#minor").val(qual_obj.response.minor);
				$("#users_educational_qualifications_id").val($_id);
			}
			$("#"+modal_id).modal('toggle');
		}
		
		
}
function update_contact_info(json_string){
	if(json_string){
		var _html = '';
		var obj = $.parseJSON(json_string);
		console.log(obj);
		console.log(objectTpArr(obj.response.references));
		$('input#users_contacts_id').val(obj.response.users_contacts_id);
		    _html = _html+ '<legend class="well-legend">Address &amp; Contacts </legend>';
			_html = _html+ '<button type="button" name="btn1" id="btn_10" class="btn btn-success edit-btn pull-right" data-toggle="modal" data-target="#modal_contacts_info1" title="Edit Address &amp; Contacts"><i class="fa fa-pencil"> </i></button>';
			_html = _html+ '<label class="col-lg-6 col-md-2 col-sm-3 col-xs-12 label-title-upper"> Permanent Address :</label>';
			_html = _html+ '<div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group"> '+obj.response.primary.address+', '+obj.response.primary.state+', '+obj.response.primary.city+'  '+obj.response.primary.zipcode+'</div>';
			_html = _html+ '<label class="col-lg-6 col-md-2 col-sm-3 col-xs-12 label-title-upper"> Temporary Address :</label>';
			_html = _html+ '<div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group"> '+obj.response.temp.address+', '+obj.response.temp.state+', '+obj.response.temp.city+' '+obj.response.temp.zipcode+' </div>';
			_html = _html+ '<label class="col-lg-6 col-md-2 col-sm-3 col-xs-12 label-title-upper"> Phone  &nbsp;No. :</label>';
			_html = _html+ '<div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group"> <i class="fa fa-phone fa_mobile" aria-hidden="true"></i>'+obj.response.phone_no+'</div>';
			_html = _html+ '<label class="col-lg-6 col-md-2 col-sm-3 col-xs-12 label-title-upper"> Mobile No. :</label>';
			_html = _html+ '<div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group"> <i class="fa fa-mobile fa_mobile" aria-hidden="true"></i> '+obj.response.mobile_1+'&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-mobile fa_mobile" aria-hidden="true"></i>  '+obj.response.mobile_2+ ' </div>';
			_html = _html+ ' <label class="col-lg-12 col-md-2 col-sm-3 col-xs-12 label-title-upper"> References Contact:</label>';
			var refs = objectTpArr(obj.response.references);
			for(i=1;i<4;i++){
				_html = _html+'<div class="col-lg-5 col-md-1 col-sm-3 col-xs-12 form-group no-label"> '+i+'. '+refs[1][1][i]+' '+refs[3][1][i]+' ,'+refs[2][1][i]+' </div> <div class="col-lg-6 col-md-1 col-sm-3 col-xs-12 form-group no-label"> '+refs[4][1][i]+' </div>	';
			
			}
			//
		return _html;
	}
}
function  objectTpArr(obj){
	return Object.keys(obj).map(function(key) {
			return [Number(key), obj[key]];
	});
}
function update_personal_info(obj){
	var _arr = [];
	console.log(obj.response);
	Object.keys(obj.response).forEach(function( key){
		_arr[key] = obj.response[key];
	});
	$("#fs_personal_info").find("div.form-group").each(function(){
		if(this.id && this.id != ''){
			var column = this.id.substr(4, this.id.length);
			if(_arr[column] && _arr[column] != '' ){
				$('div#'+this.id).html(_arr[column]);
			}
		}
	});
	return true;
}
function update_profile_info(obj){
	//return true;
	var _arr = [];
	Object.keys(obj.response).forEach(function( key){
		_arr[key] = obj.response[key];
	});
	var  _all = [];
	_all['position_id'] = <?php echo json_encode($positions); ?>; 
	_all['department_id'] =<?php echo json_encode($departments); ?>;
	_all['manager_id'] = <?php echo json_encode($managers); ?>; 
	$("#fs_profile_info").find("div.form-group").each(function(){
		
		if(this.id && this.id != ''){
			var column = this.id.substr(4, this.id.length);
			if(_arr[column] && _arr[column] != '' ){
				console.log(_arr[column]);
				if( ( column in  _all) && ( _arr[column] in _all[column] ) ){
					var val = _all[column][_arr[column]];
					console.log(val + ' == ');
				}else{
					var val = _arr[column]
				}
				$('div#'+this.id).html(val);
				
			}
		}
	});
	
	if( obj.response.active_status == '1'  ){
		if(!$('#small_active_status').hasClass('text-success')){
			$('#small_active_status').removeClass('text-danger');
			$('#small_active_status').addClass('text-success');
			$('#small_active_status').text('Active');
		}
	}
	if( obj.response.active_status == '0'  ){
		if(!$('#small_active_status').hasClass('text-danger')){
			$('#small_active_status').removeClass('text-success');
			$('#small_active_status').addClass('text-danger');
			$('#small_active_status').text('Inactive');
		}
	}
	return true;
}

function update_official_info(obj){
	var _arr = [];
	console.log(obj.response);
	Object.keys(obj.response).forEach(function( key){
		_arr[key] = obj.response[key];
	});
	$("#fs_official_info").find("div.form-group").each(function(){
		if(this.id && this.id != ''){
			var column = this.id.substr(4, this.id.length);
			if(_arr[column] && _arr[column] != '' ){
				$('div#'+this.id).html(_arr[column]);
			}
		}
	});
	return true;
}
function toggle_modal_employers(users_employers_id, user_id){
	$('form#frm_employers').bootstrapValidator();
		if( Number(users_employers_id) == 0 ){
			$("form#frm_employers #task").val('add');
			$("#users_employers_id").val(0);
			$('#frm_employers').trigger("reset");
			$('input#users_employer_type_1').prop('checked', 'checked');
			$("select#city_id option[value='']").attr('selected','selected');
			$("select#state_id option[value='']").attr('selected','selected');
			$("select#duration_from_month option[value='']").attr('selected','selected');
			$("select#duration_to_month option[value='']").attr('selected','selected');
			$("#modal_employers").modal('toggle');
			return true;
		}
		if( Number(users_employers_id)  !=  0 ){
			$('form#frm_employers').bootstrapValidator();
			var url =  '<?php echo $ajax_url; ?>getEmployerById';
			$.post(url, {users_employers_id : users_employers_id, id: user_id}, function(result) {
				console.log(result);
				var emp_obj = $.parseJSON(result);
				if(emp_obj.status == 'success'){
					if(emp_obj.response){
						console.log(emp_obj.response);
						var $_id = emp_obj.response.users_employers_id;
						var users_employer_type_val = 'users_employer_type_'+emp_obj.response.users_employer_type;
						$('#frm_employers').trigger("reset");
						$('input#'+users_employer_type_val).prop('checked', 'checked');
						$("#users_employers_id").val($_id);
						$("#users_employer_name").val(emp_obj.response.users_employer_name);
						$("#users_employer_phone").val(emp_obj.response.users_employer_phone);
						$("#users_employer_website").val(emp_obj.response.users_employer_website);
						$("#users_employer_address").val(emp_obj.response.users_employer_address);
						$("form#frm_employers select#city_id option[value="+emp_obj.response.city_id+"]").attr('selected','selected');
						$("form#frm_employers select#state_id option[value="+emp_obj.response.state_id+"]").attr('selected','selected');
						$("#users_employer_designation_joining").val(emp_obj.response.users_employer_designation_joining);
						$("#users_employer_designation_leaving").val(emp_obj.response.users_employer_designation_leaving);
						$("#users_employer_package_joining").val(emp_obj.response.users_employer_package_joining);
						$("#users_employer_package_leaving").val(emp_obj.response.users_employer_package_leaving);
						$("form#frm_employers select#duration_from_month option[value="+emp_obj.response.duration_from_month+"]").attr('selected','selected');
						$("form#frm_employers #duration_from_year").val(emp_obj.response.duration_from_year);
						$("form#frm_employers select#duration_to_month option[value="+emp_obj.response.duration_to_month+"]").attr('selected','selected');
						$("form#frm_employers #duration_to_year").val(emp_obj.response.duration_to_year);
					}
				}
			});
			$("#modal_employers").modal('toggle');
			return true;
		}
}
function toggle_modal_change_password(user_id){
	$("#modal_change_password").modal('toggle');
}
function toggle_modal_assignrole(user_id, current_role){
	
	$("#modal_assignrole").modal('toggle');
}
function toggle_modal_family(users_family_id, user_id){
	$("form#frm_family_info").find("input#users_family_id").val(users_family_id);
	if( users_family_id && users_family_id != 0 ){
		var url =  '<?php echo $ajax_url; ?>getFamilyById';
			$.post(url, {users_family_id : users_family_id, id: user_id}, function(result) {
				console.log(result);
				var family_obj = $.parseJSON(result);
				if(family_obj.status == 'success'){
					if(family_obj.response){
						console.log(family_obj.response);
						$("form#frm_family_info").find("input#full_name").val(family_obj.response.full_name);
						$("form#frm_family_info select#relation_type option[value="+family_obj.response.relation_type+"]").attr('selected','selected');
						$("form#frm_family_info select#relation_id option[value="+family_obj.response.relation_id+"]").attr('selected','selected');
					}
				}
			});
	}else{
		$("form#frm_family_info").find("input#full_name").val('');
		$("form#frm_family_info select#relation_type option[value='']").attr('selected','selected');
		$("form#frm_family_info select#relation_id option[value='']").attr('selected','selected');
	}
	$("#modal_family_info").modal('toggle');
}

function toggle_modal_emergency_contact(users_emergency_contacts_id, user_id){
	$("form#frm_emergency_contact").find("input#users_emergency_contacts_id").val(users_emergency_contacts_id);
	if( users_emergency_contacts_id && users_emergency_contacts_id != 0 ){
		var url =  '<?php echo $ajax_url; ?>getEmergencyContactById';
			$.post(url, {users_emergency_contacts_id : users_emergency_contacts_id, id: user_id}, function(result) {
				console.log(result);
				var family_obj = $.parseJSON(result);
				if(family_obj.status == 'success'){
					if(family_obj.response){
						console.log(family_obj.response);
						$("form#frm_emergency_contact").find("input#full_name").val(family_obj.response.full_name);
						$("form#frm_emergency_contact").find("input#relation").val(family_obj.response.relation);
						$("form#frm_emergency_contact").find("input#contact_no").val(family_obj.response.contact_no);
					}
				}
			});
	}else{
		$("form#frm_emergency_contact").find("input#full_name").val('');
		$("form#frm_emergency_contact select#relation_type option[value='']").attr('selected','selected');
		$("form#frm_emergency_contact select#relation_id option[value='']").attr('selected','selected');
	}
	$("#modal_emergency_contact").modal('toggle');
}

</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
<script src="<?php echo asset_url(); ?>build/js/tagsinput/bootstrap-tagsinput.js"></script>