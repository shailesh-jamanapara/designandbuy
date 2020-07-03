  <!-- @plugin: page loading indicator, delete to remove loader -->
  
  <!-- ======== @Region: #header ======== -->
  <!-- ======== @Region: #header ======== -->
  <div id="header">
   <!--Header upper region-->
   <div class="header-upper">
      <!-- all direct children of the .header-inner element will be vertically aligned with each other you can override all the behaviours using the flexbox utilities (flexbox.htm) All elements with .header-brand & .header-block-flex wrappers will automatically be aligned inline & vertically using flexbox, this can be overridden using the flexbox utilities (flexbox.htm) Use .header-block to stack elements within on small screen & "float" on larger screens use .order-first or/and .order-last classes to make an element show first or last within .header-inner or .headr-block elements -->
      <div class="header-inner container">
        <!--user menu-->
        <div class="header-block-flex order-1 mr-auto">
        <?php if( isset( $profile )  &&  $profile != false ){ ?>
		      <nav class="nav nav-sm header-block-flex">
          <span class=" text-xs pull-right text-white  text-uppercase"> Welcome, <?php echo $profile['customer_name'];?> </span>
            <a class="nav-link text-xs d-none d-md-block text-uppercase ml-2" href="<?php echo base_url(); ?>My_Pages/created_templates?" data-toggle="modal"><i class="fa fa-user" ></i> &nbsp;My Account</a>
          </nav>
          <div class="header-divider header-divider-sm"></div>
          <nav class="nav nav-sm header-block-flex">
            <a class="nav-link text-xs  d-none d-md-block  text-uppercase ml-2" href="<?php echo base_url(); ?>User_Login/logout?" data-toggle="modal"><i class="fa fa-log-out" ></i>&nbsp;Logout</a>
           
          </nav>
          <?php }else { ?>
            <nav class="nav nav-sm header-block-flex">
              <a class="nav-link text-xs d-none d-md-block  text-uppercase" href="<?php echo base_url(); ?>user-login">Log in</a>
            </nav>
            <div class="header-divider header-divider-sm"></div>
            <nav class="nav nav-sm header-block-flex">
              <a class="nav-link text-xs d-none d-md-block  text-uppercase" href="<?php echo base_url(); ?>create-account">Create Account</a>
            </nav>
          <?php } ?>
        </div>
      </div>
    </div>
    <div data-toggle="sticky">

      <div class="header ">
        <!-- all direct children of the .header-inner element will be vertically aligned with each other you can override all the behaviours using the flexbox utilities (flexbox.html) All elements with .header-brand & .header-block-flex wrappers will automatically be aligned inline & vertically using flexbox, this can be overridden using the flexbox utilities (flexbox.htm) Use .header-block to stack elements within on small screen & "float" on larger screens use .order-first or/and .order-last classes to make an element show first or last within .header-inner or .headr-block elements -->
        <div class="header-inner container">
          <!--branding/logo -->
          <div class="header-brand">
            <a class="header-brand-text" href="<?php echo base_url();?>" title="Home">
              <h1 class="h2">
                <span class="header-brand-text-alt">Muktjivan</span>Pixel<span class="header-brand-text-alt"></span>
              </h1>
            </a>
            <div class="header-divider d-none d-lg-block"></div>
            <div class="header-slogan d-none d-lg-block">Printing & ID Card solution</div>
          </div>
          <!-- other header content -->
          <div class="header-block order-lg-12">

           

            <!-- mobile collapse menu button - data-toggle="collapse" = default BS menu - data-toggle="off-canvas" = Off-cavnas Menu - data-toggle="overlay" = Overlay Menu -->
            <a href="#top" class="btn btn-link btn-icon header-btn float-right d-lg-none" data-toggle="collapse" data-target=".navbar-main" data-settings='{"cloneTarget":true, "targetClassExtras": "navbar-offcanvas"}'> <i class="fa fa-bars"></i> </a>
          </div>

          <div class="navbar navbar-expand-md navbar-expand-collapse navbar-static-top">
            <!--everything within this div is collapsed on mobile-->
            <div class="navbar-main collapse ">
              <!--main navigation-->
              <ul class="nav navbar-nav navbar-nav-onepager">
                <li class="nav-item"></li>
                <li class="nav-item">
                  <a href="<?php echo base_url();?>#highlighted" data-toggle="scroll-link" class="nav-link"> <i class="fa fa-home nav-link-icon"></i> <span class="d-none">Home</span> </a>
                </li>

                <li class="nav-item"> <a href="<?php echo base_url();?>#about" data-toggle="scroll-link" class="nav-link  text-capatalize"> About Us </a> </li>
                <li class="nav-item"> <a href="<?php echo base_url();?>#services" data-toggle="scroll-link" class="nav-link"> Services </a> </li>
                <li class="nav-item"> <a href="<?php echo base_url();?>#howto" data-toggle="scroll-link" class="nav-link"> How to  </a> </li>
                <li class="nav-item"> <a href="<?php echo base_url();?>#projects" data-toggle="scroll-link" class="nav-link"> Portfolio </a> </li>
                <li class="nav-item"> <a href="<?php echo base_url();?>#inquiry" data-toggle="scroll-link" class="nav-link"> Inquiry </a> </li>
                <li class="nav-item"> <a href="<?php echo base_url();?>#contact" data-toggle="scroll-link" class="nav-link"> Contact Us </a> </li>
              </ul>
            </div>
            <!--/.navbar-collapse -->
          </div>
        </div>
      </div>
    </div>
  </div>

  