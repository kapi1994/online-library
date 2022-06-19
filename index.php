<?php
session_start();
require_once 'config/connection.php';
include 'models/function.php';
include 'includes/fixed/head.php';
include 'includes/fixed/navigation.php';
$page = '';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'login':
            include 'includes/pages/loginAndRegistration/login.php';
            break;
        case 'register':
            include 'includes/pages/loginAndRegistration/register.php';
            break;
    }
} else {
    include 'includes/pages/user/home.php';
}
include 'includes/fixed/footer.php';
