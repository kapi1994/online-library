<?php
header("Content-type:application/json");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $publisher = $_POST['publisher'];
    $year = $_POST['year'];
    $image = $_FILES['image'];
    $book_id = $_POST['id'];
    $price = $_POST['price'];
    $cover_book = $_POST['cover_book'];
    $letter = $_POST['alphabet_value'];


    $errors = [];
    $allowedType = ['image/jpeg', 'image/png', 'image/jpg'];
    $reYear = '';


    if ($publisher == 0) {
        $errors[] = "You must pick publisher";
    }

    if (strlen($year) == 0) {
        $errors[] = "Year not valid";
    }

    if ($image['size'] > 3 * 1024 * 1024) {
        $errors[] = "Image size must be less than 3mb";
    }

    if (!in_array($image['type'], $allowedType)) {
        $errors[] = "Image type isn't allowed";
    }

    if ($price == 0) {
        $errors[] = "Price cant be 0";
    }

    if ($cover_book == 0) {
        $errors[] = "Must choose cover for book";
    }

    if ($letter == 0) {
        $errors[] = "Must choose letter for book";
    }

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo json_encode($error);
            http_response_code(422);
        }
    } else {
        try {
            $book_number = $book_id . time();
            $isbn =  $book_id . $publisher . time();
            require_once '../../config/connection.php';
            include '../function.php';
            $queryCheck = queryCheck('book_publisher', 'countISBN', 'isbn', $isbn);
            if ($queryCheck->countISBN > 0) {
                echo json_encode("ISBN for book is laready taken");
                http_response_code(409);
            } else {
                define("NORMAL_PATH", "../../assets/img/books/normal/");
                define("SMALL_PATH", "../../assets/img/books/thumbnail/");
                $image_name = resizeImage($image, NORMAL_PATH, SMALL_PATH);
                $connection->beginTransaction();
                bookInsertNewEdition($book_id, $publisher,  $price, $book_number, $year, $isbn, $letter, $cover_book, $image_name);

                $connection->commit();
                echo json_encode("New edition is inserted");
                http_response_code(201);
            }
        } catch (PDOException $th) {
            $connection->rollBack();
            echo json_encode($th->getMessage());
            http_response_code(500);
        }
    }
} else {
    http_response_code(404);
}
