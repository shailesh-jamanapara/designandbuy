<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<form class="form-horizontal" name="frmboard" id="frmboard" method="post" action="" >	
<input type="hidden" name="call_action" id="call_action" value="" />
	<div class="right_col" role="main">
	<?php if( $mode == 'self' ){ ?>
		<div class="row">
			<div class="col-lg-10 col-lg-offset-2" id="employee_heading">
				<div class="x_panel">
					<a class="pull-right" href="javascript:void(0);" onclick="javascript:editrecord('<?php echo base64_encode(0) ; ?>','<?= $edit_url ?>');"  ><button type="button" class="btn btn-primary">  Apply For New Leave</button></a>
						<div class="clearfix"></div>
				</div>
			</div>
		</div>
	<?php } ?>
		<div class="">
		  <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                <div class="tile-stats">
                  <div class="icon " ><i class="fa fa-caret-square-o-right "></i></div>
                  <div class="count icon-link">02</div>
                  <h3>New Employees</h3>
                  <p>Technical Team | Support Team</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-file-word-o"></i></div>
                  <div class="count">05</div>
                  <h3>New Resumes</h3>
                  <p>PHP | CI | HR Admin </p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-graduation-cap"></i></div>
                  <div class="count">08</div>
                  <h3>New Trainings</h3>
                  <p>Technical Team | Support Team</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12" onclick="javascript:gotolist('<?php echo base_url().'index.php/Leave_Applications/';?>','pending_leaves');">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count <?php if(count($leaves) > 0) { ?>icon-link <?php } ?>"><?php echo count($leaves); ?> </div>
                  <h3>Leave Applications</h3>
                  <p>This Week | Upcoming Week </p>
                </div>
              </div>
            </div>

          <div class="row">
            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
				    <h2>Weekly Performance Summary <small>Weekly progress</small></h2>
                    <div class="clearfix"></div>
                  </div>
				  <div class="title_right">
               <!--  <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div> -->
              </div>
				 <div class="col-lg-4 "><h5>From <?php echo $start_day; ?> to <?php echo $end_day; ?></h4> </div>
                  <div class="x_content" style="min-height:524px">
					<?php if(isset($skill_percent)){ ?> 
					
					<div class="col-lg-12 x_panel">
						<div class="clearfix"></div>
					</div>
					<div class="col-lg-12 x_panel">
						<div class="col-lg-6 col-sm-12 col-xs-12">
							<div class="col-lg-12">
								<iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
								<canvas id="canvas1" height="380" width="1024"  style="margin: 15px 10px 10px 0px; height:380px; width:1024px"></canvas>
							</div>
						</div>
					</div>
					<?php } ?>
                  </div>
                </div>
              </div>
            </div>
		</div>
	</div>
</form>
<!-- /page content -->
<script>
function gotolist(url, cta)
{
	var form_action_url  = url;
	$('form#frmboard').find('#call_action').val(cta);
	$('#frmboard').attr('action', form_action_url).submit();
}
function conf_delete(id){
	if(confirm("Are you sure to delete this Record ? ")){
		if(id){
			var form_data = new FormData();
			form_data.append('id', id);
			form_data.append('task', 'delete_record');
			form_data.append('entity', '<?php echo strtolower($items); ?>');
			var url = '<?php echo $ajax_url_delete_item; ?>';
			$.ajax({
				url:url,
				data:form_data,
				dataType: 'text',  // what to expect back from the PHP script, if anything
				cache: false,
				contentType: false,
				processData: false,
				type:"post",
				success:function(response){
					var resp = response.replace(/(\r\n\t|\n|\r\t)/gm, "");
					if(resp == 'success'){
						$("tr#tr_"+id).remove();
					}
				}
			});
			$.post(url, form_data, function(result) {
				console.log(result);
			});
		}
	}
}
$(document).ready(function() {
	$('#frmsearch').bootstrapValidator();
});
 $(document).ready(function(){
        var options = {
          legend: false,
          responsive: false
        };
<?php if(isset($skill_percent)){ ?> 
new Chart(document.getElementById("canvas1"), {
  type: 'bar',
  tooltipFillColor: "rgba(51, 51, 51, 0.55)",
  data: {
	labels: [<?php echo $skill_lbl;?>],
	datasets: [{
	  data: [<?php echo $skill_count;?>],
	  backgroundColor: [<?php echo $skill_clr;?> ],
	  hoverBackgroundColor: [<?php echo $skill_clr_hover;?>]
	}]
  },
  options: options
});
<?php } ?>
});
 </script>
 <script src="<?php echo vendor_url(); ?>/_Chart.js/dist/Chart.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>