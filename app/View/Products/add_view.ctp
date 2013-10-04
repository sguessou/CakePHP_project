

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

   
         

          

       <div id="viewCart"></div>
      
      <br />

      <div class="header"> 
        <h3 class="text-muted">Lisää Tuote:</h3>
      </div>

      <?php 

      $options = array();

      foreach ($ptypes as $ptype)
      {
        $options[$ptype['Product_type']['ptype_id']] = $ptype['Product_type']['type_name'];
      }
      
      ?>

       <?php echo $this->BootstrapForm->create('Products', array('action' => 'add')); ?> 
      
       <?php echo $this->BootstrapForm->input('Product.product_name', array('placeholder' => 'Tuotenimi', 'label' => false,
                                                                            'required' => 'required')); ?>   

       <?php echo $this->BootstrapForm->input('Product.product_price', array('placeholder' => 'Hinta', 'label' => false,
                                                                            'required' => 'required')); ?>

       <?php echo $this->BootstrapForm->input('Product.product_language', array('placeholder' => 'Kieli', 'label' => false,
                                                                            'required' => 'required')); ?> 
       

       Valitse tuotekoodi:   
       <?php echo $this->BootstrapForm->select('Product.ptype_id', $options, array('empty' => false)); ?>

       <br /><br />

       <?php echo $this->BootstrapForm->input('Product.product_description', array('placeholder' => 'Kuvaus', 
                                                                                   'label' => false,
                                                                                   'type' => 'textarea',
                                                                                'required' => 'required')); ?>

      <?php echo $this->BootstrapForm->input('Product.product_author', array('placeholder' => 'Tekija', 'label' => false,
                                                                            'required' => 'required')); ?>

      <?php echo $this->BootstrapForm->input('Product.product_isbn10', array('placeholder' => 'ISBN-10', 'label' => false,
                                                                            'required' => 'required')); ?>    
      <?php echo $this->BootstrapForm->end('Tallenna'); ?> 

</div>

</div>
    

<hr>
      
      <footer>
        <div class="row">
          <div class="col-lg-12">
            <p>Copyright &copy; Company 2013 &middot; Facebook &middot; Twitter &middot; Google+</p>
          </div>
        </div>
      </footer>

    </div><!-- /.container -->    