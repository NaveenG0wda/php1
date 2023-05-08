<?php

session_start();
require "../config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if (isset($_POST['saveappointment'])) 
    {
        $state = true;

        $name = mysqli_real_escape_string($link, trim($_POST['name']));
        $email = mysqli_real_escape_string($link, trim($_POST['email']));
        $phone = mysqli_real_escape_string($link, trim($_POST['phone']));
        $age = mysqli_real_escape_string($link, trim($_POST['age']));
        $gender = mysqli_real_escape_string($link, trim($_POST['gender']));
        $date = mysqli_real_escape_string($link, trim($_POST['date']));
        $doctor = mysqli_real_escape_string($link, trim($_POST['doctor']));
        $problem = mysqli_real_escape_string($link, trim($_POST['problem']));
        $uid = "uid_".substr(bin2hex(random_bytes(10)),0, 10);

        // date_default_timezone_set("Asia/Calcutta");
        // $date = date("d/m/Y h:i:s A");

        $checkRecord = mysqli_query($link, "SELECT * FROM basv_2023_appointment WHERE email='$email' and date='$date' and doctor='$doctor'");

        $totalrows = mysqli_num_rows($checkRecord);

        if ($totalrows > 0) 
        {
            $_SESSION["exists"] = 'yes';
            echo "<script> location.replace('appointments.php') </script>";
        } 
        else 
        {
            $query = "insert into basv_2023_appointment (uid,name,email,phone,gender,age,doctor,date,problem,status) values ('$uid','$name','$email','$phone','$gender','$age','$doctor','$date','$problem','pending')";

            if (!mysqli_query($link, $query)) 
            {
                $state = false;
            }

            if ($state) 
            {
                $_SESSION["save"] = "yes";
                echo "<script> location.replace('appointments.php') </script>";
            } 
            else 
            {
                $_SESSION["fail"] = "yes";
                echo "<script> location.replace('appointments.php') </script>";
            }
        }
    } 
    else 
    {
        echo "<script> location.replace('appointments.php') </script>";
    }

    mysqli_close($link);
}
