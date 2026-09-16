<?php

require_once 'auth.php';

$user = getAuthUser();


// Belum login
if ($user === null) {

    header(
        'Location: login.php'
    );

    exit;
}


// Bukan admin
if (
    $user['role'] !== 'admin'
) {

    header(
        'Location: akses_ditolak.php'
    );

    exit;
}


/*
|--------------------------------------------------------------------------
| Data user untuk dashboard
|--------------------------------------------------------------------------
*/

$username = $user['username'];
$role = $user['role'];