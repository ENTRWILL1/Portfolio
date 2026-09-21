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

        <button
            type="button"
            class="admin-save-btn"
        >
            ➕ Tambah Experience
        </button>

    </div>


    <!-- =====================================================
         EXPERIENCE LIST
    ====================================================== -->

    <div class="admin-timeline-grid">


        <!-- EXPERIENCE 1 -->

        <article class="admin-timeline-card">

            <div class="admin-timeline-icon">
                💻
            </div>

            <div class="admin-timeline-content">

                <span class="admin-timeline-year">
                    2026
                </span>

                <h2>
                    Student Developer
                </h2>

                <h3>
                    Personal & School Projects
                </h3>

                <p>
                    Mengerjakan berbagai project website,
                    game sederhana, dan eksperimen menggunakan
                    HTML, CSS, JavaScript, dan Python.
                </p>

                <div class="admin-card-actions">

                    <button
                        type="button"
                        class="admin-edit-btn"
                    >
                        ✏️ Edit
                    </button>

                    <button
                        type="button"
                        class="admin-delete-btn"
                    >
                        🗑️ Hapus
                    </button>

                </div>

            </div>

        </article>


        <!-- EXPERIENCE 2 -->

        <article class="admin-timeline-card">

            <div class="admin-timeline-icon">
                🎮
            </div>

            <div class="admin-timeline-content">

                <span class="admin-timeline-year">
                    2026
                </span>

                <h2>
                    Game Developer Learner
                </h2>

                <h3>
                    Personal Project
                </h3>

                <p>
                    Mempelajari pembuatan game sederhana dengan
                    sistem movement, score, obstacle, lives,
                    audio, dan interaksi pemain.
                </p>

                <div class="admin-card-actions">

                    <button
                        type="button"
                        class="admin-edit-btn"
                    >
                        ✏️ Edit
                    </button>

                    <button
                        type="button"
                        class="admin-delete-btn"
                    >
                        🗑️ Hapus
                    </button>

                </div>

            </div>

        </article>


    </div>

</div>


<?php

/* =========================================================
   FOOTER
========================================================= */

require_once __DIR__ . "/../includes/Footer.php";

?>