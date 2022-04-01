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

$nom = isset($_POST['nom']) ? $_POST['nom'] : '';
$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
$age = isset($_POST['age']) ? $_POST['age'] : '';
$cp = isset($_POST['cp']) ? $_POST['cp'] : '';
$submit = isset($_POST['submit']);


if ($submit) {
    $sql = "insert into personnes(nom,prenom,age,cp) values (:nom,:prenom,:age,:cp)";
    try {
        $sth = $dbh->prepare($sql);
        $sth->execute(array(
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':age' => $age,
            ':cp' => $cp
        ));
    } catch (PDOException $ex) {
        die("Erreur lors de la requête SQL : " . $ex->getMessage());
    }
    header("location: index.php");
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajouter</title>
</head>

<body>
    <h1>ph30d Meteonet</h1>
    <h2>modification d'une personne</h2>
    <p>Veuillez saisir une personne SVP</p> 
    <form action="ajouter.php" method="POST">
        <label for="nom">nom</label> <br>
        <input type="text" name="nom" placeholder="nom" required> <br>
        <label for="prenom">Prenom</label> <br>
        <input type="text" name="prenom" placeholder="prenom" required> <br>
        <label for="age">Age</label> <br>
        <input type="text" name="age" placeholder="age" required> <br>
        <label for="cp">cp</label> <br>
        <input type="text" name="cp" placeholder="cp"> <br><br>
        <input type="submit" name="submit" value="ajouter">
        <input type="reset" name="reset " value="réinitialiser">
    </form>
    <p>Liste des <a href="index.php">personnes</a></p>
</body>

</html>