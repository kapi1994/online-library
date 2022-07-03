<?php
header("Content-type:application/json");
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    require_once '../../config/connection.php';
    include '../function.php';
    $publishers = getPublishers();
    $pages = publisherPagination();
    echo json_encode([
        'publishers' => $publishers,
        'pages' => $pages
    ]);
} else {
    http_response_code(404);
}
