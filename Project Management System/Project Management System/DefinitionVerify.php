<!-- <?php

session_start();
$save = $_SESSION['slogin'];
?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Definition page of Project Mangement System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <!-- <style>
        table,
        thead,
        tr,
        tbody,
        th,
        td {
            text-align: center;
        }

        .table td {
            text-align: center;
        }
    </style> -->
</head>

<body>
    <!-- ------------------------NAVBAR--------------------------- -->
    <div class="container my-2">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="Index.php">Project Management System</a>
            </div>

            <div class="float-end"><a href="Facultylogin.php"><button type="button"
                        class="btn btn-danger">Logout</button></a></div>
            <br>
        </nav>

        <!-- ------------------------------CONTENT OF DEFINITION PAGE------------------------------ -->
        <div class="d-flex justify-content-center align-items-center my-5">
            <p class="text-center fs-1 my-5">WELCOME TO<br />PROJECT MANAGEMENT SYSTEM</p>
        </div>
        <form method="post">
            <table class="table table-secondary table-striped table-bordered border-dark table-hover">
                <thead class="table table-dark">
                    <tr>
                        <!-- <th scope="col">#</th> -->
                        <th scope="col">Id</th>
                        <th scope="col">Definition</th>
                        <th scope="col">Status</th>
                        <th scope="col">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('Config.php');
                    $sql = "SELECT * FROM `project`";
                    $result = mysqli_query($conn, $sql);
                    // $count = mysqli_num_rows($result);
                    $run = mysqli_fetch_all($result);
                    $cnt = 1;
                    if (mysqli_num_rows($result) > 0) {
                        foreach ($result as $know) {
                            ?>

                            <tr class="odd gradeX">
                                <!-- <td class="center">
                                    <?php echo htmlentities($cnt); ?>
                                </td> -->
                                <td class="center">
                                    <?php echo htmlentities($know['Id']);?>
                                </td>
                                <td class="center">
                                    <?php echo htmlentities($know['definition']); ?>
                                </td>
                                <td class="center">
                                    <?php if ($know ['flag'] == 0) {
                                        echo htmlentities("Pending");
                                    } else if ($know ['flag'] == 1){
                                        echo htmlentities("Accept");
                                    }

                                    else{
                                        echo htmlentities("Reject");
                                    }

                                    ?>
                                </td>


                                <td class="center">

                                    <?php
                                    if ($know['flag'] == 0) { ?>
                                        <a href="DefinitionVerify.php?id=<?php echo htmlentities($know['Id']);?>"
                                        style="text-decoration:none;"    ><button
                                                type="button" class="btn btn-success" >Accept</button>
                                        
                                                <a href="DefinitionVerify.php?inid=<?php echo htmlentities($know['Id']); ?>"
                                                style="text-decoration:none;" ><button
                                                    type="button" class="btn btn-danger">Reject</button>
                                                    
                                                    
                                    




                                </td>

                            </tr>



                            <?php $cnt = $cnt + 1;
                        }
                    }
                }

                    ?>
                </tbody>
            </table>
        </form>
    </div>






</body>

</html>

<?php

    if (isset($_GET['id'])) {
        include('Config.php');
        $id = $_GET['id'];
        $status = 1;
        $SQL = "UPDATE `project` set `flag` = '$status'  WHERE `Id` = '$id'";
        $query = mysqli_query($conn, $SQL);
        mysqli_close($conn);

    } else {
        if (isset($_GET['inid'])) {
            include('Config.php');
            $id = $_GET['inid'];
            $status = -1;
            $SQL = "UPDATE `project` set `flag` = '$status'  WHERE `Id` = '$id'";
            $query = mysqli_query($conn, $SQL);


            mysqli_close($conn);
        }
    }