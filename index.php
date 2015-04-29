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
  <link rel="icon" type="img/png" href="img/favicon.png">

    <style>
      #splash {
        width: 50px;
        height: auto;
      }
      #nav {
        background:#e8e8e8;
        color:#6ab293;
        position: fixed;
        top: 0px;
        width:100%;
      }
      table {font-family:monospace;}
    </style>
</head>

<body>
  <div class="row" id="nav">
    <div class="one-half column" style="text-align:right;">
      <h4>Chess </h4>
    </div>
    <div class="one-half column">
      <img id="splash" src="img/play.png" />
    </div>
  </div>
    <div class="container">

			<div class="row" style="margin-top:10%">
        <p>
					<a href="create.php" class="button button-primary">provocate</a>
          <a href="about.html" class="button">about</a>
        </p>
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>info</th>
		                  <th>white</th>
		                  <th>black</th>
		                  <th>history</th>
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
							   	echo '<a class="button button-primary" href="update.php?id='.$row['id'].'">load game</a>';
							   	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
								echo '<br><br>';
							   	echo '<a class="button" href="delete.php?id='.$row['id'].'">remove</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
	            <a href="http://polypmer.org">Fenimore Love</a> | 2015  - <a href="https://github.com/polypmer/chesscargot">source code (GPL)</a>
	            <hr>
	            <br>
	            <br>
    	</div>
    </div> <!-- /container -->
  </body>
</html>
