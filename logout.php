<?php
session_start();

require_once 'config.php';

if ( session_destroy() ) {
    header('Location: ' . APP_URL);
}