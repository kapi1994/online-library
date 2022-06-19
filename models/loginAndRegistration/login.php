<?php

// # testirati
// -- dodati insertUserActivity
session_start();
header("Content-type:application/json");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $errors = [];

    $rePassword = ' /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/';
    // -- dodati regularne izraze
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email isn't ok";
    }

    if (!preg_match($rePassword, $password)) {
        $errors[] = "Password isn't ok";
    }

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo json_encode($error);
            http_response_code(422);
        }
    } else {
        // -- proveriti da li je nalog aktivan
        $user = login($email, $password);
        if ($user) {
            $_SESSION['user'] = $user;
            echo json_encode($user);
        }
    }
} else {
    http_response_code(404);
}
