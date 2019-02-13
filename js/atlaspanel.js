$(document).ready(function() {
  
  
  
  // Set root directory
  var rooturl  = "http://cfgaming.org:83";
  
  //Find current page url so only specific functions run for a page
  var pageURL = $(location).attr("href");
  //alert(pageURL);

  // updateLogInterval variable
  let updateLogInterval;

  // updateControlsInterval variable
  let updateControlsInterval;
  
  // Initialize Animated Modal
  /*if ( pageURL == (rooturl + "/index.php")) {
    // Initialize Animated Modal
    $("#demo01").animatedModal();
  }*/
  
  // Edit Admin IDs
  $(document).on('click', '.admin_id_btn', function(){
    
    $.ajax({
      url: "/includes/admin_id_edit.php",
      type: "POST",
      dataType: 'html',
      data: {
        
      },
      error: function() {
        alert("Loading Controls Failed.");
      },
      success: function(data) {
        $('.modal').html(data);
        $("#ex1").modal({
					fadeDuration: 200,
					fadeDelay: 0.50,
					escapeClose: true,
					clickClose: false,
					showClose: true
				});
      }
    });
    $(document).on('click', '.admin_save_btn', function(){
      var txt = document.getElementById('admin_id_txt').value;
      $.ajax({
      url: "/includes/admin_id_save.php",
      type: "POST",
      dataType: 'html',
      data: {
        txt: txt
      },
      error: function() {
        alert("Loading Controls Failed.");
      },
      success: function(data) {
        alert(data);
        $.modal.close();
      }
    });
    });
  });
  
  // Redis Server Start button click
  $(document).on('click', '#start_redis_btn', function(){
    $.ajax({
      url: "/includes/redis_start.php",
      type: "POST",
      dataType: 'html',
      data: {
      },
      error: function() {
        alert("Function Failed.");
      },
      success: function(data) {
        alert("Redis Server Started.")
      }
    });
  });
  
   // Redis Server Stop button click
  $(document).on('click', '#stop_redis_btn', function(){
    $.ajax({
      url: "/includes/redis_stop.php",
      type: "POST",
      dataType: 'html',
      data: {
      },
      error: function() {
        alert("Function Failed.");
      },
      success: function(data) {
        alert("Redis Server Stopped.")
      }
    });
  });
  
  // Show Server Inputs
  function serverinputs(){
    //let id = event.target.id;
    
    $.ajax({
      url: "/includes/serverinputs.php",
      type: "POST",
      dataType: 'html',
      
      error: function() {
        alert("Loading Controls Failed.");
      },
      success: function(data) {
        $('#serverinputs').html(data);
        $("#update_btn").hide();
        $("#cancel_btn").hide();
      }
    });
  }
  // Cancel button click
  $(document).on('click', '#cancel_btn', function(){
    serverinputs();
  });
  
  // Edit Server
  $(document).on('click', '.editbtn', function(){
    let id = event.target.id;
    $.ajax({
      url: "/includes/serverinputs.php",
      type: "POST",
      dataType: 'html',
      data: {
        id: id
      },
      error: function() {
        alert("Loading Controls Failed.");
      },
      success: function(data) {
        $('#serverinputs').html(data);
        $("#add_btn").hide();
        $("#update_btn").show();
        $("#cancel_btn").show();
      }
    });
  });
  
  // Cancel button click
  $(document).on('click', '#cancel_btn', function(){
    serverinputs();
  });
  
  // Delete Server
  $(document).on('click', '.delbtn', function(){
    let id = event.target.id;
    alert("DELETE " + id);
  });
  
  // Start Server
  $(document).on('click', '.startbtn', function(){
    let id = event.target.id;
    $(".info").hide();
    $("#tab1div").show();
    $("#startbox").html("Server "+id+" start begin.");
    $.ajax({
      type: "POST",
      error: function() {
        alert("Server Start Failed.");
      },
      success: function(data) {
        $("#startbox").html(data);
      },
      url: "/includes/start_server.php",
      data: {
        id: id
      }
    });
  });
  
  // Show Server Controls
  function get_servers() {
    $.ajax({
      url: "/includes/sql_select.php",
      type: "POST",
      dataType: 'html',
      data: {
        name: "John"
      },
      error: function() {
        alert("Loading Controls Failed.");
      },
      success: function(data) {
        $('#servertable').html(data);
      }
    });
  }
  
  // If settings page then get servers
  if ( pageURL == (rooturl + "/modules/settings/index.php")) {
    get_servers();
    serverinputs();
  }
  
  // Show Server Controls
  function server_controls() {
    $.ajax({
      url: "/includes/server_controls.php",
      type: "POST",
      dataType: 'html',
      data: {
        name: "John"
      },
      error: function() {
        alert("Loading Controls Failed.");
      },
      success: function(data) {
        
        $('#controls').html(data);
      }
    });
  }

  // Run server_controls function & refresh
  if ( pageURL == (rooturl + "/index.php")) {
    server_controls();
    updateControlsInterval = setInterval(function() {
      server_controls();
    }, 10000);
  }


  // Add Server button
  $(document).on('click', '#add_btn', function(){

    var SessionName = document.getElementById('SessionName').value;
    var ServerX = document.getElementById('ServerX').value;
    var ServerY = document.getElementById('ServerY').value;
    var AltSaveDirectoryName = document.getElementById('AltSaveDirectoryName').value;
    var ServerAdminPassword = document.getElementById('ServerAdminPassword').value;
    var RCONEnabled = document.getElementById('RCONEnabled').value;
    var RCONPort = document.getElementById('RCONPort').value;
    var MaxPlayers = document.getElementById('MaxPlayers').value;
    var ReservedPlayerSlots = document.getElementById('ReservedPlayerSlots').value;
    var QueryPort = document.getElementById('QueryPort').value;
    var Port = document.getElementById('Port').value;
    var SeamlessIP = document.getElementById('SeamlessIP').value;

    $.ajax({
      url: "/includes/sql_insert.php",
      type: "POST",
      dataType: 'html',
      data: {
        SessionName: SessionName,
        ServerX: ServerX,
        ServerY: ServerY,
        AltSaveDirectoryName: AltSaveDirectoryName,
        ServerAdminPassword: ServerAdminPassword,
        RCONEnabled: RCONEnabled,
        RCONPort: RCONPort,
        MaxPlayers: MaxPlayers,
        ReservedPlayerSlots: ReservedPlayerSlots,
        QueryPort: QueryPort,
        Port: Port,
        SeamlessIP: SeamlessIP
      },
      error: function() {
        alert("Loading Controls Failed.");
      },
      success: function(response) {
        get_servers();
        alert(response);
      }

    });

  });

  // Update Server button
  $(document).on('click', '#update_server_btn', function(){
    var id = document.getElementById('id').value;
    var SessionName = document.getElementById('SessionName').value;
    var ServerX = document.getElementById('ServerX').value;
    var ServerY = document.getElementById('ServerY').value;
    var AltSaveDirectoryName = document.getElementById('AltSaveDirectoryName').value;
    var ServerAdminPassword = document.getElementById('ServerAdminPassword').value;
    var RCONEnabled = document.getElementById('RCONEnabled').value;
    var RCONPort = document.getElementById('RCONPort').value;
    var MaxPlayers = document.getElementById('MaxPlayers').value;
    var ReservedPlayerSlots = document.getElementById('ReservedPlayerSlots').value;
    var QueryPort = document.getElementById('QueryPort').value;
    var Port = document.getElementById('Port').value;
    var SeamlessIP = document.getElementById('SeamlessIP').value;

    $.ajax({
      url: "/includes/sql_update.php",
      type: "POST",
      dataType: 'html',
      data: {
        id: id,
        SessionName: SessionName,
        ServerX: ServerX,
        ServerY: ServerY,
        AltSaveDirectoryName: AltSaveDirectoryName,
        ServerAdminPassword: ServerAdminPassword,
        RCONEnabled: RCONEnabled,
        RCONPort: RCONPort,
        MaxPlayers: MaxPlayers,
        ReservedPlayerSlots: ReservedPlayerSlots,
        QueryPort: QueryPort,
        Port: Port,
        SeamlessIP: SeamlessIP
      },
      error: function() {
        alert("Loading Controls Failed.");
      },
      success: function(data) {
        get_servers();
        serverinputs();
        alert(data);
      }

    });

  });
  
  // Show or Hide Tabs
  $('.tab').click(function() {
    // Hide any tabs previously opened
    $(".info").hide();
    var tab = "#" + this.id;
    var n;
    $(tab + "div").toggle();
  });



  // Stop Server
  $(document).on('click', '.stop_server_btn', function(){
    $.ajax({
      type: "POST",
      error: function() {
        stopcount = 0;
        alert("Server Stop Failed.");
      },
      success: function() {
        $(".info").hide();
        server_controls();
        alert("Server has been stopped.");
      },
      url: "/includes/stop.php",
      data: {
        name: "John"
      }
    });
  });

  // Get update log function
  function getUpdateLog() {
    $.ajax({
      url: "includes/update.txt",
      dataType: "text",
      success: function(data) {
        $("#updatebox").html(data);
      }
    });
    $("html, #updatebox").animate({
      scrollTop: "90000px"
    }, "fast");
    return false;
  }

  // Update Server
  $(document).on('click', '.update_svr_btn', function(){
    getUpdateLog();
    updateLogInterval = setInterval(function() {
      getUpdateLog();
    }, 2000);
    $("#tab2div").show();
    $.ajax({
      type: "POST",
      error: function() {
        alert("Update Failed!");
        clearInterval(updateLogInterval);
      },
      success: function(data) {
        
        alert("Server Updated!");
        clearInterval(updateLogInterval);
      },
      url: "/includes/update_server.php",
    });
  });

  // logs2 tab click function
  $('#tab2').click(function() {
    getUpdateLog();
  });
});