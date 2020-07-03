<style>
	
.cs_hide{
	display: none;
}

</style>

<div class="right_col" role="main">

	<div class="">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				
				<div class="x_panel">
					<div class="x_title">
						<h2>User Access Management</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						
						<?php
							/* echo "<pre>";
							print_r($dept_list);
							echo "</pre>"; */
						?>
					
						<div class="panel-group" id="Department">
                                                        <?php if(isset($user_roles_list)){}foreach($user_roles_list as $Role_ID=>$Role_Name){ ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#Department" href="#dept_<?= $Role_ID ?>"><?= $Role_Name ?></a>
									</h4>
								</div>
								<div id="dept_<?= $Role_ID ?>" class="panel-collapse collapse">
									<div class="panel-body">
										<form class="" method="post" action="<?php echo base_url(); ?>index.php/privileges/update_pri"> 
										<input type="hidden" name="Role_ID" value="<?= $Role_ID ?>" />
										<?php 
										foreach($cat_list as $cat){
											if($cat->Menu_Cat != 0 && $cat->Menu_Cat_Name != ''){
											?>
												<div class="menu_cat">
													<h4><?= $cat->Menu_Cat_Name ?></h4>
													<table class="table table-responsive">
														<thead>
															<tr>
																<th style="width:100px" colspan="2">Module</th>
																<th style="width:100px" style="width:100px"class="text-center">View</th>
																<th style="width:100px" class="text-center">Add</th>
																<th style="width:100px" class="text-center">Edit</th>
																<th style="width:100px" class="text-center">Delete</th>
															</tr>
														</thead>
														<tbody>
														<?php 
															foreach($menu_list as $menu){
																if($cat->Menu_Cat == $menu->Menu_Cat){
																	$this->Priv->pre_selection($menu->Menu_ID, $menu->Menu_Url, $menu->Menu_Text, $menu->Menu_Sub, $Role_ID); 
																}
															}
														?>
														
														</tbody>
													</table>
												</div>
											<?php
											} 
										}
										?>
										<button type="submit" class="btn btn-primary pull-right">Submit</button>
										</form>
									</div>
								</div>
							</div>
							<?php } ?>
							
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>

</div>

<script>
	
$(document).ready(function(){

});	
	
</script>