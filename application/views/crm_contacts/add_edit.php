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
						<input type="hidden" name="customer_type" id="customer_type" value="franchisee" />
						<input type="hidden" name="role_id" id="role_id" value="14" />
						<input type="hidden" name="status" id="status" value="1" />
								
						<div class="box-body">
						<!-- left side div -->
							<div class="col-sm-9">

								<div class="form-group">
									<label for="crm_contact_name" class="col-sm-4 control-label">Contact Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="crm_contact_name" name="crm_contact_name" placeholder="Customer Contact Name" data-bv-notempty="true" data-bv-notempty-message="Please Customer name" value="<?php echo $row['crm_contact_name']; ?>" >
									</div>
								</div>

								<div class="form-group">
									<label for="contact_email" class="col-sm-4 control-label">Contact Email</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="contact_email" name="contact_email" placeholder="Customer Email" data-bv-notempty="true" data-bv-notempty-message="Please Customer email" value="<?php echo $row['contact_email']; ?>" >
									</div>
								</div>

								<div class="form-group">
									<label for="contact_number" class="col-sm-4 control-label">Contact Number</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Customer Number" data-bv-notempty="true" data-bv-notempty-message="Please Customer Phone" value="<?php echo $row['contact_number']; ?>" >
									</div>
								</div>

								<div class="form-group">
									<label for="contact_message" class="col-sm-4 control-label">Contact For</label>
									<div class="col-sm-8">
										<select name="contact_for" id="contact_for" class="form-control">
											<option value="">Please select</option>
											<option value="printing" <?php if($row['contact_for'] == 'printing'){ echo 'selected="selected" '; } ?> >Printing</option>
											<option value="idcards" <?php if($row['contact_for'] == 'idcards'){ echo 'selected="selected" '; } ?> >ID Cards</option>
											<option value="corporate_stationers" <?php if($row['contact_for'] == 'corporate_stationers'){ echo 'selected="selected" '; } ?> >Corporate Stationers</option>
											<option value="academic_stationers" <?php if($row['contact_for'] == 'academic_stationers'){ echo 'selected="selected" '; } ?> >Academic Stationers</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="contact_subject" class="col-sm-4 control-label">Contact Subject</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="contact_subject" name="contact_subject" placeholder="Contact Subject" data-bv-notempty="true" data-bv-notempty-message="Please Customer Subject" value="<?php echo $row['contact_subject']; ?>" >
									</div>
								</div>

								<div class="form-group">
									<label for="contact_message" class="col-sm-4 control-label">Contact Message</label>
									<div class="col-sm-8">
										<textarea class="form-control" id="contact_message" name="contact_message" placeholder="Contact Message" data-bv-notempty="true" data-bv-notempty-message="Please Customer Message" ><?php echo $row['contact_message']; ?></textarea>
									</div>
								</div>

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
				</form>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->
<?php endif; ?>		

<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>	
