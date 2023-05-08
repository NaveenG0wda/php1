
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer - Manage Jobs</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.css" />
</head>

<body>

    <div class="d-flex flex-column bg-primary-subtle min-vh-100">

        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
            <div class="container-fluid my-1">
                <a class="navbar-brand text-primary-emphasis fw-medium fs-4" href="#">JOB PORTAL</a>
                <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-1">
                        <li class="nav-item">
                            <a class="nav-link text-primary-emphasis text-decoration-underline tug-2 active" aria-current="page" href="managejobs.php">Manage Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="managewalkins.php">Manage Walkins</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="index.php">Employer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        

        <?php
            if (isset($_SESSION["save"])) {
            ?>
                <div class="position-fixed top-0 toastae start-50 translate-middle-x p-3" style="z-index: 11">
                    <div id="liveToast" class="toast bg-success bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body ms-auto text-white">
                            Job Saved Successfully !
                            </div>
                            <button type="button" class="btn-close shadow-none btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
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
                                Job Saving Failed !
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
            if (isset($_SESSION["dsave"])) {
            ?>
                <div class="position-fixed top-0 toastae start-50 translate-middle-x p-3" style="z-index: 11">
                    <div id="liveToast" class="toast bg-success bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body ms-auto text-white">
                                Job Deleted Successfully !
                            </div>
                            <button type="button" class="btn-close shadow-none btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            <?php
            }
            unset($_SESSION["dsave"]);
            ?>

            <?php
            if (isset($_SESSION["dfail"])) {
            ?>
                <div class="position-fixed top-0 toastae start-50 translate-middle-x p-3" style="z-index: 11">
                    <div id="liveToast" class="toast bg-danger bg-opacity-75 hide" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body ms-auto text-white">
                                Job Delete Failed !
                            </div>
                            <button type="button" class="btn-close shadow-none btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            <?php
            }
            unset($_SESSION["dfail"]);
            ?>


        <div class="container-fluid py-2 bg-primary shadow-sm"></div>

        <div class="container-fluid my-4">
            <div class="container-fluid">
                <div class="row bg-white border-primary-subtle border border-1-5 rounded-2">
                    <div class="col-md-12">

                        <h5 class="gap-2 d-flex my-3 rounded-2 p-3 align-items-center bg-primary-subtle text-primary-emphasis">
                            <i class="fa-solid fa-bars"></i> Add Job
                        </h5>

                        <form action="deletejob.php" method="post" id="deletejobform"></form>

                        <form action="savejob.php" method="post" id="savejobform">

                            <div class="row justify-content-evenly g-3 mt-2">
                                <div class="col-md-5">
                                    <div class="my-1 position-relative">
                                        <label for="company" class="form-label">Company :</label>
                                        <input type="text" name="company" id="company" placeholder="Company" value="<?=$_SESSION["company"]?>" class="form-control py-2 shadow-none" readonly>
                                        <div class="invalid-tooltip rounded-3">
                                            * Enter Company
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="my-1 position-relative">
                                        <label for="title" class="form-label">Job Title :</label>
                                        <input type="text" name="title" id="title" placeholder="Job Title" class="form-control py-2 shadow-none">
                                        <div class="invalid-tooltip rounded-3">
                                            * Enter Job Title
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="my-1 position-relative">
                                        <label for="vacancy" class="form-label">Job Vacancy :</label>
                                        <input type="number" min="1" name="vacancy" id="vacancy" placeholder="Job Vacancy" class="form-control py-2 shadow-none">
                                        <div class="invalid-tooltip rounded-3">
                                            * Enter Job Vacancy
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="my-1 position-relative">
                                        <label for="qualification" class="form-label">Qualification:</label>
                                        <textarea type="text" class="form-control border shadow-none qualification" name="qualification" id="qualification"  rows="1" placeholder="Enter Qualification"></textarea>
                                        <div class="invalid-tooltip rounded-3">
                                            * Enter Qualification
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="my-1 position-relative">
                                        <label for="salary" class="form-label">Salary :</label>
                                        <input type="number" min="1" max="1000000" name="salary" id="salary" placeholder="Salary" class="form-control py-2 shadow-none">
                                        <div class="invalid-tooltip rounded-3">
                                            * Enter Salary
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="my-1 position-relative">
                                        <label for="description" class="form-label">Description :</label>
                                        <textarea rows="1" name="description" id="description" placeholder="Description" class="form-control py-2 shadow-none"></textarea>
                                        <div class="invalid-tooltip rounded-3">
                                            * Enter Description
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-evenly g-3 my-2">
                                <div class="col-md-5">
                                    <div class="my-1 position-relative">
                                        <button type="reset" id="resetbut" class="shadow-none btn btn-danger w-100">Reset</button>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="my-1 position-relative">
                                        <button type="submit" name="savejob" class="shadow-none btn btn-primary w-100">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                        
                        <h5 class="gap-2 d-flex mt-5 mb-4 rounded-2 p-3 align-items-center bg-primary-subtle text-primary-emphasis">
                            <i class="fa-solid fa-bars"></i> My Jobs
                        </h5>

                        <div class="row justify-content-center mb-3">
                            <div class="col-md-11">
                                <div class="table-responsive rounded-1">
                                        <table class="table table-bordered caption-top">
                                            <thead class="table-primary">
                                                <tr class="align-middle text-nowrap">
                                                    <th>Company</th>
                                                    <th>Job Title</th>
                                                    <th>Job Vacancy</th>
                                                    <th>Qualification</th>
                                                    <th>Salary</th>
                                                    <th>Description</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = "select * from jobportal_2023_jobs";
                                                $result = mysqli_query($link, $query);
                                                while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                    <tr class="align-middle text-nowrap">
                                                        <td><?= $row["company"] ?></td>
                                                        <td><?= $row["title"] ?></td>
                                                        <td><?= $row["vacancy"] ?></td>
                                                        <td><?= $row["qualification"] ?></td>
                                                        <td><?= $row["salary"] ?></td>
                                                        <td><?= $row["description"] ?></td>
                                                        <td>
                                                            <div class="form-group">
                                                                <button class="btn btn-danger btn-sm delete text-white shadow-none" id="butdel" name="butdel" form="deletejobform" value="<?= $row["uid"] ?>">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
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
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>

    <script>
        var inputElm = document.querySelectorAll('.qualification');

        inputElm.forEach(function(value) {
            // console.log(this)
            tagify = new Tagify(value, {
                whitelist: ["M.Sc.", "B.Sc.", "MCA", "BCA", "MBA", "M.A", "B.A", "B.Tech", "M.Tech", "B.E", "M.E", "BBA", "M.Com", "B.Ed", "LL.M."],
                maxTags: 5,
                dropdown: {
                    maxItems: 10,
                    // classname: "tags-look", 
                    enabled: 0,
                    closeOnSelect: false
                }
            })
        })
    </script>

    <script>
        $(function() {

            $('.toast').toast('show');

            $('.table').DataTable();

            $("#savejobform").on("submit", function(e) {
                debugger;

                var company = $("#company").val()
                var title = $("#title").val()
                var vacancy = $("#vacancy").val()
                var qualification = $("#qualification").val()
                var salary = $("#salary").val()
                var description = $("#description").val()
                var testemail = new RegExp("[a-z0-9]+@[a-z]+\.[a-z]{2,3}");
                var testphone = new RegExp("^[6-9][0-9]{9}$");
                var testaadhar = new RegExp("^[2-9]{1}[0-9]{3}[0-9]{4}[0-9]{4}$");


                if (company != "") {
                    $("#company").removeClass("is-invalid");
                } else {
                    $("#company").addClass("is-invalid");
                    e.preventDefault();
                }

                if (title != "") {
                    $("#title").removeClass("is-invalid");
                } else {
                    $("#title").addClass("is-invalid");
                    e.preventDefault();
                }

                if (vacancy != "") {
                    $("#vacancy").removeClass("is-invalid");
                } else {
                    $("#vacancy").addClass("is-invalid");
                    e.preventDefault();
                }

                if (qualification != "") {
                    $(".qualification").removeClass("is-invalid border border-danger");
                } else {
                    $(".qualification").addClass("is-invalid border border-danger");
                    e.preventDefault();
                }

                if (salary != "") {
                    $("#salary").removeClass("is-invalid");
                } else {
                    $("#salary").addClass("is-invalid");
                    e.preventDefault();
                }

                if (description != "") {
                    $("#description").removeClass("is-invalid");
                } else {
                    $("#description").addClass("is-invalid");
                    e.preventDefault();
                }

            })

            $("#resetbut").on("click", function() {

                $("input,textarea,select,tags").removeClass("is-invalid border-danger")
                $("textarea").css("height", "auto");

            })



            $("input,textarea,select,tags").on("keydown change input", function() {
                $(this).removeClass("is-invalid")
                $(".qualification").removeClass("is-invalid border-danger")
            })


        })
    </script>

</body>

</html>