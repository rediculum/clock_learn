<?php
function hour2deg($value, $min) {
    $fromRange = 12;
    $toRange = 360;
    $offset = $min / 2; // 60min  = 30deg
    $scaleFactor = $toRange / $fromRange;

    // Re-zero the value within the from range
    $tmpValue = $value;
    // Rescale the value to the to range
    $tmpValue *= $scaleFactor;
    // Re-zero back to the to range
    return $tmpValue + $offset;
}

function min2deg($value) {
    $fromRange = 60;
    $toRange = 360;
    $scaleFactor = $toRange / $fromRange;

    // Re-zero the value within the from range
    $tmpValue = $value;
    // Rescale the value to the to range
    $tmpValue *= $scaleFactor;
    // Re-zero back to the to range
    return $tmpValue;
}

function needle($angle,$length,$thickness,$color)
{
  global $img;
  // calculate C
  $length *= 2;
  while($angle >= 360)
  {
    $angle = $angle - 360;
  }
  $rad = $length / 2;
  $seg = pi()/round(64*$rad);
  $res = 1;             // scale
  $x = 50;               // start point
  $y = 50;
  $i = deg2rad($angle);
  $x_c = round(sin($i)*$rad*$res)+round($x);
  $y_c = -round(cos($i)*$rad*$res)+round($y);

  $rad = $thickness / 2;
  $i = deg2rad($angle-90);
  $x_a = round(sin($i)*$rad*$res)+round($x);
  $y_a = -round(cos($i)*$rad*$res)+round($y);
  $x_b = -round(sin($i)*$rad*$res)+round($x);
  $y_b = round(cos($i)*$rad*$res)+round($y);

  $plots = array(
    $x_a,$y_a,
    $x_b,$y_b,
    $x_c,$y_c,
  );
  imagefilledpolygon($img,$plots,3,$color);
}

header("Content-type: image/png");

$img_ori = imagecreatefrompng('analog.png');
$img = imagecreatetruecolor(100, 100);
imagesetthickness($img, 3);
imagefill($img_ori, 100, 100, $img);
$black = imagecolorallocate($img, 0, 0, 0);
$white = imagecolorallocate($img, 255, 255, 255);
imagealphablending($img, false);
imagesavealpha($img, true);
imagecopyresampled($img, $img_ori, 0, 0, 0, 0, 100, 100, imagesx($img_ori), imagesy($img_ori));

imagearc($img, 50, 50, 5, 5, 0, 360, $black);

$hours = $_REQUEST['h']; 
$minutes = $_REQUEST['m'];

if ($hours && $minutes) {
  needle(hour2deg($hours,$minutes),30,3,$black);
  needle(min2deg($minutes),40,1,$black);
} else {
  true; // draw empty clock
}

imagepng($img);
imagedestroy ($img);
?>
