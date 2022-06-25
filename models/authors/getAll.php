<?php
header("Content-type:application/json");
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    require_once '../../config/connection.php';
    include '../function.php';
    $authors = getAuthors();
    echo json_encode($authors);
} else {
    http_response_code(404);
}
