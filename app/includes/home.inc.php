<?php

declare(strict_types = 1);

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $posts = $_POST["posts"];

    try{
        require_once "../Classes/dbh.php";
        require_once "../Classes/home_model.php";
        require_once "../Classes/home_contr.php";

        $homemodel = new Homemodel($posts);
        $homecontrol = new Homecontrol($posts);

        $errors = [];

        if($homecontrol -> isInputEmpty($posts)){
            $errors["empty_input"] = "Say something.";
        }

        require_once "config.inc.php";

        if($errors){
            $_SESSION["error_inserting_posts"] = $errors;

            header("Location: ../home.php");
            die();
        }

        $homemodel -> insertPosts($posts);
        $display = $homemodel -> showPosts($posts);

        $_SESSION["posts_id"] = $display["id"];

        if($display){
            $_SESSION["display"] = $display;
        }

        header("Location: ../home.php");

        $pdo = null;
        $stmt = null;

        die();
        
    } 
    catch(PDOException $e) {
       die("Query failed: " . $e -> getMessage()); 
    }

}
else{
    header("Location: ../home.php");
    die();
}