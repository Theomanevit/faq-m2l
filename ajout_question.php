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
    $lib_questions = isset($_POST['lib_questions']) ? $_POST['lib_questions'] : NULL;

    try {
        $sql = "INSERT INTO questions(lib_questions , id_utilisateur) VALUES (:lib_questions , :id_utilisateur )";
        $params = array(
            ":lib_questions" => $lib_questions,
            ":id_utilisateur" => $_SESSION["id_utilisateur"]

        );
        $sth = $dbh->prepare($sql);
        $sth->execute($params);
    } catch (PDOException $ex) {
        die("Erreur lors de la requête SQL : " . $ex->getMessage());
    }
    if ($sth->rowCount()) {
        header('location: questions.php');
    } else {
        echo "<p> Essayez encore ! </p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/questions.css">
    <title>Ajout question FAQ M2L</title>
</head>

<body>
    <div>
        <h1><a href="accueil2.php"><img class="image" src="img/home.png" alt="accueil" /></a>
            Ajouter une question
            <a href="index.php"><img class="logout" src="img/log_out.png" alt="log_out" /></a>
        </h1>
        <table class="tableaucentre">
            <tr>
                <th>
                    <form method="post" action="ajout_question.php">
                        <p>
                            <label for="question">Ecrivez ici votre question :</label><br />
                            <textarea name="lib_questions" placeholder="question"></textarea><br />
                            <p><button>
                                <a href="questions.php">retour
                            </button>   
                            <input type="submit" name="submit"><br></p>
                        </p>
                </th>
            </tr>
        </table>
        </form>
</body>
</html>