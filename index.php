<?php 
	session_start();

	if(isset($_GET['logout'])) {
		session_destroy();
		header("Location:https://nicksdesk.com/mathgame/login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
  <title>30 Math</title>
  <meta name="viewport" content="minimal-ui, width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
   <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <link rel="apple-touch-icon" href="images/icon-256x256.png" />
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<meta id="Viewport" name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
<script
  src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
  crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
<style type="text/css">
  body {
    background-color: white;
  }
  .btnSize {
    width: 200px;
  }
  .boxClass {
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
    padding-top: 1px;
    padding-bottom: 15px;
    /*padding-left: 10px;*/
  }
  .sideColor {
    position: absolute;
    z-index: 99;
    background-color: #4680F0;
    padding-left: 10px;
    height: 164px;
  }
  .texContainer {
    padding-left: 13px;
  }
  .divider {
    padding-top: 10px;
  }
  .alertBox {
   display: none;
    
   
     }
  #alertText {
    font-size: 20px;
    padding-left: 2px;
     background-color: yellow;
     padding-top: 10px;
     padding-bottom: 10px;
    
  }
  #removeTask {
    background-color: #F44336;
    color: white;
  }
  
</style>
<!-- Always shows a header, even in smaller screens. -->
<?php 
    require_once 'nav.php';
?>
      
  <main style="text-align: center;" class="mdl-layout__content">
    <br>
    <h3 style="text-align: center;">Select Game Type</h3>
    <br>
   <button style="background-color: #4680F0;" onClick="startGameWithType('add');" class="btnSize mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
Addition
</button>
<br>
<br>
   <button style="background-color: #4680F0;" onClick="startGameWithType('sub');" class="btnSize mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
Subtraction
</button>
<br>
<br>
   <button style="background-color: #4680F0;" onClick="startGameWithType('div');" class="btnSize mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
Division
</button>
<br>
<br>
   <button style="background-color: #4680F0;" onClick="startGameWithType('mul');" class="btnSize mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
Multiplication
</button>
</div>
<!-- end of reg div -->
</body>
<script type="text/javascript">

 function startGameWithType(type) {
    if(type != null) {
        setCookie("gameType", type, 30);
        window.location.href="https://nicksdesk.com/mathgame/game.php";
    }
}


function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

</script>
</html>