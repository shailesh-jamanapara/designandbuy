<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * 12-20-2016
 * edit_detail page(view/employee)
 */
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

        <div class="x_content">
            <div class="" id="doc_detail" >
                <?php
                if (validation_errors()) {
                    echo '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>' . validation_errors() . '</div><script>setTimeout(function(){$("#doc_detail").slideUp();},3000);</script>';
                }
                ?>
                <?php
                $query = $this->db->query("SELECT * FROM emp_document where Emp_ID='" . $Emp_ID . "'");
                $row = $query->row();
                //   print_r($row); 
                ?>

            </div>
            <form class="form-horizontal form-label-left" id="document_employee" novalidate method="POST" action="<?php echo base_url(); ?>index.php/Employee/insert_document" enctype="multipart/form-data">

                <input type="hidden" id="Emp_ID" name="Emp_ID" value="<?php echo $Emp_ID; ?>">
                <span class="section">Document Information</span>
                <div class="demo-content">
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-4 col-xs-6 lable_title">DOCUMENT</label>
                        <label class="control-label col-md-1 col-sm-6 col-xs-6 lable_title">RECEIVED</label>
                        <label class="control-label col-md-2 col-sm-6 col-xs-6 lable_title">DATE</label>
                        <label class="control-label col-md-2 col-sm-6 col-xs-6 lable_title" style="text-align: left;">BROWSE FILE</label>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">PASSPORT SIZE PHOTOS:</label>
                        <div class="col-md-1 col-sm-6 col-xs-12">
                            <div id="Passport_Photo1" class="btn-group" data-toggle="buttons">

                                <input checked data-toggle="toggle " id="Passport_Photo" name="Passport_Photo" value="1" <?php echo set_checkbox('Passport_Photo', '1'); ?> data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="default" type="checkbox">

                            </div>
                        </div>
                        <div id="Passport_Photo_id" style="display:block;">

                            <div class="col-md-2 col-sm-2 col-xs-12 has-feedback" >
                                <input  name="Passport_Photo_date" id="Passport_Photo_date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="Date eg. 12/27/2016" type="text" value="<?php
                                if (set_value('Passport_Photo_Date')) {
                                    echo set_value('Passport_Photo_Date');
                                } else {
                                    if ($row->Passport_Photo_Date != '0000-00-00') {
                                        $dt2 = date_create($row->Passport_Photo_Date);
                                        $DOB = date_format($dt2, 'm/d/Y');
                                        echo $DOB;
                                    }
                                }
                                ?>" ><span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <?php if (empty($row->Passport_Photo_File)) { ?>	
                                <div class="col-md-2 col-sm-3 col-xs-12 ">						
                                    <label class="control-label">
                                        <input id="Passport_Photo_Upload1" name="Passport_Photo_Upload1"  type="hidden"  value="<?php echo $row->Passport_Photo_File; ?>">

                                        <input id="Passport_Photo_Upload" name="Passport_Photo_Upload"  type="file"  value="<?php echo $row->Passport_Photo_File; ?>">

                                    </label>						
                                </div>
                            <?php } ?>
                            <?php if (!empty($row->Passport_Photo_File)) { ?>						
                                <div class="col-md-2 col-sm-3 col-xs-12" id="deletid">

                                    &nbsp;<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Delete" onclick="javascript:deleteimage('<?php echo $row->Passport_Photo_File; ?>', '<?php echo $Emp_ID; ?>')"><i style="font-size:25px;color: #d9534f;vertical-align:middle;" class="fa fa-remove"></i></a>
                                    &nbsp;<a href="<?php echo base_url(); ?>uploads/<?php echo $row->Passport_Photo_File; ?>" data-toggle="tooltip" data-placement="top" title="Download" download> <i class="fa fa-download" style="font-size:25px;color:green;vertical-align:middle;"aria-hidden="true"></i>
                                    </a>
                                </div>
                            <?php } ?>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">RESIDENT PROOF:</label>
                        <div class="col-md-1 col-sm-6 col-xs-12">
                            <div id="Resident_Proof11" class="btn-group" data-toggle="buttons">

                                <?php if ($row->Resident_Proof_Date == '0000-00-00' || empty($row->Resident_Proof_Date)) { ?>
                                    <input  data-toggle="toggle" name="Resident_Proof" value="1" <?php echo set_checkbox('Resident_Proof', '1'); ?> id="Resident_Proof" data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="default" type="checkbox">
                                <?php } else { ?>

                                    <input checked data-toggle="toggle" name="Resident_Proof" value="1" <?php echo set_checkbox('Resident_Proof', '1'); ?> id="Resident_Proof" data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="default" type="checkbox">
                                <?php } ?>
                            </div>
                        </div>


                        <?php if ($row->Resident_Proof_Date != "0000-00-00" && $row->Resident_Proof_Date != "") { ?>
                            <div id="resident_id">
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">
                                    <input  name="Resident_Proof_Date" id="Resident_Proof_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="Date eg. 12/27/2016" type="text" value="<?php
                                    if (set_value('Resident_Proof_Date')) {
                                        echo set_value('Resident_Proof_Date');
                                    } else {
                                        if ($row->Resident_Proof_Date != '0000-00-00') {
                                            $dt2 = date_create($row->Resident_Proof_Date);
                                            $resdt = date_format($dt2, 'm/d/Y');
                                            echo $resdt;
                                        }
                                    }
                                    ?>" ><span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <?php if (empty($row->Resident_Proof_File)) { ?>	
                                    <div class="col-md-5 col-sm-3 col-xs-12">
                                        <label class="control-label"> 
                                            <input name="Resident_Proof_Upload" id="Resident_Proof_Upload" value="<?php echo $row->Resident_Proof_File; ?>" type="file" >
                                        </label>
                                    </div>
                                <?php } ?>
                                <?php if (!empty($row->Resident_Proof_File)) { ?>						
                                    <div class="col-md-2 col-sm-3 col-xs-12" id="deletid">

                                        &nbsp;<a href="javascript:void(0);"  data-toggle="tooltip" data-placement="top" title="Delete" onclick="javascript:deleteimage1('<?php echo $row->Resident_Proof_File; ?>', '<?php echo $Emp_ID; ?>')"><i style="font-size:25px;color: #d9534f;vertical-align:middle;" class="fa fa-remove"></i></a>
                                        &nbsp;<a href="<?php echo base_url(); ?>uploads/<?php echo $row->Resident_Proof_File; ?>" data-toggle="tooltip" data-placement="top" title="Download" download> <i class="fa fa-download" style="font-size:25px;color:green;vertical-align:middle;"aria-hidden="true"></i>
                                        </a>
                                    </div>
                                <?php } ?>


                            </div>

                        <?php } else { ?>
                            <div id="resident_id" style="display:none;">
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">
                                    <input  name="Resident_Proof_Date" id="Resident_Proof_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="Date eg. 12/27/2016" type="text"  >
                                    <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-5 col-sm-3 col-xs-12">
                                    <label class="control-label"> 
                                        <input name="Resident_Proof_Upload" id="Resident_Proof_Upload"  value="" type="file">

                                    </label>
                                </div>
                            </div>

                        <?php } ?>


                    </div>



                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">REGISTERD RENT PROOF:</label>
                        <div class="col-md-1 col-sm-6 col-xs-12">
                            <div  class="btn-group" data-toggle="buttons">

                                <?php if ($row->Registered_Rent_Proof_Date == '0000-00-00' || empty($row->Registered_Rent_Proof_Date)) { ?>
                                    <input data-toggle="toggle"  id="Registered_Rent_Proof" name="Registered_Rent_Proof" value="1" <?php echo set_checkbox('Registered_Rent_Proof', '1'); ?> data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="default" type="checkbox">
                                <?php } else { ?>
                                    <input checked data-toggle="toggle"  id="Registered_Rent_Proof" name="Registered_Rent_Proof" value="1" <?php echo set_checkbox('Registered_Rent_Proof', '1'); ?> data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="default" type="checkbox">
                                <?php } ?>
                            </div>
                        </div>

                        <?php if ($row->Registered_Rent_Proof_Date != "0000-00-00" && $row->Registered_Rent_Proof_Date != "") { ?>

                            <div id="Registered_Rent_Proof_id" >
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">

                                    <input  name="Registered_Rent_Proof_Date" id="Registered_Rent_Proof_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="Date eg. 12/27/2016" type="text" value="<?php
                                    if (set_value('Registered_Rent_Proof_Date')) {
                                        echo set_value('Registered_Rent_Proof_Date');
                                    } else {
                                        if ($row->Registered_Rent_Proof_Date != '0000-00-00') {
                                            $dt2 = date_create($row->Registered_Rent_Proof_Date);
                                            $resdt = date_format($dt2, 'm/d/Y');
                                            echo $resdt;
                                        }
                                    }
                                    ?>" ><span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <?php if (empty($row->Registered_Rent_Proof_File)) { ?>
                                    <div class="col-md-5 col-sm-3 col-xs-12">

                                        <label class="control-label"> 
                                            <input id="Registered_Rent_Proof_Upload"  name="Registered_Rent_Proof_Upload"  type="file"></label>

                                    </div>
                                <?php } ?>

                                <?php if (!empty($row->Registered_Rent_Proof_File)) { ?>						
                                    <div class="col-md-2 col-sm-3 col-xs-12" id="deletid">

                                        &nbsp;<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Delete"  onclick="javascript:deleteimage2('<?php echo $row->Registered_Rent_Proof_File; ?>', '<?php echo $Emp_ID; ?>')"><i style="font-size:25px;color: #d9534f;vertical-align:middle;" class="fa fa-remove"></i></a>
                                        &nbsp;<a href="<?php echo base_url(); ?>uploads/<?php echo $row->Registered_Rent_Proof_File; ?>" data-toggle="tooltip" data-placement="top" title="Download" download> <i class="fa fa-download" style="font-size:25px;color:green;vertical-align:middle;"aria-hidden="true"></i>
                                        </a>
                                    </div>
                                <?php } ?>


                            </div>
                        <?php } else { ?>
                            <div id="Registered_Rent_Proof_id" style="display:none;">
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">
                                    <input  name="Registered_Rent_Proof_Date" id="Registered_Rent_Proof_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="Date eg. 12/27/2016" type="text">
                                    <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-5 col-sm-3 col-xs-12">
                                    <label class="control-label"> <input id="Registered_Rent_Proof_Upload"  name="Registered_Rent_Proof_Upload"  type="file"></label>
                                </div>
                            </div>
                        <?php } ?>

                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">SIGNED RESIGNATION LETTER:</label>
                        <div class="col-md-1 col-sm-6 col-xs-12">
                            <div  class="btn-group" data-toggle="buttons">
                                <?php if ($row->Signed_Resignation_Letter_Date == '0000-00-00' || empty($row->Signed_Resignation_Letter_Date)) { ?>
                                    <input data-toggle="toggle" id="Signed_Resignation_Letter"  name="Signed_Resignation_Letter" value="1" <?php echo set_checkbox('Signed_Resignation_Letter', '1'); ?> data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="default" type="checkbox">
                                <?php } else { ?>
                                    <input checked data-toggle="toggle" id="Signed_Resignation_Letter"  name="Signed_Resignation_Letter" value="1" <?php echo set_checkbox('Signed_Resignation_Letter', '1'); ?> data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="default" type="checkbox">
                                <?php } ?>
                            </div>
                        </div>

                        <?php if ($row->Signed_Resignation_Letter_Date != "0000-00-00" && $row->Signed_Resignation_Letter_Date != "") { ?>
                            <div id="Signed_Resignation_Letter_id" >

                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">
                                    <input  name="Signed_Resignation_Letter_Date" id="Signed_Resignation_Letter_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="Date eg. 12/27/2016" type="text" value="<?php
                                    if (set_value('Signed_Resignation_Letter_Date')) {
                                        echo set_value('Signed_Resignation_Letter_Date');
                                    } else {
                                        if ($row->Signed_Resignation_Letter_Date != '0000-00-00') {
                                            $dt2 = date_create($row->Signed_Resignation_Letter_Date);
                                            $resdt1 = date_format($dt2, 'm/d/Y');
                                            echo $resdt1;
                                        }
                                    }
                                    ?>" >
                                    <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>  

                                </div>
                                <?php if (empty($row->Signed_Resignation_Letter_File)) { ?>
                                    <div class="col-md-5 col-sm-3 col-xs-12">
                                        <label class="control-label"> 
                                            <input id="Signed_Resignation_Letter_Upload"  name="Signed_Resignation_Letter_Upload"  type="file"></label>
                                    </div>
                                <?php } ?>


                                <?php if (!empty($row->Signed_Resignation_Letter_File)) { ?>						
                                    <div class="col-md-2 col-sm-3 col-xs-12" id="deletid">

                                        &nbsp;<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Delete" onclick="javascript:deleteimage4('<?php echo $row->Signed_Resignation_Letter_File; ?>', '<?php echo $Emp_ID; ?>')"><i style="font-size:25px;color: #d9534f;vertical-align:middle;" class="fa fa-remove"></i></a>
                                        &nbsp;<a href="<?php echo base_url(); ?>uploads/<?php echo $row->Signed_Resignation_Letter_File; ?>" data-toggle="tooltip" data-placement="top" title="Download" download> <i class="fa fa-download" style="font-size:25px;color:green;vertical-align:middle;"aria-hidden="true"></i>
                                        </a>
                                    </div>
                                <?php } ?>





                            </div>
                        <?php } else { ?>

                            <div id="Signed_Resignation_Letter_id" style="display:none;">

                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">
                                    <input  name="Signed_Resignation_Letter_Date" id="Signed_Resignation_Letter_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="Date eg. 12/27/2016" type="text">
                                    <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-5 col-sm-3 col-xs-12">
                                    <label class="control-label"> <input id="Signed_Resignation_Letter_Upload"  name="Signed_Resignation_Letter_Upload"  type="file"></label>
                                </div>
                            </div>

                        <?php } ?>

                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">LAST SALARY SLIP:</label>
                        <div class="col-md-1 col-sm-6 col-xs-12">
                            <div  class="btn-group" data-toggle="buttons">
                                <?php if ($row->Last_Salary_Slip_Date == '0000-00-00' || empty($row->Last_Salary_Slip_Date)) { ?>
                                    <input data-toggle="toggle" id="Last_Salary_Slip" name="Last_Salary_Slip" value="1" <?php echo set_checkbox('Last_Salary_Slip', '1'); ?> data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="default" type="checkbox">
                                <?php } else { ?>
                                    <input checked data-toggle="toggle" id="Last_Salary_Slip" name="Last_Salary_Slip" value="1" <?php echo set_checkbox('Last_Salary_Slip', '1'); ?> data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="default" type="checkbox">
                                <?php } ?>
                            </div>
                        </div>

                        <?php if ($row->Last_Salary_Slip_Date != "0000-00-00" && $row->Last_Salary_Slip_Date != "") { ?>
                            <div id="Last_Salary_Slip_id" >
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">
                                    <input  name="Last_Salary_Slip_Date" id="Last_Salary_Slip_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="Date eg. 12/27/2016" type="text" value="<?php
                                    if (set_value('Last_Salary_Slip_Date')) {
                                        echo set_value('Last_Salary_Slip_Date');
                                    } else {
                                        if ($row->Last_Salary_Slip_Date != '0000-00-00') {
                                            $dt2 = date_create($row->Last_Salary_Slip_Date);
                                            $resdt1 = date_format($dt2, 'm/d/Y');
                                            echo $resdt1;
                                        }
                                    }
                                    ?>" ><span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <?php if (empty($row->Last_Salary_Slip_File)) { ?>
                                    <div class="col-md-5 col-sm-3 col-xs-12">
                                        <label class="control-label"> 
                                            <input id="Last_Salary_Slip_Upload"  name="Last_Salary_Slip_Upload"  type="file"></label>
                                    </div>
                                <?php } ?>

                                <?php if (!empty($row->Last_Salary_Slip_File)) { ?>						
                                    <div class="col-md-2 col-sm-3 col-xs-12" id="deletid">

                                        &nbsp;<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Delete" onclick="javascript:deleteimage5('<?php echo $row->Last_Salary_Slip_File; ?>', '<?php echo $Emp_ID; ?>')"><i style="font-size:25px;color: #d9534f;vertical-align:middle;" class="fa fa-remove"></i></a>
                                        &nbsp;<a href="<?php echo base_url(); ?>uploads/<?php echo $row->Last_Salary_Slip_File; ?>" data-toggle="tooltip" data-placement="top" title="Download" download> <i class="fa fa-download" style="font-size:25px;color:green;vertical-align:middle;"aria-hidden="true"></i>
                                        </a>
                                    </div>
                                <?php } ?>


                            </div>
                        <?php } else { ?>
                            <div id="Last_Salary_Slip_id" style="display:none;">
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">
                                    <input  name="Last_Salary_Slip_Date" id="Last_Salary_Slip_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="Date eg. 12/27/2016" type="text" value="" >
                                    <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-5 col-sm-3 col-xs-12">
                                    <label class="control-label"> <input id="Last_Salary_Slip_Upload"  name="Last_Salary_Slip_Upload"  type="file"></label>

                                </div>
                            </div>
                        <?php } ?>

                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">APPLICATION FORM:</label>
                        <div class="col-md-1 col-sm-6 col-xs-12">
                            <div  class="btn-group" data-toggle="buttons">
                                <?php if ($row->Application_Form_Date == '0000-00-00' || empty($row->Application_Form_Date)) { ?>
                                    <input data-toggle="toggle" id="Application_Form" name="Application_Form" value="1" <?php echo set_checkbox('Application_Form', '1'); ?> data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="default" type="checkbox">
                                <?php } else { ?>
                                    <input checked data-toggle="toggle" id="Application_Form" name="Application_Form" value="1" <?php echo set_checkbox('Application_Form', '1'); ?> data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="default" type="checkbox">	
                                <?php } ?>

                            </div>
                        </div>

                        <?php if ($row->Application_Form_Date != "0000-00-00" && $row->Application_Form_Date != "") { ?>
                            <div id="Application_Form_id" >
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">

                                    <input  name="Application_Form_Date" id="Application_Form_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="Date eg. 12/27/2016" type="text" value="<?php
                                    if (set_value('Application_Form_Date')) {
                                        echo set_value('Application_Form_Date');
                                    } else {
                                        if ($row->Application_Form_Date != '0000-00-00') {
                                            $dt2 = date_create($row->Application_Form_Date);
                                            $resdt2 = date_format($dt2, 'm/d/Y');
                                            echo $resdt2;
                                        }
                                    }
                                    ?>" ><span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <?php if (empty($row->Application_Form_File)) { ?>
                                    <div class="col-md-5 col-sm-3 col-xs-12">
                                        <label class="control-label"> 
                                            <input id="Application_Form_Upload"  name="Application_Form_Upload"  type="file">
                                        </label>

                                    </div>
                                <?php } ?>


                                <?php if (!empty($row->Application_Form_File)) { ?>						
                                    <div class="col-md-2 col-sm-3 col-xs-12" id="deletid">

                                        &nbsp;<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Delete" onclick="javascript:deleteimage6('<?php echo $row->Application_Form_File; ?>', '<?php echo $Emp_ID; ?>')"><i style="font-size:25px;color: #d9534f;vertical-align:middle;" class="fa fa-remove"></i></a>
                                        &nbsp;<a href="<?php echo base_url(); ?>uploads/<?php echo $row->Application_Form_File; ?>" data-toggle="tooltip" data-placement="top" title="Download" download> <i class="fa fa-download" style="font-size:25px;color:green;vertical-align:middle;"aria-hidden="true"></i>
                                        </a>
                                    </div>
                                <?php } ?>



                            </div>
                        <?php } else { ?>
                            <div id="Application_Form_id" style="display:none;">
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">
                                    <input  name="Application_Form_Date" id="Application_Form_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="Date eg. 12/27/2016"  type="text">
                                    <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-5 col-sm-3 col-xs-12">
                                    <label class="control-label"> <input id="Application_Form_Upload"  name="Application_Form_Upload"  type="file"></label>
                                </div>
                            </div>
                        <?php } ?>

                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">CODE OF CONDUCT:</label>
                        <div class="col-md-1 col-sm-6 col-xs-12">
                            <div  class="btn-group" data-toggle="buttons">
                                <?php if ($row->Code_Of_Conduct_Date == "0000-00-00" || empty($row->Code_Of_Conduct_Date)) { ?>
                                    <input data-toggle="toggle" id="Code_Of_Conduct" name="Code_Of_Conduct" value="1" <?php echo set_checkbox('Code_Of_Conduct', '1'); ?> data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="default" type="checkbox">
                                <?php } else { ?>
                                    <input checked data-toggle="toggle" id="Code_Of_Conduct" name="Code_Of_Conduct" value="1" <?php echo set_checkbox('Code_Of_Conduct', '1'); ?> data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="default" type="checkbox">
                                <?php } ?>

                            </div>
                        </div>
                        <?php if ($row->Code_Of_Conduct_Date != "0000-00-00" && $row->Code_Of_Conduct_Date != "") { ?>
                            <div id="Code_Of_Conduct_id" >
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">
                                    <input  name="Code_Of_Conduct_Date" id="Code_Of_Conduct_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="Date eg. 12/27/2016" type="text" value="<?php
                                    if (set_value('Code_Of_Conduct_Date')) {
                                        echo set_value('Code_Of_Conduct_Date');
                                    } else {
                                        if ($row->Code_Of_Conduct_Date != '0000-00-00') {
                                            $dt2 = date_create($row->Code_Of_Conduct_Date);
                                            $resdt2 = date_format($dt2, 'm/d/Y');
                                            echo $resdt2;
                                        }
                                    }
                                    ?>" ><span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <?php if (empty($row->Code_Of_Conduct_File)) { ?>
                                    <div class="col-md-5 col-sm-3 col-xs-12">
                                        <label class="control-label"> 
                                            <input id="Code_Of_Conduct_Upload"  name="Code_Of_Conduct_Upload"  type="file"></label>
                                    </div>
                                <?php } ?>
                                <?php if (!empty($row->Code_Of_Conduct_File)) { ?>						
                                    <div class="col-md-2 col-sm-3 col-xs-12" id="deletid">

                                        &nbsp;<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Delete" onclick="javascript:deleteimage7('<?php echo $row->Code_Of_Conduct_File; ?>', '<?php echo $Emp_ID; ?>')"><i style="font-size:25px;color: #d9534f;vertical-align:middle;" class="fa fa-remove"></i></a>
                                        &nbsp;<a href="<?php echo base_url(); ?>uploads/<?php echo $row->Code_Of_Conduct_File; ?>" data-toggle="tooltip" data-placement="top" title="Download"  download> <i class="fa fa-download" style="font-size:25px;color:green;vertical-align:middle;"aria-hidden="true"></i>
                                        </a>
                                    </div>
                                <?php } ?>


                            </div>
                        <?php } else { ?>
                            <div id="Code_Of_Conduct_id" style="display:none;">
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">
                                    <input  name="Code_Of_Conduct_Date" id="Code_Of_Conduct_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="Date eg. 12/27/2016" type="text">
                                    <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-5 col-sm-3 col-xs-12">
                                    <label class="control-label"> <input id="Code_Of_Conduct_Upload"  name="Code_Of_Conduct_Upload"  type="file"></label>
                                </div>
                            </div>
                        <?php } ?>

                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">DISCLOSURE Of CONFIDENTAIL INFORMATION:</label>
                        <div class="col-md-1 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                                <?php if ($row->Disclosure_Of_Confidentail_Information_Date == "0000-00-00" || empty($row->Disclosure_Of_Confidentail_Information_Date)) { ?>
                                    <input data-toggle="toggle" id="Disclosure_Of_Confidentail_Information" name="Disclosure_Of_Confidentail_Information" value="1" <?php echo set_checkbox('Disclosure_Of_Confidentail_Information', '1'); ?> data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="default" type="checkbox">
                                <?php } else { ?>
                                    <input checked data-toggle="toggle" id="Disclosure_Of_Confidentail_Information" name="Disclosure_Of_Confidentail_Information" value="1" <?php echo set_checkbox('Disclosure_Of_Confidentail_Information', '1'); ?> data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="default" type="checkbox">
                                <?php } ?>
                            </div>
                        </div>

                        <?php if ($row->Disclosure_Of_Confidentail_Information_Date != "0000-00-00" && $row->Disclosure_Of_Confidentail_Information_Date != "") { ?>

                            <div id="Disclosure_Of_Confidentail_Information_id" >
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">
                                    <input  name="Disclosure_Of_Confidentail_Information_Date" id="Disclosure_Of_Confidentail_Information_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="Date eg. 12/27/2016" type="text" value="<?php
                                    if (set_value('Disclosure_Of_Confidentail_Information_Date')) {
                                        echo set_value('Disclosure_Of_Confidentail_Information_Date');
                                    } else {
                                        if ($row->Disclosure_Of_Confidentail_Information_Date != '0000-00-00') {
                                            $dt2 = date_create($row->Disclosure_Of_Confidentail_Information_Date);
                                            $resdt3 = date_format($dt2, 'm/d/Y');
                                            echo $resdt3;
                                        }
                                    }
                                    ?>" ><span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <?php if (empty($row->Disclosure_Of_Confidentail_Information_File)) { ?>
                                    <div class="col-md-5 col-sm-3 col-xs-12">
                                        <label class="control-label">
                                            <input id="Disclosure_Of_Confidentail_Information_Upload"  name="Disclosure_Of_Confidentail_Information_Upload"  type="file"></label>
                                    </div>
                                <?php } ?>


                                <?php if (!empty($row->Disclosure_Of_Confidentail_Information_File)) { ?>						
                                    <div class="col-md-2 col-sm-3 col-xs-12" id="deletid">

                                        &nbsp;<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Delete" onclick="javascript:deleteimage8('<?php echo $row->Disclosure_Of_Confidentail_Information_File; ?>', '<?php echo $Emp_ID; ?>')"><i style="font-size:25px;color: #d9534f;vertical-align:middle;" class="fa fa-remove"></i></a>
                                        &nbsp;<a href="<?php echo base_url(); ?>uploads/<?php echo $row->Disclosure_Of_Confidentail_Information_File; ?>" data-toggle="tooltip" data-placement="top" title="Download"  download> <i class="fa fa-download" style="font-size:25px;color:green;vertical-align:middle;"aria-hidden="true"></i>
                                        </a>
                                    </div>
                                <?php } ?>



                            </div>
                        <?php } else { ?>
                            <div id="Disclosure_Of_Confidentail_Information_id" style="display:none;">
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">
                                    <input  name="Disclosure_Of_Confidentail_Information_Date" id="Disclosure_Of_Confidentail_Information_Date" placeholder="Date eg. 12/27/2016" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right"  type="text">
                                    <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>                       
                                </div>
                                <div class="col-md-5 col-sm-3 col-xs-12">
                                    <label class="control-label"> <input id="Disclosure_Of_Confidentail_Information_Upload"  name="Disclosure_Of_Confidentail_Information_Upload"  type="file"></label>
                                </div>
                            </div>
                        <?php } ?>


                    </div> 
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">ORIGINAL MARKSHEET:</label>
                        <div class="col-md-1 col-sm-6 col-xs-12">
                            <div  class="btn-group" data-toggle="buttons">
                                <?php if ($row->Original_Marksheet_Date == "0000-00-00" || empty($row->Original_Marksheet_Date)) { ?>
                                    <input data-toggle="toggle" id="Original_Marksheet"  name="Original_Marksheet" value="1" <?php echo set_checkbox('Original_Marksheet', '1'); ?> data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="default" type="checkbox">
                                <?php } else { ?>
                                    <input checked data-toggle="toggle" id="Original_Marksheet"  name="Original_Marksheet" value="1" <?php echo set_checkbox('Original_Marksheet', '1'); ?> data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="default" type="checkbox">
                                <?php } ?>
                            </div>
                        </div>
                        <?php if ($row->Original_Marksheet_Date != "0000-00-00" && $row->Original_Marksheet_Date != "") { ?>
                            <div id="Original_Marksheet_id" >
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">
                                    <input  name="Original_Marksheet_Date" id="Original_Marksheet_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="Date eg. 12/27/2016" type="text" value="<?php
                                    if (set_value('Original_Marksheet_Date')) {
                                        echo set_value('Original_Marksheet_Date');
                                    } else {
                                        if ($row->Original_Marksheet_Date != '0000-00-00') {
                                            $dt2 = date_create($row->Original_Marksheet_Date);
                                            $resdt3 = date_format($dt2, 'm/d/Y');
                                            echo $resdt3;
                                        }
                                    }
                                    ?>" ><span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>

                                </div>
                                <?php if (empty($row->Original_Marksheet_File)) { ?>
                                    <div class="col-md-5 col-sm-3 col-xs-12">
                                        <label class="control-label"> 
                                            <input id="Original_Marksheet_Upload"  name="Original_Marksheet_Upload"  type="file"></label>
                                    </div>
                                <?php } ?>

                                <?php if (!empty($row->Original_Marksheet_File)) { ?>						
                                    <div class="col-md-2 col-sm-3 col-xs-12" id="deletid">

                                        &nbsp;<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Delete" onclick="javascript:deleteimage9('<?php echo $row->Original_Marksheet_File; ?>', '<?php echo $Emp_ID; ?>')"><i style="font-size:25px;color: #d9534f;vertical-align:middle;" class="fa fa-remove"></i></a>
                                        &nbsp;<a href="<?php echo base_url(); ?>uploads/<?php echo $row->Original_Marksheet_File; ?>" data-toggle="tooltip" data-placement="top" title="Download" download> <i class="fa fa-download" style="font-size:25px;color:green;vertical-align:middle;"aria-hidden="true"></i>
                                        </a>
                                    </div>
                                <?php } ?>

                            </div>
                        <?php } else { ?>

                            <div id="Original_Marksheet_id" style="display:none;">
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">
                                    <input  name="Original_Marksheet_Date" id="Original_Marksheet_Date"  class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="Date eg. 12/27/2016" type="text">
                                    <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-5 col-sm-3 col-xs-12">
                                    <label class="control-label"> <input id="Original_Marksheet_Upload"  name="Original_Marksheet_Upload"  type="file"></label>
                                </div>
                            </div>
                        <?php } ?>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">ORIGINAL DEGREE CERTIFICATE:</label>
                        <div class="col-md-1 col-sm-6 col-xs-12">
                            <div  class="btn-group" data-toggle="buttons">
                                <?php if ($row->Original_Degree_Certificate_Date == "0000-00-00" || empty($row->Original_Degree_Certificate_Date)) { ?>
                                    <input data-toggle="toggle" id="Original_Degree_Certificate" name="Original_Degree_Certificate" value="1" <?php echo set_checkbox('Original_Degree_Certificate', '1'); ?> data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="default" type="checkbox">
                                <?php } else { ?>
                                    <input checked data-toggle="toggle" id="Original_Degree_Certificate" name="Original_Degree_Certificate" value="1" <?php echo set_checkbox('Original_Degree_Certificate', '1'); ?> data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="default" type="checkbox">
                                <?php } ?>
                            </div>
                        </div>
                        <?php if ($row->Original_Degree_Certificate_Date != "0000-00-00" && $row->Original_Degree_Certificate_Date != "") { ?>
                            <div id="Original_Degree_Certificate_id" >
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">
                                    <input  name="Original_Degree_Certificate_Date" id="Original_Degree_Certificate_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="Date eg. 12/27/2016" type="text" value="<?php
                                    if (set_value('Original_Degree_Certificate_Date')) {
                                        echo set_value('Original_Degree_Certificate_Date');
                                    } else {
                                        if ($row->Original_Degree_Certificate_Date != '0000-00-00') {
                                            $dt2 = date_create($row->Original_Degree_Certificate_Date);
                                            $resdt3 = date_format($dt2, 'm/d/Y');
                                            echo $resdt3;
                                        }
                                    }
                                    ?>" ><span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <?php if (empty($row->Original_Degree_Certificate_File)) { ?>
                                    <div class="col-md-5 col-sm-3 col-xs-12">
                                        <label class="control-label"> 
                                            <input id="Original_Degree_Certificate_Upload"  name="Original_Degree_Certificate_Upload"  type="file"></label>

                                    </div>
                                <?php } ?>

                                <?php if (!empty($row->Original_Degree_Certificate_File)) { ?>						
                                    <div class="col-md-2 col-sm-3 col-xs-12" id="deletid">

                                        &nbsp;<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Delete" onclick="javascript:deleteimage10('<?php echo $row->Original_Degree_Certificate_File; ?>', '<?php echo $Emp_ID; ?>')"><i style="font-size:25px;color: #d9534f;vertical-align:middle;" class="fa fa-remove"></i></a>
                                        &nbsp;<a href="<?php echo base_url(); ?>uploads/<?php echo $row->Original_Degree_Certificate_File; ?>" data-toggle="tooltip" data-placement="top" title="Download"  download> <i class="fa fa-download" style="font-size:25px;color:green;vertical-align:middle;"aria-hidden="true"></i>
                                        </a>
                                    </div>
                                <?php } ?>







                            </div>
                        <?php } else { ?>
                            <div id="Original_Degree_Certificate_id" style="display:none;">
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">
                                    <input  name="Original_Degree_Certificate_Date" id="Original_Degree_Certificate_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="Date eg. 12/27/2016"  type="text">
                                    <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-5 col-sm-3 col-xs-12">
                                    <label class="control-label"> <input id="Original_Degree_Certificate_Upload"  name="Original_Degree_Certificate_Upload"  type="file"></label>
                                </div>
                            </div>
                        <?php } ?>

                    </div>  
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">ORIGINAL SCHOOL CERTIFICATE:</label>
                        <div class="col-md-1 col-sm-6 col-xs-12">
                            <div  class="btn-group" data-toggle="buttons">
                                <?php if ($row->Original_School_Certificate_Date == "0000-00-00" || empty($row->Original_School_Certificate_Date)) { ?>
                                    <input data-toggle="toggle" id="Original_School_Certificate" name="Original_School_Certificate" value="1" <?php echo set_checkbox('Original_School_Certificate', '1'); ?> data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="default" type="checkbox">
                                <?php } else { ?>
                                    <input checked data-toggle="toggle" id="Original_School_Certificate" name="Original_School_Certificate" value="1" <?php echo set_checkbox('Original_School_Certificate', '1'); ?> data-on="Yes" data-off="No" data-onstyle="primary" data-offstyle="default" type="checkbox">
                                <?php } ?>
                            </div>
                        </div>
                        <?php if ($row->Original_School_Certificate_Date != "0000-00-00" && $row->Original_School_Certificate_Date != "") { ?>
                            <div id="Original_School_Certificate_id" >
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">
                                    <input  name="Original_School_Certificate_Date" id="Original_School_Certificate_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="Date eg. 12/27/2016" type="text" value="<?php
                                    if (set_value('Original_School_Certificate_Date')) {
                                        echo set_value('Original_School_Certificate_Date');
                                    } else {
                                        if ($row->Original_School_Certificate_Date != '0000-00-00') {
                                            $dt2 = date_create($row->Original_School_Certificate_Date);
                                            $resdt3 = date_format($dt2, 'm/d/Y');
                                            echo $resdt3;
                                        }
                                    }
                                    ?>" ><span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <?php if (empty($row->Original_School_Certificate_File)) { ?>
                                    <div class="col-md-5 col-sm-3 col-xs-12">
                                        <label class="control-label"> 
                                            <input id="Original_School_Certificate_Upload"  name="Original_School_Certificate_Upload"  type="file"></label>
                                    </div>
                                <?php } ?>

                                <?php if (!empty($row->Original_School_Certificate_File)) { ?>						
                                    <div class="col-md-2 col-sm-3 col-xs-12" id="deletid">

                                        &nbsp;<a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Delete" onclick="javascript:deleteimage11('<?php echo $row->Original_School_Certificate_File; ?>', '<?php echo $Emp_ID; ?>')"><i style="font-size:25px;color: #d9534f;vertical-align:middle;" class="fa fa-remove"></i></a>
                                        &nbsp;<a href="<?php echo base_url(); ?>uploads/<?php echo $row->Original_School_Certificate_File; ?>" data-toggle="tooltip" data-placement="top" title="Download" download> <i class="fa fa-download" style="font-size:25px;color:green;vertical-align:middle;"aria-hidden="true"></i>
                                        </a>
                                    </div>
                                <?php } ?>


                            </div>
                        <?php } else { ?>
                            <div id="Original_School_Certificate_id" style="display:none;">
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">
                                    <input  name="Original_School_Certificate_Date" id="Original_School_Certificate_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="Date eg. 12/27/2016" type="text">
                                    <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-5 col-sm-3 col-xs-12">
                                    <label class="control-label"> <input id="Original_School_Certificate_Upload"  name="Original_School_Certificate_Upload"  type="file"></label>
                                </div>
                            </div>
                        <?php } ?>

                    </div> 




                    <span class="section" style="margin-top:60px;">Original Document Return</span>                    

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">ORIGINAL MARKSHEET RETURN:</label>

                        <div class="col-md-1 col-sm-6 col-xs-12">
                            <div  class="btn-group" data-toggle="buttons">

                                <?php if ($row->Original_Marksheet_Return_Date == "0000-00-00" || empty($row->Original_Marksheet_Return_Date)) { ?>
                                    <input  data-toggle="toggle" data-on="Yes" id="Original_marksheet_Return" name="Original_marksheet_Return" value="1" <?php echo set_checkbox('Original_marksheet_Return', '1'); ?>  data-off="No" data-onstyle="primary" data-offstyle="default" type="checkbox">
                                <?php } else { ?>                           
                                    <input  checked data-toggle="toggle" data-on="Yes" id="Original_marksheet_Return" name="Original_marksheet_Return" value="1" <?php echo set_checkbox('Original_marksheet_Return', '1'); ?>  data-off="No" data-onstyle="primary" data-offstyle="default" type="checkbox">
                                <?php } ?>
                            </div>
                        </div>

                        <?php if ($row->Original_Marksheet_Return_Date != "0000-00-00" && $row->Original_Marksheet_Return_Date != "") { ?>
                            <div id="Original_marksheet_Return_id">
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">

                                    <input  name="Original_marksheet_Return_Date" id="Original_marksheet_Return_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="Date eg. 12/27/2016" type="text" value="<?php
                                    if (set_value('Original_marksheet_Return_Date')) {
                                        echo set_value('Original_marksheet_Return_Date');
                                    } else {
                                        if (isset($row->Original_Marksheet_Return_Date)) {
                                            $dt2 = date_create($row->Original_Marksheet_Return_Date);
                                            $resdt4 = date_format($dt2, 'm/d/Y');
                                            echo $resdt4;
                                        }
                                    }
                                    ?>" ><span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </div>
                        <?php } else { ?>

                            <div id="Original_marksheet_Return_id" style="display:none;">
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">
                                    <input id="Original_marksheet_Return_Date" name="Original_marksheet_Return_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right"  placeholder="Date eg. 12/27/2016" type="text">
                                    <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>                       
                                </div>
                            </div>
                        <?php } ?>



                    </div> 					 


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">ORIGINAL DEGREE CERTIFICATE RETURN:</label>

                        <div class="col-md-1 col-sm-6 col-xs-12">
                            <div class="btn-group" data-toggle="buttons">
                                <?php if ($row->Original_Degree_Certificate_Return_Date == "0000-00-00" || empty($row->Original_Marksheet_Return_Date)) { ?>
                                    <input  data-toggle="toggle" data-on="Yes" id="Original_Degree_Certificate_Return" name="Original_Degree_Certificate_Return" value="1" <?php echo set_checkbox('Original_Degree_Certificate_Return', '1'); ?> data-off="No" data-onstyle="primary" data-offstyle="default" type="checkbox">
                                <?php } else { ?>
                                    <input checked data-toggle="toggle" data-on="Yes" id="Original_Degree_Certificate_Return" name="Original_Degree_Certificate_Return" value="1" <?php echo set_checkbox('Original_Degree_Certificate_Return', '1'); ?> data-off="No" data-onstyle="primary" data-offstyle="default" type="checkbox">
                                <?php } ?>
                            </div>
                        </div>

                        <?php if ($row->Original_Degree_Certificate_Return_Date != "0000-00-00" && $row->Original_Degree_Certificate_Return_Date != "") { ?>
                            <div id="Original_Degree_Certificate_Return_id">
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">
                                    <input  name="Original_Degree_Certificate_Return_Date" id="Original_Degree_Certificate_Return_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="Date eg. 12/27/2016" type="text" value="<?php
                                    if (set_value('Original_Degree_Certificate_Return_Date')) {
                                        echo set_value('Original_Degree_Certificate_Return_Date');
                                    } else {
                                        if (isset($row->Original_Degree_Certificate_Return_Date)) {
                                            $dt2 = date_create($row->Original_Degree_Certificate_Return_Date);
                                            $resdt4 = date_format($dt2, 'm/d/Y');
                                            echo $resdt4;
                                        }
                                    }
                                    ?>" ><span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div id="Original_Degree_Certificate_Return_id" style="display:none;">
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">
                                    <input id="Original_Degree_Certificate_Return_Date" name="Original_Degree_Certificate_Return_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="Date eg. 12/27/2016" type="text">
                                    <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </div>
                        <?php } ?>


                    </div> 	


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">ORIGINAL SCHOOL CERTIFICATE:</label>
                        <div class="col-md-1 col-sm-6 col-xs-12">
                            <div  class="btn-group" data-toggle="buttons">
                                <?php if ($row->Original_School_Certificate_Return_Date == "0000-00-00" || empty($row->Original_School_Certificate_Return_Date)) { ?>
                                    <input  data-toggle="toggle" data-on="Yes" data-off="No" id="Original_School_Certificate_Return" name="Original_School_Certificate_Return"  value="1" <?php echo set_checkbox('Original_School_Certificate_Return', '1'); ?> data-onstyle="primary" data-offstyle="default" type="checkbox">
                                <?php } else { ?>
                                    <input checked data-toggle="toggle" data-on="Yes" data-off="No" id="Original_School_Certificate_Return" name="Original_School_Certificate_Return"  value="1" <?php echo set_checkbox('Original_School_Certificate_Return', '1'); ?> data-onstyle="primary" data-offstyle="default" type="checkbox">
                                <?php } ?>
                            </div>
                        </div>
                        <?php if ($row->Original_School_Certificate_Return_Date != "0000-00-00" && $row->Original_School_Certificate_Return_Date != "") { ?>
                            <div id="Original_School_Certificate_Return_id">
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">

                                    <input  name="Original_School_Certificate_Return_Date" id="Original_School_Certificate_Return_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="Date eg. 12/27/2016" type="text" value="<?php
                                    if (set_value('Original_School_Certificate_Return_Date')) {
                                        echo set_value('Original_School_Certificate_Return_Date');
                                    } else {
                                        if (isset($row->Original_School_Certificate_Return_Date)) {
                                            $dt2 = date_create($row->Original_School_Certificate_Return_Date);
                                            $resdt4 = date_format($dt2, 'm/d/Y');
                                            echo $resdt4;
                                        }
                                    }
                                    ?>" > <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div id="Original_School_Certificate_Return_id" style="display:none;">
                                <div class="col-md-2 col-sm-2 col-xs-12 has-feedback">
                                    <input id="Original_School_Certificate_Return_Date" name="Original_School_Certificate_Return_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" placeholder="Date eg. 12/27/2016" type="text">
                                    <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </div>
                        <?php } ?>

                    </div> 	

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">RECEIVED CONFIRMATION RETURN:</label>
                        <div class="col-md-1 col-sm-6 col-xs-12">
                            <div  class="btn-group" data-toggle="buttons">
                                <?php if ($row->Reveived_Confirmation_Return_Upload == '1') { ?>
                                    <input checked data-toggle="toggle" data-on="Yes" data-off="No" id="Reveived_Confirmation_Return_Upload" value="1" <?php echo set_checkbox('Reveived_Confirmation_Return_Upload', '1'); ?> name="Reveived_Confirmation_Return_Upload"   data-onstyle="primary" data-offstyle="default" type="checkbox">
                                <?php } else { ?>
                                    <input data-toggle="toggle" data-on="Yes" data-off="No" id="Reveived_Confirmation_Return_Upload" value="1" <?php echo set_checkbox('Reveived_Confirmation_Return_Upload', '1'); ?> name="Reveived_Confirmation_Return_Upload"   data-onstyle="primary" data-offstyle="default" type="checkbox">
                                <?php } ?>
                            </div>
                        </div>



                    </div> 							





                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <a href="<?php echo base_url() ?>index.php/Employee/add_emp_list"><button type="button" class="btn btn-danger">Cancel</button></a>
                            <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
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


<!-- bootstrap-daterangepicker -->

<script>
    $(document).ready(function () {
        var date_input = $('.date-picker'); //our date input has the name "date"
        var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'mm/dd/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    });




    $(document).ready(function () {
        var Passport_Photo_Upload = $("#Passport_Photo_Upload").val();
        var Passport_Photo_Upload1 = $("#Passport_Photo_Upload1").val();
        var Resident_1 = $("#Resident_Proof_Upload1").val();

        $('#document_employee').validate({
            rules: {
                Passport_Photo_date: {
                    required: true
                },
                Passport_Photo_Upload: {

                    required: function (element) {
                        if (Passport_Photo_Upload1 == "") {

                            return true;

                        } else {
                            return false;
                        }

                    },

                    remote: {
                        url: "<?php echo base_url(); ?>index.php/Employee/file_extention_check1",
                        type: "post",
                        data: {
                            Passport_Photo_Upload: function () {
                                return $("#Passport_Photo_Upload").val();
                            }
                        }



                    }


                },
                Resident_Proof_Date: {
                    required: function (element) {
                        if ($('#Resident_Proof').prop("checked") == true) {

                            return true;

                        } else {
                            return false;
                        }

                    }
                },
                Resident_Proof_Upload: {

                    remote: {
                        url: "<?php echo base_url(); ?>index.php/Employee/file_extention_check2",
                        type: "post",
                        data: {
                            Resident_Proof_Upload: function () {
                                return $("#Resident_Proof_Upload").val();
                            }
                        }



                    }


                },
                Registered_Rent_Proof_Date: {
                    required: function (element) {
                        if ($('#Registered_Rent_Proof').prop("checked") == true) {

                            return true;

                        } else {
                            return false;
                        }

                    }
                },
                Registered_Rent_Proof_Upload: {

                    remote: {
                        url: "<?php echo base_url(); ?>index.php/Employee/file_extention_check3",
                        type: "post",
                        data: {
                            Registered_Rent_Proof_Upload: function () {
                                return $("#Registered_Rent_Proof_Upload").val();
                            }
                        }



                    }


                },
                Signed_Resignation_Letter_Date: {
                    required: function (element) {
                        if ($('#Signed_Resignation_Letter').prop("checked") == true) {

                            return true;

                        } else {
                            return false;
                        }

                    }
                },
                Signed_Resignation_Letter_Upload: {

                    remote: {
                        url: "<?php echo base_url(); ?>index.php/Employee/file_extention_check4",
                        type: "post",
                        data: {
                            Signed_Resignation_Letter_Upload: function () {
                                return $("#Signed_Resignation_Letter_Upload").val();
                            }
                        }



                    }


                },
                Last_Salary_Slip_Date: {
                    required: function (element) {
                        if ($('#Last_Salary_Slip').prop("checked") == true) {

                            return true;

                        } else {
                            return false;
                        }

                    }
                },
                Last_Salary_Slip_Upload: {

                    remote: {
                        url: "<?php echo base_url(); ?>index.php/Employee/file_extention_check5",
                        type: "post",
                        data: {
                            Last_Salary_Slip_Upload: function () {
                                return $("#Last_Salary_Slip_Upload").val();
                            }
                        }



                    }


                },
                Application_Form_Date: {
                    required: function (element) {
                        if ($('#Application_Form').prop("checked") == true) {

                            return true;

                        } else {
                            return false;
                        }

                    }
                },
                Application_Form_Upload: {

                    remote: {
                        url: "<?php echo base_url(); ?>index.php/Employee/file_extention_check6",
                        type: "post",
                        data: {
                            Application_Form_Upload: function () {
                                return $("#Application_Form_Upload").val();
                            }
                        }



                    }


                },
                Code_Of_Conduct_Date: {
                    required: function (element) {
                        if ($('#Code_Of_Conduct').prop("checked") == true) {

                            return true;

                        } else {
                            return false;
                        }

                    }
                },
                Code_Of_Conduct_Upload: {

                    remote: {
                        url: "<?php echo base_url(); ?>index.php/Employee/file_extention_check7",
                        type: "post",
                        data: {
                            Code_Of_Conduct_Upload: function () {
                                return $("#Code_Of_Conduct_Upload").val();
                            }
                        }



                    }


                },
                Disclosure_Of_Confidentail_Information_Date: {
                    required: function (element) {
                        if ($('#Disclosure_Of_Confidentail_Information').prop("checked") == true) {

                            return true;

                        } else {
                            return false;
                        }

                    }
                },
                Disclosure_Of_Confidentail_Information_Upload: {

                    remote: {
                        url: "<?php echo base_url(); ?>index.php/Employee/file_extention_check8",
                        type: "post",
                        data: {
                            Disclosure_Of_Confidentail_Information_Upload: function () {
                                return $("#Disclosure_Of_Confidentail_Information_Upload").val();
                            }
                        }



                    }


                },
                Original_Marksheet_Date: {
                    required: function (element) {
                        if ($('#Original_Marksheet').prop("checked") == true) {

                            return true;

                        } else {
                            return false;
                        }

                    }
                },
                Original_Marksheet_Upload: {

                    remote: {
                        url: "<?php echo base_url(); ?>index.php/Employee/file_extention_check9",
                        type: "post",
                        data: {
                            Original_Marksheet_Upload: function () {
                                return $("#Original_Marksheet_Upload").val();
                            }
                        }



                    }


                },
                Original_Degree_Certificate_Date: {
                    required: function (element) {
                        if ($('#Original_Degree_Certificate').prop("checked") == true) {

                            return true;

                        } else {
                            return false;
                        }

                    }
                },
                Original_Degree_Certificate_Upload: {

                    remote: {
                        url: "<?php echo base_url(); ?>index.php/Employee/file_extention_check10",
                        type: "post",
                        data: {
                            Original_Degree_Certificate_Upload: function () {
                                return $("#Original_Degree_Certificate_Upload").val();
                            }
                        }



                    }


                },
                Original_School_Certificate_Date: {
                    required: function (element) {
                        if ($('#Original_School_Certificate').prop("checked") == true) {

                            return true;

                        } else {
                            return false;
                        }

                    }
                },
                Original_School_Certificate_Upload: {

                    remote: {
                        url: "<?php echo base_url(); ?>index.php/Employee/file_extention_check11",
                        type: "post",
                        data: {
                            Original_School_Certificate_Upload: function () {
                                return $("#Original_School_Certificate_Upload").val();
                            }
                        }



                    }


                },
                Original_marksheet_Return_Date: {
                    required: function (element) {
                        if ($('#Original_marksheet_Return').prop("checked") == true) {

                            return true;

                        } else {
                            return false;
                        }

                    }
                },

            },
            messages: {

                Passport_Photo_Upload: {
                    remote: 'Not Valid Extenstion'
                },
                Resident_Proof_Upload: {
                    remote: 'Not Valid Extenstion'
                },
                Registered_Rent_Proof_Upload: {
                    remote: 'Not Valid Extenstion'
                },
                Signed_Resignation_Letter_Upload: {
                    remote: 'Not Valid Extenstion'
                },
                Last_Salary_Slip_Upload: {
                    remote: 'Not Valid Extenstion'
                },
                Application_Form_Upload: {
                    remote: 'Not Valid Extenstion'
                },
                Code_Of_Conduct_Upload: {
                    remote: 'Not Valid Extenstion'
                },
                Disclosure_Of_Confidentail_Information_Upload: {
                    remote: 'Not Valid Extenstion'
                },
                Original_Marksheet_Upload: {
                    remote: 'Not Valid Extenstion'
                },
                Original_Degree_Certificate_Upload: {
                    remote: 'Not Valid Extenstion'
                },
                Original_School_Certificate_Upload: {
                    remote: 'Not Valid Extenstion'
                },

            },

            errorElement: 'span',
            submitHandler: function (form) {

                form.submit();




                return false;


            }
        });





    });

    /* function validate(file) {
     var ext = file.split(".");
     ext = ext[ext.length-1].toLowerCase();      
     var arrayExtensions = ["jpg" , "jpeg", "png", "bmp", "gif"];
     
     if (arrayExtensions.lastIndexOf(ext) == -1) {
     alert("Wrong extension type.");
     $("#image").val("");
     }
     }  */

    /* $('#Passport_Photo').change(function(){
     if($(this).prop("checked") == true){
     
     $('#Passport_Photo_date').attr('required', 'required');
     $('#Passport_Photo_Upload').attr('required', 'required');
     
     }else{
     $('#Passport_Photo_date').attr('required', false);
     $('#Passport_Photo_Upload').attr('required', false);
     }
     
     }); */
    $('#Resident_Proof').change(function () {

        if ($(this).prop("checked") == true) {


            $('#Resident_Proof_Date').attr('required', 'required');
            $('#Resident_Proof_Upload').attr('required', 'required');


        } else {
            $('#Resident_Proof_Date').attr('required', false);
            $('#Resident_Proof_Upload').attr('required', false);
        }

    });

    $('#Registered_Rent_Proof').change(function () {
        if ($(this).prop("checked") == true) {

            $('#Registered_Rent_Proof_Date').attr('required', 'required');
            $('#Registered_Rent_Proof_Upload').attr('required', 'required');

        } else {
            $('#Registered_Rent_Proof_Date').attr('required', false);
            $('#Registered_Rent_Proof_Upload').attr('required', false);
        }

    });

    $('#Signed_Resignation_Letter').change(function () {
        if ($(this).prop("checked") == true) {

            $('#Signed_Resignation_Letter_Date').attr('required', 'required');
            $('#Signed_Resignation_Letter_Upload').attr('required', 'required');

        } else {
            $('#Signed_Resignation_Letter_Date').attr('required', false);
            $('#Signed_Resignation_Letter_Upload').attr('required', false);
        }

    });
    $('#Last_Salary_Slip').change(function () {
        if ($(this).prop("checked") == true) {

            $('#Last_Salary_Slip_Date').attr('required', 'required');
            $('#Last_Salary_Slip_Upload').attr('required', 'required');

        } else {
            $('#Last_Salary_Slip_Date').attr('required', false);
            $('#Last_Salary_Slip_Upload').attr('required', false);
        }

    });
    $('#Application_Form').change(function () {
        if ($(this).prop("checked") == true) {

            $('#Application_Form_Date').attr('required', 'required');
            $('#Application_Form_Upload').attr('required', 'required');

        } else {
            $('#Application_Form_Date').attr('required', false);
            $('#Application_Form_Upload').attr('required', false);
        }

    });

    $('#Code_Of_Conduct').change(function () {
        if ($(this).prop("checked") == true) {

            $('#Code_Of_Conduct_Date').attr('required', 'required');
            $('#Code_Of_Conduct_Upload').attr('required', 'required');

        } else {
            $('#Code_Of_Conduct_Date').attr('required', false);
            $('#Code_Of_Conduct_Upload').attr('required', false);
        }

    });

    $('#Disclosure_Of_Confidentail_Information').change(function () {
        if ($(this).prop("checked") == true) {

            $('#Disclosure_Of_Confidentail_Information_Date').attr('required', 'required');
            $('#Disclosure_Of_Confidentail_Information_Upload').attr('required', 'required');

        } else {
            $('#Disclosure_Of_Confidentail_Information_Date').attr('required', false);
            $('#Disclosure_Of_Confidentail_Information_Upload').attr('required', false);
        }

    });
    $('#Original_Marksheet').change(function () {
        if ($(this).prop("checked") == true) {

            $('#Original_Marksheet_Date').attr('required', 'required');
            $('#Original_Marksheet_Upload').attr('required', 'required');

        } else {
            $('#Original_Marksheet_Date').attr('required', false);
            $('#Original_Marksheet_Upload').attr('required', false);
        }

    });
    $('#Original_Degree_Certificate').change(function () {
        if ($(this).prop("checked") == true) {

            $('#Original_Degree_Certificate_Date').attr('required', 'required');
            $('#Original_Degree_Certificate_Upload').attr('required', 'required');

        } else {
            $('#Original_Degree_Certificate_Date').attr('required', false);
            $('#Original_Degree_Certificate_Upload').attr('required', false);
        }

    });
    $('#Original_School_Certificate').change(function () {
        if ($(this).prop("checked") == true) {

            $('#Original_School_Certificate_Date').attr('required', 'required');
            $('#Original_School_Certificate_Upload').attr('required', 'required');

        } else {
            $('#Original_School_Certificatet_Date').attr('required', false);
            $('#Original_School_Certificate_Upload').attr('required', false);
        }

    });

    $('#Original_marksheet_Return').change(function () {
        if ($(this).prop("checked") == true) {

            $('#Original_marksheet_Return_Date').attr('required', 'required');


        } else {
            $('#Original_marksheet_Return_Date').attr('required', false);

        }

    });

    $('#Original_Degree_Certificate_Return').change(function () {
        if ($(this).prop("checked") == true) {

            $('#Original_Degree_Certificate_Return_Date').attr('required', 'required');


        } else {
            $('#Original_Degree_Certificate_Return_Date').attr('required', false);

        }

    });

    $('#Original_School_Certificate_Return').change(function () {
        if ($(this).prop("checked") == true) {

            $('#Original_School_Certificate_Return_Date').attr('required', 'required');


        } else {
            $('#Original_School_Certificate_Return_Date').attr('required', false);

        }

    });


    $('#Passport_Photo').change(function () {

        if ($(this).prop("checked") == true) {
            $('#Passport_Photo_id').css("display", "block");
        } else {
            $('#Passport_Photo_id').css("display", "none");
        }

    });

    $('#Resident_Proof').change(function () {
        if ($(this).prop("checked") == true) {
            $('#resident_id').css("display", "block");
        } else {
            $('#resident_id').css("display", "none");
        }

    });
    $('#Registered_Rent_Proof').change(function () {

        if ($(this).prop("checked") == true) {
            $('#Registered_Rent_Proof_id').css("display", "block");
        } else {
            $('#Registered_Rent_Proof_id').css("display", "none");
        }

    });

    $('#Signed_Resignation_Letter').change(function () {

        if ($(this).prop("checked") == true) {
            $('#Signed_Resignation_Letter_id').css("display", "block");
        } else {
            $('#Signed_Resignation_Letter_id').css("display", "none");
        }

    });

    $('#Application_Form').change(function () {

        if ($(this).prop("checked") == true) {
            $('#Application_Form_id').css("display", "block");
        } else {
            $('#Application_Form_id').css("display", "none");
        }

    });

    $('#Code_Of_Conduct').change(function () {

        if ($(this).prop("checked") == true) {
            $('#Code_Of_Conduct_id').css("display", "block");
        } else {
            $('#Code_Of_Conduct_id').css("display", "none");
        }

    });
    $('#Disclosure_Of_Confidentail_Information').change(function () {

        if ($(this).prop("checked") == true) {
            $('#Disclosure_Of_Confidentail_Information_id').css("display", "block");
        } else {
            $('#Disclosure_Of_Confidentail_Information_id').css("display", "none");
        }

    });

    $('#Original_Marksheet').change(function () {

        if ($(this).prop("checked") == true) {
            $('#Original_Marksheet_id').css("display", "block");
        } else {
            $('#Original_Marksheet_id').css("display", "none");
        }

    });

    $('#Original_Degree_Certificate').change(function () {

        if ($(this).prop("checked") == true) {
            $('#Original_Degree_Certificate_id').css("display", "block");
        } else {
            $('#Original_Degree_Certificate_id').css("display", "none");
        }

    });
    $('#Original_School_Certificate').change(function () {

        if ($(this).prop("checked") == true) {
            $('#Original_School_Certificate_id').css("display", "block");
        } else {
            $('#Original_School_Certificate_id').css("display", "none");
        }

    });

    $('#Last_Salary_Slip').change(function () {

        if ($(this).prop("checked") == true) {
            $('#Last_Salary_Slip_id').css("display", "block");
        } else {
            $('#Last_Salary_Slip_id').css("display", "none");
        }

    });
    $('#Original_marksheet_Return').change(function () {

        if ($(this).prop("checked") == true) {
            $('#Original_marksheet_Return_id').css("display", "block");
        } else {
            $('#Original_marksheet_Return_id').css("display", "none");
        }

    });
    $('#Original_Degree_Certificate_Return').change(function () {

        if ($(this).prop("checked") == true) {
            $('#Original_Degree_Certificate_Return_id').css("display", "block");
        } else {
            $('#Original_Degree_Certificate_Return_id').css("display", "none");
        }

    });
    $('#Original_School_Certificate_Return').change(function () {

        if ($(this).prop("checked") == true) {
            $('#Original_School_Certificate_Return_id').css("display", "block");
        } else {
            $('#Original_School_Certificate_Return_id').css("display", "none");
        }

    });
    function deleteimage(image_id, Emp_ID)
    {

        var answer = confirm("Are you sure you want to delete this file?");
        if (answer)
        {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/Employee/deleteimage1",
                data: {'image_id': image_id, 'Emp_ID': Emp_ID},
                success: function (response) {
                    if (response == 1) {
                        $(".imagelocation" + image_id).remove(".imagelocation" + image_id);
                        $("#deletid").css('display', 'none');
                        window.location.reload();

                    }
                    ;

                }
            });
        }
    }
    function deleteimage1(image_id, Emp_ID)
    {

        var answer = confirm("Are you sure you want to delete this file?");
        if (answer)
        {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/Employee/deleteimage2",
                data: {'image_id': image_id, 'Emp_ID': Emp_ID},
                success: function (response) {
                    if (response == 1) {
                        $(".imagelocation" + image_id).remove(".imagelocation" + image_id);
                        $("#deletid").css('display', 'none');
                        window.location.reload();

                    }
                    ;

                }
            });
        }
    }
    function deleteimage2(image_id, Emp_ID)
    {

        var answer = confirm("Are you sure you want to delete this file?");
        if (answer)
        {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/Employee/deleteimage3",
                data: {'image_id': image_id, 'Emp_ID': Emp_ID},
                success: function (response) {
                    if (response == 1) {
                        $(".imagelocation" + image_id).remove(".imagelocation" + image_id);
                        $("#deletid").css('display', 'none');
                        window.location.reload();

                    }
                    ;

                }
            });
        }
    }
    function deleteimage4(image_id, Emp_ID)
    {

        var answer = confirm("Are you sure you want to delete this file?");
        if (answer)
        {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/Employee/deleteimage4",
                data: {'image_id': image_id, 'Emp_ID': Emp_ID},
                success: function (response) {
                    if (response == 1) {
                        $(".imagelocation" + image_id).remove(".imagelocation" + image_id);
                        $("#deletid").css('display', 'none');
                        window.location.reload();

                    }
                    ;

                }
            });
        }
    }
    function deleteimage5(image_id, Emp_ID)
    {

        var answer = confirm("Are you sure you want to delete this file?");
        if (answer)
        {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/Employee/deleteimage5",
                data: {'image_id': image_id, 'Emp_ID': Emp_ID},
                success: function (response) {
                    if (response == 1) {
                        $(".imagelocation" + image_id).remove(".imagelocation" + image_id);
                        $("#deletid").css('display', 'none');
                        window.location.reload();

                        //$( "#Last_Salary_Slip" ).trigger( "click" );
                    }
                    ;

                }
            });
        }
    }
    function deleteimage6(image_id, Emp_ID)
    {

        var answer = confirm("Are you sure you want to delete this file?");
        if (answer)
        {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/Employee/deleteimage6",
                data: {'image_id': image_id, 'Emp_ID': Emp_ID},
                success: function (response) {
                    if (response == 1) {
                        $(".imagelocation" + image_id).remove(".imagelocation" + image_id);
                        $("#deletid").css('display', 'none');
                        window.location.reload();

                        //$( "#Last_Salary_Slip" ).trigger( "click" );
                    }
                    ;

                }
            });
        }
    }
    function deleteimage7(image_id, Emp_ID)
    {

        var answer = confirm("Are you sure you want to delete this file?");
        if (answer)
        {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/Employee/deleteimage7",
                data: {'image_id': image_id, 'Emp_ID': Emp_ID},
                success: function (response) {
                    if (response == 1) {
                        $(".imagelocation" + image_id).remove(".imagelocation" + image_id);
                        $("#deletid").css('display', 'none');
                        window.location.reload();

                        //$( "#Last_Salary_Slip" ).trigger( "click" );
                    }
                    ;

                }
            });
        }
    }
    function deleteimage8(image_id, Emp_ID)
    {

        var answer = confirm("Are you sure you want to delete this file?");
        if (answer)
        {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/Employee/deleteimage8",
                data: {'image_id': image_id, 'Emp_ID': Emp_ID},
                success: function (response) {
                    if (response == 1) {
                        $(".imagelocation" + image_id).remove(".imagelocation" + image_id);
                        $("#deletid").css('display', 'none');
                        window.location.reload();

                        //$( "#Last_Salary_Slip" ).trigger( "click" );
                    }
                    ;

                }
            });
        }
    }
    function deleteimage9(image_id, Emp_ID)
    {

        var answer = confirm("Are you sure you want to delete this file?");
        if (answer)
        {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/Employee/deleteimage9",
                data: {'image_id': image_id, 'Emp_ID': Emp_ID},
                success: function (response) {
                    if (response == 1) {
                        $(".imagelocation" + image_id).remove(".imagelocation" + image_id);
                        $("#deletid").css('display', 'none');
                        window.location.reload();

                        //$( "#Last_Salary_Slip" ).trigger( "click" );
                    }
                    ;

                }
            });
        }
    }
    function deleteimage10(image_id, Emp_ID)
    {

        var answer = confirm("Are you sure you want to delete this file?");
        if (answer)
        {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/Employee/deleteimage10",
                data: {'image_id': image_id, 'Emp_ID': Emp_ID},
                success: function (response) {
                    if (response == 1) {
                        $(".imagelocation" + image_id).remove(".imagelocation" + image_id);
                        $("#deletid").css('display', 'none');
                        window.location.reload();

                        //$( "#Last_Salary_Slip" ).trigger( "click" );
                    }
                    ;

                }
            });
        }
    }
    function deleteimage11(image_id, Emp_ID)
    {

        var answer = confirm("Are you sure you want to delete this file?");
        if (answer)
        {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>index.php/Employee/deleteimage11",
                data: {'image_id': image_id, 'Emp_ID': Emp_ID},
                success: function (response) {
                    if (response == 1) {
                        $(".imagelocation" + image_id).remove(".imagelocation" + image_id);
                        $("#deletid").css('display', 'none');
                        window.location.reload();

                        //$( "#Last_Salary_Slip" ).trigger( "click" );
                    }
                    ;

                }
            });
        }
    }
</script>