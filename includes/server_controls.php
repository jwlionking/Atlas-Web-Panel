<?php
  require $_SERVER["DOCUMENT_ROOT"].('/config/sql/config.php');
  $conn = new mysqli($servername, $username, $password, $dbname);
  $sql = "SELECT id,QueryPort,AltSaveDirectoryName FROM atlas";
  $result = $conn->query($sql);
  $rowcount = $result->num_rows;
  $conn->close();
  
  // Batch file to check redis status
  exec('c:\WINDOWS\system32\cmd.exe /c START checkredis.bat');

  // Header and All Server Controls
  $header = "";
  $header .= "  <div id='redis_status' class='w3-container w3-card w3-dark-grey'>";
  $header .= file_get_contents("redis_status.txt");
  $header .= "  </div>";
  $header .= "<div class='w3-container w3-margin-bottom'>";
  $header .= "  <h1>SERVER CONTROLS</h1>";
  
  $header .= "  <button class='startall_server_btn w3-button w3-round w3-border w3-yellow' id='all'>START ALL</button>";
  $header .= "  <button class='stop_server_btn w3-button w3-round w3-border w3-red' id='all'>STOP ALL</button>";
  $header .= "  <button class='update_svr_btn w3-button w3-round w3-border w3-blue' id='all'>UPDATE</button>";
  $header .= "  <button class='admin_id_btn w3-button w3-round w3-border w3-black' id='demo01'>EDIT ADMIN IDs</button>";
  $header .= "  <br>";
  
  $header .= "</div>";

  echo $header;

  $x = 1;
  while ($row = $result->fetch_assoc()){
    //echo $row['QueryPort'];
    ${"SQ_SERVER_PORT".$x} = $row['QueryPort'];
    ${"AltSaveDirectoryName".$x} = $row['AltSaveDirectoryName'];
    $x++;
  }

  require __DIR__ . '/SourceQuery/bootstrap.php';

	use xPaw\SourceQuery\SourceQuery;
	
	// Game Server definitions
	define( 'SQ_SERVER_ADDR', '192.168.1.14' );
	define( 'SQ_TIMEOUT',     1 );
	define( 'SQ_ENGINE',      SourceQuery::SOURCE );
	
	$Query = new SourceQuery( );
  

for ($x = 1; $x <=$rowcount; $x++) {
    try
	{
		$Query->Connect( SQ_SERVER_ADDR, ${"SQ_SERVER_PORT".$x}, SQ_TIMEOUT, SQ_ENGINE );
    $GetInfo = $Query->GetInfo( );
    
    ${"HostName" . $x} = $GetInfo['HostName'];
    ${"Map" . $x} = $GetInfo['Map'];
    ${"Players" . $x} = $GetInfo['Players'];
    ${"MaxPlayers" . $x} = $GetInfo['MaxPlayers'];

    ${"status" . $x} = "ONLINE"; 
	}
	catch( Exception $e )
	{
		${"status" . $x} = "OFFLINE";
	}
	finally
	{
		$Query->Disconnect( );
	}
  $output = "";
  $output .= "<div class='w3-card w3-container w3-quarter w3-border'>";
  $output .= "  <p>";
  $output .= "    <center>";
  $output .= "      <h2>SERVER $x</h2>";
  
  if (${"HostName" . $x}){
    $output .= "    <button class='startbtn w3-button w3-round w3-border w3-green' id='online_btn$x'>ONLINE</button>";
  } else {
    $output .= "    <button class='startbtn w3-button w3-round w3-border w3-yellow' id='$x'>START</button>";
  }
    
  
  $output .= "    </center>";
  $output .= "  </p>";
  $output .= "  <hr>";
  $output .= "  <div class='info$x w3-container'>";
  $output .= "    Status: ${"status" . $x}<br>";
  $output .= "    Server: ${"HostName" . $x}<br>";
  $output .= "    Map: ${"Map" . $x}<br>";
  $output .= "    Players Online: ${"Players" . $x}<br>";
  $output .= "    Max Players: ${"MaxPlayers" . $x}";
  //$output .= "    AltSaveDirectoryName: ${"AltSaveDirectoryName" . $x}";
  $output .= "  </div>";
  //$output .= "  <hr>";
  $output .= "  <div class='w3-container w3-padding'>";
  $output .= "    <center>";
  $output .= "    <h4>EDIT CONFIGS</h4></center>";
  //$output .= "    <hr>";
  $output .= "    <button id='${"AltSaveDirectoryName" . $x}' class='gameini_btn w3-button w3-round w3-border w3-black'>Game.ini</button>";
  $output .= "    <button id='${"AltSaveDirectoryName" . $x}' class='gameus_btn w3-button w3-round w3-border w3-black'>GameUserSettings.ini</button>";
  $output .= "    <button id='${"AltSaveDirectoryName" . $x}' class='engine_btn w3-button w3-round w3-border w3-black'>Engine.ini</button>";
  $output .= "    </center>";
  $output .= "  </div>";
  $output .= "</div>";
  $output .= "";
  
  echo $output;
}

?>