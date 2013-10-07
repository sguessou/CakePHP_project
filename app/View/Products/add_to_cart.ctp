
<?php if ($dataitems) :?>


  <div class="panel panel-default">
  <div class="panel-heading"><h4><i class="icon-shopping-cart"></i>&nbsp;&nbsp;Ostoskori</h4></div>
  <div class="panel-body">
    
  
  
  <table class="table table-hover">
         <thead>
         <tr>
            <th>#</th>
            <th>Tuotenimi</th>
            <th>Hinta</th>
         </tr>
         </thead>
         <tbody>
    
        <?php $num = 1; ?>
          
         <?php foreach ($dataitems as $dataitem) :?>
          
            <tr>
            <td><?php echo $num++; ?></td>

            <?php if ( $dataitem['product_types']['typeName'] == 'Book') :?>
                <td><i class="icon-book"></i>&nbsp;&nbsp;<a data-toggle="modal" href="#modal_<?php echo $dataitem['products']['product_id']; ?>"><?php echo $dataitem['products']['product_name']; ?></a>
                </td>
            <?php elseif ( $dataitem['product_types']['typeName'] == 'Dvd') :?>  
                <td><i class="icon-film"></i>&nbsp;&nbsp;<a data-toggle="modal" href="#modal_<?php echo $dataitem['products']['product_id']; ?>"><?php echo $dataitem['products']['product_name']; ?></a>
                </td>
            <?php endif ?>
                
             <td><b><?php echo $dataitem['cartitems']['quantity']; ?></b> kpl à <b><?php echo $dataitem['products']['product_price'] * $dataitem['cartitems']['quantity']; ?></b></td>
            </tr>


            <!-- Modal -->  
          <?php if ( $dataitem['product_types']['typeName'] == 'Book'):?>

          <div class="modal fade" id="modal_<?php echo $dataitem['products']['product_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="icon-book icon-large"></i>&nbsp;<?php echo $dataitem['products']['product_name']; ?></h4>
              </div>
              <div class="modal-body">

                      <h4>Kuvaus:</h4><br />
                        <div class="twist_img">
                          <img src="/images/<?php echo $dataitem['products']['product_id']; ?>.jpg">
                          <p><?php echo $dataitem['products']['product_description']; ?></p>
                        </div>
                      <br />
                      
                      <h4>Tietoa tuotteesta:</h4><br />
                        
                        <ul>
                          <li><strong>Kieli:</strong>&nbsp;<?php echo $dataitem['products']['product_language']; ?></li>  
                          <li><strong>ISBN-10:</strong>&nbsp;<?php echo $dataitem['products']['product_isbn10']; ?></li>
                          <li><strong>Hinta:</strong>&nbsp;<?php echo $dataitem['products']['product_price']; ?>&nbsp;&euro;</li>
                        </ul>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
       
       <?php elseif ( $dataitem['product_types']['typeName'] == 'Dvd'):?>

        <div class="modal fade" id="modal_<?php echo $dataitem['products']['product_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="icon-film icon-large"></i>&nbsp;<?php echo $dataitem['products']['product_name']; ?></h4>
              </div>
              <div class="modal-body">

               <h4>Synopsis:</h4><br />
                        <div class="twist_img">
                          <img src="/images/<?php echo $dataitem['products']['product_id']; ?>.jpg">
                          <p><?php echo $dataitem['products']['product_description']; ?></p>
                        </div>
                      <br />
                      
                      <h4>Tietoa tuotteesta:</h4><br />
                        
                        <ul>
                          <li><strong>Kieli:</strong>&nbsp;<?php echo $dataitem['products']['product_language']; ?></li>  
                          <li><strong>ISBN-10:</strong>&nbsp;<?php echo $dataitem['products']['product_isbn10']; ?></li>
                          <li><strong>Hinta:</strong>&nbsp;<?php echo $dataitem['products']['product_price']; ?>&nbsp;&euro;</li>
                        </ul>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
   
   <?php endif; ?> 

         <?php endforeach; ?> 

         </tbody>
         </table>  

   		
      <p><a id="emptyCart" href="#" class="btn btn-danger" onClick="emptyCart(); return false;"><i class="icon-trash"></i>&nbsp;Tyhjennä!</a></p> 
 </div><!--//Panel-body-->
</div><!--//Panel-default-->           


<?php elseif ( ! $dataitems) :?>

	<div class="alert alert-danger alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
           <strong>Huomio!</strong> Ostoskori on tyhjä!
  </div>

<?php endif; ?> 	



