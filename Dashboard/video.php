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
                    src="../My Video.mp4"
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
                My Video
            </h2>

            <p>
                Video yang saat ini digunakan sebagai
                video showcase pada portfolio.
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


        <form action="" method="POST">


            <!-- JUDUL -->

            <div class="form-group">

                <label for="videoTitle">
                    Judul Video
                </label>

                <input
                    type="text"
                    id="videoTitle"
                    name="videoTitle"
                    value="My Video"
                >

            </div>


            <!-- LABEL -->

            <div class="form-group">

                <label for="videoLabel">
                    Label
                </label>

                <input
                    type="text"
                    id="videoLabel"
                    name="videoLabel"
                    value="MY EDIT"
                >

            </div>


            <!-- DESKRIPSI -->

            <div class="form-group">

                <label for="videoDescription">
                    Deskripsi
                </label>

                <textarea
                    id="videoDescription"
                    name="videoDescription"
                    rows="5"
                >Video showcase project dan hasil edit yang saya buat.</textarea>

            </div>


            <!-- FILE VIDEO -->

            <div class="form-group">

                <label for="videoFile">
                    File Video
                </label>

                <input
                    type="text"
                    id="videoFile"
                    name="videoFile"
                    value="My Video.mp4"
                >

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