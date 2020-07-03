<link href="<?php echo asset_url(); ?>front/css/bootstrap-touch-slider.css" rel="stylesheet" type="text/css" />

<!-- 
<div class="featured_templates_content">
	<div class="container">
		<div class="row">
		<?php foreach($products as $item ){?>
		
			<div class="col-md-3 col-sm-6">
				<div class="product-grid">
					<div class="product-image">
						<a href="#">
							<img class="pic-1" src="<?php echo $item['product_image'];?>">
							<img class="pic-2" src="<?php echo $item['product_image'];?>">
							
						</a>
						<ul class="social">
							<li><a href="<?php echo base_url();?>Home/product_info?id=<?php echo $item['products_id'];?>" data-tip="Explore more"><i class="fa fa-search"></i></a></li>
							</ul>
					</div>
				
					<div class="product-content">
						<h3 class="title"><a href="#"><?php echo $item['product_name'];?></a></h3>
						<div class="price">
							<?php echo $item['product_name'];?>
						</div>
						
					</div>
				</div>
			</div>
		<?php }?>
			
		</div>
	</div>
</div>
-->
<div class="about_content_bg">
   <div class="container">

      <div class="title_section_block wow fadeInUp">
         <h4>About Us</h4>
      </div>

      <div class="row">
         <div class="col-sm-6">
            <img src="<?php echo asset_url(); ?>front/images/about_profile_thumb.png" alt="" class="img-responsive wow fadeInUp">
         </div>
         <div class="col-sm-6">
            <div class="about_text_part">
               <h3 class="wow fadeInUp">Lorem Ipsum is simply dummy text</h3>
               <p class="wow fadeInUp">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br /><br /> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. </p>
               <div class="pull-left wow fadeInUp"><a href="#" class="btn btn-default">Read More</a></div>
            </div>
         </div>
      </div>

   </div>
</div>

<div class="services_content_bg">
   <div class="container">

      <div class="title_section_block wow fadeInUp">
         <h4>Services</h4>         
      </div>
      <p class="title_discription wow fadeInUp">Lorem Ipsum is simply dummy text of the printing and type setting industry when an unknown printer took  a galley of type and scrambled it to make a type specimen book It has survived not only five centuries.</p>

      <div class="services_content_part">
         <div class="row">

            <div class="col-sm-6">
               <div class="service_listing_block wow fadeInUp">
                  <span><i class="fa fa-bolt" aria-hidden="true"></i></span>
                  <div class="service_listing_detail">
                     <h3>Lorem Ipsum Text</h3>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis augue libero, aliquet id ex sit amet, sodales maximus diam. Vestibulum nulla leo, feugiat ac molestie</p>
                  </div>
               </div>
               <div class="service_listing_block wow fadeInUp">
                  <span><i class="fa fa-cubes" aria-hidden="true"></i></span>
                  <div class="service_listing_detail">
                     <h3>Lorem Ipsum Text</h3>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis augue libero, aliquet id ex sit amet, sodales maximus diam. Vestibulum nulla leo, feugiat ac molestie</p>
                  </div>
               </div>
               <div class="service_listing_block wow fadeInUp">
                  <span><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>
                  <div class="service_listing_detail">
                     <h3>Lorem Ipsum Text</h3>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis augue libero, aliquet id ex sit amet, sodales maximus diam. Vestibulum nulla leo, feugiat ac molestie</p>
                  </div>
               </div>
            </div>

            <div class="col-sm-6">
               <div class="service_video_right wow fadeInUp">
                  <img src="<?php echo asset_url(); ?>front/images/services_video_thumb.jpg" alt="" class="img-responsive">
                  <span><a href="#"><i class="fa fa-play"></i></a></span>
               </div>
            </div>

         </div>
      </div>

   </div>
</div>

<div class="inquiry_content_bg">

   <div class="inquiry_left_part">
         <img src="<?php echo asset_url(); ?>front/images/inquiry_icon_thumb.png" alt="" class="img-responsive">
   </div>
   <div class="inquiry_right_part">
      <div class="title_section_block wow fadeInUp">
         <h4>Inquiry</h4>         
      </div>
      <form>
         <div class="row">
            <div class="col-sm-6 wow fadeInUp">
               <div class="form-group">
                  <label>Full Name</label>
                  <input type="text" class="form-control" id="" placeholder="FULL NAME">
               </div>
            </div>
            <div class="col-sm-6 wow fadeInUp">
               <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" id="" placeholder="EMAIL">
               </div>
            </div>
            <div class="col-sm-6 wow fadeInUp">
               <div class="form-group">
                  <label>Phone</label>
                  <input type="text" class="form-control" id="" placeholder="PHONE">
               </div>
            </div>
            <div class="col-sm-6 wow fadeInUp">
               <div class="form-group">
                  <label>Subject</label>
                  <input type="text" class="form-control" id="" placeholder="SUBJECT">
               </div>
            </div>
            <div class="col-sm-12 wow fadeInUp">
               <div class="form-group">
                  <label>select Templaets</label>
                  <select class="form-control">
                     <option selected disabled>--- select ----</option>
                     <option>Option 1</option>
                     <option>Option 2</option>
                     <option>Option 3</option>
                     <option>Option 4</option>
                  </select>
               </div>
            </div>
            <div class="col-sm-12 wow fadeInUp">
               <div class="form-group">
                  <label>Message</label>
                  <textarea class="form-control" placeholder="MESSAGE" rows="5"></textarea>
               </div>
            </div>
            <div class="col-sm-12 wow fadeInUp">
               <button type="submit" class="btn btn-default pull-right">Submit</button>
            </div>
         </div>                  
      </form>
   </div>
</div>

<!-- Tempalets Approve Popup -->
<div class="modal fade" id="select_template" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <!-- <div class="modal-dialog modal-content-full-width" role="document"> -->
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
      <div class="modal-body">
        <div class="custom_stepwizard">
			<div class="stepwizard text-center">
				<div class="stepwizard-row setup-panel">
					
					<div class="stepwizard-step col-xs-2  active" id="caption-step-1" > 
						<a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
						<!-- <p><small>Step 1</small></p> -->
					</div>
					<div class="stepwizard-step col-xs-2 " id="caption-step-2" > 
						<a href="#step-2" type="button" class="btn  btn-circle"  style="display:none"  disabled="disabled"> 2 </a>
						<!-- <p><small>Step 1</small></p> -->
					</div>
					<div class="stepwizard-step col-xs-2 " id="caption-step-3" > 
						<a href="#step-3" type="button" class="btn  btn-circle"  style="display:none"  disabled="disabled"> 3</a>
						<!-- <p><small>Step 1</small></p> -->
					</div>
					<div class="stepwizard-step col-xs-2 " id="caption-step-4" > 
						<a href="#step-4" type="button" class="btn  btn-circle"  style="display:none"  disabled="disabled">4 </a>
						<!-- <p><small>Step 1</small></p> -->
					</div>
					
					<div class="stepwizard-step col-xs-2 " id="caption-step-5" > 
						<a href="#step-5" type="button" class="btn btn-default btn-circle" style="display:none" disabled="disabled">5</a>
						<!-- <p><small>Step 1</small></p> -->
					</div>
					<div class="stepwizard-step col-xs-2 " id="caption-step-6" > 
						<a href="#step-6" type="button" class="btn btn-default btn-circle" style="display:none" disabled="disabled">6</a>
						<!-- <p><small>Step 1</small></p> -->
					</div>
					<div class="stepwizard-step col-xs-2 " id="caption-step-7" > 
						<a href="#step-7" type="button" class="btn btn-default btn-circle"  style="display:none"  disabled="disabled">7</a>
						<!-- <p><small>Step 1</small></p> -->
					</div>
				</div>
			</div>
			
			<form role="form" id="frm1" action="" method="post">
				<div class="panel panel-primary setup-content" id="step-1">
					<div class="panel-body">
						<div class="row">
							<div class=" col-md-7 wizard_thumb_block">
								<!--
								<img src="<?php echo asset_url(); ?>front/images/samples/step-1.jpg" alt="" class="img-responsive sample-vertical">
								<img src="<?php echo asset_url(); ?>front/images/samples/horizontal-1.jpg" alt="" class="img-responsive sample-horizontal">
								-->
								<div class="wizard_thumb_checkbox">								
									<label class="radio-inline" for="chemical">
									   <input class="chemical_or_smart" type="radio" name="preferences[chemical_or_smart]"  id="chemical" value="chemical" /> Chemical Card
									</label>
								</div>
							</div>
							<div class="col-md-4 wizard_thumb_block">
								<!--
								<img src="<?php echo asset_url(); ?>front/images/samples/step-1.jpg" alt="" class="img-responsive sample-vertical">
								<img src="<?php echo asset_url(); ?>front/images/samples/horizontal-1.jpg" alt="" class="img-responsive sample-horizontal">
								
								-->
								<div class="wizard_thumb_checkbox">	
									<label class="radio-inline" for="smart">
									  <input  class="chemical_or_smart" type="radio" name="preferences[chemical_or_smart]"  id="smart" value="smart" /> Smart Card
									</label>
									</div>
							</div>
						</div>					
						
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-md-offset-8 col-md-4">
								<button class="btn btn-primary-skip   pull-right"  type="button"  onclick="javascript:submitForm();" id="" >Skip</button>
								<button class="btn btn-primary nextBtn pull-right" type="button" id="btn_chemical_or_smart" >Next</button>
							</div>
						</div>
					</div>
				</div>
				
				<div class="panel panel-primary setup-content" id="step-2">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-offset-2 col-md-4 wizard_thumb_block">
								<!-- 
									<img src="<?php echo asset_url(); ?>front/images/samples/step-1.jpg" alt="" class="img-responsive sample-vertical">
								<img src="<?php echo asset_url(); ?>front/images/samples/horizontal-1.jpg" alt="" class="img-responsive sample-horizontal">
								-->
							<div class="wizard_thumb_checkbox">
									<label class="radio-inline" for="without_chip">
									  <input class="card_type" type="radio" name="preferences[card_type]"  id="without_chip" value="without_chip" /> Simple Card / Without Chip Card
									</label>
								</div>
							</div>
							<div class="col-md-4 wizard_thumb_block">
								<!-- 
								<img src="<?php echo asset_url(); ?>front/images/samples/step-1.jpg" alt="" class="img-responsive sample-vertical">
								<img src="<?php echo asset_url(); ?>front/images/samples/horizontal-1.jpg" alt="" class="img-responsive sample-horizontal">
								-->
								<div class="wizard_thumb_checkbox">
									<label class="radio-inline" for="with_chip">
									  <input class="card_type" type="radio" name="preferences[card_type]"  id="with_chip" value="with_chip" /> With Chip Card
									</label>
									
								</div>
							</div>
						</div>						
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-md-offset-8 col-md-4">
								<button class="btn btn-primary-skip   pull-right"  type="button"  onclick="javascript:submitForm();" id="" >Skip</button>
								<button class="btn btn-primary nextBtn pull-right" type="button" id="btn_card_type">Next</button>
							</div>
						</div>						
					</div>
				</div>
				<div class="panel panel-primary setup-content" id="step-3">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-offset-2 col-md-4 wizard_thumb_block">
								<!-- 
								<img src="<?php echo asset_url(); ?>front/images/samples/step-1.jpg" alt="" class="img-responsive sample-vertical">
								<img src="<?php echo asset_url(); ?>front/images/samples/horizontal-1.jpg" alt="" class="img-responsive sample-horizontal">
								-->
								<div class="wizard_thumb_checkbox">								
									<label class="radio-inline" for="rfid">
									  <input type="radio" name="preferences[rfid_or_mifre]"  id="rfid" value="rfid" /> RFID
									</label>
								</div>
							</div>
							<div class="col-md-4 wizard_thumb_block">
								<!-- 
								<img src="<?php echo asset_url(); ?>front/images/samples/step-1.jpg" alt="" class="img-responsive sample-vertical">
								<img src="<?php echo asset_url(); ?>front/images/samples/horizontal-1.jpg" alt="" class="img-responsive sample-horizontal">
								-->
								<div class="wizard_thumb_checkbox">		
									<label class="radio-inline" for="mifare">
									  <input type="radio" name="preferences[rfid_or_mifre]"  id="mifare" value="mifare" /> 1 K Mifare
									</label>
									
								</div>
							</div>
						</div>						
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-md-offset-8 col-md-4">
								<button class="btn btn-primary-skip   pull-right"  type="button"  onclick="javascript:submitForm();" id="" >Skip</button>
								<button class="btn btn-primary nextBtn pull-right" type="button" id="">Next</button>
							</div>
						</div>						
					</div>
				</div>
				
				<div class="panel panel-primary setup-content" id="step-4">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-offset-2 col-md-4 wizard_thumb_block">
								<!--
								<img src="<?php echo asset_url(); ?>front/images/samples/step-1.jpg" alt="" class="img-responsive sample-vertical custom-height">
								<img src="<?php echo asset_url(); ?>front/images/samples/horizontal-1.jpg" alt="" class="img-responsive sample-horizontal ">
								-->
								<div class="wizard_thumb_checkbox">
									<label class="radio-inline" for="single">
									  <input type="radio" name="preferences[sides]"  id="single"  value="single" /> Single side
									</label>
									
								</div>
							</div>
							<div class="col-md-4 wizard_thumb_block">
								<!--
								<img src="<?php echo asset_url(); ?>front/images/samples/both-sides.jpg"  alt="" class="img-responsive sample-vertical custom-height">
								<img src="<?php echo asset_url(); ?>front/images/samples/horizontal-both.jpg"  alt="" class="img-responsive sample-horizontal ">
								-->
								<div class="wizard_thumb_checkbox">
									<label class="radio-inline" for="both">
									  <input type="radio" name="preferences[sides]"  id="both" value="both" /> Both side
									</label>
									
								</div>
							</div>
						</div>						
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-md-offset-8 col-md-4">
								<button class="btn btn-primary-skip   pull-right"  type="button"  onclick="javascript:submitForm();" id="" >Skip</button>
								<button class="btn btn-primary nextBtn pull-right" type="button" id="btn_card_type">Next</button>
							</div>
						</div>						
					</div>
				</div>
				
				<div class="panel panel-primary setup-content" id="step-5">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-offset-2 col-md-4 wizard_thumb_block">
								<!-- 
								<img src="<?php echo asset_url(); ?>front/images/samples/barcode-card.jpg" alt="" class="img-responsive sample-vertical">
								<img src="<?php echo asset_url(); ?>front/images/samples/horizontal-barcode.jpg" alt="" class="img-responsive sample-horizontal">
								-->
						<div class="wizard_thumb_checkbox">	
									<label class="radio-inline" for="barcode">
									  <input type="radio" name="preferences[scanner]"  id="barcode"  value="barcode" /> Barcode
									</label>
								</div>
							</div>
							<div class="col-md-4 wizard_thumb_block">								
							<!--
									<img src="<?php echo asset_url(); ?>front/images/samples/qr-code-card.jpg" alt="" class="img-responsive sample-vertical">
								<img src="<?php echo asset_url(); ?>front/images/samples/horizontal-qr.jpg" alt="" class="img-responsive sample-horizontal">
						-->
								<div class="wizard_thumb_checkbox">	
									<label class="radio-inline" for="qrcode">
									  <input type="radio" name="preferences[scanner]"  id="qrcode" value="qrcode" /> QR Code
									</label>
								</div>
							</div>
						</div>						
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-md-offset-8 col-md-4">
								<button class="btn btn-primary-skip   pull-right" type="submit" id="skip_scanner" >Skip</button>
								<button class="btn btn-primary nextBtn pull-right" type="button" id="btn_scanner">Next</button>
								<button class="btn btn-primary-skip  pull-right" type="button"  onclick="javascript:submitForm();" id="finish_scanner">Finish</button>
							</div>
						</div>						
					</div>
				</div>
				<div class="panel panel-primary setup-content" id="step-6">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-offset-2 col-md-4 wizard_thumb_block">
								<!-- 
									<img src="<?php echo asset_url(); ?>front/images/samples/step-1.jpg" alt="" class="img-responsive sample-vertical">
								<img src="<?php echo asset_url(); ?>front/images/samples/horizontal-1.jpg" alt="" class="img-responsive sample-horizontal">
								-->
								<div class="wizard_thumb_checkbox">	
									<label class="radio-inline" for="glossy">
									  <input type="radio" name="preferences[finish]"  id="glossy"  value="glossy" /> Glossy
									</label>
								</div>
							</div>
							<div class="col-md-4 wizard_thumb_block">
							<!--	<img src="<?php echo asset_url(); ?>front/images/samples/step-1.jpg" alt="" class="img-responsive sample-vertical">
								<img src="<?php echo asset_url(); ?>front/images/samples/horizontal-1.jpg" alt="" class="img-responsive sample-horizontal">
						-->
								<div class="wizard_thumb_checkbox">	
									<label class="radio-inline" for="matt">
									  <input type="radio" name="preferences[finish]"  id="matt"  value="matt" /> Matt
									</label>
								</div>
							</div>
						</div>	
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-md-offset-8 col-md-4">
								<button class="btn btn-primary-skip  pull-right" type="button" id="" onclick="javascript:submitForm();" >Finish</button>
							</div>
						</div>						
					</div>
				</div>
				<input type="hidden" name="preferences[template_id]" id="template_id" >
				<input type="hidden" name="preferences[orientation]" id="orientation" >
				<input type="hidden" name="preferences[call_to_action]" id="call_to_action" >
				<input type="hidden" name="target_url" value="index.php/Studio/draw?" >
			</form>
		</div>
      </div>
    </div>
  </div>
</div>
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
});
function call_next(action){
	user_choose = action;
	var is_logged_in = false;
	<?php if( isset( $profile )  &&  $profile != false ){ ?>
		is_logged_in= true;
		var customer_id = '<?php echo $profile['customer_id']; ?>';
	<?php }?>
	if(is_logged_in == false){
		window.location = '<?php echo base_url(); ?>index.php/User_Login/school?token=<?php echo rand(5000, 10000);?>';
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
			var url = '<?php echo base_url(); ?>/index.php/Ajax/viewincanvas';
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
function submitForm(){
	var form_url = '';
		if(user_choose == 0){
			//form_url ='<?php echo base_url();?>index.php/Studio/draw?product='+id;
		}
		if(user_choose == 1){
			//form_url ='<?php echo base_url();?>index.php/Studio/template_act?';
		}
		if(user_choose == 2){
			//form_url ='<?php echo base_url();?>index.php/Studio/carts?';
		}
		form_url = "http://13.234.247.143/mj/index.php/Home/product_info?";
		document.getElementById('frm1').action = form_url;
		$('form#frm1').submit();
}
</script>