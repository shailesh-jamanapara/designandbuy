<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * 12-20-2016
 * edit_detail page(view/employee)
 */

// echo '<pre>'; print_r($Emp_info); exit;
if (isset($Employee_info) && !empty($Employee_info)) {
    $Emp_Title = ucfirst($Employee_info[0]['First_Name']) . ' ' . ucfirst($Employee_info[0]['Last_Name']) . '/' . $Employee_info[0]['Emp_ID'];
} //echo $Emp_Title; exit;
?>
<?php
/* $query = $this->db->query("SELECT Position,Role_ID,Prefix,Role_Assign,First_Name,Middle_Name,Last_Name,Gender,DOB,Phone_Number,Zipcode1,Zipcode2,Mobile1,Email,Secondary_Email,Assign_Manager,Mobile2,Emergancy_Contact_Number1,Emergancy_Contact_Name1,Emergancy_Contact_Relation1,Emergancy_Contact_Name2,Emergancy_Contact_Relation2,Emergancy_Contact_Number2,Blood_Group,Past_Criminal_Record,Past_Criminal_Detail,Short_Name,Address,Permanent_Address,Pan_Number,Joining_Date,Employeement_Status,Emp_Active_Status,Odinary_Work_Hours_To,Odinary_Work_Hours_From,Months_Bond,Bond_To_Date,
  Referance_Name_1,Referance_Relation_1,Referance_Number_1,Referance_Name_2,Referance_Relation_2,Referance_Number_2,Referance_Name_3,Referance_Relation_3,Referance_Number_3 FROM employe where status='1' and Emp_ID='".$Emp_ID."'");
  $row = $query->row(); */
/* echo '<PRE>';
  print_r($row);
  exit; */
?>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_content">
            <div class="" id="emp_detail" >
                <?php
                if (validation_errors()) {
                    echo '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>' . validation_errors() . '</div><script>setTimeout(function(){$("#emp_detail").slideUp();},3000);</script>';
                }
                ?>
            </div>

            <form class="form-horizontal form-label-left" novalidate method="post" action="<?php echo base_url(); ?>index.php/Employee/emp_detail_insert" id="Emp_Detail_Form">
                <input type="hidden" id="Emp_ID" name="Emp_ID" value="<?php echo $Emp_ID; ?>">
                <span class="section">PERSONAL INFORMATION

                </span>

                <div class="item form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="First_Name"><span class="requireds">*</span> FIRST NAME:</label>
                    <div class="col-md-1 col-sm-3 col-xs-12">   

                        <select class="form-control col-md-1 col-xs-4" id="Prefix" name="Prefix">
                            <option value="1"  <?php
                            if (isset($Emp_info['Prefix']) && $Emp_info['Prefix'] == '1') {
                                echo 'selected';
                            } else {
                                set_select('Prefix[]', '1');
                            }
                            ?> >Mr.</option>
                            <option value="2" <?php
                            if (isset($Emp_info['Prefix']) && $Emp_info['Prefix'] == '2') {
                                echo 'selected';
                            } else {
                                set_select('Prefix[]', '2');
                            }
                            ?> >Mrs.</option>
                            <option value="3" <?php
                            if (isset($Emp_info['Prefix']) && $Emp_info['Prefix'] == '3') {
                                echo 'selected';
                            } else {
                                set_select('Prefix[]', '3');
                            }
                            ?> >Dr.</option>
                            <option value="4" <?php
                            if (isset($Emp_info['Prefix']) && $Emp_info['Prefix'] == '4') {
                                echo 'selected';
                            } else {
                                set_select('Prefix[]', '4');
                            }
                            ?> >Prof.</option>								
                            <option value="5" <?php
                            if (isset($Emp_info['Prefix']) && $Emp_info['Prefix'] == '5') {
                                echo 'selected';
                            } else {
                                set_select('Prefix[]', '5');
                            }
                            ?> >Miss.</option>						
                        </select>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" id="First_Name" name="First_Name" value="<?php
                        if (set_value('First_Name')) {
                            echo set_value('First_Name');
                        } else {
                            echo $Emp_info['First_Name'];
                        }
                        ?>"  placeholder="First Name" maxlength="50" required="required" type="text">
                    </div>

                    <label class="control-label col-md-1 col-sm-3 col-xs-12" for="Middle_Name">MIDDLE NAME:</label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" id="Middle_Name" maxlength="10" name="Middle_Name" value="<?php
                        if (set_value('Middle_Name')) {
                            echo set_value('Middle_Name');
                        } else {
                            echo $Emp_info['Middle_Name'];
                        }
                        ?>"  placeholder="Middle Name" type="text">
                    </div>

                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Last_Name"><span class="requireds">*</span> LAST NAME:</label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <input class="form-control col-md-7 col-xs-12" id="Last_Name" name="Last_Name" maxlength="50" value="<?php
                        if (set_value('Last_Name')) {
                            echo set_value('Last_Name');
                        } else {
                            echo $Emp_info['Last_Name'];
                        }
                        ?>" placeholder="Last Name" required="required" type="text">
                    </div>
                </div>

                <div class="item form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Short_Name"><span class="requireds">*</span> INITIAL:</label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <input id="Short_Name" class="form-control col-md-7 col-xs-12" name="Short_Name"  value="<?php
                        if (set_value('Short_Name')) {
                            echo set_value('Short_Name');
                        } else {
                            echo $Emp_info['Short_Name'];
                        }
                        ?>" placeholder="Initial Name" minlength="3" maxlength="10"required="required" type="text">
                    </div>

                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Email">POSITION:</label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <select class="select2_single form-control" id="Position" name="Position" maxlength="2" >
                            <option value="" selected>--Select Position--</option>
                            <?php
                            //$pos_count = 1;
                            foreach ($pos_list as $pos) {
                                ?>
                                <option value="<?php echo $pos['Pos_ID']; ?>" <?php
                                if ($Emp_info['Position'] == $pos['Pos_ID']) {
                                    echo "selected";
                                } else {
                                    echo set_select('Position', "" . $pos['Pos_ID'] . "");
                                }
                                ?> ><?php echo $pos['Position_Name']; ?></option>
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
                </div>
                <div class="item form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">EMPLOYMENT TYPE:</label>                      
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <label class="control-label">

                            <input type="radio"  class="flat" name="Employeement_Status" <?php echo ($Emp_info['Employeement_Status'] == 1) ? "checked" : ""; ?> value="1" <?php echo set_radio('Employeement_Status', '1'); ?> id="Employeement_Status0" value="1" /> &nbsp;&nbsp;FULLTIME</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label class="control-label"><input type="radio" class="flat" <?php echo ($Emp_info['Employeement_Status'] == 2) ? "checked" : ""; ?> name="Employeement_Status" value="2" <?php echo set_radio('Employeement_Status', '2'); ?> id="Employeement_Status1" value="2" /> &nbsp;&nbsp;PARTTIME </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label class="control-label"><input type="radio" class="flat" <?php echo ($Emp_info['Employeement_Status'] == 3) ? "checked" : ""; ?> name="Employeement_Status" value="3" <?php echo set_radio('Employeement_Status', '3'); ?> id="Employeement_Status2" value="3" /> &nbsp;&nbsp;TEMPORARY </label>
                    </div>

                    <label class="control-label col-md-3 col-sm-3 col-xs-12">EMPLOYMENT ACTIVE STATUS:</label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div id="Employement_Active_Status" class="btn-group" data-toggle="buttons">  
                            <?php if ($Emp_info['Emp_Active_Status'] == 1) { ?>
                                <input checked data-toggle="toggle" data-on="Active" name="Emp_Active_Status" value="<?php echo set_value('Emp_Active_Status'); ?>" id="Emp_Active_Status" data-off="Inactive" data-onstyle="primary" data-offstyle="default" type="checkbox">							
                            <?php } else { ?>
                                <input data-toggle="toggle" data-on="Active" name="Emp_Active_Status" value="<?php echo set_value('Emp_Active_Status'); ?>" id="Emp_Active_Status" data-off="Inactive" data-onstyle="primary" data-offstyle="default" type="checkbox">							
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Dob"><span class="requireds">*</span>DOB:</label>
                    <div class="col-md-2 col-sm-6 col-xs-12 has-feedback">
                        <input id="Dob" name="Dob" value="<?php
                        if (set_value('Dob')) {
                            echo set_value('Dob');
                        } elseif ($Emp_info['DOB'] != "0000-00-00") {
                            $dt2 = date_create($Emp_info['DOB']);
                            $DOB = date_format($dt2, 'm/d/Y');
                            echo $DOB;
                        } else {
                            echo "";
                        }
                        ?>" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" required="required" type="text" placeholder="eg.01/01/2017" >
                        <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                    </div>

                    <label class="control-label col-md-1 col-sm-3 col-xs-12"><span class="requireds">*</span> GENDER:</label>
                    <div class="col-md-1 col-sm-6 col-xs-12">
                        <div id="Gender1" class="btn-group" data-toggle="buttons">    

                            <?php if ($Emp_info['Gender'] == 0) { ?>						  
                                <input checked data-toggle="toggle" data-on="Male" data-off="Female" id="Gender"   <?php echo set_checkbox('Gender', '0'); ?>   name="Gender" data-onstyle="primary" data-offstyle="default" type="checkbox">
                            <?php } else { ?>
                                <input  data-toggle="toggle" data-on="Male" data-off="Female" id="Gender"   <?php echo set_checkbox('Gender', '1'); ?>    name="Gender" data-onstyle="primary" data-offstyle="default" type="checkbox">
                            <?php } ?>
                        </div>
                    </div>
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">MARITAL STATUS:</label>                      
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <label class="control-label">

                            <input type="radio" <?php echo ($Emp_info['Marital_Status'] == 2) ? "checked" : ""; ?> class="flat" name="Marital_Status" value="2" <?php echo set_radio('Marital_Status', '2'); ?> id="" /> &nbsp;&nbsp;MARRIED</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <label class="control-label">
                            <input type="radio" <?php echo ($Emp_info['Marital_Status'] == 1) ? "checked" : ""; ?> class="flat" name="Marital_Status" value="1" <?php echo set_radio('Marital_Status', '1'); ?> id="" /> &nbsp;&nbsp;SINGLE </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <label class="control-label">
                            <input type="radio" <?php echo ($Emp_info['Marital_Status'] == 3) ? "checked" : ""; ?> class="flat" name="Marital_Status" value="3" <?php echo set_radio('Marital_Status', '3'); ?> id="" /> &nbsp;&nbsp;DIVORCED</label>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Email"><span class="requireds">*</span> EMAIL:</label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <input type="email" id="Email" name="Email" maxlength="50" value="<?php
                        if (set_value('Email')) {
                            echo set_value('Email');
                        } else {
                            echo $Emp_info['Email'];
                        }
                        ?>" placeholder="Email" class="form-control col-md-7 col-xs-12">
                    </div>
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Secondary_Email">SECONDARY EMAIL:</label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <input type="email" id="Secondary_Email" name="Secondary_Email" value="<?php
                        if (set_value('Secondary_Email')) {
                            echo set_value('Secondary_Email');
                        } else {
                            echo $Emp_info['Secondary_Email'];
                        }
                        ?>" placeholder="Secondary Email" maxlength="50" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Email"><span class="requireds">*</span> MANAGER:</label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <select class="select2_single form-control" id="Assign_Manager" name="Assign_Manager" maxlength="2" required="required">
                            <option value="" selected>--Please Manager--</option>
                            <option value="1" <?php
                            if ($Emp_info['Assign_Manager'] == 1) {
                                echo "selected";
                            } else {
                                echo set_select('Assign_Manager', '1');
                            }
                            ?> >Admin</option>
                            <option value="2" <?php
                            if ($Emp_info['Assign_Manager'] == 2) {
                                echo "selected";
                            } else {
                                echo set_select('Assign_Manager', '2');
                            }
                            ?> >Vinit(VNT)</option>
                            <option value="3" <?php
                            if ($Emp_info['Assign_Manager'] == 3) {
                                echo "selected";
                            } else {
                                echo set_select('Assign_Manager', '3');
                            }
                            ?> >Sneha(SNH)</option>
                            <option value="4" <?php
                            if ($Emp_info['Assign_Manager'] == 4) {
                                echo "selected";
                            } else {
                                echo set_select('Assign_Manager', '4');
                            }
                            ?> >Divya(DVY)</option>
                            <option value="5" <?php
                            if ($Emp_info['Assign_Manager'] == 5) {
                                echo "selected";
                            } else {
                                echo set_select('Assign_Manager', '5');
                            }
                            ?> >aminsneha(ASN)</option>
                            <option value="6" <?php
                            if ($Emp_info['Assign_Manager'] == 6) {
                                echo "selected";
                            } else {
                                echo set_select('Assign_Manager', '6');
                            }
                            ?> >Swati(SWT)</option>
                            <option value="7" <?php
                            if ($Emp_info['Assign_Manager'] == 7) {
                                echo "selected";
                            } else {
                                echo set_select('Assign_Manager', '7');
                            }
                            ?> >Bhavesh Sir(BHV)</option>
                            <option value="8" <?php
                            if ($Emp_info['Assign_Manager'] == 8) {
                                echo "selected";
                            } else {
                                echo set_select('Assign_Manager', '8');
                            }
                            ?> >Pritesh Sir(PRT)</option>
                            <option value="9" <?php
                            if ($Emp_info['Assign_Manager'] == 9) {
                                echo "selected";
                            } else {
                                echo set_select('Assign_Manager', '9');
                            }
                            ?> >Dharmendu Sir</option>
                            <option value="10" <?php
                            if ($Emp_info['Assign_Manager'] == 10) {
                                echo "selected";
                            } else {
                                echo set_select('Assign_Manager', '10');
                            }
                            ?> >Dhirendra Sir</option>
                            <option value="11" <?php
                            if ($Emp_info['Assign_Manager'] == 11) {
                                echo "selected";
                            } else {
                                echo set_select('Assign_Manager', '11');
                            }
                            ?> >Hardik(HRD)</option>
                            <option value="12" <?php
                            if ($Emp_info['Assign_Manager'] == 12) {
                                echo "selected";
                            } else {
                                echo set_select('Assign_Manager', '12');
                            }
                            ?> >Poonam(PNM)</option>
                            <option value="13" <?php
                            if ($Emp_info['Assign_Manager'] == 13) {
                                echo "selected";
                            } else {
                                echo set_select('Assign_Manager', '13');
                            }
                            ?> >Shay</option>
                            <option value="14" <?php
                            if ($Emp_info['Assign_Manager'] == 14) {
                                echo "selected";
                            } else {
                                echo set_select('Assign_Manager', '14');
                            }
                            ?> >Kirtan</option>
                            <option value="15" <?php
                            if ($Emp_info['Assign_Manager'] == 15) {
                                echo "selected";
                            } else {
                                echo set_select('Assign_Manager', '15');
                            }
                            ?> >Dharmik(DMK)</option>
                            <option value="16" <?php
                            if ($Emp_info['Assign_Manager'] == 16) {
                                echo "selected";
                            } else {
                                echo set_select('Assign_Manager', '16');
                            }
                            ?> >Avani(AVN)</option>
                        </select>							
                    </div>

                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Emergancy_Contact_Name1"><span class="requireds">*</span> DEPARTMENT: </label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <?php //echo $row->Role_Assign; ?>
                        <?php
                        $value = $Emp_info['Role_Assign'];
                        $value1 = explode(',', $value);
                        ?>
                        <select class="form-control col-md-7 col-xs-12" id="Role_ID" name="Role_ID"  required="required">
                            <option value="" selected disabled>--Select Department--</option>
                            <?php
//$dept_count = 2;
                            foreach ($dept_list as $dept) {
                                ?>
                                <option value="<?php echo $dept['Dept_ID']; ?>" <?php
                                if ($Emp_info['Role_ID'] == $dept['Dept_ID']) {
                                    echo "selected";
                                } else {
                                    echo set_select('Role_ID', "" . $dept['Dept_ID'] . "");
                                }
                                ?> ><?php echo $dept['Dept_Name']; ?></option>

                                <?php
                                //echo "<option value='".$dept_count."' ".set_select('Role', $dept_count)." >".$dept['Dept_Name']."</option>";
                                //$dept_count++;
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="item form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Joining_Date"><span class="requireds">*</span> DATE EMPLOYMENT COMMENCED:</label>
                    <div class="col-md-3 col-sm-6 col-xs-12 has-feedback">
                        <input id="Joining_Date" name="Joining_Date" value="<?php
                        if (set_value('Joining_Date')) {
                            echo set_value('Joining_Date');
                        } else {
                            if (isset($Emp_info['Joining_Date'])) {
                                $dt2 = date_create($Emp_info['Joining_Date']);
                                $DOB = date_format($dt2, 'm/d/Y');
                                echo $DOB;
                            }
                        }
                        ?>" onChange="GetNextDate();" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" required="required" type="text" placeholder="eg.01/01/2017">
                        <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                    </div>
                    


                </div>

                <div class="item form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Phone_Number"><span class="requireds">*</span> PHONE NUMBER:
                    </label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <input type="text" id="Phone_Number" name="Phone_Number"  value="<?php
                        if (set_value('Phone_Number')) {
                            echo set_value('Phone_Number');
                        } else {
                            echo $Emp_info['Phone_Number'];
                        }
                        ?>" maxlength="10" placeholder="Phone Number(S)" class="form-control col-md-7 col-xs-12">
                    </div>
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Mobile1">MOBILE 1:</label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <input type="text" id="Mobile1" name="Mobile1" maxlength="13" value="<?php
                        if (set_value('Mobile1')) {
                            echo set_value('Mobile1');
                        } else {
                            echo $Emp_info['Mobile1'];
                        }
                        ?>" placeholder="Mobile1" class="form-control col-md-7 col-xs-12">
                    </div>
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Mobile2">MOBILE 2:</label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <input type="text" id="Mobile2" name="Mobile2" maxlength="13" value="<?php
                        if (set_value('Mobile2')) {
                            echo set_value('Mobile2');
                        } else {
                            echo $Emp_info['Mobile2'];
                        }
                        ?>"  placeholder="Mobile2"class="form-control col-md-7 col-xs-12">
                    </div>						
                </div>

                <div class="item form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Permanent_Address"><span class="requireds">*</span> PERMANENT ADDRESS:</label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <textarea id="Permanent_Address" name="Permanent_Address" placeholder="Permanent Address" maxlength="300" required="required" class="form-control col-md-7 col-xs-12"><?php
                            if (set_value('Permanent_Address')) {
                                echo set_value('Permanent_Address');
                            } else {
                                echo $Emp_info['Permanent_Address'];
                            }
                            ?></textarea>
                    </div>
                    <!-- <label class="control-label col-md-1 col-sm-3 col-xs-12" for="City"><span class="requireds">*</span> CITY:</label> -->
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <input type="text" id="City1" maxlength="6" value="<?php
                            if (set_value('City1')) {
                                echo set_value('City1');
                            } else {
                                echo $Emp_info['City1'];
                            }
                            ?>" placeholder="CITY" name="City1"  maxlength="6" class="form-control col-md-7 col-xs-12">
                    </div>
                    <!-- <label class="control-label col-md-2 col-sm-3 col-xs-12" for="State"><span class="requireds">*</span> STATE:</label> -->
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <input type="text" id="State1" maxlength="6" value="<?php
                            if (set_value('State1')) {
                                echo set_value('State1');
                            } else {
                                echo $Emp_info['State1'];
                            }
                            ?>" placeholder="STATE" name="State1" maxlength="6" class="form-control col-md-7 col-xs-12">
                    </div>
                    <!-- <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Address"> ZIPCODE 1:</label> -->
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <input type="text" id="Zipcode1" maxlength="6" value="<?php
                        if (set_value('Zipcode1')) {
                            echo set_value('Zipcode1');
                        } else {
                            echo $Emp_info['Zipcode1'];
                        }
                        ?>" placeholder="Zipcode1" name="Zipcode1" maxlength="6" class="form-control col-md-7 col-xs-12">
                    </div>

                </div>

                <div class="item form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Address"><span class="requireds">*</span> TEMPERORY ADDRESS:
                    </label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <textarea id="Address" name="Address" required="required" placeholder="Address" maxlength="300" class="form-control col-md-7 col-xs-12"><?php
                            if (set_value('Address')) {
                                echo set_value('Address');
                            } else {
                                echo $Emp_info['Address'];
                            }
                            ?></textarea>
                    </div>
                    <!-- <label class="control-label col-md-1 col-sm-3 col-xs-12" for="City"><span class="requireds">*</span> CITY:</label> -->
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <input type="text" id="City2" maxlength="6" value="<?php
                            if (set_value('City2')) {
                                echo set_value('City2');
                            } else {
                                echo $Emp_info['City2'];
                            }
                            ?>" placeholder="CITY" name="City2"  maxlength="6" class="form-control col-md-7 col-xs-12">
                    </div>
                    <!-- <label class="control-label col-md-2 col-sm-3 col-xs-12" for="State"><span class="requireds">*</span> STATE:</label> -->
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <input type="text" id="State2" maxlength="6" value="<?php
                            if (set_value('State2')) {
                                echo set_value('State2');
                            } else {
                                echo $Emp_info['State2'];
                            }
                            ?>" placeholder="STATE" name="State2" maxlength="6" class="form-control col-md-7 col-xs-12">
                    </div>
                    <!-- <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Zipcode2"><span class="requireds">*</span> ZIPCODE2:
                    </label> -->
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <input type="text" id="Zipcode2" maxlength="6" value="<?php
                        if (set_value('Zipcode2')) {
                            echo set_value('Zipcode2');
                        } else {
                            echo $Emp_info['Zipcode2'];
                        }
                        ?>" placeholder="Zipcode2" name="Zipcode2" maxlength="6" class="form-control col-md-7 col-xs-12">
                    </div>					
                </div>

                <div class="item form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">PAST CRIMINAL RECORD:</label>
                    <div class="col-md-1 col-sm-6 col-xs-12">
                        <div  class="btn-group" data-toggle="buttons">   
                            <?php if ($Emp_info['Past_Criminal_Record'] == 0) { ?>						  
                                <input id="Past_Criminal_Record" data-toggle="toggle" data-on="Yes" data-off="No" value="<?php
                                if (set_value('Past_Criminal_Record')) {
                                    echo set_value('Past_Criminal_Record');
                                } else {
                                    echo $Emp_info['Past_Criminal_Record'];
                                }
                                ?>" name="Past_Criminal_Record" data-onstyle="primary" data-offstyle="default" type="checkbox">
                                   <?php } else { ?>
                                <input checked id="Past_Criminal_Record" data-toggle="toggle" data-on="Yes" data-off="No" value="<?php
                                if (set_value('Past_Criminal_Record')) {
                                    echo set_value('Past_Criminal_Record');
                                } else {
                                    echo $Emp_info['Past_Criminal_Record'];
                                }
                                ?>" name="Past_Criminal_Record" data-onstyle="primary" data-offstyle="default" type="checkbox">
                                   <?php } ?>
                        </div>
                    </div>
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">MONTHS BOND:</label>
                    <div class="col-md-3 col-sm-6 col-xs-12 has-feedback">
                        <select class="select2_single form-control" id="Months_Bond" name="Months_Bond" onChange="GetNextDate();">
                            <option value="" selected >--Select Role--</option>
                            <option value="1" <?php echo set_select('Months_Bond', '1'); ?> <?php echo ($Emp_info['Months_Bond'] == 1) ? "selected" : ""; ?> >12 Months</option>
                            <option value="2" <?php echo set_select('Months_Bond', '2'); ?> <?php echo ($Emp_info['Months_Bond'] == 2) ? "selected" : ""; ?>>18 Months</option>
                            <option value="3" <?php echo set_select('Months_Bond', '3'); ?> <?php echo ($Emp_info['Months_Bond'] == 3) ? "selected" : ""; ?>>24 Months</option>
                        </select>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12 has-feedback">
                        <input id="Bond_To_Date" name="Bond_To_Date" class="form-control col-md-7 col-xs-12 has-feedback-right" value="<?php
                        if (set_value('Bond_To_Date')) {
                            echo set_value('Bond_To_Date');
                        } elseif ($Emp_info['Bond_To_Date'] != "0000-00-00") {
                            $dt2 = date_create($Emp_info['Bond_To_Date']);
                            $btd = date_format($dt2, 'm/d/Y');
                            echo $btd;
                        } else {
                            echo "";
                        }
                        ?>" type="text" placeholder="eg.01/01/2017" readonly>
                        <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                    </div>
                </div>

                <?php if ($Emp_info['Past_Criminal_Record'] == 1) { ?>

                    <div class="item form-group"  id="Past_Criminal_Detail_box">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for=""><span class="requireds">*</span> PAST CRIMINAL RECORD DETAIL:
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12">
                            <textarea id="Past_Criminal_Detail" name="Past_Criminal_Detail" maxlength="400" placeholder="Past Criminal Detail" class="form-control col-md-7 col-xs-12" required="required"><?php
                                if (set_value('Past_Criminal_Detail')) {
                                    echo set_value('Past_Criminal_Detail');
                                } else {
                                    echo $Emp_info['Past_Criminal_Detail'];
                                }
                                ?></textarea>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="item form-group"  style="display:none;"id="Past_Criminal_Detail_box">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for=""><span class="requireds">*</span> PAST CRIMINAL RECORD DETAIL:
                        </label>
                        <div class="col-md-10 col-sm-6 col-xs-12">
                            <textarea id="Past_Criminal_Detail" name="Past_Criminal_Detail" maxlength="400" placeholder="Past Criminal Detail" class="form-control col-md-7 col-xs-12" required="required"><?php
                                if (set_value('Past_Criminal_Detail')) {
                                    echo set_value('Past_Criminal_Detail');
                                } else {
                                    echo $Emp_info['Past_Criminal_Detail'];
                                }
                                ?></textarea>
                        </div>
                    </div>
                <?php } ?>


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
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">ORDINARY HOURS OF WORK:
                    </label>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="input-group bootstrap-timepicker timepicker">
                            <input id="Odinary_Work_Hours_From" name="Odinary_Work_Hours_From" value="<?php
                            if (set_value('Odinary_Work_Hours_From')) {
                                echo set_value('Odinary_Work_Hours_From');
                            } else {
                                echo $Emp_info['Odinary_Work_Hours_From'];
                            }
                            ?>" type="text" class="form-control input-small">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-1 col-xs-12" style="text-align:center">
                        <label class="control-label">TO</label>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="input-group bootstrap-timepicker timepicker">
                            <input id="Odinary_Work_Hours_To" name="Odinary_Work_Hours_To" value="<?php
                            if (set_value('Odinary_Work_Hours_To')) {
                                echo set_value('Odinary_Work_Hours_To');
                            } else {
                                echo $Emp_info['Odinary_Work_Hours_To'];
                            }
                            ?>" type="text" class="form-control input-small">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                        </div>
                    </div>
                </div>


                <div class="item form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Blood_Group"><span class="requireds">*</span>BLOOD GROUP:</label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <input id="Blood_Group" name="Blood_Group" maxlength="3" placeholder="eg. O+" value="<?php
                        if (set_value('Blood_Group')) {
                            echo set_value('Blood_Group');
                        } else {
                            echo $Emp_info['Blood_Group'];
                        }
                        ?>" class="form-control col-md-7 col-xs-12" placeholder="" type="text">
                    </div>


                </div>


                
                <style>
                    table {
                        font-family: arial, sans-serif;
                        border-collapse: collapse;
                        width: 100%;
                    }

                    td, th {
                        border: 1px solid #dddddd;
                        text-align: left;
                        padding: 8px;
                    }

                </style>
                <span class="section" style="margin-top:30px;">EMERGANCY</span>
                <table>
                    <tr>
                        <th width="10px;" style="text-align:right;"></th>
                        <th width="30px;">FULL NAME</th>
                        <th width="30px;">RELATION</th>
                        <th width="30px;">PHONE NUMBER</th>
                    </tr>
                    <tr>
                        <td width="10px;" align="right" style="text-align:right;"><b>1:</b></td>
                        <td width="30px;"><input type="text" id="Emergancy_Contact_Name1" maxlength="13" value="<?php
                        if (set_value('Emergancy_Contact_Name1')) {
                            echo set_value('Emergancy_Contact_Name1');
                        } else {
                            echo $Emp_info['Emergancy_Contact_Name1'];
                        }
                        ?>" placeholder="Emergancy Contact Name1" name="Emergancy_Contact_Name1" maxlength="10" class="form-control col-md-7 col-xs-12"></td>
                        <td width="30px;"><input type="text" id="Emergancy_Contact_Relation1" maxlength="13" value="<?php
                        if (set_value('Emergancy_Contact_Relation1')) {
                            echo set_value('Emergancy_Contact_Relation1');
                        } else {
                            echo $Emp_info['Emergancy_Contact_Relation1'];
                        }
                        ?>" placeholder="Emergancy Contact Relation 1" name="Emergancy_Contact_Relation1" maxlength="10" class="form-control col-md-7 col-xs-12"></td>
                        <td width="30px;"><input type="text" id="Emergancy_Contact_Number1" maxlength="13" value="<?php
                        if (set_value('Emergancy_Contact_Number1')) {
                            echo set_value('Emergancy_Contact_Number1');
                        } else {
                            echo $Emp_info['Emergancy_Contact_Number1'];
                        }
                        ?>" placeholder="Emergancy Contact Number 1" name="Emergancy_Contact_Number1" maxlength="10" class="form-control col-md-7 col-xs-12"></td>
                    </tr>
                    <tr>
                        <td style="text-align:right;"><b>2:</b></td>
                        <td><input type="text" id="Emergancy_Contact_Name2" maxlength="13" value="<?php
                        if (set_value('Emergancy_Contact_Name2')) {
                            echo set_value('Emergancy_Contact_Name2');
                        } else {
                            echo $Emp_info['Emergancy_Contact_Name2'];
                        }
                        ?>" placeholder="Emergancy Contact Name2" name="Emergancy_Contact_Name2" maxlength="10" class="form-control col-md-7 col-xs-12"></td>
                        <td><input type="text" id="Emergancy_Contact_Relation2" maxlength="13" value="<?php
                        if (set_value('Emergancy_Contact_Relation2')) {
                            echo set_value('Emergancy_Contact_Relation2');
                        } else {
                            echo $Emp_info['Emergancy_Contact_Relation2'];
                        }
                        ?>" placeholder="Emergancy Contact Relation 2" name="Emergancy_Contact_Relation2" maxlength="10" class="form-control col-md-7 col-xs-12"></td>
                        <td><input type="text" id="Emergancy_Contact_Number2" maxlength="13" value="<?php
                        if (set_value('Emergancy_Contact_Number2')) {
                            echo set_value('Emergancy_Contact_Number2');
                        } else {
                            echo $Emp_info['Emergancy_Contact_Number2'];
                        }
                        ?>" placeholder="Emergancy Contact Number 2" name="Emergancy_Contact_Number2" maxlength="10" class="form-control col-md-7 col-xs-12"></td>
                    </tr>
                </table>
                
                <span class="section" style="margin-top:30px;">REFERANCES</span>
                <table>
                    <tr>
                        <th width="10px;" style="text-align:right;"></th>
                        <th width="30px;">FULL NAME</th>
                        <th width="30px;">RELATION</th>
                        <th width="30px;">PHONE NUMBER</th>
                    </tr>
                    <tr>
                        <td width="10px;" align="right" style="text-align:right;"><b>1:</b></td>
                        <td width="30px;"><input type="text" id="Referance_Name_1" maxlength="50" value="<?php
                        if (set_value('Referance_Name_1')) {
                            echo set_value('Referance_Name_1');
                        } else {
                            echo $Emp_info['Referance_Name_1'];
                        }
                        ?>" placeholder="Referance Name 1" name="Referance_Name_1"  class="form-control col-md-7 col-xs-12"></td>
                        <td width="30px;"><input type="text" id="Referance_Relation_1" maxlength="50" value="<?php
                        if (set_value('Referance_Relation_1')) {
                            echo set_value('Referance_Relation_1');
                        } else {
                            echo $Emp_info['Referance_Relation_1'];
                        }
                        ?>" placeholder="Referance Relation 1" name="Referance_Relation_1" class="form-control col-md-7 col-xs-12"></td>
                        <td width="30px;"><input type="text" id="Referance_Number_2" maxlength="13" value="<?php
                        if (set_value('Referance_Number_2')) {
                            echo set_value('Referance_Number_2');
                        } else {
                            echo $Emp_info['Referance_Number_2'];
                        }
                        ?>" placeholder="Referance Number 2" name="Referance_Number_2" class="form-control col-md-7 col-xs-12"></td>
                    </tr>
                    <tr>
                        <td style="text-align:right;"><b>2:</b></td>
                        <td><input type="text" id="Referance_Name_2" maxlength="50" value="<?php
                        if (set_value('Referance_Name_2')) {
                            echo set_value('Referance_Name_2');
                        } else {
                            echo $Emp_info['Referance_Name_2'];
                        }
                        ?>" placeholder="Referance Name 2" name="Referance_Name_2"  class="form-control col-md-7 col-xs-12"></td>
                        <td><input type="text" id="Referance_Relation_2" maxlength="50" value="<?php
                        if (set_value('Referance_Relation_2')) {
                            echo set_value('Referance_Relation_2');
                        } else {
                            echo $Emp_info['Referance_Relation_2'];
                        }
                        ?>" placeholder="Referance Relation 2" name="Referance_Relation_2"  class="form-control col-md-7 col-xs-12"></td>
                        <td><input type="text" id="Referance_Number_2" maxlength="13" value="<?php
                        if (set_value('Referance_Number_2')) {
                            echo set_value('Referance_Number_2');
                        } else {
                            echo $Emp_info['Referance_Number_2'];
                        }
                        ?>" placeholder="Referance Number 2" name="Referance_Number_2" class="form-control col-md-7 col-xs-12"></td>
                    </tr>
                    <tr>
                        <td style="text-align:right;"><b>3:</b></td>
                        <td><input type="text" id="Referance_Name_3" maxlength="50" value="<?php
                        if (set_value('Referance_Name_3')) {
                            echo set_value('Referance_Name_3');
                        } else {
                            echo $Emp_info['Referance_Name_3'];
                        }
                        ?>" placeholder="Referance Name 3" name="Referance_Name_3"  class="form-control col-md-7 col-xs-12"></td>
                        <td><input type="text" id="Referance_Relation_3" maxlength="50" value="<?php
                        if (set_value('Referance_Relation_3')) {
                            echo set_value('Referance_Relation_3');
                        } else {
                            echo $Emp_info['Referance_Relation_3'];
                        }
                        ?>" placeholder="Referance Relation 3" name="Referance_Relation_3"  class="form-control col-md-7 col-xs-12"></td>
                        <td><input type="text" id="Referance_Number_3" maxlength="13" value="<?php
                        if (set_value('Referance_Number_3')) {
                            echo set_value('Referance_Number_3');
                        } else {
                            echo $Emp_info['Referance_Number_3'];
                        }
                        ?>" placeholder="Referance Number 3" name="Referance_Number_3"  class="form-control col-md-7 col-xs-12"></td>
                    </tr>

                </table>

                <!----- ESIC detail 02-07-2017  ------------------------------------->
                <?php // /*  ?>
                <span class="section" style="margin-top:30px;">OFFICIAL DETAIL</span> 
                <div class="item form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">IF ALRREADY REGISTER IN ESIC:</label>                      
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <label class="control-label">
                            <input type="radio"  class="flat insurance" name="Esic_Status" <?php echo ($Emp_info['Esic_Status'] == 1) ? "checked" : ""; ?> value="1" <?php echo set_radio('Esic_Status', '1'); ?> id="Esic_status_1"  /> &nbsp;&nbsp;YES
                        </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label class="control-label">
                            <input type="radio" class="flat insurance" name="Esic_Status" <?php echo ($Emp_info['Esic_Status'] == 0) ? "checked" : ""; ?> value="0" <?php echo set_radio('Esic_Status', '0'); ?> id="Esic_status_2" /> &nbsp;&nbsp;NO
                        </label>
                    </div>

                    <div class="Insurance_No" style='display: none;'>
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Insurance_No">IF YES INSURANCE NO: XX<?= $Emp_info['Insurance_No'] ?>ZZ</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input type="text" id="Insurance_No" name="Insurance_No" value="<?php
                            if (set_value('Insurance_No')) {
                                echo set_value('Insurance_No');
                            } else {
                                echo $Emp_info['Insurance_No'];
                            }
                            ?>" placeholder="INSURANCE NO" maxlength="50" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                </div>


                <div class="item form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Previous_PF_Code">PF CODE NO/UAN NO:</label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <input type="text" id="Previous_PF_Code" name="Previous_PF_Code" maxlength="20" value="<?php
                        if (set_value('Previous_PF_Code')) {
                            echo set_value('Previous_PF_Code');
                        } else {
                            echo $Emp_info['Previous_PF_Code'];
                        }
                        ?>" placeholder="PREVIOUS PF CODE NO/UAN NO" class="form-control col-md-7 col-xs-12">
                    </div>

                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Name_Aadhar"><span class="requireds">*</span> FULL NAME:<br>(AS PER AADHAR CARD)</label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <input type="text" id="" name="Name_Aadhar" maxlength="50" value="<?php
                        if (set_value('Name_Aadhar')) {
                            echo set_value('Name_Aadhar');
                        } else {
                            echo $Emp_info['Name_Aadhar'];
                        }
                        ?>" placeholder="NAME (AS PER AADHAR CARD)" class="form-control col-md-7 col-xs-12" required="required">
                    </div>

                </div>

                <div class="item form-group">

                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Aadhar_Number"><span class="requireds">*</span>AADHAR CARD NUMBER:</label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <input type="text" id="Aadhar_Number" name="Aadhar_Number" value="<?php
                        if (set_value('Aadhar_Number')) {
                            echo set_value('Aadhar_Number');
                        } else {
                            echo $Emp_info['Aadhar_Number'];
                        }
                        // onkeyup="return addhyphen();"
                        ?>" placeholder="AADHAR CARD NUMBER" maxlength="12" class="form-control col-md-7 col-xs-12">
                    </div>
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Pan_Number"><span class="requireds">*</span>PAN NUMBER:</label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <input type="text" id="Pan_Number" name="Pan_Number" maxlength="10" placeholder="Pan Number" value="<?php
                        if (set_value('Pan_Number')) {
                            echo set_value('Pan_Number');
                        } else {
                            echo $Emp_info['Pan_Number'];
                        }
                        ?>" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="item form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Date_Exit_Pre_Comp">DATE OF EXIT:<br>(PREVIOUS COMPANY)</label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <input type="text" id="Date_Exit_Pre_Comp" name="Date_Exit_Pre_Comp" value="<?php
                        if (set_value('Date_Exit_Pre_Comp')) {
                            echo set_value('Date_Exit_Pre_Comp');
                        } else {
                            echo ($Emp_info['Date_Exit_Pre_Comp'] == '0000-00-00') ? "" : date('m/d/Y', strtotime($Emp_info['Date_Exit_Pre_Comp']));
                        }
                        ?>" placeholder="DATE OF EXIT(PREVIOUS COMPANY)" maxlength="16" class="form-control col-md-7 col-xs-12 date-picker">
                    </div>	
                    


                </div>
                <!-- <div class="item form-group ">

                    <label class="control-label col-md-2 col-sm-3 col-xs-12">MENTIONED MARRIAGE STATUS:</label>
                    <div class="col-md-4 col-sm-6 col-xs-12 float-left">
                        <input type="text" id="Marital_Status_Other" name="Marital_Status_Other" value="<?php
                        /*if (set_value('Marital_Status_Other')) {
                            echo set_value('Marital_Status_Other');
                        } else {
                            echo $Emp_info['Marital_Status_Other'];
                        }*/
                        ?>" placeholder="MENTIONED MARRIAGE STATUS" maxlength="50" class="form-control col-md-7 col-xs-12">
                    </div>
                </div> -->

                <?php //*/  ?>
                <!----- family detail 02-07-2017  ------------------------------------->
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
                            if (count($Emp_Family_Info) > 0) {
                                $totalArr = count($Emp_Family_Info);
                                $cntr = 0;
                                foreach ($Emp_Family_Info as $fkey => $Emp_Family) {
                                    //echo '<pre>';print_r($Emp_Family_Info);exit;
                                    ?>
                                    <tr class="entry_family">
                                        <td>
                                            <select class="select2_single form-control valid" id="Relation" name="Relation[]" aria-invalid="false">
                                                <option value="">--Select Relation--</option>
                                                <option value="Father" <?php
                                                if ($Emp_Family['Relation'] == 'Father') {
                                                    echo "selected";
                                                }
                                                ?> >FATHER</option>
                                                <option value="Mother" <?php
                                                if ($Emp_Family['Relation'] == 'Mother') {
                                                    echo "selected";
                                                }
                                                ?>>MOTHER</option>
                                                <option value="Husband"<?php
                                                if ($Emp_Family['Relation'] == 'Husband') {
                                                    echo "selected";
                                                }
                                                ?>>HUSBAND</option>
                                                <option value="Wife"<?php
                                                if ($Emp_Family['Relation'] == 'Wife') {
                                                    echo "selected";
                                                }
                                                ?>>WIFE</option>
                                                <option value="Son"<?php
                                                if ($Emp_Family['Relation'] == 'Son') {
                                                    echo "selected";
                                                }
                                                ?>>SON</option>
                                                <option value="Daughter"<?php
                                                if ($Emp_Family['Relation'] == 'Daughter') {
                                                    echo "selected";
                                                }
                                                ?>>DAUGHTER</option>
                                            </select>
                                        </td>
                                        <td><input class="form-control col-md-7 col-xs-12" id="Relative_Name" name="Relative_Name[]" maxlength="50" value="<?php
                                            if (set_value('Relative_Name')) {
                                                echo set_value('Relative_Name');
                                            } else {
                                                echo $Emp_Family['Relative_Name'];
                                            }
                                            ?>" placeholder="NAME AS PER AADHAR CARD"  type="text">
                                        </td>
                                        <!-- <td>
                                            <input type="text" maxlength="50" value="<?php //date('m/d/Y', strtotime($Emp_Family['Relative_DOB']));   ?>" placeholder="eg.01/01/2017" name="Relative_DOB[]"  class="form-control col-md-7 col-xs-12 date-picker">
                                        </td>
                                        <td><input class="form-control col-md-7 col-xs-10 aadhar" id="Relative_Aadhar_No" name="Relative_Aadhar_No[]" maxlength="16" value="<?php
//                                            if (set_value('Relative_Aadhar_No')) {
//                                                echo set_value('Relative_Aadhar_No');
//                                            } else {
//                                                echo $Emp_Family['Relative_Aadhar_No'];
//                                            }
                                        ?>" placeholder="AADHAR CARD NO"  type="text"> <?php
//                                                   if (++$cntr === $totalArr) {
//                                                       echo '<a href="javascript:void(0);"><i style="font-size:25px;color: #26b99a;" class="fa fa-plus add-btn" ></i></a>';
//                                                   } else {
//                                                       echo '<a href="javascript:void(0);"><i style="font-size:25px;color:#da1818 ;" class="fa fa-remove remove-btn" data-toggle="tooltip" data-placement="top" title="Remove"></i></a>';
//                                                   }
                                        ?>
                                        </td> -->
                                    </tr>
                                    <?php
                                } // end loop
                            } else {
                                ?>
                                <tr class="entry_family">
                                    <td>
                                        <select class="select2_single form-control valid" id="Relation" name="Relation[]" aria-invalid="false">
                                            <option value="">--Select Relation--</option>
                                            <option value="Father">FATHER</option>
                                            <option value="Mother">MOTHER</option>
                                            <option value="Husband">HUSBAND</option>
                                            <option value="Wife">WIFE</option>
                                            <option value="Son">SON</option>
                                            <option value="Daughter">DAUGHTER</option>
                                        </select>
                                    </td>
                                    <td><input class="form-control col-md-7 col-xs-12" id="Relative_Name" name="Relative_Name[]" maxlength="50" value="<?php
                                        if (set_value('Relative_Name[]')) {
                                            echo set_value('Relative_Name[]');
                                        } else {
                                            echo $Emp_info['Relative_Name'];
                                        }
                                        ?>" placeholder="NAME AS PER AADHAR CARD"  type="text"></td>
                                    <!-- <td>
                                        <input type="text" maxlength="50" value="" placeholder="eg.01/01/2017" name="Relative_DOB[]"  class="form-control col-md-7 col-xs-12 date-picker">
                                    </td>
                                    <td><input class="form-control col-md-7 col-xs-10 aadhar" id="Relative_Aadhar_No" name="Relative_Aadhar_No[]" maxlength="16" value="<?php
//                                        if (set_value('Relative_Aadhar_No')) {
//                                            echo set_value('Relative_Aadhar_No');
//                                        } else {
//                                            echo $Emp_info['Father_Aadhar_No'];
//                                        }
                                    ?>" placeholder="AADHAR CARD NO"  type="text"> <?php //echo '<a href="javascript:void(0);"><i style="font-size:25px;color: #26b99a;" class="fa fa-plus add-btn" ></i></a>'; ?></td> -->
                                </tr><?php }
                                ?>
                        </tbody>
                    </table>
                </div>
                <?php /*
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
                  <td><input class="form-control col-md-7 col-xs-12" id="Father_Name" name="Father_Name" maxlength="50" value="<?php if(set_value('Father_Name')){echo set_value('Father_Name');}else{ echo  $Emp_info['Father_Name'];} ?>" placeholder="NAME AS PER AADHAR CARD"  type="text"></td>
                  <td><input type="text" maxlength="50" value="" placeholder="eg.01/01/2017" name="Father_DOB"  class="form-control col-md-7 col-xs-12 date-picker"></td>
                  <td><input class="form-control col-md-7 col-xs-12 aadhar" id="Father_Aadhar_No" name="Father_Aadhar_No" maxlength="16" value="<?php if(set_value('Father_Aadhar_No')){echo set_value('Father_Aadhar_No');}else{ echo  $Emp_info['Father_Aadhar_No'];} ?>" placeholder="AADHAR CARD NO"  type="text"></td>
                  </tr>
                  <tr>
                  <th scope="row">MOTHER</th>
                  <td><input class="form-control col-md-7 col-xs-12" id="Mother_Name" name="Mother_Name" maxlength="100" value="<?php if(set_value('Mother_Name')){echo set_value('Mother_Name');}else{ echo  $Emp_info['Mother_Name'];} ?>" placeholder="NAME AS PER AADHAR CARD"  type="text"></td>
                  <td><input type="text" maxlength="50" value="" placeholder="eg.01/01/2017" name="Mother_DOB"  class="form-control col-md-7 col-xs-12 date-picker"></td>
                  <td><input class="form-control col-md-7 col-xs-12 aadhar" id="Mother_Aadhar_No" name="Mother_Aadhar_No" maxlength="16" value="<?php if(set_value('Mother_Aadhar_No')){echo set_value('Mother_Aadhar_No');}else{ echo  $Emp_info['Mother_Aadhar_No'];} ?>" placeholder="AADHAR CARD NO"  type="text"></td>
                  </tr>

                  <tr>
                  <th scope="row">HUSBAND</th>
                  <td><input class="form-control col-md-7 col-xs-12" id="Husband_Name" name="Husband_Name" maxlength="100" value="<?php if(set_value('Husband_Name')){echo set_value('Husband_Name');}else{ echo  $Emp_info['Husband_Name'];} ?>" placeholder="NAME AS PER AADHAR CARD"  type="text"></td>
                  <td><input type="text" maxlength="50" value="" placeholder="eg.01/01/2017" name="Husband_DOB"  class="form-control col-md-7 col-xs-12 date-picker"></td>
                  <td><input class="form-control col-md-7 col-xs-12 aadhar" id="Husband_Aadhar_No" name="Husband_Aadhar_No" maxlength="16" value="<?php if(set_value('Husband_Aadhar_No')){echo set_value('Husband_Aadhar_No');}else{ echo  $Emp_info['Husband_Aadhar_No'];} ?>" placeholder="AADHAR CARD NO"  type="text"></td>
                  </tr>

                  <tr>
                  <th scope="row">WIFE</th>
                  <td><input class="form-control col-md-7 col-xs-12" id="Wife_Name" name="Wife_Name" maxlength="100" value="<?php if(set_value('Wife_Name')){echo set_value('Wife_Name');}else{ echo  $Emp_info['Wife_Name'];} ?>" placeholder="NAME AS PER AADHAR CARD"  type="text"></td>
                  <td><input type="text" maxlength="50" value="" placeholder="eg.01/01/2017" name="Wife_DOB"  class="form-control col-md-7 col-xs-12 date-picker"></td>
                  <td><input class="form-control col-md-7 col-xs-12 aadhar" id="Wife_Aadhar_No" name="Wife_Aadhar_No" maxlength="16" value="<?php if(set_value('Wife_Aadhar_No')){echo set_value('Wife_Aadhar_No');}else{ echo  $Emp_info['Wife_Aadhar_No'];} ?>" placeholder="AADHAR CARD NO"  type="text"></td>
                  </tr>

                  <tr>
                  <th scope="row">SON</th>
                  <td><input class="form-control col-md-7 col-xs-12" id="Son_Name" name="Son_Name" maxlength="100" value="<?php if(set_value('Son_Name')){echo set_value('Son_Name');}else{ echo  $Emp_info['Son_Name'];} ?>" placeholder="NAME AS PER AADHAR CARD"  type="text"></td>
                  <td><input type="text" maxlength="50" value="" placeholder="eg.01/01/2017" name="Son_DOB"  class="form-control col-md-7 col-xs-12 date-picker"></td>
                  <td><input class="form-control col-md-7 col-xs-12 aadhar" id="Son_Aadhar_No" name="Son_Aadhar_No" maxlength="16" value="<?php if(set_value('Son_Aadhar_No')){echo set_value('Son_Aadhar_No');}else{ echo  $Emp_info['Son_Aadhar_No'];} ?>" placeholder="AADHAR CARD NO"  type="text"></td>
                  </tr>
                  <tr>
                  <th scope="row">DAUGHTER</th>
                  <td><input class="form-control col-md-7 col-xs-12" id="Daughter_Name" name="Daughter_Name" maxlength="100" value="<?php if(set_value('Daughter_Name')){echo set_value('Daughter_Name');}else{ echo  $Emp_info['Daughter_Name'];} ?>" placeholder="NAME AS PER AADHAR CARD"  type="text"></td>
                  <td><input type="text" maxlength="50" value="" placeholder="eg.01/01/2017" name="Daughter_DOB"  class="form-control col-md-7 col-xs-12 date-picker"></td>
                  <td><input class="form-control col-md-7 col-xs-12 aadhar" id="Daughter_Aadhar_No" name="Daughter_Aadhar_No" maxlength="16" value="<?php if(set_value('Daughter_Aadhar_No')){echo set_value('Daughter_Aadhar_No');}else{ echo  $Emp_info['Daughter_Aadhar_No'];} ?>" placeholder="AADHAR CARD NO"  type="text"></td>
                  </tr>


                  </tbody>
                  </table>
                  </div>
                 */ ?>

                <!----- family detail 02-07-2017  ------------------------------------------------------>

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <a href="<?php echo base_url() ?>index.php/Employee/add_emp_list"><button type="button" class="btn btn-danger">Cancel</button></a>
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