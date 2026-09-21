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

        <button
            type="button"
            class="admin-save-btn"
        >
            ➕ Tambah Skill
        </button>

    </div>


    <!-- =====================================================
         SKILLS GRID
    ====================================================== -->

    <div class="admin-skill-grid">


        <!-- HTML -->

        <article class="admin-skill-card">

            <div class="admin-skill-icon">
                🌐
            </div>

            <div class="admin-skill-info">

                <div>

                    <h2>
                        HTML
                    </h2>

                    <span>
                        Beginner
                    </span>

                </div>

            </div>

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

        </article>


        <!-- CSS -->

        <article class="admin-skill-card">

            <div class="admin-skill-icon">
                🎨
            </div>

            <div class="admin-skill-info">

                <div>

                    <h2>
                        CSS
                    </h2>

                    <span>
                        Beginner
                    </span>

                </div>

            </div>

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

        </article>


        <!-- JAVASCRIPT -->

        <article class="admin-skill-card">

            <div class="admin-skill-icon">
                ⚡
            </div>

            <div class="admin-skill-info">

                <div>

                    <h2>
                        JavaScript
                    </h2>

                    <span>
                        Beginner
                    </span>

                </div>

            </div>

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

        </article>


        <!-- PYTHON -->

        <article class="admin-skill-card">

            <div class="admin-skill-icon">
                🐍
            </div>

            <div class="admin-skill-info">

                <div>

                    <h2>
                        Python
                    </h2>

                    <span>
                        Beginner
                    </span>

                </div>

            </div>

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

        </article>


    </div>

</div>


<?php

/* =========================================================
   FOOTER
========================================================= */

require_once "../includes/Footer.php";

?>