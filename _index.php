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
            <li class="active"><a href="#">Accueil</a></li>
            <li><a href="_about.html">À propos</a></li>
            <li><a href="#contact">Nouveau</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      <div class="row">
        <div class="welcome">
          <h1>Chesscargot</h1>
          Bienvenu a Chesscargot, 
          <br> For Snail-Paced Games of Chess.
        </div>
      </div>
      <div class="row">
        <div>
				<table class="table table-striped table-hover">
		              <thead>
		                <tr>
		                  <th>info</th>
		                  <th>blanc</th>
		                  <th>noir</th>
		                  <th>notation pgn</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php
					   include 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM chessgames ORDER BY id DESC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['info'] . '</td>';
							   	echo '<td>'. $row['white'] . '</td>';
							   	echo '<td>'. $row['black'] . '</td>';
                  echo '<td style="font-family:monospace;">'. $row['pgn'] . '</td>';
							   	echo '<td width=250>';
							   	echo '<a class="btn btn-primary index-button" href="update.php?id='.$row['id'].'">Charger</a>';
							   	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
								echo '<br><br>';
							   	echo '<a class="btn btn-default index-button" href="delete.php?id='.$row['id'].'">Supprimer</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
        </div>
      </div>
      <div class=row>
	    <a href="http://polypmer.org">Fenimore Love</a> | 2015  - <a href="https://github.com/polypmer/chesscargot">code source (GPL)</a>
      </div>
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

