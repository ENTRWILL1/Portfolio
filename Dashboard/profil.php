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
     PROFILE CONTENT
========================================================= -->

<div class="dashboard-content">

    <div class="dashboard-header">

        <div>

            <span class="dashboard-label">
                👤 PROFILE
            </span>

            <h1>
                Kelola Profil
            </h1>

            <p>
                Atur informasi yang ditampilkan pada portfolio kamu.
            </p>

        </div>

    </div>


    <!-- =====================================================
         PROFILE CARD
    ====================================================== -->

    <div class="admin-profile-card">

        <div class="admin-profile-image">

            <img
                src="../Mario.jpg"
                alt="Foto Profil Willy Alfaro D.P"
            >

        </div>


        <div class="admin-profile-info">

            <span class="profile-status">
                ✦ Available for learning & creating
            </span>

            <h2>
                Willy Alfaro D.P
            </h2>

            <p class="profile-username">
                @willyalfarodwitamaputra
            </p>

            <div class="profile-badges">

                <span>
                    Student | Web & Game Developer
                </span>

                <span>
                    📍 Tenggarong Seberang, Indonesia
                </span>

            </div>

        </div>

    </div>


    <!-- =====================================================
         PROFILE FORM
    ====================================================== -->

    <div class="admin-form-card">

        <div class="admin-form-header">

            <div>

                <span class="dashboard-label">
                    ✏️ EDIT PROFILE
                </span>

                <h2>
                    Informasi Profile
                </h2>

            </div>

        </div>


        <form action="" method="POST">


            <!-- NAMA -->

            <div class="form-group">

                <label for="nama">
                    Nama Lengkap
                </label>

                <input
                    type="text"
                    id="nama"
                    name="nama"
                    value="Willy Alfaro D.P"
                >

            </div>


            <!-- USERNAME -->

            <div class="form-group">

                <label for="username">
                    Username
                </label>

                <input
                    type="text"
                    id="username"
                    name="username"
                    value="@willyalfarodwitamaputra"
                >

            </div>


            <!-- ROLE -->

            <div class="form-group">

                <label for="role">
                    Role
                </label>

                <input
                    type="text"
                    id="role"
                    name="role"
                    value="Student | Web & Game Developer"
                >

            </div>


            <!-- LOKASI -->

            <div class="form-group">

                <label for="lokasi">
                    Lokasi
                </label>

                <input
                    type="text"
                    id="lokasi"
                    name="lokasi"
                    value="Tenggarong Seberang, Indonesia"
                >

            </div>


            <!-- BIO -->

            <div class="form-group">

                <label for="bio">
                    Bio
                </label>

                <textarea
                    id="bio"
                    name="bio"
                    rows="5"
                >Saya pelajar PPLG yang sedang belajar membuat website, game, dan berbagai project kreatif.</textarea>

            </div>


            <!-- FOTO -->

            <div class="form-group">

                <label for="foto">
                    Foto Profil
                </label>

                <input
                    type="text"
                    id="foto"
                    name="foto"
                    value="Mario.jpg"
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
                    href="../index.php"
                    class="admin-preview-btn"
                >
                    👁️ Lihat Portfolio
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