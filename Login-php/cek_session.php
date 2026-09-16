<?php

// Mulai session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// DEBUG:
// Kalau session tidak ada, tampilkan isi session
if (!isset($_SESSION['is_login'])) {

    echo "<h2>Session tidak terbaca!</h2>";

    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";

    echo "<p>Session ID:</p>";
    echo "<pre>";
    echo session_id();
    echo "</pre>";

    exit;
}

// Cek status login
if ($_SESSION['is_login'] !== true) {

    header('Location: login.php');
    exit;
}

// Cek role
if (
    !isset($_SESSION['role']) ||
    $_SESSION['role'] !== 'admin'
) {

    header('Location: akses_ditolak.php');
    exit;
}