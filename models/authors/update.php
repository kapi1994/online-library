<?php
header('Content-type:application/json');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $id = $_POST['id'];
    $reFirstLastName = '/^[A-ZŠĐČĆŽ][a-zšđžčć]{3,15}(\s[A-ZČŠĐĆŽ][a-zčćšđž]{3,15})?$/';
    $errors = [];

    if (!preg_match($reFirstLastName, $first_name)) {
        $errors[] = "First name of user isnt'ok";
    }

    if (!preg_match($reFirstLastName, $last_name)) {
        $errors[] = "Last name of user isn't ok";
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

            updateAuthor($first_name, $last_name, $id);
            $author = getAuthor($id);
            echo json_encode($author);
        } catch (PDOException $th) {
            echo $th->getMessage();
            http_response_code(500);
        }
    }
} else {
    http_response_code(404);
}
