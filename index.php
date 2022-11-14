<?php
session_start();

require_once 'model.php';

$posts = getAllPosts();

require 'views/list.php';