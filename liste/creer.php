<?php
$dsn = 'mysql:host=localhost;dbname=projet liste';
$user = 'root';
$password = '';
try {
  $dbh = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
  die("Erreur lors de la connexion SQL : " . $ex->getMessage());
}

$nom_liste = isset($_POST['nom_liste']) ? $_POST['nom_liste'] : NULL;
$image_liste = isset($_POST['image_liste']) ? $_POST['image_liste'] : NULL;
$id_compte = isset($_POST['id_compte']) ? $_POST['id_compte'] : NULL;
$id_categorie = isset($_POST['id_categorie']) ? $_POST['id_categorie'] : NULL;
$submit = isset($_POST['submit']);

if ($submit) {
  try{
    $params = array(
      "nom_liste" => $nom_liste,
      "image_liste" => $image_liste,
      "id_compte" => $id_compte,
      "id_categorie" => $id_categorie,
    );
    $sql = "INSERT INTO liste VALUES (:nom_liste , :image_liste , :id_compte , :id_categorie)";
    $sth = $dbh->prepare($sql);
    $sth->execute($params);
  }catch (PDOException $e) {
    die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
  }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Creer</title>
  <link rel="stylesheet" href="../css/main.css">
</head>

<body>
  <h1>Liste</h1>
  <h3>Cette page permet de créer une liste</h3>
  <form action="accueil.php">
    <p>Nom de la liste<br><input type="text" name="nom_liste" id="nom_liste" placeholder="nom"> <br></p>
    <p>lien pour image<br><input type="text" name="image_liste" id="image_liste" placeholder="lien"> <br></p>
    <p>id de la catégorie<br><input type="text" name="id_categorie" id="id_categorie" placeholder="id"> <br></p>
    <p>id du compte<br><input type="text" name="id_compte" id="id_compte" placeholder="id"> <br></p>
    <p><input type="submit" name="submit" value="Valider"></p>
  </form>
  <p>Retourner à la page d'<a href="accueil.php" title="Retourner au l'accueil">accueil</a></p>
</body>

</html>