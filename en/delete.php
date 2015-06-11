<?php
	require 'database.php';
	$id = 0;

	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

	if ( !empty($_POST)) {
		// keep track post values
		$id = $_POST['id'];

		// delete data
		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM chessgames  WHERE id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		Database::disconnect();
		header("Location: index.php");

	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/skeleton.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="shortcut icon" sizes="16x16 24x24 32x32 48x48 64x64" href="images/favicon.ico">

</head>

<body>
    <div class="container">
    			<div>
    				<div class="row" style="margin-top:5%;">
		    			<h4>Delete this game:</h4>
		    		</div>
	    			<form class="form-horizontal" action="delete.php" method="post">
	    			  <input type="hidden" name="id" value="<?php echo $id;?>"/>
					  <p class="alert alert-error">continue?</p>
					  <div class="form-actions">
						  <button type="submit" style="background-color:red;color:white;">Yes</button>
						  <a class="button" href="index.php">No!</a>
						</div>
					</form>
				</div>

    </div> <!-- /container -->
  </body>
</html>
