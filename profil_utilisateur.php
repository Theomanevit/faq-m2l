<?php
session_start();

$dsn = 'mysql:host=localhost;dbname=faq m2l';
$user = 'root';
$password = '';

try {
  $dbh = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
  die("Erreur lors de la connexion SQL : " . $ex->getMessage());
}
try {
  $sql = "select pseudo_uti, mail_uti , mdp_uti , lib_ligue from utilisateur ,ligue where utilisateur.id_ligue=ligue.id_ligue
    and pseudo_uti = '$_SESSION[pseudo_uti]'";
  $sth = $dbh->prepare($sql);
  $sth->execute(array());
  $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $ex) {
  die("<p>Erreur lors de la requête SQL : " . $ex->getMessage() . "</p>");
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/profil.css">
  <title>profil utilisateur</title>
</head>

<body>
  <?php
  if (isset($_SESSION['pseudo_uti'])) {
    echo "<h1>profil utilisateur</h1>";
    echo "<center>";
    echo "<a href='accueil2.php' class='centre'>accueil</a>";
    echo "<a class='centre' href='questions.php'>FAQ</a>";
    echo "<a class='centre' href='déconnexion.php'>se déconnecter</a>";
    echo "</center>";
    echo "<br>";
    foreach ($rows as $row) {
      echo "<table><td element class='bord'><table><tr><td>pseudo</td><td>" . $row["pseudo_uti"] . "</td></tr>";
      echo "<tr><td>adresse mail</td><td>" . $row["mail_uti"] . "</td></tr>";
      echo "<tr><td>mot de passe</td><td>" . $row["mdp_uti"] . "</td></tr>";
      echo "<tr><td>ligue</td><td>" . $row["lib_ligue"] . "</td></tr></table>";
    }
  } else {
    echo '<p> Désolé mais vous ne pouvez pas accèder à cette page! </p>';
    echo 'Se <a href="connexion.php">connecter</a></p>';
  }
  ?>
</body>

</html>