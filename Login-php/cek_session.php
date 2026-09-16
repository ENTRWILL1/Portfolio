<?php

// Pastikan session sudah aktif
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Cek apakah user sudah login
if (
    !isset($_SESSION['is_login']) ||
    $_SESSION['is_login'] !== true
) {

    header('Location: login.php');
    exit;
}