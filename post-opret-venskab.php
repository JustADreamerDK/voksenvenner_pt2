<?php
session_start();
include "include/connect.php";
include "phpcode/crud.php";
$venskabsId = $_POST['venskabs-id'];
createVenskab($venskabsId);
header("location:venskaber.php");
die();
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
    <section class="flex-column center">
            <?php

            ?>
    </section>
</body>
</html>
