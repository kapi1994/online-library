<?php
session_start();
header("Content-type:application/json");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $publisher_book = $_POST['publisher_book'];
    $wishlist_id = $_POST['wishlist_id'];

    try {
        require_once '../../config/connection.php';
        include '../function.php';
        $queryDelete = "delete from user_book_wishlist_items where book_publisher_id = ? and user_book_wishlist_id = ?";
        $delete = $connection->prepare($queryDelete);
        $delete->execute([$publisher_book, $wishlist_id]);
        http_response_code(204);
    } catch (PDOException  $th) {
        echo json_encode($th->getMessage());
        http_response_code(500);
    }
} else {
    http_response_code(404);
}
