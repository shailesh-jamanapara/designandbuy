<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- page content -->
	<div class="right_col" role="main">
	  <div class="">
		<div class="clearfix"></div>       
		<div class="row">
		  <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			    <div class="x_title">
				<h2>List of <?php echo $items; ?></h2>
				<a class="pull-right" href="<?php echo base_url();?>index.php/Setups/index/all" ><button type="button" class="btn btn-primary"> Go Back</button></a>
				<?php if(isset($roles_accesses))echo $roles_accesses['add_button']; ?>
				<div class="clearfix"></div>
			  </div>
			  <div class="x_content">
			  <form class="form-horizontal" name="frmsearch" id="frmsearch" method="post" action="" autocomplete="off">
					<?php  echo print_search_form($search, $postdata, $listpage_url); ?>
				<table class="table table-striped jambo_table bulk_action" >
					<thead class="headings">
					<tr>
						<th class="sorting column-title  col-lg-1" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Sr. No.</th>
						<th class="column-title col-lg-2 text-primary sortable" column="users.first_name" state="none"  >Employee Name <i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-2 sortable" column="users.middle_name" state="none"  >Middle Name <i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-2 sortable" column="users.last_name" state="none"  >Last Name <i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-3 text-primary sortable" column="expense_types.expense_type_name" state="none"  >Leave Type<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-3 sortable" column="expenses.expense_value_type" state="none"  >Leave Date<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-1 sortable" column="expenses.status" state="none" >Status<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-1 " >Action</th>
					</tr>
				  </thead>
					<tbody>
						<?php  if(!empty($rows)) :  $i = ($postdata['page'] > 1) ? (($postdata['page']-1) * $postdata['limit'] ) + 1 : 1; foreach($rows as $row) :  $id = base64_encode($row['id']); $status = ( $row['status'] == 1) ?"Active":"Inactive";  ?>
						<?php $from_to = ($row['leave_from'] == $row['leave_to']) ? date('M d, Y', strtotime($row['leave_from'])) : date('M d, Y', strtotime($row['leave_from']))." To ".date('M d, Y', strtotime($row['leave_to'])); ?>
						<tr  id="tr_<?php echo $row['id']; ?>">
							<td><?php echo  $i; ?></th>
							<td><?php echo  $row['first_name']; ?></td>
							<td><?php echo  $row['middle_name']; ?></td>
							<td><?php echo  $row['last_name']; ?></td>
							<td><?php echo  $row['leave_type_name']. " [ ".$row['short_code']." ] ";  ?></td>
							<td><?php echo $from_to; ?></td>
							<td><?php echo $leave_statuses[$row['status']]; ?></td>
							<td ><a herf="javascript:void(0);" class="edit_link" onclick="javascript:editrecord('<?php echo $id; ?>','<?= $edit_url ?>');" ><i class="fa fa-pencil-square-o" title="Edit"> </i> </a> 
								<i title="View reason for this leave" class="fa fa-eye" onclick="new PNotify({
                                  title: 'Reason for leave',
                                  text: '<?php if(isset( $row['leave_reason']) &&  $row['leave_reason'] != '' ) echo  $row['leave_reason']; else echo 'No reason specified'; ?>',
                                  type: 'info',
                                  hide: true,
                                  styling: 'bootstrap3'
                              });"></i>
							</td>
						</tr>
						<?php  $i++; endforeach; endif; ?>
						<?php  if(empty($rows)) : ?> <td colspan="4" > No record found </td> <?php endif; ?>
					<tbody>
					</table>
				<?php if(count($rows) > 0) { echo print_pagination($total_records, $total_pages, $postdata['page'], $postdata['limit']); } ?>
				</form>
			</div>
		  </div>
		</div>
	  </div>
	</div>
<script>
$(document).ready(function() {
	$('#frmsearch').attr('action','<?php echo $listpage_url;?>');
	$('#frmsearch').bootstrapValidator();
});


</script>	
 <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
  <link href="<?php echo vendor_url(); ?>/pnotify/dist/pnotify.css" rel="stylesheet">
  <link href="<?php echo vendor_url(); ?>/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
  <link href="<?php echo vendor_url(); ?>/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
<script src="<?php echo vendor_url(); ?>/select2/dist/js/select2.js"></script>
<script src="<?php echo vendor_url(); ?>/pnotify/dist/pnotify.js"></script>
<script src="<?php echo vendor_url(); ?>/pnotify/dist/pnotify.buttons.js"></script>
<script src="<?php echo vendor_url(); ?>/pnotify/dist/pnotify.nonblock.js"></script>