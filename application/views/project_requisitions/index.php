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
				<?php echo $roles_accesses['add_button']; ?>
				<div class="clearfix"></div>
			  </div>
			  <div class="x_content">
			  <form class="form-horizontal" name="frmsearch" id="frmsearch" method="post" action="" >
					<?php  echo print_search_form($search, $postdata, $listpage_url); ?>
				<table class="table table-striped jambo_table bulk_action" >
					<thead class="headings">
					<tr>
						<th class="sorting column-title  col-lg-1" tabindex="0" >Sr. No.</th>
						<th class="column-title col-lg-2 text-primary sortable" column="project_requisitions.project_requisition_name" state="none"  >Requisition Name<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-1 text-primary sortable" column="projects.project_name" state="none"  >Project<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-1 text-primary sortable" column="project_requisitions.minimum_budget" state="none"  >Min. Budget<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-1 text-primary sortable" column="project_requisitions.maximum_budget" state="none"  >Max. Budget<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-2 text-primary sortable" column="project_requisitions.expected_date_of_fullfill" state="none"  >Expected Date of Required<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-2 text-primary sortable" column="users.authorized_person_name" state="none"  >Authorized Person<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-1 sortable" column="positions.status" state="none" >Status<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-1 " >Action</th>
					</tr>
				  </thead>
					<tbody>
					<?php  if(!empty($rows)) :  $i = ($postdata['page'] > 1) ? (($postdata['page']-1) * $postdata['limit'] ) + 1 : 1; foreach($rows as $row) :  $id = base64_encode($row['id']); $status = ( $row['status'] == 1) ?"Active":"Inactive";  ?>
					<tr  id="tr_<?php echo $row['id']; ?>">
						<td><?php echo  $i; ?></th>
						<td><?php echo  $row['project_requisition_name']; ?></td>
						<td><?php echo  $row['project_name'];  ?></td>
						<td><?php echo  $row['minimum_budget'];  ?></td>
						<td><?php echo  $row['maximum_budget'];  ?></td>
						<td><?php echo  date('M, d, Y', strtotime($row['expected_date_of_fullfill']));  ?></td>
						<td><?php echo  $users[$row['authorized_person_id']];  ?></td>
						<td><?php  echo $status; ?></td>
						<td> 
							<a href="javascript:void(0);" class="edit_link" onclick="javascript:editrecord('<?php echo $id; ?>','<?= $edit_url ?>');" ><i class="fa fa-pencil-square-o" title="Edit"> </i> </a>
							<!-- 
							<a href="javascript:void(0);" class="edit_link" onclick="javascript:toggle_modal_detail('<?php echo $id; ?>');" ><i class="fa fa-eye" title="View detail"> </i> </a> -->							
						
						</td>
					</tr>
					<?php  $i++; endforeach; endif; ?>
					<?php  if(empty($rows)) : ?> <td colspan="9 text-center" > No record found </td> <?php endif; ?>
					<tbody>
					</table>
				<?php if(count($rows) > 0) { echo print_pagination($total_records, $total_pages, $postdata['page'], $postdata['limit']); } ?>
				</form>
			</div>
		  </div>
		</div>
	  </div>
	</div>
<!-- Modal for Assign Role  -->
<div class="modal" tabindex="-1" role="dialog" id="modal_detail">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="requisition_of" ></h4>
        <h5 class="modal-title" id="requisition_for" ></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="req_detail">
       </div>
	</div>
  </div>
</div>	
<script>
function toggle_modal_detail(id){
	var url = '<?php echo $ajax_url;?>viewRequisitionDetail';
	var _html = '';
	$.ajax({
		url:url,
		data:{id:id},
		method:'POST',
		success:function(result){
			var obj = $.parseJSON(result);
			console.log(obj);
				_html = _html + ' <div class="row"><div class="col-lg-4"><b> Project	</b></div> <div class="col-lg-8"></div></div> ';
				_html = _html + ' <div class="row"><div class="col-lg-4"><b> Requisition	</b></div> <div class="col-lg-8"></div></div> ';
				_html = _html + ' <div class="row"><div class="col-lg-4"><b> Requisition for 	</b></div> <div class="col-lg-8"></div></div> ';
				_html = _html + ' <div class="row"><div class="col-lg-4"><b> Reqquired by	</b></div> <div class="col-lg-8"></div></div> ';
				_html = _html + ' <div class="row"><div class="col-lg-4"><b> Expected Date </b></div> <div class="col-lg-8"></div></div> ';
				_html = _html + ' <div class="row"><div class="col-lg-4"><b> Projected Date of long last</b></div> <div class="col-lg-8"></div></div> ';
				_html = _html + ' <div class="row"><div class="col-lg-4"><b> Recommendation</b></div> <div class="col-lg-8"></div></div> ';
				_html = _html + ' <div class="row"><div class="col-lg-4"><b> Check List</b></div> <div class="col-lg-8"></div></div> ';
				_html = _html + ' <div class="row"><div class="col-lg-4"><b> Special Note </b></div> <div class="col-lg-8"></div></div> ';
			$('#req_detail').html(_html);
			$("#modal_detail").modal('toggle');
		}	
	});
	
}
</script>	
 <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>