
<?php
$dsn = 'mysql:host=localhost;dbname=liste';  // contient le nom du serveur et de la base
$user = 'root';
$password = '';
try {
  $dbh = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
  die("Erreur lors de la connexion SQL : " . $ex->getMessage());
}

// Récupère le formulaire saisi
$identifiant = isset($_POST['identifiant']) ? $_POST['identifiant'] : NULL;
$mot_de_passe = isset($_POST['mot_de_passe']) ? $_POST['mot_de_passe'] : NULL;
$submit = isset($_POST['submit']);
$message = "";

// Cherche le user dans la base
if ($submit) {
  try {
    // $sql = "select * from user where login = '$login' and password = '$password'";
    $sql = "select identifiant , mot_de_passe from compte where identifiant = :identifiant and mot_de_passe = :mot_de_passe";
    $params = array(
      "identifiant" => $identifiant,
      "mot_de_passe" => $mot_de_passe,
    );
    $sth = $dbh->prepare($sql);
    $sth->execute($params);
    //$rows = $sth->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
  }
  if ($sth->rowCount()) {
    $message = "connecté !";
    header('location: accueil.php');
  } else {
    $message = "Essayez encore !";
  }
}
?>



<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>index</title>
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
  <h1>Liste</h1>
  <h2>Connexion</h2>
  <p><?= $message; ?></p>
  <form action="index.php" method="post">
    <p>Identifiant<br><input type="text" name="identifiant" id="identifiant"></p>
    <p>Mot de passe<br><input type="text" name="mot_de_passe" id="mot_de_passe"></p>
    <p><input type="submit" name="submit" value="OK"></p>
  </form>
</body>

</html>