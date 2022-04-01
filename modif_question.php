<?php
$dsn = 'mysql:host=localhost;dbname=faq m2l'; // contient le nom du serveur et de
$user = 'root';
$password = '';
try {
    $dbh = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    die("Erreur lors de la connexion SQL : " . $ex->getMessage());
}

$id_questions = isset($_GET['id_questions']) ? $_GET['id_questions'] : '';
$question = isset($_POST['question']) ? $_POST['question'] : '';
$submit = isset($_POST['submit']);


if ($submit) {
    $sql = "update questions set lib_questions=:lib_questions where id_questions=:id_questions";
    try {
        $sth = $dbh->prepare($sql);
        $sth->execute(array(
            ':id_questions' => $id_questions
        ));
        $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
        die("Erreur lors de la requête SQL : " . $ex->getMessage());
    }
    header("location: question.php");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/questions.css">
    <title>modification question</title>
</head>

<body>
    <div>
        <h1><a href="accueil2.php"><img class="image" src="img/home.png" alt="accueil" /></a>
            Foire aux questions
            <a href="déconnexion.php"><img class="logout" src="img/log_out.png" alt="log_out" /></a>
        </h1>
    </div>
    <table class="tableaucentre">
        <td element class="bord">
            <table>
                <tr>
                    <td>
                        <p>Ancienne question</p>
                    </td>
                    <td>
                        <form method="post" action="traitement.php">
                            <p>
                                <label for="question">la question :</label><br />
                                <?php
                                try {
                                    $id_questions = isset($_GET['id_questions']) ? $_GET['id_questions'] : '';
                                    $id_questions = $_POST['id_questions'];
                                    $sql = "select lib_questions from questions where id_questions=:id_questions";
                                    $sth = $dbh->prepare($sql);
                                    $sth->execute(array(
                                        ':id_questions' => $id_questions
                                    ));
                                    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
                                } catch (PDOException $ex) {
                                    die("<p>Erreur lors de la requête SQL : " . $ex->getMessage() . "</p>");
                                }
                                foreach ($rows as $row) {
                                    echo $row["lib_question"];
                                }
                                echo "valeur $id_questions";
                                ?>
                            </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Nouvelle question </p>
                    </td>
                    <td>
                        <form method="post" action="modification.php">
                            <p>
                                <label for="reponse">Modifiez ici votre réponse :</label><br />
                                <textarea name="modif" name="modif"></textarea><br />
                            </p>
                    </td>
                </tr>

        </td>
    </table><a class="boutondroite" href="questions.php"> <input type="button" value="Valider"> </a>
    <a class="boutondroite" href="questions.php"><input type="button" value="Annuler"></a>

    </table>
    </table>
    </div>
</body>

</html>