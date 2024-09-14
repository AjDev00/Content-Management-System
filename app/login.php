<?php
    require_once "includes/config.inc.php";
    require_once "views/login_view.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login CMS</title>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4 mt-5" style = "border: 1px solid white; border-radius: 20px; padding: 20px; box-shadow: 2px 2px 2px 2px grey;">
                <form action="includes/login.inc.php" method="POST">
                    <input type="text" class = form-control name = "username" placeholder = "Username" autocomplete = "off">
                    <input type="password" class = form-control name = "pwd" placeholder = "Password"><br>
                    <a class = "text-dark text-decoration-none" href = "forgot_password.php">Forgot Password ?</a><button class = "btn btn-secondary float-end">LOGIN</button>
                </form>
            </div>
        </div>
        <?php
            $loginview = new Loginview();
            echo "<p>" . $loginview -> displayError() . "</p>";
        ?>
    </div>
    <style>
        p{
            margin-left: 27em;
            margin-top: 30px;
            font-weight: bold;
        }
    </style>
</body>
</html>