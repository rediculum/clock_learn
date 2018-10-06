<html>
<head>
<title>d2a</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="clock.css">
</head>
<body>
<h1 class=center>Digital > Analog</h1>
<?php

function digit($min, $max, $step) {
  return str_pad(round(rand($min, $max)/$step)*$step,2,0,STR_PAD_LEFT);
}

for ($row = 0; $row < 9; $row++) {
  echo "<table><tr>";
  for ($col = 0; $col < 2; $col++) {
    echo "<td class=\"right digital\">";
    print digit(0,24,1) . ":" . digit(0,45,15) . "</td><td>=";?>
    </td><td class=center>
    <article class="clock">
    </article>
    </td>
  <?php
  }
  echo "</tr></table>";
}
?>
</body>
</html>
