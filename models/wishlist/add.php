<?php
session_start();
header("Content-type:application/json");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $book_id = $_POST['book_id'];
    $user_id = $_SESSION['user']->id;
    try {
        require_once '../../config/connection.php';
        include '../function.php';
        $queryCheck  = "select * from user_book_wishlist where user_id = ?";
        $query = $connection->prepare($queryCheck);
        $query->execute([$user_id]);
        if ($query->rowCount() == 0) {
            $queryInsert = $connection->prepare("insert into user_book_wishlist (user_id) values(?)");
            $queryInsert->execute([$user_id]);
            $last_wishlist_id = $connection->lastInsertId();

            $queryInsertWishlistItem = $connection->prepare('insert into user_book_wishlist_items (user_book_wishlist_id,book_publisher_id) values(?,?)');
            $queryInsertWishlistItem->execute([$last_wishlist_id, $book_id]);

            echo json_encode('Book is added to your wishlist');
            http_response_code(201);
        } else {
            $queryWishlistId = $query->fetch();
            $queryInsertWishlistItem = $connection->prepare('insert into user_book_wishlist_items (user_book_wishlist_id,book_publisher_id) values(?,?)');
            $queryInsertWishlistItem->execute([$queryWishlistId->id, $book_id]);

            echo json_encode('Book is added to your wishlist');
            http_response_code(201);
        }
    } catch (PDOException $th) {
        echo json_encode($th->getMessage());
        http_response_code(500);
    }
} else {
    http_response_code(404);
}
