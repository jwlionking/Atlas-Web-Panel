<?php
require $_SERVER["DOCUMENT_ROOT"].('/config/sql/config.php');
$conn = new mysqli($servername, $username, $password, $dbname);

$rownames = array(
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


// Count Tableheader names in array
$rowcount = count($rownames);

$sql .= "INSERT INTO `atlas` (";
// Loop through table headers
for ($x=0; $x < ($rowcount-1); $x++){
    $sql .="`$rownames[$x]`, ";
  }
$sql .= "`" . $rownames[$rowcount-1] . "`";
$sql .= ") VALUES (";
for ($x=0; $x < ($rowcount-1); $x++){
    $postname = $rownames[$x];
    $sql .="'$_POST[$postname]', ";
  }
$postname = $rownames[$rowcount-1];
$sql .= "'" . $_POST[$postname] . "'";
$sql .= ")";
//echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>