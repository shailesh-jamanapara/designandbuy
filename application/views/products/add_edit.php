<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Content Header (Page header) -->
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
    <section class="content-header">
      <h1>
       <?php echo $page_heading; ?>
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
								<div class="col-sm-9">
									<div class="form-group">
										<label class="control-label col-lg-4 col-md-4 label-title-upper" for="product_category_id"><span class="requireds">*</span> Product category:</label>
										<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
												<select class="form-control" name="product_category_id" id="product_category_id" data-bv-not-empty="true" data-bv-notempty-message="Select product category" >
													<option value="">Select Category</option>
													<?php foreach ( $product_categories as $key => $value ): ?>
													   <option value="<?php echo $key; ?>"<?php if ( isset($row['product_category_id']) &&  $row['product_category_id'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
													 <?php endforeach; ?>
												</select>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-4 col-md-4 label-title-upper" for="product_name"><span class="requireds">*</span> Product Name:</label>
										<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
												<input type="text" class="form-control" name="product_name" id="product_name" placeholder="Project name" value="<?php echo $row['product_name']; ?>"
												data-bv-notempty="true" data-bv-notempty-message="Please enter product name"  data-bv-regexp="true" data-bv-regexp-regexp="^[A-Za-z\ .]+$" data-bv-regexp-message="Special Characters are not allowed"
												>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-4 col-md-4 label-title-upper" for="product_image1"><span class="requireds">*</span> Front Image:</label>
										<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
												<input type="file"  name="product_image_main" id="product_image_main"  data-bv-file="true"   data-bv-file-message="File size should be less than 2 MB and JPG or PNG format only" class="form-control" data-bv-file-type="image/jpeg,image/jpg,image/png" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-4 col-md-4 label-title-upper" for="product_image2"><span class="requireds">*</span> Back Image:</label>
										<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
												<input type="file"  name="product_image_optional" id="product_image_optional"  data-bv-file="true"   data-bv-file-message="File size should be less than 2 MB and JPG or PNG format only" class="form-control" data-bv-file-type="image/jpeg,image/jpg,image/png" />
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-lg-4 col-md-4 label-title-upper" for="product_description"><span class="requireds">*</span> Product Description:</label>
										<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
												<textarea class="form-control" name="product_description" id="product_description" placeholder="Project short description"  data-bv-notempty="true" data-bv-notempty-message="Please enter product name"  ><?php echo $row['product_description']; ?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label for="" class="col-sm-4 control-label"> Availables: </label>
										<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
											<div role="tabpanel" class="tab-pane col-lg-12 " id="attributes">
												<div class="form-group">
													<label for="" class="col-sm-4 control-label"> Available scanners </label>
													<label for="barcode" class="col-sm-2 control-label">Bar code</label>
													<div class="col-sm-2">
														<?php $checked = ( !empty($attributes) && in_array('1', $attributes) ) ? ' checked="checked"':''; ?>
														<input type="checkbox" name="attribute[1][1]" value="1" id="status"  <?php echo $checked; ?>data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
													</div>
													<label for="qrcode" class="col-sm-2 control-label">QR Code</label>
													<div class="col-sm-1">
														<?php $checked = ( !empty($attributes) && in_array('2', $attributes) ) ? ' checked="checked"':''; ?>
														<input type="checkbox"  name="attribute[1][2]" value="1" id="status" <?php echo $checked; ?> data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
													</div>
												</div>
												<div class="form-group">
													<label for="smart" class="col-sm-4 control-label">Available In Types  </label>
													<label for="barcode" class="col-sm-2 control-label">Smart Card</label>
													<div class="col-sm-2">
													<?php $checked = ( !empty($attributes) && in_array('16', $attributes) ) ? ' checked="checked"':''; ?>
														<input type="checkbox"  name="attribute[11][16]" value="1" id="smart"  <?php echo $checked; ?> data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
													</div>
													<label for="chemical" class="col-sm-2 control-label">Chemical Card</label>
													<div class="col-sm-1">
														<?php $checked = ( !empty($attributes) && in_array('17', $attributes) ) ? ' checked="checked"':''; ?>
														<input type="checkbox"  name="attribute[11][17]" value="1" id="chemical"  <?php echo $checked; ?> data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
													</div>
												</div>
												<div class="form-group">
													<label for="" class="col-sm-4 control-label">Available In  </label>
													<label for="single" class="col-sm-2 control-label">Single Side</label>
													<div class="col-sm-2">
														<?php $checked = ( !empty($attributes) && in_array('20', $attributes) ) ? ' checked="checked"':''; ?>
														<input type="checkbox"  name="attribute[13][20]" value="1" id="single"  <?php echo $checked; ?> data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
													</div>
													<label for="both" class="col-sm-2 control-label">Both Sides</label>
													<div class="col-sm-1">
													<?php $checked = ( !empty($attributes) && in_array('21', $attributes) ) ? ' checked="checked"':''; ?>
														<input type="checkbox"  name="attribute[13][21]" value="1" id="both"  <?php echo $checked; ?> data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
													</div>
												</div>
												<div class="form-group">
													<label for="" class="col-sm-4 control-label">Available In  </label>
													<label for="rfid" class="col-sm-2 control-label">RFID</label>
													<div class="col-sm-2">
													<?php $checked = ( !empty($attributes) && in_array('18', $attributes) ) ? ' checked="checked"':''; ?>
														<input type="checkbox"  name="attribute[12][18]" value="1" id="rfid"  <?php echo $checked; ?> data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
													</div>
													<label for="mifare" class="col-sm-2 control-label">1 K MiFare</label>
													<div class="col-sm-1">
														<?php $checked = ( !empty($attributes) && in_array('19', $attributes) ) ? ' checked="checked"':''; ?>
														<input type="checkbox"  name="attribute[12][19]"  value="1" id="mifare"  <?php echo $checked; ?> data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
													</div>
												</div>
												<div class="form-group">
													<label for="" class="col-sm-4 control-label">Available In  </label>
													<label for="glossy" class="col-sm-2 control-label">Glossy</label>
													<div class="col-sm-2">
													<?php $checked = ( !empty($attributes) && in_array('3', $attributes) ) ? ' checked="checked"':''; ?>
														<input type="checkbox"   name="attribute[2][3]"  value="1" id="glossy"  <?php echo $checked; ?> data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
													</div>
													<label for="matt" class="col-sm-2 control-label">Matt</label>
													<div class="col-sm-1">
													<?php $checked = ( !empty($attributes) && in_array('4', $attributes) ) ? ' checked="checked"':''; ?>
														<input type="checkbox"   name="attribute[2][4]"  value="1" id="matt"  <?php echo $checked; ?> data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
													</div>
												</div>
											</div>
										</div>
										
									</div>
								<div class="form-group">
										<label class="control-label col-lg-4 col-md-4 label-title-upper" for="status"><span class="requireds">*</span> Status:</label>
										<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
											<?php $checked = ($row['status'] == '1') ? ' checked ':''; ?>
											<input type="checkbox" name="status" value="1" id="status" <?php echo $checked; ?> data-toggle="toggle" data-onstyle="primary" data-on="Active"data-off="Inactive" value="<?php echo $row['status'] ; ?>" data-offstyle="default" >
										</div>
							</div>
							<!-- left side div end -->	
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