<?php

/*
| Menu sidebar dashboard. Semua halaman fitur berada di folder Dashboard/,
| jadi link antar-halaman cukup nama file. Untuk menambah menu, tambah
| satu baris di array ini.
*/

$basePath = $basePath ?? '../';
$current  = basename($_SERVER['SCRIPT_NAME']);

$menu = [
    'dashboard.php'  => ['🏠', 'Dashboard'],
    'profil.php'    => ['👤', 'Profil'],
    'skills.php'     => ['⚡', 'Skills'],
    'education.php'   => ['🎓', 'Education'],
    'experience.php'     => ['💻', 'Experience'],
    'projects.php'   => ['🚀', 'Projects'],
    'gallery.php' => ['🖼️', 'Gallery'],
    'video.php'  => ['🎬', 'Video'],
    'learning.php'      => ['📚', 'Learning Progress'],
];

?>
<!-- ================= SIDEBAR DASHBOARD ================= -->

<aside class="dashboard-sidebar">

    <div class="sidebar-logo">
        <span>🌿</span>
        <div>
            <strong>My Dashboard</strong>
            <small>Portfolio Admin</small>
        </div>
    </div>

    <nav class="sidebar-menu" aria-label="Menu dashboard">

        <?php foreach ($menu as $file => [$icon, $label]): ?>

            <a
                href="<?= $file ?>"
                class="sidebar-link<?= $current === $file ? ' active' : '' ?>"
                <?= $current === $file ? 'aria-current="page"' : '' ?>
            >
                <span><?= $icon ?></span>
                <span><?= $label ?></span>
            </a>

        <?php endforeach; ?>

    </nav>

    <div class="sidebar-bottom">

        <a href="<?= $basePath ?>index.php" class="sidebar-link">
            <span>🌐</span>
            <span>Lihat Portfolio</span>
        </a>

        <a href="<?= $basePath ?>Login-php/logout.php" class="sidebar-link logout-link">
            <span>↪️</span>
            <span>Logout</span>
        </a>

    </div>

</aside>
