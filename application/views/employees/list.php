<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
/*
* 12-20-2016
* dashboard_view page(view)
*/


?>

<style>
.btn-primary{
height: 33px ;
margin-top: 22px ;
padding-top: 3px;
}
.edit_link{
    cursor:pointer;
}
tr td:last-child {
    text-align:center;
}
a.clear.clear_date {
    margin-top: 22px;
}
@media (max-width: 500px) {
	a.clear.clear_date {
		margin-top: 28px;
	}
}

</style>
<!-- page content -->
<form name="frmlist" id="frmlist" method="post" action="">
    <input type="hidden" name="task" id="task" value="" />
    <input type="hidden" name="id" id="id" value="" />
    <input type="hidden" name="sort_by" id="sort_by" value="" />
    <input type="hidden" name="order_type" id="order_type" value="" />
	<div class="right_col" role="main">
	  <div class="">
		<div class="page-title">
		  <div class="title_left">
			<!--<h2>BimSym eBusiness Solutions</h2>-->
		  </div>		  
		</div>

		<div class="clearfix"></div>       
		<div class="row">
		  <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			  <div class="x_title">
				<h2>List of Employees</h2>
				<a style="" href="javascript:void(0);" onclick="javascript:editrecord('<?php echo $model['new']; ?>','index.php/Employees/add_edit');"><button type="button" class="btn btn-primary">  Add New Employee</button></a>
				<div class="clearfix"></div>
			  </div>
			  <div class="x_content">
				<p class="text-muted font-13 m-b-30">
				 <a class="btn btn-default buttons-html5 btn-sm " align="left" tabindex="0" aria-controls="datatable_emp_list" href="<?php echo base_url(); ?>index.php/Employee_csv"><span>Import CSV For Employee</span></a> 
				</p>
				<div id="external_filter_container">
                                    <?php if ( count($search) > 0 ): ?>
                                <div class="panel panel-default">
                                  <div class="panel-heading">
                                        <h3 class="panel-title">Filter</h3>
                                  </div>
                                  <div class="panel-body">
                                          <div class="row">
                                                <div class="col-sm-4">
                                                  <div class="form-group">
                                                        <label for="search_by">Search By</label>
                                                        <select class="form-control" id="search_by" name="search_by">
                                                            <option value="">Please select </option>
                                                                <?php foreach ( $search as $key => $value ): ?>
                                                                  <option value="<?php echo $key; ?>"<?php if ( $postdata['search_by'] == $key ) { ?> selected="selected"<?php } ?>><?php echo $value; ?></option>
                                                                <?php endforeach; ?>
                                                        </select>
                                                  </div>
                                                </div>
                                                <div class="col-sm-4">
                                                  <div class="input-group">
                                                        <div class="search_box">
                                                        <label for="search_for" class="search-for">Search For</label>
                                                        <input type="text" class="form-control" name="search_for" id="search_for" placeholder="Search Keyword" value="<?php echo $postdata['search_for']; ?>">
                                                        </div>
                                                        <span class="input-group-btn">
                                                        <button class="btn btn-primary btn-search" name="search_data_by_select" id="search_data_by_select" type="submit" style="height:35px; margin-top:25px; padding-top:3px;">GO</button>
                                                        <button class="btn btn-primary" id="configreset" style="height:35px; margin-top:25px; margin-left: 20px; padding-top:3px;" type="submit"  name="reset"  value="reset">Reset</button>
                                                        </span>
                                                  </div>
                                                </div>
                                                <div class="col-sm-3">
                                                  <div class="input-group">
                                                        <?php if(isset($allow_export) && $allow_export == 1) { ?>
                                                                <a href="<?php echo $link_export; ?>" class="btn btn-primary" style="height:35px; margin-top:25px; margin-left: 20px; padding-top:3px;"id="configreset"> Export </a>
                                                        <?php } ?>
                                                  </div>
                                                </div>
                                                <div class="col-sm-1 pull-right">
                                                        <div class="form-group">
                                                        <label for="pagelimit">Show</label>
                                                        <select class="form-control" id="limit" name="limit" onchange="javascript:showrecords();">
                                                                <option value="10" <?php if(isset($postdata['limit']) && $postdata['limit'] == 10) echo 'selected="selected"'; ?> >10</option>
                                                                <option value="25" <?php if(isset($postdata['limit']) &&  $postdata['limit'] == 25) echo 'selected="selected"'; ?>>25</option>
                                                                <option value="50" <?php if(isset($postdata['limit']) &&  $postdata['limit'] == 50) echo 'selected="selected"'; ?>>50</option>
                                                                <option value="100" <?php if(isset($postdata['limit']) &&  $postdata['limit'] == 100) echo 'selected="selected"'; ?>>100</option>
                                                        </select>
                                                        </div>
                                                </div>
                                          </div>

                                  </div>
                                </div>
                                <?php endif; ?>
				</div>
				<table class="table" id="datatable_emp_list" class="table table-striped table-bordered">
				  <thead>
					<tr>
					  <th scope="col">Sr. No.</th>
					  <th scope="col">Employee Name</th>
					  <th scope="col">Middle Name</th>
					  <th scope="col">Last Name</th>
					  <th scope="col">Contact No.</th>
					  <th scope="col">Position</th>
					  <th scope="col">Department</th>
					  <th scope="col">status</th>
                                          <th scope="col">Action</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php 
                     if(!empty($rows)) {
					 $i = 1;
                     foreach($rows as $row) {
					 $id = base64_encode($row['id']);
					  ?>
					<tr>
					  <td><?php echo  $i; ?></td>
					  <td><?php echo  $row['title'] ." " . $row['first_name']; ?></td>
					  <td><?php echo  $row['middle_name'];  ?></td>
					  <td><?php echo  $row['last_name']; ?></td>
					  <td><?php echo  $row['contact']; ?></td>
					  <td><?php echo  $row['position_title']; ?></td>
					  <td><?php echo  $row['department_name'];  ?></td>
					  <td><?php echo  $row['status_text']; ?></td>
                                          <td> <a herf="javascript:void(0);" class="edit_link" onclick="javascript:editrecord('<?php echo $id; ?>','index.php/Employees/add_edit');" ><i class="fa fa-pencil-square-o" title="Edit"> </i> </a> </td>
					</tr>
					<?php
					  $i++;
					 }
					 }
					else{
						?>
						<tr>
							<td colspan="9">No records found</td>
						</tr>
						<?php 
					}
					?>
				  </tbody>
				</table>
				</div>
			</div>
		  </div>
		  
		</div>
	  </div>
	</div>
</form>
<!-- /page content -->
<script>
function editrecord(id, url)
{
	if(id){
        var form_action_url  = '<?php echo base_url();?>'+url;
        $('form#frmlist').find('#id').val(id);
        $('form#frmlist').find('#task').val('add_edit');
        $('#frmlist').attr('action', form_action_url).submit();
        }
}
 </script>