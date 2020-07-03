<link href='http://fonts.googleapis.com/css?family=Oswald|Lobster|Fontdiner+Swanky|Crafty+Girls|Pacifico|Satisfy|Gloria+Hallelujah|Bangers|Audiowide|Sacramento' rel='stylesheet' type='text/css'>
<link href="<?php echo asset_url(); ?>/front/studio/css/style.css" rel="stylesheet">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
<img src="<?php echo asset_url(); ?>/images/canvas/card1_front_bg.jpg" id="my-image" style="display:none">
<script type="text/javascript" src="<?php echo asset_url(); ?>/front/studio/fabric.js"></script>
<div class="tempalets_list_content">
    <div class="my_templates">
     <form name="frm_created_templates" id="frm_created_templates" action="" method="post" >
         <input type="hidden" name="template_id" id="template_id" value="" />
         <input type="hidden" name="product_id" id="product_id" value="" />
        <?php if( !empty($template) > 0 ){ ?>
             <?php if( isset($template['template_data_json']) && $template['template_data_json'] != '' ) { ?>
                    <div class="col-lg-12 canvas-container" >
                <div class="col-lg-5" >
                <canvas id="canvas_<?php echo $template['id']; ?>" width="948" height="448"></canvas>
                </div>
                <div class="col-lg-7" >
                <div class="col-lg-12" >
                   <h3 class="col-lg-4 my-template-name" > Saved as </h3> <h3 class="col-lg-8 my-template-name"><?php echo $template['template_name']; ?></h3>
                </div>
                <div class="col-lg-12" >
                    <hr>
                </div>
                   
                        <?php 
                          
                            $properties = (array) json_decode($template['template_data_json']);
                           foreach($properties as $prop){
                               echo "<pre>";
                               print_r($prop);
                               echo "</pre>";
                            $arr = (array) $prop;
                            foreach($arr as $k => $v){
                                $cArr = (array)  $v;
                               if(isset($cArr['type']) && $cArr['type'] == 'i-text' && strpos($cArr['id'],'label') === false){
                                    ?>
                                     <div class="col-lg-12 form-group" >
                                    <?php 
                                     $arr = explode("control_", $cArr['id']);
                                     $arr =  array_reverse( $arr);
                                     $name =  $arr[0];
                                     
                                    
                                    ?>
                                        
                                       
                                         </label>
                                    <div class="col-lg-12"><input type="text" class="form-control" name="<?php echo $cArr['id'];?>" id="<?php echo $cArr['id'];?>" value="<?php echo $cArr['text']; ?>" onchange="javascript:changeValue();" > </div>
                                    </div>
                                   <?php
                               }
                            }
                           
                           }
                        ?>
                   
                    </div>
                </div>
                <?php } ?>
            
        <?php }else{ ?>
            <div class="col-lg-12" >Not template created.</div>
            <?php }?> 
    <!-- /.col -->
    </div>
</div>
<?php if( count($template) > 0 ){ ?>
    <script>
            <?php if( isset($template['template_data_json']) && $template['template_data_json'] != '' ) { ?>
                var c = new fabric.Canvas('canvas_<?php echo $template['id']; ?>');
                var json = <?php echo $template['template_data_json']; ?>;
                c.loadFromJSON(json, c.renderAll.bind(c), function(o, object) {
                    object.set('selectable', false);
                });
            <?php } ?>
    </script>
<?php } ?>

