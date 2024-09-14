<?php

declare(strict_types = 1);

//open connection.
$dsn = "mysql:host=localhost;dbname=cms";
    $dbusername = "root";
    $dbpassword = "";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo -> setAttribute(PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
} 
catch (PDOException $e) {
    echo "Connection failed: " . $e -> getMessage();
}


//select query.
//require_once "../includes/config.inc.php";

if(isset($_GET["viewcommentsid"])){
    $id = $_GET["viewcommentsid"];

    $query = "SELECT * FROM comment WHERE posts_id = :id;";
    $stmt = $pdo -> prepare($query);
    $stmt -> bindParam(":id", $id);
    $stmt -> execute();

    $results = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
    

    if(count($results) > 0) {
        foreach ($results as $result) {
            //echo "<section>";
            //echo "<div>";
            echo "<br>";
            echo "<p><b>USER: </b>" . $result['user_username'] . "</p>";
            echo "<p><b>COMMENT: </b>" . $result['comment_content'] . "</p>";
            echo "<p><i>" . $result['commented_at'] . "</i></p>";
            //echo "</div>";
            //echo "</section>";
        }
        function countR($results){
            return count($results);
        }
        echo countR($results);
    }
    else {
        echo "No comments found under this posts.";
    }
}
else{
    echo "<p>" . "Error!" . "</p>";
    header("Location: ../home.php");
    die();
}