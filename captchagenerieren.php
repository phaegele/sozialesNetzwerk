<?php
session_start();
unset($_SESSION['captchacode']);
// Zeichen, die der Captchacode enthalten darf
$moeglicheZeichen = "abcdefghiklmnpqrstuvwxy123456789" .
  "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
// Anzahl der Zeichen, die das Captcha enthalten soll
$anzahlZeichen = 4;
// Captcha-Variable
$captchacode = "";
// Füllen der Captcha-Variable mit der festgelegten 
// Anzahl zufälliger Zeichen
for ($i = 0; $i < $anzahlZeichen; $i++) {
  $captchacode .= substr($moeglicheZeichen, 
    (rand() % (strlen($moeglicheZeichen))), 1);
}
$_SESSION['captchacode'] = $captchacode;
header('Content-type: image/jpg');
$image = imagecreate(350, 130);
$farben = array();
for ($i = 0; $i < $anzahlZeichen; $i++) {
  $farben[$i] = imagecolorallocate($image, 
    rand(0, 100), rand(0, 100), rand(0, 200));
}
$bgc = imagecolorallocate($image, 230, 230, 230);
imagefill($image, 0, 0, $bgc);

$font = "fonts/Anorexia.ttf";
if (file_exists($font)) {
  for ($i = 0; $i < $anzahlZeichen; $i++) {
    ImageTTFText($image, rand(20, 80), rand(-20, 60), 
     50 + ($i * 50), rand(80, 120), 
     $farben[rand(0, $anzahlZeichen - 1)],
     $font, $captchacode[$i]);
  }
} else { /** alternaitves Captcha bei fehlender Font-Datei */
  for ($i = 0; $i < $anzahlZeichen; $i++) {
    imagestring($image, rand(4, 5), 
     $i*40, rand(20, 80), 
     $captchacode[$i], 
     $farben[rand(0, $anzahlZeichen-1)]);
  }
}

for ($i = 0; $i < $anzahlZeichen; $i++) {
  imageline($image, rand(0, 10), rand(0, 150), 
    rand(330, 340), rand(0, 150), $farben[$i]);
}
imagejpeg($image);
imagedestroy($image);
?>
