<!DOCTYPE html>
<html lang="en">

<head>
  <title>Homepage (default) | AppStrap Bootstrap Theme by Themelize.me</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <!-- @todo: fill with your company info or remove -->
  <meta name="description" content="">
  <meta name="author" content="Themelize.me">

  <!-- Bootstrap v4.3.1 CSS via CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <!-- Plugins required on all pages NOTE: Additional non-required plugins are loaded ondemand as of AppStrap 2.5 -->

  <!-- Theme style -->
  <link href="<?php echo asset_url(); ?>/front/css/theme-style.css" rel="stylesheet">

  <!--Your custom colour override-->
  <!-- <link href="#" id="colour-scheme" rel="stylesheet"> -->
  <link href="<?php echo asset_url(); ?>/front/css/colour-orange.css" id="colour-scheme" rel="stylesheet">

  <!-- Your custom override -->
  



  <!-- Optional: ICON SETS -->
  <!-- Iconset: Font Awesome 5.0.13 via CDN -->
  <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
  <!-- Iconset: flag icons - http://lipis.github.io/flag-icon-css/ -->
  <link href="<?php echo asset_url(); ?>front/plugins/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
  <!-- Iconset: ionicons - http://ionicons.com/ -->
  <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
  <!-- Iconset: Linearicons - https://linearicons.com/free -->
  <link href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css" rel="stylesheet">
  <!-- Iconset: Lineawesome - https://icons8.com/articles/line-awesome -->
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <link href="<?php echo asset_url(); ?>front/css/animate.css" rel="stylesheet" type="text/css" />
  

  <!-- Le fav and touch icons - @todo: fill with your icons or remove, try https://realfavicongenerator.net -->
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo asset_url(); ?>/front/favicons/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo asset_url(); ?>/front/favicons/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo asset_url(); ?>/front/favicons/favicon-16x16.png">
  <link rel="shortcut icon" href="<?php echo asset_url(); ?>/front/favicons/favicon.ico">
  <meta name="msapplication-config" content="<?php echo asset_url(); ?>/front/favicons/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">


  <!-- Google fonts -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Rambla:400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Calligraffitti' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Roboto:100,400,700' rel='stylesheet' type='text/css'>
  <link href="<?php echo base_url(); ?>assets/front/plugins/plugin-css/plugin-sticky-classes.css" rel="stylesheet">
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/jquery-1.11.3.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/bootstrap.js"></script>
  
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/front/js/wow.min.js"></script>

</head>

<!-- ======== @Region: body ======== -->

<body class="page <?php if(isset($body_class)) echo $body_class; ?>">