<?php

require_once 'config.php';

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

function getPostById($id): mixed
{
    $pdo = getPDO();
    $query = 'SELECT * FROM posts WHERE id = :id';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();
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
