<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
/*
* 12-20-2016
* benefit_view page(view)
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
			<!--<h2>BimSym eBusiness Solutions</h2>-->
		  </div>		  
		</div>

		<div class="clearfix"></div>       
		<div class="row">
		  <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			  <div class="x_title">
				<h2>List of Benefit</h2>
				<a style="" href="<?php echo base_url();?>index.php/Setup"><button type="button" class="btn btn-primary">  Add New Benefit</button></a>
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
				
				<div id="external_filter_container">
				</div>
				
				<table id="datatable_emp_list" class="table table-striped table-bordered">
				
				  <thead>
					<tr>
					   <th>BENEFIT NAME</th>
					   <th>BENEFIT CATEGORY</th>
					  
					  <th>BENEFIT ALIAS NAME</th> 
					  <th>OFFERED</th>
					  <th>BIMSYM CONTRIBUTATION</th>
					  <th>YOUR CONTRIBUTATION</th>
					  <th style="max-width:60px;">Action</th>
					</tr>
				  </thead>


				  <tbody>
					<?php foreach($benefit_list as $row) { //echo '<pre>'; print_r($row); exit;?>
					<tr>
					  <td><?php echo $row['Benefit_Name']; ?></td>
					  <td><?php if($row['Benefit_Category'] == 1){ echo 'Earnings';}elseif($row['Benefit_Category'] == 2){echo 'Retirements';}elseif($row['Benefit_Category'] == 3){echo 'Benefits';} ?></td>
					
					  <td><?php echo $row['Benefit_Alias_Name']; ?></td>
					  <td><?php if($row['Offered'] == 0)
					  {
					   echo "No";
					  }elseif($row['Offered'] == 1)
					  {
					   echo "Yes";
					  }else{ echo '';}
					  
					  
					  ?></td>
					  
					  <td><?php echo $row['Bimsym_Contribution']; /* $status = $row['Status']; 
					       if($status == 1)
						   {
						     $status = 'Active';
						   }else{
						     $status = 'In-Active';
						   }
						   echo $status; */
					  ?></td>
					  <td><?php echo $row['Your_Contribution']; ?></td>
					  <td><a href="<?php echo base_url();?>index.php/Setup/edit_benefit_detail/<?php echo $row['Ear_ID']; ?>"><button type="button" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></button></a>
					  <a href="<?php echo base_url();?>index.php/Setup/delete_benefit_detail/<?php echo $row['Ear_ID']; ?>"><i class="glyphicon glyphicon-remove"></i></a>
					  </td>
					 
					  
					</tr>
					<?php } ?>
					 
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
   <!-- <script src="<?php echo asset_url();?>build/yadcf-0.9.1/jquery.dataTables.yadcf.js"></script>
    <link href="<?php echo asset_url();?>build/yadcf-0.9.1/jquery.datatables.yadcf.css" rel="stylesheet" type="text/css" /> -->
    
	
	
	<!-- Start --->
	
	
	<!-- End -->
	
	
	
	
	<!-- Datatables -->
    <script>
     $(document).ready(function() { 
		
        var handleDataTableButtons = function() {
          if ($("#datatable_emp_list").length) {
			var table = $('#datatable_emp_list').DataTable({	

				"columnDefs": [
					{ "visible": false, "targets": 1 }
				],
        
				"order": [[ 1, 'asc' ]],
				"displayLength": 25,
				"aoColumnDefs": [
				 { "bSortable": false, "aTargets": [ -1 ] }
				],
				"drawCallback": function ( settings ) {
					var api = this.api();
					var rows = api.rows( {page:'current'} ).nodes();
					var last=null;
		    
					api.column(1, {page:'current'} ).data().each( function ( group, i ) {
						if ( last !== group ) {
							$(rows).eq( i ).before(
								'<tr class="group"><td colspan="1">'+group+'</td></tr>'
							);
		    
							last = group;
						}
					} );
				},
				keys: false,
				dom: "lBfrtip",
		//		"bStateSave": true,
				responsive: true,
				//"aoColumnDefs": [
				// { "bSortable": false, "aTargets": [ -1 ] }
				//],
				buttons: [ 
					/* {
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
					}*/ 
			 	]
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