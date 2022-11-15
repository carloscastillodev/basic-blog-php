<?php
session_start();

require_once 'model.php';

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {

    $comment = array();
    $errors = array();
    $_SESSION['errors'] = null;

    if ( empty($_POST['content']) ) {
        $errors[] .= 'Content is required';
    } else {
        $comment['content'] = filter_var($_POST['content'], FILTER_UNSAFE_RAW);
    }

    if ( empty($_POST['author_nick']) ) {
        $errors[] .= 'Nick is required';
    } else {
        $comment['author_nick'] = filter_var($_POST['author_nick'], FILTER_UNSAFE_RAW);
    }

    if ( empty($_POST['author_email']) ) {
        $errors[] .= 'Email address is required';
    } else {
        $comment['author_email'] = filter_var($_POST['author_email'], FILTER_SANITIZE_URL);
    }

    $comment['post_id'] = filter_var($_POST['post_id'], FILTER_SANITIZE_NUMBER_INT);
    $comment['created_at'] = date('Y-m-d H:i:s');

    if ( count($errors) > 0 ) {

        $_SESSION['errors'] = $errors;
        header('location:' . APP_URL . 'show.php?id=' .  $comment['post_id']);
        die();

    } else {

        $result = storeComment($comment);
        if ( $result ) {
            header('location:' . APP_URL . 'show.php?id=' .  $comment['post_id']);
            die();
        }
    }
}