<?php

/* =========================================================
   🔐 CEK LOGIN ADMIN
========================================================= */

require_once "../includes/auth.php";


/* =========================================================
   🌿 TANDA HALAMAN DASHBOARD
========================================================= */

$isDashboard = true;


/* =========================================================
   HEADER
========================================================= */

require_once "../includes/Header.php";


/* =========================================================
   SIDEBAR
========================================================= */

require_once "../includes/Sidebar.php";

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

        <button
            type="button"
            class="admin-save-btn"
        >
            ➕ Tambah Project
        </button>

    </div>


    <!-- =====================================================
         PROJECT LIST
    ====================================================== -->

    <div class="admin-project-grid">


        <!-- PROJECT 1 -->

        <article class="admin-project-card">

            <div class="admin-project-top">

                <div class="admin-project-icon">
                    🎮
                </div>

                <span class="admin-project-number">
                    01
                </span>

            </div>

            <h2>
                Runner Game
            </h2>

            <p>
                Game runner sederhana dengan sistem score,
                lives, obstacle, jump, dan audio.
            </p>

            <div class="admin-tech-list">

                <span>HTML</span>
                <span>CSS</span>
                <span>JavaScript</span>

            </div>

            <div class="admin-card-actions">

                <a
                    href="#"
                    class="admin-preview-btn"
                >
                    👁️ Preview
                </a>

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

        </article>


        <!-- PROJECT 2 -->

        <article class="admin-project-card">

            <div class="admin-project-top">

                <div class="admin-project-icon">
                    ✊
                </div>

                <span class="admin-project-number">
                    02
                </span>

            </div>

            <h2>
                Rock Paper Scissors
            </h2>

            <p>
                Game batu, gunting, kertas dengan sistem
                skor dan interaksi JavaScript.
            </p>

            <div class="admin-tech-list">

                <span>HTML</span>
                <span>CSS</span>
                <span>JavaScript</span>

            </div>

            <div class="admin-card-actions">

                <a
                    href="#"
                    class="admin-preview-btn"
                >
                    👁️ Preview
                </a>

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

        </article>


        <!-- PROJECT 3 -->

        <article class="admin-project-card">

            <div class="admin-project-top">

                <div class="admin-project-icon">
                    🌐
                </div>

                <span class="admin-project-number">
                    03
                </span>

            </div>

            <h2>
                Technology Article
            </h2>

            <p>
                Website artikel mengenai teknologi dan
                manfaat olahraga dengan desain modern.
            </p>

            <div class="admin-tech-list">

                <span>HTML</span>
                <span>CSS</span>

            </div>

            <div class="admin-card-actions">

                <a
                    href="#"
                    class="admin-preview-btn"
                >
                    👁️ Preview
                </a>

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

        </article>


    </div>

</div>


<?php

/* =========================================================
   FOOTER
========================================================= */

require_once "../includes/Footer.php";

?>