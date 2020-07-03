<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<form class="form-horizontal" name="frmsearch" id="frmsearch" method="post" action="" >	
	<div class="right_col" role="main">
		<div class="row">
			
			<div class="clearfix"></div>
		</div>
		<div class="row">
			<div class="col-lg-12"></div>
			<?php if($my_leaves_access ==  true){ ?>
			<div class="col-lg-4">
				<div class="x_panel dashboards_blocks">
					<div class="x_title">
						<h2>My Up-coming Trainings  </h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link pull-right"><i class="fa fa-chevron-up"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					
					  <?php if( count($up_coming) > 0) : ?>
					   <div class="x_content noborder">
						<?php foreach($up_coming as $training): ?>
							<article class="media event">
								  <a class="pull-left date ">
									<p class="month text-primary"><?php echo date('M', strtotime($training['training_date']) ); ?></p>
									<p class="day text-primary"><?php echo date('d', strtotime($training['training_date']) ); ?></p>
								  </a>
								  <div class="media-body">
									<a class="title" href="#"><?php echo $training['training_topic_name']. " <small>[". $training['topic_code']."]</small>"; ?></a>
									<p>Title : <?php echo $training['training_name']; ?></p>
									<p>Mentor : <?php echo ucwords(strtolower($training['mentor_name'])); ?></p>
									<p>Time : <?php echo $training['time_from']; ?> to <?php echo $training['time_to']; ?></p>
								  </div>
							</article>
						<?php endforeach ?>
						 </div>
						<?php endif; ?>	
						 <?php if(empty($up_coming)): ?>
						 <div class="x_content noborder text-center">
							No record found 
						  </div>
						<?php endif; ?>	
					 
				</div>
			</div>
			<?php } ?>
			<?php if($my_expenses_access ==  true){ ?>
			<div class="col-lg-4">
				<div class="x_panel dashboards_blocks">
					<div class="x_title">
						<h2>My Earnings & Benefits </h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link pull-right"><i class="fa fa-chevron-up"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					
					  <?php if(!empty($earnings)):?>
					  <?php $total=0;?>
						<div class="x_content " id="employee_earning">	
						<div class="item form-group col-lg-10  col-md-1 col-sm-3 col-xs-12">
							<label class="control-label col-lg-2 col-md-0 col-sm-0 col-xs-0 label-title-upper">Year</label>
							<div class="col-lg-3 col-md-1 col-sm-3 col-xs-12 form-group">
								<select class="form-control" name="year" id="year">
									<?php for( $y=2019; $y>=2010; $y--){ ?>
									<option value="<?php echo $y; ?>"><?php echo $y; ?> </option>
									<?php }?>
								</select>
							</div>
							<label class="control-label col-lg-2 col-md-0 col-sm-0 col-xs-0 label-title-upper">Month</label>
							<div class="col-lg-3 col-md-1 col-sm-3 col-xs-12 form-group">
								<select class="form-control" name="month" id="month">
									<option value="1">Jan </option>
									<option value="2">Feb </option>
									<option value="3">Mar </option>
									<option value="4">April </option>
									<option value="5">May </option>
									<option value="6">June </option>
									<option value="7">July </option>
									<option value="8">Aug </option>
									<option value="9">Sept </option>
									<option value="10">Oct </option>
									<option value="11">Nov </option>
									<option value="12">Dec </option>
								</select>
							</div>
						</div>						
					<?php $i=1; ?>
						<?php foreach($earnings as $earning):?>
							<div class="media-body col-lg-12">
								<div class="col-lg-8">
									<?php echo implode(' ', $row_expenses[$earning['expense_id']]); ?>
								</div>
								<div class="col-lg-4">
									INR. <?php echo $earning['expense_value']; ?>
								</div>
							</div>
							</article>
							<?php $i++; ?>
							<?php $total= $total+$earning['expense_value']; ?>
						<?php endforeach; ?>
						<div class="col-lg-12 earnings">
							<p class="pull-right"> Total :  INR <?php echo $total; ?></p>
						</div>
						 </div>
						<?php endif; ?>
						 <?php if(empty($earnings)): ?>
						 <div class="x_content noborder text-center">
							No record found 
						  </div>
						<?php endif; ?>	
				</div>
			</div>
			<?php } ?>
			<?php if($my_leaves_access ==  true){ ?>
			<div class="col-lg-4">
				<div class="x_panel dashboards_blocks">
					<div class="x_title">
						<h2 class="pull-left collapse-link">My Leave Applications</h2>
						
						<span class="pull-right collapse-link"><i class="fa fa-chevron-up"></i> </span>
						<span class="pull-right btn btn-info " onclick="javascript:editrecord('<?php echo base64_encode(0) ; ?>','<?= $edit_url ?>');"  >Apply New Leave</span>
						
						<div class="clearfix"></div>
					</div>
					
					  <?php if( count($leaves) > 0) : ?>
					   <div class="x_content noborder">
						<?php foreach($leaves as $leave): ?>
							<article class="media event leave">
								<p title="Edit leave application" class="leave_date_heading "><i class="fa fa-calendar"></i> From <?php echo date('d M, Y', strtotime($leave['leave_from']) ); ?> To <?php echo date('d M, Y', strtotime($leave['leave_to']) ); ?> <?php echo $leave['short_code']; ?><?php if($leave['status'] == 0){ ?><i class="fa fa-edit pull-right"  onclick="javascript:editrecord('<?php echo base64_encode($leave['id']) ; ?>','<?= $edit_url ?>');" ></i> <?php } ?> </p>
								<p> <i class="fa fa-calendar"></i> Applied on  <?php echo date('d M, Y', strtotime($leave['applied_on']) ); ?> <?php echo $leave['leave_type_name']; ?></p>
								<?php if(isset($leave['leave_reason'])) { ?>
									<p>Reason :  <?php echo $leave['leave_reason']; ?></p>
								<?php } ?>
							</article>
						<?php endforeach ?>
						  </div>
						<?php endif; ?>	
						 <?php if(empty($leaves)): ?>
						 <div class="x_content noborder text-center">
							No record found 
						  </div>
						<?php endif; ?>	
				</div>
			</div>
		</div>
		<!-- 
		<div class="row">
			<?php } ?>
			<?php if($my_expenses_access ==  true){ ?>
			<div class="col-lg-4">
				<div class="x_panel dashboards_blocks">
					<div class="x_title">
						<h2>My Suggestions & Feedbacks</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link pull-right"><i class="fa fa-chevron-up"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					
					  <?php if(!empty($earnings)):?>
						<div class="x_content " id="employee_earning">					
					<?php $i=1; ?>
						<?php foreach($earnings as $earning):?>
							<div class="media-body">
								<div class="col-lg-8">
									<a class="title" href="#"><?php echo $i; ?> <?php echo implode(' ', $row_expenses[$earning['expense_id']]); ?></p>
								</div>
								<div class="col-lg-4">
									<a class="title" href="#" class="pull-right">INR. <?php echo $earning['expense_value']; ?>
								</div>
							</div>
							</article>
							<?php $i++; ?>
						<?php endforeach; ?>
						 </div>
						<?php endif; ?>
						 <?php if(empty($earnings)): ?>
						 <div class="x_content noborder text-center">
							No record found 
						  </div>
						<?php endif; ?>	
				</div>
			</div>
			<?php } ?>
			<?php if($my_expenses_access ==  true){ ?>
			<div class="col-lg-4">
				<div class="x_panel dashboards_blocks">
					<div class="x_title">
						<h2>My Presents</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link pull-right"><i class="fa fa-chevron-up"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					
					  <?php if(!empty($earnings)):?>
						<div class="x_content " id="employee_earning">					
					<?php $i=1; ?>
						<?php foreach($earnings as $earning):?>
							<div class="media-body">
								<div class="col-lg-8">
									<a class="title" href="#"><?php echo $i; ?> <?php echo implode(' ', $row_expenses[$earning['expense_id']]); ?></p>
								</div>
								<div class="col-lg-4">
									<a class="title" href="#" class="pull-right">INR. <?php echo $earning['expense_value']; ?>
								</div>
							</div>
							</article>
							<?php $i++; ?>
						<?php endforeach; ?>
						 </div>
						<?php endif; ?>
						 <?php if(empty($earnings)): ?>
						 <div class="x_content noborder text-center">
							No record found 
						  </div>
						<?php endif; ?>	
				</div>
			</div>
			<?php } ?>
			<?php if($my_expenses_access ==  true){ ?>
			<div class="col-lg-4">
				<div class="x_panel dashboards_blocks">
					<div class="x_title">
						<h2>My Tools</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link pull-right"><i class="fa fa-chevron-up"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					
					  <?php if(!empty($earnings)):?>
						<div class="x_content " id="employee_earning">					
					<?php $i=1; ?>
						<?php foreach($earnings as $earning):?>
							<div class="media-body">
								<div class="col-lg-8">
									<a class="title" href="#"><?php echo $i; ?> <?php echo implode(' ', $row_expenses[$earning['expense_id']]); ?></p>
								</div>
								<div class="col-lg-4">
									<a class="title" href="#" class="pull-right">INR. <?php echo $earning['expense_value']; ?>
								</div>
							</div>
							</article>
							<?php $i++; ?>
						<?php endforeach; ?>
						 </div>
						<?php endif; ?>
						 <?php if(empty($earnings)): ?>
						 <div class="x_content noborder text-center">
							No record found 
						  </div>
						<?php endif; ?>	
				</div>
			</div>
			<?php } ?>
		</div>
		-->
</form>
<!-- /page content -->
<script>
function editrecord(id, url)
{
	if(id){
        var form_action_url  = url;
        $('form#frmlist').find('#id').val(id);
        $('form#frmlist').find('#task').val('add_edit');
        $('form#frmlist').find('#search_by').val($("form#frmsearch").find('#search_by').val());
        $('form#frmlist').find('#search_for').val($("form#frmsearch").find('#search_for').val());
        $('form#frmlist').find('#sort_by').val($("form#frmsearch").find('#sort_by').val());
        $('form#frmlist').find('#order_type').val($("form#frmsearch").find('#order_type').val());
        $('#frmlist').attr('action', form_action_url).submit();
        }
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