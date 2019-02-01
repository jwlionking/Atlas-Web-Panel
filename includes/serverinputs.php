<?php
 
  if( $_POST['id'] > 0 ){
    require $_SERVER["DOCUMENT_ROOT"].('/config/sql/config.php');
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM atlas WHERE id=".$_POST['id'];
    $id = $_POST['id'];
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $SessionName            = $row['SessionName'];
        $ServerX                = $row['ServerX'];
        $ServerY                = $row['ServerY'];
        $AltSaveDirectoryName   = $row['AltSaveDirectoryName'];
        $ServerAdminPassword    = $row['ServerAdminPassword'];
        $RCONEnabled            = $row['RCONEnabled'];
        $RCONPort               = $row['RCONPort'];
        $MaxPlayers             = $row['MaxPlayers'];
        $ReservedPlayerSlots    = $row['ReservedPlayerSlots'];
        $QueryPort              = $row['QueryPort'];
        $Port                   = $row['Port'];
        $SeamlessIP             = $row['SeamlessIP'];
      }
    }
      $conn->close(); 
    }
  $output .= "<div class='w3-container w3-quarter'>";
  $output .= "id<input id='id' class='w3-input w3-border' value='$id' >";
  $output .= "SessionName<input id='SessionName' class='w3-input w3-border' value='$SessionName' required>";
  $output .= "ServerX<input id='ServerX' class='w3-input w3-border' value='$ServerX' required>";
  $output .= "ServerY<input id='ServerY' class='w3-input w3-border' value='$ServerY' required>";
  $output .= "AltSaveDirectoryName<input id='AltSaveDirectoryName' class='w3-input w3-border' value='$AltSaveDirectoryName' required>";
  $output .= "</div>";
  $output .= "<div class='w3-container w3-quarter'>";
  $output .= "ServerAdminPassword<input id='ServerAdminPassword' class='w3-input w3-border' value='$ServerAdminPassword' required>";
  $output .= "RCONEnabled<input id='RCONEnabled' class='w3-input w3-border' value='$RCONEnabled' required>";
  $output .= "RCONPort<input id='RCONPort' class='w3-input w3-border' value='$RCONPort' required>";
  $output .= "MaxPlayers<input id='MaxPlayers' class='w3-input w3-border' value='$MaxPlayers' required>";
   $output .= "</div>";
  $output .= "<div class='w3-container w3-quarter'>";
  $output .= "ReservedPlayerSlots<input id='ReservedPlayerSlots' class='w3-input w3-border' value='$ReservedPlayerSlots' required>";
  $output .= "QueryPort<input id='QueryPort' class='w3-input w3-border' value='$QueryPort' required>";
  $output .= " Port<input id='Port' class='w3-input w3-border' value='$Port' required>";
  $output .= "SeamlessIP<input id='SeamlessIP' class='w3-input w3-border' value='$SeamlessIP' required><br>";

  $output .= "</div>";
  $output .= "<div class='w3-container'>";
  $output .= "<button id='add_btn' class='w3-button w3-border w3-green'>ADD</button>";
  $output .= "<button id='update_btn' class='w3-button w3-border w3-green'>UPDATE</button>";
  $output .= "<button id='cancel_btn' class='w3-button w3-border w3-red'>CANCEL</button>";
  $output .= "</div>";
    
  echo $output;
 ?>