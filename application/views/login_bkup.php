<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
/*
* 12-20-2016
* Login_view page(view)
*/
?>

<!DOCTYPE>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BimHR | Login</title>

    <!-- Bootstrap -->
    <link href="<?php echo vendor_url();?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo vendor_url();?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- JQuery load -->
	<script src="<?php echo vendor_url();?>jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
    <script src="<?php echo vendor_url();?>bootstrap/dist/js/bootstrap.min.js"></script>
  </head>

  <body style="background-color:#F7F7F7;">
    <div class="container login_content_div">
      
	  <div class="login_alert" id="Login_Alert">
		
	  </div>
      <div class="login_wrapper">
        
		<div class="animate form login_form">
          <section class="login_content">
            <form id="Login_Form" method="post" action="" class="form-horizontal form-label-left">
              <h1>Login</h1>
              <div class="form-group">
                <input type="text" name="Username" class="form-control" placeholder="Username" required="required" />
              </div>
              <div class="form-group">
                <input type="password" name="Password" class="form-control" placeholder="Password" required="required" />
              </div>
              <div>
				<input type="submit" class="btn btn-danger" value="Log in" />               
              </div>
			  <a class="reset_pass" href="<?php echo  base_url();?>index.php/Login/forotPassword">Lost your password?</a>

              <div class="clearfix"></div>

              <div class="separator">
                <!--<p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>-->

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><a href="<?php echo base_url();?>" class="site_title" style="background-color: rgb(175, 174, 174);border-radius: 5px;"><img src="<?php echo asset_url();?>images/logo.png" class="" alt="BimSym Logo" style="height:30px;margin: 12px;"></a></h1>
                  <p>Copyright © <?php echo date('Y');?> bimsym.com. All rights reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        
      </div>
    </div>
	
	<!--- Validation -->
	<script src="<?php echo asset_url();?>build/js/jquery.validate.js"></script>
	
	<script>
	$(function(){
		$("#Login_Form")[0].reset();
	
	
		/************** Jquery validation rules,messages and submit handler ****************/
		$('#Login_Form').validate({
			
			//errorElement: 'span',
			submitHandler: function(form){
				login();
				//form.submit();
			}
			
		});
	
	});
	
	
	
	
	function login(){		
		var post = $('#Login_Form').serialize();
		///alert(post); return false;
		
		$.ajax({
			url:"<?php echo base_url();?>index.php/Login/login_validate",
			type:'post',
			data:post,
			dataType: 'json',
			success: function(resp){
				if(resp.status == '1'){
					window.location.href='<?php echo base_url();?>index.php/Dashboard';
				}
				else if(resp.status == '0'){
					$('#Login_Alert').html('<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> <strong>Failed to Login!</strong> Please check Username or Password.</div>');
					
					setTimeout(function(){
						$('#Login_Alert').slideUp();
					},3000);
					$('#Login_Alert').slideDown();
				}
			}
		});		
	}	
	</script>
  </body>
</html>