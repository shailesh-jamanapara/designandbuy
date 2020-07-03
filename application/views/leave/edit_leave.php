<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// get current date
$today = date('Y-m-d');

/*
 * 22-12-2017
 * add_detail page for edit leave (view/edit_leave)
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

                    <div class="x_content">

                        <form class="form-horizontal form-label-left" novalidate method="post" action="<?php echo base_url(); ?>index.php/Leave/edit_leave_insert" id="frm_leave_detail">
                            <div class="" id="emp_training">
                                <?php
                                if (validation_errors() || isset($department_detail_errors)) {
                                    echo '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';
                                    if (isset($department_detail_errors)) {
                                        echo $department_detail_errors . '<br>';
                                    }
                                    echo validation_errors() . '</div><script>/*setTimeout(function(){$("#emp_training").slideUp();},3000);*/</script>';
                                }
                                ?>
                            </div>
                            <span class="section">Leave Application</span>

                            <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="First_Name"><span class="requireds">*</span> FIRST NAME:</label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <input class="form-control col-md-7 col-xs-12" id="First_Name" name="First_Name" placeholder=""  value="<?php
                                    if (set_value('First_Name')) {
                                        echo set_value('First_Name');
                                    } else {
                                        echo $edit_leave_detail[0]['First_Name'];
                                    }
                                    ?>" type="text">
                                </div>



                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Last_Name"><span class="requireds">*</span> LAST NAME:</label>
                                <div class="col-md-2 col-sm-3 col-xs-12">
                                    <input class="form-control col-md-7 col-xs-12" id="Last_Name" name="Last_Name" placeholder=""   type="text" value="<?php
                                    if (set_value('Last_Name')) {
                                        echo set_value('Last_Name');
                                    } else {
                                        echo $edit_leave_detail[0]['Last_Name'];
                                    }
                                    ?>">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Position"><span class="requireds">*</span> POSITION: </label>
                                <div class="col-md-3 col-sm-3 col-xs-12">                          
                                    <select class="form-control col-md-7 col-xs-12" id="Position" name="Position" tabindex="-1"  >
                                        <option>--Select Position--</option>
                                        <option value="1">Project Manager</option>
                                        <option value="2">Team Manager</option>
                                        <option value="3">Superviser Manager</option>
                                        <option value="4">Team Leader Manager</option>
                                        <option value="5">Senior Php Devloper</option>
                                        <option value="6" select="selected">Php Devloper</option>
                                        <option value="7">Marketing Manager</option>
                                    </select>
                                </div>


                            </div>
                            <div class="item form-group input-daterange" id="datepicker">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name"><span class="requireds">*</span> Leave From Date
                                </label>

                                <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                    <input id="StartDate" name="Emp_Start_Date_Leave" class="date-picker form-control has-feedback-left"  type="text" value="<?php
                                    if (set_value('Emp_Start_Date_Leave')) {
                                        echo set_value('Emp_Start_Date_Leave');
                                    } else {
                                        echo $edit_leave_detail[0]['Emp_Start_Date_Leave'];
                                    }
                                    ?>">
                                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-1 col-sm-1 col-xs-12" style="text-align:center">
                                    <label class="control-label">TO</label>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                    <input id="EndDate" name="Emp_End_Date_Leave" class="date-picker form-control has-feedback-left" type="text" value="<?php
                                    if (set_value('Emp_End_Date_Leave')) {
                                        echo set_value('Emp_End_Date_Leave');
                                    } else {
                                        echo $edit_leave_detail[0]['Emp_End_Date_Leave'];
                                    }
                                    ?>">
                                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                </div>
                            </div>



                            <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Position"><span class="requireds">*</span> Reason For Leave: </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea id="Emp_Reason_For_Leave"  class="form-control col-md-7 col-xs-12" rows="5" name="Emp_Reason_For_Leave"><?php
                                        if (set_value('Emp_Reason_For_Leave')) {
                                            echo set_value('Emp_Reason_For_Leave');
                                        } else {
                                            echo $edit_leave_detail[0]['Emp_Reason_For_Leave'];
                                        }
                                        ?></textarea>
                                </div>
                            </div>					 


                            <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12">LEAVE STATUS:</label>         
                                <div class="col-md-2 col-sm-5 col-xs-12">
                                    <?php //if ($Role == 'Employee') { ?>
                                        <!-- <label class="control-label"><input type="radio" class="flat" <?php echo ($edit_leave_detail[0]['Emp_Leave_Status'] == 0) ? "checked" : ""; ?> value="0" <?php echo set_radio('Emp_Leave_Status', '0'); ?> name="Emp_Leave_Status" id="Emp_Leave_Status0" /> &nbsp;&nbsp;PENDING</label>-->
                                    <?php //} ?>
                                    <label class="control-label"><input type="radio" class="flat" <?php echo ($edit_leave_detail[0]['Emp_Leave_Status'] == 1) ? "checked" : ""; ?> value="1" <?php echo set_radio('Emp_Leave_Status', '1'); ?> name="Emp_Leave_Status" id="Emp_Leave_Status1" /> &nbsp;&nbsp;APPROVED</label>
                                    <label class="control-label"><input type="radio" class="flat" <?php echo ($edit_leave_detail[0]['Emp_Leave_Status'] == 2) ? "checked" : ""; ?> value="2" <?php echo set_radio('Emp_Leave_Status', '2'); ?> name="Emp_Leave_Status" id="Emp_Leave_Status2" /> &nbsp;&nbsp;NOTAPPROVED </label>
                                </div>

                                <label class="control-label col-md- col-sm-3 col-xs-12">LEAVE TYPE:</label>
                                <div class="col-md-2 col-sm-5 col-xs-12">
                                    <label class="control-label"><input type="radio" class="flat" name="Employeement_Status" id="Employeement_Status0" value="1" /> &nbsp;&nbsp;PAID LEAVE</label>
                                    <label class="control-label"><input type="radio" class="flat" name="Employeement_Status" id="Employeement_Status1" value="2" /> &nbsp;&nbsp;MEDICAL LEAVE</label>
                                    <label class="control-label"><input type="radio" class="flat" name="Employeement_Status" id="Employeement_Status2" value="3" /> &nbsp;&nbsp;NOTPAID LEAVE </label>
                                </div>
                            </div> 

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <a href="<?php echo base_url() ?>index.php/leave/leave_view"><button type="button" class="btn btn-danger">Cancel</button></a>
                                    <button id="send" type="submit" class="btn btn-success">Edit</button>

                                </div>
                            </div>
                            <input type="hidden" name="hdn_lev_id" value="<?php echo $edit_leave_detail[0]['Lev_ID']; ?>">
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

    $(document).ready(function () {
        /************** Limitaion of character in input fields ****************/
        //var startdatea = $("#Emp_Start_Date_Leave").val();

        /************** Jquery validation rules,messages and submit handler ****************/
        /*jQuery.validator.addMethod("enddate", function (value, element, params) {
         return this.optional(element) || startdatea >= new Date($(params).val());
         },'Must be greater than start date.');*/

        /*jQuery.validator.addMethod("dateComparison", function (value, element) {
         var result = true;
         //alert('called');
         if ($("#Emp_Start_Date_LeaveOptionLater:checked").length == 1)
         {
         var dateArray = $("#Emp_Start_Date_Leave").val().split("-");
         var startDateObj = new Date(dateArray[0], (dateArray[1] - 1), dateArray[2], 0, 0, 0, 0);
         } else
         {
         var exactDate = new Date();
         var year = exactDate.getFullYear();
         var month = exactDate.getMonth();
         var day = exactDate.getDate();
         var startDateObj = new Date(year, month, day, 0, 0, 0, 0);
         }
         
         var endDateArray = $("#Emp_Start_Date_Leave").val().split("/");
         var endDateObj = new Date(endDateArray[0], (endDateArray[1] - 1), endDateArray[2], 0, 0, 0, 0);
         var startDateMilliseconds = startDateObj.getTime();
         var endDateMilliseconds = endDateObj.getTime();
         
         if (endDateMilliseconds <= startDateMilliseconds)
         {
         result = false;
         }
         
         //alert(result);return false;
         return result;
         
         }, "The ending date must be a later date than the start date");*/

        $('#frm_leave_detail').validate({
            rules: {
                /*First_Name: {
                 required: true,
                 minlength: 2,
                 maxlength: 50
                 },
                 Last_Name: {
                 required: true,
                 minlength: 2,
                 maxlength: 50
                 },
                 Position: {
                 required: true,
                 },*/
                Emp_Start_Date_Leave: {
                    required: true
                },
                Emp_End_Date_Leave: {
                    required: true,
                    // dateComparison: true
                },

                Emp_Reason_For_Leave: {
                    required: true,
                    minlength: 7,
                    maxlength: 50
                }

            },

            messages: {
                /*First_Name: {
                 required: "First Name is required",
                 minlength: "This required minimum 2 character",
                 maxlength: "This required maximum 50 character",
                 },
                 Last_Name: {
                 required: "Last Name is required",
                 minlength: "This required minimum 2 character",
                 maxlength: "This required maximum 50 character",
                 },
                 Position: {
                 required: "Position Name is required",
                 },*/
                Emp_Start_Date_Leave: {
                    required: "Leave Start date is required",
                },
                Emp_End_Date_Leave: {
                    required: "Leave End date is required",

                },
                Emp_Reason_For_Leave: {
                    required: "Reason for leave is required",
                    minlength: "This required minimum 7 character",
                    maxlength: "This required maximum 50 character",
                },

            },

            errorElement: 'span',
        });





        /**************** Start Date - End Date picker *******/



    });

</script>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"
type="text/javascript"></script>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css"
rel="Stylesheet"type="text/css"/>
-->
<script type="text/javascript">


    // When the document is ready
    $(document).ready(function () {


        /********************* Boostrap datepicker ***************************/
        var today = '<?php echo $today ?>';
        var date_input = $('.date-picker'); //our date input has the name "date"
        var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
            orientation: "bottom auto",
            startDate: today

        });

        /*$('.input-daterange').datepicker({
         todayBtn: "linked"
         });*/

    });

</script>