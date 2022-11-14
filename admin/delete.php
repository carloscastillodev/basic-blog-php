<?php
session_start();

require_once '../model.php';

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {

    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $result = destroyPost($id);

    if ( $result ) {
        $_SESSION['deleted'] = true;
        header('location:' . APP_URL . 'admin/');
        die();
    }

}