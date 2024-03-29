<?php

session_start();


$dsn = 'mysql:host=localhost;dbname=faq m2l';  // contient le nom du serveur et de la base
$user = 'root';
$password = '';
try {
  $dbh = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
  die("Erreur lors de la connexion SQL : " . $ex->getMessage());
}

// Récupère le formulaire saisi
$pseudo_uti = isset($_POST['pseudo_uti']) ? $_POST['pseudo_uti'] : NULL;
$mdp_uti = isset($_POST['mdp_uti']) ? $_POST['mdp_uti'] : NULL;
$submit = isset($_POST['submit']);
$message = "";

// Cherche le user dans la base
if ($submit) {
  try {
    $sql = "select mdp_uti from utilisateur where pseudo_uti = :pseudo_uti";
    $params = array(
      "pseudo_uti" => $pseudo_uti,
    );
    $sth = $dbh->prepare($sql);
    $sth->execute($params);
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
  }
  foreach ($rows as $row) {
    $hash = $row["mdp_uti"];
  }
  if (password_verify($mdp_uti, $hash)) {
    try {
      // $sql = "select * from user where login = '$login' and password = '$password'";
      $sql = "select id_utilisateur from utilisateur where pseudo_uti = :pseudo_uti and mdp_uti = :mdp_uti";
      $params = array(
        "pseudo_uti" => $pseudo_uti,
        "mdp_uti" => $hash,
      );
      $sth = $dbh->prepare($sql);
      $sth->execute($params);
      $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
    }
    if ($sth->rowCount()) {
      $_SESSION["pseudo_uti"] = $pseudo_uti;
      $_SESSION["mdp_uti"] = $mdp_uti;
      foreach ($rows as $row) {
        $id_utilisateur = $row["id_utilisateur"];
      }
      $_SESSION["id_utilisateur"] = $id_utilisateur;
      header('location: accueil2.php');
    }
  } else {
    echo 'mot de passe invalide';
  }
}
?>




<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>connexion</title>
  <link rel="stylesheet" href="css/index.css">
</head>

<body>
  <a class="accueil">Connexion</a> <br>
  <div>
    <h1>
      M2l
    </h1>
    <table>
      <tr>
        <td>
          <form action="connexion.php" method="post">
            <p> <input type="text" name="pseudo_uti" placeholder="pseudo" required /> <br> </p>
            <p> <input type="password" name="mdp_uti" placeholder="mot de passe" required /> <br> </p>
            <p> <input type="submit" name="submit" value="connexion" />
              <button>
                <a href="index.php">retour</a>
              </button>
            </p>
          </form>
        </td>
      </tr>
    </table>
    <table>
  </div>
</body>

</html>