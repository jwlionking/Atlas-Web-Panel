<div class="w3-container">
  <p>
    <h1>LOG FILES</h1>
  </p>
  <p>
    <div class="w3-bar w3-black">
      <button class="tab w3-bar-item w3-button" id="tab1">Status</button>
      <button class="tab w3-bar-item w3-button" id="tab2">Update</button>
      <!--
      <button class="tab w3-bar-item w3-button" id="tab3">AllowedCheaterSteamIDs</button>
      <button class="tab w3-bar-item w3-button" id="tab4">Game.ini</button>
      <button class="tab w3-bar-item w3-button" id="tab5">GameUserSettings.ini</button>
      <button class="tab w3-bar-item w3-button" id="tab6">Win Processes</button>
      <button class="tab w3-bar-item w3-button" id="tab7">Atlas Processes</button>
      <button class="tab w3-bar-item w3-button" id="tab8">CPU Usage</button>
      -->
    </div>
    <div id="tab1div" class="w3-container info" style="display:none">
      <h2>Status Log</h2>
      <p><textarea class="starttab" id="startbox" rows='10' style='width:100%;'></textarea></p>
    </div>
    <div id="tab2div" class="w3-container info" style="display:none">
      <h2>Steam Update</h2>
      <p><textarea class="updatetab" id="updatebox" rows='10' style='width:100%;'></textarea></p>
    </div>
    <div id="tab3div" class="w3-container info" style="display:none">
      <h2>AllowedCheaterSteamIDs.txt</h2>
      <p><textarea rows='10' style='width:100%;' required><?php
        $myfile = "";
        $myfile = file_get_contents("C:/Users/Server/Desktop/Servers/Atlas/ShooterGame/Saved/AllowedCheaterSteamIDs.txt");
        echo $myfile; 
        ?></textarea></p>
    </div>
<!--
    <div id="tab4div" class="w3-container info" style="display:none">
      <h2>Game.ini</h2>
      <p><textarea rows='10' style='width:100%;' required>< ?php echo file_get_contents( "C:/Users/Server/Desktop/Servers/Atlas/ShooterGame/Saved/0_0/Config/WindowsServer/Game.ini" ); ?></textarea></p>
    </div>

    <div id="tab5div" class="w3-container info" style="display:none">
      <h2>GameUserSettings</h2>
      <p><textarea rows='10' style='width:100%;' required>< ?php echo file_get_contents( "C:/Users/Server/Desktop/Servers/Atlas/ShooterGame/Saved/0_0/Config/WindowsServer/GameUserSettings.ini" ); ?></textarea></p>
    </div>
    <div id="tab6div" class="w3-container info" style="display:none">
      <h2>Windows Processes</h2>
      <p><textarea rows='10' style='width:100%;' required>< ?php //exec( "tasklist 2>NUL", $task_list ); print_r( $task_list ); ?></textarea></p>
    </div>

    <div id="tab7div" class="w3-container info" style="display:none">
      <h2>ShooterGame Processes</h2>
      <p><textarea rows='10' style='width:100%;' required>< ?php //exec( "tasklist /v | find 'ShooterGameServer'", $task ); print_r( $task ); ?></textarea></p>
    </div>

    <div id="tab8div" class="w3-container info" style="display:none">
      <h2>CPU Usage</h2>
      <p><textarea rows='10' style='width:100%;' required> < ?php //exec( "wmic cpu get loadpercentage", $p ); print_r($p[1]); ?>%</textarea></p>
    </div>
-->
<br>
</div>