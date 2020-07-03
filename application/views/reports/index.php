<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- page content -->
	<div class="right_col" role="main">
	  <div class="">
		<div class="clearfix"></div>       
		<div class="row">
		  <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			  <div class="x_title">
				<h2>List of Employee`s </h2>
				<a class="pull-right" href="javascript:void(0);" onclick="javascript:exportrecords('false');"><button title=" Export All Records" type="button" class="btn btn-success"><i class="fa fa-file-excel-o" ></i>  Export All Records </button></a>
				<div class="clearfix"></div>
			  </div>
			  <div class="x_content">
			   <form class="form-horizontal" name="frmsearch" id="frmsearch" method="post" action="" >
				<?php  echo print_search_form($search, $postdata, $listpage_url); ?>
				<a class="pull-right" href="javascript:void(0);" onclick="javascript:exportrecords('true');"><button title=" Export Filtered Records" type="button" class="btn btn-primary"><i class="fa fa-file-excel-o" ></i> Export Filtered Records </button></a>
				<table class="table table-striped jambo_table bulk_action" >
					<thead class="headings">
					<tr>
					   <th class="sorting column-title  col-lg-1" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Sr. No.</th>
						  <th class="column-title  col-lg-2  sortable"  column="users.username" state="none">Employee Code <i class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-2 text-primary sortable" column="users.first_name" state="none"  >Employee Name <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-2 sortable" column="users.middle_name" state="none"  >Middle Name <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-2 sortable" column="users.last_name" state="none"  >Last Name <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-1 sortable" column="positions.position_name" state="none"  >Position <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-2 sortable" column="departments.department_name" state="none"  >Department <i   class="fa fa-sort-alpha-asc"> </i></th>
						  <th class="column-title col-lg-2 sortable" column="users.active_status" state="none" >Status <i   class="fa fa-sort-alpha-asc"> </i></th>
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
							  <td><?php echo  ucfirst(strtolower($row['department_name']));  ?></td>
							  <td><?php if($row['active_status'] == 1) echo "Active"; else echo "inactive"; ?></td>
							</tr>
							<?php $i++; endforeach; endif; ?>
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
	  </div>
	</div>
<form name="frmexport" id="frmexport" method="post" action="">
    <input type="hidden" name="task" id="task" value="" />
    <input type="hidden" name="user_type" id="user_type" value="" />
	<input type="hidden" name="page" id="page" value="<?php echo $postdata['page']; ?>" />
	<input type="hidden" name="limit" id="limit" value="<?php echo $postdata['limit']; ?>" />
	<input type="hidden" name="search_for" id="search_for" value="<?php echo $postdata['search_for']; ?>" />
    <input type="hidden" name="search_by" id="search_by" value="<?php echo $postdata['search_by']; ?>" />
    <input type="hidden" name="id" id="id" value="" />
    <input type="hidden" name="sort_by" id="sort_by" value="" />
    <input type="hidden" name="order_type" id="order_type" value="" />
    <input type="hidden" name="mode" id="mode" value="" />
    <input type="hidden" name="listpage_url" id="listpage_url" value="<?php if(isset($listpage_url)) echo $listpage_url; ?>" />
</form>	
<script>
function exportrecords(filter)
{	
	if(filter == 'yes'){
        $('form#frmexport').find('#search_by').val($("form#frmsearch").find('#search_by').val());
        $('form#frmexport').find('#search_for').val($("form#frmsearch").find('#search_for').val());
        $('form#frmexport').find('#sort_by').val($("form#frmsearch").find('#sort_by').val());
        $('form#frmexport').find('#order_type').val($("form#frmsearch").find('#order_type').val());
        $('#frmexport').submit();
	}
}  	
</script>	
 <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>