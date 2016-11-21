<?php

    require 'database.php';

    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( !empty($_POST)) {
        // keep track validation errors
        $infoError = null;
        $whiteError = null;
        $blackError = null;
        $pgnError = null;
        $fenError = null;
        $commentsError = null;

        // keep track post values
        $info = $_POST['info'];
        $white = $_POST['white'];
        $black = $_POST['black'];
        $pgn = $_POST['pgn'];
        $fen = $_POST['fen'];
        $comments = $_POST['comments'];
        $result = $_POST['result'];

        // validate input
        $valid = true;
        if (empty($info)) {
            $infoError = 'Please enter date, or other information';
            $valid = false;
        }

        if (empty($white)) {
            $whiteError = 'who is white\?';
            $valid = false;
        }

        if (empty($black)) {
            $blackError = 'who is black?';
            $valid = false;
        }

        // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE chessgames  set info = ?, white = ?, black =?, pgn =?, fen =?, comments =?, result =? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array(htmlspecialchars($info),
                              htmlspecialchars($white),htmlspecialchars($black),htmlspecialchars($pgn), htmlspecialchars($fen),
                              htmlspecialchars($comments), htmlspecialchars($result), htmlspecialchars($id)));
            Database::disconnect();
            header("Location: index.php"); //change to update.php OR should I??????
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM chessgames where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $info = $data['info'];
        $white = $data['white'];
        $black = $data['black'];
        $pgn = $data['pgn'];
        $fen = $data['fen'];
        $comments = $data['comments'];
        Database::disconnect();
    }
?>
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

    <title>Chesscargot - Jouer</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="css/chessboard-0.3.0.css">
    <link href='http://fonts.googleapis.com/css?family=Poiret+One|Quicksand&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <style>
        #entry, #pgn {
      font-family:monospace;
    }
    </style>
        <script>
        function reset(){
          board.start(); game.clear();
          game = new Chess();
          updateStatus();}
        function flipboard() {
          board.flip();
        }
        function undomove(){
          game.undo();
          updateStatus();
            board.position(game.fen());
          //var board = new ChessBoard('board', game.fen());
          //game.load(board.fen());
        }
        function copymove(){
            document.getElementById("pgninput").value = game.pgn();
            document.getElementById("feninput").value = game.fen();
            score = "";
            if (game.in_checkmate()){
            if (game.turn() === 'b') {
              score = "1-0";
            } else {
              score = "0-1";
            }
            } else {
              score = "*";  
            }
            document.getElementById("resultinput").value = score;
        }

        function gameBack(){
          board.position(game.back());
        }
        function gameNext() {
          board.position(game.next());
        }
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/json3/3.3.2/json3.min.js"></script>
        <script src="js/chessboard-0.3.0.js"></script>
        <script src="js/chess.js"></script>
  </head>

  <body>

    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img width="30px" height="30px" src="img/snail_shell.png"> </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav nav-pills">
            <li><a href="index.php">Archive</a></li>
            <li><a href="index.php#apropos">À Propos</a></li>
            <li><a href="index.php#lancer">Nouveau</a></li>
            <li><a href="#" onclick="reset()">Dégager</a></li>			
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
                        <div class="row">
                            <div class="col-md-5">
                                <h4><small style="color:#6ab293;"><?php echo !empty($info)?$info:'';?>:&nbsp;</small>
                                    <?php echo !empty($white)?$white:'';?>&nbsp;<small style="color:#6ab293;">contre</small>&nbsp;
                                    <?php echo !empty($black)?$black:'';?></h4>
                            </div>
                            <div class="col-md-4">
                                <h4><span style="color:black" id="status"></span></h4>
                            </div>
                        </div>
                    <div class="row">
                            <div class="col-md-5">
                                <div id="board" class="img-responsive"></div>
                                <div id="gamecontrol">
<a class="btn btn-default" onclick="gameBack()"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Précédent</a>
								  <a class="btn btn-default" onclick="flipboard()"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Flip</a>
								  <a id="nextbtn" class="btn btn-default" onclick="gameNext()"> Suivant <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></a>
								  <br>
								  <a class="btn btn-info" onclick="flipboard()" style="display:none;"><span class="glyphicon glyphicon-refresh" aria-hidden="true">Renverser</a>
								</div>
							</div>
							<div class="col-md-4">
								<span title="Celui-ci contient l'état de l'échiquier"><label>L'échiquier:</label><br><span id="pgn"></span></span>
								<form name="chessconsole" action="update.php?id=<?php echo $id?>" method="post">
								<div style="display:none">
									<label class="u-full-width">info</label>
									<div class="u-full-width">
											<input name="info" type="text"  placeholder="info" value="<?php echo !empty($info)?$info:'';?>">
									</div>
								</div>
								<div style="display:none">
									<label class="u-full-width">result</label>
									<div class="u-full-width">
											<input name="result" type="text"  id="resultinput" placeholder="result" value="<?php echo !empty($result)?$result:'';?>">
									</div>
								</div>
								<div style="display:none" class="u-full-width <?php echo !empty($whiteError)?'error':'';?>">
									<label class="u-full-width">blanc</label>
									<div>
											<input name="white" type="text" placeholder="nom de blanch" value="<?php echo !empty($white)?$white:'';?>">
									</div>
								</div>
								<div style="display:none" class="u-full-width <?php echo !empty($blackError)?'error':'';?>">
									<label class="u-full-width">noir</label>
									<div>
											<input name="black" type="text"  placeholder="nom de noir" value="<?php echo !empty($black)?$black:'';?>">
									</div>
								</div>
								<div class="u-full-width">
									<span title="Celui-ci contient l'état de le base des données."><label>Notation pgn</label><br></span>
											<textarea name="pgn" class="form-control" id="pgninput" placeholder="pgn"><?php echo !empty($pgn)?$pgn:'';?></textarea>
									<span style="display:none" title="Celui-ci contient position FEN."><label>Notation fen</label><br></span>
											<textarea style="display:none" name="fen" class="form-control" id="feninput" placeholder="fen"><?php echo !empty($fen)?$fen:'';?></textarea>
									<span title="Laissez un commentaire ici."><label>Commentaires</label><br></span>
											<textarea name="comments" class="form-control" id="commentary" placeholder="comments"><?php echo !empty($comments)?$comments:'';?></textarea>
								</div><br>
									<button type="submit" class=" btn btn-primary index-button">
										<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Sauvegarder</button> &nbsp;&nbsp;&nbsp;&nbsp;
										<span title="| FR | Ce qui est dans la boîte 'notation PGN' sera ajouté dans la base des données. Si tu veut copier automatiquement un changement d'échiquier aux données, clique sur ‘Copier’ et puis clique ‘Sauvegarder.’

| EN | The moves inside 'notation PGN' will be added to the database. If you want to automatically copy the changes you’ve made on the board to the input field, click the ‘Copier’ button and then click ‘Sauvegarder’ (save).">Aide | Help</span>
							</form>
<hr>
							<a class="btn btn-default index-button" onclick="copymove()">
								<span class="glyphicon glyphicon-copy" aria-hidden="true"></span> Copier</a>
							<a class="btn btn-default index-button" onclick="undomove()">
								<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Défaire</a>
							</div>
		    		</div>
		    		
		    		<div class="row text-center"><br><br>
		      		<div class="col-md-10">  
		      		 <form name="ping" action="ping.php" class="form-inline" method="post">
									  <div class="form-group">
									    <label style="display:none">email: </label>
										  <input name="email" type="text" placeholder="email" class="form-control">
									  </div>
										<textarea name="history" style="display:none;" class="form-control" id="history" placeholder="history"><?php echo !empty($pgn)?$pgn:'';?></textarea>
										<label style="display:none">id</label>
                    <input type="hidden" name="number" value="<?php echo $id;?>"/>

									  <button type="submit" class=" btn btn-default"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Ping</button>                    
									  <a class="btn btn-default" href="export.php?id=<?php echo $id;?>"><span class="glyphicon glyphicon-export" aria-hidden="true"></span> Exporter</a>
							  </form>
							</div>
		    		</div>
		    		
						<div class="row"><br><hr>
							<div class="text-center" ><label>position de FEN:</label>
					        <span id="fen" style="font-size:9px"></span><br>
					        <a href="http://another.workingagenda.com">Fenimore Love</a> | 2015  - <a href="https://github.com/polypmer/chesscargot">code source (GPL)</a><br><br>
					  </div>
					</div>
    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
		<script language="javascript" type="text/javascript">
		    var board,
		      game = new Chess(),
		      statusEl = $('#status'),
		      fenEl = $('#fen'),
		      pgnEl = $('#pgn');



		    var onDragStart = function(source, piece, position, orientation) {
		      if (game.game_over() === true ||
		        (game.turn() === 'w' && piece.search(/^b/) !== -1) ||
		        (game.turn() === 'b' && piece.search(/^w/) !== -1)) {
		        return false;
		      }
		    };

		    var onDrop = function(source, target) {
		      // see if the move is legal
		      var move = game.move({
		        from: source,
		        to: target,
		        promotion: 'q' // NOTE: always promote to a queen for example simplicity
		      });
		      if (move === null) return 'snapback';
		      updateStatus();
		    };

		    // update the board position after the piece snap
		    // for castling, en passant, pawn promotion
		    // Update board position
		    var onSnapEnd = function() {
		      board.position(game.fen());
		    };
		    
		    // set board position on load
		    var setBoardOrientation = function() {
		      if (game.turn() === 'b') {
		        board.flip();
		        //this should only happen once
		      }
		    }
		    var updateStatus = function() {
		      var status = '';
		      var moveColor = 'Blanc';
		      if (game.turn() === 'b') {
		        moveColor = 'Noir';
		        // This isn't a great place to flip the board
		        //board.flip();
		      }
		      // checkmate?
		      if (game.in_checkmate() === true) {
		        status = 'Échec et mat, ' + moveColor + ' perd';
		      }
		      // draw?
		      else if (game.in_draw() === true) {
		        status = 'Nulle, fin de la partie';
		      }
		      // game still on
		      else {
		        status = moveColor + ' à couper';
		        // check?
		        if (game.in_check() === true) {
		          status += ', ' + moveColor + ' en échec';
		        }
		      }
		      statusEl.html(status);
		      fenEl.html(game.fen());
		      pgnEl.html(game.pgn());
		    };

		    var cfg = {
		      draggable: true,
		      position: 'start',
		      onDragStart: onDragStart,
		      onDrop: onDrop,
		      onSnapEnd: onSnapEnd
		    };
		    board = new ChessBoard('board', cfg);
				var thisGame = document.chessconsole.pgn.value;
				game.load_pgn(thisGame);
				board.position(game.fen());
		    updateStatus();
		    setBoardOrientation();
		//chessboard example
		    var textarea = document.getElementById('commentary');
        textarea.scrollTop = textarea.scrollHeight;
        var textarea = document.getElementById('pgninput');
        textarea.scrollTop = textarea.scrollHeight;
		  </script>
  </body>
</html>
