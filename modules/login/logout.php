<?php
/* Starts the session */
		session_start();
		/* Destroy started session */ 
		session_destroy(); 
		/* Redirect to login page */
		header("location:/modules/login/login.php","_self");  
		exit;
		?>