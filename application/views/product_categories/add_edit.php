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
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="product_category_name"><span class="requireds">*</span> Category Name:</label>
							<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
									<input type="text" class="form-control" name="product_category_name" id="product_category_name" placeholder="Category name" value="<?php echo $row['product_category_name']; ?>"
									data-bv-notempty="true" data-bv-notempty-message="Please enter Category name"
									>
							</div>
						</div>
					  </div>
					   <div class="row row-edit-form">
						<div class="col-lg-6"> 
							<label class="control-label col-lg-4 col-md-4 label-title-upper" for="Category_icon"><span class="requireds">*</span> Category Image:</label>
							<div class="col-lg-8 col-sm-6 col-xs-12 form-group">
									<input type="file" name="category_image" id="category_image" data-bv-notempty="true" data-bv-notempty-message="Please select image">
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