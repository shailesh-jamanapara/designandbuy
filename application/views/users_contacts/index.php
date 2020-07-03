<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
/*
* 12-20-2016
* dashboard_view page(view)
*/


?>
<!-- page content -->
	<div class="right_col" role="main">
	  <div class="">
		<div class="clearfix"></div>       
		<div class="row">
		  <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			  <div class="x_title">
				<h2>List of Employee`s Contacts</h2>
				<?php if(isset($roles_accesses)){
					echo $roles_accesses['add_button'];
				}
				 ?>
				<div class="clearfix"></div>
			  </div>
			  <div class="x_content">
			  <form class="form-horizontal" name="frmsearch" id="frmsearch" method="post" action="" >
					<?php  echo print_search_form($search, $postdata, $listpage_url); ?>
				<table class="table table-striped jambo_table bulk_action" >
					<thead class="headings">
					<tr>
					   <th class="sorting column-title  col-lg-1" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Sr. No.</th>
						  <th class="column-title  col-lg-2  sortable"  column="users.username" state="none">Employee Code <i class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-2 text-primary sortable" column="users.first_name" state="none"  >Employee Name <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-2 sortable" column="users.middle_name" state="none"  >Middle Name <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-1 sortable" column="users.last_name" state="none"  >Last Name <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-1 sortable" column="users_contacts.phone_no" state="none"  >Phone No. <i   class="fa fa-sort-numeric-asc"> </i></th>
						  <th class="column-title col-lg-1 sortable" column="users_contacts.mobile_1" state="none"  >Mobile 1  <i   class="fa fa-sort-numeric-asc"> </i></th>
						  <th class="column-title col-lg-1 sortable" column="users_contacts.mobile_2" state="none"  >Mobile 2  <i   class="fa fa-sort-numeric-asc"> </i></th>
				     </tr>
				  </thead>
					   <tbody>
							<?php  if(!empty($rows)) :  $i = ($postdata['page'] > 1) ? (($postdata['page']-1) * $postdata['limit'] ) + 1 : 1; foreach($rows as $row) :  $id = base64_encode($row['id']); ?>
							<tr  id="tr_<?php echo $row['id']; ?>">
							  <td ><?php echo  $i;  ?></td>
							  <td><?php echo  $row['username']; ?></td>
							  <td><?php echo  $row['title'] ." " . ucfirst(strtolower($row['first_name'])); ?></td>
							  <td><?php echo  ucfirst(strtolower($row['middle_name']));  ?></td>
							  <td><?php echo  ucfirst(strtolower($row['last_name'])); ?></td>
							  <td><?php echo  $row['phone_no'];  ?></td>
							  <td><?php echo  $row['mobile_1'];  ?></td>
							  <td><?php echo  $row['mobile_2'];  ?></td>
							 </tr>
							<?php  $i++; endforeach; endif; ?>
							<?php  if(empty($rows)) : ?> <td colspan="9" > No records found </td> <?php endif; ?>
						<tbody>
					</table>
				<?php if(count($rows) > 0) { echo print_pagination($total_records, $total_pages, $postdata['page'], $postdata['limit']); } ?>
				</form>
			</div>
		  </div>
		  
		</div>
	  </div>
	</div>
<form name="frmlist" id="frmlist" method="post" action="">
    <input type="hidden" name="task" id="task" value="" />
    <input type="hidden" name="user_type" id="user_type" value="" />
    <input type="hidden" name="id" id="id" value="" />
    <input type="hidden" name="sort_by" id="sort_by" value="" />
    <input type="hidden" name="order_type" id="order_type" value="" />
    <input type="hidden" name="listpage_url" id="listpage_url" value="<?php echo $listpage_url; ?>" />
</form>	
<!-- /page content -->
<script>
function viewrecord(id, url)
{
	if(id){
        var form_action_url  = url;
        $('form#frmlist').find('#id').val(id);
        $('form#frmlist').find('#task').val('view_only');
		 $('form#frmlist').find('#user_type').val('employee');
        $('#frmlist').attr('action', form_action_url).submit();
        }
}
$(document).ready(function() {
	$('#frmsearch').bootstrapValidator();
});
 </script>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>