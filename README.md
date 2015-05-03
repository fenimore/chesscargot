# Snail Chess | Echesscargot
<img src="https://github.com/polypmer/chesscargot/blob/master/img/play.png?raw=true" width="150px"></img>
<p>| FR | Celui-ci est un base des donnees que peux se utiliser par n’importe
 qui. Il est pour les jeux lents, comme un escargot, et les jeux privés.
 Le logiciel d'échecs utilise deux bibliothèques très raffiné:
 <a href="http://chessboardjs.com/">chessboard.js</a> pour l'échiquier
 et <a href="https://github.com/jhlywa/chess.js/">chess.js</a>
 pour la validation des coups.
 </p>
<p>| EN | This chess client uses chess.js and <a href="http://chessboardjs.com">chessboard.js</a> and uses PHP/MySql. It is for playing slow games of chess.</p><p> This code is intended to be loaded onto a server as a private game database where no logins are required; though I'm thinking of adding a simply authentication/password splash page, for security against vandalism. Check out my <a href="http://play.plyp.org">instance</a>, and challenge me at chess.
</p>
##Features:
<ul>
  <li>Undo button.</li>
  <li>Comments section.</li>
  <li>Mostly mobile-friendly.</li>
</ul>
##Planned Features:
<ul>
  <li>Add game viewer, eg. forward as well as undo button. (this seems somehow possible).</li>
  <li>htaccess file</li>
  <li>Integrate status (Black/White to Move - this'll be tricky):</li>
    <ul>
      <li>Email move, or ping the next mover.</li>
      <li>Highlight the player whose turn it is in the database table.</li>
    </ul>
</ul>
###Dependencies:
<ul>
  <li>Php</li>
  <li>MySQL</li>
  <li><a href="https://getskeleton.com">Skeleton css</a> (modified and included)</li>
</ul>
###Database Initialization:
The required database has 5 columns: id (autoincrement), info, black, white, pgn, comments. These last two are type longtext. All columns are not-null & utf8. In order to set up a chesscargot instance, fill out the localhost/database/username information in the database.php file and create a database with the appropriate tables.

###Broken:
nothing?!

###Screenshots:
<img src="http://play.plyp.org/img/db_screen.png" width="400px"></img>
<img src="http://play.plyp.org/img/play_screen.png" width="400px"></img>
