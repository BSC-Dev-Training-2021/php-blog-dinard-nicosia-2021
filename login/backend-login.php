<?php
include_once("../library/lib_handler.php");
session_start();
//login backend
$table = "user_table";
$alerts="";
$login_email = "";
$login_pass = "";
$login_email_status = "false";
$login_pass_status = "false";
$login_pass_matched_status = "false";
if (isset($_POST['login_bttn'])) {
    if (!$_POST['login_email'] === "") {
        debug_console("set the email first.");
        $login_email = $_POST['login_email'];
        $alerts="warning";
    } else {
        $login_email_status = "true";
        debug_console("Email successfully entered.");
    }

    if (!$_POST['login_pass'] === "") {
        $login_pass = $_POST['login_pass'];
        $alerts="warning";
        debug_console("set the password first.");
    } else {
        $login_pass_status = "true";
        debug_console("password successfully entered.");
    }
    
    if (($login_email_status === "true") && ($login_pass_status === "true")) {
        $login_email = $_POST['login_email'];
        $login_pass =  $_POST['login_pass'];
        $mysql = sprintf(
            "SELECT * FROM $table WHERE user_email = '%s'",
            $login_email);
        $result = $db->query($mysql);
        $row = $result->fetch_object();
        if($row != null){
            $hashed = $row->user_password;
            if(password_verify($login_pass, $hashed)){
                $alerts="login";
                $_SESSION['user_id'] = $row->user_id;
                $_SESSION['email'] = $row->user_email;
                $_SESSION['admin'] = $row->user_admin;
                $_SESSION['auth_time'] = time();
                $crt_tbl_class->tbl_cart_no($_SESSION['user_id'], $table_crt, $db);
                header("Location:../shopping/item.php");
                debug_console("success login...");
            }else{
                $alerts="pass";
                debug_console("password not matched");
                
            }
        }else{
            $alerts="email";
            debug_console("the user are not existed $login_email");
            
        }
        //tbl_pass_matched($login_email, $login_pass, $table, $db);
        debug_console("the validation passed!");
    }
}
if (isset($_POST['update_bttn'])) {
    header("Location: register.php");
    die();
}
// register backend
?>

