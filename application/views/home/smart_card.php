<div class="bg-light p-3 mb-2 rounded">
<link href="<?php echo asset_url(); ?>plugins/plugin-css/plugin-sticky-classes.min.css" id="colour-scheme" rel="stylesheet">
      <h2 class="text-slab text-center text-uppercase mt-0 mb-5">
      Smart <span class="text-primary font-weight-bold">Cards</span>
      </h2>
      <div class="row  ml-1 mb-1">
      <div class="col-lg-4">
      <a class="mb-1 btn btn-outline-orange btn-rounded border-w-2 px-5 py-2 <?php if(isset($request['orientation']) && $request['orientation'] == 'vertical') echo 'active' ;?>" href="<?php echo base_url(); ?>id-cards/smart-card.html?orientation=vertical">Vertical</a> 
      
    
        
     
      <a class="mb-1 btn btn-outline-orange btn-rounded border-w-2 px-5 py-2  <?php if(isset($request['orientation']) && $request['orientation'] == 'horizontal') echo 'active' ;?>"  href="<?php echo base_url(); ?>id-cards/smart-card.html?orientation=horizontal">Horizontal</a> 
    
          </div>
      </div>
      <div class="row  ml-2 mr-2">
        <div class="col-lg-12">
          <div class="tab-content py-3">
                <?php if($request['orientation'] == 'vertical' ){ ?>
                <div class="tab-pane active" id="vertical" role="tabpanel">
                  <!-- Vertical Id card templates-->
                  <div class="row  grid-cards">	
                    <?php foreach($vertical_cards as $card){?>
                      <div class="col-lg-3 ">
                      <!-- Product 2 -->
                      <div class="card mb-3 product-card overlay-hover px-3 py-3">
                        <!-- Hover content -->
                        <div class="overlay-hover-content overlay-op-7">
                          <a href="<?php echo base_url();?>product-info/smart-id-card?template=<?php echo $card['id'];?>" class="btn btn-secondary btn-rounded btn-shadow font-weight-bold mb-3 btn-lg px-5 py-3"> Get started</a>
                        </div>
                        <!-- Image & price content -->
                        <div class="pos-relative">
                          <img class="card-img-top img-fluid" src="<?php echo base_url();?>uploads/templates/<?php echo $card['template_image_path'];?>" alt="Card image cap">
                          
                        </div>
                      <!-- Content -->
                      <div class="card-body text-center">
                        <small class="text-muted text-uppercase"><span class="text-primary"><?php echo $card['template_name']; ?></span></small>
                      
                      </div>
                      </div>
                     
                    </div>
                    <?php } ?>
                   
                  </div>

                  <!-- /Vertical Id card templates-->
                </div>
                    <?php } ?>
                    <?php if($request['orientation'] == 'horizontal' ){ ?>    
                <div class="tab-pane active" id="horizontal" role="tabpanel">
                   <!-- horizontal Id card templates-->
                   <div class="row grid-cards">	
                   <?php foreach($horizontal_cards as $card){?>
                      <div class="col-lg-4">
                      <!-- Product 2 -->
                      <div class="card mb-4 product-card overlay-hover px-3 py-3">
                        <!-- Hover content -->
                        <div class="overlay-hover-content overlay-op-7">
                          <a href="<?php echo base_url();?>product-info/smart-id-card?template=<?php echo $card['id'];?>" class="btn btn-secondary btn-rounded btn-shadow font-weight-bold mb-3 btn-lg px-5 py-3"> Get started</a>
                        </div>
                        <!-- Image & price content -->
                        <div class="pos-relative">
                          <img class="card-img-top img-fluid" src="<?php echo base_url();?>uploads/templates/<?php echo $card['template_image_path'];?>" alt="Card image cap">
                          
                        </div>
                      <!-- Content -->
                      <div class="card-body text-center">
                        <small class="text-muted text-uppercase"><span class="text-primary"><?php echo $card['template_name']; ?></span></small>
                      
                      </div>
                      </div>
                     
                    </div>
                    <?php } ?>
                  </div>
                  <!-- /horizontal Id card templates-->
                
                </div>
                <?php } ?> 
            </div>
         </div>   
      </div>       
</div>
<script>
$(document).ready(function(){
  var category = '';
  <?php if(isset($profile['customer_type'])){ ?>

    category = '<?php echo $profile['customer_type']; ?>';

  <?php } ?>
  
  var orientation = '<?php echo $request['orientation']; ?>';
  var card_type = 'smart';
  var ajax_url = '<?php echo $ajax_url; ?>';
  var url = ajax_url+'initiateCustomerPreferencesSession';
			$.ajax({
				url:url,
				data:{orientation:orientation, category:category, card_type:card_type},
				dataType: 'json',  // what to expect back from the PHP script, if anything
				cache: false,
				type:"post",
				success:function(response){
					var resp = response;
					console.log(resp);
					if(resp == 'success'){

					}
				}
			});
});
</script>