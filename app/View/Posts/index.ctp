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

             
                <form class="form-horizontal" role="form" action="" method="post">
                  <div class="form-group">
                    <label for="nimi" class="col-lg-2 control-label">Nimi</label>
                    <div class="col-lg-6">
                      <input type="text" class="form-control" name="nimi" placeholder="Kirjoita nimesi" required="required">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-lg-2 control-label">Sähköposti</label>
                    <div class="col-lg-6">
                      <input type="email" class="form-control" name="email" placeholder="e.g. nimi.sukunimi@gmail.com">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="viesti" class="col-lg-2 control-label">Viesti</label>
                    <div class="col-lg-6">
                      <textarea class="form-control" name="viesti" rows="4" placeholder="Kirjoita viestisi..."></textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="void" class="col-lg-2 control-label"></label>
                  </div>

                 <div class="form-group">
                    <label for="void" class="col-lg-2 control-label"></label>
                    <div class="col-lg-6">
                      <button type="submit" class="btn btn-default">Kirjoita vieraskirjaan</button>
                    </div>
                  </div>
                </form>
                 

                
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

          <?php var_dump($posts) ?>


          

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
