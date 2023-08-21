<?php
# Constants
define(IMAGE_BASE, '/home2/idevinte/public_html/socialnetwork/user_images/');
define(IMAGE_BASE1, '/home2/idevinte/public_html/socialnetwork/user_images/');
define('CACHE_DIR','/home2/idevinte/public_html/socialnetwork/image_gd/cache/');
define(MAX_WIDTH, 100);
define(MAX_HEIGHT, 100);

if (!is_dir(CACHE_DIR)) @mkdir(CACHE_DIR,0777);

# Get image location
$image_file = str_replace('..', '', $_SERVER['QUERY_STRING']);
$image_path = IMAGE_BASE.$image_file;

# Load image
$cache_img = CACHE_DIR.MAX_WIDTH.'_'.MAX_HEIGHT.'_'.$image_file;

if (!is_file($cache_img) && is_file($image_path)) {

	$img = null;
	$ext = strtolower(end(explode('.', $image_path)));

	if ($ext == 'jpg' || $ext == 'jpeg') {
 	   $img = @imagecreatefromjpeg($image_path);
	} else if ($ext == 'png') {
    $img = @imagecreatefrompng($image_path);
# Only if your version of GD includes GIF support	
	}
	else if ($ext == 'gif') {
	    $img = @imagecreatefromgif($image_path);
	# Only if your version of GD includes GIF support
	}
	else if ($ext == 'bmp') {
 	   $img = imagecreatefrombmp($image_path);
	# Only if your version of GD includes GIF support
	}
	else if ($ext == 'tif') {
  	  $img = imagecreatefromtif($image_path);
# Only if your version of GD includes GIF support
	}



# If an image was successfully loaded, test the image for size
	if ($img) {

 	   # Get image size and scale ratio
 	   $width = imagesx($img);
 	   $height = imagesy($img);
	    $scale = min(MAX_WIDTH/$width, MAX_HEIGHT/$height);

 	   # If the image is larger than the max shrink it
 	   if ($scale < 1) {
 	       $new_width = floor($scale*$width);
 	       $new_height = floor($scale*$height);

 	       # Create a new temporary imag	e
	        $tmp_img = imagecreatetruecolor($new_width, $new_height);	

 	       # Copy and resize old image into new image
 	       imagecopyresampled($tmp_img, $img, 0, 0, 0, 0,
 	                        $new_width, $new_height, $width, $height);
 	       imagedestroy($img);
 	       $img = $tmp_img;
 	   }
	}
# Create error image if necessary
if (!$img) {
# Get image location
$image_file = str_replace('..', '', $_SERVER['QUERY_STRING']);
$image_path = IMAGE_BASE1."nophoto.jpg";

# Load image
$img = null;
$ext = strtolower(end(explode('.', $image_path)));
if ($ext == 'jpg' || $ext == 'jpeg') {
    $img = @imagecreatefromjpeg($image_path);
} else if ($ext == 'png') {
    $img = @imagecreatefrompng($image_path);
# Only if your version of GD includes GIF support
}

# If an image was successfully loaded, test the image for size
if ($img) {

    # Get image size and scale ratio
    $width = imagesx($img);
    $height = imagesy($img);
    $scale = min(MAX_WIDTH/$width, MAX_HEIGHT/$height);

    # If the image is larger than the max shrink it
    if ($scale < 1) {
        $new_width = floor($scale*$width);
        $new_height = floor($scale*$height);

        # Create a new temporary image
        $tmp_img = imagecreatetruecolor($new_width, $new_height);

        # Copy and resize old image into new image
        imagecopyresampled($tmp_img, $img, 0, 0, 0, 0,
                         $new_width, $new_height, $width, $height);
        imagedestroy($img);
        $img = $tmp_img;
    }
}
}

# Display the image
if($img)
{
	ob_start();
	imagejpeg($img);
	$cont = ob_get_contents();
	ob_end_clean();
		$fp = fopen($cache_img,'w');
		fputs($fp,$cont,strlen($cont));
		fclose($fp);
header("Content-type: image/jpeg");
	echo $cont;
}
else
{
print "$image_path";
}


} else {
	$fp = fopen($cache_img,'r');
	$img = '';
	while (!feof($fp)) {
		$img .= fread($fp,4096);
	}
	fclose($fp);
	header("Content-type: image/jpeg");
	echo $img;
}
?>
