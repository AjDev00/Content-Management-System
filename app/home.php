<?php
require_once "includes/config.inc.php";
require_once "views/login_view.php";
require_once "views/home_view.php";
require_once "views/search_view.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script> 
        $(document).ready(function(){
            $("#flip").click(function(){
                $("#test").hide();
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2 mt-4">
                <?php
                    $loginview = new Loginview();
                    echo "<p>" . $loginview -> displayName() . "</p>";
                ?>
                <form action="includes/logout.inc.php" method="POST">
                <button class = "btn1 btn btn-danger">LOGOUT</button>
                </form>
            </div>
            <div class="col-md-5 mt-3">
                <form action="includes/search.inc.php" method="POST">
                    <input type="text" class = "form-control" name = "search" placeholder = "Search for a specific content">
                    <button id = "flip" class = "btn1 btn btn-primary mt-1 float-end">Search</button>
                    <?php
                        $searchview = new Searchview();
                        echo "<p>" . $searchview -> displayError() . "</p>";
                    ?>
                </form>
            </div>
            <div class="col-md-5 mt-3">
                <form action="includes/home.inc.php" method="POST">
                    <input type="text" class = "form-control" name = "posts" placeholder = "Write a <?php $loginview = new Loginview();
                    echo $loginview -> displayContent(); ?> thread...">
                    <button class = "btn1 btn btn-primary float-end mt-1">Add new posts</button>
                </form>
                <?php
                    $homeview = new Homeview();
                    echo "<p>" . $homeview -> displayError() . "</p>";
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center mt-5 mb-3 text-decoration-underline">
                <h6>POSTS</h6>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <?php
                    $searchview = new Searchview();
                    echo "<p>" . $searchview -> displaySearchResults() . "</p>";
                ?>
                <?php
                    echo "<div id = 'test'>";
                    $homeview = new Homeview();
                    echo "<p>" . $homeview -> displayPosts() . "</p>";
                    echo "</div>";
                ?>
            </div>
            <div class="col-md-2">

            </div>
        </div>
    </div>
    <style>
        p{
            font-weight: bold;
        }
        .posts{
            border: 1px solid white;
            border-radius: 20px; 
            padding: 10px; 
            box-shadow: 2px 2px 2px 2px grey;
        }
        .btn1{
            font-size:12px;
        }
    </style>
</body>
</html>