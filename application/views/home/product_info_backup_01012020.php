<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<link href="<?php echo asset_url(); ?>front/css/product-info.css" rel="stylesheet" type="text/css" />
<link href="<?php echo asset_url(); ?>/front/studio/css/checkbox.css" rel="stylesheet">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<div class="featured_templates_content">
   <div class="container">
      <form action="" name="" id="frm3" method="post" >
		<input type="hidden" name="task" id="task" value="add_to_cart" />
		<input type="hidden" name="preferences[product_id]" id="product_id" value="<?php echo $product['id'];?>" />
		<input type="hidden" name="preferences[orientation]" id="orientation"  value="<?php if( isset($preferences) && $preferences != '')echo $preferences['orientation'];?>"  >
	<!-- product -->
	<div class="product-content product-wrap clearfix product-detail">
		<div class="row">
				<div class="col-md-4 col-sm-10 col-xs-10 ">
					<div class="product-image">
						<div id="myCarousel-2" class="carousel slide">
						<ol class="carousel-indicators">
							<li data-target="#myCarousel-2" data-slide-to="0" class=""></li>
							<li data-target="#myCarousel-2" data-slide-to="1" class="active"></li>
							<li data-target="#myCarousel-2" data-slide-to="2" class=""></li>
						</ol>
						<div class="carousel-inner">
							<!-- Slide 1 -->
							<div class="item active">
								<img src="<?php echo base_url().$product['product_image']; ?>" alt="">
							</div>
							<!-- Slide 3 -->
							<div class="item">
								<img src="<?php echo base_url().$product['product_image']; ?>" alt="">
							</div>
						</div>
						<a class="left carousel-control" href="#myCarousel-2" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
						<a class="right carousel-control" href="#myCarousel-2" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card_left_option_menu">
						<div class="panel-group" id="accordion_card" role="tablist" aria-multiselectable="true">
							<div class="panel panel-default div_chemical_or_smart">
								<div class="panel-heading " role="tab" id="headingOne">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion_card" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											ID Card Category
										</a>
									</h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
								<?php
								$chemical = ( isset($preferences['chemical_or_smart']) && $preferences['chemical_or_smart'] == 'chemical') ? array('checked'=> 'checked="checked"', 'class'=>'active') : array('checked'=> '', 'class'=>'') ;
								$smart = ( isset($preferences['chemical_or_smart']) && $preferences['chemical_or_smart'] == 'smart') ? array('checked'=> 'checked="checked"', 'class'=>'active') : array('checked'=> '', 'class'=>'') ;
								?>
								
									<div class="panel-body">
										<div class="btn-group btn-group-toggle" data-toggle="buttons">
                                          <label class="btn btn-secondary <?php echo $smart['class']; ?>"  title="Select Smart">
                                            <input type="radio"  name="preferences[chemical_or_smart]" id="smart" value="smart" autocomplete="off" <?php echo $smart['checked']; ?>  > SMART
                                          </label>
                                          <label class="btn btn-secondary <?php echo $chemical['class']; ?> "  title="Select Chemical">
                                            <input type="radio" name="preferences[chemical_or_smart]" id="chemical" value="chemical"  <?php echo $chemical['checked']; ?> autocomplete="off"> CHEMICAL
                                          </label>
                                          <label class="btn btn-secondary-reset "  title="Reset ID Card Category">
                                            <input type="radio"  name="preferences[chemical_or_smart]" id="reset" value="none" autocomplete="off" > <i class="fa fa-refresh"></i>
                                          </label>
                                        </div>
									</div>
								</div>
							</div>
							<div class="panel panel-default div_card_type">
								<div class="panel-heading" role="tab" id="headingTwo">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_card" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
											ID Card Type
										</a>
									</h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
									<div class="panel-body">
											<?php
												$simple = ( isset($preferences['card_type']) && $preferences['card_type'] == 'without_chip') ? array('checked'=> 'checked="checked"', 'class'=>'active') : array('checked'=> '', 'class'=>'') ;
												$chip = ( isset($preferences['card_type']) && $preferences['card_type'] == 'with_chip')  ? array('checked'=> 'checked="checked"', 'class'=>'active') : array('checked'=> '', 'class'=>'') ;
											?>
										<div class="btn-group btn-group-toggle" data-toggle="buttons">
                                          <label class="btn btn-secondary  <?php echo $simple['class']; ?>"  title="Select Simple Card">
                                            <input type="radio" name="preferences[card_type]" id="without_chip" value="without_chip" autocomplete="off"  <?php echo $simple['checked']; ?> > SIMPLE CARD
                                          </label>
                                          <label class="btn btn-secondary  <?php echo $chip['class']; ?>"  title="Select Chemical">
                                            <input type="radio" name="preferences[card_type]" id="with_chip" value="with_chip" <?php echo $chip['checked']; ?>  autocomplete="off"> WITH CHIP
                                          </label>
                                          <label class="btn btn-secondary-reset "  title="Reset ID Card Type">
                                            <input type="radio" name="preferences[card_type]" id="reset" autocomplete="off" value="" > <i class="fa fa-refresh"></i>
                                          </label>
                                        </div>
									</div>
								</div>
							</div>
							<div class="panel panel-default div_sides">
							<?php
								$single = ( isset($preferences['sides']) && $preferences['sides'] == 'single') ? array('checked'=> 'checked="checked"', 'class'=>'active') : array('checked'=> '', 'class'=>'') ;
								$both = ( isset($preferences['sides']) && $preferences['sides'] == 'both') ?  array('checked'=> 'checked="checked"', 'class'=>'active') : array('checked'=> '', 'class'=>'') ;
							?>
								<div class="panel-heading" role="tab" id="headingThree">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_card" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
											ID Card sides
										</a>
									</h4>
								</div>
								<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
									<div class="panel-body">
									
										<div class="btn-group btn-group-toggle" data-toggle="buttons">
                                          <label class="btn btn-secondary <?php echo $single['class'];?>"  title="Select Single">
                                            <input type="radio" name="preferences[sides]"  id="single" value="single" autocomplete="off"  <?php echo $single['checked'];?> > SINGLE
                                          </label>
                                          <label class="btn btn-secondary <?php echo $both['class'];?>"  title="Select Both">
                                            <input type="radio" name="preferences[sides]" id="both" value="both" <?php echo $both['checked'];?> autocomplete="off"> BOTH
                                          </label>
                                          <label class="btn btn-secondary-reset "  title="Reset ID Card Sides">
                                            <input type="radio"  name="preferences[sides]"  id="reset" value="none" autocomplete="off" > <i class="fa fa-refresh"></i>
                                          </label>
                                        </div>

									</div>
								</div>
							</div>
							<?php
							$rfid = ( isset($preferences['rfid_or_mifre']) && $preferences['rfid_or_mifre'] == 'rfid') ? array('checked'=> 'checked="checked"', 'class'=>'active') : array('checked'=> '', 'class'=>'') ;
							$mifre = ( isset($preferences['rfid_or_mifre']) && $preferences['rfid_or_mifre'] == 'mifare') ?  array('checked'=> 'checked="checked"', 'class'=>'active') : array('checked'=> '', 'class'=>'') ;
							?>
							<div class="panel panel-default div_rfid_or_mifre">
								<div class="panel-heading" role="tab" id="headingfour">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_card" href="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
											ID Card Chip
										</a>
									</h4>
								</div>
								<div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
									<div class="panel-body">
										<div class="btn-group btn-group-toggle" data-toggle="buttons">
                                          <label class="btn btn-secondary <?php echo $rfid['class']; ?>"  title="Select RFID">
                                            <input type="radio" name="preferences[rfid_or_mifre]"  id="rfid" value="rfid" autocomplete="off" <?php echo $rfid['checked']; ?>  > RFID
                                          </label>
                                          <label class="btn btn-secondary <?php echo $mifre['checked']; ?>"  title="Select MiFARE">
                                            <input type="radio" name="preferences[rfid_or_mifre]" id="mifare" value="mifare" <?php echo $mifre['checked']; ?> autocomplete="off"> MiFARE
                                          </label>
                                          <label class="btn btn-secondary-reset "  title="Reset ID Card Chip">
                                            <input type="radio"  name="preferences[rfid_or_mifre]"  id="reset" value="none" autocomplete="off" > <i class="fa fa-refresh"></i>
                                          </label>
                                        </div>
									</div>
								</div>
							</div>
							<?php
							$bar = ( isset($preferences['scanner']) && $preferences['scanner'] == 'barcode') ? array('checked'=> 'checked="checked"', 'class'=>'active') : array('checked'=> '', 'class'=>'') ;
							$qr = ( isset($preferences['scanner']) && $preferences['scanner'] == 'qrcode') ? array('checked'=> 'checked="checked"', 'class'=>'active') : array('checked'=> '', 'class'=>'') ;
							?>
							<div class="panel panel-default div_scanner">
								<div class="panel-heading" role="tab" id="headingfive">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_card" href="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
											Bar Code or QR Code
										</a>
									</h4>
								</div>
								<div id="collapsefive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
									<div class="panel-body">
										
										<div class="btn-group btn-group-toggle" data-toggle="buttons">
                                          <label class="btn btn-secondary <?php echo $bar['class']; ?>"  title="Select Barcode">
                                            <input type="radio" name="preferences[scannere]"  id="barcode" value="barcode" autocomplete="off" <?php echo $bar['checked']; ?>  > BARCODE
                                          </label>
                                          <label class="btn btn-secondary <?php echo $qr['class']; ?>"  title="Select QR Code">
                                            <input type="radio" name="preferences[scanner]" id="qrcode" value="qrcode" <?php echo $qr['checked']; ?> autocomplete="off"> QR CODE
                                          </label>
                                          <label class="btn btn-secondary-reset "  title="Reset Scanning Method">
                                            <input type="radio"  name="preferences[rscanner]"  id="reset" value="none" autocomplete="off" > <i class="fa fa-refresh"></i>
                                          </label>
                                        </div>
									</div>
								</div>
							</div>
							<?php
							$glossy = ( isset($preferences['finish']) && $preferences['finish'] == 'glossy') ? array('checked'=> 'checked="checked"', 'class'=>'active') : array('checked'=> '', 'class'=>'') ;
							$matt = ( isset($preferences['finish']) && $preferences['finish'] == 'matt') ? array('checked'=> 'checked="checked"', 'class'=>'active') : array('checked'=> '', 'class'=>'') ;
							?>
							<div class="panel panel-default div_finish">
								<div class="panel-heading " role="tab" id="headingsix">
									<h4 class="panel-title">
										<a class="collapsed bottom" role="button" data-toggle="collapse" data-parent="#accordion_card" href="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
											ID Card Finish
										</a>
									</h4>
								</div>
								<div id="collapsesix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingsix">
									<div class="panel-body">
										
										<div class="btn-group btn-group-toggle" data-toggle="buttons">
                                          <label class="btn btn-secondary <?php echo $glossy['class']; ?>"  title="Select Glossy">
                                            <input type="radio" name="preferences[scannere]"  id="glossy" value="glossy" autocomplete="off" <?php echo $glossy['checked']; ?>  > GLOSSY
                                          </label>
                                          <label class="btn btn-secondary  <?php echo $glossy['class']; ?>"  title="Select Matt">
                                            <input type="radio" name="preferences[scanner]" id="matt" value="matt" <?php echo $matt['checked']; ?> autocomplete="off"> MATT
                                          </label>
                                          <label class="btn btn-secondary-reset "  title="Reset ID Cards Paper finishing type">
                                            <input type="radio"  name="preferences[rscanner]"  id="reset" value="none" autocomplete="off" > <i class="fa fa-refresh"></i>
                                          </label>
                                        </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-5 col-sm-11 col-xs-11">

				<h2 class="name">
					<?php echo $product['product_name']; ?>
					<small>Type <a href="javascript:void(0);"><?php echo $product['product_category_name']; ?></a></small>
					<i class="fa fa-star fa-2x text-primary"></i>
					<i class="fa fa-star fa-2x text-primary"></i>
					<i class="fa fa-star fa-2x text-primary"></i>
					<i class="fa fa-star fa-2x text-primary"></i>
					<i class="fa fa-star fa-2x text-muted"></i>
					<span class="fa fa-2x"><h5>(109) Votes</h5></span>
					<a href="javascript:void(0);">109 customer reviews</a>
				</h2>
				<hr>
				<h3 class="price-container">
					INR. <?php echo $product['base_price']; ?>.00
					<small>*includes tax</small>
				</h3>
				<div class="certified">
					<ul>
						<li><a href="javascript:void(0);">Delivery time<span>5 Working Days*</span></a></li>
						<li><a href="javascript:void(0);">Certified<span>Quality Assured</span></a></li>
					</ul>
				</div>

				<hr>
				</div>




					<!-- <div class="col-sm-12 col-md-6 col-lg-6">
						<div class="btn-group pull-right">
							<button class="btn btn-white"><i class="fa fa-star"> </i> Add to wishlist </button>

						</div>
						-->
						<div class="col-md-12">
        					<div class="row">
								<div class="col-lg-8 pull-right">
									<div class="row">
										<div class=" col-lg-5"  onclick="javascript:submitForm('0');"  >
											<div class="btn-my-template">
												<h4>BROWSE OUR TEMPLATES </h4>
												<span><i class="fa fa-folder-o pull-right"></i></span>
											</div>
										</div>
										<div class="col-lg-5" onclick="javascript:submitForm('1');" >
											<div class="btn-my-template">										
												<h4>CREATE YOUR OWN DESIGN </h4>
												<span><i class="fa fa-pencil pull-right"></i></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

			</div>

			</div>
		</div>
	</div>
	<!-- end product -->
	</div>

</div>
<input type="hidden" name="user_select" id="user_select" value="" />
</form>
<!-- Modal confirm_checklist  -->
<div class="modal fade" id="confirm_checklist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="width: 64%;top:22%;left: 18%;">
  <div class="modal-dialog modal-content-full-width" role="document">
    <div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Please make sure followings data is ready to provide us before you place an order.</h4>
		</div>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
      <div class="modal-body">
		<ul class="checklist_popup_alert_block">
			<li class="checklist"><i class="fa fa-check"></i>No. of ID cards you want to order.</li>
			<li class="checklist"><i class="fa fa-check"></i>Data of each employee in excel sheet.</li>
			<li class="checklist"><i class="fa fa-check"></i>Photographs of each employee to be uploaded in zip.</li>
			<li class="checklist"><i class="fa fa-check"></i>Expected date of delivery for the ordered.</li>
		</ul>
	  </div>
	  <div class="modal-footer">
		<input type="button" id="" class="btn btn-danger pull-left" value="No, go back" onclick="javascript:history.go(-1);"/>
		<input type="submit" id="btn_add_object" onclick="javascript:goNextStep();" class="btn btn-success" value="Yes, continue"/>
	  </div>
	 </div>
	</div>
</div>
<!-- /Modal confirm_checklist -->
<!-- Modal add login_pupop -->
<div class="modal fade" id="login_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
  <form class="form-horizontal" novalidate method="post" action="<?php echo base_url(); ?>/User_Login/loginValidate?token=<?php echo rand(5000,10000); ?>" id="login_popup" data-bv-message="This value is not valid" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" enctype="multipart/form-data" autocomplete="off">
			
    <div class="modal-content">
		<div class="modal-header">
			<h3 class="modal-title">Login</h3>
		</div>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
      <div class="modal-body">
	 		<div class="row" >
				<div class="col-md-8">
					<div class="form-group">
						<i class="fa fa-user"></i>
						<input type="text" class="form-control" name="User_ID" id="User_ID" placeholder="Username" data-bv-notempty="true" data-bv-notempty-message="Please enter username" data-bv-regexp="true" data-bv-regexp-regexp="^[a-zA-Z0-9]+$" data-bv-regexp-message="Registration number must be  alphabet only" data-bv-stringlength="true" data-bv-stringlength-min="4" data-bv-stringlength-max="20" data-bv-stringlength-message="Registration must be 4 to 20 characters" >
					</div>
				</div>
				<div class="col-md-8">
					<div class="form-group">
						<i class="fa fa-lock"></i>
						<input type="password" name="Password" class="form-control" placeholder="Password" data-bv-notempty="true" data-bv-notempty-message="Please enter password">
					</div>
				</div>
				<div class="col-md-8">
					<div class=" form-group">
						<button type="submit" class="btn btn-default pull-right form-control">Log in</button>
					</div>
				</div>
			</div>
	  </div>
	  <div class="modal-footer">
	  </div>
	 </div>
	 </form>
	</div>
</div>
<!-- /Modal login_pupop -->

<script type="text/javascript" src="<?php echo asset_url(); ?>front/js/bootstrap-touch-slider.js"></script>
<script type="text/javascript" src="<?php echo asset_url(); ?>front/js/owl.carousel.js"></script>
<script>

//tempalets slider owl carousel
var user_choose = '';

$(document).ready(function() {
  $('.owl-carousel').owlCarousel({
	loop: false,
	margin: 10,
	responsiveClass: true,
	nav: true,
	responsive: {
	  0: {
		items: 2,
	  },
	  600: {
		items: 3,
	  },
	  1000: {
		items: 3,
		margin: 20
	  }
	}
  })
})
//tempalets slider owl carousel


$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-success').addClass('btn-default');
            $item.addClass('btn-success');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function () {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;


        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }
		$('#finish_scanner').css('display','none');
		if(curStepBtn == 'step-1'){
				var card_cat = $('input.chemical_or_smart:checked').val();
				console.log(card_cat);
				if(card_cat == 'chemical'){
					nextStepWizard = $('#caption-step-5').children("a");
					$('#btn_scanner').css('display','none');
					$('#skip_scanner').css('display','none');
					$('#finish_scanner').css('display','block');
				}

		}
		if(curStepBtn == 'step-2'){
				var card_type = $('input.card_type:checked').val();
				console.log(card_type);
				if(card_type == 'without_chip'){
					nextStepWizard = $('#caption-step-4').children("a");
					$('#caption-step-3').css('display','none');
				}

		}

        if (isValid) { nextStepWizard.removeAttr('disabled').trigger('click'); nextStepWizard.css('display','block');}
    });

    $('div.setup-panel div a.btn-success').trigger('click');
	$('form#login_popup').bootstrapValidator();
});
function call_next(action){
	user_choose = action;
	var is_logged_in = false;
	<?php if( isset( $profile )  &&  $profile != false ){ ?>
		is_logged_in= true;
		var customer_id = '<?php echo $profile['customer_id']; ?>';
	<?php }?>
	if(is_logged_in == false){
		window.location = '<?php echo base_url(); ?>/User_Login/school?token=<?php echo rand(5000, 10000);?>';
	}
	if(is_logged_in == true){
		//When user browse design
		if(action==0){
			popupWizard(0,'both');
		}
		if(action==1){
			popupWizard(0,'both');
		}
		if(action==2){
			alert();
		}
		id = 1;
		// Add selected template
		if(id && customer_id ){
			var form_data = new FormData();
			form_data.append('id', id);
			form_data.append('task', 'select_template');
			form_data.append('customer_id', customer_id);
			var url = '<?php echo base_url(); ?>//Ajax/viewincanvas';
			$.ajax({
				url:url,
				data:form_data,
				dataType: 'text',  // what to expect back from the PHP script, if anything
				cache: false,
				contentType: false,
				processData: false,
				type:"post",
				success:function(response){
					var resp = response
					console.log(resp);
					if(resp == 'success'){

					}
				}
			});
		}

	}
}
function popupWizard(id,orientation){
	$('input#template_id').val(id);
	$('input#orientation').val(orientation);
	if(orientation == 'both'){
		$('img.sample-vertical').css('display','inline');
		$('img.sample-horizontal').css('display','inline');
	}
	if(orientation == 'vertical'){
		$('img.sample-vertical').css('display','inline');
		$('img.sample-horizontal').css('display','none');
	}
	if(orientation == 'horizontal'){
		$('img.sample-vertical').css('display','none');
		$('img.sample-horizontal').css('display','inline');
	}
	$('#select_template').modal('show');
}
function submitForm(user_choose){
	var is_logged_in = false;
	var form_url = '';
	<?php if( isset( $profile )  &&  !empty($profile) ){ ?>
		is_logged_in= true;
		var customer_id = '<?php echo $profile['customer_id']; ?>';
	<?php }?>

	if(is_logged_in == false){
		form_url = '<?php echo base_url(); ?>/User_Login/school?token=<?php echo rand(5000, 10000);?>';
		$('#login_popup').modal('show');

	}

	if(is_logged_in == true){

		$('input#user_select').val(user_choose);
		 $('#confirm_checklist').modal('show');
	}

}
function goNextStep(){
	var user_choose = $('input#user_select').val();
	if(user_choose == '0'){
		form_url ='<?php echo base_url();?>/Studio/draw?product='+id;
	}
	if(user_choose == '1'){
		form_url ='<?php echo base_url();?>/Studio/template_act?';
	}
	if(user_choose == '2'){
		form_url ='<?php echo base_url();?>/Studio/carts?';
	}
	document.getElementById('frm3').action = form_url;
	$('form#frm3').submit();

}
function redirectToStudio(){
	var form_url = '';
	form_url ='<?php echo base_url();?>/Studio/template_act?';
	//document.getElementById('frm1').action = form_url;
	//$('form#frm1').submit();
	window.location=form_url
}
</script>