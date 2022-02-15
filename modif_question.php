<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/questions.css">
    <title>Document</title>
</head>

<body>
    <div>
            <h1><a href="accueil2.php"><img class="image" src="img/home.png" alt="accueil" /></a>
                Foire aux questions
                <a href="accueil.php"><img class="logout" src="img/log_out.png" alt="log_out" /></a>
            </h1>
    </div>
    <table class="tableaucentre">
        <td element class="bord">
            <table>
                <tr>
                    <td>
                        <p>Contenu question</p>
                    </td>
                    <td>
                        <form method="post" action="traitement.php">
                            <p>
                                <label for="question">Modifiez ici votre question :</label><br />
                                <textarea name="question" id="question"></textarea><br />
                            </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>contenu réponse</p>
                    </td>
                    <td>
                        <form method="post" action="traitement.php">
                            <p>
                                <label for="reponse">Modifiez ici votre réponse :</label><br />
                                <textarea name="reponse" id="reponse"></textarea><br />
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