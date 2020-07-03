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

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">

        <div class="x_content">

            <div class="" id="bank_detail_Alert">
                <?php
                if (validation_errors() || isset($bank_detail_errors)) {
                    echo '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';
                    if (isset($bank_detail_errors)) {
                        echo $bank_detail_errors . '<br>';
                    }
                    echo validation_errors() . '</div><script>/*setTimeout(function(){$("#bank_detail_Alert").slideUp();},3000);*/</script>';
                }
                ?>
            </div>

            <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>index.php/Employee_insert/emp_bank_detail_insert" id="bank_detail_Form">
                <span class="section">Bank Details</span>

                <div class="form-group">
                    <label class="control-label col-md-2 col-sm-3 col-xs-12">AGREED DIRECT DEPOSIT:</label>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div id="Gender" class="btn-group" data-toggle="buttons">                            
                            <input value="1" id="Agreed_Direct_Deposit" name="Agreed_Direct_Deposit" data-toggle="toggle" data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="default" type="checkbox" <?php if (isset($Agreed_Direct_Deposit) && $Agreed_Direct_Deposit == 1) {
                    echo 'checked';
                } ?> >
                        </div>
                    </div>						
                </div>
                <div id="Bank_Detail_Section" style="display:none;">
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Ifsc_Code"><span class="requireds">*</span> IFSC CODE:</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" id="Ifsc_Code" name="Ifsc_Code" placeholder="IFSC CODE" type="text" maxlength="11" required="" value="<?php if (isset($Ifsc_Code)) {
                    echo $Ifsc_Code;
                } else {
                    echo set_value('Ifsc_Code');
                } ?>" autocomplete="off" onChange="get_bank_detail();">
                        </div>

                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Bank_Name"><span class="requireds">*</span> NAME OF THE BANK:</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" id="Bank_Name" name="Bank_Name" placeholder="NAME OF THE BANK" type="text" maxlength="100" required="" value="<?php if (isset($Bank_Name)) {
                    echo $Bank_Name;
                } else {
                    echo set_value('Bank_Name');
                } ?>" autocomplete="on">
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Account_Name"><span class="requireds">*</span> ACCOUNT NAME:</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" id="Account_Name" name="Account_Name" placeholder="ACCOUNT NAME" type="text" maxlength="100" required="" value="<?php if (isset($Account_Name)) {
                    echo $Account_Name;
                } else {
                    echo set_value('Account_Name');
                } ?>" autocomplete="off">
                        </div>

                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Account_Number"><span class="requireds">*</span> ACCOUNT NUMBER:</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" id="Account_Number" name="Account_Number" placeholder="<?php if (isset($Account_Number)) {
                    echo $Account_Number;
                } else {
                    echo set_value('Account_Number');
                } ?>" type="text" minlength="11" maxlength="17" required="" value="<?php echo set_value('Account_Number'); ?>" autocomplete="off">
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Bank_Address">BANK ADDRESS:</label>
                        <div class="col-md-10 col-sm-6 col-xs-12">
                            <textarea id="Bank_Address" name="Bank_Address" class="form-control col-md-7 col-xs-12" placeholder="BANK ADDRESS" maxlength="300" autocomplete="off" rows="4"><?php if (isset($Bank_Address)) {
                    echo $Bank_Address;
                } else {
                    echo set_value('Bank_Address');
                } ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Special_Note">SPECIAL NOTE:</label>
                        <div class="col-md-10 col-sm-6 col-xs-12">
                            <textarea id="Special_Note" name="Special_Note" class="form-control col-md-7 col-xs-12" placeholder="SPECIAL NOTE" maxlength="100" autocomplete="off"><?php if (isset($Special_Note)) {
                    echo $Special_Note;
                } else {
                    echo set_value('Special_Note');
                } ?></textarea>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="Emp_ID" name="Emp_ID" value="<?php echo $Emp_ID; ?>" maxlength="5">
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <a href="<?php echo base_url() ?>index.php/Employee/add_emp_list"><button type="button" class="btn btn-danger">Cancel</button></a>
                        <button id="send" type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
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

        /******** add method for ifsc code *******/
        $.validator.addMethod("ifsc", function (value, element) {
            return this.optional(element) || /^[A-Z|a-z]{4}[0][\d]{6}$/.test(value);
        }, "Please insert valid ifsc code");

        /******** add method for account number validation code *******/
        $.validator.addMethod("account", function (value, element) {
            return this.optional(element) || /^[A-Z0-9]{6}[\d]{5,11}$/.test(value);
        }, "Please insert valid Account Number");

        /******* add method for bank name suggestion *******/
        /* $.validator.addMethod("bank", function(value, element)	{
         return this.optional(element) || /^(a|b|ab|o|A|B|AB|O)$/.test(value);
         }, "Please insert valid Bank Name."); */


        $('#bank_detail_Form').validate({
            rules: {
                Ifsc_Code: {
                    ifsc: true
                },
                Account_Number: {
                    account: true
                }
            },
            errorElement: 'span',
            submitHandler: function (form) {
                //return false;
                form.submit();
            }
        });



        /********* Agreed direct deposit will show form to fill detail **********/
        if ($('#Agreed_Direct_Deposit').prop('checked') == true) {
            $('#Bank_Detail_Section').slideDown();
        } else {
            $('#Bank_Detail_Section').slideUp();
        }

        $('#Agreed_Direct_Deposit').change(function () {
            if ($(this).prop('checked') == true) {
                $('#Bank_Detail_Section').slideDown();
            } else {
                $('#Bank_Detail_Section').slideUp();
            }
        });
    });


    /******** ajax function to get detail of bank ********/
    function get_bank_detail() {
        var ifsc = $('#Ifsc_Code').val();
        //alert(ifsc); //return false;
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/Employee_insert/get_bank_detail',
            type: 'post',
            data: {ifsc: ifsc},
            dataType: 'json',
            success: function (resp) {
                //alert(resp.data);return false;
                if (resp.status == 'failed') {
                    $("#bank_detail_Alert").slideDown();
                    $('#bank_detail_Alert').html('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>IFSC code did not match to any result! Please check and enter again.</div>');
                    setTimeout(function () {
                        $("#bank_detail_Alert").slideUp();
                    }, 3000);

                    $('#Ifsc_Code').val('');
                    $('#Bank_Name').val('');
                    $('#Bank_Address').val('');
                } else {

                    $('#Bank_Name').val(resp.data.BANK);
                    $('#Bank_Address').val(resp.data.ADDRESS);
                }

            }
        });
    }
</script>