<?php

require "../config/database.php";

session_start();


if (!isset($_SESSION["doctor"])) {
    echo "<script> location.replace('index.php') </script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Doctor</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
</head>

<body>

    <div class="d-flex flex-column bg-white min-vh-100">

        <nav class="navbar navbar-expand-lg border-bottom">
            <div class="container-fluid my-1 mx-5">
                <a class="navbar-brand text-primary-emphasis fw-bold fs-4" href="#">BASV</a>
                <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-1">
                        <li class="nav-item">
                            <a class="nav-link text-primary-emphasis fw-bold text-decoration-underline tug-2 active" aria-current="page" href="dashboard.php"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link text-primary-emphasis fw-bold " href="appointments.php"><i class="fa-regular fa-calendar-check "></i> Appointments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary-emphasis fw-bold" href="prescriptions.php"> <i class="fa-solid fa-prescription"></i> Prescriptions</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link text-primary-emphasis fw-bold" href="logout.php"> <i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        

        <?php
        if (isset($_SESSION["fail"])) {
        ?>
            <div class="position-fixed top-0 toastae start-50 translate-middle-x p-3" style="z-index: 11">
                <div id="liveToast" class="toast bg-danger bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body ms-auto text-white">
                            Login Failed !
                        </div>
                        <button type="button" class="btn-close shadow-none btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>

        <?php
        }
        unset($_SESSION["fail"]);
        ?>




        <div class="container-fluid flex-fill d-flex flex-column">
            <div class="row mt-5 g-3 justify-content-evenly">
                <div class="col-md-3">
                    <div class="card" role="button">
                        <div class="card-body p-4">
                           <div class="row">
                            <div class="col-md-4">
                            <div style="height: 60px; width: 60px;" class="d-flex align-items-center bg-info-subtle justify-content-center rounded-circle">
                                <i class="fa-regular fa-calendar-check fa-xl text-info"></i>
                            </div>
                            </div>
                            <div class="col-md-8 d-flex flex-column justify-content-center">
                                <div class="fs-5 fw-bold text-start">10</div>
                                <div class="fs-5 text-secondary-emphasis">Appointments</div>
                            </div>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" role="button">
                        <div class="card-body p-4">
                           <div class="row">
                            <div class="col-md-4">
                            <div style="height: 60px; width: 60px;" class="d-flex align-items-center bg-info-subtle justify-content-center rounded-circle">
                                <i class="fa-solid fa-prescription fa-xl text-info"></i>
                            </div>
                            </div>
                            <div class="col-md-8 d-flex flex-column justify-content-center">
                                <div class="fs-5 fw-bold text-start">10</div>
                                <div class="fs-5 text-secondary-emphasis">Prescriptions</div>
                            </div>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" role="button">
                        <div class="card-body p-4">
                           <div class="row">
                            <div class="col-md-4">
                            <div style="height: 60px; width: 60px;" class="d-flex align-items-center bg-info-subtle justify-content-center rounded-circle">
                                <i class="fa-regular fa-credit-card fa-xl text-info"></i>
                            </div>
                            </div>
                            <div class="col-md-8 d-flex flex-column justify-content-center">
                                <div class="fs-5 fw-bold text-start">10</div>
                                <div class="fs-5 text-secondary-emphasis">Payments</div>
                            </div>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" role="button">
                        <div class="card-body p-4">
                           <div class="row">
                            <div class="col-md-4">
                            <div style="height: 60px; width: 60px;" class="d-flex align-items-center bg-info-subtle justify-content-center rounded-circle">
                                <i class="fa-solid fa-users fa-xl text-info"></i>
                            </div>
                            </div>
                            <div class="col-md-8 d-flex flex-column justify-content-center">
                                <div class="fs-5 fw-bold text-start">10</div>
                                <div class="fs-5 text-secondary-emphasis">Patients</div>
                            </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>
    
    <script>
        $(function() {

            $('.toast').toast('show');


            $("#userloginform").on("submit", function(e) {
                debugger;

                var email = $("#email").val()
                var password = $("#password").val()
                var testemail = new RegExp("[a-z0-9]+@[a-z]+\.[a-z]{2,3}");
                var testphone = new RegExp("^[6-9][0-9]{9}$");
                var testaadhar = new RegExp("^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$");


                if (email != "") {
                    if (!testemail.test(email)) {
                        $(".alertemail").text("* Enter Valid Email");
                        $("#email").addClass("is-invalid");
                        e.preventDefault();
                    } else {
                        $("#email").removeClass("is-invalid");
                    }
                } else {
                    $(".alertemail").text("* Enter Email");
                    $("#email").addClass("is-invalid");
                    e.preventDefault();
                }


                if (password != "") {
                    $("#password").removeClass("is-invalid");
                } else {
                    $("#password").addClass("is-invalid");
                    e.preventDefault();
                }

            })

            $("input,textarea,select").on("keydown change", function() {
                $(this).removeClass("is-invalid")
            })

        })
    </script>
</body>

</html>