<?php

/* =========================================================
   🔐 CEK LOGIN ADMIN
========================================================= */

require_once __DIR__ . "/../includes/guard.php";
require_once __DIR__ . "/../includes/helpers.php";
require_once __DIR__ . "/../includes/crud.php";


/* =========================================================
   💾 PROSES TAMBAH / EDIT / HAPUS
   (harus di atas, sebelum ada output HTML, karena setelah
   proses halaman di-redirect)
========================================================= */

$state = crudHandle("projects", "projects.php");


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
     PROJECTS CONTENT
========================================================= -->

<div class="dashboard-content">

    <div class="dashboard-header">

        <div>

            <span class="dashboard-label">
                🚀 PROJECTS
            </span>

            <h1>
                Kelola Projects
            </h1>

            <p>
                Tambahkan dan kelola project yang ditampilkan pada portfolio.
            </p>

        </div>

    </div>


    <!-- PESAN STATUS -->

    <?= crudAlertsHtml($state) ?>


    <!-- =====================================================
         PROJECT ACTION
    ====================================================== -->

    <div class="admin-toolbar">

        <div>

            <h2>
                Daftar Projects
            </h2>

            <p>
                Project yang saat ini ada di portfolio.
            </p>

        </div>

        <a
            href="projects.php?new=1#form-crud"
            class="admin-save-btn"
        >
            ➕ Tambah Project
        </a>

    </div>


    <!-- =====================================================
         FORM TAMBAH / EDIT
    ====================================================== -->

    <?= crudFormCardHtml($state, "projects.php") ?>


    <!-- =====================================================
         PROJECT LIST
    ====================================================== -->

    <?php if ($state["dbProblem"] === null && $state["items"] === []): ?>

        <div class="admin-alert admin-alert-warning">
            Belum ada project. Klik <strong>➕ Tambah Project</strong> untuk menambahkan.
        </div>

    <?php endif; ?>

    <div class="admin-project-grid">

        <?php foreach ($state["items"] as $i => $project): ?>

            <article class="admin-project-card">

                <div class="admin-project-top">

                    <div class="admin-project-icon">
                        <?= e($project["icon"]) ?>
                    </div>

                    <span class="admin-project-number">
                        <?= str_pad((string) ($i + 1), 2, "0", STR_PAD_LEFT) ?>
                    </span>

                </div>

                <h2>
                    <?= e($project["title"]) ?>
                </h2>

                <p>
                    <?= e($project["description"]) ?>
                </p>

                <div class="admin-tech-list">

                    <?php foreach ($project["tech"] as $tech): ?>
                        <span><?= e($tech) ?></span>
                    <?php endforeach; ?>

                </div>

                <div class="admin-card-actions">

                    <?php $href = crudLinkHref($project["link"]); ?>

                    <a
                        href="<?= e($href) ?>"
                        class="admin-preview-btn"
                        <?= $href !== "#" ? 'target="_blank" rel="noopener"' : "" ?>
                    >
                        👁️ Preview
                    </a>

                    <a
                        href="projects.php?edit=<?= (int) $project["_id"] ?>#form-crud"
                        class="admin-edit-btn"
                    >
                        ✏️ Edit
                    </a>

                    <?= crudDeleteFormHtml("projects.php", $project["_id"], $project["title"]) ?>

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
