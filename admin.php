<?php
session_start();
require_once 'config/connection.php';
require_once 'models/function.php';

include 'includes/fixed/head.php';
include 'includes/fixed/navigation.php';
$page = '';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'authors';
            include 'includes/pages/admin/authors.php';
            break;
        case 'publishers':
            include 'includes/pages/admin/publisher.php';
            break;
        case 'books':
            include 'includes/pages/admin/books.php';
            break;
        case 'book_editions':
            include 'includes/pages/admin/books/book_editions.php';
            break;
        case 'users':
            include 'includes/pages/admin/korisnici.php';
            break;

        case 'user-orders':
            include 'includes/pages/admin/orders/orders.php';
            break;
    }
} else {
    include 'includes/pages/admin/index.php';
}

include 'includes/fixed/footer.php';
