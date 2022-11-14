<?php
session_start();

require_once 'model.php';

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_UNSAFE_RAW);

    $user = checkLogin($email, $password);

    if ( !empty($user) ) {
        $_SESSION['user'] = $user;
        header('location:admin/');
        die();
    } else {
        $errors = ['Your <strong>Email address</strong> or <strong>Password</strong> is invalid...'];
        require_once 'views/login.php';
    }

}

$errors = null;
require_once 'views/login.php';