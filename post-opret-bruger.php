<?php
session_start();
include "include/connect.php";
include "phpcode/crud.php";
$fornavn = $_POST['fornavn'];
$efternavn = $_POST['efternavn'];
$nummer = $_POST['tlf'];
$email = $_POST['email'];
$brugernavn = $_POST['brugernavn'];
$password = $_POST['password'];
$brugertype = $_POST['brugertype'];
$venskab_id = $_POST['venskabs_id'];
$code = $_SESSION['koden'];
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
        <h3>
            <input class="m-10 w-80" type="text" name="venskabs_id" value="<?php echo $code; ?>" hidden></input>
            <?php
                if($fornavn <> '' && $efternavn <> '' && $nummer <> '' && $email <> '' && $brugernavn <> '' && $password <> '' && $brugertype <> '' && $code){
                    createUser($fornavn, $efternavn, $nummer, $email, $brugernavn, $password, $brugertype, $code);
                    ?>
                    <h3 class="w-80">Tillykke, du har nu oprettet dig! Tryk tilbage for at logge ind</h3>
                    <h3 class="m-10"><a href="login.php">Tilbage</a></h3>
                    <?php
                }else{
                    ?>
                    <h3 class="w-80">Husk af udfylde alle felterne inden du trykker opret, gå tilbage og prøv igen</h3>
                    <h3 class="m-10"><a href="opret-bruger.php">Tilbage</a></h3>
                    <?php
                }
            ?>
        </h3>
    </section>
</body>
</html>
