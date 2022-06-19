<?php
header("Content-type:application/json");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    $reFirstName = '/^[A-ZŠĐČĆŽ][a-zšđžčć]{3,15}(\s[A-ZČŠĐĆŽ][a-zčćšđž]{3,15})?$/';
    $errors = [];
    if (!preg_match($reFirstName, $first_name)) {
        $errors[] = "First name of user isn't ok";
    }
    if (!preg_match($reFirstName, $last_name)) {
        $errors[] = "Last name of user isnt' ok";
    }

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo json_encode($error);
            http_response_code(422);
        }
    } else {
        try {
            insertAuthor($first_name, $last_name);
        } catch (PDOException $th) {
            echo json_encode($th->getMessage());
            http_response_code(500);
        }
    }
} else {
    http_response_code(404);
}
