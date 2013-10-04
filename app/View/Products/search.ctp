
    
      <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/products/index">Verkkokauppa</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <li><a href="/products/index">Tuotehaku</a></li>
            <li><a href="/products/addView">Lisää tuote</a></li>
          </ul>

          <p class="navbar-text pull-right">
          
           <?php if ($count > 0) :?>


            <i class="icon-shopping-cart"></i>&nbsp;<?php echo $this->Js->link('Näytä sisältö',
                                                                               array('controller' => 'products',
                                                                                     'action' => 'search',
                                                                                     'showCart'
                                                                                     ),
                                                                               array('update' => '#cartData')
                                                                          ); ?>
          <?php endif ?>   
          </p>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>
    
    <div id="myCarousel" class="carousel slide">
      <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Verkkokauppa');"></div>
            <div class="carousel-caption">
              <h1>Tervetuloa verkkokauppaan!</h1>
            </div>
          </div>
          <div class="item">
            <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Two');"></div>
            <div class="carousel-caption">
              <h1>Caption 2</h1>
            </div>
          </div>
          <div class="item">
            <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Three');"></div>
            <div class="carousel-caption">
              <h1>Caption 3</h1>
            </div>
          </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="icon-next"></span>
        </a>
    </div>

    <div class="container">
      
      <div class="row section">

      <div class="col-lg-5">
           <div id="cartData"></div>
      </div>  

      
      
      <div class="col-lg-7">
         
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


            <?php echo $this->Js->submit('Lisää koriin', array('update' => '#cartData')); ?>

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

   </div><!--//Panel-body-->
   </div><!--//Panel-default-->    
 </div><!--//col-md-6-->
 
 

 </div><!--//Row-->


<hr>
      
      <footer>
        <div class="row">
          <div class="col-lg-12">
            <p>Copyright &copy; Company 2013 &middot; Facebook &middot; Twitter &middot; Google+</p>
          </div>
        </div>
      </footer>

    </div><!-- /.container -->
    
