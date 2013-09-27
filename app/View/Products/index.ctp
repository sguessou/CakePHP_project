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

    <!-- Custom styles for this template -->
    <link href="/css/jumbotron-narrow.css" rel="stylesheet">





    <body>


    <div class="container-narrow">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="/products/index">Tuotehaku</a></li>
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
      
       
       
       <br /><br />

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


      
    
      

    



    