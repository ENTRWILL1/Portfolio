<?php

/*
|--------------------------------------------------------------------------
| PENJAGA HALAMAN DASHBOARD
|--------------------------------------------------------------------------
| Panggil di baris paling atas setiap halaman dashboard, sebelum ada output.
| Hanya admin yang sudah login yang boleh lewat. Login memakai cookie
| bertoken dari Login-php/ (auth.php + cek_session.php), bukan $_SESSION.
|
| Setelah lolos, tersedia: $username dan $role.
*/

$basePath = $basePath ?? '../';

require_once __DIR__ . '/../Login-php/cek_session.php';
