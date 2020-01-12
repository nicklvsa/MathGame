<?php 
	
	session_start();

    if(!isset($_COOKIE['gameType'])) {
        header("Location:https://nicksdesk.com/mathgame/index.php");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>30 Math</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="css/game.css">
    <meta id="Viewport" name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body onLoad="startGame();">
    <?php 
        require_once 'nav.php';
    ?>
        <main class="mdl-layout__content">
            <div id="alertBox" class="alertBox">
                <h4 class="mdl-typography--text-center">Answer field is empty!</h4>
            </div>
            <div style="padding-left: 10%; padding-right: 10%;" class="page-content">
                <div id="boxContainer">
                    <div class="boxClass">
                        <h1 id="shakeContainer" class="mdl-typography--text-center">
                            <span id="object1"></span><span id="mathSign"> + </span><span id="object2"></span>
                        </h1>
                    </div>
                </div>
                <h1 class="mdl-typography--text-center">
                    <div id="inputArea">
                        <form>
                            <div class="mdl-textfield mdl-js-textfield">
                                <input class="mdl-textfield__input" style="text-align: center; " id="getData" type="tel" value="">
                                <label class="mdl-textfield__label" style="text-align: center;" id="offIt" for="sample1">Enter Answer</label>
                            </div>
                        </form>
              <button style="background-color: #4680F0;" id="addTask" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="randomNumberFromRange()">Check Answer</button>
        </div>
    </h1>
<script type="text/javascript" src="js/game.js"></script>
</body>
</html>