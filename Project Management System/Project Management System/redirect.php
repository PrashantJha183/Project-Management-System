<?php

session_start();
$save = $_SESSION['slogin'];



include("Config.php");


$redirect = "SELECT `flag` from `project` where `Id` = '$save'";
        $execute = mysqli_query($conn, $redirect);
        $count = mysqli_num_rows($execute);

            if ($count > 0) {
                foreach($execute as $result){
                    $flagVal =  $result['flag'];
                    if($flagVal == 0){
                        echo"<script>document.location = 'Definition.php'</script>";
                    }
                    else if($flagVal == 1){
                        echo"<script>document.location = 'Submission.php'</script>";
                    }
                    else{
                        echo"<script>alert('Your definition got rejected')</script>";
                        $update = "DELETE from `project` where `Id` = '$save'";
                        $run = mysqli_query($conn,$update);
                        echo"<script>document.location = 'Definition.php'</script>";
                    }
                }

                
            }


            else{
                echo"<script>document.location = 'Definition.php'</script>";
            }



?>