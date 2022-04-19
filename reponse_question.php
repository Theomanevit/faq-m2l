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
$reponse = isset($_POST['reponse']) ? $_POST['reponse'] : '';
$submit = isset($_POST['submit']);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/questions.css">
    <title>réponse question</title>
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
                        <?php
                        ?>
                        <p>Ancienne question</p>
                    </td>
                    <td>
                        <p>la question :</p>
                        <?php
                        if ($submit) {
                            $id_questions = $_POST['id_questions'];
                            $sql = "UPDATE questions set reponse=:reponse where id_questions = :id_questions ";
                            try {
                                $sth = $dbh->prepare($sql);
                                $sth->execute(array(
                                    ':reponse' => $reponse,
                                    ':id_questions' => $id_questions
                                ));
                                header("location: questions.php");
                                
                            } catch (PDOException $ex) {
                                die("Erreur lors de la requête SQL : " . $ex->getMessage());
                            }
                            header("location: questions.php");
                        } else {
                            try {
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
                                echo $row["lib_questions"];
                            }
                            echo "<br><br>";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Nouvelle question </p>
                    </td>
                    <td>
                        <form method="post" action="reponse_question.php">
                            <p>Réponse à la question : <br>
                            <div><input name="id_questions" id="id_questions" type="hidden" value="<?php echo $id_questions; ?>" /></div>
                                <textarea name="reponse"></textarea><br />
                                <input type="submit" name="submit" value="Valider">
                                <button>
                                    <a href="questions.php">Annuler</a>
                                </button>
                            </p>
                    </td>
                </tr>

        </td>
    </table>

    </table>
    </table>
    </div>
</body>

</html>