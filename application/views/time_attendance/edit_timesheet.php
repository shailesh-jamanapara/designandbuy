<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * 25-12-2016
 * EDIT TIMESHEET(view/time_attendance/edit_timesheet)
 */
?>
<link href="<?php echo base_url() ?>assets/build/css/bootstrap-datetimepicker3.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url() ?>assets/build/js/bootstrap-datetimepicker.min.js"></script>
<script>
    $(document).ready(function () {
        /*var date_input = $('input[name="Emp_In_time"]'); //our date input has the name "date"
        var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'mm/dd/yyyy - hh:ii',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })*/
        $('input[name="Emp_In_time"]').datetimepicker({ format:'YYYY-MM-DD hh:mm' });
        $('input[name="Emp_Out_time"]').datetimepicker({ format:'YYYY-MM-DD hh:mm' });
    });
    
    

</script>


<script type="text/javascript">

    // Ajax post
    /*$(document).ready(function() {
     
     $("#send").click(function(event) {
     event.preventDefault();
     var Events_Name = $("#Events_Name").val();
     var Events_Summary = $("#Events_Summary").val();
     var Events_Date = $("#Events_Date").val();
     jQuery.ajax({
     type: "POST",
     url: "<?php echo base_url(); ?>" + "index.php/Event/insert_event",
     dataType: 'json',
     data: {Events_Name: Events_Name, Events_Summary: Events_Summary,Events_Date:Events_Date},
     success: function(res) {
     if (res)
     {
     // Show Entered Value
     jQuery("div#result").show();
     jQuery("div#value").html(res.Events_Name);
     jQuery("div#value_pwd").html(res.Events_Summary);
     }
     }
     });
     });
     });*/
</script>


<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Employee Edit Timesheet</h3>
            </div>

        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">

                        <form class="form-horizontal form-label-left" novalidate method="post" id="Event_Form" action="<?php echo base_url(); ?>index.php/time_attendance/edit_update_timesheet">
                            <input type="hidden" name="hdn_emp_timesheet" value="<?php echo $timesheet_edit_detail[0]['Tim_ID']; ?>">
                            <span class="section">Timesheet Information</span>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Emp_In_time"> <span class="requireds">*</span> Employeee's In-Time 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input  name="Emp_In_time" class="form-control col-md-7 col-xs-7 Emp_In_time"  type="text" value="<?php echo $timesheet_edit_detail[0]['Emp_In_time']; ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Emp_Out_time"> <span class="requireds">*</span> Employeee's Out-Time 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input  name="Emp_Out_time" class="form_datetime form-control col-md-7 col-xs-7 Emp_Out_time"  type="text" value="<?php echo $timesheet_edit_detail[0]['Emp_Out_time']; ?>">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="birthday"> <span class="requireds">*</span> Total hours work:
                                </label>
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <input  name="Emp_Total_Hours" class="form-control col-md-7 col-xs-7 Emp_Total_Hours"  type="text" value="<?php echo $timesheet_edit_detail[0]['Emp_Total_Hours']; ?>">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <a href="<?php echo base_url() ?>index.php/time_attendance/list_time_attendance"><button type="button" class="btn btn-primary">Cancel</button></a>
                                    <input id="send" type="submit" class="btn btn-success" name="Add" value="Edit">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<script type="text/javascript">

    $(document).ready(function () {

        $('#Event_Form').validate({
            rules: {
                Events_Name: {
                    required: true,
                    minlength: 2,
                    maxlength: 50
                },
                Events_Date: {
                    required: true

                }
            },

            messages: {
                Events_Name: {
                    required: "This field is required",
                    minlength: "This required minimum 2 character",
                    maxlength: "This required maximum 50 character",

                }
            },
            errorElement: 'span',
        });
    });
</script>
