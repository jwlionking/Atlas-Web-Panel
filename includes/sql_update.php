<?php
require $_SERVER["DOCUMENT_ROOT"].('/config/sql/config.php');
$conn = new mysqli($servername, $username, $password, $dbname);
$id = $_POST['id'];
$columnNames = array(
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
$columnCount = count($columnNames);

$sql .= "UPDATE `atlas` SET ";

// Loop through table columns
for ($x=0; $x <($columnCount-1); $x++){
  $columnName = $columnNames[$x];
  $post = $_POST[$columnName];
  
  $sql .= "`$columnName` = ";
  $sql .= "'$post', ";

}
  // Add final table column
  $columnName = $columnNames[($columnCount-1)];
  $post = $_POST[$columnName];
  $sql .= "`$columnName` = ";
  $sql .= "'$post' ";
  $sql .= "WHERE id=".$id;

//echo $sql;

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();


?>