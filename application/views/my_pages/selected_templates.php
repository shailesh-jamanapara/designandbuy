<link href="<?php echo asset_url(); ?>/front/css/theme-shop.css" id="colour-scheme" rel="stylesheet">
<link href="<?php echo asset_url(); ?>/front/plugins/plugin-css/plugin-owl-carousel.min.css" id="colour-scheme" rel="stylesheet">
<script type="text/javascript" src="<?php echo asset_url(); ?>/front/studio/fabric.js"></script>
<div class="tab-content col-sm-12">
    <div class="row">   
		<div class="col-sm-3 col-lg-3 shadow-lg p-4 mb-5 bg-white rounded text-center" style="">
            <a class="mb-4 mr-1 btn btn-warning btn-shadow" id="btn_download_link">SAVED TEMPLATES &nbsp; <i class="fa fa-floppy pull-right " ></i> </a>
            <a class="mb-4 mrl-1 mr-2 btn btn-success btn-shadow text-white" id="btn_upload_link" >ORDERED TEMPLATES &nbsp; <i class="fa fa-cart pull-right " ></i> </a>
			<a class="mb-4 mrl-1 mr-2 btn btn-success btn-shadow text-white" id="btn_upload_link" >REVIEWED TEMPLATES &nbsp; <i class="fa fa-cart pull-right " ></i> </a>
        </div>
        <div class="col-sm-8 col-lg-8 shadow-lg pt-3 pl-4 pr-4 pb-4 mb-5 ml-2 bg-white rounded" id="div_download_data" style="min-height:548px;">
            <div class="row"  >
                <div class="col-lg-8 col-sm-12 ">
                            <h5 class="mt-2 mb-2 text-primary text-uppercase">Please select template to download file for</h5>
                </div>
                <div class="col-lg-4 col-sm-12 ">
                        <h5 id="template_name" class="mt-2 mb-2 text-primary text-uppercase"> No item selected </h5>
                </div>
                <div class="col-lg-8">
                    <div class="row" id="div_list_thumb" >
                    <?php if( count($my_templates) > 0 ){ ?>
                        <?php foreach( $my_templates as $my_template ){ ?>
                            <?php if( isset($my_template['template_svg']) && $my_template['template_svg'] != '' ) { 
                                ?>
                            <div id="div_thumb_<?php echo $my_template['id']; ?>" class="col-lg-3 thumb-card thumb-card-vertical" onclick="javascript:selectTemplate('<?php echo $my_template['id']; ?>', '<?php echo $my_template['template_name']; ?>', '<?php echo $my_template['status']; ?>')"><?php echo $my_template['template_svg']; ?>
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
                    <small class="text-primary">Please use <b>TEMPATE ID</b> to fill in <b>Template ID</b> column in the sheet if you are using multiple design of the template for one class. </small>
                </div>  
            </div>
        </div>
        <div class="col-sm-7 col-lg-7" id="div_upload_data" style="min-height:548px;display:none;">
        <div class="row" >
                <div class="col-lg-8 col-sm-12 ">
                        <h5 class="mt-2 mb-2 text-primary text-uppercase">Please select template to download file for</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- form to download sample data excel sheet for the selected templates -->
<form name="frm_download_sheet" id="frm_download_sheet" method="post" action="download-sheet" target="_blank">
<input type="hidden" name="task" id="task" value="download_sheet" >
<input type="hidden" name="user_template_id" id="user_template_id" value="" >
<input type="hidden" name="template_status" id="template_status" value="" >
</form>
<!-- //form -->
<script>
$(document).ready(function(){
    $('div#div_download_sample').css('display','none');
});
function selectTemplate(tid, template_name, template_status){
    if( template_name != '' ){
        var user_template_id = 'TMPL00'+tid;
        $('h5#template_name').html('Template ID : '+user_template_id+' Name : '+template_name);
        $('a#link_template_file').html('Download file for '+template_name+' &nbsp;&nbsp;<i class="fa fa-download pull-right " ></i>');
        $('a#link_template_file').attr('id',tid);
        $('input#user_template_id').val(user_template_id);
        $('input#template_status').val(template_status);
    }
    $('div#div_large_card').html($('div#div_thumb_'+tid).html());

    $('div#div_download_sample').css('display','block');
}
function checkForExcelDataUploaded(){
    
}
$('#btn_download_link').on('click', function(){
    $('div#div_download_data').css('display','inline');
    $('div#div_download_data').prop('disabled','false');
    $('div#div_upload_data').css('display','none');
    $('div#div_upload_data').prop('disabled','true');
});
$('#btn_upload_link').on('click', function(){
    $('div#div_download_data').css('display','none');
    $('div#div_download_data').prop('disabled','true');
    $('div#div_upload_data').css('display','inline');
    $('div#div_upload_data').prop('disabled','false');
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
 // adding check_template_id element
 
 
 
});
</script>
