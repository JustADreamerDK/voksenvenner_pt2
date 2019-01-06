<?php
session_start();
include "include/connect.php";
include "phpcode/crud.php";
include "phpcode/file-upload.php";
$id = $_SESSION['id'];
$dag = $_GET['id'];
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
        }
        ?>
        <h2 class="m-t-50">
            <?php if ($large_picture <> ''){
                ?>
                Billedet er nu uploadet til dagen!
                <?php
            }else{
                ?>
                Billedet blev desværre ikke uploadet, prøv igen.
                <?php
            } ?>
        </h2>
        <a class="m-t-50" href="read-more.php?id=<?php echo $dag ?>"><h3>Tilbage</h3></a>

    </section>
</body>
</html>
