<?php
 
require "../config/database.php";
 
session_start(); 
 
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{  
        $email = mysqli_real_escape_string($link, trim($_POST['email']));
        $password = mysqli_real_escape_string($link, trim($_POST['password']));

        $query = "select * from basv_2023_patient where email = '$email' and password = '$password'";

        $result = mysqli_query($link,$query);

        $row = mysqli_fetch_array($result);

       if (!empty($row["email"]) && !empty($row["password"])) 
        {
            $_SESSION["patient"] = $row["email"];
            $_SESSION["patientname"] = $row["name"];
            echo "<script> location.replace('dashboard.php') </script>";
        } 
        else 
        {
            $_SESSION["fail"] = "yes";
            echo "<script> location.replace('index.php') </script>";
        } 
 
    mysqli_close($link);
}
else 
{
    echo "<script> location.replace('index.php') </script>";
}
