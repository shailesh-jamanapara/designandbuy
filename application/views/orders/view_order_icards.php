<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="<?php echo asset_url(); ?>/front/studio/fabric.js"></script>
<style>
.col-lg-3 {
    -ms-flex: 0 0 24.5%;
    flex: 0 0 24.5%;
    max-width: 24.5%;
}
i.fa-check{
   margin-top: -4px;
}
i.fa-exclamation  {
   margin-top: -4px;
}
</style>
<!-- Content Header (Page header) -->
<?php if (!empty($postdata['task']) && $postdata['task'] == 'save' ) : ?>
	<form name="frmsave" id="frmsave" method="post" action="<?php echo $listpage_url;?>">
		<input type="hidden" name="id" id="id" value="<?php if(isset($model['id'])) { echo $model['id']; } ?>" />
		<input type="hidden" name="search_for" id="order_type" value="<?php echo $postdata['search_for']; ?>" />
		<input type="hidden" name="search_by" id="sort_by" value="<?php echo $postdata['search_by']; ?>" />
		<input type="hidden" name="sort_by" id="sort_by" value="<?php echo $postdata['sort_by']; ?>" />
		<input type="hidden" name="order_type" id="order_type" value="<?php echo $postdata['order_type']; ?>" />
		<input type="hidden" name="page" id="order_type" value="<?php echo $postdata['page']; ?>" />
		<input type="hidden" name="limit" id="limit" value="<?php echo $postdata['limit']; ?>" />
	</form>
<?php endif; 

?>
<?php if ( !$postdata['task']  ||  $postdata['task'] != 'save' ) : ?>
	<section class="content-header">
		<h1>
			<?php echo $page_heading; ?>
		</h1>
	</section>
    <!-- Main content -->
	<section class="content">
        
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<form class="form-horizontal" name="frmsearch" id="frmsearch" method="post" action="" >
						<?php  echo print_search_form($search, $postdata, $listpage_url); ?>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
                             <!-- I Cards-->
                        <?php  if(!empty($icards)) :  $i = 1; foreach($icards as $row) :  $id = base64_encode($row['id']); ?>
                        <div  class="col-lg-3" style="" title="Please click on Radio button and verify this ID card">
                            <div class="row div-card-block">
                                <div  class="col-lg-12 col-md-12">
                                <canvas  id="canvas_<?php echo $row['id'];?>" height="285" width="190"></canvas>
                                </div>
                                <div class="col-lg-12 col-md-12  pb-2 pt-2">
                                    <input type="hidden" class="idcards" value="1" id="<?php echo $row['id'];?>" name="id_cards[<?php echo $row['id'];?>]">

                                    <small class="text-success" ><i class="fa fa-check  "></i> Verified</small>
                                </div>
                            </div>
                        </div>
                        <?php  $i++; endforeach; endif; ?>
                    <!-- I cards-->
                        </form>
            		</div>
           			<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
   
	    </div>
<!-- /.row -->
    </section>
<!-- /.content -->
<?php endif; ?>		

<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>	
<script language="javascript">
var cwidth = '';
<?php  if(!empty($icards)) :  $i = 1; foreach($icards as $row) :  $id = base64_encode($row['id']); 
$json =  trim($row['icard_json']);
?>
var json = '<?php echo $json; ?>';
json = json.replace(/(\r\n|\n|\r)/gm, "\\n");
   var canvas = window._canvas = new fabric.Canvas('canvas_<?php echo $row['id'];?>');
   canvas.loadFromJSON(json, canvas.renderAll.bind(canvas), function(o, object) {
      //object.text = 'center';
      if( (object.type == 'i-text' || object.type == 'image' ) && object.textAlign == 'center' ){
         var rest_left = 0;
         var obj_width = object.width;
         var obj_half_width = Math.round(obj_width / 2);
         //console.log('obj_half_width', obj_half_width);
         cwidth = canvas.getWidth();
         var divided = Math.round(cwidth/2);
         //console.log('divided', divided);
          rest_left =  Math.round( divided - obj_half_width );
         //console.log('rest_left',rest_left);
         //if(rest_left > 0 )
            object.left = rest_left;
            
           
			object.lockMovementY = true;
			object.lockMovementX = true;
      }
      object.hasControls = object.hasBorders = false;
      //object.lockMovementY = true;
      //object.lockMovementX = true;

      object.on('object:selected', onObjectSelected);
      canvas.requestRenderAll();

   });

   canvas.requestRenderAll();
   canvas.includeDefaultValues = true;
   var to_svg = canvas.toSVG();

   //var div_with_svg = '<div class="col-lg-3 col-md-3 pl-1 pr-1 pt-1 pb-1">'+to_svg+'</div>';
   //$('div#idcards').append(div_with_svg);           
function onObjectSelected(e, cwidth) {
   var objectType = e.target.get('type');
   if( objectType === 'i-text'){
      e.target.set('width',cwidth);
      e.target.set('textAlign','center');
      console.log('object', e.target);
   }
}                    
<?php  $i++; endforeach; endif; ?>
	<?php if (!empty($postdata['task']) && $postdata['task'] == 'save' ){ ?>
		$(document).ready(function() {
			$('#frmsave').submit();
		});
	<?php } ?>	
</script>	
 <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"></script>	