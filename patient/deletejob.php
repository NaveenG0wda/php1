<?php

require "../config/database.php";

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

        $state = true;

        $uid = mysqli_real_escape_string($link, trim($_POST['butdel']));

        $query = "delete from jobportal_2023_jobs where uid = '$uid'";

        if (!mysqli_query($link, $query)) 
        {
            $state = false;
        }

        if ($state) 
        {
            $_SESSION["dsave"] = "yes";
            echo "<script> location.replace('managejobs.php') </script>";
        } 
        else 
        {
            $_SESSION["dfail"] = "yes";
            echo "<script> location.replace('managejobs.php') </script>";
        }

    mysqli_close($link);
}
else 
{
    echo "<script> location.replace('managejobs.php') </script>";
}
