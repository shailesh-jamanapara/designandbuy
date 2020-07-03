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
<?php endif; 
if(strpos($row['customer_template_preferences'],',') !== false){
	$preferences_arr = explode('|',$row['customer_template_preferences']);
	if(count($preferences_arr) > 0 ){
		foreach($preferences_arr as $arr){
			if($arr)
				$preferences[] = (array) json_decode(rtrim($arr,','));
		}
	}
}else{
	$preferences[] = $row['customer_template_preferences'];
}

?>
<?php if ( !$postdata['task']  ||  $postdata['task'] != 'save' ) : ?>
	<section class="content-header">
		<h1>
			<?php echo $page_heading; ?>
		</h1>
	</section>
    <!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-sm-12 col-lg-12">
				<div class="box box-primary">
		   			<div class="box-body">
					   <div class="col-lg-12"><h3 class="text-warning label-title-upper">Customer information</h3></div>
						<!-- left side div -->
							<div class="col-lg-3">
								<div class="">
									<label class="control-label col-lg-3 col-md-12 label-title-upper" for="customer_id">Name:-</label>
									<div class="col-lg-9 col-xs-12 "><?= $row['customer_name'] ?></div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="">
									<label class="control-label col-lg-3 col-md-4 label-title-upper" for="customer_id"> Email:-</label>
									<div class="col-lg-9 col-xs-12 "><?= $row['customer_email'] ?></div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="">
									<label class="control-label col-lg-4 col-md-4 label-title-upper" for="order_date">Address </label>
									<div class="col-lg-8 col-xs-12  init_div"><?= $row['customer_address']; ?></div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="">
									<label class="control-label col-lg-12 col-md-4 label-title-upper" for="order_date">Landline No. </label>
									<div class="col-lg-6 col-lg-12 col-xs-12  init_div">

										<?php 
										if(isset($row['customer_phone']) && !empty($row['customer_phone'])) echo $row['customer_phone']; else echo 'N/A'; ?></div>
								</div>	
							</div>
							<div class="col-lg-3">
								<div class="">
									<label class="control-label col-lg-6 col-md-4 label-title-upper" for="order_date">Mobile No. </label>
									<div class="col-lg-6 col-xs-12  init_div">

										<?php 
										if(isset($row['customer_mobile']) && !empty($row['customer_mobile'])) echo $row['customer_mobile']; else echo 'N/A'; ?></div>
								</div>	
							</div>

							<div class="col-lg-6">
								<div class="">
									<label class="control-label col-lg-4 col-md-4 label-title-upper" for="order_date">Billing Address </label>
									<div class="col-lg-8 col-xs-12  init_div"><?= $row['billing_address']; ?></div>
								</div>
							</div>
							<div class="col-lg-2">
								<div class="">
									<label class="control-label col-lg-12 col-md-4 label-title-upper" for="order_date">GST No. </label>
									<div class="col-lg-12 col-lg-12 col-xs-12  init_div">

										<?php 
										if(isset($row['customer_gst_no']) && !empty($row['customer_gst_no'])) echo $row['customer_gst_no']; else echo 'N/A'; ?></div>
								</div>	
							</div>
							<div class="col-lg-12"><h3 class="text-warning label-title-upper">Order information</h3></div>
						<!-- left side div -->
							<div class="col-lg-3">
								<div class="">
									<label class="control-label col-lg-12 col-md-12 label-title-upper" for="customer_id">Order #</label>
									<div class="col-lg-12 col-xs-12 "><?= $row['order_no'] ?></div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="">
									<label class="control-label col-lg-12 col-md-4 label-title-upper" for="customer_id"> Customer Email</label>
									<div class="col-lg-12 col-lg-6 col-xs-12 "><?= $row['customer_email'] ?></div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="">
									<label class="control-label col-lg-12 col-md-4 label-title-upper" for="order_date">Order Date</label>
									<div class="col-lg-12 col-lg-12 col-xs-12  init_div"><?= $row['order_date']; ?></div>
								</div>
							</div>

							<div class="col-lg-3">
								<div class="">
									<label class="control-label col-lg-12 col-md-4 label-title-upper" for="status">Status</label>
									<div class="col-lg-12 col-md-6 col-xs-12 ">
										<?= $checked = ($row['status'] == '1') ? ' In preocess ': 'New'; ?>
									</div>
								</div>
							</div>
							<div class="col-lg-3"><h4 class="text-warning label-title-upper">I-Card Preferences</h4></div>
							<div class="col-lg-6"><h4 class="text-warning label-title-upper">I-Card Template Title</h4></div>
							<div class="col-lg-3"><h4 class="text-warning label-title-upper">I-Card Template</h4></div>
							
							<div class="col-lg-3">
								<div class="row">
								<?php foreach($preferences as $preference) { ?>
									<?php foreach($preference as $key => $val) { ?>
									<?php if(!empty($val) && !is_numeric($val)) { ?>
									<div class="col-lg-12">
										<div class="">
											<label class="col-lg-6 col-md-4 label-title-upper" for="customer_id"> <?php echo ucfirst(str_replace('_',' ', $key));?></label>
											<div class="col-lg-6  col-xs-12 "><?php echo ucfirst($val);?></div>
										</div>
									</div>
										<?php } ?>
									<?php } ?>
								<?php } ?>
								</div>
							</div>
							<div class="col-lg-3">
									<label class="control-label" for="status">Template ID:</label>
									<?php echo $row['customer_template_name']; ?>
							</div>
							<div class="col-lg-3">
									<div class="col-lg-12 col-md-6 col-xs-12 "> 
										<?php 
										echo $row['customer_template_svg'];
										?>
									</div>
							</div>

							
							</div>	
						</div>	
					</div>
					<!-- /.box-footer -->
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
	$('li#ordermanagement').trigger('click');
	$('li#ordermanagement').addClass('menu-open');
	$('li#ordermanagement').find('ul.treeview-menu').css('display','block');
</script>	
 <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>	