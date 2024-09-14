<?php

declare(strict_types = 1);

class Searchview{
    public function displayError(){
        if(isset($_SESSION["error_search"])){
            $errors = $_SESSION["error_search"];

            foreach($errors as $error){
                echo "<br>";
                echo $error;
            }

            unset($_SESSION["error_search"]);
        }
    }

    public function displaySearchResults(){
        if(isset($_SESSION["display_search"])){
            $displaySearch = $_SESSION["display_search"];

            foreach($displaySearch as $dis){
                echo "<div>";
                echo "<br>";
                echo htmlspecialchars($dis["posts"]);
                echo "<br>";
                echo "<i>" . htmlspecialchars($dis["created_at"]) . "</i>";
                echo "<br>";
                echo "<br>";
                // echo '<style>p{margin-left:200px;}</style>';
                echo "<p>" . htmlspecialchars($dis["user_username"]) . "</p>" . " " .
                '<a href = "views/delete.php?deleteid='.$dis["id"].'" ><button class = "btn2 btn btn-danger">delete</button></a>'. " " .
                '<a href = "views/comment.php?commentid='.$dis["id"].'" ><button class = "btn2 btn btn-secondary">comment</button></a>'. " " .
                '<a href = "views/viewcomments.php?viewcommentsid='.$dis["id"].'" ><button class = "btn2 btn btn-success">view comments</button></a>';
                echo "<label>eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee<label>";
                echo '<style>.btn2{font-size: 12px;} label{color: white; border-bottom:1px solid black;} i{font-size:11px;}</style>';
                echo "</div>";
            }

            //unset($_SESSION["display"]);
        }
    }
}