<?php
session_start();
include "include/connect.php";
include "phpcode/crud.php";
$id = $_SESSION['id'];
$type = $_SESSION['brugertype'];
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
        <h2 class="m-t-50 bold">Børns Voksenvenner Odense</h2>
        <h3 class="m-t-50">Kontaktperson</h3>
        <h3 class="bold">Lise Jensen</h3>
        <h3 class="m-t-50">Telefonnummer</h3>
        <h3 class="bold">70121416</h3>
        <h3 class="m-t-50">Mail</h3>
        <h3 class="bold">Lise@voksenven-odense.dk</h3>

        <h2 class="m-t-50 bold">Børns Voksenvenner</h2>
        <h3 class="m-t-50">Kontaktperson</h3>
        <h3 class="bold">Benny Clausen</h3>
        <h3 class="m-t-50">Telefonnummer</h3>
        <h3 class="bold">88888888</h3>
        <h3 class="m-t-50">Mail</h3>
        <h3 class="bold">benny@voksenven.dk</h3>
    </section>
    <script src="javascript/script.js"></script>
</body>
</html>
