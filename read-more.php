<?php
session_start();
include "include/connect.php";
include "phpcode/crud.php";
$id = $_GET['id'];
$day = getDay($id);
$rowDay = mysqli_fetch_assoc($day)
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
        <div class="flex between w-100 m-t-50">
            <div>
                <h3 class="bold"><?php echo $rowDay['overskrift']; ?></h3>
            </div>
            <div class="flex">
                <h3>
                    <?php $date = $rowDay['dato'];
                    $dato = new DateTime("$date");
                    echo $dato->format('d-m-Y');
                    ?>
                </h3>
            </div>
        </div>

        <?php $dagId = $rowDay['id'];
        $billederne = getPictures($dagId);
        $erDerBilleder = getPictures($dagId);
        $rowErDer = mysqli_fetch_assoc($erDerBilleder);
        if ($rowErDer <> ''){
        ?>
        <?php while ($rowPic = mysqli_fetch_assoc($billederne)) {
            ?>
            <div class="slide">
                <img class="w-100 m-t-10" src="img/<?php echo $rowPic['filnavn'] ?>">
                <div class="flex between w-100">
                    <a class="w-30" href="slet-billede.php?id=<?php echo $rowPic['id']; ?>"><h3>Slet billede</h3></a>
                </div>
            </div>
            <?php
        }?>
        <form  class="w-100 flex between" action="post-tilfoej-billede.php?id=<?php echo $rowDay['id']; ?>" method="post" class="flex-column" enctype="multipart/form-data">
            <input class="readmore" id="file-upload" type="file" name="image" required>
            <input type="hidden" name="input" value="file-upload" required>
            <input class="m-l-10" type="submit" value="Tilføj billede"></input>
        </form>
        <?php
    }else{
            ?>
            <form  class="w-100 flex between" action="post-tilfoej-billede.php?id=<?php echo $rowDay['id']; ?>" method="post" class="flex-column" enctype="multipart/form-data">
                <input class="readmore" id="file-upload" type="file" name="image">
                <input type="hidden" name="input" value="file-upload">
                <input class="m-l-10" type="submit" value="Tilføj billede"></input>
            </form>
            <?php
        }
        ?>


        <div class="button">
            <button class="slidebutton" onclick="plusDivs(-1)">&#10094;</button>
            <button class="slidebutton" onclick="plusDivs(1)">&#10095;</button>
        </div>
        <p class="m-t-10"><?php echo $rowDay['beskrivelse']; ?></p>

    </section>
    <script src="javascript/script.js"></script>
</body>
</html>
