<?php
header("Content-type:application/json");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $authors = $_POST['selectedAuthors'];
    $genres = $_POST['selectedGenres'];

    $errors = [];
    $reName = '';
    $reDescription = '';
    if (strlen($name) == 0) {
        $errors[] = "Name for the book isn't ok";
    }

    if (strlen($description) == 0) {
        $errors[] = "Description for the book isn't ok";
    }

    if (count($authors) == 0) {
        $errors[] = "Must pick at least one author";
    }

    if (count($genres) == 0) {
        $errors[] = "Must pick at least one genre";
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
            $queryCheck  = queryCheck('book', 'bookCountName', 'name', $name);
            if ($queryCheck->bookCountName > 0) {
                echo json_encode("Book with that name is allready inserted");
                http_response_code(409);
            } else {
                $connection->beginTransaction();
                insertBook($name, $description, $authors, $genres);
                echo json_encode('Book is inserted');
                http_response_code(201);
                $connection->commit();
            }
        } catch (PDOException $th) {
            $connection->rollBack();
            http_response_code(500);
            echo json_encode($th->getMessage());
        }
    }
} else {
    http_response_code(404);
}
