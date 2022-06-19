<?php
require_once 'config/connection.php';
require_once 'models/function.php';

include 'includes/fixed/head.php';
include 'includes/fixed/navigation.php';
$page = '';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'autori';
            include 'includes/pages/admin/authors.php';
            break;
        case 'publishers':
            include 'includes/pages/admin/publisher.php';
            break;
        case 'knjige':
            include 'includes/pages/admin/book.php';
            break;
    }
}

include 'includes/fixed/footer.php';
