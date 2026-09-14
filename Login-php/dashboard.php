<?php
session_start();
require 'cek_session.php'; // proteksi halaman (dibahas di bagian 5)
?>

<!DOCTYPE html>
<html>
<head><title>Dashboard</title></head>
<link rel="stylesheet" href="dashboard.css">
<body>
    <h1>Selamat datang, <?php echo $_SESSION['username']; ?></h1>
    <p>Role kamu: <?php echo $_SESSION['role']; ?></p>

    <a href="logout.php">Logout</a>
</body>
</html>