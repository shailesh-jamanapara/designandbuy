<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo asset_url(); ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo asset_url(); ?>/front/css/bootstrapValidator.css" rel="stylesheet">
<?php //echo "<pre>"; print_r($my_templates); echo "</pre>"; ?>
<div class="col-sm-16 col-lg-9 shadow-lg pt-2 pl-2 pr-2 pb-2 mb-5 ml-1 bg-orange action-content-div" id="div_enter_data" style="">
<div class="row">
	<div class="col-lg-12 col-sm-12 mb-2" >
	<h5 class="text-left my-0 sub-title text-dark">
		My Account  &nbsp;<i class="fas fa-angle-right"></i>&nbsp; Action &nbsp;<i class="fas fa-angle-right"></i>&nbsp; <span class="text-primary">Data entry manual</span>
	</h5>
	</div>
	<div class="col-lg-12">
										<form class="form-horizontal" name="frmsearch" id="frmsearch" method="post" action="" >
										<!-- /.box-header -->
										<div class="box-body">
											<table id="example2" class="table table-bordered table-hover">
											<thead class="headings">
											<tr>
											<th class="sorting column-title  col-lg-1" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Sr. No.</th>
											<th class="column-title col-lg-3 text-primary sortable" column="product_categories.product_category_name" state="none"  >Student Name<i   class="fa fa-sort-alpha-asc"> </i></th>
											<th class="column-title col-lg-2 " column="" state="none"  >I Card<i   class="fa fa-sort-alpha-asc"> </i></th>
											<th class="column-title col-lg-1 " column="" state="none"  >Standard<i   class="fa fa-sort-alpha-asc"> </i></th>
											<th class="column-title col-lg-1 " column="" state="none"  >Division<i   class="fa fa-sort-alpha-asc"> </i></th>
											<th class="column-title col-lg-2 " column="" state="none"  >Mobile No.<i   class="fa fa-sort-alpha-asc"> </i></th>
											<th class="column-title col-lg-2 " column="" state="none"  >Template <i   class="fa fa-sort-alpha-asc"> </i></th>
											<th class="column-title col-lg-1" >Filled Data</th>
											</tr>
											</thead>
											<tbody>
											<?php  if(!empty($students)) :  $i = 1; foreach($students as $row) :  $id = base64_encode($row['id']); $status = ( $row['status'] == 1) ?"Active":"Inactive"; $row_id= rand(5000, 9000 ); ?>
											<tr id="<?php echo $row_id; ?>">
											<td><?php echo  $i; ?></th>
											<td><?php echo  $row['student_name'];  ?></td>
											<td>
											<div class="tempalets_list_image_wrap">
											<img src="<?php echo base_url();?>/uploads/templates/<?php echo $row['template_image_path'];?>" alt="" class="img-responsive"> 
											</div>                                            
											</td>
											<td><?php echo  $row['standard_id'];  ?></td>
											<td><?php echo  $row['class_id'];  ?></td>
											<td><?php echo  $row['mobile_no'];  ?></td>
											<td><?php echo  $row['template_name'];  ?></td>
											<?php $filled = ($row['student_updated'] != '0000-00-00 00:00:00')?' fa-check text-success ':' fa-exclamation-circle text-danger ';?>
											<td> <i class="fa <?php echo  $filled;?>" ></i></td>
											<!-- <td> <a herf="javascript:void(0);" class="edit_link" ><i class="fa fa-pencil-square-o text-success" title="Edit"> </i> </a>
												<a herf="javascript:void(0);" class="edit_link"><i class="fa fa-trash text-warning " title="Delete This Item"> </i> </a>
												</td> -->
											</tr>
											<?php  $i++; endforeach; endif; ?>
											<?php  if(empty($students)) : ?> <td colspan="8" class="text-center" > No record found </td> <?php endif; ?>
											<tbody>
											</table>
											</form>
				</div>
		</div>
</div>
<script src="<?php echo asset_url();?>front/js/bootstrapValidator.js"></script>
<script>
function showhide(val){
	$('table.table-records').css('display','none');
	$('div.template-fields').css('display','none');
	$('div.template-fields').prop('disabled', true);
	$('div#template_fields_'+val).css('display','block');
	$('div#template_fields_'+val).prop('disabled', false);
	$('div#div_btn_submit').css('display','block');
	$('div#div_btn_submit').prop('disabled', false);
	$('table#mydraftedcards'+val).css('display','');
	$('input#customer_templates_id').val($('select#template_id option:selected').html());
}
$(document).ready(function() {
	$('#frm1').bootstrapValidator();
});
</script>
