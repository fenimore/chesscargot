<?php
//sending email with the php mail()
$email = $_POST['email'];
$email = preg_replace("([\r\n])", "", $email);

$history = $_POST['history'];
$history = preg_replace("([\r\n])", "", $history);

$id = $_POST['number'];
$id = preg_replace("([\r\n])", "", $id);

// compose headers
$headers = "From: ping@play.plyp.org\r\n";
$headers .= "Reply-To: webmaster@example.com\r\n";
$headers .= "X-Mailer: PHP/".phpversion();

$message = "It's your move.\n\n";
$message .= "The game history is: \n" . $history;
$message .= "\n\nSee: http://play.plyp.org/update.php?id=". $id;
$message .= "\n\n~Echescargot";

mail($email, 'Your move', $message, $headers);
?>

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

    <title>Eschescargo</title>
    
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
          <a class="navbar-brand" href="index.php"><img width="30px" height="30px" src="img/snail_shell.png"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav nav-pills">
            <li><a href="index.php">Archive</a></li>
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

    <div class="container">
    			<div>
    				<div class="row text-center" style="margin-top:5%;">
		    			<h3 style="margin-top:50px;">Your nemesis has been pinged</h3>
		    			<br>
		    			<a class="btn btn-primary btn-lg" href="update.php?id=<?php echo $id;?>">Retour</a>
		    		</div>
				</div>

    </div> <!-- /container -->
  </body>
</html>
