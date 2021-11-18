<?php
include_once("../library/lib_handler.php");
$alerts="";
$reg_email = "";
$reg_pass = "";
$re_reg_pass = "";
$reg_email_status = "false";
$reg_pass_status = "false";
$reg_re_pass_status = "false";
if (isset($_POST['reg_bttn'])) {
    if (!isset($_POST['reg_email']) || $_POST['reg_email'] === "") {
        debug_console("set the email first.");
        $login_email = $_POST['reg_email'];
        
    } else {
        debug_console("Email successfully entered.");
        $reg_email_status = "true";
    }

    if (!isset($_POST['reg_pass']) || $_POST['reg_pass'] === "") {
        debug_console("set the password first.");
        
    } else {
        debug_console("password successfully entered.");
        $reg_pass_status = "true";
    }

    if (!isset($_POST['rereg_pass']) || $_POST['rereg_pass'] === "") {
        debug_console("set the re-type password first.");
    } else{
        if($_POST['reg_pass'] === $_POST['rereg_pass'] ){
            $reg_re_pass_status = "true";
            debug_console("password are matched.");
        }else{
            debug_console("not matched");
        }
        debug_console("password successfully entered.");
        
    }
    if (($reg_email_status === "true") && ($reg_pass_status === "true") && ($reg_re_pass_status === "true")) {
        $reg_email = $_POST['reg_email'];
        $reg_pass = password_hash($_POST['reg_pass'], PASSWORD_DEFAULT);
        $user_class->tbl_user_write($reg_email, $reg_pass, $table_user, $db);
        debug_console("the login passed!");
        
    }else{
        debug_console("not all true");
    }
}
?>