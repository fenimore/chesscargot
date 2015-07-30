<!DOCTYPE html>
<html lang="fr">
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
    <!-- Font Awesome core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Poiret+One|Quicksand&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <style>
      body {
        padding-top:40px;
      }
      .welcome {
        padding: 40px 15px;
        text-align: center;
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
            <li class="active"><a href="#">Archive</a></li>
            <li><a href="#apropos"></i>À Propos</a></li>
            <li><a href="create.php">Nouveau</a></li>
          </ul>
          <form class="navbar-form navbar-left" style="display:none;" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="cherch est sous construction">
            </div>
            <button type="submit" class="btn btn-default">Chercher</button>
          </form>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <!-- jumbotron -->
    <div class="jumbotron">
      <div class="container">
          <h1>Chesscargot</h1>
        </div>
    </div>      
    <div class="container">        
      <div class="row">
        <div class="col-md-10">
 <table class="tabletable-hover">
		                <thead>
		                  <tr>
		                    <th style="width:200px">info</th>
		                    <th style="width:80px;">blanc</th>
		                    <th style="width:80px;">noir</th>
		                    <th style="width:350px;padding-left:20px;">notation pgn</th>
		                  </tr>
		                </thead>
		                <tbody>
		                <?php
					     include 'database.php';
					     $pdo = Database::connect();
					     $sql = 'SELECT * FROM chessgames ORDER BY id DESC';
	   				   foreach ($pdo->query($sql) as $row) {
						     		echo '<tr>';
							     	echo '<td>'. $row['info'] . '</td>';
							     	echo '<td>'. $row['white'] . '</td>';
							     	echo '<td>'. $row['black'] . '</td>';
                                    echo '<td style="font-family:monospace;padding:20px;">'. $row['pgn'] . '</td>';
							     	echo '<td>';
							     	echo '<a class="btn btn-primary index-button" href="update.php?id='.$row['id'].'" style="margin-top:15%"><span class="glyphicon glyphicon-play-circle" aria-hidden="true"></span> Charger</a>';
							     	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
								  echo '<br>';
							     	echo '<a class="btn btn-default index-button" href="delete.php?id='.$row['id'].'" style="margin-top:5%"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Supprimer</a>';
							     	echo '</td>';
							     	echo '</tr>';
					     }
					     Database::disconnect();
					    ?>
				        </tbody>
	              </table>
        </div>
      </div>
      <a id="apropos"></a>
      <hr width="100%">
      <div class="row">
        <div class="col-md-4">
          <h2>A Propos</h2>        
          <p>Celui-ci est une base de données qui peut être utilisé par n’importe qui. C'est pour des jeux lents, comme des escargots, et des jeux privés. Le logiciel d'échecs utilise deux bibliothèques très raffinés: <a href="http://chessboardjs.com/">chessboard.js</a> pour l'échiquier et <a href="https://github.com/jhlywa/chess.js/">chess.js</a>
             pour la validation des coups.
             </p>
            <p>Le code source est <a href="https://github.com/polypmer/chesscargot">ici</a>.
            </p>
        </div>
        <div class="col-md-5">
          <h3>Comment Jouer</h3>
          <p>Pour lancer un défi, sélectionnez ‘Nouveau’. Puis remplissez les champs: info, nom de blanc, nom de noir, et le notation PGN. Cette dernière option est comment faire l’ouverture. <br>Par exemple: <code>1. e4</code>.
          </p>
          <br><div class=text-center><a class="btn btn-lg btn-primary" href="create.php">Lancez un defi</a></div>
        </div>
      </div>
      <div class="row"style="margin-bottom:10%">
        <div class="col-md-4">
          <img style="width:50%;height:auto;margin-left:15%"  src="img/play.png" />
          <br>
          <h4>PGN?</h4>
          <p>PGN (Portable Game Notation) est une notation algébrique qui est facile à lire ou écrire (pour humaines, pas comme <a href="http://en.wikipedia.org/wiki/Forsyth%E2%80%93Edwards_Notation"> notation FEN</a>). <a href="http://www.iechecs.com/notation.htm#intro">Cliquez ici</a> pour une introduction, <span style="color:red"> or <a href="http://www6.chessclub.com/help/PGN-spec">here</a> for English.</span>
          </p>
        </div>
        <div class="col-md-5">
          <h3>Notation PGN</h3>
          <p>Pour PGN, chaque coup est representé avec des lettres et chiffres. Ce applis utilise le notation Anglais; ça veux dire que K=roi, Q=dame, B=fou, N=cavalier, et R=tour (aucun lettre majuscule indique le pion). De l'échiquier, les axes du bas sont alphabétiques, les axes côtés sont numériques. Chaque coup est composé d'un mouvement blanc et noir (en ce ordre). Finalement, il y a quelques autres notations, comme 'x' (qui veux dire, prendre) et '+' (qui veux dire, échec).<b> Au fait, il ne faut pas que vous connaissiez comment lire PGN pour jouer avec ce applis.</b></p>
          <p>Mais, c'est comme ça que ce programme marche. Il lis les coups dans la boîte “notation PGN.” <b>Quand vous voulez faire un coup (ou ajouter un coup dans la base de données), tapez-le dans la boîte de saisie, qui montre les mouvements précédents. Pour se dépêcher, faisez votre coup sur l'échiquier, cliquez 'Copier', et puis 'Sauvegarder.'</b>
          </p>
        </div>
      </div>
      <div class="row text-center">
<hr>
	    <a href="http://another.workingagenda.com">Fenimore Love</a> | 2015  - <a href="https://github.com/polypmer/chesscargot">code source (GPL)</a><br><br>
      </div>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>

