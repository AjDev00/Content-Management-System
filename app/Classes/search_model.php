<?php

declare(strict_types = 1);

class Searchmodel extends Dbh{
    private $search;

    public function __construct(string $search){
        $this -> search = $search;
    }

    public function searchPosts(string $search){
        $query = "SELECT * from posts WHERE user_content = :search;";
        $stmt = $this -> connect() -> prepare($query);
        $stmt -> bindParam(":search", $search);
        $stmt -> execute();

        $results = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
        return $results;
    }

    public function isSearchValid(string $search){
        $query = "SELECT * from posts WHERE user_content = :search;";
        $stmt = $this -> connect() -> prepare($query);
        $stmt -> bindParam(":search", $search);
        $stmt -> execute();

        $results = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
        return $results;

        if($results){

            return true;
        }
        else{
            return false;
        }
    }
}