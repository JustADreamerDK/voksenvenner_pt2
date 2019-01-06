<?php
session_start();
include "include/connect.php";
include "phpcode/crud.php";
$id = $_GET['id'];
$day = getDay($id);
$row = mysqli_fetch_assoc($day);
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
        <form  class="m-t-50 w-100 flex-column center" action="post-rediger-dag.php" method="post" class="flex-column">
            <input hidden type="text" name="id" value="<?php echo $row['id']; ?>"></input>
            <input class="m-10 w-80" type="date" name="dato" placeholder="Dato" required value="<?php echo $row['dato']; ?>"></input>
            <input class="m-10 w-80" type="text" name="sted" placeholder="Sted" maxlength="90" required value="<?php echo $row['lokation']; ?>"></input>
            <input class="m-10 w-80" type="text" name="overskrift" placeholder="Overskrift" maxlength="90" required value="<?php echo $row['overskrift']; ?>"></input>
            <textarea name="om" rows="10" class="m-10 w-80"><?php echo $row['beskrivelse']; ?></textarea>
            <input class="m-10 w-80" type="submit" value="Rediger dagen"></input>
        </form>
    </section>
    <script src="javascript/script.js"></script>
</body>
</html>
