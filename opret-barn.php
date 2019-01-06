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
    <section class="flex-column center p-lr-30">
        <h2 class="m-t-50">Opret dit barn</h2>
            <form  class="m-t-50 w-100 flex-column center" action="post-opret-barn.php" method="post" class="flex-column">
                <input class="m-10 w-80" type="text" name="bruger_id" value="<?php echo $id ?>" hidden></input>
                <input class="m-10 w-80" type="text" name="fornavn" placeholder="Fornavn"></input>
                <input class="m-10 w-80" type="text" name="efternavn" placeholder="Efternavn"></input>
                <h3 class="m-10">Fødselsdag</h3>
                <input class="m-10 w-80" type="date" name="fodselsdag"></input>
                <input class="m-10 w-80" type="submit" value="Opret barn"></input>
            </form>
    </section>
    <script src="javascript/script.js"></script>
</body>
</html>
