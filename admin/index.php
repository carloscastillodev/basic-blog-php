<?php

session_start();

if( !isset($_SESSION['user']) ) {
    header('location:../login.php');
    die();
}

require_once '../model.php';

$posts = getAllPosts();

$user = $_SESSION['user'];

require '../views/admin/list.php';

require '../views/base.php';


