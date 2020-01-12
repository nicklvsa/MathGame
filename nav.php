<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <span class="mdl-layout-title"><a href="https://nicksdesk.com/mathgame/index.php"><i style="color:white;" class="material-icons">home</i></a></span>
                <div class="mdl-layout-spacer" style="text-align: right;"><?php 
                    if(isset($_SESSION['account']) && $_SESSION['account'] != "") {
                        echo "<button style=\"background-color: #4680F0;\" id=\"off\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent\">Log Out</button>";
                    } else {
                        echo "<button style=\"background-color: #4680F0;\" id=\"on\" class=\"mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent\">Login</button>";
                    }
                ?></div>
            </div>
        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">Navigation</span>
            <nav class="mdl-navigation">
                <a class="mdl-navigation__link" href="https://nicksdesk.com/mathgame/index.php">Home</a>
                <a class="mdl-navigation__link" href="https://nicksdesk.com/mathgame/account.php">Account</a>
                <?php 
                	if(isset($_SESSION['account'])) {
                		echo "
                			<a class=\"mdl-navigation__link\" href=\"https://nicksdesk.com/mathgame/index.php?logout\">Logout</a>
                		";
                	} else {
                		echo "
                			<a class=\"mdl-navigation__link\" href=\"https://nicksdesk.com/mathgame/login.php\">Login</a>
                		";
                	}
                ?>
                
            </nav>
        </div>
        
        
        
        <script type="text/javascript">
            $("#off").on('click', function() {
               window.location.href = "https://nicksdesk.com/mathgame/index.php?logout"; 
            });
             $("#on").on('click', function() {
               window.location.href = "https://nicksdesk.com/mathgame/login.php"; 
            });
        </script>