<?php

$basePath = "";

// Profil dari database (null = pakai data bawaan di Code.js)
require_once __DIR__ . "/includes/profile.php";
$portfolioProfile = getProfileForSite();

require_once "includes/Header.php";

?>

<!-- =========================================================
     MUSIC PLAYER WIDGET
========================================================= -->

<div class="music-player-card">

    <div class="music-info">

        <div class="music-icon" id="musicIcon">

            <span
                class="music-ray"
                id="musicRay"
            ></span>

            🎵

        </div>

        <div class="music-details">

            <span
                class="music-title"
                id="songTitle"
            >
                Background Music
            </span>

            <span
                class="music-status"
                id="musicStatus"
            >
                Click play to listen
            </span>

        </div>

    </div>

    <button
        class="music-btn"
        id="playBtn"
        aria-label="Toggle Music"
    >
        <span id="playIcon">
            ▶
        </span>
    </button>

    <audio id="bgAudio">

        <source
            src="Call of Silence（Remix）.mp3"
            type="audio/mpeg"
        >

        Browser kamu tidak mendukung tag audio.

    </audio>

</div>


<!-- =========================================================
     HERO
========================================================= -->

<section
    id="hero"
    class="hero-section"
>

    <div class="hero-card">

        <div class="profile-avatar-wrapper">

            <div class="spinner">

                <div class="spinner1"></div>

            </div>

            <img
                id="fotoProfil"
                src="Mario.jpg"
                alt="Foto Profil Willy Alfaro D.P"
                class="profile-avatar"
                loading="eager"
            >

        </div>


        <div class="profile-details">

            <span class="status">

                <span>✦</span>

                Available for learning & creating

            </span>


            <p class="hero-greeting">
                HELLO, I'M
            </p>


            <h1
                id="nama"
                class="hero-name"
                aria-live="polite"
            >
                Loading...
            </h1>


            <span
                id="username"
                class="username-tag"
            >
                @username
            </span>


            <div class="badge-group">

                <span
                    id="role"
                    class="badge role-badge"
                >
                    Role
                </span>

                <span
                    id="lokasi"
                    class="badge location-badge"
                >
                    Lokasi
                </span>

            </div>


            <p
                id="bio"
                class="bio-text"
            >
                Bio description will appear here...
            </p>


            <div class="hero-buttons">

                <a
                    href="#projects"
                    class="btn primary-btn"
                >
                    🚀 Lihat Project
                </a>

                <a
                    href="#contact"
                    class="btn secondary-btn"
                >
                    Hubungi Saya →
                </a>

                <a
                    href="CV-Willy-Alfaro-D.P.pdf"
                    download
                    class="btn resume-btn"
                    aria-label="Download CV"
                >
                    📄 Download CV
                </a>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     ABOUT
========================================================= -->

<section
    id="about"
    class="section-container"
>

    <div class="section-heading">

        <span class="section-number">
            01
        </span>

        <div>

            <p class="section-label">
                GET TO KNOW ME
            </p>

            <h2 class="section-title">
                About Me
            </h2>

        </div>

    </div>


    <div class="about-card">

        <div class="about-intro">

            <p>

                Halo! Saya
                <strong id="namaAbout">-</strong>.

                Saya adalah pelajar PPLG yang sedang belajar dan
                mengembangkan kemampuan di bidang teknologi.

            </p>

            <p>

                Saya suka membuat website, game, mencoba teknologi
                baru, serta mengubah ide menjadi sebuah project.

            </p>

        </div>


        <div class="about-grid">

            <div class="about-item">

                <span class="about-label">
                    Nama Lengkap
                </span>

                <p
                    id="namaAboutCard"
                    class="about-value"
                >
                    -
                </p>

            </div>


            <div class="about-item">

                <span class="about-label">
                    Username
                </span>

                <p
                    id="usernameAbout"
                    class="about-value"
                >
                    -
                </p>

            </div>


            <div class="about-item">

                <span class="about-label">
                    Peran / Status
                </span>

                <p
                    id="roleAbout"
                    class="about-value"
                >
                    -
                </p>

            </div>


            <div class="about-item">

                <span class="about-label">
                    Lokasi
                </span>

                <p
                    id="lokasiAbout"
                    class="about-value"
                >
                    -
                </p>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     SKILLS
========================================================= -->

<section
    id="skills"
    class="section-container"
>

    <div class="section-heading">

        <span class="section-number">
            02
        </span>

        <div>

            <p class="section-label">
                MY ABILITIES
            </p>

            <h2 class="section-title">
                Skills
            </h2>

        </div>

    </div>


    <div
        id="skillsContainer"
        class="skills-grid"
    >
        <!-- Dibuat oleh JavaScript -->
    </div>

</section>


<!-- =========================================================
     EDUCATION
========================================================= -->

<section
    id="education"
    class="section-container"
>

    <div class="section-heading">

        <span class="section-number">
            03
        </span>

        <div>

            <p class="section-label">
                MY BACKGROUND
            </p>

            <h2 class="section-title">
                Education
            </h2>

        </div>

    </div>


    <div
        id="educationContainer"
        class="timeline-container"
    >
        <!-- Dibuat oleh JavaScript -->
    </div>

</section>


<!-- =========================================================
     EXPERIENCE
========================================================= -->

<section
    id="experience"
    class="section-container"
>

    <div class="section-heading">

        <span class="section-number">
            04
        </span>

        <div>

            <p class="section-label">
                MY EXPERIENCE
            </p>

            <h2 class="section-title">
                Experience
            </h2>

        </div>

    </div>


    <div
        id="experienceContainer"
        class="timeline-container"
    >
        <!-- Dibuat oleh JavaScript -->
    </div>

</section>


<!-- =========================================================
     PROJECTS
========================================================= -->

<section
    id="projects"
    class="section-container"
>

    <div class="section-heading">

        <span class="section-number">
            05
        </span>

        <div>

            <p class="section-label">
                MY CREATIONS
            </p>

            <h2 class="section-title">
                Featured Projects
            </h2>

        </div>

    </div>


    <div
        id="projectsContainer"
        class="projects-grid"
    >
        <!-- Dibuat oleh JavaScript -->
    </div>

</section>


<!-- =========================================================
     GALLERY
========================================================= -->

<section
    class="section-container"
    id="gallery"
>

    <div class="section-heading">

        <span class="section-number">
            06
        </span>

        <div>

            <span class="section-label">
                Showcase
            </span>

            <h2 class="section-title">
                My Gallery
            </h2>

        </div>

    </div>


    <div class="gallery-card">

        <div class="wrapper">

            <div class="inner">

                <div class="card">
                    <div class="img"></div>
                </div>

                <div class="card">
                    <div class="img"></div>
                </div>

                <div class="card">
                    <div class="img"></div>
                </div>

                <div class="card">
                    <div class="img"></div>
                </div>

                <div class="card">
                    <div class="img"></div>
                </div>

                <div class="card">
                    <div class="img"></div>
                </div>

                <div class="card">
                    <div class="img"></div>
                </div>

                <div class="card">
                    <div class="img"></div>
                </div>

                <div class="card">
                    <div class="img"></div>
                </div>

                <div class="card">
                    <div class="img"></div>
                </div>

            </div>

        </div>

    </div>

</section>


<!-- LIGHTBOX -->

<div
    class="lightbox-modal"
    id="galleryLightbox"
>

    <span
        class="lightbox-close"
        id="lightboxClose"
    >
        &times;
    </span>

    <img
        class="lightbox-content"
        id="lightboxImage"
        src=""
        alt="Gallery preview"
    >

</div>


<!-- =========================================================
     VIDEO EDIT
========================================================= -->

<section
    id="video-edit"
    class="section-container"
>

    <div class="section-heading">

        <span class="section-number">
            07
        </span>

        <div>

            <p class="section-label">
                MY EDIT
            </p>

            <h2 class="section-title">
                Video Showcase
            </h2>

        </div>

    </div>


    <div class="video-showcase">

        <article class="video-card">

            <div class="video-frame">

                <video
                    controls
                    preload="metadata"
                >

                    <source
                        src="My Video.mp4"
                        type="video/mp4"
                    >

                    Browser kamu tidak mendukung pemutar video.

                </video>

                <div class="video-glow"></div>

            </div>


            <div class="video-info">

                <span class="video-number">
                    MY EDIT
                </span>

                <h3>
                    My Video
                </h3>

                <p>
                    ...
                </p>

            </div>

        </article>

    </div>

</section>


<!-- =========================================================
     LEARNING PROGRESS
========================================================= -->

<section
    id="learning"
    class="section-container"
>

    <div class="section-heading">

        <span class="section-number">
            08
        </span>

        <div>

            <p class="section-label">
                MY JOURNEY
            </p>

            <h2 class="section-title">
                Learning Journey
            </h2>

        </div>

    </div>


    <div class="progress-card">

        <div class="progress-header">

            <div>

                <span class="progress-label">
                    📚 CURRENTLY LEARNING
                </span>

                <h3
                    id="learningTitle"
                    class="progress-title"
                >
                    Loading...
                </h3>

            </div>

            <span
                id="learningPercent"
                class="progress-percent"
            >
                0%
            </span>

        </div>


        <div
            class="progress-track"
            role="progressbar"
            aria-label="Progres Pembelajaran"
            aria-valuenow="0"
            aria-valuemin="0"
            aria-valuemax="100"
        >

            <div
                id="progressBar"
                class="progress-fill"
            ></div>

        </div>


        <p
            id="learningDescription"
            class="progress-desc"
        >
            Deskripsi progress...
        </p>

    </div>

</section>


<!-- =========================================================
     CONTACT
========================================================= -->

<section
    id="contact"
    class="section-container"
>

    <div class="section-heading">

        <span class="section-number">
            09
        </span>

        <div>

            <p class="section-label">
                GET IN TOUCH
            </p>

            <h2 class="section-title">
                Contact & Socials
            </h2>

        </div>

    </div>


    <div class="about-card">

        <div class="about-grid">


            <div class="about-item">

                <span class="about-label">
                    Email
                </span>

                <p class="about-value">

                    <a
                        href="mailto:alfarowilly117@gmail.com"
                        class="contact-link"
                    >
                        alfarowilly117@gmail.com
                    </a>

                </p>

            </div>


            <div class="about-item">

                <span class="about-label">
                    GitHub
                </span>

                <p class="about-value">

                    <a
                        href="https://github.com/ENTRWILL1"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="contact-link"
                    >
                        github.com/ENTRWILL1
                    </a>

                </p>

            </div>


            <div class="about-item">

                <span class="about-label">
                    Instagram
                </span>

                <p class="about-value">

                    <a
                        href="https://instagram.com/entrwill"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="contact-link"
                    >
                        @entrwill
                    </a>

                </p>

            </div>


        </div>

    </div>

</section>


<!-- =========================================================
     HALL OF CREATIONS
========================================================= -->

<section class="creation-section">

    <div class="creation-content">

        <span class="creation-label">
            ✦ HALL OF CREATIONS
        </span>

        <h2>
            Ide → <span>Kode</span> → Creation.
        </h2>

        <p>
            Tempat untuk melihat berbagai karya, eksperimen,
            dan project yang saya buat selama belajar dan berkembang.
        </p>

        <a
            href="#projects"
            class="creation-button"
        >
            Explore My Creations ↗
        </a>

    </div>

</section>


<?php

require_once "includes/Footer.php";

?>