<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo asset_url(); ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo asset_url(); ?>/front/css/bootstrapValidator.css" rel="stylesheet">
<?php echo "<pre>"; print_r($my_templates); echo "</pre>"; ?>
<div class="col-sm-16 col-lg-9 shadow-lg pt-2 pl-2 pr-2 pb-2 mb-5 ml-1 bg-orange action-content-div" id="div_enter_data" style="">
<div class="row">
	<div class="col-lg-12 col-sm-12 mb-2" >
	<h5 class="text-left my-0 sub-title text-dark">
		My Account  &nbsp;<i class="fas fa-angle-right"></i>&nbsp; Action &nbsp;<i class="fas fa-angle-right"></i>&nbsp; <span class="text-orange">Drafted ID cards</span>
	</h5>
	</div>
	<div class="col-lg-12">
	<div class="row">
		<div class="col-sm-12 col-lg-12 pb-3 filter-part">
		<form class="form-inline" name="frmsearch" id="frmsearch" method="post" action="">
		
							
							<input type="hidden" name="task" id="task" value="">
							<input type="hidden" name="user_type" id="user_type" value="">
							<input type="hidden" name="id" id="id" value="">
							<input type="hidden" name="page" id="page" value="">
							<input type="hidden" name="sort_by" id="sort_by" value="">
							<input type="hidden" name="order_type" id="order_type" value="ASC">
							<input type="hidden" name="listpage_url" id="listpage_url" value="http://localhost/muktjivanpixels/My_Pages/myaccount?token=Ojox">
							<input type="hidden" name="view_type" id="view_type" value="list">
								<div class="col-lg-3 col-sm-3 div-search-by" >
									<div class="input-group input-group-sm">
										<select class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="search_by" name="search_by">
										<option value="">Select template</option>
										<?php foreach($columns as $column){?>
										
										<?php 
										if(strpos($column, 'photo_') === false){
										$column_name = ucwords(str_replace('_',' ',$column));?>
											<option value="temp_students.<?php echo $column; ?>" <?php if($postdata['search_by'] === $column ) { echo ' selected="selected" '; }?>><?php echo $column_name; ?></option>
										<?php }
											}
										?>
										</select>
									</div>
								</div>
								<div class="col-lg-3 col-sm-3 div-search-by" >
									<div class="input-group input-group-sm">
										<select class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="search_by" name="search_by">
										<option value="">Search by</option>
										<?php foreach($columns as $column){?>
										
										<?php 
										if(strpos($column, 'photo_') === false){
										$column_name = ucwords(str_replace('_',' ',$column));?>
											<option value="temp_students.<?php echo $column; ?>" <?php if($postdata['search_by'] === $column ) { echo ' selected="selected" '; }?>><?php echo $column_name; ?></option>
										<?php }
											}
										?>
										</select>
									</div>
								</div>
								<div class="col-lg-3 col-sm-3  div-search-for" >
									<div class="input-group input-group-sm">
										<input type="text" placeholder="Search for" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="search_for" id="search_for">
										
									</div>
								</div>
								<div class="col-lg-2 col-sm-1">
								
									<button class="btn btn-white btn-shadow btn-rounded text-orange mr-1 px-2" name="search_data_by_select" id="search_data_by_select" role="button" aria-pressed="true" type="submit" title="Submit search"><i class="fa fa-search"></i></button>
									
									<button title="Reset search" class="btn btn-white btn-shadow btn-rounded resetfilter text-orange px-2" id="configreset"  role="button" type="submit" name="reset" value="reset"><i class="fa fa-undo"></i></button>
								</div>
								<div class="col-lg-1 col-sm-3 div-show-records">
									<div class="input-group input-group-sm">
										<select class="form-control pull-right" aria-label="Small" aria-describedby="inputGroup-sizing-sm"  id="limit" name="limit" onchange="$('#page').val(1); this.form.submit();" title="Show records per page">
										<option value="" >Show</option>
											<option value="5" <?php if($postdata['limit'] === 5){ echo 'selected="selected" '; } ?> >5</option>
											<option value="10" <?php if($postdata['limit'] === 10){ echo 'selected="selected" '; } ?>  >10</option>
											<option value="20"  <?php if($postdata['limit'] === 20){ echo 'selected="selected" '; } ?> >20</option>
											<option value="30"  <?php if($postdata['limit'] === 30){ echo 'selected="selected" '; } ?> >30</option>
											<option value="50"  <?php if($postdata['limit'] === 50){ echo 'selected="selected" '; } ?> >50</option>
											<option value="100"  <?php if($postdata['limit'] === 100){ echo 'selected="selected" '; } ?> >100</option>
										</select>
									</div>
								</div>
				</form>
			<!-- /.box-header -->
			
		</div>
		<!-- /.col -->
	<div class="col-sm-12 col-lg-12">
		<div class="">
			<div class="box-body">
			
				
				<table id="mydraftedcards" class="table table-bordered table-hover">
				<thead class="headings">
				<?php if( isset($rows) &&  count($rows) > 0 ){ ?>
				<tr>
				<th class="" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Sr. No.</th>
				<?php foreach($columns as $column){?>
				<?php $column_name = ucwords(str_replace('_',' ',$column));?>
					<th class="" column="" state="none"  ><?php echo $column_name; ?> 
					<?php if(strpos($column, 'photo_') === false){
						if(strpos($column, 'mobile') !== false){
							$class_fa = 'fa-sort-numeric-asc';
						}else{
							$class_fa = 'fa-sort-alpha-asc';
						}
						?> <i class="fa <?php echo $class_fa; ?> "> <?php } ?>
					
					</th>
				<?php }?>
				</tr>
				<?php }?>
				</thead>
				<tbody>
					
				<?php  if(!empty($rows)) :  $i = 1; foreach($rows as $row) :  $id = base64_encode($row['id']); ?>
					<tr>
						<td><?php echo $i; ?></td>
						<?php foreach($columns as $column){?>
							<td >
						<?php
							if(strpos($column, 'photo_') !== false){
								$photo = str_replace('.', '_new.',$row[$column]);	
								echo '<img src="'.base_url().$photo.'" width="28" height="28" >';
							}else{
								echo $row[$column];
							}
							?>
							</td>
						<?php }?>
					</tr>
				<?php  $i++; endforeach; endif; ?>
				<?php  if(empty($rows)) : ?> <td colspan="8" class="text-center" > No record found </td> <?php endif; ?>
				<tbody>
				</table>
				<?php if(count($rows) > 0) { echo print_pagination_front($total_records, $total_pages, $postdata['page'], $postdata['limit']); } ?>
				</form>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
	<!-- /.col -->
	
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
