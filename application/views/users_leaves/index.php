<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
/*
* 12-20-2016
* dashboard_view page(view)
*/


?>

<style>
.btn-primary{
height: 33px ;
margin-top: 22px ;
padding-top: 3px;
}
.edit_link{
    cursor:pointer;
}
tr td:last-child {
    text-align:center;
}
a.clear.clear_date {
    margin-top: 22px;
}
@media (max-width: 500px) {
	a.clear.clear_date {
		margin-top: 28px;
	}
}

</style>
<!-- page content -->
<form class="form-horizontal" name="frmlist" id="frmlist" method="post" action="" >
    <input type="hidden" name="task" id="task" value="" />
    <input type="hidden" name="id" id="id" value="" />
    <input type="hidden" name="sort_by" id="sort_by" value="" />
    <input type="hidden" name="order_type" id="order_type" value="" />
	<input type="hidden" name="search_by" id="search_by" value="" />
    <input type="hidden" name="search_for" id="search_for" value="" />
</form>
<form class="form-horizontal" name="frmsearch" id="frmsearch" method="post" action="" >	
	<div class="right_col" role="main">
	  <div class="">
		<div class="page-title">
		  <div class="title_left">
			<!--<h2>BimSym eBusiness Solutions</h2>-->
		  </div>		  
		</div>

		<div class="clearfix"></div>       
		<div class="row">
		  <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			  <div class="x_title">
				<h2>List of <?php echo $items; ?></h2>
				<?php echo $roles_accesses['add_button']; ?>
			  </div>
			  <div class="x_content">
				<?php  echo print_search_form($search, $postdata); ?>
				<table class="table table-striped jambo_table bulk_action" id="datatable_emp_list" >
				  <thead>
					<tr>
					  <th scope="col">Sr. No.</th>
					  <th scope="col">Employee Name</th>
					  <th scope="col">Middle Name</th>
					  <th scope="col">Last Name</th>
					  <th scope="col">Document </th>
					  <th scope="col">Date </th>
					  <th scope="col">Action</th>
					 </tr>
				  </thead>
				  <tbody>
				  <?php 
					 if(count($rows) > 0){
						 $i = 1;
						 $user_id = 0;
						 foreach($rows as $row) {
						 $id = base64_encode($row['id']);
						 $cls = (($i % 2) == true)?'odd':'even';
						 
						  ?>
						<tr id="tr_<?php echo $id;?>" class="<?php echo $cls; ?>">
						  <td><?php if($user_id !=  $row['user_id'] ){ echo  $i; } else {echo "&nbsp;"; } ?></td>
						  <td><?php if($user_id !=  $row['user_id'] ){ echo  $row['first_name']; } else {echo "&nbsp;"; } ?></td>
						  <td><?php if($user_id !=  $row['user_id'] ){ echo  $row['middle_name']; } else {echo "&nbsp;"; } ?></td>
						  <td><?php if($user_id !=  $row['user_id'] ){ echo  $row['last_name']; } else {echo "&nbsp;"; }?></td>
						  <td><?php echo  $row['document_name'];  ?></td>
						  <td><?php echo  $row['updated_on'];  ?></td>
						  <td> 
							<a herf="javascript:void(0);" class="edit_link" onclick="javascript:toggle_modal('<?php echo $id; ?>');" >
								<button type="button" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> Detail</button>
							</a>
							</td>
						 </tr>
						<?php
						  $i++;
						  $user_id = $row['user_id'];
						} 
					}else{
							echo '<td colspan="5"> No record found </td>';
					} ?>
				  </tbody>
				</table>
				</div>
			</div>
		  </div>
		  
		</div>
	  </div>
	</div>
</form>

<!-- Modal for Assign Role  -->
<div class="modal" tabindex="-1" role="dialog" id="modal_assignrole">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Educational Qualifications of <?php echo $row['first_name'] . " " . $row['first_name']   ." " . $row['last_name'] ;?> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		
	 </form>
    </div>
  </div>
</div>

<!-- /page content -->
<script>
function editrecord(id, url)
{
	if(id){
        var form_action_url  = url;
        $('form#frmlist').find('#id').val(id);
        $('form#frmlist').find('#task').val('add_edit');
        $('form#frmlist').find('#search_by').val($("form#frmsearch").find('#search_by').val());
        $('form#frmlist').find('#search_for').val($("form#frmsearch").find('#search_for').val());
        $('form#frmlist').find('#sort_by').val($("form#frmsearch").find('#sort_by').val());
        $('form#frmlist').find('#order_type').val($("form#frmsearch").find('#order_type').val());
        $('#frmlist').attr('action', form_action_url).submit();
        }
}
function conf_delete(id){
	if(confirm("Are you sure to delete this Record ? ")){
		if(id){
			var form_data = new FormData();
			form_data.append('id', id);
			form_data.append('task', 'delete_record');
			form_data.append('entity', '<?php echo strtolower($items); ?>');
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
					var resp = response.replace(/(\r\n\t|\n|\r\t)/gm, "");
					if(resp == 'success'){
						$("tr#tr_"+id).remove();
					}
				}
			});
			$.post(url, form_data, function(result) {
				console.log(result);
			});
		}
	}
}
$(document).ready(function() {
	$('#frmsearch').bootstrapValidator();
});
function toggle_modal(){
	$("#modal_qualification").modal('toggle');
}
 </script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>