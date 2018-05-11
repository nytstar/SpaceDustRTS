<?php
    if($_SESSION["LoggedIn"] == false)
    {
        header("Location: Index.php");
    }
?>

<html>
    <head>
        <title>Space Dust</title>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" type="text/css" media="screen" href="reset.php"/>
        <link rel="stylesheet" type="text/css" media="screen" href="style.php"/>
        <script src="Tween.js"></script>
        <script src="TweenMax.js"></script>
        <script src="TweenLite.js"></script>
        <script src=""></script>
    </head>

    <body>
        <canvas id="canvas">

        </canvas>

        <script src="main.js"></script>
    </body>
</html>