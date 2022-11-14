<?php
session_start();

require_once 'model.php';

if ( $_SERVER["REQUEST_METHOD"] == "GET" ) {

    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $post = getPostById($id);
    $comments = getAllCommentsByPost($id);
    $latestPosts = getLatestPosts();
    $randomPosts = getRandomPosts();
}

require 'views/show.php';