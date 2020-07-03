<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo asset_url(); ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo asset_url(); ?>/front/css/bootstrapValidator.css" rel="stylesheet">
<?php //echo "<pre>"; print_r($my_templates); echo "</pre>"; ?>
<div class="col-sm-16 col-lg-9 shadow-lg pt-2 pl-2 pr-2 pb-2 mb-5 ml-1 bg-orange action-content-div" id="div_enter_data" style="">
<div class="row">
	<div class="col-lg-12 col-sm-12 mb-2" >
	<h5 class="text-left my-0 sub-title text-dark">
		My Account  &nbsp;<i class="fas fa-angle-right"></i>&nbsp; Action &nbsp;<i class="fas fa-angle-right"></i>&nbsp; <span class="text-white">Manual data entry</span>
	</h5>
	</div>
	<div class="col-lg-12">
		<form id="frm1" class="form-horizontal" method="post" action="<?php echo base_url();?>My_Pages/save_data_entry_manual"enctype="multipart/form-data" data-bv-message="This value is not valid" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh">
			<div class="row">
				<div class="col-lg-7 col-sm-12 pb-2" >
					<div class="input-group input-group-sm  mb-2 form-group">
						<div class="input-group-prepend"> 
							<label class="input-group-text bg-white text-dark control-label" for="template_id" id="inputGroup-sizing-sm">Template ID</label> 
						</div>
						<select class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="template_id" name="template_id" onchange="javascript:showhide($(this).val());" data-bv-not-empty="true" data-bv-notempty-message="Please select template">
						<option value="">Select template</option>
						<?php foreach($my_templates as $template){?>
						
							<option value="<?php echo $template['id']; ?>" <?php if( isset($request['template_id']) && trim($request['template_id']) == $template['template_unique_id']){ echo ' selected = "selected" '; }?> ><?php echo $template['template_unique_id']; ?></option> 
							<?php 
							}
						?>
						</select>
					</div>
				</div>
				<div class="col-lg-12  col-sm-12 ">
				<?php foreach($my_templates as $template):?>
					<div class="row template-fields" id="template_fields_<?php echo $template['id']; ?>"  style="display:none;" disabled>
			 	<?php if( isset($template['template_variables']) && !empty($template['template_variables']) ): ?>
					<?php foreach($template['template_variables'] as $name => $variable):?>
						<?php $lbl = ucfirst(trim((str_replace(array('control_', '_'), array(' ', ' '), $name ))));?>
						<?php if($variable->type === 'i-text'):?>
								
								<?php 
								$type ='text';
								if (strpos($name, 'date') !== false ):
									$type ='date';
								endif;
								if (strpos($name, 'mobile') !== false ):
									$type ='tel';
								endif;
								if (strpos($name, 'email') !== false ):
									$type ='email';
								endif;
								$fld_name = str_replace('control_', '',  $name);
								?>
							<div  class="col-lg-7 mb-2 form-group">
								<div class="input-group input-group-sm ">
									<div class="input-group-prepend"> 
										<label class="input-group-text  bg-white text-dark control-label" id="inputGroup-sizing-sm" for="<?php echo $fld_name;?>" ><?php echo $lbl; ?></label> 
									</div>
								<input type="<?php echo $type; ?>" name="<?php echo $fld_name;?>" class="form-control"  data-bv-notempty="true" data-bv-notempty-message="<?php echo $lbl;?> is required" id="<?php echo $fld_name;?>" value="">
								</div>
							</div>
						<?php endif; ?>
						<?php if($variable->type === 'image' && strpos($name, 'image_scanning_method') === false):?>
							<?php $fld_name = str_replace('image_control_', '',  $name); ?>
							<div  class="col-lg-7 mb-2 form-group">
								<div class="input-group input-group-sm">
									<div class="input-group-prepend"> 
										<label class="input-group-text bg-white text-dark" for="<?php echo $fld_name;?>" id="inputGroup-sizing-sm"><?php echo $lbl; ?></label> 
									</div>
								<input type="file"  name="<?php echo $fld_name;?>"  class="form-control file-ele" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="image_control" data-bv-notempty="true" data-bv-notempty-message="<?php echo $lbl;?> is required" value="">
								</div>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>	
		<?php endforeach; ?>
							<input type="hidden" name="customer_templates_id" id="customer_templates_id" value="" />
				</div>
				<div class="col-lg-7 mt-2 mb-4" id="div_btn_submit" style="display:none;">
					<button type="submit" id="save_and_add" name="save_and_add" class="btn btn-rounded btn-shadow btn-secondary pull-right ml-2 "  role="button" value="save_and_add">Save & Add New</button>

					<button type="submit" id="save_and_close" name="save_and_close" value="save_and_close" class="btn btn-rounded btn-shadow btn-secondary pull-right ml-2" role="button" >Save & Close</button>
				</div>	
			</div>
			
		</form>
	</div>
	<div class="col-lg-12">
	<?php foreach($my_templates as $template):?>
		<table id="mydraftedcards<?php echo $template['id']; ?>" style="display:none" class="table table-bordered table-hover table-records">
			<thead class="headings">
				<th class="" tabindex="0" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Sr. No.</th>
				<?php if( isset($template['template_variables']) && !empty($template['template_variables']) ): ?>
					<?php foreach($template['template_variables'] as $name => $variable):?>
						<?php $lbl = ucfirst(trim((str_replace(array('control_', '_'), array(' ', ' '), $name ))));?>
						<th class=""><?php echo $lbl; ?></th>
						<?php endforeach; ?>
					<?php endif; ?>	
			</thead>
			<tbody>
				<tr>
				<td colspan="10" class="text-center" > No record found </td>
				</tr>
			</tbody>
		</table>
		<?php  endforeach; ?>
	</div>
	
</div>
<script src="<?php echo asset_url();?>front/js/bootstrapValidator.js"></script>
<script>
function showhide(val){
	$('table.table-records').css('display','none');
	$('div.template-fields').css('display','none');
	$('div.template-fields').prop('disabled', true);
	$('div.template-fields').find('input, select').prop('disabled', true);
	$('div#template_fields_'+val).css('display','block');
	$('div#template_fields_'+val).prop('disabled', false);
	$('div#template_fields_'+val).find('input, select').prop('disabled', false);
	$('div#div_btn_submit').css('display','block');
	$('div#div_btn_submit').prop('disabled', false);
	//$('table#mydraftedcards'+val).css('display','');
	$('input#customer_templates_id').val($('select#template_id option:selected').html());
}
$(document).ready(function() {
	showhide($('select#template_id option:selected').val());
	$('#frm1').bootstrapValidator();
});
</script>
