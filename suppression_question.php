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
$lib_questions = isset($_POST['lib_questions']) ? $_POST['lib_questions'] : '';
$submit = isset($_POST['submit']);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/questions.css">
    <title>suppression des questions</title>
</head>

<body>
    <div>
        <h1>
            <a href="accueil2.php"><img class="image" src="img/home.png" alt="accueil" /></a>
            Foire aux questions
            <a href="déconnexion.php"><img class="logout" src="img/log_out.png" alt="log_out" /></a>
        </h1>


                <table>
                    <tr>
                        <td>question</td>
                        <td>
                            <?php
                            if ($submit) {
                                $id_questions = $_POST['id_questions'];
                                $sql = "DELETE from questions where id_questions=:id_questions";
                                try {
                                    $sth = $dbh->prepare($sql);
                                    $sth->execute(array(
                                        ':id_questions' => $id_questions
                                    ));
                                    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
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
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Réponse</p>
                        </td>
                        <td>

                        </td>
                    </tr>

            </td>
        </table>
        <form action="suppression_question.php" method="post">
            <div><input name="id_questions" id="id_questions" type="hidden" value="<?php echo $id_questions; ?>" /></div>
            <input type="submit" name="submit" value="valider la suppression">
            <button>
                <a href="questions.php">retour</a>
            </button>
        </form>





    </div>
</body>

</html>