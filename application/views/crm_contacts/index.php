<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		List of Inquiry
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="box-body">
			<a href="<?php echo base_url();?>index.php/Setups/index/all" >
				<button type="button" class="pull-right btn bg-orange btn-flat margin"> <i class="fa fa-long-arrow-left"></i></button>
			</a>
			<!-- <a href="javascript:void(0);" onclick="javascript:editrecord('<?php echo $model['new']; ?>','<?= $edit_url ?>');">
				<button type="button" class="pull-right btn bg-orange btn-flat margin"> Add New Franchise </button>
			</a> -->
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<form class="form-horizontal" name="frmsearch" id="frmsearch" method="post" action="" >
						<?php  echo print_search_form($search, $postdata, $listpage_url); ?>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead class="headings">
									<tr>
									<th class="sorting column-title  col-lg-1" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Sr. No.</th>
									<th class="column-title col-lg-3 text-primary sortable" column="crm_contacts.crm_contact_name" state="none" > Name<i   class="fa fa-sort-alpha-asc"> </i></th>
									<th class="column-title col-lg-3 sortable" column="crm_contacts.contact_email" state="none"  > Email<i   class="fa fa-sort-alpha-asc"> </i></th>
									<th class="column-title col-lg-2 sortable" column="crm_contacts.contact_number" state="none" > Phone<i class="fa fa-sort-alpha-asc"> </i></th>
									<th class="column-title col-lg-2 sortable" column="crm_contacts.contact_subject" state="none" > Subject<i class="fa fa-sort-alpha-asc"> </i></th>						
									<th class="column-title col-lg-2 sortable" column="crm_contacts.contact_message" state="none" > Message<i class="fa fa-sort-alpha-asc"> </i></th>
									<th class="column-title col-lg-2 sortable" column="crm_contacts.contact_for" state="none" > Contact For<i class="fa fa-sort-alpha-asc"> </i></th>
									<th class="column-title col-lg-2 sortable" column="crm_contacts.status" state="none" >Status<i class="fa fa-sort-alpha-asc"> </i></th>
									<th class="column-title col-lg-1" colspan="2" >Action</th>
									</tr>
				  				</thead>
								<tbody>
									<?php  if(!empty($rows)) :  $i = ($postdata['page'] > 1) ? (($postdata['page']-1) * $postdata['limit'] ) + 1 : 1; foreach($rows as $row) :  $id = base64_encode($row['id']); $status = ( $row['status'] == 1) ?"Active":"Inactive"; $row_id= rand(5000, 9000 ); ?>
									<tr id="<?php echo $row_id; ?>">
										<td><?php echo  $i; ?></th>
										<td><?php echo  $row['crm_contact_name']; ?></td>
										<td><?php echo  $row['contact_email'];  ?></td>
										<td><?php echo  $row['contact_number'];  ?></td>
										<td><?php echo  $row['contact_subject'];  ?></td>
										<td><?php echo  $row['contact_message'];  ?></td>
										<td><?php echo  $row['contact_for'];  ?></td>
										<td><?php echo $status; ?></td>
												<td> <a herf="javascript:void(0);" class="edit_link" onclick="javascript:editrecord('<?php echo $id; ?>','<?= $edit_url ?>');" ><i class="fa fa-pencil-square-o text-success" title="Edit"> </i> </a>
											<a herf="javascript:void(0);" class="edit_link" onclick="javascript:conf_delete('<?php echo $id; ?>','<?php echo $row_id; ?>');" ><i class="fa fa-trash text-warning " title="Delete This Item"> </i> </a>
										</td>
									</tr>
									<?php  $i++; endforeach; endif; ?>
									<?php  if(empty($rows)) : ?> <td colspan="5" class="text-center" > No record found </td> <?php endif; ?>
								</tbody>
			  				</table>
			  			</form>
            		</div>
           			<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
    </section>
    <!-- /.content -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>	

