<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Content Header (Page header) -->
<?php if (!empty($postdata['task']) && $postdata['task'] == 'save' ) : ?>
	<form name="frmsave" id="frmsave" method="post" action="<?php echo $listpage_url;?>">
		<input type="hidden" name="id" id="id" value="<?php if(isset($model['id'])) { echo $model['id']; } ?>" />
		<input type="hidden" name="search_for" id="order_type" value="<?php echo $postdata['search_for']; ?>" />
		<input type="hidden" name="search_by" id="sort_by" value="<?php echo $postdata['search_by']; ?>" />
		<input type="hidden" name="sort_by" id="sort_by" value="<?php echo $postdata['sort_by']; ?>" />
		<input type="hidden" name="order_type" id="order_type" value="<?php echo $postdata['order_type']; ?>" />
		<input type="hidden" name="page" id="order_type" value="<?php echo $postdata['page']; ?>" />
		<input type="hidden" name="limit" id="limit" value="<?php echo $postdata['limit']; ?>" />
	</form>
<?php endif; ?>
<?php if ( !$postdata['task']  ||  $postdata['task'] != 'save' ) : ?>
	<section class="content-header">
		<h1>
			<?php echo $page_heading; ?>
		</h1>
	</section>
    <!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-sm-12">
				<div class="box box-primary">
		   			<form class="form-horizontal form-label-left" novalidate method="post" action="" id="editform" data-bv-message="This value is not valid" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" enctype="multipart/form-data" autocomplete="off">
						<input type="hidden" name="task" id="task" value="save" />
						<input type="hidden" name="id" id="id" value="<?php echo $model['id']; ?>" />
						<input type="hidden" name="search_for" id="order_type" value="<?php echo $postdata['search_for']; ?>" />
						<input type="hidden" name="search_by" id="sort_by" value="<?php echo $postdata['search_by']; ?>" />
						<input type="hidden" name="sort_by" id="order_type" value="<?php echo $postdata['sort_by']; ?>" />
						<input type="hidden" name="order_type" id="order_type" value="<?php echo $postdata['order_type']; ?>" />
						<input type="hidden" name="page" id="order_type" value="<?php echo $postdata['page']; ?>" />
						<input type="hidden" name="limit" id="limit" value="<?php echo $postdata['limit']; ?>" />
						<input type="hidden" name="customer_type" id="customer_type" value="franchisee" />
						<input type="hidden" name="role_id" id="role_id" value="14" />
						<input type="hidden" name="status" id="status" value="1" />
								
						<div class="box-body">
						<!-- left side div -->
							<div class="col-sm-9">
								<div class="form-group">
									<label class="control-label col-lg-4 col-md-4 label-title-upper" for="customer_id">Customer<span class="requireds">*</span> </label>
									<div class="col-lg-8 col-sm-6 col-xs-12 form-group">   
										<select  class="form-control " id="customer_id" name="customer_id" data-bv-notempty="true" data-bv-notempty-message="Please select Customer" >
											<option value="">--Please Select--</option>
											<?php foreach ( $customers as $key => $value ){ ?>
											<option value="<?php echo $key; ?>" <?= ($row['customer_id'] == $key) ? ' selected ':''; ?> ><?php echo $value; ?></option>
											<?php } ?>
										</select>					
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-4 col-md-4 label-title-upper" for="customer_template_id">Customer Template<span class="requireds">*</span> </label>
									<div class="col-lg-8 col-sm-6 col-xs-12 form-group">   
										<select  class="form-control " id="customer_template_id" name="customer_template_id" data-bv-notempty="true" data-bv-notempty-message="Please select Customer Template" >
											<option value="">--Please Select--</option>
											<?php foreach ( $customer_templates as $key => $value ){ ?>
											<option value="<?php echo $key; ?>" <?= ($row['customer_template_id'] == $key) ? ' selected ':''; ?> ><?php echo $value; ?></option>
											<?php } ?>
										</select>					
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-4 col-md-4 label-title-upper" for="product_id">Product<span class="requireds">*</span> </label>
									<div class="col-lg-8 col-sm-6 col-xs-12 form-group">   
										<select  class="form-control " id="product_id" name="product_id" data-bv-notempty="true" data-bv-notempty-message="Please select Product" >
											<option value="">--Please Select--</option>
											<?php foreach ( $products as $key => $value ){ ?>
											<option value="<?php echo $key; ?>" <?= ($row['product_id'] == $key) ? ' selected ':''; ?> ><?php echo $value; ?></option>
											<?php } ?>
										</select>					
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-4 col-md-4 label-title-upper" for="order_date">Order Date<span class="requireds">*</span></label>
									<div class="col-lg-8 col-sm-6 col-xs-12 form-group init_div"  >   
										<input data-bv-notempty="true" data-bv-notempty-message="Please Select Order Date" id="order_date" name="order_date" value="<?php echo $row['order_date']; ?>" class="date-picker form-control col-md-7 col-xs-12" type="text" placeholder="eg.mm/dd/yyyy" >
										<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>				
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-lg-4 col-md-4 label-title-upper" for="status"> Active Status<span class="requireds">*</span></label>
									<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
										<?php $checked = ($row['status'] == '1') ? ' checked ':''; ?>
										<input type="checkbox" name="status" value="1" id="status" <?php echo $checked; ?> data-toggle="toggle" data-onstyle="primary" data-on="Active"data-off="Inactive" value="<?php echo $row['status'] ; ?>" data-offstyle="default" >
									</div>
								</div>

								<div class="form-group">
									<div class="col-lg-2 pull-left">
										<button type="button" onclick="this.form.action='<?php echo $listpage_url;?>';this.form.submit();" class=" btn bg-red btn-flat">Cancel</button>
									</div>
									<div class="col-lg-2 pull-right">
										<button type="submit" class="form-control btn bg-green btn-flat">Save</button>
									</div>
								</div>
							</div>	
						</div>	
					</div>
					<!-- /.box-footer -->
				</form>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.col -->
	</div>
<!-- /.row -->
</section>
<!-- /.content -->
<?php endif; ?>		
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>	
<script>
	<?php if (!empty($postdata['task']) && $postdata['task'] == 'save' ){ ?>
		$(document).ready(function() {
			$('#frmsave').submit();
		});
	<?php } ?>	

	$(document).ready(function() {
		$('#editform').bootstrapValidator();
	});
	function callback(){
		return "Here is custom message";
	}

	$(document).ready(function() {
		$('.date-picker').datepicker({ format: "yyyy/mm/dd" });
	}); 
</script>	
 <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>	