<div class="col-sm-16 col-lg-9 shadow-lg pt-2 pl-2 pr-2 pb-2 mb-5 ml-2 bg-white  action-content-div" id="div_download_data" style="">
            <div class="row"  >
            <div class="col-lg-12 col-sm-12 mb-2" >
                <h5 class="text-left my-0 sub-title">
                    My Account  <i class="fas fa-angle-right"></i> Action <i class="fas fa-angle-right"></i> <span class="text-primary">Download sample sheet  </span>
                </h5>
                </div>
                <div class="col-lg-8 col-sm-12 ">
                            <h5 class="mt-2 mb-2 text-black text-uppercase">Please select template to download file for</h5>
                </div>
                <div class="col-lg-4 col-sm-12 ">
                        <h5 id="template_name" class="mt-2 mb-2 text-black text-uppercase"> No item selected </h5>
                </div>
                <div class="col-lg-8">
                    <div class="row" id="div_list_thumb" >
                    <?php if( count($my_templates) > 0 ){ ?>
                        <?php foreach( $my_templates as $my_template ){ ?>
                            <?php if( isset($my_template['template_svg']) && $my_template['template_svg'] != '' &&  $my_template['template_name'] != '') { 
                                ?>
                            <div id="div_thumb_<?php echo $my_template['template_unique_id']; ?>" class="col-lg-6" onclick="javascript:selectTemplate('<?php echo $my_template['template_unique_id']; ?>', '<?php echo $my_template['template_name']; ?>', '<?php echo $my_template['status']; ?>', '<?php echo $my_template['id']; ?>')"><?php echo $my_template['template_svg']; ?>
                            </div>
                            <?php } ?>
                        <?php }?>
                    <?php } ?>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-lg-4">
                    <div class="text-center" id="div_large_card">
                    </div>
                </div>
                
                <div class="col-lg-12" id="div_download_sample">
                    <div class="row" >
                        <label class="col-lg-12 mt-4"> <a id="link_template_file" href="javascript:void(0);" class="btn btn-primary btn-shadow pull-right btn-download-file" > </a>  </label>
                        
                    </div>    
                </div>  
                <div class="col-lg-12 mt-6">
                    <small class="text-black">Please use <b>TEMPATE ID</b> to fill in <b>Template ID</b> column in the sheet. </small>
                </div>  
            </div>
        </div>
        <div class="col-sm-18 col-lg-9 shadow-lg pt-3 pl-4 pr-4 pb-4 mb-5 ml-2 bg-white rounded" id="div_upload_data" style="display:none;">
            <div class="row"  >
                    <div class="col-lg-12 col-sm-12 ">
                        <h5 class="mt-2 mb-2 text-black text-uppercase">Your templates <small>  [ Total <?php echo count($my_templates); ?>  Templates Created] <small></h5>
                    </div>
            </div>     
            <div class="row" id="div_list_thumb_to_upload" >   
                    <div class="col-lg-12 col-sm-12">
                    <div class="row grid-meduim-card">
                        <?php if( count($my_templates) > 0 ){ ?>
                            <?php foreach( $my_templates as $my_template ){ ?>
                                <?php if( isset($my_template['template_svg']) && $my_template['template_svg'] != '' &&  $my_template['template_name'] != '' ) { 
                                    
                                    ?>
                                <div id="div_thumb_<?php echo $my_template['template_unique_id']; ?>" class="col-lg-4 col-sm-4 shadow-lg  bg-white" >
                                    <div class="row  pl-3">
                                        <div class="col-lg-12  col-sm-12 mt-1">
                                            <small class="text-primary text-uppercase  pull-left">Template ID: <?php echo $my_template['template_unique_id']; ?> </small>
                                        </div>
                                        <div class="col-lg-12  col-sm-12 mt-1">
                                           
                                        </div>
                                        <div class="col-lg-12 col-sm-12 ">
                                            <?php echo $my_template['template_svg']; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            <?php }?>
                        <?php }else{
                            ?>No Template created yet.<?php
                        } ?>
                        </div>
                    </div>
                </div>  
            <!-- form to upload data excel sheet for the selected template -->
            <form name="frm_upload_sheet" id="frm_upload_sheet" method="post" action="<?php echo base_url();?>upload-sheet" enctype="multipart/form-data" >
                <div class="row"  id="div_file_upload_data" > 
                <input type="hidden" name="task" id="task" value="upload_sheet" >
                <input type="hidden" name="user_template_id_to_upload" id="user_template_id_to_upload" value="" >
                <input type="hidden" name="template_status_to_upload" id="template_status_to_upload" value="" >
                
                    <div class="form-group  input-group-rounded mb-3  mt-3 col-lg-5 col-sm-5">
                    <h5 class="ml-2">Upload excel sheet</h5>
                        <input type="file" class="form-control-file form-control-sm " id="dataexcel" name="dataexcel" aria-describedby="fileHelp">
                       
                    </div>
                    
                    <div class="form-group  input-group-rounded mb-3  mt-3 col-lg-5 col-sm-5">
                    <h5 class="ml-2">Upload photos in zip folder</h5>
                        <input type="file" class="form-control-file form-control-sm " id="photoszip" name="photoszip" aria-describedby="fileHelp">
                    </div>
                    <div class="form-group  input-group-rounded mb-3  mt-3 col-lg-3 col-sm-3">
                        <input type="submit" class="form-control btn btn-primary btn-shadow pull-right" name="submit" >
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <p><small id="fileHelp" class="form-text text-muted">Please choose .xls or .xlsx file only. <br> <br>Please use <b>TEMPATE ID</b> to fill in <b>Template ID</b> column in the sheet.</small></p>
                    </div>    
            </form>
            </div>
        </div>  
                <!-- /.col -->
               
               
            </div>
        
        </div>
<!-- form to download sample data excel sheet for the selected template -->
<form name="frm_download_sheet" id="frm_download_sheet" method="post" action="download-sheet" target="_blank">
    <input type="hidden" name="task" id="task" value="download_sheet" >
    <input type="hidden" name="user_template_id" id="user_template_id" value="" >
    <input type="hidden" name="template_status" id="template_status" value="" >
</form>
<!-- //form -->

  

<!-- //form -->
<script>
$(document).ready(function(){
    $('div#div_download_sample').css('display','none');
    $('div#div_upload_data').css('display','none');
});
function selectTemplate(template_uniq_id, template_name, template_status, tid){
    if( template_name != '' ){
        var user_template_id = template_uniq_id;
        $('h5#template_name').html('Template ID : '+user_template_id+' <br/> Name : '+template_name);
        $('a#link_template_file').html('Download file for '+template_name+' &nbsp;&nbsp;<i class="fa fa-download pull-right " ></i>');
        $('a#link_template_file').attr('id',tid);
        $('input#user_template_id').val(user_template_id);
        $('input#template_status').val(template_status);
    }
    $('div#div_large_card').html($('div#div_thumb_'+user_template_id).html());

    $('div#div_download_sample').css('display','block');
}

function selectTemplateToUploadData(tid, template_name, template_status){
    if( template_name != '' ){
        var user_template_id = tid;
        $('h5#template_name_to_upload').html('Template ID : '+user_template_id+' <br/> Name : '+template_name);
        $('input#user_template_id_to_upload').val(user_template_id);
    }
    $('div#div_large_card_to_upload').html($('div#div_thumb_'+tid).html());
    $('div#div_upload_data').css('display','block');
}

function checkForExcelDataUploaded(){
    
}
$('#btn_download_link').on('click', function(){
    
    $('div#div_download_data').css('display','inline');
    $('div#div_download_data').prop('disabled','false');
    $('div#div_upload_data').css('display','none');
    $('div#div_upload_data').prop('disabled','true');
    $('div#div_btn').find('.btn').removeClass('active');
    $(this).addClass('active');
});
$('#btn_upload_link').on('click', function(){
    $('div#div_download_data').css('display','none');
    $('div#div_download_data').prop('disabled','true');
    $('div#div_upload_data').css('display','inline');
    $('div#div_upload_data').prop('disabled','false');
    $('div#div_btn').find('.btn').removeClass('active');
    $(this).addClass('active');
});
$('.btn-download-file').on('click', function(){
 var tid = $(this).attr('id');
 var template_status = $('input#template_status').val();
 if(template_status != '0' ){
     if(confirm('You have downloaded sample excel sheet for this template. Do you want to download again this?')){
        $('form#frm_download_sheet').append('<input type="hidden" name="check_template_id" id="check_template_id" value="'+tid+'">');
        $('form#frm_download_sheet').submit();
     }
 }
 if(template_status == '0'){
        $('form#frm_download_sheet').append('<input type="hidden" name="check_template_id" id="check_template_id" value="'+tid+'">');
        $('form#frm_download_sheet').submit();
 }
 $('div#div_btn').find('.btn').removeClass('active');
    $(this).addClass('active');
 
});

$(document).ready(function() {

});
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>