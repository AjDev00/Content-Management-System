<?php

declare(strict_types = 1);
//echo $_POST["postid"];

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $comment_content = $_POST["comment_content"];
    $post_id = $_POST["postid"];

    require_once "config.inc.php";
    require_once "../Classes/dbh.php";
    require_once "../Classes/comment_model.php";
    require_once "../Classes/comment_contr.php";

    $commentModel = new Commentmodel();
    $commentcontrol = new Commentcontrol();

    $errors = [];
    if($commentcontrol -> isInputEmpty($comment_content)){
        $errors["empty_input"] = "Write a comment!";
    }

    if($errors){
        $_SESSION["commenting_error"] = $errors;

        header("Location: ../views/comment.php?commentid=$post_id&error=empty");
        die();
    }

    $commentModel -> insertComment($comment_content, (int)$post_id);
    header("Location: ../home.php?commentid=$post_id&success=true");

    exit();
} 
else {
    header("Location: ../views/comment.php");
    exit();
}

// if($_SERVER["REQUEST_METHOD"] === "POST"){
    
//     // try{
//         require_once "config.inc.php";
//         require_once "../Classes/dbh.php";
//         require_once "../Classes/comment_model.php";
//         //require_once "../Classes/comment_contr.php";
//         $comment_content = $_POST["comment_content"];
//         $post_id = $_POST["postid"];
        
//         $commentmodel = new Commentmodel();
//         // $commentcontrol = new Commentcontrol($comment_content);
//         // $comment = new Comment();
        
//         // $errors = [];
//         // if($commentcontrol -> isInputEmpty($comment_content)){
//         //     $errors["empty_input"] = "Write a comment!";
//         // }

//         // if($errors){
//         //     $_SESSION["commenting_error"] = $errors;

//         //     header("Location: ../views/comment.php");
//         //     die();
//         // }
//         if($post_id){
//             $commentmodel -> insertComment($comment_content, (int)$post_id);
//             header("Location: ../views/comment.php?commentid=$post_id&success=true");
//             exit();

//         }
//         else{
//             $post_id = 1;
//         }

//         // $pdo = null;
//         // $stmt = null;

//         // die();
//     //} 
//     // catch(PDOException $e) {
//     //     die("Query failed: " . $e -> getMessage());
//     // }
// }
// else{
//     header("Location: ../views/comment.php");
//     die();
// }