<?php

declare(strict_types = 1);

class Homemodel extends Dbh{
    private $posts;

    public function __construct(string $posts){
        $this -> posts = $posts;
    }

    public function insertPosts(string $posts){
        $query = "INSERT INTO posts (posts, user_username, user_content) VALUES (:posts, :user_username, :user_content);";
        $stmt = $this -> connect() -> prepare($query);
        $stmt -> bindParam(":posts", $posts);
        $stmt -> bindParam(":user_username", $_SESSION["user_username"]);
        $stmt -> bindParam(":user_content", $_SESSION["user_content"]);
        $stmt -> execute();
    }

    public function showPosts(string $posts){
        $query = "SELECT * FROM posts;";
        $stmt = $this -> connect() -> prepare($query);
        $stmt -> execute();

        $results = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
        return $results;
    }
}