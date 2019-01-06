<?php
session_start();
include "include/connect.php";
include "phpcode/crud.php";
$dag = $_POST['id'];
$dato = $_POST['dato'];
$sted = $_POST['sted'];
$overskrift = $_POST['overskrift'];
$om = $_POST['om'];
updateDay($dag, $dato, $sted, $overskrift, $om);
header("location:read-more.php?id=$dag");
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
    <section class="flex-column center">
        <h2>
        <?php

         ?>
     </h2>

    </section>
</body>
</html>
