<?php
session_start();
include "include/connect.php";
include "phpcode/crud.php";
$dag = $_GET['id'];
$type = $_GET['brugertype'];
$accept = $_POST['accept'];

if ($type == '2') {
    updateAcceptFriend($accept, $dag);
    header("location:read-more.php?id=$dag");
}
if ($type == '3') {
    updateAcceptMom($accept, $dag);
    header("location:read-more.php?id=$dag");
}

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
    <?php echo $dag . $type . $accept; ?>
</body>
</html>
