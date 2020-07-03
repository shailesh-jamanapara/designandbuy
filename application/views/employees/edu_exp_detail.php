<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * 
 * edu_exp_detail page(view/employee)
 */

//echo '<pre>'; print_r($result_edu_get);
//echo '<pre>'; print_r($result_exp_get); exit;
?>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">

        <div class="x_content">
            <head>
                <style type="text/css">
                    /* Some custom styles to beautify this example */
                    .demo-content{
                        padding: 15px 15px 15px 15px;
                        font-size: 12px;
                        min-height: 50px;
                        border: solid 1px #ccc;
                        margin-bottom: 0px;
                    }
                    .demo-content1{
                        padding: 15px 15px 15px 15px;
                        font-size: 12px;
                        min-height: 140px;
                        border: solid 1px #ccc;
                        margin-bottom: 0px;
                    }
                    .demo-content.bg-alt{
                        background: #abb1b8;
                    }
                </style>
            </head>



            <div class="controls_edu">
                <div class="pull-right">
                    <a href="<?php echo base_url() ?>index.php/Employee_insert/emp_edu_exp_edit/<?php echo $Emp_ID; ?>"><button id="send" type="submit" class="btn btn-success">Edit Education & Employee</button></a>
                    <a href="<?php echo base_url() ?>index.php/Employee/add_emp_list"><button type="button" class="btn btn-danger">Cancel</button></a>
                </div>
                <span class="section">EDUCATION DETAIL</span>

                <style>
                    table {
                        font-family: arial, sans-serif;
                        border-collapse: collapse;
                        width: 100%;
                    }

                    td, th {
                        border: 1px solid #dddddd;
                        text-align: left;
                        padding: 8px;
                    }
                    /*tr:nth-child(even) {
                        background-color: #dddddd;
                    }*/
                </style>
                <table>
                    <?php
                    //$result_edu_get = 0;
                    if (isset($result_edu_get) && !empty($result_edu_get)) {
                        $count = count($result_edu_get);
                        ?>
                        <tr>
                            <th style="text-align:right;">No.</th>
                            <th>DEGREE</th>
                            <th>PERCENTAGE</th>
                            <th>PASSING YEAR</th>
                            <th>UNIVERSITY</th>
                        </tr>
                        <?php
                        $i = 1;
                        foreach ($result_edu_get as $edu_get) {
                            ?>

                            <tr>
                                <td style="text-align:right;"><?= $i ?></td>
                                <td><?php
                                    if (isset($edu_get['Degree_Name'])) {
                                        echo $edu_get['Degree_Name'];
                                    }
                                    ?></td>
                                <td><?php
                                    if (isset($edu_get['Percentage'])) {
                                        echo $edu_get['Percentage'] . '%';
                                    }
                                    ?>	</td>
                                <td><?php
                                    if (isset($edu_get['Passing_Year'])) {
                                        echo $edu_get['Passing_Year'];
                                    }
                                    ?></td>
                                <td> <?php
                                    if (isset($edu_get['University'])) {
                                        echo $edu_get['University'];
                                    }
                                    ?></td>
                            </tr>
                            <?php
                            $i++;
                        }
                    } else {
                        echo '<tr><td colspan="5"><h4><b>Educational details not found</b></h4></td></tr>';
                    }
                    ?>
                </table>

            </div>

            <div class="controls">

                <!--  ****************************  Experience detail  *************************  -->		
                <fieldset style="margin-top:40px;" class="append_section">

                    <span class="section">EXPERIENCE DETAIL</span>

                    <?php if (isset($result_exp_get) && !empty($result_exp_get)) { ?>

                        <?php
                        if (isset($result_exp_get[0]['Skill'])) {
                            echo '<label class="" for="">EXPERIANCE SKILLS:</label>&nbsp;&nbsp;' . $result_exp_get[0]['Skill'];
                        }
                        ?>
                        <div class="clearfix">&nbsp;</div>
                        <?php
                        $j = 1;
                        $count_exp = count($result_exp_get);
                        foreach ($result_exp_get as $exp_get) {
                            $emp_cnt = "";

                            if ($count_exp > 1) {
                                $emp_cnt = $j;
                            }
                            ?>
                            <table>
                                <caption><b>PREVIOUS EMPLOYER<?=' '.$j?>: <?php
                                        if (isset($exp_get['Company_Name'])) {
                                            echo $exp_get['Company_Name'];
                                        }
                                        ?></b></caption>
                                <tr>
                                    <th>START DATE</th>
                                    <th>END DATE</th>
                                    <th>START AS POSITION</th>
                                    <th>END AS POSITION</th>
                                    <th>START SALARY</th>
                                    <th>END SALARY</th>
                                    <th>TOTAL MONTH</th>
                                </tr>
                                <tr>
                                    <td><?php
                                        if (isset($exp_get['Start_Date'])) {
                                            echo $exp_get['Start_Date'];
                                        }
                                        ?></td>
                                    <td> <?php
                                        if (isset($exp_get['End_Date'])) {
                                            echo $exp_get['End_Date'];
                                        }
                                        ?></td>
                                    <td> <?php
                                        if (isset($exp_get['Start_Position'])) {
                                            echo $exp_get['Start_Position'];
                                        }
                                        ?>
                                    </td>
                                    <td> <?php
                                        if (isset($exp_get['End_Position'])) {
                                            echo $exp_get['End_Position'];
                                        }
                                        ?></td>
                                    <td>
                                        <?php
                                        if (isset($exp_get['Start_Salary'])) {
                                            echo $exp_get['Start_Salary'] . '<span class="fa fa-inr" aria-hidden="true"></span>';
                                        }
                                        ?>
                                    </td>
                                    <td>  <?php
                                        if (isset($exp_get['End_Salary'])) {
                                            echo $exp_get['End_Salary'] . '<span class="fa fa-inr" aria-hidden="true"></span>';
                                        }
                                        ?></td>
                                    <td><?php
                                        if (isset($exp_get['Months'])) {
                                            echo $exp_get['Months'] . ' Months';
                                        }
                                        ?></td>
                                </tr>
                                <tr>
                                    <td colspan="8"><b>REASON FOR LEAVING:</b> <?php
                                            if (isset($exp_get['Leaving_Reason']) && !empty($exp_get['Leaving_Reason'])) {
                                                echo $exp_get['Leaving_Reason'];
                                            }
                                            ?></b></td>
                                </tr>
                            </table>
                            <div class="clearfix">&nbsp;</div>

                            <?php
                            $j++;
                        }
                    } else {
                        echo 'experience data not available';
                    }
                    ?>

                    <div class="clearfix">&nbsp;</div>
                </fieldset>  
            </div>
        </div>
    </div>
</div>			  
</div>
</div>
</div>
<!-- /page content -->


