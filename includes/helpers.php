<?php

/*
|--------------------------------------------------------------------------
| HELPER UMUM (dashboard)
|--------------------------------------------------------------------------
| Butuh Login-php/auth.php untuk authSecret() (sudah dimuat oleh guard.php).
*/

require_once __DIR__ . '/../Login-php/auth.php';


// Amankan teks sebelum ditampilkan di HTML
function e(?string $teks): string
{
    return htmlspecialchars((string) $teks, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}


// Ubah path file (boleh ada spasi) jadi URL yang aman: "Game 1/a b.jpg" -> "Game%201/a%20b.jpg"
function assetUrl(string $path): string
{
    return implode('/', array_map('rawurlencode', explode('/', $path)));
}


/*
|--------------------------------------------------------------------------
| CSRF
|--------------------------------------------------------------------------
| Token terikat ke cookie login dan dikunci dengan AUTH_SECRET, jadi tidak
| perlu $_SESSION. Setiap <form method="POST"> wajib memakai csrfField()
| dan setiap prosesnya wajib memanggil csrfValid().
*/

function csrfToken(): string
{
    $cookie = (string) ($_COOKIE['portfolio_auth'] ?? '');

    return hash_hmac('sha256', 'csrf|' . $cookie, authSecret());
}


function csrfField(): string
{
    return '<input type="hidden" name="csrf_token" value="'
        . e(csrfToken()) . '">';
}


function csrfValid(): bool
{
    $kiriman = $_POST['csrf_token'] ?? '';

    return is_string($kiriman)
        && $kiriman !== ''
        && hash_equals(csrfToken(), $kiriman);
}
