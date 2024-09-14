<?php

declare(strict_types = 1);

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $search = $_POST["search"];

    try{
        require_once "../Classes/dbh.php";
        require_once "../Classes/search_model.php";
        require_once "../Classes/search_contr.php";

        $searchmodel = new Searchmodel($search);
        $searchcontrol = new Searchcontrol($search);

        $errors = [];

        if($searchcontrol -> isInputEmpty($search)){
            $errors["empty_input"] = "No Results!";
        }
        
        if(!($searchmodel -> isSearchValid($search))){
            $errors["empty_input"] = "No Results!";
        }

        require_once "config.inc.php";
        if($errors){
            $_SESSION["error_search"] = $errors;

            header("Location: ../home.php?noresults");
            die();
        }

        $displaySearch = $searchmodel -> searchPosts($search);
        if($displaySearch){
            $_SESSION["display_search"] = $displaySearch;
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