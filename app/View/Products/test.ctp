
  
   <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">Verkkokauppa</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <li><a href="#about">Tuotehaku</a></li>
            <li><a href="#services">Lisää tuote</a></li>
            <li><a href="#contact"></a></li>
          </ul>
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
        <div class="col-lg-2"></div>
         <div class="col-lg-8">
         

          

       <div id="viewCart">
          
          <?php if ( ! $count) :?>
            <div class="alert alert-info">
               <i class="icon-shopping-cart icon-large"></i>&nbsp;Ostoskorisi on tyhjä!
            </div>

          <?php elseif ($count == 1) :?>

            <div class="alert alert-info">
              <i class="icon-shopping-cart icon-large"></i>&nbsp;Sisältö <strong><?php echo $count; ?></strong> tuote 
              <div>
                <?php echo $this->Form->create('Products', array('action' => 'test')); ?> 
                <?php echo $this->Js->submit('Näytä ostoskori', array('update' => '#viewCart')); ?>
                <?php echo $this->Form->end(); ?>
              </div>
              <br />&nbsp;
            </div>

           <?php elseif ($count > 1) :?>
            
            <div class="alert alert-info">

              <div class="row">
              <br />
              <div class="col-lg-3">
                <i class="icon-shopping-cart icon-large"></i>&nbsp;Sisältö <strong><?php echo $count; ?></strong> tuotetta 
              </div>
               <div class="col-lg-3">
                <?php echo $this->Form->create(); ?> 
                <?php echo $this->Js->submit('Näytä ostoskori', array('update' => '#viewCart')); ?>
                <?php echo $this->Form->end(); ?>
               </div>
              </div>
             
            </div>
          
          <?php endif ?>  

       </div><!--//End viewCart-->
      
      <br />

      <div class="header"> 
        <h3 class="text-muted">Tuotehaku</h3>
      </div>
     
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


        </div>
      </div>
 