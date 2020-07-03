<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo asset_url(); ?>/front/studio/fabric.js"></script>
<style>
.col-lg-3 {
    -ms-flex: 0 0 24.5%;
    flex: 0 0 24.5%;
    max-width: 24.5%;
}
i.fa-check{
   margin-top: -4px;
}
i.fa-exclamation  {
   margin-top: -4px;
}
</style>
<?php //echo "<pre>"; print_r($my_templates); echo "</pre>"; ?>
<div class="col-sm-16 col-lg-9 shadow-lg pt-2 pl-2 pr-2 pb-2 mb-5 ml-1 bg-orange action-content-div" id="div_enter_data" style="">
<div class="row">
	<div class="col-lg-9 col-sm-12 mb-3 pt-1" >
	<h5 class="text-left my-0 sub-title text-default">
		My Account  &nbsp;<i class="fas fa-angle-right"></i>&nbsp;My Data &nbsp;<i class="fas fa-angle-right"></i> <span class="text-primary">Reviewed & verified I-Cards</span>
   </h5>
   <small class=" font-weight-light text-small text-default"><strong>Note:</strong> Order will be proceed for verified I-Cards only</small>
   </div>
   <div class="col-lg-3 col-sm-12  pt-1" >
        
         <div class="custom-control pull-right "id="div_proceed_order" >
          <button type="button" class="btn btn-rounded btn-shadow btn-outline-primary border-w-1 pull-right ml-2 font-weight-normal" name="proceed_order" id="proceed_order">Proceed order &nbsp; <i class="fa fa-arrow-right"></i></button>
         </div>
   </div>
   <div class="col-sm-12 col-lg-12 pb-1 filter-part">
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
										<select class="form-control font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="templates_id" name="templates_id" onchange="$('#page').val(1); this.form.submit();">
										<option value="">Select template</option>
										<?php foreach($my_templates as $template){?>
										
										<?php $tname = $template['template_unique_id']; ?>
											<option value="<?php echo trim($tname); ?>" <?php if(isset($postdata['templates_id'])  && $postdata['templates_id'] === trim($tname ) ) { echo ' selected="selected" '; }?>><?php echo trim($tname ); ?></option>
										<?php }
										?>
										</select>
									</div>
								</div>
								<div class="col-lg-3 col-sm-3 div-search-by" >
									<div class="input-group input-group-sm">
										<select class="form-control  font-weight-bold" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="search_by" name="search_by">
										<option value="">Search by</option>
										<?php foreach($columns as $key => $column){?>
										
										<?php 
										if(strpos($column, 'photo_') === false){ ?>
											<option value="<?php echo $table_name.'.'.$key; ?>" <?php if($postdata['search_by'] === $key ) { echo ' selected="selected" '; }?>><?php echo $column; ?></option>
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
											<option value="10" <?php if($postdata['limit'] == 10){ echo 'selected="selected" '; } ?>  >10</option>
											<option value="20"  <?php if($postdata['limit'] == 20){ echo 'selected="selected" '; } ?> >20</option>
											<option value="30"  <?php if($postdata['limit'] == 30){ echo 'selected="selected" '; } ?> >30</option>
											<option value="50"  <?php if($postdata['limit'] == 50){ echo 'selected="selected" '; } ?> >50</option>
											<option value="100"  <?php if($postdata['limit'] == 100){ echo 'selected="selected" '; } ?> >100</option>
										</select>
									</div>
								</div>
				</form>
			<!-- /.box-header -->
		</div>
      <!-- /.col -->
      <form name="frm2" id="frm2" class="" action="" method="">
         
	<div class="col-lg-12">
      <div class="row mt-1 pt-1 ml-1 mr-1 " id="idcards">
           <!-- /.col -->
             <?php  if(!empty($rows)) :  $i = 1; foreach($rows as $row) :  $id = base64_encode($row['id']); ?>
                        <div  class="col-lg-3 col-md-3 pl-1 pr-1 pb-1 pt-1 bg-gray bordered" style="" title="Please click on Radio button and verify this ID card">
                              <div class="row div-card-block">
                                 <div  class="col-lg-12 col-md-12">
                                    <canvas  id="canvas_<?php echo $row['id'];?>" height="285" width="190"></canvas>
                                 </div>
                                 <div class="col-lg-12 col-md-12  pb-2 pt-2">
                                      
                                       <input type="hidden" class="idcards" value="1" id="<?php echo $row['id'];?>" name="id_cards[<?php echo $row['id'];?>]">

                                       <input type="hidden" class="template_unique_ids" value="<?php echo $row['customer_templates_id']; ?>" id="template_unique_ids<?php echo $row['id'].$row['customer_templates_id'];?>" name="template_unique_ids_<?php echo $row['id'];?>">

                                       <input type="hidden" class="template_ids" value="<?php echo $my_templates[$row['customer_templates_id']]['templates_id']; ?>" id="" name="template_ids_<?php echo $row['id'];?>">
                                       <small class="text-success" ><i class="fa fa-check  "></i> Verified</small>
                                 </div>
                              </div>
                        </div>
                     <?php  $i++; endforeach; endif; ?>
                     <?php  if(empty($rows)) : ?> <div class="col-lg-12 col-md-12  text-center"> No record found.</div> <?php endif; ?>
      </div>
   </div>
   </form>
	   
   <div class="col-lg-12 mt-2"> <?php if(count($rows) > 0) { echo print_pagination_front($total_records, $total_pages, $postdata['page'], $postdata['limit']); } ?> </div>
</div>
<!-- Modal Save my template  -->
<div class="modal" id="modal_save_icards" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="width: 35%;top: 33%;left: 31%;">
   <div class="modal-dialog modal-content-full-width" role="document">
      <div class="modal-content">
      <button type="button" title="Cancle" class="" close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close pull-right py-1 px-1 "></i></button>
         <div class="modal-body">
            
            <div class="">
               <div class="form-group">
                  <div class="col-lg-10 col-md-12 control-label mb-2" >Please enter your login password to save I-Cards</div>
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
<!-- Modal Save my template  -->
<div class="modal" id="modal_progress" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="width: 35%;top: 33%;left: 31%;">
   <div class="modal-dialog modal-content-full-width" role="document">
      <div class="modal-content">
         <div class="modal-body text-center">
			<button class="btn btn-primary" type="button" disabled>
			<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
			 Importing photos. Please wait...
		</button>
         </div>
      </div>
   </div>
</div>
<script language="javascript">
var cwidth = '';
<?php  if(!empty($rows)) :  $i = 1; foreach($rows as $row) :  $id = base64_encode($row['id']); ?>
var json = '<?php echo str_replace('"function () { [native code] }"','null', $row['icard_json']);  ?>';
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

   //var div_with_svg = '<div class="col-lg-3 col-md-3 pl-1 pr-1 pt-1 pb-1">'+to_svg+'</div>';
   //$('div#idcards').append(div_with_svg);           
function onObjectSelected(e, cwidth) {
   var objectType = e.target.get('type');
   if( objectType === 'i-text'){
      e.target.set('width',cwidth);
      e.target.set('textAlign','center');
      console.log('object', e.target);
   }
}                    
<?php  $i++; endforeach; endif; ?>
$('input.custom-control-input').on('change', function(){
   if($(this).is(":checked")){
      $(this).parent().find('small.title-checked').html('<i class="fa fa-check text-success"> Verified</i>');
   }else{
      $(this).parent().find('small.title-checked').html('<i class="fa fa-exclamation  text-primary "> Verification pending</i>');
      $('input.check-verification-all').not(this).prop('checked', this.checked).parent().find('small.title-checked').html('Verify all cards');
   }
      

   $('input.check-verification').each(function(){
      if(!$(this).is(":checked")){
         disable_proceed_button(false);
      return false;
      }else{
         disable_proceed_button(true);
      }
   });
});
$('input.check-verification-all').on('change',function(){
      if(!$(this).is(":checked")){
         
            $(this).parent().find('small.title-checked').html('Verify all cards');
            
            disable_proceed_button(false); 
            $('input:checkbox').not(this).prop('checked', this.checked).parent().find('small.title-checked').html('<i class="fa fa-exclamation  text-primary "> </i>&nbsp;Verification Pending');
            return false;
         
      }else{
         if(confirm('Are you sure to verify below all I-Cards?')){
            disable_proceed_button(true);
            $(this).parent().find('small.title-checked').html('<i class="fa fa-check text-success"></i> &nbsp;Verified all cards');
            $('input:checkbox').not(this).prop('checked', this.checked).parent().find('small.title-checked').html('<i class="fa fa-check text-success"></i> &nbsp;Verified');
         }
         
      }
   });
$(document).ready(function(){
   $('input.check-verification').each(function(){
   if(!$(this).is(":checked")){
      disable_proceed_button(false);
      return false;
   }else{
      disable_proceed_button(true);
   }
});
});
function disable_proceed_button(state){
   return true;
 /*   if(state === true){
      $('div#div_proceed_order').removeClass('d-none'); 
      return true;
   }
   if(state === false){
      $('div#div_proceed_order').addClass('d-none'); 
      return false;
   } */
}
$('button#proceed_order').on('click', function(){
  if( confirm('Are you sure to proceed order for <?php echo count($rows);?> verified I-Cards?') ){
   var icards =  {};
   var unique_ids =  {};
   var template_ids =  {};
   $('input.idcards').each(function(){
      icards[$(this).attr('id')]=1;
   });
   $('input.template_unique_ids').each(function(){
      unique_ids[$(this).attr('name')]=$(this).val();
   });
   $('input.template_ids').each(function(){
      template_ids[$(this).attr('name')]=$(this).val();
   });
   console.log(frmData);
   var url = '<?php echo $ajax_url; ?>/proceedOrderCustomersIdCards';
   var templates_id = $('select#templates_id').val();
   var pwd = $('input#password').val();
   $.ajax({
        url: url,
        data : {"templates_id":templates_id, "icards":JSON.stringify(icards), "unique_ids":JSON.stringify(unique_ids), "template_ids":JSON.stringify(template_ids), "task":'save_verified','pwd':pwd},
        type:'POST',
        dataType:'json',
        success: function(result){
            $('#modal_save_icards').modal('hide');
            console.log(result);
            if(result.status == 'success'){
               window.location = '<?php echo base_url();?>/My_Pages/idcards/reviewed';
            //return false;
            }
        }
    });
  }
  
});
$('#btn_save').on('click', function(){
   if(!$('input#password').val()){
      alert('Password is required');
      return false;
   }
   console.log($('form#frm2').serialize());
   var frmData =  {};
   $('input.idcards').each(function(){
         frmData[$(this).attr('id')]=1;
   });
   console.log(frmData);
   var url = '<?php echo $ajax_url; ?>/proceedOrderCustomersIdCards';
   var templates_id = $('select#templates_id').val();
   var pwd = $('input#password').val();
   $.ajax({
        url: url,
        data : {"templates_id":templates_id, "icards":JSON.stringify(frmData), "task":'save_verified','pwd':pwd},
        type:'POST',
        dataType:'json',
        success: function(result){
            $('#modal_save_icards').modal('hide');
            console.log(result);
            if(result.status == 'success'){
               window.location = '<?php echo base_url();?>/My_Pages/idcards/reviewed';
            //return false;
            }
        }
    });
});
</script>
