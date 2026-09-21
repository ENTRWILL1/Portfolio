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
     EDUCATION CONTENT
========================================================= -->

<div class="dashboard-content">

    <div class="dashboard-header">

        <div>

            <span class="dashboard-label">
                🎓 EDUCATION
            </span>

            <h1>
                Kelola Education
            </h1>

            <p>
                Atur riwayat pendidikan yang ditampilkan
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
                Riwayat Pendidikan
            </h2>

            <p>
                Pendidikan yang saat ini ada di portfolio.
            </p>

        </div>

        <button
            type="button"
            class="admin-save-btn"
        >
            ➕ Tambah Education
        </button>

    </div>


    <!-- =====================================================
         EDUCATION LIST
    ====================================================== -->

    <div class="admin-timeline-grid">


        <!-- EDUCATION 1 -->

        <article class="admin-timeline-card">

            <div class="admin-timeline-icon">
                🎈
            </div>

            <div class="admin-timeline-content">

                <span class="admin-timeline-year">
                    2014 - 2015
                </span>

                <h2>
                    Taman Kanak-Kanak
                </h2>

                <h3>
                    Pendidikan Anak Dini
                </h3>

                <p>
                    Masa awal mengenal lingkungan sekolah,
                    bersosialisasi, dan mengasah kreativitas dasar.
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


        <!-- EDUCATION 2 -->

        <article class="admin-timeline-card">

            <div class="admin-timeline-icon">
                🏫
            </div>

            <div class="admin-timeline-content">

                <span class="admin-timeline-year">
                    2015 - 2021
                </span>

                <h2>
                    SDN 029 Tenggarong Seberang
                </h2>

                <h3>
                    Pendidikan Dasar
                </h3>

                <p>
                    Menyelesaikan pendidikan dasar serta membangun
                    fondasi kemampuan akademis dan karakter.
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


        <!-- EDUCATION 3 -->

        <article class="admin-timeline-card">

            <div class="admin-timeline-icon">
                📚
            </div>

            <div class="admin-timeline-content">

                <span class="admin-timeline-year">
                    2021 - 2024
                </span>

                <h2>
                    SMPN 1 Tenggarong Seberang
                </h2>

                <h3>
                    Pendidikan Menengah Pertama
                </h3>

                <p>
                    Mengembangkan minat dalam bidang teknologi,
                    logika, serta aktif dalam kegiatan sekolah.
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


        <!-- EDUCATION 4 -->

        <article class="admin-timeline-card">

            <div class="admin-timeline-icon">
                🎓
            </div>

            <div class="admin-timeline-content">

                <span class="admin-timeline-year">
                    2025 - Sekarang
                </span>

                <h2>
                    SMKTI Airlangga Samarinda
                </h2>

                <h3>
                    Pengembangan Perangkat Lunak dan Gim (PPLG)
                </h3>

                <p>
                    Mempelajari dasar pemrograman, pengembangan
                    website, game development, dan teknologi digital.
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

require_once "../includes/Footer.php";

?>