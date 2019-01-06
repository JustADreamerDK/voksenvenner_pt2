<?php
session_start();
include "include/connect.php";
include "phpcode/crud.php";
$id = $_SESSION['id'];
$type = $_SESSION['brugertype'];
$bruger = getUserById($id);
$row = mysqli_fetch_assoc($bruger);

$barn = getKidById($id);
$rowBarn = mysqli_fetch_assoc($barn);
$barnsNavn = $rowBarn['fornavn'];

$venskabsId = $row['venskab_id'];
$ven = getVen($venskabsId, $type);
$rowVen = mysqli_fetch_assoc($ven);
$morId = $rowVen['id'];
$barnVen = getKidById($morId);
$rowBarnVen = mysqli_fetch_assoc($barnVen);
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="UTF-8">
    <title>Børns Voksenvenner</title>
    <link href="css/reset.css" rel="stylesheet">
    <link href="css/css.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/tinyicon.png">
</head>
<body>
    <?php
    include "include/header.php";
    ?>
    <section class="flex-column p-lr-30">
        <h3 class="m-t-50">Navn</h3>
        <h3 class="bold"><?php
        echo $row['fornavn'] .' '. $row['efternavn'];
        ?></h3>
        <h3 class="m-t-50">Telefonnummer</h3>
        <h3 class="bold"><?php
        echo $row['telefonnr'];
        ?></h3>
        <h3 class="m-t-50">Mail</h3>
        <h3 class="bold"><?php
        echo $row['mail'];
        ?></h3>

        <?php
        if ($type == "2" || $type == "3"){
            $fodselsdag = $rowBarn['fodselsdag'];
            $fodselsdagen = $rowBarnVen['fodselsdag'];
            $date1=date_create("$fodselsdag");
            $date2=date_create("$fodselsdagen");
            $today=date("Y-m-d");
            $date3=date_create("$today");
            $diff=date_diff($date1,$date3);
            $diffDate=date_diff($date2,$date3);
            ?>
            <?php if ($type == "3" && $barnsNavn <> ''){ ?>
                <h3 class="m-t-50">Barn</h3>
                <h3 class="bold"><?php echo $barnsNavn . ' ' . $rowBarn['efternavn'];?>, <?php echo $diff->format("%y");  ?>  år</h3>
            <?php }if ($type == "3" && $barnsNavn == ''){ ?>
                <h3 class="m-t-50">Barn</h3>
                <h3 class="bold"><a href="opret-barn.php">Du har endnu ikke oprettet dit barn, klik her for at oprette barnet</a></h3>
            <?php } ?>
            <?php if ($type == "2"){ ?>
                <h3 class="m-t-50">Ven med</h3>
                <h3 class="bold"><?php echo $rowBarnVen['fornavn'] . ' ' . $rowBarnVen['efternavn'];?>, <?php echo $diffDate->format("%y");  ?>  år</h3>
            <?php } ?>
            <?php if ($type == "3"){ ?>
                <h3 class="m-t-50">Barns Voksenven</h3>
            <?php } ?>
            <?php if ($type == "2"){ ?>
                <h3 class="m-t-50">Vens forældre</h3>
            <?php } ?>
            <h3 class="bold"><?php
            echo $rowVen['fornavn'] . ' ' . $rowVen['efternavn'];
            ?></h3>
            <h3 class="m-t-50">Telefonnummer</h3>
            <h3 class="bold"><?php echo $rowVen['telefonnr']; ?></h3>
            <h3 class="m-t-50">Mail</h3>
            <h3 class="bold"><?php echo $rowVen['mail']; ?></h3>
        <?php } ?>
    </section>
    <script src="javascript/script.js"></script>
</body>
</html>
