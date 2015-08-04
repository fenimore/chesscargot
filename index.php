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

    <title>Eschescargot</title>
    
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="css/chessboard-0.3.0.css">
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
      .section-examples h4 {font-family:sans-serif;}

    </style>
        <!-- Javascript
    ================================================== -->
    <!-- Placed at the start of the document for the chessboard generation -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
		<script src="js/chessboard-0.3.0.js"></script>
		<script src="js/chess.js"></script>

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
            <li><a href="#recent">Archive</a></li>
            <li><a href="#apropos"></i>À Propos</a></li>
            <li><a href="#lancer">Nouveau</a></li>
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
          <h1 style="color:#6ab293">Echescargot</h1>
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
		                    <th style="width:350px;padding-left:20px;" class="hidden-xs">notation pgn</th>
		                  </tr>
		                </thead>
		                <tbody>
		                <?php
					     include 'database.php';
					     $pdo = Database::connect();
					     $sql = 'SELECT * FROM chessgames ORDER BY id ASC';
	   				   foreach ($pdo->query($sql) as $row) {
						     		echo '<tr>';
							     	echo '<td>'. $row['info'] . '</td>';
							     	echo '<td><div id="player'.$row['white'].'-'.$row['id'].'">'. $row['white'] . '</div></td>';
							     	echo '<td><div id="player'.$row['black'].'-'.$row['id'].'">'. $row['black'] . '</div></td>';
                    echo '<td style="font-family:monospace;padding:20px;" class="hidden-xs">'. $row['pgn'] . '</td>';
							     	echo '<td>';
							     	echo '<a class="btn btn-primary index-button" href="update.php?id='.$row['id'].'" style="margin-top:15%"><span class="glyphicon glyphicon-play-circle" aria-hidden="true"></span> Charger</a>';
							     	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
								    echo '<br>';
							     	echo '<a class="btn btn-default index-button" href="delete.php?id='.$row['id'].'" style="margin-top:5%"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Supprimer</a>';
							     	echo '</td>';
							     	echo '<td>';
							     	echo '<div id=board'.$row['id'] .' style="width:170px;padding:5px;"> </div>';
                    echo '<script>';
                    echo 'var position = "'.$row['fen'].'";';
                    echo 'var board'.$row['id'].' = ChessBoard("board'.$row['id'].'",{position: position,  showNotation: false });';
                    echo 'var chess = new Chess("'.$row['fen'].'");';
                    echo 'if (chess.turn() === "b") {board'.$row['id'].'.flip();document.getElementById("player'.$row['black'].'-'.$row['id'].'").style.color = "#B0464C";document.getElementById("player'.$row['black'].'-'.$row['id'].'").style.fontWeight = "bolder";document.getElementById("player'.$row['black'].'-'.$row['id'].'").style.textTransform = "uppercase";};';
                    echo 'if (chess.turn() === "w") {document.getElementById("player'.$row['white'].'-'.$row['id'].'").style.color = "#B0464C";document.getElementById("player'.$row['white'].'-'.$row['id'].'").style.fontWeight = "bolder";document.getElementById("player'.$row['white'].'-'.$row['id'].'").style.textTransform = "uppercase";};';
                    echo '</script>';
							     	echo '</td>';
							     	echo '</tr>';
					     }
					     Database::disconnect();
					    ?>
				        </tbody><a id="recent"></a>
	              </table>
        </div>
      </div>
      <a id="apropos"></a>
      <hr width="100%">
      <div class="row">
        <div class="col-md-4">
          <h2>A Propos</h2>        
          <p>Celui-ci est une base de données qui peut être utilisée par n’importe qui. C'est pour des jeux lents, comme des escargots, et des jeux privés. Le logiciel d'échecs utilise deux bibliothèques très raffinés: <a href="http://chessboardjs.com/">chessboard.js</a> pour l'échiquier et <a href="https://github.com/jhlywa/chess.js/">chess.js</a>
             pour la validation des coups.
             </p>
            <p>Le code source est <a href="https://github.com/polypmer/chesscargot">ici</a>.
            </p>
        </div>
        <div class="col-md-5">
          <h3>Comment Jouer</h3>
          <p>Pour lancer un défi, sélectionnez ‘Nouveau’. Puis remplissez les champs: info, nom de blanc, nom de noir, et le notation PGN. Cette dernière option est comment faire l’ouverture. <br>Par exemple: <code>1. e4</code>.
          </p>
          <br><div class=text-center><a class="btn btn-lg btn-primary" href="#lancer">Lancez un defi</a></div>
        </div>
      </div>
      <div class="row"style="margin-bottom:10%">
        <div class="col-md-4">
          <img style="width:50%;height:auto;margin-left:15%"  src="img/play.png" />
          <br>
          <h4>PGN?</h4>
          <p>PGN (Portable Game Notation) est une notation algébrique qui est facile à lire ou écrire (pour humaines, pas comme <a href="http://en.wikipedia.org/wiki/Forsyth%E2%80%93Edwards_Notation"> notation FEN</a>). <a href="http://www.iechecs.com/notation.htm#intro">Cliquez ici</a> pour une introduction, <span style="color:#B0464C"> or <a href="http://www6.chessclub.com/help/PGN-spec">here</a> for English.</span>
          </p>
        </div>
        <div class="col-md-5">
          <h3>Notation PGN</h3>
          <p>Pour PGN, chaque coup est representé avec des lettres et chiffres. Ce applis utilise la notation Anglais; ça veut dire que K=roi, Q=dame, B=fou, N=cavalier, et R=tour (aucun lettre majuscule indique le pion). De l'échiquier, les axes du bas sont alphabétiques, les axes côtés sont numériques. Chaque coup est composé d'un mouvement blanc et noir (en ce ordre). Finalement, il y a quelques autres notations, comme 'x' (qui veut dire, prendre) et '+' (qui veut dire, échec).<b> Au fait, il ne faut pas que vous connaissiez comment lire PGN pour jouer avec ce applis.</b></p>
          <p>Mais, c'est comme ça que ce programme marche. Il lit les coups dans la boîte “notation PGN.” <b>Quand vous voulez faire un coup (ou ajouter un coup dans la base de données), tapez-le dans la boîte de saisie, qui montre les mouvements précédents. Pour se dépêcher, faitez votre coup sur l'échiquier, cliquez 'Copier', et puis 'Sauvegarder.'</b>
          </p>
        </div>
      </div>
    	<div class="row"><a id="lancer"></a>
		    	<h2 style="padding-left:15px;">Créer</h2>
		    	<h3 style="padding-left:15px;">Quelques ouvertures:</h3>
		  </div>
			  <div class="row section-examples">
					  <div class="col-md-3 text-center">
					  <div id="boarde4" style="width: 200px; float: left; margin-right: 10px"></div><br>
					  <h4>1. e4</h4>
						</div>
					  <div class="col-md-3 text-center">
            <div id="boardd4" style="width: 200px; float: left; margin-right: 10px"></div><br>
					    <h4>1. d4</h4>
						</div>
					  <div class="col-md-3 text-center">
            <div id="boardNf3" style="width: 200px; float: left"></div><br>
					    <h4>1. Nf3</h4>
						</div>
				</div>				
				<hr>
	    	<form action="create.php" method="post">
			<div class="row" style="margin-top:10px">
					    <div class="col-md-3">
					      <label class="text-uppercas">info</label><br>
					      	<input name="info" type="text"  class="form-control" placeholder="info" value="<?php echo !empty($info)?$info:'';?>">
                <label class="text-uppercas">notation pgn</label><br>
									<input name="pgn" type="text"  class=" form-control" placeholder="coup d'ouverture (ou vide)" value="<?php echo !empty($pgn)?$pgn:'';?>">
							</div>
						  <div class="col-md-3">
					      <label class="text-uppercas">blanc</label><br>
					        	<input name="white" type="text" class="form-control" placeholder="nom de blanc" value="<?php echo !empty($white)?$white:'';?>">
					      <label class="text-uppercas">noir</label><br>
					        	<input name="black" class=" form-control" type="text" placeholder="nom de noir" value="<?php echo !empty($black)?$black:'';?>">
                  <div style="display:none">
                    <label>comments</label><br>
									  <input name="comments" type="text" placeholder="comments" value="<?php echo !empty($comments)?$comments:'';?>">
							    </div>
						  </div>
					    <div class="col-md-3"><br>
						    <button type="submit" class="btn btn-lg btn-primary">Commence</button>
						  </div>
				</div>
			</form><!-- form -->
      <div class="row text-center">
<hr>
	    <a href="http://another.workingagenda.com">Fenimore Love</a> | 2015  - <a href="https://github.com/polypmer/chesscargot">code source (GPL)</a><br><br>
      </div>
    </div><!-- /.container -->
    <script>
    //var board-e4 = ChessBoard("board-e4",{position: "rnbqkbnr/pppppppp/8/8/4P3/8/PPPP1PPP/RNBQKBNR b KQkq e3 0 1",  showNotation: true });
    //var board-d4 = ChessBoard("board-d4",{position: "rnbqkbnr/pppppppp/8/8/3P4/8/PPP1PPPP/RNBQKBNR b KQkq d3 0 1",  showNotation: true });
    //var board-Nf3 = ChessBoard("board-Nf3",{position: "rnbqkbnr/pppppppp/8/8/8/5N2/PPPPPPPP/RNBQKB1R b KQkq - 1 1",  showNotation: true });
var boarde4 = ChessBoard('boarde4', {
  position: 'rnbqkbnr/pppppppp/8/8/4P3/8/PPPP1PPP/RNBQKBNR b KQkq e3 0 1',
  showNotation: true
});

var boardd4 = ChessBoard('boardd4', {
  position: 'rnbqkbnr/pppppppp/8/8/3P4/8/PPP1PPPP/RNBQKBNR b KQkq d3 0 1',
  showNotation: true
});

var boardNf3 = ChessBoard('boardNf3', {
  position: 'rnbqkbnr/pppppppp/8/8/8/5N2/PPPPPPPP/RNBQKB1R b KQkq - 1 1',
  showNotation: true
});
    </script>
  </body>
</html>

