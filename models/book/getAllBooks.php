<?php
header("Content-type:application/json");
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    require_once '../../config/connection.php';
    include '../function.php';
    $books = getAllBooks();
    $pagination = bookPagination();
    echo json_encode([
        'books' => $books,
        'pages' => $pagination
    ]);
} else {
    http_response_code(404);
}
