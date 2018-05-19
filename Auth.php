<?php
    $servername = "sql302.ezyro.com";
    $user = "ezyro_22070290";
    $pass = "wpu7s4yfi";
    $database = "ezyro_22070290_spacedust";

    if(isset($_GET["username"]) && isset($_GET["password"]))
    {
        $connection = mysqli_connect($servername,$user,$pass,$database);

        if($connection == false)
        {
            die("Failed to connect to the Database");
        }

        $username = mysqli_real_escape_string($connection,$_POST["username"]);
        $password = $_POST["password"];

        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($connection,$sql);

        if($result == true)
        {
            $current_user = mysqli_fetch_assoc($result);

            if(mysqli_num_rows($result) > 0 && password_verify($password,$current_user["password"]))
            {
                Echo "You have been Logged In Successfully";
            }
            else
            {
                Echo "Invalid Username/Password";
            }
        }
        else
        {
            die("ERROR: SQL Query Failed");
        }
    }
?>