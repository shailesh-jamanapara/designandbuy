<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
                        <h2>List of Employee Leave</h2>

                        <?php if ($Role == 'Employee') { ?>
                            <a style="float:right;" href="<?php echo base_url(); ?>index.php/Leave/leave_detail"><button type="button" class="btn btn-primary">Add New Leave</button></a>
                        <?php } ?>

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
                                    <!--<th>Last Name</th> -->
                                    <th>Leave Start Date</th>
                                    <th>Leave End Date</th>
                                    <th>Employee Leave Status</th>
                                    <th>Reason for Leave</th>
                                    <th>Created Date</th>
                                    <th style="max-width:100px;">Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php
                                if (isset($leave_Detail) && !empty($leave_Detail)) {
                                    foreach ($leave_Detail as $lev_detail) {
                                        ?>
                                        <tr>
                                            <td><?= $lev_detail['First_Name']; ?></td>
                                            <!-- <td><?= $lev_detail['Last_Name']; ?></td> -->
                                            <td><?= $lev_detail['Emp_Start_Date_Leave']; ?></td>
                                            <td><?= $lev_detail['Emp_End_Date_Leave']; ?></td>
                                            <td><?php
                                                if ($lev_detail['Emp_Leave_Status'] == 0) {
                                                    $Emp_Leave_Status = "PENDING";
                                                } else if ($lev_detail['Emp_Leave_Status'] == 1) {
                                                    $Emp_Leave_Status = "APPROVED";
                                                } else if ($lev_detail['Emp_Leave_Status'] == 2) {
                                                    $Emp_Leave_Status = "NOTAPPROVED";
                                                }

                                                echo $Emp_Leave_Status;
                                                ?></td>
                                            <td><?= $lev_detail['Emp_Reason_For_Leave']; ?></td>
                                            <td><?= $lev_detail['Created_Date']; ?></td>
                                            <td>
                                                <a href="<?php echo base_url(); ?>index.php/Leave/leave_view_detail/<?php echo $lev_detail['Lev_ID']; ?>"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i> Detail</button></a>
                                                <?php if (in_array($Role, array('Admin', 'Project Manager'))) { ?>
                                                    <a href="<?php echo base_url(); ?>index.php/Leave/edit_leave/<?php echo $lev_detail['Lev_ID']; ?>"><button type="button" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></button></a>
                                                        <?php } ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
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
            if ($("#datatable_emp_list").length) {
                $('#datatable_emp_list').dataTable({
                    keys: false,
                    dom: "lfrtip",
                    "bStateSave": true,
                    "aoColumnDefs": [
                        {"bSortable": false, "aTargets": [-1]},
                        {
                            "targets": [3],
                            "visible": false
                        }
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
</script>
<!-- /Datatables -->