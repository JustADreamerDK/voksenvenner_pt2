<?php
session_start();
include "include/connect.php";
include "phpcode/crud.php";
$id = $_GET['id'];
$pic = getPicture($id);
$row = mysqli_fetch_assoc($pic)
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
        <h2 class="m-t-50">Er du sikker på at du vil slette dette billede?</h2>
        <img class="w-100 m-t-10" src="img/<?php echo $row['filnavn'] ?>">
        <div class="flex between m-t-10 w-100">
            <a href="post-slet-billede.php?id=<?php echo $id; ?>"><h2>Ja</h2></a>
            <a href="forside.php"><h2>Nej</h2></a>
        </div>
    </section>
    <script src="javascript/script.js"></script>
</body>
</html>
