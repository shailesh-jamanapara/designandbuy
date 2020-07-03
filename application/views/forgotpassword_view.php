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
            <form id="frm_forgotpassword" name="frm_forgotpassword" method="post" class="form-horizontal form-label-left" autocomplete="off" data-bv-message="This value is not valid" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" >
			<input type="hidden" name="task" id="task" value="" />
              <h1>Forgot password</h1>
              <h5 id="message">Enter your official Email ID to get reset password link</h5>
              <div class="form-group" id="div_reset">
			  <label class="control-label col-lg-1 col-md-0 col-sm-0 col-xs-0 label-title-upper" for="first_name" id="lbl_dob"></label>
				<div class="col-lg-12 col-md-1 col-sm-3 col-xs-12 form-group">   
                <input type="email" name="email_id" class="form-control"  data-bv-notempty="true" data-bv-notempty-message="Please enter official Email ID"  placeholder="Email ID [ Official ]" maxlength="50"  value="" autocomplete="off"/>
				</div>
              </div>
              <div class="row" id="div_submit">
				<div class="item form-group col-lg-12 col-md-1 col-sm-3 col-xs-12">
					<input type="submit" class="btn btn-danger pull-right" value="Send" />
				</div>
              </div>
			  <div class="clearfix"></div>
			<div class="separator">
                <!--<p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>-->

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
<script language="javascript">
$(document).ready(function() {
	$('#frm_forgotpassword').bootstrapValidator().on('success.form.bv', function(e) {
		// Prevent form submission
		e.preventDefault();
		//$this->ajax_url_forgot_password = base_url()."index.php/Ajax/forgotPassword";
		//$this->ajax_url_reset_password = base_url()."index.php/Ajax/resetPassword";
		var url = '<?php echo base_url()."index.php/Ajax/forgotPassword"; ?>';
		$('input#task').val('forgotpassword');
		var $form = $(e.target);
		var bv = $form.data('bootstrapValidator');
		// Use Ajax to submit form data
		$.post(url, $form.serialize(), function(result) {
			var obj = $.parseJSON(result);
			$('#message').text(obj.message);
			$('div#div_reset').html('<a href="'+obj.link+'" title="CLick to reset password" target="_blank" > Reset Password</a>');
			$('div#div_submit').remove();
			if(obj.status == 'success'){
				$('#message').addClass('text-success');
			}
			if(obj.status == 'failed'){
				$('#message').addClass('text-danger');
			}
		});
		$('.btn-success').prop("disabled", false);
	});
});

</script>
<script src="<?php echo asset_url();?>build/js/jquery.validate.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
</body>
</html>