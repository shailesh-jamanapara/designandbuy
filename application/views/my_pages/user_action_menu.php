<div class="col-sm-3 col-lg-3 shadow-lg pt-2 pr-3 pb-3  mb-5 bg-white text-left" style="min-height:336px;" id="div_btn">
    <a href="<?php echo base_url();?>My_Pages/download_sample_sheet" class="mb-2 btn  btn-white btn-shadow  btn-rounded text-default pt-2  pr-2  pb-2  pl-2 text-left  <?php if($request['ACTION'] == 'download_sample_sheet') { echo 'active'; } ?>" role="button"  id="btn_download_link"><i class="fa fa-download pull-left  <?php if($request['ACTION'] == 'download_sample_sheet') { echo 'text-white'; }else{ echo 'text-primary'; } ?>" ></i>&nbsp;Download sample sheet</a>

    <a  href="<?php echo base_url();?>My_Pages/upload_sheet" class="mb-2 btn  btn-white btn-shadow  btn-rounded text-default pt-2  pr-2  pb-2  pl-2 text-left   <?php if($request['ACTION'] == 'upload_sheet') { echo 'active'; } ?>" role="button" id="btn_upload_link" ><i class="fa fa-upload pull-left <?php if($request['ACTION'] == 'upload_sheet') { echo 'text-white'; }else{ echo 'text-primary'; } ?>" ></i>&nbsp;Upload data excel</a>
    
    <a  href="<?php echo base_url();?>My_Pages/upload_photos" class="mb-2 btn  btn-white btn-shadow  btn-rounded text-default pt-2  pr-1  pb-2  pl-2 text-left   <?php if($request['ACTION'] == 'upload_photos') { echo 'active'; } ?>" role="button" id="btn_upload_photo" ><i class="fa fa-archive pull-left <?php if($request['ACTION'] == 'upload_photos') { echo 'text-white'; }else{ echo 'text-primary'; } ?>" ></i>&nbsp;Upload photos</a>
    
    <a  href="<?php echo base_url();?>My_Pages/data_entry_manual" class="mb-2 btn  btn-white btn-shadow  btn-rounded text-default pt-2  pr-2  pb-2  pl-2 text-left  <?php if( $request['ACTION'] == 'data_entry_manual') { echo 'active'; } ?>" role="button" id="btn_data_entry_link" ><i class="fa fa-edit pull-left  <?php if($request['ACTION'] == 'data_entry_manual') { echo 'text-white'; }else{ echo 'text-primary'; } ?>" ></i>&nbsp;Manual data entry </a>
    
    <a  href="<?php echo base_url();?>My_Pages/buy_lace" class="mb-2 btn  btn-white btn-shadow  btn-rounded text-default pt-2  pr-2  pb-2  pl-2 text-left  <?php if( $request['ACTION'] == 'buy_lace') { echo 'active'; } ?>" role="button" id="btn_add_lace_link" ><i class="fa fa-shopping-cart pull-left  <?php if($request['ACTION'] == 'buy_lace') { echo 'text-white'; }else{ echo 'text-primary'; } ?>" ></i>&nbsp;Buy lace for I-Cards</a>
    
</div>
<div class="col-sm-3 col-lg-1 shadow-lg pt-2 pr-3 pb-3  mb-5 bg-white text-left" style="min-height:336px;" id="div_btn_collapsed" >
    <a href="<?php echo base_url();?>My_Pages/download_sample_sheet" class="mb-2 btn  btn-white btn-shadow  btn-rounded text-default pt-2  pr-2  pb-2  pl-2 text-left  <?php if($request['ACTION'] == 'download_sample_sheet') { echo 'active'; } ?>" role="button"  id="btn_download_link" title="Download sample sheet" ><i class="fa fa-download pull-left  <?php if($request['ACTION'] == 'download_sample_sheet') { echo 'text-white'; }else{ echo 'text-primary'; } ?>" ></i></a>
    <a  href="<?php echo base_url();?>My_Pages/upload_sheet" class="mb-2 btn  btn-white btn-shadow  btn-rounded text-default pt-2  pr-2  pb-2  pl-2 text-left   <?php if($request['ACTION'] == 'upload_sheet') { echo 'active'; } ?>" role="button" id="btn_upload_link" title="Upload data excel"><i class="fa fa-upload pull-left  <?php if($request['ACTION'] == 'upload_sheet') { echo 'text-white'; }else{ echo 'text-primary'; } ?>" ></i></a>
    <a  href="<?php echo base_url();?>My_Pages/upload_photos" class="mb-2 btn  btn-white btn-shadow  btn-rounded text-default pt-2  pr-2  pb-2  pl-2 text-left   <?php if($request['ACTION'] == 'upload_photos') { echo 'active'; } ?>" role="button" id="btn_upload_photo" title="Upload photos" ><i class="fa fa-archive pull-left  <?php if($request['ACTION'] == 'upload_sheet') { echo 'text-white'; }else{ echo 'text-primary'; } ?>" ></i></a>
    <a  href="<?php echo base_url();?>My_Pages/data_entry_manual" class="mb-2 btn  btn-white btn-shadow  btn-rounded text-default pt-2  pr-2  pb-2  pl-2 text-left  <?php if( $request['ACTION'] == 'data_entry_manual') { echo 'active'; } ?>" role="button" id="btn_data_entry_link" title="Manual data entry" ><i class="fa fa-edit pull-left  <?php if($request['ACTION'] == 'data_entry_manual') { echo 'text-white'; }else{ echo 'text-primary'; } ?>" ></i></a>
    
    <a  href="<?php echo base_url();?>My_Pages/buy_lace" class="mb-2 btn  btn-white btn-shadow  btn-rounded text-default pt-2  pr-2  pb-2  pl-2 text-left <?php if( $request['ACTION'] == 'buy_lace') { echo 'active'; } ?> " role="button" id="btn_add_lace_link" title="Buy lace for ID cards" ><i class="fa fa-shopping-cart pull-left <?php if($request['ACTION'] == 'buy_lace') { echo 'text-white'; }else{ echo 'text-primary'; } ?>" ></i></a>
</div>