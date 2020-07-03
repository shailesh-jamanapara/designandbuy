<link href="<?php echo asset_url(); ?>/front/studio/css/style.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo asset_url(); ?>/front/plugins/plugin-css/plugin-owl-carousel.min.css" id="colour-scheme" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" type="text/css">
  <!-- ======== @Region: #content ======== -->
<?php
if($icard['preferences']['orientation'] === 'vertical'){
  $canvas['height']='286';
  $canvas['width']='190';
}
if($icard['preferences']['orientation'] === 'horizontal'){
  $canvas['height']='190';
  $canvas['width']='286';
}
?>  
<div id="content" style="background-color:rgba(0, 0, 0, 0.7) !important; padding:0px !important;">
  <!-- Product view -->
      <div class="row no-gutters">
          <div class="col-lg-3 col-md-3 mt-1 mb-1 pl-1">
              <span class="font-weight-lighter text-white pull-left mt-2">Front side </span>  
          </div>
          <?php if(isset($request['task']) && $request['task'] == 'edit_template'){?>
              <div class="col-lg-8 col-md-8 mt-1 mb-1 pr-1 pt-1">
                <button class="mb-1 btn  btn-outline-white bg-hover-orange btn-rounded border-w-2  pull-right " id="btn_save"> Save & Continue <i class="fa fa-save"></i></button> 
              </div>
              <div class="col-lg-1 col-md-1 mt-1 mb-1 pr-1 pt-1">
                  <button class="btn btn-danger  pull-right" onclick="javascript:cancelEdit();"> Cancel</button> 
              </div>
            <?php }else{ ?>
              <div class="col-lg-9 col-md-9 mt-1 mb-1 pr-2 pt-1">
                <button class="mb-1 btn  btn-outline-white bg-hover-orange btn-rounded border-w-2 continue_btn font-weight-lighter" > Save & Continue <i class="fa fa-save"></i></button> 
              </div>
            <?php } ?>
      </div>
      <div class="row no-gutters designer-box">
        <div class="col-lg-12 col-sm-12 border-t border-b"  id="div_left_sidebar">
            <div class="row no-gutters main-tool-window">
                <div class="col-sm-1 col-lg-1 border-l">
                  <ul class="nav nav-tabs nav-stacked">
                    <li class="nav-item" data-placement="top" title="Select background" id="tab_background" ><a href="#vtab1" class="nav-link nav-link-custom" data-toggle="tab"><i class="fa fa-image"></i></a></li>
                    <li class="nav-item"  data-placement="top" title="Add label or text" ><a href="#vtab2" class="nav-link nav-link-custom" data-toggle="tab"><i class="fa fa-font"></i></a></li>
                    <li class="nav-item"  data-placement="top" title="Add variable" ><a href="#vtab6" class="nav-link nav-link-custom" data-toggle="tab"><i class="fa fa-text-height"></i></a></li>
                    <li class="nav-item"  data-placement="top" title="Add icons" ><a href="#vtab3" class="nav-link nav-link-custom" data-toggle="tab"><i class="fas fa-lightbulb"></i></a></li>
                    <li class="nav-item"  data-placement="top" title="Add photo objects"  ><a href="#vtab4" class="nav-link nav-link-custom" data-toggle="tab"><i class="fa fa-users"></i></a></li>
                    <li class="nav-item"  data-placement="top" title="Add common objects" ><a href="#vtab5" class="nav-link nav-link-custom" data-toggle="tab"><i class="fa fa-object-group"></i></a></li>
                    
                  </ul>
                </div>
                <div class="tab-content col-lg-3 col-md-3 col-sm-3 shadow-lg" id="tool_window" >
                    <div class="tab-pane active" id="vtab1">
                      <div class="row mt-2 mb-2 ml-2 mr-2" data-animate="bounceInDown">
                            <div class="col-lg-11 col-md-11 px-2  mt-3">
                            <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter  pt-1 pb-1 vect-bg-studio-dark" onclick="javascript:$('#browse_background_image').modal('show');">  Upload background image &nbsp; &nbsp;<i class="fa fa-upload"></i></button>
                           
                            </div>
                            <div class="col-lg-12 col-sm-12 px-2 text-white font-weight-lighter  mx-1 my-2">Use templates as a background</div>
                            <div class="col-lg-12" id="template_grid" style="scrollbar-width:none;" >
                                <div class="row ">
                                    <?php $i = 1; ?>
                                    <?php foreach($templates as $tmpl){ ?>
                                      <?php $id = $i; ?>
                                          <div class="col-lg-6 col-md-6 px-2 py-2">
                                              <div class="featured_hori_block mb-1  border-w-1">
                                                  <div class="featured_hori_thumb_block">
                                                      <img src="<?php echo base_url();?>/uploads/templates/<?php echo $tmpl['template_image_path'];?>" alt="" class="img-responsive" width="" height="">
                                                      <div class="featured_hori_back">
                                                          <div>
                                                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter pt-1 pb-1 vect-bg-studio-dark" onclick="javascript:pickAndSetImage('<?php echo base_url();?>/uploads/templates/<?php echo $tmpl['template_image_path'];?>');">Use this</button>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <?php $i++;?>
                                    <?php } ?>
                                </div>      
                            </div>
                        </div> 
                    </div>
                    <div class="tab-pane " id="vtab2" >
                      <div class="row ml-1 mt-3 " data-animate="bounceInDown" data-animate-duration="2">
                            <div class="col-lg-12 col-sm-12 px-2 text-white font-weight-lighter  mx-1 ">Use labels</div>
                            <?php if( strtolower($profile['type'])=='school' ) { ?>
                            <div class="col-lg-6 col-md-2 px-2" title="Add a label for Institute Name">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 div-label-block vect-bg-studio-dark" id="label_institute_name">Institute Name</button>
                            </div>
                            <div class="col-lg-6 col-md-2 px-2" title="Add a label for School Name">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 div-label-block vect-bg-studio-dark" id="label_school_name">School Name</button>
                            </div>
                            <div class="col-lg-6 col-md-2 px-2" title="Add a label for Full name">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 div-label-block vect-bg-studio-dark" id="label_full_name"> Full name</button>
                            </div>
                            <div class="col-lg-6 col-md-2 px-2" title="Add a label for GRN No.">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 div-label-block vect-bg-studio-dark" id="label_grn_no"> GRN No.</button>
                            </div>
                            <div class="col-lg-6 col-md-2 px-2" title="Add a label for Roll No.">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 div-label-block vect-bg-studio-dark" id="label_roll_no"> Roll No.</button>
                            </div>

                            <div class="col-lg-6 col-md-2 px-2" title="Add a label for Standard">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 div-label-block vect-bg-studio-dark" id="label_standard"> Standard</button>
                            </div>
                            <div class="col-lg-6 col-md-2 px-2" title="Add a label for Class">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 div-label-block vect-bg-studio-dark" id="label_class"> Class</button>
                            </div>
                            <div class="col-lg-6 col-md-2 px-2" title="Add a label for House">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 div-label-block vect-bg-studio-dark" id="label_house"> House</button>
                            </div>
                            <div class="col-lg-6 col-md-2 px-2" title="Add a label for Academic Year">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 div-label-block vect-bg-studio-dark" id="label_year"> Academic Year</button>
                            </div>
                            <?php }else{ ?>
                            <div class="col-lg-6 col-md-2 px-2" title="Add a label for Company Name">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 div-label-block vect-bg-studio-dark" id="label_company_name"> Company Name</button>
                            </div>
                            <div class="col-lg-6 col-md-2 px-2" title="Add a label for Employee Name">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 div-label-block vect-bg-studio-dark" id="label_employee_name"> Employee Name</button>
                            </div>
                            <div class="col-lg-6 col-md-2 px-2" title="Add a label for Employee Code">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 div-label-block vect-bg-studio-dark" id="label_emp_code"> Employee Code</button>
                            </div>
                            <div class="col-lg-6 col-md-2 px-2" title="Add a label for Department">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 div-label-block vect-bg-studio-dark" id="label_department_name"> Department</button>
                            </div>

                            <div class="col-lg-6 col-md-2 px-2" title="Add a label for Designation">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 div-label-block vect-bg-studio-dark" id="label_designation"> Designation</button>
                            </div>
                            <div class="col-lg-6 col-md-2 px-2" title="Add a label for Job Location">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 div-label-block vect-bg-studio-dark" id="label_location"> Job Location</button>
                            </div>
                            <div class="col-lg-6 col-md-2 px-2" title="Add a label for Joining Date">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 div-label-block vect-bg-studio-dark" id="label_joining_date"> Joining Date</button>
                            </div>

                            <div class="col-lg-6 col-md-2 px-2" title="Add a label for Valid From">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 div-label-block vect-bg-studio-dark" id="label_valid_from"> Valid From</button>
                            </div>
                            <?php } ?>
                            <div class="col-lg-6 col-md-2 px-2" title="Add a label for Essential Mo. No.">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 div-label-block vect-bg-studio-dark" id="label_essential_mobile_no"> Essential Mo. No.</button>
                            </div>
                            <div class="col-lg-6 col-md-2 px-2" title="Add a label for Emergency Mobile No.">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 div-label-block vect-bg-studio-dark" id="label_emergency_mobile_no">Emergency Mo. No.</button>
                            </div>
                            <div class="col-lg-6 col-md-2 px-2" title="Add a label for Address">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 div-label-block vect-bg-studio-dark" id="label_address">Address</button>
                            </div>
                            <div class="col-lg-6 col-md-2 px-2" title="Add a label for Email">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 div-label-block vect-bg-studio-dark" id="label_email_id">Email</button>
                            </div>
                            <div class="col-lg-6 col-md-2 px-2" title="Add a label for Blood Group">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark   div-label-block vect-bg-studio-dark" id="label_blood_group">Blood Group</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane " id="vtab3" data-animate="bounceInDown" data-animate-duration="2">
                      <div class="row ml-1 mt-3 " data-animate="bounceInDown">
                      <div class="col-lg-12 col-sm-12 px-2 text-white font-weight-lighter  mx-1 ">Use icons</div>
                        <div class="col-lg-6 col-md-2 px-2" title="Add a phone icon">
                            <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark" onclick="javascript:addIcon('phone');">Phone icon<i class="fa fa-phone pull-right"></i></button>
                        </div>
                        <div class="col-lg-6 col-md-5  px-2" title="Add a mobile icon">
                            <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark" onclick="javascript:addIcon('mobile');"> Mobile icon<i class="fa fa-mobile pull-right"></i></button>
                        </div>
                        <div class="col-lg-6 col-md-6 px-2" title="Add a Email icon">
                            <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark" onclick="javascript:addIcon('email_white');">Email icon<i class="fa  fa-envelope-o pull-right"></i></button>
                        </div>
                        <div class="col-lg-6 col-md-6 px-2" title="Add a Fax icon">
                            <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark" onclick="javascript:addIcon('fax');">Fax icon<i class="fa  fa-fax pull-right"></i></button>
                        </div>
                        <div class="col-lg-6 col-md-6 px-2" title="Add a skype icon">
                            <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark" onclick="javascript:addIcon('skype');">Skype icon<i class="fa fa-skype pull-right"></i></button>
                        </div>
                        <div class="col-lg-6 col-md-6 px-2" title="Add a whatsapp icon">
                            <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark" onclick="javascript:addIcon('whatsapp');">WhatsApp icon<i class="fa fa-whatsapp pull-right"></i></button>
                        </div>
                        <div class="col-lg-6 col-md-6 px-2" title="Add a facebook icon">
                            <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark" onclick="javascript:addIcon('facebook');">Facebook icon<i class="fa fa-facebook pull-right"></i></button>
                        </div>
                        <div class="col-lg-6 col-md-6 px-2" title="Add twitter icon">
                            <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark" onclick="javascript:addIcon('twitter');"> Twitter icon<i class="fa fa-twitter pull-right"></i></button>
                        </div>
                        <div class="col-lg-6 col-md-6 px-2" title="Add instagram icon">
                            <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark" onclick="javascript:addIcon('instagram');">Instagram icon<i class="fa fa-instagram pull-right"></i></button>
                        </div>
                        <div class="col-lg-6 col-md-6 px-2" title="Add a Google+ icon">
                            <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark" onclick="javascript:addIcon('googleplussquare');">Google+ icon<i class="fa fa-google-plus-square pull-right"></i></button>
                        </div>
                        <div class="col-lg-6 col-md-6 px-2" title="Add a Google+ icon">
                            <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark" onclick="javascript:addIcon('googleplus');">Google+ icon<i class="fa fa-google-plus pull-right"></i></button>
                        </div>
                        <div class="col-lg-6 col-md-6 px-2" title="Add a Website icon">
                            <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark" onclick="javascript:addIcon('globe');">Website icon<i class="fa  fa-globe pull-right"></i></button>
                        </div>
                        <div class="col-lg-6 col-md-6 px-2" title="Add a Home icon">
                            <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark" onclick="javascript:addIcon('home');">Home icon<i class="fa fa-home pull-right"></i></button>
                        </div>
                        <div class="col-lg-6 col-md-6 px-2" title="Add a Office icon">
                            <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark" onclick="javascript:addIcon('office');">Office icon<i class="fa fa-building pull-right"></i></button>
                        </div>
                        <div class="col-lg-6 col-md-6 px-2" title="Add a Factory icon">
                            <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark" onclick="javascript:addIcon('factory');">Factory icon<i class="fa fa-industry pull-right"></i></button>
                        </div>
                        <div class="col-lg-6 col-md-6 px-2" title="Add a Degree icon">
                            <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark" onclick="javascript:addIcon('degree');"><i class="fa fa-graduation-cap pull-right"></i> Degree icon</button>
                        </div>
                        <div class="col-lg-6 col-md-6 px-2" title="Add a Designation icon">
                            <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark" onclick="javascript:addIcon('designation');"><i class="fa fa-briefcase pull-right"></i> Position icon</button>
                        </div>
                        <div class="col-lg-6 col-md-6 px-2" title="Add a Copyright icon">
                            <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark" onclick="javascript:addIcon('copyright');"><i class="fa fa-copyright pull-right"></i> Copyright icon</button>
                        </div>
                        <div class="col-lg-6 col-md-6 px-2" title="Add a Registered icon">
                            <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark" onclick="javascript:addIcon('registered');"><i class="fa fa-registered pull-right"></i> Registered icon</button>
                        </div>
                        <div class="col-lg-6 col-md-6 px-2" title="Add a Birth Date icon">
                            <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark" onclick="javascript:addIcon('birthday');"><i class="fa fa-birthday-cake pull-right"></i> Birth date icon</button>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane " id="vtab4">
                        <div class="row ml-1 mt-3 " data-animate="bounceInDown" data-animate-duration="2">
                        <div class="col-lg-12 col-sm-12 px-2 text-white font-weight-lighter  mx-1 ">Use photo objects</div>
                              <div class="col-lg-6 col-md-6 px-2" title="Add  Photo Object 1">
                                  <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark" onclick="javascript:addPhotoObject('image_control_photo_1','square', 'Photo 1');" >Photo Object 1<i class="fa fa-image pull-right"></i></button>
                              </div>
                              <div class="col-lg-6 col-md-6 px-2" title="Add  Photo Object 1">
                                  <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark" onclick="javascript:addPhotoObject('image_control_photo_2','oval', 'Photo 2');" >Photo Object 2<i class="fa fa-image pull-right"></i></button>
                              </div>
                              <div class="col-lg-6 col-md-6 px-2" title="Add  Photo Object 1">
                                  <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark" onclick="javascript:addPhotoObject('image_control_photo_3','circle', 'Photo 3');" >Photo Object 3<i class="fa fa-image pull-right"></i></button>
                              </div>
                              <div class="col-lg-6 col-md-6 px-2" title="Add Photo Object 2">
                                  <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark" onclick="javascript:addPhotoObject('image_control_photo_2','square', 'Photo 2');">Photo Object 2<i class="fa fa-image pull-right"></i></button>
                              </div>
                              <div class="col-lg-6 col-md-6 px-2" title="Add Photo Object 3">
                                  <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark" onclick="javascript:addPhotoObject('image_control_photo_3','square', 'Photo 3');">Photo Object 3<i class="fa fa-image pull-right"></i></button>
                              </div>
                            </div>
                     </div>
                    
                     <div class="tab-pane " id="vtab5">
                      <div class="row ml-1 mt-3 " data-animate="bounceInDown" data-animate-duration="2">
                      <div class="col-lg-12 col-sm-12 px-2 text-white font-weight-lighter  mx-1 ">Use other objects</div>
                        <div class="col-lg-6 col-md-6 px-2">
                            <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 pull-left vect-bg-studio-dark" onclick="javascript:$('#browse_image').modal('show');" title="Insert image">Insert image <i class="fa fa-image pull-right"></i></button>
                        </div>
                        <div class="col-lg-6 col-md-6  px-2">
                            <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 pull-left vect-bg-studio-dark"  id="div_common_text_block" title="Add text" > Add text<i class="fa fa-font  pull-right"></i></button>
                        </div>
                        <div class="col-lg-6 col-md-6  px-2">
                            <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 pull-left vect-bg-studio-dark" onclick="javascript:$('#browse_image').modal('show');">  Add signature <i class="fa fa-pen-square pull-right"></i></button>
                        </div>
                        <div class="col-lg-6 col-md-6  px-2">
                            <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 pull-left vect-bg-studio-dark" onclick="javascript:addScannerObject('barcode');"  title="Add Barcode" >  Add barcode<i class="fa fa-barcode  pull-right"></i></button>
                        </div>
                        <div class="col-lg-6 col-md-6  px-2">
                            <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 pull-left vect-bg-studio-dark" title="Add QR Code"  onclick="javascript:addScannerObject('qrcode');" >  Add QR Code<i class="fa fa-qrcode pull-right"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane " id="vtab6">
                    
                      <div class="row ml-1 mt-3 " data-animate="bounceInDown" data-animate-duration="2">
                      <div class="col-lg-12 col-sm-12 px-2 text-white font-weight-lighter  mx-1 ">Use variables</div>
                      <?php if( strtolower($profile['type'])=='school' ) { ?>
                          <div class="col-lg-6 col-md-2 px-2" title="Add a variable for  GRN No.">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark  div-control-block vect-bg-studio-dark" id="control_grn_no" data-text="GRN No." > GRN No.</button>
                          </div>
                          <div class="col-lg-6 col-md-2 px-2" title="Add a variable for Roll No.">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark  div-control-block vect-bg-studio-dark" id="control_roll_no" data-text="Roll No." >Roll No.</button>
                          </div>
                          <div class="col-lg-6 col-md-2 px-2" title="Add a variable for Full Name">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark  div-control-block vect-bg-studio-dark" id="control_full_name" data-text="Full Name" >Full Name</button>
                          </div>
                          <div class="col-lg-6 col-md-2 px-2" title="Add a variable for Essential Mobile No.">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark  div-control-block vect-bg-studio-dark" id="control_essential_mobile_no" data-text="Essential Mo. No." >Essential Mo. No.</button>
                          </div>
                          <div class="col-lg-6 col-md-2 px-2" title="Add a variable for Standard">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark  div-control-block vect-bg-studio-dark" id="control_standard" data-text="Standard" >Standard</button>
                          </div>
                          <div class="col-lg-6 col-md-2 px-2" title="Add a variable for Class">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark  div-control-block vect-bg-studio-dark" id="control_class" data-text="Class" >Class</button>
                          </div>
                          <div class="col-lg-6 col-md-2 px-2" title="Add a variable for House">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark  div-control-block vect-bg-studio-dark" id="control_house" data-text="House" >House</button>
                          </div>

                          <div class="col-lg-6 col-md-2 px-2" title="Add a variable for Academic Year">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark  div-control-block vect-bg-studio-dark" id="control_year" data-text="Academic Year" >Academic Year</button>
                          </div> 
                        <?php }else{ ?>

                          <div class="col-lg-6 col-md-2 px-2" title="Add a variable for Employee Name">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark  div-control-block vect-bg-studio-dark" id="control_employee_name" data-text="Employee Name" >Employee Name</button>
                          </div>

                          <div class="col-lg-6 col-md-2 px-2" title="Add a variable for Employee Code">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark  div-control-block vect-bg-studio-dark" id="control_employee_code" data-text="Employee Code" >Employee Code</button>
                          </div>

                          <div class="col-lg-6 col-md-2 px-2" title="Add a variable for Dapartment">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark  div-control-block vect-bg-studio-dark" id="control_department_name" data-text="Dapartment" >Dapartment</button>
                          </div>

                          <div class="col-lg-6 col-md-2 px-2" title="Add a variable for Designation">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark  div-control-block vect-bg-studio-dark" id="control_designation" data-text="Designation" >Designation</button>
                          </div>

                          <div class="col-lg-6 col-md-2 px-2" title="Add a variable for Location">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark  div-control-block vect-bg-studio-dark" id="control_location" data-text="Location" >Location</button>
                          </div>

                          <div class="col-lg-6 col-md-2 px-2" title="Add a variable for Joining Date">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark  div-control-block vect-bg-studio-dark" id="control_joining_date" data-text="Joining Date" >Joining Date</button>
                          </div>

                          <div class="col-lg-6 col-md-2 px-2" title="Add a variable for Emergency Mo. No.">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark  div-control-block vect-bg-studio-dark" id="control_emergency_mobile_no" data-text="Emergency Mo. No." >Emergency Mo. No.</button>
                          </div>
                          
                          <?php } ?>
                          

                          
                          <div class="col-lg-6 col-md-2 px-2" title="Add a variable for Address">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark  div-control-block vect-bg-studio-dark" id="control_address" data-text="Address" >Address</button>
                          </div>

                          <div class="col-lg-6 col-md-2 px-2" title="Add a variable for Email">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark  div-control-block vect-bg-studio-dark" id="control_email_id" data-text="Email" >Email</button>
                          </div>

                          <div class="col-lg-6 col-md-2 px-2" title="Add a variable for Blood Group">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark  div-control-block vect-bg-studio-dark" id="control_blood_group" data-text="Blood Group" >Blood Group</button>
                          </div>
                          <div class="col-lg-6 col-md-2 px-2" title="Add a variable for Valid From">
                              <button class="btn  btn-outline-white bg-hover-orange btn-rounded border-w-1 font-weight-lighter mb-1  mt-2 pt-1 pb-1 vect-bg-studio-dark  div-control-block vect-bg-studio-dark" id="control_valid_from" data-text="Valid From" >Valid From</button>
                          </div>
                      </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 shadow-lg  vect-bg-studio-dark  ml-1" id="div_center" data-animate="bounceInDown" data-animate-duration="2">
                      <div class="row div-text-property pl-2 pr-2 ">Roll No. will allow maximum 20 characters including space.</div>
                      <div class="row no-gutters editor_right_part"  id="editor_right_part" >
                            <div class="col-lg-1 col-sm-1 " >
                            </div>
                            <div class="col-lg-11 col-sm-11" id="div_top_ruler">
                                <canvas id="top-ruler" width="580" height="40px"/>
                            </div>
                            <div class="col-lg-1 col-sm-1"  id="div_left_ruler">
                                <canvas id="left-ruler" width="40" height="640"/>    
                            </div>
                            <div class="col-lg-11 col-sm-11">
                              <div id="maincanvas">
                                <canvas id="canvas" width="<?php echo $canvas['width'];?>" height="<?php echo $canvas['height'];?>" >
                              </div>
                            </div>
                      </div>
                </div>
                <div class="col-lg-2 shadow-lg div-right-sidebar pt-3" id="" data-animate="fadeIn" data-animate-duration="2" >
                      <div class="row ml-1 mr-1">
                      <div class="col-lg-12 mt-1 mx-1 text-white mb-1 font-weight-lighter  px-1">Tools</div>
                      <div class="col-lg-2 col-md-2 px-2 mx-0 my-1" title="Zoom In canvas" >
                         <i   id="zoomIn" class="fa fa-search-plus btn  btn-outline-white bg-hover-orange btn-rounded  border-w-1 font-weight-lighter mb-1  mt-0 pt-2 pb-2 px-2 vect-bg-studio-dark"   aria-hidden="true" ></i>
                      </div>
                      <div class="col-lg-2 col-md-2 px-2 mx-0 my-1" title="Zoom out canvas">
                         <i   id="zoomOut" class="fa fa-search-minus btn  btn-outline-white bg-hover-orange btn-rounded  border-w-1 font-weight-lighter mb-1  mt-0 pt-2 pb-2 px-2 vect-bg-studio-dark"   aria-hidden="true" ></i>
                      </div>
                      <div class="col-lg-2 col-md-2 px-2 mx-0 my-1" title="Reset zoom">
                         <i   id="ResetZoom" class="fa fa-cogs btn  btn-outline-white bg-hover-orange btn-rounded  border-w-1 font-weight-lighter mb-1  mt-0 pt-2 pb-2 px-2 vect-bg-studio-dark "   aria-hidden="true" ></i>
                      </div>
                      <div class="col-lg-2 col-md-2 px-2 mx-0 my-1" title="Clear canvas">
                         <i   id="" onclick="javascript:clearCanvas();" class="fa fa-recycle btn  btn-outline-white bg-hover-orange btn-rounded  border-w-1 font-weight-lighter mb-1  mt-0 pt-2 pb-2 px-2 vect-bg-studio-dark "   aria-hidden="true" ></i>
                      </div>
                      <div class="col-lg-2 col-md-2 px-2 mx-0 my-1" title="Delete the selected object">
                         <i   onclick="javascript:deleteObject();" class="fa fa-trash btn  btn-outline-white bg-hover-orange btn-rounded  border-w-1 font-weight-lighter mb-1  mt-0 pt-2 pb-2 px-2 vect-bg-studio-dark "  data-action="bottom" aria-hidden="true" ></i>
                      </div>
                      <div class="col-lg-12 mt-0 mx-1 text-white mb-0 font-weight-lighter  px-1">Alignment</div>
                      <div class="col-lg-2 col-md-2 px-2 mx-0 my-1" title="Align Left">
                         <i class="fa fa-align-left btn  btn-outline-white bg-hover-orange btn-rounded  border-w-1 font-weight-lighter mb-1  mt-0 pt-2 pb-2 px-2 vect-bg-studio-dark  text-left alignment"  data-action="left" ></i>
                      </div> 
                      <div class="col-lg-2 col-md-2 px-2 mx-0 my-1" title="Align center">
                         <i class="fa fa-align-center btn  btn-outline-white bg-hover-orange btn-rounded  border-w-1 font-weight-lighter mb-1  mt-0 pt-2 pb-2 px-2 vect-bg-studio-dark  text-center alignment"  data-action="center" ></i>
                      </div> 
                      <div class="col-lg-2 col-md-2 px-2 mx-0 my-1" title="Align right">
                         <i class="fa fa-align-right btn  btn-outline-white bg-hover-orange btn-rounded  border-w-1 font-weight-lighter mb-1  mt-0 pt-2 pb-2 px-2 vect-bg-studio-dark  text-right alignment"  data-action="right" ></i>
                      </div>
                      <div class="col-lg-2 col-md-2 px-2 mx-0 my-1" title="Align top">
                         <i class="fa fa-arrow-up btn  btn-outline-white bg-hover-orange btn-rounded  border-w-1 font-weight-lighter mb-1  mt-0 pt-2 pb-2 px-2 vect-bg-studio-dark  text-top alignment"  data-action="top" ></i>
                      </div>

                      <div class="col-lg-2 col-md-2 px-2 mx-0 my-1" title="Align bottom">
                         <i class="fa fa-arrow-down btn  btn-outline-white bg-hover-orange btn-rounded  border-w-1 font-weight-lighter mb-1  mt-0 pt-2 pb-2 px-2 vect-bg-studio-dark  text-ribottomght alignment"  data-action="bottom" ></i>
                      </div>
                      <div class="col-lg-12 px-2 mx-0 my-2">
                        <div class="input-group input-group-sm  mb-2 form-group" title="Change font size">
                            <div class="input-group-prepend"> 
                                <label class="input-group-text bg-hover-orange vect-bg-studio-dark text-white control-label font-weight-lighter " for="fontsize" id="inputGroup-sizing-sm" >Font size</label> 
                            </div>
                            <select class="form-control vect-bg-studio-dark bg-hover-orange text-white  font-weight-lighter font-size" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="fontsize" name="fontsize" >
                            <?php for( $i=8; $i<24; $i++){ ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?> px</option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 px-2 mx-0 my-2">
                        <div class="input-group input-group-sm  mb-2 form-group" title="Change font face">
                            <div class="input-group-prepend"> 
                                <label class="input-group-text bg-hover-orange vect-bg-studio-dark text-white control-label font-weight-lighter " for="fontface" id="inputGroup-sizing-sm" >Font face</label> 
                            </div>
                            <select class="form-control vect-bg-studio-dark bg-hover-orange text-white  font-weight-lighter font-family" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="fontface" name="fontface" >
                                <option value="Arial"> Arial </option>
                                <option value="Arial Narrow"> Arial Narrow </option>
                                <option value="Bookman"> Bookman </option>
                                <option value="Brush Script MT"> Brush Script MT </option>
                                <option value="Calibri"> Calibri </option>
                                <option value="Candara"> Candara </option>
                                <option value="Cambria"> Cambria </option>
                                <option value="Comic Sans MS"> Comic Sans MS </option>
                                <option value="Copperplate"> Copperplate </option>
                                <option value="Courier New"> Courier New </option>
                                <option value="Courier"> Courier </option>
                                <option value="Didot"> Didot </option>
                                <option value="Garamond"> Garamond </option>
                                <option value="Geneva"> Geneva </option>
                                <option value="Geneva"> Georgia </option>
                                <option value="Helvetica"> Helvetica </option>
                                <option value="Lucida Bright"> Lucida Bright </option>
                                <option value="Monaco"> Monaco </option>
                                <option value="Optima"> Optima </option>
                                <option value="Palatino"> Palatino </option>
                                <option value="Perpetua"> Perpetua </option>
                                <option value="Times New Roman"> Times New Roman </option>
                                <option value="Times"> Times </option>
                                <option value="Verdana"> Verdana </option>
                            </select>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-2 px-1 mx-1 my-1" >
                         <button class="btn  btn-outline-white bg-hover-orange btn-rounded  border-w-1  mb-1  mt-0 py-2 px-3  text-center font-style vect-bg-studio-dark "  id="bold"  title="Change to Bold"  onclick="javascript:$('.font-style').removeClass('active');changeFontStyle('bold');" ><b>Bold</b></button>
                      </div>
                      <div class="col-lg-3 col-md-2 px-1 mx-1 my-1">
                         <button class="btn btn-outline-white bg-hover-orange btn-rounded  border-w-1  mb-1  mt-0 py-2 px-3  text-center font-style vect-bg-studio-dark "  id="italic" title="Change to Italic"   onclick="javascript:$('.font-style').removeClass('active');changeFontStyle('italic');" ><i>Italic</i></button>
                      </div>
                      <div class="col-lg-4 col-md-2 px-2  mx-1 my-1" >
                         <button class="btn  btn-outline-white bg-hover-orange btn-rounded  border-w-1 mb-1  mt-0 py-2 px-3  text-center font-style vect-bg-studio-dark "  id="underline" title="Change to Underline"   onclick="javascript:$('.font-style').removeClass('active');changeFontStyle('underline');" ><u>Underline</u></button>
                      </div>
                    <div class="col-lg-5 btn px-2 mx-2  mb-1  mt-2 pt-2 pb-2 text-left btn-outline-white bg-hover-orange btn-rounded border-w-1  vect-bg-studio-dark" id="colorpicker_text" data-placement="top" title="Fill color"  onclick="$('#colorPickerModal').modal('show');">Fill text color
                    </div>
                    <div class="col-lg-5 btn px-2 mx-2  mb-1  mt-2 pt-2 pb-2 text-left  btn-outline-white bg-hover-orange btn-rounded border-w-1 vect-bg-studio-dark" title="Fill color" onclick="$('#borderColorPickerModal').modal('show');">Fill border color
                         </div>
                         <div class="col-lg-8 px-2 mx-0 my-2">
                          <div class="input-group input-group-sm  mb-2 form-group" title="Change font face">
                              <div class="input-group-prepend"> 
                                  <label class="input-group-text input-group-text-custom bg-hover-orange vect-bg-studio-dark text-white control-label font-weight-lighter " for="HeightOfActiveObject" id="inputGroup-sizing-sm" >Height</label> 
                              </div>
                              <input type="text" id="HeightOfActiveObject" class="form-control vect-bg-studio-dark bg-hover-orange text-white  font-weight-lighter"  value="" > 
                          </div>
                        </div>
                        <div class="col-lg-2 mt-3 "><strong class="text-white">Pixels</strong></div>
                        <div class="col-lg-8 px-2 mx-0 my-2">
                          <div class="input-group input-group-sm  mb-2 form-group" title="Change font face">
                              <div class="input-group-prepend"> 
                                  <label class="input-group-text input-group-text-custom bg-hover-orange vect-bg-studio-dark text-white control-label font-weight-lighter " for="WidthOfActiveObject" id="inputGroup-sizing-sm" >Width</label> 
                              </div>
                              <input type="text" id="WidthOfActiveObject" class="form-control vect-bg-studio-dark bg-hover-orange text-white  font-weight-lighter"  value="" > 
                          </div>
                          
                        </div>
                        <div class="col-lg-2 mt-3 "><strong class="text-white">Pixels</strong></div>
                    </div>
                </div>
            </div>
        </div>
      </div>
</div>
 <!-- Font color modal -->
 <div class="modal example-modal-sm" tabindex="-1" id="colorPickerModal" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">
                    Select color
                  </h5>
                  <i class="fa fa-close" data-dismiss="modal" aria-label="Close"> </i>
                </div>
                <div class="modal-body">
                      <div class="row" id="presetColors">
                       </div>

                </div>
                <div class="modal-footer">
                                
                </div>
              </div>
            </div>
          </div>
    
 <!-- /Font color modal -->
  <!-- Border color modal -->
  <div class="modal example-modal-sm" tabindex="-1" id="borderColorPickerModal" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">
                    Select color
                  </h5>
                  <i class="fa fa-close" data-dismiss="modal" aria-label="Close"> </i>
                </div>
                <div class="modal-body">
                      <div class="row" id="presetBorderColors">
                       </div>

                </div>
                <div class="modal-footer">
                                
                </div>
              </div>
            </div>
          </div>
    
 <!-- /Border color modal -->
<!-- Tempalets Approve Popup -->
<div class="modal" id="browse_image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-content-full-width" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
      <div class="modal-body">
		<div class="row">
		<div class="form-group">
		<label class="col-lg-12 control-label">Browse Your Image</label>
		<div class="col-lg-12 photo_desktop">
		<input type="file" name="my_image" id="imgLoader" class="btn btn-primary bg-primary form-control photo_desktop_file" />
		</div>
		</div>
		</div>
	  </div>
	 </div>
	</div>
</div>
<!-- Tempalets Approve Popup -->
<div class="modal" id="browse_background_image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header bg-orange px-3 py-4">
        
       <!--  <div class="circle circle-left"><i class=" fa fa-cloud"></i></div> -->
        <div class="circle circle-right"></div>
         
          <button type="button" class="btn bg-orange close text-white" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true" title="Close to cancle upload">×</span> </button>
        </div>
        <div class="modal-body mt-1">
            <div class="row">
                <div class="col-lg-12 text-center file-uploader-right mt-1">
                      <span class="mb-2">
                            Upload  from your PC
                          </span>
                  <div class="form-group-sm mt-4">
                      <div class="col-lg-12 mb-2 form-group photo_desktop px-2 py-2 font-weight-lighter text-center">
                        
                          <div class="input-group input-group-sm">
                            <div class="input-group-prepend"> 
                              <label class="input-group-text bg-white text-dark" for="backgroundImgLoader" id="inputGroup-sizing-sm">Browse file</label> 
                            </div>
                            <input type="file"  name="background_image"  class="form-control file-ele photo_desktop_file" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="backgroundImgLoader" value="">
                          </div>
                      
                      </div>
                  </div>
                </div>
            </div>
        </div>
	 </div>
	</div>
</div>
<!--Modal: modalPush-->
<!-- Modal Save my template  -->
<div class="modal" id="modal_save_template" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="width: 35%;top: 40%;left: 31%;">
   <div class="modal-dialog modal-content-full-width" role="document">
      <div class="modal-content">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
         <div class="modal-body">
            <div class="">
               <div class="form-group">
                  <label class="col-lg-12 col-md-12 control-label">Template Name :</label>
                  <div class="col-lg-12  col-md-12  ">
                     <input type="text" name="template_name" id="template_name" class="form-control" value="" />
                     <input type="hidden" name="template_type" id="template_type"  value="" />
                     <input type="hidden" name="product_id" id="product_id"  value="" />
                     <input type="hidden" name="template_json" id="template_json" value="" />
                     <input type="hidden" name="preferences[]" id="teplate_json" value="" />

                  </div>
                  <div class="col-lg-12  col-md-12 ">
                     <button type="submit" id="btn_save" class="btn btn-primary pull-right pl-2 pr-2" ><i class="fa fa-save"></i></button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- /Modal add object -->
 <!-- Help for text modal -->
 <div class="modal example-modal-lg" tabindex="-1" id="helpForText" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-modal-delay="8000" data-modal-duration="20000">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                 
                </div>
                <div class="modal-body">
                <strong class="text-brown ">You can use your keboard arrow to move object in the canvas.</strong>
                  <div class="alert alert-orange mt-3" role="alert">
                    Use <b><i class="fa fa-arrow-up"></i> </b> &nbsp;&nbsp; key to move up side.<br>
                    Use <b><i class="fa fa-arrow-right"></i> </b> &nbsp;&nbsp; key to move right side.<br>
                    Use <b><i class="fa fa-arrow-down"></i></b> &nbsp;&nbsp; key to move down side.<br>
                    Use <b><i class="fa fa-arrow-left"></i></b> &nbsp;&nbsp; key to move left side.
                    </div>
                </div>
               <div class="modal-footer">
                        <button class="btn btn-dark btn-rounded pl-3 pr-3" data-dismiss="modal" aria-label="Close" > <i class="fa fa-close"></i> </button>
                </div>
              </div>
            </div>
          </div>
    
 <!-- /Help for text modal -->
<!-- / Modal upload image -->

<link href='http://fonts.googleapis.com/css?family=Oswald|Lobster|Fontdiner+Swanky|Crafty+Girls|Pacifico|Satisfy|Gloria+Hallelujah|Bangers|Audiowide|Sacramento' rel='stylesheet' type='text/css'>
<img src="<?php echo asset_url(); ?>/images/canvas/card1_front_bg.jpg" id="my-image" style="display:none">
<script type="text/javascript" src="<?php echo asset_url(); ?>/front/studio/fabric.js"></script>
<script type="text/javascript" src="<?php echo asset_url(); ?>/front/studio/js/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>
<script>
localStorage.setItem('fields','');
localStorage.setItem('variables','');
localStorage.setItem('scanning_method','');
//$('#helpForText').modal('show');
var task = '';
var fields = {};
var used_labels = [];
var variables = {}; // to be replaced with the value from excel sheet;
<?php if(isset($request['task']) && $request['task'] == 'edit_template'){ ?>
  task = 'edit_template';
  <?php 
  if(isset($icard['arr_fields']) ){ ?>
    var str_fields = '<?php echo $icard['arr_fields']; ?>';
      fields = $.parseJSON(str_fields);
   <?php   
  }
  ?>
  <?php if(isset($icard['customer_template']['template_variables']) && $icard['customer_template']['template_variables'] != '' ){ ?>
    variables = <?php echo $icard['customer_template']['template_variables']; ?>;
   
  <?php } ?>

  //console.log('variables', variables);

<?php } ?>
var state;
 // past states
 var undo = [];
 // reverted states
 var redo = [];
$(document).ready(function(){
  $('#maincanvas').animate({}, 2000);
  $('#tab_background').find('a').trigger('click');
  localStorage.setItem("photo_obj_1","");
  localStorage.setItem("photo_obj_2","");
  localStorage.setItem("photo_obj_3","");
$('label#lbl_font').on('click', function(){
  $('div#div_font_tools').collapse('toggle');
});
var colorData = [
  [255, 255, 255],
  [235, 78, 5],
  [255, 38, 2],
  [71, 31, 76],
  [52, 87, 156],
  [1, 89, 40],
  [255, 127, 0],
  [246, 97, 86],
  [128, 37, 167],
  [76, 126, 167],
  [3, 161, 85],
  [255, 205, 0],
  [255, 112, 163],
  [185, 167, 222],
  [101, 176, 255],
  [117, 205, 94],
  [253, 238, 101],
  [255, 192, 193],
  [243, 217, 255],
  [180, 233, 246],
  [147, 203, 157],
  [55, 30, 41],
  [210, 111, 74],
  [121, 196, 212],
  [144, 62, 57],
  [101, 66, 100],
  [189, 174, 192],
  [164, 116, 133],
  [0, 0, 0]
];

$(function() {
  var $placeholder = $("#presetColors");
  var $tmp;
  $.each(colorData, function(idx, elem) {
    var ccode_r = this[0];
    var ccode_g = this[1];
    var ccode_b =  this[2];

    $tmp = $("<div class='col-lg-1 col-md-1 btn btn-rounded color-pallet' onclick='javascript:pickColor("+ccode_r+","+ccode_g+","+ccode_b+" );' onMouseOver='javascript:changeColor("+ccode_r+","+ccode_g+","+ccode_b+");'>&nbsp;&nbsp;&nbsp;</div>");
    $tmp.css("background-color", "rgb(" + this[0] + "," + this[1] + "," + this[2] + ")");
    $tmp.attr("data-color-code", "rgb(" + this[0] + "," + this[1] + "," + this[2] + ")");
   // $tmp.append($("<span>").text($tmp.css('background-color')));
    //$tmp.append();
    $placeholder.append($tmp);
  });
  var $placeholder = $("#presetBorderColors");
  var $tmp;
  $.each(colorData, function(idx, elem) {
    var ccode_r = this[0];
    var ccode_g = this[1];
    var ccode_b =  this[2];

    $tmp = $("<div class='col-lg-1 col-md-1 btn btn-rounded color-pallet' onclick='javascript:pickBorderColor("+ccode_r+","+ccode_g+","+ccode_b+" );' onMouseOver='javascript:changeBorderColor("+ccode_r+","+ccode_g+","+ccode_b+");'>&nbsp;&nbsp;&nbsp;</div>");
    $tmp.css("background-color", "rgb(" + this[0] + "," + this[1] + "," + this[2] + ")");
    $tmp.attr("data-color-code", "rgb(" + this[0] + "," + this[1] + "," + this[2] + ")");
   // $tmp.append($("<span>").text($tmp.css('background-color')));
    //$tmp.append();
    $placeholder.append($tmp);
  });
});
});
function allowChars(objText, allow_chars, object_id){
  allow_chars = allow_chars+2;
  //$('div.div-text-property').html('<b id="b_id">'+objText+'</b> allow maximum <b>'+allow_chars+'</b> small letter & characters including space.<br />Note: 1 Capital letter = 2 small letters');
  //$('div.div-text-property').css('display','block');
  if(fields[object_id]){
    fields[object_id].allow_chars = allow_chars;
  }
  //console.log('Fields allowChars', fields);
}
$('#start').on('click',function(){
  $('li.FontAwesome').trigger('click');
  var message = '';
  var fontface =   $('input#fontface').val();
    if( fontface == '' || fontface == 'undefined'){
      message = message+'Please select FONT FACE \n';
    }
  var fontsize =   $('select#font-size-config :selected').val();
    if( fontsize == '' || fontsize == 'undefined'){
      message = message+'Please select FONT SIZE \n';
    }
  
  if(message != ''){
    alert(message);
    return false;
  }else{
    $('input#tool_fontface').val(fontface);
    setConfigStorage('fontface', fontface);
    setConfigStorage('fontsize', fontsize);
    setConfigStorage('fontcolor', fontcolor);

    $('#modal_settings').modal('hide');

  }
  if( localStorage.getItem("users_configs") ){
		var stringsconfig = localStorage.getItem("users_configs");
    var users_configs = $.parseJSON(stringsconfig);
    //console.log('users_configs', localStorage.getItem("users_configs"));
	}
});
function setConfigStorage(key, value){
  var users_configs = {};
  if( localStorage.getItem("users_configs") ){
		var stringsconfig = localStorage.getItem("users_configs");
    users_configs = $.parseJSON(stringsconfig);
    
	}
  users_configs[key] = value;
  var stringsconfig = JSON.stringify(users_configs); 
  localStorage.setItem("users_configs", stringsconfig);
 //console.log('users_configs', localStorage.getItem("users_configs"));
}
$('select#font-size-config').on('change', function(){
	var fontSize = $(this).val();
	//$("select.font-size-control select").val(fontSize);
	$('select.font-size-control option[value='+fontSize+']').attr('selected','selected');
  setConfigStorage('font-size', fontSize);
	//alert(fontSize);
});
$('select#font-size-settings').on('change', function(){
	var fontSize = $(this).val();
	setConfigStorage('fontSize', fontSize);
	//alert(fontSize);
});

var canvas = new fabric.Canvas('canvas');
var leftRuler, topRuler, mainCanvas;
var orig_width = canvas.getWidth()
var orig_height = canvas.getHeight()
var orig_zoom = canvas.getZoom()
topRuler = new fabric.Canvas('top-ruler');
leftRuler = new fabric.Canvas('left-ruler');
mainCanvas = canvas;
redrawRulers();
function redrawRulers() {
  topRuler.clear();
  leftRuler.clear();
  topRuler.setBackgroundColor('#16191e');
  //topRuler.setColor('#fff');
  leftRuler.setBackgroundColor('#16191e');
  //leftRuler.setColor('#fff');

  zoomLevel = mainCanvas.getZoom();

  for (i = 0; i < 1000; i += (10 * zoomLevel)) {
    var topLine = new fabric.Line([i, 25, i, 50], {
      stroke: '#e9ecef',
      strokeWidth: 0.5,
      selectable:false
    });
    topRuler.add(topLine);
    var leftLine = new fabric.Line([25, i, 50, i], {
      stroke: '#e9ecef',
      strokeWidth: 0.5,
      selectable:false
    });
    leftRuler.add(leftLine);
  }
  
  // Numbers
  for (i = 0; i < 1000;  i += (100 * zoomLevel)) {
  	var text = new fabric.Text((Math.round(i / zoomLevel)).toString(), {
    	left: i,
      top: 10,
      fontSize: 9,
      fontFace: 9,
      fill: '#e9ecef',
      selectable:false
    });
    topRuler.add(text);
  }
}
var template_data_json = {};
var template_fields_json = {};

<?php if( isset($request['task'] ) && $request['task'] == 'edit_template' && isset($icard['customer_template']['template_data_json']) && $icard['customer_template']['template_data_json'] != '' ){ ?>
  template_data_json = <?php echo $icard['customer_template']['template_data_json']; ?>;
  template_fields_json = <?php echo $icard['customer_template']['template_fields']; ?>;

<?php } ?>


if(template_data_json && template_data_json['objects']){
  //console.log('template_data_json', template_data_json);
  canvas.loadFromJSON(template_data_json, canvas.renderAll.bind(canvas), function(o, object) {
    fabric.log(o, object);
});
}
const STEP = 4;

var Direction = {
    LEFT: 0,
    UP: 1,
    RIGHT: 2,
    DOWN: 3
};
fabric.util.addListener(document.body, 'keydown', function (options) {
      if (options.repeat) {
          return;
      }
      var key = options.which || options.keyCode; // key detection
      if (key === 37) { // handle Left key
          moveSelected(Direction.LEFT);
      } else if (key === 38) { // handle Up key
          moveSelected(Direction.UP);
      } else if (key === 39) { // handle Right key
          moveSelected(Direction.RIGHT);
      } else if (key === 40) { // handle Down key
          moveSelected(Direction.DOWN);
      }
  });
function moveSelected(direction) {
var activeObject = canvas.getActiveObject();

if (activeObject) {
    switch (direction) {
    case Direction.LEFT:
      activeObject.set('left', activeObject.get('left') - STEP);
        break;
    case Direction.UP:
      activeObject.set('top', activeObject.get('top') - STEP);
        break;
    case Direction.RIGHT:
      activeObject.set('left', activeObject.get('left') + STEP);
        break;
    case Direction.DOWN:
      activeObject.set('top', activeObject.get('top') + STEP);
        break;
    }
    var obj_id = activeObject.get('id')

    activeObject.setCoords();
    canvas.renderAll();
  var cwidth = canvas.getWidth();
  var objAtLeft = activeObject.get('left');
  var objText = activeObject.get('text');
  var restw = cwidth - objAtLeft;
  var fontSize= activeObject.get('fontSize');
  var allow_chars =  Math.floor((restw)/(fontSize/2));
  allowChars(objText, allow_chars, obj_id);
  //console.log('Fields', fields);
  //div-text-property

}else {
    //console.log('no object selected');
}

}
$(function(){

    $('#zoomIn').click(function(){
        canvas.setZoom(canvas.getZoom() * 1.1 ) ;
        canvas.setHeight(canvas.getHeight() * 1.1 ) ;
        canvas.setWidth(canvas.getWidth() * 1.1 ) ;
        redrawRulers();
    }) ;

    $('#zoomOut').click(function(){
        canvas.setZoom(canvas.getZoom() / 1.1 ) ;
        canvas.setHeight(canvas.getHeight() / 1.1  ) ;
        canvas.setWidth(canvas.getWidth() / 1.1 ) ;
        redrawRulers();
    }) ;
    $('#ResetZoom').click(function(){
        canvas.setZoom(orig_zoom) ;
        canvas.setHeight(orig_height) ;
        canvas.setWidth(orig_width) ;
        redrawRulers();
    });
    $('#goRight').click(function(){
        var units = 10 ;
        var delta = new fabric.Point(units,0) ;
        canvas.relativePan(delta) ;
    }) ;

    $('#goLeft').click(function(){
        var units = 10 ;
        var delta = new fabric.Point(-units,0) ;
        canvas.relativePan(delta) ;
    }) ;
    $('#goUp').click(function(){
        var units = 10 ;
        var delta = new fabric.Point(0,-units) ;
        canvas.relativePan(delta) ;
    }) ;

    $('#goDown').click(function(){
        var units = 10 ;
        var delta = new fabric.Point(0,units) ;
        canvas.relativePan(delta) ;
    }) ;

}) ;
    </script>
<script type="text/javascript" src="<?php echo asset_url();?>/front/assets/js/image-upload.js"></script>
<script>
var newID = '';
document.getElementById('imgLoader').onchange = function handleImage(e) {
var reader = new FileReader();
  reader.onload = function (event){
    var imgObj = new Image();
    imgObj.src = event.target.result;
    imgObj.onload = function () {
      var image = new fabric.Image(imgObj);
      image.set({
            angle: 0,
            padding: 0,
            cornersize:0
      }).scale(0.2);
      canvas.add(image);
      canvas.renderAll();
      canvas.uniScaleTransform = false;
    }
  }
  reader.readAsDataURL(e.target.files[0]);
  $('#browse_image').modal('hide');
}

document.getElementById('backgroundImgLoader').addEventListener("change", function(e) {
   var file = e.target.files[0];
   var reader = new FileReader();
   reader.onload = function(f) {
      var data = f.target.result;
      fabric.Image.fromURL(data, function(img) {
         // add background image
         canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas), {
            scaleX: canvas.width / img.width,
            scaleY: canvas.height / img.height
         });
      });
   };
   reader.readAsDataURL(file);
   $('#browse_background_image').modal('hide');
});
window.deleteObject = function() {
	 var cmf  = confirm('Are you sure to delete this object?');
   
   var obj_id =canvas.getActiveObject().get('id');
   if(obj_id == 'photo_obj' ){
    localStorage.setItem("photo_obj","0");
   }
   var obj_id = canvas.getActiveObject().get('id');
   //customGetItemByMyID
   if(obj_id == 'image_scanning_method' ){
      localStorage.setItem("image_scanning_method","");
   }
	 if(cmf){
       canvas.remove(canvas.getActiveObject());
       
        if(variables[obj_id]) delete variables[obj_id];
        if(fields[obj_id])  delete fields[obj_id];
   }
}
window.addPhotoObject = function(photo_obj_id, obj_shape, obj_name){
  var photo_obj = checkPhotoObjAndOverwrite(photo_obj_id, obj_name);
  if(photo_obj == "" || photo_obj == null){
    return false;
  }
  var url = '<?php echo asset_url();?>/images/'+photo_obj_id+'.png';
  newID = photo_obj_id;
  
  if(obj_shape == 'square'){
   
    fabric.Image.fromURL(url, function(img) {
      var oImg = img.set({ id:newID, width: img.width, height: img.height,  selectable:true, left: 44,	top: 44, hoverCursor: "pointer", id:newID, objectCaching: false }).scale(0.50);
    canvas.add(oImg);
    canvas.renderAll();
    oImg.set('id', newID);
    canvas.setActiveObject(oImg);
    fields[newID] = oImg;
    variables[newID]=oImg;
    });
  }
  if(obj_shape == 'rounded'){
    fabric.Image.fromURL(url, function(img) {
      var oImg = img.set({ objectCaching: false,id:newID, width: img.width, height: img.height,  selectable:true, left: 48,	top: 48, hoverCursor: "pointer", id:newID, clipTo: roundedCorners.bind(img)}).scale(0.50);
    canvas.add(oImg);
    canvas.renderAll();
    oImg.set('id', newID);
    fields[newID] = oImg;
    variables[newID]=oImg;
    canvas.setActiveObject(oImg);
    $('#WidthOfActiveObject').val(oImg.get('width'));
    $('#HeightOfActiveObject').val(oImg.get('height'));
    });
  }
  
  if(obj_shape == 'circle'){
    fabric.Image.fromURL(url, function(img) {
      var oImg = img.set({  objectCaching: false, id:newID,  width: img.width, height: img.height,  selectable:true, left: 24,	top: 24, hoverCursor: "pointer", id:newID, clipTo: fullRounded.bind(img) }).scale(0.66);
    canvas.add(oImg);
    canvas.renderAll();
    oImg.set('id', newID);
    fields[newID] = oImg;
    variables[newID]=oImg;
    canvas.setActiveObject(oImg);
    $('#WidthOfActiveObject').val(canvas.getActiveObject().get('width'));
  $('#HeightOfActiveObject').val(canvas.getActiveObject().get('height'));
    });
  }
  if(obj_shape == 'rounded'){
    fabric.Image.fromURL(url, function(img) {
      var oImg = img.set({  objectCaching: false, id:newID,  width: img.width, height: img.height,  selectable:true, left: 24,	top: 24, hoverCursor: "pointer", id:newID, clipTo: fullRounded.bind(img) }).scale(0.66);
    canvas.add(oImg);
    canvas.renderAll();
    oImg.set('id', newID);
    fields[newID] = oImg;
    variables[newID]=oImg;
    canvas.setActiveObject(oImg);
    $('#WidthOfActiveObject').val(canvas.getActiveObject().get('width'));
    $('#HeightOfActiveObject').val(canvas.getActiveObject().get('height'));
    });

  }

},
window.addScannerObject = function(scanning_method){
  var photo_obj = checkBarOrQRExists(scanning_method);
  if(photo_obj == "" || photo_obj == null){
    return false;
  }
  var newID = 'image_scanning_method';
  if(scanning_method === 'barcode'){
    var url = '<?php echo asset_url();?>/images/barcode.jpg';
    fabric.Image.fromURL(url, function(img) {
      var oImg = img.set({ id:newID, width: img.width, height: img.height,  selectable:true, left: 44,	top: 44, stroke: "#cccccc", strokeWidth:2, hoverCursor: "pointer", id:newID }).scale(0.33);
    canvas.add(oImg);
    canvas.renderAll();
    oImg.set('id', newID);
    fields[newID] = oImg;
    variables[newID]=oImg;
    canvas.setActiveObject(oImg);
    });
    
  }
  if(scanning_method === 'qrcode'){
    var url = '<?php echo asset_url();?>/images/qrcode.jpg';
    fabric.Image.fromURL(url, function(img) {
      var oImg = img.set({ id:newID, width: img.width, height: img.height,  selectable:true, left: 44,	top: 44, stroke: "#cccccc", strokeWidth:2, hoverCursor: "pointer", id:newID }).scale(0.33);
    canvas.add(oImg);
    canvas.renderAll();
    oImg.set('id', newID);
    fields[newID] = oImg;
    variables[newID]=oImg;
    canvas.setActiveObject(oImg);
    });
  }  
},
canvas.uniScaleTransform = true;
var appObject = function() {

  return {
    canvas: canvas,
    __tmpgroup: {},

    addLabel: function(label_for, text_val) {
     var newID = label_for;
      isExist = customGetItemByMyID(newID);
      if(isExist !== null){
        alert('Label for '+text_val+' already added on this template');
        return false;
      }
      if(localStorage.getItem('fontSize')){
        var _fsize = localStorage.getItem('fontSize');
      }else{
        var _fsize = '12';
      }
      if(localStorage.getItem('fontFamily')){
        var _ffamily = localStorage.getItem('fontFamily');
      }else{
        var _ffamily = 'Arial';
      }
      if(localStorage.getItem('fill')){
        var _fcolor = localStorage.getItem('fill');
      }else{
        var _fcolor = '#000';
      }
      if(localStorage.getItem('fontStyle')){
        var _fontStyle = localStorage.getItem('fontStyle');
      }else{
        var _fontStyle = '';
      }
      if(localStorage.getItem('underline') && localStorage.getItem('underline') === 'true'){
        var _underline = true;
      }else{
        var _underline = false;
      }
     
      
      var newLabel = new fabric.IText(text_val,{
        fill: _fcolor,
        fontSize: _fsize,
        fontFamily: _ffamily,
        top : 50,
        lockScalingY: true,
        lockScalingX: true,
        id: newID,
        fontStyle:_fontStyle,
        underline:_underline
        });
        used_labels.push(text_val);
      newLabel.toObject = (function(toObject) {
            return function() {
              return fabric.util.object.extend(toObject.call(this), {  id: newID, fontSize:_fsize, fontFamily: _ffamily,  objecttype: 'text', fill:_fcolor, underline:_underline })
            };
        })(newLabel.toObject);
      
      this.canvas.add(newLabel);
      this.canvas.renderAll();
      fields[newID]={fontFamily:_ffamily,fontSize:_fsize, fill: _fcolor, 'fontStyle':''};
      canvas.setActiveObject(newLabel);
      setDefaults(text_val, _fontStyle, _underline, _fsize, _ffamily, _fcolor);
     
    },
    addText: function(control_for, text_val) {
      $('div.div-text-property').css('display','none');
      var newID = control_for;
      if(text_val == 'Address'){
        text_val = 'Address line one here\nAddress Line two here\nAddress line three here';
      }else{
        text_val = 'Variable '+text_val;
      }
      
      isExist = customGetItemByMyID(newID);
      if(isExist !== null){
        alert('Variable for '+text_val+' already added on this template');
        return false;
      }
      
      if(localStorage.getItem('fontSize')){
        var _fsize = localStorage.getItem('fontSize');
      }else{
        var _fsize = '12';
      }
      if(localStorage.getItem('fontFamily')){
        var _ffamily = localStorage.getItem('fontFamily');
      }else{
        var _ffamily = 'Arial';
      } 
      if(localStorage.getItem('fill')){
        var _fcolor = localStorage.getItem('fill');
      }else{
        var _fcolor = '#000';
      }
      if(localStorage.getItem('fontStyle')){
        var _fontStyle = localStorage.getItem('fontStyle');
      }else{
        var _fontStyle = '';
      }
      if(localStorage.getItem('underline') && localStorage.getItem('underline') === 'true'){
        var _underline = true;
      }else{
        var _underline = false;
      }
      //console.log('fontSize', localStorage.getItem('fontSize'));
      //console.log('fontFamily', localStorage.getItem('fontFamily'));
      //console.log('fill', localStorage.getItem('fill'));
      var newText = new fabric.IText(text_val,{
        fill: _fcolor,
        fontSize: _fsize,
        top : 50,
        lockScalingY: false,
        lockScalingX: false,
        lineHeight: 1.1,
        fontFamily: _ffamily,
        id: newID,
        textAlign: 'left',
        fontStyle:_fontStyle,
        underline:_underline
      });
      newText.toObject = (function(toObject) {
            return function() {
                return fabric.util.object.extend(toObject.call(this), {  id: newID, fontSize:_fsize, fontFamily: _ffamily,  objecttype: 'text', fill:_fcolor, max:'0', textAlign: 'center', underline:_underline});
            };
        })(newText.toObject);
      this.canvas.add(newText);
      console.log('newText', newText);
      this.canvas.renderAll();
      fields[newID]={fontFamily:_ffamily,fontSize:_fsize, fill: _fcolor, fontStyle:_fontStyle, allow_chars:'',text:text_val, charSpacing:'',  textAlign: 'left', underline:_underline};
      variables[newID]=newText;
      canvas.setActiveObject(newText);
      var cwidth = this.canvas.getWidth();
      var objAtLeft = this.canvas.getActiveObject().get('left');
      var objText = this.canvas.getActiveObject().get('text');
      var restw = cwidth - objAtLeft;
      var fontSize= _fsize;
      var allow_chars =  Math.floor((restw)/(fontSize/2));
      allowChars(objText, allow_chars);
      setDefaults(text_val, _fontStyle, _underline, _fsize, _ffamily, _fcolor);

      //this.canvas.getActiveObject().set('fixedWidth', 180);
      //this.canvas.getActiveObject().set('width', 180);
      
    },
    addCommonText: function(){
        var newID = (new Date()).getTime().toString().substr(5);
        newID = newID+'_common_text';

        if(localStorage.getItem('fontSize')){
        var _fsize = localStorage.getItem('fontSize');
      }else{
        var _fsize = '12';
      }
      if(localStorage.getItem('fontFamily')){
        var _ffamily = localStorage.getItem('fontFamily');
      }else{
        var _ffamily = 'Arial';
      }
      if(localStorage.getItem('fill')){
        var _fcolor = localStorage.getItem('fill');
      }else{
        var _fcolor = '#000';
      }
      if(localStorage.getItem('fontStyle')){
        var _fontStyle = localStorage.getItem('fontStyle');
      }else{
        var _fontStyle = '';
      }
      if(localStorage.getItem('underline') && localStorage.getItem('underline') === 'true'){
        var _underline = true;
      }else{
        var _underline = false;
      }
      var newLabel = new fabric.IText("Common text that will be \nset in all cards \nand can be edited \nonly before place an \norder",{
        fill: _fcolor,
        fontSize: _fsize,
        fontFamily: _ffamily,
        top : 96,
        lockScalingY: false,
        lockScalingX: false,
        lineHeight: 0.8,
        id: newID,
        fontStyle:_fontStyle,
        underline: _underline
        });
      newLabel.toObject = (function(toObject) {
            return function() {
              return fabric.util.object.extend(toObject.call(this), {  id: newID,  fontSize:_fsize, fontFamily: _ffamily,  objecttype: 'text', fill:_fcolor, fontStyle:_fontStyle, underline:_underline})
            };
        })(newLabel.toObject);
      this.canvas.add(newLabel);
      this.canvas.renderAll();
      fields[newID]={'fontFamily':_ffamily,'fontSize':_fsize, 'fill': _fcolor, 'fontStyle':_fontStyle, underline:_underline };
      this.canvas.setActiveObject(newLabel);
    },
    setTextParam: function(param, value) {
      var obj = this.canvas.getActiveObject();
      var obj_id = this.canvas.getActiveObject().get('id');
     //console.log(param, fields[obj_id][param]);
      if (obj) {
        if (param == 'color') {
          obj.setColor(value);
          fields[obj_id]['fill'] = value;
        }
        else{ 
          obj.set(param, value);
          fields[obj_id][param] = value;
          this.canvas.renderAll();
        }
        if(param == 'fontSize'){
          var cwidth = this.canvas.getWidth();
          var objAtLeft = obj.get('left');
          var objText = obj.get('text');
          var restw = cwidth - objAtLeft;
          var fontSize= value;
          var allow_chars =  Math.floor((restw)/(fontSize/2));
          allowChars(objText, allow_chars, obj_id);
        }
      }
      //console.log('On setTextParam ', obj);
      //console.log('Fields', fields);
    },
    setTextValue: function(value) {
      var obj = this.canvas.getActiveObject();
      if (obj) {
        obj.setText(value);
        this.canvas.renderAll();
      }
    }
  };
}
$(document).ready(function() {
  //$('#helpForText').modal('show');
var app = appObject();
$('input#space-range-input').on('change', function(){
  var spacing = $(this).val();
  app.setTextParam('charSpacing', spacing);
});
$('.font-family').on('change', function(){
    var fontFace = $(this).val();
    setConfigStorage('fontFamily', fontFace);
    
    app.setTextParam('fontFamily', fontFace);
    localStorage.setItem('fontFamily',fontFace);
    var obj_id =  canvas.getActiveObject().get('id');    
});
$('.font-size').on('change', function(){
    app.setTextParam('fontSize', $(this).val());
    localStorage.setItem('fontSize',$(this).val());
});
   $('.div-control-block').on('click', function(){ app.addText( $(this).attr('id'),  $(this).attr('data-text'))});
   $('.div-label-block').on('click', function(){ app.addLabel($(this).attr('id'), $(this).text()) });
   $('#div_common_text_block').on('click', function(){
        app.addCommonText();
       
   });
})

$('.continue_btn').on('click', function(){
	 var data_to_pass = JSON.stringify(canvas);
	 if(canvas._objects.length == 0){
		 alert('Please create your own design to continue');
		 return false;
	}else{
		$('#modal_save_template').modal('show');
		}
});
function toObject(arr) {
  var rv = {};
  for (var i = 0; i < arr.length; ++i)
    rv[i] = arr[i];
  return rv;
}
 // to json
//canvas.renderAll();
//Saving users template preferences in database customers_templates table
var btnEl = document.getElementById('btn_save');
canvas.includeDefaultValues = true;
btnEl.onclick = function() {
    var canvas_json = jQuery.parseJSON( JSON.stringify(canvas));
    if(canvas_json.objects.length > 0){
      console.log('Original', canvas_json.objects); 
      $(canvas_json.objects).each(function(key, value){
         var fld_id = value['id'];
        if(canvas_json.objects[key]['id'] && fields[canvas_json.objects[key]['id']]){
          
          console.log('fill of '+canvas_json.objects[key]['text'], 'Original = '+canvas_json.objects[key]['fill']  +' Edited = '+fields[fld_id]['fill']);
          
          console.log('fontSize of '+canvas_json.objects[key]['text'], 'Original = '+canvas_json.objects[key]['fontSize']  +' Edited = '+fields[fld_id]['fontSize']);
          
          console.log('fontFamily of '+canvas_json.objects[key]['text'], 'Original = '+canvas_json.objects[key]['fontFamily']  +' Edited = '+fields[fld_id]['fontFamily']);
         
          canvas_json.objects[key]['fill'] =  fields[fld_id]['fill'];
          canvas_json.objects[key]['fontSize'] = fields[fld_id]['fontSize'];
          canvas_json.objects[key]['fontFamily'] = fields[fld_id]['fontFamily'];
          canvas_json.objects[key]['textAlign'] = fields[fld_id]['textAlign'];
          if( fields[fld_id]['underline'] &&  fields[fld_id]['underline'] !== '' ){
            canvas_json.objects[key]['underline'] = 'true';
          }else{
            canvas_json.objects[key]['underline'] = '';
          }
          if( fields[fld_id]['fontStyle'] &&  fields[fld_id]['fontStyle'] !== '' ){
            canvas_json.objects[key]['fontStyle'] = fields[fld_id]['fontStyle'];
          }
           
        }
      });
    }
    //console.log('Updated ', canvas_json.objects);
    //return false;
    var stat = false;
    var data_to_pass = JSON.stringify(canvas_json);

	  var to_svg = canvas.toSVG();
    var template_name=$('#template_name').val();
    var preferences = {};
    var data = new FormData();
    <?php 
    if($icard['preferences'] && !empty($icard['preferences']) ){
      $category = (isset($icard['preferences']['category']))?$icard['preferences']['category']:'';
      $orientation = (isset($icard['preferences']['orientation']))?$icard['preferences']['orientation']:''; 
      $card_type = (isset($icard['preferences']['orientation']))?$icard['preferences']['card_type']:'smart'; 
      $sides = (isset($icard['preferences']['sides']))?$icard['preferences']['sides']:'single'; 
      $has_chip = (isset($icard['preferences']['has_chip']))?$icard['preferences']['has_chip']:''; 
      $chip_type = (isset($icard['preferences']['chip_type']))?$icard['preferences']['chip_type']:''; 
      $finish = (isset($icard['preferences']['finish']))?$icard['preferences']['finish']:''; 
      $scanner = (isset($icard['preferences']['scanner']))?$icard['preferences']['scanner']:'';
      $lacetype = (isset($icard['preferences']['lacetype']))?$icard['preferences']['lacetype']:'';
      $lace_text = (isset($icard['preferences']['lace_text']))?$icard['preferences']['lace_text']:'';
    }
    ?>

    preferences.category = '<?php echo $category;?>';
    preferences.orientation = '<?php echo $orientation;?>';
    preferences.card_type = '<?php echo $card_type;?>';
    preferences.sides = '<?php echo $sides;?>';
    preferences.has_chip = '<?php echo $has_chip;?>';
    preferences.chip_type = '<?php echo $chip_type;?>';
    preferences.scanner = '<?php echo $scanner;?>';
    preferences.finish = '<?php echo $finish;?>';
    preferences.lacetype = '<?php echo $lacetype;?>';
    preferences.lace_text = '<?php echo $lace_text;?>';
    preferences.lace_logo = '<?php echo $lace_text;?>';
    var product_id='<?php echo $icard['preferences']['product_id'];?>';
    var templates_id = '<?php echo $icard['preferences']['template_id'];?>';
    preferences.template_id = templates_id;
    preferences.product_id = product_id;
    var url = '<?php echo $ajax_url; ?>/saveCustomersTemplate';
    var id = '';
  
      <?php if(isset($icard['customer_template'])){ ?>
        if( task && task  === 'edit_template'){
        id= '<?php echo $icard['customer_template']['id'];?>';
        }
    <?php } ?>

    $.ajax({
        url: url,
        data : {"canvas": data_to_pass, "template_name":template_name, "template_type":"<?php echo $card_type;?>", "product_id":product_id, "preferences":preferences, "to_svg":to_svg, "templates_id":templates_id, "variables": JSON.stringify(variables), "fields":JSON.stringify(fields), "task":task, "id":id},
        type:'POST',
        dataType:'json',
        success: function(result){
            $('#modal_save_template').modal('hide');
            console.log(result);
            //return false;
            if(result.status == 'success'){
              localStorage.setItem('fields', JSON.stringify(fields));
              localStorage.setItem('variables', JSON.stringify(variables));
              if( task && task  === 'edit_template'){
                localStorage.clear();
                window.location = '<?php echo base_url();?>/My_Pages/created_templates?id='+result.encoded_id;
              }else{
              if( preferences.sides === 'both'){
                  window.location = '<?php echo base_url();?>/Studio/template_act_backside?id='+result.encoded_id;
               }else{
                  localStorage.clear();
                  window.location = '<?php echo base_url();?>/My_Pages/created_templates?id='+result.encoded_id;
               }
              }
            }
        }
    });
};

//initCanvas();
function roundedCorners(ctx) {
  var rect = new fabric.Rect({
    left:0,
    top:0,
    rx:20 / this.scaleX,
    ry:20 / this.scaleY,
    width:this.width,
    height:this.height,
    stroke: "black",
    strokeWidth:5,
    opacity: 1,
    fill:'blue'
  });
  rect._render(ctx, false);
}
function fullRounded(ctx) {
  var rect = new fabric.Rect({
    left:0,
    top:0,
    rx:66 / this.scaleX,
    ry:66 / this.scaleY,
    width:this.width,
    height:this.height,
    opacity: 1,
  });
  rect._render(ctx, false);
}
function fullOvel(ctx) {
  var rect = new fabric.Rect({
    left:0,
    top:0,
    rx:45 / this.scaleX,
    ry:65 / this.scaleY,
    width:this.width,
    height:this.height,
    opacity: 1,
  });
  rect._render(ctx, false);
}
//Drag and drop
function continueCard(){
    var cmf = confirm('Are you sure to process order !');
    if(cmf){
        var stat = false;
        //console.log(JSON.stringify(canvas));
        var data_to_pass = JSON.stringify(canvas);
        var template_name=$('#template_name').val();

        var product_id='<?php echo $icard['preferences']['product_id'];?>';
        var url = '<?php echo $ajax_url; ?>/saveCustomersTemplate';
		$.ajax({
			url: url,
			data : {'canvas': data_to_pass, template_name:template_name, template_type:'1', product_id:product_id  },
			type:'POST',
            dataType:'json',
			success: function(result){
                window.location = '<?php echo base_url();?>/My_Pages/myaccount';
			}
		});
        if(stat == true){

        }
    }
}
$(document).ready(function() {
var readURL = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.profile-pic').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$(".file-upload").on('change', function(){
    readURL(this);
});
$(".upload-button").on('click', function() {
   $(".file-upload").click();
});
});
//uplload image profile*/
function pickAndSetImage(url){
    fabric.Image.fromURL(url, function(img) {
         // add background image
         canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas), {
            scaleX: canvas.width / img.width,
            scaleY: canvas.height / img.height
         });
      });
   
}
function clearCanvas(){
    if(confirm('Are you sure to cleare your artwork?')){
        canvas.clear();
    }
}
</script>
<script type="text/javascript">
  var ListItemElements = document.querySelectorAll(".ms-ListItem");
  for (var i = 0; i < ListItemElements.length; i++) {
    new fabric['ListItem'](ListItemElements[i]);
  }

$(document).ready(function(){
  //$('.lbl-font-tool-box').css('display','none');
  //$('.div-font-tool-box').css('display','none');
  <?php if(!isset($request['task']) || (isset($request['task']) && $request['task'] !== 'edit_template' )) { ?>
  pickAndSetImage('<?php echo base_url();?>/uploads/templates/<?php echo $icard['master_template']['template_image_path'];?>');
  localStorage.setItem('scanning_method','');
  <?php } ?>
});
function pickColor(r,g,b ){
  if(!canvas.getActiveObject()){alert('Please select text object or add new one'); $('#colorPickerModal').modal('hide'); return false; }
   var rgb = "rgb("+r+","+g+","+b+")";
   var obj_id = canvas.getActiveObject().get("id");
   canvas.getActiveObject().set("fill", rgb);
   canvas.renderAll();
   //alert(obj_id);
   if(obj_id){    
      
      fields[obj_id]['fill'] = rgb;
     
     
    }
    $('#colorpicker_text').css('background', rgb);
    localStorage.setItem('fill',rgb);
    $('#colorPickerModal').modal('hide');

}
function changeColor(r,g,b ){
  if(!canvas.getActiveObject()){alert('Please select text object or add new one'); $('#colorPickerModal').modal('hide'); return false; }
   var rgb = "rgb("+r+","+g+","+b+")";
   var obj_id = canvas.getActiveObject().get("id");
   //console.log('getActiveObject', canvas.getActiveObject());
   canvas.getActiveObject().set("fill", rgb);
   canvas.renderAll();
   if(obj_id){    
     
      fields[obj_id]['fill'] = rgb;
     
    }
}
function pickBorderColor(r,g,b ){
   var rgb = "rgb("+r+","+g+","+b+")";
  var obj_id = canvas.getActiveObject().get("id");
  canvas.getActiveObject().set("stroke", rgb);
   if(obj_id){    
     
      fields[obj_id]['stroke'] = rgb;
     
    }
    canvas.renderAll();
      $('#borderColorPickerModal').modal('hide');
}
function changeBorderColor(r,g,b ){
   var rgb = "rgb("+r+","+g+","+b+")";
   var obj_id = canvas.getActiveObject().get("id");
   canvas.getActiveObject().set("stroke", rgb);
   canvas.renderAll();
   if(obj_id){    
      fields[obj_id]['stroke'] = rgb;
     
    }
}
function onObjectSelected(e) {
  $('.lbl-font-tool-box').css('display','none');
  $('.div-font-tool-box').css('display','none');
  var objectType = e.target.get('type');
  //console.log('On selected ', e.target);
  //console.log('objectType', objectType);
  //console.log('object id ', e.target.get('id'));
  if( objectType === 'i-text'){
    $('.lbl-font-tool-box').css('display','inline');
    $('.div-font-tool-box').css('display','inline');
  }
}
canvas.on('object:selected', onObjectSelected);
canvas.on('object:moving', function (e) {
  var obj = e.target;
  // if object is too big ignore
  if(obj.currentHeight > obj.canvas.height || obj.currentWidth > obj.canvas.width){
    return;
  }
  obj.setCoords();
  // top-left  corner
  if(obj.getBoundingRect().top < 0 || obj.getBoundingRect().left < 0){
    obj.top = Math.max(obj.top, obj.top-obj.getBoundingRect().top);
    obj.left = Math.max(obj.left, obj.left-obj.getBoundingRect().left)+4;
  }
  // bot-right corner
  if(obj.getBoundingRect().top+obj.getBoundingRect().height  > obj.canvas.height || obj.getBoundingRect().left+obj.getBoundingRect().width  > obj.canvas.width){
    obj.top = Math.min(obj.top, obj.canvas.height-obj.getBoundingRect().height+obj.top-obj.getBoundingRect().top);
    obj.left = Math.min(obj.left, obj.canvas.width-obj.getBoundingRect().width+obj.left-obj.getBoundingRect().left)-4;
   
  }

  var cwidth = obj.canvas.width;
  var objText = obj.get('text');
  var restw = cwidth - obj.left;
  var fontSize= obj.get('fontSize');
  var allow_chars =  Math.floor((restw)/(fontSize/2));
  allowChars(objText, allow_chars, obj.get('id'));
});
canvas.on('object:scaling', function (e){
    var scaledObject = e.target;
    scaledObject.setCoords();
    var wd = Math.floor(scaledObject.getBoundingRect().width);
    var ht = Math.floor(scaledObject.getBoundingRect().height);
    $('#WidthOfActiveObject').val(wd);
    $('#HeightOfActiveObject').val(ht);
});


/* $('#WidthOfActiveObject').on('change', function(){
  var width = $(this).val();
  canvas.getActiveObject().set('width', width);
  canvas.renderAll();    
});
$('#HeightOfActiveObject').on('change', function(){
  var ht = $(this).val();
  canvas.getActiveObject().set('height', ht);
  canvas.renderAll();    
}); */
canvas.on("text:changed", function(e) {
  var text_val = e.target.get('text');
  var obj_id = e.target.get('id');
  var textAlign = e.target.get('textAlign');
  if(used_labels.indexOf(text_val) !=  -1){
    e.target.set('text','Variable '+text_val);
     alert('Label name "'+text_val+'" already exists');
  }
  if(fields[obj_id]){
    fields[obj_id].text = e.target.get('text');
  }
 
  if(textAlign === 'center'){
  var cur_value = 'center';
  var activeObj = canvas.getActiveObject() || canvas.getActiveGroup();
  if (cur_value != '' && activeObj) {
    process_align(cur_value, activeObj);
    activeObj.setCoords();
    canvas.renderAll();
    
    var cwidth = canvas.getWidth();
    var objAtLeft = activeObj.get('left');
    var objText = activeObj.get('text');
    var restw = cwidth - objAtLeft;
    var fontSize= activeObj.get('fontSize');
    var obj_id= activeObj.get('id');
    var allow_chars =  Math.floor((restw)/(fontSize/2));
    allowChars(objText, allow_chars, obj_id);
    }
  }
  var texts = e.target.calcTextWidth();
  var cwidth = canvas.width;
  var restw = cwidth - (e.target.left)-4;
  var fsize = e.target.get('fontSize');
  if(texts > restw){
    //console.log(e.target.get('fontSize'));
    var newfsize = fsize - 1;
    text_val.replace(/\s/g, "");
    var charspacing = e.target.get('charSpacing');
    var newcharspacing = charspacing-4;
  }else{
    var newfsize = localStorage.getItem('fontSize');
    var newcharspacing = e.target.get('charSpacing');
  }
  if(newfsize){
    e.target.set('fontSize', newfsize);
    e.target.set('text', text_val);
    e.target.set('charSpacing', newcharspacing);
  }
  if(fields[obj_id]){
    fields[obj_id].text = e.target.get('text');
    fields[obj_id].fontSize = newfsize;
    fields[obj_id].charSpacing = e.target.get('charSpacing');
  }
  canvas.renderAll();

});
function checkPhotoObjAndOverwrite(photo_obj, photo_for){
  var photo_obj = customGetItemByMyID(photo_obj);
  if(photo_obj !== null ){
    alert(photo_for+ " object already added. Please delete any one and then add another");
    return "";
  }else{
    return '1';
  }
}
customGetItemByMyID = function(myID) {
    var object = null,
        objects = canvas.getObjects();
    for (var i = 0, len = canvas.size(); i < len; i++) {
        if (objects[i].id&& objects[i].id=== myID) {
            object = objects[i];
            break;
        }
    }
    return object;
};
$('.alignment').click(function() {
  var cur_value = $(this).attr('data-action');
  $('i.alignment').removeClass('active');$(this).addClass('active');
  var activeObj = canvas.getActiveObject() || canvas.getActiveGroup();
  if (cur_value != '' && activeObj) {
    process_align(cur_value, activeObj);
    activeObj.setCoords();
    canvas.renderAll();
    
    var cwidth = canvas.getWidth();
    var objAtLeft = activeObj.get('left');
    var objText = activeObj.get('text');
    var restw = cwidth - objAtLeft;
    var fontSize= activeObj.get('fontSize');
    var obj_id= activeObj.get('id');
    var allow_chars =  Math.floor((restw)/(fontSize/2));
    allowChars(objText, allow_chars, obj_id);
    activeObj.set('textAlign',cur_value);
      if(fields[obj_id]){
        fields[obj_id].textAlign = cur_value;
      }
    $(this).attr('title',' '+objText+' is aligned to '+cur_value);
    console.log('fields',fields);
  } else {
    alert('Please select an item');
    return false;
  }
});

function addIcon(icon){
  var fontName = '';
  if(icon === 'phone'){ fontName = '\uF095'; }
  if(icon === 'mobile'){ fontName = '\uF10b'; }
  if(icon === 'office'){ fontName = '\uf0f7'; }
  if(icon === 'home'){ fontName = '\uF015'; }
  if(icon === 'email_white'){ fontName = '\uF003'; }
  if(icon === 'email'){ fontName = '\uF0e0'; }
  if(icon === 'registered'){ fontName = '\uF25d'; }
  if(icon === 'birthday'){ fontName = '\uf1fd'; }
  if(icon === 'copyright'){ fontName = '\uF1f9'; }
  if(icon === 'globe'){ fontName = '\uF0ac'; }
  if(icon === 'skype'){ fontName = '\uf17e'; }
  if(icon === 'whatsapp'){ fontName = '\uf232'; }
  if(icon === 'fax'){ fontName = '\uf1ac'; }
  if(icon === 'facebook'){ fontName = '\uf082'; }
  if(icon === 'twitter'){ fontName = '\uf081'; }
  if(icon === 'instagram'){ fontName = '\uf16d'; }
  if(icon === 'googleplussquare'){ fontName = '\uf0d4'; }
  if(icon === 'googleplus'){ fontName = '\uf0d5'; }
  if(icon === 'factory'){ fontName = '\uf275'; }
  if(icon === 'degree'){ fontName = '\uf19d'; }
  if(icon === 'designation'){ fontName = '\uf0b1'; }

  var newID = (new Date()).getTime().toString().substr(5);
      newID = newID+'_icon_'+icon+'_no';
      var text = new fabric.IText(fontName,{fontSize: 24});
      canvas.add(text);
      canvas.renderAll();
      text.set('fontFamily','FontAwesome');
      if(localStorage.getItem('fill')){
        var _fcolor = localStorage.getItem('fill');
        text.set('fill',_fcolor);
      }else{
        text.set('fill','#000');
      }
      canvas.renderAll();
}

function checkBarOrQRExists(scanning_method){
   var scanner = localStorage.getItem('image_scanning_method');
   //console.log('scanner ==  ',scanner);
   if(scanner){
     var scanning_method  = capitalizeFirstLetter(scanner);
      alert(scanning_method+' already added to the template.');
      return '';
   }else{
    localStorage.setItem('image_scanning_method', scanning_method);
    return scanning_method;
   }
}
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}
$('#btn_align_bottom').on('click', function(){
  var ht = canvas.getActiveObject().get("height");
  var bottomPoint = ( 286 - (ht)); 
  //console.log('bottomPoint',  bottomPoint);
  canvas.getActiveObject().set('top', bottomPoint);
  canvas.renderAll();
  canvas.setActiveObject(canvas.getActiveObject());
});
function changeFontStyle(font_style){
 //console.log('getActiveObject', canvas.getActiveObject());
 $('button.font-style').removeClass('active');
  var obj_id = canvas.getActiveObject().get("id");
  
  if(font_style === 'underline'){
    var activeStyle  = canvas.getActiveObject().get("underline");
    if(activeStyle === false){
      //canvas.getActiveObject().setSelectionStyles({ underline: true },0, 100);
      canvas.getActiveObject().set('underline', true);
      fields[obj_id]['underline'] = 'true';
      localStorage.setItem('underline','true');
      $('button#underline').addClass('active');
    }else{
      canvas.getActiveObject().set('underline', false);
      fields[obj_id]['underline'] = '';
      localStorage.setItem('underline','');
      $('button#underline').removeClass('active');
    }
  }else{
    var activeStyle  = canvas.getActiveObject().get("fontStyle");
    if(activeStyle === font_style){
      canvas.getActiveObject().set('fontStyle', '');
      if(fields[obj_id]){
        console.log(fields[obj_id]);
        localStorage.setItem('fontStyle','normal');
        fields[obj_id]['fontStyle'] = 'normal';
      }
      $('button#'+activeStyle).removeClass('active');
     
    }else{
      canvas.getActiveObject().set('fontStyle', font_style);
      fields[obj_id]['fontStyle'] = font_style;
      localStorage.setItem('fontStyle',font_style);
      $('button#'+font_style).addClass('active');
    }
  }
  canvas.renderAll();
  canvas.setActiveObject(canvas.getActiveObject());
}
function cancelEdit(){
  var cfm_cncl = confirm('Are you sure to cancel the changes of this template ?');
  if(cfm_cncl){
    window.location = '<?php echo base_url();?>/My_Pages/created_templates';
  }
}

/* Align the selected object */
function process_align(val, activeObj) {
  switch (val) {

    case 'left':
      activeObj.set({
        left: 0
      });
      break;
    case 'right':
      activeObj.set({
        left: canvas.width - (activeObj.width * activeObj.scaleX)
      });
      break;
    case 'top':
      activeObj.set({
        top: 0
      });
      break;
    case 'bottom':
      activeObj.set({
        top: canvas.height - (activeObj.height * activeObj.scaleY)
      });
      break;
    case 'center':
      activeObj.set({
        left: (canvas.width / 2) - ((activeObj.width * activeObj.scaleX) / 2)
      });
      break;
  }
}
function setDefaults(text_val, _fontStyle, _underline, _fsize, _ffamily, _fcolor ){
    $('i.alignment').each(function(){
      $(this).attr('title',' Align '+text_val+' to '+ $(this).attr('data-action'));
    });
    $('select.font-size').parent().attr('title',' Change font size of  '+text_val);
    $('select.font-family').parent().attr('title',' Change font face of  '+text_val);
    $('button.font-style').removeClass('active');
    $('button.font-style').each(function(){
      if( ( _fontStyle !== '' &&  _fontStyle === $(this).attr('id')) || ( $(this).attr('id') === 'underline' &&  _underline === true) ){
        $(this).attr('title',' Loaded '+text_val+' with '+ $(this).attr('id')+' font style ' );
        $(this).addClass('active');
      }else{
        $(this).attr('title',' Change font style of  '+text_val+' to '+ $(this).attr('id') );
      }
    });
    $("select.font-size").val(_fsize);
    $("select.font-family").val(_ffamily);
    $('#colorpicker_text').css('background-color', _fcolor);
}
</script>