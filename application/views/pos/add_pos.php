<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
/*
* 22-12-2016
* add_pos page(pos/add_pos)
*/

 if(!empty($edit_pos[0]['Position_Name'])){
		$Position_Name = $edit_pos[0]['Position_Name'];
	}else{
	   $Position_Name = '';
	}
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
                <h3>Add New Position</h3>
              </div>
              
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" novalidate method="post" id="Pos_Form" action="<?php echo base_url(); ?>index.php/position/insert_pos">
					
					 <div class="" id="emp_training">
						<?php if(validation_errors() || isset($department_detail_errors) ){
							echo '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';
							if(isset($department_detail_errors)){echo $department_detail_errors.'<br>';}
							echo validation_errors().'</div><script>/*setTimeout(function(){$("#emp_training").slideUp();},3000);*/</script>';
						}?>
					</div>
					
					
                       <input  name="Pos_ID"   type="hidden" value="<?php if(isset($Pos_ID)){echo $Pos_ID; }?>">
                      <span class="section">Position Information</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Position_Name"> <span class="requireds">*</span> Position Name 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Position_Name" class="form-control col-md-7 col-xs-12" required="required" name="Position_Name" placeholder="Position Name"  type="text" value="<?php echo $Position_Name;?>">
						 
                        </div>
                      </div>
					 
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="<?php echo base_url()?>index.php/position/list_pos"><button type="button" class="btn btn-primary">Cancel</button></a>
                          <input id="send" type="submit" class="btn btn-success" name="Add" value="Add">
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
 
$('#Pos_Form').validate({
			rules:{
				Position_Name: {
					required:true,
					minlength:2,
					maxlength:50
				}
			},
			
			errorElement: 'span',
		});	
		});	
</script>
	