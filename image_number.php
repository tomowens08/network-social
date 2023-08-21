<?php
Header( "Content-type: image/png");
$image = imagecreate(80,20);
$text = $HTTP_GET_VARS['text'];
$black = ImageColorAllocate($image,0,0,0);
$white = ImageColorAllocate($image,255,255,255);
ImageFilledRectangle($image,0,0,320,130,$white);
ImageString($image, 12, 0, 0, "$text", $black);
ImagePNG($image);
ImageDestroy($image);
?>
