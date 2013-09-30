

    <div class="container-narrow">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="/products/index">Tuotehaku</a></li>
          <li><a href="/products/addView">Lisää tuote</a></li>
        </ul>
     <h3 class="text-muted">Verkkokauppa</h3>
    </div>

   
    <div class="jumbotron">
      <h1>Verkkokauppa&nbsp;<small>&copy;</small></h1>        
    </div>

    
    <div id="viewCart">
    

      <br />

      <?php if ( ! $count) :?>
        <div class="alert alert-info">
           <i class="icon-shopping-cart icon-large"></i>&nbsp;Ostoskorisi on tyhjä!
        </div>
      <?php elseif ($count == 1) :?>
        <div class="alert alert-info">
          <i class="icon-shopping-cart icon-large"></i>&nbsp;Sisältö <strong><?php echo $count; ?></strong> tuote 
          <div class="pull-right">
            <?php echo $this->Form->create(); ?> 
            <?php echo $this->Js->submit('Näytä ostoskori', array('update' => '#viewCart')); ?>
            <?php echo $this->Form->end(); ?>
          </div>
          <br />&nbsp;
        </div>
       <?php elseif ($count > 1) :?>
        <div class="alert alert-info">
          <i class="icon-shopping-cart icon-large"></i>&nbsp;Sisältö <strong><?php echo $count; ?></strong> tuotetta 
          <div class="pull-right">
            <?php echo $this->Form->create(); ?> 
            <?php echo $this->Js->submit('Näytä ostoskori', array('update' => '#viewCart')); ?>
            <?php echo $this->Form->end(); ?>
          </div>
          <br />&nbsp;
        </div>  
      <?php endif ?>  

      </div><!-- //viewCart--> 
      
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

       

      
    
      

    



    