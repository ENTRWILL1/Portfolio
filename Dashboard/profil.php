<?php

/* =========================================================
   🔐 CEK LOGIN ADMIN
========================================================= */

require_once __DIR__ . "/../includes/guard.php";
require_once __DIR__ . "/../includes/helpers.php";
require_once __DIR__ . "/../includes/profile.php";


/* =========================================================
   💾 DATA PROFIL & PROSES SIMPAN
   (semua ini harus di atas, sebelum ada output HTML,
   karena setelah simpan halaman di-redirect)
========================================================= */

$profile   = profileDefaults();   // data yang tersimpan
$dbProblem = null;                // pesan kalau database bermasalah
$errors    = [];                  // pesan kesalahan isian

$pdo = getDb();

if ($pdo === null) {

    $dbProblem = dbHint();

} else {

    try {

        $row = fetchProfile($pdo);

        if ($row !== null) {
            $profile = $row;
        }

    } catch (Throwable $e) {

        error_log("Baca profil gagal: " . $e->getMessage());

        $dbProblem = "Tabel profil belum dibuat. Buka database/setup.php satu kali di browser.";
    }
}

$form = $profile;   // isi kolom form (berubah jika ada kiriman)

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (!csrfValid()) {

        $errors[] = "Formulir sudah kedaluwarsa. Muat ulang halaman lalu coba lagi.";

    } else {

        [$data, $errors] = validateProfileInput($_POST, dirname(__DIR__));

        $form = $data;

        if ($errors === [] && $dbProblem !== null) {
            $errors[] = "Belum bisa menyimpan karena database belum siap.";
        }

        if ($errors === []) {

            try {

                saveProfile($pdo, $data);

                header("Location: profil.php?saved=1");
                exit;

            } catch (Throwable $e) {

                error_log("Simpan profil gagal: " . $e->getMessage());

                $errors[] = "Gagal menyimpan ke database. Coba lagi.";
            }
        }
    }
}

$saved = $_SERVER["REQUEST_METHOD"] === "GET"
    && ($_GET["saved"] ?? "") === "1";


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
         PESAN STATUS
    ====================================================== -->

    <?php if ($saved): ?>

        <div class="admin-alert admin-alert-success" role="status">
            ✅ Profil berhasil disimpan.
            <a href="../index.php">Lihat di portfolio</a>
        </div>

    <?php endif; ?>

    <?php if ($dbProblem !== null): ?>

        <div class="admin-alert admin-alert-warning" role="alert">
            ⚠️ <?= e($dbProblem) ?>
        </div>

    <?php endif; ?>

    <?php if ($errors !== []): ?>

        <div class="admin-alert admin-alert-error" role="alert">

            <strong>Perubahan belum disimpan:</strong>

            <ul>
                <?php foreach ($errors as $pesan): ?>
                    <li><?= e($pesan) ?></li>
                <?php endforeach; ?>
            </ul>

        </div>

    <?php endif; ?>


    <!-- =====================================================
         PROFILE CARD
    ====================================================== -->

    <div class="admin-profile-card">

        <div class="admin-profile-image">

            <img
                src="../<?= e(assetUrl($profile["foto"])) ?>"
                alt="Foto Profil <?= e($profile["nama"]) ?>"
            >

        </div>


        <div class="admin-profile-info">

            <span class="profile-status">
                ✦ Available for learning & creating
            </span>

            <h2>
                <?= e($profile["nama"]) ?>
            </h2>

            <p class="profile-username">
                <?= e($profile["username"]) ?>
            </p>

            <div class="profile-badges">

                <?php if ($profile["role"] !== ""): ?>
                    <span>
                        <?= e($profile["role"]) ?>
                    </span>
                <?php endif; ?>

                <?php if ($profile["lokasi"] !== ""): ?>
                    <span>
                        📍 <?= e($profile["lokasi"]) ?>
                    </span>
                <?php endif; ?>

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


        <form action="profil.php" method="POST">

            <?= csrfField() ?>


            <!-- NAMA -->

            <div class="form-group">

                <label for="nama">
                    Nama Lengkap
                </label>

                <input
                    type="text"
                    id="nama"
                    name="nama"
                    maxlength="80"
                    required
                    value="<?= e($form["nama"]) ?>"
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
                    maxlength="60"
                    value="<?= e($form["username"]) ?>"
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
                    maxlength="100"
                    value="<?= e($form["role"]) ?>"
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
                    maxlength="100"
                    value="<?= e($form["lokasi"]) ?>"
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
                    maxlength="500"
                ><?= e($form["bio"]) ?></textarea>

                <span class="form-hint">
                    Maksimal 500 karakter.
                </span>

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
                    maxlength="255"
                    required
                    value="<?= e($form["foto"]) ?>"
                >

                <span class="form-hint">
                    Nama file gambar yang ada di folder project, misalnya
                    Mario.jpg atau Gallery/3.jpg.
                </span>

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
