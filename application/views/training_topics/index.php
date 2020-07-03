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
			  <form class="form-horizontal" name="frmsearch" id="frmsearch" method="post" action="" >
				<?php  echo print_search_form($search, $postdata, $listpage_url); ?>
				<table class="table table-striped jambo_table bulk_action" >
					<thead class="headings">
					<tr>
					   <th class="sorting column-title  col-lg-1" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Sr. No.</th>
						  <th class="column-title  col-lg-4  sortable"  column="training_topics.training_topic_name" state="none">Training Topic <i class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-3 text-primary sortable" column="training_topics.topic_code" state="none"  >Topic Code <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-1  sortable" column="training_topics.status" state="none" >Status <i class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-1 "  >Action <i class="fa fa-sort-alpha-asc"> </i></th>
				  </thead>
						<tbody>
							<?php 
							if(count($rows) > 0){
							$i = ($postdata['page'] > 1) ? (($postdata['page']-1) * $postdata['limit'] ) + 1 : 1;
							foreach($rows as $row) {
								$id = base64_encode($row['id']);
								$status = ( $row['status'] == 1) ?"Active":"Inactive";
								 $row_id= rand(5000, 9000 );
								?>
								<tr id="<?php echo $row_id; ?>">
								<td><?php echo  $i; ?></th>
								<td><?php echo  $row['training_topic_name'];  ?></td>
								<td><?php echo  $row['topic_code'];  ?></td>
								<td><?php echo $status; ?></td>
								<td> <a herf="javascript:void(0);" class="edit_link" onclick="javascript:editrecord('<?php echo $id; ?>','<?= $edit_url ?>');" ><i class="fa fa-pencil-square-o" title="Edit"> </i> </a> 
									<a herf="javascript:void(0);" class="edit_link" onclick="javascript:conf_delete('<?php echo $id; ?>','<?php echo $row_id; ?>');" ><i class="fa fa-trash" title="Delete This Item"> </i> </a>
								</td>
								</tr>
								<?php
								$i++;
								}
								?>
							<?php
							}else{
							echo '<td colspan="5"> No record found </td>';
							} ?>
						</tbody>
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