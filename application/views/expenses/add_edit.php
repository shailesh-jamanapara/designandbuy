<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- page content -->
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
	<div class="right_col" role="main">
	  <div class="">
		<div class="clearfix"></div>       
		<div class="row">
		  <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			    <div class="x_title">
				<h2><?php echo $page_heading; ?></h2>
				<div class="clearfix"></div>
			  </div>
			  <!-- x_content -->
			  <div class="x_content">
				 <!-- form-horizontal -->
				  <form autocomplete="off" class="form-horizontal form-label-left" novalidate method="post" action="" id="editform" data-bv-message="This value is not valid" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" enctype="multipart/form-data">
					<input type="hidden" name="task" id="task" value="save" />
					<input type="hidden" name="id" id="id" value="<?php echo $model['id']; ?>" />
					<input type="hidden" name="search_for" id="order_type" value="<?php echo $postdata['search_for']; ?>" />
					<input type="hidden" name="search_by" id="sort_by" value="<?php echo $postdata['search_by']; ?>" />
					<input type="hidden" name="sort_by" id="order_type" value="<?php echo $postdata['sort_by']; ?>" />
					<input type="hidden" name="order_type" id="order_type" value="<?php echo $postdata['order_type']; ?>" />
					<input type="hidden" name="page" id="order_type" value="<?php echo $postdata['page']; ?>" />
					<input type="hidden" name="limit" id="limit" value="<?php echo $postdata['limit']; ?>" />
					  <div class="row row-edit-form">
						<div class="col-lg-6 form-group"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="expense_name"><span class="requireds">*</span> Expense :</label>
							<div class="col-lg-8 col-sm-6 col-xs-12">
									<input type="text" class="form-control" name="expense_name" id="expense_name" placeholder="Expense name" value="<?php echo $row['expense_name']; ?>"
									required
									>
							</div>
						</div>
					  </div>
					  <div class="row row-edit-form">
						<div class="col-lg-6 form-group"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="expense_type_id"><span class="requireds">*</span> Type:</label>
							<div class="col-lg-8 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" id="expense_type_id" name="expense_type_id" required>
									<option value="">--Please Select --</option>
										 <?php foreach ( $expense_types as $key => $value ): ?>
										   <option value="<?php echo $key; ?>"<?php if ( isset($row['expense_type_id']) &&  $row['expense_type_id'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
										 <?php endforeach; ?>
									</select>
							</div>
						</div>
					  </div>
					<div class="row row-edit-form">
					<div class="col-lg-6 form-group"> 
						<label class="control-label col-lg-4 col-md-4 label-title-upper" for="cost_on">Cost on:</label>
						<label class="control-label label-title-upper"  for="cost_on_0">
							<input  type="radio" class="flat form-control" name="cost_on" id="cost_on_0" value="per_person" <?php if( ( isset($row['cost_on']) && $row['cost_on'] == 'cost_on' ) || (!isset($row['cost_on']) || $row['cost_on'] == '')  ){ echo 'checked="checked"'; } ?> /> Per Person</label>
						<label class="control-label label-title-upper" for="cost_on_1">	
							<input   type="radio" class="flat form-control" name="cost_on" id="cost_on_1" value="per_dept" <?php if(isset($row['cost_on']) && $row['cost_on'] == 'per_dept'){ echo 'checked="checked"'; } ?> > Per Department</label>	
						<label class="control-label label-title-upper" for="cost_on_2">	
							<input   type="radio" class="flat form-control" name="cost_on" id="cost_on_2" value="all" <?php if(isset($row['cost_on']) && $row['cost_on'] == 'all'){ echo 'checked="checked"'; } ?> > All Employees</label>		

					</div>
					</div>  
					<div class="row row-edit-form">
					<div class="col-lg-6 form-group"> 
						<label class="control-label col-lg-4 col-md-4 label-title-upper" for="expense_value_type_0">Cost of:</label>
						<label class="control-label label-title-upper"  for="expense_value_type_0">
							<input  type="radio" class="flat form-control" name="expense_value_type" id="expense_value_type_0" value="flat" <?php if( ( isset($row['expense_value_type']) && $row['expense_value_type'] == 'flat' ) || (!isset($row['expense_value_type']) || $row['expense_value_type'] == '')  ){ echo 'checked="checked"'; } ?> /> Flat Amount</label>
						<label class="control-label label-title-upper" for="expense_value_type_1">	
							<input   type="radio" class="flat form-control" name="expense_value_type" id="expense_value_type_1" value="percentage" <?php if(isset($row['expense_value_type']) && $row['expense_value_type'] == 'percentage'){ echo 'checked="checked"'; } ?> > Percentage(%)</label>	

					</div>
					</div>
					<div class="row row-edit-form">
					<div class="col-lg-6" id="div_expense_value"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="expense_value"><span class="requireds">*</span> Value :</label>
							<div class="col-lg-3  form-group col-sm-6 col-xs-12">
									<input type="text" class="form-control" name="expense_value" id="expense_value" placeholder="Value" value="<?php echo $row['expense_value']; ?>"
									required
									>
							</div>
							<div class="col-lg-3 form-group col-sm-6 col-xs-12" id="div_depend_on" style="<?php if($row['expense_value_type'] == 'percentage'){ echo 'display:block'; } ?> ">
								<select class="form-control col-lg-4 col-md-7 col-xs-12" id="depend_on" name="depend_on" <?php if($row['expense_value_type'] == 'flat'){ echo 'disabled="disabled" '; } ?> >
									<option value="">--Based On --</option>
									 <?php foreach ( $expenses_all as $key => $value ): ?>
									   <option value="<?php echo $key; ?>"<?php if ( isset($row['depend_on']) &&  $row['depend_on'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
									 <?php endforeach; ?>
								</select>
							</div>
						</div>
					  </div>
					   <div class="row row-edit-form">
						<div class="col-lg-6 form-group"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="payable_base"><span class="requireds">*</span> Payable:</label>
							<div class="col-lg-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12" id="payable_base" name="payable_base" required>
									<option value="">--Please Select --</option>
									<?php
										foreach($payable_modes as $key => $val){
										?>
											<option value="<?=$key; ?>" <?php if ( isset($row['payable_base']) &&  $row['payable_base'] == $key ) { ?> selected="selected"<?php } ?>><?=$val; ?></option>
										<?php 
										}	
									?>
									</select>
							</div>
						</div>
					  </div>
					   <div class="row row-edit-form-bottom">
						<div class="form-group">
							<div class="col-lg-6 col-lg-offset-2 ">
								
									<button type="button" onclick="this.form.action='<?php echo $listpage_url;?>';this.form.submit();" class="btn btn-danger">Cancel</button>
									<button id="send" type="submit" class="btn btn-success">Submit</button>
							</div>
						</div>
					  </div>
				 </form>	
				 <!-- form-horizontal -->	
			</div>
			 <!-- /x_content -->
		  </div>
		</div>
	  </div>
	</div>
	</div>
<?php endif; ?>	
<!-- /page content -->
<script>
<?php if (!empty($postdata['task']) && $postdata['task'] == 'save' ){ ?>
		$(document).ready(function() {
			$('#frmsave').submit();
		});
	<?php } ?>	
$(document).ready(function() {
	<?php if(!isset($row['expense_value_type']) || $row['expense_value_type'] == ''){
		?>
		$('div#div_depend_on').css('display','none');
			$('select#depend_on').prop('disabled', true);
			$('input#expense_value').removeAttr('required');
			$('input#expense_value').css('display','none');
			$('div#div_expense_value').css('display','none');
		<?php
	}?>
	$('#editform').bootstrapValidator();
	$('input[name="expense_value_type"]').on('ifClicked', function(event){
		if(this.value == 'percentage'){
			$('div#div_depend_on').css('display','block');
			$('select#depend_on').removeAttr('disabled');
			$('input#expense_value').prop('required','required');
			$('input#expense_value').css('display','block');
			$('div#div_expense_value').css('display','block');
		}
		if(this.value == 'flat'){
			$('div#div_depend_on').css('display','none');
			$('select#depend_on').prop('disabled', true);
			$('input#expense_value').removeAttr('required');
			$('input#expense_value').css('display','none');
			$('div#div_expense_value').css('display','none');
		}
	});
});	
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>