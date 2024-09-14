<?php

declare(strict_types = 1);

require_once "../includes/config.inc.php";
require_once "../views/comment.php";

class Commentmodel extends Dbh{
    public function insertComment(string $comment_content, int $post_id){
        $query = "INSERT INTO comment(posts_id, user_username, comment_content) VALUES (:posts_id, :user_username, :comment_content);";
        $stmt = $this -> connect() -> prepare($query);
        $stmt -> bindParam(":posts_id", $post_id);
        $stmt -> bindParam(":user_username", $_SESSION["user_username"]);
        $stmt -> bindParam(":comment_content", $comment_content);
        $stmt -> execute();
    }
}