<?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST["Login"]) && isset($_POST["username"]) && isset($_POST["password"]))
        {
            $connection = mysqli_connect("localhost","root","","spacedust");

            if($connection == false)
            {
                die("ERROR: Failed to Connect to the Database");
            }

            $username = mysqli_real_escape_string($connection,$_POST["username"]);
            $password = mysqli_real_escape_string($connection,$_POST["password"]);

            $sql = "SELECT * FROM users WHERE username='$username'";
            $result = mysqli_query($connection,$sql);

            if($result == true)
            {
                $current_user = mysqli_fetch_assoc($result);

                if(mysqli_num_rows($result) > 0 && password_verify($password,$current_user["password"]))
                {
                    $_SESSION["LoggedIn"] = true;
                    header("Location: SpaceDust.php");
                }
                else
                {
                    Echo "Invalid Username/Password";
                    $_SESSION["LoggedIn"] = false;
                }
            }
            else
            {
                die("ERROR: Failed to Login");
            }
        }
        else if(isset($_POST["Register"]) && isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]))
        {
            $connection = mysqli_connect("localhost","root","","spacedust");

            if($connection == false)
            {
                die("ERROR: Failed to Connect to the Database");
            }

            $username = mysqli_real_escape_string($connection,$_POST["username"]);
            $email = mysqli_real_escape_string($connection,$_POST["email"]);
            $password = mysqli_real_escape_string($connection,password_hash($_POST["password"],PASSWORD_BCRYPT));

            $IP = $_SERVER["REMOTE_ADDR"];
            $detials = json_decode(file_get_contents("http://ipinfo.io/{$IP}/json"));
            //$country = $detials->country;
            //$city = $detials->city;
            //$region = $detials->region;

            $sql = "INSERT INTO users(username,email,password) VALUES('$username','$email','$password')";
            //$sql = "INSERT INTO users(username,email,password,country,city,region) VALUES('$username','$email','$password','$country','$city','$region')";
            $result = mysqli_query($connection,$sql);

            if($result == true)
            {
                header("Location: Registered.php");
            }
            else
            {
                die("ERROR: Registration Failed");
            }
        }
        else
        {
            header("Location: Index.php");
        }
    }
    else
    {
        header("Location: Index.php");
    }
?>