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
  <title>snail chess</title>
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
  <link rel="icon" type="image/png" href="img/favicon.png">
</head>

<body>
    <div class="container">

    			<div class="one-half column">
    				<div class="row">
		    			<h3>provocate</h3>
		    		</div>

	    			<form action="create.php" method="post">
					  <div class="six columns <?php echo !empty($infoError)?'error':'';?>">
					    <label>info</label>
					    <div class="six columns">
					      	<input name="info" type="text"  placeholder="info" value="<?php echo !empty($info)?$info:'';?>">
					      	<?php if (!empty($infoError)): ?>
					      		<span class="help-inline"><?php echo $infoError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="six columns <?php echo !empty($whiteError)?'error':'';?>">
					    <label>white</label>
					    <div>
					      	<input name="white" type="text" placeholder="white" value="<?php echo !empty($white)?$white:'';?>">
					      	<?php if (!empty($whiteError)): ?>
					      		<span class="help-inline"><?php echo $whiteError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="six columns <?php echo !empty($blackError)?'error':'';?>">
					    <label>black</label>
					    <div>
					      	<input name="black" type="text"  placeholder="black" value="<?php echo !empty($black)?$black:'';?>">
					      	<?php if (!empty($blackError)): ?>
					      		<span class="help-inline"><?php echo $blackError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
						<div class="u-full-width <?php echo !empty($pgnError)?'error':'';?>">
							<label >pgn notation</label>
							<div class="six columns">
									<input name="pgn" type="text"  placeholder="pgn" value="<?php echo !empty($pgn)?$pgn:'';?>">
									<?php if (!empty($pgnError)): ?>
										<span class="help-inline"><?php echo $pgnError;?></span>
									<?php endif;?>
							</div>
						</div>
					  <div>
						  <button type="submit" class="button-primary">incipe</button>
						  <a class="button" href="index.php">reverte</a>
						</div>
					</form>
				</div>

    </div> <!-- /container -->
  </body>
</html>
