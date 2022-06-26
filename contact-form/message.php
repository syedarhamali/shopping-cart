<?php
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);

  if(!empty($email) && !empty($message)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $done = mysqli_query($conn, "INSERT INTO `user`(`name`, `email`,`message`) VALUES ('$name','$email','$message')");
      
  }
?>
