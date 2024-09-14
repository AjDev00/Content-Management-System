<?php
    require_once "includes/config.inc.php";
    require_once "views/signup_view.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Management System</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script> 
        $(document).ready(function(){
            $("#flip").click(function(){
                $("#panel").slideToggle("slow");
            });
        });
    </script>
</head>
<body class = "fullbody">
    <div class="container cont">
        <div class="row">
            <div class="col-md-4">
                <h6 class = "text-light mt-4 fs-5 text-decoration-underline">CONTENT MANAGEMENT SYSTEM</h6>
                <?php
                    $signupview = new Signupview();
                    echo "<p>" . $signupview -> displayError() . "</p>";
                ?>
            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4 mt-4 ">
                <p class = "text-light">Don't have an account? SignUp now!
                    <button class = "btn btn-secondary" id = "flip">
                        <svg class = "text-light" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4.854 14.854a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V3.5A2.5 2.5 0 0 1 6.5 1h8a.5.5 0 0 1 0 1h-8A1.5 1.5 0 0 0 5 3.5v9.793l3.146-3.147a.5.5 0 0 1 .708.708z"/>
                        </svg>
                    </button>
                </p>
                <form action="includes/signup.inc.php" method = "POST" id= "panel" style = "">
                    <input type="text" class = form-control name = "username" placeholder = "Username" autocomplete = "off"><br>
                    <input type="password" class = form-control name = "pwd" placeholder = "Password"><br>
                    <input type="text" class = form-control name = "email" placeholder = "Email" autocomplete = "off"><br>
                    <select name="content" class = "form-control">
                        <option value="">What Content Would You Be Posting?</option>
                        <option value="music">Music</option>
                        <option value="sports">Sports</option>
                        <option value="politics">Politics</option>
                        <option value="finance">Finance</option>
                        <option value="fashion">Fashion</option>
                        <option value="healthcare">Healthcare</option>
                    </select><br>
                    <input type="text" class = form-control name = "phonenumber" placeholder = "PhoneNumber" autocomplete = "off"><br>
                    <button class ="btn btn-primary">REGISTER</button>
                    <button class ="btn btn-secondary btnlogin float-end"><a href = "login.php" class = "text-light text-decoration-none">LOGIN</a></button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>