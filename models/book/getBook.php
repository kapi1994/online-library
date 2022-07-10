<?php
header("Content-type:application/json");
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    require_once '../../config/connection.php';
    include '../function.php';
    $book = getBook($id);
    $authorsBook = getBookAuthorsId($id);
    $bookGenres = getBookGenresId($id);
    echo json_encode([
        'book' => $book,
        'bookAuthors' => $authorsBook,
        'bookGenres' => $bookGenres
    ]);
} else {
    http_response_code(404);
}
