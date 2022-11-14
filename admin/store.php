<?php
session_start();

require_once '../model.php';

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {

    $post = array();
    $errors = array();
    $_SESSION['errors'] = null;

    if ( empty($_POST['title']) ) {
        $errors[] .= 'Title is required';
    } else {
        $post['title'] = filter_var($_POST['title'], FILTER_UNSAFE_RAW);
    }

    if ( empty($_POST['content']) ) {
        $errors[] .= 'Content is required';
    } else {
        $post['content'] = filter_var($_POST['content'], FILTER_UNSAFE_RAW);
    }

    if ( empty($_POST['img_url']) ) {
        $errors[] .= 'Image URL is required';
    } else {
        $post['img_url'] = filter_var($_POST['img_url'], FILTER_SANITIZE_URL);
    }

    if ( empty($_POST['created_at']) ) {
        $errors[] .= 'Created at is required';
    } else {
        $post['created_at'] = filter_var($_POST['created_at'], FILTER_UNSAFE_RAW);
    }

    $post['author_id'] = $_SESSION['user']['id'];

    if ( count($errors) > 0 ) {

        $_SESSION['errors'] = $errors;
        header('location:' . APP_URL . 'admin/create.php');
        die();

    } else {

        $result = storePost($post);
        if ( $result ) {
            $_SESSION['created'] = true;
            header('location:' . APP_URL . 'admin/');
            die();
        }
    }
}