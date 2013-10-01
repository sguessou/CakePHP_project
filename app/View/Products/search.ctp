
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
        <h1>Verkkokauppa&nbsp;<small>&copy;</small></h1>        
      </div>

      <br />

      <div id="cartData">

        <?php if ( ! $count) :?>
        <div class="alert alert-info">
           <i class="icon-shopping-cart icon-large"></i>&nbsp;Ostoskorisi on tyhjä!
        </div>
      <?php elseif ($count == 1) :?>
        <div class="alert alert-info">
          <i class="icon-shopping-cart icon-large"></i>&nbsp;Sisältö <strong><?php echo $count; ?></strong> tuote 
          <div class="pull-right">
            <?php echo $this->Form->create(); ?>
            <?php echo $this->Form->input('Form.action', array(
                                                                     'type' => 'hidden', 
                                                                     'value' => 'showCart')); ?>  
            <?php echo $this->Js->submit('Näytä ostoskori', array('update' => '#cartData')); ?>
            <?php echo $this->Form->end(); ?>
          </div>
          <br />&nbsp;
        </div>
       <?php elseif ($count > 1) :?>
        <div class="alert alert-info">
          <i class="icon-shopping-cart icon-large"></i>&nbsp;Sisältö <strong><?php echo $count; ?></strong> tuotetta 
          <div class="pull-right">
            <?php echo $this->Form->create(); ?> 
            <?php echo $this->Form->input('Form.action', array(
                                                                     'type' => 'hidden', 
                                                                     'value' => 'showCart')); ?> 
            <?php echo $this->Js->submit('Näytä ostoskori', array('update' => '#cartData')); ?>
            <?php echo $this->Form->end(); ?>
          </div>
          <br />&nbsp;
        </div>  
      <?php endif ?>  

      </div> <!-- //cartData -->
      <br />

      <div class="header"> 
        <h3 class="text-muted">Haun Tulos:</h3>
      </div>



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
          <td><a data-toggle="modal" href="#modal_<?php echo $product['Product']['product_id']; ?>">   
           <?php echo $product['Product']['product_name']; ?></a></td>
          <td>
          <?php echo $this->Form->create('Product', array('action' => 'search')); ?>
          
          <?php echo $this->Form->input('Cartitem.product_id', array(
                                                                     'type' => 'hidden', 
                                                                     'value' => $product['Product']['product_id'])); ?>

          <?php echo $this->Form->input('Cartitem.cart_id', array(
                                                                     'type' => 'hidden', 
                                                                     'value' => $this->Session->read('cartId'))); ?>  
           <?php echo $this->Form->input('Form.action', array(
                                                                     'type' => 'hidden', 
                                                                     'value' => 'addProduct')); ?> 


          <?php echo $this->Js->submit('Lisää ostoskoriin', array('update' => '#cartData')); ?>
          
          <?php echo $this->Form->end(); ?>

          </td>
          </tr>
        
        

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
   
   <?php endif; ?> 
    
   <?php endforeach; ?> 
    
    </tbody>  
    </table>   

<?php endif; ?>      

    
