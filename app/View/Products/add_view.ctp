<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Verkkokauppa</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/modal_img.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/jumbotron-narrow.css" rel="stylesheet">

    <!-- Font-Awesome CDN-->  
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
  </head>

  <body>

    <div class="container-narrow">

    <div class="container-narrow">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li><a href="/products/index">Tuotehaku</a></li>
          <li class="active"><a href="/products/addView">Lisää tuote</a></li>
        </ul>
     <h3 class="text-muted">Verkkokauppa</h3>
    </div>   

      <div class="jumbotron">
        <h1>Verkkokauppa</h1>        
      </div>

      <?php
        $stuff = $this->Session->read('stuff');

        var_dump($stuff);

      ?>

      <br />
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
      
       <?php echo $this->BootstrapForm->input('Product.product_name', array('placeholder' => 'Tuotenimi', 'label' => false)); ?>   

       <?php echo $this->BootstrapForm->input('Product.product_price', array('placeholder' => 'Hinta', 'label' => false)); ?>

       <?php echo $this->BootstrapForm->input('Product.product_language', array('placeholder' => 'Kieli', 'label' => false)); ?> 
       

       Valitse tuotekoodi:   
       <?php echo $this->BootstrapForm->select('Product.ptype_id', $options, array('empty' => false)); ?>

       <br /><br />

       <?php echo $this->BootstrapForm->input('Product.product_description', array('placeholder' => 'Kuvaus', 
                                                                                   'label' => false,
                                                                                   'type' => 'textarea')); ?>

      <?php echo $this->BootstrapForm->input('Product.product_author', array('placeholder' => 'Tekija', 'label' => false)); ?>

      <?php echo $this->BootstrapForm->input('Product.product_isbn10', array('placeholder' => 'ISBN-10', 'label' => false)); ?>    
      <?php echo $this->BootstrapForm->end('Tallenna'); ?> 


    <div class="footer">
        <p>&copy; Verkkokauppa 2013</p>
    </div>
    </div> <!-- /container -->
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/js/jquery-1.10.2.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  
  </body>
</html>