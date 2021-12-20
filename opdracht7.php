<?php

$user = "root";
$pass = "";

try {
    $dbh = new PDO('mysql:host=localhost;dbname=apen;port=3306', $user, $pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

if (isset($_GET['soort'])){
    $stmt = $dbh->prepare('SELECT * from aap 
join aap_has_leefgebied on aap.idaap = aap_has_leefgebied.idaap 
join leefgebied on leefgebied.idleefgebied = aap_has_leefgebied.idleefgebied
where soort = :soort');
    $stmt->execute([':soort' => $_GET['soort']]);
    $aap = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    soort aap: <input type="text" name="soort">
    <input type="submit" name="verzend">
</form>
<ul>
    <?php if ($aap) { ?>
        <h3>De <?= $aap[0]['soort']?> bevind zich in:</h3>
        <?php foreach($aap as $aap1) { ?>
        <li>
            <?= $aap1['omschrijving']?>
        </li>
        <?php } ?>
    <?php } ?>
</ul>
</body>
</html>