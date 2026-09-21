<?php

/*
|--------------------------------------------------------------------------
| SETUP DATABASE - jalankan SEKALI di komputer sendiri (localhost)
|--------------------------------------------------------------------------
| Buka: http://localhost/Portfolio%20Willy/database/setup.php
| Membuat database + tabel "profil" dan mengisi data awal.
| Aman dijalankan berulang: data yang sudah ada tidak ditimpa.
| Otomatis menolak kalau bukan dari localhost atau kalau AUTH_SECRET diatur
| (tanda sedang berjalan di server).
*/

require_once __DIR__ . '/../includes/profile.php';

header('Content-Type: text/html; charset=UTF-8');

$remote   = $_SERVER['REMOTE_ADDR'] ?? '';
$isLocal  = in_array($remote, ['127.0.0.1', '::1', '::ffff:127.0.0.1'], true);
$onServer = (getenv('AUTH_SECRET') ?: ($_ENV['AUTH_SECRET'] ?? '')) !== '';

if (!$isLocal || $onServer) {
    http_response_code(403);
    exit('Setup hanya boleh dijalankan di komputer lokal.');
}

$hasil = [];
$error = null;

try {
    $cfg    = dbConfig();
    $pdo    = dbConnect(false);
    $namaDb = str_replace('`', '``', $cfg['name']);

    $pdo->exec(
        "CREATE DATABASE IF NOT EXISTS `{$namaDb}` "
        . 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci'
    );
    $hasil[] = 'Database "' . $cfg['name'] . '" siap.';

    $pdo->exec("USE `{$namaDb}`");

    $pdo->exec(profileTableSql());
    $hasil[] = 'Tabel "profil" siap.';

    $stmt = $pdo->prepare(
        'INSERT IGNORE INTO `profil`
            (`id`, `nama`, `username`, `role`, `lokasi`, `bio`, `foto`)
         VALUES
            (1, :nama, :username, :role, :lokasi, :bio, :foto)'
    );
    $stmt->execute(profileDefaults());

    $hasil[] = $stmt->rowCount() > 0
        ? 'Data profil awal dimasukkan.'
        : 'Data profil sudah ada (tidak diubah).';
} catch (Throwable $e) {
    $error = $e->getMessage();
}

function h(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Setup Database</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 640px; margin: 3rem auto; padding: 0 1rem; line-height: 1.6; color: #1b2e23; }
        .ok { color: #047857; }
        .err { color: #b91c1c; }
        code { background: #eef3ef; padding: 0.1rem 0.4rem; border-radius: 6px; }
    </style>
</head>

<body>

    <h1>Setup Database</h1>

    <?php if ($error === null): ?>

        <p class="ok"><strong>Berhasil.</strong></p>

        <ul>
            <?php foreach ($hasil as $baris): ?>
                <li><?= h($baris) ?></li>
            <?php endforeach; ?>
        </ul>

        <p>
            Langkah berikutnya: login sebagai admin, lalu buka
            <a href="../Dashboard/profil.php">Dashboard &rarr; Profil</a>.
        </p>

    <?php else: ?>

        <p class="err"><strong>Gagal.</strong> <?= h($error) ?></p>

        <p>
            Pastikan MySQL di Laragon sudah menyala (klik <strong>Start All</strong>),
            lalu muat ulang halaman ini. Bawaan yang dipakai: host
            <code>127.0.0.1</code>, user <code>root</code>, tanpa password.
        </p>

    <?php endif; ?>

</body>

</html>
