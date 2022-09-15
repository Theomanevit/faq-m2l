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
$submit = isset($_POST['submit']);

if ($submit) {
    $mail_uti = isset($_POST['mail_uti']) ? $_POST['mail_uti'] : NULL;
    $pseudo_uti = isset($_POST['pseudo_uti']) ? $_POST['pseudo_uti'] : NULL;
    $mdp_uti = isset($_POST['mdp_uti']) ? $_POST['mdp_uti'] : NULL;
    $id_ligue = isset($_POST['id_ligue']) ? $_POST['id_ligue'] : NULL;
    $hash = password_hash($mdp_uti, PASSWORD_BCRYPT) ;

    try {
        $sql = "INSERT INTO utilisateur(pseudo_uti , mail_uti , mdp_uti , id_ligue, id_type) VALUES (:pseudo_uti , :mail_uti , :mdp_uti , :id_ligue , :id_type)";
        $params = array(
            ":pseudo_uti" => $pseudo_uti,
            ":mail_uti" => $mail_uti,
            ":mdp_uti" => $hash,
            ":id_ligue" => $id_ligue,
            ":id_type" => 1
        );
        $sth = $dbh->prepare($sql);
        $sth->execute($params);
    } catch (PDOException $ex) {
        die("Erreur lors de la requête SQL : " . $ex->getMessage());
    }

    echo $hash;
    try {
        $sql = "select id_utilisateur from utilisateur where pseudo_uti = :pseudo_uti and mdp_uti = :mdp_uti";
        $params = array(
          "pseudo_uti" => $pseudo_uti,
          "mdp_uti" => $hash,
        );
        $sth = $dbh->prepare($sql);
        $sth->execute($params);
      } catch (PDOException $e) {
        die("<p>Erreur lors de la requête SQL : " . $e->getMessage() . "</p>");
      }
    if ($sth->rowCount()) {
        $_SESSION["pseudo_uti"] = $hash;
        $_SESSION["id_utilisateur"] = $id_utilisateur;
        header('location: connexion.php');
    } else {
        echo "<p> Essayez encore ! </p>";
    }
    print_r($sql);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <header>
        <nav>
            <a class="accueil">
                Inscription
            </a>
        </nav>
    </header>

    <div>
        <h1>M2l</h1>
        <form action="inscription.php" method="post">
            <p> <input type="text" name="pseudo_uti" placeholder="pseudo" required /><br></p>
            <p> <input type="text" name="mail_uti" placeholder="adresse email" required /><br></p>
            <p> <input type="password" name="mdp_uti" placeholder="mot de passe" required /><br></p>
            <p> <select name="id_ligue" required>
                    <option value="">------------LIGUES-------------</option>
                    <option value="2">Ligue de basket</option>
                    <option value="3">Ligue de volley</option>
                    <option value="4">Ligue de handball</option>
                    <option value="5">Ligue de football</option>
                </select><br></p>
            <p><input type="submit" name="submit" value="inscription">
                <button>
                    <a href="index.php">retour</a>
                </button>
            </p>
        </form>
    </div>
</body>

</html>