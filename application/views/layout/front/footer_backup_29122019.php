   </div>
</div>
<div class="panel-footer">
   <div class="container">
      
      <div class="footer_content_part">
         <div class="footer_block_part">
            <div class="footer_logo wow fadeInUp"><a href="#"><img src="<?php echo asset_url(); ?>front/images/logo_white.png" alt="" class="img-responsive"></a></div>
            <div class="footer_about wow fadeInUp">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
         </div>
         <div class="footer_block_part">
           <h2 class="wow fadeInUp">Quick Links</h2>
           <ul class="wow fadeInUp">
               <li><a href="<?php echo base_url(); ?>">Home</a></li>
               <li><a href="<?php echo base_url(); ?>about-us">About us</a></li>
               <li><a href="<?php echo base_url(); ?>services">Services</a></li>
               <li><a href="<?php echo base_url(); ?>inquiry">Inquiry</a></li>
               <li><a href="<?php echo base_url(); ?>contact-us">Contact us</a></li>
           </ul>
         </div>
         <div class="footer_block_part">
           <h2 class="wow fadeInUp">Our Services </h2>
           <ul class="wow fadeInUp">
               <li><a href="<?php echo base_url(); ?>services/printing">Printing</a></li>
               <li><a href="<?php echo base_url(); ?>services/id-cards">ID Card </a></li>
               <li><a href="<?php echo base_url(); ?>services/corporate-stationers">Corporate Stationers</a></li>
               <li><a href="<?php echo base_url(); ?>services/academy-stationers">Academy Stationers</a></li>
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
                 <p><a href="mailto:shailesh.gajjar83@gmail.com">shailesh.gajjar83@gmail.com</a></p>
              </div>
           </div>
         </div>
      </div>

      <div class="copyright_block">
            Copyright &copy; 2019 | Design And Buy
      </div>

   </div>
</div>
</script><script type="text/javascript" src="<?php echo asset_url(); ?>front/js/magic-line.js"></script>
<script type="text/javascript">
//login dropdown close avoid
$('.login_head .dropdown-menu').on('click', function(event){
    event.stopPropagation();
});
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
/**** Ajax post for refresh captcha image. *****/
$(document).ready(function() {
	//$('#inquiry-form').bootstrapValidator();
});
function forgotPassword(){
	$("#frm_login")[0].reset();	
	window.location.href="<?php echo  base_url();?>index.php/User_Login/forgotPassword";
}
</script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</body>
</html>