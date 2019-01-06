<?php
session_start();
include "include/connect.php";
include "phpcode/crud.php";
$id = $_SESSION['id'];
$type = $_SESSION['brugertype'];
$bruger = getUserById($id);
$row = mysqli_fetch_assoc($bruger);

$venskabsId = $row['venskab_id'];
$day = getDayById($venskabsId);
$dayTest = getDayById($venskabsId);
$rowDayTest = mysqli_fetch_assoc($dayTest);

$start = 0;
$limit = 5;
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
    <section class="flex-column center p-b-175">
        <?php if ($rowDayTest['id'] == '' && $type == '2'){
            ?>
            <h2 class="m-t-half">Tilføj en dag</h2>
            <img class="m-t-50" src="img/head.png">
        <?php }if ($rowDayTest['id'] == '' && $type == '3'){
            ?>
            <h2 class="m-t-half">Tilføj en dag</h2>
            <img class="m-t-50" src="img/head.png">
        <?php } ?>
        <?php if ($type == 2 || $type == 3) {
            ?>
            <a href="tilfoej-dag.php"><button class="tilfoej">+</button></a>
        <?php }if($type == '1'){
            $days = getDays();
            while ($rowDays = mysqli_fetch_assoc($days)) {
                ?>
                <div class="special w-80 m-t-50 p-25">
                    <div class="flex between w-100">
                        <div>
                            <h3 class="bold"><?php echo $rowDays['overskrift']; ?></h3>
                        </div>
                        <div class="flex">
                            <h3>
                                <?php $date = $rowDays['dato'];
                                $dato = new DateTime("$date");
                                echo $dato->format('d-m-Y');
                                ?>
                            </h3>
                        </div>
                    </div>
                    <a href="read-more.php?id=<?php echo $rowDays['id']; ?>">
                    <?php $dagsId = $rowDays['id'];
                    $billedernes = getPictures($dagsId);
                    ?>
                    <?php
                    $rowPics = mysqli_fetch_assoc($billedernes);
                    ?>
                    <img class="w-100 m-t-10 " src="img/<?php echo $rowPics['filnavn'] ?>">

                    <?php
                    $beskrivelse = mb_substr($rowDays['beskrivelse'], 0, 120, 'UTF-8');
                    $tal = mb_strrpos($beskrivelse, ' ', 0, 'UTF-8');
                    $beskrivelse = mb_substr($rowDays['beskrivelse'], 0, $tal, 'UTF-8');
                    ?>
                    <p><?php echo $beskrivelse . '...' ?></p>
                    <h4 class="m-t-10">
                        Læs mere
                        </h4>
                    </a>
                    </div>
                    <?php
                }}
                ?>

                <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                    $start = ($page - 1) * $limit;
                } else {
                    $page = 1;
                }
                ?>
                <?php if ($rowDayTest['id'] <> '' && $type == '2' OR $type =='3'){ ?>
                    <?php
                    $day = mysqli_query($objCon, "SELECT * FROM `dag` WHERE `venskabs_id` = '$venskabsId' ORDER BY `dato` DESC LIMIT $start, $limit");
                    while ($rowDay = mysqli_fetch_assoc($day)) {
                        $i++;
                        ?>
                        <div class="special w-80 m-t-50 p-25">
                            <div class="flex between w-100">
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
                                    <h3 class="p-l-30" id="aaben<?php echo $i; ?>">⋮</h3>
                                </div>
                            </div>
                            <div class="flex-column right">
                                <ul class="minimenu<?php echo $i; ?>">
                                    <li><a href="rediger-dag.php?id=<?php echo $rowDay['id']; ?>"><h3>Rediger</h3></a></li>
                                    <li><a href="slet-dag.php?id=<?php echo $rowDay['id']; ?>"><h3>Slet</h3></a></li>
                                </ul>
                            </div>
                            <a href="read-more.php?id=<?php echo $rowDay['id']; ?>">
                            <?php $dagId = $rowDay['id'];
                            $billederne = getPictures($dagId);
                            ?>
                            <?php
                            $rowPic = mysqli_fetch_assoc($billederne);
                            ?>
                            <img class="w-100 m-t-10 " src="img/<?php echo $rowPic['filnavn'] ?>">
                            <?php
                            $beskrivelse = mb_substr($rowDay['beskrivelse'], 0, 120, 'UTF-8');
                            $tal = mb_strrpos($beskrivelse, ' ', 0, 'UTF-8');
                            $beskrivelse = mb_substr($rowDay['beskrivelse'], 0, $tal, 'UTF-8');
                            ?>
                            <p><?php echo $beskrivelse . '...' ?></p>
                            <h4 class="m-t-10">
                                Læs mere
                                </h4></a>
                            </div>
                            <?php
                        };
                        ?>

                        <div class="flex m-t-10 between w-80">
                            <?php
                            $rows = mysqli_num_rows(mysqli_query($objCon, "SELECT * FROM `dag`"));
                            $total = ceil($rows / $limit);
                            if ($page > 1) {
                                echo "<a href='?page=" . ($page - 1) . "'><h3>Forrige</h3></a>";
                            } else {
                                echo "<div></div>";
                            }
                            ?>

                            <?php
                            if ($page != $total) {
                                echo "<a href='?page=" . ($page + 1) . "'><h3>Næste</h3></a>";
                            } else {
                                echo "<div></div>";
                            }}
                            ?>
                        </div>




                        </section>
                        <script src="javascript/script.js"></script>
                    </body>
                    </html>
