<div class="inner_content_bg">
   <div class="container">
   <form action="<?php echo base_url(); ?>index.php/Studio/template_act" name="" id="frm_draw" method="post" >
		<input type="hidden" name="task" id="task" value="add_to_cart" />
		<input type="hidden" name="preferences[template_id]" id="template_id" value="<?php echo $template['id'];?>" />
		<input type="hidden" name="preferences[orientation]" id="orientation"  value="<?php echo $preferences['orientation'];?>"  >
	   <div class="contact_inner_part">
			<div class="row">
				<div class="col-sm-12">
						<h5 class="title_contact_detail wow fadeInUp"><?php echo $profile['customer_name']; ?> </h5>
                </div>
				<div class="col-sm-3">
					<h4 class="title_contact_detail wow fadeInUp">Template properties</h4>
                </div>
				<div class="col-sm-6">
					
                    	<h4 class="title_contact_detail wow fadeInUp"><?php if( isset($template['template_name']) && $template['template_name'] != '') echo $template['template_name'] ; ?> </h4>
                    	
                </div>
			</div>
			
			<div class="card_wrap_content_bg">
			<div class="row">
				<div class="col-sm-3">
					<div class="card_left_option_menu">
						<div class="panel-group" id="accordion_card" role="tablist" aria-multiselectable="true">
							<div class="panel panel-default div_chemical_or_smart">
								<div class="panel-heading" role="tab" id="headingOne">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion_card" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											ID Card Category
										</a>
									</h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
								<?php
								$chk_chemical = ( isset($preferences['chemical_or_smart']) && $preferences['chemical_or_smart'] == 'chemical') ? ' checked="checked"' : '';
								$chk_smart = ( isset($preferences['chemical_or_smart']) && $preferences['chemical_or_smart'] == 'smart') ? ' checked="checked"' : '';
								
								if($chk_smart == '' && $chk_chemical == ''){
									$chk_smart =' checked="checked"';
								}
								?>
									<div class="panel-body">
										<ul class="list_card_left_menu">
											<li>
												<span class="title_list_menu">Chemical Card</span>
												<div class="radio_btn">
												
													<input class="chemical_or_smart" type="checkbox"  <?php echo $chk_chemical; ?> name="preferences[chemical_or_smart][chemical]"  value="1" id="chemical"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" onchange="javascript:check_state('chemical_or_smart',this.checked, 'chemical');"  >
												</div>
											</li>
											<li>
												<span class="title_list_menu">Smart Card</span>
												<div class="radio_btn">
													<input class="chemical_or_smart"  type="checkbox" <?php echo $chk_smart; ?>  name="preferences[chemical_or_smart][smart]"  value="1" id="smart"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger"  onchange="javascript:check_state('chemical_or_smart',this.checked, 'smart');" >
												</div>
											</li>
										</ul>
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
												$chk_simple = ( isset($preferences['card_type']) && $preferences['card_type'] == 'without_chip') ? ' checked="checked"' : '';
												$chk_chip = ( isset($preferences['card_type']) && $preferences['card_type'] == 'with_chip') ? ' checked="checked"' : '';
												?>
										<ul class="list_card_left_menu">
											
											<li>
												<span class="title_list_menu">Simple Card/Without chip</span>
												<div class="radio_btn">
													<input class="card_type" type="checkbox"  <?php echo $chk_simple ; ?> name="preferences[card_type][simple]"  value="1" id="simple"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" onchange="javascript:check_state('card_type',this.checked, 'simple');" >
												</div>
											</li>
											<li>
												<span class="title_list_menu">With Chip Card</span>
												<div class="radio_btn">
													<input class="card_type"  type="checkbox" <?php echo $chk_chip ; ?>  name="preferences[card_type][with_chip]"  value="1" id="with_chip"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default div_sides">
							<?php
							
							$chk_single = ( isset($preferences['sides']) && $preferences['sides'] == 'single') ? ' checked="checked"' : '';
							$chk_both = ( isset($preferences['sides']) && $preferences['sides'] == 'both') ? ' checked="checked"' : '';
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
										<ul class="list_card_left_menu">
											<li>
												<span class="title_list_menu">Single side</span>
												<div class="radio_btn">
													<input class="sides" type="checkbox" <?php echo $chk_single; ?>  name="preferences[sides][single]"  value="1" id="single"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" onchange="javascript:check_state('sides',this.checked, 'single');" >
												</div>
											</li>
											<li>
												<span class="title_list_menu">Both side</span>
												<div class="radio_btn">
													<input class="sides"  type="checkbox"   <?php echo $chk_both; ?>  name="preferences[sides][both]"  value="1" id="both"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" onchange="javascript:check_state('sides',this.checked, 'both');" >
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<?php
							$chk_rfid = ( isset($preferences['rfid_or_mifre']) && $preferences['rfid_or_mifre'] == 'rfid') ? ' checked="checked"' : '';
							$chk_mifre = ( isset($preferences['rfid_or_mifre']) && $preferences['rfid_or_mifre'] == 'mifare') ? ' checked="checked"' : '';
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
										<ul class="list_card_left_menu">
											<li>
												<span class="title_list_menu">RFID</span>
												<div class="radio_btn">
													<input class="rfid_or_mifre" type="checkbox"  <?php echo $chk_rfid; ?> name="preferences[rfid_or_mifre][rfid]"  value="1" id="rfid"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" onchange="javascript:check_state('rfid_or_mifre',this.checked, 'rfid');">
												</div>
											</li>
											<li>
												<span class="title_list_menu">1 K Mifare</span>
												<div class="radio_btn">
													<input  class="rfid_or_mifre"  type="checkbox" <?php echo $chk_mifre; ?>  name="preferences[rfid_or_mifre][mifare]"  value="1" id="mifare"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<?php
							$chk_bar = ( isset($preferences['scanner']) && $preferences['scanner'] == 'barcode') ? ' checked="checked"' : '';
							$chk_qr = ( isset($preferences['scanner']) && $preferences['scanner'] == 'qrcode') ? ' checked="checked"' : '';
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
										<ul class="list_card_left_menu">
											<li>
												<span class="title_list_menu">Barcode</span>
												<div class="radio_btn">
													<input class="scanner" type="checkbox" <?php echo $chk_bar; ?>  name="preferences[scanner][barcode]"  value="1" id="barcode"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger"  >
												</div>
											</li>
											<li>
												<span class="title_list_menu">QR Code</span>
												<div class="radio_btn">
													<input class="scanner" type="checkbox"  <?php echo $chk_qr; ?>   name="preferences[scanner][qrcode]"  value="1" id="qrcode"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<?php
							$chk_glossy = ( isset($preferences['finish']) && $preferences['finish'] == 'glossy') ? ' checked="checked"' : '';
							$chk_matt = ( isset($preferences['finish']) && $preferences['finish'] == 'matt') ? ' checked="checked"' : '';
							?>
							<div class="panel panel-default div_finish">
								<div class="panel-heading" role="tab" id="headingsix">
									<h4 class="panel-title">
										<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_card" href="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
											ID Card Finish
										</a>
									</h4>
								</div>
								<div id="collapsesix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingsix">
									<div class="panel-body">
										<ul class="list_card_left_menu">
											<li>
												<span class="title_list_menu">Glossy</span>
												<div class="radio_btn">
													<input class="finish" type="checkbox" <?php echo $chk_glossy ;?>  name="preferences[finish][glossy]"  value="1" id="glossy"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
												</div>
											</li>
											<li>
											<span class="title_list_menu">Matt</span>
												<div class="radio_btn">
													<input  class="finish"  type="checkbox"  <?php echo $chk_matt ;?> name="preferences[finish][matt]"  value="1" id="matt"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-sm-3">
					<div class="card_wrap_part">
						<div class="crad_item_part">
						   <img src="<?php echo base_url(); ?>uploads/templates/<?php echo $template['template_image_path'] ;?>" alt="" class="img-responsive">
						   <!-- <div class="card_item_block">
								<div class="card_top_block">
									<div class="form-group title">
										<input id="student_name" name="student_name" label="Student Name" type="text" class="form-control" value="Student's Name" readonly="readonly" >
									</div>
									<div class="form-group sub_title">
										<input id="standard" name="standard" label="Standard" type="text" class="form-control" value="Standard Class" readonly="readonly">
									</div>
								</div>
								<div class="card_bottom_block">
									<div class="form-group">
										<span><img src="<?php echo asset_url(); ?>images/canvas/home_icon.png" alt="" class="img-responsive"></span>
										<textarea id="address" name="address" label="Address" class="form-control" placeholder="Address"  readonly="readonly">Address line1, Address line2, Address line3</textarea>
									</div>
									<div class="form-group">
										<span><img src="<?php echo asset_url(); ?>images/canvas/email_icon.png" alt="" class="img-responsive"></span>
										<input id="email" name="email" label="Email" type="text" class="form-control" value="emailid@gmail.com"  readonly="readonly">
									</div>
									<div class="form-group">
										<span><img src="<?php echo asset_url(); ?>images/canvas/phone_icon.png" alt="" class="img-responsive"></span>
										<input id="phone" name="phone" label="Phone" type="text" class="form-control" value="079-25252525, 9898989898"  readonly="readonly">
									</div>
								</div>
						   </div> -->
						</div>
					</div>	
				</div>
				<?php if( isset($preferences['sides']) && $preferences['sides'] == 'both' && isset($template['template_image_path_back']) && $template['template_image_path_back'] != '' ) { ?>
				<div class="col-sm-3">
					<div class="card_wrap_part">
						<div class="crad_item_part">
							<img src="<?php echo asset_url(); ?>images/canvas/card1_back_bg.jpg" alt="" class="img-responsive">
							<div class="card_item_block back_side">
								 <div class="card_top_block">
									<div class="circle_bg">
										<div class="circle">
											<img class="profile-pic img-responsive" src="<?php echo asset_url(); ?>images/canvas/uder_thumb_default.jpg" alt=""> 
										</div>
										<div class="p-image">
											<i class="fa fa-camera upload-button"></i>
											<input class="file-upload" type="file" accept="image/*"/>
										</div>
									</div>
								 </div>
								 <div class="card_bottom_block">
									 <div class="logo_back_side"><img src="<?php echo asset_url(); ?>images/canvas/logo_sample.png" alt="" class="img-responsive"></div>
									 <div class="form-group title1">
										 <input id="corporate_name" name="corporate_name" label="CORPORATE NAME" type="text" class="form-control" value="SCHOOL NAME">
									 </div>
									 <div class="form-group title2">
										 <input  id="slogon" name="slogon" label="SLOGON"  type="text" class="form-control" value="SLOGAN GOES HERE">
									 </div>
									 <div class="form-group website_title">
										 <input  id="website" name="website" label="URL"  type="text" class="form-control" value="WWW.COMPANY-NAME.COM">
									 </div>
								 </div>
							</div> 
						</div>
					</div>	
				</div>
				<?php } ?>
				<!--
				<div class="proceed_step_btn">
					<button type="submit" class="btn btn-default pull-right">Save & Add to cart <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
				</div>
				-->
<div class="col-sm-3">
	<div class="row">
		<button type="button" class="btn btn-default pull-right studio-btn">Browse Templates <i class="fa fa-folder studio-btn-folder" aria-hidden="true"></i></button>
	</div>
	<div class="row">
		<button type="button" class="btn btn-default pull-right studio-btn">Uplodad Your Design <i class="fa fa-upload studio-btn-upload" aria-hidden="true"></i></button>
	</div>

	<div class="row">
		<button type="button" onclick="javascript:$('#frm_draw').submit();" class="btn btn-default pull-right studio-btn">Create Your Own  <i class="fa fa-pencil studio-btn-pencil" aria-hidden="true"></i></button>
	</div>
</div>
			
			
	    </div>
        </div>
		</div>
	</div>
	</form>
</div>
<script>
$(document).ready(function(){
	/*
	$('.card_item_block').find('input, textarea').each(function(){
		if($(this).attr("id")){
			var _html = '';
			_html = _html+'<div class="col-sm-6">';
			_html = _html+'<div class="form-group">';
			_html = _html+'<label>'+$(this).attr("label")+'</label>';
			//_html = _html+'<ul>';
				var _name = $(this).attr("id");
				_html = _html+'<input type="text" name="'+_name+'" id="" value="" class="form-control" />';
			//_html = _html+'</ul>';
			_html = _html+'</div>';
			_html = _html+'</div>';
			$('.add_card_details_box').append(_html);
		}
	});
	$('input, textarea').on('keyup', function(){
		var ele = $(this).attr('name');
		$('#'+ele).val($(this).val());
	});
	*/
});
//upload image proifile*/
$(document).ready(function() {
var chemical_or_smart = '<?php if(isset($preferences['chemical_or_smart'])) { echo $preferences['chemical_or_smart']; } ?>';
render_settings(chemical_or_smart);
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
//uplload image profile*/

function render_settings(chemical_or_smart){
	
	if(chemical_or_smart == 'chemical' || chemical_or_smart == 'smart'){
		$('div.div_card_type').css('display','none');
		$('div.div_rfid_or_mifre').css('display', 'none');
		$('div.div_finish').css('display', 'none');
		if(chemical_or_smart == 'chemical' ){
			$('div.div_sides').css('display', 'block');
		}
	}
	if(chemical_or_smart == 'smart'){
		$('div.div_card_type').css('display','block');
		$('div.div_rfid_or_mifre').css('display', 'block');
		$('div.div_finish').css('display', 'block');
	}
}

function check_state(attribute, state, val){
	if(attribute == 'chemical_or_smart'){
		if(val == 'chemical'){
			if(state == true)  {
				$('#smart').prop('disabled',false);
				render_settings('chemical');
				$('#smart').bootstrapToggle('off');
				$('#smart').prop('disabled','disabled');
				
			}
			if(state == false) {
				render_settings('smart');
				$('#smart').prop('disabled',false);
				$('#smart').bootstrapToggle('on');
				$('#smart').prop('disabled','disabled');
			}
			
		}
	}
	/*
	if(attribute == 'card_type'){
		if(val == 'simple'){
			if(state == true)  {
				$('#with_chip').prop('disabled',false);
				$('#with_chip').bootstrapToggle('off');
				$('#with_chip').prop('disabled','disabled');
				$('div.div_rfid_or_mifre').css('display', 'none');
			}
			if(state == false) {
				$('#with_chip').prop('disabled',false);
				$('#with_chip').bootstrapToggle('on');
				$('#with_chip').prop('disabled','disabled');
				$('div.div_rfid_or_mifre').css('display', 'block');
			}
		}
	}
	*/
	if(attribute == 'rfid_or_mifre'){
		if(val == 'rfid'){
			if(state == true)  {
				$('#mifare').prop('disabled',false);
				$('#mifare').bootstrapToggle('off');
				$('#mifare').prop('disabled','disabled');
				
			}
			if(state == false) {
				$('#mifare').prop('disabled',false);
				$('#mifare').bootstrapToggle('on');
				$('#mifare').prop('disabled','disabled');
			}
		}
	}
	if(attribute == 'sides'){
		if(val == 'single'){
			if(state == true)  {
				$('#both').prop('disabled',false);
				$('#both').bootstrapToggle('off');
				$('#both').prop('disabled','disabled');
				
			}
			if(state == false) {
				$('#both').prop('disabled',false);
				$('#both').bootstrapToggle('on');
				$('#both').prop('disabled','disabled');
			}
		}
		if(val == 'both'){
			if(state == true)  {
				$('#single').prop('disabled',false);
				$('#single').bootstrapToggle('off');
				$('#single').prop('disabled','disabled');
				
			}
			if(state == false) {
				$('#single').prop('disabled',false);
				$('#single').bootstrapToggle('on');
				$('#single').prop('disabled','disabled');
			}
		}
	}
	if(attribute == 'scanners'){
		if(state == true)  render_settings('chemical');
		if(state == false) render_settings('smart');
		$('#'+to_toggle).bootstrapToggle('toggle');
	}
}
</script>