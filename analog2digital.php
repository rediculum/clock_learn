<html>
<head>
<title>a2d</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h1 class=center>Analog > Digital</h1>
<?php
function digit($min, $max, $step) {
  return str_pad(round(rand($min, $max)/$step)*$step,2,0,STR_PAD_LEFT);
}

$icon = array("moon.png", "sun.png");

for ($row = 0; $row < 9; $row++) {
  echo "<table><tr>";
  for ($col = 0; $col < 2; $col++) {?>
    <td class=right>
    <?php
    echo "<img src=\"clock.php?h=" . digit(0,11,1) . "&m=" . digit(0,45,15) . "\">";
    echo "<img src=" . $icon[rand(0,1)] . " width=20 height=20>";?>
    </td><td class=right>=&nbsp;____
    </td><td>&nbsp;:
    </td><td>____
    </td>
  <?php }
  echo "</tr></table>";
} ?>
</body>
</html>
