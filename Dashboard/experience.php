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

$state = crudHandle("experience", "experience.php");


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
     EXPERIENCE CONTENT
========================================================= -->

<div class="dashboard-content">

    <div class="dashboard-header">

        <div>

            <span class="dashboard-label">
                💻 EXPERIENCE
            </span>

            <h1>
                Kelola Experience
            </h1>

            <p>
                Atur pengalaman dan aktivitas yang ditampilkan
                pada portfolio kamu.
            </p>

        </div>

    </div>


    <!-- PESAN STATUS -->

    <?= crudAlertsHtml($state) ?>


    <!-- =====================================================
         TOOLBAR
    ====================================================== -->

    <div class="admin-toolbar">

        <div>

            <h2>
                Daftar Experience
            </h2>

            <p>
                Pengalaman yang saat ini ada di portfolio.
            </p>

        </div>

        <a
            href="experience.php?new=1#form-crud"
            class="admin-save-btn"
        >
            ➕ Tambah Experience
        </a>

    </div>


    <!-- =====================================================
         FORM TAMBAH / EDIT
    ====================================================== -->

    <?= crudFormCardHtml($state, "experience.php") ?>


    <!-- =====================================================
         LIST
    ====================================================== -->

    <?php if ($state["dbProblem"] === null && $state["items"] === []): ?>

        <div class="admin-alert admin-alert-warning">
            Belum ada experience. Klik <strong>➕ Tambah Experience</strong> untuk menambahkan.
        </div>

    <?php endif; ?>

    <div class="admin-timeline-grid">

        <?php foreach ($state["items"] as $item): ?>

            <article class="admin-timeline-card">

                <div class="admin-timeline-icon">
                    <?= e($item["icon"]) ?>
                </div>

                <div class="admin-timeline-content">

                    <span class="admin-timeline-year">
                        <?= e($item["tahun"]) ?>
                    </span>

                    <h2>
                        <?= e($item["posisi"]) ?>
                    </h2>

                    <h3>
                        <?= e($item["tempat"]) ?>
                    </h3>

                    <p>
                        <?= e($item["description"]) ?>
                    </p>

                    <div class="admin-card-actions">

                        <a
                            href="experience.php?edit=<?= (int) $item["_id"] ?>#form-crud"
                            class="admin-edit-btn"
                        >
                            ✏️ Edit
                        </a>

                        <?= crudDeleteFormHtml("experience.php", $item["_id"], $item["posisi"]) ?>

                    </div>

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
