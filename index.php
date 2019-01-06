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
            <form  class="w-100 flex-column center" action="opret-bruger.php" method="post" class="flex-column">
                <input class="m-10 w-80" type="text" name="venskabskode"id="venskabskode" placeholder="Indtast venskabskode"></input>
                <input class="m-10 w-80" type="submit" value="Indsend kode"></input>
            </form>
            <a class="flex-column center w-100" href="login.php">
                <button class="m-10 w-80">Allerede ven?</button>
            </a>
        </section>
    </body>
</html>
