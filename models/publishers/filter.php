<?php
header("Content-type:application/json");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    require_once '../../config/connection.php';
    require_once '../function.php';
    $page = isset($_GET['page']) ? $_GET['page'] : 0;

    $publishers = getPublishers($_GET['text'], $_GET['order'], $page);
    $pages = publisherPagination($_GET['text']);
    echo json_encode([
        'publishers' => $publishers,
        'pages' => $pages
    ]);
} else {
    http_response_code(404);
}
