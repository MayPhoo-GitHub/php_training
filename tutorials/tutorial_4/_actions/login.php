<?php
session_start();
 $email = $_POST['email'];
 $password = $_POST['password'];

 if ($email === 'mayphoowai@gmail.com'and $password ==='mpw123'){
   $_SESSION['user']=['username'=>'May Phoo Wai'];
   header('location: ../profile.php');
 }else {
   header ('location: ../index.php?incorrect=1');
 }
 ?>