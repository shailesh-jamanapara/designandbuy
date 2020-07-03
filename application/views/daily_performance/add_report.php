<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
/*
* 05-05-2016
* add_report page(view/employee)
*/
?>
<style type="text/css">
	.error1{ color:red; margin:10px; border: 0.5px solid red; text-align: center; }
</style>
<!-- page content -->
<div class="right_col" role="main">
	<div class="page-title">
		<div class="title_left">
			<h2>PR:01 - Employee Daily Performance Review Sheet V1.02</h2>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Name : Rajiv Khandar ( RJV )</h2>
					<div class="pull-right">Date : MM/DD/YYYY</div>
					
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form class="form-horizontal form-label-left" novalidate method="post" action="<?base_url();?>index.php/Daily_performance/add_report" id="Add_Report">
						<!-- Loop from master table of question -->
						<div class="form-group">
							<label class="col-md-10 col-sm-9 col-xs-12 pull-left">Assigned work completed: </label>
							<div class="col-md-2 col-sm-3 col-xs-12">
								<label class="control-label"><input type="radio"  class="flat" name="Employeement_Status" checked value="" <?php echo  set_radio('Employeement_Status', '1'); ?> id="Employeement_Status0" value="1" /> &nbsp;&nbsp;Y</label>&nbsp;&nbsp;&nbsp;&nbsp;
								<label class="control-label"><input type="radio" class="flat"  name="Employeement_Status" value="2" <?php echo  set_radio('Employeement_Status', '2'); ?> id="Employeement_Status1" value="2" /> &nbsp;&nbsp;N</label>
							</div>
						</div>
						<div class="ln_solid"></div>
						<!-- Loop ends of master table question -->
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<button type="submit" class="btn btn-primary">Cancel</button>
								<button type="submit" class="btn btn-success">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->
	
<script>    
	var Add;
	var Add_Next;	   
	$(document).ready(function(){	
		/************** Limitaion of character in input fields ****************/
		$("#Short_Name").attr('maxlength','4');
		$("#Username").attr({'maxlength':'50','minlength':'6'});
		$("#Password").attr({'maxlength':'20','minlength':'8'});
		
		$('#Add').click(function() {
			Add = 1;
		});
		$('#Add_Next').click(function() {
			Add_Next = 2;
		});
		/************** Jquery validation rules,messages and submit handler ****************/
		$('#Login_Info_Form').validate({
			rules:{
				First_Name: {
					required:true,
					minlength:2,
					maxlength:50
				},
				Middle_Name:{
				    maxlength:10,
				},
				Last_Name: {
					required:true,
					minlength:2,
					maxlength:50
				},
				Email:{
					required: true,
					email: true
				},
				Short_Name:{
				   required:true,
				   minlength:3,
					maxlength:3
				},
			}, 
			
			messages:{				
				Email:{
					required: "Email field is required"					
				},
				Username:{
				remote: 'Usernmae already used'
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
