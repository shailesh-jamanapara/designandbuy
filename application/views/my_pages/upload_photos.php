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
		My Account  &nbsp;<i class="fas fa-angle-right"></i>&nbsp; Action &nbsp;<i class="fas fa-angle-right"></i>&nbsp; <span class="text-orange">Upload photos</span>
	</h5>
	</div>
	<div class="col-lg-12">
    <form name="frm_upload_sheet" id="frm_upload_sheet" method="post" action="<?php echo base_url();?>upload-images" enctype="multipart/form-data" >
        <div class="row"  id="div_file_upload_data" > 
        <input type="hidden" name="task" id="task" value="upload_sheet" >
            <div class="ml-2 form-group  input-group-rounded mb-1  mt-1 col-lg-12 col-sm-16 mb-2">
                <select id="template_id" name="template_id" class="form-control-sm " required>
                        <option value="">Select Template</option>
                        <?php foreach($my_templates as $my_template){ ?>
                            <option value="<?php echo $my_template['template_unique_id'];?>"><?php echo $my_template['template_unique_id'];?></option>
                        <?php } ?>
                </select>
            </div>
            <div class="form-group  input-group-rounded mb-1  mt-1 col-lg-12 col-sm-16 mb-4">
                <h5 class="ml-2 sub-title">Browse multiple files from your PC</h5>
                    <input type="file" class="form-control-file form-control-sm " id="photoszip" name="photoszip[]" aria-describedby="fileHelp" required multiple>
                </div>
                
                <div class="form-group  input-group-rounded  col-lg-2 col-sm-3 pull-right">
                    <input type="submit" class=" btn btn-rounded btn-shadow btn-secondary pull-left ml-2 " name="submit" onclick="javascript:$('#modal_save_icards').modal('show');">
                </div>
                
            </div>       
    </form>
    <small class="ml-2"><i>Maximum 1000 files. Maximum file size 1000 MB.</i></small>   
    </div>
</div>
<!-- Modal Save my template  -->
<div class="modal" id="modal_save_icards" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="width: 35%;top: 33%;left: 31%;">
   <div class="modal-dialog modal-content-full-width" role="document">
      <div class="modal-content">
         <div class="modal-body text-center">
			<button class="btn btn-primary" type="button" disabled>
			<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
			 Importing photos. Please wait...
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