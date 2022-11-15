<?php
session_start();

require_once 'model.php';

if ( $_SERVER["REQUEST_METHOD"] == "GET" ) {

    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    $post = getPostById($id);
    $comments = getTotalCommentsByPost($id);
    $latestPosts = getLatestPosts();
    $randomPosts = getRandomPosts();
    $popularPosts = getPopularPosts();
}

require 'views/show.php';