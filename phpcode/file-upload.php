<?php

function uploadAndResizeImage(array $fileToUpload, $uploadFolder, array $sizes) {

    /*
      Vi laver et array vi vil benytte til at returnere
      resultaterne for vores upload og resize
     */

    $result = [];

    /*
      Vi smider værdierne fra $_FILES super global
      variablen i vores egne variabler og giver dem
      et mere beskrivende variabel navn
     */

    $originalFile = $fileToUpload['name'];

    /*
      pathinfo er en function til at få information omkring en fil, samt stien til den fil.
      i dette tilfælde benytter vi den til at få endelsen på filen altså: jpg, gif, png osv

      Vi kører pathinfo igennem en strtolower (string to lower) function, således at fil
      endelsen altid kommer ud i små bogstaver.

      Vi ved ikke hvad brugerne kommer med, så dette er en måde at sikre os, at vi altid
      arbejder på den samme måde, nemlig med små bogstaver
     */

    $fileType = strtolower(pathinfo($originalFile, PATHINFO_EXTENSION));

    // var_dump($fileType);
    // die;

    /*
      Vi benytter samme metode til at få filnavnet ud, uden endelsen: .jpg, .png osv
     */

    $originalFilename = pathinfo($originalFile, PATHINFO_FILENAME);

    // var_dump($originalFilename);
    // die;

    $uploadedFile = $fileToUpload['tmp_name'];
    $errors = $fileToUpload['error'];
    $fileSize = $fileToUpload['size'];

    /*
      Det er nu tid til at kigge på hvilken fil og filtype vi har fået ind
      og teste på om dette er den rette.

      Vi begynder samtidig med at se på selve resize delen af scriptet

      Til denne del, benytter vi en række functions som går ind og opfører
      sig lidt som et billedredigerings program, som eksempelvis Photoshop.

      Det betyder at vi begynder at kigge på hvad der er i selve filen vi uploader,
      vi ser på billedet i pixels, som man ville gøre det i et billedredigeringsprogram

      Da måden PHP ser på hvad der er i et billede rent pixelmæssigt er udgjort på baggrund
      af filtypen: png, jpg osv, kan vi slå "valideringen" af filtypen sammen med denne del
     */

    switch ($fileType) {
        case 'png':

            /*
              png formatet er i orden, her beder vi php om at
              skabe et kilde billede i pixels, i hukommelsen, vi kan arbejde med
              som var det et billedredigerings program.
             */

            $sourceImage = imagecreatefrompng($uploadedFile);

            break;

        case 'gif':

            /* samme som ovenstående bare i forhold til gif billeder */

            $sourceImage = imagecreatefromgif($uploadedFile);

            break;

        case 'jpeg':
        case 'jpg':

            /* samme som ovenstående bare i forhold til jpg billeder */

            $sourceImage = imagecreatefromjpeg($uploadedFile);

            break;

        default:

            /* skulle vi få et format ind vi ikke kender, stopper vi scriptet */

            throw new Exception('Unknown image filetype given');

            break;
    }

    /*
      Nu hvor vi skal til at arbejde med vores kilde billede, er vi nødt til at kende
      størrelsen.
      getimagesize functionen returnerer et array med størrelses informationerne.
      Her skal vi benytte de 2 første værdier, som angiver størrelsen i integers
     */

    $sourceImageWidth = getimagesize($uploadedFile)[0];

    // var_dump($sourceImageWidth);
    // var_dump($sourceImageHeight);
    // die;

    /*
      Alternativt kan man bruge list functionen, som giver os mulighed for at
      overføre værdier fra et array, direkte til variabler.

      Her er det dog vigtigt at kende placeringerne i det array der returneres.

      Vi ved at de 2 første er vores vidde og bredde og kunne derfor skrive
      list($variabeltilvidde, $variabeltilhøjdre) = getimagesize($uploadedFile);
     */

    list($sourceImageWidth, $sourceImageHeight) = getimagesize($uploadedFile);

    /*
      Vi skal nu til selve resizing af billeder.

      Da vi angiver disse i et array, vil vi løbe over dem
      igennem en foreach
     */

    foreach ($sizes as $prefix => $size) {
        /*
          Vi angiver først vores ønskede billedstørrelse
          Vidden kan vi tage fra vores sizes array.

          Højden bruger vi i en udregning for at holde vores aspect ratio.
          Formlen for denne lyder:
          Original højde / original vidde * ny vidde  = ny højde
         */

        $width = $size;
        $height = ($sourceImageHeight / $sourceImageWidth) * $size;

        // echo $width;
        // echo $height;
        // die;

        /*
          Vi skaber et tomt canvas, som vi kan fylde ud med pixels fra
          det originale billede. Dette canvas sætter vi størrelsen på.
          imagecreatetruecolor functionen benyttes til at skabe dette tomme canvas
         */

        $newImage = imagecreatetruecolor($width, $height);
        /*
          Vi benytter imagecopyresample functionen til at kopiere pixels fra vores originale billede
          over til vores nye billede.

          Måden dette gøres på, er ved at skabe et rektangel på det originale billede, hvor de pixels
          som ligger inden for denne rektangel bliver kopieret.

          Dernæst benytter vi endnu et rektangel på det nye billede, hvorved de kopierede pixels
          pastes ind.

          Hvis det nye billede er mindre, vel der her skabes en resizing, som derved får de kopierede
          pixels til at passe ind i det rektangel de skal passe i.

          Vi angiver vores nye billede, vores originale billede og dernes koordinaterne for:
          Hvor på x aksen rektanglet på det nye billede skal placeres
          Hvor på y aksen rektanglet på det nye billede skal placeres

          Hvor på x aksen rektanglet på det originale billede skal placeres
          Hvor på y aksen rektanglet på det originale billede skal placeres.

          Dernæst angiver vi størrelsen på vores rekstangler, altså:
          Vidden på rektanglet på vores nye billede
          Højden på rektanglet på vores nye billede

          Vidden på rektanglet på vores originale billede
          Højde på rektanglet på vores originale billede
         */

        imagecopyresampled($newImage, $sourceImage, 0, 0, 0, 0, $width, $height, $sourceImageWidth, $sourceImageHeight);

        /*
          Når det nye billede har modtagede de kopierede pixels
          fra det originale er vi klar til at gemme det.

          Vi opbygger derefter filnavnet samt stien hvor dette skal gemmes.
          $uploadFolder stien bliver givet igennem denne functions parameter

          time() functionen giver os et timestamp for det øjeblik filens skal gemmes.
          vi benytter dette, for at få et unikt filnavn, således at vi ikke overskriver
          eksisterende filer med samme navn

          $prefix bliver givet igennem vores sizes array

          $originalFilename blev fundet igennem overførslen fra Super global variablen
          øverst i denne function.

          Dernæst vælger vi at gemme denne fil som jpg.

         */
        if ($fileType == "jpeg") {
            $filename = $uploadFolder . $prefix . '_' . time() . '_' . $originalFilename . '.jpg';
            imagejpeg($newImage, $filename, 100);
        }
        if ($fileType == "jpg") {
            $filename = $uploadFolder . $prefix . '_' . time() . '_' . $originalFilename . '.jpg';
            imagejpeg($newImage, $filename, 100);
        }
        if ($fileType == "gif") {
            $filename = $uploadFolder . $prefix . '_' . time() . '_' . $originalFilename . '.gif';
            imagegif($newImage, $filename, 100);
        }
        if ($fileType == "png") {
            $filename = $uploadFolder . $prefix . '_' . time() . '_' . $originalFilename . '.png';
            imagepng($newImage, $filename, 100);
        }

        /*
          Vores nye billede ligger stadigvæk i serverens hukommelse
          For at være gode og ansvarlige programmører, sletter vi dette, således
          at hukommelsen frigives til de andre brugere af serveren :-)
         */

        imagedestroy($newImage);

        /*
          Til sidst smider vi vores filsti i vores result array, således
          at det efterfølgende kan benyttes i en database.

          Vi genbruger her vores prefix fra vores sizes array, således
          at fil stierne kan adskilles
         */

        $result[$prefix] = $filename;
    }

    /*
      Da vores originale billede også ligger i serverens hukommelse,
      vil vi igen være gode og ansvarlige programmører der fjerner dette
     */

    imagedestroy($sourceImage);

    return $result;
}
