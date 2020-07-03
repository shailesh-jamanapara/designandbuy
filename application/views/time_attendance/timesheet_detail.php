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

                        <span class="section">Timesheet Details</span>

                        <div class="item form-group">
                            <label class=" col-md-2 col-sm-3 col-xs-12" for="First_Name">Employee In-Time:</label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <?php
                                if (isset($timesheet_view_detail[0]['Emp_In_time']) && $timesheet_view_detail[0]['Emp_In_time'] != '') {
                                    echo $timesheet_view_detail[0]['Emp_In_time'];
                                } else {
                                    echo '--';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class=" col-md-2 col-sm-3 col-xs-12" for="Last_Name">Employee Out-Time:</label>
                            <div class="col-md-2 col-sm-3 col-xs-12">
                                <?php
                                if (isset($timesheet_view_detail[0]['Emp_Out_time']) && $timesheet_view_detail[0]['Emp_Out_time'] != '') {
                                    echo $timesheet_view_detail[0]['Emp_Out_time'];
                                } else {
                                    echo '--';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class=" col-md-2 col-sm-3 col-xs-12" for="Position"> Total Hours work: </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">                          
                                <?php
                                if (isset($timesheet_view_detail[0]['Emp_Total_Hours']) && $timesheet_view_detail[0]['Emp_Total_Hours'] != '') {
                                    echo $timesheet_view_detail[0]['Emp_Total_Hours'];
                                } else {
                                    echo '--';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
