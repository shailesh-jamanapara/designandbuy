<div class="inner_content_bg">
   <div class="container">
	   <div class="contact_inner_part">
			<div class="row">
			
				<div class="col-sm-12">
					<div class="tempalets_status_box" style="margin-bottom:40px;">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#all" role="tab" data-toggle="tab">All</a></li>
                            <li role="presentation"><a href="#verified" role="tab" data-toggle="tab">Verified</a></li>
                            <li role="presentation"><a href="#icomplete" role="tab" data-toggle="tab">Incomplete</a></li>
                            <li role="presentation"><a href="#panding_for_verification" role="tab" data-toggle="tab">Panding For Verification</a></li>
                        </ul>
                        
                        <!-- Tab panes -->
                        <div class="tab-content">

                            <div role="tabpanel" class="tab-pane active" id="all">
                                1

                            </div>

                            <div role="tabpanel" class="tab-pane" id="verified">
                                2
                            </div>

                            <div role="tabpanel" class="tab-pane" id="icomplete">3</div>
                            <div role="tabpanel" class="tab-pane" id="panding_for_verification">4</div>
                        </div>                    
                    </div>
				</div>
				
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
				<div class="col-sm-8">
					<div class="contact_inner_form_part">
						<h6 class="wow fadeInUp">Your Templates </h6>
						<?php if(!empty($school_templates)){ ?>
						 <div role="tabpanel" class="tab-pane" id="vertical_tempalets">
						   <div class="row">
						   <?php foreach($school_templates as $template) { ?>
							  <div class="col-md-3 col-sm-6 col-xs-6" style="margin-top:3% !important;">
								 <div class="featured_hori_block">
									<div class="featured_hori_thumb_block">
									   <img src="<?php echo asset_url(); ?><?php echo $template['template_image_path']; ?> " alt="" class="img-responsive">
									   <div class="featured_hori_back">
										  <div class="tempalates_checkbox">
											 <div class="checkbox checkbox-primary">
												<input id="verti_checkbox1" type="checkbox">
												<label for="verti_checkbox1"></label> 
											 </div> 
										  </div>
										  <ul>
											 <li><a href="javascript:void(0);">Edit Data</a></li>
										  </ul>
									   </div>
									</div>
								 </div>
							  </div>
							  <?php }?>
						</div>
					   </div>
						<?php }else{ ?>
							 <div role="tabpanel" class="tab-pane" id="vertical_tempalets">
								<div class="row">
									<div class="col-md-12 col-sm-6 col-xs-6">
										No template selected
										<br />
									</div>
									<div class="col-md-12 col-sm-6 col-xs-6">
										
										<a class="btn btn-default  pull-right" href="<?php echo base_url(); ?>" >Select Template</a>
									</div>
								</div>
							</div>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

    