<?php
header("Content-type:application/json");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $reName = '';
    $errors = [];

    if (strlen($name) == 0) {
        $errors[]  = $name;
    }

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo json_encode($error);
            http_response_code(422);
        }
    } else {
        try {
            require_once '../../config/connection.php';
            include '../function.php';
            $queryCheck = queryCheck('publisher', 'countName', 'name', $name);
            if ($queryCheck->countName > 0) {
                echo json_encode("Name for the publisher is allready taken");
                http_response_code(409);
            } else {
                publisherInsert($name);
                echo json_encode("Publisher is inserted");
                http_response_code(201);
            }
        } catch (PDOException $th) {
            echo json_encode($th->getMessage());
            http_response_code(500);
        }
    }
} else {
    http_response_code(404);
}
