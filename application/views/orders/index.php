<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		List of Orders
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="box-body">
			<a href="<?php echo base_url();?>index.php/Setups/index/all" >
				<button type="button" class="pull-right btn bg-orange btn-flat margin"> <i class="fa fa-long-arrow-left"></i></button>
			</a>
			<a href="javascript:void(0);" onclick="javascript:editrecord('<?php echo $model['new']; ?>','<?= $edit_url ?>');">
				<button type="button" class="pull-right btn bg-orange btn-flat margin"> Add New Order </button>
			</a>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<form class="form-horizontal" name="frmsearch" id="frmsearch" method="post" action="" >
						<?php  echo print_search_form($search, $postdata, $listpage_url); ?>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead class="headings">
									<tr>
										<th class="sorting column-title  col-lg-1" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Sr. No.</th>
										<th class="column-title col-lg-2 text-primary sortable" column="c.order_no" state="none">Order #<i   class="fa fa-sort-alpha-asc"> </i></th>
										<th class="column-title col-lg-2 text-primary sortable" column="c.customer_name" state="none">Customer Name<i   class="fa fa-sort-alpha-asc"> </i></th>
										<th class="column-title col-lg-2 text-primary sortable" column="ct.template_name" state="none">Template Name<i   class="fa fa-sort-alpha-asc"> </i></th>
										<th class="column-title col-lg-2 sortable" column="orders.order_date" state="none" >Order Date<i   class="fa fa-sort-alpha-asc"> </i></th>
										<th class="column-title col-lg-1 sortable" column="orders.status" state="none" >Status<i   class="fa fa-sort-alpha-asc"> </i></th>
										<th class="column-title col-lg-2" colspan="2" >Action</th>
									</tr>
				  				</thead>
								<tbody>
									<?php  if(!empty($rows)) :  $i = ($postdata['page'] > 1) ? (($postdata['page']-1) * $postdata['limit'] ) + 1 : 1; foreach($rows as $row) :  $id = base64_encode($row['id']); $status = ( $row['status'] == 1) ?"In preocess":"New"; $row_id= rand(5000, 9000 ); ?>
									<tr id="<?php echo $row_id; ?>">
										<td width="5%"><?php echo  $i; ?></th>
										<td><?php echo  $row['order_no'];  ?></td>
										
										<td><?php echo  $row['customer_name'];  ?></td>
										
										<td><?php echo  $row['customer_template_name'];  ?></td>
										<td><?php echo  date("Y-m-d", strtotime($row['order_date']));  ?></td>
										<td> <?php echo $status ; ?></td>
										<td>
											<a herf="javascript:void(0);" class="edit_link" onclick="javascript:viewrecord('<?php echo $id; ?>','<?= $view_url ?>');" ><i class="fa fa-eye text-success" title="View detail"> </i> </a> 
											<a herf="javascript:void(0);" class="edit_link" onclick="javascript:viewrecord('<?php echo $id; ?>','<?php echo base_url();?>/Orders/view_order_icards');" ><i class="fa fa-table text-success" title="View detail"> </i> </a> 
											
											<a herf="javascript:void(0);" class="edit_link" onclick="javascript:conf_delete('<?php echo $id; ?>','<?php echo $row_id; ?>');" ><i class="fa fa-trash text-warning " title="Delete This Item"> </i> </a>
										</td>
									</tr>
									<?php  $i++; endforeach; endif; ?>
									<?php  if(empty($rows)) : ?> <td colspan="5" class="text-center" > No record found </td> <?php endif; ?>
								</tbody>
			  				</table>
			  			</form>
            		</div>
           			<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
    </section>
    <!-- /.content -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>	
<script>
	
$(document).ready(function(){
	$('#search_for_status') .find('option').remove();
	$.each({'0':'New', '1':'In process','3':'Send for review','4':'Approved by customer','4':'Delivered','6':'Closed'}, function(key, value) {   
	$('#search_for_status')
		.append($("<option></option>")
				.attr("value",key)
				.text(value)); 
	});
	$('li#ordermanagement').trigger('click');
	$('li#ordermanagement').addClass('menu-open');
	$('li#ordermanagement').find('ul.treeview-menu').css('display','block');
});
</script>