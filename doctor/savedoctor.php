<?php

session_start();
require "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (isset($_POST['saveuser'])) 
    {
        $state = true;

        $name = mysqli_real_escape_string($link, trim($_POST['name']));
        $email = mysqli_real_escape_string($link, trim($_POST['email']));
        $password = mysqli_real_escape_string($link, trim($_POST['password']));
        $phone = mysqli_real_escape_string($link, trim($_POST['phone']));
        $specialization = mysqli_real_escape_string($link, trim($_POST['specialization']));
        $uid = "uid_".substr(bin2hex(random_bytes(10)),0, 10);

        date_default_timezone_set("Asia/Calcutta");
        $date = date("d/m/Y h:i:s A");

        $checkRecord = mysqli_query($link, "SELECT * FROM basv_2023_doctor WHERE email='$email'");

        $totalrows = mysqli_num_rows($checkRecord);

        if ($totalrows > 0) 
        {
            $_SESSION["exists"] = 'yes';
            echo "<script> location.replace('register.php') </script>";
        } 
        else 
        {
            $query = "insert into basv_2023_doctor (uid,name,email,password,phone,specialization) values ('$uid','$name','$email','$password','$phone','$specialization')";

            if (!mysqli_query($link, $query)) 
            {
                $state = false;
            }

            if ($state) 
            {
                $_SESSION["save"] = "yes";
                echo "<script> location.replace('register.php') </script>";
            } 
            else 
            {
                $_SESSION["fail"] = "yes";
                echo "<script> location.replace('register.php') </script>";
            }
        }
    } 
    else 
    {
        echo "<script> location.replace('register.php') </script>";
    }

    mysqli_close($link);
}
