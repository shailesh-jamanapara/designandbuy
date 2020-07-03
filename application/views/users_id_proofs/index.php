<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- page content -->
	<div class="right_col" role="main">
	  <div class="">
		<div class="clearfix"></div>       
		<div class="row">
		  <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			  <div class="x_title">
				<h2>List of Employee`s ID Proofs</h2>
				<div class="clearfix"></div>
			  </div>
			  <div class="x_content">
			  <form class="form-horizontal" name="frmsearch" id="frmsearch" method="post" action="" >
				<?php  echo print_search_form($search, $postdata, $listpage_url); ?>
					<table class="table table-striped jambo_table bulk_action" >
						<thead class="headings">
							<tr>
							<th class="sorting column-title  col-lg-1" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Sr. No.</th>
							<th class="column-title col-lg-2 sortable" column="users.username" state="none"  >Employee Code <i   class="fa fa-sort-alpha-asc"> </i></th>
							<th class="column-title col-lg-2 text-primary sortable" column="users.first_name" state="none"  >Employee Name <i   class="fa fa-sort-alpha-asc"> </i></th>
							<th class="column-title col-lg-2 sortable" column="users.middle_name" state="none"  >Middle Name <i   class="fa fa-sort-alpha-asc"> </i></th>
							<th class="column-title col-lg-1 sortable" column="users.last_name" state="none"  >Last Name <i   class="fa fa-sort-alpha-asc"> </i></th>
							<th class="column-title col-lg-2 sortable" column="users_id_proofs.aadhar_name" state="none"  >Aadhar Name  <i   class="fa fa-sort-alpha-asc"> </i></th>
							<th class="column-title col-lg-1 sortable" column="users_id_proofs.aadhar_no" state="none"  >Aadhar No.  <i   class="fa fa-sort-alpha-asc"> </i></th>
							<th class="column-title col-lg-1 sortable" column="users_id_proofs.pan" state="none"  >PAN <i   class="fa fa-sort-alpha-asc"> </i></th>							</tr>
						</thead>
						<tbody>
							<?php  if(!empty($rows)) :  $i = ($postdata['page'] > 1) ? (($postdata['page']-1) * $postdata['limit'] ) + 1 : 1; foreach($rows as $row) : ?>
							<tr>
							<td><?php echo  $i; ?></th>
							<td><?php echo  ucfirst(strtolower($row['username'])); ?></td>
							<td><?php echo  ucfirst(strtolower($row['first_name'])); ?></td>
							<td><?php echo  ucfirst(strtolower($row['middle_name'])); ?></td>
							<td><?php echo  ucfirst(strtolower($row['last_name'])); ?></td>
							<td><?php if(isset($row['aadhar_name'])) echo  ucfirst($row['aadhar_name']); else echo "Not Available ";  ?></td>
							<td><?php if(isset($row['aadhar_no']) && $row['aadhar_no'] != '') echo  $row['aadhar_no']; else echo "Not Available ";  ?></td>
							<td><?php if(isset($row['pan'])) echo  ucfirst($row['pan']); else echo "Not Available ";  ?></td>
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
<!-- /page content -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>