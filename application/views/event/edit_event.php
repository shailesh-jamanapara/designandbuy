<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * 22-12-2016
 * add_detail page(view/event)
 */

$today = date('Y-m-d');
?>




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
     url: "<?php //echo base_url(); ?>" + "index.php/Event/insert_event",
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
                <h3>Add New Event</h3>
            </div>

        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">

                        <form class="form-horizontal form-label-left" novalidate method="post" id="Event_Form" action="<?php echo base_url(); ?>index.php/event/edit_update_event">
                            
                            <input type="hidden" name="hdn_event_id" value="<?=$event_detail[0]['Eve_ID'];?>">
                            
                            <div class="" id="emp_training">
                                 <?php
                                if (validation_errors()) {
                                    echo '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>' . validation_errors() . '</div><script>setTimeout(function(){$("#emp_training").slideUp();},3000);</script>';
                                }
                                ?>
                            </div>
                            <span class="section">Event Information</span>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> <span class="requireds">*</span> Event Name 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="Events_Name" class="form-control col-md-7 col-xs-12" required="required" name="Events_Name" placeholder="Event : eg Birthday Event"  type="text" value="<?=$event_detail[0]['Eve_Name'];?>">

                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Position">Events Summary </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea id="Events_Summary"  class="form-control col-md-7 col-xs-12" rows="5" id="comment" name="Events_Summary" ><?=$event_detail[0]['Eve_Summary'];?></textarea>
                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="birthday"> <span class="requireds">*</span> Events Date
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input  name="Events_Date" class="date-picker form-control col-md-7 col-xs-12 Events_Date"  type="text" value="<?=$event_detail[0]['Eve_Date'];?>">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <a href="<?php echo base_url() ?>index.php/Event/insert_event"><button type="button" class="btn btn-primary">Cancel</button></a>
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

                },
                Events_Date: {
                    required: "This field is required",
                }
            },
            errorElement: 'span',
        });
    });
</script>


<script type="text/javascript">


    // When the document is ready
    $(document).ready(function () {


        /********************* Boostrap datepicker ***************************/
        var today = '<?php echo $today ?>';
        var date_input = $('.date-picker'); //our date input has the name "date"
        var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
        //alert(container);
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
