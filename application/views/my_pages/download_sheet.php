
<div class="myaccount_right_content_bg">
<div class="col-lg-3">
    <ul class="list_quick_btn">
    
    <li><a href="javascript:void(0);" onclick="javascript:$('#data_upload').modal('show');">Upload Data <i class="fa fa-upload pull-right " aria-hidden="true"></i></a></li>
    <!--     <li><a href="javascript:void(0);" onclick="javascript:$('#confirm_send_sms').modal('show');">Send SMS with Link <i class="fa fa-arrow-right pull-right " aria-hidden="true"></i></a></li>
    -->
    <li><a href="javascript:void(0);" onclick="javascript:downloadSheet('<?php echo $profile['customer_name']; ?>');">Download Excel <i class="fa fa-download pull-right" aria-hidden="true"></i></a></li>

    <li><a href="#">Go to Manual Entry <i class="fa fa-arrow-right pull-right" aria-hidden="true"></i></a></li>

    </ul>
</div>
</div>
<form action="" method="post" id="frm_download_sheet">
<input type="hidden" name="task" id="task" value="" />
<input type="hidden" name="customer_name" id="customer_name" value="" />
<input type="hidden" name="check_template_id" id="check_template_id" value="<?php echo $check_template_id;?>" />

</form>

<script>
function downloadSheet(customer_name){
    $('input#task').val('download_sheet');
    $('input#customer_name').val(customer_name);
    document.getElementById('frm_download_sheet').submit();
}
</script>