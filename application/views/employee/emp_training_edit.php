<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
/*
* 12-20-2016
* edit_detail page(view/employee)
*/




 if(!empty($result_training_detail[0]))
{ 
   $training_detail = $result_training_detail[0];
} 
else
{
   $training_detail = '';
}  
/* //echo '<pre>'; print_r($result_training_detail[0]); exit; */

	
	 if(!empty($training_detail['Training_Name'])){
		$Training_Name = $training_detail['Training_Name'];
	}
	else
	{ 
	    $Training_Name = ''; 
	}
	
	if(!empty($training_detail['Provided_By'])){
		$Provided_By = $training_detail['Provided_By'];
	}else{
	   $Provided_By = '';
	} 
	
	if(!empty($training_detail['Dept'])){
		$Dept = $training_detail['Dept'];
	}else{
	   $Dept = '';
	}
	
	if(!empty($training_detail['Training_Start_Date'])){
		$Training_Start_Date = $training_detail['Training_Start_Date'];
	}else{
	   $Training_Start_Date = '';
	}
	
	if(!empty($training_detail['Valid_For_Month'])){
		$Valid_For_Month = $training_detail['Valid_For_Month'];
	}else{
	   $Valid_For_Month = '';
	}
	
	if(!empty($training_detail['Special_Note'])){
		$Special_Note = $training_detail['Special_Note'];
	}else{
	   $Special_Note = '';
	}	
 
 
     
				
				
 

?>



			  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 
                  <div class="x_content">
					
					
						
				
				<div class="" id="emp_training">
						<?php if(validation_errors() || isset($training_detail_errors) ){
							echo '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';
							if(isset($training_detail_errors)){echo $training_detail_errors.'<br>';}
							echo validation_errors().'</div><script>/*setTimeout(function(){$("#emp_training").slideUp();},3000);*/</script>';
						}?>
					</div>
				
				
					
                    <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>index.php/Employee/emp_training_insert" id="training_detail_Form">
					  <span class="section">Training Details
						
					  </span>

                      
					<div id="Training_Detail_Section" >
					  <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Training_Name"><span class="requireds">*</span> TRAINING NAME:</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" id="Training_Name" name="Training_Name" placeholder="Name Of Training" type="text" maxlength="100"  value="<?php if(isset($Training_Name)){echo $Training_Name;}else{echo set_value('Training_Name');}?>" >
                        </div>
						
						<label class="control-label col-md-2 col-sm-3 col-xs-12" for="Provided_By"><span class="requireds">*</span> PROVIDED BY:</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" id="Provided_By" name="Provided_By" placeholder="Provided By" type="text" maxlength="100" value="<?php if(isset($Provided_By)){echo $Provided_By;}else{echo set_value('Provided_By');}?>" >
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Dept"><span class="requireds">*</span> DEPARTMENT NAME:</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" id="Dept" name="Dept" placeholder="Department Name" type="text" minlength="4" maxlength="100"  value="<?php if(isset($Dept)){echo $Dept;}else{echo set_value('Dept');}?>" >
                        </div>
						
						<label class="control-label col-md-2 col-sm-3 col-xs-12" for="Training_Start_Date"><span class="requireds">*</span> TRAINING START DATE:</label>
                       
                         <div class="col-md-4 col-sm-2 col-xs-12 has-feedback">
                        
						  <input  name="Training_Start_Date" id="Training_Start_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right"   placeholder="Date eg. 12/27/2016" type="text" value="<?php if($Training_Start_Date =="0000-00-00"){echo '';} elseif(set_value('Training_Start_Date')){echo set_value('Training_Start_Date');}
						  elseif($Training_Start_Date!="0000-00-00"){
						  $dt2 =  date_create($Training_Start_Date);
						  $Training_Start_Date1 =  date_format($dt2,'m/d/Y');  
						  echo $Training_Start_Date1; 
						   }else { echo "";} ?>" >
						  <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                        </div>
                       
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Valid_For_Month">VALID FOR:</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                           <input class="form-control col-md-7 col-xs-12" id="Valid_For_Month" name="Valid_For_Month" placeholder="Valid For Day or Month" type="text" maxlength="100" value="<?php if(isset($Valid_For_Month)){echo $Valid_For_Month;}else{echo set_value('Valid_For_Month');}?>" >
                        </div>
                    
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Special_Note">SPECIAL NOTE:</label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <textarea id="Special_Note" name="Special_Note" class="form-control col-md-7 col-xs-12" placeholder="SPECIAL NOTE" maxlength="400" ><?php if(isset($Special_Note)){echo $Special_Note;}else{echo set_value('Special_Note');}?></textarea>
                        </div>
                      </div>
					</div>
					  <input type="hidden" id="Emp_ID" name="Emp_ID" value="<?php echo $Emp_ID;?>" maxlength="5">
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
		
		/************** Jquery validation rules,messages and submit handler ****************/
		$('#training_detail_Form').validate({
			rules:{
				Training_Name: {
					required:true,
					minlength:2,
					maxlength:100
				},
				Provided_By:{
				    required:true,
				    maxlength:100,
				},
				Dept: {
					required:true,
					minlength:2,
					maxlength:100
				},
				Training_Start_Date:{
					required: true
				}
				
			}, 
			
		
			
			errorElement: 'span',
			submitHandler: function(form){

					form.submit();
						
				  
				 
				return false;


				} 
		});		
		
	  });   
    </script>
		