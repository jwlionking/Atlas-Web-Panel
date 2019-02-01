<?php
  require $_SERVER["DOCUMENT_ROOT"].('/config/sql/config.php');
  $conn = new mysqli($servername, $username, $password, $dbname);
  $sql = "SELECT id,QueryPort FROM atlas";
  $result = $conn->query($sql);
  $rowcount = $result->num_rows;
  $conn->close();
  
  // Header and All Server Controls
  $header = "";
  $header .= "<div class='w3-container w3-margin-bottom'>";
  $header .= "  <h1>SERVER CONTROLS</h1>";
  $header .= "  <button class='startall_server_btn w3-button w3-round w3-border w3-yellow' id='all'>START ALL</button>";
  $header .= "  <button class='stop_server_btn w3-button w3-round w3-border w3-red' id='all'>STOP ALL</button>";
  $header .= "  <button class='update_svr_btn w3-button w3-round w3-border w3-blue' id='all'>UPDATE</button>";
  $header .= "</div>";
  echo $header;

  $x = 1;
  while ($row = $result->fetch_assoc()){
    //echo $row['QueryPort'];
    ${"SQ_SERVER_PORT".$x} = $row['QueryPort'];
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
  $output .= "  </div>";
  $output .= "</div>";
  $output .= "";
  
  echo $output;
}

?>