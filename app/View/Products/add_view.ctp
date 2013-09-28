
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


    