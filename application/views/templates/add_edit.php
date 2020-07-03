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
					
							<div class="box-body">
							<!-- left side div -->
								<div class="col-sm-9">
									<div class="form-group">
										<label for="template_name" class="col-sm-4 control-label">Template Name</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" id="template_name" name="template_name" placeholder="Template Name" data-bv-notempty="true" data-bv-notempty-message="Please enter template name" value="<?php echo $row['template_name']; ?>" >
										</div>
									</div>
									<div class="form-group">
										<label for="template_name" class="col-sm-4 control-label">Orientation</label>
										<div class="col-sm-2">
										<?php $checked = ( isset($row['orientation']) && $row['orientation'] == 'vertical') ? $checked='checked="checked"'  : ''; ?>
											<input type="checkbox" name="orientation" value="1" id="orientation"  <?php echo $checked; ?> data-toggle="toggle" data-onstyle="primary" data-on="Vertical"data-off="Horizontal" data-offstyle="warning" >
										</div>
										<label for="template_name" class="col-sm-2 control-label">Sides</label>
										<div class="col-sm-4">
										<?php $checked = ( isset($row['sides']) && $row['sides'] == '1') ? $checked='checked="checked"'  : ''; ?>
											<input type="checkbox" name="sides" value="1" id="sides"  <?php echo $checked; ?> data-toggle="toggle" data-onstyle="primary" data-on="Single"data-off="Both" data-offstyle="warning" >
										</div>
									</div>

									<div class="form-group">
										<label for="product_id" class="col-sm-4 control-label">Product</label>
										<div class="col-sm-6">
											<select class="form-control col-md-7 col-xs-12" id="product_id" name="product_id"  data-bv-notempty="true" data-bv-notempty-message="Please select product">
												<option value="">--Please Select Product--</option>
													 <?php foreach ( $products as $key => $value ): ?>
													   <option value="<?php echo $key; ?>"<?php if ( isset($row['product_id']) &&  $row['product_id'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
													 <?php endforeach; ?>
											</select>
										</div>
									</div>
									
									<div class="col-lg-12 col-lg-offset-2">
									 <ul class="nav nav-tabs" role="tablist">
									   <li  ><a href="#images" role="tab" data-toggle="tab">Images</a></li>
									   <li  ><a href="#attributes" role="tab" data-toggle="tab">Attributes</a></li>
									   <li class="active"><a href="#fields" role="tab" data-toggle="tab">Fields</a></li>
									 </ul>
									 <div class="row">
										<div class="tab-content">
										<div role="tabpanel" class="tab-pane col-lg-12 " id="images">
											<div class="form-group">
												<label for="template_image" class="col-sm-4 control-label">Front Image</label>
												<div class="col-sm-6">
													<input type="file"  name="template_image" id="template_image"  data-bv-file="true"   data-bv-file-message="File size should be less than 2 MB and JPG or PNG format only" class="form-control" data-bv-file-type="image/jpeg,image/jpg,image/png" />
												</div>
											</div>
											<div class="form-group">
												<label for="template_image" class="col-sm-4 control-label">Back Image</label>
												<div class="col-sm-6">
													<input type="file"  name="template_image_back" id="template_image_back"  data-bv-file="true" data-bv-file-message="File size should be less than 2 MB and JPG or PNG format only" class="form-control" data-bv-file-type="image/jpeg,image/jpg,image/png" />
												</div>
											</div>
										</div>
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
										<div role="tabpanel" class="tab-pane col-lg-12" id="fields">
											<div class="col-sm-6 form-group">
												<label class="col-sm-7 control-label">Standard</label>
												<div class="col-sm-5">
													<input type="checkbox"   name="attribute[2][4]"  value="1" id="matt"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
												</div>	
											</div>
											<div class="col-sm-6 form-group">
												<label class="col-sm-7 control-label">Division</label>
												<div class="col-sm-5">
													<input type="checkbox"   name="attribute[2][4]"  value="1" id="matt"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
												</div>
											</div>
											<div class="col-sm-6 form-group">
												<label class="col-sm-7 control-label">House</label>
												<div class="col-sm-5">
													<input type="checkbox"   name="attribute[2][4]"  value="1" id="matt"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
												</div>
											</div>
											<div class="col-sm-6 form-group">
												<label class="col-sm-7 control-label">Roll No.</label>
												<div class="col-sm-5">
													<input type="checkbox"   name="attribute[2][4]"  value="1" id="matt"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
												</div>
											</div>
											<div class="col-sm-6 form-group">
												<label class="col-sm-7 control-label">G.R. No.</label>
												<div class="col-sm-5">
													<input type="checkbox"   name="attribute[2][4]"  value="1" id="matt"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
												</div>
											</div>
											<div class="col-sm-6 form-group">
												<label class="col-sm-7 control-label">Students' Name</label>
												<div class="col-sm-5">
													<input type="checkbox"   name="attribute[2][4]"  value="1" id="matt"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
												</div>
											</div>
											<div class="col-sm-6 form-group">
												<label class="col-sm-7 control-label">Address 1</label>
												<div class="col-sm-5">
													<input type="checkbox"   name="attribute[2][4]"  value="1" id="matt"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
												</div>
											</div>
											<div class="col-sm-6 form-group">
												<label class="col-sm-7 control-label">Address 2</label>
												<div class="col-sm-5">
													<input type="checkbox"   name="attribute[2][4]"  value="1" id="matt"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
												</div>
											</div>
											<div class="col-sm-6 form-group">
												<label class="col-sm-7 control-label">Address 3</label>
												<div class="col-sm-5">
													<input type="checkbox"   name="attribute[2][4]"  value="1" id="matt"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
												</div>
											</div>
											<div class="col-sm-6 form-group">
												<label class="col-sm-7 control-label">Date Of Birth</label>
												<div class="col-sm-5">
													<input type="checkbox"   name="attribute[2][4]"  value="1" id="matt"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
												</div>
											</div>
											<div class="col-sm-6 form-group">
												<label class="col-sm-7 control-label">Phone No.</label>
												<div class="col-sm-5">
													<input type="checkbox"   name="attribute[2][4]"  value="1" id="matt"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
												</div>
											</div>
											<div class="col-sm-6 form-group">
												<label class="col-sm-7 control-label">Emergency Ph. No.</label>
												<div class="col-sm-5">
													<input type="checkbox"   name="attribute[2][4]"  value="1" id="matt"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
												</div>
											</div>
											<div class="col-sm-6 form-group">
												<label class="col-sm-7 control-label">Blood Group</label>
												<div class="col-sm-5">
													<input type="checkbox"   name="attribute[2][4]"  value="1" id="matt"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
												</div>
											</div>
											<div class="col-sm-6 form-group">
												<label class="col-sm-7 control-label">Mode Of Transport</label>
												<div class="col-sm-5">
													<input type="checkbox"   name="attribute[2][4]"  value="1" id="matt"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
												</div>
											</div>
											<div class="col-sm-6 form-group">
												<label class="col-sm-7 control-label">Driver's Name</label>
												<div class="col-sm-5">
													<input type="checkbox"   name="attribute[2][4]"  value="1" id="matt"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
												</div>
											</div>
											<div class="col-sm-6 form-group">
												<label class="col-sm-7 control-label">Driver's Ph. No.</label>
												<div class="col-sm-5">
													<input type="checkbox"   name="attribute[2][4]"  value="1" id="matt"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
												</div>
											</div>
											<div class="col-sm-6 form-group">
												<label class="col-sm-7 control-label">Father's Name</label>
												<div class="col-sm-5">
													<input type="checkbox"   name="attribute[2][4]"  value="1" id="matt"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
												</div>
											</div>
											<div class="col-sm-6 form-group">
												<label class="col-sm-7 control-label">Father's Ph. No.</label>
												<div class="col-sm-5">
													<input type="checkbox"   name="attribute[2][4]"  value="1" id="matt"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
												</div>
											</div>
											<div class="col-sm-6 form-group">
												<label class="col-sm-7 control-label">Mother's Name</label>
												<div class="col-sm-5">
													<input type="checkbox"   name="attribute[2][4]"  value="1" id="matt"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
												</div>
											</div>
											<div class="col-sm-6 form-group">
												<label class="col-sm-7 control-label">Mother's Ph. No.</label>
												<div class="col-sm-5">
													<input type="checkbox"   name="attribute[2][4]"  value="1" id="matt"  data-toggle="toggle" data-onstyle="success" data-on="Yes"data-off="No" data-offstyle="danger" >
												</div>
											</div>
										</div>
									 </div>
									</div>
								</div>
								<div class="form-group">
										<label for="template_name" class="col-sm-4 control-label">Status</label>
										<div class="col-sm-6">
										<?php $checked = ( isset($row['status']) && $row['status'] == '1') ? $checked='checked="checked"'  : ''; ?>
											<input type="checkbox" name="status" value="1" id="status"  <?php echo $checked; ?> data-toggle="toggle" data-onstyle="primary" data-on="Active"data-off="Inactive" data-offstyle="warning" >
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