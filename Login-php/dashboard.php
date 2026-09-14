<?php

require_once 'cek_session.php';

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Dashboard</title>

    <link rel="stylesheet" href="dashboard.css">
</head>

<body>

    <h1>
        Selamat datang,
        <?php echo htmlspecialchars($_SESSION['username']); ?>
    </h1>

    <p>
        Role kamu:
        <?php echo htmlspecialchars($_SESSION['role']); ?>
    </p>

    <a href="logout.php">
        Logout
    </a>

</body>

</html>