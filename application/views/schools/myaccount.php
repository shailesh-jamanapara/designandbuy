<link href="<?php echo asset_url(); ?>front/css/template-view-grid.css" rel="stylesheet" type="text/css" />
<link href="<?php echo asset_url(); ?>front/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo asset_url(); ?>front/css/menu-sidebar.css" rel="stylesheet" type="text/css" />
<div class="inner_content_bg">
   <div class="container">
	   <div class="contact_inner_part">
			<div class="row">
				
				<div class="col-sm-3">
					<div class="my_account_menu_bg">
						<nav class="menu_collapse_list">
							<ul class="metismenu" id="auto-collapse-menu-demo">
								<li class="active">
									<a href="#" aria-expanded="true">
										<span class="sidebar-nav-item">My Data</span> 
										<span class="fa arrow"></span>
									</a>
									<ul aria-expanded="false">
										<li>
											<a href="#" aria-expanded="false">
												<span class="sidebar-nav-item">Action</span> 
												<span class="fa arrow"></span>										
											</a>
											<ul aria-expanded="false">
												<li><a href="#" class="menu-title">Data upload</a></li>
												<li><a href="#" class="menu-title">Data Entry via link</a></li>
												<li><a href="#" class="menu-title">Enter Data Manually</a></li>
												<li><a href="#" class="menu-title">Proof for Verification</a></li>
											</ul>
										</li>	
										<li><a href="#" class="menu-title">Verified</a></li>										
										<li><a href="#" class="menu-title">Pending for Verification</a></li>
										<li><a href="#" class="menu-title">All Data</a></li>	
									</ul>
								</li>
								<li><a href="#">My Order</a></li>
								<li>
									<a href="#" aria-expanded="false">
										<span class="sidebar-nav-item">My Template</span>     
										<span class="fa arrow"></span>
									</a>
									<ul aria-expanded="false">
										<li><a href="#">Selected Templates</a></li>
										<li><a href="#">Select or create new templates</a></li>
									</ul>
								</li>
								<li><a href="#" class="menu-title">My Profile</a></li>
							</ul>
						</nav>
					</div>
				</div>
				
				<div class="col-sm-9">
					<div class="myaccount_right_content_bg">
					
						
					<div class="tempalets_status_box" style="margin-bottom:40px;">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active" role="presentation"><a href="#students" role="tab" data-toggle="tab">All Data</a></li>
                        </ul>
                        
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="students"> 
								<!-- Starts students data -->
								<div class="row">

            <div class="col-sm-12">
                    <div class="tempalets_status_box">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#allstudents" role="tab" data-toggle="tab">All</a></li>
                            <li role="presentation"><a href="#received" role="tab" data-toggle="tab">Verified</a></li>
                            <li role="presentation"><a href="#panding_for_verification" role="tab" data-toggle="tab">Panding For Verification</a></li>
                            <li role="presentation"><a href="#Action" role="tab" data-toggle="tab">Action</a></li>
                        </ul>
                        
                        <!-- Tab panes -->
                        <div class="tab-content">

                            <div role="tabpanel" class="tab-pane active" id="allstudents">
                                <div class="tempalets_list_content">
									 <div class="row">
										<div class="col-xs-12">
										Total <?php echo count($students);?> Cards Imported
										 : Total <?php echo count($completed);?> Cards Filled Data
										</div>
										<div class="col-xs-12">
										  <div class="box">
											<div class="box-header">
											 <form class="form-horizontal" name="frmsearch" id="frmsearch" method="post" action="" >
											 
											</div>
											<!-- /.box-header -->
											<div class="box-body">
											  <table id="example2" class="table table-bordered table-hover">
												<thead class="headings">
													<tr>
														<th class="sorting column-title  col-lg-1" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Sr. No.</th>
														<th class="column-title col-lg-3 text-primary sortable" column="product_categories.product_category_name" state="none"  >Student Name<i   class="fa fa-sort-alpha-asc"> </i></th>
														<th class="column-title col-lg-2 " column="" state="none"  >I Card<i   class="fa fa-sort-alpha-asc"> </i></th>
														<th class="column-title col-lg-1 " column="" state="none"  >Standard<i   class="fa fa-sort-alpha-asc"> </i></th>
														<th class="column-title col-lg-1 " column="" state="none"  >Division<i   class="fa fa-sort-alpha-asc"> </i></th>
														<th class="column-title col-lg-2 " column="" state="none"  >Mobile No.<i   class="fa fa-sort-alpha-asc"> </i></th>
														<th class="column-title col-lg-2 " column="" state="none"  >Template <i   class="fa fa-sort-alpha-asc"> </i></th>
														<th class="column-title col-lg-1" >Filled Data</th>
													</tr>
												  </thead>
												<tbody>
														<?php  if(!empty($students)) :  $i = 1; foreach($students as $row) :  $id = base64_encode($row['id']); $status = ( $row['status'] == 1) ?"Active":"Inactive"; $row_id= rand(5000, 9000 ); ?>
														<tr id="<?php echo $row_id; ?>">
														<td><?php echo  $i; ?></th>
																	<td><?php echo  $row['student_name'];  ?></td>
																	<td>
																	
																			<div class="tempalets_list_image_wrap">
																			   <img src="<?php echo base_url();?>/uploads/templates/<?php echo $row['template_image_path'];?>" alt="" class="img-responsive"> 
																			</div>                                            
																	</td>
																	<td><?php echo  $row['standard_id'];  ?></td>
																	<td><?php echo  $row['class_id'];  ?></td>
																	<td><?php echo  $row['mobile_no'];  ?></td>
																	<td><?php echo  $row['template_name'];  ?></td>
																	<?php $filled = ($row['student_updated'] != '0000-00-00 00:00:00')?' fa-check text-success ':' fa-exclamation-circle text-danger ';?>
																	<td> <i class="fa <?php echo  $filled;?>" ></i></td>
																	
																	<!-- <td> <a herf="javascript:void(0);" class="edit_link" ><i class="fa fa-pencil-square-o text-success" title="Edit"> </i> </a>
																<a herf="javascript:void(0);" class="edit_link"><i class="fa fa-trash text-warning " title="Delete This Item"> </i> </a>
															</td> -->
																</tr>
														<?php  $i++; endforeach; endif; ?>
														<?php  if(empty($students)) : ?> <td colspan="5" class="text-center" > No record found </td> <?php endif; ?>
													<tbody>
											  </table>
											  </form>
											</div>
											<!-- /.box-body -->
										  </div>
										  <!-- /.box -->
										</div>
										<!-- /.col -->
									  </div>
								</div>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="verified">
                                <div class="tempalets_list_content">

                                    <div class="tempalets_list_content_bg">
                                        <div class="tempalets_list_image">
                                            <div class="tempalets_list_image_wrap">
                                               <img src="assets/images/horizontal_card/card1_hori_front.jpg" alt="" class="img-responsive"> 
                                            </div>                                            
                                        </div>
                                        <div class="tempalets_list_details">
                                            <div class="tempalets_list_title">
                                                <span>Project 1</span>
                                            </div>
                                            <div class="tempalets_list_title2">
                                               <span>SHREE ASTHVINAYAK SCHOOL</span> 
                                            </div>   
                                            <div class="tempalets_list_action">
                                                <ul>
                                                    <li>
                                                        <a data-toggle="modal" data-target="#verified_tempalet" title="Approve" class="checkbox checkbox-primary">
                                                            <input id="verif5" type="checkbox">
                                                            <label for="verif5"></label> 
                                                        </a>
                                                    </li>
                                                    <li><a data-toggle="modal" data-target="#view_tempalet" title="View" class="tempalets_list_view_btn" href="#"><i class="fa fa-eye"></i></a></li>
                                                </ul>                                                 
                                            </div>   
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="received">No record found</div>
                            <div role="tabpanel" class="tab-pane" id="panding_for_verification">No record found</div>
                            <div role="tabpanel" class="tab-pane" id="Action">
							<div class="col-xs-12">
										Total <?php echo count($students);?> Cards Imported
										   :  Total <?php echo count($completed);?> Cards Filled Data
										</div>
							<div class="col-lg-3">
							
              					<ul class="list_quick_btn">
										<li><a href="javascript:void(0);" onclick="javascript:$('#confirm_send_sms').modal('show');">Send SMS with Link <i class="fa fa-arrow-right pull-right " aria-hidden="true"></i></a></li>
										<li><a href="#" onclick="javascript:downloadData(<?php echo $profile['customer_id']; ?>,'<?php echo $profile['customer_name']; ?>');">Download Excel <i class="fa fa-download pull-right" aria-hidden="true"></i></a></li>
										<li><a href="#" onClick="MyWindow=window.open('<?php echo base_url();?>index.php/Schools/myaccount?view_page=a4','MyWindow',width=600,height=300); return false;">View Cards In A4</a></li>
										
										<li><a href="#">Go to Manual Entry <i class="fa fa-arrow-right pull-right" aria-hidden="true"></i></a></li>
									</ul>
							</div>
									<div class="col-lg-9">
											  <table id="example2" class="table table-bordered table-hover">
												<thead class="headings">
													<tr>
														<th class="sorting column-title  col-lg-1" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Sr. No.</th>
														<th class="column-title col-lg-3 text-primary sortable" column="product_categories.product_category_name" state="none"  >Student Name<i   class="fa fa-sort-alpha-asc"> </i></th>
														<th class="column-title col-lg-8 text-primary sortable" column="product_categories.product_category_name" state="none"  >Link<i   class="fa fa-sort-alpha-asc"> </i></th>
													</tr>
												  </thead>
												<tbody>
														<?php  if(!empty($students)) :  $i = 1; foreach($students as $row) :  $id = base64_encode($row['id']); $status = ( $row['status'] == 1) ?"Active":"Inactive"; $row_id= rand(5000, 9000 ); ?>
														<tr id="<?php echo $row_id; ?>">
														<td><?php echo  $i; ?></th>
																	<td><?php echo  $row['student_name'];  ?></td>
																	<td><input class="form-control" type="text" disabled name="" id="" value="<?php echo $row['sms_link'];  ?>" ></td>
																</tr>
														<?php  $i++; endforeach; endif; ?>
														<?php  if(empty($students)) : ?> <td colspan="5" class="text-center" > No record found </td> <?php endif; ?>
													<tbody>
											  </table>
											  </form>
											</div>
											<!-- /.box-body -->
										  </div>
										
								 
							</div>
                        </div>                    
                 
                </div>
            </div>

		</div>
								<!-- Ends students data -->
							</div>
                        </div>   
						
						
					
					</div>
				</div>
			
				<div class="col-sm-12">
					<div class="tempalets_status_box" style="margin-bottom:40px;">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#mytemplates" role="tab" data-toggle="tab">My Templates</a></li>
                            <li role="presentation"><a href="#verified" role="tab" data-toggle="tab">My Orders</a></li>
                            <li role="presentation"><a href="#icomplete" role="tab" data-toggle="tab">My Profile</a></li>
                            <li role="presentation"><a href="#students" role="tab" data-toggle="tab">Students Data</a></li>
                        </ul>
                        
                        <!-- Tab panes -->
                        <div class="tab-content">
							<!--  starts my templates -->
                            <div role="tabpanel" class="tab-pane active" id="mytemplates">
							
							
            <div class="col-sm-12">
                <div class="">

                    <div class="tempalets_status_box">
                        <!-- Nav tabs -->
					<?php if(!empty($my_templates)){ ?>
					<ul class="nav nav-tabs" role="tablist">
					<?php $i = 0; ?>
					<?php foreach($my_templates as $template ){
							if(isset($template['id'])){
							?>
					<li <?php if($i == 0) echo 'class="active" '; ?> role="presentation"><a href="#template_<?php echo $template['id']; ?>" role="tab" data-toggle="tab"><?php echo $template['template_name']; ?></a></li>
					<?php $i++; } ?>
					
					<?php } ?>	
					</ul>
					<?php } ?>	
                        
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <?php if(!empty($my_templates)){ ?>
							<?php $j = 0; 
							
							?>
								<?php 
									if(isset($my_templates) && !empty($my_templates) ){
									foreach($my_templates as $card ){ 
										if(isset($card) && count($card) > 0 ){
									?>
									<div role="tabpanel" class="tab-pane <?php if($j == 0) echo "active"; ?>"  id="template_<?php if(isset($card['id'])) echo $card['id']; ?>">
										<div class="row">
											<div class="col-sm-6">
												<div class="col-sm-9">
													<div class="card_body sidebar_featured_templets">
														<div class="col-sm-12">
															<h4 class="title_contact_detail wow fadeInUp">Template selection</h4>
														</div>
														<ul class="list_quick_btn">
															<li><a href="#"><div class="col-lg-6">Design Name </div> <div class="col-lg-6"> <?php  if(isset($card['template_name']))echo $card['template_name']; ?> </div></a></li>
															<li><a href="#"><div class="col-lg-6">Orientation </div> <div class="col-lg-6"> <?php if(isset($card['preferences']['orientation']['label'])) echo $card['preferences']['orientation']['label']; ?> </div></a></li>
															<li><a href="#"><div class="col-lg-6">Card Type </div> <div class="col-lg-6"> <?php if( isset($card['preferences']) && isset(['chemical_or_smart']['label']))  echo $card['preferences']['chemical_or_smart']['label']; ?> </div></a></li>
															<?php $scan = (isset($card['preferences']['scanner']['value']) && $card['preferences']['scanner']['value'] != '') ?  $card['preferences']['scanner']['label'] : 'None'; ?>
															<li><a href="#"><div class="col-lg-6">Scanning Method </div> <div class="col-lg-6"> <?php echo $scan; ?> </div></a></li>
														<?php if( isset($card['preferences']['chemical_or_smart']['label']) && $card['preferences']['chemical_or_smart']['label'] == 'Smart Card') { ?>
															<li><a href="#"><div class="col-lg-6"> Chip Type </div><div class="col-lg-6"> <?php if(isset($card['preferences']['card_type'])) echo  $card['preferences']['card_type']['label']; ?>  </div></a></li>
															<li><a href="#"><div class="col-lg-6"> Side </div><div class="col-lg-6"> <?php if(isset($card['preferences']['sides'])) echo $card['preferences']['sides']['label']; ?>  </div></a></li>
															<li><a href="#"><div class="col-lg-6"> Finishin Type  </div><div class="col-lg-6"> <?php  if(isset($card['preferences']['finish']))  echo $card['preferences']['finish']['label']; ?>  </div></a></li>
														<?php } ?>
															
														</ul>
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="card_wrap_part">
													<div class="crad_item_part">
													<?php if(isset($card['template_image_path']))  { ?>
													   <img src="<?php   echo base_url(); ?>uploads/templates/<?php echo $card['template_image_path'] ;?>" alt="" class="img-responsive">
													   <div class="card_item_block">
														</div> 
														<?php } ?>
													</div>
												</div>
											</div>
										</div>
										<?php if( isset($card['id']) && isset( $ordered ) && !in_array( $card['id'], $ordered) ) {?>
										<div class="proceed_step_btn">
									<button type="button" onclick="javascript:popupFileLoader('<?php echo $card['id']; ?>','<?php echo $card['template_name']; ?>','<?php echo $profile['customer_id']; ?>','<?php echo $card['customers_template_id']; ?>');" title="Place order for <?php echo $card['template_name']; ?>" class="btn btn-default pull-right">Place order for <?php echo $card['template_name']; ?> <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
								</div>
								<?php } ?>
									</div>
										<?php } ?>	
								<?php $j++;} ?>
								
							<?php } ?>
							<?php } ?>
                            <div role="tabpanel" class="tab-pane" id="panding_for_verification">4</div>
                        </div>                    
                    </div>

                </div>
            </div>

                            </div>
						<!--  starts my templates -->
                            <div role="tabpanel" class="tab-pane" id="verified">
                                Not Available
                            </div>

                            <div role="tabpanel" class="tab-pane" id="icomplete"> 
							<!-- Starts my profile -->
								<div class="col-sm-4">
									<div class="contact_inner_form_part">
										<h5 class="title_contact_detail wow fadeInUp"><?php echo $profile['customer_name']; ?> </h5>
										<div class="row">
											<div class="col-sm-12">
												<div class="contact_block_item wow fadeInUp">
													<h2>Address</h2>
													<p><?php echo $profile['address']; ?></p>
													<p><?php echo $profile['city']; ?> - <?php echo $profile['zipcode']; ?> </p>
												</div>
											</div>
											<div class="col-sm-12">
												<div class="contact_block_item wow fadeInUp">
													<h2>Email</h2>
													<p>
														<a href="mailto:<?php echo $profile['email']; ?>"><?php echo $profile['email']; ?></a>
													</p>
												</div>
											</div>
											  <div class="col-sm-12">
												<div class="contact_block_item wow fadeInUp">
													<h2>Contact Person</h2>
													<p><?php echo $profile['title']; ?>. <?php echo $profile['first_name']; ?></p>
													<p>Designation :  - <?php echo $profile['designation']; ?> </p>
													<p>Department :  - <?php echo $profile['department_name']; ?> </p>
												</div>
											</div>
											<div class="col-sm-12 wow fadeInUp">
												<div class="contact_block_item">
													<h2>Contact</h2>
													<p><?php echo $profile['mobile_no']; ?><br /><?php if( isset($profile['landline_no']) ) { echo $profile['landline_no']; } ?> </p>
												</div>
											</div>
											<?php if( $profile['website'] ){ ?>
											<div class="col-sm-12">
												<div class="contact_block_item wow fadeInUp">
													<h2>Web</h2>
													<p>
														<a href="<?php echo $profile['website']; ?>"><?php echo $profile['website']; ?></a>
													</p>
												</div>
											</div>
											<?php } ?>
										</div>
									</div>
								</div>
				
							<!-- Ends my profile -->
							</div>
                            <div role="tabpanel" class="tab-pane" id="students"> 
								<!-- Starts students data -->
								<div class="row">

            <div class="col-sm-12">
                    <div class="tempalets_status_box">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#allstudents" role="tab" data-toggle="tab">All</a></li>
                            <li role="presentation"><a href="#received" role="tab" data-toggle="tab">Verified</a></li>
                            <li role="presentation"><a href="#panding_for_verification" role="tab" data-toggle="tab">Panding For Verification</a></li>
                            <li role="presentation"><a href="#Action" role="tab" data-toggle="tab">Action</a></li>
                        </ul>
                        
                        <!-- Tab panes -->
                        <div class="tab-content">

                            <div role="tabpanel" class="tab-pane active" id="allstudents">
                                <div class="tempalets_list_content">
									 <div class="row">
										<div class="col-xs-12">
										Total <?php echo count($students);?> Cards Imported
										 : Total <?php echo count($completed);?> Cards Filled Data
										</div>
										<div class="col-xs-12">
										  <div class="box">
											<div class="box-header">
											 <form class="form-horizontal" name="frmsearch" id="frmsearch" method="post" action="" >
											 
											</div>
											<!-- /.box-header -->
											<div class="box-body">
											  <table id="example2" class="table table-bordered table-hover">
												<thead class="headings">
													<tr>
														<th class="sorting column-title  col-lg-1" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Sr. No.</th>
														<th class="column-title col-lg-3 text-primary sortable" column="product_categories.product_category_name" state="none"  >Student Name<i   class="fa fa-sort-alpha-asc"> </i></th>
														<th class="column-title col-lg-2 " column="" state="none"  >I Card<i   class="fa fa-sort-alpha-asc"> </i></th>
														<th class="column-title col-lg-1 " column="" state="none"  >Standard<i   class="fa fa-sort-alpha-asc"> </i></th>
														<th class="column-title col-lg-1 " column="" state="none"  >Division<i   class="fa fa-sort-alpha-asc"> </i></th>
														<th class="column-title col-lg-2 " column="" state="none"  >Mobile No.<i   class="fa fa-sort-alpha-asc"> </i></th>
														<th class="column-title col-lg-2 " column="" state="none"  >Template <i   class="fa fa-sort-alpha-asc"> </i></th>
														<th class="column-title col-lg-1" >Filled Data</th>
													</tr>
												  </thead>
												<tbody>
														<?php  if(!empty($students)) :  $i = 1; foreach($students as $row) :  $id = base64_encode($row['id']); $status = ( $row['status'] == 1) ?"Active":"Inactive"; $row_id= rand(5000, 9000 ); ?>
														<tr id="<?php echo $row_id; ?>">
														<td><?php echo  $i; ?></th>
																	<td><?php echo  $row['student_name'];  ?></td>
																	<td>
																	
																			<div class="tempalets_list_image_wrap">
																			   <img src="<?php echo base_url();?>/uploads/templates/<?php echo $row['template_image_path'];?>" alt="" class="img-responsive"> 
																			</div>                                            
																	</td>
																	<td><?php echo  $row['standard_id'];  ?></td>
																	<td><?php echo  $row['class_id'];  ?></td>
																	<td><?php echo  $row['mobile_no'];  ?></td>
																	<td><?php echo  $row['template_name'];  ?></td>
																	<?php $filled = ($row['student_updated'] != '0000-00-00 00:00:00')?' fa-check text-success ':' fa-exclamation-circle text-danger ';?>
																	<td> <i class="fa <?php echo  $filled;?>" ></i></td>
																	
																	<!-- <td> <a herf="javascript:void(0);" class="edit_link" ><i class="fa fa-pencil-square-o text-success" title="Edit"> </i> </a>
																<a herf="javascript:void(0);" class="edit_link"><i class="fa fa-trash text-warning " title="Delete This Item"> </i> </a>
															</td> -->
																</tr>
														<?php  $i++; endforeach; endif; ?>
														<?php  if(empty($students)) : ?> <td colspan="5" class="text-center" > No record found </td> <?php endif; ?>
													<tbody>
											  </table>
											  </form>
											</div>
											<!-- /.box-body -->
										  </div>
										  <!-- /.box -->
										</div>
										<!-- /.col -->
									  </div>
								</div>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="verified">
                                <div class="tempalets_list_content">

                                    <div class="tempalets_list_content_bg">
                                        <div class="tempalets_list_image">
                                            <div class="tempalets_list_image_wrap">
                                               <img src="assets/images/horizontal_card/card1_hori_front.jpg" alt="" class="img-responsive"> 
                                            </div>                                            
                                        </div>
                                        <div class="tempalets_list_details">
                                            <div class="tempalets_list_title">
                                                <span>Project 1</span>
                                            </div>
                                            <div class="tempalets_list_title2">
                                               <span>SHREE ASTHVINAYAK SCHOOL</span> 
                                            </div>   
                                            <div class="tempalets_list_action">
                                                <ul>
                                                    <li>
                                                        <a data-toggle="modal" data-target="#verified_tempalet" title="Approve" class="checkbox checkbox-primary">
                                                            <input id="verif5" type="checkbox">
                                                            <label for="verif5"></label> 
                                                        </a>
                                                    </li>
                                                    <li><a data-toggle="modal" data-target="#view_tempalet" title="View" class="tempalets_list_view_btn" href="#"><i class="fa fa-eye"></i></a></li>
                                                </ul>                                                 
                                            </div>   
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="received">No record found</div>
                            <div role="tabpanel" class="tab-pane" id="panding_for_verification">No record found</div>
                            <div role="tabpanel" class="tab-pane" id="Action">
							<div class="col-xs-12">
										Total <?php echo count($students);?> Cards Imported
										   :  Total <?php echo count($completed);?> Cards Filled Data
										</div>
							<div class="col-lg-3">
							
              					<ul class="list_quick_btn">
										<li><a href="javascript:void(0);" onclick="javascript:$('#confirm_send_sms').modal('show');">Send SMS with Link <i class="fa fa-arrow-right pull-right " aria-hidden="true"></i></a></li>
										<li><a href="#" onclick="javascript:downloadData(<?php echo $profile['customer_id']; ?>,'<?php echo $profile['customer_name']; ?>');">Download Excel <i class="fa fa-download pull-right" aria-hidden="true"></i></a></li>
										<li><a href="#" onClick="MyWindow=window.open('<?php echo base_url();?>index.php/Schools/myaccount?view_page=a4','MyWindow',width=600,height=300); return false;">View Cards In A4</a></li>
										
										<li><a href="#">Go to Manual Entry <i class="fa fa-arrow-right pull-right" aria-hidden="true"></i></a></li>
									</ul>
							</div>
									<div class="col-lg-9">
											  <table id="example2" class="table table-bordered table-hover">
												<thead class="headings">
													<tr>
														<th class="sorting column-title  col-lg-1" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Sr. No.</th>
														<th class="column-title col-lg-3 text-primary sortable" column="product_categories.product_category_name" state="none"  >Student Name<i   class="fa fa-sort-alpha-asc"> </i></th>
														<th class="column-title col-lg-8 text-primary sortable" column="product_categories.product_category_name" state="none"  >Link<i   class="fa fa-sort-alpha-asc"> </i></th>
													</tr>
												  </thead>
												<tbody>
														<?php  if(!empty($students)) :  $i = 1; foreach($students as $row) :  $id = base64_encode($row['id']); $status = ( $row['status'] == 1) ?"Active":"Inactive"; $row_id= rand(5000, 9000 ); ?>
														<tr id="<?php echo $row_id; ?>">
														<td><?php echo  $i; ?></th>
																	<td><?php echo  $row['student_name'];  ?></td>
																	<td><input class="form-control" type="text" disabled name="" id="" value="<?php echo $row['sms_link'];  ?>" ></td>
																</tr>
														<?php  $i++; endforeach; endif; ?>
														<?php  if(empty($students)) : ?> <td colspan="5" class="text-center" > No record found </td> <?php endif; ?>
													<tbody>
											  </table>
											  </form>
											</div>
											<!-- /.box-body -->
										  </div>
										
								 
							</div>
                        </div>                    
                 
                </div>
            </div>

		</div>
								<!-- Ends students data -->
							</div>
                        </div>                    
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="confirm_order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog div_upload_data" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
      <div class="modal-body">
	  <div class="row">
	  	<div class="col-lg-5 text-left div_btn_uploads">
			<a href="<?php echo base_url();?>index.php/Schools/downloadSample?q=<?php echo rand(5000, 10000);?>" class="btn btn-default" target="_blank"> Download sample Excel  file </a>
		</div>
		<form class="horizontal-form" id="frm_upload_data" action="<?php echo base_url();?>index.php/Schools/uploadSheet" enctype="multipart/form-data" method="post">		
		<input type="hidden" name="template_name" id="template_name" value=""/>	
		<input type="hidden" name="template_id"  id="template_id" value="" />	
		<input type="hidden" name="customer_id"  id="customer_id" value="" />	
		<input type="hidden" name="customers_template_id"  id="customers_template_id" value="" />	
		<div class="col-lg-7 text-left div_btn_uploads">
		<div class="form-group">
				<input type="file" name="student_data" id="file_sheet" value="Upload Excel"  data-bv-notempty="true" data-bv-notempty-message="Please upload Excel sheet" data-bv-file="true"  class="btn btn-default form-control" /><label class="lbl_for_file" for="file_sheet"> Upload Excel </label>
			</div>
		</div>
	  	<div class="col-lg-4 pull-right div_btn_submits">
			<div class="form-group">
				<button type="submit"class="form-control btn btn-default pull-right" id="confrrm"  > Submit <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
				</div>
			</div>
			</form>	
      </div>
      </div>
    </div>
  </div>
</div>
<!-- Tempalets Approve Popup -->
<div class="modal fade" id="success-message" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog div_confirm_order" role="document">
    <div class="modal-content">
      <div class="modal-body">
	  <div class="row">
	  	<div class="col-lg-12">
				<h4 class="text-center">Are you sure to send SMS to all (<?php echo count($students);?>) students ?</h4>
			</div>
		<div class="col-lg-12 text-center">
			<button class="btn btn-success "data-dismiss="modal">Ok  <i class="fa fa-check text-success" aria-hidden="true"></i></button>
		</div>
      </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="confirm_send_sms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog div_confirm_order" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
      <div class="modal-body">
	  <div class="row">
	  
			<div class="col-lg-12">
				<h4 class="text-center">Are you sure to send SMS to all (<?php echo count($students);?>) students ?</h4>
			</div>
			<div class="col-lg-12">
			</div>
			<div class="col-lg-6">
				<button class="btn btn-warning pull-left" id="go_back" onclick="javascript:window.location.reload;">  <i class="fa fa-arrow-left" aria-hidden="true"></i> No</button>
			</div>
			<div class="col-lg-6">
				<button class="btn btn-success pull-right" id="confrrm" onclick="javascript:calltoaction();">Yes, proceed  <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
			</div>
      </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="view_cards_in_a4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog div_view_cards_a4" role="document" style="width:100% !important; margin: 0px auto !important;">
				<div class="modal-content">
						<div class="modal-body row">
									<?php  if(!empty($students)) :  $i = 1; foreach($students as $row) :  $id = base64_encode($row['id']); $status = ( $row['status'] == 1) ?"Active":"Inactive"; $row_id= rand(5000, 9000 ); ?>
									<div class="col-sm-4">
									<?php echo "<pre style='display:none'> "; print_r($row); echo "</pre>";?>
									<div class="card_design_wrap">
										<div class="hori_card_part">
											<div class="hori_header_block" style="">
												<div class="hori_logo_part" style="width:60px;"><img src="<?php echo asset_url(); ?>/front/assets/images/logo_vedant.jpg" alt="" class="img-responsive" styel="max-width:93%"></div>
												<div class="hori_header_title">
													<div class="form-group title1">
														<input type="text" style=" font-size:12px;"class="form-control" value="(Affiliated To CBSE)">
													</div>
													<div class="form-group title2">
														<input type="text" style="font-size :12px"class="form-control" value="Vedant International School">
													</div>
												</div>
											</div>
											<div class="hori_body_part">
												<div class="hori_card_info_block">
													<div class="row">
														<div class="col-md-12">
															<div class="form-group title_name" style="margin-bottom:0px;">
																<span style="font-size:14px">Name :</span>
																<input style="font-size:14px; margin-bottom:0px;" type="text" class="form-control" value="<?php echo  $row['student_name']; ?>">
															</div>
														</div>
														<div class="col-md-6" style="width: 45%  !important;">
															<div class="form-group title_class" style="margin-bottom:0px;">
																<span style="font-size:14px">Class :</span>
																<input style="font-size:14px; margin-bottom:0px;width: 89px !important; " type="text" class="form-control" value="<?php echo $row['standard_id']." ". $row['class_id']." ".$row['house_id'] ; ?>">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group title_dob"  style="margin-bottom:0px;">
																<span style="font-size:14px">D.O.B.:</span>
																<input style="font-size:14px; margin-bottom:0px;width: 89px !important;	" type="text" class="form-control" value="25-5-1992">
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group title_phone"  style="margin-bottom:0px;">
																<span style="font-size:14px">Cell No. :</span>
																<input style="font-size:14px; margin-bottom:0px;" type="text" class="form-control" value="9898989898, 9898989898">
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group title_address"  style="margin-bottom:0px;">
																<span style="font-size:14px"><img src="<?php echo asset_url(); ?>/front/assets/images/home_icon.png" alt=""class="img-responsive"> Address</span>
																<textarea style="font-size:14px; margin-bottom:0px;" type="text" class="form-control">G/304, Parishkar - 2, 
																Khokhara, 
																Ahmedabad.</textarea>
															</div>
														</div>
													</div>
												</div>
												<div class="hori_photo_block">
													<div class="card_profile_pic">
														<div class="">
														   <img class="profile-pic img-responsive" src="<?php echo asset_url(); ?>/front/assets/images/meet_profile_pic.jpg" alt="">
														 </div>
													</div>
													<div class="hori_year_block"><input type="text" class="form-control" style="font-size:12px;"value="2019-2020"></div>
												</div>
											</div>
											<div class="hori_bottom_part text-center" style="padding:5px 60px;"><textarea  class="form-control" style="font-size:10px; width:270px;" >JaiKrishna Soc., Nr. Isanpur Civie Center, Jaymala Cross Road, Isanpur, Ahmedabad-382443 Ph : 32911181</textarea>	
											</div>
										</div>
									</div>
									
								</div>
									<?php  $i++; endforeach; endif; ?>
						</div>
				</div>
		</div>
</div>
<form id="frm_download_data" action="<?php echo base_url();?>index.php/Ajax/downloadData?id=<?php echo rand(1000,10000);?>" enctype="multipart/form-data" method="post" target="_blank">
<input type="hidden" name="school_id" id="school_id" value="">
<input type="hidden" name="school_name" id="school_name" value="">
</form>
<script>
$(document).ready(function(){
	
});
function popupFileLoader(template_id, template_name, customer_id, customers_template_id){
	$('#template_id').val(template_id);
	$('#template_name').val(template_name);
	$('#customer_id').val(customer_id);
	$('#customers_template_id').val(customers_template_id);
	$('#confirm_order').modal('show');
}

$(document).ready(function() {
	$('#frm_upload_data').bootstrapValidator();
});
function calltoaction(){
	$.ajax({
		url:'<?php echo base_url();?>index.php/Schools/sendMessagesToParents',
		success:function(resp){
			if(resp == 'success'){

			$('#confirm_send_sms').modal('hide');
			$('#success-message').modal('show');
			}
		}
	});
}	
function downloadData(school_id, school_name){
	$('#school_id').val(school_id);
	$('#school_name').val(school_name);
	$('#frm_download_data').submit();
}
function viewCards(){
	$('#view_cards_in_a4').modal('show');
}
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>

<script type="text/javascript" src="<?php echo asset_url(); ?>front/js/metisMenu.min.js"></script>
<script type="text/javascript" src="<?php echo asset_url(); ?>front/js/custom.js"></script>






