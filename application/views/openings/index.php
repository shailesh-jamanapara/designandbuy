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
						<th class="sorting column-title  col-lg-1" tabindex="0" >Sr. No.</th>
						<th class="column-title col-lg-2 text-primary sortable" column="openings.opening_name" state="asc"  >Opening Title<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-1 sortable" column="openings.opening_code" state="none"  >Opening Code<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-2 sortable" column="positions.position_name" state="none"  >Position Name<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-2 sortable" column="openings.no_of_openings" state="none"  >No. of Openings<i   class="fa fa-sort-numeric-asc"> </i></th>
						<th class="column-title col-lg-1 sortable" column="openings.status" state="none" >Status<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-1 " >Action</th>
					</tr>
				  </thead>
					<tbody>
						<?php  if(!empty($rows)) :  $i = ($postdata['page'] > 1) ? (($postdata['page']-1) * $postdata['limit'] ) + 1 : 1; foreach($rows as $row) :  $id = base64_encode($row['id']); $status = ( $row['status'] == 1) ?"Active":"Inactive";  ?>
						<tr  id="tr_<?php echo $row['id']; ?>">
						<tr id="tr_<?php echo $id;?>">
						<td><?php echo  $i; ?></th>
						<td><?php echo  $row['opening_name'];  ?></td>
						<td><?php echo  $row['opening_code'];  ?></td>
						<td><?php echo  $row['position_name'];  ?></td>
						<td><?php echo  $row['no_of_openings'];  ?></td>
						<td><?php echo $status; ?></td>
						<td> 
							<a herf="javascript:void(0);" class="edit_link" onclick="javascript:editrecord('<?php echo $id; ?>','<?= $edit_url ?>');" ><i class="fa fa-pencil-square-o" title="Edit"> </i> </a>  
						</td>
						</tr>
						<?php  $i++; endforeach; endif; ?>
						<?php  if(empty($rows)) : ?> <td colspan="7" > No record found </td> <?php endif; ?>
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