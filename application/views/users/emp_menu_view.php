<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * 12-20-2016
 * edit_detail page(view/employee)
 */
$if_new = (isset($model['entity']) && $model['entity'] == 'new' ) ? "display:none;" :  "display:block;"; 
?>


<!-- page content -->
<div class="right_col" role="main">
    <div class="container">
        <!-- <div class="page-title">
            <div class="title_left">
                <!--<h2>BimSym eBusiness Solutions</h2>-->
             <!--    <h2 class="Emp_Title"><i class="icon-user"></i> <?php
                  //  if (!empty($Emp_Title)) {
                  //      echo $Emp_Title;
                  //  }
                    ?></h2>
            </div>

        </div> -->
		<!-- 
       		<ul  class="nav nav-pills">
				<li  id="li_1" class="<?php if($row['last_tab'] == 'section_1' ) echo 'active' ;?>" ><a id="a1" data-toggle="tab" href="#section_1" onclick="javascript:$('#last_tab').val('section_1')">Employee Detail</a></li>
				
				<li style="<?php echo $if_new; ?>" id="li_2" class="<?php if($row['last_tab'] == 'section_2' ) echo 'active' ;?>" onclick="javascript:enable_section('2');"><a id="a2" data-toggle="tab" href="#section_2" >Official Detail</a></li>
				
				<li style="<?php echo $if_new; ?>" id="li_3" class="<?php if($row['last_tab'] == 'section_3' ) echo 'active' ;?>" onclick="javascript:enable_section('3');"><a id="a3" data-toggle="tab" href="#section_3" >Address & Contact Detail</a></li>
				
				<li style="<?php echo $if_new; ?>" id="li_4" class="<?php if($row['last_tab'] == 'section_4' ) echo 'active' ;?>" onclick="javascript:enable_section('4');"><a id="a4" data-toggle="tab" href="#section_4" >References Detail</a></li>
			</ul>
		-->