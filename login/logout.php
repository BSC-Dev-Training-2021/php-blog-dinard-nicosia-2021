<?php
    session_start();
    if(isset($_SESSION['email'])){
        unset($_SESSION['email']);
    }
    if(isset($_SESSION['admin'])){
        unset($_SESSION['admin']);
    }
    header("Location:../login/login.php");
?>