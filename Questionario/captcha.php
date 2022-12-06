<?php
$image = imagecreatetruecolor(180, 35);
$backgorund = imagecolorallocate($image, 200, 200, 200);
imagefill($image, 0, 0, $backgorund);
$linesColor = imagecolorallocate($image, 30, 30, 30);
for ($i = 0; $i < 5; $i++) {
    imagesetthickness($image, rand(1, 3));
    imageline($image, 0, rand(0, 30), 180, rand(0, 30), $linesColor);
}
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);
