<?php 
	session_start(); /* Starts the session */
	if(!isset($_SESSION['UserData']['Username'])){
	header("location:/modules/login/login.php");
	exit;
	}
 
	function get_server_memory_usage(){
		$free = shell_exec('free');
		$free = (string)trim($free);
		$free_arr = explode("\n", $free);
		$mem = explode(" ", $free_arr[1]);
		$mem = array_filter($mem);
		$mem = array_merge($mem);
		$memory_usage = $mem[2]/$mem[1]*100;
		return $memory_usage;
	}

	function get_server_cpu_usage(){
		$load = sys_getloadavg();
		return $load[0];
	}

	function start_server1(){
		exec('c:\WINDOWS\system32\cmd.exe /c START C:\Users\Server\Desktop\Servers\Atlas\scripts\1AtlastStart.bat');
	}

	function log_out(){
		/* Starts the session */
		session_start();
		/* Destroy started session */ 
		session_destroy(); 
		/* Redirect to login page */
		header("location:includes\login.php");  
		exit;
	}

?>