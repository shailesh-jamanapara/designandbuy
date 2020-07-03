
<div class="myaccount_right_content_bg">
<div class="tempalets_list_content">
<!------ Include the above in your HEAD tag ---------->
 <div class="col-lg-12">
<div class="wizard">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                        </a>
                    </li>
					<li role="presentation" >
                        <a href="#step1" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="">
                        <a href="#step2" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="">
                        <a href="#step3" data-toggle="tab" aria-controls="step4" role="tab" title="Step 4">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>

            <form role="form">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                           <div class="my_templates">
								<?php if( count($my_template) > 0 ){ ?>

										<?php if( isset($my_template['template_data_json']) && $my_template['template_data_json'] != '' ) { ?>
											<div class="col-lg-12 canvas-container" >
										<div class="col-lg-5" >
										<canvas id="canvas_<?php echo $my_template['id']; ?>" width="948" height="448"></canvas>
										</div>
										<div class="col-lg-7" >
										<div class="col-lg-12" >
										   <h3 class="col-lg-4 my-template-name" > Saved as </h3> <h3 class="col-lg-8 my-template-name"><?php echo $my_template['template_name']; ?></h3>
										</div>
										<div class="col-lg-12" >
											<hr>
										</div>
											<div class="col-lg-12" >
												<div class="btn btn-info btn-my-template text-left" onclick="javascript:open_make_order(<?php echo $my_template['id']; ?>);"> MAKE ORDER NOW  &nbsp;&nbsp;<i class="fa fa-chevron-right pull-right"></i></div>
											</div>
											<div class="col-lg-12" onClick="MyWindow=window.open('<?php echo base_url();?>/My_Pages/myaccount?view_page=a4','MyWindow',width=600,height=300); return false;" title="REVIEW  <?php echo $my_template['template_name']; ?> template with real data">
											   <div class="btn btn-info btn-my-template  text-left">REVIEW I CARDS WITH REAL DATA &nbsp; &nbsp;<i class="fa fa-chevron-right  pull-right"></i>

												</div>
											</div>
											</div>
										</div>
										<?php } ?>
								<?php }else{ ?>
									<div class="col-lg-12" >Not template created.</div>
									<?php }?>
							<!-- /.col -->
							</div>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step2">
                        <h3>Step 2</h3>
                        <p>This is step 2</p>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                        </ul>
                    </div>
					  <div class="tab-pane" role="tabpanel" id="step3">
                        <h3>Step 2</h3>
                        <p>This is step 2</p>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="step4">
                        <h3>Step 3</h3>
                        <p>This is step 3</p>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                            <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                            <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                        </ul>
                    </div>
                    <div class="tab-pane" role="tabpanel" id="complete">
                        <h3>Complete</h3>
                        <p>You have successfully completed all steps.</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
        </div>
   

</div>
<link href="<?php echo asset_url(); ?>/front/studio/css/style.css" rel="stylesheet">
<?php if( count($my_template) > 0 ){ ?>
    <script>

            <?php if( isset($my_template['template_data_json']) && $my_template['template_data_json'] != '' ) { ?>
                var c = new fabric.Canvas('canvas_<?php echo $my_template['id']; ?>');
                var json = <?php echo $my_template['template_data_json']; ?>;
                c.loadFromJSON(json, c.renderAll.bind(c), function(o, object) {
                    object.set('selectable', false);
                });
            <?php } ?>

    </script>
<?php } ?>

<?php if( count($my_template) > 0 ){ ?>


        <!-- Popup for review templte -->
        <div class="modal fade" id="template_modal_<?php echo $my_template['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog div_review_template" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
                <div class="modal-body">
                    <div class="row">
                    <div class="col-lg-12">
                        <h4 class="text-center">Are you sure to send SMS to all () students ?</h4>
                    </div>
                    <div class="col-lg-12">
                    </div>
                    <div class="col-lg-6">
                        <button class="btn btn-warning pull-left" id="go_back" onclick="javascript:window.location.reload;">  <i class="fa fa-arrow-left" aria-hidden="true"></i> No</button>
                    </div>
                    <div class="col-lg-6">
                        <button class="btn btn-success pull-right" id="confrrm" onclick="javascript:calltoaction();">Yes, proceed  <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- /template for review-->

<?php } ?>
<form name="frm_created_templates" id="frm_created_templates" action="" method="post" >
         <input type="hidden" name="template_id" id="template_id" value="" />
         <input type="hidden" name="product_id" id="product_id" value="" />
</form>
<div class="modal fade" id="modal_step_1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog modal-content-full-width" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
      <div class="modal-body">
	    <form action="" method="post" id="frm_pre_order" name="frm_pre_order" >
            <input type="hidden" id="check_template_id" name="check_template_id" value="">
            <div class="row mragin6percent" >
                <div class="col-lg-6 col-md-6 text-center">
                    <div class="btn btn-mj-theme" onclick="javascript:upload_data('upload');" >UPLOAD DATA USING EXCEL</div>
                </div>
                <div class="col-lg-6 col-md-6  text-center">
                    <div class="btn btn-mj-theme"  onclick="javascript:upload_data('manual_entry');" >MANUAL ENTER USING FORM</div>
                </div>
            </div>
        </form>
	  </div>
	 </div>
	</div>
</div>
<script>
  function review_my_template(url, template_id){
     $('#template_id').val(template_id);
     $('form#frm_created_templates').prop('action',url);
     //console.log(template_id);
     $('form#frm_created_templates').submit();
   }
  function open_make_order(template_id){
      $('#modal_step_1').modal('show');
      $('input#check_template_id').val(template_id);

  }
  function upload_data(act){
    if(act == 'upload'){
        $('form#frm_pre_order').prop('action','<?php echo base_url();?>/My_Pages/download_sheet');
    }
     if(act == 'manual_entry'){
        $('form#frm_pre_order').prop('action','<?php echo base_url();?>/My_Pages/data_entry');
    }
    $('form#frm_pre_order').submit();

  }
  $(document).ready(function () {
    //Initialize tooltips
    //$('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}
</script>
</div>