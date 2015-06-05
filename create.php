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
  <title>echesscargot</title>
  <meta name="description" content="">
  <meta name="author" content="fenimore love">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
	<link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" sizes="16x16 24x24 32x32 48x48 64x64" href="img/favicon.ico">
</head>

<body>
    <div class="container">
    			<div class="row">
		    			<h3>Créer</h3>
		    	</div>
	    	<form action="create.php" method="post">
					<div class="row">
					    <label>info</label>
					    <div class="one-half columns">
					      	<input name="info" type="text"  class="create-button" placeholder="info" value="<?php echo !empty($info)?$info:'';?>">
					    </div>
					</div>
					<div class="row">
						<div class="one-third columns">
					    <label>blanc</label>
					    <div>
					      	<input name="white" type="text" class="create-button" placeholder="nom de blanc" value="<?php echo !empty($white)?$white:'';?>">
					    </div>
						</div>
						<div class="one-third columns">
					    <label>noir</label>
					    <div>
					      	<input name="black" class="create-button" type="text" placeholder="nom de noir" value="<?php echo !empty($black)?$black:'';?>">
					    </div>
						</div>
					</div>
					<div class="row">
							<label>notation pgn</label>
							<div class="one-third columns">
									<input name="pgn" type="text"  class="create-button" placeholder="coup d'ouverture" value="<?php echo !empty($pgn)?$pgn:'';?>">
							</div>
					</div>
					<div class="row">
					  <div class="u-full-width">
						  <button type="submit" class="button-primary create-button">commence</button>
						  <a class="button create-button" href="index.php">archive</a>
							<a class="button create-button" href="about.html">À propos</a>
						</div>
					</div>
				</form><!-- form -->
    </div> <!-- container -->
  </body>
</html>
