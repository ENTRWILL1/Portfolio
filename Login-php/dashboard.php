<?php

$basePath   = '../';
$pageTitle  = 'Dashboard';
$activePage = 'dashboard';

// Cek login harus paling atas, sebelum ada output HTML apa pun.
require_once __DIR__ . '/cek_session.php';
require_once __DIR__ . '/../includes/dashboard-header.php';

?>

<h1 class="dash-page-title">
    Selamat datang, <?= htmlspecialchars($username) ?>
</h1>

<p class="dash-lead">
    Pilih bagian portfolio yang ingin dikelola dari menu di samping.
</p>

<div class="dash-card">
    <p>
        Role kamu: <strong><?= htmlspecialchars($role) ?></strong>
    </p>
</div>

<?php require_once __DIR__ . '/../includes/dashboard-footer.php'; ?>
