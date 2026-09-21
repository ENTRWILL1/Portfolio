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
   HEADER & SIDEBAR
========================================================= */

require_once __DIR__ . "/../includes/Header.php";

require_once __DIR__ . "/../includes/Sidebar.php";


/* =========================================================
   DATA SKILLS (sama dengan yang tampil di portfolio)
========================================================= */

$skills = [
    ['icon' => '🌐', 'nama' => 'HTML',       'level' => 'Beginner'],
    ['icon' => '🎨', 'nama' => 'CSS',        'level' => 'Beginner'],
    ['icon' => '⚡', 'nama' => 'JavaScript', 'level' => 'Beginner'],
    ['icon' => '🐍', 'nama' => 'Python',     'level' => 'Beginner'],
];

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
                Atur daftar skills dan kemampuan yang ditampilkan pada portfolio kamu.
            </p>

        </div>

    </div>


    <div class="admin-toolbar">

        <div>

            <h2>
                Daftar Skills
            </h2>

            <p>
                Skills yang saat ini ada di portfolio.
            </p>

        </div>

        <button
            type="button"
            class="admin-save-btn"
        >
            ➕ Tambah Skill
        </button>

    </div>


    <div class="admin-skill-grid">

        <?php foreach ($skills as $skill): ?>

            <article class="admin-skill-card">

                <div class="admin-skill-top">

                    <div class="admin-skill-icon">
                        <?= $skill['icon'] ?>
                    </div>

                    <div>

                        <h2>
                            <?= htmlspecialchars($skill['nama']) ?>
                        </h2>

                        <span class="admin-skill-level">
                            <?= htmlspecialchars($skill['level']) ?>
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

        <?php endforeach; ?>

    </div>

</div>


<?php

/* =========================================================
   FOOTER
========================================================= */

require_once __DIR__ . "/../includes/Footer.php";

?>
