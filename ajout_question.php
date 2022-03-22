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
                    <form method="post" action="traitement.php">
                        <p>
                            <label for="question">Ecrivez ici votre question :</label><br />
                            <textarea name="question" id="question" placeholder="question"></textarea><br />
                            <p><a href="questions.php"> <input type="button" value="annuler">
                            <a href="questions.php"> <input type="button" value="Valider"> </a></p>
                        </p>
                </th>
            </tr>
        </table>
        </form>
</body>
</html>