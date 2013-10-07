<h2>Contact</h2>
<?php 
echo $this->BootstrapForm->create('Contact', array('type'=>'file'));
echo $this->BootstrapForm->input('name');
echo $this->BootstrapForm->input('email');
echo $this->BootstrapForm->input('message');
echo $this->BootstrapForm->input('filename',array('type' => 'file'));
echo $this->Form->end('Submit');
?>