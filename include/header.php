<header class="p-lr-30">
    <div class="flex between w-100 center menu-lille">
        <h2 class="bold" id="showMenu">&#9776;</h2>
        <img class="logo" src="img/logo.png">
        <h2></h2>
    </div>

    <div class="menu">
        <ul class="flex-column center">
            <li class="menu-punkt flex-column w-100"><h2 class="bold m-8" id="menuLuk">X</h2></li>
            <a class="menu-punkt flex-column center w-100" href="forside.php"><li><h3>Din startside</h3></li></a>
            <a class="menu-punkt flex-column center w-100" href="profile.php"><li><h3>Profil</h3></li></a>
            <?php if ($type == 1){ ?>
            <a class="menu-punkt flex-column center w-100" href="venskaber.php"><li><h3>Venskaber</h3></li></a>
        <?php } ?>
            <a class="menu-punkt flex-column center w-100" href="kontakt.php"><li><h3>Kontakt</h3></li></a>
            <a class="menu-punkt flex-column center w-100" href="logud.php"><li><h3>Log ud</h3></li></a>
        </ul>
    </div>
</header>
