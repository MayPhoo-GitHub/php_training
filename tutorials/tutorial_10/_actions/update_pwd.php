<?php
    if(isset($_POST["pwd"]) && isset($_POST["confirm_pwd"])) {
        session_start();
        if($_POST["pwd"] == $_POST["confirm_pwd"]) {
            $_SESSION["user"]["password"] = $_POST["pwd"];
            header("location: ../index.php");
        } else {
            header("location: reset_pwd.php?pwdFail=1");
        }
    }
?>