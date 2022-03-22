<?php
$dsn = 'mysql:host=localhost;dbname=faq m2l';
$user = 'root';
$password = '';
try {
    $dbh = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    die("Erreur lors de la connexion SQL : " . $ex->getMessage());
}

$pseudo_uti = isset($_POST['pseudo_uti']) ? $_POST['pseudo_uti'] : NULL;
    $mail_uti = isset($_POST['mail_uti']) ? $_POST['mail_uti'] : NULL;
    $mdp_uti = isset($_POST['mdp_uti']) ? $_POST['mdp_uti'] : NULL;
    $id_ligue = isset($_POST['id_ligue']) ? $_POST['id_ligue'] : NULL;
    $id_type = 1;
    $submit = isset($_POST['submit']);

if ($submit) {

    $sql = "INSERT INTO utilisateur(pseudo_uti , mail_uti , mdp_uti , id_ligue, id_type) VALUES (:pseudo_uti , :mail_uti , :mdp_uti , :id_ligue, :id_type)";
    try {
        $sth = $dbh->prepare($sql);
        $sth->execute(array(
            ':pseudo_uti' => $pseudo_uti,
            ':mail_uti' => $mail_uti,
            ':mdp_uti' => $mdp_uti,
            ':id_ligue' => $id_ligue,
            ':id_type' => $id_type
        ));
    } catch (PDOException $ex) {
        die("Erreur lors de la requête SQL : " . $ex->getMessage());
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

        <table>
            <tr>
                <td>
                    <form action="inscription.php" method="post">
                        <input type="text" id="pseudo_uti" name="pseudo" placeholder="pseudo" />
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    <form action="inscription.php" method="post">
                        <input type="text" id="mail_uti" name="adresse email" placeholder="adresse email" />
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    <form action="inscription.php" method="post">
                        <input type="password" id="mdp_uti" name="mot de passe" placeholder="mot de passe" />
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    <form action="inscription.php" method="post" style="width:0px;">
                        <select name="choix de ligue" id="id_ligue">
                            <option value="">------------------------------------</option>
                            <option value="1">ligue1</option>
                            <option value="2">ligue2</option>
                            <option value="3">ligue3</option>
                            <option value="4">ligue4</option>
                            <option value="5">ligue4</option>
                        </select>
                    </form>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <form action="index.php" method="post">
                        <input type="submit" value="annuler" />
                    </form>
                </td>
                <td>
                    <form action="inscription.php" method="post">
                        <input type="submit" value="valider" />
                    </form>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>