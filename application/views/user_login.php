  <!-- ======== @Region: #content ======== -->
  <div id="content" class="pt-3 pt-lg-6 pb-lg-0 mb-lg-7">
    <div class="container">
    <form id="inquiry-form"  method="post" action="<?php echo base_url();?>User_Login/loginValidate"  class="form-login form-wrapper form-narrow form-horizontal" auto-complete="off">
        <h3 class="title-divider">
          <span>Login</span>
          <small class="mt-4">New user? <a href="<?php echo base_url();?>create-account">Create an account</a>.</small>
        </h3>
        <div class="form-group">
          <label class="sr-only" for="login-email-page">Email</label>
          <input type="text" name="User_ID" class="form-control" placeholder="Username" maxlength="50" required="required" value="" data-bv-notempty="true" data-bv-notempty-message="Enter Username" data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z0-9]+$" data-bv-regexp-message="Please Enter Valid  Username. Allowed only Alphanumeric value" auto-complete="off">
        </div>
        <div class="form-group">
          <label class="sr-only" for="login-password-page">Password</label>
          <input type="password" name="Password" class="form-control" placeholder="Password" required="required" >
        </div>
        <button type="submit" class="btn btn-rounded shadow btn-primary">Login</button> |
        <small><a href="<?php echo base_url();?>forgotten-password">Forgotten Password?</a></small>
      </form>
       </div> 
   </div> 