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

?>


<!-- =========================================================
     LEARNING PROGRESS CONTENT
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
                60%
            </span>

        </div>


        <!-- PREVIEW PROGRESS -->

        <div class="admin-progress-preview">

            <div class="admin-progress-header">

                <strong>
                    Web Development, Game Development, and UI Design
                </strong>

                <span>
                    60%
                </span>

            </div>

            <div class="admin-progress-track">

                <div
                    class="admin-progress-fill"
                    style="width: 60%;"
                ></div>

            </div>

        </div>


        <!-- =================================================
             FORM
        ================================================== -->

        <form action="" method="POST">


            <!-- JUDUL -->

            <div class="form-group">

                <label for="learningTitle">
                    Judul Pembelajaran
                </label>

                <input
                    type="text"
                    id="learningTitle"
                    name="learningTitle"
                    value="Web Development, Game Development, and UI Design"
                >

            </div>


            <!-- PERCENT -->

            <div class="form-group">

                <label for="learningPercent">
                    Persentase Progress
                </label>

                <input
                    type="number"
                    id="learningPercent"
                    name="learningPercent"
                    value="60"
                    min="0"
                    max="100"
                >

            </div>


            <!-- DESCRIPTION -->

            <div class="form-group">

                <label for="learningDescription">
                    Deskripsi
                </label>

                <textarea
                    id="learningDescription"
                    name="learningDescription"
                    rows="6"
                >Sedang mempelajari HTML, CSS, JavaScript, DOM, pembuatan game, UI Design, dan dasar-dasar pengembangan website.</textarea>

            </div>


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