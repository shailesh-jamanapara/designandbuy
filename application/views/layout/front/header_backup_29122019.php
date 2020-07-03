<!DOCTYPE HTML>
<html> 
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="theme-color" content="#f26836">
   <title>Design And Buy</title>
   <link href="<?php echo asset_url(); ?>front/images/favicon.png" rel="shortcut icon" />
   <link href="<?php echo asset_url(); ?>front/css/bootstrap.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo asset_url(); ?>front/css/animate.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo asset_url(); ?>front/css/font-awesome.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo asset_url(); ?>front/css/owl.carousel.css" rel="stylesheet" type="text/css" />
   <script type="text/javascript" src="<?php echo asset_url(); ?>front/js/jquery-1.11.3.js"></script>
	<script type="text/javascript" src="<?php echo asset_url(); ?>front/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo asset_url(); ?>front/js/wow.min.js"></script>
   <link href="<?php echo asset_url(); ?>front/css/theme-style.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo asset_url(); ?>front/css/responsive.css" rel="stylesheet" type="text/css" />
	
</head>
<body>
<div class="header_top_part">
   <div class="container">
      <ul class="wow fadeInUp pull-left">
         <li><i class="fa fa-phone" aria-hidden="true"></i> +91 987 654 3210</li>
         <li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:shailesh.gajjar83@gmail.com">shailesh.gajjar83@gmail.com</a></li>
      </ul>
      <ul class="wow fadeInUp pull-right login_head">
		<?php if( isset( $profile )  &&  $profile != false ){ 
		?>
			<li>Welcome, <?php echo $profile['customer_name']; ?> </li>
			<li><a href="<?php echo base_url(); ?>/My_Pages/myaccount?"> My Account <i class="fa fa-cap-mortar"></i></a>  </li>
			<li> <a href="<?php echo base_url(); ?>/Carts/myitems?">Cart <i class="fa fa-shopping-cart"></i><span class="label-badge" id="cart_items"><?php echo get_cart_count(); ?></span></a>
				
			</li>
			<li> <a href="<?php echo base_url(); ?>/User_Login/logout?">Logout <i class="fa fa-sign-out"></i></a> </li>
			
		<?php }else { ?>
			 <li>
				<a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#"><i class="fa fa-user"></i> Login</a>
					<div class="dropdown-menu" id="div_login">
					   <h3>Login</h3>
					   <form class="form-horizontal form-label-left" novalidate method="post" action="<?php echo base_url(); ?>/User_Login/loginValidate?token=<?php echo rand(5000,10000); ?>" id="editform" data-bv-message="This value is not valid" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" enctype="multipart/form-data" autocomplete="off">
					  
						  <div class="form-group">
							 <i class="fa fa-user"></i>
							 <input type="text" class="form-control" name="User_ID" id="User_ID" placeholder="Username" data-bv-notempty="true" data-bv-notempty-message="Please enter username" data-bv-regexp="true" data-bv-regexp-regexp="^[a-zA-Z0-9]+$" data-bv-regexp-message="Registration number must be  alphabet only" data-bv-stringlength="true" data-bv-stringlength-min="4" data-bv-stringlength-max="20" data-bv-stringlength-message="Registration must be 4 to 20 characters" >
						  </div>
						  <div class="form-group">
							 <i class="fa fa-lock"></i>
							 <input type="password" name="Password" class="form-control" placeholder="Password" data-bv-notempty="true" data-bv-notempty-message="Please enter password">
						  </div>
						  <button type="submit" class="btn btn-default">Log in</button>
					   </form>
					</div>
			 </li>
			 <li><a href="<?php echo base_url(); ?>/User_Login/create_account?"> Create Account </a>  </li>
			
      <?php } 
      //echo "<pre>"; print_r($request); echo"</pre>";
      ?>
		
	  </ul>
   </div>
</div>

<div class="navbar navbar-default">
   <div class="container">
      <div class="navbar-brand"><a href="<?php echo base_url(); ?>"><img alt="" class="img-responsive" src="<?php echo asset_url(); ?>front/images/logo.svg" /></a></div>
      <button class="navbar-toggle" data-target=".menu" data-toggle="collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse menu">
         <ul class="nav navbar-nav" id="line_effect">
			
			<li <?php if($request['CONTROLLER'] == 'Home' || $request['CONTROLLER'] == '' ) echo 'class="current-menu-item"' ;?>><a href="<?php echo base_url(); ?>Home">Home</a><?php if( $request['CONTROLLER'] == 'Home' || $request['CONTROLLER'] == '' ){ ?> <div class="linebar"></div> <?php } ?></li>
			
            <li <?php if($request['CONTROLLER'] == 'about-us') echo 'class="current-menu-item"' ;?>><a href="<?php echo base_url(); ?>about-us">About us</a><?php if($request['CONTROLLER'] == 'about-us'){ ?> <div class="linebar"></div> <?php } ?></li>
			
            <li <?php if($request['CONTROLLER'] == 'services' || $request['CONTROLLER'] == 'Studio' ) echo 'class="current-menu-item"' ;?>><a href="<?php echo base_url(); ?>services">Services</a><?php if($request['CONTROLLER'] == 'services' || $request['CONTROLLER'] == 'Studio'  ){ ?> <div class="linebar"></div> <?php } ?></li>
			
            <li <?php if($request['CONTROLLER'] == 'inquiry') echo 'class="current-menu-item"' ;?>><a href="<?php echo base_url(); ?>inquiry/printing">Inquiry</a><?php if($request['CONTROLLER'] == 'inquiry'){ ?> <div class="linebar"></div> <?php } ?></li>
			
            <li <?php if($request['CONTROLLER'] == 'contact-us') echo 'class="current-menu-item"' ;?>><a href="<?php echo base_url(); ?>contact-us">Contact us</a><?php if($request['CONTROLLER'] == 'contact-us'){ ?> <div class="linebar"></div> <?php } ?></li>
         </ul>
      </div>
   </div>
</div>
<!-- 
<div class="inner_content_bg">
    <div class="container"> -->