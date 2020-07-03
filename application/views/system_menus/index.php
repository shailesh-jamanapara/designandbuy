<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- page content -->
	<div class="right_col" role="main">
	  <div class="">
		<div class="clearfix"></div>       
		<div class="row">
		  <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			  <div class="x_title">
				<h2>List of System Menus</h2>
				<a style="" href="javascript:void(0);" onclick="javascript:editrecord('<?php echo $model['new']; ?>','<?= $edit_url ?>');"><button type="button" class="btn btn-primary">  Add New  <?php echo $item; ?></button></a>
				<div class="clearfix"></div>
			  </div>
			  <div class="x_content">
			  <form class="form-horizontal" name="frmsearch" id="frmsearch" method="post" action="" >
					<?php  echo print_search_form($search, $postdata, $listpage_url); ?>
				<table class="table table-striped jambo_table bulk_action" >
					<thead class="headings">
					<tr>
						<th class="sorting column-title  col-lg-1" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Sr. No.</th>
						  <th class="column-title  col-lg-3  text-primary  sortable"  column="system_menus.system_menu_name" state="none">Menu Name <i class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-3  sortable" column="pm.system_menu_name" state="none"  >Parent Menu Name <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-3 sortable" column="system_modules.system_module_name" state="none"  >Module Name <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-1 sortable" column="system_menus.menu_custom_link" state="none"  >Menu Link <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-1 sortable" column="system_menus.status" state="none"  >Status <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-1 " >Action <i   class="fa fa-sort-alpha-asc"> </i></th>
					</tr>
				  </thead>
					<tbody>
						<?php  if(!empty($rows)) :  $i = ($postdata['page'] > 1) ? (($postdata['page']-1) * $postdata['limit'] ) + 1 : 1; foreach($rows as $row) :  $id = base64_encode($row['id']); $status = ( $row['status'] == 1) ?"Active":"Inactive"; ?>
							<tr  id="tr_<?php echo $row['id']; ?>">
							<td><?php echo  $i; ?></th>
							<td><?php echo  $row['system_menu_name']; ?></td>
							<td><?php echo  $row['parent_menu_name'];  ?></td>
							<td><?php echo  $row['system_module_name'];  ?></td>
							<td><?php echo  $row['menu_custom_link'];  ?></td>
							<td><?php echo $status; ?></td>
							<td> <a herf="javascript:void(0);" class="edit_link" onclick="javascript:editrecord('<?php echo $id; ?>','<?= $edit_url ?>');" ><i class="fa fa-pencil-square-o" title="Edit"> </i> </a> </td>	
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
 <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>