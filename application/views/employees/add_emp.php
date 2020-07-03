<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * 12-20-2016
 * add_detail page(view/employee)
 */
/* echo '<PRE>';
  print_r($pos_list);
  exit; */
?>
<style type="text/css">
    .error1{
        color:red;
        margin:10px;
        border: 0.5px solid red;
        text-align: center;
    }
</style>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h2>BimSym eBusiness Solutions</h2>
            </div>

        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">

                        <form class="form-horizontal form-label-left" novalidate method="post" action="<?php echo base_url(); ?>index.php/Employee/add_emp1" id="Login_Info_Form">

                            <span class="section">Login Information</span>
                            <div class="" id="emp_login" >
                                <?php
                                if (validation_errors()) {
                                    echo '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>' . validation_errors() . '</div><script>setTimeout(function(){$("#emp_login").slideUp();},3000);</script>';
                                }
                                ?>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="First_Name"><span class="requireds">*</span> FIRST NAME:</label>
                                <div class="col-md-1 col-sm-3 col-xs-12">   
                                    <select class="form-control col-md-1 col-xs-4" id="Prefix" name="Prefix">
                                        <option value="1" <?php echo set_select('Prefix', '1'); ?> >Mr.</option>
                                        <option value="2" <?php echo set_select('Prefix', '2'); ?> >Mrs.</option>
                                        <option value="3" <?php echo set_select('Prefix', '3'); ?> >Dr.</option>
                                        <option value="4" <?php echo set_select('Prefix', '4'); ?> >Prof.</option>								
                                        <option value="5" <?php echo set_select('Prefix', '5'); ?> >Miss.</option>								

                                    </select>
                                </div>
                                <div class="col-md-2 col-sm-3 col-xs-12">
                                    <input class="form-control col-md-7 col-xs-12" id="First_Name" name="First_Name" placeholder="First Name" value="<?php echo set_value('First_Name'); ?>" placeholder="" maxlength="50" type="text">

                                </div>

                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Middle_Name">MIDDLE NAME:</label>
                                <div class="col-md-1 col-sm-3 col-xs-12">
                                    <input class="form-control col-md-7 col-xs-12" id="Middle_Name" name="Middle_Name" placeholder="Middle Name" value="<?php echo set_value('Middle_Name'); ?>" maxlength="10" placeholder="" type="text">
                                </div>

                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Last_Name"><span class="requireds">*</span> LAST NAME:</label>
                                <div class="col-md-2 col-sm-3 col-xs-12">
                                    <input class="form-control col-md-7 col-xs-12" id="Last_Name" name="Last_Name" placeholder="Last Name" value="<?php echo set_value('Last_Name'); ?>" placeholder="" maxlength="50" required="required" type="text">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Short_Name"><span class="requireds">*</span> INITIAL NAME: </label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <input class="form-control col-md-7 col-xs-12" value="<?php echo set_value('Short_Name'); ?>" id="Short_Name" name="Short_Name" maxlength="3" placeholder="3 Character Required" type="text">
                                </div>

                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Dob"><span class="requireds">*</span> DATE OF BIRTH:</label>
                                <div class="col-md-3 col-sm-3 col-xs-12 has-feedback">
                                    <input id="Dob" name="Dob" value="" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" required="required" type="text" placeholder="eg.01/01/2017" >
                                    <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>


                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Email"><span class="requireds">*</span> EMAIL:
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <input type="email" id="Email" name="Email" placeholder="Email" value="<?php echo set_value('Email'); ?>" maxlength="50" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Phone_Number"><span class="requireds">*</span> PHONE NUMBER(S):
                                </label>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <input type="text" id="Phone_Number" name="Phone_Number"  value="" maxlength="10" placeholder="Phone Number(S)" class="form-control col-md-7 col-xs-12" required>
                                </div>

                            </div>  

                            <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12"><span class="requireds">*</span>EMPLOYMENT STATUS:</label>                      
                                <div class="col-md-5 col-sm-4 col-xs-12">
                                    <label class="control-label"><input type="radio"  class="flat" name="Employeement_Status" checked value="1" <?php echo set_radio('Employeement_Status', '1'); ?> id="Employeement_Status0" value="1" /> &nbsp;&nbsp;FULLTIME</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label class="control-label"><input type="radio" class="flat"  name="Employeement_Status" value="2" <?php echo set_radio('Employeement_Status', '2'); ?> id="Employeement_Status1" value="2" /> &nbsp;&nbsp;PARTTIME </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label class="control-label"><input type="radio" class="flat"  name="Employeement_Status" value="3" <?php echo set_radio('Employeement_Status', '3'); ?> id="Employeement_Status2" value="3" /> &nbsp;&nbsp;TEMPORARY </label>
                                </div>
                                <label class="control-label col-md-1 col-sm-3 col-xs-12"><span class="requireds">*</span> GENDER:</label>
                                <div class="col-md-2 col-sm-6 col-xs-12">
                                    <div id="Gender1" class="btn-group" data-toggle="buttons">    

                                        <input checked data-toggle="toggle" data-on="Male" data-off="Female" id="Gender"   <?php echo set_checkbox('Gender', '1'); ?>   name="Gender" data-onstyle="primary" data-offstyle="default" type="checkbox">

                                    </div>
                                </div>

                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Role"><span class="requireds">*</span> DEPARTMENT: </label>
                                <div class="col-md-3 col-sm-3 col-xs-12">                          
                                    <select class="form-control col-md-7 col-xs-12" id="Role" name="Role"  required="required">
                                        <option value="" selected disabled>--Select Department--</option>
                                        <?php
                                        //$dept_count = 2;
                                        foreach ($dept_list as $dept) {
                                            echo "<option value='" . $dept['Dept_ID'] . "' " . set_select('Role', $dept['Dept_ID']) . " >" . $dept['Dept_Name'] . "</option>";
                                            //$dept_count++;
                                        }
                                        ?>
                                            <!--<option value="2" <?php echo set_select('Role', '2'); ?> >HR Head</option>-->
                                            <!--<option value="3" <?php echo set_select('Role', '3'); ?> >HR Support</option>-->
                                            <!--<option value="4" <?php echo set_select('Role', '4'); ?> >HR Manager</option>-->
                                            <!--<option value="5" <?php echo set_select('Role', '5'); ?> >Employee</option>-->
                                            <!--<option value="6" <?php echo set_select('Role', '6'); ?> >Technical</option>-->
                                            <!--<option value="7" <?php echo set_select('Role', '7'); ?> >Support</option>-->
                                    </select>
                                </div>
                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Position">POSITION: </label>
                                <div class="col-md-3 col-sm-3 col-xs-12">  

                                    <select class="form-control col-md-7 col-xs-12" id="Position" name="Position" >
                                        <option>--Select Position--</option>

                                        <?php
                                        //$pos_count = 1;
                                        foreach ($pos_list as $pos) {

                                            echo "<option value='" . $pos['Pos_ID'] . "' " . set_select('Position', $pos['Pos_ID']) . " >" . $pos['Position_Name'] . "</option>";
                                            //$pos_count++;
                                        }
                                        ?>

<!--<option value="1" <?php echo set_select('Position', '1'); ?>>Project Manager</option>
<option value="2" <?php echo set_select('Position', '2'); ?>>Team Manager</option>
<option value="3" <?php echo set_select('Position', '3'); ?>>Superviser Manager</option>
<option value="4" <?php echo set_select('Position', '4'); ?>>Team Leader Manager</option>
<option value="5" <?php echo set_select('Position', '5'); ?>>Senior PHP Devloper</option>
<option value="6" <?php echo set_select('Position', '6'); ?>>PHP Devloper</option>
<option value="7"<?php echo set_select('Position', '7'); ?> >Marketing Manager</option>-->
                                    </select>
                                </div>
                            </div>



                            <!--<div class="item form-group">
                              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Username"><span class="requireds">*</span> USERNAME:</label>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <input id="Username" type="text" name="Username" placeholder="Username" required="required" value="<?php echo set_value('Username'); ?>" maxlength="50" class="form-control col-md-7 col-xs-12">
                              </div>
                                                      
                                                      <label for="password" class="control-label col-md-2 col-sm-3 col-xs-12"><span class="requireds">*</span> PASSWORD:</label>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <input id="Password" type="password" name="Password" min="8" max="" placeholder="******" value="<?php echo set_value('Password'); ?>" class="form-control col-md-7 col-xs-12">
                                                        <label class="error" id="passstrength"></label>
                              </div>
                            </div>-->



                            <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Joining_Date"><span class="requireds">*</span> DATE OF JOINING:</label>

                                <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                    <input id="Joining_Date" name="Joining_Date" placeholder="eg.01/01/2017" value="<?php echo set_value('Joining_Date'); ?>" required="required" class="date-picker form-control has-feedback-right"   type="text">
                                    <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>
                            </div>



                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <a href="<?php echo base_url() ?>index.php/Employee/add_emp_list"><button type="button" class="btn btn-danger">Cancel</button></a>
                                    <button id="Add" type="submit" name="Add" class="btn btn-success">Add</button>
                                    <button id="Add_Next" type="submit" name="Add_Next" class="btn btn-success">Add &amp Next</button>
                                    <button type="submit" id="Add_New" name="Add_New" class="btn btn-primary">  Add &amp New</button></a>
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
    var Add;
    var Add_Next;
    $(document).ready(function () {
        /************** Limitaion of character in input fields ****************/
        $("#Short_Name").attr('maxlength', '4');
        $("#Username").attr({'maxlength': '50', 'minlength': '6'});
        $("#Password").attr({'maxlength': '20', 'minlength': '8'});



        $('#Add').click(function () {
            Add = 1;

        });
        $('#Add_Next').click(function () {
            Add_Next = 2;

        });
        /********* Password validation check **********/
        $.validator.addMethod("pwcheck", function (value) {
            return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
                    && /[a-z]/.test(value) // has a lowercase letter
                    && /\d/.test(value) // has a digit
        });

        /********* add method for age verify **********/
        $.validator.addMethod("ageverify", function (value, element) {
            if (this.optional(element)) {
                return true;
            }
            var today = new Date();
            var birthDate = new Date(value);
            var age = today.getFullYear() - birthDate.getFullYear();
            var m = today.getMonth() - birthDate.getMonth();
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }

            if (age < 18) {
                return false;
            } else {
                return true;
            }

            //return true;
        }, 'Age must be 18 Year or above!');



        /************** Jquery validation rules,messages and submit handler ****************/
        $('#Login_Info_Form').validate({
            rules: {
                First_Name: {
                    required: true,
                    minlength: 2,
                    maxlength: 50
                },
                Middle_Name: {
                    maxlength: 10,
                },
                Last_Name: {
                    required: true,
                    minlength: 2,
                    maxlength: 50
                },
                Email: {
                    required: true,
                    email: true
                },
                Short_Name: {
                    required: true,
                    minlength: 3,
                    maxlength: 3
                },
                Dob: {
                    ageverify: true,
                },
                /* Username:{
                 required:true,
                 minlength:6,
                 maxlength:50,
                 remote: {
                 url: "<?php echo base_url(); ?>index.php/Employee/getUser",
                 type: "post",
                 data: {
                 Username: function(){ return $("#Username").val(); }
                 }
                         
                         
                         
                 }
                 },
                 Password:{
                 required:true,
                 pwcheck: true,
                 minlength:8,
                 maxlength:20
                 }*/
            },

            messages: {
                Email: {
                    required: "Email field is required"
                },
                Username: {
                    remote: 'Usernmae already used'
                },
                Password: {

                    pwcheck: "Password required 1-upper or 1-lower,1-digit,1-specialcharacter"

                },

            },

            errorElement: 'span',
            submitHandler: function (form) {

                form.submit();



                return false;


            }
        });




    });
</script>

<script>
    /* $(document).ready(function(){
     $('#Username').blur(checkAvailability);
     });
             
     function checkAvailability(){
     var Username = $('#Username').val();	
             
             
     $.ajax({
     type: "post",
     url: "<?php echo base_url(); ?>index.php/Employee/getUser",
     cache: false,				
     data:{Username:Username},
     dataType:'json',
     success: function(response){
     // alert(response);
     try{
     if(response.user_status =='0'){
     $('#Username').css('border', '2px green solid');	
     }else if(response.user_status =='1'){
     $('#Username').css('border', '2px red solid');	
     }										
     }catch(e) {		
     alert('Exception while request..');
     }		
     },
     error: function(){						
     alert('Error while request..');
     }
     });
             
     }	
     */</script>
