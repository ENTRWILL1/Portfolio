<?php

/* =========================================================
   🔐 CEK LOGIN ADMIN
========================================================= */

require_once __DIR__ . "/../includes/guard.php";
require_once __DIR__ . "/../includes/helpers.php";
require_once __DIR__ . "/../includes/crud.php";


/* =========================================================
   💾 PROSES SIMPAN PERUBAHAN
========================================================= */

$state = crudHandleSingle("learning", "learning.php");
$row   = $state["row"];


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
     LEARNING CONTENT
========================================================= -->

<div class="dashboard-content">

    <div class="dashboard-header">

        <div>

            <span class="dashboard-label">
                📚 LEARNING PROGRESS
            </span>

            <h1>
                Kelola Learning Progress
            </h1>

            <p>
                Atur perkembangan pembelajaran yang ditampilkan
                pada portfolio kamu.
            </p>

        </div>

    </div>


    <!-- PESAN STATUS -->

    <?= crudAlertsHtml($state) ?>


    <!-- =====================================================
         CURRENT PROGRESS
    ====================================================== -->

    <div class="admin-form-card">

        <div class="admin-form-header">

            <div>

                <span class="dashboard-label">
                    📖 CURRENTLY LEARNING
                </span>

                <h2>
                    Progress Pembelajaran
                </h2>

            </div>

            <span class="admin-progress-value">
                <?= (int) $row["percent"] ?>%
            </span>

        </div>


        <!-- PREVIEW PROGRESS -->

        <div class="admin-progress-preview">

            <div class="admin-progress-header">

                <strong>
                    <?= e($row["title"]) ?>
                </strong>

                <span>
                    <?= (int) $row["percent"] ?>%
                </span>

            </div>

            <div class="admin-progress-track">

                <div
                    class="admin-progress-fill"
                    style="width: <?= max(0, min(100, (int) $row["percent"])) ?>%;"
                ></div>

            </div>

        </div>


        <!-- =================================================
             FORM
        ================================================== -->

        <form action="learning.php" method="POST">

            <?= csrfField() ?>

            <?= crudFieldsHtml($state["def"], $state["form"]) ?>

            <!-- BUTTON -->

            <div class="form-actions">

                <button
                    type="submit"
                    class="admin-save-btn"
                >
                    💾 Simpan Perubahan
                </button>

                <a
                    href="../index.php#learning"
                    class="admin-preview-btn"
                >
                    👁️ Lihat Progress
                </a>

            </div>

        </form>

    </div>

</div>


<?php

/* =========================================================
   FOOTER
========================================================= */

require_once __DIR__ . "/../includes/Footer.php";

?>
