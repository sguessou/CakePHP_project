
    <div class="container-narrow">

    <div class="container-narrow">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li><a href="/products/index">Tuotehaku</a></li>
          <li><a href="/products/addView">Lisää tuote</a></li>
        </ul>
     <h3 class="text-muted">Verkkokauppa</h3>
    </div>   

      <div class="jumbotron">
        <h1>Verkkokauppa</h1>        
      </div>

      <br />
      <br />

      <div class="header"> 
        <h3 class="text-muted">Haun Tulos:</h3>
      </div>

  <?php if ( !$products) :?>

        <div class="alert alert-info">
            <strong>Huomio!</strong> Sinun hakusi ei tuottanut yhtään tulosta.
        </div>
  
  <?php else :?>
     
     <table class="table table-hover">
       <thead>
       <tr>
          <th>#</th>
          <th>Tuotenimi</th>
          <th><i class="icon-shopping-cart icon-large"></i></th>
       </tr>
       </thead>
       <tbody>
  
      <?php
        
        $num = 1;
        
        foreach ($products as $product)
        {
          echo '<tr><td>' . $num++ . '</td><td><a data-toggle="modal" href="#modal_' . $product['Product']['product_id'] . '">' . $product['Product']['product_name'].'</a></td><td><a href=""><i class="icon-plus"></i>&nbsp;Lisää ostoskoriin</a></td></tr>';
        
      ?> 
      <!-- Modal -->  
      <?php if ( $product['Product']['ptype_id'] == 1):?>

      <div class="modal fade" id="modal_<?php echo $product['Product']['product_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="icon-book icon-large"></i>&nbsp;<?php echo $product['Product']['product_name']; ?></h4>
          </div>
          <div class="modal-body">

                  <h4>Kuvaus:</h4><br />
                    <div class="twist_img">
                      <img src="/images/<?php echo $product['Product']['product_id']; ?>.jpg">
                      <p><?php echo $product['Product']['product_description']; ?></p>
                    </div>
                  <br />
                  
                  <h4>Tietoa tuotteesta:</h4><br />
                    
                    <ul>
                      <li><strong>Kieli:</strong>&nbsp;<?php echo $product['Product']['product_language']; ?></li>  
                      <li><strong>ISBN-10:</strong>&nbsp;<?php echo $product['Product']['product_isbn10']; ?></li>
                      <li><strong>Hinta:</strong>&nbsp;<?php echo $product['Product']['product_price']; ?>&nbsp;&euro;</li>
                    </ul>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
   
   <?php elseif ( $product['Product']['ptype_id'] == 2):?>

    <div class="modal fade" id="modal_<?php echo $product['Product']['product_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><i class="icon-film icon-large"></i>&nbsp;<?php echo $product['Product']['product_name']; ?></h4>
          </div>
          <div class="modal-body">

           <h4>Synopsis:</h4><br />
                    <div class="twist_img">
                      <img src="/images/<?php echo $product['Product']['product_id']; ?>.jpg">
                      <p><?php echo $product['Product']['product_description']; ?></p>
                    </div>
                  <br />
                  
                  <h4>Tietoa tuotteesta:</h4><br />
                    
                    <ul>
                      <li><strong>Kieli:</strong>&nbsp;<?php echo $product['Product']['product_language']; ?></li>  
                      <li><strong>ISBN-10:</strong>&nbsp;<?php echo $product['Product']['product_isbn10']; ?></li>
                      <li><strong>Hinta:</strong>&nbsp;<?php echo $product['Product']['product_price']; ?>&nbsp;&euro;</li>
                    </ul>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
   
   <?php endif ?> 
    
    <?php } ?>
    
    </tbody>  
    </table>   

<?php endif ?>      

    
