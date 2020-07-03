         </div>
      </div>
      </div>
   </div>
</div>
</div>
 <!-- ======== @Region: #footer ======== -->
 <footer id="footer" class="py-3">
    <div class="container">
      <div class="row">
        <!--@todo: replace with company copyright details-->
        <div class="col-md-6">
          <p class="mb-0 text-sm">Copyright 2019 &copy; Muktjivan Pixel</p>
          <ul class="list-inline footer-links mb-0 text-sm">
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Contact Us</a></li>
          </ul>
        </div>
        <div class="col-md-6 flex-valign">
          <div class="float-md-right ml-md-auto">
            <!--@todo: replace with company social media details-->
            <a href="#" class="btn btn-sm btn-icon btn-dark btn-rounded"><i class="fab fa-twitter"></i></a>
            <a href="#" class="btn btn-sm btn-icon btn-dark btn-rounded"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="btn btn-sm btn-icon btn-dark btn-rounded"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" class="btn btn-sm btn-icon btn-dark btn-rounded"><i class="fab fa-google-plus-g"></i></a>
            <a href="#top" class="btn btn-sm btn-icon btn-dark btn-rounded" title="Back to top"><i class="fa fa-chevron-up"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
<div class="modal" id="data_upload" tabindex="-1" role="dialog" >
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
<div class="modal fade" id="send_link_all" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
<form id="frm_download_data" action="<?php echo base_url();?>Ajax/downloadData?id=<?php echo rand(1000,10000);?>" enctype="multipart/form-data" method="post" target="_blank">
   <input type="hidden" name="check_template_id" id="check_template_id" value="">
</form>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="<?php echo asset_url(); ?>front/js/metisMenu.min.js"></script>
<script type="text/javascript" src="<?php echo asset_url(); ?>front/js/custom.js"></script>
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
   	//$('#frm_upload_data').bootstrapValidator();
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
   function downloadData(check_template_id){
   	$('#check_template_id').val(check_template_id);
   	$('#frm_download_data').submit();
   }
   function viewCards(){
   	$('#view_cards_in_a4').modal('show');
   }
 function gotopage(page_no){
	$('form#frmsearch').find('#page').val(page_no);
	document.getElementById('frmsearch').submit();
}
</script>
