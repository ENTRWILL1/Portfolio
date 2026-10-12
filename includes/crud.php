<?php

/*
|--------------------------------------------------------------------------
| CRUD DASHBOARD (Create, Read, Update, Delete)
|--------------------------------------------------------------------------
| Dipakai oleh Dashboard/projects.php, skills.php, education.php,
| experience.php, gallery.php (daftar: tambah, edit, hapus) dan
| learning.php, video.php (satu data: simpan perubahan).
|
| Cara kerja singkat:
|   1. crudDefs()      -> daftar tabel + kolom yang dikelola (edit di sini
|                         kalau mau menambah / mengubah kolom).
|   2. crudResolve()   -> mencocokkan kolom tabel yang SUDAH ADA di
|                         phpMyAdmin dengan kolom di atas (nama kolom boleh
|                         beda, mis. "judul" untuk title). Tabel / kolom yang
|                         belum ada dibuat otomatis. Data yang sudah ada tidak
|                         dihapus atau diubah.
|   3. crudHandle()    -> memproses form POST (simpan / hapus) lalu redirect.
|
| Semua query memakai prepared statement, semua form memakai token CSRF.
*/

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/profile.php';   // bersihkanBaris(), bersihkanParagraf()
require_once __DIR__ . '/helpers.php';   // e(), csrfField(), csrfValid(), assetUrl()


/*
|--------------------------------------------------------------------------
| DEFINISI TABEL
|--------------------------------------------------------------------------
| type : text | textarea | select | number | list | link | file
| alias: nama kolom lain yang dianggap sama (kalau tabel kamu sudah ada)
| seed : data awal, hanya dimasukkan SEKALI kalau tabelnya masih kosong
*/

function crudDefs(): array
{
    static $defs = null;

    if ($defs !== null) {
        return $defs;
    }

    $gambar = [];

    foreach (['code', 'code1', 'code2', '3', '4', '5', '6', '7', '8', '9'] as $nama) {
        $gambar[] = ['title' => $nama . '.jpg', 'file' => 'Gallery/' . $nama . '.jpg'];
    }

    $defs = [

        'skills' => [
            'label'  => 'Skill',
            'mode'   => 'list',
            'fields' => [
                'nama' => [
                    'label' => 'Nama Skill', 'type' => 'text', 'max' => 60, 'required' => true,
                    'sql'   => "VARCHAR(60) NOT NULL DEFAULT ''",
                    'alias' => ['name', 'skill', 'skill_name', 'judul', 'title'],
                    'hint'  => 'Contoh: HTML, CSS, Python',
                ],
                'icon' => [
                    'label' => 'Ikon (emoji)', 'type' => 'text', 'max' => 10, 'default' => '⚡',
                    'sql'   => "VARCHAR(20) NOT NULL DEFAULT ''",
                    'alias' => ['ikon', 'emoji'],
                    'hint'  => 'Satu emoji, contoh: 🌐',
                ],
                'level' => [
                    'label' => 'Level', 'type' => 'select', 'free' => true, 'max' => 30,
                    'options' => ['Beginner', 'Intermediate', 'Advanced'], 'default' => 'Beginner',
                    'sql'   => "VARCHAR(30) NOT NULL DEFAULT 'Beginner'",
                    'alias' => ['tingkat', 'keahlian', 'proficiency'],
                ],
            ],
            'seed' => [
                ['nama' => 'HTML', 'icon' => '🌐', 'level' => 'Beginner'],
                ['nama' => 'CSS', 'icon' => '🎨', 'level' => 'Beginner'],
                ['nama' => 'JavaScript', 'icon' => '⚡', 'level' => 'Beginner'],
                ['nama' => 'Python', 'icon' => '🐍', 'level' => 'Beginner'],
            ],
        ],

        'education' => [
            'label'  => 'Pendidikan',
            'mode'   => 'list',
            'fields' => [
                'icon' => [
                    'label' => 'Ikon (emoji)', 'type' => 'text', 'max' => 10, 'default' => '🎓',
                    'sql'   => "VARCHAR(20) NOT NULL DEFAULT ''",
                    'alias' => ['ikon', 'emoji'],
                ],
                'tahun' => [
                    'label' => 'Tahun', 'type' => 'text', 'max' => 30, 'required' => true,
                    'sql'   => "VARCHAR(30) NOT NULL DEFAULT ''",
                    'alias' => ['year', 'periode', 'years'],
                    'hint'  => 'Contoh: 2025 - Sekarang',
                ],
                'sekolah' => [
                    'label' => 'Nama Sekolah', 'type' => 'text', 'max' => 120, 'required' => true,
                    'sql'   => "VARCHAR(120) NOT NULL DEFAULT ''",
                    'alias' => ['school', 'institusi', 'nama', 'title', 'judul'],
                ],
                'jurusan' => [
                    'label' => 'Jurusan / Jenjang', 'type' => 'text', 'max' => 150,
                    'sql'   => "VARCHAR(150) NOT NULL DEFAULT ''",
                    'alias' => ['major', 'program', 'jenjang'],
                ],
                'description' => [
                    'label' => 'Deskripsi', 'type' => 'textarea', 'max' => 500,
                    'sql'   => 'TEXT NULL',
                    'alias' => ['deskripsi', 'keterangan', 'detail'],
                ],
            ],
            'seed' => [
                ['icon' => '🎈', 'tahun' => '2014 - 2015', 'sekolah' => 'Taman Kanak-Kanak', 'jurusan' => 'Pendidikan Anak Dini', 'description' => 'Masa awal mengenal lingkungan sekolah, bersosialisasi, dan mengasah kreativitas dasar.'],
                ['icon' => '🏫', 'tahun' => '2015 - 2021', 'sekolah' => 'SDN 029 Tenggarong Seberang', 'jurusan' => 'Pendidikan Dasar', 'description' => 'Menyelesaikan pendidikan dasar serta membangun fondasi kemampuan akademis dan karakter.'],
                ['icon' => '📚', 'tahun' => '2021 - 2024', 'sekolah' => 'SMPN 1 Tenggarong Seberang', 'jurusan' => 'Pendidikan Menengah Pertama', 'description' => 'Mengembangkan minat dalam bidang teknologi, logika, serta aktif dalam kegiatan sekolah.'],
                ['icon' => '🎓', 'tahun' => '2025 - Sekarang', 'sekolah' => 'SMKTI Airlangga Samarinda', 'jurusan' => 'Pengembangan Perangkat Lunak dan Gim (PPLG)', 'description' => 'Mempelajari dasar pemrograman, pengembangan website, game development, dan teknologi digital.'],
            ],
        ],

        'experience' => [
            'label'  => 'Experience',
            'mode'   => 'list',
            'fields' => [
                'icon' => [
                    'label' => 'Ikon (emoji)', 'type' => 'text', 'max' => 10, 'default' => '💻',
                    'sql'   => "VARCHAR(20) NOT NULL DEFAULT ''",
                    'alias' => ['ikon', 'emoji'],
                ],
                'tahun' => [
                    'label' => 'Tahun', 'type' => 'text', 'max' => 30, 'required' => true,
                    'sql'   => "VARCHAR(30) NOT NULL DEFAULT ''",
                    'alias' => ['year', 'periode', 'years'],
                    'hint'  => 'Contoh: 2026',
                ],
                'posisi' => [
                    'label' => 'Posisi', 'type' => 'text', 'max' => 120, 'required' => true,
                    'sql'   => "VARCHAR(120) NOT NULL DEFAULT ''",
                    'alias' => ['position', 'jabatan', 'role', 'title', 'judul'],
                ],
                'tempat' => [
                    'label' => 'Tempat', 'type' => 'text', 'max' => 150,
                    'sql'   => "VARCHAR(150) NOT NULL DEFAULT ''",
                    'alias' => ['place', 'perusahaan', 'company', 'organisasi', 'lokasi'],
                ],
                'description' => [
                    'label' => 'Deskripsi', 'type' => 'textarea', 'max' => 500,
                    'sql'   => 'TEXT NULL',
                    'alias' => ['deskripsi', 'keterangan', 'detail'],
                ],
            ],
            'seed' => [
                ['icon' => '💻', 'tahun' => '2026', 'posisi' => 'Student Developer', 'tempat' => 'Personal & School Projects', 'description' => 'Mengerjakan berbagai project website, game sederhana, dan eksperimen menggunakan HTML, CSS, JavaScript, dan Python.'],
                ['icon' => '🎮', 'tahun' => '2026', 'posisi' => 'Game Developer Learner', 'tempat' => 'Personal Project', 'description' => 'Mempelajari pembuatan game sederhana dengan sistem movement, score, obstacle, lives, audio, dan interaksi pemain.'],
            ],
        ],

        'projects' => [
            'label'  => 'Project',
            'mode'   => 'list',
            'fields' => [
                'icon' => [
                    'label' => 'Ikon (emoji)', 'type' => 'text', 'max' => 10, 'default' => '🚀',
                    'sql'   => "VARCHAR(20) NOT NULL DEFAULT ''",
                    'alias' => ['ikon', 'emoji'],
                ],
                'title' => [
                    'label' => 'Judul Project', 'type' => 'text', 'max' => 100, 'required' => true,
                    'sql'   => "VARCHAR(100) NOT NULL DEFAULT ''",
                    'alias' => ['judul', 'nama', 'name', 'nama_project'],
                ],
                'description' => [
                    'label' => 'Deskripsi', 'type' => 'textarea', 'max' => 400,
                    'sql'   => 'TEXT NULL',
                    'alias' => ['deskripsi', 'keterangan', 'detail'],
                ],
                'tech' => [
                    'label' => 'Teknologi', 'type' => 'list', 'max' => 255,
                    'sql'   => "VARCHAR(255) NOT NULL DEFAULT ''",
                    'alias' => ['teknologi', 'technologies', 'stack'],
                    'hint'  => 'Pisahkan dengan koma. Contoh: HTML, CSS, JavaScript',
                ],
                'link' => [
                    'label' => 'Link Project', 'type' => 'link', 'max' => 255,
                    'sql'   => "VARCHAR(255) NOT NULL DEFAULT ''",
                    'alias' => ['tautan', 'url', 'demo'],
                    'hint'  => 'Alamat file di folder project (contoh: Game 1/Game.html) atau URL https://...',
                ],
            ],
            'seed' => [
                ['icon' => '🎮', 'title' => 'Runner Game', 'description' => 'Game runner sederhana dengan sistem score, lives, obstacle, jump, dan audio.', 'tech' => ['HTML', 'CSS', 'JavaScript'], 'link' => 'Game 2/Game.html'],
                ['icon' => '✊', 'title' => 'Rock Paper Scissors', 'description' => 'Game batu, gunting, kertas dengan sistem skor dan interaksi JavaScript.', 'tech' => ['HTML', 'CSS', 'JavaScript'], 'link' => 'Game 1/Game.html'],
                ['icon' => '🌐', 'title' => 'Technology Article', 'description' => 'Website artikel mengenai teknologi dan manfaat olahraga dengan desain modern.', 'tech' => ['HTML', 'CSS'], 'link' => 'Artikel/WEB.html'],
            ],
        ],

        'gallery' => [
            'label'  => 'Gambar',
            'mode'   => 'list',
            'fields' => [
                'title' => [
                    'label' => 'Judul / Nama Gambar', 'type' => 'text', 'max' => 100,
                    'sql'   => "VARCHAR(100) NOT NULL DEFAULT ''",
                    'alias' => ['judul', 'caption', 'nama', 'keterangan', 'alt'],
                ],
                'file' => [
                    'label' => 'File Gambar', 'type' => 'file', 'max' => 255, 'required' => true,
                    'exts'  => 'jpe?g|png|webp|gif',
                    'sql'   => "VARCHAR(255) NOT NULL DEFAULT ''",
                    'alias' => ['gambar', 'foto', 'image', 'img', 'path', 'src', 'url', 'filename', 'nama_file'],
                    'hint'  => 'Lokasi file di folder project. Contoh: Gallery/code.jpg',
                ],
            ],
            'seed' => $gambar,
        ],

        'learning' => [
            'label'  => 'Learning Progress',
            'mode'   => 'single',
            'fields' => [
                'title' => [
                    'label' => 'Judul Pembelajaran', 'type' => 'text', 'max' => 150, 'required' => true,
                    'sql'   => "VARCHAR(150) NOT NULL DEFAULT ''",
                    'alias' => ['judul', 'nama'],
                ],
                'percent' => [
                    'label' => 'Persentase Progress', 'type' => 'number', 'min' => 0, 'max' => 100,
                    'sql'   => 'TINYINT UNSIGNED NOT NULL DEFAULT 0',
                    'alias' => ['persen', 'persentase', 'progress'],
                ],
                'description' => [
                    'label' => 'Deskripsi', 'type' => 'textarea', 'max' => 500,
                    'sql'   => 'TEXT NULL',
                    'alias' => ['deskripsi', 'keterangan', 'detail'],
                ],
            ],
            'seed' => [
                ['title' => 'Web Development, Game Development, and UI Design', 'percent' => 60, 'description' => 'Sedang mempelajari HTML, CSS, JavaScript, DOM, pembuatan game, UI Design, dan dasar-dasar pengembangan website.'],
            ],
        ],

        'video' => [
            'label'  => 'Video',
            'mode'   => 'single',
            'fields' => [
                'title' => [
                    'label' => 'Judul Video', 'type' => 'text', 'max' => 100, 'required' => true,
                    'sql'   => "VARCHAR(100) NOT NULL DEFAULT ''",
                    'alias' => ['judul', 'nama'],
                ],
                'label' => [
                    'label' => 'Label', 'type' => 'text', 'max' => 50,
                    'sql'   => "VARCHAR(50) NOT NULL DEFAULT ''",
                    'alias' => ['tag', 'kategori'],
                ],
                'description' => [
                    'label' => 'Deskripsi', 'type' => 'textarea', 'max' => 500,
                    'sql'   => 'TEXT NULL',
                    'alias' => ['deskripsi', 'keterangan', 'detail'],
                ],
                'file' => [
                    'label' => 'File Video', 'type' => 'file', 'max' => 255, 'required' => true,
                    'exts'  => 'mp4|webm|ogg|mov',
                    'sql'   => "VARCHAR(255) NOT NULL DEFAULT ''",
                    'alias' => ['video', 'path', 'src', 'url', 'filename', 'nama_file'],
                    'hint'  => 'Lokasi file di folder project. Contoh: My Video.mp4',
                ],
            ],
            'seed' => [
                ['title' => 'My Video', 'label' => 'MY EDIT', 'description' => 'Video showcase project dan hasil edit yang saya buat.', 'file' => 'My Video.mp4'],
            ],
        ],

        'music' => [
            'label'  => 'Lagu',
            'mode'   => 'list',
            'fields' => [
                'title' => [
                    'label' => 'Judul Lagu', 'type' => 'text', 'max' => 100, 'required' => true,
                    'sql'   => "VARCHAR(100) NOT NULL DEFAULT ''",
                    'alias' => ['judul', 'nama', 'name', 'song'],
                ],
                'file' => [
                    'label' => 'File Lagu', 'type' => 'file', 'max' => 255, 'required' => true,
                    'exts'  => 'mp3|ogg|wav|m4a',
                    'sql'   => "VARCHAR(255) NOT NULL DEFAULT ''",
                    'alias' => ['lagu', 'audio', 'path', 'src', 'url', 'filename', 'nama_file'],
                    'hint'  => 'Lokasi file di folder project. Contoh: Good Life - Kehlani.mp3',
                ],
                'effect' => [
                    'label' => 'Efek Animasi', 'type' => 'select', 'free' => true, 'max' => 30,
                    'options' => ['leaves', 'sparkles', 'bubbles'], 'default' => 'leaves',
                    'sql'   => "VARCHAR(30) NOT NULL DEFAULT 'leaves'",
                    'alias' => ['efek', 'animasi'],
                ],
            ],
            'seed' => [
                ['title' => 'Call of Silence (Remix)', 'file' => 'Call of Silence（Remix）.mp3', 'effect' => 'leaves'],
                ['title' => 'One Last Time', 'file' => 'One Last Time - Ariana Grande.mp3', 'effect' => 'sparkles'],
                ['title' => 'Good Life', 'file' => 'Good Life - Kehlani.mp3', 'effect' => 'bubbles'],
            ],
        ],

        'contact' => [
            'label'  => 'Contact',
            'mode'   => 'single',
            'fields' => [
                'email' => [
                    'label' => 'Email', 'type' => 'email', 'max' => 120, 'required' => true,
                    'sql'   => "VARCHAR(120) NOT NULL DEFAULT ''",
                    'alias' => ['e_mail', 'mail'],
                ],
                'github' => [
                    'label' => 'GitHub (URL)', 'type' => 'url', 'max' => 255,
                    'sql'   => "VARCHAR(255) NOT NULL DEFAULT ''",
                    'alias' => ['git_hub'],
                    'hint'  => 'Contoh: https://github.com/username',
                ],
                'instagram' => [
                    'label' => 'Instagram (URL)', 'type' => 'url', 'max' => 255,
                    'sql'   => "VARCHAR(255) NOT NULL DEFAULT ''",
                    'alias' => ['ig'],
                    'hint'  => 'Contoh: https://instagram.com/username',
                ],
            ],
            'seed' => [
                ['email' => 'alfarowilly117@gmail.com', 'github' => 'https://github.com/ENTRWILL1', 'instagram' => 'https://instagram.com/entrwill'],
            ],
        ],

    ];

    return $defs;
}


/*
|--------------------------------------------------------------------------
| UTILITAS KECIL
|--------------------------------------------------------------------------
*/

function crudQ(string $nama): string
{
    return '`' . str_replace('`', '``', $nama) . '`';
}


function crudIsLocal(): bool
{
    $remote = $_SERVER['REMOTE_ADDR'] ?? '';

    return in_array($remote, ['127.0.0.1', '::1', '::ffff:127.0.0.1'], true);
}


// Pesan error database. Detail teknis hanya muncul kalau dibuka dari localhost.
function crudErrorText(string $awal, Throwable $err): string
{
    error_log($awal . ' ' . $err->getMessage());

    return crudIsLocal() ? $awal . ' (Detail: ' . $err->getMessage() . ')' : $awal;
}


function crudRedirect(string $page, string $query): void
{
    header('Location: ' . $page . $query);
    exit;
}


// Isi form kosong (nilai bawaan tiap kolom)
function crudBlank(array $def): array
{
    $isi = [];

    foreach ($def['fields'] as $key => $f) {
        if ($f['type'] === 'list') {
            $isi[$key] = [];
        } elseif ($f['type'] === 'number') {
            $isi[$key] = (int) ($f['min'] ?? 0);
        } else {
            $isi[$key] = (string) ($f['default'] ?? '');
        }
    }

    return $isi;
}


function crudToDb(array $f, mixed $nilai, bool $json): mixed
{
    switch ($f['type']) {
        case 'number':
            return (int) $nilai;

        case 'list':
            $arr = is_array($nilai) ? array_values($nilai) : [];

            return $json
                ? json_encode($arr, JSON_UNESCAPED_UNICODE)
                : implode(', ', $arr);

        default:
            return (string) ($nilai ?? '');
    }
}


function crudFromDb(array $f, mixed $nilai): mixed
{
    switch ($f['type']) {
        case 'number':
            return (int) $nilai;

        case 'list':
            if (is_array($nilai)) {
                return $nilai;
            }

            $s = trim((string) $nilai);

            if ($s === '') {
                return [];
            }

            if ($s[0] === '[') {
                $arr = json_decode($s, true);

                if (is_array($arr)) {
                    return array_values(array_map('strval', array_filter($arr, 'is_scalar')));
                }
            }

            return array_values(array_filter(
                array_map('trim', explode(',', $s)),
                fn ($x) => $x !== ''
            ));

        default:
            return (string) ($nilai ?? '');
    }
}


/*
|--------------------------------------------------------------------------
| SIAPKAN TABEL (buat kalau belum ada, cocokkan kolom, isi data awal)
|--------------------------------------------------------------------------
| Mengembalikan "meta": ['def', 'table', 'pk', 'auto', 'map', 'json'].
| Tidak pernah menghapus kolom atau data. Kolom tambahan milik kamu yang
| wajib diisi tapi tidak dipakai di sini hanya dilonggarkan jadi boleh kosong
| supaya tombol Tambah tidak error.
*/

function crudResolve(PDO $pdo, string $table): array
{
    static $cache = [];

    if (isset($cache[$table])) {
        return $cache[$table];
    }

    $def = crudDefs()[$table];
    $tq  = crudQ($table);

    $pdo->exec(
        'CREATE TABLE IF NOT EXISTS `crud_meta` (
            `nama` VARCHAR(80) NOT NULL PRIMARY KEY
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci'
    );

    $kolomBaru = ['`id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY'];

    foreach ($def['fields'] as $key => $f) {
        $kolomBaru[] = crudQ($key) . ' ' . $f['sql'];
    }

    $kolomBaru[] = '`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP';

    $pdo->exec(
        'CREATE TABLE IF NOT EXISTS ' . $tq . ' (' . implode(', ', $kolomBaru) . ')
         ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci'
    );

    // Kolom yang ada sekarang
    $cols    = $pdo->query('SHOW COLUMNS FROM ' . $tq)->fetchAll();
    $byLower = [];

    foreach ($cols as $c) {
        $byLower[strtolower($c['Field'])] = $c;
    }

    // Primary key
    $pk   = null;
    $auto = false;

    foreach ($cols as $c) {
        if (($c['Key'] ?? '') === 'PRI') {
            $pk   = $c['Field'];
            $auto = stripos((string) ($c['Extra'] ?? ''), 'auto_increment') !== false;
            break;
        }
    }

    if ($pk === null) {
        if (isset($byLower['id'])) {
            $pk = $byLower['id']['Field'];
        } else {
            $pdo->exec('ALTER TABLE ' . $tq . ' ADD COLUMN `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST');
            $pk   = 'id';
            $auto = true;
        }
    }

    // Cocokkan kolom definisi -> kolom di tabel
    $dipakai = [strtolower($pk) => true];
    $map     = [];
    $json    = [];

    foreach ($def['fields'] as $key => $f) {
        $ketemu = null;

        foreach (array_merge([$key], $f['alias'] ?? []) as $calon) {
            $l = strtolower($calon);

            if (isset($byLower[$l]) && empty($dipakai[$l])) {
                $ketemu = $byLower[$l]['Field'];
                break;
            }
        }

        $tipe = '';

        if ($ketemu === null) {
            $ketemu = isset($byLower[strtolower($key)]) ? $key . '_baru' : $key;

            $pdo->exec('ALTER TABLE ' . $tq . ' ADD COLUMN ' . crudQ($ketemu) . ' ' . $f['sql']);

            $tipe = strtolower($f['sql']);
        } else {
            $tipe = strtolower((string) ($byLower[strtolower($ketemu)]['Type'] ?? ''));
        }

        $dipakai[strtolower($ketemu)] = true;
        $map[$key] = $ketemu;

        // Kolom daftar (tech): ikuti format yang sudah dipakai di tabel
        if ($f['type'] === 'list') {
            $isJson = strpos($tipe, 'json') !== false;

            if (!$isJson && (strpos($tipe, 'char') !== false || strpos($tipe, 'text') !== false)) {
                $cq     = crudQ($ketemu);
                $contoh = $pdo->query(
                    'SELECT ' . $cq . ' FROM ' . $tq
                    . ' WHERE ' . $cq . ' IS NOT NULL AND ' . $cq . " <> '' LIMIT 1"
                )->fetchColumn();

                $isJson = is_string($contoh) && ltrim($contoh) !== '' && ltrim($contoh)[0] === '[';
            }

            $json[$key] = $isJson;
        }
    }

    // Kolom lain milik tabel yang wajib diisi tapi tanpa nilai bawaan -> longgarkan
    foreach ($cols as $c) {
        $l     = strtolower($c['Field']);
        $extra = strtolower((string) ($c['Extra'] ?? ''));

        if (
            isset($dipakai[$l])
            || ($c['Key'] ?? '') === 'PRI'
            || ($c['Null'] ?? '') !== 'NO'
            || $c['Default'] !== null
            || strpos($extra, 'auto_increment') !== false
            || strpos($extra, 'generated') !== false
        ) {
            continue;
        }

        try {
            $pdo->exec('ALTER TABLE ' . $tq . ' MODIFY ' . crudQ($c['Field']) . ' ' . $c['Type'] . ' NULL DEFAULT NULL');
        } catch (Throwable $err) {
            error_log('Longgarkan kolom gagal: ' . $err->getMessage());
        }
    }

    $meta = [
        'def'   => $def,
        'table' => $table,
        'pk'    => $pk,
        'auto'  => $auto,
        'map'   => $map,
        'json'  => $json,
    ];

    $cache[$table] = $meta;

    // Data awal: sekali saja, hanya kalau tabel masih kosong
    $cek = $pdo->prepare('SELECT COUNT(*) FROM `crud_meta` WHERE `nama` = ?');
    $cek->execute(['seed_' . $table]);

    if ((int) $cek->fetchColumn() === 0) {
        $jumlah = (int) $pdo->query('SELECT COUNT(*) FROM ' . $tq)->fetchColumn();

        if ($jumlah === 0) {
            foreach ($def['seed'] ?? [] as $baris) {
                crudInsert($pdo, $meta, $baris);
            }
        }

        $pdo->prepare('INSERT IGNORE INTO `crud_meta` (`nama`) VALUES (?)')
            ->execute(['seed_' . $table]);
    }

    return $meta;
}


/*
|--------------------------------------------------------------------------
| QUERY: BACA / TAMBAH / UBAH / HAPUS
|--------------------------------------------------------------------------
*/

function crudSelectSql(array $meta): string
{
    $bagian = [crudQ($meta['pk']) . ' AS `_id`'];

    foreach ($meta['def']['fields'] as $key => $f) {
        $bagian[] = crudQ($meta['map'][$key]) . ' AS ' . crudQ($key);
    }

    return 'SELECT ' . implode(', ', $bagian) . ' FROM ' . crudQ($meta['table']);
}


function crudRowOut(array $meta, array $r): array
{
    $out = ['_id' => (int) $r['_id']];

    foreach ($meta['def']['fields'] as $key => $f) {
        $out[$key] = crudFromDb($f, $r[$key] ?? null);
    }

    return $out;
}


function crudList(PDO $pdo, array $meta): array
{
    $stmt = $pdo->query(crudSelectSql($meta) . ' ORDER BY ' . crudQ($meta['pk']) . ' ASC');
    $out  = [];

    foreach ($stmt->fetchAll() as $r) {
        $out[] = crudRowOut($meta, $r);
    }

    return $out;
}


function crudFind(PDO $pdo, array $meta, int $id): ?array
{
    if ($id <= 0) {
        return null;
    }

    $stmt = $pdo->prepare(
        crudSelectSql($meta) . ' WHERE ' . crudQ($meta['pk']) . ' = :id LIMIT 1'
    );
    $stmt->execute(['id' => $id]);

    $r = $stmt->fetch();

    return $r === false ? null : crudRowOut($meta, $r);
}


function crudFirst(PDO $pdo, array $meta): ?array
{
    $stmt = $pdo->query(
        crudSelectSql($meta) . ' ORDER BY ' . crudQ($meta['pk']) . ' ASC LIMIT 1'
    );

    $r = $stmt->fetch();

    return $r === false ? null : crudRowOut($meta, $r);
}


function crudInsert(PDO $pdo, array $meta, array $data): void
{
    $kolom = [];
    $isi   = [];
    $nilai = [];
    $i     = 0;

    if (!$meta['auto']) {
        $next = (int) $pdo->query(
            'SELECT COALESCE(MAX(' . crudQ($meta['pk']) . '), 0) + 1 FROM ' . crudQ($meta['table'])
        )->fetchColumn();

        $kolom[]       = crudQ($meta['pk']);
        $isi[]         = ':p' . $i;
        $nilai['p' . $i] = $next;
        $i++;
    }

    foreach ($meta['def']['fields'] as $key => $f) {
        $kolom[]         = crudQ($meta['map'][$key]);
        $isi[]           = ':p' . $i;
        $nilai['p' . $i] = crudToDb($f, $data[$key] ?? null, $meta['json'][$key] ?? false);
        $i++;
    }

    $pdo->prepare(
        'INSERT INTO ' . crudQ($meta['table'])
        . ' (' . implode(', ', $kolom) . ') VALUES (' . implode(', ', $isi) . ')'
    )->execute($nilai);
}


function crudUpdate(PDO $pdo, array $meta, int $id, array $data): void
{
    $set   = [];
    $nilai = [];
    $i     = 0;

    foreach ($meta['def']['fields'] as $key => $f) {
        $set[]           = crudQ($meta['map'][$key]) . ' = :p' . $i;
        $nilai['p' . $i] = crudToDb($f, $data[$key] ?? null, $meta['json'][$key] ?? false);
        $i++;
    }

    $nilai['id'] = $id;

    $pdo->prepare(
        'UPDATE ' . crudQ($meta['table']) . ' SET ' . implode(', ', $set)
        . ' WHERE ' . crudQ($meta['pk']) . ' = :id'
    )->execute($nilai);
}


function crudDelete(PDO $pdo, array $meta, int $id): bool
{
    $stmt = $pdo->prepare(
        'DELETE FROM ' . crudQ($meta['table']) . ' WHERE ' . crudQ($meta['pk']) . ' = :id'
    );
    $stmt->execute(['id' => $id]);

    return $stmt->rowCount() > 0;
}


/*
|--------------------------------------------------------------------------
| VALIDASI KIRIMAN FORM
|--------------------------------------------------------------------------
| Mengembalikan [data_bersih, daftar_error]. Nama input form: f_<kolom>.
*/

function crudValidate(array $def, array $in, string $rootDir): array
{
    $data   = [];
    $errors = [];

    foreach ($def['fields'] as $key => $f) {
        $raw = $in['f_' . $key] ?? '';

        if (!is_scalar($raw)) {
            $raw = '';
        }

        $label = $f['label'];
        $type  = $f['type'];
        $max   = (int) ($f['max'] ?? 255);

        // ---- Angka
        if ($type === 'number') {
            $s   = trim((string) $raw);
            $min = (int) ($f['min'] ?? 0);

            if (!preg_match('/^\d{1,4}$/', $s) || (int) $s < $min || (int) $s > $max) {
                $errors[] = $label . ' harus berupa angka ' . $min . ' sampai ' . $max . '.';
                $data[$key] = $min;
            } else {
                $data[$key] = (int) $s;
            }

            continue;
        }

        $v = $type === 'textarea' ? bersihkanParagraf($raw) : bersihkanBaris($raw);

        // ---- Daftar (dipisah koma)
        if ($type === 'list') {
            $items = [];

            foreach (explode(',', $v) as $p) {
                $p = trim($p);

                if ($p !== '' && !in_array($p, $items, true)) {
                    $items[] = $p;
                }
            }

            if (count($items) > 12) {
                $errors[] = $label . ' maksimal 12 item.';
            }

            foreach ($items as $p) {
                if (mb_strlen($p) > 30) {
                    $errors[] = 'Setiap item ' . $label . ' maksimal 30 karakter.';
                    break;
                }
            }

            if ($items === [] && !empty($f['required'])) {
                $errors[] = $label . ' wajib diisi.';
            }

            $data[$key] = $items;

            continue;
        }

        if ($v === '' && isset($f['default'])) {
            $v = (string) $f['default'];
        }

        if ($v === '' && !empty($f['required'])) {
            $errors[] = $label . ' wajib diisi.';
            $data[$key] = $v;

            continue;
        }

        if (mb_strlen($v) > $max) {
            $errors[] = $label . ' maksimal ' . $max . ' karakter.';
        }

        // ---- Pilihan
        if ($type === 'select' && empty($f['free']) && !in_array($v, $f['options'], true)) {
            $errors[] = $label . ' tidak valid.';
        }

        // ---- Email & URL
        if ($type === 'email' && $v !== '' && filter_var($v, FILTER_VALIDATE_EMAIL) === false) {
            $errors[] = $label . ' tidak valid.';
        }

        if (
            $type === 'url' && $v !== ''
            && (!preg_match('~^https?://~i', $v) || filter_var($v, FILTER_VALIDATE_URL) === false)
        ) {
            $errors[] = $label . ' harus berupa URL yang diawali http:// atau https://.';
        }

        // ---- Link (alamat file di project atau URL http/https)
        if ($type === 'link' && $v !== '') {
            if (preg_match('~^https?://~i', $v)) {
                $ok = filter_var($v, FILTER_VALIDATE_URL) !== false;
            } else {
                $ok = (bool) preg_match('~^(?!/)(?!.*\.\.)[A-Za-z0-9 _.,()/\-]+$~', $v);
            }

            if (!$ok) {
                $errors[] = $label . ' tidak valid. Isi URL (https://...) atau lokasi file, contoh: Game 1/Game.html.';
            }
        }

        // ---- File di folder project (harus benar-benar ada)
        if ($type === 'file') {
            $v    = str_replace('\\', '/', $v);
            $exts = $f['exts'] ?? 'jpe?g|png|webp|gif';

            if (!preg_match('~^(?!/)(?!.*\.\.)[^\x00-\x1F\\\\:*?"<>|]+\.(?:' . $exts . ')$~iu', $v)) {
                $errors[] = 'Nama file untuk ' . $label . ' tidak valid. Contoh: ' . ($f['hint'] ?? 'Gallery/code.jpg') . '.';
            } else {
                $root = realpath($rootDir);
                $full = realpath($rootDir . '/' . $v);

                if (
                    $root === false
                    || $full === false
                    || strpos($full, $root . DIRECTORY_SEPARATOR) !== 0
                    || !is_file($full)
                ) {
                    $errors[] = 'File "' . $v . '" tidak ditemukan di folder project.';
                }
            }
        }

        $data[$key] = $v;
    }

    return [$data, $errors];
}


/*
|--------------------------------------------------------------------------
| PROSES HALAMAN DAFTAR (tambah / edit / hapus)
|--------------------------------------------------------------------------
| Panggil di atas halaman, sebelum ada output HTML:
|     $state = crudHandle('projects', 'projects.php');
|
| $state: def, items, form (null = form disembunyikan), editId, errors,
|         dbProblem, msg
*/

function crudHandle(string $table, string $page): array
{
    $def   = crudDefs()[$table];
    $state = [
        'def'       => $def,
        'items'     => [],
        'form'      => null,
        'editId'    => 0,
        'errors'    => [],
        'dbProblem' => null,
        'msg'       => null,
    ];

    $pdo = getDb();

    if ($pdo === null) {
        $state['dbProblem'] = dbHint();

        return $state;
    }

    try {
        $meta = crudResolve($pdo, $table);
    } catch (Throwable $err) {
        $state['dbProblem'] = crudErrorText('Tabel "' . $table . '" belum bisa disiapkan.', $err);

        return $state;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (!csrfValid()) {

            $state['errors'][] = 'Formulir sudah kedaluwarsa. Muat ulang halaman lalu coba lagi.';

        } else {

            $aksi = (string) ($_POST['action'] ?? '');
            $id   = (int) ($_POST['id'] ?? 0);

            try {

                if ($aksi === 'delete') {

                    if (crudDelete($pdo, $meta, $id)) {
                        crudRedirect($page, '?msg=deleted');
                    }

                    $state['errors'][] = 'Data tidak ditemukan (mungkin sudah dihapus).';

                } elseif ($aksi === 'save') {

                    [$data, $errors] = crudValidate($def, $_POST, dirname(__DIR__));

                    if ($errors === [] && $id > 0 && crudFind($pdo, $meta, $id) === null) {
                        $errors[] = 'Data yang mau diubah tidak ditemukan.';
                    }

                    if ($errors === []) {

                        if ($id > 0) {
                            crudUpdate($pdo, $meta, $id, $data);
                            crudRedirect($page, '?msg=updated');
                        }

                        crudInsert($pdo, $meta, $data);
                        crudRedirect($page, '?msg=added');
                    }

                    $state['errors'] = $errors;
                    $state['form']   = $data;
                    $state['editId'] = $id;
                }

            } catch (Throwable $err) {

                $state['errors'][] = crudErrorText('Gagal menyimpan ke database. Coba lagi.', $err);
            }
        }

    } else {

        $msg = (string) ($_GET['msg'] ?? '');

        if (in_array($msg, ['added', 'updated', 'deleted'], true)) {
            $state['msg'] = $msg;
        }

        try {

            if (isset($_GET['edit'])) {

                $row = crudFind($pdo, $meta, (int) $_GET['edit']);

                if ($row === null) {
                    $state['errors'][] = 'Data yang mau diedit tidak ditemukan.';
                } else {
                    $state['form']   = $row;
                    $state['editId'] = $row['_id'];
                }

            } elseif (isset($_GET['new'])) {

                $state['form'] = crudBlank($def);
            }

        } catch (Throwable $err) {

            $state['errors'][] = crudErrorText('Gagal membaca data.', $err);
        }
    }

    try {
        $state['items'] = crudList($pdo, $meta);
    } catch (Throwable $err) {
        $state['dbProblem'] = crudErrorText('Gagal membaca data dari database.', $err);
    }

    return $state;
}


/*
|--------------------------------------------------------------------------
| PROSES HALAMAN SATU DATA (Learning, Video): simpan perubahan
|--------------------------------------------------------------------------
| $state['row']  = data tersimpan (untuk pratinjau)
| $state['form'] = isi kolom form
*/

function crudHandleSingle(string $table, string $page): array
{
    $def   = crudDefs()[$table];
    $awal  = $def['seed'][0] ?? crudBlank($def);
    $state = [
        'def'       => $def,
        'row'       => $awal,
        'form'      => $awal,
        'errors'    => [],
        'dbProblem' => null,
        'msg'       => null,
    ];

    $pdo = getDb();

    if ($pdo === null) {
        $state['dbProblem'] = dbHint();

        return $state;
    }

    try {
        $meta = crudResolve($pdo, $table);
        $row  = crudFirst($pdo, $meta);
    } catch (Throwable $err) {
        $state['dbProblem'] = crudErrorText('Tabel "' . $table . '" belum bisa disiapkan.', $err);

        return $state;
    }

    if ($row !== null) {
        $state['row']  = $row;
        $state['form'] = $row;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (!csrfValid()) {

            $state['errors'][] = 'Formulir sudah kedaluwarsa. Muat ulang halaman lalu coba lagi.';

        } else {

            [$data, $errors] = crudValidate($def, $_POST, dirname(__DIR__));

            if ($errors === []) {

                try {

                    if ($row !== null) {
                        crudUpdate($pdo, $meta, (int) $row['_id'], $data);
                    } else {
                        crudInsert($pdo, $meta, $data);
                    }

                    crudRedirect($page, '?msg=updated');

                } catch (Throwable $err) {

                    $errors[] = crudErrorText('Gagal menyimpan ke database. Coba lagi.', $err);
                }
            }

            $state['errors'] = $errors;
            $state['form']   = $data;
        }

    } elseif (($_GET['msg'] ?? '') === 'updated') {

        $state['msg'] = 'updated';
    }

    return $state;
}


/*
|--------------------------------------------------------------------------
| TAMPILAN (HTML)
|--------------------------------------------------------------------------
*/

// Pesan status: database bermasalah, error isian, sukses
function crudAlertsHtml(array $state): string
{
    $label = $state['def']['label'];

    $sukses = [
        'added'   => $label . ' berhasil ditambahkan.',
        'updated' => 'Perubahan berhasil disimpan.',
        'deleted' => $label . ' berhasil dihapus.',
    ];

    ob_start();

    if ($state['dbProblem'] !== null): ?>
        <div class="admin-alert admin-alert-warning" role="alert">
            ⚠️ <?= e($state['dbProblem']) ?>
        </div>
    <?php endif;

    if ($state['errors'] !== []): ?>
        <div class="admin-alert admin-alert-error" role="alert">
            <strong>Perubahan belum disimpan:</strong>
            <ul>
                <?php foreach ($state['errors'] as $pesan): ?>
                    <li><?= e($pesan) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif;

    if ($state['msg'] !== null && isset($sukses[$state['msg']])): ?>
        <div class="admin-alert admin-alert-success" role="status">
            ✅ <?= e($sukses[$state['msg']]) ?>
        </div>
    <?php endif;

    return (string) ob_get_clean();
}


// Kolom-kolom form (tanpa tag <form>), sesuai definisi tabel
function crudFieldsHtml(array $def, array $values): string
{
    ob_start();

    foreach ($def['fields'] as $key => $f):

        $id  = 'f_' . $key;
        $val = $values[$key] ?? '';

        if (is_array($val)) {
            $val = implode(', ', $val);
        }

        $val = (string) $val;
        ?>
        <div class="form-group">

            <label for="<?= e($id) ?>"><?= e($f['label']) ?></label>

            <?php if ($f['type'] === 'textarea'): ?>

                <textarea
                    id="<?= e($id) ?>"
                    name="<?= e($id) ?>"
                    rows="5"
                    maxlength="<?= (int) ($f['max'] ?? 500) ?>"
                ><?= e($val) ?></textarea>

            <?php elseif ($f['type'] === 'select'):

                $opsi = $f['options'];

                if ($val !== '' && !in_array($val, $opsi, true)) {
                    $opsi[] = $val;
                }
                ?>

                <select id="<?= e($id) ?>" name="<?= e($id) ?>">
                    <?php foreach ($opsi as $o): ?>
                        <option value="<?= e($o) ?>"<?= $o === $val ? ' selected' : '' ?>>
                            <?= e($o) ?>
                        </option>
                    <?php endforeach; ?>
                </select>

            <?php elseif ($f['type'] === 'number'): ?>

                <input
                    type="number"
                    id="<?= e($id) ?>"
                    name="<?= e($id) ?>"
                    min="<?= (int) ($f['min'] ?? 0) ?>"
                    max="<?= (int) ($f['max'] ?? 100) ?>"
                    value="<?= e($val) ?>"
                    required
                >

            <?php else: ?>

                <input
                    type="text"
                    id="<?= e($id) ?>"
                    name="<?= e($id) ?>"
                    maxlength="<?= (int) ($f['max'] ?? 255) ?>"
                    value="<?= e($val) ?>"
                    <?= !empty($f['required']) ? 'required' : '' ?>
                >

            <?php endif; ?>

            <?php if (!empty($f['hint'])): ?>
                <span class="form-hint"><?= e($f['hint']) ?></span>
            <?php endif; ?>

        </div>
    <?php endforeach;

    return (string) ob_get_clean();
}


// Kartu form Tambah / Edit untuk halaman daftar
function crudFormCardHtml(array $state, string $page): string
{
    if ($state['form'] === null) {
        return '';
    }

    $def     = $state['def'];
    $editing = $state['editId'] > 0;

    ob_start();
    ?>
    <div class="admin-form-card" id="form-crud">

        <div class="admin-form-header">
            <div>
                <span class="dashboard-label">
                    <?= $editing ? '✏️ EDIT' : '➕ TAMBAH' ?>
                </span>
                <h2>
                    <?= $editing ? 'Edit ' : 'Tambah ' ?><?= e($def['label']) ?>
                </h2>
            </div>
        </div>

        <form action="<?= e($page) ?>" method="POST">

            <?= csrfField() ?>
            <input type="hidden" name="action" value="save">
            <input type="hidden" name="id" value="<?= (int) $state['editId'] ?>">

            <?= crudFieldsHtml($def, $state['form']) ?>

            <div class="form-actions">
                <button type="submit" class="admin-save-btn">
                    💾 <?= $editing ? 'Simpan Perubahan' : 'Simpan' ?>
                </button>
                <a href="<?= e($page) ?>" class="admin-preview-btn">
                    Batal
                </a>
            </div>

        </form>

    </div>
    <?php

    return (string) ob_get_clean();
}


// Tombol Hapus: form POST + konfirmasi
function crudDeleteFormHtml(string $page, int $id, string $nama): string
{
    $pesan = 'Hapus "' . $nama . '"? Data yang dihapus tidak bisa dikembalikan.';

    ob_start();
    ?>
    <form
        action="<?= e($page) ?>"
        method="POST"
        class="admin-inline-form"
        onsubmit="return confirm(<?= e(json_encode($pesan, JSON_UNESCAPED_UNICODE)) ?>);"
    >
        <?= csrfField() ?>
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="id" value="<?= $id ?>">
        <button type="submit" class="admin-delete-btn">
            🗑️ Hapus
        </button>
    </form>
    <?php

    return (string) ob_get_clean();
}


// Link tombol Preview: URL penuh, atau file di folder project (dari Dashboard/)
function crudLinkHref(string $link): string
{
    if ($link === '' || $link === '#') {
        return '#';
    }

    if (preg_match('~^https?://~i', $link)) {
        return $link;
    }

    return '../' . assetUrl($link);
}
