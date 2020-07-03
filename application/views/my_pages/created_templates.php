<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo asset_url(); ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo asset_url(); ?>/front/css/bootstrapValidator.css" rel="stylesheet">
<?php //echo "<pre>"; print_r($my_templates); echo "</pre>"; ?>
<div class="col-sm-16 col-lg-9 shadow-lg pt-2 pl-2 pr-2 pb-2 mb-5 ml-1 bg-orange action-content-div" id="div_enter_data" style="">
<div class="row">
	<div class="col-lg-12 col-sm-12 mb-2" >
	<h5 class="text-left my-0 sub-title text-dark">
		My Account  &nbsp;<i class="fas fa-angle-right"></i>&nbsp; Action &nbsp;<i class="fas fa-angle-right"></i>&nbsp; <span class="text-white">Created templates</span>
	</h5>
	</div>
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
										<select class="form-control font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="search_by" name="search_by">
										<option value="">Select template</option>
										<?php foreach($my_templates as $template){?>
										
										<?php $tname = $template['template_unique_id']; ?>
											<option value="<?php echo trim($tname); ?>" <?php if(isset($postdata['template_id'])  && $postdata['template_id'] === trim($tname ) ) { echo ' selected="selected" '; }?>><?php echo trim($tname ); ?></option>
										<?php }
										?>
										</select>
									</div>
								</div>
								<div class="col-lg-3 col-sm-3 div-search-by" >
									<div class="input-group input-group-sm">
										<select class="form-control  font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="search_by" name="search_by">
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
								
									<button class="btn btn-white btn-shadow btn-rounded text-orange mr-1 px-2 bg-hover-secondary" name="search_data_by_select" id="search_data_by_select" role="button" aria-pressed="true" type="submit" title="Submit search"><i class="fa fa-search"></i></button>
									
									<button title="Reset search" class="btn btn-white btn-shadow btn-rounded resetfilter text-orange px-2 bg-hover-secondary" id="configreset"  role="button" type="submit" name="reset" value="reset"><i class="fa fa-undo"></i></button>
								</div>
								<div class="col-lg-1 col-sm-3 div-show-records px-0">
									<div class="input-group input-group-sm">
										<select class="form-control pull-right" aria-label="Small" aria-describedby="inputGroup-sizing-sm"  id="limit" name="limit" onchange="$('#page').val(1); this.form.submit();" title="Show records per page">
										<option value="" >Show</option>
											<option value="5" <?php if( isset($postdata['limit']) && $postdata['limit'] === 5){ echo 'selected="selected" '; } ?> >5</option>
											<option value="10" <?php if( isset($postdata['limit']) && $postdata['limit'] === 10){ echo 'selected="selected" '; } ?>  >10</option>
											<option value="20"  <?php if( isset($postdata['limit']) && $postdata['limit'] === 20){ echo 'selected="selected" '; } ?> >20</option>
											<option value="30"  <?php if( isset($postdata['limit']) && $postdata['limit'] === 30){ echo 'selected="selected" '; } ?> >30</option>
											<option value="50"  <?php if( isset($postdata['limit']) && $postdata['limit'] === 50){ echo 'selected="selected" '; } ?> >50</option>
											<option value="100"  <?php if( isset($postdata['limit']) && $postdata['limit'] === 100){ echo 'selected="selected" '; } ?> >100</option>
										</select>
									</div>
								</div>
				</form>
			<!-- /.box-header -->
			
		</div>
	<div class="col-lg-12">
        <div class="row" id="div_list_thumb_to_upload" >   
            <?php 
            if( count($my_templates) > 0 ){
                foreach( $my_templates as $my_template ){
                    if( isset($my_template['template_svg']) && $my_template['template_svg'] != '' &&  $my_template['template_name'] != '' ) { 
						$preferences =  array();
						if(isset($my_template['template_preferences'])){
							$preferences = (array) json_decode($my_template['template_preferences']);
						}
						?>
						<!-- Card-->

						<div class="col-lg-4">
							<!-- Product 2 -->
							<div class="card mb-4 product-card product-card-category overlay-hover">
								<!-- Hover content -->
								<div class="overlay-hover-content overlay-op-7">
								<div class="text-left pull-left"><small class="text-orange"> ID</small><small class="text-white"> <?php echo $my_template['template_unique_id']; ?></small> </div>
								<?php if(!empty($preferences)){ ?>
									<div class="text-left pull-left"><small class="text-orange"> Orientation</small><small class="text-white"> <?php echo ucfirst($preferences['orientation']);?></small> </div>
									<div class="text-left pull-left"><small class="text-orange"> Card type</small><small class="text-white"> <?php echo ucfirst($preferences['card_type']);?></small> </div>
									<div class="text-left pull-left"><small class="text-orange"> Sides</small><small class="text-white"> <?php echo ucfirst($preferences['sides']);?></small> </div>
									<div class="text-left pull-left"><small class="text-orange"> With chip</small><small class="text-white"> <?php echo ucfirst($preferences['has_chip']);?></small> </div>
									<?php 
									if(isset($preferences['has_chip']) && $preferences['has_chip'] == 'yes' && isset($preferences['chip_type'])) { 
										?>
										<div class="text-left pull-left"><small class="text-orange"> Chip type</small><small class="text-white"> <?php echo ucfirst($preferences['chip_type']);?></small> </div>
									<?php } ?>
									<?php if(isset($preferences['scanner']) && $preferences['scanner'] !== '') { 
										?>
										<div class="text-left pull-left"><small class="text-orange"> Scanner type</small><small class="text-white"> <?php echo ucfirst($preferences['scanner']);?></small> </div>
									<?php } ?>
									<?php if(isset($preferences['finish']) && $preferences['finish'] !== '') { 
										?>
										<div class="text-left pull-left"><small class="text-orange"> Finishing type </small><small class="text-white"> <?php echo ucfirst($preferences['finish']);?></small> </div>
									<?php } ?>
									<div class="text-left pull-left"><small class="text-orange"> Date: </small><small class="text-white"> <?php echo $my_template['date_time'];?></small> </div>
									
								<?php } ?>
								
								<a href="javascript:void(0);" class="font-weight-light text-white" onclick="javascript:edittemplate('<?php echo base64_encode($my_template['id']); ?>','0');" >Edit front</i></a>
								<?php if(isset( $my_template['template_svg_back']) &&  $my_template['template_svg_back'] != '' ) { ?>
									<a href="javascript:void(0);"  class="font-weight-light text-white"  onclick="javascript:edittemplate('<?php echo base64_encode($my_template['id']); ?>','1');" >Edit back</i></a>
									<a href="javascript:void(0);"  class="font-weight-light text-white" onclick="javascript:edittemplate('<?php echo base64_encode($my_template['id']); ?>','1');" >View back side <i class="fa fa-sync pl-2 pr-2"></i></a>
								<?php } ?>
								</div>
								<!-- Image & price content -->
								<div class="pos-inherit">
								<div class="card-img-top img-fluid template-svg px-3 py-3">  <?php  echo $my_template['template_svg']; ?>  </div>
								</div>
								<?php if(isset( $my_template['template_svg_back']) &&  $my_template['template_svg_back'] != '' ) { ?>
								<div class="pos-inherit d-none">
								<div class="card-img-top img-fluid template-svg px-3 py-3">  <?php  echo $my_template['template_svg_back']; ?>  </div>
								</div>
								<?php } ?>
								<!-- Content -->
								<small class="ml-3"><?php echo ucwords($my_template['template_name']); ?> FRONT SIDE</small>
								</div>
							</div>
						<!-- /Card-->
						<?php if(isset( $my_template['template_svg_back']) &&  $my_template['template_svg_back'] != '' ) { ?>
						<div class="col-lg-4">
							<!-- Product 2 -->
							<div class="card mb-4 product-card product-card-category overlay-hover">
								<!-- Hover content -->
								<div class="overlay-hover-content overlay-op-7">
								<div class="text-left pull-left"><small class="text-orange"> Backside </small><small class="text-white"> <?php echo $my_template['template_unique_id']; ?></small> </div>
								
								<a href="javascript:void(0);"  class="font-weight-light text-white" onclick="javascript:edittemplate('<?php echo base64_encode($my_template['id']); ?>','1');" >Edit back side <i class="fa fa-sync pl-2 pr-2"></i></a>
								</div>
								<!-- Image & price content -->
								<div class="pos-inherit">
									<div class="card-img-top img-fluid template-svg px-3 py-3">  <?php  echo $my_template['template_svg_back']; ?>  </div>
								</div>
								
								<!-- Content -->
								<small class="ml-3"><?php echo $my_template['template_name']; ?> BACK SIDE</small>
								</div>
							</div>
						<!-- /Card-->
								<?php } ?>
                    	<?php } ?>
                    <?php }?>
				<?php }else{ ?>
					<table class="table mr-3 ml-3 table-hover">
						<tbody>
							<tr> 
								<td>
									<div class="row no-gutters ml-4 mr-4">
									<div class="col-lg-12 text-small text-center text-secondary">No template created.</div>
									</div>
								</td>
						</tr>
					</tbody>
				</table>
						
				<?php } ?>
            </div>  
            <!-- form to upload data excel sheet for the selected template -->
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
}
$(document).ready(function() {
	$('#frm1').bootstrapValidator().on('success.form.bv', function(e) {
		// Prevent form submission
		e.preventDefault();
		var url = '<?php echo $ajax_url; ?>';
		var $form = $(e.target);
		var bv = $form.data('bootstrapValidator');
		// Use Ajax to submit form data
		$.post(url, $form.serialize(), function(result) {
			var obj = $.parseJSON(result);
			if(obj.status == 'success'){
				//if( update_official_info(obj)) 
				//$("#modal_official_info").modal('toggle');
			}
		});
		$('.btn-success').prop("disabled", false);
	});	
});
</script>
