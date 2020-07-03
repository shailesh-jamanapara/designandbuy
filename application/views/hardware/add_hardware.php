<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
/*
* 22-12-2016
* add_detail page(view/event)
*/
?>

<script>
	$(document).ready(function(){
		var date_input=$('input[name="Events_Date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'mm/dd/yyyy',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	});
	
</script>
 



	<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add New Hardware</h3>
              </div>
              
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate method="post" id="Hardware_Form" action="">
                      
                      <span class="section">Hardware Information</span>

					  
					  <div class="item form-group">
						<label class="control-label col-md-2 col-sm-3 col-xs-12" for="Position"><span class="requireds">*</span> Employee Name: </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">                          
						  <select class="form-control col-md-7 col-xs-12" id="Position" name="Position" tabindex="-1" required="required" >
							   
								<option value="" selected >--Select Role--</option>
								<option value="2">Tesy</option>
								<option value="3">Kelvin</option>
								<option value="4">jacks</option>
								<option value="5">Kevi</option>
								<option value="6" >Johanson</option>
								<option value="7">Mette</option>
							  </select>
                        </div>
						
						
                      </div>
					  
                      <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="name"> <span class="requireds">*</span> Hardware Name 
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input id="Hardware_Name" class="form-control col-md-7 col-xs-12" required="required" name="Hardware_Name" placeholder="eg. Iphone"  type="text">
						 
                        </div>
                      </div>
					  
					  
					  
				
					  <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="birthday"> <span class="requireds">*</span>Assign Date
                        </label>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <input  name="hardware_Date" class="date-picker form-control col-md-7 col-xs-12 Events_Date"  type="text">
                        </div>
                      </div>
					  
					  <div class="item form-group">
                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="birthday"> Status
                        </label>
					  <div class="col-md-2 col-sm-6 col-xs-12">
                          <div id="Gender" class="btn-group" data-toggle="buttons">                           
							<input checked data-toggle="toggle" data-on="ON" data-off="OFF" data-onstyle="primary" data-offstyle="default" type="checkbox">
                          </div>
                        </div></div>
                     
                      <div class="ln_solid"></div>
                     <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="<?php echo base_url()?>index.php/Dashboard"><button type="button" class="btn btn-danger">Cancel</button></a>
                          <button id="send" type="submit" class="btn btn-success">Add</button>
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
	<script type="text/javascript">
	
	 $(document).ready(function(){
 
$('#Hardware_Form').validate({
			rules:{
				Hardware_Name: {
					required:true,
					minlength:2,
					maxlength:50
				},
				
				hardware_Date: {
					required:true
					
				},
			},
			
			messages:{				
				Hardware_Name:{
					required: "This field is required",
					minlength: "This required minimum 2 character",
					maxlength: "This required maximum 50 character",
  					
				}
				
			},
			errorElement: 'span',
		});	
		});	
</script>
	