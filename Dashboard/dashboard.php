<?php

/* =========================================================
   🔐 CEK LOGIN ADMIN
========================================================= */

require_once __DIR__ . "/../includes/guard.php";


/* =========================================================
   🌿 TANDA HALAMAN DASHBOARD
========================================================= */

$isDashboard = true;


/* =========================================================
   HEADER
========================================================= */

require_once __DIR__ . "/../includes/Header.php";


/* =========================================================
   SIDEBAR
========================================================= */

require_once __DIR__ . "/../includes/Sidebar.php";


/* =========================================================
   KARTU MENGIKUTI URUTAN SIDEBAR
   Urutan diambil dari $menu di includes/Sidebar.php, jadi
   kalau menu sidebar diurutkan ulang, kartu di sini ikut.
   Deskripsi tiap kartu diatur di array di bawah ini.
========================================================= */

$deskripsi = [
    "profil.php"     => "Kelola informasi profil portfolio.",
    "skills.php"     => "Kelola daftar skills dan kemampuan.",
    "education.php"  => "Kelola riwayat pendidikan.",
    "experience.php" => "Kelola pengalaman dan aktivitas.",
    "projects.php"   => "Kelola project yang ditampilkan.",
    "gallery.php"    => "Kelola foto dan gallery.",
    "video.php"      => "Kelola video showcase.",
    "learning.php"   => "Kelola perkembangan pembelajaran.",
];

$kartu = array_filter(
    $menu,
    fn ($file) => $file !== "dashboard.php",
    ARRAY_FILTER_USE_KEY
);

?>


<!-- =========================================================
     DASHBOARD CONTENT
========================================================= -->

<div class="dashboard-content">

    <div class="dashboard-header">

        <div>

            <span class="dashboard-label">
                🌿 ADMIN PANEL
            </span>

            <h1>
                Selamat Datang di Dashboard 👋
            </h1>

            <p>
                Kelola isi portfolio kamu melalui halaman ini.
            </p>

        </div>

    </div>


    <!-- =====================================================
         DASHBOARD CARDS
    ====================================================== -->

    <div class="dashboard-grid">

        <?php foreach ($kartu as $file => [$icon, $label]): ?>

            <a href="<?= $file ?>" class="dashboard-card">

                <div class="dashboard-card-icon">
                    <?= $icon ?>
                </div>

                <div>

                    <h2><?= $label ?></h2>

                    <p>
                        <?= htmlspecialchars($deskripsi[$file] ?? "Kelola " . $label . ".") ?>
                    </p>

                </div>

            </a>

        <?php endforeach; ?>

    </div>

</div>


<?php

/* =========================================================
   FOOTER
========================================================= */

require_once __DIR__ . "/../includes/Footer.php";

?>