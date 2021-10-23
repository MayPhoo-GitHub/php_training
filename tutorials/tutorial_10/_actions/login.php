<?php
    session_start();
    $input_email = $_POST['email'];
    $input_password = $_POST['password'];
     //Default email,password
     $email = "mayphoowai14@gmail.com";   
     $password = "mpw123";
 
    //Override password
    if (isset($_SESSION["user"]["password"])) {
        $password = $_SESSION["user"]["password"];
    }
         
    if ($input_email === $email and $input_password === $password) {
        $_SESSION['user'] = ['email'=> $input_email];
        header('location: ../profile.php');
    } else {
        header('location: ../index.php?incorrect=1');
    }

?>
