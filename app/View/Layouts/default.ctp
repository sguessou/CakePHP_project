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


	

    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-44753445-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
    
  </body>
</html>