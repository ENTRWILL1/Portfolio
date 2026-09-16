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

    <link
        rel="stylesheet"
        href="dashboard.css"
    >

</head>

<body>

    <div class="dashboard-container">

        <div class="dashboard-icon">
            🌿
        </div>

        <h1>
            Selamat datang,
            <?php
            echo htmlspecialchars($username);
            ?>
        </h1>

        <p>
            Role kamu:
            <strong>
                <?php
                echo htmlspecialchars($role);
                ?>
            </strong>
        </p>

        <div class="dashboard-actions">

            <a
                href="../index.html"
                class="portfolio-button"
            >
                🌿 Kembali ke Portfolio
            </a>

            <a
                href="logout.php"
                class="logout-button"
            >
                Logout
            </a>

        </div>

    </div>

</body>

</html>