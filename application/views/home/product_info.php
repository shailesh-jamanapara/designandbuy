
<link href="<?php echo asset_url(); ?>/front/css/theme-shop.css" id="colour-scheme" rel="stylesheet">
<link href="<?php echo asset_url(); ?>/front/plugins/plugin-css/plugin-owl-carousel.min.css" id="colour-scheme" rel="stylesheet">
  <!-- ======== @Region: #page-header ======== -->
 <?php
	$orientation = ($product['horizontal_vertical'] ==  '1')?'Vertical':'Horizontal';
	$cat_name = $product['product_category_name'];
  $template_name = $template['template_name'];
  $template_id = $template['id'];
  $template_image = $template['template_image_path'];
  $product_id = $product['id'];
  ?>
   <form class="from-horizontal" action="" name="" id="frm3" method="post" >
  		<input type="hidden" name="task" id="task" value="add_to_cart" />
      <input type="hidden" name="preferences[template_id]" id="template_id" value="<?php echo $template['id'];?>" />
      <input type="hidden" name="preferences[product_id]" id="product_id" value="<?php echo $template['product_id'];?>" />
      <input type="hidden" name="preferences[orientation]" id="orientation"  value=""  >
      <input type="hidden" name="preferences[category]" id="category"  value=""  >
      <input type="hidden" name="preferences[card_type]" id="card_type"  value=""  >

  <div id="page-header" class="page-header-custom">
    <div class="container clearfix">
      <h3 class="mb-0 float-md-left">
        Product View
      </h3>
      <!-- Page header breadcrumb -->
      <nav class="breadcrumb float-md-right"> 
        <a class="breadcrumb-item" href="<?php echo base_url();?>#services">Service</a> 
        <a class="breadcrumb-item" href="<?php echo base_url();?>id-cards">ID Cards</a>
        <a class="breadcrumb-item" href="<?php echo base_url();?>id-cards/<?php echo $icard['card_type'];?>-card.html?orientation=<?php echo $icard['orientation'];?>"><?php echo ucfirst($icard['card_type']);?> card</a> 
        <a class="breadcrumb-item" href="<?php echo base_url();?>id-cards/<?php echo $icard['card_type'];?>-card.html?orientation=<?php echo $icard['orientation'];?>"><?php echo ucfirst($icard['orientation']);?></a>
        
        <span class="breadcrumb-item active">Options</span> </nav>
    </div>
  </div>

  <!-- ======== @Region: #content ======== -->
  <div id="content" class="pt-3 pt-lg-6 pb-lg-0">
    <div class="container">
      <!-- Product view -->
      <div class="row">
        <div class="col-lg-4">
          <!-- Shop product carousel Uses Owl Carousel plugin All options here are customisable from the data-owl-carousel-settings="{OBJECT}" item via data- attributes: http://www.owlgraphic.com/owlcarousel/#customizing ie. data-settings="{"items": "4", "lazyLoad":"true", "navigation":"true"}" -->
          <div class="product-gallery pos-relative">
            <div class="owl-carousel owl-nav-over" id="product-gallery" data-toggle="owl-carousel" data-owl-carousel-settings='{"responsive":{"0":{"items":1,"nav":true, "dots":false}}}'>
              <a href="#" data-img-zoom="<?php echo base_url().'uploads/templates/'.$template_image; ?>">
                  <img src="<?php echo base_url().'uploads/templates/'.$template_image; ?>" alt="Shoes image" class="lazyOwl img-fluid" width="282" />
                </a>
              <a href="#" data-img-zoom="<?php echo base_url().'uploads/templates/'.$template_image; ?>">
                  <img src="<?php echo base_url().'uploads/templates/'.$template_image; ?>" alt="Nike Training Top image" class="lazyOwl img-fluid" width="282" />
                </a>
            </div>
          </div>
        </div>
		<div class="col-lg-3">
		<div class="card-accordion" id="accordion" role="tablist" aria-multiselectable="true">
           <div class="form-group">
              <label for="exampleSelect1" class="text-primary text-uppercase font-weight-bold">ID Card Type</label>
              <select class="form-control" name="preferences[has_chip]" id="has_chip" required onchange="javascript:saveCustomerPreferencesSession('has_chip', $(this).val());" >
                  <option value="">Select</option>
                  <option value="yes" <?php if( isset($preferences['has_chip']) && $preferences['has_chip'] == 'yes'){ echo 'selected="selected"'; } ?> >With Chip</option>
                  <option value="no"  <?php if( isset($preferences['has_chip']) && $preferences['has_chip'] == 'no'){ echo 'selected="selected"'; } ?> >Without Chip</option>
                </select>
            </div>
            <div class="form-group" id="div_chip_type">
              <label for="exampleSelect1" class="text-primary text-uppercase font-weight-bold">ID Card Chip</label>
              <select class="form-control" name="preferences[chip_type]" id="chip_type"  onchange="javascript:saveCustomerPreferencesSession('chip_type', $(this).val());" >
                  <option value="">Select</option>
                  <option value="rfid"  <?php if( isset($preferences['chip_type']) && $preferences['chip_type'] == 'rfid'){ echo 'selected="selected"'; } ?> >RFID</option>
                  <option value="mifare"  <?php if( isset($preferences['chip_type']) && $preferences['chip_type'] == 'mifare'){ echo 'selected="selected"'; } ?> >MiFare</option>
                </select>
            </div>
            <?php if($product['horizontal_vertical'] == '1' ) { ?>
            <div class="form-group">
              <label for="exampleSelect1" class="text-primary text-uppercase font-weight-bold">ID Card Sides</label>
              <select class="form-control" name="preferences[sides]" id="sides"  required onchange="javascript:saveCustomerPreferencesSession('sides', $(this).val());" >
                  <option value="">Select</option>
                  <option value="single" <?php if( isset($preferences['sides']) && $preferences['sides'] == 'single'){ echo 'selected="selected"'; } ?> > Single</option>
                  <option value="both" <?php if( isset($preferences['sides']) && $preferences['sides'] == 'both'){ echo 'selected="selected"'; } ?> > Both</option>
                </select>
            </div>
            <?php } ?>  
           
            <div class="form-group">
              <label for="exampleSelect1" class="text-primary text-uppercase font-weight-bold">ID Card Scanner</label>
              <select class="form-control" name="preferences[scanner]" id="scanner" onchange="javascript:saveCustomerPreferencesSession('scanner', $(this).val());"  >
                   <option value="">Select</option>
                  <option value="qrcode"  <?php if( isset($preferences['scanner']) && $preferences['scanner'] == 'qrcode'){ echo 'selected="selected"'; } ?> >QR Code</option>
                  <option value="barcode"  <?php if( isset($preferences['scanner']) && $preferences['scanner'] == 'barcode'){ echo 'selected="selected"'; } ?> >Bar Code</option>
                </select>
            </div>
            <div class="form-group">
              <label for="exampleSelect1" class="text-primary text-uppercase font-weight-bold">ID Card Finishing Type</label>
              <select class="form-control" name="preferences[finish]" id="finish"  required onchange="javascript:saveCustomerPreferencesSession('finish', $(this).val());" >
              <option value="">Select</option>
                  <option value="glossy"  <?php if( isset($preferences['finish']) && $preferences['finish'] == 'glossy'){ echo 'selected="selected"'; } ?>  >Glossy</option>
                  <option value="matt"  <?php if( isset($preferences['finish']) && $preferences['finish'] == 'matt'){ echo 'selected="selected"'; } ?> >Matt</option>
                </select>
            </div>
 
	
		  </div>
         
		</div>
        <div class="col-lg-5">
          <div class="card product-card mb-4">
            <!-- Ribbon -->
           <!--  <div class="card-ribbon card-ribbon-bottom card-ribbon-right bg-primary text-white">Top Rated</div> -->
            <!-- Content -->
            <div class="card-body p-4 pos-relative">
              <!-- Product details -->
              <p class="text-muted text-uppercase text-xs mb-0"><span class="text-primary"><?php echo $cat_name; ?></span> / <?php echo $orientation; ?> </p>
              <h2 class="card-title mb-2">
			  <?php echo $template_name; ?>
              </h2>
              <!-- hiding price for temporary <h5 class="font-weight-bold text-primary">
			  INR. <?php echo $product['base_price']; ?>.00
              </h5> -->
              <!-- <div class="pos-md-absolute pos-t pos-r mr-4 mt-3 text-md-right">
                <i class="fa fa-star text-primary"></i> <i class="fa fa-star text-primary"></i> <i class="fa fa-star text-primary"></i> <i class="fa fa-star text-primary"></i> <i class="fa fa-star text-primary"></i>
                <p class="my-0 text-xs">10 reviews | <a href="#reviews">write review</a></p>
              </div>
               <hr class="my-3" />
            -->
             
             <!-- <p class="text-muted text-sm"><?php echo $product['product_description']; ?></p> -->
              <hr class="my-3 mb-5" />
              <button type="button" onclick="javascript:submitForm('0');" class="btn btn-primary pull-right"> Continue &nbsp;&nbsp;<i class="fa fa-arrow-right mr-2"></i> </button>
            </div>
          </div>
        </div>
    </form>
        <div class="col-lg-12">
          <!-- Product tabs, @see: elements-navs-tabbable.htm -->
          <div class="card mt-5 border-top-0">
            <div class="card-header bg-white pt-0 px-0">
              <ul class="nav nav-tabs nav-justified card-header-tabs flex-column flex-md-row">
                <li class="nav-item"> <a class="nav-link active py-md-4 text-uppercase font-weight-bold" href="#product-description" data-toggle="tab">Details</a> </li>
                <li class="nav-item"> <a class="nav-link py-md-4 text-uppercase font-weight-bold" href="#product-spec" data-toggle="tab">Specification</a> </li>
                <li class="nav-item"> <a class="nav-link py-md-4 text-uppercase font-weight-bold" href="#product-reviews" data-toggle="tab">Reviews (10)</a> </li>
              </ul>
            </div>
            <div class="card-body p-4">
              <div class="tab-content">
                <!-- Tab 1: Description tab content -->
                <div class="tab-pane active show" id="product-description">
                  <h5 class="card-title">
                    Product Description
                  </h5>
                  <p class="card-text">Exerci iustum letalis nulla pertineo quia tamen te. Aptent gilvus haero neo qui verto. Eu magna nobis venio vereor. Jus pertineo praemitto.</p>
                  <p class="card-text">Blandit dolor exerci ibidem nostrud os qui saluto vulputate. Paratus sit tego. Immitto oppeto tego vereor voco. Abluo gilvus jus loquor meus vindico.</p>
                  <p class="card-text">Blandit jus sed sit te. Abluo accumsan esse eum gemino modo natu odio. Et eu populus. Ad adipiscing ibidem nutus zelus.</p>
                </div>
                <!-- Tab 2: Specification tab content -->
                <div class="tab-pane" id="product-spec">
                  <h5 class="card-title">
                    Product Specification
                  </h5>
                  <p class="card-text">Causa humo iaceo mos persto praemitto ratis secundum. Decet nisl nulla odio velit. Aptent dignissim eum importunus jugis ludus mauris nimis sudo ullamcorper.</p>
                  <table class="table table-sm table-striped mb-0">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Size</th>
                        <th>Colour</th>
                        <th>Width</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>123cm</td>
                        <td>Red</td>
                        <td>1.4 metres</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>300cm</td>
                        <td>Yellow</td>
                        <td>10.4 metres</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>156cm</td>
                        <td>Blue</td>
                        <td>1003 km</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- Tab 3: Reviews tab content -->
                <div class="tab-pane" id="product-reviews">
                  <h5 class="card-title">
                    Product Reviews
                  </h5>
                  <i class="fa fa-star text-primary icon-1x"></i> <i class="fa fa-star text-primary icon-1x"></i> <i class="fa fa-star text-primary icon-1x"></i> <i class="fa fa-star text-primary icon-1x"></i> <i class="fa fa-star text-primary icon-1x"></i>                  <span class="my-0 text-xs">10 reviews</span>
                  <hr class="my-4" />
                  <ul class="comments mt-3 list-unstyled">
                    <li class="media mb-3 pos-relative">
                      <a href="#">
                        <img src="<?php echo asset_url();?>img/team/steve.jpg" alt="Picture of Kylie Michaels" class="d-flex mr-3 img-thumbnail img-fluid" />
                      </a>
                      <div class="media-body">
                        <ul class="list-inline blog-meta text-muted">
                          <li class="list-inline-item"><i class="fa fa-calendar"></i> Mon 11th Feb 2019</li>
                          <li class="list-inline-item"><i class="fa fa-user"></i> <a href="#">Tim Rice</a></li>
                        </ul>
                        <h5 class="mt-0 mb-2">
                          Turpis odio dictumst tempor ac et!
                        </h5>
                        <p class="mb-1">Turpis odio dictumst tempor ac et!Turpis odio dictumst tempor ac et!Turpis odio dictumst tempor ac et!Turpis odio dictumst tempor ac et!</p>
                        <p><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i></p>
                      </div>
                    </li>
                    <li class="media mb-3 pos-relative">
                      <a href="#">
                        <img src="<?php echo asset_url();?>img/team/obama.jpg" alt="Picture of Alexander Vanjuvic" class="d-flex mr-3 img-thumbnail img-fluid" />
                      </a>
                      <div class="media-body">
                        <ul class="list-inline blog-meta text-muted">
                          <li class="list-inline-item"><i class="fa fa-calendar"></i> Wed 6th Feb 2019</li>
                          <li class="list-inline-item"><i class="fa fa-user"></i> <a href="#">Alexander Vanjuvic</a></li>
                        </ul>
                        <h5 class="mt-0 mb-2">
                          Porta risus porttitor facilisis sit dapibus
                        </h5>
                        <p class="mb-1">Porta risus porttitor facilisis sit dapibusPorta risus porttitor facilisis sit dapibusPorta risus porttitor facilisis sit dapibusPorta risus porttitor facilisis sit dapibus</p>
                        <p><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i></p>
                      </div>
                    </li>
                    <li class="media mb-3 pos-relative">
                      <a href="#">
                        <img src="<?php echo asset_url();?>img/team/obama.jpg" alt="Picture of Alex Jones" class="d-flex mr-3 img-thumbnail img-fluid" />
                      </a>
                      <div class="media-body">
                        <ul class="list-inline blog-meta text-muted">
                          <li class="list-inline-item"><i class="fa fa-calendar"></i> Thu 31st Jan 2019</li>
                          <li class="list-inline-item"><i class="fa fa-user"></i> <a href="#">Alex Jones</a></li>
                        </ul>
                        <h5 class="mt-0 mb-2">
                          Turpis odio dictumst tempor ac et!
                        </h5>
                        <p class="mb-1">Turpis odio dictumst tempor ac et!Turpis odio dictumst tempor ac et!Turpis odio dictumst tempor ac et!Turpis odio dictumst tempor ac et!</p>
                        <p><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i></p>
                      </div>
                    </li>
                    <li class="media mb-3 pos-relative">
                      <a href="#">
                        <img src="<?php echo asset_url();?>img/team/jimi.jpg" alt="Picture of Alexander Vanjuvic" class="d-flex mr-3 img-thumbnail img-fluid" />
                      </a>
                      <div class="media-body">
                        <ul class="list-inline blog-meta text-muted">
                          <li class="list-inline-item"><i class="fa fa-calendar"></i> Sat 26th Jan 2019</li>
                          <li class="list-inline-item"><i class="fa fa-user"></i> <a href="#">Mike Thompson</a></li>
                        </ul>
                        <h5 class="mt-0 mb-2">
                          Nisi rhoncus nisi porttitor risus ridiculus tristique, quis.
                        </h5>
                        <p class="mb-1">Nisi rhoncus nisi porttitor risus ridiculus tristique, quis.Nisi rhoncus nisi porttitor risus ridiculus tristique, quis.Nisi rhoncus nisi porttitor risus ridiculus tristique, quis.Nisi rhoncus nisi porttitor risus ridiculus tristique,
                          quis.</p>
                        <p><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i><i class="fa fa-star text-primary"></i></p>
                      </div>
                    </li>
                  </ul>
                  <hr class="my-4" />
                  <h5>
                    Add Review
                  </h5>
                  <form id="reviews-form" class="comment-form mt-3" role="form">
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label class="sr-only" for="comment-name">Name</label>
                        <input type="text" class="form-control mb-3" id="comment-name" placeholder="Name">
                        <label class="sr-only" for="comment-name">Email</label>
                        <input type="email" class="form-control mb-3" id="comment-email" placeholder="Email">
                        <select class="form-control" placeholder="Star rating">
                          <option>- Stars -</option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label class="sr-only" for="comment-comment">Comment</label>
                        <textarea rows="7" class="form-control" id="comment-comment" placeholder="Comment"></textarea>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /container -->
  </div>
  <!-- /#content -->
  <!-- Modal confirm_checklist  -->
  <div class="modal example-modal-lg" id="confirm_checklist" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Please make sure followings data is ready to provide us before you place an order.</h4>
		</div>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
      <div class="modal-body">
		<ul class="checklist_popup_alert_block">
			<li class="checklist"><i class="fa fa-check"></i>&nbsp; No. of ID cards you want to order.</li>
			<li class="checklist"><i class="fa fa-check"></i>&nbsp; Data of each record in excel sheet.</li>
			<li class="checklist"><i class="fa fa-check"></i>&nbsp; Photographs of each record to be uploaded in zip.</li>
			<li class="checklist"><i class="fa fa-check"></i>&nbsp; Expected date of delivery for the ordered.</li>
		</ul>
	  </div>
	  <div class="modal-footer">
		<input type="button" id="" class="btn btn-danger pull-left" value="No, go back" onclick="javascript:history.go(-1);"/>
		<input type="submit" id="btn_add_object" onclick="javascript:goNextStep();" class="btn btn-success" value="Yes, continue"/>
	  </div>
	 </div>
	</div>
</div>
<!-- /Modal confirm_checklist -->
 <!-- Modal confirm_checklist  -->
 <div class="modal example-modal-lg" id="errors_message" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
    <div class="modal-content">
		<div class="modal-header">
		
		</div>
      <div class="modal-body">
		<ul class="checklist_popup_alert_block">
			<li class="checklist error text-danger" id="error_has_chip"><i class="fa fa-exclamation-triangle"></i>&nbsp; Please select card type.</li>
			<li class="checklist error text-danger" id="error_chip_type"><i class="fa fa-exclamation-triangle"></i>&nbsp; Please select chip type.</li>
			<li class="checklist error text-danger" id="error_sides_type"><i class="fa fa-exclamation-triangle"></i>&nbsp; Please select sides.</li>
      <li class="checklist error text-danger" id="error_finish_type"><i class="fa fa-exclamation-triangle"></i>&nbsp; Please select finishing type.</li>
      <li class="checklist error text-danger" id="error_lace_text"><i class="fa fa-exclamation-triangle"></i>&nbsp; Please enter text for lace.</li>
      <li class="checklist error text-danger" id="error_lace_logo"><i class="fa fa-exclamation-triangle"></i>&nbsp; Please upload logo file for lace.</li>
		</ul>
	  </div>
	  <div class="modal-footer">
	
		<input type="button" data-dismiss="modal"  class="btn btn-primary" value="Ok"/>
	  </div>
	 </div>
	</div>
</div>
<!-- /Modal confirm_checklist -->
<!-- Modal add login_pupop -->
<div class="modal " id="login_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
  <form class="form-horizontal" novalidate method="post" action="<?php echo base_url(); ?>/User_Login/loginValidate?token=<?php echo rand(5000,10000); ?>" id="frm_login_popup" data-bv-message="This value is not valid" data-bv-feedbackicons-validating="glyphicon glyphicon-refresh" enctype="multipart/form-data" autocomplete="off">
		<input type="hidden" name="source" value="product_info" />
    <div class="modal-content">
		<div class="modal-header">
			<h3 class="modal-title">Login</h3>
		</div>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
      <div class="modal-body">
	 		<div class="row" >
				<div class="col-md-8">
					<div class="form-group">
						<i class="fa fa-user"></i>
						<input type="text" class="form-control" name="User_ID" id="User_ID" placeholder="Username" data-bv-notempty="true" data-bv-notempty-message="Please enter username" data-bv-regexp="true" data-bv-regexp-regexp="^[a-zA-Z0-9]+$" data-bv-regexp-message="Registration number must be  alphabet only" data-bv-stringlength="true" data-bv-stringlength-min="4" data-bv-stringlength-max="20" data-bv-stringlength-message="Registration must be 4 to 20 characters" >
					</div>
				</div>
				<div class="col-md-8">
					<div class="form-group">
						<i class="fa fa-lock"></i>
						<input type="password" name="Password" class="form-control" placeholder="Password" data-bv-notempty="true" data-bv-notempty-message="Please enter password">
					</div>
				</div>
				<div class="col-md-8">
					<div class=" form-group">
						<button type="submit" class="btn btn-default pull-right form-control">Log in</button>
					</div>
				</div>
			</div>
	  </div>
	  <div class="modal-footer">
	  </div>
	 </div>
	 </form>
	</div>
</div>
<!-- /Modal login_pupop -->

  <script>
  $(document).ready(function(){
    $('li.error').css('display','none');
    $('div#div_chip_type').css('display','none');
    $('div.lace-options').css('display','none');
    saveCustomerPreferencesSession('template_id', '<?php echo $template_id; ?>');
    saveCustomerPreferencesSession('template_front_image', '<?php echo $template['template_image_path']; ?>');
    saveCustomerPreferencesSession('product_id', '<?php echo $product_id; ?>');
    var  icard = {};
    <?php if( isset($icard) && !empty($icard) ){ ?>
          icard =  <?php echo json_encode($icard); ?>;
    <?php } ?>
    if(icard){
      console.log(icard);
      $("input#category").val(icard.category);
      $("input#orientation").val(icard.orientation);
      $("input#card_type").val(icard.card_type);
      if(icard.has_chip){
        $("select#has_chip").val(icard.has_chip);
        if(icard.has_chip == 'yes'){
          $('div#div_chip_type').css('display','block');
        }
        if(icard.chip_type && icard.chip_type != '' ){
          $("select#chip_type").val(icard.chip_type);
        }
      }
      if(icard.sides){
        $("select#sides").val(icard.sides);
      }
      if(icard.scanner){
        $("select#scanner").val(icard.scanner);
      }
      if(icard.finish){
        $("select#finish").val(icard.finish);
      }
    }

    
  });

  function submitForm(user_choose){
  $('li.error').css('display','none');
	var is_logged_in = false;
  var form_url = '';
  var valid = true;
  var has_chip = $('select#has_chip').val();
  if(has_chip == ''){
    valid = false;
    $('li#error_has_chip').css('display','block');
  }
  if(has_chip !='' && has_chip == 'yes'){
    var chip_type = $('chip_type').val();
    if(chip_type == '' ){
      valid = false;
      $('li#error_chip_type').css('display','block');
      
    }
  }
  var sides = $('select#sides').val();
  if(sides == ''){
    valid = false;
    $('li#error_sides_type').css('display','block');
  }
  var finish = $('select#finish').val();
  if(finish == ''){
    valid = false;
    $('li#error_finish_type').css('display','block');
  }
  var lacetype =  $('select#lacetype').val();
  if(lacetype != '' ){
    if(lacetype == 'text'){
      var lace_text = $('input#lace_text').val();
      if(lace_text == ''){
        valid = false;
        $('li#error_lace_text').css('display','block');
      }
     
    }
    if(lacetype == 'text_with_logo' ){
      var lace_logo = $('input#lace_logo').val();
      if(lace_logo == ''){
        valid = false;
        $('li#error_lace_logo').css('display','block');
      }
    }
    if(lacetype == 'text_with_logo' ){
      var lace_text = $('input#lace_text').val();
      if(lace_text == ''){
        valid = false;
        $('li#error_lace_text').css('display','block');
      }
      var lace_logo = $('input#lace_logo').val();
      if(lace_logo == ''){
        valid = false;
        $('li#error_lace_logo').css('display','block');
      }
    }
  }

  if(valid ==  false){
    $('#errors_message').modal('show');
    return false;
  }
	<?php if( isset( $profile )  &&  !empty($profile) ){ ?>
		is_logged_in= true;
		var customer_id = '<?php echo $profile['customer_id']; ?>';
	<?php }?>
	if(is_logged_in == false){
		form_url = '<?php echo base_url(); ?>/User_Login/school?token=<?php echo rand(5000, 10000);?>';
		$('#login_popup').modal('show');

	}
	if(is_logged_in == true){

		$('input#user_select').val(user_choose);
		 $('#confirm_checklist').modal('show');
	}

}
function goNextStep(){
 var  form_url ='<?php echo base_url();?>/Studio/template_act?';
  document.getElementById('frm3').action = form_url;
	$('form#frm3').submit();

}
$('select#has_chip').on('change', function(){
  var has_chip = $(this).val();
  if( has_chip == 'yes' ){
    $('div#div_chip_type').css('display','block');
  }else{
    $('div#div_chip_type').css('display','none');
  }

});
$('select#lacetype').on('change', function(){
  var lacetype = $(this).val();
  $('div.lace-options').css('display','none');
  if(lacetype == 'text'){
    $('div#div_lace_text').css('display','flex');
  }
  if(lacetype == 'logo'){
    $('div#div_lace_logo').css('display','flex');
  }
  if(lacetype == 'text_with_logo'){
    $('div#div_lace_text').css('display','flex');
    $('div#div_lace_logo').css('display','flex');
  }
  
});
function saveCustomerPreferencesSession(key, value){
  var card_type = 'smart';
  var ajax_url = '<?php echo $ajax_url; ?>';
  var url = ajax_url+'saveCustomerPreferencesSession';
			$.ajax({
				url:url,
				data:{key:key, value:value},
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
}

$(document).ready(function(){
  $('#frm_login_popup').bootstrapValidator().on('success.form.bv', function(e) {
		// Prevent form submission
		e.preventDefault();
    var url = '<?php echo base_url(); ?>/User_Login/loginValidate?token=<?php echo rand(5000,10000); ?>';
		var $form = $(e.target);
		var bv = $form.data('bootstrapValidator');
		// Use Ajax to submit form data
		$.post(url, $form.serialize(), function(result) {
			var obj = $.parseJSON(result);
			if(obj.status == 'success'){
        $('#login_popup').modal('hide');
        $('input#user_select').val('0');
		    $('#confirm_checklist').modal('show');
       
			}
			if(obj.status == 'failed'){
				var arr = result.split('^');
				var err ='<small class="help-block error_email" data-bv-validator="emailAddress" data-bv-for="email" data-bv-result="INVALID" style="display: block;" display="block"> '+arr[2]+' </small>';
				$("input#"+arr[1]).parent('div.form-group ').append(err);
				$("input#"+arr[1]).parent('div.form-group ').addClass('has-error');
				return false;
			}
			
			
		});
		$('.btn-success').prop("disabled", false);
	});
});
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>
