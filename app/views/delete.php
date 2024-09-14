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


//delete query.
require_once "../includes/config.inc.php";

if(isset($_GET["deleteid"])){
    $id = $_GET["deleteid"];

    $query = "DELETE FROM posts WHERE id = :id;";
    $stmt = $pdo -> prepare($query);
    $stmt -> bindParam(":id", $id);
    $stmt -> execute();


    //updating the home page after deletion.
    foreach($_SESSION["display"] as $key => $message){
        if($message["id"] == $id){               //any id in the database that is equal to the id in the url..
            unset($_SESSION["display"][$key]);  //unset (delete the corresponding posts).
            break;                             //end the loop.
        }
    }

    
    header("Location: ../home.php");
    exit();

    $pdo = null;
    $stmt = null;

    die();
}
else{
    echo "<p>" . "Delete Error!" . "</p>";
    header("Location: ../home.php");
    die();
}