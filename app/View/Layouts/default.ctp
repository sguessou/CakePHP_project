<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title_for_layout?></title>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<!-- Include external files and scripts here (See HTML helper for more info.) -->

	<?php

	echo $this->Html->css('bootstrap.min'); 
	//echo $this->Html->css('jumbotron-narrow'); 
	echo $this->Html->css('half-slider'); 
	echo $this->Html->css('modal_img'); 

	echo $this->Html->script('jquery'); 
	echo $this->Html->script('bootstrap.min'); 


	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');

	echo $this->Js->writeBuffer(array('cache' => FALSE));

	?>
	<!-- Font-Awesome CDN-->  
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
	</head>
	
	<body>



	<?php echo $this->fetch('content'); ?>


	<hr>
      
      <footer>
        <div class="row">
          <div class="col-lg-12">
            <p>Copyright &copy; Company 2013 &middot; Facebook &middot; Twitter &middot; Google+</p>
          </div>
        </div>
      </footer>

    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- Make sure to add jQuery - download the most recent version at http://jquery.com/ -->
    
  </body>
</html>