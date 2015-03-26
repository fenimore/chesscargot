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
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">

    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Issue a Challenge or View  Match</h3>
		    		</div>

	    			<form class="form-horizontal" action="create.php" method="post">
					  <div class="control-group <?php echo !empty($infoError)?'error':'';?>">
					    <label class="control-label">info</label>
					    <div class="controls">
					      	<input name="info" type="text"  placeholder="info" value="<?php echo !empty($info)?$info:'';?>">
					      	<?php if (!empty($infoError)): ?>
					      		<span class="help-inline"><?php echo $infoError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($whiteError)?'error':'';?>">
					    <label class="control-label">white</label>
					    <div class="controls">
					      	<input name="white" type="text" placeholder="white" value="<?php echo !empty($white)?$white:'';?>">
					      	<?php if (!empty($whiteError)): ?>
					      		<span class="help-inline"><?php echo $whiteError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($blackError)?'error':'';?>">
					    <label class="control-label">black</label>
					    <div class="controls">
					      	<input name="black" type="text"  placeholder="black" value="<?php echo !empty($black)?$black:'';?>">
					      	<?php if (!empty($blackError)): ?>
					      		<span class="help-inline"><?php echo $blackError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
						<div class="control-group <?php echo !empty($pgnError)?'error':'';?>">
							<label class="control-label">notation</label>
							<div class="controls">
									<input name="pgn" type="text"  placeholder="pgn" value="<?php echo !empty($pgn)?$pgn:'';?>">
									<?php if (!empty($pgnError)): ?>
										<span class="help-inline"><?php echo $pgnError;?></span>
									<?php endif;?>
							</div>
						</div>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">issue new challenge</button>
						  <a class="btn" href="index.php">Back</a>
						</div>
					</form>
				</div>

    </div> <!-- /container -->
  </body>
</html>
