<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- page content -->
	<div class="right_col" role="main" >
	  <div class="">
		<div class="clearfix"></div>       
		<div class="row">
		  <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			    <div class="x_title">
				<h2>Master Settings</h2>
				<div class="clearfix"></div>
			  </div>
			  <div class="x_content" id="div_setups">
			  			   <!--  Geological Settings -->
			  <div class="col-lg-11 col-lg-offset-1 col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                   <a class="collapse-link  pull-left col-lg-12"> <h2><i class="fa fa-calculator"></i> Earnings  Benefits & Bank Info <small> Earnings | Benefits | Bank Info  </small> <i class="fa fa-chevron-up pull-right"></i></h2></a>
                    
                    <div class="clearfix"></div>
                  <div class="x_content" style="display: block;">
					<a href="<?php echo base_url();?>index.php/Expenses/index/all"> <div class="col-lg-3 btn btn-masters text-left">Earnings  & Benefits  <span class="badge bg-info  pull-right"></span></div> </a>	
					<a href="<?php echo base_url();?>index.php/Users_Expenses/index/all"> <div class="col-lg-3 btn btn-masters text-left">Employee's Earnings  & Benefits  <span class="badge bg-info  pull-right"></span></div> </a>
					<a href="<?php echo base_url();?>index.php/Users_Banks/index/all"> <div class="col-lg-3 btn btn-masters text-left">Employee's Bank Details  <span class="badge bg-info  pull-right"></span></div> </a>		
				  </div>
                </div>
              </div>
			   <!--  Geological Settings -->
			  <div class="col-lg-11 col-lg-offset-1 col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                     <a class="collapse-link  pull-left col-lg-12">  <h2><i class="fa fa-globe"></i> Geological Settings <small>Countries | States | Cities</small> <a class="collapse-link  pull-right"><i class="fa fa-chevron-up"></i></h2> </a>
                    
                    <div class="clearfix"></div>
                  <div class="x_content" style="display: block;">
					<a href="<?php echo base_url();?>index.php/Countries/index/all"> <div class="col-lg-3 btn btn-masters text-left">Countries <span class="badge bg-info  pull-right"><?php echo count($countries) ;?></span></div> </a>	
					<a href="<?php echo base_url();?>index.php/States/index/all"> <div class="col-lg-3 btn btn-masters text-left">States <span class="badge bg-info  pull-right"><?php echo count($states) ;?></span></div> </a>	
					<a href="<?php echo base_url();?>index.php/Cities/index/all"> <div class="col-lg-3 btn btn-masters text-left">Cities <span class="badge bg-info  pull-right"><?php echo count($cities) ;?></span></div> </a>	
                  </div>
                </div>
              </div>
			   <!--  Academic & Certifications -->
			    <div class="col-lg-11 col-lg-offset-1 col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                     <a class="collapse-link  pull-left col-lg-12"><h2><i class="fa fa-graduation-cap"></i> Academic & Certifications <small>Qualifications | Streams | Skills </small> <a class="collapse-link  pull-right"><i class="fa fa-chevron-up"></i></a></h2> </a>
                    
                    <div class="clearfix"></div>
                  <div class="x_content" style="display: block;">
					<a href="<?php echo base_url();?>index.php/Streams/index/all"> <div class="col-lg-3 btn btn-masters text-left"><i class="fa fa-flask"></i> Streams <span class="badge bg-info  pull-right"><?php echo count($streams) ;?></span></div> </a>	
					<a href="<?php echo base_url();?>index.php/Educational_Qualifications/index/all"> <div class="col-lg-3 btn btn-masters text-left"> <i class="fa fa-university"></i>  Educational Qualifications<span class="badge bg-info  pull-right"><?php echo count($qualifications) ;?></span> </div> </a>	
					<a href="<?php echo base_url();?>index.php/Skills/index/all"> <div class="col-lg-3 btn btn-masters text-left"><i class="fa fa-wrench"></i> Skills <span class="badge bg-info  pull-right"><?php echo count($skills) ;?></span></div> </a>	
				  </div>
                </div>
              </div>
			   <!--  Trainings -->
			    <div class="col-lg-11 col-lg-offset-1 col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <a class="collapse-link  pull-left col-lg-12"> <h2><i class="glyphicon glyphicon-blackboard"></i> Trainings <small>Training Topics | Trainings | Training Mentors </small> <a class="collapse-link  pull-right"><i class="fa fa-chevron-up"></i></h2> </a>
                    
                    <div class="clearfix"></div>
                  <div class="x_content" style="display: block;">
					<a href="<?php echo base_url();?>index.php/Training_Topics/index/all"> <div class="col-lg-3 btn btn-masters text-left"><i class="glyphicon glyphicon-folder-open"></i>  &nbsp; Training Topics <span class="badge bg-info  pull-right"><?php echo count($streams) ;?></span></div> </a>	
					<a href="<?php echo base_url();?>index.php/Trainings/index/all"> <div class="col-lg-3 btn btn-masters text-left"><i class="glyphicon glyphicon-blackboard"></i>  &nbsp; Trainings <span class="badge bg-info  pull-right"><?php echo count($streams) ;?></span></div> </a>

					<!-- <a href="<?php echo base_url();?>index.php/Training_Mentors/index/all"> <div class="col-lg-3 btn btn-masters text-left"><i class="glyphicon glyphicon-user"></i>  &nbsp; Training Mentors <span class="badge bg-info  pull-right"><?php echo count($streams) ;?></span></div> </a>	-->					
				  </div>
                </div>
              </div>
			  <!--  Academic & Certifications -->
			   <div class="col-lg-11 col-lg-offset-1 col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <a class="collapse-link  pull-left col-lg-12"> <h2><i class="fa fa-briefcase"> </i> Officials  <small>  Departments | Positions  | Leave Types </small> <a class="collapse-link  pull-right"><i class="fa fa-chevron-up"></i></h2></a>
                   <div class="clearfix"></div>
                  <div class="x_content" style="display: block;">
					
					<a href="<?php echo base_url();?>index.php/Departments/index/all"> <div class="col-lg-3 btn btn-masters text-left"><i class="fa fa-users"></i> Departments<span class="badge bg-info  pull-right"><?php echo count($departments) ;?></span></div> </a>	
					<a href="<?php echo base_url();?>index.php/Positions/index/all"> <div class="col-lg-3 btn btn-masters text-left"><i class="fa fa-suitcase"></i> Positions<span class="badge bg-info  pull-right"><?php echo count($positions) ;?></span></div> </a>	
					<a href="<?php echo base_url();?>index.php/Leave_Types/index/all"> <div class="col-lg-3 btn btn-masters text-left"><i class="fa fa-suitcase"></i> Leave Types <span class="badge bg-info  pull-right"><?php echo count($leave_types) ;?></span></div> </a>
				  </div>
                </div>
              </div>
			  <div class="col-lg-11 col-lg-offset-1 col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <a class="collapse-link  pull-left col-lg-12"> <h2><i class="fa fa-briefcase"> </i> Appointments & Documents  <small> Openings | Question Bank | Documents | ID Proofs</small> <a class="collapse-link  pull-right"><i class="fa fa-chevron-up"></i></h2> </a>
                   <div class="clearfix"></div>
                  <div class="x_content" style="display: block;">
					<a href="<?php echo base_url();?>index.php/Openings/index/all"> <div class="col-lg-3 btn btn-masters text-left"> <i class="fa fa-bullhorn"></i> Openings <span class="badge bg-info  pull-right"><?php echo count($openings) ;?></span></div> </a>
					<!-- <a href="<?php echo base_url();?>index.php/Questions/index/all"> <div class="col-lg-3 btn btn-masters text-left"> <i class="fa fa-book"></i> Question Bank <span class="badge bg-info  pull-right"><?php echo count($questions) ;?></span></div> </a>	-->
					<a href="<?php echo base_url();?>index.php/Documents/index/all"> <div class="col-lg-3 btn btn-masters text-left"><i class="fa fa-file-word-o"></i> Documents <span class="badge bg-info  pull-right"><?php echo count($documents) ;?></span></div> </a>	
					<!-- 
					<a href="<?php echo base_url();?>index.php/Id_Proofs/index/all"> <div class="col-lg-3 btn btn-masters text-left"><i class="fa fa-list"></i> ID Proofs <span class="badge bg-info  pull-right"><?php echo count($id_proofs) ;?></span></div> </a>	-->
				  </div>
                </div>
              </div>
			   <div class="col-lg-11 col-lg-offset-1 col-md-12 col-sm-6 col-xs-12">
                <div class="x_panel">
                    <a class="collapse-link  pull-left col-lg-12"> <h2><i class="fa fa-users"> </i> Roles Access <small> User Roles Access</small> <a class="collapse-link  pull-right"><i class="fa fa-chevron-up"></i></h2></a>
                   <div class="clearfix"></div>
                  
                  <div class="x_content" style="display: block;">
					 <div class="row">
					<a href="<?php echo base_url();?>index.php/Roles/index/all"> <div class="col-lg-3 btn btn-masters text-left">Roles<span class="badge bg-info  pull-right"><?php echo count($user_roles) ;?></span></div> </a>	
					 </div>	
					 <div class="row">
				 <?php if(!empty($roles)){ ?>
					  <?php foreach($roles as $key => $val ){ ?>
						
						<a href="<?php echo base_url();?>index.php/Roles_Accesses/?role_id=<?php echo $key; ?>"><div class="col-lg-3 btn btn-masters text-left"> <i class="fa fa-user"></i>  <?php echo $val; ?><span class="badge bg-info  pull-right"><?php echo count($user_roles) ;?></span></div> </a>	
						
					  <?php } ?>	
				  <?php } ?>	
					 </div>
				  
				 </div>
                </div>
              </div>
			  
			 </div>
		  </div>
		</div>
	  </div>
	</div>
<script>
$(document).ready(function() {
	$('div#div_setups').find('div.x_content').css('display','none');
});
</script>	
 <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>