<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * 12-21-2017
 * leave_view_detail page(view/leave_view_detail)
 */
?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h2>BimSym eBusiness Solutions</h2>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content form-horizontal form-label-left">

                        <span class="section">Leave Application Details</span>

                        <div class="item form-group">
                            <label class=" col-md-2 col-sm-3 col-xs-12" for="First_Name"> FIRST NAME:</label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <?php
                                if (isset($leave_view_Detail[0]['First_Name']) && $leave_view_Detail[0]['First_Name'] != '') {
                                    echo $leave_view_Detail[0]['First_Name'];
                                } else {
                                    echo '--';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class=" col-md-2 col-sm-3 col-xs-12" for="Last_Name"> LAST NAME:</label>
                            <div class="col-md-2 col-sm-3 col-xs-12">
                                <?php
                                if (isset($leave_view_Detail[0]['Last_Name']) && $leave_view_Detail[0]['Last_Name'] != '') {
                                    echo $leave_view_Detail[0]['Last_Name'];
                                } else {
                                    echo '--';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class=" col-md-2 col-sm-3 col-xs-12" for="Position"> POSITION: </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">                          
                                <?php
                                if (isset($leave_view_Detail[0]['Position_Name']) && $leave_view_Detail[0]['Position_Name'] != '') {
                                    echo $leave_view_Detail[0]['Position_Name'];
                                } else {
                                    echo '--';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="item form-group input-daterange" id="datepicker">
                            <label class=" col-md-2 col-sm-3 col-xs-12" for="last-name">LEAVE DATE:</label>

                            <div class="col-md-6 col-sm-3 col-xs-12 form-group has-feedback">
                                <?php
                                if (isset($leave_view_Detail[0]['Emp_Start_Date_Leave']) && $leave_view_Detail[0]['Emp_Start_Date_Leave'] != '') {
                                    echo 'Leave Start Date:&nbsp;&nbsp;'. $leave_view_Detail[0]['Emp_Start_Date_Leave'] . '&nbsp;&nbsp;TO&nbsp;&nbsp;Leave End Date:&nbsp;&nbsp;'. $leave_view_Detail[0]['Emp_End_Date_Leave'];
                                }
                                ?>
                            </div>
                        </div>

                        <div class="item form-group input-daterange" id="datepicker">
                            <label class=" col-md-2 col-sm-3 col-xs-12" for="last-name">TOTAL LEAVE (No. of Days):</label>

                            <div class="col-md-6 col-sm-3 col-xs-12 form-group has-feedback">
                                <?php
                                if (isset($leave_view_Detail[0]['Emp_Total_Leave']) && $leave_view_Detail[0]['Emp_Total_Leave'] != '') {
                                    echo $leave_view_Detail[0]['Emp_Total_Leave'];
                                }
                                ?>
                            </div>
                        </div>


                        <div class="item form-group">
                            <label class=" col-md-2 col-sm-3 col-xs-12" for="Position"> REASON FOR LEAVE: </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php
                                if (isset($leave_view_Detail[0]['Emp_Reason_For_Leave']) && $leave_view_Detail[0]['Emp_Reason_For_Leave'] != '') {
                                    echo $leave_view_Detail[0]['Emp_Reason_For_Leave'];
                                }
                                ?>
                            </div>
                        </div>					 


                        <div class="item form-group">
                            <label class=" col-md-2 col-sm-3 col-xs-12">LEAVE STATUS:</label>         
                            <div class="col-md-2 col-sm-5 col-xs-12">
                                <?php
                                if ($lev_detail['Emp_Leave_Status'] == 0) {
                                    $Emp_Leave_Status = "PENDING";
                                } else if ($lev_detail['Emp_Leave_Status'] == 1) {
                                    $Emp_Leave_Status = "APPROVED";
                                } else if ($lev_detail['Emp_Leave_Status'] == 2) {
                                    $Emp_Leave_Status = "NOTAPPROVED";
                                }

                                echo $Emp_Leave_Status;
                                ?>
                            </div>
                        </div> 

                        <div class="item form-group">
                            <label class=" col-md-2 col-sm-3 col-xs-12">LEAVE TYPE:</label>
                            <div class="col-md-2 col-sm-5 col-xs-12">
                                PAID LEAVE
                            </div>
                        </div> 

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
