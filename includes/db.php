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

    return new PDO($dsn, $c['user'], $c['pass'], [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        PDO::ATTR_TIMEOUT            => 3,
    ]);
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
        $pdo = null;
    }

    return $pdo;
}
