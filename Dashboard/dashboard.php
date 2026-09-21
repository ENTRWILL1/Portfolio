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
     DASHBOARD CONTENT
========================================================= -->

<div class="dashboard-content">

    <div class="dashboard-header">

        <div>

            <span class="dashboard-label">
                🌿 ADMIN PANEL
            </span>

            <h1>
                Selamat Datang di Dashboard 👋
            </h1>

            <p>
                Kelola isi portfolio kamu melalui halaman ini.
            </p>

        </div>

    </div>


    <!-- =====================================================
         DASHBOARD CARDS
    ====================================================== -->

    <div class="dashboard-grid">


        <a href="profil.php" class="dashboard-card">

            <div class="dashboard-card-icon">
                👤
            </div>

            <div>

                <h2>Profil</h2>

                <p>
                    Kelola informasi profil portfolio.
                </p>

            </div>

        </a>


        <a href="projects.php" class="dashboard-card">

            <div class="dashboard-card-icon">
                🚀
            </div>

            <div>

                <h2>Projects</h2>

                <p>
                    Kelola project yang ditampilkan.
                </p>

            </div>

        </a>


        <a href="skills.php" class="dashboard-card">

            <div class="dashboard-card-icon">
                ⚡
            </div>

            <div>

                <h2>Skills</h2>

                <p>
                    Kelola daftar skills dan kemampuan.
                </p>

            </div>

        </a>


        <a href="learning.php" class="dashboard-card">

            <div class="dashboard-card-icon">
                📚
            </div>

            <div>

                <h2>Learning Progress</h2>

                <p>
                    Kelola perkembangan pembelajaran.
                </p>

            </div>

        </a>


        <a href="experience.php" class="dashboard-card">

            <div class="dashboard-card-icon">
                💻
            </div>

            <div>

                <h2>Experience</h2>

                <p>
                    Kelola pengalaman dan aktivitas.
                </p>

            </div>

        </a>


        <a href="education.php" class="dashboard-card">

            <div class="dashboard-card-icon">
                🎓
            </div>

            <div>

                <h2>Education</h2>

                <p>
                    Kelola riwayat pendidikan.
                </p>

            </div>

        </a>


        <a href="video.php" class="dashboard-card">

            <div class="dashboard-card-icon">
                🎬
            </div>

            <div>

                <h2>Video</h2>

                <p>
                    Kelola video showcase.
                </p>

            </div>

        </a>


        <a href="gallery.php" class="dashboard-card">

            <div class="dashboard-card-icon">
                🖼️
            </div>

            <div>

                <h2>Gallery</h2>

                <p>
                    Kelola foto dan gallery.
                </p>

            </div>

        </a>


    </div>

</div>


<?php

/* =========================================================
   FOOTER
========================================================= */

require_once __DIR__ . "/../includes/Footer.php";

?>