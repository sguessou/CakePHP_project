

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

       

      
    
      

    



    