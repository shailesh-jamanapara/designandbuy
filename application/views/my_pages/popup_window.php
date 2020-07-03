<html>
<head>
<title>
Print Id Cards : Muktjivan
</title>
<link href="<?php echo asset_url(); ?>front/css/template-view-grid.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Oswald|Lobster|Fontdiner+Swanky|Crafty+Girls|Pacifico|Satisfy|Gloria+Hallelujah|Bangers|Audiowide|Sacramento' rel='stylesheet' type='text/css'>
<link href="<?php echo asset_url(); ?>/front/studio/css/style.css" rel="stylesheet">
<script src="http://13.234.247.143/mj/assets/front/js/jquery-1.11.3.js"></script>  
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
<script type="text/javascript" src="<?php echo asset_url(); ?>/front/studio/fabric.js"></script>
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
		width: px;
		background: #fff;
	}
.card_design_wrap{
width: 31.1%;
height: 316px;
float: left;
}

</style>
<div class="book">
    <div class="page">
		<?php  
		//echo "<pre>";print_r($my_templates); echo "<pre>";
		$my_template = $my_templates[2];
		for($i=1;$i<49;$i++) : 								
		?>
		
	
		<div class="card_design_wrap" >
			<?php echo $my_template['template_svg'];?>
		</div>

		
		<?php /* if($i%10 == 0 ){ ?> </div>  <div class="page"><?php } */ ?>

		<?php endfor; ?> 
    </div>
</div>
</body>

</html>