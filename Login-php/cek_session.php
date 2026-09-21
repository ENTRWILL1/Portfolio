<?php

require_once __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| Path dasar
|--------------------------------------------------------------------------
| Halaman yang memanggil file ini boleh mengisi $basePath lebih dulu.
| Default "../" cocok untuk Login-php/ dan dashboard/ (sama-sama satu
| tingkat di bawah folder utama). Ini memastikan redirect tidak nyasar
| ke dashboard/login.php (404).
*/

$basePath  = $basePath ?? '../';
$loginUrl  = $basePath . 'Login-php/login.php';
$deniedUrl = $basePath . 'Login-php/akses_ditolak.php';

$user = getAuthUser();


// Belum login
if ($user === null) {
    header('Location: ' . $loginUrl);
    exit;
}


// Bukan admin
if ($user['role'] !== 'admin') {
    header('Location: ' . $deniedUrl);
    exit;
}


/*
|--------------------------------------------------------------------------
| Data user untuk dashboard
|--------------------------------------------------------------------------
*/

$username = $user['username'];
$role     = $user['role'];
