<?php
header("Content-type:application/json");
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    require_once '../../config/connection.php';
    include '../function.php';
    $page = isset($_GET['page'])  ? $_GET['page'] : 0;
    $books = getAllBooks($_GET['text'], $_GET['order'], $page);
    $bookPagination = bookPagination($_GET['text']);
    echo json_encode([
        'books' => $books,
        'pages' => $bookPagination
    ]);
} else {
    http_response_code(404);
}
