<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Echesscargot</title>
  <meta name="description" content="Echesscargot,Chess,Fenimore,Plyp,Polypmer">
  <meta name="author" content="Fenimore Love">

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
  <link rel="icon" type="image/png" href="img/favicon.png">

    <style>
      table {font-family:monospace;}
    </style>
</head>

<body>
  <div class="row" id="nav">
<div class="container">
    <div class="three columns index-nav">
      <h4>Echecs &nbsp;&nbsp;&nbsp;&nbsp;</h4>
    </div>
    <div class="two columns">
      <img id="splash" src="img/play.png" />
    </div>
</div>
  </div>
    <div class="container">

			<div class="row" style="margin-top:2%">
        <p>
					<a href="create.php" class="button button-primary">nouveau</a>
          <a href="about.html" class="button">a propos</a>
        </p>
				<table class="table table-striped table-bordered">
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
                  echo '<td>'. $row['pgn'] . '</td>';
							   	echo '<td width=250>';
							   	echo '<a class="button button-primary index-button" href="update.php?id='.$row['id'].'">Charger</a>';
							   	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
								echo '<br><br>';
							   	echo '<a class="button index-button" href="delete.php?id='.$row['id'].'">supprimer</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
	            <a href="http://polypmer.org">Fenimore Love</a> | 2015  - <a href="https://github.com/polypmer/chesscargot">code source (GPL)</a>
	            <br>
	            <br>
    	</div>
    </div> <!-- /container -->
  </body>
</html>
