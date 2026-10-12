<?php

/* =========================================================
   🔐 CEK LOGIN ADMIN
========================================================= */

require_once __DIR__ . "/../includes/guard.php";
require_once __DIR__ . "/../includes/helpers.php";
require_once __DIR__ . "/../includes/crud.php";


/* =========================================================
   💾 PROSES TAMBAH / EDIT / HAPUS
========================================================= */

$state = crudHandle("music", "music.php");


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

?>


<!-- =========================================================
     MUSIC CONTENT
========================================================= -->

<div class="dashboard-content">

    <div class="dashboard-header">

        <div>

            <span class="dashboard-label">
                🎵 MUSIC
            </span>

            <h1>
                Kelola Music
            </h1>

            <p>
                Atur daftar lagu yang diputar pada music player
                portfolio.
            </p>

        </div>

    </div>


    <!-- PESAN STATUS -->

    <?= crudAlertsHtml($state) ?>


    <!-- =====================================================
         MUSIC TOOLBAR
    ====================================================== -->

    <div class="admin-toolbar">

        <div>

            <h2>
                Daftar Lagu
            </h2>

            <p>
                Lagu yang saat ini ada di playlist portfolio.
            </p>

        </div>

        <a
            href="music.php?new=1#form-crud"
            class="admin-save-btn"
        >
            ➕ Tambah Lagu
        </a>

    </div>


    <!-- =====================================================
         FORM TAMBAH / EDIT
    ====================================================== -->

    <?= crudFormCardHtml($state, "music.php") ?>


    <!-- =====================================================
         MUSIC GRID
    ====================================================== -->

    <?php if ($state["dbProblem"] === null && $state["items"] === []): ?>

        <div class="admin-alert admin-alert-warning">
            Belum ada lagu. Klik <strong>➕ Tambah Lagu</strong> untuk menambahkan.
        </div>

    <?php endif; ?>

    <div class="admin-skill-grid">

        <?php foreach ($state["items"] as $lagu): ?>

            <article class="admin-skill-card">

                <div class="admin-skill-icon">
                    🎵
                </div>

                <div class="admin-skill-info">

                    <div>

                        <h2>
                            <?= e($lagu["title"]) ?>
                        </h2>

                        <span>
                            Efek: <?= e($lagu["effect"]) ?> · <?= e(basename($lagu["file"])) ?>
                        </span>

                        <audio
                            controls
                            preload="none"
                            src="../<?= e(assetUrl($lagu["file"])) ?>"
                            style="display:block;margin-top:0.6rem;max-width:100%;"
                        ></audio>

                    </div>

                </div>

                <div class="admin-card-actions">

                    <a
                        href="music.php?edit=<?= (int) $lagu["_id"] ?>#form-crud"
                        class="admin-edit-btn"
                    >
                        ✏️ Edit
                    </a>

                    <?= crudDeleteFormHtml("music.php", $lagu["_id"], $lagu["title"]) ?>

                </div>

            </article>

        <?php endforeach; ?>

    </div>

</div>


<?php

/* =========================================================
   FOOTER
========================================================= */

require_once __DIR__ . "/../includes/Footer.php";

?>
