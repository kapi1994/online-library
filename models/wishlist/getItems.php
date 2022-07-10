<?php
session_start();

header("Content-type:application/json");
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $user_id = isset($_SESSION['user']) ? $_SESSION['user']->id : '';
    require_once '../../config/connection.php';
    require '../function.php';
    $wishlistItems = getUserWishlistItems($user_id);
    echo json_encode($wishlistItems);
} else {
    http_response_code(404);
}
