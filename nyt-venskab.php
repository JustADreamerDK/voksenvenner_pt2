<?php
session_start();
include "include/connect.php";
include "phpcode/crud.php";
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
            <form  class="w-100 flex-column center m-t-50" action="post-opret-venskab.php" method="post" class="flex-column">
                <input class="m-10 w-80" type="text" name="venskabs-id" value="<?php echo rand(9999,100000); ?>"></input>
                <input class="m-10 w-80" type="submit" value="Opret venskab"></input>
            </form>
            <h3 class="m-t-50">Ønsker du at oprette en venskabskode, tryk da på "Opret venskab", ellers kan du gå tilbage</h3>
            <h3 class="m-t-10"><a href="venskaber.php">Tilbage</a></h3>
    </section>
    <script src="javascript/script.js"></script>
</body>
</html>
