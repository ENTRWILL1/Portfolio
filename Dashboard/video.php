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

$state = crudHandleSingle("video", "video.php");
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
     VIDEO CONTENT
========================================================= -->

<div class="dashboard-content">

    <div class="dashboard-header">

        <div>

            <span class="dashboard-label">
                🎬 VIDEO
            </span>

            <h1>
                Kelola Video
            </h1>

            <p>
                Atur video showcase yang ditampilkan pada portfolio.
            </p>

        </div>

    </div>


    <!-- PESAN STATUS -->

    <?= crudAlertsHtml($state) ?>


    <!-- =====================================================
         VIDEO PREVIEW
    ====================================================== -->

    <div class="admin-video-card">

        <div class="admin-video-preview">

            <video
                controls
                preload="metadata"
            >
                <source
                    src="../<?= e(assetUrl($row["file"])) ?>"
                    type="video/mp4"
                >

                Browser kamu tidak mendukung pemutar video.
            </video>

        </div>

        <div class="admin-video-info">

            <span class="dashboard-label">
                🎬 CURRENT VIDEO
            </span>

            <h2>
                <?= e($row["title"]) ?>
            </h2>

            <p>
                <?= e($row["description"]) ?>
            </p>

        </div>

    </div>


    <!-- =====================================================
         VIDEO FORM
    ====================================================== -->

    <div class="admin-form-card">

        <div class="admin-form-header">

            <div>

                <span class="dashboard-label">
                    ✏️ EDIT VIDEO
                </span>

                <h2>
                    Informasi Video
                </h2>

            </div>

        </div>

        <form action="video.php" method="POST">

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
                    href="../index.php#video-edit"
                    class="admin-preview-btn"
                >
                    👁️ Lihat Video
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
