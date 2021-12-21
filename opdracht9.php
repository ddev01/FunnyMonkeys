<?php

$user = "root";
$pass = "";

try {
    $dbh = new PDO('mysql:host=localhost;dbname=apen;port=3306', $user, $pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

$sql = "select * from leefgebied";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$leefgebieden = $stmt->fetchAll(PDO::FETCH_ASSOC);
var_dump($_GET);
if (isset($_GET['soort'])){
    $sql = 'insert into aap (soort) values (:soort)';
    $stmt = $dbh->prepare($sql);
    $stmt->execute([':soort' => $_GET['soort']]);
    $idaap = $dbh->lastInsertId();
    foreach($_GET['idleefgebied'] as $idleefgebied) {
        $sql = "insert into aap_has_leefgebied (idaap, idleefgebied) values (:idaap, :idleefgebied)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute([":idleefgebied" => $idleefgebied, ":idaap" => $idaap]);
    }
}
?>


<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>leefgebied</title>
</head>
<body>
<form>
    Aap toevoegen: <input type="text" name="soort"><br>
    <?php foreach($leefgebieden as $leefgebied) { ?>
    <input type="checkbox" name="idleefgebied[]" value="<?= $leefgebied['idleefgebied'] ?>"><?= $leefgebied ['omschrijving'] ?><br>
    <?php } ?>
    <input type="submit" name="verzend">
</form>
</body>
</html>