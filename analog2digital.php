<html>
<head>
<title>a2d</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="clock.css">
</head>
<body>
<h1 class=center>Analog > Digital</h1>
<?php
function digit($min, $max, $step) {
  return str_pad(round(rand($min, $max)/$step)*$step,2,0,STR_PAD_LEFT);
}

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

$icon = array("moon.png", "sun.png");
echo "<table>";
for ($row = 0; $row < 9; $row++) {
  echo "<tr>";
  for ($col = 0; $col < 2; $col++) {
    $minute = min2deg(digit(15,60,15));
    $hour = hour2deg(digit(0,11,1), $minute);?>
    <td class="clock" style="height: 20px;">
      <div class="minutes-container">
        <div class="minutes" style="transform: rotate(<?php echo $minute?>deg)"></div>
      </div>
      <div class="hours-container">
        <div class="hours" style="transform: rotate(<?php echo $hour?>deg)"></div>
      </div>
    <?php
    echo "<img src=" . $icon[rand(0,1)] . " width=20 height=20>";?>
    </td>
    <td class=left>=&nbsp;____&nbsp;:____</td>
  <?php }
  echo "</tr>";
} ?>
</table>
</body>
</html>
