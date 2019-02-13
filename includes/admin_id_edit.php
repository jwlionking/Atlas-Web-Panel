<?php
$file = file_get_contents( "C:/Users/Server/Desktop/Servers/Atlas/ShooterGame/Saved/AllowedCheaterSteamIDs.txt" );
$output = "<h2>Admin Steam IDs</h2>";
$output .= "<textarea rows='10' style='width:100%;' id='admin_id_txt' required>";
$output .= $file;
$output .= "</textarea>";
$output .= "<button class='admin_save_btn w3-button w3-green'>SAVE</button>";
echo $output;
?>