<style>
body{
      background-color:#fff !important;
}
small.help-block{
      padding:2px 0px 0px 2px;
      font-size:11px;
}
</style>
<link href="<?php echo asset_url(); ?>/front/css/theme-shop.css" id="colour-scheme" rel="stylesheet">
<link href="<?php echo asset_url(); ?>/front/plugins/plugin-css/plugin-owl-carousel.min.css" id="colour-scheme" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo asset_url(); ?>/front/studio/fabric.js"></script>

<div class="">
<div id="inquiry" class="sticky-inner py-lg-2" data-toggle="magnific-popup">
      <h5 class="text-left text-uppercase font-weight-bold my-0">
      MY <span class="text-orange font-weight-bold">ACCOUNT</span> | <small class="text-dark"> <?php echo $profile['customer_name'];?> </small>
      </h5>
</div>
</div>
<div class="row no-gutters">
<div class="mt-1 col-lg-12" id="menus_div" >
<a href="javascript:void(0);" class="mb-3 mr-2 btn  btn-white btn-rounded text-primary bg-hover-secondary" role="button" id="col_exp_menu" aria-pressed="true"><i class="fa fa-list"></i></a>
<a href="<?php echo base_url();?>My_Pages/created_templates" class="mb-3 mr-2 btn btn-white btn-shadow btn-rounded bg-hover-secondary <?php if($request['ACTION'] == 'created_templates') { echo 'active'; } ?>  text-primary" role="button" aria-pressed="true"><i class="fa fa-image text-left"></i>&nbsp;My templates</a>
<a href="<?php echo base_url();?>My_Pages/download_sample_sheet" class="mb-3 mr-2 btn btn-white btn-shadow btn-rounded  bg-hover-secondary <?php if( in_array($request['ACTION'], array('download_sample_sheet','upload_sheet','upload_photos','data_entry_manual','buy_lace')) ) { echo 'active'; } ?> text-primary " role="button" aria-pressed="true"><i class="fa fa-tasks text-left  "></i>&nbsp;My action</a>
<a href="<?php echo base_url();?>My_Pages/myaccount" class="mb-3 mr-2 btn  btn-white btn-shadow btn-rounded <?php if( in_array($request['ACTION'], array('myaccount', 'idcards')) ) { echo 'active'; } ?> text-primary bg-hover-secondary" role="button" aria-pressed="true"><i class="fa fa-database text-left  "></i>&nbsp; My data</a>
<a href="#" class="mb-3 mr-2 btn btn-white btn-shadow text-primary btn-rounded bg-hover-secondary" role="button" aria-pressed="true"><i class="fa fa-shopping-cart text-left  "></i>&nbsp;My orders</a>
<a href="#" class="mb-3 mr-2 btn btn-white btn-shadow text-primary btn-rounded bg-hover-secondary " role="button" aria-pressed="true"><i class="fa fa-user text-left "></i>&nbsp;My profile</a>
<a href="javascript:void(0);"class="btn btn-white btn-rounded text-primary btn-shadow-lg pull-right mr-2 pl-2 pr-2 bg-hover-secondary" title="Go back" onclick="javascript:history.go(-1);"><i class="fa fa-arrow-left"></i></a>
</div>
<script language="javascript">
 $(document).ready(function(){
      if( localStorage.getItem('collapsed') ){
            $('a#col_exp_menu').addClass('collapsed');
            $('div#div_btn').css('display','none');
            $('div#div_btn_collapsed').css('display','block');
            $('div.action-content-div').removeClass(' col-lg-9');
            $('div.action-content-div').addClass(' col-lg-11');
            if($('div#idcards')){
                  $('div#idcards >div.col-lg-3').css('max-width','19.5%');
                  $('div#idcards >div.col-lg-3').css('flex','19.5%');
                  $('div#idcards >div.col-lg-3').css('ms-flex','19.5%');
            }
            if($('div#div_list_thumb_to_upload')){
                  $('div#div_list_thumb_to_upload div.col-lg-4').css('max-width','23.999999%');
                  $('div#div_list_thumb_to_upload div.col-lg-4').css('flex','23.999999%');
                  $('div#div_list_thumb_to_upload div.col-lg-4').css('ms-flex','23.999999%');
            }
      }
 });     
$('a#col_exp_menu').on('click',function(){
      if($(this).hasClass('collapsed')){
            $('div#div_btn').css('display','block');
            $('div#div_btn').css('width','22%');
            $('div#div_btn_collapsed').css('display','none');
            $('div.action-content-div').removeClass(' col-lg-11');
            $('div.action-content-div').addClass(' col-lg-9');
            if($('div#idcards')){
                  $('div#idcards >div.col-lg-3').css('max-width','24.5%');
                  $('div#idcards >div.col-lg-3').css('flex','24.5%');
                  $('div#idcards >div.col-lg-3').css('ms-flex','24.5%');
            }
            if($('div#div_list_thumb_to_upload')){
                  $('div#div_list_thumb_to_upload div.col-lg-4').css('max-width','29.333333%');
            }
            localStorage.setItem('collapsed','');
            
      }
      if(!$(this).hasClass('collapsed')){
            $('div#div_btn').css('display','none');
            $('div#div_btn_collapsed').css('display','block');
            $('div.action-content-div').removeClass(' col-lg-9');
            $('div.action-content-div').addClass(' col-lg-11');
            if($('div#idcards')){
                  $('div#idcards >div.col-lg-3').css('max-width','19.5%');
                  $('div#idcards >div.col-lg-3').css('flex','19.5%');
                  $('div#idcards >div.col-lg-3').css('ms-flex','19.5%');
                  
            }
            if($('div#div_list_thumb_to_upload')){
                  $('div#div_list_thumb_to_upload div.col-lg-4').css('max-width','23.999999%');
                  $('div#div_list_thumb_to_upload div.col-lg-4').css('flex','23.999999%');
                  $('div#div_list_thumb_to_upload div.col-lg-4').css('ms-flex','23.999999%');
            }
            localStorage.setItem('collapsed','true');
            
            
      }
      if($(this).hasClass('collapsed')){
            $(this).removeClass('collapsed');
      }else{
            $(this).addClass('collapsed');
      }
     
});

</script> 
<div class="col-sm-12 col-lg-12">
    <div class="row action-div no-gutters"> 
       