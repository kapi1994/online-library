<?php
header("Content-type:application/json");
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['book_id'];

    require_once '../../config/connection.php';
    require '../function.php';

    $bookEditions = getBookEditions($id);
    echo json_encode($bookEditions);
} else {
    http_response_code(404);
}
