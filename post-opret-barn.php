<?php
session_start();
include "include/connect.php";
include "phpcode/crud.php";
$id = $_SESSION['id'];
$type = $_SESSION['brugertype'];
$fornavn = $_POST['fornavn'];
$efternavn = $_POST['efternavn'];
$fodselsdag = $_POST['fodselsdag'];
$bruger_id = $_POST['bruger_id'];
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
        <?php
            if($fornavn <> '' && $efternavn <> '' && $fodselsdag <> ''){
                createBarn($fornavn, $efternavn, $fodselsdag, $bruger_id);
                ?>
                <h3 class="m-t-50">Tillykke! Du har nu oprettet dit barn</h3>
                <h3 class="m-t-10"><a href="profile.php">Tilbage</a></h3>
                <?php
            }else{
                ?>
                <h3 class="m-t-50">Husk af udfylde alle felterne inden du trykker opret, gå tilbage og prøv igen</h3>
                <h3 class="m-t-10"><a href="opret-barn.php">Tilbage</a></h3>
                <?php
            }
        ?>
    </section>
    <script src="javascript/script.js"></script>
</body>
</html>
