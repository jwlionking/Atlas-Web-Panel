<?php
  $bdir = 'C:/Users/Server/Desktop/Servers/Atlas/ShooterGame/Saved/';
  $pid = $_POST['pid'];
  $txt = $_POST['txt'];
  $savedfolder= $_POST['dir'];

if ( $pid == 'admin' ) {
  $myfile = fopen($bdir."AllowedCheaterSteamIDs.txt", "w") or die("Unable to open file!");
  $txt = $_POST['txt'];
  fwrite($myfile, $txt);
  fclose($myfile);
  echo "Successful!";
}
if ( $pid == 'gameini' ) {
  $myfile = fopen($bdir.$savedfolder."/Config/WindowsServer/Game.ini", "w") or die("Unable to open file!");
  $txt = $_POST['txt'];
  fwrite($myfile, $txt);
  fclose($myfile);
  echo "Successful!";
}
if ( $pid == 'gameuserini' ) {
  $myfile = fopen($bdir.$savedfolder."/Config/WindowsServer/GameUserSettings.ini", "w") or die("Unable to open file!");
  $txt = $_POST['txt'];
  fwrite($myfile, $txt);
  fclose($myfile);
  echo "Successful!";
}
if ( $pid == 'engineini' ) {
  $myfile = fopen($bdir.$savedfolder."/Config/WindowsServer/Engine.ini", "w") or die("Unable to open file!");
  $txt = $_POST['txt'];
  fwrite($myfile, $txt);
  fclose($myfile);
  echo "Successful!";
}
?>