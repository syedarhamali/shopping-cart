<?php
include("../db.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN LOGIN  </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <style>@font-face{font-family:elmessiri-semibold;src:url(../fonts/el_messiri/ElMessiri-SemiBold.ttf)}@font-face{font-family:montserrat-regular;src:url(../fonts/montserrat/Montserrat-Regular.ttf)}@font-face{font-family:montserrat-semibold;src:url(../fonts/montserrat/Montserrat-SemiBold.ttf)}*{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}body{font-family:montserrat-regular;color:#999;font-size:12px;margin:0}p,h1,h2,h3,h4,h5,h6,ul{margin:0}img{max-width:100%}ul{padding-left:0;margin-bottom:0}a{text-decoration:none;color:#ff9a9c;transition:all .3s ease}a:hover{text-decoration:none;color:#fe4447}:focus{outline:none}.wrapper{min-height:100vh;display:flex;align-items:center;background:url(../images/bg-registration-form-4.jpg) no-repeat;background-size:cover}.inner{max-width:850px;margin:auto;background:#fff;display:flex;box-shadow:0 0 10px 0 rgba(0,0,0,.2);-webkit-box-shadow:0 0 10px 0 rgba(0,0,0,.2);-moz-box-shadow:0 0 10px 0 rgba(0,0,0,.2);-ms-box-shadow:0 0 10px 0 rgba(0,0,0,.2);-o-box-shadow:0 0 10px 0 rgba(0,0,0,.2)}.image-holder{width:50%;padding-right:15px}form{width:50%;padding-top:77px;padding-right:60px;padding-left:15px}h3{font-size:35px;font-family:elmessiri-semibold;text-align:center;margin-bottom:27px;color:#ff9a9c}.form-holder{padding-left:24px;position:relative}.form-holder:before{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;content:"";width:10px;height:10px;border-radius:50%;border:2px solid #ff9a9c;position:absolute;left:1px;top:50%;transform:translateY(-50%)}.form-holder.active:before{border:2px solid transparent;background:#ff9a9c}.form-control{display:block;width:100%;border-radius:23.5px;height:47px;padding:0 24px;color:gray;font-size:13px;border:none;background:#f7f7f7;margin-bottom:25px}.form-control::-webkit-input-placeholder{font-size:13px;color:gray;text-transform:uppercase;font-family:montserrat-regular}.form-control::-moz-placeholder{font-size:13px;color:gray;text-transform:uppercase;font-family:montserrat-regular}.form-control:-ms-input-placeholder{font-size:13px;color:gray;text-transform:uppercase;font-family:montserrat-regular}.form-control:-moz-placeholder{font-size:13px;color:gray;text-transform:uppercase;font-family:montserrat-regular}@-webkit-keyframes hvr-wobble-horizontal{16.65%{-webkit-transform:translateX(8px);transform:translateX(8px)}33.3%{-webkit-transform:translateX(-6px);transform:translateX(-6px)}49.95%{-webkit-transform:translateX(4px);transform:translateX(4px)}66.6%{-webkit-transform:translateX(-2px);transform:translateX(-2px)}83.25%{-webkit-transform:translateX(1px);transform:translateX(1px)}100%{-webkit-transform:translateX(0);transform:translateX(0)}}@keyframes hvr-wobble-horizontal{16.65%{-webkit-transform:translateX(8px);transform:translateX(8px)}33.3%{-webkit-transform:translateX(-6px);transform:translateX(-6px)}49.95%{-webkit-transform:translateX(4px);transform:translateX(4px)}66.6%{-webkit-transform:translateX(-2px);transform:translateX(-2px)}83.25%{-webkit-transform:translateX(1px);transform:translateX(1px)}100%{-webkit-transform:translateX(0);transform:translateX(0)}}.button{letter-spacing:2px;border:none;width:133px;height:47px;margin-right:19px;border-radius:23.5px;cursor:pointer;display:flex;align-items:center;justify-content:center;padding:0;background:#ff9a9c;font-size:15px;color:#fff;text-transform:uppercase;font-family:montserrat-semibold;-webkit-transform:perspective(1px) translateZ(0);transform:perspective(1px) translateZ(0);box-shadow:0 0 1px transparent}.button:hover{-webkit-animation-name:hvr-wobble-horizontal;animation-name:hvr-wobble-horizontal;-webkit-animation-duration:1s;animation-duration:1s;-webkit-animation-timing-function:ease-in-out;animation-timing-function:ease-in-out;-webkit-animation-iteration-count:1;animation-iteration-count:1}.checkbox{position:relative;padding-left:19px;margin-bottom:37px;margin-left:26px}.checkbox label{cursor:pointer;color:#999}.checkbox input{position:absolute;opacity:0;cursor:pointer}.checkbox input:checked~.checkmark:after{display:block}.checkmark{position:absolute;top:2px;left:0;height:10px;width:10px;border-radius:50%;border:1px solid #e7e7e7}.checkmark:after{content:"";top:50%;left:50%;transform:translate(-50%,-50%);width:4px;height:4px;border-radius:50%;background:#ff9a9c;position:absolute;display:none}.form-login{display:flex;align-items:center;margin-left:23px}@media(max-width:767px){.inner{display:block}.image-holder{width:100%;padding-right:0}form{width:100%;padding:0 15px 70px}.wrapper{background:0 0}}</style>

</head>
<body>
<div class="wrapper">
    <div class="inner">
        <div class="image-holder">
            <img src="assets/img/registration-form-4.jpg" alt="">
        </div>
        <form action="" method="post" >
             <h3>Sign In</h3>
             <div class="form-holder">
                    <input type="email" name="email" placeholder="Email Here..." class="form-control" required>
             </div>

            <div class="form-holder">             
                <input type="password" name="pass" class="form-control" placeholder="Password Here..." style="font-size: 15px;" required>
            </div> 

             
            <div class="form-login">
             <input class="button" type="submit" value="Login" name="btn" >
             <!-- <p>Don't Have an account? <a href="register.php">Register</a></p> -->
            </div>
         </form>
                  
    </div>
</body>
</html>

<?php
if(isset($_POST["btn"])){
    
    $email=$_POST["email"];
    $pass=$_POST["pass"];
    

    $query=mysqli_query($con,"SELECT * FROM admin_info WHERE admin_email='$email' &&  admin_password='$pass'");
    
    $check=mysqli_num_rows($query);

    $row=mysqli_fetch_array($query);

    if($check){

        $_SESSION['adminname']=$row[1];
        $_SESSION['id']=$row[0];
        // header("Location:index.php");
        echo'<script> window.location.href="index.php" </script>';
    }
    else{
        echo"<script>swal('Oops!', 'Something went wrong! Login Failed', 'error');</script>";
    }

}

?>