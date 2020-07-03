<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (isset($Employee_info) && !empty($Employee_info)) {
    $Emp_Title = ucfirst($Employee_info[0]['First_Name']) . ' ' . ucfirst($Employee_info[0]['Last_Name']) . '/' . $Employee_info[0]['Emp_ID'];
}
?>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_content">
        <div id="emp_detail"></div>
            
<?php if (!empty($postdata['task']) && $postdata['task'] == 'save' ){ ?>
<form name="frmsave" id="frmsave" method="post" action="<?php echo $listpage_url;?>">
                <input type="hidden" name="id" id="id" value="<?php if(isset($model['id'])) { echo $model['id']; } ?>" />
                <input type="hidden" name="search_for" id="order_type" value="<?php echo $postdata['search_for']; ?>" />
                <input type="hidden" name="search_by" id="sort_by" value="<?php echo $postdata['search_by']; ?>" />
                <input type="hidden" name="sort_by" id="order_type" value="<?php echo $postdata['sort_by']; ?>" />
                <input type="hidden" name="order_type" id="order_type" value="<?php echo $postdata['order_type']; ?>" />
                <input type="hidden" name="page" id="order_type" value="<?php echo $postdata['page']; ?>" />
                <input type="hidden" name="limit" id="limit" value="<?php echo $postdata['limit']; ?>" />
  </form>
<?php
  } else{ ?>
                <form class="form-horizontal form-label-left" novalidate method="post" action="" id="Emp_Detail_Form">
                        <input type="hidden" name="task" id="task" value="save" />
                        <input type="hidden" name="id" id="id" value="<?php echo $model['id']; ?>" />
                        <input type="hidden" name="search_for" id="order_type" value="<?php echo $postdata['search_for']; ?>" />
                        <input type="hidden" name="search_by" id="sort_by" value="<?php echo $postdata['search_by']; ?>" />
                        <input type="hidden" name="sort_by" id="order_type" value="<?php echo $postdata['sort_by']; ?>" />
                        <input type="hidden" name="order_type" id="order_type" value="<?php echo $postdata['order_type']; ?>" />
                        <input type="hidden" name="page" id="order_type" value="<?php echo $postdata['page']; ?>" />
                        <input type="hidden" name="limit" id="limit" value="<?php echo $postdata['limit']; ?>" />
                        <span class="section tab-title-upper"> Personal Information </span>
                        <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12 label-title-upper" for="first_name"><span class="requireds">*</span> First Name:</label>
                                <div class="col-md-1 col-sm-3 col-xs-12">   
                                        <select class="form-control col-md-1 col-xs-4" id="title" name="title">
                                           <option value="Mr."<?php if( $row['title']  == "Mr." ) { ?> selected="selected"<?php } ?>>Mr.</option>
                                           <option value="Mrs."<?php if ( $row['title'] == "Mrs." ) { ?> selected="selected"<?php } ?>>Mrs.</option>
                                           <option value="Miss."<?php if ( $row['title'] == "Miss." ) { ?> selected="selected"<?php } ?>>Miss.</option>
                                        </select>						
                                </div>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First name" value="<?php echo $row['first_name']; ?> ">
                                </div>

                                <label class="control-label col-md-1 col-sm-3 col-xs-12 label-title-upper" for="middle_name">Middle Name:</label>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Middle name" value="<?php echo $row['middle_name']; ?>">
                                </div>

                                <label class="control-label col-md-2 col-sm-3 col-xs-12 label-title-upper" for="last_name"><span class="requireds">*</span> Last Name:</label>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last name" value="<?php echo $row['last_name']; ?>">
                                </div>
                        </div>

                        <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12 label-title-upper" for="initial"><span class="requireds">*</span> Initial:</label>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" name="initial" id="initial" placeholder="initial name" value="<?php echo $row['last_name']; ?>">
                                </div>
                                <label class="control-label col-md-2 col-sm-3 col-xs-12 label-title-upper" for="positions_id">Position:</label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                         <select class="form-control" id="positions_id" name="positions_id">
                                                 <option value="">--Please Select Position-- </option>
                                                         <?php foreach ( $positions as $key => $value ): ?>
                                                           <option value="<?php echo $key; ?>"<?php if ( isset($row['positions_id']) &&  $row['positions_id'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
                                                         <?php endforeach; ?>
                                         </select>
                                </div>
                        </div>
                        <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12 label-title-upper">Employment Type:</label><div class="col-md-4 col-sm-6 col-xs-12">
                                        <label class="control-label label-title-upper">
                                                <input type="radio" class="flat" name="employeement_status" id="employeement_status_1" value="0" <?php if ($row['employeement_status']  == 0 )  echo 'checked="checked" '; ?> /> Full Time</label>
                                        <label class="control-label label-title-upper">	
                                                <input type="radio" class="flat" name="employeement_status" id="employeement_status_2" value="1" <?php if ($row['employeement_status']  == 1 )  echo 'checked="checked" '; ?> /> Part Time</label>
                                        <label class="control-label label-title-upper">	
                                                <input type="radio" class="flat" name="employeement_status" id="employeement_status_2" value="2"<?php if ($row['employeement_status']  == 2 )  echo 'checked="checked" '; ?> /> Temporary</label>
                                </div>

                                <label class="control-label col-md-3 col-sm-3 col-xs-12 label-title-upper">Employment Active Status:</label>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                        <div id="Employement_Active_Status" class="btn-group" data-toggle="buttons">  
                                        <?php $checked = ($row['status'] == 1) ? ' checked ':'  '; ?>
                                                <input type="checkbox" name="status" id="status" <?php echo $checked; ?> data-toggle="toggle" data-onstyle="primary" data-on="Active"data-off="Inactive" value="<?php echo $row['status'] ; ?>" data-offstyle="default" >							
                                        </div>
                                </div>
                        </div>
                        <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12 label-title-upper" for="dob"><span class="requireds">*</span>DoB:</label>
                                <div class="col-md-2 col-sm-6 col-xs-12 has-feedback">
                                        <input id="dob" name="dob" value="<?php echo $row['dob'];?>" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" required="required" type="text" placeholder="eg.01/01/2017" >
                                        <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>

                                <label class="control-label col-md-1 col-sm-3 col-xs-12 "><span class="requireds label-title-upper">*</span> Gender:</label>
                                <div class="col-md-1 col-sm-6 col-xs-12">
                                        <div id="Gender1" class="btn-group" data-toggle="buttons">    
                                                <?php $checked = ($row['gender'] == 'Male') ? ' checked ':''; ?>
                                                <input type="checkbox" name="gender" id="gender" <?php echo $checked; ?> data-toggle="toggle" data-onstyle="primary" data-on="Male"data-off="Female" value="<?php echo $row['gender'] ; ?>" data-offstyle="default" >
                                        </div>
                                </div>
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">Marital Status:</label>                      
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                        <label class="control-label label-title-upper">
                                                        <input type="radio" class="flat" name="marital_status" id="marital_status_1" value="1" /> Married
                                        </label>
                                        <label class="control-label">
                                                        <input type="radio" class="flat" name="marital_status" id="marital_status_2" value="2" /> Single
                                        </label>
                                        <label class="control-label">		
                                                        <input type="radio" class="flat" name="marital_status" id="marital_status_3" value="3" /> Divorced
                                        </label>
                                </div>
                        </div>
                        <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="email"><span class="requireds">*</span> EMAIL:</label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                        <input type="email" class="form-control col-md-7 col-xs-12" name="email" id="email" placeholder="Email" value="<?php echo $row['email']; ?>">
                                </div>
                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Secondary_Email">SECONDARY EMAIL:</label>
								<div class="col-md-4 col-sm-6 col-xs-12">
                                <input type="email" class="form-control col-md-7 col-xs-12" name="email_secondary" id="email_secondary" placeholder="Secondary Email" value="<?php echo $row['email_secondary']; ?>">
								</div>
						</div>
                        <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="manager"><span class="requireds">*</span> Manager:</label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                        <select class="form-control select2_single" id="reporting_manager_id" name="reporting_manager_id" maxlength="2">
                                                 <option value="">--Please Select Manager-- </option>
                                                         <?php foreach ( $managers as $key => $value ): ?>
                                                           <option value="<?php echo $key; ?>"<?php if ( isset($row['reporting_manager_id']) &&  $row['reporting_manager_id'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
                                                         <?php endforeach; ?>
                                         </select>
                                </div>

                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Emergancy_Contact_Name1"><span class="requireds">*</span> DEPARTMENT: </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                <select class="form-control col-md-7 col-xs-12" id="departments_id" name="departments_id" required="required">
                                                 <option value="">--Please Select Department--</option>
                                                         <?php foreach ( $departments as $key => $value ): ?>
                                                           <option value="<?php echo $key; ?>"<?php if ( isset($row['departments_id']) &&  $row['departments_id'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
                                                         <?php endforeach; ?>
                                         </select>
                                </div>
                        </div>

                        <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="joining_date"><span class="requireds">*</span> DATE EMPLOYMENT COMMENCED:</label>
                                <div class="col-md-3 col-sm-6 col-xs-12 has-feedback">
                                        <input id="joining_date" name="joining_date" value="<?php echo $row['joining_date'];?>" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" onChange="GetNextDate();" required="required" type="text" placeholder="eg.01/01/2017" >
                                        <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>
                        </div>

                        <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="contact_primary"><span class="requireds">*</span> PHONE NUMBER:
                                </label>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control col-md-7 col-xs-12" name="contact_primary" id="contact_primary" placeholder="Phone Number(S)" value="<?php echo $row['contact']['primary']; ?>">
                                </div>

                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="contact_optional_1">MOBILE 1:</label>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control col-md-7 col-xs-12"  maxlength="13" name="contact_optional[]" id="contact_optional_1" placeholder="Mobile 1" value="<?php echo $row['contact']['optional'][0]; ?>">
                                </div>
                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="contact_optional_2">MOBILE 2:</label>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control col-md-7 col-xs-12"  maxlength="13" name="contact_optional[]" id="contact_optional_2" placeholder="PMobile 2" value="<?php echo $row['contact']['optional'][1]; ?>">
                                </div>						
                        </div>

                        <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="address_permenent"><span class="requireds">*</span> PERMANENT ADDRESS:</label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                        <textarea id="address_1" name="address[]" placeholder="Permanent Address" maxlength="300" required="required" class="form-control col-md-7 col-xs-12"><?php echo $row['primary']['address'] ; ?></textarea>
                                </div>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-7 col-xs-12" id="states_id_1" name="states_id[]" required="required">
                                                <option value="">--Please Select State--</option>
                                                <?php foreach ( $states as $key => $value ): ?>
                                                        <option value="<?php echo $key; ?>"<?php if ( isset($row['primary']['states_id']) &&  $row['primary']['states_id'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
                                                <?php endforeach; ?>
                                        </select>
                                </div>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-7 col-xs-12" id="cities_id_1" name="cities_id[]" required="required">
                                                <option value="">--Please Select City--</option>
                                                <?php foreach ( $cities as $key => $value ): ?>
                                                        <option value="<?php echo $key; ?>"<?php if ( isset($row['primary']['cities_id']) &&  $row['primary']['cities_id'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
                                                <?php endforeach; ?>
                                        </select>
                                </div>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control col-md-7 col-xs-12"  maxlength="6" name="zipcode[]" id="zipcode_1" placeholder="Zipcode " value="<?php echo $row['primary']['zipcode']; ?>">
                                </div>
                        </div>

                        <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="address_2"><span class="requireds">*</span> TEMPERORY ADDRESS:
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                        <textarea id="address_2" name="address[]" placeholder="Temporary Address" maxlength="300" required="required" class="form-control col-md-7 col-xs-12"><?php echo $row['temp']['address']; ?></textarea>
                                </div>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-7 col-xs-12" id="states_id_2" name="states_id[]" required="required">
                                                <option value="">--Please Select State--</option>
                                                <?php foreach ( $states as $key => $value ): ?>
                                                        <option value="<?php echo $key; ?>"<?php if ( isset($row['temp']['states_id']) &&  $row['temp']['states_id'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
                                                <?php endforeach; ?>
                                        </select>
                                </div>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                        <select class="form-control col-md-7 col-xs-12" id="citiy_id_2" name="cities_id[]" required="required">
                                                <option value="">--Please Select City--</option>
                                                <?php foreach ( $cities as $key => $value ): ?>
                                                        <option value="<?php echo $key; ?>"<?php if ( isset($row['temp']['cities_id']) && $row['temp']['cities_id'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
                                                <?php endforeach; ?>
                                        </select>
                                </div>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control col-md-7 col-xs-12"  maxlength="6" name="zipcode[]" id="zipcode_2" placeholder="Zipcode " value="<?php echo $row['temp']['zipcode']; ?>">
                                </div>					
                        </div>

                        <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">PAST CRIMINAL RECORD:</label>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                        <div  class="btn-group" data-toggle="buttons">   
                                                <?php $checked = ($row['past_criminal_record'] == 'Yes') ? ' checked ':'  '; ?>
                                                <input type="checkbox" name="past_criminal_record" id="past_criminal_record" <?php echo $checked; ?> data-toggle="toggle" data-onstyle="primary" data-on="Yes" data-off="No" value="<?php echo $row['past_criminal_record'] ; ?>" data-offstyle="default" >
                                        </div>
                                </div>
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">MONTHS BOND:</label>
                                <div class="col-md-3 col-sm-6 col-xs-12 has-feedback">
                                        <select class="form-control col-md-1 col-xs-4" id="bond_period" name="bond_period">
                                                <option value="" >  --Please select bond months--
                                                </option>
                                           <option value="12"<?php if( $row['bond_period'] == 12 ) { ?> selected="selected"<?php } ?>>12</option>
                                           <option value="18"<?php if ($row['bond_period']  == 18) { ?> selected="selected"<?php } ?>>18</option>
                                           <option value="24"<?php if ($row['bond_period'] == 24 ) { ?> selected="selected"<?php } ?>>24</option>
                                        </select>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12 has-feedback">
                                <input id="bond_to_date" name="bond_to_date" value="<?php echo $row['bond_to_date']['m_d_y'];?>" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" onChange="GetNextDate();" required="required" type="text" placeholder="eg.01/01/2017" >
                                        <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>
                        </div>
                        <?php 
                                $show_detail = ($row['past_criminal_record']  == 1) ? 'display:block ': 'display:none ';?>
                        <div class="item form-group"  style="<?php echo $show_detail;?>"  id="Past_Criminal_Detail_box">
                                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for=""><span class="requireds">*</span> PAST CRIMINAL RECORD DETAIL:
                                        </label>
                                        <div class="col-md-10 col-sm-6 col-xs-12">
                                                <textarea id="past_criminal_detail" name="past_criminal_detail" maxlength="400" placeholder="Past Criminal Detail" class="form-control col-md-7 col-xs-12" required="required"><?php echo $row['past_criminal_detail']; ?></textarea>
                                        </div>
                                </div>	
                        <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">ORDINARY HOURS OF WORK:
                                </label>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="input-group bootstrap-timepicker timepicker">
                                                <input type="text" class="form-control col-md-7 col-xs-12 input-small"  maxlength="10" name="working_hours_from" id="Odinary_Work_Hours_From" value="<?php echo $row['working_hours_from']; ?>">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                        </div>
                                </div>
                                <div class="col-md-1 col-sm-1 col-xs-12" style="text-align:center">
                                        <label class="control-label">TO</label>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="input-group bootstrap-timepicker timepicker">
                                                <input type="text" class="form-control col-md-7 col-xs-12 input-small"  maxlength="10" name="working_hours_to" id="Odinary_Work_Hours_To" value="<?php echo $row['working_hours_to']; ?>">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                        </div>
                                </div>
                        </div>
                        <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Blood_Group"><span class="requireds">*</span>BLOOD GROUP:</label>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                <input type="text" class="form-control col-md-7 col-xs-12 input-small" placeholder="eg. O+"  maxlength="6" name="blood_group" id="blood_group" value="<?php echo $row['blood_group']; ?>">
                                </div>
                        </div>
                        <span class="section" style="margin-top:30px;">EMERGANCY</span>
                        <table class="tbl_emergency">
                                <tr>
                                        <th width="10px;" style="text-align:right;"></th>
                                        <th width="30px;">FULL NAME</th>
                                        <th width="30px;">RELATION</th>
                                        <th width="30px;">PHONE NUMBER</th>
                                </tr>
                                <tr>
                                        <td width="10px;" align="right" style="text-align:right;"><b>1:</b></td>
                                        <td width="30px;">
                                                <input type="text" class="form-control col-md-7 col-xs-12" name="contact[emergency][name][]" id="contact_emergency_name_1" maxlength="100" placeholder="Emergency Contact Name " value="<?php echo $row['contact']['emergency'][0]['name']; ?>">
                                        </td>
                                        <td width="30px;">
                                                <input type="text" class="form-control col-md-7 col-xs-12" name="contact[emergency][relation][]" id="contact_emergency_relation_1" maxlength="100" placeholder="Emergency Contact Relation " value="<?php echo $row['contact']['emergency'][0]['relation']; ?>">
                                        </td>
                                        <td width="30px;">
                                        <input type="text" class="form-control col-md-7 col-xs-12" name="contact[emergency][number][]" id="contact_emergency_number_1" maxlength="13" placeholder="Emergency Contact Number" value="<?php echo $row['contact']['emergency'][0]['number']; ?>">
                                        </td>
                                </tr>
                                <tr>
                                        <td style="text-align:right;"><b>2:</b></td>
                                        <td width="30px;">
                                                <input type="text" class="form-control col-md-7 col-xs-12" name="contact[emergency][name][]" id="contact_emergency_name_2" maxlength="100" placeholder="Emergency Contact Name " value="<?php echo $row['contact']['emergency'][1]['name']; ?>">
                                        </td>
                                        <td width="30px;">
                                                <input type="text" class="form-control col-md-7 col-xs-12" name="contact[emergency][relation][]" id="contact_emergency_relation_2" maxlength="100" placeholder="Emergency Contact Relation " value="<?php echo $row['contact']['emergency'][1]['relation']; ?>">
                                        </td>
                                        <td width="30px;">
                                        <input type="text" class="form-control col-md-7 col-xs-12" name="contact[emergency][number][]" id="contact_emergency_number_2" maxlength="13" placeholder="Emergency Contact Number" value="<?php echo $row['contact']['emergency'][1]['number']; ?>">
                                        </td>
                                </tr>
                        </table>
                        <span class="section" style="margin-top:30px;">REFERANCES</span>
                        <table class="tbl_emergency">
                                <tr>
                                        <th width="10px;" style="text-align:right;"></th>
                                        <th width="30px;">FULL NAME</th>
                                        <th width="30px;">RELATION</th>
                                        <th width="30px;">PHONE NUMBER</th>
                                </tr>
                                <tr>
                                        <td width="10px;" align="right" style="text-align:right;"><b>1:</b></td>
                                        <td width="30px;">
                                                <input type="text" class="form-control col-md-7 col-xs-12" name="contact[reference][name][]" id="contact_reference_name_1" maxlength="100" placeholder="References Contact Name " value="<?php echo $row['contact']['reference'][0]['name']; ?>">
                                        </td>
                                        <td width="30px;">
                                                <input type="text" class="form-control col-md-7 col-xs-12" name="contact[reference][relation][]" id="contact_reference_relation_1" maxlength="13" placeholder="References Contact Relation " value="<?php echo $row['contact']['reference'][0]['relation']; ?>">
                                        </td>
                                        <td width="30px;">
                                        <input type="text" class="form-control col-md-7 col-xs-12" name="contact[reference][number][]" id="contact_reference_number_1" maxlength="13" placeholder="Emergency Contact Number" value="<?php echo $row['contact']['reference'][0]['number']; ?>">
                                        </td>
                                </tr>
                                <tr>
                                        <td width="10px;" align="right" style="text-align:right;"><b>2:</b></td>
                                        <td width="30px;">
                                                <input type="text" class="form-control col-md-7 col-xs-12" name="contact[reference][name][]" id="contact_reference_name_1" maxlength="13" placeholder="References Contact Name " value="<?php echo $row['contact']['reference'][1]['name']; ?>">
                                        </td>
                                        <td width="30px;">
                                                <input type="text" class="form-control col-md-7 col-xs-12" name="contact[reference][relation][]" id="contact_reference_relation_1" maxlength="13" placeholder="References Contact Relation " value="<?php echo $row['contact']['reference'][1]['relation']; ?>">
                                        </td>
                                        <td width="30px;">
                                        <input type="text" class="form-control col-md-7 col-xs-12" name="contact[reference][number][]" id="contact_reference_number_1" maxlength="13" placeholder="References Contact Number" value="<?php echo $row['contact']['reference'][1]['number']; ?>">
                                        </td>
                                </tr>
                                <tr>
                                        <td width="10px;" align="right" style="text-align:right;"><b>3:</b></td>
                                        <td width="30px;">
                                                <input type="text" class="form-control col-md-7 col-xs-12" name="contact[reference][name][]" id="contact_reference_name_1" maxlength="13" placeholder="Emergency Contact Name " value="<?php echo $row['contact']['reference'][2]['name']; ?>">
                                        </td>
                                        <td width="30px;">
                                                <input type="text" class="form-control col-md-7 col-xs-12" name="contact[reference][relation][]" id="contact_reference_relation_1" maxlength="13" placeholder="Emergency Contact Relation " value="<?php echo $row['contact']['reference'][2]['relation']; ?>">
                                        </td>
                                        <td width="30px;">
                                        <input type="text" class="form-control col-md-7 col-xs-12" name="contact[reference][number][]" id="contact_reference_number_1" maxlength="13" placeholder="Emergency Contact Number" value="<?php echo $row['contact']['reference'][2]['number']; ?>">
                                        </td>
                                </tr>
                        </table>
                        <!----- ESIC detail 02-07-2017  ------------------------------------->
						<!-- 
                        <?php // /*  ?>
                        <span class="section" style="margin-top:30px;">OFFICIAL DETAIL</span> 
                        <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">IF ALREADY REGISTER IN ESIC:</label>                      
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                        <label class="control-label label-title-upper">
                                                <input type="radio" class="flat insurance" name="esic_status" id="esic_status_1"<?php if(  $row['esic_status'] == 1 ) echo 'checked="checked" '; ?> value="1" /> Yes
                                        </label>
                                        <label class="control-label label-title-upper">	
                                                <input type="radio" class="flat insurance" name="esic_status" id="esic_status_0" value="0" <?php if(  $row['esic_status'] == 0 ) echo 'checked="checked" '; ?> /> No
                                        </label>
                                </div>
                                <div class="Insurance_No" style='display: none;'>
                                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Insurance_No">IF YES INSURANCE NO: XX<?php echo $row['insurance_no']; ?>ZZ</label>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                                <input type="text" class="form-control col-md-7 col-xs-12" name="insurance_no" id="insurance_no" maxlength="13" placeholder="INSURANCE NO" value="<?php echo $row['insurance_no']; ?>">
                                        </div>
                                </div>
                        </div>
                        <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="pf_code_no">PF CODE NO/UAN NO:</label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control col-md-7 col-xs-12" name="pf_code_no" id="pf_code_no" maxlength="20" placeholder="PREVIOUS PF CODE NO/UAN NO" value="<?php echo $row['pf_code_no']; ?>">
                                </div>

                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="aadhar_name"><span class="requireds">*</span> FULL NAME:<br>(AS PER AADHAR CARD)</label>
                                <div class="col-md-4 col-sm-6 col-xs-12">

                                <input type="text" class="form-control col-md-7 col-xs-12" name="aadhar_name" id="aadhar_name" maxlength="100" placeholder="AADHAR CARD NAME" value="<?php echo $row['aadhar_name']; ?>" required="required">
                                </div>
                        </div>
                        <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="aadhar_no"><span class="requireds">*</span>AADHAR CARD NUMBER:</label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control col-md-7 col-xs-12" name="aadhar_no" id="id_proofs_aadhar_number" maxlength="20" placeholder="AADHAR CARD NUMBER" value="<?php echo $row['aadhar_no']; ?>" required="required">
                                </div>
                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Pan_Number"><span class="requireds">*</span>PAN NUMBER:</label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control col-md-7 col-xs-12" name="pan" id="id_proofs_aadhar_number" maxlength="100" placeholder="PAN NUMBER" value="<?php echo $row['pan']; ?>" required="required">
                                </div>
                        </div>
                        <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="date_of_exit">DATE OF EXIT:<br>(PREVIOUS COMPANY)</label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
									<input id="date_of_exit" name="date_of_exit" value="<?php echo $row['date_of_exit'];?>" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" required="required" type="text" placeholder="eg.01/01/2017" >
                                        <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
								</div>	
                        </div>
						-->
                        <span class="section" style="margin-top:30px;">FAMILY DETAIL</span>
                        <div class="item form-group">
                                <table class="table table-bordered tbl-family">
                                        <thead>
                                                <tr>
                                                        <th>RELATION</th>
                                                        <th>FULL NAME</th>
                                                        <!-- <th>DATE OF BIRTH</th>
                                                        <th>AADHAR CARD NO</th> -->
                                                </tr>
                                        </thead>
                                        <tbody class="append_section_family">
                                                <?php
                                                if (count($row['contact']['family']) > 0) {
													
                                                        $totalArr = count($row['contact']['family']);
                                                        $i = 0;
                                                        foreach ($row['contact']['family'] as $key => $value) {
                                                                ?>
                                                                <tr class="entry_family">
                                                                <td>
                                                                        <select class="select2_single form-control valid" id="contact_family_relation_<?php echo $i ;?>" name="contact[family][relation][]">
                                                                        <option value="" >  --Please select relation type--</option>
                                                                        <option value="father"<?php if( $value['relation'] == 'father' ) { ?> selected="selected"<?php } ?>>FATHER</option>
                                                                        <option value="mother"<?php if ( $value['relation']  == 'mother') { ?> selected="selected"<?php } ?>>MOTHER</option>
                                                                        <option value="brother"<?php if ( $value['relation'] == 'brother' ) { ?> selected="selected"<?php } ?>>BROTHER</option>
																		 <option value="husband"<?php if ( $value['relation'] == 'husband' ) { ?> selected="selected"<?php } ?>>HUSBAND</option>
                                                                        <option value="wife"<?php if ( $value['relation']== 'wife') { ?> selected="selected"<?php } ?>>WIFE</option>
                                                                        <option value="son"<?php if ( $value['relation'] == 'son' ) { ?> selected="selected"<?php } ?>>SON</option>
                                                                        <option value="daughter"<?php if ( $value['relation'] == 'daughter' ) { ?> selected="selected"<?php } ?>>DAUGHTER</option>
                                                                        </select>
                                                                </td>
                                                                <td>
                                                                <input type="text" class="form-control col-md-7 col-xs-12" name="contact[family][name][]" id="contact_family_name_<?php echo $i ;?>" maxlength="20" placeholder="NAME AS PER AADHAR CARD" value="<?php echo $value['name']; ?>" required="required">
                                                                </td>
                                                                </tr>
                                                                <?php
                                                         $i++;	
                                                        } // end loop
                                                } ?>
                                        </tbody>
                                </table>
                        </div>
                        <!----- family detail 02-07-2017  ------------------------------------------------------>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
											
                                                <button type="button" onclick="this.form.action='<?php echo $listpage_url;?>';this.form.submit();" class="btn btn-danger">Cancel</button>
                                                <button id="send" type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                </div>
                        <span class="requireds"> Fields marked with an * are required </span>
                </form>  
  <?php } ?>			

        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- /page content -->
<script>
<?php if (!empty($postdata['task']) && $postdata['task'] == 'save' ){ ?>
		$(document).ready(function() {
			$('#frmsave').submit();
		});
	<?php } ?>	
    /*function Check_Esic() {
     alert('called');
     if ($(this).prop("checked") == true) {
     $('.items-insurance-box').show();
     $('#Insurance_No').attr('required', true);
     } else {
     $('.items-insurance-box').hide();
     $('#Insurance_No').attr('required', false);
     }
     }*/

    /*function addhyphen()
     {
     var aadhar_num_str = $("#Aadhar_Number").val();
     aadhar_num_str.replace(/(\d{4})/g, '$1 ').replace(/(^\s+|\s+$)/,'');
     }*/

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
        $('#Odinary_Work_Hours_From').timepicker({
            minuteStep: 30,
            defaultTime: '10:00 AM'

        });
        $('#Odinary_Work_Hours_To').timepicker({
            minuteStep: 30,
            defaultTime: '08:00 PM'
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
        $('#Past_Criminal_Record').change(function () {
            if ($(this).prop("checked") == true) {
                //$('#Past_Criminal_Detail_box').css("display","block");
                $('#Past_Criminal_Detail_box').slideDown();
            } else {
                $('#Past_Criminal_Detail_box').slideUp();
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

        /************** Jquery validation rules,messages and submit handler ****************/
        $('#Emp_Detail_Form').validate({
            rules: {
                Phone_Number: {
                    required: true,
                    number: true,
                    minlength: 10
                },
                Aadhar_Number: {
                    required: true,
                    number: true,
                    minlength: 12
                },
                Email: {
                    required: true,
                    email: true
                },
                Pan_Number: {
                    required: true,
                    pan: true
                },
                Blood_Group: {
                    required: true,
                    blood: true
                },
                Dob: {
                    required: true,
                    ageverify: true
                },
                Emergancy_Contact_Name1: {
                    required: true,
                    minlength: 5
                },
                Emergancy_Contact_Relation1: {
                    required: true,
                    minlength: 2
                },
                Zipcode1: {
                    required: true,
                    minlength: 6
                },
                Zipcode2: {
                    required: true,
                    minlength: 6
                },
                Emergancy_Contact_Number1: {
                    required: true,
                    number: true,
                    minlength: 10
                }

            },

            errorElement: 'span',
            submitHandler: function (form) {
                form.submit();
            }
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
        var CurrentDate = $('#Joining_Date').val();
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
</script>