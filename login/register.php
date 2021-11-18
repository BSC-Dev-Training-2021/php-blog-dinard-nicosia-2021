<?php
require("register-backend.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Squid Game Login</title>
</head>
<body class="body-login">
<div class="right">
<div class="container" style="padding-top: 160px;">
    <h1>REGISTER</h1>
    <?php $alert->display_alert($alerts); ?>
        <form action="register.php" autocomplete="off" method="POST">
        <div class="form-floating mb-3">
                <input type="email" name="reg_email" class="form-control" id="floatingInput" placeholder=""  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Must contain @ / . / com" required>
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="reg_pass" class="form-control" id="floatingInput" placeholder="" title="Must contain Numbers, Uppercase/Lowercase and at least 8 or more characters" required>
                <label for="floatingInput">Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="rereg_pass" class="form-control" id="floatingInput" placeholder="" title="Must contain Numbers, Uppercase/Lowercase and at least 8 or more characters" required>
                <label for="floatingInput">Re-type Password</label>
            </div>
            <div class="button" style="padding-top: 20px;">
                <button type="submit" name="reg_bttn" class="btn btn-warning btn-lg">REGISTER</button>
                <a href="login.php" class="btn btn-primary btn-lg">LOGIN</a>
            </div>
        </form>


    </div>
</div>
<div class="left">

</div>
</body>
</html>