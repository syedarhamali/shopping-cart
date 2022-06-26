
<?php
include("../db.php");

$f= $_GET["id"];

$a=mysqli_query($con,"DELETE FROM `products` WHERE product_id='$f'");
if($a){
    echo'run';
}
else{
    echo'no run';
}
header("Location:productlist.php");


?>
