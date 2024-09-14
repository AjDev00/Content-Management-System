<?php

declare(strict_types = 1);

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try{
        require_once "../Classes/dbh.php";
        require_once "../Classes/login_model.php";
        require_once "../Classes/login_contr.php";

        $loginmodel = new Loginmodel($username, $pwd);
        $logincontrol = new Logincontrol($username, $pwd);

        //Error handling.
        $errors = [];

        if($logincontrol -> isInputEmpty($username, $pwd)){
            $errors["empty_input"] = "FILL IN ALL FIELDS!";
        }

        $results = $loginmodel -> getUsername($username);

        if(!$results){
            $errors["login_error"] = "Username or password incorrect.";
        }

        if($results && $logincontrol -> invalidPassword($pwd, $results["pwd"])){
            $errors["login_error"] = "Username or password incorrect";
        }

        require_once "config.inc.php";

        if($errors){
            $_SESSION["error_login"] = $errors;

            header("Location: ../login.php");
            die();
        }

        //merge the user's id with the session id.
        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        //save the user id and user username in a session.
        $_SESSION["user_id"] = $results["id"];
        $_SESSION["user_username"] = htmlspecialchars($results["username"]);
        $_SESSION["user_content"] = htmlspecialchars($results["content"]);

        $_SESSION['last_regeneration'] = time();

        header("Location: ../home.php?login=success");
        
        $pdo = null;
        $stmt = null;

        die();
        
    } 
    catch(PDOException $e) {
        die("Query failed: " . $e -> getMessage());
    }
}
else{
    header("Location: ../login.php");
    die();
}