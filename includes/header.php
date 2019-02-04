<!DOCTYPE html>
<html>
<title>CFGaming</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="/css/atlaspanel.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="/js/atlaspanel.js"></script>
<?php 
  require $_SERVER["DOCUMENT_ROOT"] . '/includes/includes.php';
  ?>

<body>
  <div class="w3-container w3-teal">
    <h1>CFGaming.org Atlas Panel</h1>
  </div>

  <div class="w3-bar w3-black">
    <a href="/index.php" class="w3-bar-item w3-button w3-mobile w3-green">HOME</a>
    <a href="/modules/settings/index.php" class="w3-bar-item w3-button w3-mobile">SETTINGS</a>
    <div class="w3-dropdown-hover w3-mobile">
      <button class="w3-button">ADMIN <i class="fa fa-caret-down"></i></button>
      <div class="w3-dropdown-content w3-bar-block w3-dark-grey">
        <a href="http://cfgaming.org:83/ampps" class="w3-bar-item w3-button w3-mobile">AMPPS User</a>
        <a href="http://cfgaming.org:83/ampps-admin" class="w3-bar-item w3-button w3-mobile">AAMPS Admin</a>
        <a href="http://cfgaming.org:83/phpmyadmin" class="w3-bar-item w3-button w3-mobile">PHPMyAdmin</a>
        <a href="#" id="stop_redis_btn" class="w3-bar-item w3-button w3-mobile">Stop Redis</a>
        <a href="#" id="start_redis_btn" class="w3-bar-item w3-button w3-mobile">Start Redis</a>
        <a href="#" id="clear_redis_btn" class="w3-bar-item w3-button w3-mobile">Clear Redis</a>
      </div>
    </div>
    <a href="/modules/login/logout.php" class="w3-bar-item w3-button w3-mobile w3-right" onclick="">Logout</a>
  </div>
  </body>
</html>