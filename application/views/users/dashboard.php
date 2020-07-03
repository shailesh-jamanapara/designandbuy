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
				<h2>Dashboard</h2>
				
			  </div>
			  <div class="x_content">
				<!-- 
				<p class="text-muted font-13 m-b-30">
				 <a class="btn btn-default buttons-html5 btn-sm " align="left" tabindex="0" aria-controls="datatable_emp_list" href="<?php echo base_url(); ?>index.php/Employee_csv"><span>Import CSV For Employee</span></a> 
				</p>
				-->
				Dashboard here
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
        var form_action_url  = url;
        $('form#frmlist').find('#id').val(id);
        $('form#frmlist').find('#task').val('add_edit');
        $('#frmlist').attr('action', form_action_url).submit();
        }
}
function viewrecord(id, url)
{
	if(id){
        var form_action_url  = url;
        $('form#frmlist').find('#id').val(id);
        $('form#frmlist').find('#task').val('view_only');
        $('#frmlist').attr('action', form_action_url).submit();
        }
}
 </script>