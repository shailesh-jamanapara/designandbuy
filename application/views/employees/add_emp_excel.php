<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
/*
* 12-20-2016
* add_detail page(view/employee)
*/
?>

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
					 <div class="" id="emp_login" >
						<?php if(validation_errors() ){
							echo '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'.validation_errors().'</div><script>/*setTimeout(function(){$("#emp_login").slideUp();},12000);*/</script>';
						}elseif(isset($excelsuccess) && !empty($excelsuccess)){
							echo '<div class="alert alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'.$excelsuccess.'</div><script>/*setTimeout(function(){$("#emp_login").slideUp();},12000);*/</script>';
						}?>
						
						
					</div>
					
				<form class="form-horizontal form-label-left" novalidate method="post" name="upload_excel" id="upload_excel" size="2MB" action="<?php echo base_url(); ?>index.php/Employee_csv/uploadexcel" enctype="multipart/form-data">
                     
                     
					   
						
                        </label>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Email"><span class="requireds">*</span> Upload Your CSV file:
						
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                           <input type="file"  name="file" id="file" accept=".csv">
                        </div>
						
                        </label>
                       <div class="col-md-3 col-sm-3 col-xs-12">
                         <button type="submit"  name="import">Import</button>
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


$('#upload_excel').validate({
			rules:{
			   
	           required:true,
			   file: {
					required:true,
					remote: {
							url: "<?php echo base_url(); ?>index.php/Employee/file_extention_check_csv",
							type: "post",
							data: {
								file: function(){ return $("#file").val(); }
							}
							
								
							
					}
					
					
				},
				
				
			   
			   
			},
			messages:{				
				
				file:{
				remote: 'only accept *.csv file!!'
				},
				
				
			},
			
			
			errorElement: 'span',
			submitHandler: function(form){

					form.submit();
						
				  
				 
				return false;


				} 
		});	
		
		
		
		
		
		});
    </script>