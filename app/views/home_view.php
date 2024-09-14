<?php
declare(strict_types = 1);
//require_once "viewcomments.php";

class Homeview{
    public function displayError(){
        if(isset($_SESSION["error_inserting_posts"])){
            $errors = $_SESSION["error_inserting_posts"];

            foreach($errors as $error){
                echo "<br>";
                echo "<p>" . $error . "</p>";
            }

            unset($_SESSION["error_inserting_posts"]);
        }
    }

    public function displayPosts(){
        if(isset($_SESSION["display"])){
            $display = $_SESSION["display"];

            foreach($display as $dis){
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
        }
    }
}