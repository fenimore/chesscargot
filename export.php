<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM chessgames where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
      $file =  $data['white'] .'vs'. $data['black'] . '-'. $data['date'] . '.pgn';
    $export = '[Event "'. $data['info'] . '"]';
    $export .= "\n";
    $export .= '[Site "Echescargot"]';
    $export .= "\n";
    $export .= '[Date "'. $data['date'] . '"]';
    $export .= "\n";
    $export .= '[Round "'. $data['id'] . '"]';
    $export .= "\n";
    $export .= '[White "'. $data['white'] . '"]';
    $export .= "\n";
    $export .= '[Black "'. $data['black'] . '"]';
    $export .= "\n";
    $export .= '[Result "'. $data['result'] . '"]';
    $export .= "\n";
    $export .= '[Mode "ICS"]';
    $export .= "\n\n";
    $export .= $data['pgn'];
    // Write the contents back to the file
    // file_put_contents($file, $export);
    header('Content-Description: File Transfer');
    header('Content-Type: application/x-chess-pgn');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Content-Transfer-Encoding: pgn');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    echo $export;
    //header('Content-Length: ' . filesize($file));

//ob_clean();    //readfile($file);
//ob_clean();
//flush();
//readfile($file);

    exit;
    }
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

    <title>Eschescargot - Exporter</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="css/chessboard-0.3.0.css">
    <link href="css/style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Poiret+One|Quicksand&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <style>
      container {
        padding-top:40px;
        font-family:monospace;
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
                <div class="col-md-6" style="padding:50px;margin-top:5%;">
            <h2><?php echo $data['white'];?> vs. <?php echo $data['black'];?></h2>
            [Event "<?php echo $data['info'];?>"]<br>
            [Site "Echescargot"]<br>
            [Date "<?php echo $data['date'];?>"]<br>
            [Round "<?php echo $data['id'];?>"]<br>
            [White "<?php echo $data['white'];?>"]<br>
            [Black "<?php echo $data['black'];?>"]<br>
            [Result "<?php echo $data['result'];?>"]<br>
            [Mode "ICS"]<br>
            <br>
            <?php echo $data['pgn'];?>
            <br>
            <form class="form-inline" action="export.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <div class="form-actions"><br>
                          <button type="submit" class="btn btn-primary index-button" style="padding:5px;">Télécharger</button>
<a href="update.php?id=<?php echo $data['id'];?>" class="btn btn-default index-button" style="padding:5px;">Retour</a>
                        </div>
                    </form>
                </div>

    </div> <!-- /container -->
  </body>
</html>
