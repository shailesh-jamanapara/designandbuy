  <!-- ======== @Region: #content ======== -->
  <div id="content" class="pt-3 pt-lg-6 pb-lg-0 mb-lg-8">
    <div class="container">
    <form id="frm1"  method="post" action=""  class="form-login form-wrapper form-narrow form-horizontal" autocomplete="off">
        <h3 class="title-divider">
            Forgotten password
          <small class="mt-4">Enter your username to reset password </small>
        </h3>
        <div class="form-group">
          <input type="hidden" name="task" id="task" value="forgetpassword" >
          <input type="text" name="username" class="form-control" placeholder="Username" maxlength="50" required="required" value="" data-bv-notempty="true" data-bv-notempty-message="Please enter Username" data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z0-9]+$" data-bv-regexp-message="Please Enter Valid  Username. Allowed only Alphanumeric value" autocomplete="off">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-rounded shadow btn-primary">Submit</button>
        </div>
      </form>
       </div> 
   </div> 
   <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>	
<script>
$(document).ready(function() {
	$('#frm1').bootstrapValidator();
});
</script>