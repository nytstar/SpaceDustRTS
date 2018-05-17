<?php
    /*
    if($_SESSION["LoggedIn"] == false)
    {
        header("Location: Index.php");
    }
    */
?>

<html>
    <head>
        <title>Space Dust</title>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" type="text/css" media="screen" href="reset.css"/>
        <link rel="stylesheet" type="text/css" media="screen" href="style.css"/>
    </head>

    <body>
        <canvas id="canvas"></canvas>
        <script src="socket.io.js"></script>
        <script src="Camera.js"></script>
        <script src="Sprite.js"></script>
        <script src="Constants.js"></script>
        <script src="Instances.js"></script>
        <script src="main.js"></script>
    </body>
</html>
