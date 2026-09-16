<?php

/*
|--------------------------------------------------------------------------
| AUTH CONFIG
|--------------------------------------------------------------------------
*/

function authSecret(): string
{
    // Untuk Vercel, buat Environment Variable:
    // AUTH_SECRET
    //
    // Untuk sementara ada fallback agar tetap bisa dites di Laragon.
    return $_ENV['AUTH_SECRET']
        ?? getenv('AUTH_SECRET')
        ?: 'willy-portfolio-auth-secret-2026';
}


/*
|--------------------------------------------------------------------------
| BASE64 URL SAFE
|--------------------------------------------------------------------------
*/

function base64UrlEncode(string $data): string
{
    return rtrim(
        strtr(
            base64_encode($data),
            '+/',
            '-_'
        ),
        '='
    );
}


function base64UrlDecode(string $data): string|false
{
    $remainder = strlen($data) % 4;

    if ($remainder > 0) {
        $data .= str_repeat('=', 4 - $remainder);
    }

    $data = strtr($data, '-_', '+/');

    return base64_decode($data, true);
}


/*
|--------------------------------------------------------------------------
| BUAT TOKEN LOGIN
|--------------------------------------------------------------------------
*/

function createAuthToken(
    string $username,
    string $role
): string {

    $payload = [
        'username' => $username,
        'role' => $role,
        'exp' => time() + 3600
    ];

    $json = json_encode(
        $payload,
        JSON_UNESCAPED_SLASHES
    );

    $encoded = base64UrlEncode($json);

    $signature = hash_hmac(
        'sha256',
        $encoded,
        authSecret()
    );

    return $encoded . '.' . $signature;
}


/*
|--------------------------------------------------------------------------
| BACA TOKEN LOGIN
|--------------------------------------------------------------------------
*/

function getAuthUser(): ?array
{
    if (
        !isset($_COOKIE['portfolio_auth'])
        || $_COOKIE['portfolio_auth'] === ''
    ) {
        return null;
    }

    $parts = explode(
        '.',
        $_COOKIE['portfolio_auth'],
        2
    );

    if (count($parts) !== 2) {
        return null;
    }

    [$encoded, $signature] = $parts;

    $expectedSignature = hash_hmac(
        'sha256',
        $encoded,
        authSecret()
    );

    if (
        !hash_equals(
            $expectedSignature,
            $signature
        )
    ) {
        return null;
    }

    $decoded = base64UrlDecode($encoded);

    if ($decoded === false) {
        return null;
    }

    $data = json_decode(
        $decoded,
        true
    );

    if (!is_array($data)) {
        return null;
    }

    if (
        !isset(
            $data['username'],
            $data['role'],
            $data['exp']
        )
    ) {
        return null;
    }

    if ((int) $data['exp'] < time()) {
        return null;
    }

    return $data;
}


/*
|--------------------------------------------------------------------------
| SET COOKIE LOGIN
|--------------------------------------------------------------------------
*/

function setAuthCookie(
    string $username,
    string $role
): void {

    $token = createAuthToken(
        $username,
        $role
    );

    setcookie(
        'portfolio_auth',
        $token,
        [
            'expires' => time() + 3600,
            'path' => '/',
            'secure' => !empty($_SERVER['HTTPS'])
                && $_SERVER['HTTPS'] !== 'off',
            'httponly' => true,
            'samesite' => 'Lax'
        ]
    );
}


/*
|--------------------------------------------------------------------------
| HAPUS COOKIE
|--------------------------------------------------------------------------
*/

function clearAuthCookie(): void
{
    setcookie(
        'portfolio_auth',
        '',
        [
            'expires' => time() - 3600,
            'path' => '/',
            'secure' => !empty($_SERVER['HTTPS'])
                && $_SERVER['HTTPS'] !== 'off',
            'httponly' => true,
            'samesite' => 'Lax'
        ]
    );
}