<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- page content -->
	<div class="right_col" role="main">
	  <div class="">
		<div class="clearfix"></div>       
		<div class="row">
		  <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			    <div class="x_title">
				<h2>List of Employee's Bank</h2>
				<a class="pull-right" href="<?php echo base_url();?>index.php/Setups/index/all" ><button type="button" class="btn btn-primary"> Go Back</button></a>
				<a style="" href="javascript:void(0);" onclick="javascript:editrecord('<?php echo $model['new']; ?>','<?= $edit_url ?>');"><button type="button" class="btn btn-primary">  Add New  Bank Account</button></a>
				<div class="clearfix"></div>
			  </div>
			  <div class="x_content">
			  <form class="form-horizontal" name="frmsearch" id="frmsearch" method="post" action="" >
					<?php  echo print_search_form($search, $postdata, $listpage_url); ?>
				<table class="table table-striped jambo_table bulk_action" >
					<thead class="headings">
					<tr>
						<th class="sorting column-title  col-lg-1" tabindex="0" >Sr. No.</th>
						<th class="column-title col-lg-2 text-primary sortable" column="users.username" state="asc"  >Employee Code<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-2 sortable" column="users.first_name" state="none"  >Employee Name<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-2 sortable" column="users.middle_name" state="none"  >Middle Name<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-2 sortable" column="users.last_name" state="none"  >Last Name<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-2 sortable" column="users_banks.account_no" state="none"  >Account No.<i   class="fa fa-sort-numeric-asc"> </i></th>
						<th class="column-title col-lg-2 sortable" column="users_banks.users_bank_name" state="none"  >Bank Name.<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-1 sortable" column="users_banks.bank_ifsc" state="none"  >IFSC Code<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-2 sortable" column="users_banks.branch_name" state="none"  >Branch Name<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-1 sortable" column="openings.status" state="none" >Status<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-1 " >Action</th>
					</tr>
				  </thead>
					<tbody>
						<?php  if(!empty($rows)) :  $i = ($postdata['page'] > 1) ? (($postdata['page']-1) * $postdata['limit'] ) + 1 : 1; foreach($rows as $row) :  $id = base64_encode($row['id']); $status = ( $row['status'] == 1) ?"Active":"Inactive"; $row_id= rand(5000, 9000 ); ?>
						<tr id="<?php echo $row_id; ?>">
						<td><?php echo  $i; ?></th>
						<td><?php echo  $row['username'];  ?></td>
						<td><?php echo  $row['first_name'];  ?></td>
						<td><?php echo  $row['middle_name'];  ?></td>
						<td><?php echo  $row['last_name'];  ?></td>
						<td><?php echo  $row['account_no'];  ?></td>
						<td><?php echo  $row['users_bank_name'];  ?></td>
						<td><?php echo  $row['bank_ifsc'];  ?></td>
						<td><?php echo  $row['branch_name'];  ?></td>
						<td><?php echo $status; ?></td>
						<td> <a herf="javascript:void(0);" class="edit_link" onclick="javascript:editrecord('<?php echo $id; ?>','<?= $edit_url ?>');" ><i class="fa fa-pencil-square-o text-success" title="Edit"> </i> </a>
								<a herf="javascript:void(0);" class="edit_link" onclick="javascript:conf_delete('<?php echo $id; ?>','<?php echo $row_id; ?>');" ><i class="fa fa-trash text-warning " title="Delete This Item"> </i> </a>
							</td>
						</tr>
						<?php  $i++; endforeach; endif; ?>
						<?php  if(empty($rows)) : ?> <td colspan="11" class="text-center"> No record found </td> <?php endif; ?>
					<tbody>
					</table>
				<?php if(count($rows) > 0) { echo print_pagination($total_records, $total_pages, $postdata['page'], $postdata['limit']); } ?>
				</form>
			</div>
		  </div>
		</div>
	  </div>
	</div>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>