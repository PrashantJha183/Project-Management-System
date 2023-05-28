<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
</head>

<body>
    <!-- ----------------------------------NAVBAR--------------------------------- -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-secondary bg-gradient">
        <div class="container">
            <a class="navbar-brand" href="Index.php">Project Management System</a>
        </div>
    </nav>


    <!-- -------------------- ------------------OPTIONS OF NAVBAR------------------------------------------- -->
    <div class="container my-1">
        <div class="right-div">
            <ul class="nav justify-content-end bg-light bg-gradient">
                <!-- <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="Adminlogin.php">Admin login</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="Studentlogin.php">Student login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Facultylogin.php">Faculty login</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="d-flex justify-content-center align-items-center my-5">
        <p class="text-center fs-1 my-3">FACULTY LOGIN</p>
    </div>



    <!-- -------------------------------FACULTY LOGIN FORM------------------------------------------ -->
    <div class="d-flex justify-content-center align-items-center my-5">
        <span class="border border-secondary border-2 rounded bg-light bg-gradient">
            <form method="post" class="my-5 mx-5">
                <p class="text-center fs-4">LOGIN FORM</p>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="tel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        style="width: 400px;" max="10" autocomplete="off" name="uname" required />
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" style="width: 400px"
                        autocomplete="off" name="pass" required />
                </div>
                <input type="submit" class="btn btn-primary" style="margin: auto; display: block" name="click" value="Login"/><br/>
            </form>
        </span>
    </div>
</body>

</html>


<?php

error_reporting(0);
include('Config.php');
if ($_SESSION['flogin'] != '') {
    $_SESSION['flogin'] = '';
}

if (isset($_REQUEST['click'])) {
    $username = $_REQUEST['uname'];
    $password = $_REQUEST['pass'];
    $query = "SELECT * FROM `faculty` where `Id` = '$username' AND `Password` = '$password'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {

        $_SESSION['flogin'] = $_POST['username'];
        echo "<script>alert('Login successfully')</script>";
        echo "<script type='text/javascript'> document.location ='Selection.php'; </script>";

    } else {
        echo "<script>alert('Invalid login credentials')</script>";

    }

    // echo '
    // <a href="DefinitionVerify.php"><button type="button" class="btn btn-success">Definition Selection</button></a>
    // <a href="SubmissionVerify.php"><button type="button" class="btn btn-danger">Verification</button></a>';


}

mysqli_close($conn);

?>