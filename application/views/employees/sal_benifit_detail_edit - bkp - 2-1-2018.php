<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
/*
* 
* sal_benifit_detail page(view/employee)
*/

//echo '<pre>'; print_r($Emp_Sal_Bnft_Detail);
//echo '<pre>'; print_r($Default_List); exit;

?>


			  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 
                  <div class="x_content">
					
					<div class="" id="sal_ben_Alert">
						<?php if(validation_errors() || isset($sal_bnft_errors) ){
							echo '<div class="alert alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';
							if(isset($sal_bnft_errors)){echo $sal_bnft_errors.'<br>';}
							echo validation_errors().'</div><script>setTimeout(function(){$("#sal_ben_Alert").slideUp();},3000);</script>';
						}?>
					</div>
					
                    <form class="form-horizontal form-label-left" method="post" action="<?php echo base_url();?>index.php/Employee_insert/emp_sal_bnft_insert" id="Sal_Benifit_Form">
						
						<span class="section">SALARY &amp BENIFITS DETAIL</span>
						<div class="controls">
						  <div class="append_section">  
						  <?php 
							if(isset($Emp_Sal_Bnft_Detail) && !empty($Emp_Sal_Bnft_Detail)){								
								foreach($Emp_Sal_Bnft_Detail as $Emp_Sal_Bnft){
									$Bnft_List = '';
										 $Bnft_value = '';
										 $Position = '';
										 $Date = '';
										for($i = 0; $i<count($Emp_Sal_Bnft); $i++ ){
											$Bnft_List[] = $Emp_Sal_Bnft[$i]['Ear_ID'];
											$Bnft_value[$Emp_Sal_Bnft[$i]['Ear_ID']] = $Emp_Sal_Bnft[$i]['Benifit_Value'];
											$Position = $Emp_Sal_Bnft[$i]['Position'];
											$Date = $Emp_Sal_Bnft[$i]['Date'];
											
										} 	//echo $Position.', ';	echo $Date.', '; print_r($Bnft_List);	print_r($Bnft_value);
								  
								?>
								<div class="x_panel">
									<div class="x_title" style="border-bottom:0;">
										<ul class="nav navbar-right panel_toolbox">
										  <li><a class="collapse-link collapse-btn"><i class="fa fa-chevron-up"></i></a></li>
										  <li><a class="close-link remove-btn"><i class="fa fa-close"></i></a></li>
										  <li><a class="add-btn"><i class="fa fa-plus"></i></a></li>
										</ul>
										<div class="clearfix"></div>							
										
											<div class="item form-group row ">
												<label class="control-label col-md-3 col-sm-3 col-xs-10" for="">POSITION:</label>
												<div class="col-md-3 col-sm-3 col-xs-12 has-feedback">
													<select class="select2_single form-control" id="Position" name="Position[]" tabindex="-1" maxlength="2">
														<option value="" selected>--Select Position--</option>
														<option value="1" <?php if($Position == 1){echo 'Selected';}else{ set_select('Position[]','1');}?> >Project Manager</option>
														<option value="2" <?php if($Position == 2){echo 'Selected';}else{ set_select('Position[]','2');}?> >Team Manager</option>
														<option value="3" <?php if($Position == 3){echo 'Selected';}else{ set_select('Position[]','3');}?> >Superviser Manager</option>
														<option value="4" <?php if($Position == 4){echo 'Selected';}else{ set_select('Position[]','4');}?> >Team Leader Manager</option>
														<option value="5" <?php if($Position == 5){echo 'Selected';}else{ set_select('Position[]','5');}?> >Senior Php Devloper</option>
														<option value="6" <?php if($Position == 6){echo 'Selected';}else{ set_select('Position[]','6');}?> >Php Devloper</option>
														<option value="7" <?php if($Position == 7){echo 'Selected';}else{ set_select('Position[]','7');}?> >Marketing Manager</option>
													</select>
												</div>
												<div class="col-md-3 col-sm-3 col-xs-12 has-feedback">
													<input id="Date" name="Date[]" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" type="text" placeholder="Date" value="<?php if(isset($Date)){echo $Date;}else{echo set_value('Date[]');} ?>" >
													<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
												</div>
											</div>								
										
									</div>						
									<?php
										foreach($Default_List as $def_list){ 											
											// echo '<br>'.$Sal_Bnft['Ear_ID'];									
									?>
										<div class="x_content">
											<div class="item form-group">
												<label class="control-label col-md-3 col-sm-3 col-xs-12" for="" style="text-transform: uppercase;"><?= $def_list['Benefit_Name'];?>:</label>									
												<div class="col-md-3 col-sm-3 col-xs-12 has-feedback ">
												  <input id="<?= $def_list['Ear_ID'];?>" name="benifit_<?= $def_list['Ear_ID'];?>[]" class="form-control col-md-7 col-xs-12 has-feedback-right" placeholder="e.g. 25000" value="<?php if(array_key_exists($def_list['Ear_ID'], $Bnft_value) ){echo $Bnft_value[$def_list['Ear_ID']];}else{echo '0';}?>" type="text" maxlength="10">
												  <span class="fa fa-inr form-control-feedback right" aria-hidden="true"></span>
												</div>									
											</div>
										</div>							
								<?php	 }?>
									
								</div>
								  
						<?php }
								}else{ ?>
								<div class="x_panel">
									<div class="x_title" style="border-bottom:0;">
										<ul class="nav navbar-right panel_toolbox">
										  <li><a class="collapse-link collapse-btn"><i class="fa fa-chevron-up"></i></a></li>
										  <li><a class="close-link remove-btn"><i class="fa fa-close"></i></a></li>
										  <li><a class="add-btn"><i class="fa fa-plus"></i></a></li>
										</ul>
										<div class="clearfix"></div>							
										
											<div class="item form-group row ">
												<label class="control-label col-md-3 col-sm-3 col-xs-10" for="">POSITION:</label>
												<div class="col-md-3 col-sm-3 col-xs-12 has-feedback">
													<select class="select2_single form-control" id="Position" name="Position[]" tabindex="-1" maxlength="2">
														<option value="" selected>--Select Position--</option>
														<option value="1" <?php if($Position_Joining['Position'] == 1){echo 'Selected';}else{ set_select('Position[]','1');}?> >Project Manager</option>
														<option value="2" <?php if($Position_Joining['Position'] == 2){echo 'Selected';}else{ set_select('Position[]','2');}?> >Team Manager</option>
														<option value="3" <?php if($Position_Joining['Position'] == 3){echo 'Selected';}else{ set_select('Position[]','3');}?> >Superviser Manager</option>
														<option value="4" <?php if($Position_Joining['Position'] == 4){echo 'Selected';}else{ set_select('Position[]','4');}?> >Team Leader Manager</option>
														<option value="5" <?php if($Position_Joining['Position'] == 5){echo 'Selected';}else{ set_select('Position[]','5');}?> >Senior Php Devloper</option>
														<option value="6" <?php if($Position_Joining['Position'] == 6){echo 'Selected';}else{ set_select('Position[]','6');}?> >Php Devloper</option>
														<option value="7" <?php if($Position_Joining['Position'] == 7){echo 'Selected';}else{ set_select('Position[]','7');}?> >Marketing Manager</option>
													</select>
												</div>
												<? /*
												<div class="col-md-3 col-sm-3 col-xs-12 has-feedback">
													<input id="Lunch_Date" name="Lunch_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" type="text" placeholder="Date" value="<?php if(isset($bnft['Lunch_Date']) ){echo $bnft['Lunch_Date'];}else{echo set_value('Lunch_Date');} ?>" maxlength="10">
													<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
												</div>
												*/ ?>
												<div class="col-md-3 col-sm-3 col-xs-12 has-feedback">
													<input id="Date" name="Date[]" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" type="text" placeholder="Date" value="<?php if(isset($Position_Joining['Joining_Date']) ){echo $Position_Joining['Joining_Date'];}else{echo set_value('Date');} ?>" >
													<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
												</div>
											</div>								
										
									</div>						
									<?php foreach($Default_List as $def_list){ ?>
										<div class="x_content">
											<div class="item form-group">
												<label class="control-label col-md-3 col-sm-3 col-xs-12" for="" style="text-transform: uppercase;"><?= $def_list['Benefit_Name'];?>:</label>									
												<div class="col-md-3 col-sm-3 col-xs-12 has-feedback ">
												  <input id="<?= $def_list['Ear_ID'];?>" name="benifit_<?= $def_list['Ear_ID'];?>[]" class="form-control col-md-7 col-xs-12 has-feedback-right" placeholder="e.g. 25000" value="" type="text" maxlength="10">
												  <span class="fa fa-inr form-control-feedback right" aria-hidden="true"></span>
												</div>									
											</div>
										</div>							
									<?php	}?>
									
								</div>
							  
						  <?php }?>
							  
								  
						  
						  </div>
						
						</div>
						
						<input type="hidden" id="Emp_ID" name="Emp_ID" value="<?php echo $Emp_ID;?>">
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
		
		
		
		<script type="text/javascript">
			$(document).ready(function(){				
				$('#Sal_Benifit_Form').validate({
					rules:{
						"Position[]":{
							required:true,
							maxlength:10
						},
						"Date[]":{
							required:true
						}
						
					},
					errorElement:'span',
					submitHandler:function(form){
						form.submit();
						//submit_sal_benifit_detail();
					}
				});
			});	
						
			
			/********** Add remove button function **********/
			$(function(){		
				var x = 1;
				$(document).on('click', '.add-btn', function(e)	{
					var max_fields = 5;
					
					e.preventDefault();
					
					if(x < max_fields){
						x++;
						
						var controlForm = $(this).parents('.controls .append_section:first'),
							currentEntry = $(this).parents('.x_panel:first'),
							newEntry = $(currentEntry.clone()).appendTo(controlForm);
						
					}		
					tooltip();
					datepicker_call();
						
				}).on('click', '.remove-btn', function(e){
					//var controlForm = $(this).parents('.controls .append_section:first');			
					$(this).parents('.x_panel:first').remove();
					
					x--;

					e.preventDefault();
					tooltip();
					return false;
				});
			});
			
			
			
			
			
			
			
			
			
			
			
			
			
			/****** get date after particular month (MM/DD/YYYY) *********/
			var x = 18; //or whatever offset
			var CurrentDate =  '03/15/2017'; //new Date();
			var CurrentDate = new Date(CurrentDate.substring(6,10),
									 CurrentDate.substring(0,2)-1,                   
									 CurrentDate.substring(3,5)                  
									 );
									 
			CurrentDate.setMonth(CurrentDate.getMonth() + x);
			var year = CurrentDate.getFullYear();
			var month = (1 + CurrentDate.getMonth()).toString();
			month = month.length > 1 ? month : '0' + month;
			var day = CurrentDate.getDate().toString();
			day = day.length > 1 ? day : '0' + day;
			//alert(month + '/' + day + '/' + year);
			
			
			
			/********** calculate time duration in years, month, days (MM/DD/YYYY) ***********/
			function getduration(dateString,datelast) {
				  //var now = new Date();
				  //var today = new Date(now.getYear(),now.getMonth(),now.getDate());

				  
				  var now = new Date(datelast.substring(6,10),
									 datelast.substring(0,2)-1,                   
									 datelast.substring(3,5)                  
									 );
				  
				  var yearNow = now.getYear();
				  var monthNow = now.getMonth();
				  var dateNow = now.getDate();

				  var dob = new Date(dateString.substring(6,10),
									 dateString.substring(0,2)-1,                   
									 dateString.substring(3,5)                  
									 );

				  var yearDob = dob.getYear();
				  var monthDob = dob.getMonth();
				  var dateDob = dob.getDate();
				  var age = {};
				  var ageString = "";
				  var yearString = "";
				  var monthString = "";
				  var dayString = "";


				  yearAge = yearNow - yearDob;

				  if (monthNow >= monthDob)
					var monthAge = monthNow - monthDob;
				  else {
					yearAge--;
					var monthAge = 12 + monthNow -monthDob;
				  }

				  if (dateNow >= dateDob)
					var dateAge = dateNow - dateDob;
				  else {
					monthAge--;
					var dateAge = 31 + dateNow - dateDob;

					if (monthAge < 0) {
					  monthAge = 11;
					  yearAge--;
					}
				  }

				  age = {
					  years: yearAge,
					  months: monthAge,
					  days: dateAge
					  };

				  if ( age.years > 1 ) yearString = " YEARS";
				  else yearString = " YEAR";
				  if ( age.months> 1 ) monthString = " MONTHS";
				  else monthString = " MONTH";
				  if ( age.days > 1 ) dayString = " DAYS";
				  else dayString = " DAY";


				  if ( (age.years > 0) && (age.months > 0) && (age.days > 0) )
					ageString = age.years + yearString + " " + age.months + monthString + " " + age.days + dayString;
				  else if ( (age.years == 0) && (age.months == 0) && (age.days > 0) )
					ageString = age.days + dayString;
				  else if ( (age.years > 0) && (age.months == 0) && (age.days == 0) )
					ageString = age.years + yearString;
				  else if ( (age.years > 0) && (age.months > 0) && (age.days == 0) )
					ageString = age.years + yearString + " " + age.months + monthString;
				  else if ( (age.years == 0) && (age.months > 0) && (age.days > 0) )
					ageString = age.months + monthString + " " + age.days + dayString;
				  else if ( (age.years > 0) && (age.months == 0) && (age.days > 0) )
					ageString = age.years + yearString + " " + age.days + dayString;
				  else if ( (age.years == 0) && (age.months > 0) && (age.days == 0) )
					ageString = age.months + monthString;
				  else ageString = "Oops! Could not calculate days!";

				  return ageString;
			}
			
			//alert(getduration('01/15/2017','03/15/2017'));
			$('.date-picker').each(function(){
				var rowDate = $(this).val();
				var date = new Date(rowDate);
				day = date.getDate();
				month = date.getMonth()+ 1;
				
				//day = day.length > 1 ? day : '0' + day;
				month = month.length > 1 ? month : '0' + month;
				
				$(this).val(month + '/' + day + '/' +  date.getFullYear());
				
			});
				
			
		</script>