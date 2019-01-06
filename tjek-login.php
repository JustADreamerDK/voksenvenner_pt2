<?php
session_start();
include "include/connect.php";
include "phpcode/crud.php";
$brugernavn = $_POST['brugernavn'];
$password = $_POST['password'];
$kodeord = getUser($brugernavn);
$row = mysqli_fetch_assoc($kodeord);
$kode = $row['password'];
$type = $row['brugertype_id'];
$id = $row['id'];
if ($password == "$kode") {
    $_SESSION['brugertype'] = "$type";
    $_SESSION['id'] = "$id";
    header("location:forside.php");
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
            <?php
            if ($password <> "$kode") {
                ?>
                <section class="flex-column center">
                <img class="m-100 w-80" src="img/logo.png">
                <h3 class="w-80">Brugeren findes ikke, tjek om du har skrevet dit brugernavn og password korrekt</h3>
                <h3 class="m-10"><a href="login.php">Tilbage</a></h3>
                </section>
<?php
            }
            ?>
</body>
</html>
