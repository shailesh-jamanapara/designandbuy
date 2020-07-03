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
<head>
    <style type="text/css">
        /* Some custom styles to beautify this example */
        .demo-content{
            padding: 0px 15px 15px 15px;
            font-size: 12px;
            min-height: 275px;
            border: solid 1px #ccc;
            margin-bottom: 0px;
        }
        .demo-content.bg-alt{
            background: #abb1b8;
        }
    </style>
</head>

<div class="col-md-12 col-md-12 col-xs-12">

    <div class="x_panel">

        <div class="x_content">
            <div class="pull-right">
                <a href="<?php echo base_url() ?>index.php/Employee/emp_edit/<?= $Emp_info['Emp_ID']; ?>"><button id="send" type="submit" class="btn btn-success">Edit Employee Record</button></a>
                <a href="<?php echo base_url() ?>index.php/Employee/add_emp_list"><button type="button" class="btn btn-danger">Cancel</button></a>
            </div>
            <span class="section">Personal Information</span>
            
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>
                            <?php
                            if (isset($Emp_info['Prefix']) && $Emp_info['Prefix'] == '1') {
                                $emp_prefix = 'Mr.';
                            } else if (isset($Emp_info['Prefix']) && $Emp_info['Prefix'] == '2') {
                                $emp_prefix = 'Mrs.';
                            } else if (isset($Emp_info['Prefix']) && $Emp_info['Prefix'] == '3') {
                                $emp_prefix = 'Dr.';
                            } else if (isset($Emp_info['Prefix']) && $Emp_info['Prefix'] == '4') {
                                $emp_prefix = 'Prof.';
                            } else if (isset($Emp_info['Prefix']) && $Emp_info['Prefix'] == '5') {
                                $emp_prefix = 'Miss.';
                            }

                            
                            if ($Emp_info['Employeement_Status'] == 1) {
                                $Employeement_Status = "FULLTIME";
                            } else if ($Emp_info['Employeement_Status'] == 2) {
                                $Employeement_Status = "PARTTIME";
                            } else if ($Emp_info['Employeement_Status'] == 3) {
                                $Employeement_Status = "TEMPORARY";
                            }
                            
                            if ($Emp_info['Emp_Active_Status'] == 1) {
                                $emp_status = '<b style="color:green;">Active</b>';
                            } else {
                               $emp_status = '<b style="color:red;">Inactive</b>';
                            }
                            
                            echo $emp_prefix . " " . ucfirst($Emp_info['First_Name']) . " " . ucfirst($Emp_info['Middle_Name']) . " " . ucfirst($Emp_info['Last_Name']).' '.'('.$Emp_info['Short_Name'].')-'.$Position_Name.'-'.$Employeement_Status.'-'.$emp_status;
                            ?></h2>
                    </div>
                    <div class="col-md-4">                  
                        <div class="demo-content">
                            

                            <?php echo "<br/><label>PHONE NUMBER(S):&nbsp;</label> "; ?>
                            <?php
                            if (set_value('Phone_Number')) {
                                echo set_value('Phone_Number');
                            } else {
                                echo $Emp_info['Phone_Number'];
                            }
                            ?>
                            <?php echo "<br/><label>EMAIL:&nbsp;</label> "; ?>
                            <?php
                            if (set_value('Email')) {
                                echo set_value('Email');
                            } else {
                                echo $Emp_info['Email'];
                            }
                            ?>
                            <?php echo "<br/><label>EMERGANCY CONTACT NAME 1:&nbsp;</label> "; ?>
                            <?php
                            if (set_value('Phone_Number')) {
                                echo set_value('Phone_Number');
                            } else {
                                echo $Emp_info['Phone_Number'];
                            }
                            ?>

                            <?php echo "<br/><label>EMERGANCY CONTACT NAME 1:&nbsp;</label> "; ?>
                            <?php echo $Emp_info['Phone_Number']; ?>
                            <br><label>TEMPERORY ADDRESS:&nbsp;</label><?php echo $Emp_info['Address']; ?>
                            <br><label> ZIPCODE1:&nbsp;</label><?php echo $Emp_info['Zipcode1']; ?>
                            <br><label>PAST CRIMINAL RECORD:&nbsp;</label><?php
                            if ($Emp_info['Past_Criminal_Record'] == 1) {
                                $past_criminal = 'Yes';
                            } else {
                                $past_criminal = 'No';
                            }echo $past_criminal;
                            ?>

                            <?php if ($Emp_info['Past_Criminal_Record'] == 1) { ?>
                                <br><label>PAST CRIMINAL RECORD DETAIL:&nbsp;</label><?php echo $Emp_info['Past_Criminal_Detail']; ?>
                            <?php } ?>

                        </div>
                    </div>

                    <div class="col-md-4" >
                        <div class="demo-content">
                            <br/><label>DATE OF BIRTH:&nbsp;</label> 
                            <?php
                            if (set_value('Dob')) {
                                echo set_value('Dob');
                            } elseif ($Emp_info['DOB'] != "0000-00-00") {
                                $dt2 = date_create($Emp_info['DOB']);
                                $DOB = date_format($dt2, 'm/d/Y');
                                echo $DOB;
                            } else {
                                echo "";
                            }
                            ?>
                            <br><label>MOBILE 1:&nbsp;</label> 
                            <?php
                            if (set_value('Mobile1')) {
                                echo set_value('Mobile1');
                            } else {
                                echo $Emp_info['Mobile1'];
                            }
                            ?>
                            <br><label>SECONDARY EMAIL:&nbsp;</label> 
                            <?php
                            if (set_value('Secondary_Email')) {
                                echo set_value('Secondary_Email');
                            } else {
                                echo $Emp_info['Secondary_Email'];
                            }
                            ?>
                            <br><label>EMPLOYEE MANAGER:&nbsp; </label> 
                            <?php echo 'Dhirendra Sir'; ?>
                            <br><label>RELATION 1: </label>
                            <?php
                            if (set_value('Emergancy_Contact_Relation1')) {
                                echo set_value('Emergancy_Contact_Relation1');
                            } else {
                                echo $Emp_info['Emergancy_Contact_Relation1'];
                            }
                            ?>
                            <br><label>RELATION 1:&nbsp; </label>
                            <?php
                            if (set_value('Emergancy_Contact_Relation1')) {
                                echo set_value('Emergancy_Contact_Relation1');
                            } else {
                                echo $Emp_info['Emergancy_Contact_Relation1'];
                            }
                            ?>
                            <br><label>PERMANENT ADDRESS:&nbsp; </label><?php echo $Emp_info['Permanent_Address']; ?>
                            <br><label>ZIPCODE 2:&nbsp; </label><?php echo $Emp_info['Zipcode2']; ?>
                            <br><label>DATE EMPLOYMENT COMMENCED:&nbsp; </label><?php echo $Emp_info['Joining_Date']; ?>
                        </div>
                    </div>

                    <div class="col-md-4" >
                        <div class="demo-content">
                            <br/><label>GENDER:&nbsp; </label> <?php echo (($Emp_info['Gender'] == 1) ? 'MALE' : 'FEMALE'); ?>
                            <br><label>MOBILE 2: &nbsp;</label> <?php
                            if (set_value('Mobile2')) {
                                echo set_value('Mobile2');
                            } else {
                                echo $Emp_info['Mobile2'];
                            }
                            ?>
                            <br><label>DEPARTMENT: &nbsp;</label> 
                            <?php echo $Dept_Name; ?>

                            <br><label>EMERGANCY CONTACT NUMBER 1:  </label><?php
                            echo $Emp_info['Emergancy_Contact_Number1'];
                            ?>
                            <br><label>EMERGANCY CONTACT NUMBER 2:  </label><?php
                            echo $Emp_info['Emergancy_Contact_Number2'];
                            ?>
                            <br><label>PAN NUMBER:&nbsp;</label><?php echo $Emp_info['Pan_Number']; ?>
                            <br><label>BLOOD GROUP:&nbsp;</label><?php echo $Emp_info['Blood_Group']; ?>
                            <br><label>ORDINARY HOURS OF WORK:</label> <?php echo $Emp_info['Odinary_Work_Hours_From'] . ' TO ' . $Emp_info['Odinary_Work_Hours_To']; ?>
                            <br><label>MONTHS BOND:&nbsp;</label><?php
                            if ($Emp_info['Months_Bond'] == 1) {
                                $Months_Bond = "12 Months";
                            } else if ($Emp_info['Months_Bond'] == 2) {
                                $Months_Bond = "18 Months";
                            } else if ($Emp_info['Months_Bond'] == 3) {
                                $Months_Bond = "24 Months";
                            }
                            echo $Months_Bond;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div> 




        <span class="section" style="margin-top:30px;">Back Ground Check</span>
        <div class="container">
            <div class="row">

                <div class="col-md-4">                  
                    <div class="demo-content" style="min-height:0px;">

                        <br><label>REFERANCE NAME 1: </label><?php echo $Emp_info['Referance_Name_1']; ?>
                        <?php if (isset($Emp_info['Referance_Name_2']) && $Emp_info['Referance_Name_2'] != '') { ?>
                            <br><label>REFERANCE NAME 2:&nbsp;</label><?php echo $Emp_info['Referance_Name_2']; ?>
                        <?php } ?>
                        <?php if (isset($Emp_info['Referance_Name_3']) && $Emp_info['Referance_Name_3'] != '') { ?>
                            <br><label>REFERANCE NAME 3:&nbsp;</label><?php echo $Emp_info['Referance_Name_3']; ?>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-md-4" >
                    <div class="demo-content" style="min-height:0px;">
                        <br/><label>RELATION 1:&nbsp;</label><?php echo $Emp_info['Referance_Relation_1']; ?>
                        <?php if (isset($Emp_info['Referance_Relation_2']) && $Emp_info['Referance_Relation_2'] != '') { ?>
                            <br><label>RELATION 2:&nbsp;</label><?php echo $Emp_info['Referance_Relation_2']; ?>
                        <?php } ?>
                        <?php if (isset($Emp_info['Referance_Relation_3']) && $Emp_info['Referance_Relation_3'] != '') { ?>
                            <br><label>RELATION 3:&nbsp;</label><?php echo $Emp_info['Referance_Relation_3']; ?>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-md-4" >
                    <div class="demo-content" style="min-height:0px;">

                        <br><label>NUMBER 1:&nbsp;</label><?php echo $Emp_info['Referance_Number_1']; ?>
                        <?php if (isset($Emp_info['Referance_Number_2']) && $Emp_info['Referance_Number_2'] != '') { ?>
                            <br><label>NUMBER 2:&nbsp;</label><?php echo $Emp_info['Referance_Number_2']; ?>
                        <?php } ?>
                        <?php if (isset($Emp_info['Referance_Number_3']) && $Emp_info['Referance_Number_3'] != '') { ?>
                            <br><label>NUMBER 3:&nbsp;</label><?php echo $Emp_info['Referance_Number_3']; ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <!----- ESIC detail 02-07-2017  ------------------------------------->
        <?php // /*      ?>
        <span class="section" style="margin-top:30px;">Official Detail</span> 
        <div class="container">
            <div class="row">
                <div class="col-md-6">                  
                    <div class="demo-content" style="min-height:120px;">

                        <br><label>IF ALRREADY REGISTER IN ESIC: </label> <?php
                        if ($Emp_info['Esic_Status'] == 1) {
                            echo 'Yes';
                        } else {
                            echo 'No';
                        }
                        ?>
                        <br><label>PREVIOUS PF CODE NO/UAN NO:&nbsp;</label><?php echo $Emp_info['Previous_PF_Code']; ?>
                        <br><label>NAME (AS PER AADHAR CARD):&nbsp;</label><?php echo $Emp_info['Name_Aadhar']; ?>
                        <br><label>AADHAR CARD NUMBER:&nbsp;</label><?php echo $Emp_info['Aadhar_Number']; ?>
                    </div>
                </div>

                <div class="col-md-6" >
                    <div class="demo-content" style="min-height:120px;">
                        <?php if ($Emp_info['Esic_Status'] == 1) { ?>
                            <br/><label>IF YES INSURANCE NO:&nbsp;</label> <?php echo $Emp_info['Insurance_No']; ?>
                        <?php } ?>

                        <br><label>DATE OF EXIT(PREVIOUS COMPANY):&nbsp;</label><?php echo $Emp_info['Date_Exit_Pre_Comp']; ?>
                        <br><label>MARRIAGE STATUS:&nbsp;</label>
                        <?php
                        if ($Emp_info['Marital_Status'] == 1) {
                            $marital_status = "SINGLE";
                        } else if ($Emp_info['Marital_Status'] == 2) {
                            $marital_status = "MARRIED";
                        } else if ($Emp_info['Marital_Status'] == 3) {
                            $marital_status = "OTHER";
                        }
                        echo $marital_status;
                        ?>
                        <br><label>MENTIONED MARRIAGE STATUS:&nbsp;</label><?php echo $Emp_info['Marital_Status_Other']; ?>
                    </div>
                </div>
            </div>
        </div>

        <!----- family detail 02-07-2017  ------------------------------------->
        <span class="section" style="margin-top:30px;">Family Detail</span>
        <!-- <div class="container">
            <div class="row">
                <div class="col-md-3">                  
                    <div class="demo-content" style="min-height:0px;">
                        <br><label>Relation: </label> Yes
                        <br><label>PREVIOUS PF CODE NO/UAN NO:</label>
                        
                    </div>
                </div>

                <div class="col-md-3" >
                    <div class="demo-content" style="min-height:0px;">
                        <br/><label>NAME AS PER AADHAR CARD </label> 534543534543535
                        <br><label>DATE OF EXIT(PREVIOUS COMPANY):</label>
                        
                        <br><label>MENTIONED MARRIAGE STATUS:</label>
                    </div>
                </div>
                
                <div class="col-md-3">                  
                    <div class="demo-content" style="min-height:0px;">
                        <br><label>DATE OF BIRTH </label> Yes
                        <br><label>AADHAR CARD NO</label>
                        
                    </div>
                </div>

                <div class="col-md-3" >
                    <div class="demo-content" style="min-height:0px;">
                        <br/><label>IF YES INSURANCE NO: </label> 534543534543535
                        <br><label>DATE OF EXIT(PREVIOUS COMPANY):</label>
                        <br><label>MARRIAGE STATUS:</label>
                        <br><label>MENTIONED MARRIAGE STATUS:</label>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="item form-group">
            <table class="table table-bordered tbl-family">
                <thead>
                    <tr>
                        <th>Relation</th>
                        <th>NAME AS PER AADHAR CARD</th>
                        <th>DATE OF BIRTH</th>
                        <th>AADHAR CARD NO</th>
                    </tr>
                </thead>
                <tbody class="append_section_family">
                    <?php
                    if (count($Emp_Family_Info) > 0) {
                        $totalArr = count($Emp_Family_Info);
                        $cntr = 0;
                        foreach ($Emp_Family_Info as $fkey => $Emp_Family) {
                            ?>
                            <tr class="entry_family">
                                <td>
                                    <?php echo $Emp_Family['Relation']; ?>
                                </td>
                                <td><?php echo $Emp_Family['Relative_Name']; ?></td>
                                <td>
                                    <?php echo $Emp_Family['Relative_DOB']; ?>
                                </td>
                                <td><?php echo $Emp_Family['Relative_Aadhar_No']; ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
</div>
</div>
</div>
</div>
<!-- /page content -->
