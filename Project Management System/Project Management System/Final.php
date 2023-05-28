<?php

session_start();
$save = $_SESSION['slogin'];



include("Config.php");


$redirect = "SELECT `flag` from `submission` where `Id` = '$save'";
$execute = mysqli_query($conn, $redirect);
$count = mysqli_num_rows($execute);

if ($count > 0) {
    foreach ($execute as $result) {
        $flagVal = $result['flag'];
        // echo "<script>alert('$flagVal');</script>";
        if ($flagVal == 0) {
            echo "<script>document.location = 'Submission.php'</script>";
        } else if ($flagVal == 1) {
            echo "<script>document.location = 'Congratulation.php'</script>";
        } else {
            echo "<script>alert('Your documentation got rejected')</script>";
            $update = "DELETE from `submission` where `Id` = '$save'";
            $run = mysqli_query($conn, $update);
            echo "<script>document.location = 'Submission.php'</script>";
        }
    }


} else {
    echo "<script>document.location = 'Submission.php'</script>";
}



?>