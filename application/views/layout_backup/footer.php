<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
/*
* 12-20-2016
* footer page(view/layout)
*/
?>

</div>
</div>
<!-- /page content -->
	<!-- footer content -->
	<footer>
		<div class="pull-right">
		Copyright © <?php echo date('Y');?> BimSym Tech Support. All rights reserved.
		</div>
		<div class="clearfix"></div>
	</footer>
	<!-- /footer content -->
<form name="frmlist" id="frmlist" method="post" action="">
    <input type="hidden" name="task" id="task" value="" />
    <input type="hidden" name="user_type" id="user_type" value="" />
	<input type="hidden" name="page" id="page" value="<?php echo $postdata['page']; ?>" />
	<input type="hidden" name="limit" id="limit" value="<?php echo $postdata['limit']; ?>" />
	<input type="hidden" name="search_for" id="search_for" value="<?php echo $postdata['search_for']; ?>" />
    <input type="hidden" name="search_by" id="search_by" value="<?php echo $postdata['search_by']; ?>" />
    <input type="hidden" name="id" id="id" value="" />
    <input type="hidden" name="sort_by" id="sort_by" value="" />
    <input type="hidden" name="order_type" id="order_type" value="" />
    <input type="hidden" name="view_type" id="view_type" value="" />
    <input type="hidden" name="mode" id="mode" value="" />
    <input type="hidden" name="sort_order" id="sort_order" value="" />
    <input type="hidden" name="listpage_url" id="listpage_url" value="<?php if(isset($listpage_url)) echo $listpage_url; ?>" />
</form>	
<form name="frmcommon" id="frmcommon" method="post" action="">
    <input type="hidden" name="task" id="task" value="" />
    <input type="hidden" name="user_type" id="user_type" value="" />
    <input type="hidden" name="back_url" id="back_url" value="" />
    <input type="hidden" name="id" id="id" value="" />
    <input type="hidden" name="sort_by" id="sort_by" value="" />
    <input type="hidden" name="order_type" id="order_type" value="" />
</form>	
    
    <!-- Bootstrap -->
    <script src="<?php echo vendor_url();?>bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo vendor_url();?>fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo vendor_url();?>nprogress/nprogress.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="<?php echo vendor_url();?>bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="<?php echo vendor_url();?>jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="<?php echo vendor_url();?>google-code-prettify/src/prettify.js"></script>
	<!-- Boostrap toggle button -->
	<script src="<?php echo asset_url();?>build/js/bootstrap-toggle.min.js"></script>
	<!-- iCheck -->
    <!-- -->
	<script src="<?php echo vendor_url();?>iCheck/icheck.min.js"></script>
	<script src="<?php echo vendor_url();?>iCheck/icheck.min.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="<?php echo asset_url();?>build/js/custom.min.js"></script>    
	
	<!-- Custom functions Scripts -->
    <script src="<?php echo asset_url();?>build/js/custom_function.js"></script>    

<!-- compose -->
<script>
  $('#compose, .compose-close').click(function(){
	$('.compose').slideToggle();
  });
/* Starts Added by Shailesh */
$(document).ready(function(){
	$('ul.side-menu').find('ul.child_menu').css('display','none');
	$('.sortable').mouseover(function(){
		if(!$(this).hasClass('text-primary') && $(this).attr('state')){
			$(this).css('color', '#337ab7');
			$(this).find('.fa').css('display','inline');
			$(this).css('cursor','pointer');
			if($(this).find('.fa').hasClass('fa-sort-alpha-desc')){
				$(this).attr('title','Sort by this column descending');	
			}
			if($(this).find('.fa').hasClass('fa-sort-alpha-asc')){
				$(this).attr('title','Sort by this column ascending');	
			}
			if($(this).find('.fa').hasClass('fa-sort-numeric-desc')){
				$(this).attr('title','Sort by this column descending');	
			}
			if($(this).find('.fa').hasClass('fa-sort-numeric-asc')){
				$(this).attr('title','Sort by this column ascending');	
			}
		}
	});
	$('.sortable').mouseout(function(){
		if(!$(this).hasClass('text-primary') && $(this).attr('state') == 'none'){
			$(this).find('.fa-sort-alpha-asc').css('display','none');
			$(this).find('.fa-sort-numeric-asc').css('display','none');
			$(this).css('color', '#fff');
		}
	});
	var order_type = '<?php echo strtolower($postdata['order_type']); ?>';
	var sort_by = '<?php echo $postdata['sort_by']; ?>';
	$('.sortable').each(function(){
		if($(this).find('.fa').hasClass('fa-sort-numeric-desc') || $(this).find('.fa').hasClass('fa-sort-numeric-asc')){
			var sort_type = 'numeric';
		}
		if($(this).find('.fa').hasClass('fa-sort-alpha-desc') || $(this).find('.fa').hasClass('fa-sort-alpha-asc')){
			var sort_type = 'alpha';
		}
		var column = $(this).attr('column');
		var state =  $(this).attr('state');
		$(this).removeClass('text-primary');
		if(column == sort_by){
			console.log('column', column);
			console.log('sort_by', sort_by);
			console.log('order_type', order_type);
			if(order_type == 'asc'){
				$(this).attr('state', 'asc');
				$(this).find('i').removeClass('fa-sort-'+sort_type+'-desc');
				$(this).find('i').addClass('fa-sort-'+sort_type+'-asc').css('display','inline');
				$(this).removeAttr('title');
				$(this).attr('title','Sort by this column descending');
			}
			if(order_type == 'desc'){
				$(this).attr('state', 'desc');
				$(this).find('i').removeClass('fa-sort-'+sort_type+'-asc');
				$(this).find('i').addClass('fa-sort-'+sort_type+'-desc').css('display','inline');
				$(this).attr('title','Sort by this column ascending');
			}
			$(this).addClass('text-primary');
			$(this).css('cursor','pointer');
		}
	});
	
	$('th.sortable').on('click', function(){
		var sort_by = $(this).attr('column');
		var state =  $(this).attr('state');
		if(state == 'none'){
			var order_type = 'ASC';
			$(this).attr('state', 'asc');
		}
		if(state == 'asc'){
			var order_type = 'DESC';
			$(this).attr('state', 'desc');
		}
		if(state == 'desc'){
			var order_type = 'ASC';
			$(this).attr('state', 'asc');
		}
		$('form#frmsearch').find('#sort_by').val(sort_by);
		$('form#frmsearch').find('#order_type').val(order_type);
		document.getElementById('frmsearch').submit();
	});
});
function viewprofile(id, url)
{
	if(id){
        var form_action_url  = url;
        $('form#frmcommon').find('#id').val(id);
        $('form#frmcommon').find('#task').val('view_only');
		$('form#frmcommon').find('#user_type').val('employee');
        $('#frmcommon').attr('action', form_action_url).submit();
        }
}
/*
setInterval(function(){
	var user_id = '<?php echo get_user_id(); ?>';
	var role_id = '<?php echo get_user_role(); ?>';
	//alert(user_id);
	return false;
	var url = '<?php echo ajax_url(); ?>/getNotification';
	$.ajax({
		url:url,
		data:{id:user_id, module:'Trainings', role_id:role_id},
		dataType: 'json',  // what to expect back from the PHP script, if anything
		cache: false,
		contentType: false,
		processData: false,
		type:"post",
		success:function(response){
			alert(response);
		}
	});

},5000);
*/
function gotopage(page_no){
	$('form#frmsearch').find('#page').val(page_no);
	document.getElementById('frmsearch').submit();
}
function sortorder(state, fld){
	alert(state);
	alert(fld);
}
function viewrecord(id, url)
{
	if(id){
        var form_action_url  = url;
        $('form#frmlist').find('#id').val(id);
        $('form#frmlist').find('#task').val('view_only');
		$('form#frmlist').find('#user_type').val('employee');
        $('form#frmlist').find('#sort_by').val($("form#frmsearch").find('#sort_by').val());
        $('form#frmlist').find('#order_type').val($("form#frmsearch").find('#order_type').val());
        $('#frmlist').attr('action', form_action_url).submit();
        }
}
function editrecord(id, url)
{
	if(id){
        var form_action_url  = url;
        $('form#frmlist').find('#id').val(id);
        $('form#frmlist').find('#task').val('add_edit');
        $('form#frmlist').find('#user_type').val('<?php echo $item; ?>');
		<?php if(isset($mode) && $mode != '' ){ ?>
        $('form#frmlist').find('#mode').val('<?php echo $mode; ?>') ;
        $('form#frmlist').find('#listpage_url').val('<?php echo $listpage_url; ?>') ;
	<?php }else{ ?>
		 $('form#frmlist').find('#mode').val('');
	<?php }?>
        $('form#frmlist').find('#search_by').val($("form#frmsearch").find('#search_by').val());
        $('form#frmlist').find('#search_for').val($("form#frmsearch").find('#search_for').val());
        $('form#frmlist').find('#sort_by').val($("form#frmsearch").find('#sort_by').val());
        $('form#frmlist').find('#order_type').val($("form#frmsearch").find('#order_type').val());
        $('#frmlist').attr('action', form_action_url).submit();
        }
}
function conf_delete(id, row_id){
	if(confirm("Are you sure to delete this Record ? ")){
		if(id){
			var form_data = new FormData();
			form_data.append('id', id);
			form_data.append('task', '<?php echo base64_encode('delete_record'); ?>');
			form_data.append('remove_from', '<?php echo base64_encode(rand(5000,9999).$request['remove_from']);?>');
			var url = '<?php echo $ajax_url_delete_item; ?>';
			$.ajax({
				url:url,
				data:form_data,
				dataType: 'text',  // what to expect back from the PHP script, if anything
				cache: false,
				contentType: false,
				processData: false,
				type:"post",
				success:function(response){
					var resp = response
					if(resp == 'success'){
						$('input#last_id').val(id);
						$('input#row_id').val(row_id);
						$('div#alert_div').fadeIn();
						$('div#success_div').fadeOut();
						$("tr#"+row_id).css('display','none');
					}
				}
			});
		}
	}
}
function undo_last_action(){
	var id = $('input#last_id').val();
	if(id){
		var form_data = new FormData();
		form_data.append('id', id);
		form_data.append('task', '<?php echo base64_encode('undo_record'); ?>');
		form_data.append('undo_from', '<?php echo base64_encode(rand(5000,9999).$request['remove_from']);?>');
		var url = '<?php echo $request['ajax_url_undo_item']; ?>';
		$.ajax({
			url:url,
			data:form_data,
			dataType: 'text',  // what to expect back from the PHP script, if anything
			cache: false,
			contentType: false,
			processData: false,
			type:"post",
			success:function(response){
				var resp = response
				if(resp == 'success'){
					var row_id = $('input#row_id').val();
					$('input#last_id').val(id);
					$('div#alert_div').fadeOut();
					$('div#success_div').fadeIn();
					$("tr#"+row_id).css('display','');
				}
			}
		});
	}
	
}
function closeDiv(flag){
	if(flag == 0){
		var div_id = 'alert_div';
	}
	if(flag == 1){
		var div_id = 'success_div';
	}
	$('div#'+div_id).css('display','none');
}
$(document).ready(function() {
	if(document.getElementById('frmsearch')){
		$('#frmsearch').bootstrapValidator();
	}
});
function deleterecord(id, tr_id){
    if(confirm('Are you sure to delete this record ?')){
        var url =  '<?php echo $ajax_url; ?>deleteRecord';
        $.post(url,{id : id, entity:'employee'}, function(result){
            var obj = $.parseJSON(result);
            if(obj.status == 'success'){
                $("tr#"+tr_id).remove();
            }
        });   
    }
}
function changeview(view_type)
{
        $('form#frmlist').find('#id').val(id);
        $('form#frmlist').find('#task').val('add_edit');
        $('form#frmlist').find('#user_type').val('<?php echo $item; ?>');
		<?php if(isset($mode) && $mode != '' ){ ?>
        $('form#frmlist').find('#mode').val('<?php echo $mode; ?>') ;
	<?php }else{ ?>
		 $('form#frmlist').find('#mode').val('');
	<?php }?>
        $('form#frmlist').find('#search_by').val($("form#frmsearch").find('#search_by').val());
        $('form#frmlist').find('#search_for').val($("form#frmsearch").find('#search_for').val());
        $('form#frmlist').find('#sort_by').val($("form#frmsearch").find('#sort_by').val());
        $('form#frmlist').find('#order_type').val($("form#frmsearch").find('#order_type').val());
        $('form#frmlist').find('#view_type').val(view_type);
        $('#frmlist').submit();
}
function gotolist(url, cta)
{
	var form_action_url  = url;
	$('form#frmboard').find('#call_action').val(cta);
	$('#frmboard').attr('action', form_action_url).submit();
}
/*/ Added by Shailesh*/
if(!document.getElementById('frmboard')){
$(document).ready(function(){
	$('body').append('<form id="frmboard"></form>');
	$('#frmboard').attr('method','post').append('<input type="hidden" name="call_action" id="call_action" value="" />');
});
}
$(document).ready(function() {
	var search_by = '<?php if(isset($postdata['search_by'])) echo $postdata['search_by'];else echo ''; ?>';
	show_hide(search_by);
	$('select#search_by').on('change', function(){
		 show_hide(this.value);
	});
	$('#frmsearch').bootstrapValidator();

});
function show_hide(search_by){
	$('#search_for_text').val('');
	var show = false;
	if(search_by.indexOf('.status') !== -1 || search_by.indexOf('status') !== -1){
		var show = true;	
	}

	if(show === true){
		$('#search_for_text').css('display','none');
		$('#search_for_text').prop('disabled',true);
		$('#search_for_status').prop('disabled',false);
		$('#search_for_status').css('display','inline');
	}
	if(show === false){
		$('#search_for_text').css('display','inline');
		$('#search_for_text').prop('disabled',false);
		$('#search_for_status').prop('disabled',true);
		$('#search_for_status').css('display','none');
		show_hide_dates(search_by);
	}
}
function show_hide_dates(search_by){
		//$('div#div_search_for').find('#search_for_text').val('');
		if(search_by == 'leave_applications.leave_date'){
			$('div#div_dates').css('display','block');
			$('#lbl_search_for').css('display','none');
			$('div#div_search_for').find('#search_for_text').css('display','none');
			$('div#div_search_for').find('#search_for_text').prop('disabled',true);
			$('div#div_dates').find('#search_from_date').css('display','inline');
			$('div#div_dates').find('#search_from_date').prop('disabled',false);
			$('div#div_dates').find('#search_to_date').css('display','inline');
			$('div#div_dates').find('#search_to_date').prop('disabled',false);
			$('div#div_dates').find('.fa-calendar ').css('display','inline');
	}
	if(search_by !== 'leave_applications.leave_date'){
		$('div#div_dates').css('display','none');
		$('#lbl_search_for').css('display','inline');
		$('div#div_search_for').find('#search_for_text').css('display','inline');
		$('div#div_search_for').find('#search_for_text').prop('disabled',false);
		$('div#div_dates').find('#search_from_date').css('display','none');
		$('div#div_dates').find('#search_from_date').prop('disabled',true);
		$('div#div_dates').find('#search_to_date').css('display','none');
		$('div#div_dates').find('#search_to_date').prop('disabled',true);
		$('div#div_dates').find('.fa-calendar ').css('display','none');
	}
	//show_hide_dropdown(search_by);
}
</script>
    <!-- /compose -->
<link href="<?php echo vendor_url(); ?>/select2/dist/css/select2.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
<script src="<?php echo vendor_url(); ?>/select2/dist/js/select2.js"></script>
<script src="<?php echo asset_url(); ?>build/js/fastclick/fastclick.js"></script>
<script src="<?php echo asset_url(); ?>build/js/dropzone/dropzone.js"></script>	
</body>
</html>