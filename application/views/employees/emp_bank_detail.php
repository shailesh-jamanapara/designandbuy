<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * 
 * emp_bank_detail page(view/employee)
 */

//echo '<pre>'; print_r($result_bank_detail); exit;
if (!empty($result_bank_detail[0])) {
    $bank_detail = $result_bank_detail[0];
} else {
    $bank_detail = '';
}
//echo '<pre>'; print_r($bank_detail); exit;
if (!empty($bank_detail['Agreed_Direct_Deposit'])) {
    $Agreed_Direct_Deposit = 1;
    if (!empty($bank_detail['Bank_Name'])) {
        $Bank_Name = $bank_detail['Bank_Name'];
    }
    if (!empty($bank_detail['Account_Name'])) {
        $Account_Name = $bank_detail['Account_Name'];
    }
    if (!empty($bank_detail['Account_Number'])) {
        $Account_Number = $bank_detail['Account_Number'];
    }
    if (!empty($bank_detail['Ifsc_Code'])) {
        $Ifsc_Code = $bank_detail['Ifsc_Code'];
    }
    if (!empty($bank_detail['Bank_Address'])) {
        $Bank_Address = $bank_detail['Bank_Address'];
    }
    if (!empty($bank_detail['Special_Note'])) {
        $Special_Note = $bank_detail['Special_Note'];
    }
} else {
    $Agreed_Direct_Deposit = NULL;
    $Bank_Name = NULL;
    $Account_Name = NULL;
    $Account_Number = NULL;
    $Ifsc_Code = NULL;
    $Bank_Address = NULL;
    $Special_Note = NULL;
}
?>
<head>
    <style type="text/css">
        /* Some custom styles to beautify this example */
        .demo-content{
            padding: 15px 15px 15px 15px;
            font-size: 12px;
            min-height: 0px;
            border: solid 1px #ccc;
            margin-bottom: 0px;
        }
        .demo-content.bg-alt{
            background: #abb1b8;
        }
    </style>
</head>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">

        <div class="x_content form-horizontal form-label-left" id="bank_detail_Form">
            <div class="pull-right">
                <a href="<?php echo base_url() ?>index.php/Employee_insert/bank_detail_edit/<?= $Emp_ID; ?>"><button id="send" type="submit" class="btn btn-success">Edit Bank Detail</button></a>
                <a href="<?php echo base_url() ?>index.php/Employee/add_emp_list"><button type="button" class="btn btn-danger">Cancel</button></a>
            </div>
            <span class="section">Bank Details</span>
            <div class="demo-content">
                <!-- <div class="form-group">
                    <label class="">AGREED DIRECT DEPOSIT:</label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div id="Gender" class="btn-group" data-toggle="buttons">                            
                <?php
                //$Agreed_Direct_Deposit = 1;
                /* if (isset($Agreed_Direct_Deposit) && $Agreed_Direct_Deposit == 1) {
                  echo 'Yes';
                  } else {
                  echo 'No';
                  } */
                ?>
                        </div>
                    </div>						
                </div> -->
                <?php if (isset($Agreed_Direct_Deposit) && $Agreed_Direct_Deposit == 1) { ?>
                    <div id="Bank_Detail_Section">
                        <div class="form-group">
                            <label class="col-sm-2" for="Ifsc_Code">IFSC CODE:</label>

                            <?php
                            if (isset($Ifsc_Code)) {
                                echo $Ifsc_Code;
                            } else {
                                echo set_value('Ifsc_Code');
                            }
                            ?>

                        </div>    
                        <div class="form-group">
                            <label class="col-sm-2" for="Bank_Name">NAME OF THE BANK:</label>

                            <?php
                            if (isset($Bank_Name)) {
                                echo $Bank_Name;
                            } else {
                                echo set_value('Bank_Name');
                            }
                            ?>

                        </div>

                        <div class="form-group">
                            <label class="col-sm-2" for="Account_Name">ACCOUNT NAME:</label>

                            <?php
                            if (isset($Account_Name)) {
                                echo $Account_Name;
                            } else {
                                echo '--';
                            }
                            ?>

                        </div>
                        <div class="form-group">
                            <label class="col-sm-2" for="Account_Number">ACCOUNT NUMBER:</label>

                            <?php
                            if (isset($Account_Number)) {
                                echo $Account_Number;
                            } else {
                                echo '--';
                            }
                            ?>

                        </div>

                        <div class="form-group">
                            <label class="col-sm-2" for="Bank_Address">BANK ADDRESS:</label>

                            <?php
                            if (isset($Bank_Address)) {
                                echo $Bank_Address;
                            }
                            ?></textarea>

                        </div>

                        <div class="form-group">
                            <label class="col-sm-2" for="Special_Note">SPECIAL NOTE:</label>

                            <?php
                            if (isset($Special_Note)) {
                                echo $Special_Note;
                            } else {
                                echo set_value('Special_Note');
                            }
                            ?>

                        </div>
                    </div>
                    <?php
                } else {
                    echo "<strong>Bank data not available</strong>";
                }
                ?> 
            </div>

        </div>
    </div>
</div>

</div>
</div>
</div>
<!-- /page content -->
