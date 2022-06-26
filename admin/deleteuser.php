
<?php
include("../db.php");

$f= $_GET["user_id"];

$a=mysqli_query($con,"DELETE FROM `user_info` WHERE user_id='$f'");
if($a){
    echo'run';
}
else{
    echo'no run';
}
header("Location:manageuser.php");


?>
