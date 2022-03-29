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
    $sql = "select * from questions";
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
    <link rel="stylesheet" href="css/questions.css">
    <title>Liste des questions</title>
</head>

<body>            
<?php
  if (isset($_SESSION['pseudo_uti'])) {
    echo "<div><h1><a href='accueil2.php' class='image'><img src='img/home.png' alt='accueil' /></a>";
    echo "Foire aux questions";
    echo "<a href='déconnexion.php' class='droite2'><img src='img/log_out.png' alt='log_out' /></a>";
    echo "<a href='ajout_question.php' class='droite2'><img src='img/ajout_question.png' alt='ajout_question' /></a>";
    echo "<a href='profil_utilisateur.php' class='droite2'><img src='img/personne.png' /></a></h1>";

    foreach ($rows as $row) {
      echo "<table class='tableauligne'><td element class='bord'><table><tr><td><p>".$row["id_questions"]."</p></td><td><p>".$row["id_utilisateur"]."</p></td></tr>";
      echo "<tr><td><p>".$row["lib_questions"]."</p></td><td><p>".$row["date_questions"]."</p></td></tr>";
      echo "<tr><td><p>".$row["reponse"]."</p></td><td><p>".$row["date_reponse"]."</p></td></tr>";
      echo "</table><a href='modif_question.php'><img class='edit' src='img/edit.png' alt='edit' /></a><a href='suppression_question.php'><img class='trash' src='img/trash.png' alt='trash' /></a></td></table></table></div>";
    }
  } else {
    echo '<p> Désolé mais vous ne pouvez pas accèder à cette page! </p>';
    echo 'Se <a href="connexion.php">connecter</a></p>';
  }
?>
</body>

</html>