<!DOCTYPE HTML>
<html> 
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="theme-color" content="#f26836">
   <title>Inquiry | Design And Buy</title>
   <link href="<?php echo asset_url(); ?>front/images/favicon.png" rel="shortcut icon" />
   <link href="<?php echo asset_url(); ?>front/css/bootstrap.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo asset_url(); ?>front/css/animate.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo asset_url(); ?>front/css/font-awesome.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo asset_url(); ?>front/css/style.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo asset_url(); ?>front/css/responsive.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo asset_url(); ?>front/js/jquery-1.11.3.js"></script>
	<script type="text/javascript" src="<?php echo asset_url(); ?>front/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo asset_url(); ?>front/js/wow.min.js"></script>
	<script type="text/javascript" src="<?php echo asset_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="header_top_part">
   <div class="container">

      <ul class="wow fadeInUp pull-left">
         <li><i class="fa fa-phone" aria-hidden="true"></i> +91 987 654 3210</li>
         <li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:shailesh.gajjar83@gmail.com">shailesh.gajjar83@gmail.com</a></li>
      </ul>

      <ul class="wow fadeInUp pull-right login_head">
         <li>
            <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#">School Login</a>
            <div class="dropdown-menu">
               <h3>School Login</h3>
               <form>
                  <div class="form-group">
                     <i class="fa fa-user"></i>
                     <input type="text" class="form-control" placeholder="Email">
                  </div>
                  <div class="form-group">
                     <i class="fa fa-lock"></i>
                     <input type="text" class="form-control" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-default">Submit</button>
               </form>
            </div>
         </li>
         <li>
            <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false" href="#">Employee Login</a>
            <div class="dropdown-menu">
               <h3>Employee Login</h3>
               <form>
                  <div class="form-group">
                     <i class="fa fa-user"></i>
                     <input type="text" class="form-control" placeholder="Email">
                  </div>
                  <div class="form-group">
                     <i class="fa fa-lock"></i>
                     <input type="text" class="form-control" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-default">Submit</button>
               </form>
            </div>
         </li>
      </ul>

   </div>
</div>
<div class="navbar navbar-default">
   <div class="container">
      <div class="navbar-brand"><a href="<?php echo base_url(); ?>"><img alt="" class="img-responsive" src="<?php echo asset_url(); ?>front/images/logo.png" /></a></div>
      <button class="navbar-toggle" data-target=".menu" data-toggle="collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse menu">
         <ul class="nav navbar-nav" id="line_effect">
            <li <?php if( isset($request['CONTROLLER']) == 'Home' || ( !isset($request['CONTROLLER']) || $request['CONTROLLER'] == '' ) ) echo 'class="current-menu-item"' ;?> ><a href="<?php echo base_url(); ?>">Home</a><?php if($request['CONTROLLER'] == 'Home' || ( !isset($request['CONTROLLER']) || $request['CONTROLLER'] == '') ){ ?> <div class="linebar"></div> <?php } ?></li>
            <li <?php if($request['CONTROLLER'] == 'Cms' && $request['ACTION'] == 'aboutus') echo 'class="current-menu-item"' ;?>><a href="<?php echo base_url(); ?>index.php/Cms/aboutus">About us</a><?php if($request['CONTROLLER'] == 'Cms' && $request['ACTION'] == 'aboutus'){ ?> <div class="linebar"></div> <?php } ?></li>
            <li <?php if($request['CONTROLLER'] == 'Cms' && $request['ACTION'] == 'services') echo 'class="current-menu-item"' ;?>><a href="<?php echo base_url(); ?>index.php/Cms/services">Services</a><?php if($request['CONTROLLER'] == 'Cms' && $request['ACTION'] == 'services'){ ?> <div class="linebar"></div> <?php } ?></li>
            <li <?php if($request['CONTROLLER'] == 'Cms' && $request['ACTION'] == 'inquiry') echo 'class="current-menu-item"' ;?>><a href="<?php echo base_url(); ?>index.php/Cms/inquiry">Inquiry</a><?php if($request['CONTROLLER'] == 'Cms' && $request['ACTION'] == 'inquiry'){ ?> <div class="linebar"></div> <?php } ?></li>
            <li <?php if($request['CONTROLLER'] == 'Cms' && $request['ACTION'] == 'contactus') echo 'class="current-menu-item"' ;?>><a href="<?php echo base_url(); ?>index.php/Cms/contactus">Contact us</a><?php if($request['CONTROLLER'] == 'Cms' && $request['ACTION'] == 'contactus'){ ?> <div class="linebar"></div> <?php } ?></li>
         </ul>
      </div>
   </div>
</div>
<!-- 
<div class="inner_content_bg">
    <div class="container"> -->