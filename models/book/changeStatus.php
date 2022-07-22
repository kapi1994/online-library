<?php
header("Content-type:application/json");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $status = $_POST['status'] != 0 ? 0 : 1;
    try {
        require_once '../../config/connection.php';
        include '../function.php';
        $checkAuthorIsDeleted = queryCheckAuthorIsDeleted($id);
        if ($checkAuthorIsDeleted->is_deleted == 1) {
            echo json_encode("You can't enable this book beacuse author(authors) is(are) dissabled");
            http_response_code(500);
        } else {
            changeStatusBook($id, $status);
            $book = getFullRow('book', 'id', $id);
            echo json_encode($book);
        }
    } catch (PDOException  $th) {
        echo json_encode($th->getMessage());
        http_response_code(500);
    }
} else {
    http_response_code(404);
}
