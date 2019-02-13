<?php
require $_SERVER["DOCUMENT_ROOT"].('/config/sql/config.php');
$tblname = 'atlas';
// SHOW tables FROM $dbname
$rownames = array(
        "id",
        "SessionName",
        "ServerX",
        "ServerY",
        "AltSaveDirectoryName",
        "ServerAdminPassword",
        "RCONEnabled",
        "RCONPort",
        "MaxPlayers",
        "ReservedPlayerSlots",
        "QueryPort",
        "Port",
        "SeamlessIP"
      );

$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM $tblname";
$result = $conn->query($sql);

// Count Tableheader names in array
$rowcount = count($rownames);

if ($result->num_rows > 0) {
  // echo Table Structure
  echo "<link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'>";
  echo "<table class='w3-table-all w3-tiny w3-card'>";
  echo "<tr>";
  
  // Loop through table headers
  for ($x=0; $x <= $rowcount; $x++){
          echo "<th>$rownames[$x]</th>";
        }
  echo "<th>OPTION</th>";
  echo "</tr>";
  
  

  // output data of each row
  while($row = $result->fetch_assoc()) {
    $id = $row['id'];
    echo "<tr>";
    for ($y=0; $y <= $rowcount; $y++){
      $rn = $rownames[$y];
      
      //echo $rn;
      echo "<td>" . $row[$rn] . "</td>";
    }
     echo "<td><button id='$id' class='editbtn w3-button w3-blue'>EDIT</button> <button id='$id' class='delbtn w3-button w3-red'>DELETE</button></td>";
     echo "</tr>";
     
  }
} else {
    echo "0 results";
}

echo "</table>";

$conn->close();

?>