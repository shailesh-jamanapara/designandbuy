<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel" style="width:96%; margin-left:5%; min-height: 524px;">
	<span>
		<h3>
		<?php echo $page_heading; ?>
		</h3>
	</span>
   
<?php if (!empty($postdata['task']) && $postdata['task'] == 'save' ){ ?>
<form name="frmsave" id="frmsave" method="post" action="<?php echo $listpage_url;?>">
		<input type="hidden" name="id" id="id" value="<?php if(isset($model['id'])) { echo $model['id']; } ?>" />
		<input type="hidden" name="search_for" id="order_type" value="<?php echo $postdata['search_for']; ?>" />
		<input type="hidden" name="search_by" id="sort_by" value="<?php echo $postdata['search_by']; ?>" />
		<input type="hidden" name="sort_by" id="order_type" value="<?php echo $postdata['sort_by']; ?>" />
		<input type="hidden" name="order_type" id="order_type" value="<?php echo $postdata['order_type']; ?>" />
		<input type="hidden" name="page" id="order_type" value="<?php echo $postdata['page']; ?>" />
		<input type="hidden" name="limit" id="limit" value="<?php echo $postdata['limit']; ?>" />
  </form>
<?php
  } else{ ?>
  <div class="row blank-row">
  </div>  
  <form class="form-horizontal form-label-left" novalidate method="post" action="" id="editform"
data-bv-message="This value is not valid" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" >
<input type="hidden" name="task" id="task" value="save" />
<input type="hidden" name="id" id="id" value="<?php echo $model['id']; ?>" />
<input type="hidden" name="search_for" id="order_type" value="<?php echo $postdata['search_for']; ?>" />
<input type="hidden" name="search_by" id="sort_by" value="<?php echo $postdata['search_by']; ?>" />
<input type="hidden" name="sort_by" id="order_type" value="<?php echo $postdata['sort_by']; ?>" />
<input type="hidden" name="order_type" id="order_type" value="<?php echo $postdata['order_type']; ?>" />
<input type="hidden" name="page" id="order_type" value="<?php echo $postdata['page']; ?>" />
<input type="hidden" name="limit" id="limit" value="<?php echo $postdata['limit']; ?>" />
<div class="row row-edit-form">
	<div class="col-lg-6"> 
		<label class="control-label col-lg-4 col-md-4 label-title-upper" for="user_id"><span class="requireds">*</span> Employee:</label>
		<div class="col-lg-8 col-sm-6 col-xs-12">
				<select class="form-control col-md-7 col-xs-12" id="user_id" name="user_id" required>
				<option value="">--Please Select Employee--</option>
					 <?php foreach ( $employees as $key => $value ): ?>
					   <option value="<?php echo $key; ?>"<?php if ( isset($row['user_id']) &&  $row['user_id'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
					 <?php endforeach; ?>
				</select>
		</div>
	</div>
  </div>
  <div class="row row-edit-form">
	<div class="col-lg-6"> 
		<label class="control-label col-lg-4 col-md-4 label-title-upper" for="skill_name"><span class="requireds">*</span> Skill:</label>
		<div class="col-lg-8 col-sm-6 col-xs-12">
				<input type="text" class="form-control" name="skill_name" id="skill_name" placeholder="Skills" value="<?php echo $row['skills']; ?>"
				required
				>
		</div>
	</div>
  </div>
  
   <div class="row row-edit-form-bottom">
	<div class="form-group">
		<div class="col-md-6 col-md-offset-2">
			
				<button type="button" onclick="this.form.action='<?php echo $listpage_url;?>';this.form.submit();" class="btn btn-danger">Cancel</button>
				<button id="send" type="submit" class="btn btn-success">Submit</button>
		</div>
	</div>
  </div>
  </form>
  <?php }?>
</div>
</div>
<!-- /page content -->
<script>
<?php if (!empty($postdata['task']) && $postdata['task'] == 'save' ){ ?>
		$(document).ready(function() {
			$('#frmsave').submit();
		});
	<?php } ?>	
	$(document).ready(function() {
			$('#editform').bootstrapValidator();
		});
	function callback(){
		return "Here is custom message";
	}	
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>