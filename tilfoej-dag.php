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
        <form  class="m-t-50 w-100 flex-column center" action="post-opret-dag.php" method="post" class="flex-column"  enctype="multipart/form-data">
            <input class="m-10 w-80" type="date" name="dato" placeholder="Dato" required></input>
            <input class="m-10 w-80" type="text" name="sted" placeholder="Sted" maxlength="90" required></input>
            <input class="m-10 w-80" type="text" name="overskrift" placeholder="Overskrift" maxlength="90" required></input>
            <label class="fileContainer w-80 flex-column center">
                <h2>Tilføj billede</h2>
                <input class="w-80" id="file-upload" type="file" name="image" required>
                <input type="hidden" name="input" value="file-upload" required>
            </label>
            <textarea placeholder="Skriv om dagen" name="om" rows="10" class="m-10 w-80"></textarea>
            <input class="m-10 w-80" type="submit" value="Opret dagen"></input>
        </form>
    </section>
    <script src="javascript/script.js"></script>
</body>
</html>
