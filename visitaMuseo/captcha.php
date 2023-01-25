<?php

session_start();

//creo l'immagine e gli aggiungo un backgorund
$image = imagecreatetruecolor(150, 30);
$backgorund = imagecolorallocate($image, 120, 115, 120);
imagefill($image, 0, 0, $backgorund);

//linea
$linesColor = imagecolorallocate($image, 145, 14, 227);
for ($i = 0; $i < 5; $i++) { //metto 5 linee nell'immagine captcha
    imagesetthickness($image, rand(1, 3));
    imageline($image, 0, rand(0, 30), 150, rand(0, 30), $linesColor);
}

//creo la stringa di validazione del captcha
$captcha = "";
$textcolor = imagecolorallocate($image, 30, 30, 30);
for ($i = 20; $i < 145; $i += 25) {
    $number = rand(0, 9);
    imagechar($image, rand(3, 6), $i, rand(2, 13), $number, $textcolor);
    $captcha .= $number;
}

$_SESSION["captcha"] = $captcha;
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);
