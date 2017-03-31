<?php 
 

echo "starting";

$fileIn = "https://riotgamesapi2016-matthewpham.c9users.io/img/items/item0.png";

$spriteSheet = file_get_contents($fileIn);
//$size = getimagesize($spriteSheet);
$xLoop = $size[0] / 48;
$yLoop = $size[1] / 48;
$xLoop = 10;
$yLoop = 10;
echo "starting";
for($x=0;$x<$xLoop;$x++) {
    for($y=0;$y<$yLoop;$y++) {
        echo "x: " + $x + " y: " + $y;
        $img = imagecreate(48, 48);
        imagecopy($img, $spriteSheet, 0, 0, 48 * $x, 48 * $y, 48, 48);
        imagepng($img, "img/items/0" . $x . $y . ".png", 9);
    }
}

?>