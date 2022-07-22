<?php
session_start();
header("Content-type:application/json");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user']->id;
    $booksArray = $_POST['bookPublisherArray'];
    $quantityArray = $_POST['quantityArray'];
    try {
        require_once '../../config/connection.php';
        require '../function.php';
        insertOrder($user_id, $booksArray, $quantityArray);
        // echo json_encode("Order is inserted");
        http_response_code(201);
        $cartItems = cartItems($user_id);
        echo json_encode($cartItems);
    } catch (PDOException $th) {
        echo json_encode($th->getMessage());
        http_response_code(500);
    }
} else {
    http_response_code(404);
}
