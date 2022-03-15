<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/questions.css">
    <title>Liste des questions</title>
</head>

<body>
    <div>
        <h1><a href="accueil2.php"><img class="image" src="img/home.png" alt="accueil" /></a>
            Foire aux questions
            <a href="accueil.php"><img class="logout" src="img/log_out.png" alt="log_out" /></a>
            <a href="ajout_question.php"><img class="ajout" src="img/ajout_question.png" alt="ajout_question" /></a>
        </h1>

        <table class="tableaucentre">
            <td element class="bord">
                <table>
                    <tr>
                        <td>
                            <p>Question</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Réponse</p>
                        </td>
                    </tr>
                </table><a href="modif_question.php"><img class="edit" src="img/edit.png" alt="edit" /></a><a href="suppression_question.php"><img class="trash" src="img/trash.png" alt="trash" /></a>
            </td>
        </table>
        </table>
        </table>

    </div>
    <?php
    /*$message="Test";
echo '<script type="text/javascript">window.alert("'.$message.'");</script>';*/
    ?>
</body>

</html>