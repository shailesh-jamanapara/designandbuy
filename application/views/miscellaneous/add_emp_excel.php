<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
/*
* 12-20-2016
* add_detail page(view/employee)
*/
?>
 <style type="text/css">
.error1{
	color:red;
	margin:10px;
	border: 0.5px solid red;
   text-align: center;
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
                 
                  <div class="x_content"> 
 <form  action="http://localhost/uploadExcel.php" method="POST" 
           enctype="multipart/form-data">

  <input type="file"  name="file" >
 
 <input type= "submit" value ="Upload" >
 
</form>

				  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
	
	