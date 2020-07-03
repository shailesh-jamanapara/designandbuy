<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * 
 * edu_exp_detail page(view/employee)
 */

//echo '<pre>'; print_r($result_edu_get);
//echo '<pre>'; print_r($result_exp_get); exit;
?>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">

        <div class="x_content">

            <div class="" id="Edu_Exp_Alert">
                <?php
                if (validation_errors() || isset($edu_exp_errors)) {
                    echo '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';
                    if (isset($edu_exp_errors)) {
                        echo $edu_exp_errors . '<br>';
                    }
                    echo validation_errors() . '</div><script>/*setTimeout(function(){$("#Edu_Exp_Alert").slideUp();},3000);*/</script>';
                }
                ?>
            </div>					

            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url() ?>index.php/Employee_insert/emp_edu_exp_insert" id="Edu_Exp_Form">


                <div class="controls_edu ">
                    <span class="section">EDUCATION DETAIL</span>

                    <fieldset style="margin-top:30px;" class="append_section_edu demo-content">
<style type="text/css">
        /* Some custom styles to beautify this example */
        .demo-content{
            padding: 15PX 15px 15px 15px;
            font-size: 12px;
            min-height: 254px;
            border: solid 1px #ccc;
            margin-bottom: 0px;
        }
        .demo-content.bg-alt{
            background: #abb1b8;
        }
    </style>
<?php
if (isset($result_edu_get) && !empty($result_edu_get)) {
    $count = count($result_edu_get);
    $i = 1;
    foreach ($result_edu_get as $edu_get) {
        ?>

                                <div class="entry_edu item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="">EDUCATION:</label>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <input id="Degree_Name" name="Degree_Name[]" class="form-control col-md-7 col-xs-12" placeholder="DEGREE" value="<?php if (isset($edu_get['Degree_Name'])) {
            echo $edu_get['Degree_Name'];
        } else {
            set_value('Degree_Name[]');
        } ?>" type="text" maxlength="50">
                                    </div>								
                                    <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">
                                        <input id="Percentage" name="Percentage[]" class="form-control col-md-7 col-xs-12 has-feedback-right" placeholder="PERCENT" value="<?php if (isset($edu_get['Percentage'])) {
            echo $edu_get['Percentage'];
        } else {
            set_value('Percentage[]');
        } ?>" type="text" maxlength="5">
                                        <span class="fa fa-percent form-control-feedback right" aria-hidden="true"></span>
                                    </div>

                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <input id="Passing_Year" name="Passing_Year[]" class="form-control col-md-7 col-xs-12" placeholder="PASSING YEAR" value="<?php if (isset($edu_get['Passing_Year'])) {
                                    echo $edu_get['Passing_Year'];
                                } else {
                                    set_value('Passing_Year[]');
                                } ?>" type="text" maxlength="4">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <input id="University" name="University[]" class="form-control col-md-7 col-xs-12" placeholder="UNIVERSITY" value="<?php if (isset($edu_get['University'])) {
                                    echo $edu_get['University'];
                                } else {
                                    set_value('University[]');
                                } ?>" type="text" maxlength="50">
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12 append_icon">
        <?php
        if ($count == 1) {
            echo '<a href="javascript:void(0);"><i style="font-size:25px;color: #26b99a;" class="fa fa-plus add-btn" ></i></a>';
        } else {
            if ($i == 1) {
                echo '';
            } elseif ($i == $count) {
                echo '<a href="javascript:void(0);"><i style="font-size:25px;color:#da1818 ;" class="fa fa-remove remove-btn" ></i>&nbsp;<i style="font-size:25px;color:#26b99a;" class="fa fa-plus add-btn"></i></a>';
            } else {
                echo '<a href="javascript:void(0);"><i style="font-size:25px;color:#da1818 ;" class="fa fa-remove remove-btn"></i></a>';
            }
        }
        ?>  

                                    </div>								
                                </div>

                                <?php
                                $i++;
                            }
                        } else {
                            ?>
                            <div class="entry_edu item form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" for="">EDUCATION:</label>
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <input id="Degree_Name" name="Degree_Name[]" class="form-control col-md-7 col-xs-12" placeholder="DEGREE" value="<?= set_value('Degree_Name[0]'); ?>" type="text" maxlength="50">
                                </div>								
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">
                                    <input id="Percentage" name="Percentage[]" class="form-control col-md-7 col-xs-12 has-feedback-right" placeholder="PERCENT" value="<?= set_value('Percentage[0]'); ?>" type="text" maxlength="5">
                                    <span class="fa fa-percent form-control-feedback right" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <input id="Passing_Year" name="Passing_Year[]" class="form-control col-md-7 col-xs-12" placeholder="PASSING YEAR" value="<?= set_value('Passing_Year[0]'); ?>" type="text" maxlength="4">
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <input id="University" name="University[]" class="form-control col-md-7 col-xs-12" placeholder="UNIVERSITY" value="<?= set_value('University[0]'); ?>" type="text" maxlength="50">
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12 append_icon">
                                    <a href="javascript:void(0);"><i style="font-size:25px;color: #26b99a;" class="fa fa-plus add-btn"></i></a>
                                </div>								
                            </div>
                        <?php } ?>

                    </fieldset> 
                </div>
                <div class="clearfix">&nbsp;&nbsp;</div>
                <div class="controls">
                    
                    <span class="section">EXPERIENCE DETAIL</span>
                    <!--  ****************************  Experience detail  *************************  -->		
                    <fieldset class="append_section demo-content">
                        

                        
                        <?php if (isset($result_exp_get) && !empty($result_exp_get)) { ?>

                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <label class="control-label" for="">EXPERIANCE SKILLS:</label>
                            </div>
                            <div class="col-md-8 col-sm-10 col-xs-12">
                                <input id="Skill" name="Skill" type="text" class="tags form-control" value="<?php if (isset($result_exp_get[0]['Skill'])) {
        echo $result_exp_get[0]['Skill'];
    } else {
        set_value('Skill');
    } ?>" maxlength="300" />
                                <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                            </div>
                            <div class="clearfix"></div>

    <?php
    $j = 1;
    $count_exp = count($result_exp_get);
    foreach ($result_exp_get as $exp_get) {
        ?>

                                <div class="entry item form-group">
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <label class="control-label" for="">PREVIOUS EMPLOYER:</label>
                                    </div>
                                    <div class="col-md-8 col-sm-8 col-xs-12">	
                                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                            <input id="Company_Name" name="Company_Name[]" class="form-control col-md-7 col-xs-12" placeholder="NAME OF COMPANY" value="<?php if (isset($exp_get['Company_Name'])) {
            echo $exp_get['Company_Name'];
        } else {
            set_value('Company_Name[]');
        } ?>" type="text" maxlength="50">
                                        </div>

                                        <div class="form-group col-md-4 col-sm-4 col-xs-12 has-feedback">
                                            <input id="Start_Date" name="Start_Date[]" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="START DATE" value="<?php if (isset($exp_get['Start_Date'])) {
            echo $exp_get['Start_Date'];
        } else {
            set_value('Start_Date[]');
        } ?>" type="text" maxlength="10" />
                                            <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                            <input id="Start_Position" name="Start_Position[]" class="form-control col-md-7 col-xs-12" placeholder="START AS POSITION" value="<?php if (isset($exp_get['Start_Position'])) {
            echo $exp_get['Start_Position'];
        } else {
            set_value('Start_Position[]');
        } ?>" type="text" maxlength="50"/>									  
                                        </div>
                                        <div class="form-group col-md-4 col-sm-4 col-xs-12 has-feedback">
                                            <input id="Start_Salary" name="Start_Salary[]" class="form-control col-md-7 col-xs-12 has-feedback-right" value="<?php if (isset($exp_get['Start_Salary'])) {
            echo $exp_get['Start_Salary'];
        } else {
            set_value('Start_Salary[]');
        } ?>" type="text"  maxlength="10" placeholder="START SALARY"/>
                                            <span class="fa fa-inr form-control-feedback right" aria-hidden="true"></span>
                                        </div>


                                        <div class="form-group col-md-4 col-sm-4 col-xs-12 has-feedback">
                                            <input id="End_Date" name="End_Date[]" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="END DATE" value="<?php if (isset($exp_get['End_Date'])) {
                                    echo $exp_get['End_Date'];
                                } else {
                                    set_value('End_Date[]');
                                } ?>" type="text" maxlength="10">
                                            <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                        </div>
                                        <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                            <input id="End_Position" name="End_Position[]" class="form-control col-md-7 col-xs-12" placeholder="END AS POSITION" value="<?php if (isset($exp_get['End_Position'])) {
                                    echo $exp_get['End_Position'];
                                } else {
                                    set_value('End_Position[]');
                                } ?>" type="text" maxlength="50">
                                        </div>
                                        <div class="form-group col-md-4 col-sm-4 col-xs-12 has-feedback">
                                            <input id="End_Salary" name="End_Salary[]" class="form-control col-md-7 col-xs-12 has-feedback-right" value="<?php if (isset($exp_get['End_Salary'])) {
                                    echo $exp_get['End_Salary'];
                                } else {
                                    set_value('End_Salary[]');
                                } ?>" type="text" maxlength="10" placeholder="END SALARY">
                                            <span class="fa fa-inr form-control-feedback right" aria-hidden="true"></span>
                                        </div>					

                                        <!--<div class="form-group col-md-8 col-sm-8 col-xs-12">								  
                                          <select class="select2_single form-control" id="Leaving_Reason" name="Leaving_Reason[]" maxlength="2" >
                                                <option value="" selected>--REASON FOR LEAVING--</option>
                                                <option value="1" <?php if (isset($exp_get['Leaving_Reason']) && $exp_get['Leaving_Reason'] == '1') {
                                    echo 'selected';
                                } else {
                                    set_select('Leaving_Reason[]', '1');
                                } ?> >Your company was restructuring.</option>
                                                <option value="2" <?php if (isset($exp_get['Leaving_Reason']) && $exp_get['Leaving_Reason'] == '2') {
                                    echo 'selected';
                                } else {
                                    set_select('Leaving_Reason[]', '2');
                                } ?> >You are looking for new challenges at work.</option>
                                                <option value="3" <?php if (isset($exp_get['Leaving_Reason']) && $exp_get['Leaving_Reason'] == '3') {
                                    echo 'selected';
                                } else {
                                    set_select('Leaving_Reason[]', '3');
                                } ?> >You want a change in career direction.</option>
                                                <option value="4" <?php if (isset($exp_get['Leaving_Reason']) && $exp_get['Leaving_Reason'] == '4') {
                                    echo 'selected';
                                } else {
                                    set_select('Leaving_Reason[]', '4');
                                } ?> >You were made redundant or the company closed down.</option>
                                                <option value="5" <?php if (isset($exp_get['Leaving_Reason']) && $exp_get['Leaving_Reason'] == '5') {
                                    echo 'selected';
                                } else {
                                    set_select('Leaving_Reason[]', '5');
                                } ?> >You are looking for better career prospects, professional growth and work opportunities.</option>
                                                <option value="6" <?php if (isset($exp_get['Leaving_Reason']) && $exp_get['Leaving_Reason'] == '6') {
                                    echo 'selected';
                                } else {
                                    set_select('Leaving_Reason[]', '6');
                                } ?> >Other Reason</option>
                                          </select>
                                        </div>-->
                                        <div class="form-group col-md-8 col-sm-8 col-xs-12">								  
                                            <input class="form-control" id="Leaving_Reason" name="Leaving_Reason[]" maxlength="100" type="text" placeholder="REASON FOR LEAVING"  value="<?php if (isset($exp_get['Leaving_Reason']) && !empty($exp_get['Leaving_Reason'])) {
                                    echo $exp_get['Leaving_Reason'];
                                } else {
                                    set_value('Leaving_Reason[]');
                                } ?>">
                                        </div>
                                        <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                            <input id="Months" name="Months[]" class="form-control col-md-7 col-xs-12" placeholder="TOTAL MONTHS" value="<?php if (isset($exp_get['Months'])) {
                                    echo $exp_get['Months'];
                                } else {
                                    set_value('Months[]');
                                } ?>" type="text" maxlength="10">
                                        </div>



                                    </div>

                                    <div class="form-group col-md-2 col-sm-2 col-xs-12 append_icon">
                                <?php
                                if ($count_exp == 1) {
                                    echo '<a href="javascript:void(0);"><i style="font-size:25px;color: #26b99a;" class="fa fa-plus def-add-btn" ></i></a>';
                                } else {
                                    if ($j == 1) {
                                        echo '';
                                    } elseif ($j == $count_exp) {
                                        echo '<a href="javascript:void(0);"><i style="font-size:25px;color:#da1818 ;" class="fa fa-remove def-remove-btn" ></i>&nbsp;<i style="font-size:25px;color:#26b99a;" class="fa fa-plus def-add-btn" ></i></a>';
                                    } else {
                                        echo '<a href="javascript:void(0);"><i style="font-size:25px;color:#da1818 ;" class="fa fa-remove def-remove-btn" ></i></a>';
                                    }
                                }
                                ?>	

                                    </div>
                                </div>

        <?php
        $j++;
    }
} else {
    ?>

                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <label class="control-label" for="">EXPERIANCE SKILLS:</label>
                            </div>
                            <div class="col-md-8 col-sm-10 col-xs-12">
                                <input id="Skill" name="Skill" type="text" class="tags form-control" value="<?= set_value('Skill'); ?>" maxlength="300" />
                                <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="entry item form-group">
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <label class="control-label" for="">PREVIOUS EMPLOYER:</label>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-12">	
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <input id="Company_Name" name="Company_Name[]" class="form-control col-md-7 col-xs-12" placeholder="NAME OF COMPANY" value="<?= set_value('Company_Name[0]'); ?>" type="text" maxlength="50">
                                    </div>

                                    <div class="form-group col-md-4 col-sm-4 col-xs-12 has-feedback">
                                        <input id="Start_Date" name="Start_Date[]" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="START DATE" value="<?= set_value('Start_Date[0]'); ?>" type="text" maxlength="10" />
                                        <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                        <input id="Start_Position" name="Start_Position[]" class="form-control col-md-7 col-xs-12" placeholder="START AS POSITION" value="<?= set_value('Start_Position[0]'); ?>" type="text" maxlength="50"/>									  
                                    </div>
                                    <div class="form-group col-md-4 col-sm-4 col-xs-12 has-feedback">
                                        <input id="Start_Salary" name="Start_Salary[]" class="form-control col-md-7 col-xs-12 has-feedback-right" placeholder="START SALARY" value="<?= set_value('Start_Salary[0]'); ?>" type="text"  maxlength="10"/>
                                        <span class="fa fa-inr form-control-feedback right" aria-hidden="true"></span>
                                    </div>


                                    <div class="form-group col-md-4 col-sm-4 col-xs-12 has-feedback">
                                        <input id="End_Date" name="End_Date[]" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="END DATE" value="<?= set_value('End_Date[0]'); ?>" type="text" maxlength="10">
                                        <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                        <input id="End_Position" name="End_Position[]" class="form-control col-md-7 col-xs-12" placeholder="END AS POSITION" value="<?= set_value('End_Position[0]'); ?>" type="text" maxlength="50">
                                    </div>
                                    <div class="form-group col-md-4 col-sm-4 col-xs-12 has-feedback">
                                        <input id="End_Salary" name="End_Salary[]" class="form-control col-md-7 col-xs-12 has-feedback-right" placeholder="END SALARY" value="<?= set_value('End_Salary[0]'); ?>" type="text" maxlength="10">
                                        <span class="fa fa-inr form-control-feedback right" aria-hidden="true"></span>
                                    </div>					

                                    <!--<div class="form-group col-md-8 col-sm-8 col-xs-12">								  
                                      <select class="select2_single form-control" id="Leaving_Reason" name="Leaving_Reason[]" tabindex="-1" maxlength="2" >
                                            <option value="" selected>--REASON FOR LEAVING--</option>
                                            <option value="1" <?= set_select('Leaving_Reason[0]', '1'); ?> >Your company was restructuring.</option>
                                            <option value="2" <?= set_select('Leaving_Reason[0]', '2'); ?> >You are looking for new challenges at work.</option>
                                            <option value="3" <?= set_select('Leaving_Reason[0]', '3'); ?> >You want a change in career direction.</option>
                                            <option value="4" <?= set_select('Leaving_Reason[0]', '4'); ?> >You were made redundant or the company closed down.</option>
                                            <option value="5" <?= set_select('Leaving_Reason[0]', '5'); ?> >You are looking for better career prospects, professional growth and work opportunities.</option>
                                            <option value="6" <?php if (isset($exp_get['Leaving_Reason']) && $exp_get['Leaving_Reason'] == '6') {
        echo 'selected';
    } else {
        set_select('Leaving_Reason[]', '6');
    } ?> >Other Reason</option>
                                      </select>
                                    </div>-->
                                    <div class="form-group col-md-8 col-sm-8 col-xs-12">								  
                                        <input class="form-control" id="Leaving_Reason" name="Leaving_Reason[]" maxlength="100" type="text" placeholder="REASON FOR LEAVING" value="<?= set_value('Leaving_Reason[]'); ?>" >
                                    </div>
                                    <div class="form-group col-md-4 col-sm-4 col-xs-12">
                                        <input id="Months" name="Months[]" class="form-control col-md-7 col-xs-12" placeholder="TOTAL MONTHS" value="<?= set_value('Months[0]'); ?>" type="text" maxlength="10">
                                    </div>

                                </div>

                                <div class="form-group col-md-2 col-sm-2 col-xs-12 append_icon">
                                    <a href="javascript:void(0);"><i style="font-size:25px;color: #26b99a;" class="fa fa-plus def-add-btn"></i></a>
                                </div>
                            </div>				
<?php } ?>

                    </fieldset>  
                </div>

                <input type="hidden" id="Emp_ID" name="Emp_ID" maxlength="5" value="<?php echo $Emp_ID; ?>">
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <a href="<?php echo base_url() ?>index.php/Employee/add_emp_list"><button type="button" class="btn btn-danger">Cancel</button></a>
                        <button id="send" type="submit" class="btn btn-success">Submit</button>
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

<!-- jQuery Tags Input -->
<script src="<?php echo vendor_url(); ?>jquery.tagsinput/src/jquery.tagsinput.js"></script>
<script>
    $(document).ready(function () {

        /*********** jQuery Tags Input ***********/

        function onAddTag(tag) {
            alert("Added a tag: " + tag);
        }

        function onRemoveTag(tag) {
            alert("Removed a tag: " + tag);
        }

        function onChangeTag(input, tag) {
            alert("Changed a tag: " + tag);
        }

        $(document).ready(function () {
            $('#Skill').tagsInput({
                width: 'auto'
            });
        });
        /*************** jQuery Tags Input ***********/



        /*************** append and remove class ****************/

        var y = 1;
        $(document).on('click', '.add-btn', function (e) {

            var max_fields_edu = 5;
            e.preventDefault();

            if (y < max_fields_edu) {
                y++;

                var controlForm = $(this).parents('.controls_edu .append_section_edu:first'),
                        currentEntry = $(this).parents('.entry_edu:first'),
                        newEntry = $(currentEntry.clone()).appendTo(controlForm);

                newEntry.find('input, select').val('');
                controlForm.find('.entry_edu:first a').remove();

                controlForm.find('.entry_edu:not(:last) a').empty().append('<i style="font-size:25px;color:#da1818 ;" class="fa fa-remove remove-btn" data-toggle="tooltip" data-placement="top" title="Remove"></i>');

                controlForm.find('.entry_edu:last a').empty().append('<i style="font-size:25px;color:#da1818 ;" class="fa fa-remove remove-btn" data-toggle="tooltip" data-placement="top" title="Remove"></i>&nbsp;<i style="font-size:25px;color:#26b99a;" class="fa fa-plus add-btn" data-toggle="tooltip" data-placement="top" title="Add"></i>');


            }
            tooltip();
            datepicker_call();

        }).on('click', '.remove-btn', function (e) {
            var controlForm = $(this).parents('.controls_edu .append_section_edu:first');

            if ($(this).is(".entry_edu:last .remove-btn") && $(this).is(".entry_edu:first .remove-btn")) {
                alert('first-last');

            } else if ($(this).is(".entry_edu:last .remove-btn")) {

                controlForm.find('.entry_edu:nth-last-child(2) a ').empty().append('<i style="font-size:25px;color:#da1818 ;" class="fa fa-remove remove-btn" data-toggle="tooltip" data-placement="top" title="Remove"></i>&nbsp;<i style="font-size:25px;color:#26b99a;" class="fa fa-plus add-btn" data-toggle="tooltip" data-placement="top" title="Add"></i>');

                $(this).parents('.entry_edu:first').remove();

                controlForm.find('.entry_edu:first .remove-btn');
            } else {
                $(this).parents('.entry_edu:first').remove();
            }

            y--;

            e.preventDefault();
            tooltip();
            return false;
        });



        $('#Edu_Exp_Form').validate({
            errorElement: 'span',
            rules: {
                'Percentage[]': {
                    number: true
                },
                'Passing_Year[]': {
                    digits: true,
                    min: 1980,
                    max: 2020
                },
                'Start_Salary[]': {
                    digits: true
                },
                'End_Salary[]': {
                    digits: true
                }
            },
            submitHandler: function (form) {
                form.submit();
                //submit_edu_exp_detail();
            }
        });

    });



    /********** calculate time duration in years, month, days (MM/DD/YYYY) ***********/
    function getduration(dateString, datelast) {
        //var now = new Date();
        //var today = new Date(now.getYear(),now.getMonth(),now.getDate());


        var now = new Date(datelast.substring(6, 10),
                datelast.substring(0, 2) - 1,
                datelast.substring(3, 5)
                );

        var yearNow = now.getYear();
        var monthNow = now.getMonth();
        var dateNow = now.getDate();

        var dob = new Date(dateString.substring(6, 10),
                dateString.substring(0, 2) - 1,
                dateString.substring(3, 5)
                );

        var yearDob = dob.getYear();
        var monthDob = dob.getMonth();
        var dateDob = dob.getDate();
        var age = {};
        var ageString = "";
        var yearString = "";
        var monthString = "";
        var dayString = "";


        yearAge = yearNow - yearDob;

        if (monthNow >= monthDob)
            var monthAge = monthNow - monthDob;
        else {
            yearAge--;
            var monthAge = 12 + monthNow - monthDob;
        }

        if (dateNow >= dateDob)
            var dateAge = dateNow - dateDob;
        else {
            monthAge--;
            var dateAge = 31 + dateNow - dateDob;

            if (monthAge < 0) {
                monthAge = 11;
                yearAge--;
            }
        }

        age = {
            years: yearAge,
            months: monthAge,
            days: dateAge
        };

        if (age.years > 1)
            yearString = " YEARS";
        else
            yearString = " YEAR";
        if (age.months > 1)
            monthString = " MONTHS";
        else
            monthString = " MONTH";
        if (age.days > 1)
            dayString = " DAYS";
        else
            dayString = " DAY";


        if ((age.years > 0) && (age.months > 0) && (age.days > 0))
            ageString = age.years + yearString + " " + age.months + monthString + " " + age.days + dayString;
        else if ((age.years == 0) && (age.months == 0) && (age.days > 0))
            ageString = age.days + dayString;
        else if ((age.years > 0) && (age.months == 0) && (age.days == 0))
            ageString = age.years + yearString;
        else if ((age.years > 0) && (age.months > 0) && (age.days == 0))
            ageString = age.years + yearString + " " + age.months + monthString;
        else if ((age.years == 0) && (age.months > 0) && (age.days > 0))
            ageString = age.months + monthString + " " + age.days + dayString;
        else if ((age.years > 0) && (age.months == 0) && (age.days > 0))
            ageString = age.years + yearString + " " + age.days + dayString;
        else if ((age.years == 0) && (age.months > 0) && (age.days == 0))
            ageString = age.months + monthString;
        else
            ageString = "Oops! Could not calculate days!";

        return ageString;
    }


    //alert(getduration('01/15/2017','03/15/2017'));


</script>

