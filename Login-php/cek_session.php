<?php
// pastikan session sudah aktif sebelum dicek
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['is_login']) || $_SESSION['is_login'] !== true) {
    header('Location: login.php');
    exit();
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: akses_ditolak.php");
    exit();
}
?>
