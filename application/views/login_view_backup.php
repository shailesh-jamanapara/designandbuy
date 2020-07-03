<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
/*
* 12-20-2016
* Login_view page(view)
*/


if(isset($Fail_Count) ){
	if($Fail_Count['Fail_status'] == 5 && $Fail_Count['User_Status'] == 'Inactive'){
		$Active = false;
	}else{
		$Active = true;
	}
	
	if($Fail_Count['Fail_status'] >= 3 && $Fail_Count['Fail_status'] < 5 && $Fail_Count['Captcha'] == 'Show'){
		if(isset($captcha)){
			$image = $captcha['image'];
		}else{ $image = NULL;}
		$show_captcha = true;
	}else{
		$show_captcha = false;
	}	
	//print_r($Fail_Count); //exit;
	//echo $_SESSION['captchaWord'];
}else{
	$Active = true;
	$captcha = false;
}
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
    <!-- NProgress -->
    <link href="<?php echo vendor_url();?>nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo vendor_url();?>animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo asset_url();?>build/css/custom.css" rel="stylesheet">
	<!-- JQuery load -->
	<script src="<?php echo vendor_url();?>jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
    <script src="<?php echo vendor_url();?>bootstrap/dist/js/bootstrap.min.js"></script>
  </head>

  <body class="login">
    <div class="container login_content_div">
      
	  <div class="login_alert" id="Login_Alert">
		<?php if($Active == false){
			echo '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>User is Inactive ! Please contact to admin.<br>'.validation_errors().'</div><script>setTimeout(function(){$("#Login_Alert").slideUp();},3000);</script>';
		}		
		elseif(validation_errors() || isset($login_errors) ){
			echo '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'.$login_errors.'<br>'.validation_errors().'</div><script>setTimeout(function(){$("#Login_Alert").slideUp();},3000);</script>';
		}?>
			
	  </div>
      <div class="login_wrapper">
        
		<div class="animate form login_form">
          <section class="login_content">
            <form id="frm_login" name="frm_login" method="post" action="<?php echo base_url();?>index.php/Login/loginValidate" class="form-horizontal form-label-left" autocomplete="off" >
              <h1>Login</h1>
              <div class="form-group">
                <input type="text" name="User_ID" class="form-control" placeholder="Employee Code" maxlength="50" required="required" value="" data-bv-notempty="true" data-bv-notempty-message="Enter Employee Code" data-bv-regexp="true" data-bv-regexp-regexp="^[A-Z0-9]+$" data-bv-regexp-message="Please Enter Valid Employee Code. Allowed only Uppercase and Numeric Value" autocomplete="off"/>
				
              </div>
              <div class="form-group">
                <input type="password" name="Password" class="form-control" placeholder="Password" data-bv-notempty="true" data-bv-notempty-message="Enter Password" autocomplete="off"/>
              </div>
			  <?php if(isset($image) && $show_captcha == true){?>
			  <div class="form-group">
                <p><span class="image"><?php echo $image;?></span> &nbsp;&nbsp;<a href="javascript:void(0);"><i id="refresh" style="font-size:20px;" class="fa fa-refresh" aria-hidden="true"></i></a></p>
				<input type="text" id="captcha" name="captcha" class="form-control" placeholder="Insert text as in Image" minlength="6" maxlength="8" required="required" autocomplete="on"/>
				<input type="hidden" id="word" name="word" value="<?= $_SESSION['captchaWord'];?>">
				
              </div>
			  <?php }?>
			  
              <div>
				<input type="submit" class="btn btn-danger" value="Log in" />
              </div>
			 

              <div class="clearfix"></div>

              <div class="separator">
                <!--<p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>-->
				<a href="javascript:void(0);" onclick="javascript:gotoForgotPassword();">Lost your password</a>
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><a href="<?php echo base_url();?>" class="site_title" style="background-color: rgb(175, 174, 174);border-radius: 5px;text-decoration:none;">
					<!--<img src="<?php echo asset_url();?>images/logo.png" class="" alt="BimSym Logo" style="height:30px;margin: 12px;">-->
					<span id="spanin"><span style="color:red;">b</span>hr</span>
				  </a></h1>
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
	/**** Ajax post for refresh captcha image. *****/
	$(document).ready(function() {
		$('#frm_login').bootstrapValidator();
		$("#refresh").click(function() {
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>" + "index.php/Login/captcha_refresh",
				dataType:'json',
				success: function(res) {
					if (res){
						$('#word').val(res.word);
						$("span.image").html(res.image);
					}
				}
			});
		});
	});
function gotoForgotPassword(){
	$("#frm_login")[0].reset();	
	window.location.href="<?php echo  base_url();?>index.php/Login/forgotPassword";
}
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
</body>
</html>