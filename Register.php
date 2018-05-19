<!DOCTYPE html>
<html>
    <head>
        <title>Space Dust</title>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" type="text/css" media="screen" href="reset.php"/>
        <link rel="stylesheet" type="text/css" media="screen" href="style.php"/>
    </head>

    <body>
        <h1>Space Dust</h1>

        <div class="container">
            <form action="Process.php" method="POST">
                <input type="text" class="form-input" name="username" placeholder="Username..." required/><br>
                <input type="text" class="form-input" name="email" placeholder="Email..." required/><br>
                <input type="password" class="form-input" name="password" placeholder="Password..." required/><br>
                <input type="submit" class="form-btn" name="Register" value="Register"/>
            </form>
        </div>
    </body>
</html>