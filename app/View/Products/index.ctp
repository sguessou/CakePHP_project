
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

          <p id="cartCount" class="navbar-text pull-right"></p>

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

              <div id="viewCart"></div>
   
         

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

       Järjestä tuotenimen mukaisesti:&nbsp;<i class="icon-sort-by-alphabet"></i>&nbsp;
       <?php echo $this->Form->checkbox('order'); ?>
       
       <br />
       <br />
       <a href="#" id="searchDB" class="btn btn-info"><i class="icon-hdd"></i>&nbsp;Etsi Tuoteitta</a> 
       <?php echo $this->BootstrapForm->end(); ?>

            </div><!--//Panel-body-->
          </div><!--//Panel-default-->   
        </div><!--//col-lg-6-->
        <div class="col-lg-6">
           
          <div id="searchResult"></div>

        <div class="panel panel-default">
          <div class="panel-heading"><h4><i class="icon-random"></i>&nbsp;&nbsp;Random products:</h4></div>
           <div class="panel-body">
               <div id="randomProducts"></div> 
          </div><!--//Panel-body-->
        </div><!--//Panel-default-->  

        </div>
      </div><!--//row-->


      <hr>
      
      <footer>
        <div class="row">
          <div class="col-lg-12">
            <p>Copyright &copy; Company 2013 &middot; Facebook &middot; Twitter &middot; Google+</p>
          </div>
        </div>
      </footer>

    </div><!-- /.container -->

<script>    
    

$(document).ready(function() {

    var $randomProducts = $('#randomProducts');

    $('#cartCount').load("<?php echo $baseUrl; ?>/products/cartCount");  
    
    $randomProducts.load("<?php echo $baseUrl; ?>/products/randomProducts");

    setInterval(function() {
        $randomProducts.load("<?php echo $baseUrl; ?>/products/randomProducts").hide().fadeIn(2000);
                            }, 5000); 
});//ready

    
    function emptyCart()
    {
      var request = $.ajax({
                type: "GET",
                 url: "<?php echo $baseUrl; ?>/products/emptyCart" 
                });

            request.done(function() {
                $('#viewCart').load("<?php echo $baseUrl; ?>/products/addToCart", function() {
                  $('#cartCount').load("<?php echo $baseUrl; ?>/products/cartCount"); 
                });
            });
           
          request.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
          });
    }

     function addToCart(pid)
       {
        var request = $.ajax({
            type: "POST",
             url: "<?php echo $baseUrl; ?>/products/addItem/", 
            data: {pid: pid}
            });

        request.done(function() {
            $('#viewCart').load("<?php echo $baseUrl; ?>/products/addToCart", function() {
              $('#cartCount').load("<?php echo $baseUrl; ?>/products/cartCount"); 
            });
        });
       
      request.fail(function( jqXHR, textStatus ) {
        alert( "Request failed: " + textStatus );
      });

      }

      
    function showCart()
    {
       $('#viewCart').load("<?php echo $baseUrl ?>/products/addToCart");
    }
  
    //This function is called when search button is clicked.
(function() {

      $('#searchDB').on('click', function(e) {

        //If text input empty
        if ( ! $.trim( $('#ProductProductName').val() ))
          textInput = 0;
        else
          textInput =  $('#ProductProductName').val();  

        var val = 0;
        if ($('#order').is(':checked')) val = 1;
        $('#searchResult').load("<?php echo $baseUrl; ?>/products/search/" +  textInput + "/" 
                      + $('#ProductPtypeId').val() + "/" + val); 

        e.preventDefault();
     });
})();
    
    </script>
 