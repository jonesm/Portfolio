<?php

/**
*   Purpose: Outputs A Verification PNG and Enters Key Into a Session
*   By: Matthew L Jones (matthew.jones@deityproductions.com)
*   Created: 07/07/08
*   Last Updated: 05/24/11
*/

session_start();

$max_x = 120; $max_y = 30;

$im = @imagecreate($max_x, $max_y)
	or die("Cannot Initialize"); // Gd isn't installed

$_SESSION['key'] = $key = substr(md5(rand(0, 9999)), 17, 5);

imagefill($im, 0, 0, imagecolorallocatealpha($im, 0, 0 , 0, 127));
imagettftext($im, 24, 0, 2, 25, imagecolorallocatealpha($im,  239, 239, 239, 0),
	"./fonts/MAROLA.TTF", $key);

// Draw lines across the image trying to stop bot reading
$ranx = 0;
$rany = rand(0, $max_y);
$xi = $max_x / 8;
$nextx = $ranx + $xi;
$nexty = rand(0, $max_y);

for ($i = 0; $i < 8; $i++) {
	imageline($im, rand(0, $max_x), rand(0, $max_y), rand(0, $max_x), rand(0, $max_y),
		imagecolorallocatealpha($im, rand(127, 255), rand(127, 255), rand(127, 255), 0));
	$ranx = $nextx;
	$rany = $nexty;
	$nextx += $xi;
	$nexty = rand(0, $max_y);
}

header("Content-Type: image/png");
imagepng($im);
imagedestroy($im);
 
?>