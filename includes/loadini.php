<?php
  $bdir = 'C:/Users/Server/Desktop/Servers/Atlas/ShooterGame/Saved/';
  $pid = $_POST['pid'];
  $savedfolder= $_POST['dir'];

if ( $pid == 'admin' ) {
  $file = file_get_contents( $bdir."AllowedCheaterSteamIDs.txt" );
  $output = "<h2>Admin Steam IDs</h2>";
  $output .= "<textarea rows='10' style='width:100%;' id='txt' required>";
  $output .= $file;
  $output .= "</textarea>";
  $output .= "<button class='admin_save_btn w3-button w3-green'>SAVE</button>";
  echo $output;
}

if ( $pid == 'gameini' ) {
  
  $file = file_get_contents( $bdir.$savedfolder."/Config/WindowsServer/game.ini" );
  $output = "<h2>Game.ini</h2>";
  $output .= "<textarea rows='10' style='width:100%;' id='txt' required>";
  $output .= $file;
  $output .= "</textarea>";
  $output .= "<button id='$savedfolder' class='gini_s_btn w3-button w3-green'>SAVE</button>";
  echo $output;
}

if ( $pid == 'gameuserini' ) {

  $file = file_get_contents( $bdir.$savedfolder."/Config/WindowsServer/gameusersettings.ini" );
  $output = "<h2>GameUserSettings.ini</h2>";
  $output .= "<textarea rows='10' style='width:100%;' id='txt' required>";
  $output .= $file;
  $output .= "</textarea>";
  $output .= "<button id='$savedfolder' class='guser_s_btn w3-button w3-green'>SAVE</button>";
  echo $output;
}
if ( $pid == 'engineini' ) {

  $file = file_get_contents( $bdir.$savedfolder."/Config/WindowsServer/engine.ini" );
  $output = "<h2>Engine.ini</h2>";
  $output .= "<textarea rows='10' style='width:100%;' id='txt' required>";
  $output .= $file;
  $output .= "</textarea>";
  $output .= "<button id='$savedfolder' class='engine_s_btn w3-button w3-green'>SAVE</button>";
  echo $output;
}
?>