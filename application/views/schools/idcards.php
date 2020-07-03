
<div class="featured_templates_content">
   <div class="container">
      <div class="featured_hori_part">

         <!-- Nav tabs -->
         <ul class="nav nav-tabs" role="tablist">
           <li role="presentation" class="active"><a href="#all_id_cards" role="tab" data-toggle="tab">All ID Cards</a></li>
           <li role="presentation" class=""><a href="#verified" role="tab" data-toggle="tab">Verified </a></li>
           <li role="presentation" class=""><a href="#pending" role="tab" data-toggle="tab">Verification Pending </a></li>
           <li role="presentation" class=""><a href="#students" role="tab" data-toggle="tab">Students</a></li>
         </ul>
       
         <!-- Tab panes -->
         <div class="tab-content">

           <div role="tabpanel" class="tab-pane active" id="all_id_cards">
				<div class="row">
						<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active fadeInUp" title="Grid view">
							 <a href="#all_id_cards" role="tab" data-toggle="tab"><i class="fa fa-th" > </i></a>
						</li>
						<li role="presentation" class="active fadeInUp" title="List view">
							 <a href="#all_id_cards" role="tab" data-toggle="tab"><i class="fa fa-list" > </i></a>
						</li>
				  </ul>
				  
				</div>
				<div class="row">	
                  <?php for($i=1; $i<50;$i++){ ?>
					<div class="col-md-3 col-sm-6 col-xs-6">
                     <div class="featured_hori_block">
                        <div class="featured_hori_thumb_block">
                           <img src="<?php echo asset_url(); ?>/images/blue_front_1.jpg" alt="" class="img-responsive">
                           <div class="featured_hori_back">
                              <ul>
                                <li><a href="#">View</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
      
                  <?php } ?>
			  </div>
           
			</div>

           <div role="tabpanel" class="tab-pane" id="verified">
               <div class="row">
                  <?php for($i=1; $i<50;$i++){ ?>
					<div class="col-md-3 col-sm-6 col-xs-6">
                     <div class="featured_hori_block">
                        <div class="featured_hori_thumb_block">
                           <img src="<?php echo asset_url(); ?>/images/blue_front_1.jpg" alt="" class="img-responsive">
                           <div class="featured_hori_back">
                              <ul>
                                <li><a href="#">View</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
      
                  <?php } ?>
			   </div>
           </div>

			<div role="tabpanel" class="tab-pane" id="pending">
               <div class="row">
					<?php for($i=1; $i<50;$i++){ ?>
					<div class="col-md-3 col-sm-6 col-xs-6">
                     <div class="featured_hori_block">
                        <div class="featured_hori_thumb_block">
                           <img src="<?php echo asset_url(); ?>/images/blue_front_1.jpg" alt="" class="img-responsive">
                           <div class="featured_hori_back">
                              <ul>
                                <li><a href="#">View</a></li>
                                <li><a href="#">Verify</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
      
                  <?php } ?>
				</div>
           </div>
			<div role="tabpanel" class="tab-pane" id="students">
               <div class="row">
                </div>
           </div>
			</div>
       
      </div>

   </div>
</div>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>	
<script>
$(document).ready(function() {
	$('#frm_create_account').bootstrapValidator();
});

</script>