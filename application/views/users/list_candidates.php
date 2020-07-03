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
				<h2>List of Candidates</h2>
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
						  <th class="column-title col-lg-2 text-primary sortable" column="users.first_name" state="none"  >Candidate Name <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-2 sortable" column="users.middle_name" state="none"  >Middle Name <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-1 sortable" column="users.last_name" state="none"  >Last Name <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-2 sortable" column="positions.position_name" state="none"  >Applied For <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-1 sortable" column="users_contacts.phone_no" datatype="int" state="none"  >Mobile No. <i   class="fa fa-sort-numeric-asc"> </i></th>
						  <th class="column-title col-lg-1 sortable" column="cities.city_name" state="none"  >City <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-1 sortable" column="states.state_name" state="none"  >State <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-1 sortable" column="users.active_status" state="none" >Status <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-1" >Action</th>
                     </tr>
				  </thead>
				  <tbody>
							<?php  if(!empty($rows)) :  $i = ($postdata['page'] > 1) ? (($postdata['page']-1) * $postdata['limit'] ) + 1 : 1; foreach($rows as $row) :  $id = base64_encode($row['id']); ?>
							<tr id="tr_<?php echo $row['id']; ?>">
							  <td ><?php echo  $i;  ?></td>
							  <td><?php echo  $row['username']; ?></td>
							  <td><?php echo  $row['title'] ." " . ucfirst(strtolower($row['first_name'])); ?></td>
							  <td><?php echo  ucfirst(strtolower($row['middle_name']));  ?></td>
							  <td><?php echo  ucfirst(strtolower($row['last_name'])); ?></td>
							  <td><?php echo  ucfirst(strtolower($row['position_name'])); ?></td>
							  <td><?php echo  $cities[$row['city_id']], ' '. $cities[$row['city_id']]. ', '.$states[$row['state_id']]; ?></td>
							 <td><?php echo  $states[$row['state_id']], ' '. $cities[$row['city_id']]. ', '.$states[$row['state_id']]; ?></td>
							 <td><?php if($row['active_status'] == 1) echo "Active"; else echo "inactive"; ?></td>
							 <td> 
								<a herf="javascript:void(0);" class="edit_link" onclick="javascript:viewrecord('<?php echo $id; ?>','<?php echo $view_employee_url; ?>');" >
									<button type="button" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> Detail</button>
								</a> 
							</td>
							</tr>
							<?php $i++; endforeach; endif; ?>
							<?php  if(empty($rows)) : ?> <td colspan="9" > No records found </td> <?php endif; ?>
						<tbody>
					</table>
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