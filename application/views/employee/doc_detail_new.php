<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
/*
* 12-20-2016
* edit_detail page(view/employee)
*/

//echo '<pre>'; print_r($result_doc_get); exit;
?>

			  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 
                  <div class="x_content">
					<div class="" id="doc_detail" >
						<?php if(validation_errors() ){
							echo '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'.validation_errors().'</div><script>setTimeout(function(){$("#doc_detail").slideUp();},3000);</script>';
						}?>						
					</div>
					
                    <form class="form-horizontal form-label-left" id="document_employee" method="POST" action="<?php echo base_url();?>index.php/Employee_insert/insert_document" enctype="multipart/form-data">
					
                      <span class="section">Document Information</span>
                      
                      
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">PASSPORT SIZE PHOTOS:</label>
                        <div class="col-md-1 col-sm-1 col-xs-12">
                          <div id="Passport_Photo1" class="btn-group" data-toggle="buttons">							
							<input <?php if(!empty($result_doc_get['Passport_Photo_Date']) && !empty($result_doc_get['Passport_Photo_File']) ){ echo 'checked';}?> id="Passport_Photo" name="Passport_Photo" value="1" type="checkbox" class="checkbox">
						  </div>
						</div>
						<span class="span_tag" style="">
						<div class="col-md-2 col-sm-2 col-xs-12">
                          <input name="Passport_Photo_date" id="Passport_Photo_date" class="date-picker form-control col-md-7 col-xs-12" placeholder="Date eg. 12/27/2016" value="<?php if(!empty($result_doc_get['Passport_Photo_Date'])){echo $result_doc_get['Passport_Photo_Date'];}?>" type="date" required="">
                        </div>
						
				<?php if(!empty($result_doc_get['Passport_Photo_File'])){ ?>
							<div class="col-md-5 col-sm-3 col-xs-12">
								<img src="<?php echo base_url().'uploads/'.$result_doc_get['Passport_Photo_File'];?>" style="width:30px; height:30px;">
								&nbsp;<a href="javascript:void(0);"><i style="font-size:25px;color: #d9534f;" class="fa fa-remove"></i></a>
							</div>
				<?php	}else{ ?>
							<div class="col-md-5 col-sm-3 col-xs-12">
								<label class="control-label"> <input id="Passport_Photo_Upload" name="Passport_Photo_Upload" type="file" required=""></label>
							</div>
				<?php	}?>						
						</span>
						
                      </div>
					  
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">RESIDENT PROOF:</label>
                        <div class="col-md-1 col-sm-1 col-xs-12">
                          <div id="PhotoId_Proof" class="btn-group" data-toggle="buttons">
                            <input <?php if(!empty($result_doc_get['Resident_Proof_Date']) && !empty($result_doc_get['Resident_Proof_File']) ){ echo 'checked';}?> name="Resident_Proof" id="Resident_Proof" value="1" type="checkbox"  class="checkbox">
                          </div>
                        </div>
						<span class="span_tag">
						<div class="col-md-2 col-sm-2 col-xs-12">
                          <input name="Resident_Proof_Date" id="Resident_Proof_Date" class="date-picker form-control col-md-7 col-xs-12" placeholder="Date eg. 12/27/2016" value="<?php if(!empty($result_doc_get['Resident_Proof_Date'])){ echo $result_doc_get['Resident_Proof_Date'];}?>" type="text" required="">
                        </div>
				<?php if(!empty($result_doc_get['Resident_Proof_File'])){ ?>
							<div class="col-md-5 col-sm-3 col-xs-12">
								<img src="<?php echo base_url().'uploads/'.$result_doc_get['Resident_Proof_File'];?>" style="width:30px; height:30px;">
								&nbsp;<a href="javascript:void(0);"><i style="font-size:25px;color: #d9534f;" class="fa fa-remove"></i></a>
							</div>
				<?php	}else{ ?>
							<div class="col-md-5 col-sm-3 col-xs-12">
								<label class="custom-file">
								  <input type="file" name="Resident_Proof_Upload" id="Resident_Proof_Upload" class="custom-file-input" required="">
								  <span class="custom-file-control"></span>
								</label>								
							</div>
				<?php	}?>
				
						</span>
                      </div>
					 
					  <input type="hidden" id="Emp_ID" name="Emp_ID" value="<?php echo $Emp_ID; ?>">
					  <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="<?php echo base_url()?>index.php/Employee/add_emp_list"><button type="button" class="btn btn-danger">Cancel</button></a>
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  
					
                  </div>
                </div>
              </div>
			  
            </div>
          </div>
        </div>
        <!-- /page content -->
	
	
<script>
$(document).ready(function(){
	/******** on load checkbox status ********/
	$('.checkbox').each(function(){
		if($(this).prop("checked") == true){
			$(this).closest('.form-group').children('.span_tag').css('display','block');
		}
		else{
			$(this).closest('.form-group').children('.span_tag').css('display','none');
		}				
	});
		
	
	/********* on click checkbox ***********/
	$('.checkbox').change(function(){
		if($(this).prop("checked") == true){
			$(this).closest('.form-group').children('.span_tag').css('display','block');
			//$(this).closest('.form-group').children('.date-picker').attr('required', 'required');
		}
		else{
			$(this).closest('.form-group').children('.span_tag').css('display','none');
			//$(this).closest('.form-group').children('.date-picker').attr('required', '')
		}
	});

});


$('#document_employee').validate({
	
	errorElement:'span',
	submitHandler:function(form){
		form.submit();
	}
});




</script>