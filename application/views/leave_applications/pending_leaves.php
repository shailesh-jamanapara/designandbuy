<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- page content -->
	<div class="right_col" role="main">
	  <div class="">
		<div class="clearfix"></div>       
		<div class="row">
		  <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			  <div class="x_content">
			  <div class="">
				<h2>New leave applications</h2>
			  </div>	
			  <form class="form-horizontal" name="frmleavapp" id="frmleavapp" method="post" action="" >
			 	<?php  if(!empty($rows)) :  $i = ($postdata['page'] > 1) ? (($postdata['page']-1) * $postdata['limit'] ) + 1 : 1; foreach($rows as $row) :  $id = base64_encode($row['id']); ?>
						
						<div class="col-lg-5 " id="leave_<?php echo $row['id']; ?>">
						<div class="profile_details leave_detail">
						<div class="well profile_view">
						  <div class="col-sm-12 profile_data leave_block">
							<h2><?php echo  ucfirst(strtolower($row['first_name'])). " " . ucfirst(strtolower($row['last_name'])); ?> </h2>
							<div class=" col-xs-9">
								<h5><?php echo  $row['position_name']; ?></h5>
							  <ul class="list-unstyled">
								<li><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo $row['username']; ?></li>
								<li><i class="fa fa-suitcase"></i> <?php echo  ucfirst(strtolower($row['department_name']));  ?> - <small><?php echo $row['user_role']; ?></small></li>
								<li><i class="fa fa-calendar"></i> From <?php echo date('d M, Y', strtotime($row['leave_from']) ); ?> To <?php echo date('d M, Y', strtotime($row['leave_to']) ); ?> <?php echo $row['short_code']; ?></li>
								<li>Reason <?php echo $row['leave_reason']; ?> </li>
								<li><i></i> <small>Applied on <?php echo date('M d, Y', strtotime($row['applied_on']) ); ?></small> </li>
							  </ul>
							</div>
							<div class="right col-xs-3 text-center">
							  <!-- <img src="<?php echo base_url(); ?><?php echo $row['avatar']; ?>" alt="" class="img-circle img-responsive"> -->
							   <img src="http://90.0.0.1/www/bimhr/new/Images/BranchUserImage/user2.jpg" alt="" class="img-square img-responsive">
							</div>
						  </div>
						<div class="col-xs-12 bottom text-center">
							<?php
							$next_action = 'sent_to_reporting_head';	
							if($row['status'] == 'sent_to_reporting_manager') { 
								$next_action = 'sent_to_reporting_head';
							?>
							
							<div class="col-xs-6 col-sm-6 emphasis">
							  <a href="javascript:void(0);" class="edit_link pull-left" ><button type="button" class="btn btn-success btn-xs">
								<i class="fa fa-check-square"> </i> Approved 
							  </button> <i><small>BY  <?php echo $row['reporting_head_name']; ?></small></i></a>
							</div>
							<?php } ?>
							
							<div class="col-lg-9 emphasis">
							  <a title="Approve this application" href="javascript:void(0);" class="edit_link pull-right" onclick="javascript:call_to_action('<?php echo  $row['id']; ?>', '<?php echo $row['user_id']; ?>', '<?php echo $row['status']+1; ?>');" ><button type="button" class="btn btn-success btn-xs">
								<i class="fa fa-check-square"> </i> Approve 
							  </button></a>
							   <a title="Reject this application" href="javascript:void(0);" class="edit_link pull-right" onclick="javascript:call_to_action('<?php echo $row['id']; ?>', '<?php echo $row['user_id']; ?>', '3');" ><button type="button" class="btn btn-danger btn-xs">
								<i class="fa fa-close"> </i> Reject 
							  </button></a>
							  <button type="button" class="btn btn-warning btn-xs pull-left" data-toggle="modal" data-target="#view_comment" title="View all comments">
								<i class="fa fa-comments"> </i> View 
							  </button>
							</div>
							<div class="col-lg-3 emphasis">
							 <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#add_comment">
								<i class="fa fa-pencil"> </i> Add Comment 
							  </button>
							</div>
						  </div>
						</div>
						</div>
						</div>
				<?php  $i++; endforeach; endif; ?>	
				</form>
			</div>
		  </div>
		  
		</div>
	  </div>
	</div>
<!-- Modal for Skills   Edit Section -->
<div class="modal" tabindex="-2" role="dialog" id="add_comment">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
			<h4> </h4>
			<fieldset class="well demo-content">
			<legend class="well-legend-popup"> Add Comment</legend>
			<form class="form-label-left" novalidate method="post" name="frm_skills" action="" id="frm_skills" >
			<input type="hidden" name="task" id="task" value="" />
			<input type="hidden" name="id" id="id" value="" />
			<input type="hidden" name="user_role"   value="" />
			<div class="row">
				<div class="">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-16">
						<textarea id="user_comment" class="form-control" rows="12"></textarea>
					</div>
				</div>
			</div>
			
			</div>	
			<div class="modal-footer">
			<div class="item  col-lg-12 col-md-1 col-sm-3 col-xs-12">
			<button type="submit"  name="btn_2" value="Save" class="btn btn-success  pull-right" title="Save & Approve"><i class="fa fa-floppy-o" > </i></button>	
			<button type="button" class="btn btn-danger pull-right" data-dismiss="modal" title="Cancel"><i class="fa fa-times" > </i></button>
			</div>
			</form>		
			</fieldset>	
			</div>	
		</div>	
	</div>	
</div>
<!-- Modal for Skills   Edit Section -->
<div class="modal" tabindex="-2" role="dialog" id="view_comment">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
			<h4> </h4>
			<fieldset class="well demo-content">
			<legend class="well-legend-popup"> Comment Thread</legend>
			<form class="form-label-left" novalidate method="post" name="frm_skills" action="" id="frm_skills" >
			<input type="hidden" name="task" id="task" value="" />
			<input type="hidden" name="id" id="id" value="" />
			<input type="hidden" name="user_role"   value="" />
			<div class="row">
				<div class="">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-16">
					</div>
				</div>
			</div>
			
			</div>	
			<div class="modal-footer">
			<div class="item  col-lg-12 col-md-1 col-sm-3 col-xs-12">
			<button type="submit"  name="btn_2" value="Save" class="btn btn-success  pull-right" title="Save & Approve"><i class="fa fa-floppy-o" > </i></button>	
			<button type="button" class="btn btn-danger pull-right" data-dismiss="modal" title="Cancel"><i class="fa fa-times" > </i></button>
			</div>
			</form>		
			</fieldset>	
			</div>	
		</div>	
	</div>	
</div>				
<!-- /page content -->
<script>
$(document).ready(function(){
	var task = '<?php echo $task; ?>';
	if(task == 'approve_leave'){
            var call_action = '<?php echo $call_action; ?>';
            var application_id = '<?php echo $application_id; ?>';
            var applicant_id = '<?php echo $applicant_id; ?>';
            var next_status = '<?php echo $next_status; ?>';
            call_to_action(application_id, applicant_id, next_status);
	}
});
function call_to_action(id, applicant_id, next_status){
	$('div#leave_'+id).fadeToggle('slow', 'linear');
	var url =  '<?php echo $ajax_url; ?>approveLeave';
	$.ajax({
		url: url,
		data : {application_id: id, applicant_id: applicant_id, next_status: next_status},
		type:'POST',
		success: function(result){
			var obj = $.parseJSON(result);
			var message = '<label class="text-center col-lg-12 text-success"  id="success_msg" for="">'+obj.message+'</label>';
			if($('#success_msg')){
				$('#success_msg').remove();
			}
			if(obj.status == 'success'){
				
				$('div#modal_upload div.row').prepend(message);
				var html = update_documents(result);
				if(html != ''){
					$('ul.ul_documents_list').append(html);
				}
			}else{
				var message = '<label class="text-center col-lg-12 text-danger" for="" id="success_msg" >Something went wrong please try again later</label>';
				$('div#modal_upload div.row').prepend(message);
			}
			setTimeout(function() {$('div#leave_'+id).fadeToggle('slow', 'linear');}, 1500);
		}
	});
}

</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
