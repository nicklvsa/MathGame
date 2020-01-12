<?php 
	
	session_start();

    if(isset($_SESSION['account'])) {
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

 <div class="mdl-layout mdl-js-layout mdl-color--grey-100" style="align-items:center; justify-content:center; padding-top:200px; flex:none; text-align:center;">
 	
	<main class="mdl-layout__content">
		<div id="error" style="display:none; text-align:center; background-color:red; -moz-border-radius:5px 5px; border-radius:5px 5px / 5px 5px;">
			<h5 id="error_text" style="text-align:center; color:white; padding-top:6px; padding-bottom:6px;"></h5>
	</div>
		<div class="mdl-card mdl-shadow--6dp">
			<div class="mdl-card__title mdl-color--primary mdl-color-text--white">
				<h2 class="mdl-card__title-text">Login</h2>
			</div>
	  	<div class="mdl-card__supporting-text">
				<form action="#">
					<div class="mdl-textfield mdl-js-textfield">
						<input class="mdl-textfield__input" type="text" id="username" />
						<label class="mdl-textfield__label" for="username">Username</label>
					</div>
					<div class="mdl-textfield mdl-js-textfield">
						<input class="mdl-textfield__input" type="password" id="userpass" />
						<label class="mdl-textfield__label" for="userpass">Password</label>
					</div>
				</form>
			</div>
			<div class="mdl-card__actions mdl-card--border">
				<button id="loginSubmit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Log in</button>
				<button id="registerSubmit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Create Account</button>
			</div>
		</div>
	</main>
</div>
<!-- end of reg div -->
</body>
<script type="text/javascript">

var api = "https://nicksdesk.com/mathgame/api/index.php";

$("#loginSubmit").on('click', function() {
	let username = $("#username").val();
	let password = $("#userpass").val();
	if(username != "" && password != "") {
		$.post(api, {login: true, username: username, password: password}).done(function(data) {
			if(data) {
				console.log(data);
				let response = JSON.parse(data);
				if(response.success == "login_success") {
					window.location.href="https://nicksdesk.com/mathgame/index.php";
				} else {
					$('#error_text').text("Error: Login Error!");
    				$('#error').css("display", "block");
				}
			}
		});
	} else {
		$('#error_text').text("Error: Register Error!");
    	$('#error').css("display", "block");
	}
});

$("#registerSubmit").on('click', function() {
	let username = $('#username').val();
	let password = $('#userpass').val();
	if(username != "" && password != "") {
		$.post(api, {register: true, username: username, password: password}).done(function(data) {
			if(data != "") {
				console.log(data);
				let response = JSON.parse(data);
				if(response.success == "registeration_success") {
					window.location.href="https://nicksdesk.com/mathgame/index.php";
				} else if(response.error == "user_exists") {
					$('#error_text').text("Error: User Exists!");
    				$('#error').css("display", "block");
				} else {
					$('#error_text').text("Error: Register Error!");
    				$('#error').css("display", "block");
				}
			}
		});
	} else {
		$('#error_text').text("Error: Register Error!");
    	$('#error').css("display", "block");
	}
});
</script>
</html>