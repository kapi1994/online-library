<?php
header("Content-type:application/json");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $selectedGenres = $_POST['selectedGenres'];
    $selectedAuthors  = $_POST['selectedAuthors'];
    $id = $_POST['id'];

    $reName = [];
    $reDescription = [];
    $errors = [];

    if (strlen($name) == 0) {
        $errors[] = "Name for the book ins't ok";
    }

    if (strlen($description) == 0) {
        $errors[] = "Description for the book isn't ok";
    }

    if (count($selectedGenres) == 0) {
        $errors[] = "Must pick at least one genre";
    }

    if (count($selectedAuthors) == 0) {
        $errors[] = "Must pick at least one author";
    }

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo json_encode($error);
            http_response_code(422);
        }
    } else {
        require_once '../../config/connection.php';
        include '../function.php';

        $book = getOne('book', 'name', $name);

        if ($book && $book->name == $name && $book->id != $id) {
            echo json_encode('That name is allready taken');
            http_response_code(409);
        } else {
            try {
                $connection->beginTransaction();
                updateBook($name, $description, $id, $selectedAuthors, $selectedGenres);
                $connection->commit();
                $book = getOne('book', 'id', $id);
                echo json_encode($book);
            } catch (PDOException $th) {
                $connection->rollBack();
                echo json_encode($th->getMessage());
                http_response_code(500);
            }
        }
    }
} else {
    http_response_code(404);
}
