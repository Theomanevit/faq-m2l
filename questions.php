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

$pseudo_uti = isset($_GET['pseudo_uti']) ? $_GET['pseudo_uti'] : '';

try {
  $sql = "select pseudo_uti,id_questions,lib_questions,date_questions,reponse,date_reponse from questions, utilisateur where questions.id_utilisateur=utilisateur.id_utilisateur";
  $sth = $dbh->prepare($sql);
  $sth->execute(array());
  $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $ex) {
  die("<p>Erreur lors de la requête SQL : " . $ex->getMessage() . "</p>");
}

try {
  $sql = "select id_type from utilisateur where pseudo_uti=:pseudo_uti";
  $sth = $dbh->prepare($sql);
  $sth->execute(array(
    ':pseudo_uti' => $pseudo_uti
  ));
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
  <div>
    <?php
    if (isset($_SESSION['pseudo_uti'])) {
      echo "<div><h1><a href='accueil2.php' class='image'><img src='img/home.png' alt='accueil' /></a>";
      echo "Foire aux questions";
      echo "<a href='déco_confirmation.php' class='droite2'><img src='img/log_out.png' alt='log_out' /></a>";
      echo "<a href='profil_utilisateur.php' class='droite2'><img src='img/personne.png' /></a>";
      echo "<a href='ajout_question.php' class='droite2'><img src='img/ajout_question.png' alt='ajout_question' /></a></h1>";

      foreach ($rows as $row) {
        echo "<br><table class='tableauligne'><tr><th><p>" . $row["id_questions"] . "</p></th><th><p>" . $row["pseudo_uti"] . "</p></th></tr>";
        echo "<tr><td><p>" . $row["date_questions"] . "</p></td><td><p>" . $row["lib_questions"] . "</p></td></tr>";
        echo "<tr><td><p>" . $row["date_reponse"] . "</p></td><td><p>" . $row["reponse"] . "</p></td></tr>";
        echo "</table>";
        if($row['id_type']==2 ||$row['id_type']==3){
        }
        echo '<a href="reponse_question.php?id_questions=' . $row['id_questions'] . '"><img class="image" src="img/reponse.png" alt="edit"></a>';
        echo '<a href="modif_question.php?id_questions=' . $row['id_questions'] . '"><img class="image" src="img/edit.png" alt="edit"></a>';
        echo '<a href="suppression_question.php?id_questions=' . $row['id_questions'] . '"><img class="image" src="img/trash.png" alt="edit"></a><br><br>';
      }
    } else {
      echo '<p> Désolé mais vous ne pouvez pas accèder à cette page! </p>';
      echo "Se <a class='connect' href='connexion.php'>connecter</a></p>";
    }
    ?>
  </div>
</body>

</html>