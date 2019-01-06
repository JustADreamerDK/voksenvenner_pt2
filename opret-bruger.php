<?php
session_start();
include "include/connect.php";
include "phpcode/crud.php";
$kode = $_POST['venskabskode'];
$tjekKode = getFriendshipByCode($kode);
$row = mysqli_fetch_assoc($tjekKode);
$code = $row['venskabs_key'];

$tilbageKode = $_SESSION['koden'];
$tjekKoden = getFriendshipByCode($tilbageKode);
$rowKoden = mysqli_fetch_assoc($tjekKoden);
$coden = $rowKoden['venskabs_key'];
if($code <> ''){
$_SESSION['koden'] = "$code";
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
<body class="special">
    <section class="flex-column center">
        <img class="m-100 w-80" src="img/logo.png">
            <?php
            if ($code <> '' || $coden <> '') {
                ?>
                <h3 class="w-80 m-10">Så mangler du bare den sidste del, inden du kan få adgang til jeres venskabs kommende billedbank</h3>
                <form  class="w-100 flex-column center" action="post-opret-bruger.php" method="post" class="flex-column">
                    <input class="m-10 w-80" type="text" name="venskabs_id" value="<?php echo $code . $coden; ?>" hidden></input>
                    <input class="m-10 w-80" type="text" name="fornavn" placeholder="Fornavn" maxlength="45" required></input>
                    <input class="m-10 w-80" type="text" name="efternavn" placeholder="Efternavn" maxlength="45" required></input>
                    <input class="m-10 w-80" type="number" name="tlf" placeholder="Telefonnummer" required></input>
                    <input class="m-10 w-80" type="email" name="email" placeholder="Email" maxlength="90" required></input>
                    <input class="m-10 w-80" type="text" name="brugernavn" placeholder="Brugernavn" maxlength="45" required></input>
                    <input class="m-10 w-80" type="password" name="password" placeholder="Password" maxlength="45" required></input>
                    <select class="m-10 w-80" name="brugertype">
                        <option value="">Hvad type bruger er du?</option>
                        <option value="2">Voksenven</option>
                        <option value="3">Forældre</option>
                    </select>
                    <input class="m-10 w-80" type="submit" value="Opret bruger"></input>
                </form>
                <?php
            }else{
                ?>
                <h3>Denne venskabskode findes ikke i systemet</h3>
                <h3>Test om du har skrevet den rigtigt og prøv igen</h3>
                <h3 class="m-t-50"><a href="index.php">Tilbage</a></h3>
                <?php
            }
            ?>
        </h3>
    </section>
</body>
</html>
