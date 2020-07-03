<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
/*
* 
* sal_benifit_detail page(view/employee)
*/

//echo '<pre>'; print_r($result_sal_get);
//echo '<pre>'; print_r($result_bnft_get); exit;
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
						<div class="controls">
						  <span class="section">Salary Detail</span>
						  <fieldset style="margin-top:30px;" class="append_section">
							
				<?php if(isset($result_sal_get) && !empty($result_sal_get) ){
						$count = count($result_sal_get);
						$i = 1;
						foreach($result_sal_get as $sal_get){ ?>
							
							<div class="entry item form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="">SALARY:</label>
								<div class="col-md-2 col-sm-3 col-xs-12 has-feedback">
								  <input id="Salary" name="Salary[]" class="Amount form-control col-md-7 col-xs-12 has-feedback-right" value="<?php if(isset($sal_get['Salary']) ){echo $sal_get['Salary'];}else{echo set_value('Salary[]');}?>" type="text" maxlength="10" placeholder="e.g. 25000">
								  <span class="fa fa-inr form-control-feedback right" aria-hidden="true"></span>
								</div>
								<div class="col-md-2 col-sm-3 col-xs-12">
								  <select class="select2_single form-control" id="Position" name="Position[]" tabindex="-1" maxlength="2">
									<option value="" selected>--Select Position--</option>
									<option value="1" <?php if(isset($sal_get['Position']) && $sal_get['Position'] == '1' ){echo 'selected';}else{ set_select('Position[]','1');}?> >Project Manager</option>
									<option value="2" <?php if(isset($sal_get['Position']) && $sal_get['Position'] == '2' ){echo 'selected';}else{ set_select('Position[]','2');}?> >Team Manager</option>
									<option value="3" <?php if(isset($sal_get['Position']) && $sal_get['Position'] == '3' ){echo 'selected';}else{ set_select('Position[]','3');}?> >Superviser Manager</option>
									<option value="4" <?php if(isset($sal_get['Position']) && $sal_get['Position'] == '4' ){echo 'selected';}else{ set_select('Position[]','4');}?> >Team Leader Manager</option>
									<option value="5" <?php if(isset($sal_get['Position']) && $sal_get['Position'] == '5' ){echo 'selected';}else{ set_select('Position[]','5');}?> >Senior Php Devloper</option>
									<option value="6" <?php if(isset($sal_get['Position']) && $sal_get['Position'] == '6' ){echo 'selected';}else{ set_select('Position[]','6');}?> >Php Devloper</option>
									<option value="7" <?php if(isset($sal_get['Position']) && $sal_get['Position'] == '7' ){echo 'selected';}else{ set_select('Position[]','7');}?> >Marketing Manager</option>
								  </select>
								</div>
								<div class="col-md-2 col-sm-3 col-xs-12 has-feedback">
								  <input id="Sal_Date" name="Sal_Date[]" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" type="text" placeholder="Date" value="<?php if(isset($sal_get['Sal_Date']) ){echo $sal_get['Sal_Date'];}else{echo set_value('Sal_Date[]');}?>" maxlength="10">
								  <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
								</div>
								<div class="col-md-2 col-sm-1 col-xs-12 append_icon">
								  <?php if($count == 1 ){
									echo '<a href="javascript:void(0);"><i style="font-size:25px;color: #26b99a;" class="fa fa-plus def-add-btn" ></i></a>';
								  }else{
									  if($i == 1){
										  echo '';
									  }elseif($i == $count){
										  echo '<a href="javascript:void(0);"><i style="font-size:25px;color:#da1818 ;" class="fa fa-remove def-remove-btn" ></i>&nbsp;<i style="font-size:25px;color:#26b99a;" class="fa fa-plus def-add-btn" ></i></a>';
									  }else{
										  echo '<a href="javascript:void(0);"><i style="font-size:25px;color:#da1818 ;" class="fa fa-remove def-remove-btn" data-toggle="tooltip" data-placement="top" title="Remove"></i></a>';
									  }									  
								  }?>								  
								</div>						
							</div>
				<?php	
					$i++;
						}
					}else{ ?>
							<div class="entry item form-group">
								<label class="control-label col-md-2 col-sm-2 col-xs-12" for="">SALARY:</label>
								<div class="col-md-2 col-sm-3 col-xs-12 has-feedback">
								  <input id="Salary" name="Salary[]" class="form-control col-md-7 col-xs-12 has-feedback-right" placeholder="e.g. 25000" value="<?= set_value('Salary[0]');?>" type="text" maxlength="10">
								  <span class="fa fa-inr form-control-feedback right" aria-hidden="true"></span>
								</div>
								<div class="col-md-2 col-sm-3 col-xs-12">								  
								  <select class="select2_single form-control" id="Position" name="Position[]" maxlength="2">
									<option value="" selected>--Select Position--</option>
									<option value="1" <?= set_select('Position[0]','1');?> >Project Manager</option>
									<option value="2" <?= set_select('Position[0]','2');?> >Team Manager</option>
									<option value="3" <?= set_select('Position[0]','3');?> >Superviser Manager</option>
									<option value="4" <?= set_select('Position[0]','4');?> >Team Leader Manager</option>
									<option value="5" <?= set_select('Position[0]','5');?> >Senior PHP Devloper</option>
									<option value="6" <?= set_select('Position[0]','6');?> >PHP Devloper</option>
									<option value="7" <?= set_select('Position[0]','7');?> >Marketing Manager</option>
								  </select>								  
								</div>
								<div class="col-md-2 col-sm-3 col-xs-12 has-feedback">
								  <input id="Sal_Date" name="Sal_Date[]" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" type="text" placeholder="Date" value="<?= set_value('Sal_Date[0]');?>" maxlength="10">
								  <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
								</div>
								<div class="col-md-2 col-sm-1 col-xs-12 append_icon">
								  <a href="javascript:void(0);"><i style="font-size:25px;color: #26b99a;" class="fa fa-plus def-add-btn"></i></a>
								</div>						
							</div>
				<?php 	} ?>					
							
						  </fieldset>
						</div>
						
						
<!------ ***************************** bENIFIT DETAIL SECTION ****************************************---->
					  
					  <fieldset style="margin-top:30px;">
						<span class="section">Benifits Detail</span>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12 lable_title">BENEFIT</label>
								<label class="control-label col-md-3 col-sm-3 col-xs-6 wid212 lable_title">START DATE</label>
								<label class="control-label col-md-3 col-sm-3 col-xs-6 wid212 lable_title">AMOUNT</label>
							</div>
					
					<?php 
					if(isset($result_bnft_get) && !empty($result_bnft_get) ){
						foreach($result_bnft_get as $bnft){ ?>
														
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">LUNCH:</label>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
									<input id="Lunch_Date" name="Lunch_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" type="text" placeholder="LUNCH" value="<?php if(isset($bnft['Lunch_Date']) ){echo $bnft['Lunch_Date'];}else{echo set_value('Lunch_Date');} ?>" maxlength="10">
									<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
								  <input id="Lunch_Amount" name="Lunch_Amount" class="form-control col-md-7 col-xs-12 has-feedback-right" placeholder="e.g. 25000" value="<?php if(isset($bnft['Lunch_Amount']) ){echo $bnft['Lunch_Amount'];}else{echo set_value('Lunch_Amount');} ?>" type="text" maxlength="10">
								  <span class="fa fa-inr form-control-feedback right" aria-hidden="true"></span>
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">MEDICAL INSURANCE:</label>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
									<input id="Medical_Inc_Date" name="Medical_Inc_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" type="text" placeholder="MEDICAL INSURANCE" value="<?php if(isset($bnft['Medical_Inc_Date']) ){echo $bnft['Medical_Inc_Date'];}else{echo set_value('Medical_Inc_Date');} ?>" maxlength="10">
									<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
								  <input id="Medical_Inc_Amount" name="Medical_Inc_Amount" class="form-control col-md-7 col-xs-12 has-feedback-right" placeholder="e.g. 25000" value="<?php if(isset($bnft['Medical_Inc_Amount']) ){echo $bnft['Medical_Inc_Amount'];}else{echo set_value('Medical_Inc_Amount');} ?>" type="text" maxlength="10">
								  <span class="fa fa-inr form-control-feedback right" aria-hidden="true"></span>
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">PERSONAL ACCIDENT:</label>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
									<input id="Personal_Accident_Date" name="Personal_Accident_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" type="text" placeholder="PERSONAL ACCIDENT" value="<?php if(isset($bnft['Personal_Accident_Date']) ){echo $bnft['Personal_Accident_Date'];}else{echo set_value('Personal_Accident_Date');} ?>" maxlength="10">
									<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
								  <input id="Personal_Accident_Amount" name="Personal_Accident_Amount" class="form-control col-md-7 col-xs-12 has-feedback-right" placeholder="e.g. 25000" value="<?php if(isset($bnft['Personal_Accident_Amount']) ){echo $bnft['Personal_Accident_Amount'];}else{echo set_value('Personal_Accident_Amount');} ?>" type="text" maxlength="10">
								  <span class="fa fa-inr form-control-feedback right" aria-hidden="true"></span>
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">BONUS:</label>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
									<input id="Bonus_Date" name="Bonus_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" type="text" placeholder="BONUS" value="<?php if(isset($bnft['Bonus_Date']) ){echo $bnft['Bonus_Date'];}else{echo set_value('Bonus_Date');} ?>" maxlength="10">
									<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
								  <input id="Bonus_Amount" name="Bonus_Amount" class="form-control col-md-7 col-xs-12 has-feedback-right" placeholder="e.g. 25000" value="<?php if(isset($bnft['Bonus_Amount']) ){echo $bnft['Bonus_Amount'];}else{echo set_value('Bonus_Amount');} ?>" type="text" maxlength="10">
								  <span class="fa fa-inr form-control-feedback right" aria-hidden="true"></span>
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">PAID VACATION:</label>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
									<input id="Paid_Vacation_Date" name="Paid_Vacation_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" type="text" placeholder="PAID VACATION" value="<?php if(isset($bnft['Paid_Vacation_Date']) ){echo $bnft['Paid_Vacation_Date'];}else{echo set_value('Paid_Vacation_Date');} ?>" maxlength="10">
									<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
								  <input id="Paid_Vacation_Amount" name="Paid_Vacation_Amount" class="form-control col-md-7 col-xs-12 has-feedback-right" placeholder="e.g. 25000" value="<?php if(isset($bnft['Paid_Vacation_Amount']) ){echo $bnft['Paid_Vacation_Amount'];}else{echo set_value('Paid_Vacation_Amount');} ?>" type="text" maxlength="10">
								  <span class="fa fa-inr form-control-feedback right" aria-hidden="true"></span>
								</div>
							</div>							
							<!--<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">HOUSING ALLOWANCE:</label>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
									<input id="Housing_All_Date" name="Housing_All_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" type="text" placeholder="HOUSING ALLOWANCE" value="<?php if(isset($bnft['Housing_All_Date']) ){echo $bnft['Housing_All_Date'];}else{echo set_value('Housing_All_Date');} ?>" maxlength="10">
									<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
								  <input id="" name="" class="form-control col-md-7 col-xs-12 has-feedback-right" placeholder="e.g. 25000" value="" type="text" maxlength="10">
								  <span class="fa fa-inr form-control-feedback right" aria-hidden="true"></span>
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">TRAVELLING ALLOWANCE:</label>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
									<input id="Travelling_All_Date" name="Travelling_All_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" type="text" placeholder="TRAVELLING ALLOWANCE" value="<?php if(isset($bnft['Travelling_All_Date']) ){echo $bnft['Travelling_All_Date'];}else{echo set_value('Travelling_All_Date');} ?>" maxlength="10">
									<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
								  <input id="" name="" class="form-control col-md-7 col-xs-12 has-feedback-right" placeholder="e.g. 25000" value="" type="text" maxlength="10">
								  <span class="fa fa-inr form-control-feedback right" aria-hidden="true"></span>
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">OTHER ALLOWANCE:</label>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
									<input id="Other_All_Date" name="Other_All_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" type="text" placeholder="OTHER ALLOWANCE" value="<?php if(isset($bnft['Other_All_Date']) ){echo $bnft['Other_All_Date'];}else{echo set_value('Other_All_Date');} ?>" maxlength="10">
									<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
								  <input id="" name="" class="form-control col-md-7 col-xs-12 has-feedback-right" placeholder="e.g. 25000" value="" type="text" maxlength="10">
								  <span class="fa fa-inr form-control-feedback right" aria-hidden="true"></span>
								</div>
							</div>-->
				<?php	}
					}else{	?>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">LUNCH:</label>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
									<input id="Lunch_Date" name="Lunch_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" type="text" placeholder="LUNCH" value="<?= set_value('Lunch_Date');?>" maxlength="10">
									<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
								  <input id="Lunch_Amount" name="Lunch_Amount" class="form-control col-md-7 col-xs-12 has-feedback-right" placeholder="e.g. 25000" value="<?= set_value('Medical_Inc_Amount');?>" type="text" maxlength="10">
								  <span class="fa fa-inr form-control-feedback right" aria-hidden="true"></span>
								</div>
								
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">MEDICAL INSURANCE:</label>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
									<input id="Medical_Inc_Date" name="Medical_Inc_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" type="text" placeholder="MEDICAL INSURANCE" value="<?= set_value('Medical_Inc_Date');?>" maxlength="10">
									<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
								  <input id="Medical_Inc_Amount" name="Medical_Inc_Amount" class="form-control col-md-7 col-xs-12 has-feedback-right" placeholder="e.g. 25000" value="<?= set_value('Medical_Inc_Amount');?>" type="text" maxlength="10">
								  <span class="fa fa-inr form-control-feedback right" aria-hidden="true"></span>
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">PERSONAL ACCIDENT:</label>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
									<input id="Personal_Accident_Date" name="Personal_Accident_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" type="text" placeholder="PERSONAL ACCIDENT" value="<?= set_value('Personal_Accident_Date');?>" maxlength="10">
									<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
								  <input id="Personal_Accident_Amount" name="Personal_Accident_Amount" class="form-control col-md-7 col-xs-12 has-feedback-right" placeholder="e.g. 25000" value="<?= set_value('Personal_Accident_Amount');?>" type="text" maxlength="10">
								  <span class="fa fa-inr form-control-feedback right" aria-hidden="true"></span>
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">BONUS:</label>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
									<input id="Bonus_Date" name="Bonus_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" type="text" placeholder="BONUS" value="<?= set_value('Bonus_Date');?>" maxlength="10">
									<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
								  <input id="Bonus_Amount" name="Bonus_Amount" class="form-control col-md-7 col-xs-12 has-feedback-right" placeholder="e.g. 25000" value="<?= set_value('Bonus_Amount');?>" type="text" maxlength="10">
								  <span class="fa fa-inr form-control-feedback right" aria-hidden="true"></span>
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">PAID VACATION:</label>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
									<input id="Paid_Vacation_Date" name="Paid_Vacation_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" type="text" placeholder="PAID VACATION" value="<?= set_value('Paid_Vacation_Date');?>" maxlength="10">
									<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
								  <input id="Paid_Vacation_Amount" name="Paid_Vacation_Amount" class="form-control col-md-7 col-xs-12 has-feedback-right" placeholder="e.g. 25000" value="<?= set_value('Paid_Vacation_Amount');?>" type="text" maxlength="10">
								  <span class="fa fa-inr form-control-feedback right" aria-hidden="true"></span>
								</div>
							</div>
							
							<!--<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">HOUSING ALLOWANCE:</label>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
									<input id="Housing_All_Date" name="Housing_All_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" type="text" placeholder="HOUSING ALLOWANCE" value="<?= set_value('Housing_All_Date');?>" maxlength="10">
									<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
								  <input id="" name="" class="form-control col-md-7 col-xs-12 has-feedback-right" placeholder="e.g. 25000" value="" type="text" maxlength="10">
								  <span class="fa fa-inr form-control-feedback right" aria-hidden="true"></span>
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">TRAVELLING ALLOWANCE:</label>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
									<input id="Travelling_All_Date" name="Travelling_All_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" type="text" placeholder="TRAVELLING ALLOWANCE" value="<?= set_value('Travelling_All_Date');?>" maxlength="10">
									<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
								  <input id="" name="" class="form-control col-md-7 col-xs-12 has-feedback-right" placeholder="e.g. 25000" value="" type="text" maxlength="10">
								  <span class="fa fa-inr form-control-feedback right" aria-hidden="true"></span>
								</div>
							</div>
							<div class="item form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="">OTHER ALLOWANCE:</label>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
									<input id="Other_All_Date" name="Other_All_Date" class="date-picker form-control col-md-7 col-xs-12 has-feedback-right" type="text" placeholder="OTHER ALLOWANCE" value="<?= set_value('Other_All_Date');?>" maxlength="10">
									<span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
								</div>
								<div class="col-md-3 col-sm-3 col-xs-6 has-feedback wid212">
								  <input id="" name="" class="form-control col-md-7 col-xs-12 has-feedback-right" placeholder="e.g. 25000" value="" type="text" maxlength="10">
								  <span class="fa fa-inr form-control-feedback right" aria-hidden="true"></span>
								</div>
							</div>-->
			<?php	}?>
					  </fieldset>
					  
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
				
				$('#Sal_Benifit_Form').validate({
					rules:{
						"Salary[]":{
							digits:true,
							maxlength:10
						}
						
					},
					errorElement:'span',
					submitHandler:function(form){
						form.submit();
						//submit_sal_benifit_detail();
					}
				});
			});	
						
			
			/*********** Add remove button function **********/
			$(function(){		
				var x = 1;
				$(document).on('click', '.def-add-btn', function(e)	{
					var max_fields = 5;
					
					e.preventDefault();
					
					if(x < max_fields){
						x++;
						
						var controlForm = $(this).parents('.controls .append_section:first'),
							currentEntry = $(this).parents('.entry:first'),
							newEntry = $(currentEntry.clone()).appendTo(controlForm);

						newEntry.find('input, select').val('');
						controlForm.find('.entry:first a').remove();
						
						controlForm.find('.entry:not(:last) a').empty().append('<i style="font-size:25px;color:#da1818 ;" class="fa fa-remove def-remove-btn" data-toggle="tooltip" data-placement="top" title="Remove"></i>');
						
						controlForm.find('.entry:last a').empty().append('<i style="font-size:25px;color:#da1818 ;" class="fa fa-remove def-remove-btn" data-toggle="tooltip" data-placement="top" title="Remove"></i>&nbsp;<i style="font-size:25px;color:#26b99a;" class="fa fa-plus def-add-btn" data-toggle="tooltip" data-placement="top" title="Add"></i>');
						
						
					}		
					tooltip();
					datepicker_call();
						
				}).on('click', '.def-remove-btn', function(e){
					var controlForm = $(this).parents('.controls .append_section:first');			
					
					if ( $( this ).is( ".entry:last .def-remove-btn" ) ){
						controlForm.find('.entry:nth-last-child(2) a ').empty().append('<i style="font-size:25px;color:#da1818 ;" class="fa fa-remove def-remove-btn" data-toggle="tooltip" data-placement="top" title="Remove"></i>&nbsp;<i style="font-size:25px;color:#26b99a;" class="fa fa-plus def-add-btn" data-toggle="tooltip" data-placement="top" title="Add"></i>');
						
						$(this).parents('.entry:first').remove();
						
						controlForm.find('.entry:first .def-remove-btn'); 
					}else{
						$(this).parents('.entry:first').remove();
					}
					
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
		</script>