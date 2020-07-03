<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * 12-20-2016
 * edit_detail page(view/employee)
 */




if (!empty($result_training_detail[0])) {
    $training_detail = $result_training_detail[0];
} else {
    $training_detail = '';
}
/* //echo '<pre>'; print_r($result_training_detail[0]); exit; */


if (!empty($training_detail['Training_Name'])) {
    $Training_Name = $training_detail['Training_Name'];
} else {
    $Training_Name = '';
}

if (!empty($training_detail['Provided_By'])) {
    $Provided_By = $training_detail['Provided_By'];
} else {
    $Provided_By = '';
}

if (!empty($training_detail['Dept'])) {
    $Dept = $training_detail['Dept'];
} else {
    $Dept = '';
}

if (!empty($training_detail['Training_Start_Date'])) {
    $Training_Start_Date = $training_detail['Training_Start_Date'];
} else {
    $Training_Start_Date = '';
}

if (!empty($training_detail['Valid_For_Month'])) {
    $Valid_For_Month = $training_detail['Valid_For_Month'];
} else {
    $Valid_For_Month = '';
}

if (!empty($training_detail['Special_Note'])) {
    $Special_Note = $training_detail['Special_Note'];
} else {
    $Special_Note = '';
}
?>

<style type="text/css">
    /* Some custom styles to beautify this example */
    .demo-content{
        padding: 15px 15px 15px 15px;
        font-size: 12px;
        min-height: 200px;
        border: solid 1px #ccc;
        margin-bottom: 0px;
    }
    .demo-content.bg-alt{
        background: #abb1b8;
    }
</style>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">

        <div class="x_content form-horizontal form-label-left">
            <div class="pull-right">
                <a href="<?php echo base_url() ?>index.php/Employee/emp_training_edit/<?php echo $Emp_ID; ?>"><button id="send" type="submit" class="btn btn-success">Edit</button></a>
                <a href="<?php echo base_url() ?>index.php/Employee/add_emp_list"><button type="button" class="btn btn-danger">Cancel</button></a>
            </div>
            <span class="section">Training Details
            </span>


            <div id="Training_Detail_Section" class="demo-content">
                <div class="form-group">
                    <label class=" col-md-2 col-sm-3 col-xs-12" for="Training_Name">TRAINING NAME:</label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <?php
                        if (isset($Training_Name)) {
                            echo $Training_Name;
                        }
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class=" col-md-2 col-sm-3 col-xs-12" for="Provided_By">PROVIDED BY:</label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <?php
                        if (isset($Provided_By)) {
                            echo $Provided_By;
                        }
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class=" col-md-2 col-sm-3 col-xs-12" for="Dept">DEPARTMENT NAME:</label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <?php
                        if (isset($Dept)) {
                            echo $Dept;
                        }
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class=" col-md-2 col-sm-3 col-xs-12" for="Training_Start_Date">TRAINING START DATE:</label>

                    <div class="col-md-4 col-sm-2 col-xs-12 has-feedback">

                        <?php
                        if ($Training_Start_Date == "0000-00-00") {
                            echo '';
                        } elseif (set_value('Training_Start_Date')) {
                            echo set_value('Training_Start_Date');
                        } elseif ($Training_Start_Date != "0000-00-00") {
                            $dt2 = date_create($Training_Start_Date);
                            $Training_Start_Date1 = date_format($dt2, 'm/d/Y');
                            echo $Training_Start_Date1;
                        } else {
                            echo "";
                        }
                        ?>

                    </div>
                </div>


                <div class="form-group">
                    <label class=" col-md-2 col-sm-3 col-xs-12" for="Valid_For_Month">VALID FOR:</label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <?php
                        if (isset($Valid_For_Month)) {
                            echo $Valid_For_Month;
                        }
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class=" col-md-2 col-sm-3 col-xs-12" for="Special_Note">SPECIAL NOTE:</label>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <?php
                        if (isset($Special_Note)) {
                            echo $Special_Note;
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
</div>
<!-- /page content -->

