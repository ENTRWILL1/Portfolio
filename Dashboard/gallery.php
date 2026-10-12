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

$state = crudHandle("gallery", "gallery.php");


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
     GALLERY CONTENT
========================================================= -->

<div class="dashboard-content">

    <div class="dashboard-header">

        <div>

            <span class="dashboard-label">
                🖼️ GALLERY
            </span>

            <h1>
                Kelola Gallery
            </h1>

            <p>
                Atur foto dan gambar yang ditampilkan
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
                Gallery Portfolio
            </h2>

            <p>
                Gambar yang saat ini digunakan pada gallery.
            </p>

        </div>

        <a
            href="gallery.php?new=1#form-crud"
            class="admin-save-btn"
        >
            ➕ Tambah Gambar
        </a>

    </div>


    <!-- =====================================================
         FORM TAMBAH / EDIT
    ====================================================== -->

    <?= crudFormCardHtml($state, "gallery.php") ?>


    <!-- =====================================================
         LIST
    ====================================================== -->

    <?php if ($state["dbProblem"] === null && $state["items"] === []): ?>

        <div class="admin-alert admin-alert-warning">
            Belum ada gambar. Klik <strong>➕ Tambah Gambar</strong> untuk menambahkan.
        </div>

    <?php endif; ?>

    <div class="admin-gallery-grid">

        <?php foreach ($state["items"] as $i => $img): ?>

            <?php $nama = $img["title"] !== "" ? $img["title"] : basename($img["file"]); ?>

            <article class="admin-gallery-card">

                <div class="admin-gallery-image">
                    <img
                        src="../<?= e(assetUrl($img["file"])) ?>"
                        alt="<?= e($nama) ?>"
                    >
                </div>

                <div class="admin-gallery-info">

                    <span>
                        <?= str_pad((string) ($i + 1), 2, "0", STR_PAD_LEFT) ?>
                    </span>

                    <h2>
                        <?= e($nama) ?>
                    </h2>

                    <div class="admin-card-actions">

                        <a
                            href="gallery.php?edit=<?= (int) $img["_id"] ?>#form-crud"
                            class="admin-edit-btn"
                        >
                            ✏️ Edit
                        </a>

                        <?= crudDeleteFormHtml("gallery.php", $img["_id"], $nama) ?>

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
