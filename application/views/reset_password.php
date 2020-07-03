  <!-- ======== @Region: #content ======== -->
  <div id="content" class="pt-3 pt-lg-6 pb-lg-0 mb-lg-8">
    <div class="container">
    <form id="identicalForm"  method="post" action=""  class="form-login form-wrapper form-narrow form-horizontal" autocomplete="off">
        <h3 class="title-divider">
            Reset password
      
        </h3>
        <input type="hidden" name="task" id="task" value="resetpassword" >
          <input type="hidden" name="token" id="token" value="<?php echo $token; ?>" >
    <div class="form-group">
        <label class="control-label col-lg-12">Password</label>
        <div class="col-lg-12">
            <input type="password" class="form-control" name="password" required />
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg-12 control-label">Confirm password</label>
        <div class="col-lg-12">
            <input type="password" class="form-control" name="confirmPassword" required />
        </div>
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
    $('#identicalForm').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            password: {
                validators: {
                    identical: {
                        field: 'confirmPassword',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            confirmPassword: {
                validators: {
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            }
        }
    });
});
</script>