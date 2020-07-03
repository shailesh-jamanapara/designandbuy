<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
/*
* 12-20-2016
* dashboard_view page(view)
*/
?>

<style>
tr td:last-child {
    text-align:center;
}

</style>

<!-- page content -->
	<div class="right_col" role="main">
	  <div class="">
		<div class="page-title">
		  <div class="title_left">
			<h2>BimSym eBusiness Solutions</h2>
		  </div>		  
		</div>

		<div class="clearfix"></div>       
		<div class="row">
		  <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			  <div class="x_title">
				<h2>List of Employee</h2>
				<a style="" href="<?php echo base_url();?>index.php/Employee/add_emp"><button type="button" class="btn btn-primary">  Add Employee</button></a>
				<!--<ul class="nav navbar-right panel_toolbox">
				  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
				  </li>
				  <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
					<ul class="dropdown-menu" role="menu">
					  <li><a href="#">Settings 1</a>
					  </li>
					  <li><a href="#">Settings 2</a>
					  </li>
					</ul>
				  </li>
				  <li><a class="close-link"><i class="fa fa-close"></i></a>
				  </li>
				</ul>-->
				<div class="clearfix"></div>
			  </div>
			  <div class="x_content">
				<p class="text-muted font-13 m-b-30">
				  
				</p>
				<table id="datatable_emp_list" class="table table-striped table-bordered">
				  <thead>
					<tr>
					  <th>Full Name</th>
					  <th>Position</th>
					  <th>Email Id</th>
					  <th>Short Name</th>
					  <th>Joining</th>
					  <th style="max-width:60px;">Action</th>
					</tr>
				  </thead>


				  <tbody>
					<tr>
					  <td>Aaaa Nixon</td>
					  <td>System Architect</td>
					  <td>Edinburgh@test.com</td>
					  <td>ANN</td>
					  <td>2011/04/25</td>
					  <td><a href="<?php echo base_url();?>index.php/Employee/emp_detail/1"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> Detail</button></a></td>
					</tr>
					<tr>
					  <td>Aab Winters</td>
					  <td>Accountant</td>
					  <td>Tokyo@test.com</td>
					  <td>AAB</td>
					  <td>2011/07/25</td>
					  <td><a href="<?php echo base_url();?>index.php/Employee/emp_detail/2"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> Detail</button></a></td>
					</tr>
					<tr>
					  <td>Ashton Cox</td>
					  <td>Junior Technical Author</td>
					  <td>San Francisco@test.com</td>
					  <td>ASH</td>
					  <td>2009/01/12</td>
					  <td><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> Detail</button></td>
					</tr>
					<tr>
					  <td>Cedric Kelly</td>
					  <td>Senior Javascript Developer</td>
					  <td>Edinburgh@test.com</td>
					  <td>CED</td>
					  <td>2012/03/29</td>
					  <td><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> Detail</button></td>
					</tr>
					<tr>
					  <td>Airi Satou</td>
					  <td>Accountant</td>
					  <td>Tokyo@test.com</td>
					  <td>AIR</td>
					  <td>2008/11/28</td>
					  <td><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> Detail</button></td>
					</tr>
					<tr>
					  <td>Brielle Williamson</td>
					  <td>Integration Specialist</td>
					  <td>New York@test.com</td>
					  <td>BRI</td>
					  <td>2012/12/02</td>
					  <td><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> Detail</button></td>
					</tr>
					<tr>
					  <td>Herrod Chandler</td>
					  <td>Sales Assistant</td>
					  <td>San Francisco@test.com</td>
					  <td>HED</td>
					  <td>2012/08/06</td>
					  <td><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> Detail</button></td>
					</tr>
					<tr>
					  <td>Rhona Davidson</td>
					  <td>Integration Specialist</td>
					  <td>Tokyo@test.com</td>
					  <td>RHO</td>
					  <td>2010/10/14</td>
					  <td><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> Detail</button></td>
					</tr>
					<tr>
					  <td>Colleen Hurst</td>
					  <td>Javascript Developer</td>
					  <td>San Francisco@test.com</td>
					  <td>COL</td>
					  <td>2009/09/15</td>
					  <td><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> Detail</button></td>
					</tr>
					<tr>
					  <td>Sonya Frost</td>
					  <td>Software Engineer</td>
					  <td>Edinburgh@test.com</td>
					  <td>SON</td>
					  <td>2008/12/13</td>
					  <td><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> Detail</button></td>
					</tr>
					<tr>
					  <td>Jena Gaines</td>
					  <td>Office Manager</td>
					  <td>London@test.com</td>
					  <td>JEN</td>
					  <td>2008/12/19</td>
					  <td><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> Detail</button></td>
					</tr>
					<tr>
					  <td>Quinn Flynn</td>
					  <td>Support Lead</td>
					  <td>Edinburgh@test.com</td>
					  <td>QUI</td>
					  <td>2013/03/03</td>
					  <td><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> Detail</button></td>
					</tr>
					<tr>
					  <td>Charde Marshall</td>
					  <td>Regional Director</td>
					  <td>San Francisco@test.com</td>
					  <td>CHA</td>
					  <td>2008/10/16</td>
					  <td><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> Detail</button></td>
					</tr>
					<tr>
					  <td>Haley Kennedy</td>
					  <td>Senior Marketing Designer</td>
					  <td>London@test.com</td>
					  <td>HAL</td>
					  <td>2012/12/18</td>
					  <td><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> Detail</button></td>
					</tr>				
				  </tbody>
				</table>
			  </div>
			</div>
		  </div>
		  
		</div>
	  </div>
	</div>
	<!-- /page content -->
	
	<!-- Datatables -->
    <script src="<?php echo vendor_url();?>datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo vendor_url();?>datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo vendor_url();?>datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo vendor_url();?>datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo vendor_url();?>datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo vendor_url();?>datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo vendor_url();?>datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo vendor_url();?>datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo vendor_url();?>datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo vendor_url();?>datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo vendor_url();?>datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo vendor_url();?>datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="<?php echo vendor_url();?>jszip/dist/jszip.min.js"></script>
    <script src="<?php echo vendor_url();?>pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo vendor_url();?>pdfmake/build/vfs_fonts.js"></script>
	
	<!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable_emp_list").length) {
			$('#datatable_emp_list').dataTable({				
				keys: false,
				dom: "lfrtip",
				"bStateSave": true,
				responsive: true,
				"aoColumnDefs": [
				  { "bSortable": false, "aTargets": [ -1 ] }
				],
				/*buttons: [
					{
					  extend: "copy",
					  className: "btn-sm"
					},
					{
					  extend: "csv",
					  className: "btn-sm"
					},
					{
					  extend: "excel",
					  className: "btn-sm"
					},
					{
					  extend: "pdfHtml5",
					  className: "btn-sm"
					},
					{
					  extend: "print",
					  className: "btn-sm"
					},
				],*/
			});
          }
        };	

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->