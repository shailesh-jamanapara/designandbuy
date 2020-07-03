<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
<div class="tab-content col-sm-12">
<div class="row mt-2 pt-2">
                     <!-- /.col -->
                     
                     <ul class="list-group">
                        <li class="list-group-item"><h5 class="text-danger">Error while importing data from excel sheet. Please correct below rows and try again later.</h5></li>
                     <?php  if(!empty($errors)) :  $i = 1; foreach($errors as $error) : ?>
                           <li class="list-group-item text-danger"><?php echo $error; ?></li>
                     <?php  $i++; endforeach; endif; ?>
                     </ul>
								
</div>

