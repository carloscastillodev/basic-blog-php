<?php
session_start();

if( !isset($_SESSION['user']) ) {
    header('location:../login.php');
    die();
}

require_once '../model.php';

if ( $_SERVER["REQUEST_METHOD"] == "GET" ) {

    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $post = getPostById($id);

}

require '../views/admin/edit.php';

require '../views/base.php';