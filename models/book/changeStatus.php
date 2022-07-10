<?php
header("Content-type:application/json");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $status = $_POST['status'] != 0 ? 0 : 1;
    try {
        require_once '../../config/connection.php';
        include '../function.php';
        changeStatusBook($id, $status);
        $book = getFullRow('book', 'id', $id);
        echo json_encode($book);
    } catch (PDOException  $th) {
        echo json_encode($th->getMessage());
        http_response_code(500);
    }
} else {
    http_response_code(404);
}
