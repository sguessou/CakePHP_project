<div class="panel panel-default">
            <div class="panel-heading"><h4><i class="icon-screenshot"></i>&nbsp;&nbsp;Haun Tulos:</h4></div>
        <div class="panel-body">    
     
<?php if ( ! $products) :?>

        <div class="alert alert-info">
            <strong>Huomio!</strong> Sinun hakusi ei tuottanut yhtään tulosta.
        </div>
  
  <?php else :?>
     
     <table class="table table-hover">
       <thead>
       <tr>
          <th>#</th>
          <th>Tuotenimi</th>
          <th></th>
       </tr>
       </thead>
       <tbody>
  
      <?php $num = 1; ?>
        
       <?php foreach ($products as $product) :?>
        
          <tr><td><?php echo $num++; ?></td>
          <td><a data-toggle="modal" href="#modal_<?php echo $product['products']['product_id']; ?>">   
           <?php echo $product['products']['product_name']; ?></a></td>
          <td>
            <a href="/products/addToCart" class="btn btn-info" >Lisää ostoskoriin</a>
          </td>
          </tr>
        
        

      <!-- Modal -->  
      <?php if ( $product['products']['ptype_id'] == 1):?>

      <div class="modal fade" id="modal_<?php echo $product['products']['product_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="icon-book icon-large"></i>&nbsp;<?php echo $product['products']['product_name']; ?></h4>
          </div>
          <div class="modal-body">

                  <h4>Kuvaus:</h4><br />
                    <div class="twist_img">
                      <img src="/images/<?php echo $product['products']['product_id']; ?>.jpg">
                      <p><?php echo $product['products']['product_description']; ?></p>
                    </div>
                  <br />
                  
                  <h4>Tietoa tuotteesta:</h4><br />
                    
                    <ul>
                      <li><strong>Kieli:</strong>&nbsp;<?php echo $product['products']['product_language']; ?></li>  
                      <li><strong>ISBN-10:</strong>&nbsp;<?php echo $product['products']['product_isbn10']; ?></li>
                      <li><strong>Hinta:</strong>&nbsp;<?php echo $product['products']['product_price']; ?>&nbsp;&euro;</li>
                    </ul>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
   
   <?php elseif ( $product['products']['ptype_id'] == 2):?>

    <div class="modal fade" id="modal_<?php echo $product['products']['product_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="icon-film icon-large"></i>&nbsp;<?php echo $product['products']['product_name']; ?></h4>
          </div>
          <div class="modal-body">

           <h4>Synopsis:</h4><br />
                    <div class="twist_img">
                      <img src="/images/<?php echo $product['products']['product_id']; ?>.jpg">
                      <p><?php echo $product['products']['product_description']; ?></p>
                    </div>
                  <br />
                  
                  <h4>Tietoa tuotteesta:</h4><br />
                    
                    <ul>
                      <li><strong>Kieli:</strong>&nbsp;<?php echo $product['products']['product_language']; ?></li>  
                      <li><strong>ISBN-10:</strong>&nbsp;<?php echo $product['products']['product_isbn10']; ?></li>
                      <li><strong>Hinta:</strong>&nbsp;<?php echo $product['products']['product_price']; ?>&nbsp;&euro;</li>
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

      <?php endif; ?>   

   </div><!--//Panel-body-->
   </div><!--//Panel-default-->    

   <script>
   $('#message a').click(function() {
		var href=$(this).attr('href');
		var querystring=href.slice(href.indexOf('?')+1);
		$.get('rate.php', querystring, processResponse);
		return false; // stop the link
		});
   </script>
