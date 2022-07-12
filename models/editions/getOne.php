<?php
header("Content-type:application/json");
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    // echo $id;
    require_once '../../config/connection.php';
    include '../function.php';
    $edition = getEdition($id);
    echo json_encode($edition);
} else {
    http_response_code(404);
}
