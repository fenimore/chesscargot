<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Snail Chess, Chesscargot">
    <meta name="author" content="Fenimore Love">
    <link rel="icon" href="img/favicon.ico">

    <title>Chesscargot</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <style>
      body {
        padding-top: 50px;
      }
      .welcomehelp {
        padding: 40px 15px;
      }
      .btn-primary {
        background-color: #6ab293;
                 border-color: e8e8e8;
      }
      .btn-primary:hover {
        background-color: #e8e8e8;
        color: black;
        border-color: black;
      }
    </style>

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img width="30px" height="30px" src="img/snail_shell.png"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav nav-pills">
            <li><a href="index.php">Archive</a></li>
            <li  class="active"><a href="#about">À Propos</a></li>
            <li><a href="create.php">Nouveau</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
<div class="row welcomehelp">
  <div class="col-md-3 col-md-offset-1"><br><br>  
  <h2>À Propos</h2>
  </div>
  <div class="col-md-4">  
  <img style="width:200px;height:auto;margin-left:25%;" src="img/play.png" />
  </div>

</div>
<div class="row"><hr>
  <div class="col-md-4 col-md-offset-1">
<div class="panel panel-default">
  <div class="panel-body">
        <p>Celui-ci est une base de données qui peut être utilisé par n’importe
           qui. C'est pour des jeux lents, comme des escargots, et des jeux privés.
           Le logiciel d'échecs utilise deux bibliothèques très raffinés:
           <a href="http://chessboardjs.com/">chessboard.js</a> pour l'échiquier
           et <a href="https://github.com/jhlywa/chess.js/">chess.js</a>
           pour la validation des coups.
           </p>
          <p>Le code source est <a href="https://github.com/polypmer/chesscargot">ici</a>.
          </p>
        <h4>Comment Jouer</h4>
          <p>Pour lancer un défi, sélectionnez ‘Nouveau’ dans l'archive.
            Puis remplissez les champs: info, nom de blanc, nom de noir,
            et le notation PGN. Cette dernière option est comment faire
            l’ouverture. Par exemple: <code>1. e4</code>.
          </p>
  </div>
</div>

  </div>
  <div class="col-md-4">
<div class="panel panel-default">
  <div class="panel-body">
        <h4>Notation PGN</h4>
          <p><a href="http://www.iechecs.com/notation.htm#intro">Cliquez ici</a>
            pour une introduction, <span style=”color:red”> or <a href=”http://google.com”>here</a>
            for English.</span> PGN est une notation algébrique qui est facile à
            lire ou écrire (pour humaines, pas comme
            <a href="http://en.wikipedia.org/wiki/Forsyth%E2%80%93Edwards_Notation">
              notation FEN</a>).
          </p>
          <p>
            C'est comme ça que ce programme marche. Il va lire les coups dans
             la boîte “notation PGN.” Quand tu veux faire un coup (ou ajouter le
              coup dans la base de données), tapez-le dans la boîte de saisie, la
               boîte qui montre les mouvements précédents.
          </p>
  </div>
</div>

  </div>
</div>
	  <div class="row text-center">
<hr>
	    <a href="http://polypmer.org">Fenimore Love</a> | 2015  - <a href="https://github.com/polypmer/chesscargot">code source (GPL)</a><br><br>
      </div>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

