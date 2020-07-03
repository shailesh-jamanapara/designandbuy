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
				  <form class="form-horizontal form-label-left" novalidate method="post" action="" id="editform" data-bv-message="This value is not valid" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" enctype="multipart/form-data">
					<input type="hidden" name="task" id="task" value="save" />
					<input type="hidden" name="id" id="id" value="<?php echo $model['id']; ?>" />
					<input type="hidden" name="search_for" id="order_type" value="<?php echo $postdata['search_for']; ?>" />
					<input type="hidden" name="search_by" id="sort_by" value="<?php echo $postdata['search_by']; ?>" />
					<input type="hidden" name="sort_by" id="order_type" value="<?php echo $postdata['sort_by']; ?>" />
					<input type="hidden" name="order_type" id="order_type" value="<?php echo $postdata['order_type']; ?>" />
					<input type="hidden" name="page" id="order_type" value="<?php echo $postdata['page']; ?>" />
					<input type="hidden" name="limit" id="limit" value="<?php echo $postdata['limit']; ?>" />
					<div class="row row-edit-form">
						<div class="col-lg-9"> 
							<label class="control-label col-lg-2 col-md-4 label-title-upper" for="user_id"><span class="requireds">*</span> Employee:</label>
							<div class="col-lg-6 col-sm-6 col-xs-12 form-group ">
									<select class="form-control col-md-7 col-xs-12" id="user_id" name="user_id" data-bv-notempty="true" data-bv-notempty-message="Please select employee">
									<option value="">--Please Select Employee--</option>
										 <?php foreach ( $employees as $employee ): ?>
										 <?php 
										 $employee_name =   $employee['title']. " " .ucfirst(strtolower($employee['first_name']));
										 $employee_name = (isset($employee['middle_name']))? $employee_name ." ". ucfirst(strtolower($employee['middle_name'])) : $employee_name;
										 $employee_name = (isset($employee['last_name']))? $employee_name ." ". ucfirst(strtolower($employee['last_name'])) : $employee_name;
										 $employee_name .= " [ ".$employee['username']." ]";
										 ?>
										   <option value="<?php echo $employee['id']; ?>"<?php if ( isset($row['user_id']) &&  $row['user_id'] == $employee['id'] ) { ?> selected="selected"<?php } ?>><?php echo  $employee_name; ?></option>
										 <?php endforeach; ?>
									</select>
							</div>
						</div>
						</div>
						<div class="row row-edit-form">
						<div class="col-lg-9"> 
						<?php // echo "<pre>"; print_r($row); exit;     [2] => 2160.00   [6] => 17711.88    [1] => 18000.00 ?>
							<label class="control-label col-lg-2 col-md-4 label-title-upper" for="expense_id"><span class="requireds">*</span> Expense:</label>
							<div class="col-lg-10 col-sm-6 col-xs-12 ">
									<?php if(!empty($row_expenses)){ ?>
										<div class="x_content" style="display: block; border:none !important">
										<?php foreach($row_expenses as $key => $val ){
											$expense_value = (isset($val['expense_value'])) ? ' expense_value="'.$val['expense_value'].'"' : '';
										?> 
											<input type="hidden" name="expense_type_id[<?php echo $key; ?>]" value="<?php echo $val['expense_type_id'] ;?>" />
											<div class="col-lg-7 col-md-1 col-sm-3 col-xs-12 form-group <?php if(isset($val['depend_on'])) echo str_replace(" ","", $val['depend_on']);else echo 'div_individual'; ?>">   
														 <input type="checkbox" value="<?php echo  $key ;?>" name="expense_id_lbl[<?php echo $key; ?>]" id="expense_id_lbl<?php echo  $key ;?>"  class="flat form-control check_expense_id" <?php foreach($val as $k=>$v) echo  $k.'="'.str_replace(" ","", $v).'"' ;?> <?php if( array_key_exists($key,$row)  ) echo ' checked="checked"'; ?>> <label class="lbl_username"> <?php echo   ucfirst( implode(" ", $val))  ;?>  </label>
														
											</div>
											<div class="col-lg-3 col-md-1 col-sm-3 col-xs-12 form-group <?php if(isset($val['depend_on'])) echo str_replace(" ","", $val['depend_on']);else echo 'open_div';?>">   
														<input <?php foreach($val as $k=>$v) echo  $k.'_input="'.str_replace(" ","", $v).'"' ;?> id="expense_id<?php echo $val['expense_name']; ?>" name="expense_value[<?php echo  $key ;?>]" value="<?php if(isset($row) && isset($row[$key])) echo $row[$key];?>" <?php if(strtolower($val['expense_name']) == 'basic') echo ' onBlur="javascript:setNextValue(this.value);" onFocus="javascript:setNextValue(this.value);"';?> <?php echo $expense_value; ?> class="form-control col-md-7 col-xs-12 <?php if(isset($val['depend_on'])) echo str_replace(" ","", $val['depend_on']);else echo 'text_individual'; ?>" type="text" placeholder="Value" data-bv-stringlength="true" data-bv-stringlength-min="3" data-bv-stringlength-max="10" data-bv-stringlength-message="Please enter Min. 3 digits. Max. 10 digits." data-bv-regexp-message="Please enter only numeric value" data-bv-regexp="true" data-bv-regexp-regexp="^[0-9.]+$"  value="5000">
														
											</div>
								
										<?php } ?>
									</div>
									<?php } ?>
							</div>
						</div>
						</div>
						<div class="row row-edit-form">
						<div class="col-lg-9 form-group "> 
							<label class="control-label col-lg-2 col-md-4 label-title-upper" for="approved_by"><span class="requireds">*</span> Approved By:</label>
							<div class="col-lg-6 col-sm-6 col-xs-12">
									<select class="form-control col-md-7 col-xs-12 <?php echo $row['approved_by'] ;?>" id="approved_by" name="approved_by" data-bv-notempty="true" data-bv-notempty-message="Please select approved by" >
									<option value="">--Please Select --</option>
										 <?php foreach ( $managers as $employee ): ?>
										 <?php 
										 $employee_name =   $employee['title']. " " .$employee['first_name'];
										 $employee_name = (isset($employee['middle_name']))? $employee_name ." ". $employee['middle_name'] : $employee_name;
										 $employee_name = (isset($employee['last_name']))? $employee_name ." ". $employee['last_name'] : $employee_name;
										 $employee_name .= " [ ".$employee['username']." ]";
										 ?>
										   <option value="<?php echo $employee['id']; ?>"<?php if ( isset($row['approved_by']) &&  $row['approved_by'] == $employee['id'] ) { ?> selected="selected"<?php } ?>><?php echo  $employee_name; ?></option>
										 <?php endforeach; ?>
									</select>
							</div>
						</div>
						</div>
						<div class="row row-edit-form">
						<div class="col-lg-9"> 
							<label class="control-label col-lg-2 col-md-4 label-title-upper" for="effecting_from"><span class="requireds">*</span> Effecting From:</label>
							<div class="col-lg-4 col-sm-6 col-xs-12 form-group ">
									<input required id="effecting_from" name="effecting_from" value="<?php echo $row['effecting_from']; ?>" class="date-picker form-control col-md-7 col-xs-12 " type="text" placeholder="mm/dd/yyyy" >
									<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
							</div>
							<!-- 
							<div class="col-lg-2 col-sm-6 col-xs-12 i_hint">
							mm/dd/yyy	
							</div>
							-->
						</div>
						</div>
						<div class="row row-edit-form">
						<div class="col-lg-9"> 
							<div class="form-group">
							<div class="col-lg-6 col-lg-offset-2">
								
									<button type="button" onclick="this.form.action='<?php echo $listpage_url;?>';this.form.submit();" class="btn btn-danger">Cancel</button>
									<button id="send" type="submit" class="btn btn-success">Submit</button>
							</div>
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
<div class="modal " tabindex="-1" id="modal_alert" role="dialog" aria-hidden="true" >
	<div class="modal-dialog modal-sm">
	  <div class="modal-content">

		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
		  </button>
		  <h4 class="modal-title" id="myModalLabel2">Employee Is Required</h4>
		</div>
		<div class="modal-body">
		  <h4>Please select Employee </h4>
		 
		</div>	
		<div class="modal-footer">
		  <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
		</div>

	  </div>
	</div>
  </div>
<!-- /page content -->
<script>
<?php if (!empty($postdata['task']) && $postdata['task'] == 'save' ){ ?>
		$(document).ready(function() {
			$('#frmsave').submit();
		});
	<?php } ?>	
$(document).ready(function() {
	$('#effecting_from').on('change', function(e) { 
		$('#frm').bootstrapValidator('revalidateField', 'effecting_from');
	
	});
	$('.check_expense_id').on('ifChecked', function (){ 
		$('div.on'+$(this).attr('expense_name')).css('display','block'); 
	});
	//$('.check_expense_id').on('ifUnchecked', function (){ $('div.on'+$(this).attr('expense_name')).css('display','none'); });	
	
	setNextValue($('#expense_idBasic').val());
	$('#editform').bootstrapValidator();	
	if($('select#user_id').val() != ''){
		//$('.check_expense_id').trigger('click').prop('checked','checked');
		$('div.div_individual').css('display','block');
		$('div.open_div').css('display','block');
	}
});
function setNextValue(value){
	$('input.onBasic').each(function(){
		$(this).val($(this).val()+'.00');
		var expense_value  = $(this).attr('expense_value');
		if(typeof expense_value !== typeof undefine && expense_value !== false ){
			var arr = expense_value.split('%');
			var percent = $.trim(arr[0]);
			var devide = Number(value / 100);
			var net_amt = Number(devide*percent);
			$(this).val(Math.floor(net_amt * 100) / 100);
			if($(this).attr('payable_base_input') == 'PerAnnum'){
				var net_amt = Number($(this).val())*12;
				net_amt = Math.floor(net_amt * 100) / 100;
				$(this).val(net_amt);
			}
			if($(this).attr('payable_base_input') == 'AfterFourYears'){
				var net_amt = Number($(this).val())*48;
				net_amt = Math.floor(net_amt * 100) / 100;
				$(this).val(net_amt);
			}
			$(this).prop('readonly', 'readonly');
			
		}
	});
}
	
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>