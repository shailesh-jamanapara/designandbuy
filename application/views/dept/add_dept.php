<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * 22-12-2016
 * add_detail page(view/event)
 */
if (!empty($edit_dept[0]['Dept_Name'])) {
    $Dept_Name = $edit_dept[0]['Dept_Name'];
} else {
    $Dept_Name = '';
}
?>

<script>
    $(document).ready(function () {
        var date_input = $('input[name="Events_Date"]'); //our date input has the name "date"
        var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
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
                <h3>Add New Department</h3>
            </div>

        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">

                        <form class="form-horizontal form-label-left" novalidate method="post" id="Dept_Form" action="<?php echo base_url(); ?>index.php/department/insert_dept">

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


                            <input  name="Dept_ID"   type="hidden" value="<?php if (isset($Dept_ID)) {
                                    echo $Dept_ID;
                                } ?>">
                            <span class="section">Department Information</span>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Dept_Name"> <span class="requireds">*</span> Department Name 
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="Dept_Name" class="form-control col-md-7 col-xs-12" required="required" name="Dept_Name" placeholder="Department"  type="text" value="<?php echo $Dept_Name; ?>">

                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <a href="<?php echo base_url() ?>index.php/department/list_dept"><button type="button" class="btn btn-primary">Cancel</button></a>
                                    <input id="send" type="submit" class="btn btn-success" name="Add" value="Add">
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

        $('#Dept_Form').validate({
            rules: {
                Dept_Name: {
                    required: true,
                    minlength: 2,
                    maxlength: 50
                }
            },

            errorElement: 'span',
        });
    });
</script>
