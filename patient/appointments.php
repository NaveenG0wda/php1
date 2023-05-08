<?php

require "../config/database.php";

session_start();


if (!isset($_SESSION["patient"])) {
    echo "<script> location.replace('index.php') </script>";
}

$queryp = "select * from basv_2023_patient where email = '".$_SESSION["patient"]."'";
$resultp = mysqli_query($link, $queryp);
$rowp = mysqli_fetch_array($resultp);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Patient</title>
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
                            <a class="nav-link text-primary-emphasis fw-bold " aria-current="page" href="dashboard.php"><i class="fa-solid fa-chart-line"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary-emphasis fw-bold text-decoration-underline tug-2 active" href="appointments.php"><i class="fa-regular fa-calendar-check "></i> Appointments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary-emphasis fw-bold" href="prescriptions.php"> <i class="fa-solid fa-prescription"></i> Prescriptions</a>
                        </li>
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


<?php
                if (isset($_SESSION["save"])) {
                ?>

                    <div class="position-fixed top-0 toastae start-50 translate-middle-x p-3" style="z-index: 11">
                        <div id="liveToast" class="toast bg-success bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                                <div class="toast-body ms-auto text-white">
                                    Appointment Added Successfully !
                                </div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>

                <?php
                }
                unset($_SESSION["save"]);
                ?>


                <?php
                if (isset($_SESSION["fail"])) {
                ?>

                    <div class="position-fixed top-0 toastae start-50 translate-middle-x p-3" style="z-index: 11">
                        <div id="liveToast" class="toast bg-danger bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                                <div class="toast-body ms-auto text-white">
                                Appointment Saving Failed !
                                </div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>

                <?php
                }
                unset($_SESSION["fail"]);
                ?>



<?php
                if (isset($_SESSION["exists"])) {
                ?>

                    <div class="position-fixed top-0 toastae start-50 translate-middle-x p-3" style="z-index: 11">
                        <div id="liveToast" class="toast bg-warning bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                                <div class="toast-body ms-auto text-white">
                                    Appointment Already Exists  !
                                </div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>

                <?php
                }
                unset($_SESSION["exists"]);
                ?>




        <div class="container flex-fill d-flex flex-column my-2">
            
        <form method="post" action="saveappointment.php" id="saveappointmentform">
            <div class="d-flex mt-5 gap-3">
                <h4 class="text-primary-emphasis tug-1 text-decoration-underline flex-grow-1 flex-md-grow-0">
                    Add Appointment For:
                </h4>
                <div class="d-flex justify-content-center align-items-center flex-grow-1 flex-md-grow-0 position-relative">
                    <input type="date" name="date" id="date" class="form-control shadow-none border border-secondary" min="<?= date('Y-m-d',strtotime("+1days")) ?>">
                    <div class="invalid-tooltip rounded-3 ">
                        * Select Date
                    </div>
                </div>
            </div>
            <div class="row mt-3 g-3 justify-content-between">
                <div class="col-md-4 position-relative">
                    <label for="name" class="form-label">Name :</label>
                    <input type="text" name="name" id="name" placeholder="Name" class="form-control shadow-none border border-secondary text-capitalize bg-secondary-subtle" value="<?= $rowp["name"] ?>" readonly>
                    <div class="invalid-tooltip rounded-3">
                        * Enter Name
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="email" class="form-label">Email :</label>
                    <input type="text" name="email" id="email" placeholder="E-mail" class="form-control shadow-none border border-secondary bg-secondary-subtle" value="<?= $rowp["email"] ?>" readonly>
                    <div class="invalid-tooltip rounded-3 alertemail">
                        * Enter Valid Email
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="phone" class="form-label">Phone :</label>
                    <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control shadow-none border border-secondary bg-secondary-subtle" value="<?= $rowp["phone"] ?>" readonly>
                    <div class="invalid-tooltip rounded-3 alertphone">
                        * Enter Valid Phone
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="age" class="form-label">Age :</label>
                    <input type="number" name="age" id="age" min="1" max="100" placeholder="Age" class="form-control shadow-none border border-secondary bg-secondary-subtle" value="<?= $rowp["age"] ?>" readonly>
                    <div class="invalid-tooltip rounded-3 ">
                        * Select Age
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="gender" class="form-label">Gender :</label>
                    <input type="text" name="gender" id="gender" placeholder="Gender" class="form-control shadow-none border border-secondary text-capitalize bg-secondary-subtle" value="<?= $rowp["gender"] ?>" readonly>
                    <div class="invalid-tooltip rounded-3 ">
                        * Select Gender
                    </div>
                </div>
                <div class="col-md-4 position-relative">
                    <label for="doctor" class="form-label">Doctor :</label>
                    <select name="doctor" id="doctor" class="form-select shadow-none text-capitalize border border-secondary">
                                <option value="">Select Doctor</option>

                                <optgroup label="pediatrics">
                                    <?php
                                    $query = "select * from basv_2023_doctor where specialization = 'pediatrics'";
                                    $result = mysqli_query($link, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <option value="<?= $row["email"] ?>"><?= $row["name"] ?></option>
                                    <?php
                                    }
                                    ?>

                                </optgroup>

                                <optgroup label="orthopedics">

                                    <?php
                                    $query = "select * from basv_2023_doctor where specialization = 'orthopedics'";
                                    $result = mysqli_query($link, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <option value="<?= $row["email"] ?>"><?= $row["name"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </optgroup>

                                <optgroup label="dermatology">

                                    <?php
                                    $query = "select * from basv_2023_doctor where specialization = 'dermatology'";
                                    $result = mysqli_query($link, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <option value="<?= $row["email"] ?>"><?= $row["name"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </optgroup>

                                <optgroup label="neurology">

                                    <?php
                                    $query = "select * from basv_2023_doctor where specialization = 'neurology'";
                                    $result = mysqli_query($link, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <option value="<?= $row["email"] ?>"><?= $row["name"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </optgroup>

                                <optgroup label="cardiology">

                                    <?php
                                    $query = "select * from basv_2023_doctor where specialization = 'cardiology'";
                                    $result = mysqli_query($link, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <option value="<?= $row["email"] ?>"><?= $row["name"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </optgroup>

                                <optgroup label="urology">

                                    <?php
                                    $query = "select * from basv_2023_doctor where specialization = 'urology'";
                                    $result = mysqli_query($link, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <option value="<?= $row["email"] ?>"><?= $row["name"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </optgroup>

                                <optgroup label="gynaecology">
                                    <?php
                                    $query = "select * from basv_2023_doctor where specialization = 'gynaecology'";
                                    $result = mysqli_query($link, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <option value="<?= $row["email"] ?>"><?= $row["name"] ?></option>
                                    <?php
                                    }
                                    ?>

                                </optgroup>

                                <optgroup label="rheumatology">

                                    <?php
                                    $query = "select * from basv_2023_doctor where specialization = 'rheumatology'";
                                    $result = mysqli_query($link, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <option value="<?= $row["email"] ?>"><?= $row["name"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </optgroup>


                                <optgroup label="endocrinology">
                                    <?php
                                    $query = "select * from basv_2023_doctor where specialization = 'endocrinology'";
                                    $result = mysqli_query($link, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <option value="<?= $row["email"] ?>"><?= $row["name"] ?></option>
                                    <?php
                                    }
                                    ?>
                                </optgroup>
                            </select>
                    <div class="invalid-tooltip rounded-3 ">
                        * Select Doctor
                    </div>
                </div>
                <div class="col-md-12 position-relative">
                    <label for="problem" class="form-label">Problem :</label>
                    <textarea  name="problem" id="problem" placeholder="Problem" class="form-control shadow-none border border-secondary"></textarea>
                    <div class="invalid-tooltip rounded-3">
                        * Enter Problem
                    </div>
                </div>
                <div class="col-md-12 position-relative gap-3 mt-4 d-flex">
                    <button type="reset" id="reset" class="btn btn-danger shadow-none">Reset</button>
                    <button type="submit" name="saveappointment" class="btn btn-primary shadow-none">Save Appointment</button>
                </div>
            </div>
        </form>
        </div>


    </div>

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>

    <script>
        $(function() {

            $('.toast').toast('show');


            $("#saveappointmentform").on("submit", function(e) {
                debugger;

                var email = $("#email").val()
                var date = $("#date").val()
                var name = $("#name").val()
                var phone = $("#phone").val()
                var age = $("#age").val()
                var gender = $("#gender").val()
                var doctor = $("#doctor").val()
                var problem = $("#problem").val()
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


                if (date != "") {
                    $("#date").removeClass("is-invalid");
                } else {
                    $("#date").addClass("is-invalid");
                    e.preventDefault();
                }

                if (doctor != "") {
                    $("#doctor").removeClass("is-invalid");
                } else {
                    $("#doctor").addClass("is-invalid");
                    e.preventDefault();
                }

                if (problem != "") {
                    $("#problem").removeClass("is-invalid");
                } else {
                    $("#problem").addClass("is-invalid");
                    e.preventDefault();
                }

            })

            $("input,textarea,select").on("keydown change", function() {
                $(this).removeClass("is-invalid")
            })

            $("#reset").on("click", function() {
                $("input,textarea,select").removeClass("is-invalid")
            })
            
            $("textarea").on('input focus', function() {
                this.style.height = 'auto';

                this.style.height =
                    (this.scrollHeight) + 'px';
            });

        })
    </script>
</body>

</html>