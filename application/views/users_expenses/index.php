<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- page content -->
	<div class="right_col" role="main">
	  <div class="">
		<div class="clearfix"></div>       
		<div class="row">
		  <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			  <div class="x_title">
				<h2>List of Employee's Earnings & Benefits</h2>
				<a class="pull-right" href="<?php echo base_url();?>index.php/Setups/index/all" ><button type="button" class="btn btn-primary"> Go Back</button></a>
				<a style="" href="javascript:void(0);" onclick="javascript:editrecord('<?php echo $model['new']; ?>','<?= $edit_url ?>');"><button type="button" class="btn btn-primary">  Add New Employee's Earning or Benefit</button></a>
				<div class="clearfix"></div>
				<?php  //echo $roles_accesses['add_button']; ?>
			  </div>
			  <div class="x_content">
			  <form class="form-horizontal" name="frmsearch" id="frmsearch" method="post" action="" >
					<?php  echo print_search_form($search, $postdata, $listpage_url); ?>
					<!-- 
				<table class="table table-striped jambo_table bulk_action" >
					<thead class="headings">
					<tr>
					   <th class="sorting column-title  col-lg-1" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Sr. No.</th>
						  <th class="column-title  col-lg-1  sortable"  column="users.username" state="none"> Employee Code <i class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-2 text-primary sortable" column="users.first_name" state="none"  > Employee Name <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-2 sortable" column="users.middle_name" state="none"  > Middle Name <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-1 sortable" column="users.last_name" state="none"  > Last Name <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-2 sortable" column="users_expenses.expense_type_id" state="none"  > Earning / Benefit <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-2 sortable" column="expenses.expense_name" state="none"  > Detail   <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-1 sortable" column="users_expenses.expense_value" state="none"  > Value <i   class="fa fa-sort-numeric-asc"> </i></th>
						  <th class="column-title col-lg-1 "  > Action <i   class="fa fa-sort-numeric-asc"> </i></th>
				  </thead>
				 <tbody>
				 <tbody>
						<?php  if(!empty($rows)) :  $i = ($postdata['page'] > 1) ? (($postdata['page']-1) * $postdata['limit'] ) + 1 : 1; $user_id = 0; $show_total = 0; $tot = 0;  foreach($rows as $row) :  $id = base64_encode($row['id']);  ?>
						<tr  id="tr_<?php echo $row['id']; ?>" class="">
							<td><?php if($user_id !=  $row['user_id'] ){ echo   $i; } else {echo "&nbsp;"; } ?></td>
							<td><?php if($user_id !=  $row['user_id'] ){ echo  ucfirst(strtolower($row['username'])); } else {echo "&nbsp;"; } ?></td>
							<td><?php if($user_id !=  $row['user_id'] ){ echo  ucfirst(strtolower($row['first_name'])); } else {echo "&nbsp;"; } ?></td>
							<td><?php if($user_id !=  $row['user_id'] ){ echo  ucfirst(strtolower($row['middle_name'])); } else {echo "&nbsp;"; } ?></td>
							<td><?php if($user_id !=  $row['user_id'] ){ echo  ucfirst(strtolower($row['last_name'])); } else {echo "&nbsp;"; } ?></td>
							<td><?php echo  $row['expense_type_id']; ?></td>
							<td><?php echo  implode(' ', $row_expenses[$row['expense_id']]); ?></td>
							<td><?php echo  "INR ".$row['expense_value']; ?></td>
							<td><?php if($user_id !=  $row['user_id'] ){  ?><a href="javascript:void(0);" class="edit_link" onclick="javascript:editrecord('<?php echo base64_encode($row['user_id']); ?>','<?= $edit_url ?>');" ><i class="fa fa-pencil-square-o" title="Edit"> </i> </a> 
							<?php } ?></td>
							
						 </tr>
						
						<?php  	if($user_id !=  $row['user_id'] ){ 
							$i++; $tot = $tot+$row['expense_value'];
						}
						$user_id = $row['user_id'];endforeach; endif; ?>
						<?php  if(empty($rows)) : ?> <td colspan="9" > No records found </td> <?php endif; ?>
					</table> -->
					  <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">#</th>
                          <th style="width: 19%">Employee Name</th>
                          <th style="width: 2%"></th>
                          <th style="width: 12%">Monthly Payable</th>
						  <?php foreach($expenses_all  as $key => $expense ){ ?>
								 <th style="width: 9%"><?php echo  $expense ;?></th>
						  <?php } ?>
                          <th style="width: 25%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
					<?php  
					//echo "<pre>"; print_r($rows); echo "</pre>"; exit;
					if(!empty($rows)) :  $i = ($postdata['page'] > 1) ? (($postdata['page']-1) * $postdata['limit'] ) + 1 : 1; $user_id = 0; $show_total = 0; $tot = 0;  foreach($rows as $row) :  $id = base64_encode($row['id']);  ?>
						 <tr>
                          <td><?php echo  $i; ?></th>
                          <td>
                            <a><?php echo $row['first_name']." ".$row['last_name']." ".$row['middle_name']; ?></a>
                            <br />
                            <small>Effecting from 01.01.2015</small>
						  </td>
						  <td>
							<ul class="list-inline">
                              <li>
                                <img src="<?php echo base_url().$row['avatar']; ?>" class="avatar" alt="Avatar">
                            </li>
                            </ul>
						  </td>
						  <td> <?php if(isset($row['total'])){ echo 'INR '. $row['total']; }else{ echo 'N/A';  } ?></td>
                         <?php foreach($expenses_all  as $key => $earning ){ ?>
								<?php if(isset($row['earning']['data'][$key])) { ?>
									<td style="width: 8%"> <?php echo $row['earning']['data'][$key]['expense_value'];?></td>
								<?php }else{ ?>
									<td style="width: 8%"> N/A</td>
								<?php } ?>
						  <?php } ?>
                          <td>
                            <!-- <a href="#" onclick="javascript:viewrecord('<?php echo base64_encode($row['id']); ?>','<?= $edit_url ?>');"  class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a> -->
                            <a href="#" onclick="javascript:editrecord('<?php echo base64_encode($row['id']); ?>','<?= $edit_url ?>');"  class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                          </td>
                        </tr>
					<?php  $i++; endforeach; endif; ?>
					<?php  if(empty($rows)) : ?> <td colspan="10" align="center" > No record found </td> <?php endif; ?>
					 </tbody>
                    </table>
                    <!-- end project list -->
				<?php // if(count($rows) > 0) { echo print_pagination($total_records, $total_pages, $postdata['page'], $postdata['limit']); } ?>
				</form>
			</div>
		  </div>
		  
		</div>
	  </div>
	</div>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>