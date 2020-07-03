<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo asset_url(); ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo asset_url(); ?>/front/css/bootstrapValidator.css" rel="stylesheet">
<?php //echo "<pre>"; print_r($my_templates); echo "</pre>"; ?>
<div class="col-sm-16 col-lg-9 shadow-lg pt-2 pl-2 pr-2 pb-2 mb-5 ml-1 bg-orange action-content-div" id="div_enter_data" style="">
<div class="row">
	<div class="col-lg-6 col-sm-12 mb-2" >
	<h5 class="text-left my-0 sub-title text-dark px-1">
		My Account  &nbsp;<i class="fas fa-angle-right"></i>&nbsp; Action &nbsp;<i class="fas fa-angle-right"></i>&nbsp; <span class="text-primary"><?php if(isset($this->request['SUB_ACTION'])) echo ucfirst($this->request['SUB_ACTION']); else echo"All"; ?> I-Cards data </span>
	</h5>
	</div>	
	<div class="col-lg-3 col-sm-12 mb-2" >
         <div class="custom-control custom-switch pull-right">
            <input type="checkbox" class="custom-control-input check-verification-all" id="verify_all">
            <label class="custom-control-label font-weight-light text-small text-primary" for="verify_all"><small class="title-checked">Select all records</small></label>
         </div>
	</div>	 
	<div class="col-lg-3 col-sm-12 mb-2" >
		<a href="javascript:void(0);" class="btn btn-white btn-rounded text-primary btn-shadow pull-right mr-2 pl-2 pr-2 bg-hover-secondary  <?php if($postdata['view_type'] == 'grid') echo 'active';?>" title="Show cards view" onclick="javascript:switchview(1);"><i class="fa fa-address-card"></i></a>

		<a href="javascript:void(0);" class="btn btn-white btn-rounded text-primary btn-shadow  pull-right mr-2 pl-2 pr-2 bg-hover-secondary <?php if($postdata['view_type'] == 'list') echo 'active';?>" title="Show table view" onclick="javascript:switchview(0);"><i class="fa fa-table"></i></a>
		<a href="javascript:void(0);" id="proceed_delete" class="btn btn-white btn-rounded text-primary btn-shadow pull-right mr-2 pl-2 pr-2 bg-hover-secondary" title="Delete selected records"><i class="fa fa-trash"></i></a>
	</div>
	<div class="col-lg-12">
	<div class="row">
	<div class="col-sm-12 col-lg-12 pb-3 filter-part">
		<form class="form-inline" name="frmsearch" id="frmsearch" method="post" action="">
							<input type="hidden" name="task" id="task" value="">
							<input type="hidden" name="user_type" id="user_type" value="">
							<input type="hidden" name="id" id="id" value="">
							<input type="hidden" name="page" id="page" value="<?php echo $postdata['page'];?>">
							<input type="hidden" name="sort_by" id="sort_by" value="">
							<input type="hidden" name="order_type" id="order_type" value="ASC">
							<input type="hidden" name="listpage_url" id="listpage_url" value="http://localhost/muktjivanpixels/My_Pages/myaccount?token=Ojox">
							<input type="hidden" name="view_type" id="view_type" value="<?php echo $postdata['view_type'];?>">
								<div class="col-lg-3 col-sm-3 div-search-by" >
									<div class="input-group input-group-sm">
										<select class="form-control font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="templates_id" name="templates_id"  onchange="$('#page').val(1); this.form.submit();">
										<option value="">Select template</option>
										<?php $i=0;?>
										<?php foreach($my_templates as $template){?>
										<?php $tname = $template['template_unique_id']; ?>
											<option value="<?php echo trim($tname); ?>" <?php if(isset($postdata['templates_id'])  && $postdata['templates_id'] === trim($tname ) ) { echo ' selected="selected" '; }elseif($i ==  0 ){ echo ' selected="selected" '; } ?>><?php echo trim($tname ); ?></option>
										<?php 
											$i++;
											}
										?>
										</select>
									</div>
								</div>
								<div class="col-lg-3 col-sm-3 div-search-by" >
									<div class="input-group input-group-sm">
										<select class="form-control  font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="search_by" name="search_by">
										<option value="">Search by</option>
										<?php foreach($columns[$postdata['templates_id']] as $key => $column){?>
										
										<?php 
										if(strpos($column, 'photo_') === false){ ?>
											<option value="<?php echo $table_name.'.'.$key; ?>" <?php if($postdata['search_by'] === $column ) { echo ' selected="selected" '; }?>><?php echo $column; ?></option>
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
	<div class="col-sm-12 col-lg-12" id="icards_list">
		<div class="">
			<div class="box-body">
			
				
				<table id="mydraftedcards" class="table table-bordered table-hover">
				<thead class="headings">
				<?php if( isset($rows) &&  count($rows) > 0 ){ ?>
				<tr>
				<th class="" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Sr. No.</th>
				<?php foreach($columns[$postdata['templates_id']] as $column){?>
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
						<td>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input check-verification bg-primary" value="1" id="<?php echo $row['id'];?>" name="id_cards[<?php echo $row['id'];?>]">
							<label class="custom-control-label font-weight-light text-small text-primary" for="<?php echo $row['id'];?>"><small class="title-checked"><?php echo $i; ?></small></label>
						</div>
						</td>
						<?php foreach($columns[$postdata['templates_id']] as $key => $column){?>
							<td >
								<?php
									if(strpos($key, 'photo_') !== false){
										//$photo = str_replace('.', '_new.',$row[$key]);
										$photo = $row[$key];	
										echo '<img src="'.base_url().UPLOAD_PHOTO_PATH.$postdata['templates_id'].'/'.$photo.'" width="28" height="28" >';
									}else{
										echo $row[$key];
									}
									?>
									</td>
						<?php }?>
					</tr>
				<?php  $i++; endforeach; endif; ?>
				<?php  if(empty($rows)) : ?> <td colspan="8"  >
					<div class="row">
						<div class="col-lg-12 text-center text-secondary bordered mb-2">No record found for selected template id <?php echo $postdata['templates_id']; ?></div>
						<div class="col-lg-12 text-center text-secondary mb-3">You can import using excel file or do manual data entry.</div>
						<div class="col-lg-3 text-center mb-2">
							<a href="<?php echo base_url(); ?>My_Pages/upload_sheet" class="mb-2 btn  btn-secondary btn-shadow  btn-rounded text-default pt-2  pr-3  pb-2  pl-3 pull-left  " role="button" id="btn_data_entry_link"><i class="fa fa-upload pull-left  text-default"></i>&nbsp;Upload data excel </a>
						</div>
					
						<div class="col-lg-6 text-center mb-2">
							<a href="<?php echo base_url(); ?>My_Pages/download_sample_sheet" class="mb-2 btn  btn-secondary btn-shadow  btn-rounded text-default pt-2  pr-3  pb-2  pl-3  " role="button" id="btn_data_entry_link"><i class="fa fa-download pull-left  text-default"></i>&nbsp;Download sample sheet </a>
						</div>
						<div class="col-lg-3 text-center text-secondary">
							<a href="<?php echo base_url(); ?>My_Pages/data_entry_manual?template_id=<?php echo $postdata['templates_id']; ?>" class="mb-2 btn  btn-secondary btn-shadow  btn-rounded text-default pt-2  pr-3  pb-2  pl-3 pull-right  " role="button" id="btn_data_entry_link"><i class="fa fa-edit pull-left  text-default"></i>&nbsp;Manual data entry </a>
						</div>
					</div>	
				</td> <?php endif; ?>
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
	<!-- Grid I-cards view -->
	<div class="col-lg-12 d-none" id="icards_grid">
      <div class="row mt-1 pt-1 ml-1 mr-1 " id="idcards">
           <!-- /.col -->
		   <?php 
		 	if($template_type === 'vertical'){
				$col_lg = '3';
				$canvas['height']='286';
				$canvas['width']='190';
			 }else{
				$col_lg = '6';
				$canvas['height']='190';
				$canvas['width']='286';
			 }  
			 ?>
             <?php  if(!empty($rows)) :  $i = 1; foreach($rows as $row) :  $id = base64_encode($row['id']); ?>
			 			
                        <div  class=" pl-1 pr-1 pb-1 pt-1 bg-gray bordered" style="" title="Please click on Radio button and verify this ID card">
                              <div class="row div-card-block">
                                 <div  class="col-lg-12 col-md-12">
                                    <canvas  id="canvas_<?php echo $row['id'];?>" height="<?php echo $canvas['height']; ?>" width="<?php echo $canvas['width']; ?>"></canvas>
								 </div>
								 <div  class="col-lg-12 col-md-12">
			 						<small>Front side</small>
								</div>
                              </div>
						</div>
						<?php if(isset($row['icard_json_back'])){ ?>
							<div  class=" pl-1 pr-1 pb-1 pt-1 bg-gray bordered" style="">
                              <div class="row div-card-block">
                                 <div  class="col-lg-12 col-md-12">
                                    <canvas  id="canvas_back_<?php echo $row['id'];?>" height="<?php echo $canvas['height']; ?>" width="<?php echo $canvas['width']; ?>"></canvas>
								 </div>
								 <div  class="col-lg-12 col-md-12">
			 						<small>Back side</small>
								</div>
                              </div>
						</div>
						<?php } ?>
					 <?php  $i++; endforeach; endif; ?>
					 
                     <?php  if(empty($rows)) : ?> <div class="col-lg-12 col-md-12  text-center"> No record found.</div> <?php endif; ?>
								
    
	  </div>
	  <div class="col-lg-12 mt-2"> <?php if(count($rows) > 0) { echo print_pagination_front($total_records, $total_pages, $postdata['page'], $postdata['limit']); } ?> </div>
	</div>
	
	<!-- //Grid I-cards view -->
	
</div>
	</div>
</div>
<!-- Modal delete my records  -->
<div class="modal" id="modal_delete_icards" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="width: 35%;top: 33%;left: 31%;">
   <div class="modal-dialog modal-content-full-width" role="document">
      <div class="modal-content">
      <button type="button" title="Cancle" class="" close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close pull-right py-1 px-1 "></i></button>
         <div class="modal-body">
            
            <div class="">
               <div class="form-group">
                  <div class="col-lg-10 col-md-12 control-label mb-2" >Please enter your login password to delete selected records</div>
                  <div class="col-lg-10  col-md-12 mb-2">
                     <input type="password" name="password" id="password" class="form-control" value="" />
                  </div>
                  <div class="col-lg-12  col-md-12 ">
                     <button type="submit" id="btn_save" class="btn btn-primary btn-rounded pull-right pl-2 pr-2" >Next &nbsp;<i class="fa fa-arrow-right"></i></button>
                  </div>
               </div>
            </div>
         </div>
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
<script language="javascript">
var cwidth = '';
<?php  if(!empty($rows)) :  $i = 1; foreach($rows as $row) :  $id = base64_encode($row['id']); 
$json =  trim($row['icard_json']);
$json_back =  (isset($row['icard_json_back'])) ? trim($row['icard_json_back']) : '';
?>
var json = '<?php echo $json; ?>';
var json_back = '<?php echo $json_back; ?>';
//var json = '';
//console.log(json);
json = json.replace(/(\r\n|\n|\r)/gm, "\\n");
   var canvas = window._canvas = new fabric.Canvas('canvas_<?php echo $row['id'];?>');
   canvas.loadFromJSON(json, canvas.renderAll.bind(canvas), function(o, object) {
      //object.text = 'center';
      if( (object.type == 'i-text' || object.type == 'image' ) && object.textAlign == 'center' ){
         var rest_left = 0;
         var obj_width = object.width;
         var obj_half_width = Math.round(obj_width / 2);
         //console.log('obj_half_width', obj_half_width);
         cwidth = canvas.getWidth();
         var divided = Math.round(cwidth/2);
         //console.log('divided', divided);
          rest_left =  Math.round( divided - obj_half_width );
         //console.log('rest_left',rest_left);
         //if(rest_left > 0 )
            object.left = rest_left;
            object.lockMovementY = true;
			object.lockMovementX = true;
      }
      object.hasControls = object.hasBorders = false;
      //object.lockMovementY = true;
      //object.lockMovementX = true;

      object.on('object:selected', onObjectSelected);
      canvas.requestRenderAll();

   });

   canvas.requestRenderAll();
   canvas.includeDefaultValues = true;
   var to_svg = canvas.toSVG();
if(json_back != '' ){
		//var json = '';
		//console.log(json);
		json_back = json_back.replace(/(\r\n|\n|\r)/gm, "\\n");
		var canvas = window._canvas = new fabric.Canvas('canvas_back_<?php echo $row['id'];?>');
		canvas.loadFromJSON(json_back, canvas.renderAll.bind(canvas), function(o, object) {
			//object.text = 'center';
			if( (object.type == 'i-text' || object.type == 'image' ) && object.textAlign == 'center' ){
				var rest_left = 0;
				var obj_width = object.width;
				var obj_half_width = Math.round(obj_width / 2);
				//console.log('obj_half_width', obj_half_width);
				cwidth = canvas.getWidth();
				var divided = Math.round(cwidth/2);
				//console.log('divided', divided);
				rest_left =  Math.round( divided - obj_half_width );
				//console.log('rest_left',rest_left);
				//if(rest_left > 0 )
					object.left = rest_left;
					object.lockMovementY = true;
					object.lockMovementX = true;
			}
			object.hasControls = object.hasBorders = false;
			//object.lockMovementY = true;
			//object.lockMovementX = true;

			object.on('object:selected', onObjectSelected);
			canvas.requestRenderAll();

		});

		canvas.requestRenderAll();
		canvas.includeDefaultValues = true;
		var to_svg = canvas.toSVG();
}
   //var div_with_svg = '<div class="col-lg-3 col-md-3 pl-1 pr-1 pt-1 pb-1">'+to_svg+'</div>';
   //$('div#idcards').append(div_with_svg);           
function onObjectSelected(e, cwidth) {
   var objectType = e.target.get('type');
   
   if( objectType === 'i-text'){
	   if( IsNaN(e.target.get('text')) === false  ){
		e.target.get('text').toString();
	   }
      e.target.set('width',cwidth);
      e.target.set('textAlign','center');
      console.log('object', e.target);
   }
}                    
<?php  $i++; endforeach; endif; ?>

function disable_proceed_button(state){
   if(state === true){
      $('a#btn_proceed_order').css('display','block'); 
      return true;
   }
   if(state === false){
      $('a#btn_proceed_order').css('display','none'); 
      return false;
   }
}
function switchview(flag){
	if(flag === 1){
		$('div#icards_list').fadeOut('slow');
		$('div#icards_list').addClass('d-none');
		$('div#icards_grid').fadeIn('slow');
		$('div#icards_grid').removeClass('d-none');
		$('input#view_type').val('grid');
	}
	if(flag === 0){
		$('div#icards_list').fadeIn('slow');
		$('div#icards_list').removeClass('d-none');
		$('div#icards_grid').fadeOut('slow');
		$('div#icards_grid').addClass('d-none');
		$('input#view_type').val('list');
	}
}
$('input.check-verification-all').on('change',function(){
      if(!$(this).is(":checked")){
            $(this).parent().find('small.title-checked').html('Select all records');
            $('input:checkbox').not(this).prop('checked', this.checked);
      }else{
		$('input:checkbox').not(this).prop('checked', this.checked);
         
      }
	  return false;
   });
   $('a#proceed_delete').on('click', function(){
   console.log($('form#frm2').serialize());
   var frmData = [];
   $('input.check-verification').each(function(){
      if($(this).is(":checked")){
         frmData.push($(this).attr('id'),'1');
      }
   });
   
   if(frmData.length <= 0 || frmData.length == undefined ){
      alert('You did not verifiedselected any record');
      return false;
   }else{
      $('#modal_delete_icards').modal('show');
   }
  
});
$('#btn_save').on('click', function(){
   if(!$('input#password').val()){
      alert('Password is required');
      return false;
   }
   console.log($('form#frm2').serialize());
   var frmData =  {};
   $('input.check-verification').each(function(){
      if($(this).is(":checked")){
         frmData[$(this).attr('id')]=$(this).val();
      }
   });
   console.log(frmData);
   var url = '<?php echo $ajax_url; ?>/deleteCustomersSelectedRecords';
   var pwd = $('input#password').val();
   $.ajax({
        url: url,
        data : {"icards":JSON.stringify(frmData),'pwd':pwd},
        type:'POST',
        dataType:'json',
        success: function(result){
            $('#modal_delete_icards').modal('hide');
            console.log(result);
            if(result.status == 'success'){
               window.location = '<?php echo base_url();?>/My_Pages/myaccount';
            //return false;
            }
        }
    });
});
</script>

