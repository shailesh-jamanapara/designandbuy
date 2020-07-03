<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * 
 * list_view (Listing)
 */
?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h2>Timesheet Module</h2>
            </div>		  
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>List of Timesheet</h2>
                        <a  style="float: right;" href="<?php echo base_url(); ?>index.php/time_attendance/add_timesheet"><button type="button" class="btn btn-primary">  Add Timesheet</button></a>
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
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Position</th>
                                    <th>Employee In-Time</th>
                                    <th>Employee Out-Time</th>
                                    <th>Employee Total Hours</th>
                                    <th>Status</th>
                                    <th>Created_Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            
                            <tbody>
                                <?php
                                foreach ($timesheet_list as $row) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['First_Name']; ?></td>
                                        <td><?php echo $row['Last_Name']; ?></td>
                                        <td><?php echo $row['Position_Name']; ?></td>
                                        <td><?php echo $row['Emp_In_time']; ?></td>
                                        <td><?php echo $row['Emp_Out_time']; ?></td>
                                        <td><?php echo $row['Emp_Total_Hours']; ?></td>
                                        <td><?php
                                            $status = $row['Status'];
                                            if ($status == 1) {
                                                $status = 'Active';
                                            } else {
                                                $status = 'In-Active';
                                            }
                                            echo $status;
                                            ?></td>
                                        <td><?php echo $row['Created_Date']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>index.php/time_attendance/timesheet_detail/<?php echo $row['Tim_ID']; ?>"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> Detail</button></a>
                                            <a href="<?php echo base_url(); ?>index.php/time_attendance/edit_timesheet/<?php echo $row['Tim_ID']; ?>"><button type="button" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></button></a>  
                                            <a href="javascript:;" onclick="return deleteconfirmbox('<?php echo $row['Tim_ID']; ?>');"><i class="glyphicon glyphicon-remove"></i></a>
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
</div>
<!-- /page content -->

<!-- Datatables -->
<script src="<?php echo vendor_url(); ?>datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo vendor_url(); ?>datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo vendor_url(); ?>datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo vendor_url(); ?>datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo vendor_url(); ?>datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo vendor_url(); ?>datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo vendor_url(); ?>datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo vendor_url(); ?>datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo vendor_url(); ?>datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo vendor_url(); ?>datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo vendor_url(); ?>datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?php echo vendor_url(); ?>datatables.net-scroller/js/datatables.scroller.min.js"></script>
<script src="<?php echo vendor_url(); ?>jszip/dist/jszip.min.js"></script>
<script src="<?php echo vendor_url(); ?>pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo vendor_url(); ?>pdfmake/build/vfs_fonts.js"></script>

<!-- Datatables -->
<script>
                                            $(document).ready(function () {
                                                var handleDataTableButtons = function () {
                                                    if ($("#datatable").length) {
                                                        $('#datatable').dataTable({
                                                            keys: false,
                                                            dom: "lfrtip",
                                                            "bStateSave": true,
                                                            "aoColumnDefs": [
                                                                {"bSortable": false, "aTargets": [-1]}
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

                                                TableManageButtons = function () {
                                                    "use strict";
                                                    return {
                                                        init: function () {
                                                            handleDataTableButtons();
                                                        }
                                                    };
                                                }();

                                                TableManageButtons.init();
                                            });

                                            function deleteconfirmbox(tim_id) {
                                                //alert(event_id);return false;
                                                if (confirm("Are you sure want to delete this employee timesheet entry ?")) {
                                                    var action = '<?php echo base_url(); ?>index.php/time_attendance/delete_emp_timesheet/' + tim_id;
                                                    window.location.href = action;
                                                    return true;
                                                }
                                                return false;
                                            }
</script>
<!-- /Datatables -->