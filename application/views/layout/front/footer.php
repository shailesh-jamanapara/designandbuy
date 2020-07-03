  <!-- ======== @Region: #footer ======== -->
  <footer id="footer" class="py-3">
    <div class="container">
      <div class="row">
        <!--@todo: replace with company copyright details-->
        <div class="col-md-6">
          <p class="mb-0 text-sm">Copyright 2019 &copy; Design And Buy</p>
          <ul class="list-inline footer-links mb-0 text-sm">
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Contact Us</a></li>
          </ul>
        </div>
        <div class="col-md-6 flex-valign">
          <div class="float-md-right ml-md-auto">
            <!--@todo: replace with company social media details-->
            <a href="#" class="btn btn-sm btn-icon btn-dark btn-rounded"><i class="fab fa-twitter"></i></a>
            <a href="#" class="btn btn-sm btn-icon btn-dark btn-rounded"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="btn btn-sm btn-icon btn-dark btn-rounded"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" class="btn btn-sm btn-icon btn-dark btn-rounded"><i class="fab fa-google-plus-g"></i></a>
            <a href="#top" class="btn btn-sm btn-icon btn-dark btn-rounded" title="Back to top"><i class="fa fa-chevron-up"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--Hidden elements - excluded from jPanel Menu on mobile-->
  <div class="hidden-elements js-off-canvas-exclude">
    <!--@modal - signup modal-->
    <div class="modal fade" id="signup-modal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <form action="signup.html">
          <div class="modal-content">
            <div class="modal-header bg-light">
              <h4 class="modal-title">
                Sign Up
              </h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <h6 class="op-8">
                  Price Plan
                </h6>
                <select class="form-control">
                    <option>Basic</option>
                    <option>Pro</option>
                    <option>Pro +</option>
                  </select>
              </div>
              <hr />

              <h6 class="op-8">
                Account Information
              </h6>
              <div class="form-group">
                <label class="sr-only" for="signup-first-name">First Name</label>
                <input type="text" class="form-control" id="signup-first-name" placeholder="First name">
              </div>
              <div class="form-group">
                <label class="sr-only" for="signup-last-name">Last Name</label>
                <input type="text" class="form-control" id="signup-last-name" placeholder="Last name">
              </div>
              <div class="form-group">
                <label class="sr-only" for="signup-username">Userame</label>
                <input type="text" class="form-control" id="signup-username" placeholder="Username">
              </div>
              <div class="form-group">
                <label class="sr-only" for="signup-email">Email address</label>
                <input type="email" class="form-control" id="signup-email" placeholder="Email address">
              </div>
              <div class="form-group">
                <label class="sr-only" for="signup-password">Password</label>
                <input type="password" class="form-control" id="signup-password" placeholder="Password">
              </div>
              <div class="form-check text-xs">
                <label class="form-check-label op-8">
                    <input type="checkbox" value="term" class="form-check-input mt-1">
                    I agree with the Terms and Conditions. 
                  </label>
              </div>
            </div>
            <div class="modal-footer bg-light py-3">
              <div class="d-flex align-items-center">
                <button type="button" class="btn btn-primary">Sign Up</button>
                <button type="button" class="btn btn-link ml-1" data-dismiss="modal" aria-hidden="true">Cancel</button>
              </div>
              <p class="text-xs text-right text-lh-tight op-8 my-0 ml-auto">Already signed up? <a href="login.html">Login here</a></p>
            </div>
          </div>
          <!-- /.modal-content -->
        </form>
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!--@modal - login modal-->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form class="form-horizontal form-label-left" novalidate method="post"  action="<?php echo base_url(); ?>/User_Login/loginValidate?token=<?php echo rand(5000,10000); ?>" id="loginform" data-bv-message="This value is not valid" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" enctype="multipart/form-data" autocomplete="off">
            <div class="modal-header bg-light">
              <h4 class="modal-title">
                Login
              </h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label class="sr-only" for="login-email">Email</label>
                <input type="text" id="User_ID" name="User_ID" class="form-control" placeholder="Username" required>

              </div>
              <div class="form-group mb-0">
                <label class="sr-only" for="password">Password</label>
                <input type="password" id="password" name="Password" class="form-control password mb-1" required placeholder="Password">
              </div>
            </div>
            <div class="modal-footer bg-light py-3">
              <div class="d-flex align-items-center">
                <button type="submit" class="btn btn-primary">Login</button>
                <button type="button" class="btn btn-link ml-1" data-dismiss="modal" aria-hidden="true">Cancel</button>
              </div>
              <p class="text-xs text-right text-lh-tight op-8 my-0 ml-auto">
                Not a member? <a href="#" class="signup">Sign up now!</a>
                <br />
                <a href="#">Forgotten password?</a>
              </p>
            </div>
        </div>
        <!-- /.modal-content -->
        </form>
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  </div>


  <!--jQuery 3.3.1 via CDN -->

  <!-- Popper 1.14.6 via CDN, needed for Bootstrap Tooltips & Popovers -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

  <!-- Bootstrap v4.3.1 JS via CDN -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- /compose -->

  <!-- JS plugins required on all pages NOTE: Additional non-required plugins are loaded ondemand as of AppStrap 2.5 To disable this and load plugin assets manually simple add data-plugins-manual=true to the body tag -->

  <!--Custom scripts & AppStrap API integration -->
  <script src="<?php echo asset_url(); ?>/front/js/custom-script.js"></script>
  <!--AppStrap scripts mainly used to trigger libraries/plugins -->
  <script src="<?php echo asset_url(); ?>/front/js/script.js"></script>
  <script>

  </script>
</body>

</html>