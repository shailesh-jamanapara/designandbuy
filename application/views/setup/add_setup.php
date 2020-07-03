<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
/*
* 12-20-2016
* add_setup page(view/employee)
*/
 /* echo '<PRE>';
print_r($result_benefit_detail);
exit; */ 
if(isset($result_benefit_detail)){
if(!empty($result_benefit_detail[0]) && isset($result_benefit_detail[0]))
{ 
   $training_detail = $result_benefit_detail[0];
} 
else
{
   $training_detail = '';
}  
/* //echo '<pre>'; print_r($result_training_detail[0]); exit; */

	
	 if(!empty($training_detail['Benefit_Category'])){
		$Benefit_Category = $training_detail['Benefit_Category'];
	}
	else
	{ 
	    $Benefit_Category = ''; 
	}
	
	if(!empty($training_detail['Benefit_Name'])){
		$Benefit_Name = $training_detail['Benefit_Name'];
	}else{
	   $Benefit_Name = '';
	} 
	
	if(!empty($training_detail['Short_Description'])){
		$Short_Description = $training_detail['Short_Description'];
	}else{
	   $Short_Description = '';
	}
	
	if(!empty($training_detail['Benefit_Alias_Name'])){
		$Benefit_Alias_Name = $training_detail['Benefit_Alias_Name'];
	}else{
	   $Benefit_Alias_Name = '';
	}
	
	if($training_detail['Offered'] == 0){
		$Offered = 0;
	}else{
	   $Offered = 1;
	}
	
	if(!empty($training_detail['Bimsym_Contribution'])){
		$Bimsym_Contribution = $training_detail['Bimsym_Contribution'];
	}else{
	   $Bimsym_Contribution = '';
	}
    if(!empty($training_detail['Your_Contribution'])){
		$Your_Contribution = $training_detail['Your_Contribution'];
	}else{
	   $Your_Contribution = '';
	}
    if(!empty($training_detail['Based_On'])){
		$Based_On = $training_detail['Based_On'];
	}else{
	   $Based_On = '';
	}	
	if(!empty($training_detail['Limit'])){
		$Limit = $training_detail['Limit'];
	}else{
	   $Limit = '';
	}	

}
?>
 <style type="text/css">
.error1{
	color:red;
	margin:10px;
	border: 0.5px solid red;
   text-align: center;
}
</style>
	<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
				<h2>BimSym eBusiness Solutions</h2>
			  </div>
              
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 
                  <div class="x_content">
					
                    <form class="form-horizontal form-label-left" novalidate method="post" action="<?php echo base_url(); ?>index.php/Setup/add_setup_benefit" id="Add_Setup_File">
                      <input type="hidden" value="<?php if(isset($Ear_ID)){echo $Ear_ID;}?>" name="Ear_ID">
                      <span class="section">Setup Benefit Information</span>
                     <div class="" id="emp_training">
						<?php if(validation_errors() || isset($training_detail_errors) ){
							echo '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';
							if(isset($training_detail_errors)){echo $training_detail_errors.'<br>';}
							echo validation_errors().'</div><script>/*setTimeout(function(){$("#emp_training").slideUp();},3000);*/</script>';
						}?>
					</div>
					
                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Benefit_Category"><span class="requireds">*</span> BENEFIT CATEGORY:</label>
					<div class="col-md-3 col-sm-3 col-xs-12">   
						<select class="form-control col-md-1 col-xs-4" id="Benefit_Category" name="Benefit_Category" required="required">
						       <option value="" selected disabled>--Select Benefit--</option>
							   <option value="1" <?php if(isset($Benefit_Category) && $Benefit_Category == '1' ){echo 'selected';}else{ set_select('Benefit_Category','1');}?> >Earnings</option>
							   <option value="2" <?php if(isset($Benefit_Category) && $Benefit_Category == '2' ){echo 'selected';}else{ set_select('Benefit_Category','2');}?> >Retirements</option>
							   <option value="3" <?php if(isset($Benefit_Category) && $Benefit_Category == '3' ){echo 'selected';}else{ set_select('Benefit_Category','3');}?> >Benefits</option>
						</select>
					</div>
                      
						
						<label class="control-label col-md-2 col-sm-3 col-xs-12" for="Benefit_Name"><span class="requireds">*</span> BENEFIT NAME:</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" id="Benefit_Name" name="Benefit_Name"  maxlength="50" placeholder="Benefit Name" value="<?php if(isset($Benefit_Name)){echo $Benefit_Name;}else{echo set_value('Benefit_Name');}?>" placeholder="" maxlength="50" required="required" type="text">
                        </div>
                      </div>
                      
                      <div class="item form-group">
					  <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Short_Description"> SHORT DESCRIPTION:
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <textarea id="Short_Description" name="Short_Description" placeholder="Short Description" maxlength="100" class="form-control col-md-7 col-xs-12"><?php if(set_value('Short_Description')){echo set_value('Short_Description');}else{if(isset($result_benefit_detail)){  echo $Short_Description;}} ?></textarea>
                        </div>
						
						
                      </div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Benefit_Alias_Name"><span class="requireds">*</span> BENEFIT ALIAS NAME:
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" id="Benefit_Alias_Name" name="Benefit_Alias_Name" placeholder="Benefit Alias Name" value="<?php if(isset($Benefit_Alias_Name)){echo $Benefit_Alias_Name;}else{echo set_value('Benefit_Alias_Name');}?>" maxlength="10" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
						 <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Offered"><span class="requireds">*</span> OFFERED:</label>
						<div class="col-md-3 col-sm-3 col-xs-12">   
							<select class="form-control col-md-1 col-xs-4" id="Offered" name="Offered" required="required">
								   <option value="" selected disabled>--Select Offered--</option>
								   <option value="1"  <?php if(isset($Offered) && $Offered == '1' ){echo 'selected';}else{ set_select('Offered','1');}?>>Yes</option>
								   <option value="0"  <?php if(isset($Offered) && $Offered == '0' ){echo 'selected';}else{ set_select('Offered','0');}?> >No</option>
								   
							</select>
						</div>
						
                      </div>  
					  
                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Bimsym_Contribution"> BIMSYM CONTRIBUTATION:</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="Bimsym_Contribution" type="text"  maxlength="4" name="Bimsym_Contribution" placeholder="Bimsym Contribution" value="<?php if(isset($Bimsym_Contribution)){echo $Bimsym_Contribution;}else{echo set_value('Bimsym_Contribution');}?>" maxlength="50" class="form-control col-md-7 col-xs-12">
                        </div>
						
						<label for="Your_Contribution" class="control-label col-md-2 col-sm-3 col-xs-12"> YOUR CONTRIBUTATION:</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="Your_Contribution" type="text" name="Your_Contribution"  maxlength="4" placeholder="Your Contribution" value="<?php if(isset($Your_Contribution)){echo $Your_Contribution;}else{echo set_value('Your_Contribution');}?>" class="form-control col-md-7 col-xs-12">
						 
                        </div>
                      </div>
                     
					  
					  
					  <div class="item form-group">
                       <label class="control-label col-md-2 col-sm-3 col-xs-12" for="Based On"> BASED ON:</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="Based_On" type="text" name="Based_On" placeholder="Based On"  maxlength="15" value="<?php if(isset($Based_On)){echo $Based_On;}else{echo set_value('Based_On');}?>" maxlength="30" class="form-control col-md-7 col-xs-12">
                        </div>
						
						<label for="Limit" class="control-label col-md-2 col-sm-3 col-xs-12"> LIMIT:</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input id="Limit" type="text" name="Limit"  placeholder="Limit"  maxlength="4" value="<?php if(isset($Limit)){echo $Limit;}else{echo set_value('Limit');}?>" class="form-control col-md-7 col-xs-12">
						</div>
						
                      </div>
					  
					  
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href=""><button type="button" class="btn btn-danger">Cancel</button></a>
                          <button id="Add" type="submit" name="Add" class="btn btn-success">Submit</button>
                         
                        </div>
                      </div>
					  
					  <span class="requireds"> Fields marked with an * are required </span>
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
		$('#Add_Setup_File').validate({
			rules:{
				Benefit_Category: {
					required:true
				},
				Benefit_Name:{
				    required:true,
					minlength:2,
					maxlength:50
				},
				Benefit_Alias_Name: {
					required:true,
					minlength:2,
					maxlength:50
				},
				Offered:{
					required: true
				},
				Short_Description:{
				   maxlength:100
				},
				Your_Contribution:{
				   maxlength:10
				},
				Based_On:{
				   maxlength:20
				},
				Limit:{
				   maxlength:10
				},
				
				/* Username:{
					required:true,
					minlength:6,
					maxlength:50,
					remote: {
							url: "<?php echo base_url(); ?>index.php/Employee/getUser",
							type: "post",
							data: {
								Username: function(){ return $("#Username").val(); }
							}
							
								
							
					}
				},
				Password:{
					required:true,
					pwcheck: true,
					minlength:8,
					maxlength:20
				}*/
			}, 
			
			
			
			errorElement: 'span',
			submitHandler: function(form){

					form.submit();
						
				  
				 
				return false;


				} 
		});	


       		
		
	  });   
    </script>
	
	<script>
/* $(document).ready(function(){
	$('#Username').blur(checkAvailability);
});

function checkAvailability(){
	var Username = $('#Username').val();	
	
	
		$.ajax({
			type: "post",
			url: "<?php echo base_url(); ?>index.php/Employee/getUser",
			cache: false,				
			data:{Username:Username},
			dataType:'json',
			success: function(response){
             // alert(response);
				try{
					if(response.user_status =='0'){
						$('#Username').css('border', '2px green solid');	
					}else if(response.user_status =='1'){
						$('#Username').css('border', '2px red solid');	
					}										
				}catch(e) {		
					alert('Exception while request..');
				}		
			},
			error: function(){						
				alert('Error while request..');
			}
		 });
	
}	
 */</script>
	