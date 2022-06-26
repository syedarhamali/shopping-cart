
<?php
include("../db.php");

$f= $_GET["id"];

$a=mysqli_query($con,"DELETE FROM orders_info WHERE order_id='$f'");
if($a){
    header("Location:orders.php");
}
else{
    echo'no run';
}



?>
