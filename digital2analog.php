<html>
<head>
<title>d2a</title>
<style>
body {
  width: 80%;
  margin-left: auto;
  margin-right: auto;
}
table {
  font-size: 40px;
  width: 100%;
}
#center {
  vertical-align: center;
  text-align: center;
  display: block;
  margin-left: auto;
  margin-right: auto;
}
#right {
  text-align: right;
  margin-right: 20px;
}
</style>
</head>
<body>
<h1 id=center>Digital > Analog</h1>
<?php

function digit($min, $max, $step) {
  return str_pad(round(rand($min, $max)/$step)*$step,2,0,STR_PAD_LEFT);
}

for ($row = 0; $row < 9; $row++) {
  echo "<table><tr>";
  for ($col = 0; $col < 2; $col++) {
    echo "<td id=right>";
    print digit(0,24,1) . ":" . digit(0,45,15) . "&nbsp;=&nbsp; ";
    echo "</td><td id=center>";
    echo "<img src=clock.php width=100 height=100>";
    echo "</td>";
  }
  echo "</tr></table>";
}
?>
</body>
</html>
