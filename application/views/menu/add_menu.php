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
						<h2>Add Menu</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="row">
							<div class="col-md-6 ">
								<form class="form" action="<?php echo base_url();?>index.php/menu/add_menu" method="post">
								
									<div class="form-group">
										<label for="menu_category">Category</label>
										<select class="form-control" id="menu_category" name="Menu_Cat">
											<option value="" selected disabled>Select Category</option>
											<option value="1-General" >General</option>
											<option value="2-User Control" >User Control</option>
										</select>
									</div>
									
									<div class="form-group">
										<label for="menu_text">Text</label>
										<input type="text" class="form-control" name="Menu_Text" />
									</div>
									
									<div class="form-group">
										<label for="menu_url">Url</label>
										<input type="text" class="form-control" name="Menu_Url" />
									</div>
									
									<div class="form-group">
										<div class="checkbox">
											<label class="toggle_submenu" data-toggle="buttons">
												<input type="checkbox" name="is_sub" value="1" class="" data-toggle="toggle" data-on="Is Sub Menu" data-off="Is Not A Sub Menu ">
											</label>
										  </div>
									</div>

									<div class="form-group cs_hide cs_sub_menu">
										<label for="nav_sub">Select Parent Menu</label>
										<select class="form-control" id="nav_sub" name="Menu_Sub">
											<option value="" selected disabled>Select Parent Menu</option>
											<?php 
											
											foreach($menu_list as $menu){
												if($menu->Menu_Sub == 0){
													echo '<option value="'.$menu->Menu_ID.'">'.$menu->Menu_Text.'</option>';
												}
											}
												
											?>
											
										</select>
									</div>
									
									<?php 
									if(check_privilege($this->session->userdata['loggedin']['Role_ID'], 1, 'Pri_Add')){
									?>
										<button type="submit" class="btn btn-primary">Add Menu</button>
									<?php									
									}
									?>
									
									
									
								</form>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>

</div>

<script>
	
$(document).ready(function(){
	if($('.toggle_submenu').find('input').is(":checked") == true){
		$('.cs_sub_menu').fadeIn();
		$('#menu_category').parent().fadeOut();
	}else{
		$('.cs_sub_menu').fadeOut();
		$('#menu_category').parent().fadeIn();
	}
	$('.toggle_submenu').on('click', function(){
		if($(this).find('input').is(":checked") == true){
			$('.cs_sub_menu').fadeOut();
			$('#menu_category').parent().fadeIn();
		}else{
			$('.cs_sub_menu').fadeIn();
			$('#menu_category').parent().fadeOut();
		}
	});
});	
	
</script>