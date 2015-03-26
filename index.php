<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <link rel="icon" type="image/png" href="img/favicon.png">
    <style>
      #splash {
        width: 100px;
        height: auto;
      }
      body {font-family:monospace;}
    </style>
</head>

<body>
    <div class="container">
    		<div class="row">
          <div class="span4">
            <h3>Chess Game Index</h3>
          </div>
          <div class="span5">
            <img id="splash" src="img/play.png" />
          </div>

    		</div>
			<div class="row">
				<p>
					<a href="create.php" class="btn btn-success">issue challenge</a>
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
							   	echo '<a class="btn" href="update.php?id='.$row['id'].'">load game</a>';
							   	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
							   	echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">remove</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
				      </tbody>
	            </table>
    	</div>
    </div> <!-- /container -->
  </body>
</html>
