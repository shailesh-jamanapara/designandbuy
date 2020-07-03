<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo asset_url(); ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.css" rel="stylesheet">
<?php //echo "<pre>"; print_r($my_templates); echo "</pre>"; ?>
<style>
span.input-group-text{
	width:136px !important;
	font-size:13px !important;
}
</style>
<div class="col-sm-16 col-lg-9 shadow-lg pt-2 pl-2 pr-2 pb-2 mb-5 ml-2 bg-white  action-content-div" id="div_download_data" style="">
<div class="row">
	<div class="col-lg-12 col-sm-12 mb-2" >
	<h5 class="text-left my-0 sub-title">
		My Account  &nbsp;<i class="fas fa-angle-right"></i>&nbsp; Action &nbsp;<i class="fas fa-angle-right"></i>&nbsp; <span class="text-white">Upload data excel</span>
	</h5>
	</div>
	<div class="col-lg-12">
    <form name="frm_upload_sheet" id="frm_upload_sheet" method="post" action="<?php echo base_url();?>upload-sheet" enctype="multipart/form-data" >
                <div class="row"  id="div_file_upload_data" > 
                <input type="hidden" name="task" id="task" value="upload_sheet" >
                <input type="hidden" name="user_template_id_to_upload" id="user_template_id_to_upload" value="" >
                <input type="hidden" name="template_status_to_upload" id="template_status_to_upload" value="" >
                
                    <div class="form-group  input-group-rounded mb-3  mt-3 col-lg-12 col-sm-16 mb-6">
                    <h5 class="ml-2 sub-title">Browse excel from your PC</h5>
                        <input type="file" class="form-control-file form-control-sm" id="dataexcel" name="dataexcel" aria-describedby="fileHelp">
                       
                    </div>
                    <div class="form-group  input-group-rounded  col-lg-2 col-sm-3 mt-2 pull-right">
                        <input type="submit" class="btn btn-rounded btn-shadow btn-secondary pull-left ml-2" name="submit" onclick="javascript:$('#modal_save_icards').modal('show');" >
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <p><small id="fileHelp" class="form-text text-muted text-dark">Please choose .xls or .xlsx file only. <br> <br>Please use <b>TEMPATE ID</b> to fill in <b>Template ID</b> column in the sheet.<br><br> If there is any column with values of Email Id in your sheet then please change the format. Select all rows of the same columns, then Right click, and then select to <b>Remove Hyperlinks</b>. Excel sheet must not contain any hyperlink in it. Please refer below screenshot.</small></p>
                        <p>
                        <img src="<?php echo asset_url();?>front/images/remove-link-hint.png" height="275" width="">
                        </p>
                        <p>
                        <small>Please use <b>\n</b> for new line for address to be shown in Id cards of records entry within excel sheet. Please refer below screenshot</small>
                        </p>
                        <p>
                        <img src="<?php echo asset_url();?>front/images/new-line-in-address.png" height="275" width="">
                        </p>
                        <p>
                        <small>Please use only <b>image name with extension only </b> for Photo 1 or Photo 2 or Photo 3 to be shown in Id cards of records entry within excel sheet for e.g. <b>username.jpg</b> . Please refer below screenshot.<br><b class="text-red">Please don't use system path. Like C:\Users\Admin\Desktop\21-03-2018\TMPL00024\username.jpg</b></small>
                        </p>
                        <p>
                        <img src="<?php echo asset_url();?>front/images/image-path-hint.png" height="275" width="">
                        </p>
                    </div>    
            </form>
            
	</div>
</div>
</div>
<!-- Modal Save my template  -->
<div class="modal" id="modal_save_icards" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="width: 35%;top: 33%;left: 31%;">
   <div class="modal-dialog modal-content-full-width" role="document">
      <div class="modal-content">
         <div class="modal-body text-center">
			<button class="btn btn-primary" type="button" disabled>
			<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
			 Importing data. Please wait...
		</button>
         </div>
      </div>
   </div>
</div>
<script>
	function showhide(val){
		$('table.table-records').css('display','none');
		$('div.template-fields').css('display','none');
		$('div.template-fields').prop('disabled', true);
		$('div#template_fields_'+val).css('display','block');
		$('div#template_fields_'+val).prop('disabled', false);
		$('div#div_btn').css('display','block');
		$('div#div_btn').prop('disabled', false);
		$('table#mydraftedcards'+val).css('display','');
	}
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>