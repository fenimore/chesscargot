<?php

	require 'database.php';

	if ( !empty($_POST)) {
		// keep track validation errors
		$infoError = null;
		$whiteError = null;
		$blackError = null;
		$pgnError = null;
		$commentsError = null;

		// keep track post values
		$info = $_POST['info'];
		$white = $_POST['white'];
		$black = $_POST['black'];
		$pgn = $_POST['pgn'];
		$comments = $_POST['comments'];

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
			$sql = "INSERT INTO chessgames (info,white,black,pgn,comments) values(?, ?, ?, ?, ?)";
			$q = $pdo->prepare($sql);
			$q->execute(array($info,$white,$black,$pgn,$comments));
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
    <link href='http://fonts.googleapis.com/css?family=Poiret+One|Quicksand&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
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
          <a class="navbar-brand" href="#"><img width="30px" height="30px" src="img/snail_shell.png"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav nav-pills">
            <li><a href="index.php">Archive</a></li>
            <li><a href="index.php#apropos">À Propos</a></li>
            <li class="active"><a href="#">Nouveau</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
    			<div class="row">
		    			<h2 style="padding-left:15px;">Créer</h2>
		    	</div>
	    	<form action="create.php" method="post">
					<div class="row">
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
					</div>
					<div class="row">

					</div>
					<div class="row">
					</div>

					<div class="row">
					  <div class="col-md-3"><br>
						  <button type="submit" class="btn btn-lg btn-primary">Commence</button>
						</div>
					</div>
				</form><!-- form -->
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

