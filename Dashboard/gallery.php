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


    <!-- =====================================================
         GALLERY TOOLBAR
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

        <button
            type="button"
            class="admin-save-btn"
        >
            ➕ Tambah Gambar
        </button>

    </div>


    <!-- =====================================================
         GALLERY GRID
    ====================================================== -->

    <div class="admin-gallery-grid">


        <!-- IMAGE 1 -->

        <article class="admin-gallery-card">

            <div class="admin-gallery-image">

                <img
                    src="../Gallery/code.jpg"
                    alt="Gallery code"
                >

            </div>

            <div class="admin-gallery-info">

                <span>
                    01
                </span>

                <h2>
                    code.jpg
                </h2>

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


        <!-- IMAGE 2 -->

        <article class="admin-gallery-card">

            <div class="admin-gallery-image">

                <img
                    src="../Gallery/code1.jpg"
                    alt="Gallery code 1"
                >

            </div>

            <div class="admin-gallery-info">

                <span>
                    02
                </span>

                <h2>
                    code1.jpg
                </h2>

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


        <!-- IMAGE 3 -->

        <article class="admin-gallery-card">

            <div class="admin-gallery-image">

                <img
                    src="../Gallery/code2.jpg"
                    alt="Gallery code 2"
                >

            </div>

            <div class="admin-gallery-info">

                <span>
                    03
                </span>

                <h2>
                    code2.jpg
                </h2>

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


        <!-- IMAGE 4 -->

        <article class="admin-gallery-card">

            <div class="admin-gallery-image">

                <img
                    src="../Gallery/3.jpg"
                    alt="Gallery 3"
                >

            </div>

            <div class="admin-gallery-info">

                <span>
                    04
                </span>

                <h2>
                    3.jpg
                </h2>

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


        <!-- IMAGE 5 -->

        <article class="admin-gallery-card">

            <div class="admin-gallery-image">

                <img
                    src="../Gallery/4.jpg"
                    alt="Gallery 4"
                >

            </div>

            <div class="admin-gallery-info">

                <span>
                    05
                </span>

                <h2>
                    4.jpg
                </h2>

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


        <!-- IMAGE 6 -->

        <article class="admin-gallery-card">

            <div class="admin-gallery-image">

                <img
                    src="../Gallery/5.jpg"
                    alt="Gallery 5"
                >

            </div>

            <div class="admin-gallery-info">

                <span>
                    06
                </span>

                <h2>
                    5.jpg
                </h2>

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


        <!-- IMAGE 7 -->

        <article class="admin-gallery-card">

            <div class="admin-gallery-image">

                <img
                    src="../Gallery/6.jpg"
                    alt="Gallery 6"
                >

            </div>

            <div class="admin-gallery-info">

                <span>
                    07
                </span>

                <h2>
                    6.jpg
                </h2>

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


        <!-- IMAGE 8 -->

        <article class="admin-gallery-card">

            <div class="admin-gallery-image">

                <img
                    src="../Gallery/7.jpg"
                    alt="Gallery 7"
                >

            </div>

            <div class="admin-gallery-info">

                <span>
                    08
                </span>

                <h2>
                    7.jpg
                </h2>

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


        <!-- IMAGE 9 -->

        <article class="admin-gallery-card">

            <div class="admin-gallery-image">

                <img
                    src="../Gallery/8.jpg"
                    alt="Gallery 8"
                >

            </div>

            <div class="admin-gallery-info">

                <span>
                    09
                </span>

                <h2>
                    8.jpg
                </h2>

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


        <!-- IMAGE 10 -->

        <article class="admin-gallery-card">

            <div class="admin-gallery-image">

                <img
                    src="../Gallery/9.jpg"
                    alt="Gallery 9"
                >

            </div>

            <div class="admin-gallery-info">

                <span>
                    10
                </span>

                <h2>
                    9.jpg
                </h2>

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