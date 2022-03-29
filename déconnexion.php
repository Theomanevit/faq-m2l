<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>déconnection</title>
    <link rel="stylesheet" href="css/déco.css">
</head>

<body>

    <div>
        <h1>
            M2l
        </h1>
        <table>
            <tr>
                <td>
                    <h2>Déconnexion</h2>
                    <?php
                        if (isset($_SESSION['pseudo_uti'])) {
                            $pseudo_uti = $_SESSION['pseudo_uti'];
                            session_unset();
                            session_destroy(); 
                            setcookie(session_name(),'',-1,'/'); 
                        }
                        echo '<p>'.$pseudo_uti.', vous êtes déconnecté</p>';
                    ?>
                </td>
            </tr>
        </table>
        <center>
            <a href="index.php"><input type="submit" value="accueil" /></a>
        </center>
    </div>
</body>

</html>