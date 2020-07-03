    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card_body">
                    <div class="tempalets_status_box">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#check" role="tab" data-toggle="tab">Check Content</a></li>
                            <!-- <li role="presentation"><a href="#upload_excel" role="tab" data-toggle="tab">Upload Excel</a></li>
                            <li role="presentation"><a href="#complete_order" role="tab" data-toggle="tab"> Place Order</a></li> -->
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content template_act">
                            <div role="tabpanel" class="tab-pane active" id="check">
								<div class="row">
									<div class="col-sm-6">
										<div class="col-sm-9">
											<div class="card_body sidebar_featured_templets">
												<div class="col-sm-12">
													<h4 class="title_contact_detail wow fadeInUp">Template selection</h4>
												</div>
												<ul class="list_quick_btn">
													<li><a href="#"><div class="col-lg-6">Design Name </div> <div class="col-lg-6"> <?php echo $card['template']['template_name']; ?> </div></a></li>
													<li><a href="#"><div class="col-lg-6">Orientation </div> <div class="col-lg-6"> <?php echo $card['orientation']['label']; ?> </div></a></li>
													<li><a href="#"><div class="col-lg-6">Card Type </div> <div class="col-lg-6"> <?php echo $card['chemical_or_smart']['label']; ?> </div></a></li>
													<?php $scan = (isset($card['scanner']['value']) && $card['scanner']['value'] != '') ?  $card['scanner']['label'] : 'None'; ?>
													<li><a href="#"><div class="col-lg-6">Scanning Method </div> <div class="col-lg-6"> <?php echo $scan; ?> </div></a></li>
												<?php if($card['chemical_or_smart']['label'] == 'Smart Card') { ?>
													<li><a href="#"><div class="col-lg-6"> Chip Type </div><div class="col-lg-6"> <?php echo $card['card_type']['label']; ?>  </div></a></li>
													<li><a href="#"><div class="col-lg-6"> Side </div><div class="col-lg-6"> <?php echo $card['sides']['label']; ?>  </div></a></li>
													<li><a href="#"><div class="col-lg-6"> Finishin Type  </div><div class="col-lg-6"> <?php echo $card['finish']['label']; ?>  </div></a></li>
												<?php } ?>
													
												</ul>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="card_wrap_part">
											<div class="crad_item_part">
											   <img src="<?php echo base_url(); ?>uploads/templates/<?php echo $card['template']['template_image_path'] ;?>" alt="" class="img-responsive">
											   <div class="card_item_block">
												</div> 
											</div>
										</div>
									</div>
								</div>
								<div class="proceed_step_btn">
									<button type="button"   data-animation="animated zoomInRight" data-toggle="modal" data-target="#confirm_order" title="Confirm Order"  class="btn btn-default pull-right">Proceed for order <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
								</div>
                            </div>
							<div role="tabpanel" class="tab-pane " id="view_selection">
								<div class="row">
									<div class="col-sm-6">
										<div class="col-sm-12">
											<div class="card_body sidebar_featured_templets">
												<ul class="list_quick_btn">
													<li><a href="#">View Profile</a></li>
													<li><a href="#">Download Sample FIle</a></li>
													<li><a href="#">Upload Excel</a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="col-sm-2">
										<div class="">
										 &nbsp;
										</div> 
									</div>
									<div class="col-sm-4">
										<div class="card_wrap_part">
											<div class="crad_item_part">
											   <img src="<?php echo base_url(); ?>uploads/templates/<?php echo $card['template']['template_image_path'] ;?>" alt="" class="img-responsive">
											   <div class="card_item_block">
												</div> 
											</div>
										</div>
									</div>
								</div>
                            </div>
							<div role="tabpanel" class="tab-pane " id="upload_excel">
								
                            </div>
							<div role="tabpanel" class="tab-pane " id="complete_order">
                            </div>
                        </div>                    
                    </div>

                </div>
            </div>
		 <!-- <div class="col-sm-4">
                <div class="card_body">
                    <ul class="list_quick_btn">
                        <li><a href="#">View Profile</a></li>
                        <li><a href="#">Change Password</a></li>
                        <li><a href="#">Upload Excel</a></li>
                    </ul>
                </div>
            </div> -->
		</div>
    </div>
<!-- Tempalets Approve Popup -->
<div class="modal fade" id="confirm_order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog div_confirm_order" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
      <div class="modal-body">
	  <div class="row">
			<div class="col-lg-12">
				<h4 class="text-center">Are you sure to proceed for order?</h4>
			</div>
			<div class="col-lg-12">
			</div>
			<div class="col-lg-6">
				<button class="btn btn-warning pull-left" id="go_back" onclick="javascript:calltoaction('<?php echo $form_go_back_id; ?>');">  <i class="fa fa-arrow-left" aria-hidden="true"></i> No, Go to Template Selection</button>
			</div>
			<div class="col-lg-6">
				<button class="btn btn-success pull-right" id="confrrm" onclick="javascript:calltoaction('<?php echo $form_confirm_id; ?>');">Yes, proceed  <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
			</div>
      </div>
      </div>
    </div>
  </div>
</div>
<form id="<?php echo $form_confirm_id; ?>" method="post" action="<?php echo base_url();?>index.php/Carts/myitems?token=<?php echo rand(5000,10000); ?>">
	<?php  echo "<pre>";print_r($card); echo "</pre>"; ?>
	<input type="hidden" name="preferences[chemical_or_smart]" value="<?php echo $card['chemical_or_smart']['value']; ?>" >
	<input type="hidden" name="preferences[card_type]" value="<?php if(isset($card['card_type']) && isset($card['card_type']['value']))echo $card['card_type']['value']; ?>" >
	<input type="hidden" name="preferences[rfid_or_mifre]" value="<?php if( isset($card['rfid_or_mifre']) && isset($card['rfid_or_mifre']['value']) ) echo $card['rfid_or_mifre']['value']; ?>" >
	<input type="hidden" name="preferences[sides]" value="<?php if(isset($card['sides']) && isset($card['sides']['value'])) echo $card['sides']['value']; ?>" >
	<input type="hidden" name="preferences[scanner]" value="<?php if(isset($card['scanner'])  && isset($card['scanner']['value']) ) echo $card['scanner']['value']; ?>" >
	<input type="hidden" name="preferences[finish]" value="<?php if(isset($card['scanner']) && isset($card['scanner']['value'])) echo $card['finish']['value']; ?>" >
	<input type="hidden" name="preferences[orientation]" value="<?php if(isset($card['orientation']) && isset($card['orientation']['value'])) echo $card['orientation']['value']; ?>" >
	<input type="hidden" name="preferences[template_id]" value="<?php echo $card['template']['id']; ?>" >
	<input type="hidden" name="last_cart_id" value="<?php echo $last_cart_id; ?>" >
	<input type="hidden" name="task" value="save_template" >
	</form>
<form id="<?php echo $form_go_back_id; ?>" method="post" action="<?php echo base_url();?>index.php/Studio/draw?token=<?php echo rand(5000,10000); ?>">
	<?php // echo "<pre>";print_r($card); echo "</pre>"; ?>
	<input type="hidden" name="preferences[chemical_or_smart]" value="<?php if(isset($card['chemical_or_smart']) && isset($card['chemical_or_smart']['form_value'])) echo $card['chemical_or_smart']['form_value']; ?>" >
	<input type="hidden" name="preferences[card_type]" value="<?php if ( isset($card['card_type']) && isset($card['card_type']['form_value']) ) echo $card['card_type']['form_value']; ?>" >
	<input type="hidden" name="preferences[rfid_or_mifre]" value="<?php if( isset($card['rfid_or_mifre'])  && isset($card['rfid_or_mifre']['form_value']) )echo $card['rfid_or_mifre']['form_value']; ?>" >
	<input type="hidden" name="preferences[sides]" value="<?php if(isset($card['sides'])  && isset($card['sides']['form_value']) ) echo $card['sides']['form_value']; ?>" >
	<input type="hidden" name="preferences[scanner]" value="<?php if(isset($card['scanner']) && isset($card['scanner']['form_value']) )echo $card['scanner']['form_value']; ?>" >
	<input type="hidden" name="preferences[finish]" value="<?php if(isset($card['finish']) && isset($card['finish']['form_value']))  echo $card['finish']['form_value']; ?>" >
	<input type="hidden" name="preferences[orientation]" value="<?php if( isset($card['orientation'])  && isset($card['orientation']['form_value']) ) echo $card['orientation']['form_value']; ?>" >
	<input type="hidden" name="preferences[template_id]" value="<?php echo $card['template']['id']; ?>" >
</form>
<script>
$(document).ready(function(){
	var _html = '';
	_html = _html + '<ul class="list_quick_btn">';
	$('.card_item_block').find('input, textarea').each(function(){
		if($(this).attr("id")){
					_html = _html+'<li>';
						_html = _html+$(this).attr("label");
						var _name = $(this).attr("id");
						_html = _html+'<input type="checkbox" name="'+_name+'" id="'+_name+'" value=""  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >';
						// _html = _html+'<input type="checkbox" name="'+_name+'" id="'+_name+'" value="" />';
					_html = _html+'</li>';
		}		
			
		
	});
	_html = _html + '</ul>';
	//$('.sidebar_featured_templets').html('');
	//$('.sidebar_featured_templets').html(_html);
		$('input, textarea').on('keyup', function(){
		var ele = $(this).attr('name');
		$('#'+ele).val($(this).val());
	});
});
//<input type="checkbox"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
//upload image proifile*/
$(document).ready(function() {
    
var readURL = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.profile-pic').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$(".file-upload").on('change', function(){
    readURL(this);
});

$(".upload-button").on('click', function() {
   $(".file-upload").click();
});
});
function calltoaction(frmid){
	document.getElementById(frmid).submit();
}
//uplload image profile*/
</script>
    