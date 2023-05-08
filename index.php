<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.css">
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
                            <a class="nav-link text-decoration-underline tug-2 active text-primary-emphasis fw-bold" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary-emphasis fw-bold" href="patient/index.php">Patient</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary-emphasis fw-bold" href="doctor/index.php">Doctor</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link text-primary-emphasis fw-bold" href="hospital/index.php">Hospital</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary-emphasis fw-bold" href="emergency/index.php">Emergency</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary-emphasis fw-bold" href="pharamcy/index.php">Pharamcy</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid flex-fill d-flex">
            <div class="row ">
                <div class="col-md-6 d-flex align-items-center">
                 <div class="display-4 text-center fw-normal text-primary-emphasis">
                    Bharath Arogya Sugama Vyavastha
                 </div>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <img src="images/hero.jpg" alt="hero" class="img-fluid">
                </div>
            </div>
        </div>


    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>