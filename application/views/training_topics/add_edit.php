<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- page content -->
<?php if (!empty($postdata['task']) && $postdata['task'] == 'save' ) : ?>
<form name="frmsave" id="frmsave" method="post" action="<?php echo $listpage_url;?>">
		<input type="hidden" name="id" id="id" value="<?php if(isset($model['id'])) { echo $model['id']; } ?>" />
		<input type="hidden" name="search_for" id="order_type" value="<?php echo $postdata['search_for']; ?>" />
		<input type="hidden" name="search_by" id="sort_by" value="<?php echo $postdata['search_by']; ?>" />
		<input type="hidden" name="sort_by" id="sort_by" value="<?php echo $postdata['sort_by']; ?>" />
		<input type="hidden" name="order_type" id="order_type" value="<?php echo $postdata['order_type']; ?>" />
		<input type="hidden" name="page" id="order_type" value="<?php echo $postdata['page']; ?>" />
		<input type="hidden" name="limit" id="limit" value="<?php echo $postdata['limit']; ?>" />
  </form>
<?php endif; ?>
<?php if ( !$postdata['task']  ||  $postdata['task'] != 'save' ) : ?>
	<div class="right_col" role="main">
	  <div class="">
		<div class="clearfix"></div>       
		<div class="row">
		  <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			    <div class="x_title">
				<h2><?php echo $page_heading; ?></h2>
				<div class="clearfix"></div>
			  </div>
			  <!-- x_content -->
			  <div class="x_content">
				 <!-- form-horizontal -->
				  <form class="form-horizontal form-label-left" novalidate method="post" action="" id="editform" data-bv-message="This value is not valid" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" enctype="multipart/form-data">
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
									<label class="control-label col-lg-4 col-md-4 label-title-upper" for="training_topic_name"><span class="requireds">*</span> Training Topic:</label>
									<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
											<input type="text" class="form-control" name="training_topic_name" id="training_topic_name" placeholder=" Training Topic" value="<?php echo $row['training_topic_name']; ?>"
											data-bv-notempty="true" data-bv-notempty-message="Please enter training topic"  data-bv-regexp-message="Special characters not allowed" data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z0-9\- .]+$" 
											>
									</div>
								</div>
							  </div>
								<div class="row row-edit-form">
								<div class="col-lg-6"> 
									<label class="control-label col-lg-4 col-md-4 label-title-upper" for="topic_code"><span class="requireds">*</span> Training Topic Code:</label>
									<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
											<input type="text" class="form-control" name="topic_code" id="topic_code" placeholder="Training Topic Code" value="<?php echo $row['topic_code']; ?>"
											data-bv-notempty="true" data-bv-notempty-message="Please enter training topic code" data-bv-regexp-message="Only uppercase letters allowed" data-bv-regexp="true" data-bv-regexp-regexp="^[A-Z]+$" >
									</div>
								</div>
							  </div>
							  <div class="row row-edit-form">
								<div class="col-lg-6"> 
									<label class="control-label col-lg-4 col-md-4 label-title-upper" for="first_name"><span class="requireds">*</span> Status:</label>
									<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
										<?php $checked = ($row['status'] == '1') ? ' checked ':''; ?>
										<input type="checkbox" name="status" value="1" id="status" <?php echo $checked; ?> data-toggle="toggle" data-onstyle="primary" data-on="Active"data-off="Inactive" value="<?php echo $row['status'] ; ?>" data-offstyle="default" >
									</div>
								</div>
							  </div>
					<div class="row row-edit-form">
						<div class="form-group">
						<div class="col-lg-6 col-lg-offset-2">

						<button type="button" onclick="this.form.action='<?php echo $listpage_url;?>';this.form.submit();" class="btn btn-danger">Cancel</button>
						<button id="send" type="submit" class="btn btn-success">Submit</button>
						</div>
						</div>
					</div>
						

				 </form>	
				 <!-- form-horizontal -->	
			</div>
			 <!-- /x_content -->
		  </div>
		</div>
	  </div>
	</div>
	</div>
<?php endif; ?>	
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