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

                        <span class="section">Event Details</span>

                        <div class="item form-group">
                            <label class=" col-md-2 col-sm-3 col-xs-12" for="First_Name">Event Name:</label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <?php
                                if (isset($event_view_detail[0]['Eve_Name']) && $event_view_detail[0]['Eve_Name'] != '') {
                                    echo $event_view_detail[0]['Eve_Name'];
                                } else {
                                    echo '--';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class=" col-md-2 col-sm-3 col-xs-12" for="Last_Name"> Events Summary:</label>
                            <div class="col-md-2 col-sm-3 col-xs-12">
                                <?php
                                if (isset($event_view_detail[0]['Eve_Summary']) && $event_view_detail[0]['Eve_Summary'] != '') {
                                    echo $event_view_detail[0]['Eve_Summary'];
                                } else {
                                    echo '--';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class=" col-md-2 col-sm-3 col-xs-12" for="Position"> Events Date: </label>
                            <div class="col-md-3 col-sm-3 col-xs-12">                          
                                <?php
                                if (isset($event_view_detail[0]['Eve_Date']) && $event_view_detail[0]['Eve_Date'] != '') {
                                    echo $event_view_detail[0]['Eve_Date'];
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
