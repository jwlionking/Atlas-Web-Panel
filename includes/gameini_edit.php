<?php
  $id = $_POST['id'];
  $file = file_get_contents( "C:/Users/Server/Desktop/Servers/Atlas/ShooterGame/Saved/".$id."/Config/WindowsServer/game.ini" );
  $output = "<h2>Game.ini</h2>";
  $output .= "<textarea rows='10' style='width:100%;' id='gameini_txt' required>";
  $output .= $file;
  $output .= "</textarea>";
  $output .= "<button class='gini_save_btn w3-button w3-green'>SAVE</button>";
  echo $output;

?>