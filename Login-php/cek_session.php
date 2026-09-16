<?php

// Pastikan session sudah aktif
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Belum login
if (
    !isset($_SESSION['is_login']) ||
    $_SESSION['is_login'] !== true
) {
    header('Location: login.php');
    exit;
}

// Sudah login, tetapi bukan admin
if (
    !isset($_SESSION['role']) ||
    $_SESSION['role'] !== 'admin'
) {
    header('Location: akses_ditolak.php');
    exit;
}