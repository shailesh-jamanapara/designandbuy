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
				<h2>List of Employee</h2>
				
				<a style="" href="<?php echo base_url();?>index.php/Employee/add_emp"><button type="button" class="btn btn-primary">  Add New Employee</button></a>
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
				 <a class="btn btn-default buttons-html5 btn-sm " align="left" tabindex="0" aria-controls="datatable_emp_list" href="<?php echo base_url(); ?>index.php/Employee_csv"><span>Import CSV For Employee</span></a> 
				</p>
				<div id="external_filter_container">
				</div>
				
				<!--<div class="row">
					<div class="col-sm-6">
						<table class="table">
							<thead>
								<tr class="search_box">
									<th id="cs_date" data-type="date">
											<div class="row">
												<div class="col-xs-5">
													<div id="startfrom">
														<label for="from">From</label>
														<input type="text" id="from" name="From" class="form-control input-sm date-picker">
													</div>
												</div>
												<div class="col-xs-5">
													<div id="endto">
														<label for="to">to</label>
															<input type="text" id="to" name="To" class="form-control input-sm date-picker">
													</div>
												</div>
												<div class="col-xs-2">
													<a href="javascript:void(0)" class="clear clear_date btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
												</div>
											</div>
											
										</th>
								</tr>
							</thead>
						</table> 
					
					</div>
				</div> -->
				
				<table id="datatable_emp_list" class="table table-striped table-bordered">
				
				  <thead>
					<tr>
					  <th>EMPLOYEE ID</th>
					  <th>FIRST NAME</th>
					  <th>EMAIL ID</th>
					  <th>POSITION</th>
					  <th data-target="#cs_date">JOIN DATE</th>
					  <th>STATUS</th>
					  <th style="max-width:60px;">Action</th>
					</tr>
				  </thead>


				  <tbody>
					<?php foreach($employe_list as $row) { //echo '<pre>'; print_r($row); exit;?>
					<tr>
					  <td><?php echo $row['Emp_ID']; ?></td>
					  <td><?php echo $row['First_Name']; ?></td>
					  <td><?php echo $row['Email']; ?></td>
					  <td><?php echo $row['Position_Name']; ?></td>
					  <?php /*<td><?php if($row['Position'] == 1)
					  {
					   echo "Project Manager";
					  }elseif($row['Position'] == 2)
					  {
					   echo "Team Manager";
					  }elseif($row['Position'] == 3)
					  {
					   echo "Superviser Manager";
					  }elseif($row['Position'] == 4)
					  {
					   echo "Team Leader Manager";
					  }elseif($row['Position'] == 5)
					  {
					   echo "Senior PHP Devloper";
					  }elseif($row['Position'] == 6)
					  {
					   echo "PHP Devloper";
					  }elseif($row['Position'] == 7)
					  {
					   echo "Marketing Manager";
					  }else{echo "";}
					  
					  
					  ?></td> */?>
					  <td><?php 
					  if($row['Joining_Date']!="0000-00-00"){
						  $dt2 =  date_create($row['Joining_Date']);
						  $DOB =  date_format($dt2,'m/d/Y');  
						  echo $DOB; 
						   }
					  
					  
					  ?></td>
					  <td><?php $status = $row['Emp_Active_Status']; 
					       if($status == 1)
						   {
						     $status = 'Active';
						   }else{
						     $status = 'In-Active';
						   }
						   echo $status;
					  ?></td>
					  <td><a href="<?php echo base_url();?>index.php/Employee/emp_detail/<?php echo $row['Emp_ID']; ?>"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> Detail</button></a></td>
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
		$(".search_box .clear").on("click", function(){
				$(this).parents("th").find("input, select").val("").trigger("change");
			});
        var handleDataTableButtons = function() {
          if ($("#datatable_emp_list").length) {
			var table = $('#datatable_emp_list').DataTable({	
			//	"columnDefs": [
			//		{ "visible": true, "targets": 3 }
			//	],
			//	"order": [[ 3, 'asc' ]],
			//	"displayLength": 25,
			//	"drawCallback": function ( settings ) {
			//		var api = this.api();
			//		var rows = api.rows( {page:'current'} ).nodes();
			//		var last=null;
		    //
			//		api.column(3, {page:'current'} ).data().each( function ( group, i ) {
			//			if ( last !== group ) {
			//				$(rows).eq( i ).before(
			//					'<tr class="group"><td colspan="6">'+group+'</td></tr>'
			//				);
		    //
			//				last = group;
			//			}
			//		} );
			//	},
				keys: false,
				dom: "lBfrtip",
				
				"order": [[ 0, "desc" ]],
				"bStateSave": true,
				responsive: true,
				"aoColumnDefs": [
				 { "bSortable": false, "aTargets": [ -1 ] }
				],
				buttons: [ 
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
					} 
			 	]
			});
			
			table.columns().every(function(){
				var that = this;
				var col = this.header();
				if($(col).attr("data-target")){
					col_id = $(col).data("target");
					
					if($(col_id).data("type") == "date"){
						
						var t_col_id = col_id;
						$(col_id+" input#from, "+col_id+" input#to").on("keyup change click", function(){
							
							var min = $("input#from").val();
							var max = $("input#to").val();
							
							if(min == "" || max == ""){
								table.draw();
							}else{
								filterByDate();
								table.draw();
							}
						});
						var normalizeDate = function(dateString) {
							var date = new Date(dateString);
							var normalized = date.getFullYear() + '' + (("0" + (date.getMonth() + 1)).slice(-2)) + '' + ("0" + date.getDate()).slice(-2);
							return normalized;
						}
						function filterByDate(){
							$.fn.dataTable.ext.search.push(
								function( oSettings, aData, iDataIndex ) {
									var min = $("input#from").val();
									var max = $("input#to").val();
									
									if ( min === '' && max === '' ){
										return true;
									} else {
										var rowDate = normalizeDate(aData[4]),
										start = normalizeDate(min),
										end = normalizeDate(max);
										if (isNaN(start)) a = "";
										if (isNaN(end)) a = "";
										
										// If our date from the row is between the start and end
										if (start <= rowDate && rowDate <= end) {
											return true;
										} else if (rowDate >= start && end === '' && start !== ''){
											return true;
										} else if (rowDate <= end && start === '' && end !== ''){
											return true;
										} else {
											return false;
										}
									
									}
								}
							);
						}
				
					}
				}
				
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
	 
	
	/* $(document).ready(function(){
		var datepickerDefaults = {
			showTodayButton: true,
			showClear: true
		};
		
		$('#datatable_emp_list').dataTable().yadcf([
			 <!--{column_number : 0}, -->
		   <!-- {column_number : 1,  filter_type: "range_number_slider", filter_container_id: "external_filter_container"}, -->
			{column_number : 3, data: ["Team Manager", "Project Manager", "Superviser Manager", "Team Leader Manager", "Senior PHP Devloper", "PHP Devloper","Marketing Manager"]},
		  <!--  {column_number: 3,filter_type: "range_date",filter_container_id: "external_filter_container",filter_plugin_options: datepickerDefaults}, -->
			
		   <!-- {column_number : 4, column_data_type: "html", html_data_type: "text", filter_default_label: "Select tag"}  -->
		]);
	}); */
    </script>
	
	<script>
	/* $(document).ready(function() { */
	
	/* 	$( "#from" ).daterangepicker({
			singleDatePicker: true
		}).val('');
		$( "#to" ).daterangepicker({
			singleDatePicker: true
		}).val(''); */
	
	
		/* var table = $('#datatable_emp_list').DataTable({});
		table.columns().every(function(){
		
		var that = this;
			var col = this.header();
			
		if($(col).attr("data-target"))		
		{ 
		
		col_id = $(col).data("target");
		  
			if(col_id == "#cs_date" ){  //Condition for filter of Date
			
				var t_col_id = col_id;
				
				$(" input#from,input#to").on("keyup change click", function(){
					var min = $("input#from").val();
					var max = $("input#to").val();
					
					if(min == "" || max == ""){
						table.draw();
					}else{
						filterByDate();
						table.draw();
					}
				});
				var normalizeDate = function(dateString) {
					var date = new Date(dateString);
					
					var normalized = date.getFullYear() + '' + (("0" + (date.getMonth() + 1)).slice(-2)) + '' + ("0" + date.getDate()).slice(-2);
					
					return normalized;
				}
				function filterByDate(){
					$.fn.dataTable.ext.search.push(
						function( oSettings, aData, iDataIndex ) {
							var min = $("#from").val();
							var max = $("#to").val();
							 
							var rowDate = normalizeDate(aData[4]), // Here "4" the number of column
						
							start = normalizeDate(min),
							end = normalizeDate(max);
							alert(end);
							
							
							// If our date from the row is between the start and end
							if (start <= rowDate && rowDate <= end) {
								return true;
							} else if (rowDate >= start && end === '' && start !== ''){
								return true;
								
							} else if (rowDate <= end && start === '' && end !== ''){
								return true;
							} else {
								return false;
							}
						}
					);
				}
			
			}
		}	
			
		});
	
	}); */
</script>
	
    <!-- /Datatables -->