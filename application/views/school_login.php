<div class="featured_templates_content">
   <div class="container">
		 <div class="inner_inquiry_content">
       		        <div class="inner_inquiry_form_part" >
                        <div class="panel panel-default col-lg-8 pull-right" id="school_login">
                            <div class="panel-heading wow fadeInUp">Log in Here</div>
                            <div class="form-success" id="success-alerts"></div>
                            <div class="panel-body">
                                <form id="inquiry-form"  method="post" action="<?php echo base_url();?>index.php/User_Login/loginValidate" class="form-horizontal">
                                    <div class="form-group wow fadeInUp">
                                    <label class="col-md-2 col-sm-3 col-xs-12 control-label">Username</label>
                                    <div class="col-md-10 col-sm-9 col-sm-12">
                                        <input type="text" name="User_ID" class="form-control" placeholder="Username" maxlength="50" required="required" value="" data-bv-notempty="true" data-bv-notempty-message="Enter Username" data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z0-9]+$" data-bv-regexp-message="Please Enter Valid  Username. Allowed only Alphanumeric value" autocomplete="off">
                                    </div>
                                    </div>
                                    <div class="form-group wow fadeInUp">
                                    <label class="col-md-2 col-sm-3 col-xs-12 control-label">Password</label>
                                    <div class="col-md-10 col-sm-9 col-sm-12">
                                        <input type="password" name="Password" class="form-control" placeholder="Password" required="required" >
                                    </div>
                                    </div>
                                   
                                    <div class="form-group wow fadeInUp">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default">Log in</button> or 
										<a href="<?php echo base_url(); ?>index.php/User_Login/create_account?token=<?php echo rand(5000,10000); ?>" class="btn btn-default"> Create New Account </a>
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                     </div>
                
            </div> 
   </div>
</div>

<div class="about_content_bg">
   <div class="container">

      <div class="title_section_block wow fadeInUp">
         <h4>About Us</h4>
      </div>

      <div class="row">
         <div class="col-sm-6">
            <img src="<?php echo asset_url(); ?>front/images/about_profile_thumb.png" alt="" class="img-responsive wow fadeInUp">
         </div>
         <div class="col-sm-6">
            <div class="about_text_part">
               <h3 class="wow fadeInUp">Lorem Ipsum is simply dummy text</h3>
               <p class="wow fadeInUp">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br /><br /> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. </p>
               <div class="pull-left wow fadeInUp"><a href="#" class="btn btn-default">Read More</a></div>
            </div>
         </div>
      </div>

   </div>
</div>

<div class="services_content_bg">
   <div class="container">

      <div class="title_section_block wow fadeInUp">
         <h4>Services</h4>         
      </div>
      <p class="title_discription wow fadeInUp">Lorem Ipsum is simply dummy text of the printing and type setting industry when an unknown printer took  a galley of type and scrambled it to make a type specimen book It has survived not only five centuries.</p>

      <div class="services_content_part">
         <div class="row">

            <div class="col-sm-6">
               <div class="service_listing_block wow fadeInUp">
                  <span><i class="fa fa-bolt" aria-hidden="true"></i></span>
                  <div class="service_listing_detail">
                     <h3>Lorem Ipsum Text</h3>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis augue libero, aliquet id ex sit amet, sodales maximus diam. Vestibulum nulla leo, feugiat ac molestie</p>
                  </div>
               </div>
               <div class="service_listing_block wow fadeInUp">
                  <span><i class="fa fa-cubes" aria-hidden="true"></i></span>
                  <div class="service_listing_detail">
                     <h3>Lorem Ipsum Text</h3>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis augue libero, aliquet id ex sit amet, sodales maximus diam. Vestibulum nulla leo, feugiat ac molestie</p>
                  </div>
               </div>
               <div class="service_listing_block wow fadeInUp">
                  <span><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>
                  <div class="service_listing_detail">
                     <h3>Lorem Ipsum Text</h3>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis augue libero, aliquet id ex sit amet, sodales maximus diam. Vestibulum nulla leo, feugiat ac molestie</p>
                  </div>
               </div>
            </div>

            <div class="col-sm-6">
               <div class="service_video_right wow fadeInUp">
                  <img src="<?php echo asset_url(); ?>front/images/services_video_thumb.jpg" alt="" class="img-responsive">
                  <span><a href="#"><i class="fa fa-play"></i></a></span>
               </div>
            </div>

         </div>
      </div>

   </div>
</div>

<div class="inquiry_content_bg">

   <div class="inquiry_left_part">
         <img src="<?php echo asset_url(); ?>front/images/inquiry_icon_thumb.png" alt="" class="img-responsive">
   </div>
   <div class="inquiry_right_part">
      <div class="title_section_block wow fadeInUp">
         <h4>Inquiry</h4>         
      </div>
      <form>
         <div class="row">
            <div class="col-sm-6 wow fadeInUp">
               <div class="form-group">
                  <label>Full Name</label>
                  <input type="text" class="form-control" id="" placeholder="FULL NAME">
               </div>
            </div>
            <div class="col-sm-6 wow fadeInUp">
               <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" id="" placeholder="EMAIL">
               </div>
            </div>
            <div class="col-sm-6 wow fadeInUp">
               <div class="form-group">
                  <label>Phone</label>
                  <input type="text" class="form-control" id="" placeholder="PHONE">
               </div>
            </div>
            <div class="col-sm-6 wow fadeInUp">
               <div class="form-group">
                  <label>Subject</label>
                  <input type="text" class="form-control" id="" placeholder="SUBJECT">
               </div>
            </div>
            <div class="col-sm-12 wow fadeInUp">
               <div class="form-group">
                  <label>select Templaets</label>
                  <select class="form-control">
                     <option selected disabled>--- select ----</option>
                     <option>Option 1</option>
                     <option>Option 2</option>
                     <option>Option 3</option>
                     <option>Option 4</option>
                  </select>
               </div>
            </div>
            <div class="col-sm-12 wow fadeInUp">
               <div class="form-group">
                  <label>Message</label>
                  <textarea class="form-control" placeholder="MESSAGE" rows="5"></textarea>
               </div>
            </div>
            <div class="col-sm-12 wow fadeInUp">
               <button type="submit" class="btn btn-default pull-right">Submit</button>
            </div>
         </div>                  
      </form>
   </div>
</div>