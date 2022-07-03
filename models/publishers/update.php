<?php

header("Content-type:application/json");
// -- dodati regularne izraze i validaciju sa njima
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $id = $_POST['id'];
    $errors = [];
    $reName = '';
    if (strlen($name) == 0) {
        $errors[] = "Name for the publisher isn't ok";
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

            $publisher = getOne('publisher', 'name', $name);
            if ($publisher) {
                if ($publisher->id != $id  && $publisher->name == $name) {
                    echo json_encode("Name for the publisher is already taken");
                    http_response_code(409);
                }
            } else {
                publisherUpdate($name, $id);
                $publisher = getPublisher($id);
                echo json_encode($publisher);
            }
        } catch (PDOException $th) {
            echo json_encode($th->getMessage());
            http_response_code(500);
        }
    }
} else {
    http_response_code(404);
}
