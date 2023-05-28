<?php

session_start();
$save = $_SESSION['slogin'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission page of Project Mangement System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
</head>

<body>

    <!-- ------------------------NAVBAR--------------------------- -->
    <div class="container my-2">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="Index.php">Project Management System</a>
            </div>

            <div class="float-end"><a href="Studentlogin.php"><button type="button"
                        class="btn btn-danger">Logout</button></a></div>
            <br>
        </nav>

        <!-- ------------------------------CONTENT OF DEFINITION PAGE------------------------------ -->
        <div class="d-flex justify-content-center align-items-center my-5">
            <p class="text-center fs-1 my-5">WELCOME TO<br />PROJECT MANAGEMENT SYSTEM</p>
        </div>
        <p class="text-center fs-3">SUBMISSION</p>


        <div class="d-flex justify-content-center align-items-center">

            <form enctype="multipart/form-data" method="post">
                <div class="mb-3">
                    <label class="text-center fs-5">DOCUMENTATION SUBMISSION</label><br />
                    <input type="url" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        style="width: 400px" autocomplete="off" name="docurl" required /><br />
                    <label class="fs-5">PRESENTATION SUBMISSION</label><br />
                    <input type="url" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        style="width: 400px" autocomplete="off" name="ppturl" accept=".ppt,.pptx" /><br />
                    <label class="fs-5">PROJECT SUBMISSION</label><br />
                    <input type="url" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        style="width: 400px" autocomplete="off" name="finalurl" accept=".php,.html,.css,.aspx" /><br />

                    <input type="submit" class="btn btn-primary my-3" name="submit" style="margin: auto; display: block"
                        id="one" value="Upload" />

                </div>
            </form>
        </div>


</body>

</html>


<?php

include('Config.php');
$redirect = "SELECT flag from `submission` where `Id` = '$save'";
        $execute = mysqli_query($conn, $redirect);
        $count = mysqli_num_rows($execute);
        if ($count > 0) {
            foreach ($execute as $result) {

                $flag = $result['flag'];
                // echo "<script>alert('$flag');</script>";


                if ($flag == 1) {
                    echo "<script>document.location = 'Congratulation.php'</script>";
                } 
                 else if($flag == -1) {
                    echo "<script>alert('Your documentation got rejected')</script>";
                    $update = "DELETE from `submission` where `Id` = '$save'";
                    $run = mysqli_query($conn, $update);
                    echo "<script>document.location = 'Submission.php'</script>";
                }
            }
        }


if (isset($_POST['submit'])) {


    $doclink = $_POST['docurl'];
    $pptlink = $_POST['ppturl'];
    $finallink = $_POST['finalurl'];




    $test = "SELECT `doclink`, `pptlink`, `projectlink` from `submission` where `Id` = '$save'";
    $run = mysqli_query($conn, $test);
    $count = mysqli_num_rows($run);
    if ($count > 0) {
        echo "<script>alert('File had already submitted by this Id');</script>";
        

    }

     else {

        $query = "INSERT INTO `submission`(`Id`, `doclink`, `pptlink`, `projectlink`, `flag`) VALUES ('$save','$doclink','$pptlink','$finallink','0')";
        $ins = mysqli_query($conn, $query);
        echo "<script>alert('Your file have submitted successfully please wait for faculty approval');</script>";



    }
}

  









mysqli_close($conn);
?>