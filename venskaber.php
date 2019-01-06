<?php
session_start();
include "include/connect.php";
include "phpcode/crud.php";
$type = $_SESSION['brugertype'];
$venskab = getFriendships();
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
        <button class="m-t-50"><a href="nyt-venskab.php">Opret nyt venskab</a></button>
        <table class="m-t-50">
            <tr>
                <td><h3 class="bold">Venskabs id</h3></td>
                <td><h3 class="bold">Forældre</h3></td>
                <td><h3 class="bold">Barn</h3></td>
                <td><h3 class="bold">Voksenven</h3></td>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($venskab)) {
                $venskabsId = $row['venskabs_key'];
                ?>
                <tr>
                    <td><h3><?php echo $venskabsId ?></h3></td>
                    <?php
                    $mor = getMother($venskabsId);
                    $rowMor = mysqli_fetch_assoc($mor);
                    ?>
                    <td><h3><?php echo $rowMor['fornavn']; ?></h3></td>
                    <?php
                    $id = $rowMor['id'];
                    $barn = getKidById($id);
                    $rowBarn = mysqli_fetch_assoc($barn); ?>
                    <td><h3><?php echo $rowBarn['fornavn']; ?></h3></td>
                    <?php
                    $type = $rowMor['brugertype_id'];
                    $ven = getVen($venskabsId, $type);
                    $rowVen = mysqli_fetch_assoc($ven); ?>
                    <td><h3><?php echo $rowVen['fornavn']; ?></h3></td>
                </tr>
                <?php
            } ?>
        </table>
    </section>
    <script src="javascript/script.js"></script>
</body>
</html>
