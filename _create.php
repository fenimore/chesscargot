<?php

	require 'database.php';

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

		// insert data
		if ($valid) {
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO chessgames (info,white,black,pgn) values(?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($info,$white,$black,$pgn));
			Database::disconnect();
			header("Location: index.php");
		}
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

    <title>Chesscargot</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <style>
      body {
        padding-top: 50px;
      }
      .welcome {
        padding: 40px 15px;
        text-align: center;
      }
      .btn-primary {
        background-color: #6ab293;
                 border-color: #e8e8e8;
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
          <a class="navbar-brand" href="#">Chesscargot</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="_index.php">Accueil</a></li>
            <li><a href="_about.html">À propos</a></li>
            <li class="active"><a href="#">Nouveau</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container col-md-offset-1">
    			<div class="row">
		    			<h3>Créer</h3>
		    	</div>
	    	<form action="create.php" method="post">
					<div class="row">
					    <div class="col-md-3">
					    <label>info</label><br>
					      	<input name="info" type="text"  class="create-button" placeholder="info" value="<?php echo !empty($info)?$info:'';?>">
					    </div>
					</div>
					<div class="row">
						<div class="col-md-3">
					    <label>blanc</label>
					    <div>
					      	<input name="white" type="text" class="create-button" placeholder="nom de blanc" value="<?php echo !empty($white)?$white:'';?>">
					    </div>
						</div>
          </div>
          <div class="row">
						<div class="col-md-3">
					    <label>noir</label><br>
					    <div>
					      	<input name="black" class="create-button" type="text" placeholder="nom de noir" value="<?php echo !empty($black)?$black:'';?>">
					    </div><hr>
						</div>
					</div>
					<div class="row">
							<div class="col-md-3">
                  <label>notation pgn</label><br>
									<input name="pgn" type="text"  class="create-button" placeholder="coup d'ouverture" value="<?php echo !empty($pgn)?$pgn:'';?>">
							</div>
					</div>
					<div class="row">
					  <div class="col-md-3">
						  <button type="submit" class="btn btn-primary create-button">commence</button>
						</div>
					</div>
				</form><!-- form -->
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

