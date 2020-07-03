<div class="inner_title_top">
    <div class="container">
        <div class="page_title"><h2>Inquiry</h2></div>
        <ol class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active">Inquiry</li>
        </ol>
    </div>
</div>
<div class="inner_content_bg">
    <div class="container">
        <div class="inner_inquiry_content">
       		<p class="inquiry_form_article"><strong>Any Inquiries?</strong> Fill up the inquiry from..., ...and we will be glad to answer them</p>                    
                
            <div class="inquiry_right_img_block">
                <img src="assets/images/inquiry_icon_img.png" alt="" class="img-responsive wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
            </div>
                 
            <div class="inner_inquiry_form_part">
                <div class="panel panel-default">
                    <div class="panel-heading wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">Inquiry</div>
                        <div class="form-success" id="success-alerts"></div>
                        <div class="panel-body">
                            <form id="inquiry-form"  method="post" action="" class="form-horizontal">
                                <input type="hidden" name="task" id="task" value="make_inquiry" />
                                <div class="form-group wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                                    <label class="col-md-2 col-sm-3 col-xs-12 control-label">Inquiry For</label>
                                    <div class="col-md-10 col-sm-9 col-sm-12">
                                        <select name="contact_for" id="contact_for" class="form-control">
                                            <option value="">Please select</option>
                                            <option value="sample-1" <?php if($request['ACTION'] == 'sample-1'){ echo 'selected="selected" '; } ?> >Product 1</option>
                                            <option value="sample-2" <?php if($request['ACTION'] == 'sample-2'){ echo 'selected="selected" '; } ?>>Product 2</option>
                                            <option value="sample-3" <?php if($request['ACTION'] == 'sample-3'){ echo 'selected="selected" '; } ?>>Product 3</option>
                                            <option value="sample-4" <?php if($request['ACTION'] == 'sample-4'){ echo 'selected="selected" '; } ?>> Product 4</option>
                                            <option value="sample-5" <?php if($request['ACTION'] == 'sample-5'){ echo 'selected="selected" '; } ?>>Product 5</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                                    <label class="col-md-2 col-sm-3 col-xs-12 control-label">Name</label>
                                    <div class="col-md-10 col-sm-9 col-sm-12">
                                        <input type="text" name="crm_contact_name" id="crm_contact_name" class="form-control" placeholder="Name">
                                    </div>
                                </div>

                                <div class="form-group wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                                    <label class="col-md-2 col-sm-3 col-xs-12 control-label">Email</label>
                                    <div class="col-md-10 col-sm-9 col-sm-12">
                                        <input type="email" name="contact_email" id="contact_email" class="form-control" placeholder="Email">
                                    </div>
                                </div>

                                <div class="form-group wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                                    <label class="col-md-2 col-sm-3 col-xs-12 control-label">Subject</label>
                                    <div class="col-md-10 col-sm-9 col-sm-12">
                                        <input type="text" name="contact_subject" id="contact_subject" class="form-control" placeholder="Subject">
                                    </div>
                                </div>

                                <div class="form-group wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                                    <label class="col-md-2 col-sm-3 col-xs-12 control-label">Contact No</label>
                                    <div class="col-md-10 col-sm-9 col-sm-12">
                                        <input type="text" name="contact_number" id="contact_number" class="form-control" placeholder="Mobile No">
                                    </div>
                                </div>

                                <div class="form-group wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                                    <label class="col-md-2 col-sm-3 col-xs-12 control-label">Messages</label>
                                    <div class="col-md-10 col-sm-9 col-sm-12">
                                        <textarea class="form-control" name="contact_message" id="contact_message" placeholder="Messages" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="form-group wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>	
<script>
$(document).ready(function() {
	$('#inquiry-form').bootstrapValidator();
	
});
</script>