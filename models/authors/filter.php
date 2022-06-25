<?php
header("Content-type:application/json");
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    // $keyword = isset($_GET['authors_search']) ? $_GET['authors_search'] : '';
    // $order = isset($_GET['authors_order']) ? $_GET['authors_order'] : '';
    // echo json_encode($_GET['page']);
    require_once '../../config/connection.php';
    require '../function.php';
    $page = 0;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    $authors = getAuthors($_GET['authors_search'], $_GET['authors_order'], $page);
    // $pages = authorsPageCount();
    $authorsCount = authorsPageCount($_GET['authors_search']);
    // var_dump($pages);
    echo json_encode([
        'authors' => $authors,
        'pages' => $authorsCount
    ]);
} else {
    http_response_code(404);
}
