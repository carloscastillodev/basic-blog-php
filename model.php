<?php

require_once 'config.php';
require_once 'helper.php';

function getPDO(): PDO
{
    try {
        $pdo = new PDO(DB_URL, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $pdo->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
        $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, true);
        return $pdo;
    } catch (PDOException $exception) {
        // If there is an error with the connection, stop the script and display the error
        exit('Failed to connect to database!');
    }
}

function getAllPosts(): array|false
{
    $pdo = getPDO();
    $query = 'SELECT * FROM posts ORDER BY created_at DESC';
    $stmt = $pdo->query($query);
    return $stmt->fetchAll();
}

function getLatestPosts(): array|false
{
    $pdo = getPDO();
    $query = 'SELECT * FROM posts ORDER BY created_at DESC LIMIT 5';
    $stmt = $pdo->query($query);
    return $stmt->fetchAll();
}

function getRandomPosts(): array|false
{
    $pdo = getPDO();
    $query = 'SELECT * FROM posts AS t1 JOIN (SELECT id FROM posts ORDER BY RAND() LIMIT 5) AS t2 ON t1.id = t2.id';
    $stmt = $pdo->query($query);
    return $stmt->fetchAll();
}

function getPopularPosts(): array|false
{
    $pdo = getPDO();
    $query = 'SELECT * FROM posts AS t1 JOIN (SELECT post_id, COUNT(*) AS total_comments FROM comments GROUP BY post_id ORDER BY total_comments DESC LIMIT 5) AS t2 ON t1.id = t2.post_id';
    $stmt = $pdo->query($query);
    return $stmt->fetchAll();
}

function getPostById($id): mixed
{
    $pdo = getPDO();
    $query = 'SELECT * FROM posts WHERE id = :id';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();
}

function storePost($post): bool
{
    $pdo = getPDO();
    $query = 'INSERT INTO posts (title, content, img_url, author_id, created_at) VALUES (:title, :content, :img_url, :author_id, :created_at)';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':title', $post['title'], PDO::PARAM_STR);
    $stmt->bindParam(':content', $post['content'], PDO::PARAM_STR);
    $stmt->bindParam(':img_url', $post['img_url'], PDO::PARAM_STR);
    $stmt->bindParam(':author_id', $post['author_id'], PDO::PARAM_INT);
    $stmt->bindParam(':created_at', $post['created_at'], PDO::PARAM_STR);
    $result = $stmt->execute();
    if ( $result ) {
        return true;
    } else {
        return false;
    }
}

function updatePost($post): bool
{
    $pdo = getPDO();
    $query = 'UPDATE posts SET title = :title, content = :content, img_url = :img_url, created_at = :created_at, updated_at = :updated_at WHERE id = :id';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $post['id'], PDO::PARAM_INT);
    $stmt->bindParam(':title', $post['title'], PDO::PARAM_STR);
    $stmt->bindParam(':content', $post['content'], PDO::PARAM_STR);
    $stmt->bindParam(':img_url', $post['img_url'], PDO::PARAM_STR);
    $stmt->bindParam(':created_at', $post['created_at'], PDO::PARAM_STR);
    $stmt->bindParam(':updated_at', $post['updated_at'], PDO::PARAM_STR);
    $result = $stmt->execute();
    if ( $result ) {
        return true;
    } else {
        return false;
    }
}

function destroyPost($id): bool
{
    $pdo = getPDO();
    $query = 'DELETE FROM posts WHERE id = :id';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $result = $stmt->execute();
    if ( $result ) {
        return true;
    } else {
        return false;
    }
}

function getTotalCommentsByPost($post_id): bool|array
{
    $pdo = getPDO();
    $query = 'SELECT * FROM comments WHERE post_id = :post_id ORDER BY created_at DESC';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getCommentsNumber($post_id): string
{
    $pdo = getPDO();
    $query = 'SELECT * FROM comments WHERE post_id = :post_id';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ( $count === 0 ) {
        return '0 comments';
    } elseif ( $count === 1 ) {
        return '1 comment';
    } else {
        return "$count comments";
    }
}

function storeComment($comment): bool
{
    $pdo = getPDO();
    $query = 'INSERT INTO comments (post_id, content, author_nick, author_email, author_url, created_at) VALUES (:post_id, :content, :author_nick, :author_email, :author_url, :created_at)';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':post_id', $comment['post_id'], PDO::PARAM_INT);
    $stmt->bindParam(':content', $comment['content'], PDO::PARAM_STR);
    $stmt->bindParam(':author_nick', $comment['author_nick'], PDO::PARAM_STR);
    $stmt->bindParam(':author_email', $comment['author_email'], PDO::PARAM_STR);
    $stmt->bindParam(':author_url', $comment['author_url'], PDO::PARAM_STR);
    $stmt->bindParam(':created_at', $comment['created_at'], PDO::PARAM_STR);
    $result = $stmt->execute();
    if ( $result ) {
        return true;
    } else {
        return false;
    }
}

function getUserById($id): mixed
{
    $pdo = getPDO();
    $query = 'SELECT * FROM users WHERE id = :id';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();
}

function checkLogin($email, $password)
{
    $pdo = getPDO();
    $query = 'SELECT * FROM users WHERE email = :email';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch();
    if ( $user && password_verify($password, $user['password']) ) {
        return $user;
    } else {
        return null;
    }
}