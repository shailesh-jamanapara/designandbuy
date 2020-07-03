<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BimHR | Employment Record</title>

        <!-- Bootstrap -->
        <link href="<?php echo vendor_url(); ?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?php echo vendor_url(); ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?php echo vendor_url(); ?>nprogress/nprogress.css" rel="stylesheet">

        <!-- iCheck -->
        <link href="<?php echo vendor_url(); ?>iCheck/skins/flat/green.css" rel="stylesheet">
        <!-- Datatables -->
        <link href="<?php echo vendor_url(); ?>datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo vendor_url(); ?>datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo vendor_url(); ?>datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo vendor_url(); ?>datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo vendor_url(); ?>datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

        <!-- Custom styling plus plugins -->
        <link href="<?php echo asset_url(); ?>build/css/custom.css" rel="stylesheet">
        <!-- Boostrap toggle button -->
        <link href="<?php echo asset_url(); ?>build/css/bootstrap-toggle.min.css" rel="stylesheet">
        <!-- bootstrap-datepicker --> 
        <link rel="stylesheet" href="<?php echo asset_url(); ?>build/css/bootstrap-datepicker3.css"/>

        <!-- jQuery -->
        <script src="<?php echo vendor_url(); ?>jquery/dist/jquery.min.js"></script>


        <!-- bootstrap-datepicker -->
        <script src="<?php echo vendor_url(); ?>moment/min/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo asset_url(); ?>build/js/bootstrap-datepicker.min.js"></script>

        <!--- Validation -->
        <script src="<?php echo asset_url(); ?>build/js/jquery.validate.js"></script>

        <!----- Boostrap Timepicker ------>
        <link rel="stylesheet" href="<?php echo asset_url(); ?>build/css/bootstrap-timepicker.css" />
        <script src="<?php echo asset_url(); ?>build/js/bootstrap-timepicker.min.js"></script>

    </head>

    
    <body class="nav-sm" style="color:#000;">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="<?php echo base_url(); ?>index.php/Dashboard" class="site_title">
                                <span id="spanin"><span style="color:red;">b</span>hr</span>
                                <!--<img src="<?php echo asset_url(); ?>images/logo.png" class="" alt="BimSym Logo" style="height:30px;margin-top: 10px;">-->
                            </a>
                        </div>

                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
                        <div class="profile clearfix">
                            <div class="profile_pic">
                                <img src="<?php echo base_url(); ?>Images/BranchUserImage/user2.jpg" alt="..." class="img-circle profile_img">
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
                            <div class="menu_section">
                                <h3>General</h3>
                                <ul class="nav side-menu">
                                    <li><a href="<?php echo base_url(); ?>index.php/users/list/employees"><i class="fa fa-user"></i> Employee Record</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/project/view_project_summary"><i class="fa fa-pie-chart"></i> Project Summary</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/time_attendance/list_time_attendance"><i class="fa fa-clock-o"></i> Time &amp Attendance</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/leave/leave_view"><i class="fa fa-pencil-square-o"></i> Leave Management</a></li>
                                    <li><a><i class="fa fa-calculator"></i> Miscellaneous expenses</a></li>
                                    <li><a><i class="fa fa-cogs"></i> Hardware Management</a></li>
                                    <li><a><i class="fa fa-list"></i> Candidates List</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/event/list_event"><i class="fa fa-calendar"></i>Events</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/Daily_performance"><i class="fa fa-calendar"></i>Daily Performance</a></li>
                                </ul>
                            </div>
                            <div class="menu_section">
                                <h3>User Control</h3>
                                <ul class="nav side-menu">
                                    <li><a href="<?php echo base_url(); ?>index.php/Privileges"><i class="fa fa-users"></i> User Access Management</a></li>                  
                                    <li><a href="<?php echo base_url(); ?>index.php/setup/add_benefit_list"><i class="fa fa-calendar"></i>SetUp</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/department/list_dept"><i class="fa fa-calendar"></i>Department</a></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/position/list_pos"><i class="fa fa-calendar"></i>Position</a></li>
                                </ul>
                            </div>

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
                                        <img src="<?php echo base_url(); ?>Images/BranchUserImage/user2.jpg" alt="">
                                        <?php
                                        
                                        if(empty($emp_detail)){
                                            echo 'Aministrator';
                                        }
                                        
                                        if (isset($emp_detail[0]) && is_array($emp_detail[0])) {
                                            echo $emp_detail[0]['First_Name'] . '&nbsp;' . $emp_detail[0]['Last_Name'];
                                        }
                                        ?>

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
                                        <li><a href="<?php echo base_url(); ?>index.php/Dashboard/profile"><i class="fa fa-sign-out pull-right"></i> Profile</a></li>

                                        <li><a href="<?php echo base_url(); ?>index.php/Login/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
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
                                        <span class="image"><img src="<?php echo asset_url(); ?>images/img.jpg" alt="Profile Image" /></span>
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
                                        <span class="image"><img src="<?php echo asset_url(); ?>images/img.jpg" alt="Profile Image" /></span>
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
                                        <span class="image"><img src="<?php echo asset_url(); ?>images/img.jpg" alt="Profile Image" /></span>
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
                                        <span class="image"><img src="<?php echo asset_url(); ?>images/img.jpg" alt="Profile Image" /></span>
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
                <div id="main-content">
                in a view called "view_menu" and then you put

                </div>

                <footer>
                         <div class="pull-right">
                           Copyright © <?php echo date('Y');?> bimsym.com. All rights reserved.
                         </div>
                         <div class="clearfix"></div>
                       </footer>
                       <!-- /footer content -->
                     </div>
                   </div>

                   <!-- compose -->
                   <div class="compose col-md-6 col-xs-12">
                     <div class="compose-header">
                       New Message
                       <button type="button" class="close compose-close">
                         <span>×</span>
                       </button>
                     </div>

                     <div class="compose-body">
                       <div id="alerts"></div>
                       <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
                         <div class="btn-group">
                           <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
                           <ul class="dropdown-menu">
                           </ul>
                         </div>

                         <div class="btn-group">
                           <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                           <ul class="dropdown-menu">
                             <li>
                               <a data-edit="fontSize 5">
                                 <p style="font-size:17px">Huge</p>
                               </a>
                             </li>
                             <li>
                               <a data-edit="fontSize 3">
                                 <p style="font-size:14px">Normal</p>
                               </a>
                             </li>
                             <li>
                               <a data-edit="fontSize 1">
                                 <p style="font-size:11px">Small</p>
                               </a>
                             </li>
                           </ul>
                         </div>

                         <div class="btn-group">
                           <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                           <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                           <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                           <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                         </div>

                         <div class="btn-group">
                           <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                           <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                           <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                           <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                         </div>

                         <div class="btn-group">
                           <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                           <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                           <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                           <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                         </div>

                         <div class="btn-group">
                           <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
                           <div class="dropdown-menu input-append">
                             <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
                             <button class="btn" type="button">Add</button>
                           </div>
                           <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                         </div>

                         <div class="btn-group">
                           <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                           <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
                         </div>

                         <div class="btn-group">
                           <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                           <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                         </div>
                       </div>

                       <div id="editor" class="editor-wrapper"></div>
                     </div>

                     <div class="compose-footer">
                       <button id="send" class="btn btn-sm btn-success" type="button">Send</button>
                     </div>
                   </div>
                   <!-- /compose -->

    
    <!-- Bootstrap -->
    <script src="<?php echo vendor_url();?>bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo vendor_url();?>fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo vendor_url();?>nprogress/nprogress.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="<?php echo vendor_url();?>bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="<?php echo vendor_url();?>jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="<?php echo vendor_url();?>google-code-prettify/src/prettify.js"></script>
	<!-- Boostrap toggle button -->
	<script src="<?php echo asset_url();?>build/js/bootstrap-toggle.min.js"></script>
	<!-- iCheck -->
    <!-- -->
	<script src="<?php echo vendor_url();?>iCheck/icheck.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="<?php echo asset_url();?>build/js/custom.min.js"></script>    
	
	<!-- Custom functions Scripts -->
    <script src="<?php echo asset_url();?>build/js/custom_function.js"></script>    

    <!-- compose -->
    <script>
      $('#compose, .compose-close').click(function(){
        $('.compose').slideToggle();
      });
    </script>
    <!-- /compose -->
	
	
  </body>
</html>