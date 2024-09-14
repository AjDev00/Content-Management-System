<?php
require_once "includes/config.inc.php";
require_once "views/forgot_pwd_view.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4 mt-5">
                <form action="includes/forgot_pwd.inc.php" method="POST">
                    <!-- verify email form. -->
                    <input type="text" class = "form-control" name= "verify_email" placeholder = "Enter Your Email" autocomplete = "off">

                    <!-- change password form. -->
                    <input type="password" class = "form-control" name= "new_pwd" placeholder = "Enter Your New Password">
                    <input type="password" class = "form-control" name= "confirm_pwd" placeholder = "Confirm Your New Password">
                    <button style = "font-size: 10px; margin-left:130px;" class = "btn btn-primary mt-3">Continue</button><br>
                    <?php
                        $forgotpwdview = new Forgotpwdview();
                        echo "<p>" . $forgotpwdview -> displayError() . "</p>";
                    ?>
                </form>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
    <style>
        p{
            margin-left: 90px;
            margin-top: 30px;
            font-weight: bold;
        }
    </style>
</body>
</html>