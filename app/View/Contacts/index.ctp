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

<row="well">
	<div id="success"></div>
</row="well">

<?php echo $this->Form->create(); ?>
<?php echo $this->Form->input('Contact.name', array('id' => 'name', 'label' => false)); ?>
<?php echo $this->Form->input('Contact.email', array('id' => 'email', 'label' => false)); ?>

<?php echo $this->Js->submit('Save', array('update' => '#success')); ?>

<?php echo $this->Form->submit('Normal Submit'); ?>
<?php echo $this->Form->end(); ?>



