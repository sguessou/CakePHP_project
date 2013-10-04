
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
          <?php if ( ! $count) :?>
            <i class="icon-shopping-cart"></i>&nbsp;Ostoskorisi on tyhjä!
          <?php elseif ($count == 1) :?>
            <i class="icon-shopping-cart"></i>&nbsp;<?php echo $this->Js->link('Sisältö '.$count.' tuote',
                                                                               array('controller' => 'products',
                                                                                     'action' => 'index'),
                                                                               array('update' => '#viewCart')
                                                                          ); ?>
           <?php elseif ($count > 1) :?>
            <i class="icon-shopping-cart"></i>&nbsp;<?php echo $this->Js->link('Sisältö '.$count.' tuotetta',
                                                                               array('controller' => 'products',
                                                                                     'action' => 'index'),
                                                                               array('update' => '#viewCart')
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

         <div class="col-lg-6">

   
         

      <div class="panel panel-default">
            <div class="panel-heading"><h4><i class="icon-search"></i>&nbsp;&nbsp;Tuotehaku</h4></div>
        <div class="panel-body">    

     
      <?php 

      $options = array();

      foreach ($ptypes as $ptype)
      {
        $options[$ptype['Product_type']['ptype_id']] = $ptype['Product_type']['type_name'];
      }
      
      ?>
      
       <h4>Anna hakemasi tuotteen nimi tai osa siitä:</h4>

       <?php echo $this->BootstrapForm->create('Products', array('action' => 'search')); ?> 
      
       <?php echo $this->BootstrapForm->input('Product.product_name', array('placeholder' => 'Syöttää nimeke', 'label' => false)); ?>       
       
       Valitse tuotekoodi:   
       <?php echo $this->BootstrapForm->select('Product.ptype_id', $options, array('empty' => false)); ?>

       <br />
       <br />

       Järjestä tuotenimen mukaisesti:
       <?php echo $this->Form->checkbox('order'); ?>
       
       <br />
       <br />

       <?php echo $this->BootstrapForm->end('Etsi Tuoteitta'); ?>

            </div><!--//Panel-body-->
          </div><!--//Panel-default-->   
        </div><!--//col-lg-6-->
        <div class="col-lg-6">
           <div id="viewCart"></div>
        </div>
      </div><!--//row-->
 