<?php

function getFriendships(){
    global $objCon;
    $sql = "SELECT `id`, `venskabs_key` FROM `venskab`";
    $result = $objCon->query($sql);
    return $result;
}

function getFriendshipByCode($code){
    global $objCon;
    $sql = "SELECT `id`, `venskabs_key` FROM `venskab` WHERE `venskabs_key` = '$code'";
    $result = $objCon->query($sql);
    return $result;
}

function getUser($brugernavn){
    global $objCon;
    $sql = "SELECT `id`, `fornavn`, `efternavn`, `telefonnr`, `mail`, `brugernavn`, `password`, `brugertype_id`, `venskab_id` FROM `bruger` WHERE `brugernavn` = '$brugernavn'";
    $result = $objCon->query($sql);
    return $result;
}

function getUserById($id){
    global $objCon;
    $sql = "SELECT `id`, `fornavn`, `efternavn`, `telefonnr`, `mail`, `brugernavn`, `password`, `brugertype_id`, `venskab_id` FROM `bruger` WHERE `id` = '$id'";
    $result = $objCon->query($sql);
    return $result;
}

function getKidById($id){
    global $objCon;
    $sql = "SELECT `id`, `fornavn`, `efternavn`, `fodselsdag`, `bruger_id` FROM `barn` WHERE `bruger_id` = '$id'";
    $result = $objCon->query($sql);
    return $result;
}

function getMother($venskabsId){
    global $objCon;
    $sql = "SELECT `id`, `fornavn`, `efternavn`, `telefonnr`, `mail`, `brugernavn`, `password`, `brugertype_id`, `venskab_id` FROM `bruger` WHERE `venskab_id` = '$venskabsId' AND `brugertype_id` = '3'";
    $result = $objCon->query($sql);
    return $result;
}

function getVen($venskabsId, $type){
    global $objCon;
    $sql = "SELECT `id`, `fornavn`, `efternavn`, `telefonnr`, `mail`, `brugernavn`, `password`, `brugertype_id`, `venskab_id` FROM `bruger` WHERE `venskab_id` = '$venskabsId' AND `brugertype_id` <> $type";
    $result = $objCon->query($sql);
    return $result;
}

function getDayById($venskab_id){
    global $objCon;
    $sql = "SELECT `id`, `dato`, `lokation`, `overskrift`, `beskrivelse`, `venskabs_id`, `bruges_mor`, `bruges_ven` FROM `dag` WHERE `venskabs_id` = '$venskab_id'";
    $result = $objCon->query($sql);
    return $result;
}

function getDay($id){
    global $objCon;
    $sql = "SELECT `id`, `dato`, `lokation`, `overskrift`, `beskrivelse`, `venskabs_id`, `bruges_mor`, `bruges_ven` FROM `dag` WHERE `id` = '$id'";
    $result = $objCon->query($sql);
    return $result;
}

function getDays(){
    global $objCon;
    $sql = "SELECT `id`, `dato`, `lokation`, `overskrift`, `beskrivelse`, `venskabs_id`, `bruges_mor`, `bruges_ven` FROM `dag` ORDER BY `dato` DESC";
    $result = $objCon->query($sql);
    return $result;
}

function getLastDay(){
    global $objCon;
    $sql = "SELECT `id`, `dato`, `lokation`, `overskrift`, `beskrivelse`, `venskabs_id`, `bruges_mor`, `bruges_ven` FROM `dag` ORDER BY `id` DESC";
    $result = $objCon->query($sql);
    return $result;
}

function getPictures($id){
    global $objCon;
    $sql = "SELECT `id`, `filnavn`, `dag_id` FROM `billede` WHERE `dag_id` = '$id'";
    $result = $objCon->query($sql);
    return $result;
}

function getPicture($id){
    global $objCon;
    $sql = "SELECT `id`, `filnavn`, `dag_id` FROM `billede` WHERE `id` = '$id'";
    $result = $objCon->query($sql);
    return $result;
}

function createUser($fornavn, $efternavn, $telefonnr, $mail, $brugernavn, $password, $brugertype_id, $venskab_id){
    global $objCon;
    $sql = "INSERT INTO `bruger`(`fornavn`, `efternavn`, `telefonnr`, `mail`, `brugernavn`, `password`, `brugertype_id`, `venskab_id`) VALUES ('$fornavn', '$efternavn', '$telefonnr', '$mail', '$brugernavn', '$password', '$brugertype_id', '$venskab_id')";
    $result = $objCon->query($sql);
    return $result;
}

function createVenskab($venskabsId){
    global $objCon;
    $sql = "INSERT INTO `venskab`(`venskabs_key`) VALUES ('$venskabsId')";
    $result = $objCon->query($sql);
    return $result;
}

function createBarn($fornavn, $efternavn, $fodselsdag, $bruger_id){
    global $objCon;
    $sql = "INSERT INTO `barn`(`fornavn`, `efternavn`, `fodselsdag`, `bruger_id`) VALUES ('$fornavn', '$efternavn', '$fodselsdag', '$bruger_id')";
    $result = $objCon->query($sql);
    return $result;
}

function createDay($dato, $lokation, $overskrift, $beskrivelse, $venskab_id){
    global $objCon;
    $sql = "INSERT INTO `dag`(`dato`, `lokation`, `overskrift`, `beskrivelse`, `venskabs_id`, `bruges_mor`, `bruges_ven`) VALUES ('$dato', '$lokation', '$overskrift', '$beskrivelse', '$venskab_id', '1', '1')";
    $result = $objCon->query($sql);
    return $result;
}

function createPicture($filnavn, $dag){
    global $objCon;
    $sql = "INSERT INTO `billede`(`filnavn`, `dag_id`) VALUES ('$filnavn', '$dag')";
    $result = $objCon->query($sql);
    return $result;
}

function updateDay($id, $dato, $lokation, $overskrift, $beskrivelse){
    global $objCon;
    $sql = "UPDATE `dag` SET `dato`='$dato',`lokation`='$lokation',`overskrift`='$overskrift',`beskrivelse`='$beskrivelse' WHERE `id`='$id'";
    $result = $objCon->query($sql);
    return $result;
}

function updateAcceptMom($accept, $id){
    global $objCon;
    $sql = "UPDATE `dag` SET `bruges_mor`='$accept' WHERE `id`='$id'";
    $result = $objCon->query($sql);
    return $result;
}

function updateAcceptFriend($accept, $id){
    global $objCon;
    $sql = "UPDATE `dag` SET `bruges_ven`='$accept' WHERE `id`='$id'";
    $result = $objCon->query($sql);
    return $result;
}

function deleteDay($id){
    global $objCon;
    $sql = "DELETE FROM `dag` WHERE `id` = '$id'";
    $result = $objCon->query($sql);
    return $result;
}

function deletePic($id){
    global $objCon;
    $sql = "DELETE FROM `billede` WHERE `id` = '$id'";
    $result = $objCon->query($sql);
    return $result;
}
?>
