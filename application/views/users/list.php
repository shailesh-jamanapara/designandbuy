<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- page content -->
	<div class="right_col" role="main">
	  <div class="">
		<div class="clearfix"></div>       
		<div class="row">
		  <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			  <div class="x_title">
				<h2>List of Employees</h2>
				
				<?php if(isset($roles_accesses))echo $roles_accesses['add_button']; ?>
				<a class="pull-right" href="javascript:void(0);" onclick="javascript:changeview('list');" ><button title="List view" type="button" class="btn btn-success view_type <?php if($postdata['view_type'] == 'list') echo "active";?>"><i class="fa fa-list"></i></button></a> 
				<a class="pull-right" href="javascript:void(0);" onclick="javascript:changeview('grid');" ><button title="Grid view" type="button" class="btn btn-success view_type <?php if($postdata['view_type'] == 'grid') echo "active";?>"><i class="fa fa-th"></i></button></a> 
				<div class="clearfix"></div>
			  </div>
			  <div class="x_content">
			  <form class="form-horizontal" name="frmsearch" id="frmsearch" method="post" action="" >
				<?php  echo print_search_form($search, $postdata, $listpage_url); ?>
				<?php if($postdata['view_type'] == 'grid') :?>
				<?php  if(!empty($rows)) :  $i = ($postdata['page'] > 1) ? (($postdata['page']-1) * $postdata['limit'] ) + 1 : 1; foreach($rows as $row) :  $id = base64_encode($row['id']); ?>
						
						<div class="col-lg-4">
						<div class="profile_details">
						<div class="well profile_view">
						  <div class="col-sm-12 profile_data">
							<h4 class="brief"><i><?php echo  $row['position_name']; ?></i> </h4>
							<div class="left col-xs-7">
							  <h2><?php echo  ucwords(strtolower($row['first_name'])). " " . ucwords(strtolower($row['last_name'])); ?></h2>
							  <p><i class="fa fa-suitcase"></i> <?php echo  ucwords(strtolower($row['department_name']));  ?> - <small><?php echo $row['user_role']; ?></small></p>
							  <ul class="list-unstyled">
								<li><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo $row['username']; ?></li>
								<li><i class="fa fa-envelope"></i>&nbsp;<?php echo $row['official_email']; ?></li>
								<li><i class="fa fa-phone"></i>&nbsp;<?php echo $row['phone_no']; ?></li>
							  </ul>
							</div>
							<div class="right col-xs-5 text-center">
							  <img src="<?php echo base_url(); ?><?php echo $row['avatar']; ?>" alt="" class="img-circle img-responsive">
							</div>
						  </div>
						<div class="col-xs-12 bottom text-center">
						<!--
							<div class="col-xs-12 col-sm-6 emphasis">
							  <div class="sidebar-widget">
								  <h4>Highest Performance</h4>
								  <canvas width="150" height="80" id="gauge_<?php echo $row['id']; ?>" class="" style="width: 160px; height: 100px;"></canvas>
								  <div class="goal-wrapper">
									<span class="gauge-value pull-left">No.</span>
									<span id="gauge-text" class="gauge-value pull-left">5 Tickets</span>
									<span id="goal-text" class="goal-value pull-right">25 Tickets</span>
								  </div>
								</div>
							</div>
							 -->
							<div class="col-xs-12 col-sm-6 emphasis">
							  <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
								</i> <i class="fa fa-comments-o"></i> </button>
							  <a href="javascript:void(0);" class="edit_link" onclick="javascript:viewrecord('<?php echo $id; ?>','<?php echo $view_employee_url; ?>');" ><button type="button" class="btn btn-primary btn-xs">
								<i class="fa fa-user"> </i> View Profile
							  </button></a>
							</div>
						  </div>
						</div>
						</div>
						</div>
				<?php  $i++; endforeach; endif; ?>	
				<?php endif;?>
				<?php if($postdata['view_type'] == 'list') :?>
				<table class="table table-striped jambo_table bulk_action" >
					<thead class="headings">
					<tr>
					   <th class="sorting column-title  col-lg-1" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Sr. No.</th>
						  <th class="column-title  col-lg-2  sortable"  column="users.username" state="none">Employee Code <i class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-2 text-primary sortable" column="users.first_name" state="none"  >Employee Name <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-2 sortable" column="users.middle_name" state="none"  >Middle Name <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-2 sortable" column="users.last_name" state="none"  >Last Name <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-2 sortable" column="positions.position_name" state="none"  >Position <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-2 sortable" column="departments.department_name" state="none"  >Department <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-1 sortable" column="users.active_status" state="none" >Status <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-1" >Action</th>
                     </tr>
				  </thead>
				  <tbody>
							<?php  if(!empty($rows)) :  $i = ($postdata['page'] > 1) ? (($postdata['page']-1) * $postdata['limit'] ) + 1 : 1; foreach($rows as $row) :  $id = base64_encode($row['id']); ?>
							<tr id="tr_<?php echo $row['id']; ?>">
							  <td ><?php echo  $i;  ?></td>
							  <td><?php echo  $row['username']; ?></td>
							  <td><?php echo  $row['title'] ." " . ucwords(strtolower($row['first_name'])); ?></td>
							  <td><?php echo  ucwords(strtolower($row['middle_name']));  ?></td>
							  <td><?php echo  ucwords(strtolower($row['last_name'])); ?></td>
							  <td><?php echo  $row['position_name']; ?></td>
							  <td><?php echo  $row['department_name'];  ?></td>
							  <td><?php if($row['active_status'] == 1) echo "Active"; else echo "inactive"; ?></td>
							  <td > 
								<a href="javascript:void(0);" class="edit_link" onclick="javascript:viewrecord('<?php echo $id; ?>','<?php echo $view_employee_url; ?>');" > <button type="button" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> Detail</button></a> 
								<!-- <a herf="javascript:void(0);" title="Delete this record" class="edit_link" onclick="javascript:deleterecord('<?php echo $id; ?>','tr_<?php echo $row['id']; ?>');" ><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </button></a>  -->
							  </td>
							</tr>
							<?php $i++; endforeach; endif; ?>
							<?php  if(empty($rows)) : ?> <td colspan="9" > No records found </td> <?php endif; ?>
						<tbody>
					</table>
				<?php endif;?>	
				</form>
			</div>
		  </div>
		  <?php if(count($rows) > 0) { echo print_pagination($total_records, $total_pages, $postdata['page'], $postdata['limit']); } ?>
		</div>
	  </div>
	</div>
<!-- /page content -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
