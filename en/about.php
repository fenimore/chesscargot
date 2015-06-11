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
      .welcomehelp {
        padding: 40px 15px;
      }
      .btn-primary {
        background-color: #6ab293;
                 border-color: e8e8e8;
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
          <a class="navbar-brand" href="#"><img width="30px" height="30px" src="img/snail_shell.png"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav nav-tabs">
            <li><a href="index.php">Archive</a></li>
            <li  class="active"><a href="#about">About</a></li>
            <li><a href="create.php">New</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
<div class="row welcomehelp">
  <div class="col-md-3 col-md-offset-1"><br><br>  
  <h2>About</h2>
  </div>
  <div class="col-md-4">  
  <img style="width:200px;height:auto;margin-left:25%;" src="img/play.png" />
  </div>

</div>
<div class="row">
  <div class="col-md-4 col-md-offset-1">
<div class="panel panel-default">
  <div class="panel-body">
        <p> This application is an editable chess-game database which can be
            edited by anyone. It is for slow games, like a snail, and for private games.
            the software uses two sophisticated libraries for the chessboard <a href="http://chessboardjs.com/">chessboard.js</a> and for
            the move validation <a href="https://github.com/jhlywa/chess.js/">chess.js</a>.
           </p>
          <p>The source code is <a href="https://github.com/polypmer/chesscargot">here</a>.
          </p>
        <h4>How to Play</h4>
          <p>To issue a challenge, select New in the navigation bar.
          Then fill in the first three fields: info, name of white player, name of black player; and optionally 
          enter an opening move in the pgn notation field. For example: <code>1. e4</code>.
          </p>
  </div>
</div>

  </div>
  <div class="col-md-4">
<div class="panel panel-default">
  <div class="panel-body">
        <h4>PGN Notation</h4>
          <p><a href="http://www.iechecs.com/notation.htm#intro">Click here</a>
            for an introduction. PGN is an algebraic notation which is easily
            read and written by humans (unlike <a href="http://en.wikipedia.org/wiki/Forsyth%E2%80%93Edwards_Notation">
              FEN notation</a>).
          </p>
          <p>PGN is how the program works, it will read the moves in the PGN notation box. 
          When you want to make a move, or add a move into the database, type it into the 
          input box (where the previous moves are) and click save.
          </p>
  </div>
</div>

  </div>
</div>
	  <div class="row text-center">
<hr>
	    <a href="http://polypmer.org">Fenimore Love</a> | 2015  - <a href="https://github.com/polypmer/chesscargot">source code (GPL)</a><br><br>
      </div>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

