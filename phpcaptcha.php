<?php
// Start a session to store the CAPTCHA value
session_start();

// Generate a random CAPTCHA value (you can customize this)
$captchaValue = substr(md5(uniqid(rand(), true)), 0, 6);

// Store the CAPTCHA value in a session variable
$_SESSION['captcha'] = $captchaValue;

// Create a blank image with a white background
$image = imagecreatetruecolor(200, 80);
$bgColor = imagecolorallocate($image, 255, 255, 255);
imagefill($image, 0, 0, $bgColor);

// Set the text color to black
$textColor = imagecolorallocate($image, 0, 0, 0);

// Add the CAPTCHA text to the image
imagestring($image, 5, 60, 30, $captchaValue, $textColor);

// Output the image as PNG
header('Content-type: image/png');
imagepng($image);

// Free up memory
imagedestroy($image);
?>
