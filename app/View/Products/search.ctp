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

    <!-- Font-Awesome CDN-->  
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
  </head>

  <body>

    <div class="container-narrow">

      <div class="jumbotron">
        <h1>Verkkokauppa</h1>        
      </div>

      <br />
      <br />

      <div class="header"> 
        <h3 class="text-muted">Haun Tulos:</h3>
      </div>
     
     <table class="table table-hover">
       <thead>
       <tr>
          <th>Tuote</th>
          <th>Nimi</th>
       </tr>
       </thead>
       <tbody>
  
      <?php
        
        foreach ($products as $product)
        {
          echo '<tr><td>'.$product['Product']['product_id'].'</td><td><a data-toggle="modal" href="#modal_'.$product['Product']['product_id'].'">'.$product['Product']['product_name'].'</a></td></tr>';
        
      ?> 
      <!-- Modal -->  
      <div class="modal fade" id="modal_<?php echo $product['Product']['product_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><?php echo $product['Product']['product_name']; ?></h4>
          </div>
          <div class="modal-body">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
    <?php } ?>
    
    </tbody>  
    </table>   
      

    



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
