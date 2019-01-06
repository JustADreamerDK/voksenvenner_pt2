<?php
session_start();
include "include/connect.php";
include "phpcode/crud.php";
$id = $_GET['id'];
$type = $_SESSION['brugertype'];
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
                    <?php if($type == '2' OR $type == '3'){ ?>
                        <div class="flex between w-100">
                            <a class="w-30" href="slet-billede.php?id=<?php echo $rowPic['id']; ?>"><h3>Slet billede</h3></a>
                        </div>
                    <?php } ?>
                </div>
                <?php
            }?>
            <?php if($type == '2' OR $type == '3'){ ?>
                <form  class="w-100 flex between" action="post-tilfoej-billede.php?id=<?php echo $rowDay['id']; ?>" method="post" class="flex-column" enctype="multipart/form-data">
                    <input class="readmore" id="file-upload" type="file" name="image" required>
                    <input type="hidden" name="input" value="file-upload" required>
                    <input class="m-l-10" type="submit" value="Tilføj billede"></input>
                </form>
                <?php
            }}else{
                ?>
                <?php if($type == '2' OR $type == '3'){ ?>
                    <form  class="w-100 flex-column between center" action="post-tilfoej-billede.php?id=<?php echo $rowDay['id']; ?>" method="post" enctype="multipart/form-data">
                        <input class="readmore" id="file-upload" type="file" name="image">
                        <input type="hidden" name="input" value="file-upload">
                        <input class="m-l-10" type="submit" value="Tilføj billede"></input>
                    </form>
                    <?php
                }}
                ?>

                <?php if ($rowErDer <> ''){ ?>
                    <div class="button">
                        <button class="slidebutton" onclick="plusDivs(-1)">&#10094;</button>
                        <button class="slidebutton" onclick="plusDivs(1)">&#10095;</button>
                    </div>
                <?php } ?>
                <p class="m-t-10"><?php echo $rowDay['beskrivelse']; ?></p>

                <?php if($type == '2' OR $type == '3'){ ?>
                    <h4 class="m-t-50">Må dagen bruges til markedsføring?</h4>
                    <?php if($type == '2'){ ?>
                        <h6 class="light cursive">Du har valgt at dagen
                            <?php if($rowDay['bruges_ven'] == '1'){
                                echo "ikke";
                            } ?>
                            må bruges til markedsføring.
                        </h6>
                    <?php }if($type == '3'){ ?>
                        <h6 class="light cursive">Du har valgt at dagen
                            <?php if($rowDay['bruges_mor'] == '1'){
                                echo "ikke";
                            } ?>
                            må bruges til markedsføring.
                        </h6>
                    <?php } ?>


                    <form  class="w-100 flex between center" action="accept.php?id=<?php echo $rowDay['id']; ?>&brugertype=<?php echo $type ?>" method="post">
                        <select class="m-10 w-80" name="accept">
                            <option value="2">Ja</option>
                            <option value="1">Nej</option>
                        </select>
                        <input class="m-l-10 p-lr-30" type="submit" value="Send accept"></input>
                    </form>

                    <ul class="flex between m-10">
                        <li><a href="rediger-dag.php?id=<?php echo $rowDay['id']; ?>"><h3>Rediger dag</h3></a></li>
                        <li><a href="slet-dag.php?id=<?php echo $rowDay['id']; ?>"><h3>Slet dag</h3></a></li>
                    </ul>
                <?php } ?>

            </section>
            <script src="javascript/script.js"></script>
        </body>
        </html>
