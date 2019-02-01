<?php

for ($x = 0; $x < 100; $x++) {
$myfile = fopen("starttest.log", "w") or die("Unable to open file!");
fwrite($myfile, $x);
  fclose($myfile);
}


?>