<link href="<?php echo asset_url(); ?>/front/studio/css/style.css" rel="stylesheet">
<link href="<?php echo asset_url(); ?>/front/studio/css/checkbox.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo asset_url(); ?>/front/plugins/plugin-css/plugin-owl-carousel.min.css" id="colour-scheme" rel="stylesheet">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- ======== @Region: #content ======== -->
  <?php
if($icard['preferences']['orientation'] === 'vertical'){
  $canvas['height']='344';
  $canvas['width']='228';
}
if($icard['preferences']['orientation'] === 'horizontal'){
  $canvas['height']='228';
  $canvas['width']='344';
}
?>  
<div id="content" style="background-color:rgba(0, 0, 0, 0.7) !important; padding:0px !important;">
  <!-- Product view -->
  <div class="row no-gutters">
      <div class="col-lg-3 col-md-3 mt-1 mb-1 pl-1"><h5 class="text-primary text-uppercase pull-left mt-2">Back side </h5>  
        </div>
        
        <?php if(isset($request['task']) && $request['task'] == 'edit_template'){?>
          <div class="col-lg-8 col-md-8 mt-1 mb-1 pr-1 pt-1">
          <button class="btn btn-orange  pull-right " id="btn_save"> Save & Continue <i class="fa fa-save"></i></button> 
        </div>
          <div class="col-lg-1 col-md-1 mt-1 mb-1 pr-1 pt-1">
              <button class="btn btn-danger  pull-right" onclick="javascript:cancelEdit();"> Cancel</button> 
          </div>
        <?php }else{ ?>
          <div class="col-lg-9 col-md-9 mt-1 mb-1 pr-2 pt-1">
          <button class="btn btn-orange  pull-right" id="btn_save" > Save & Continue <i class="fa fa-save"></i></button> 
        </div>
        <?php } ?>


        
    </div>
    <div class="row no-gutters designer-box">
    
      <div class="col-lg-12 col-sm-12 border-t border-b"  id="div_left_sidebar">
          <div class="row no-gutters main-tool-window">
              <div class="col-sm-1 col-lg-1 border-l">
                <ul class="nav nav-tabs nav-stacked">
                  <li class="nav-item" data-placement="top" title="Select background"  ><a href="#vtab1" class="nav-link nav-link-custom active" data-toggle="tab"><i class="fa fa-image"></i></a></li>
                  <li class="nav-item"  data-placement="top" title="Add text objects" ><a href="#vtab2" class="nav-link nav-link-custom" data-toggle="tab"><i class="fa fa-font"></i></a></li>
                  <li class="nav-item"  data-placement="top" title="Add icons" ><a href="#vtab3" class="nav-link nav-link-custom" data-toggle="tab"><i class="fas fa-lightbulb"></i></a></li>
                  <li class="nav-item"  data-placement="top" title="Add Photo objects"  ><a href="#vtab4" class="nav-link nav-link-custom" data-toggle="tab"><i class="fa fa-users"></i></a></li>
                  <li class="nav-item"  data-placement="top" title="Add common text objects" ><a href="#vtab5" class="nav-link nav-link-custom" data-toggle="tab"><i class="fa fa-object-group"></i></a></li>
                  
                </ul>
              </div>
              <div class="tab-content col-lg-3 col-sm-3 shadow-lg" id="tool_window" >

                  <div class="tab-pane active" id="vtab1">
                      <div class="row mt-2 mb-2 ml-2 mr-2">
                         
                          <div class="col-lg-12 mt-2 text-left pull-left"> <h5 class="pb-2 border-b">  Select a template</h5>  </div>
                          <div class="col-lg-12" id="template_grid" style="scrollbar-width:thin;" >
                              <div class="row ">
                                <?php $i = 1; ?>
                              <?php foreach($templates as $tmpl){ ?>
                                <?php $id = $i; ?>
                                    <div class="col-lg-6 col-sm-6 col-md-3 col-sm-6 col-xs-6">
                                        <div class="featured_hori_block">
                                        <div class="featured_hori_thumb_block">
                                            <img src="<?php echo base_url();?>/uploads/templates/<?php echo $tmpl['template_image_path_back'];?>" alt="" class="img-responsive" width="" height="">
                                            <div class="featured_hori_back">
                                                <div>
                                                    <button class="btn btn-white btn-shadow text-primary" onclick="javascript:pickAndSetImage('<?php echo base_url();?>/uploads/templates/<?php echo $tmpl['template_image_path_back'];?>');">Use this</button>
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
                  <div class="tab-pane " id="vtab2">
                        <div class="row mt-2 mb-2 ml-2 mr-2">
                            
                          
                            <div class="col-lg-12  mt-4">
                            <div class="row">
                                  <div class="col-lg-12 col-sm-12"> 
                                      <ul class="nav nav-tabs flex-column flex-lg-row" role="tablist">
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab-1" role="tab" aria-selected="false">Add a label</a> </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-selected="true">Add a variable</a> </li>
                                      </ul>
                                      <div class="tab-content py-3">
                                          <div class="tab-pane" id="tab-1" role="tabpanel">
                                            <div class="row">
                                                <?php if( strtolower($profile['type'])=='school' ) { ?>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-label-block" id="label_institute_name">Institute Name</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-label-block" id="label_school_name">School Name</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1 div-label-block" id="label_grn_no" >GRN No.</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1 div-label-block" id="label_roll_no" >Roll No.</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-label-block" id="label_full_name">Full Name</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-label-block" id="label_standard">Standard</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-label-block" id="label_class">Class</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-label-block"  id="label_house">House</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-label-block" id="label_year">Academic Year</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-label-block" id="label_mobile_no">Mobile No.</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-label-block"  id="label_essential_mobile_no">Essential Mo. No.</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-label-block"  id="label_optional_mobile_no">Mobile. No.</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-label-block"  id="label_emergency_mobile_no">Emergency Mo. No.</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-label-block" id="label_address">Address</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-label-block" id="label_email_id">Email</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-label-block" id="label_blood_group">Blood Group</div>
                                                <?php }else{ ?>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1 div-label-block" id="label_company_name" >Company Name</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-label-block" id="label_slogan">Slogan</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-label-block" id="label_employee_name">Employee Name</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-label-block" id="label_emp_code">Employee Code</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-label-block" id="label_department_name">Dapartment Name</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-label-block" id="label_designation">Designation</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-label-block" id="label_location">Location</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-label-block" id="label_joining_date">Joining Date</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-label-block" id="label_valid_from">Valid From</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-label-block"  id="label_emergency_mobile_no">Emergency Mo. No.</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-label-block"  id="label_optional_mobile_no">Mobile. No.</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-label-block" id="label_address">Address</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-label-block" id="label_email_id">Email</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-label-block" id="label_blood_group">Blood Group</div>
                                                <?php } ?>
                                              </div>
                                            </div>  
                                          <div class="tab-pane" id="tab-2" role="tabpanel">
                                              <div class="row">
                                                  <?php if( strtolower($profile['type'])=='school' ) { ?>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-control-block" id="control_grn_no" data-text="GRN No." >Variable for GRN No.</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-control-block" id="control_roll_no" data-text="Roll NO." >Roll No.</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-control-block" id="control_full_name"  data-text="Full Name">Variable for Full Name</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-control-block" id="control_standard" data-text="Standard">Variable for Standard</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-control-block" id="control_class" data-text="Class">Variable for Class</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-control-block"  id="control_house" data-text="House">Variable for House</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-control-block" id="control_year" data-text="Academic Year">Variable for Academic Year</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-control-block" id="control_essential_mobile_no" data-text="Essential Mobile No.">Variable Essential Mobile No.</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-control-block" id="control_optional_mobile_no" data-text="Optional Mobile No.">Variable Optional Mobile No.</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-control-block"  id="control_emergency_mobile_no" data-text="Emergency Mo. No.">Variable for Emergency Mo. No.</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-control-block" id="control_address" data-text="Address">Variable for Address</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-control-block" id="control_email_id" data-text="Email">Variable for Email</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-control-block" id="control_blood_group" data-text="Blood Group">Variable for Blood Group</div>
                                                    <?php }else{ ?>
                                                  
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-control-block" id="control_employee_name"  data-text="Employee Name">Variable for Employee Name</div>
                                                  
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-control-block" id="control_employee_code"  data-text="Employee Code">Variable for Employee Code</div>

                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-control-block" id="control_department_name"  data-text="Dapartment Name">Variable for Dapartment Name</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-control-block" id="control_designation" data-text="Designation">Variable for Designation</div>

                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-control-block" id="control_location"  data-text="Location">Variable for Location</div>

                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-control-block" id="control_joining_date" data-text="Joining Date">Variable for Joining Date</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-control-block" id="control_valid_from" data-text="Valid From">Variable for Valid From</div>
                                                  
                                                  
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-control-block"  id="control_emergency_mobile_no" data-text="Emergency Mo. No.">Variable for Emergency Mo. No.</div>

                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-control-block" id="control_optional_mobile_no" data-text="Optional Mobile No.">Variable Optional Mobile No.</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-control-block" id="control_address" data-text="Address">Variable for Address</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-control-block" id="control_email_id" data-text="Email">Variable for Email</div>
                                                  <div class="col-lg-11 col-sm-11  mt-1 mr-1 ml-1 mb-1  div-control-block" id="control_blood_group" data-text="Blood Group">Variable for Blood Group</div>
                                                  <?php } ?>
                                                    </div>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                            </div> 
                        </div>
                  </div>
                  <div class="tab-pane " id="vtab3">
                    
                    <div class="row ml-1 mt-4 ">
                      <div class="col-lg-10 col-md-10"><h5>Font Awesome Icons</h5></div>
                      <div class="col-lg-2 col-md-2 ml-2 mb-1 mt-1 btn btn-dark text-primary pt-2 pb-2"  data-placement="top" title="Add a phone icon"  onclick="javascript:addIcon('phone');">  <i class="fa fa-phone"></i></div>

                      <div class="col-lg-2 col-md-2 ml-2  mb-1 mt-1 btn btn-dark text-primary pt-2 pb-2 " onclick="javascript:addIcon('mobile');"  data-placement="top" title="Add a mobile icon" >  <i class="fa fa-mobile"></i></div>

                      <div class="col-lg-2 col-md-2 ml-2  mb-1 mt-1 btn btn-dark text-primary pt-2 pb-2 " onclick="javascript:addIcon('home');" data-placement="top" title="Add a home address icon" >  <i class="fa fa-home"></i></div>

                      <div class="col-lg-2 col-md-2 ml-2  mb-1 mt-1 btn btn-dark text-primary pt-2 pb-2 " onclick="javascript:addIcon('email_white');"  data-placement="top" title="Add an email icon" >  <i class="fa fa-envelope-o"></i></div>

                      <div class="col-lg-2 col-md-2 ml-2  mb-1 mt-1 btn btn-dark text-primary pt-2 pb-2 " onclick="javascript:addIcon('email');"  data-placement="top" title="Add an email icon" >  <i class="fa fa-envelope"></i></div>

                      <div class="col-lg-2 col-md-2 ml-2  mb-1 mt-1 btn btn-dark text-primary pt-2 pb-2 "  onclick="javascript:addIcon('office');"  data-placement="top" title="Add an office icon" >  <i class="fa fa-briefcase"></i></div>
                      <div class="col-lg-2 col-md-2 ml-2  mb-1 mt-1 btn btn-dark text-primary pt-2 pb-2 " onclick="javascript:addIcon('registered');"  data-placement="top" title="Add a registered icon " >  <i class="fa fa-registered"></i></div>
                      <div class="col-lg-2 col-md-2 ml-2  mb-1 mt-1 btn btn-dark text-primary pt-2 pb-2 " onclick="javascript:addIcon('copyright');"  data-placement="top" title="Add a copyright icon " >  <i class="fa fa-copyright"></i></div>
                      <div class="col-lg-2 col-md-2 ml-2  mb-1 mt-1 btn btn-dark text-primary pt-2 pb-2 " onclick="javascript:addIcon('globe');"  data-placement="top" title="Add a website icon " >  <i class="fa fa-globe"></i></div>
                      <div class="col-lg-2 col-md-2 ml-2  mb-1 mt-1 btn btn-dark text-primary pt-2 pb-2 " onclick="javascript:addIcon('hand_right');"  data-placement="top" title="Add a direction icon " >  <i class="fa fa-hand-point-right"></i></div>
                    </div>
                  </div>
                  <div class="tab-pane " id="vtab4">
                  <div class="col-lg-12 pl-1 pb-2 ml-4">
                          <div class="row">
                          <div class="col-lg-10 col-md-10  mt-4 "><h5>Add Photo Objects</h5></div>
                          <div class="col-lg-10 col-md-10 mt-4 mb-2">
                                <div class="dropdown ">
                                    <button class="btn btn-dark dropdown-toggle  btn-lg" type="button" id="photo1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Photo Object 1 </button>
                                    <div class="dropdown-menu rounded" aria-labelledby="photo1" x-placement="top-start" style="position: aGaramondbsolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 1px, 0px);"> 
                                      <a class="dropdown-item " href="javascript:void(0);" id="photo_one_square" onclick="javascript:addPhotoObject('image_control_photo_1','square', 'Photo 1');">Square</a> 
                                      <a class="dropdown-item " href="javascript:void(0);" id="photo_one_rounded" onclick="javascript:addPhotoObject('image_control_photo_1','rounded', 'Photo 1');">Rounded Corner</a> 
                                      <a class="dropdown-item " href="javascript:void(0);" id="photo_one_circle" onclick="javascript:addPhotoObject('image_control_photo_1','circle', 'Photo 1');">Circle</a>
                                    </div>
                                </div>
                              </div>
                              <div class="col-lg-10 col-md-10 mt-4 mb-2">
                                <div class="dropdown ">
                                    <button class="btn btn-dark dropdown-toggle  btn-lg" type="button" id="photo2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Photo Object 2 </button>
                                    <div class="dropdown-menu" aria-labelledby="photo2" x-placement="top-start" style="position: aGaramondbsolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 1px, 0px);"> 
                                      <a class="dropdown-item  " href="javascript:void(0);" id="photo_two_square" onclick="javascript:addPhotoObject('image_control_photo_2','square', 'Photo 2');" >Square</a> 
                                      <a class="dropdown-item  " href="javascript:void(0);" id="photo_two_rounded" onclick="javascript:addPhotoObject('image_control_photo_2','rounded', 'Photo 2');" >Rounded Corner</a> 
                                      <a class="dropdown-item  " href="javascript:void(0);" id="photo_two_circle" onclick="javascript:addPhotoObject('image_control_photo_2','circle' , 'Photo 2');" >Circle</a>
                                    </div>
                                </div>
                              </div>
                              <div class="col-lg-10 col-md-10  mt-4 mb-2">
                                <div class="dropdown ">
                                    <button class="btn btn-dark dropdown-toggle  btn-lg" type="button" id="photo3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Photo Object 3 </button>
                                    <div class="dropdown-menu" aria-labelledby="photo3" x-placement="top-start" style="position: aGaramondbsolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 1px, 0px);"> 
                                      <a class="dropdown-item  " href="javascript:void(0);" id="photo_three_square" onclick="javascript:addPhotoObject('image_control_photo_3','square', 'Photo 3');" >Square</a> 
                                      <a class="dropdown-item  " href="javascript:void(0);" id="photo_three_rounded" onclick="javascript:addPhotoObject('image_control_photo_3','rounded', 'Photo 3');" >Rounded Corner</a> 
                                      <a class="dropdown-item  " href="javascript:void(0);" id="photo_three_circle" onclick="javascript:addPhotoObject('image_control_photo_3','circle', 'Photo 3');" >Circle</a>
                                    </div>
                                </div>
                              </div>
                        </div>
                  </div>
                  </div>
                  <div class="tab-pane " id="vtab5">
                    <div class="row ml-1 mt-3 ">
                      <div class="col-lg-11 col-md-11 btn btn-dark text-primary ml-2 mb-3 mt-2 pt-3  pb-3" onclick="javascript:$('#browse_image').modal('show');">
                      Upload Image
                      </div>
                      <div class="col-lg-11 col-md-11 btn btn-dark text-primary ml-2 mb-3 mt-3 pt-3  pb-3" id="div_common_text_block" data-placement="top" title="Add Common Text" >
                      Add Common Text
                      </div>
                      <div class="col-lg-11 col-md-11 btn btn-dark text-primary ml-2 mb-3 mt-2 pt-3  pb-3" onclick="javascript:$('#browse_image').modal('show');">
                      Upload Signature Image
                      </div>
                      <div class="col-lg-5 col-md-6 btn btn-dark text-primary ml-2 mr-1 pr-1 mb-2 mt-2 pt-3  pb-3" onclick="javascript:addScannerObject('barcode');" data-placement="top" title="Add Barcode" >
                      Add Barcode
                      </div>
                      <div class="col-lg-5 col-md-6 btn btn-dark text-primary ml-3 mb-2  pr-1 mt-2 pt-3  pb-3" id="div_common_text_block" data-placement="top" title="Add QR Code"  onclick="javascript:addScannerObject('qrcode');" >
                      Add QR Code
                      </div>
                    </div>
                  </div>
              </div>
              <div class="col-lg-5 col-sm-5 shadow-lg  bg-black  ml-2 " id="div_center" >
                <div class="row no-gutters editor_right_part"  id="editor_right_part">
                      <div class="col-lg-1 col-sm-1" >
                      </div>
                      <div class="col-lg-11 col-sm-11" id="div_top_ruler">
                      <canvas id="top-ruler" width="672" height="40px"/>
                      </div>
                      <div class="col-lg-1 col-sm-1"  id="div_left_ruler">
                      <canvas id="left-ruler" width="40" height="672"/>    
                      </div>
                      <div class="col-lg-11 col-sm-11">
                      <div id="maincanvas">
                        <canvas id="canvas" class="upper-canvas " width="<?php echo $canvas['width'];?>" height="<?php echo $canvas['height'];?>" >
                      </div>
                      </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-3 shadow-lg  bg-black"  id="div_right_sidebar">
                <div class="row  ml-2  bg-black">
                        <label class="col-lg-12 col-sm-12 mt-4 pl-2 text-white bg-black mb-2">Alignment</label>
                        <div class="col-lg-2 pl-1 " data-placement="top" title="Align Left"  >
                          <button  class="btn  btn-black  text-cente alignment"  data-action="left" >
                             Left
                          </button>
                        </div> 
                        <div class="col-lg-2 col-md-2" data-placement="top" title="Align Center"  >
                          <button  class="btn btn-black  text-left  alignment" data-action="center" >
                                Center
                          </button>
                        </div> 
                        
                        <div class="col-lg-2 col-md-2"  data-placement="top" title="Align Right"  >
                          <button  class="btn btn-black  text-cente  alignment" data-action="right">
                                Right
                          </button>
                        </div> 
                        <div class="col-lg-2 col-md-2 "  data-placement="top" title="Align Top"  >
                          <button  class="btn btn-black  text-cente alignment"  data-action="top">
                                Top
                          </button>
                        </div> 
                        <div class="col-lg-2 col-md-2"  title="Align Bottom"  >
                          <button  class="btn btn-black text-cente alignmentr" data-action="bottom">
                                Bottom
                          </button>
                        </div> 
                        <label class="col-lg-12 col-sm-12 mt-2 pl-2 text-white bg-black">Tools</label>
                        <!-- Tools Div -->
                        <div class="col-lg-12 b-bottom pb-2">
                          <div class="row" id="div_tools">
                            <div class="box_action_btn col-lg-2 col-sm-2 bg-black">
                                <a href="javascript:void(0);" onclick="javascript:deleteObject();"><i class="fa fa-trash" aria-hidden="true"></i> <span>Delete</span></a>
                            </div>
                            <div class="box_action_btn col-lg-2 col-sm-2 bg-black">
                                <a href="javascript:void(0);" ><i class="fa fa-reply" aria-hidden="true"></i> <span>Undo</span></a>
                            </div>
                            <div class="box_action_btn col-lg-2 col-sm-2 bg-black">
                                <a href="#"><i class="fa fa-share" aria-hidden="true"></i> <span>Redo</span></a>
                            </div>
                            
                            <div class="box_action_btn col-lg-2 col-sm-2 bg-black">
                                <a href="jacascript:void(0);" id="zoomIn" ><i class="fa fa-search-plus" aria-hidden="true"></i> <span>Zoom In</span></a>
                            </div>
                            <div class="box_action_btn col-lg-2 col-sm-2 bg-black">
                                <a  href="jacascript:void(0);" id="zoomOut"><i class="fa fa-search-minus" aria-hidden="true"></i> <span>Zoom Out</span></a>
                            </div>
                            <div class="box_action_btn col-lg-2 col-sm-2 bg-black">
                                <a href="#"><i class="fa fa-tablet" aria-hidden="true"></i> <span>Vertical</span></a>
                            </div>

                            <div class="box_action_btn col-lg-2 col-sm-2 bg-black">
                                <a href="#"><i class="fa fa-window-maximize" aria-hidden="true"></i> <span>Horizontal</span></a>
                            </div>
                            
                            <div class="box_action_btn col-lg-2 col-sm-2 bg-black">
                                <a href="javascript:void(0);" onclick="javascript:clearCanvas();"><i class="fa fa-recycle" aria-hidden="true"></i> <span>Clear</span></a>
                            </div>
                              </div>
                        </div> 
                        <!--/Tools Div -->
                        <!-- Div Font -->
                        <label class="col-lg-12 col-sm-12 mt-2 pl-2 text-white bg-black mb-2 lbl-font-tool-box" id="lbl_font"  data-placement="left" title="Configure Fonts" >Font</label>
                        <div class="col-lg-12 pl-1 ob-alignment b-bottom pb-2 div-font-tool-box" >
                          <div class="row" id="div_font_tools" >
                            <div class="col-lg-6 col-sm-6">
                              <div class="dropdown">
                                  <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Select Font </button>
                                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 1px, 0px);"> 
                                      <a class="dropdown-item font-family" href="javascript:void(0);" id="Arial" style="font-family:Arial">Arial</a> 
                                      <a class="dropdown-item font-family" href="javascript:void(0);" id="Arial-black" style="font-family:Arial-black" >Arial Black</a> 
                                      <a class="dropdown-item font-family" href="javascript:void(0);" id="Bookman" style="font-family:Bookman" >Bookman</a> 
                                      <a class="dropdown-item font-family" href="javascript:void(0);" id="Candara" style="font-family:Candara" >Candara</a> 
                                      <a class="dropdown-item font-family" href="javascript:void(0);" id="Comic Sans MS" style="font-family:Comic Sans MS" >Comic Sans MS</a> 
                                      <a class="dropdown-item font-family" href="javascript:void(0);" id="Courier" style="font-family:Courier" >Courier</a> 
                                      <a class="dropdown-item font-family" href="javascript:void(0);" id="FontAwesome" style="font-family:FontAwesome" >Font Awesome</a>
                                      <a class="dropdown-item font-family" href="javascript:void(0);" id="Courier" style="font-family:Garamond" >Garamond</a> 
                                      <a class="dropdown-item font-family" href="javascript:void(0);" id="Helvetica" style="font-family:Helvetica" >Helvetica</a> 
                                      <a class="dropdown-item font-family" href="javascript:void(0);" id="Impact" style="font-family:Garamond" >Impact</a> 
                                      <a class="dropdown-item font-face" href="javascript:void(0);" id="Roboto" style="font-family:Roboto" >Roboto</a> 
                                      <a class="dropdown-item font-family" href="javascript:void(0);" id="Sans-serif" style="font-family:Sans serif" >Sans serif</a> 
                                      <a class="dropdown-item font-family" href="javascript:void(0);" id="Times New Roman" style="font-family:Times New Roman" >Times New Roman</a> 
                                      <a class="dropdown-item font-family" href="javascript:void(0);" id="Times" style="font-family:Times" >Times</a> 
                                      <a class="dropdown-item font-family" href="javascript:void(0);" id="Tahoma" style="font-family:Tahoma" >Tahoma</a> 
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-6 col-sm-6">
                                <div class="dropdown">
                                    <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButtonSize" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Select size </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonSize" x-placement="top-start" style="position: aGaramondbsolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 1px, 0px);"> 
                                      <a class="dropdown-item  font-size" href="javascript:void(0);" id="6" >6</a> 
                                      <a class="dropdown-item  font-size" href="javascript:void(0);" id="8" >8</a> 
                                      <a class="dropdown-item  font-size" href="javascript:void(0);" id="10" >10</a>
                                      <a class="dropdown-item  font-size" href="javascript:void(0);" id="11" >11</a>
                                      <a class="dropdown-item  font-size" href="javascript:void(0);" id="12" >12</a>
                                      <a class="dropdown-item  font-size" href="javascript:void(0);" id="13" >13</a>
                                      <a class="dropdown-item  font-size" href="javascript:void(0);" id="14" >14</a>
                                      <a class="dropdown-item  font-size" href="javascript:void(0);" id="15" >15</a> 
                                      <a class="dropdown-item  font-size" href="javascript:void(0);" id="16" >16</a>
                                      <a class="dropdown-item  font-size" href="javascript:void(0);" id="17" >17</a>
                                      <a class="dropdown-item  font-size" href="javascript:void(0);" id="18" >18</a>
                                      <a class="dropdown-item  font-size" href="javascript:void(0);" id="19" >19</a>
                                      <a class="dropdown-item  font-size" href="javascript:void(0);" id="20" >20</a>
                                      <a class="dropdown-item  font-size" href="javascript:void(0);" id="22" >22</a>
                                      <a class="dropdown-item  font-size" href="javascript:void(0);" id="24" >24</a>
                                      <a class="dropdown-item  font-size" href="javascript:void(0);" id="26" >26</a>
                                      <a class="dropdown-item  font-size" href="javascript:void(0);" id="28" >28</a>
                                      <a class="dropdown-item  font-size" href="javascript:void(0);" id="30" >30</a>
                                      
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div> 
                          </div>
                        <!-- /Div Font-->
                        <div class="col-lg-12 col-sm-12  mt-2 div-font-tool-box">
                                <div class="row ml-1">
                                  <div class="col-lg-2 col-md-2 " ><button class="btn btn-white  btn-rounded" data-placement="top" title="Fill color"  onclick=" $('#colorPickerModal').modal('show');">&nbsp;&nbsp;&nbsp;</button></div>

                                  <div class="col-lg-2  col-md-2" data-placement="top" title="Change to Bold"  onclick="javascript:changeFontStyle('bold');"><span><b class="text-white">B</b></span></div>

                                  <div class="col-lg-2 col-md-2" data-placement="top" title="Change to Italic"   onclick="javascript:changeFontStyle('italic');" ><span><i class="text-white">I</i></div>

                                  <div class="col-lg-2 col-md-2" data-placement="top" title="Change to Underline"   onclick="javascript:changeFontStyle('underline');" ><span><u class="text-white">U</u></div>
                                </div> 
                        </div> 
                        <div class="col-lg-12 col-sm-12  mt-1 div-font-tool-box">
                                <div class="row ml-1">
                                  <label class="col-lg-5 col-sm-5 pl-1 text-white bg-black">Letter Spacing</label>
                                  <div class="col-lg-7 col-sm-7 col-md-7  pull-right spacer"><input class="form-control" type="range" min="0" max="1000" id="space-range-input"></div> 
                              </div>
                        </div>
                        <label class="col-lg-12 col-md-12 pl-1 text-white bg-black mt-1 mb-1">Border</label>
                        <div class="col-lg-12 col-md-12 pull-right spacer  mt-2  mb-1">
                        <span>Thickness</span>
                            <input class="form-control" type="range" min="0" max="10" id="border-thickness-input">
                        </div>
                        
                        <div class="col-lg-12 col-md-12 pull-right spacer  mt-2  mb-1">
                        <span>Color</span>
                            <button class="btn btn-white  btn-rounded pull-right" data-placement="top" title="Fill color"  onclick=" $('#borderColorPickerModal').modal('show');">&nbsp;&nbsp;&nbsp;</button>
                        </div>
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

<?php if( isset($request['id']) && !empty($request['id']) ){
  ?>
  var customer_templates_id = '<?php echo base64_decode($request['id']);?>';
  <?php
} ?>
<?php if( isset($request['customer_templates_id']) && !empty($request['customer_templates_id']) ){
  ?>
  var customer_templates_id = '<?php echo base64_decode($request['customer_templates_id']);?>';
  <?php
} ?>
var task = '';
var fields = $.parseJSON(localStorage.getItem('fields'));
var used_labels = [];
var variables = $.parseJSON(localStorage.getItem('fields')); // to be replaced with the value from excel sheet;
<?php if(isset($request['task']) && $request['task'] == 'edit_template'){ ?>
  task = 'edit_template';
  <?php if(isset($icard['customer_template']['template_fields_back']) && $icard['customer_template']['template_fields_back'] != '' ){ ?>
    fields = <?php echo $icard['customer_template']['template_fields_back']; ?>;
  <?php } ?>
  <?php if(isset($icard['customer_template']['template_variables_back']) && $icard['customer_template']['template_variables_back'] != '' ){ ?>
    variables = <?php echo $icard['customer_template']['template_variables_back']; ?>;
   
  <?php } ?>
  console.log('fields', fields);
  console.log('variables', variables);

<?php } ?>
var state;
 // past states
 var undo = [];
 // reverted states
 var redo = [];
$(document).ready(function(){
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
    console.log('users_configs', localStorage.getItem("users_configs"));
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
 console.log('users_configs', localStorage.getItem("users_configs"));
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
topRuler = new fabric.Canvas('top-ruler');
leftRuler = new fabric.Canvas('left-ruler');
mainCanvas = canvas;
redrawRulers();
function redrawRulers() {
  topRuler.clear();
  leftRuler.clear();
  topRuler.setBackgroundColor('#000');
  //topRuler.setColor('#fff');
  leftRuler.setBackgroundColor('#000');
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

<?php if(  isset($request['task'] ) &&   $request['task'] == 'edit_template' && isset($icard['customer_template']['template_data_json_back']) && $icard['customer_template']['template_data_json_back'] != '' ){ ?>
  template_data_json = <?php echo $icard['customer_template']['template_data_json_back']; ?>;
  template_fields_json = <?php echo $icard['customer_template']['template_fields_back']; ?>;

<?php } ?>
if(template_data_json && template_data_json['objects']){
 // //console.log('objects', template_data_json['objects']);
  if( template_data_json['objects'].length > 0){
    //console.log('original template_data_json', template_data_json);
    //console.log('original template_fields_json', template_fields_json);
    for(var i=0; i< template_data_json['objects'].length;i++){
      
      var object_id = template_data_json['objects'][i]['id'];
      if(template_fields_json[object_id]){
        ////console.log('template_fields_json object_id', object_id);
        template_data_json['objects'][i]['fontFamily'] = template_fields_json[object_id]['fontFamily'];
        template_data_json['objects'][i]['fontSize'] = template_fields_json[object_id]['fontSize'];
        template_data_json['objects'][i]['fill'] = template_fields_json[object_id]['fill'];
        //rgb(210,111,74)
      }
      
    }
    console.log('update template_data_json', template_data_json);
  }
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
    activeObject.setCoords();
    canvas.renderAll();
    console.log('selected objects was moved');
}else {
    console.log('no object selected');
}

}
$(function(){

    $('#zoomIn').click(function(){
        canvas.setZoom(canvas.getZoom() * 1.1 ) ;
        redrawRulers();
    }) ;

    $('#zoomOut').click(function(){
        canvas.setZoom(canvas.getZoom() / 1.1 ) ;
        redrawRulers();
    }) ;

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
      }).scale(0.52);
      canvas.add(image);
      canvas.renderAll();
      canvas.uniScaleTransform = false;
    }
  }
  reader.readAsDataURL(e.target.files[0]);
}
window.deleteObject = function() {
	 var cmf  = confirm('Are you sure to delete this object?');
   
   var obj_id = console.log(canvas.getActiveObject().get('id'));
   if(obj_id == 'photo_obj' ){
    localStorage.setItem("photo_obj","0");
   }
   var obj_id = canvas.getActiveObject().get('id');
   //customGetItemByMyID
   if(obj_id == 'scanning_method' ){
      localStorage.setItem("scanning_method","");
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
      var oImg = img.set({ id:newID, width: img.width, height: img.height,  selectable:true, left: 44,	top: 44, stroke: "#cccccc", strokeWidth:24, hoverCursor: "pointer", id:newID }).scale(0.50);
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
      var oImg = img.set({ id:newID, width: img.width, height: img.height,  selectable:true, left: 48,	top: 48, hoverCursor: "pointer", id:newID, clipTo: roundedCorners.bind(img), stroke: "#cccccc", strokeWidth: 36}).scale(0.50);
    canvas.add(oImg);
    canvas.renderAll();
    oImg.set('id', newID);
    fields[newID] = oImg;
    variables[newID]=oImg;
    canvas.setActiveObject(oImg);
    });
  }
  if(obj_shape == 'circle'){
    fabric.Image.fromURL(url, function(img) {
      var oImg = img.set({ id:newID,  width: img.width, height: img.height,  selectable:true, left: 24,	top: 24, stroke: "#cccccc", hoverCursor: "pointer", id:newID, clipTo: fullRounded.bind(img) }).scale(0.66);
    canvas.add(oImg);
    canvas.renderAll();
    oImg.set('id', newID);
    fields[newID] = oImg;
    variables[newID]=oImg;
    canvas.setActiveObject(oImg);
    });
  }
},
window.addScannerObject = function(scanning_method){
  var photo_obj = checkBarOrQRExists(scanning_method);
  if(photo_obj == "" || photo_obj == null){
    return false;
  }
  var newID = 'image_control_scanning_method';
  if(scanning_method === 'barcode'){
    var url = '<?php echo asset_url();?>/images/barcode.jpg';
    fabric.Image.fromURL(url, function(img) {
      var oImg = img.set({ id:newID, width: img.width, height: img.height,  selectable:true, left: 44,	top: 44, stroke: "#cccccc", strokeWidth:12, hoverCursor: "pointer", id:newID }).scale(0.33);
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
      var oImg = img.set({ id:newID, width: img.width, height: img.height,  selectable:true, left: 44,	top: 44, stroke: "#cccccc", strokeWidth:12, hoverCursor: "pointer", id:newID }).scale(0.33);
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
      var _fsize = '15';
      var _ffamily = 'Arial';
      var _fcolor = '#000';
      if( localStorage.getItem("users_configs") ){
        var stringsconfig = localStorage.getItem("users_configs");
        users_configs = $.parseJSON(stringsconfig);
        if(users_configs['fontSize']){
          _fsize = users_configs['fontSize'];
        }
        if(users_configs['fontface']){
          _ffamily = users_configs['fontface'];
        }
        if(users_configs['fontColor']){
          _fcolor = users_configs['fontColor'];
        }
      }
      used_labels.push(text_val);
      var newLabel = new fabric.IText(text_val,{
        fill: _fcolor,
        fontSize: _fsize,
        top : 50,
        lockScalingY: true,
        lockScalingX: true,
        id: newID
        });
      newLabel.toObject = (function(toObject) {
            return function() {
              return fabric.util.object.extend(toObject.call(this), {  id: newID, fontSize:_fsize, fontFamily: _ffamily,  objecttype: 'text', fill:'#000'})
            };
        })(newLabel.toObject);
      
      this.canvas.add(newLabel);
      this.canvas.renderAll();
      fields[newID]={'fontFamily':_ffamily,'fontSize':_fsize, 'fill': '#000'};
      canvas.setActiveObject(newLabel);
     
    },
    addText: function(control_for, text_val) {
      var newID = control_for;
      isExist = customGetItemByMyID(newID);
      if(isExist !== null){
        alert('Variable for '+text_val+' already added on this template');
        return false;
      }
      var _fsize = '15';
      var _ffamily = 'Arial';
      var _fcolor = '#000';
      if( localStorage.getItem("users_configs") ){
        var stringsconfig = localStorage.getItem("users_configs");
        users_configs = $.parseJSON(stringsconfig);
        if(users_configs['fontSize']){
          _fsize = users_configs['fontSize'];
        }
        if(users_configs['fontface']){
          _ffamily = users_configs['fontface'];
        }
        if(users_configs['fontColor']){
          _fcolor = users_configs['fontColor'];
        }
      }
      var newText = new fabric.IText(text_val,{
        fill: _fcolor,
        fontSize: _fsize,
        top : 50,
        lockScalingY: true,
        lockScalingX: true,
        lineHeight: 1.1,
        id: newID
      });
      newText.toObject = (function(toObject) {
            return function() {
                return fabric.util.object.extend(toObject.call(this), {  id: newID, fontSize:_fsize, fontFamily: _ffamily,  objecttype: 'text', fill:'#000'});
            };
        })(newText.toObject);
      this.canvas.add(newText);
      this.canvas.renderAll();
      fields[newID]={'fontFamily':_ffamily,'fontSize':_fsize, 'fill': '#000'};
      variables[newID]=newText;
      canvas.setActiveObject(newText);
    },
    addCommonText: function(){
        var newID = (new Date()).getTime().toString().substr(5);
        newID = newID+'_common_text';

        var _fsize = '15';
        var _ffamily = 'Arial';
        var _fcolor = '#000';
        if( localStorage.getItem("users_configs") ){
          var stringsconfig = localStorage.getItem("users_configs");
          users_configs = $.parseJSON(stringsconfig);
          if(users_configs['fontSize']){
            _fsize = users_configs['fontSize'];
          }
          if(users_configs['fontface']){
            _ffamily = users_configs['fontface'];
          }
          if(users_configs['fontColor']){
            _fcolor = users_configs['fontColor'];
          }
      }
      var newLabel = new fabric.IText("Common text that will be \nset in all cards \nand can be edited \nonly before place an \norder",{
        fill: _fcolor,
        fontSize: _fsize,
        top : 96,
        lockScalingY: false,
        lockScalingX: false,
        lineHeight: 0.8,
        id: newID
        });
      newLabel.toObject = (function(toObject) {
            return function() {
              return fabric.util.object.extend(toObject.call(this), {  id: newID,  fontSize:_fsize, fontFamily: _ffamily,  objecttype: 'text', fill:'#000'})
            };
        })(newLabel.toObject);
      this.canvas.add(newLabel);
      this.canvas.renderAll();
      fields[newID]={'fontFamily':_ffamily,'fontSize':_fsize, 'fill': '#000'};
      this.canvas.setActiveObject(newLabel);
    },
    setTextParam: function(param, value) {
      var obj = this.canvas.getActiveObject();
      var obj_id = this.canvas.getActiveObject().get('id');
     
      
      console.log(param, fields[obj_id][param]);
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
      }
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
$('.font-family').on('click', function(){
    var fontFace = $(this).attr('id');
    setConfigStorage('fontFamily', fontFace);
    app.setTextParam('fontFamily', fontFace);
    var obj_id =  canvas.getActiveObject().get('id');
    var fontname = $(this).text();
    $('#dropdownMenuButton').html(fontname);
    $('#dropdownMenuButton').css('fontFamily', fontFace);
    
});
$('.font-size').on('click', function(){
    app.setTextParam('fontSize', $(this).attr('id'));
    $('#dropdownMenuButtonSize').html($(this).text());
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

 // to json
//canvas.renderAll();
//Saving users template preferences in database customers_templates table
var btnEl = document.getElementById('btn_save');
canvas.includeDefaultValues = true;
btnEl.onclick = function() {
    var data_to_pass = JSON.stringify(canvas);
	  var to_svg = canvas.toSVG();
    var variables_str = JSON.stringify(variables);
    var fields_str =JSON.stringify(fields);
    var customer_templates_id = '<?php echo $request['id'];?>';
    var url = '<?php echo $ajax_url; ?>/saveCustomersTemplateBackSide';
    $.ajax({
        url: url,
        data : {'canvas': data_to_pass, to_svg:to_svg, variables: variables_str, fields:fields_str, customer_templates_id: customer_templates_id, task:task},
        type:'POST',
        dataType:'json',
        success: function(result){
            if(result.status == 'success'){
              window.location = '<?php echo base_url();?>/My_Pages/created_templates?id='+result.encoded_id;
            }
        }
    });
};
function toObject(arr) {
  var rv = {};
  for (var i = 0; i < arr.length; ++i)
    rv[i] = arr[i];
  return rv;
}
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
    stroke: "black",
    strokeWidth:5,
    opacity: 1,
    fill:'blue'
  });
  rect._render(ctx, false);
}
//Drag and drop
function continueCard(){
    var cmf = confirm('Are you sure to process order !');
    if(cmf){
        var stat = false;
        console.log(JSON.stringify(canvas));
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
  $('.lbl-font-tool-box').css('display','none');
  $('.div-font-tool-box').css('display','none');
  <?php if(!isset($request['task']) || (isset($request['task']) && $request['task'] !== 'edit_template' && isset($icard['master_template']['template_image_path_back']))) { ?>
  
  pickAndSetImage('<?php echo base_url();?>uploads/templates/<?php echo $icard['master_template']['template_image_path_back'];?>');
  localStorage.setItem('scanning_method','');
  <?php } ?>
});
function pickColor(r,g,b ){
   var rgb = "rgb("+r+","+g+","+b+")";
   canvas.getActiveObject().set("fill", rgb);
   canvas.renderAll();
   var obj_id = canvas.getActiveObject().get("id");
   if(obj_id &&  fields[obj_id]){    
      fields[obj_id]['fill'] = rgb;
    }
    $('#colorPickerModal').modal('hide');

}
function changeColor(r,g,b ){
   var rgb = "rgb("+r+","+g+","+b+")";
   canvas.getActiveObject().set("fill", rgb);
   canvas.renderAll();
   var obj_id = canvas.getActiveObject().get("id");
   if(obj_id &&  fields[obj_id]){    
      fields[obj_id]['fill'] = rgb;
    }
}
function pickBorderColor(r,g,b ){
   var rgb = "rgb("+r+","+g+","+b+")";
  var obj_id = canvas.getActiveObject().get("id");
   if(obj_id &&  fields[obj_id]){    
      canvas.getActiveObject().set("stroke", rgb);
      fields[obj_id]['stroke'] = rgb;
      canvas.renderAll();
      $('#borderColorPickerModal').modal('hide');
    }
}
function changeBorderColor(r,g,b ){
   var rgb = "rgb("+r+","+g+","+b+")";
   var obj_id = canvas.getActiveObject().get("id");
   canvas.getActiveObject().set("stroke", rgb);
   canvas.renderAll();      
   if(obj_id &&  fields[obj_id]){    
      fields[obj_id]['stroke'] = rgb;

    }
}
function onObjectSelected(e) {
  $('.lbl-font-tool-box').css('display','none');
  $('.div-font-tool-box').css('display','none');
  var objectType = e.target.get('type');
  console.log('objectType', objectType);
  console.log('object id ', e.target.get('id'));
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
    obj.left = Math.max(obj.left, obj.left-obj.getBoundingRect().left);
  }
  // bot-right corner
  if(obj.getBoundingRect().top+obj.getBoundingRect().height  > obj.canvas.height || obj.getBoundingRect().left+obj.getBoundingRect().width  > obj.canvas.width){
    obj.top = Math.min(obj.top, obj.canvas.height-obj.getBoundingRect().height+obj.top-obj.getBoundingRect().top);
    obj.left = Math.min(obj.left, obj.canvas.width-obj.getBoundingRect().width+obj.left-obj.getBoundingRect().left);
  }
});
canvas.on("text:changed", function(e) {
  var text_val = e.target.get('text');
  if(used_labels.indexOf(text_val) !=  -1){
    e.target.set('text','Variable '+text_val);
     alert('Label name "'+text_val+'" already exists');
  }
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
  var activeObj = canvas.getActiveObject() || canvas.getActiveGroup();
  if (cur_value != '' && activeObj) {
    process_align(cur_value, activeObj);
    activeObj.setCoords();
    canvas.renderAll();
  } else {
    alert('Please select a item');
    return false;
  }
});

function addIcon(icon){
  var fontName = '';
  if(icon === 'phone'){ fontName = '\uF095'; }
  if(icon === 'mobile'){ fontName = '\uF10b'; }
  if(icon === 'office'){ fontName = '\uF0b1'; }
  if(icon === 'home'){ fontName = '\uF015'; }
  if(icon === 'email_white'){ fontName = '\uF003'; }
  if(icon === 'email'){ fontName = '\uF0e0'; }
  if(icon === 'registered'){ fontName = '\uF25d'; }
  if(icon === 'copyright'){ fontName = '\uF1f9'; }
  if(icon === 'globe'){ fontName = '\uF0ac'; }
  if(icon === 'hand_right'){ fontName = '\uF0a4'; }
  var newID = (new Date()).getTime().toString().substr(5);
      newID = newID+'_icon_'+icon+'_no';
      var text = new fabric.IText(fontName,{fontSize: 24,id:newID,fill:'#000'});
      canvas.add(text);
      canvas.renderAll();
      text.set('fontFamily','FontAwesome');
      text.set('id',newID);
      if(localStorage.getItem('fill')){
        var _fcolor = localStorage.getItem('fill');
      }else{
        var _fcolor = '#000';
      }
      text.set('fill',_fcolor);
}

function checkBarOrQRExists(scanning_method){
   var scanner = localStorage.getItem('scanning_method');
   console.log('scanner ==  ',scanner);
   if(scanner){
     var scanning_method  = capitalizeFirstLetter(scanner);
      alert(scanning_method+' already added to the template.');
      return '';
   }else{
    localStorage.setItem('scanning_method', scanning_method);
    return scanning_method;
   }
}
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}
$('#btn_align_bottom').on('click', function(){
  var ht = canvas.getActiveObject().get("height");
  var bottomPoint = ( 286 - (ht)); 
  console.log('bottomPoint',  bottomPoint);
  canvas.getActiveObject().set('top', bottomPoint);
  canvas.renderAll();
  canvas.setActiveObject(canvas.getActiveObject());
});
function changeFontStyle(font_style){
 
  var obj_id = canvas.getActiveObject().get("id");
  if(font_style === 'underline'){
    var activeStyle  = canvas.getActiveObject().get("underline");
    if(activeStyle == false){
      //canvas.getActiveObject().setSelectionStyles({ underline: true },0, 100);
      canvas.getActiveObject().set('underline', true);
      fields[obj_id]['underline'] = true;
    }else{
      canvas.getActiveObject().set('underline', false);
      fields[obj_id]['underline'] = false;
    }
  }else{
    var activeStyle  = canvas.getActiveObject().get("fontStyle");
    if(activeStyle === font_style){
      canvas.getActiveObject().set('fontStyle', '');
      fields[obj_id]['fontStyle'] = '';
    }else{
      canvas.getActiveObject().set('fontStyle', font_style);
      fields[obj_id]['fontStyle'] = font_style;
    }
    
  }
  canvas.renderAll();
  canvas.setActiveObject(canvas.getActiveObject());
}
function cancelEdit(){
  var cfm_cncl = confirm('Are you sure to cancle the changes of this template ?');
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
</script>