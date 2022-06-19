<?php

session_start();
if (isset($_SESSION['user'])) {
    insertUserActivity($_SESSION['user']->email, "logout");
    unset($_SESSION['user']);
    require '../function.php';

    session_destroy();
    header("Location: ../../index.php");
}
