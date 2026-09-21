<?php

/*
|--------------------------------------------------------------------------
| DATA PROFIL
|--------------------------------------------------------------------------
| Tabel "profil" hanya berisi SATU baris (id = 1).
| Dipakai oleh:
|   - index.php          -> getProfileForSite()
|   - Dashboard/profil.php -> fetchProfile(), validateProfileInput(), saveProfile()
*/

require_once __DIR__ . '/db.php';


// Nilai awal (sama dengan yang tampil di portfolio saat ini)
function profileDefaults(): array
{
    return [
        'nama'     => 'Willy Alfaro D.P',
        'username' => '@willyalfarodwitamaputra',
        'role'     => 'Student | Web & Game Developer',
        'lokasi'   => 'Tenggarong Seberang, Indonesia',
        'bio'      => 'Saya pelajar PPLG yang sedang belajar membuat website, game, dan berbagai project kreatif.',
        'foto'     => 'Mario.jpg',
    ];
}


function profileTableSql(): string
{
    return 'CREATE TABLE IF NOT EXISTS `profil` (
        `id`         TINYINT UNSIGNED NOT NULL PRIMARY KEY,
        `nama`       VARCHAR(80)  NOT NULL,
        `username`   VARCHAR(60)  NOT NULL DEFAULT \'\',
        `role`       VARCHAR(100) NOT NULL DEFAULT \'\',
        `lokasi`     VARCHAR(100) NOT NULL DEFAULT \'\',
        `bio`        VARCHAR(500) NOT NULL DEFAULT \'\',
        `foto`       VARCHAR(255) NOT NULL DEFAULT \'\',
        `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
                     ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci';
}


// Baca profil. Melempar error kalau tabel belum ada.
function fetchProfile(PDO $pdo): ?array
{
    $stmt = $pdo->query(
        'SELECT `nama`, `username`, `role`, `lokasi`, `bio`, `foto`
         FROM `profil` WHERE `id` = 1'
    );

    $row = $stmt->fetch();

    return $row === false ? null : $row;
}


// Untuk portfolio: null artinya "pakai data bawaan di Code.js"
function getProfileForSite(): ?array
{
    $pdo = getDb();

    if ($pdo === null) {
        return null;
    }

    try {
        return fetchProfile($pdo);
    } catch (Throwable $e) {
        error_log('Baca profil gagal: ' . $e->getMessage());
        return null;
    }
}


// Simpan (buat baris id=1 kalau belum ada, kalau sudah ada diperbarui)
function saveProfile(PDO $pdo, array $d): void
{
    $stmt = $pdo->prepare(
        'INSERT INTO `profil`
            (`id`, `nama`, `username`, `role`, `lokasi`, `bio`, `foto`)
         VALUES
            (1, :nama, :username, :role, :lokasi, :bio, :foto)
         ON DUPLICATE KEY UPDATE
            `nama`     = VALUES(`nama`),
            `username` = VALUES(`username`),
            `role`     = VALUES(`role`),
            `lokasi`   = VALUES(`lokasi`),
            `bio`      = VALUES(`bio`),
            `foto`     = VALUES(`foto`)'
    );

    $stmt->execute([
        'nama'     => $d['nama'],
        'username' => $d['username'],
        'role'     => $d['role'],
        'lokasi'   => $d['lokasi'],
        'bio'      => $d['bio'],
        'foto'     => $d['foto'],
    ]);
}


/*
|--------------------------------------------------------------------------
| VALIDASI KIRIMAN FORM
|--------------------------------------------------------------------------
| Mengembalikan [data_bersih, daftar_error].
*/

function bersihkanBaris(mixed $nilai): string
{
    $s = (string) $nilai;

    if (!mb_check_encoding($s, 'UTF-8')) {
        return '';
    }

    $s = preg_replace('/[\x00-\x1F\x7F]+/u', ' ', $s) ?? '';

    return trim($s);
}


function bersihkanParagraf(mixed $nilai): string
{
    $s = (string) $nilai;

    if (!mb_check_encoding($s, 'UTF-8')) {
        return '';
    }

    $s = str_replace("\r\n", "\n", $s);
    $s = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/u', '', $s) ?? '';

    return trim($s);
}


function validateProfileInput(array $in, string $rootDir): array
{
    $errors = [];

    $nama     = bersihkanBaris($in['nama'] ?? '');
    $username = bersihkanBaris($in['username'] ?? '');
    $role     = bersihkanBaris($in['role'] ?? '');
    $lokasi   = bersihkanBaris($in['lokasi'] ?? '');
    $bio      = bersihkanParagraf($in['bio'] ?? '');
    $foto     = str_replace('\\', '/', bersihkanBaris($in['foto'] ?? ''));

    if ($username !== '' && $username[0] !== '@') {
        $username = '@' . $username;
    }

    if ($nama === '') {
        $errors[] = 'Nama lengkap wajib diisi.';
    } elseif (mb_strlen($nama) > 80) {
        $errors[] = 'Nama lengkap maksimal 80 karakter.';
    }

    if (mb_strlen($username) > 60) {
        $errors[] = 'Username maksimal 60 karakter.';
    }

    if (mb_strlen($role) > 100) {
        $errors[] = 'Role maksimal 100 karakter.';
    }

    if (mb_strlen($lokasi) > 100) {
        $errors[] = 'Lokasi maksimal 100 karakter.';
    }

    if (mb_strlen($bio) > 500) {
        $errors[] = 'Bio maksimal 500 karakter.';
    }

    if ($foto === '') {
        $errors[] = 'Foto profil wajib diisi (nama file gambar).';
    } elseif (
        !preg_match(
            '~^(?!/)(?!.*\.\.)[A-Za-z0-9 _./\-]+\.(?:jpe?g|png|webp|gif)$~i',
            $foto
        )
    ) {
        $errors[] = 'Nama file foto tidak valid. Contoh: Mario.jpg atau Gallery/3.jpg.';
    } else {
        $root = realpath($rootDir);
        $full = realpath($rootDir . '/' . $foto);

        if (
            $root === false
            || $full === false
            || strpos($full, $root . DIRECTORY_SEPARATOR) !== 0
            || !is_file($full)
        ) {
            $errors[] = 'File foto "' . $foto . '" tidak ditemukan di folder project.';
        }
    }

    return [
        [
            'nama'     => $nama,
            'username' => $username,
            'role'     => $role,
            'lokasi'   => $lokasi,
            'bio'      => $bio,
            'foto'     => $foto,
        ],
        $errors,
    ];
}
