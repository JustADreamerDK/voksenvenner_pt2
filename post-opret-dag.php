<?php
session_start();
include "include/connect.php";
include "phpcode/crud.php";
include "phpcode/file-upload.php";
$id = $_SESSION['id'];
$bruger = getUserById($id);
$row = mysqli_fetch_assoc($bruger);
$dato = $_POST['dato'];
$sted = $_POST['sted'];
$overskrift = $_POST['overskrift'];
$om = $_POST['om'];
$venskab_id = $row['venskab_id'];
createDay($dato, $sted, $overskrift, $om, $venskab_id);
$lastDay = getLastDay();
$rowLast = mysqli_fetch_assoc($lastDay);
$dag = $rowLast['id'];
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


 <?php
     if (isset($_REQUEST['input'])) {
         $input = $_REQUEST['input'];
     }
     switch ($input) {
         case 'file-upload':
         $pathToFileFolder = 'img/';
         $sizes = [
             'large' => 1000,
         ];
         $uploadedFilePaths = uploadAndResizeImage($_FILES['image'], $pathToFileFolder, $sizes);
         $large = array_values($uploadedFilePaths)[0];
         $explode_large = explode("/", $large);
         $large_picture = $explode_large[1];
         createPicture("$large_picture", "$dag");
         break;
     }
     ?>


     <h2 class="m-t-50">
         <?php if ($large_picture <> ''){
             ?>
             Dagen er nu oprettet!
             <?php
         }else{
             ?>
             Dagen blev desværre ikke oprettet, prøv igen.
             <?php
         } ?>
     </h2>
     <a class="m-t-50" href="forside.php"><h3>Tilbage</h3></a>


    </section>
</body>
</html>
