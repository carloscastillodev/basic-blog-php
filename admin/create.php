<?php
session_start();

if( !isset($_SESSION['user']) ) {
    header('location:../login.php');
    die();
}

require_once '../model.php';

require '../views/admin/create.php';

require '../views/base.php';