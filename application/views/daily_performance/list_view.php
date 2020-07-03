<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
/*
* 05-05-2016
* daily_performance/list_view page(view)
*/
?>

<style>
	tr td:last-child { text-align:center; }
	a.clear.clear_date { margin-top: 22px; }
	@media (max-width: 500px) {
		a.clear.clear_date { margin-top: 28px; }
	}
</style>

<!-- page content -->
	<div class="right_col" role="main">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>List of Daily Performances</h2>
						<a style="" href="<?php echo base_url();?>index.php/Daily_performance/add_report"><button type="button" class="btn btn-primary">  Add Today's Report</button></a>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<? /*<p class="text-muted font-13 m-b-30"><a class="btn btn-default buttons-html5 btn-sm " align="left" tabindex="0" aria-controls="datatable_emp_list" href="<?php echo base_url(); ?>index.php/Employee_csv"><span>Import CSV For Employee</span></a></p> */?>
						<div id="external_filter_container">
						</div>
						
						<table id="datatable_emp_list" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>EMPLOYEE NAME</th>
									<th>REPORT DATE</th>
									<th>REVIEW BY</th>
									<th>SIGN DATE</th>
									<th>STATUS</th>
									<th style="max-width:60px;">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($employe_list as $row) { //echo '<pre>'; print_r($row); exit;?>
								<tr>
									<td><?php echo $row['First_Name']; ?></td>
									<td><?php echo $row['Emp_ID']; ?></td>
									<td><?php echo $row['Position_Name']; ?></td>
									<td><?php if($row['Joining_Date']!="0000-00-00"){
										$dt2 =  date_create($row['Joining_Date']);
										$DOB =  date_format($dt2,'m/d/Y');  
										echo $DOB; 
										} ?>
									</td>
									<td><?php $status = $row['Emp_Active_Status']; 
										if($status == 1){ $status = 'Active'; }else{ $status = 'In-Active'; }
										echo $status;?>
									</td>
									<td><a href="<?php echo base_url();?>index.php/Employee/emp_detail/<?php echo $row['Emp_ID']; ?>"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> Detail</button></a>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
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
			var table = $('#datatable_emp_list').DataTable({	
			
				keys: false,
				dom: "lBfrtip",
				
				"order": [[ 0, "desc" ]],
				"bStateSave": true,
				responsive: true,
				"aoColumnDefs": [
				 { "bSortable": false, "aTargets": [ -1 ] }
				],
				buttons: [ 
					
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
    </script>
    <!-- /Datatables -->