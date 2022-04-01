<?php
$dsn = 'mysql:host=localhost;dbname=meteonet'; // contient le nom du serveur et de
$user = 'root';
$password = '';
try {
    $dbh = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    die("Erreur lors de la connexion SQL : " . $ex->getMessage());
}
$sql = "select commune , nom, prenom from communes , personnes where communes.cp=personnes.cp order by commune ASC";
try {
    $sth = $dbh->prepare($sql);
    $sth->execute(array());
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $ex) {
    die("Erreur lors de la requête SQL : " . $ex->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>communes</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <h1>ph30c Communes</h1>
    <?php
    if (count($rows) > 0) {
        echo "<table> <tr> <th>commune</th><th>nom</th><th>prenom</th> </tr>";
        foreach ($rows as $row) {
            echo "<tr> <td>" . $row["commune"] . "</td><td>" . $row["nom"] . "</td><td>" . $row["prenom"] . "</td> </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Rien à afficher</p>";
    }
    echo "<br>".count($rows)." personne(s)";
    ?>
    <p>Liste des <a href="index.php">personnes</a></p>
</body>

</html>