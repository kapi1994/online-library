<?php

header("Content-type:application/json");
if (isset($_SERVER['REQUEST_METHOD']) == "GET") {
    $id = $_GET['id'];
    require_once '../../config/connection.php';
    require_once '../function.php';
    $author = getAuthor($id);
    echo json_encode($author);
} else {
    http_response_code(404);
}
