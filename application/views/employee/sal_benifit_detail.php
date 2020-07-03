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
                echo '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">Ã—</span></button>' . validation_errors() . '</div><script>setTimeout(function(){$("#emp_detail").slideUp();},3000);</script>';
            }
            ?>


            <div class="pull-right">
                <a href="<?php echo base_url() ?>index.php/Employee_insert/emp_sal_bnft_edit/<?= $Emp_ID; ?>"><button id="send" type="submit" class="btn btn-success">Edit</button></a>
                <a href="<?php echo base_url() ?>index.php/Employee/add_emp_list"><button type="button" class="btn btn-danger">Cancel</button></a>
            </div>


            <style>
                table {
                    font-family: arial, sans-serif;
                    border-collapse: collapse;
                    width: 30%;
                }

                td, th {
                    border: 1px solid #dddddd;
                    text-align: left;
                    padding: 8px;
                }

            </style>
            <span class="section" style="margin-top:30px;">SALARY &amp BENEFITS DETAIL</span>
            <?php
            if (isset($Emp_Sal_Bnft_Detail) && !empty($Emp_Sal_Bnft_Detail)) {
                $i = 1;
                foreach ($Emp_Sal_Bnft_Detail as $Emp_Sal_Bnft) { 
                    ?>
                    
                    <table align="center" cellpadding="3" cellspacing="3">
                        <tr><td><b>POSITION:</b> </td><td><?php echo $Position_list[$Emp_Sal_Bnft[0]['Position']]['Position_Name'] . '<br>'; ?><?php
                                if (isset($Emp_Sal_Bnft[0]['Updated_Date'])) {
                                    echo 'Joining (' . date('Y-m-d', strtotime($Emp_Sal_Bnft[0]['Updated_Date'])) . ')';
                                }
                                ?></td></tr>
                        <?php
                       
                        foreach ($Emp_Sal_Bnft as $def_list) {
                            ?>

                            <tr>
                                <td width="25%" style="text-transform: uppercase;"><?= '<b>' . $def_list['Benefit_Name'] . '</b>'; ?>:</td>
                                <td width="25%"><?php
                                    if (!empty($def_list['Benifit_Value'])) {
                                        echo $def_list['Benifit_Value'] . '&nbsp;<div class="fa fa-inr"></div>';
                                    } else {
                                        echo '0';
                                    }
                                    ?></td>
                            </tr>

                        <?php } ?></table><div class="clearfix">&nbsp;</div><?php
                    $i++;
                }
            }
            ?>

        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- /page content -->
