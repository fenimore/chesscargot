# Snail Chess | Echesscargot
<img src="https://github.com/polypmer/chesscargot/blob/master/img/play.png?raw=true" width="150px"></img>
<p>| FR | Celui-ci est une base de données qui peut être utilisé par n’importe
 qui. C'est pour des jeux lents, comme des escargots, et des jeux privés. 
Le logiciel d'échecs utilise deux bibliothèques très raffinés: 
<a href="http://chessboardjs.com/">chessboard.js</a> pour l'échiquier 
et <a href="https://github.com/jhlywa/chess.js/">chess.js</a> pour la validation des coups.
 </p>
<p>| EN | This chess client uses <a href="https://github.com/jhlywa/chess.js/">chess.js</a> and <a href="http://chessboardjs.com">chessboard.js</a> and uses PHP/MySql. It is for playing slow games of chess.</p><p> This code is intended to be loaded onto a server as a private game database where **no logins** are required; though I'm thinking of adding a simple authentication/password splash page, for security against vandalism. Check out my <a href="http://play.plyp.org">instance</a>, and challenge me at chess.
</p>
##Features:
<ul>
  <li>Undo button.</li>
  <li>Back/Next buttons for viewing the history of a game.</li>
  <li>Comments section.</li>
  <li>Mobile-friendly.</li>
</ul>
##Planned Features:
<ul>
  <li>Database/user search function instead of just layin' all out like it is.</li>
  <li>htaccess file. </li>
  <li>Email, ping players?</li>

</ul>
###Dependencies:
<ul>
  <li>PHP</li>
  <li>MySQL</li>
  <li><a href="https://getbootstrap.com">Bootstrap</a></li>
  <li> <a href="http://chessboardjs.com/">chessboard.js</a> and <a href="https://github.com/jhlywa/chess.js/">chess.js</a></li>
</ul>
###Database Initialization:
The required database has 5 columns: id (autoincrement), info, black, white, pgn, comments. These last two are type longtext. All columns are not-null & utf8. In order to set up a chesscargot instance, fill out the localhost/database/username information in the database.php file and create a database with the appropriate tables.

###Broken:
Screenshots are out of date! Too lazy!

###Screenshots:
<img src="http://play.plyp.org/img/db_screen.png" width="400px"></img>
<img src="http://play.plyp.org/img/play_screen.png" width="400px"></img>
