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

$state = crudHandle("skills", "skills.php");


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
     SKILLS CONTENT
========================================================= -->

<div class="dashboard-content">

    <div class="dashboard-header">

        <div>

            <span class="dashboard-label">
                ⚡ SKILLS
            </span>

            <h1>
                Kelola Skills
            </h1>

            <p>
                Atur kemampuan dan tingkat penguasaan yang
                ditampilkan pada portfolio.
            </p>

        </div>

    </div>


    <!-- PESAN STATUS -->

    <?= crudAlertsHtml($state) ?>


    <!-- =====================================================
         SKILLS TOOLBAR
    ====================================================== -->

    <div class="admin-toolbar">

        <div>

            <h2>
                Daftar Skills
            </h2>

            <p>
                Skills yang saat ini ditampilkan pada portfolio.
            </p>

        </div>

        <a
            href="skills.php?new=1#form-crud"
            class="admin-save-btn"
        >
            ➕ Tambah Skill
        </a>

    </div>


    <!-- =====================================================
         FORM TAMBAH / EDIT
    ====================================================== -->

    <?= crudFormCardHtml($state, "skills.php") ?>


    <!-- =====================================================
         SKILLS GRID
    ====================================================== -->

    <?php if ($state["dbProblem"] === null && $state["items"] === []): ?>

        <div class="admin-alert admin-alert-warning">
            Belum ada skill. Klik <strong>➕ Tambah Skill</strong> untuk menambahkan.
        </div>

    <?php endif; ?>

    <div class="admin-skill-grid">

        <?php foreach ($state["items"] as $skill): ?>

            <article class="admin-skill-card">

                <div class="admin-skill-icon">
                    <?= e($skill["icon"]) ?>
                </div>

                <div class="admin-skill-info">

                    <div>

                        <h2>
                            <?= e($skill["nama"]) ?>
                        </h2>

                        <span>
                            <?= e($skill["level"]) ?>
                        </span>

                    </div>

                </div>

                <div class="admin-card-actions">

                    <a
                        href="skills.php?edit=<?= (int) $skill["_id"] ?>#form-crud"
                        class="admin-edit-btn"
                    >
                        ✏️ Edit
                    </a>

                    <?= crudDeleteFormHtml("skills.php", $skill["_id"], $skill["nama"]) ?>

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
