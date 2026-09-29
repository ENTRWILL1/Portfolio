<?php

/*
|--------------------------------------------------------------------------
| LIHAT ISI DATABASE - hanya boleh dibuka di komputer sendiri (localhost)
|--------------------------------------------------------------------------
| Buka: http://localhost/Portfolio%20Willy/database/browse.php
|
| Menampilkan semua tabel dan isinya dari database yang sedang aktif:
|   - Kalau includes/local-env.php ADA -> yang ditampilkan database Aiven.
|   - Kalau TIDAK ada                  -> yang ditampilkan MySQL Laragon.
|
| Ini cuma untuk MELIHAT (read-only), tidak ada tombol ubah/hapus di sini.
*/

if (is_file(__DIR__ . '/../includes/local-env.php')) {
    require_once __DIR__ . '/../includes/local-env.php';
}

require_once __DIR__ . '/../includes/db.php';

header('Content-Type: text/html; charset=UTF-8');

$remote  = $_SERVER['REMOTE_ADDR'] ?? '';
$isLocal = in_array($remote, ['127.0.0.1', '::1', '::ffff:127.0.0.1'], true);

if (!$isLocal) {
    http_response_code(403);
    exit('Halaman ini hanya boleh dibuka dari komputer sendiri.');
}

function h(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

$error  = null;
$tabel  = [];   // ['nama_tabel' => [ ['kolom' => 'nilai', ...], ... ] ]

try {
    $pdo = dbConnect();

    $namaDb = $pdo->query('SELECT DATABASE()')->fetchColumn();

    $daftarTabel = $pdo->query('SHOW TABLES')->fetchAll(PDO::FETCH_COLUMN);

    foreach ($daftarTabel as $nama) {
        // Nama tabel berasal dari SHOW TABLES (bukan input pengguna), aman
        // untuk ditempel langsung ke query berikutnya.
        $stmt = $pdo->query('SELECT * FROM `' . $nama . '` LIMIT 50');
        $tabel[$nama] = $stmt->fetchAll();
    }
} catch (Throwable $e) {
    error_log('Lihat database gagal: ' . $e->getMessage());
    $error = dbHint();
}

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Lihat Database</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 900px; margin: 2rem auto; padding: 0 1rem; line-height: 1.6; color: #1b2e23; }
        h1 { margin-bottom: 0.2rem; }
        .info { color: #3d5a49; margin-bottom: 1.5rem; }
        .err { color: #b91c1c; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 2rem; font-size: 0.85rem; }
        th, td { border: 1px solid #d7e2db; padding: 0.4rem 0.6rem; text-align: left; }
        th { background: #eef3ef; }
        .kosong { color: #3d5a49; font-style: italic; }
    </style>
</head>

<body>

    <h1>Lihat Database</h1>

    <?php if ($error !== null): ?>

        <p class="err"><strong>Gagal.</strong> <?= h($error) ?></p>

    <?php else: ?>

        <p class="info">
            Tersambung ke database: <strong><?= h($namaDb) ?></strong>
            &middot; <?= count($tabel) ?> tabel ditemukan
        </p>

        <?php if ($tabel === []): ?>

            <p class="kosong">Belum ada tabel di database ini.</p>

        <?php endif; ?>

        <?php foreach ($tabel as $nama => $baris): ?>

            <h2><?= h($nama) ?> (<?= count($baris) ?> baris)</h2>

            <?php if ($baris === []): ?>

                <p class="kosong">Tabel ini masih kosong.</p>

            <?php else: ?>

                <table>
                    <thead>
                        <tr>
                            <?php foreach (array_keys($baris[0]) as $kolom): ?>
                                <th><?= h($kolom) ?></th>
                            <?php endforeach; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($baris as $b): ?>
                            <tr>
                                <?php foreach ($b as $nilai): ?>
                                    <td><?= h((string) $nilai) ?></td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            <?php endif; ?>

        <?php endforeach; ?>

    <?php endif; ?>

</body>

</html>
