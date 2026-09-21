<?php

/*
|--------------------------------------------------------------------------
| HEADER
|--------------------------------------------------------------------------
| Pintu masuk header untuk dua jenis halaman:
|   - Portfolio  : tidak perlu set apa-apa ($basePath = "" di folder utama)
|   - Dashboard  : set $isDashboard = true (halaman di folder Dashboard/)
|
| $basePath = jalur dari halaman ke folder utama ("" atau "../").
*/

$isDashboard = $isDashboard ?? false;
$basePath    = $basePath    ?? ($isDashboard ? '../' : '');

if ($isDashboard) {
    require __DIR__ . '/dashboard-header.php';
    return;
}

?>
<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta
        name="description"
        content="Portfolio resmi Willy Alfaro D.P - Pelajar PPLG, Web Developer, dan Creator."
    >

    <meta
        name="keywords"
        content="Portfolio, Willy Alfaro, PPLG, Web Developer, Frontend"
    >

    <meta
        name="author"
        content="Willy Alfaro D.P"
    >

    <!-- Open Graph / Social Media Preview -->
    <meta
        property="og:title"
        content="Portfolio - Willy Alfaro D.P"
    >

    <meta
        property="og:description"
        content="Kumpulan project, keahlian, dan perjalanan belajar Willy Alfaro D.P."
    >

    <meta
        property="og:type"
        content="website"
    >

    <title>Portfolio - Willy Alfaro D.P</title>

    <!-- Favicon -->
    <link
        rel="icon"
        href="<?= $basePath ?>pngegg.png"
        type="image/png"
    >

    <!-- CSS -->
    <link
        rel="stylesheet"
        href="<?= $basePath ?>Desain.css"
    >

    <!-- Google Fonts -->
    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Cinzel:wght@600;800&display=swap"
        rel="stylesheet"
    >

</head>

<body class="dark">

    <!-- ================= AMBIENT BACKGROUND PARTICLES ================= -->
    <div
        id="ambientParticles"
        class="ambient-particles"
    ></div>

    <!-- ================= SCROLL PROGRESS BAR ================= -->
    <div
        id="scrollProgress"
        class="scroll-progress"
    ></div>

    <!-- ================= PAGE LOADER ================= -->
    <div
        id="pageLoader"
        class="page-loader"
    >

        <svg
            width="100"
            height="100"
            viewBox="0 0 100 100"
        >

            <defs>

                <mask id="clipping">

                    <polygon
                        points="0,0 100,0 100,100 0,100"
                        fill="black"
                    ></polygon>

                    <polygon
                        points="25,25 75,25 50,75"
                        fill="white"
                    ></polygon>

                    <polygon
                        points="50,25 75,75 25,75"
                        fill="white"
                    ></polygon>

                    <polygon
                        points="35,35 65,35 50,65"
                        fill="white"
                    ></polygon>

                    <polygon
                        points="35,35 65,35 50,65"
                        fill="white"
                    ></polygon>

                    <polygon
                        points="35,35 65,35 50,65"
                        fill="white"
                    ></polygon>

                    <polygon
                        points="35,35 65,35 50,65"
                        fill="white"
                    ></polygon>

                </mask>

            </defs>

        </svg>

        <div class="page-loader-box"></div>

    </div>

    <!-- ================= NAVBAR ================= -->
    <header class="navbar">

        <div class="nav-container">

            <a
                href="#hero"
                class="logo"
                aria-label="Beranda Profile Realm"
            >
                🌿 My Portfolio
            </a>

            <nav
                class="nav-links"
                id="navLinks"
                aria-label="Navigasi Utama"
            >

                <a href="#hero">My card</a>
                <a href="#about">About</a>
                <a href="#skills">Skills</a>
                <a href="#education">Education</a>
                <a href="#experience">Experience</a>
                <a href="#projects">Projects</a>
                <a href="#gallery">Gallery</a>
                <a href="#learning">Progress</a>
                <a href="#contact">Contact</a>

            </nav>

            <div class="nav-actions">

                <a
                    href="<?= $basePath ?>Login-php/login.php"
                    class="login-btn"
                    aria-label="Login"
                    title="Login"
                >
                    👤
                </a>

                <button
                    id="themeBtn"
                    class="theme-toggle-btn loader"
                    aria-label="Ganti Tema Terang/Gelap"
                    type="button"
                >
                    ☀️
                </button>

                <button
                    id="hamburgerBtn"
                    class="hamburger"
                    aria-label="Buka Menu"
                    aria-expanded="false"
                    type="button"
                >
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

            </div>

        </div>

    </header>

    <!-- ================= MAIN ================= -->

    <main class="main-content">