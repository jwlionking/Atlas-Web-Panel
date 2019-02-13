<?php
$myfile = fopen("C:/Users/Server/Desktop/Servers/Atlas/ShooterGame/Saved/AllowedCheaterSteamIDs.txt", "w") or die("Unable to open file!");
$txt = $_POST['txt'];
fwrite($myfile, $txt);
fclose($myfile);
echo "Successful!";
?>