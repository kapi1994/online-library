<?php


session_start();
header("Content-type:application/json");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $errors = [];

    $reFirstLastName = '/^[A-ZŠĐČĆŽ][a-zšđžčć]{3,15}(\s[A-ZČŠĐĆŽ][a-zčćšđž]{3,15})?$/';

    $rePassword = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/';

    if (!preg_match($reFirstLastName, $first_name)) {
        $errors[] = "First name isn't ok";
    }
    if (!preg_match($reFirstLastName, $last_name)) {
        $errors[] = "Last name isn't ok";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email isn't ok";
    }

    if (!preg_match($rePassword, $password)) {
        $errors[] = "Password isnt'ok ";
    }

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo json_encode($error);
            http_response_code(422);
        }
    } else {
        try {
            require_once '../../config/connection.php';
            require '../function.php';
            $queryCheck = queryCheck('user', 'countEmail', 'email', $email);
            if ($queryCheck->countEmail > 0) {
                echo json_encode("That email is already taken");
                http_response_code(409);
            } else {
                define('ROLE', 1);
                $userInsert =  insertUser($first_name, $last_name, $email, $password, ROLE);
                $id = $connection->lastInsertId();
                insertUserActivity($id, "register");
                echo json_encode('registration');
                http_response_code(201);
            }
        } catch (PDOException $th) {
            echo json_encode("Something went wrong");
            http_response_code(500);
        }
    }
} else {
    http_response_code(404);
}
