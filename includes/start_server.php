<?php
/*
Ocean?ServerX=0?ServerY=1?Port=5777?QueryPort=57577?AltSaveDirectoryName=0_1?MaxPlayers=200?ReservedPlayerSlots=100?ServerAdminPassword=Alienwarem17?ServerCrosshair=true?AllowThirdPersonPlayer=true?MapPlayerLocation=true?serverPVE=false?RCONEnabled=true?RCONPort=32342?EnablePvPGamma=true?AllowAnyoneBabyImprintCuddle=true?ShowFloatingDamageText=True?SeamlessIP=207.255.60.143" -game -server -log -NoCrashDialog -NoBattlEye
*/

	require $_SERVER["DOCUMENT_ROOT"].('/config/sql/config.php');
	$id = $_POST['id'];
	//$id = 2;
	if($_POST['id'] == "all"){
	 $where = "";
	}
	 
	 else {
	   $where = " WHERE id=" . $_POST['id'];
	 }
	
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
	$sql = "SELECT * FROM atlas" . $where; 
	$result = $conn->query($sql);
	
	// Count Tableheader names in array
	$rowcount = count($rownames);
	
	//echo $sql;
	
	if ($result->num_rows > 0) {
	 // output data of each row
	   while($row = $result->fetch_assoc()) {
	     $exec .= "C:\Users\Server\Desktop\Servers\Atlas\ShooterGame\Binaries\Win64\ShooterGameServer.exe Ocean";
	     for ($x=1; $x < ($rowcount); $x++){
	       $rowname=$rownames[$x];
	         $exec .= "?$rowname=".$row[$rowname];
	       }
	     $exec .= " -NoBattlEye -servergamelog -log -server";
	   }
	 //echo $exec;
    $shell = new COM("WScript.Shell");
    $shell->run($exec, 0, false);
	 //exec("start /b " . $exec);
	} else {
	   echo "0 results";
	}
	
	$conn->close();
	
	require __DIR__ . '/SourceQuery/bootstrap.php';
	
	use xPaw\SourceQuery\SourceQuery;
	
	// Edit this ->
	define( 'SQ_SERVER_ADDR', '192.168.1.14' );
	define( 'SQ_SERVER_PORT1', 57560 );
	define( 'SQ_SERVER_PORT2', 57575 );
	define( 'SQ_SERVER_PORT3', 57577 );
	define( 'SQ_SERVER_PORT4', 57589 );
	define( 'SQ_TIMEOUT',     1 );
	define( 'SQ_ENGINE',      SourceQuery::SOURCE );
	// Edit this <-
	
	$Query = new SourceQuery( );
	
  // Create a log to test for statement
  
  set_time_limit(240);
	for ($x = 0; $x < 240; $x++) {
	   try
	     {
	       $Query->Connect( SQ_SERVER_ADDR, constant("SQ_SERVER_PORT".$id), SQ_TIMEOUT, SQ_ENGINE );
	       $GetInfo = $Query->GetInfo( );
	
	       ${"HostName" . $id} = $GetInfo['HostName'];
	       ${"Map" . $id} = $GetInfo['Map'];
	       ${"Players" . $id} = $GetInfo['Players'];
	       ${"MaxPlayers" . $id} = $GetInfo['MaxPlayers'];
	
	       ${"status" . $id} = "ONLINE"; 
	       }
	       catch( Exception $e )
	       {
	         ${"status" . $id} = "OFFLINE";
	       }
        
        /*
        finally
        {
          $Query->Disconnect( );
        }
        */
        sleep(1);
        
	       if ($GetInfo['HostName']) {
	         exit("Server is " . ${"status" . $id} . " " . $id . " " . $GetInfo['HostName']);
	       }   
	    }
	      
      echo $txt;
	?>