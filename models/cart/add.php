<?php
session_start();
header("Content-type:application/json");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];
    $user_id = $_SESSION['user']->id;
    $errors = [];
    if ($quantity < 1) {
        $errors[] = "Quanttiy must be 1";
    }
    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo json_encode($error);
            http_response_code(422);
        }
    } else {
        try {
            require_once '../../config/connection.php';
            require '../function.php';
            $checkCart = checkOrGetCartIdFromCart($user_id, "count");
            if ($checkCart == 0) {
                $insertCartWithId = insertCart($user_id);
                insertCartItem($insertCartWithId, $id, $quantity);
                echo json_encode("Book is inserted");
                http_response_code(201);
            } else {

                $cartId = checkOrGetCartIdFromCart($user_id, 'fetch');
                $checkCartItem = checkIfBookExistInCart($cartId->cart_id, $id, 'count');
                if ($checkCartItem == 0) {
                    insertCartItem($cartId->cart_id, $id, $quantity);
                    echo json_encode("Book is inserted");
                    http_response_code(201);
                } else {
                    $cart_item_id = checkIfBookExistInCart($cartId->cart_id, $id, 'fetch');
                    try {
                        updateCartBookQuantity($cart_item_id->id, $id, $quantity);
                        echo json_encode("Quantity is updated");
                    } catch (PDOException  $th) {
                        echo json_encode($th->getMessage());
                        http_response_code(500);
                    }
                }
            }
        } catch (PDOException $th) {
            echo json_encode($th->getMessage());
            http_response_code(500);
        }
    }
} else {
    http_response_code(404);
}
