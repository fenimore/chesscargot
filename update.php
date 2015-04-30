<?php

	require 'database.php';

	$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

	if ( null==$id ) {
		header("Location: index.php");
	}

	if ( !empty($_POST)) {
		// keep track validation errors
		$infoError = null;
		$whiteError = null;
		$blackError = null;
		$pgnError = null;

		// keep track post values
		$info = $_POST['info'];
		$white = $_POST['white'];
		$black = $_POST['black'];
		$pgn = $_POST['pgn'];

		// validate input
		$valid = true;
		if (empty($info)) {
			$infoError = 'Please enter date, or other information';
			$valid = false;
		}

		if (empty($white)) {
			$whiteError = 'who is white?';
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
			$sql = "UPDATE chessgames  set info = ?, white = ?, black =?, pgn =? WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($info,$white,$black,$pgn,$id));
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
		Database::disconnect();
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <title>snail chess</title>
  <meta name="description" content="">
  <meta name="author" content="fenimore love">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
  <!-- CSS JS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="icon" type="image/png" href="img/favicon.png">
		<link rel="stylesheet" href="css/chessboard-0.3.0.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/json3/3.3.2/json3.min.js"></script>
		<script src="js/chessboard-0.3.0.js"></script>
		<script src="js/chess.min.js"></script>
		<link rel="stylesheet" href="css/style.css">
		<link rel="icon" type="image/png" href="img/favicon.png">
		<style>
		#entry, #pgn {
      font-family:monospace;
    }
		.menu {
			height: auto;
			margin-left: 30%;
			margin-right: auto;
		}
		#nav {
			background:#e8e8e8;
			color:#6ab293;
			font-size: 1em;
			top: 0px;
			width:100%
		}
		#nav a {
			color:#6ab293;
			text-transform: uppercase;
		}
		</style>
		<script>
		function reset(){
		  board.start(); game.clear();
		  game = new Chess();
		  updateStatus();}
		function undomove(){
		  game.undo();
		  updateStatus();
			board.position(game.fen());
		  //var board = new ChessBoard('board', game.fen());
		  //game.load(board.fen());
		}
		</script>
</head>

<body>
	<div class="row" id="nav">
		<div class="u-full-width menu"> <a class="button" style="margin-top:1%;" onclick="reset()">novus</a>
							<a class="button button-primary" style="color:white;margin-top:1%;" href="index.php">domus</a>
		</div>
	</div>

    <div class="container">
    			<div class="u-full-width" style="margin-top:2%;">
						<div class="row">
							<div class="six columns" style="color:#6ab293;">
								<h5><?php echo !empty($info)?$info:'';?>: <?php echo !empty($white)?$white:'';?> vs <?php echo !empty($black)?$black:'';?></h5>
							</div>
							<div class="six columns">

							</div>
						</div>
    				<div class="row">
							<div class="six columns">
								<div id="board" style="width: 350px"></div>
							</div>
							<div class="six columns">
								<p>Status: &nbsp;<span style="color:#6ab293" id="status"></span></p>
			          <p><br><span id="pgn"></span></p>
								<form name="chessconsole" action="update.php?id=<?php echo $id?>" method="post">
								<div style="display:none" <?php echo !empty($infoError)?'error':'';?>">
									<label class="u-full-width">info</label>
									<div class="u-full-width">
											<input name="info" type="text"  placeholder="info" value="<?php echo !empty($info)?$info:'';?>">
									</div>
								</div>
								<div style="display:none" class="u-full-width <?php echo !empty($whiteError)?'error':'';?>">
									<label class="u-full-width">white</label>
									<div>
											<input name="white" type="text" placeholder="white" value="<?php echo !empty($white)?$white:'';?>">
									</div>
								</div>
								<div style="display:none" class="u-full-width <?php echo !empty($blackError)?'error':'';?>">
									<label class="u-full-width">black</label>
									<div>
											<input name="black" type="text"  placeholder="black" value="<?php echo !empty($black)?$black:'';?>">
									</div>
								</div>
								<div class="u-full-width <?php echo !empty($pgnError)?'error':'';?>">
									<label class="two columns">pgn</label>
									<div class="ten columns">
											<div id="pgnhistory"><?php echo !empty($pgn)?$pgn:'';?></div>
											<input name="pgn"  placeholder="pgn" value="<?php echo !empty($pgn)?$pgn:'';?>">
									</div>
								</div>
									<button type="submit" class="button-primary">write move (type it into input field)</button>
							</form></br>
							<button href="#" onclick="undomove()">reverte</button>
							</div>
		    		</div>
						<div class="row"><br><hr>
							<div style="font-size:9px">FEN position:
					        <span id="fen"></span>
					  </div>
					</div>
			</div>

    </div>

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
		    var updateStatus = function() {
		      var status = '';
		      var moveColor = 'White';
		      if (game.turn() === 'b') {
		        moveColor = 'Black';
		      }
		      // checkmate?
		      if (game.in_checkmate() === true) {
		        status = 'Game over, ' + moveColor + ' is in checkmate.';
		      }
		      // draw?
		      else if (game.in_draw() === true) {
		        status = 'Game over, drawn position';
		      }
		      // game still on
		      else {
		        status = moveColor + ' to move';
		        // check?
		        if (game.in_check() === true) {
		          status += ', ' + moveColor + ' is in check';
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
		//chessboard example
		  </script>
  </body>
</html>
