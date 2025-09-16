<?php
session_start();

$valid_user = "admin";
$valid_pass = "12345";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username === $valid_user && $password === $valid_pass) 
            {
                $_SESSION['username'] = $username;
                header("Location: profile.php");
                exit();
            } 
            else 
                {
                    echo "Invalid Username or Password! <br>";
                    echo "<a href='homepage.html'>Try Again</a>";
                }
    }
?>