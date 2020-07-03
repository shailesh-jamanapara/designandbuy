<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * 
 * sal_benifit_detail page(view/employee)
 */

//echo '<pre>'; print_r($Emp_Sal_Bnft_Detail);
//echo '<pre>'; print_r($Default_List); exit;
?>


<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">

        <div class="x_content form-horizontal form-label-left">

            <?php
            if (validation_errors()) {
                echo '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>' . validation_errors() . '</div><script>setTimeout(function(){$("#emp_detail").slideUp();},3000);</script>';
            }
            ?>


            <div class="pull-right">
                <a href="<?php echo base_url() ?>index.php/Employee_insert/emp_sal_bnft_edit/<?= $Emp_ID; ?>"><button id="send" type="submit" class="btn btn-success">Edit</button></a>
                <a href="<?php echo base_url() ?>index.php/Employee/add_emp_list"><button type="button" class="btn btn-danger">Cancel</button></a>
            </div>
            <span class="section">Salary &amp Benifits Detail</span>
            <div class="controls">
                <div class="append_section">  
                    <?php
                    if (isset($Emp_Sal_Bnft_Detail) && !empty($Emp_Sal_Bnft_Detail)) {
                        foreach ($Emp_Sal_Bnft_Detail as $Emp_Sal_Bnft) {
                            $Bnft_List = '';
                            $Bnft_value = '';
                            $Position = '';
                            $Date = '';
                            for ($i = 0; $i < count($Emp_Sal_Bnft); $i++) {
                                $Bnft_List[] = $Emp_Sal_Bnft[$i]['Ear_ID'];
                                $Bnft_value[$Emp_Sal_Bnft[$i]['Ear_ID']] = $Emp_Sal_Bnft[$i]['Benifit_Value'];
                                $Position = $Emp_Sal_Bnft[$i]['Position'];
                                $Date = $Emp_Sal_Bnft[$i]['Date'];
                            }  //echo $Position.', ';	echo $Date.', '; print_r($Bnft_List);	print_r($Bnft_value);
                            ?>
                            <div class="x_panel">
                                <div class="x_title" style="border-bottom:0;">

                                    <div class="clearfix"></div>							

                                    <div class="item form-group row ">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-10" for="">POSITION:</label>
                                        <div class="col-md-3 col-sm-3 col-xs-12 has-feedback">
                                            <?php echo $Position_Name; ?>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12 has-feedback">
                                            <?php
                                            if (isset($Date)) {
                                                echo $Date;
                                            }
                                            ?>

                                        </div>
                                    </div>

                                </div>
                                <?php
                                foreach ($Default_List as $def_list) {
                                    // echo '<br>'.$Sal_Bnft['Ear_ID'];									
                                    ?>
                                    <div class="x_content">
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="" style="text-transform: uppercase;"><?= $def_list['Benefit_Name']; ?>:</label>									
                                            <div class="col-md-3 col-sm-3 col-xs-12 has-feedback ">
                                                <?php
                                                if (array_key_exists($def_list['Ear_ID'], $Bnft_value)) {
                                                    echo $Bnft_value[$def_list['Ear_ID']];
                                                } else {
                                                    echo '0';
                                                }
                                                ?>
                                                <span class="fa fa-inr" aria-hidden="true"></span>
                                            </div>									
                                        </div>
                                    </div>							
                                <?php } ?>

                            </div>

                            <?php
                        }
                    } else {
                        ?>
                        <div class="x_panel">
                            <div class="x_title" style="border-bottom:0;">

                                <div class="clearfix"></div>							

                                <div class="item form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-10" for="">POSITION:</label>
                                    <div class="col-md-3 col-sm-3 col-xs-12 has-feedback">
    <?php echo $Position_Name; ?>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12 has-feedback">
                                        <?php
                                        if (isset($Joining_Date)) {
                                            echo $Joining_Date;
                                        }
                                        ?>

                                    </div>
                                </div>

                            </div>
                            <?php
                            foreach ($Default_List as $def_list) {
                                // echo '<br>'.$Sal_Bnft['Ear_ID'];									
                                ?>
                                <div class="x_content">
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="" style="text-transform: uppercase;"><?= $def_list['Benefit_Name']; ?>:</label>									
                                        <div class="col-md-3 col-sm-3 col-xs-12 has-feedback ">
                                            <?php
                                            if (array_key_exists($def_list['Ear_ID'], $Bnft_value)) {
                                                echo $Bnft_value[$def_list['Ear_ID']];
                                            } else {
                                                echo '0';
                                            }
                                            ?>
                                            <span class="fa fa-inr" aria-hidden="true"></span>
                                        </div>									
                                    </div>
                                </div>							
    <?php } ?>

                        </div>
<?php } ?>



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
