<?php
$pesan = "Akses ditolak. Hanya admin yang dapat mengakses halaman ini.";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Akses Ditolak</title>

    <link rel="stylesheet" href="akses_ditolak.css">
</head>

<body>

    <div class="access-card">

        <div class="access-icon">
            🔒
        </div>

        <div class="access-label">
            ACCESS DENIED
        </div>

        <h1>
            Akses Ditolak
        </h1>

        <p>
            <?php echo htmlspecialchars($pesan); ?>
        </p>

        <a href="login.php" class="back-button">
            ← Kembali ke Login
        </a>

    </div>

</body>

</html>