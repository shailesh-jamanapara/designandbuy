
<div class="featured_templates_content">
   <div class="container">
      <div class="featured_hori_part">
         <div class="row">
				    <div class="inner_inquiry_form_part full-width">
                        <div class="panel panel-default">
                            <div class="panel-heading">Students detail</div>
                            <div class="form-success" id="success-alerts"></div>
							 <form id="frm_fill_data" method="post" class="form-horizontal">
							 <input type="hidden" name="school_id" id="school_id" value="" >
							 <input type="hidden" name="student_id" id="student_id" value="" >
                            <div class="panel-body">
							 <div class="row">
							  <div class="col-lg-6">
									<div class="form-group">
                                    <label class="col-lg-4 control-label" for="standard_id" >Standard</label>
                                    <div class="col-lg-3">
                                        <input type="text" name="student[standard_id]" id="standard_id" readonly class="form-control" >
                                    </div>
                                   
                                    <label class="col-lg-2 control-label" for="class">Class</label>
                                    <div class="col-lg-3">
                                        <input type="text" name="student[class]" id="class" readonly class="form-control" >
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-lg-4 control-label">Name</label>
                                    <div class="col-lg-8">
                                        <input type="text" name="student[name]" id="name" class="form-control" placeholder="Full name"  data-bv-notempty="true" data-bv-notempty-message="Please Enter Surname" data-bv-regexp="true" data-bv-regexp-regexp="^[a-zA-Z ]+$" data-bv-regexp-message="Surname must be alphabet only" data-bv-stringlength="true" data-bv-stringlength-min="3" data-bv-stringlength-max="30" data-bv-stringlength-message="Surname must be between 3 to 30 characters"  readonly >
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-lg-4  control-label">Mobile No.</label>
                                    <div class="col-lg-8">
                                        <input type="text" name="student[mobile_no]" readonly id="mobile_no" class="form-control" placeholder="Mobile No." >
                                    </div>
                                    </div>
									<div class="form-group">
                                    <label class="col-lg-4 control-label">Emergency Mobile </label>
                                    <div class="col-lg-8">
                                        <input type="text" name="student[emergency]" id="emergency" class="form-control" placeholder="Emergency Mobile No."  data-bv-notempty="true" data-bv-notempty-message="Please Enter Emergency Mobile" data-bv-regexp="true" data-bv-regexp-regexp="^[0-9]+$" data-bv-regexp-message="Emergency Mobile must be numbers only" data-bv-stringlength="true" data-bv-stringlength-min="10" data-bv-stringlength-max="10" data-bv-stringlength-message="Emergency Mobile must be 10 numbers">
                                    </div>
                                    </div><!-- 
									<div class="form-group">
                                    <label class="col-lg-4 control-label">Blood Group </label>
                                    <div class="col-lg-8">
                                        <input type="text" name="student[blood_group]" id="blood_group" class="form-control" data-bv-notempty="true" data-bv-notempty-message="Please Enter Blood Group" data-bv-regexp="true" data-bv-regexp-regexp="^[A-O \+-]+$" data-bv-regexp-message="Blood Group must be valid only" data-bv-stringlength="true" data-bv-stringlength-min="10" data-bv-stringlength-max="10" data-bv-stringlength-message="Blood Group 10 characters" >
                                    </div>
                                    </div>-->
									<div class="form-group">
                                    <label class="col-lg-4 control-label">Photo </label>
                                    <div class="col-lg-8">
                                       <input type="file" name="student[photo]" id="photo"  data-bv-notempty="true" data-bv-notempty-message="Please upload photo" data-bv-file="true"  class="btn btn-default form-control" />
                                    </div>
                                    </div>
									
									
                                    
                              
                            </div>
								 <div class="col-lg-6">
                               
                                    <div class="form-group">
                                    <label class="col-lg-3  control-label" for="dob">Date of Birth</label>
                                    <div class="col-lg-3">
                                        <select class="form-control " name="student[date]" id="date">
										<option value="">Date</option>
										<?php for($i=1; $i<32; $i++) { ?>
										<option value="<?php echo $i;?>"><?php echo $i;?></option>
										<?php } ?>
										</select>
                                   </div>
								    <div class="col-lg-3">
                                        <select class="form-control" name="student[date]" id="date">
										<option value="">Month</option>
										<?php for($i=1; $i<13; $i++) { ?>
										<option value="<?php echo $i;?>"><?php echo $i;?></option>
										<?php } ?>
										</select>
                                    </div>
									 <div class="col-lg-3">
                                        <select class="form-control"  name="student[date]" id="date">
										<option value="">Year</option>
										<?php for($i=1990; $i<2018; $i++) { ?>
										<option value="<?php echo $i;?>"><?php echo $i;?></option>
										<?php } ?>
										</select>
                                   
                                    </div>
                                    </div>
									
									<div class="form-group">
                                    <label class="col-lg-3  control-label" for="address">Address</label>
                                    <div class="col-lg-9">
                                       <textarea class="form-control" cols="15" rows="2" id="address" name="student[address]" data-bv-notempty="true" data-bv-notempty-message="Please Enter Address" data-bv-regexp="true" data-bv-regexp-regexp="^[a-zA-Z0-9 \/ .- ]+$" data-bv-regexp-message="Address must be alphabet only" data-bv-stringlength="true" data-bv-stringlength-min="10" data-bv-stringlength-max="150" data-bv-stringlength-message="Address must be between 10 to 150 characters" > </textarea>
                                    </div>
                                    </div>
                                    
                              
								</div>
							 
								<div class="col-lg-12 text-center">
								<div class="form-group">
									<button type="submit" class="btn btn-default">Submit</button>
								</div>
								</div>
							</div>
							
                            </div>
                        </div>
						  </form>
                     </div>
                
                </div>
          
      </div>

   </div>
</div>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>	
<script>

$(document).ready(function() {
	$('#frm_fill_data').bootstrapValidator();
});

</script>