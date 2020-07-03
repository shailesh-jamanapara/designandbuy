<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
* 12-20-2016
* header page(view/layout)
*/
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BimHR | Employment Record</title>

    <!-- Bootstrap -->
    <link href="<?php echo vendor_url();?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo vendor_url();?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo vendor_url();?>nprogress/nprogress.css" rel="stylesheet">
   
	<!-- iCheck -->
    <link href="<?php echo vendor_url();?>iCheck/skins/flat/green.css" rel="stylesheet">
	<!-- Datatables -->
	<link href="<?php echo vendor_url();?>datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo vendor_url();?>datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo vendor_url();?>datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo vendor_url();?>datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo vendor_url();?>datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styling plus plugins -->
    <link href="<?php echo asset_url();?>build/css/custom.css" rel="stylesheet">
	<!-- Boostrap toggle button -->
	<link href="<?php echo asset_url();?>build/css/bootstrap-toggle.min.css" rel="stylesheet">
	<!-- bootstrap-datepicker --> 
	<link rel="stylesheet" href="<?php echo asset_url();?>build/css/bootstrap-datepicker3.css"/>
	
	<!-- jQuery -->
    <script src="<?php echo vendor_url();?>jquery/dist/jquery.min.js"></script>
	
	
	<!-- bootstrap-datepicker -->
    <script src="<?php echo vendor_url();?>moment/min/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo asset_url();?>build/js/bootstrap-datepicker.min.js"></script>
	
	<!--- Validation -->
	<script src="<?php echo asset_url();?>build/js/jquery.validate.js"></script>
	
	<!----- Boostrap Timepicker ------>
	<link rel="stylesheet" href="<?php echo asset_url();?>build/css/bootstrap-timepicker.css" />
	<script src="<?php echo asset_url();?>build/js/bootstrap-timepicker.min.js"></script>
	
  </head>

  <body class="nav-md" style="color:#000;">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url();?>index.php/Dashboard" class="site_title">
				<span id="spanin"><span style="color:red;">b</span>hr</span>
				<!--<img src="<?php echo asset_url();?>images/logo.png" class="" alt="BimSym Logo" style="height:30px;margin-top: 10px;">-->
			  </a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url();?>Images/BranchUserImage/user2.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Admin</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br/>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">


			  
				<?php 
				foreach($cat_list as $cat){
					if($cat->Menu_Cat != 0 && $cat->Menu_Cat_Name != ''){
				?>
					
					<div class="menu_section">
						<h3 class="nav_cat"><?= $cat->Menu_Cat_Name ?></h3>
						<ul class="nav side-menu ">
						<?php 
							foreach($menu_list as $menu){
								if($cat->Menu_Cat == $menu->Menu_Cat){
									print_menu($menu->Menu_ID, $menu->Menu_Url, $menu->Menu_Text, $menu->Menu_Sub, $Role_ID);
									//echo '<li><a href="'.$menu->Nav_Url.'"><i class="fa fa-pencfil-square-o"></i> '.$menu->Nav_Text.'</a></li>';
								}
							}
						?>	
						</ul>	
					</div>
				<?php
					}
				}
			  
			  ?>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <!--<div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div> -->
            <!-- /menu footer buttons -->
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
			  <div class="nav Branch_Title" style="">
				<h2>BimSym eBusiness Solutions</h2>
			  </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo base_url();?>Images/BranchUserImage/user2.jpg" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <!--<li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>-->
					<li><a href="<?php echo base_url();?>index.php/Dashboard/profile"><i class="fa fa-sign-out pull-right"></i> Profile</a></li>
					
                    <li><a href="<?php echo base_url();?>index.php/Login/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <!--<li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo asset_url();?>images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo asset_url();?>images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo asset_url();?>images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo asset_url();?>images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
				-->
			  </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        

       