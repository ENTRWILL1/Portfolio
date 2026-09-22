<?php

/*
|--------------------------------------------------------------------------
| KONEKSI DATABASE (MySQL)
|--------------------------------------------------------------------------
| Bawaan cocok untuk Laragon: host 127.0.0.1, user root, tanpa password.
| Di server, atur lewat Environment Variable:
|   DB_HOST, DB_PORT, DB_NAME, DB_USER, DB_PASS
|
| getDb() TIDAK melempar error: kalau database belum siap, hasilnya null
| dan portfolio tetap tampil memakai data di Code.js.
*/

function dbConfig(): array
{
    $pass = getenv('DB_PASS');

    return [
        'host' => getenv('DB_HOST') ?: '127.0.0.1',
        'port' => getenv('DB_PORT') ?: '3306',
        'name' => getenv('DB_NAME') ?: 'portfolio_willy',
        'user' => getenv('DB_USER') ?: 'root',
        'pass' => $pass === false ? '' : $pass,
    ];
}


function dbConnect(bool $withDatabase = true): PDO
{
    $c = dbConfig();

    $dsn = 'mysql:host=' . $c['host'] . ';port=' . $c['port'] . ';';

    if ($withDatabase) {
        $dsn .= 'dbname=' . $c['name'] . ';';
    }

    $dsn .= 'charset=utf8mb4';

    $opsi = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        PDO::ATTR_TIMEOUT            => 3,
    ];

    /*
    | Database online (Aiven, dll) mewajibkan koneksi terenkripsi (SSL).
    | Laragon lokal tidak butuh ini, jadi hanya diaktifkan kalau DB_HOST diisi
    | (tandanya sedang memakai database online, bukan default localhost).
    */
    if ((getenv('DB_HOST') ?: '') && defined('PDO::MYSQL_ATTR_SSL_CA')) {
        $opsi[PDO::MYSQL_ATTR_SSL_CA] = null;
        $opsi[PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT] = false;
    }

    return new PDO($dsn, $c['user'], $c['pass'], $opsi);
}


function getDb(): ?PDO
{
    static $pdo = null;
    static $sudahCoba = false;

    if ($sudahCoba) {
        return $pdo;
    }

    $sudahCoba = true;

    try {
        $pdo = dbConnect();
    } catch (Throwable $e) {
        error_log('Koneksi database gagal: ' . $e->getMessage());
        dbError($e->getMessage());
        $pdo = null;
    }

    return $pdo;
}


// Menyimpan / membaca pesan error koneksi terakhir
function dbError(?string $baru = null): string
{
    static $pesan = '';

    if ($baru !== null) {
        $pesan = $baru;
    }

    return $pesan;
}


// Petunjuk yang mudah dipahami sesuai penyebab gagalnya koneksi.
// Detail teknis hanya ditampilkan kalau dibuka dari localhost.
function dbHint(): string
{
    $pesan = dbError();
    $nama  = dbConfig()['name'];

    if (stripos($pesan, 'could not find driver') !== false) {
        $hint = 'Ekstensi pdo_mysql belum aktif di PHP. Di Laragon: klik kanan Laragon > PHP > Extensions > centang pdo_mysql.';
    } elseif (preg_match('/\[(\d+)\]/', $pesan, $m)) {
        switch ((int) $m[1]) {
            case 1049:
                $hint = 'Database "' . $nama . '" belum dibuat. Buka database/setup.php satu kali di browser.';
                break;
            case 2002:
            case 2006:
                $hint = 'MySQL belum menyala. Di Laragon klik Start All, lalu muat ulang halaman ini.';
                break;
            case 1045:
                $hint = 'User atau password MySQL tidak cocok. Bawaan Laragon: user root tanpa password.';
                break;
            default:
                $hint = 'Database belum tersambung.';
        }
    } else {
        $hint = 'Database belum tersambung. Pastikan MySQL di Laragon menyala, lalu buka database/setup.php satu kali.';
    }

    $remote = $_SERVER['REMOTE_ADDR'] ?? '';
    $lokal  = in_array($remote, ['127.0.0.1', '::1', '::ffff:127.0.0.1'], true);

    if ($lokal && $pesan !== '') {
        $hint .= ' (Detail: ' . $pesan . ')';
    }

    return $hint;
}
