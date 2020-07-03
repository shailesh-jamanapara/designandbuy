<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- page content -->
	<div class="right_col" role="main">
	  <div class="">
		<div class="clearfix"></div>       
		<div class="row">
		  <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			    <div class="x_title">
				<h2>List of <?php echo $items; ?></h2>
				<a class="pull-right" href="<?php echo base_url();?>index.php/Setups/index/all" ><button type="button" class="btn btn-primary"> Go Back</button></a>
				<?php if(isset($roles_accesses))echo $roles_accesses['add_button']; ?>
				<div class="clearfix"></div>
			  </div>
			  <div class="x_content">
			  <form class="form-horizontal" name="frmsearch" id="frmsearch" method="post" action="" autocomplete="off" >
					<?php  echo print_search_form($search, $postdata, $listpage_url); ?>
				<table class="table table-striped jambo_table bulk_action" >
					<thead class="headings">
					<tr>
						<th class="sorting column-title  col-lg-1" tabindex="0" >Sr. No.</th>
						<th class="column-title col-lg-3 text-primary sortable" column="trainings.training_name" state="none"  >Training Name<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-3 sortable" column="training_topics.training_topic_name" state="none"  >Topic<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-1 sortable" column="training_topics.topic_code" state="none"  >Code<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-2 sortable" column="trainings.training_date" state="none"  >Date<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-2 sortable" column="users.first_name" state="none"  >Mentor<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-2 sortable" column="ra.first_name" state="none"  >Reporting Authority<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-1 sortable" column="trainings.status" state="none" >Status<i   class="fa fa-sort-alpha-asc"> </i></th>
						<th class="column-title col-lg-2 " >Action</th>
					</tr>
				  </thead>
					<tbody>
						<?php  if(!empty($rows)) :  $i = ($postdata['page'] > 1) ? (($postdata['page']-1) * $postdata['limit'] ) + 1 : 1; foreach($rows as $row) :  $id = base64_encode($row['id']); $status = ( $row['status'] == 1) ?"Active":"Inactive";  ?>
						<?php $status = ( strpos($row['status'], '_') !==  false  ) ? ucfirst(str_replace('_', ' ', $row['status'])) : ucfirst($row['status']);  $row_id= rand(5000, 9000 ); ?>
						<tr  id="<?php echo $row_id; ?>">
							<td><?php echo  $i; ?></th>
							<td><?php echo  $row['training_name']; ?></td>
							<td><?php echo  $row['training_topic_name'];  ?></td>
							<td><?php echo  $row['topic_code'];  ?></td>
							<td><?php echo  date('M d,Y', strtotime($row['training_date']));  ?></td>
							<td><?php echo  ucfirst(strtolower($row['mentor_name']));  ?></td>
							<td><?php echo  ucfirst(strtolower($row['reporting_authority_name']));  ?></td>
							<td><?php echo $status; ?></td>
							<td> 
							<a herf="javascript:void(0);" class="edit_link" onclick="javascript:toggle_modal_invited_employees('<?php echo $id; ?>');" ><i class="fa fa-users" title="View Employees Invited For This Training"> </i> </a>&nbsp;&nbsp;&nbsp;
							<a herf="javascript:void(0);" class="edit_link" onclick="javascript:editrecord('<?php echo $id; ?>','<?= $edit_url ?>');" ><i class="fa fa-pencil-square-o" title="Edit"> </i> </a> &nbsp;&nbsp;&nbsp;
							<?php if($download_access == 1) { ?>
							<a herf="javascript:void(0);" class="edit_link" onclick="javascript:downloaddoc('<?php echo $id; ?>');" ><i class="fa fa-download" title="Download Document"> </i> </a>
							<?php } ?>		
							</td>
						</tr>
						<?php  $i++; endforeach; endif; ?>
						<?php  if(empty($rows)) : ?> <td colspan="4" > No record found </td> <?php endif; ?>
					<tbody>
					</table>
				<?php if(count($rows) > 0) { echo print_pagination($total_records, $total_pages, $postdata['page'], $postdata['limit']); } ?>
				</form>
			</div>
		  </div>
		</div>
	  </div>
	</div>
<!-- Modal for Employees invited in training  -->
<div class="modal" tabindex="-1" role="dialog" id="modal_invited_employees">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="training_name"> </h4>
        <h5 class="modal-title" id="training_title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
		<ul class="list-unstyled top_profiles scroll-view" id="users_list">
		 </ul>
       </div>
	  
    </div>
  </div>
</div>	
<form class="form-horizontal" name="frmdownload" id="frmdownload" method="post" action="" target="blank">
    <input type="hidden" name="task" id="task" value="download_doc" />
    <input type="hidden" name="id" id="id" value="" />
</form>
<!-- /page content -->
<script>
function toggle_modal_invited_employees(training_id){
	var url =  '<?php echo $ajax_url; ?>getInvitedEmployees';
	$.post(url, {id : training_id}, function(result) {
		console.log(result);
		var obj = $.parseJSON(result);
		if(obj.status == 'success'){
			if(obj.response){
				console.log(obj.response);
				$('#training_name').text('Topic  : '+obj.training_topic);
				$('#training_title').text('Title :'+obj.training_name);
				$().text();
				var _html = '';
				var cls = '';
				$(obj.response).each(function(){
					if(this.role_id == '5'){
						cls = 'aero';
					}
					if(this.role_id == '1'){
						cls = 'blue';
					}
					if(this.role_id == '2'){
						cls = 'green';
					}
					var user_name = this.title+ ' '+this.first_name+ ' ';
					if( this.middle_name !== 'undefined'  && this.middle_name !== ''){
						user_name = user_name+ this.middle_name+ ' ';
					}
					if( typeof this.last_name != undefined  && this.last_name != ''){
						user_name = user_name+ this.last_name+ ' ';
					}
					 _html =  _html+ '<li class="media event col-lg-4">';
							_html = _html+  '<a class="pull-left border-'+cls+' profile_thumb">';
									_html = _html+ '<i class="fa fa-user '+cls+'"></i>';
							_html = _html+ '</a>';
						_html = _html+ '<div class="media-body">';
						  var show_users = '<?php echo base_url();?>Users/list_employees/employee?search_by=username&search_for='+this.username;
							_html = _html+ '<a class="title" href="'+show_users+'">' +user_name+'</a>';
							_html = _html+ '<p><strong>'+this.username+'</strong> '+ this.position_name+' </p>';
							_html = _html+ '<p> <small>'+this.department_name+'</small>';
							_html = _html+ '</p>';
						_html = _html+ '</div>';
					_html = _html+ '</li>';
				});
				if(_html != ''){
					$("ul#users_list").html(_html);
				}
			}
		}
	});
	$("#modal_invited_employees").modal('toggle');
}
$(document).ready(function() {
	var search_by = '<?php echo $postdata['search_by']; ?>';
	if(search_by == 'trainings.training_date'){
		$('div.search_box').find('#search_for_text').css('display','none');
		$('div.search_box').find('#search_for_text').prop('disabled',true);
		$('div.search_box').find('#search_for_date').css('display','inline');
		$('div.search_box').find('.fa-calendar ').css('display','inline');
		$('div.search_box').find('#search_for_date').prop('disabled',false);
	}
	if(search_by !== 'trainings.training_date'){
		$('div.search_box').find('#search_for_text').css('display','inline');
		$('div.search_box').find('#search_for_text').prop('disabled',false);
		$('div.search_box').find('#search_for_date').css('display','none');
		$('div.search_box').find('.fa-calendar ').css('display','none');
		$('div.search_box').find('#search_for_date').prop('disabled',true);
	}
	$('select#search_by').on('change', function(){
		if( this.value == 'trainings.status' || this.value== 'trainings.training_date'){
				var _html = '';
				/*
				if( this.value == 'trainings.status'){
					var searched_for = '<?php  $postdata['search_for'];?>';
					var _selecr = 
					_html = _html+'<select class="form-control" id="search_for" name="search_for" data-bv-notempty="true" data-bv-notempty-message="Please select one" data-bv-field="search_by">';
						_html = _html+'<option value="">Please select status</option>';
						_html = _html+'<option value="0"';
						if( searched_for == '0' ){ _html = _html+' selected="selected"'; }
						_html = _html+'>Upcoming</option>';
						_html = _html+'<option value="1"';
						if( searched_for == '1' ){ _html = _html+' selected="selected"'; }	
						_html = _html+'	>On Going</option>';
						_html = _html+'<option value="2"';
						if( searched_for == '2' ){ _html = _html+' selected="selected"'; }	
						_html = _html+'>Completed</option>';
					_html = _html+'</select>';
					$('div#div_search_for').html('');
					$('div#div_search_for').html(_html);
				}
				*/
				if( this.value == 'trainings.training_date'){
					$('#search_for_text').prop('disabled',true);
					$('#search_for_text').css('display','none');
					$('#search_for_date').prop('disabled',false);
					$('#search_for_date').css('display','inline');
					//_html = _html+'<input required id="search_for" name="search_for" value="" class="date-picker form-control" type="text" placeholder="mm/dd/yyyy" ><span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>';	
					 //datepicker_call();
				}
				if( this.value !== 'trainings.training_date' ){
					$('#search_for_text').prop('disabled',false);
					$('#search_for_text').css('display','inline');
					$('#search_for_date').prop('disabled',true);
					$('#search_for_date').css('display','none');
				}
			
		}else{
			_html = _html+'<input type="text" class="form-control" name="search_for" id="search_for" placeholder="Search Keyword" value="<?php echo $postdata['search_for']; ?>"  data-bv-notempty="true" data-bv-notempty-message="Please enter value ">';
		}

	});
	$('#frmsearch').bootstrapValidator();
});
function downloaddoc(id){
	 $('form#frmdownload').find('#id').val(id);
	var form_action_url = '<?php echo base_url()?>index.php/Training_Documents/downloadDoc';
		 $('#frmdownload').attr('action', form_action_url).submit();
}
 </script>	
 <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
<script src="<?php echo vendor_url();?>fastclick/lib/fastclick.js"></script>