
<?php
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
    // $sql = "select * from user where login = '$login' and password = '$password'";
    $sql = "select pseudo_uti , mdp_uti from compte where pseudo_uti = :pseudo_uti and mdp_uti = :mdp_uti";
    $params = array(
      "pseudo_uti" => $pseudo_uti,
      "mdp_uti" => $mdp_uti,
    );
    $sth = $dbh->prepare($sql);
    $sth->execute($params);
    //$rows = $sth->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
  }
  if ($sth->rowCount()) {
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connextion</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <a class="accueil">Connexion</a> <br>
    <div>
    <h1>
        M2l
    </h1>
    <table>
        <tr><td><form action="connexion.php" method="post" >
    <input type="text" name="pseudo" placeholder="pseudo"/>
    </form></td></tr>
        <tr><td><form action="connexion.php" method="post">
    <input type="password" name="mot de passe" placeholder="mot de passe"/>
    </form></td></tr>
    </table>
    <table>
            <tr>
                <td>
                    <form action="index.php" method="post">
                        <input type="submit" value="annuler" />
                    </form>
                </td>
                <td>
                    <form action="accueil2.php" method="post">
                        <input type="submit" value="valider" />
                    </form>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>