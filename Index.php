<?php
    if(isset($_POST["Login"]))
    {
        header("Location: Login.php");
    }
    if(isset($_POST["Register"]))
    {
        header("Location: Register.php");
    }

    session_start();

    $_SESSION["LoggedIn"] = false;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Space Dust</title>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" type="text/css" media="screen" href="reset.php"/>
        <link rel="stylesheet" type="text/css" media="screen" href="main.php"/>
        <script src="Tween.js"></script>
        <script src="TweenMax.js"></script>
        <script src="TweenLite.js"></script>
    </head>

    <body oncontextmenu="return false;">
        <div id="large-header" class="large-header">
            <h1 class="main-title">Space Dust</span></h1>

            <form action="Index.php" method="POST">
                <input type="submit" name="Login" class="form-btn" value="Login"/>
                <input type="submit" name="Register" class="form-btn" value="Register"/>
            </form>
            <canvas id="demo-canvas">
		</canvas>
        </div>

        
        <script src="Intro.js"></script>
    </body>
</html>