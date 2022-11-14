<?php
session_start();

require_once '../model.php';

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {

    $post = array();
    $errors = array();
    $_SESSION['errors'] = null;

    if ( empty($_POST['id']) ) {
        $errors[] .= 'ID is required';
    } else {
        $post['id'] = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    }

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
    $post['updated_at'] = date('Y-m-d H:i:s');

    if ( count($errors) > 0 ) {

        $_SESSION['errors'] = $errors;
        header('location:' . APP_URL . 'admin/edit.php');
        die();

    } else {

        $result = updatePost($post);
        if ( $result ) {
            $_SESSION['updated'] = true;
            header('location:' . APP_URL . 'admin/');
            die();
        }
    }
}