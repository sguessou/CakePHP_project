<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Vieraskirja</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/jumbotron-narrow.css" rel="stylesheet">

    <!-- Font-Awesome CDN-->  
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
  </head>

  <body>

    <div class="container-narrow">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
        <h3 class="text-muted">Vieraskirja</h3>
      </div>

      <div class="jumbotron">
        <h1>Vieraskirja</h1>
        <p class="lead">Asiallista keskustelua, kiitos.
          Vieraskirjan käyttäjän sähköposti tulee olla oikea, jotta kysymyksiinne voidaan vastata sähköisesti myös postille.</p>
        <p><a data-toggle="modal" href="#myModal" class="btn btn-large btn-success" href="#">Kirjoita vieraskirjaan</a></p>
      </div>

      <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Kirjoita vieraskirjaan</h4>
              </div>
              <div class="modal-body">

             
               <?php 

                 echo $this->Form->create('Post', array('action' => 'add')); 
                 echo $this->Form->input('name');
                 echo $this->Form->input('email');
                  echo $this->Form->input('message', array('rows' => '3'));
                  echo $this->Form->end('Save Post');

                 ?>
                 

                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

      <div class="row marketing">
        <div class="col-lg-12">
          <h1><i class="icon-envelope-alt"></i>&nbsp;Viestit</h1>
          <br />
          <br />

          <?php //var_dump($posts) ?>

          <table class="table table-striped">
              <?php foreach ($posts as $post): ?>
               <tr>
               <td>
               <strong><?php echo $post['Post']['name']; ?></strong> kirjoitti:<br />
               <small><?php echo $post['Post']['created_at']; ?></small>
               <p><?php echo $post['Post']['message']; ?></p>
               </td>
               </tr>
              <?php endforeach; ?>
          </table>
          

        </div>




        
      </div>

      <div class="footer">
        <p>&copy; Company 2013</p>
      </div>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/js/jquery-1.10.2.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
  
  </body>
</html>
