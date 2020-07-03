<html>
<head>
<title>
Print Id Cards : Muktjivan
</title>
<link href="<?php echo asset_url(); ?>front/css/template-view-grid.css" rel="stylesheet" type="text/css" />
</head>
<body>
<style>
  body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tahoma";
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 8in;
        min-height: 12in;
        padding: 8mm;
        margin: 6mm auto;
        border: 1px #D3D3D3 solid;
        background: white;
    }
    .subpage {
        padding: 1cm;
        border: 5px red solid;
        height: 257mm;
        outline: 2cm #FFEAEA solid;
    }
    
    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 297mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
	.hori_card_part{
		float: left;
		width: 305px;
		background: #fff;
	}


</style>
<div class="book">
    <div class="page">
						<?php  if(!empty($completed)) :  $i = 1; foreach($completed as $row) :  $id = base64_encode($row['id']); $status = ( $row['status'] == 1) ?"Active":"Inactive"; $row_id= rand(5000, 9000 ); 
							
		?>
									<div class="col-sm-4">
									<?php echo "<pre style='display:none'> "; print_r($row); echo "</pre>";?>
									<div class="card_design_wrap" style="border: 1px solid #454545; 	margin:2px 1px 1px 1px; " >
										<div class="hori_card_part" style="margin: 2px;">
											<div class="hori_header_block" style="">
												<div class="hori_logo_part" style="width:60px;"><img src="<?php echo asset_url(); ?>/front/assets/images/logo_vedant.jpg" alt="" class="img-responsive" style="width:46px"></div>
												<div class="hori_header_title">
													<div class="form-group title1" >
														<input type="text" style=" font-size:12px;"class="form-control" value="(Affiliated To CBSE)">
													</div>
													<div class="form-group title2" >
														<input type="text" style="font-size :12px"class="form-control" value="Vedant International School">
													</div>
												</div>
											</div>
											<div class="hori_body_part">
												<div class="hori_card_info_block">
													<div class="row">
														<div class="col-md-12">
															<div class="form-group title_name" style="margin-bottom:0px;">
																<span style="font-size:11px">Name : <?php echo  $row['student_name']; ?></span>
																
															</div>
														</div>
														<div class="" style="width: 196px  !important;">
															<div class="form-group title_class" style="margin-bottom:0px;">
																<span style="font-size:11px">Class :</span><small class="data-value" style="font-size:11px"><?php echo $row['standard_id']." ". $row['class_id']." ".$row['house_id'] ; ?></small>
																
															<span style="font-size:11px">D.O.B. :</span><small class="data-value" style="font-size:11px"><?php if(isset($row['dob'])){ echo $row['dob']; }else{ echo"N/A";} ?></small>
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group title_phone"  style="margin-bottom:0px;">
															<span style="font-size:11px">Cell No. :</span><small class="data-value" style="font-size:11px"><?php if(isset($row['mobile_no'])){ echo $row['mobile_no']; } ?> <?php if(isset($row['emergency_contact_no']) && $row['emergency_contact_no'] != 0){ echo ', '.$row['emergency_contact_no']; } ?></small>
																
															</div>
														</div>
														<div class="col-md-12">
															<div class="form-group title_address"  style="margin-bottom:0px;">
															<span style="font-size:11px"><img src="<?php echo asset_url(); ?>/front/assets/images/home_icon.png" alt=""class="img-responsive"> Address</span><br /><small class="data-value" style="font-size:9px"><?php if(isset($row['address'])){ echo $row['address']; } ?></small>
																
															</div>
														</div>
													</div>
												</div>
												<div class="hori_photo_block">
													<div class="card_profile_pic">
														<div class="">
														<?php    $fpath = (isset($photos[$row['student_id']]) && $photos[$row['student_id']] != '') ? base_url().$photos[$row['student_id']] : ''; ?>
														   <img class="profile-pic img-responsive" src="<?php if( $fpath != '')echo $fpath;  ?>" alt="" height="86px" width="76px" style="width: 72px !important;margin-top: 4px;">
														 </div>
													</div>
													<div class="hori_year_block"><input type="text" class="form-control" style="font-size:12px;"value="2019-2020"></div>
												</div>
											</div>
											<div class="hori_bottom_part text-center" style="padding: 3px 26px; font-size: 8px; width: 305px;margin-bottom: 7px;text-align: center;"> JaiKrishna Soc., Nr. Isanpur Civie Center, Jaymala Cross Road, Isanpur, Ahmedabad-382443 Ph : 32911181
											</div>
										</div>
									</div>
									
								</div>
							
								<?php if($i%10 == 0 ){ ?> </div>  <div class="page"><?php }?>
									<?php  $i++; endforeach; endif; ?> 
    </div>
</div>
</body>
</html>