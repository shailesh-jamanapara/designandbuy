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
<?php if ( !$postdata['task']  ||  $postdata['task'] != 'save' ) : ?> <section class="content-header">
      <h1>
       Add New Atrribute
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-sm-12">
          <div class="box box-primary">
		   			<form class="form-horizontal form-label-left" novalidate method="post" action="" id="editform" data-bv-message="This value is not valid" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" enctype="multipart/form-data" autocomplete="off">
					<input type="hidden" name="task" id="task" value="save" />
					<input type="hidden" name="id" id="id" value="<?php echo $model['id']; ?>" />
					<input type="hidden" name="search_for" id="order_type" value="<?php echo $postdata['search_for']; ?>" />
					<input type="hidden" name="search_by" id="sort_by" value="<?php echo $postdata['search_by']; ?>" />
					<input type="hidden" name="sort_by" id="order_type" value="<?php echo $postdata['sort_by']; ?>" />
					<input type="hidden" name="order_type" id="order_type" value="<?php echo $postdata['order_type']; ?>" />
					<input type="hidden" name="page" id="order_type" value="<?php echo $postdata['page']; ?>" />
					<input type="hidden" name="limit" id="limit" value="<?php echo $postdata['limit']; ?>" />
					<input type="hidden" name="customer_type" id="customer_type" value="school" />
					<input type="hidden" name="role_id" id="role_id" value="5" />
					<input type="hidden" name="status" id="status" value="1" />
							<div class="box-body">
							<!-- left side div -->
								<div class="col-sm-6">
									<div class="form-group">
										<label for="attribute_name" class="col-sm-4 control-label">Attribute Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control" id="attribute_name" name="attribute_name" placeholder="Attibute Name" data-bv-notempty="true" data-bv-notempty-message="Please enter attribute name"        data-bv-regexp="true" data-bv-regexp-regexp="^[a-zA-Z0-9]+$" data-bv-regexp-message="Registration number must be  alphabet only" data-bv-stringlength="true" data-bv-stringlength-min="2" data-bv-stringlength-max="30" data-bv-stringlength-message="Registration must be 2 to 30 characters" value="<?php echo $row['attribute_name']; ?>" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-4 col-md-4 label-title-upper" for="is_required"><span class="requireds">*</span> Is Required :</label>
										<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
											<?php $checked = ($row['is_required'] == '1') ? ' checked ':''; ?>
											<input type="checkbox" name="is_required" value="1" id="is_required" <?php echo $checked; ?> data-toggle="toggle" data-onstyle="primary" data-on="Yes"data-off="No" data-offstyle="default" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-4 col-md-4 label-title-upper" for="show_in_catalog"><span class="requireds">*</span> Show in Catalog :</label>
										<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
											<?php $checked = ($row['show_in_catalog'] == '1') ? ' checked ':''; ?>
											<input type="checkbox" name="show_in_catalog" value="1" id="show_in_catalog" <?php echo $checked; ?> data-toggle="toggle" data-onstyle="primary" data-on="Yes"data-off="No" data-offstyle="default" >
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-4 col-md-4 label-title-upper" for="status"><span class="requireds">*</span> Status:</label>
										<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
											<?php $checked = ($row['status'] == '1') ? ' checked ':''; ?>
											<input type="checkbox" name="status" value="1" id="status" <?php echo $checked; ?> data-toggle="toggle" data-onstyle="primary" data-on="Active"data-off="Inactive" data-offstyle="default" >

										</div>
									</div>
								</div>
							<!-- left side div end -->	
							<!-- right side div end -->
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<div class="col-lg-2 pull-left">
											<button type="button" onclick="this.form.action='<?php echo $listpage_url;?>';this.form.submit();" class=" btn bg-red btn-flat">Cancel</button>
										</div>
										<div class="col-lg-2 pull-right">
											<button type="submit" class="form-control btn bg-green btn-flat">Save</button>
										</div>
									</div>
								</div>
							</div>
							
						</div>
						 
						  <!-- /.box-footer -->
						</form>
		  </div>
        	<!-- /.box-body -->
        
		</div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
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