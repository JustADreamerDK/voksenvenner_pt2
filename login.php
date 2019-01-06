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
            <form  class="w-100 flex-column center" action="tjek-login.php" method="post" class="flex-column">
                <input class="m-10 w-80" type="text" name="brugernavn" placeholder="Brugernavn" required></input>
                <input class="m-10 w-80" type="password" name="password" placeholder="Password" required></input>
                <input class="m-10 w-80" type="submit" value="Login"></input>
            </form>
        </section>
    </body>
</html>
