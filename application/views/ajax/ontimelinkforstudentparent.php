<!DOCTYPE HTML>
<html> 
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="theme-color" content="#f26836">
   <title>Vedant School | Muktjivan Pixel</title>
   <link href="<?php echo asset_url();?>/front/assets/images/favicon.png" rel="shortcut icon" />
   <link href="<?php echo asset_url();?>/front/assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo asset_url();?>/front/assets/css/animate.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo asset_url();?>/front/assets/css/font-awesome.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo asset_url();?>/front/assets/css/style.css" rel="stylesheet" type="text/css" />
   <link href="<?php echo asset_url();?>/front/assets/css/responsive.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div class="header_top_part">
   <div class="container">

      <ul class="wow fadeInUp pull-left">
         <li><i class="fa fa-phone" aria-hidden="true"></i> +91 987 654 3210</li>
         <li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:info@muktjivanpixel.com">info@muktjivanpixel.com</a></li>
      </ul>

    </div>
</div>

<div class="navbar navbar-default">
   <div class="container">
      <div class="navbar-brand"><a href="index.html"><img alt="" class="img-responsive" src="<?php echo asset_url();?>/front/assets/images/logo.png" /></a></div>
      <button class="navbar-toggle" data-target=".menu" data-toggle="collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse menu">
         <ul class="nav navbar-nav" id="line_effect">
            <li><a href="index.html">Home</a></li>
            <li class="current-menu-item"><a href="about-us.html">About us</a><div class="linebar"></div></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="inquiry.html">Inquiry</a></li>
            <li><a href="contact-us.html">Contact us</a></li>
         </ul>
      </div>
   </div>
</div>

<div class="inner_title_top">
    <div class="container">
        <div class="page_title"><h2><?php echo $data['school_name'];?> Student`s detail  of <?php echo $data['student_name'];?></h2></div>
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active"><?php echo $data['school_name'];?></li>
        </ol>
    </div>
</div>

<div class="inner_content_bg">
    <div class="container">

        <div class="row">
		 <form id="frm_fill_data" method="post" class="form-horizontal" enctype="multipart/form-data" >
            <div class="col-sm-7">
               
				<div class="card_design_wrap">
					<div class="hori_card_part">
						<div class="hori_header_block">
							<div class="hori_logo_part"><img src="<?php echo asset_url(); ?>/front/assets/images/logo_vedant.jpg" alt="" class="img-responsive"></div>
							<div class="hori_header_title">
								<div class="form-group title1">
									<input readonly type="text" class="form-control" value="(Affiliated To CBSE)">
								</div>
								<div class="form-group title2">
									<input readonly type="text" class="form-control" value="Vedant International School">
								</div>
							</div>
						</div>
						<div class="hori_body_part">
							<div class="hori_card_info_block">
								<div class="">
									<div class="col-md-12">
										<div class="form-group title_name">
											<span>Name :</span>
											<input readonly type="text" class="form-control" value="<?php echo $data['student_name'];?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group title_class">
											<span>Class :</span>
											<input readonly type="text" class="form-control" value="<?php echo $data['standard_id'];?> <?php echo $data['house_id'];?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group title_dob">
											<span>D.O.B.:</span>
											<input readonly type="text" id="fulldate" class="form-control" value="dd-mm-yyyy">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group title_phone">
											<span>Cell No. :</span>
											<span class="fixed fixed-no"><?php echo $data['mobile_no'];?>,</span><input readonly type="text" id="emergency_no" class="form-control fixed" value="contact no.">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group title_address">
											<span><img src="<?php echo asset_url(); ?>/front/assets/images/home_icon.png" alt=""class="img-responsive"> Address</span>
											<textarea type="text" id="fulladdress" readonly class="form-control">Block No., Society name
											Area name, Location , 
											City Name  
											.</textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="hori_photo_block">
								<div class="card_profile_pic">
									<div class="" id="p-image">
									   <img class="profile-pic img-responsive img-responsive-avatar" src="<?php echo asset_url(); ?>/front/assets/images/profile_thumb_default.jpg" alt="">
									 </div>
									 <div class="p-image " >
									   <i class="fa fa-camera upload-button"></i>
										<input class="file-upload form-control " name="student_photo" id="photo_desktop"  data-bv-notempty="true" data-bv-notempty-message="Please upload photo" data-bv-file="true" accept="image/*"  type="file" >
									 </div>
								</div>
								<div class="hori_year_block"><input type="text" class="form-control" value="2019-2020"></div>
							</div>
						</div>
						<div class="hori_bottom_part">
							<textarea class="form-control" readonly>JaiKrishna Soc., Nr. Isanpur Civic Center, Jaymala Cross Road, Isanpur, Ahmedabad-382443 Ph : 32911181</textarea>
						</div>
						
					</div>
					<small class="text-info pull-right hint-desktop"><i>Please click on Red <i class="fa fa-camera"></i> Camera icon to upload photo</i></small>
				</div>
				
            </div>
			 <div class="col-lg-5"> 
								<div class="form-group">
                                    <label class="col-lg-12 control-label">Upload photo </label>
                                    <div class="col-lg-12 photo_desktop">
                                       <input type="file" name="student_photo" id="uploadImage"  data-bv-notempty="true" data-bv-notempty-message="Please upload photo" data-bv-file="true"  class="btn btn-default form-control photo_desktop_file" style="padding-top: 1px !important;"/>
									   <small> <i> Passport size photo </i></small>
									   
                                    </div>
                                    </div>
							 <input type="hidden" name="school_id" id="school_id" value="<?php echo base64_encode($data['school_id']);?>" >
							 <input type="hidden" name="student_id" id="student_id" value="<?php echo base64_encode($data['id']);?>" >
							 <input type="hidden" name="task" id="task" value="submitform" >
									<div class="form-group pull-left">
                                    <label class="col-lg-6 control-label " for="standard_id" >Standard</label>
                                    <label class="col-lg-6 control-label" for="standard_id" >Class</label>
                                    <div class="col-lg-6">
                                        <input type="text" name="standard_id" id="standard_id" readonly class="form-control" value="<?php echo $data['standard_id'];?>" >
                                    </div>
                                   <div class="col-lg-6">
                                        <input type="text" name="student[class]" id="class" readonly class="form-control" value="<?php echo $data['class_id'];?>" >
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-lg-12 control-label">Name</label>
                                    <div class="col-lg-12">
                                        <input type="text" name="student_name" id="name" class="form-control" placeholder="Full name"    readonly value="<?php echo $data['student_name'];?>"   >
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-lg-6  control-label">Mobile No.</label>
                                    <label class="col-lg-6  control-label">Emergency Mobile No.</label>
                                    <div class="col-lg-6">
                                        <input type="text" name="student[mobile_no]" readonly id="mobile_no" class="form-control" placeholder="Mobile No." value="<?php echo $data['mobile_no'];?>" >
                                    </div>
                                   
                                   
                                    <div class="col-lg-6">
                                        <input type="text" name="emergency_contact_no" id="emergency_contact_no" class="form-control" placeholder="Emergency Mobile No."  data-bv-notempty="true" data-bv-notempty-message="Please Enter Emergency Mobile" data-bv-regexp="true" data-bv-regexp-regexp="^[0-9]+$" data-bv-regexp-message="Emergency Mobile must be numbers only" data-bv-stringlength="true" data-bv-stringlength-min="10" data-bv-stringlength-max="10" data-bv-stringlength-message="Emergency Mobile must be 10 numbers">
                                    </div>
                                    </div>
									<!-- 
									<div class="form-group">
                                    <label class="col-lg-4 control-label">Blood Group </label>
                                    <div class="col-lg-8">
                                        <input type="text" name="student[blood_group]" id="blood_group" class="form-control" data-bv-notempty="true" data-bv-notempty-message="Please Enter Blood Group" data-bv-regexp="true" data-bv-regexp-regexp="^[A-O \+-]+$" data-bv-regexp-message="Blood Group must be valid only" data-bv-stringlength="true" data-bv-stringlength-min="10" data-bv-stringlength-max="10" data-bv-stringlength-message="Blood Group 10 characters" >
                                    </div>
                                    </div>-->
									
									
                                    <div class="form-group">
                                    <label class="col-lg-12  control-label" for="dob">Date of Birth</label>
                                    <div class="col-lg-4">
                                        <select class="form-control " name="date" id="date" data-bv-notempty="true"  data-bv-notempty-message="Please select" onchange="javascript:set_date();" >
										<option value="">Date</option>
										<?php for($i=1; $i<32; $i++) { ?>
										<?php $dt = ($i < 10) ? "0".$i : $i; ?>
										<option value="<?php echo $dt;?>"><?php echo $dt;?></option>
										<?php } ?>
										</select>
                                   </div>
								    <div class="col-lg-4">
                                        <select class="form-control" name="month" id="month" data-bv-notempty="true"  data-bv-notempty-message="Please select"  onchange="javascript:set_date();" >
										<option value="">Month</option>
										<?php for($i=1; $i<13; $i++) { ?>
										<?php $mn = ($i < 10) ? "0".$i : $i; ?>
										<option value="<?php echo $mn;?>"><?php echo $mn;?></option>
										<?php } ?>
										</select>
                                    </div>
									 <div class="col-lg-4">
                                        <select class="form-control"  name="year" id="year" data-bv-notempty="true"  data-bv-notempty-message="Please select"  onchange="javascript:set_date();">
										<option value="">Year</option>
										<?php for($i=1990; $i<2018; $i++) { ?>
										<option value="<?php echo $i;?>"><?php echo $i;?></option>
										<?php } ?>
										</select>
                                   
                                    </div>
                                    </div>
									
									<div class="form-group">
                                    <label class="col-lg-12  control-label" for="address">Address</label>
                                    <div class="col-lg-12">
                                       <textarea class="form-control" data-bv-notempty="true" data-bv-notempty-message="Please enter address" cols="15" rows="2" id="address" name="address"> </textarea>
									   <small class="text-info pull-right"><i>Please use <b>Enter </b>key<i class="fa fa-enter"></i> for new line</i></small>
                                    </div>
                                    </div>
									<div class="form-group">
                                   
                                    <div class="col-lg-12">
                                     <label for="verified"> <input type="checkbox" id="verified" class="" name="verified" data-bv-notempty="true"data-bv-notempty-message="Please check this Checkbox"  >Please check this Checkbox and verifiy above details and upload photo </label>
                                    </div>
                                    </div>
									<div class="form-group">
									
									</div>
                                    
								<div class="col-lg-12 text-right">
								<div class="form-group">
									<button type="submit" class="btn btn-default">Submit</button>
								</div>
								</div>
							</div>
							</form>
							
        </div>

    </div>
</div>


<div class="panel-footer">
   <div class="container">
      
      <div class="footer_content_part">
         <div class="footer_block_part">
            <div class="footer_logo wow fadeInUp"><a href="#"><img src="<?php echo asset_url();?>/front/assets/images/logo_white.png" alt="" class="img-responsive"></a></div>
            <div class="footer_about wow fadeInUp">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
         </div>
         <div class="footer_block_part">
           <h2 class="wow fadeInUp">Quick Links</h2>
           <ul class="wow fadeInUp">
                <li><a href="index.html">Home</a></li>
                <li><a href="about-us.html">About us</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="inquiry.html">Inquiry</a></li>
                <li><a href="contact-us.html">Contact us</a></li>
           </ul>
         </div>
         <div class="footer_block_part">
           <h2 class="wow fadeInUp">Services </h2>
           <ul class="wow fadeInUp">
               <li><a href="#">Lorem Ipsum</a></li>
               <li><a href="#">Lorem Ipsum</a></li>
               <li><a href="#">Lorem Ipsum</a></li>
               <li><a href="#">Lorem Ipsum</a></li>
               <li><a href="#">Lorem Ipsum</a></li>
               <li><a href="#">Lorem Ipsum</a></li>
           </ul>
         </div>
         <div class="footer_block_part">
           <h2 class="wow fadeInUp">Contact Details </h2>
           <div class="footer_contact_details">
              <div class="footer_contact_details_block wow fadeInUp">
                 <span><i class="fa fa-map-marker"></i></span>
                 <p>Addressline 1,<br /> Address line2</p>
              </div>
              <div class="footer_contact_details_block wow fadeInUp">
                 <span><i class="fa fa-phone"></i></span>
                 <p>+91 9876543210</p>
              </div>
              <div class="footer_contact_details_block wow fadeInUp">
                 <span><i class="fa fa-envelope"></i></span>
                 <p><a href="mailto:info@muktjivanpixel.com">info@muktjivanpixel.com</a></p>
              </div>
           </div>
         </div>
      </div>

      <div class="copyright_block">
            Copyright &copy; 2019 | Muktjivan Pixel
      </div>

   </div>
</div>

<script type="text/javascript" src="<?php echo asset_url();?>/front/assets/js/jquery-1.11.3.js"></script>
<script type="text/javascript" src="<?php echo asset_url();?>/front/assets/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo asset_url();?>/front/assets/js/wow.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="<?php echo asset_url();?>/front/assets/js/image-upload.js"></script><!--profile image upload-->
<script type="text/javascript">
$(document).ready(function(){
	//emergency_no
	$('input#emergency_contact_no').on('change', function(){
		$('input#emergency_no').val($(this).val());
	});
	$('textarea#address').on('change', function(){
		$('textarea#fulladdress').val($(this).val());
	});
});
function set_date(){
	var dt = $('select#date').val();
	var mn = $('select#month').val();
	var yr = $('select#year').val();
	if(dt != '' && mn != '' && yr !='' ){
		var fulldate = dt+'-'+mn+'-'+yr;
		$('input#fulldate').val(fulldate);
	}
}
//login dropdown close avoid
$('.login_head .dropdown-menu').on('click', function(event){
    event.stopPropagation();
});
//login dropdown close avoid

   //wow animate
   $(function(){
         wow = new WOW({
            animateClass: 'animated',
            offset: 40,
            mobile: false
         });
         wow.init();
   });
   //wow animate
   
   //scroll-to-fixed-menu
         $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            if (scroll >= 100) {
               $(".navbar-default").addClass("navbar_active");
            }
            if (scroll < 100) {
               $(".navbar-default").removeClass("navbar_active");
            }
         })
   //scroll-to-fixed-menu
</script><script type="text/javascript" src="<?php echo asset_url();?>/front/assets/js/magic-line.js"></script>
	
<script>


window.onload = function() {
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		$('.photo_desktop').css('display','block');
		$('.photo_desktop').css('display','block');
		$('.photo_desktop').prop('disabled', false);
		
		$('.photo_mobile').css('display','block');
		$('.photo_mobile').prop('disabled', true);
		$('.p-image ').css('display','none');
		$('.hint-desktop').css('display','none');
		console.log('2');
	  if (window.File && window.FileList && window.FileReader) {
		var filesInput = document.getElementById("uploadImage");
		filesInput.addEventListener("change", function(event) {
		  var files = event.target.files;
		  var output = document.getElementById("p-image");
		  for (var i = 0; i < files.length; i++) {
			var file = files[i];
			if (!file.type.match('image'))
			  continue;
			var picReader = new FileReader();
			picReader.addEventListener("load", function(event) {
			  var picFile = event.target;
			  var div = document.createElement("div");
			  //div.innerHTML = "<img class='profile-pic img-responsive img-responsive-avatar' src='" + picFile.result + "'>";
			 // div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
				//"title='" + picFile.name + "'/>";
			  output.innerHTML = "<img class='profile-pic img-responsive img-responsive-avatar' src='" + picFile.result + "'>";
			  //output.insertBefore(div, null);
			});        
			picReader.readAsDataURL(file);
		  }

		});
	  }
	}else{
		$('.photo_desktop').css('display','none');
		$('.photo_desktop').css('display','none');
		$('.photo_desktop').prop('disabled', true);
		
		$('input.photo_mobile').css('display','block');
		$('input.photo_mobile').prop('disabled', false);
		
		console.log('1');
	}
}

										
</script>

</body>
</html>