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

$state = crudHandleSingle("contact", "contact.php");
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
     CONTACT CONTENT
========================================================= -->

<div class="dashboard-content">

    <div class="dashboard-header">

        <div>

            <span class="dashboard-label">
                📬 CONTACT
            </span>

            <h1>
                Kelola Contact
            </h1>

            <p>
                Atur email dan media sosial yang ditampilkan pada bagian Contact & Socials.
            </p>

        </div>

    </div>


    <!-- PESAN STATUS -->

    <?= crudAlertsHtml($state) ?>


    <!-- =====================================================
         CONTACT SAAT INI
    ====================================================== -->

    <div class="admin-form-card">

        <div class="admin-form-header">

            <div>

                <span class="dashboard-label">
                    📬 CURRENT CONTACT
                </span>

                <h2>
                    Kontak Saat Ini
                </h2>

            </div>

        </div>

        <p>
            ✉️ <a href="mailto:<?= e($row["email"]) ?>"><?= e($row["email"]) ?></a>
        </p>

        <?php if ($row["github"] !== ""): ?>
            <p>
                🐙 <a href="<?= e($row["github"]) ?>" target="_blank" rel="noopener noreferrer"><?= e($row["github"]) ?></a>
            </p>
        <?php endif; ?>

        <?php if ($row["instagram"] !== ""): ?>
            <p>
                📸 <a href="<?= e($row["instagram"]) ?>" target="_blank" rel="noopener noreferrer"><?= e($row["instagram"]) ?></a>
            </p>
        <?php endif; ?>

    </div>


    <!-- =====================================================
         CONTACT FORM
    ====================================================== -->

    <div class="admin-form-card">

        <div class="admin-form-header">

            <div>

                <span class="dashboard-label">
                    ✏️ EDIT CONTACT
                </span>

                <h2>
                    Informasi Contact
                </h2>

            </div>

        </div>

        <form action="contact.php" method="POST">

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
                    href="../index.php#contact"
                    class="admin-preview-btn"
                >
                    👁️ Lihat Contact
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
