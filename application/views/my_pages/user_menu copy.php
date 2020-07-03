<div class="col-sm-3">
					<div class="my_account_menu_bg">
						<nav class="menu_collapse_list">
							<ul class="metismenu" id="auto-collapse-menu-demo">
								<li class="<?php if( strtolower($title) == 'my data') echo 'active'; ?>">
									<a href="#" aria-expanded="false">
										<span class="sidebar-nav-item">MY DATA</span> 
										<span class="fa arrow"></span>
									</a>
									<ul aria-expanded="false">
										<li class="<?php if( strtolower($sub_title) == 'action') echo 'active'; ?>" >
											<a href="#" aria-expanded="false">
												<span class="sidebar-nav-item">ACTION</span> 
												<span class="fa arrow"></span>										
											</a>
											<ul aria-expanded="false">
												<li class="<?php if( isset($last_node) && strtolower($last_node) == 'data upload') echo 'active'; ?>" ><a href="<?php echo base_url();?>/My_Pages/data_upload" class="menu-title">DATA UPLOAD</a></li>
												<li class="<?php if( isset($last_node) && strtolower($sub_title) == 'upload entry via link') echo 'active'; ?>" ><a href="<?php echo base_url();?>/My_Pages/send_link" class="menu-title">DATA ENTRY VIA LINK</a></li>
												<li><a href="#" class="menu-title">ENTER DATA MANUALLY</a></li>
												<li><a href="#" class="menu-title">PROOF FOR VERIFICATION</a></li>
											</ul>
										</li>	
										<li><a href="#" class="menu-title">VERIFIED</a></li>										
										<li><a href="#" class="menu-title">PENDING FOR VERIFICATION</a></li>
										<li class="<?php if( isset($last_node) && strtolower($last_node) == 'data upload') echo 'active'; ?>" ><a href="<?php echo base_url();?>/My_Pages/alldata" class="menu-title">ALL DATA</a></li>	
									</ul>
								</li>
								<li class="<?php if( strtolower($title) == 'my order') echo 'active'; ?>" ><a href="#">MY ORDER </a></li>
								<li class="<?php if( strtolower($title) == 'my templates') echo 'active'; ?>">
									<a href="#" aria-expanded="false">
										<span class="sidebar-nav-item">MY TEMPLATES</span>     
										<span class="fa arrow"></span>
									</a>
									<ul aria-expanded="false">
										<li class="<?php if(  isset($last_node) && strtolower($last_node) == 'created template') echo 'active'; ?>" ><a href="<?php echo base_url();?>/My_Pages/created_templates">CREATED TEMPLATE</a></li>
										<li class="<?php if(  isset($last_node) &&  strtolower($last_node) == 'selected template') echo 'active'; ?>" ><a href="<?php echo base_url();?>/My_Pages/selected_templates">SELCTED TEMPLATE</a></li>
										<li><a href="#">SELECT OR CREATE A NEW TEMPLATE</a></li>
									</ul>
								</li>
								<li class="<?php if( strtolower($title) == 'my profile') echo 'active'; ?>"><a href="#" class="menu-title">MY PROFILE</a></li>
							</ul>
						</nav>
					</div>
				</div>
				<div class="col-sm-9 user-content">
<h3 class="my_apages_heading"> <?php echo $title;?> </h3>
<h5 class="my_apages_heading sub-title"> <?php echo $sub_title;?> <?php if( isset($last_node) && $last_node != '') { ?><i class="fa fa-chevron-right"></i> <?php echo $last_node; ?> <?php } ?></h5>
<hr>