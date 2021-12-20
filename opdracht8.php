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
where soort like :soort');
    $stmt->execute([':soort' => '%'.$_GET['soort'].'%']);
    $apen = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($apen as $temp){
        $aap[$temp['soort']] [] = $temp['omschrijving'];
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
    soort aap: <input type="text" name="soort">
    <input type="submit" name="verzend">
</form>
<H3>Resultaten:</H3>
<ul>
    <?php foreach($aap as $soort => $leefgebieden) { ?>
    <li>
        <?= $soort ?>
        <ul>
            <?php foreach($leefgebieden as $leefgebied) { ?>
            <li>
                <?= $leefgebied ?>
            </li>
            <?php } ?>
        </ul>
    </li>
    <?php } ?>
</ul>
</body>
</html>