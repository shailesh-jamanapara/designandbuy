<div class="tab-content col-sm-12  action-content-div">
<div class="row">
							<div class="col-sm-12 col-lg-12">
								Total <?php echo count($students);?> Cards Imported
								: Total <?php echo count($completed);?> Cards Filled Data
							</div>
							<!-- /.col -->
                			<div class="col-sm-12 col-lg-12">
									<div class="box">
										<div class="box-header">
											
										</div>
										<form class="form-horizontal" name="frmsearch" id="frmsearch" method="post" action="" >
										<!-- /.box-header -->
										<div class="box-body">
											<table id="example2" class="table table-bordered table-hover">
											<thead class="headings">
											<tr>
											<th class="sorting column-title  col-lg-1" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" >Sr. No.</th>
											<th class="column-title col-lg-3 text-primary sortable" column="product_categories.product_category_name" state="none"  >Student Name<i   class="fa fa-sort-alpha-asc"> </i></th>
											<th class="column-title col-lg-2 " column="" state="none"  >I Card<i   class="fa fa-sort-alpha-asc"> </i></th>
											<th class="column-title col-lg-1 " column="" state="none"  >Standard<i   class="fa fa-sort-alpha-asc"> </i></th>
											<th class="column-title col-lg-1 " column="" state="none"  >Division<i   class="fa fa-sort-alpha-asc"> </i></th>
											<th class="column-title col-lg-2 " column="" state="none"  >Mobile No.<i   class="fa fa-sort-alpha-asc"> </i></th>
											<th class="column-title col-lg-2 " column="" state="none"  >Template <i   class="fa fa-sort-alpha-asc"> </i></th>
											<th class="column-title col-lg-1" >Filled Data</th>
											</tr>
											</thead>
											<tbody>
											<?php  if(!empty($students)) :  $i = 1; foreach($students as $row) :  $id = base64_encode($row['id']); $status = ( $row['status'] == 1) ?"Active":"Inactive"; $row_id= rand(5000, 9000 ); ?>
											<tr id="<?php echo $row_id; ?>">
											<td><?php echo  $i; ?></th>
											<td><?php echo  $row['student_name'];  ?></td>
											<td>
											<div class="tempalets_list_image_wrap">
											<img src="<?php echo base_url();?>/uploads/templates/<?php echo $row['template_image_path'];?>" alt="" class="img-responsive"> 
											</div>                                            
											</td>
											<td><?php echo  $row['standard_id'];  ?></td>
											<td><?php echo  $row['class_id'];  ?></td>
											<td><?php echo  $row['mobile_no'];  ?></td>
											<td><?php echo  $row['template_name'];  ?></td>
											<?php $filled = ($row['student_updated'] != '0000-00-00 00:00:00')?' fa-check text-success ':' fa-exclamation-circle text-danger ';?>
											<td> <i class="fa <?php echo  $filled;?>" ></i></td>
											<!-- <td> <a herf="javascript:void(0);" class="edit_link" ><i class="fa fa-pencil-square-o text-success" title="Edit"> </i> </a>
												<a herf="javascript:void(0);" class="edit_link"><i class="fa fa-trash text-warning " title="Delete This Item"> </i> </a>
												</td> -->
											</tr>
											<?php  $i++; endforeach; endif; ?>
											<?php  if(empty($students)) : ?> <td colspan="8" class="text-center" > No record found </td> <?php endif; ?>
											<tbody>
											</table>
											</form>
										</div>
										<!-- /.box-body -->
									</div>
									<!-- /.box -->
								</div>
								<!-- /.col -->
								
</div>

