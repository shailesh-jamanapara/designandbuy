<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
/*
* 01-10-2017
* profile page(view/profile)
*/

if(isset($Password_Change)){
	echo '<script>$(document).ready(function(){				
					$("#myModal3").modal({backdrop: "static"});
			});</script>'; //exit;
}
?>

	<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                
              </div>
              
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 
                  <div class="x_content">				  
				  
					<div class="" id="Profile_Alert">
						<?php if(validation_errors() ) {
							echo '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';
							echo validation_errors().'</div><script>/*setTimeout(function(){$("#Profile_Alert").slideUp();},3000);*/</script>';
						}?>
					</div>					
					
					<form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>index.php/Dashboard/update_profile" id="Profile_Page">
                      
                      <span class="section">Profile Detail</span>
                      
                      <div class="item form-group">
                        <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12"><span class="requireds">*</span> Old Password</label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input type="password" id="Old_Password" name="Old_Password" class="wid290 form-control col-md-7 col-xs-12" minlength="8" maxlength="20" onkeyup="check_old_password();">
                        </div>
					  </div>
					  <div class="item form-group">
						<label for="Password" class="control-label col-md-3 col-sm-3 col-xs-12"><span class="requireds">*</span> New Password</label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input type="password" id="Password" name="Password" class="wid290 form-control col-md-7 col-xs-12" minlength="8" maxlength="20" onkeyup="match_old_password();">
                        </div>
					  </div>
					  <div class="item form-group">
						<label for="Confirm_Password" class="control-label col-md-3 col-sm-3 col-xs-12"><span class="requireds">*</span> Confirm Password</label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input type="password" id="Confirm_Password" name="Confirm_Password" class="wid290 form-control col-md-7 col-xs-12" minlength="8" maxlength="20" >
                        </div>
                      </div>
					  
					 
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                          <a href="<?php echo base_url()?>"><button type="button" class="btn btn-primary">Cancel</button></a>
                          <button id="send" type="submit" class="btn btn-success">Update</button>
                        </div>
                      </div>
					  <span class="requireds"> Fields marked with an * are required </span>
                    </form>
					
					
					<!-- Modal start -->
					  <div class="modal fade" id="myModal3" role="dialog">
						<div class="modal-dialog">
						
						  <!-- Modal content-->
						  <div class="modal-content">
							<div class="modal-header">
							  
							  <h4 class="modal-title">Password Changed !</h4>
							</div>
							<div class="modal-body">
							  <p>Password has been changed ! Please Login Again with new password.</p>
							</div>
							<div class="modal-footer">
							  <a href="<?echo base_url();?>index.php/Login/logout"><button type="button" class="btn btn-default">Ok</button></a>
							</div>
						  </div>
						  
						</div>
					  </div>
					<!-- Modal start -->
					
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
	


	
		
		<script>
			$(document).ready(function(){
				$('#Password').prop('disabled',true);
				$('#Confirm_Password').prop('disabled',true);
				
				
				/******* Password pattern ******/
				$.validator.addMethod("password",function(value){
						return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
						&& /[a-z]/.test(value) // has a lowercase letter
						&& /\d/.test(value) // has a digit
						&& /[A-Z]/.test(value) // has a uppercase letter
				},"Please Insert valid password, with minimum 1 Uppercase, 1 Lowercase & 1 Digit.");
				
				
				$('#Profile_Page').validate({
					rules:{
						Password:{
							required:true,
							password:true
						},
						Confirm_Password:{
							equalTo:'#Password'
						}
					},
					errorElement:'span',
					submitHandler:function(form){
						form.submit();
					}
				});
			});
			
			
			/******** ajax function to check old password ********/
			function check_old_password(){
				var Password = $('#Old_Password').val();				
				$.ajax({
					url:'<?php echo base_url();?>index.php/Dashboard/match_old_password',
					type:'post',
					data:{Password:Password},
					dataType:'json',
					success:function(resp){
						if(resp.status == 0){
							$('#Password').prop('disabled',false);
							$('#Confirm_Password').prop('disabled',false);
						}else{
							$('#Password').prop('disabled',true);
							$('#Confirm_Password').prop('disabled',true);
						}
					}
				});
			}
			
			
			/******** ajax function to match current password to old password ********/
			function match_old_password(){
				var Password = $('#Password').val();				
				$.ajax({
					url:'<?php echo base_url();?>index.php/Dashboard/match_old_password',
					type:'post',
					data:{Password:Password},
					dataType:'json',
					success:function(resp){
						if(resp.status == 0){
							$("#Profile_Alert").slideDown();
							$('#Profile_Alert').html('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+resp.message+'</div>');
							setTimeout(function(){$("#Profile_Alert").slideUp();},3000);
							
							$('#Password').val('');
						}
					}
				});
			}
				
		</script>