<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       List of Products
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
				<button type="button" class="pull-right btn bg-orange btn-flat margin"> Add New product </button>
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
						<th class="sorting column-title  col-lg-1" tabindex="0" >Sr. No.</th>
						<th class="column-title col-lg-2 sortable" column="products.product_name" state="none"  >Product Name<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-2 sortable" column="product_categories.product_category_name" state="none"  >Category Name<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-1 " column="product_prices.price" state="none" >Price <i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-1 " column="templates.thumb" state="none" >Image<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-1 sortable" column="projects.status" state="none" >Status<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-2 " >Action</th>
					</tr>
				  </thead>
					<tbody>
						<?php  if(!empty($rows)) :  $i = ($postdata['page'] > 1) ? (($postdata['page']-1) * $postdata['limit'] ) + 1 : 1; foreach($rows as $row) :  $id = base64_encode($row['id']); $status = ( $row['status'] == 1) ?"Active":"Inactive";  ?>
							<tr  id="tr_<?php echo $row['id']; ?>">
								<td><?php echo  $i; ?></th>
								<td><?php echo  $row['product_name'];  ?></td>
								<td><?php echo  $row['product_category_name'];  ?></td>
								<td><?php if($row['base_price']) { ?> <span id="price_<?php echo $row['id']; ?>">INR. <?php echo  $row['base_price'];  ?></span> <?php } else{ ?> <span id="price_<?php echo $row['id']; ?>"></span>  <?php } ?></td>
								<td> 
									<div class="tempalets_list_image_wrap pull-left">
									<img src="<?php echo  base_url().$row['product_image'];?>" alt="" class="img-responsive pull-left"> 
									</div>
								</td>
								<td><?php  echo $status; ?></td>
								<td> 
								<a href="javascript:void(0);" onclick="javascript:editrecord('<?php echo $id; ?>','<?= $edit_url ?>');" title="Edit">
									<button type="button" class="pull-right btn bg-blue btn-flat "> <i class="fa fa-pencil-square-o" title="Edit"> </i> </button>
								</a>&nbsp;&nbsp;
								<a href="javascript:void(0);" class="btn_settings" title="Manage Options">
									<button type="button" class="pull-right btn bg-green btn-flat  "> <i class="fa fa-cog"></i></button>
								</a>
								<a href="javascript:void(0);" class="btn_settings" title="Manage Price">
									<button type="button" class="pull-right btn bg-blue btn-flat " onclick="javascript:toggle_modal_manage_price('<?php echo $id; ?>', <?php echo $row['id']; ?>);"> <i class="fa fa-tag"></i></button>
								</a>
								</td>
					  	</tr>
						<?php  $i++; endforeach; endif; ?>
						<?php  if(empty($rows)) : ?> <td colspan="5" > No record found </td> <?php endif; ?>
					<tbody>
					
			  </table>
			  	<?php if(count($rows) > 0) { echo print_pagination($total_records, $total_pages, $postdata['page'], $postdata['limit']); } ?>
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
<!-- Manage Price Popup -->
<div class="modal " id="manage_price" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog div_confirm_order" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
	  <h4 id="err_heading" class="text-danger">Price could not be saved. </h4>
	  <h4> Manage price </h4>
	  <form class="form-horizontal" name="frm_manage_price" id="frm_manage_price" action="<?php echo $ajax_url; ?>">
			<input type="hidden" name="products_id" id="products_id" value="" >
			<input type="hidden" name="product_prices_id" id="product_prices_id" value="" >
			<input type="hidden" name="task" id="task" value="save_base_price" >
			<input type="hidden" name="span_id" id="span_id" value="" >
			  <div class="row">
				<label class="col-lg-3 form-label" for="">Base price (INR):</label>
				<div class="col-lg-9 form-group"> <input class="form-control" name="product_base_price" id="product_base_price" value=""></div>
				
			 </div>
			 <div class="row">
				
				<div class="col-lg-12 form-group">
					<button type="submit"  name="btn_2" value="Save" class="btn btn-success  btn-flat  pull-right" title="Save"><i class="fa fa-floppy-o" > </i></button>	
					<button type="button" class="btn btn-danger pull-right btn-flat" data-dismiss="modal" title="Cancel"><i class="fa fa-times" > </i></button>
				</div>
			 </div>
		</form>  
      </div>
    </div>
  </div>
</div>	
 <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>	
<script>

function toggle_modal_manage_price(products_id, span_id){
	$('input#product_base_price').val('');
	$('#err_heading').css('display','none');
	$("form#frm_manage_price").find("input#products_id").val(products_id);
	$("form#frm_manage_price").find("input#span_id").val('price_'+span_id);
	var url =  '<?php echo $ajax_url; ?>getProductPrice';
	var data_to_pass = {};
	data_to_pass.products_id = products_id;
	data_to_pass.task = 'get_base_price';
	$.ajax({
		url:url, 
		data:data_to_pass, 
		type:'post',
		success:function(result){
			var obj = $.parseJSON(result);
			if(obj.id != '0'){
				$('input#product_prices_id').val(obj.id);
				
			}
			if(obj.price != '0'){
				$('input#product_base_price').val(obj.price);
				
			}
			
		}
	});
	$("#manage_price").modal('toggle');
}

$('form#frm_manage_price').bootstrapValidator('resetForm', true).on('success.form.bv', function(e){
	e.preventDefault();
	$form = $(e.target);
	var data_to_pass = $form.serialize();
	var url =  '<?php echo $ajax_url; ?>savePrice';
	$.ajax({
		url:url, 
		data:data_to_pass, 
		type:'post',
		success:function(result){
			var obj = $.parseJSON(result);
			if(obj.status == 'success'){
				var span_id  =$('input#span_id').val();
				$('span#'+span_id).text( 'INR. '+$('input#product_base_price').val() );
				$('input#product_prices_id').val(obj.id);
				$('#err_heading').text(obj.message );
				$('#err_heading').attr('class','text-success');
				$('#err_heading').css('display','block');
				$("#manage_price").modal('toggle');
				$('form#frm_manage_price').data('bootstrapValidator').resetForm();
				
			}
			else{
				$('#err_heading').text(obj.message );
				$('#err_heading').attr('class','text-danger');
				$('#err_heading').css('display','block');
			}
			$('input#product_base_price').val('');
		}
	});
});

</script>
