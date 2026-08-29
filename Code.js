/* =========================================================
   🌿 PORTFOLIO JAVASCRIPT
   Modern Glass • Nature • Responsive
========================================================= */


const portfolio = {
    nama: "Willy alfaro D.P",
    username: "@willyalfarodwitamaputra",
    role: "Student | Web & Game Developer",
    bio: "Saya pelajar PPLG yang sedang belajar membuat website, game, dan berbagai project kreatif.",
    lokasi: "Tenggarong Seberang, Indonesia",
    foto: "Mario.jpg",

    skills: [
        { nama: "HTML", icon: "🌐", level: "Beginner" },
        { nama: "CSS", icon: "🎨", level: "Beginner" },
        { nama: "JavaScript", icon: "⚡", level: "Beginner" },
        { nama: "Python", icon: "🐍", level: "Beginner" }
    ],

    education: [
        {
            icon: "🎈",
            tahun: "2014 - 2015",
            sekolah: "Taman Kanak-Kanak",
            jurusan: "Pendidikan Anak Dini",
            description: "Masa awal mengenal lingkungan sekolah, bersosialisasi, dan mengasah kreativitas dasar."
        },
        {
            icon: "🏫",
            tahun: "2015 - 2021",
            sekolah: "SDN 029 Tenggarong Seberang",
            jurusan: "Pendidikan Dasar",
            description: "Menyelesaikan pendidikan dasar serta membangun fondasi kemampuan akademis dan karakter."
        },
        {
            icon: "📚",
            tahun: "2021 - 2024",
            sekolah: "SMPN 1 Tenggarong Seberang",
            jurusan: "Pendidikan Menengah Pertama",
            description: "Mengembangkan minat dalam bidang teknologi, logika, serta aktif dalam kegiatan sekolah."
        },
        {
            icon: "🎓",
            tahun: "2025 - Sekarang",
            sekolah: "SMKTI Airlangga Samarinda",
            jurusan: "Pengembangan Perangkat Lunak dan Gim (PPLG)",
            description: "Mempelajari dasar pemrograman, pengembangan website, game development, dan teknologi digital."
        }
    ],

    experience: [
        {
            icon: "💻",
            tahun: "2026",
            posisi: "Student Developer",
            tempat: "Personal & School Projects",
            description: "Mengerjakan berbagai project website, game sederhana, dan eksperimen menggunakan HTML, CSS, JavaScript, dan Python."
        },
        {
            icon: "🎮",
            tahun: "2026",
            posisi: "Game Developer Learner",
            tempat: "Personal Project",
            description: "Mempelajari pembuatan game sederhana dengan sistem movement, score, obstacle, lives, audio, dan interaksi pemain."
        }
    ],

    projects: [
        {
            icon: "🎮",
            title: "Runner Game",
            description: "Game runner sederhana dengan sistem score, lives, obstacle, jump, dan audio.",
            tech: ["HTML", "CSS", "JavaScript"],
            link: "Game 2/Game.html"
        },
        {
            icon: "✊",
            title: "Rock Paper Scissors",
            description: "Game batu, gunting, kertas dengan sistem skor dan interaksi JavaScript.",
            tech: ["HTML", "CSS", "JavaScript"],
            link: "Game 1/Game.html"
        },
        {
            icon: "🌐",
            title: "Technology Article",
            description: "Website artikel mengenai teknologi dan manfaat olahraga dengan desain modern.",
            tech: ["HTML", "CSS"],
            link: "Artikel/WEB.html"
        }
    ],

    learning: {
        title: "Web Development, Game Development, and UI Design",
        percent: 60,
        description: "Sedang mempelajari HTML, CSS, JavaScript, DOM, pembuatan game, UI Design, dan dasar-dasar pengembangan website."
    }
};


function setText(id, value) {
    const element = document.getElementById(id);

    if (element) {
        element.textContent = value;
    }
}


document.addEventListener("DOMContentLoaded", () => {

    /* =========================================================
       HERO
    ========================================================= */

    setText("nama", portfolio.nama);
    setText("username", portfolio.username);
    setText("bio", portfolio.bio);
    setText("lokasi", `📍 ${portfolio.lokasi}`);


    /* =========================================================
       FOTO PROFILE
    ========================================================= */

    const fotoProfil = document.getElementById("fotoProfil");

    if (fotoProfil) {

        fotoProfil.src = portfolio.foto;
        fotoProfil.alt = `Foto profil ${portfolio.nama}`;

        fotoProfil.onerror = () => {
            console.warn(
                `Foto profil "${portfolio.foto}" tidak ditemukan.`
            );
        };
    }


    /* =========================================================
       ABOUT
    ========================================================= */

    setText("namaAbout", portfolio.nama);
    setText("namaAboutCard", portfolio.nama);
    setText("usernameAbout", portfolio.username);
    setText("roleAbout", portfolio.role);
    setText("lokasiAbout", portfolio.lokasi);
    setText("footerName", portfolio.nama);


    /* =========================================================
       SKILLS
    ========================================================= */

    const skillsContainer =
        document.getElementById("skillsContainer");

    if (skillsContainer) {

        skillsContainer.innerHTML =
            portfolio.skills.map(skill => `
                <article class="skill-card">

                    <div class="skill-icon">
                        ${skill.icon}
                    </div>

                    <div class="skill-info">

                        <h3>
                            ${skill.nama}
                        </h3>

                        <span>
                            ${skill.level}
                        </span>

                    </div>

                </article>
            `).join("");
    }


    /* =========================================================
       EDUCATION
    ========================================================= */

    const educationContainer =
        document.getElementById("educationContainer");

    if (educationContainer) {

        educationContainer.innerHTML =
            portfolio.education.map(edu => `
                <article class="timeline-card">

                    <div class="timeline-icon">
                        ${edu.icon}
                    </div>

                    <div class="timeline-content">

                        <span class="timeline-year">
                            ${edu.tahun}
                        </span>

                        <h3>
                            ${edu.sekolah}
                        </h3>

                        <h4>
                            ${edu.jurusan}
                        </h4>

                        <p>
                            ${edu.description}
                        </p>

                    </div>

                </article>
            `).join("");
    }


    /* =========================================================
       EXPERIENCE
    ========================================================= */

    const experienceContainer =
        document.getElementById("experienceContainer");

    if (experienceContainer) {

        experienceContainer.innerHTML =
            portfolio.experience.map(exp => `
                <article class="timeline-card">

                    <div class="timeline-icon">
                        ${exp.icon}
                    </div>

                    <div class="timeline-content">

                        <span class="timeline-year">
                            ${exp.tahun}
                        </span>

                        <h3>
                            ${exp.posisi}
                        </h3>

                        <h4>
                            ${exp.tempat}
                        </h4>

                        <p>
                            ${exp.description}
                        </p>

                    </div>

                </article>
            `).join("");
    }


    /* =========================================================
       PROJECTS
    ========================================================= */

    const projectsContainer =
        document.getElementById("projectsContainer");

    if (projectsContainer) {

        projectsContainer.innerHTML =
            portfolio.projects.map((project, index) => `
                <article class="project-card">

                    <div class="project-number">
                        ${String(index + 1).padStart(2, "0")}
                    </div>

                    <div class="project-icon">
                        ${project.icon}
                    </div>

                    <h3>
                        ${project.title}
                    </h3>

                    <p>
                        ${project.description}
                    </p>

                    <div class="tech-list">
                        ${project.tech
                            .map(t => `<span>${t}</span>`)
                            .join("")}
                    </div>

                    <a
                        href="${project.link}"
                        class="project-link"
                    >
                        View Project ↗
                    </a>

                </article>
            `).join("");
    }


    /* =========================================================
       LEARNING PROGRESS
    ========================================================= */

    setText(
        "learningTitle",
        portfolio.learning.title
    );

    setText(
        "learningPercent",
        `${portfolio.learning.percent}%`
    );

    setText(
        "learningDescription",
        portfolio.learning.description
    );


    const progressBar =
        document.getElementById("progressBar");

    const progressTrack =
        document.querySelector(".progress-track");


    if (progressBar) {

        progressBar.style.width = "0%";

        setTimeout(() => {

            progressBar.style.width =
                `${portfolio.learning.percent}%`;

        }, 300);
    }


    if (progressTrack) {

        progressTrack.setAttribute(
            "aria-valuenow",
            portfolio.learning.percent
        );
    }


    /* =========================================================
       THEME TOGGLE
    ========================================================= */

    const themeBtn =
        document.getElementById("themeBtn");


    function updateThemeIcon() {

        if (!themeBtn) return;

        const isDark =
            document.body.classList.contains("dark");

        themeBtn.textContent =
            isDark ? "☀️" : "🌙";

        themeBtn.title =
            isDark
                ? "Aktifkan mode terang"
                : "Aktifkan mode gelap";
    }


    if (themeBtn) {

        const savedTheme =
            localStorage.getItem("theme");


        if (savedTheme === "light") {

            document.body.classList.remove("dark");

        } else {

            document.body.classList.add("dark");
        }


        updateThemeIcon();


        themeBtn.addEventListener("click", () => {

            document.body.classList.toggle("dark");

            const isDark =
                document.body.classList.contains("dark");

            localStorage.setItem(
                "theme",
                isDark ? "dark" : "light"
            );

            updateThemeIcon();

        });
    }


    /* =========================================================
       TYPING EFFECT
    ========================================================= */

    const roleElement =
        document.getElementById("role");


    if (roleElement) {

        const roles = [
            "Student",
            "Web Developer",
            "Game Developer"
        ];

        let roleIndex = 0;
        let charIndex = 0;
        let isDeleting = false;


        function typeEffect() {

            const currentRole =
                roles[roleIndex];


            charIndex =
                isDeleting
                    ? charIndex - 1
                    : charIndex + 1;


            roleElement.textContent =
                currentRole.substring(
                    0,
                    charIndex
                );


            let speed =
                isDeleting
                    ? 50
                    : 100;


            if (
                !isDeleting &&
                charIndex === currentRole.length
            ) {

                speed = 1800;
                isDeleting = true;

            } else if (
                isDeleting &&
                charIndex === 0
            ) {

                isDeleting = false;

                roleIndex =
                    (roleIndex + 1) %
                    roles.length;

                speed = 500;
            }


            setTimeout(
                typeEffect,
                speed
            );
        }


        typeEffect();
    }


    /* =========================================================
       SCROLL PROGRESS BAR
    ========================================================= */

    const scrollProgress =
        document.getElementById("scrollProgress");


    function updateScrollProgress() {

        if (!scrollProgress) return;


        const scrollTop =
            window.scrollY ||
            document.documentElement.scrollTop;


        const docHeight =
            document.documentElement.scrollHeight -
            window.innerHeight;


        const percent =
            docHeight > 0
                ? (scrollTop / docHeight) * 100
                : 0;


        scrollProgress.style.width =
            `${percent}%`;
    }


    window.addEventListener(
        "scroll",
        updateScrollProgress,
        { passive: true }
    );

    window.addEventListener(
        "resize",
        updateScrollProgress
    );

    updateScrollProgress();


    /* =========================================================
       🌌 AMBIENT BACKGROUND PARTICLES
    ========================================================= */

    const ambientContainer =
        document.getElementById(
            "ambientParticles"
        );


    const prefersReducedMotion =
        window.matchMedia(
            "(prefers-reduced-motion: reduce)"
        ).matches;


    function createAmbientParticle() {

        if (!ambientContainer) return;


        const particle =
            document.createElement("div");


        particle.classList.add(
            "ambient-particle"
        );


        const size =
            Math.random() * 16 + 10;


        particle.style.width =
            `${size}px`;

        particle.style.height =
            `${size}px`;


        particle.style.left =
            `${Math.random() * 100}vw`;


        const drift =
            (Math.random() - 0.5) * 160;


        particle.style.setProperty(
            "--drift",
            `${drift}px`
        );


        const duration =
            Math.random() * 10 + 12;


        particle.style.animationDuration =
            `${duration}s`;


        ambientContainer.appendChild(
            particle
        );


        setTimeout(() => {

            particle.remove();

        }, duration * 1000);
    }


    if (
        ambientContainer &&
        !prefersReducedMotion
    ) {

        for (let i = 0; i < 6; i++) {

            setTimeout(
                createAmbientParticle,
                i * 800
            );
        }


        setInterval(
            createAmbientParticle,
            1400
        );
    }


    /* =========================================================
       GALLERY & LIGHTBOX
    ========================================================= */

    const galleryImages = [

        "Gallery/code.jpg",
        "Gallery/code1.jpg",
        "Gallery/code2.jpg",
        "Gallery/3.jpg",
        "Gallery/4.jpg",
        "Gallery/5.jpg",
        "Gallery/6.jpg",
        "Gallery/7.jpg",
        "Gallery/8.jpg",
        "Gallery/9.jpg"

    ];


    const galleryCards =
        document.querySelectorAll(
            ".gallery-card .img"
        );


    const galleryLightbox =
        document.getElementById(
            "galleryLightbox"
        );


    const lightboxImage =
        document.getElementById(
            "lightboxImage"
        );


    const lightboxClose =
        document.getElementById(
            "lightboxClose"
        );


    function setupGalleryCard(
        card,
        index
    ) {

        const imagePath =
            galleryImages[index];


        if (!imagePath) return;


        card.style.backgroundSize =
            "cover";


        card.style.backgroundPosition =
            "center";


        card.classList.add(
            "has-image"
        );


        if (
            galleryLightbox &&
            lightboxImage
        ) {

            card.addEventListener(
                "click",
                () => {

                    lightboxImage.src =
                        imagePath;


                    lightboxImage.alt =
                        `Gallery ${index + 1}`;


                    galleryLightbox.classList.add(
                        "active"
                    );


                    document.body.style.overflow =
                        "hidden";
                }
            );
        }
    }


    if (
        "IntersectionObserver" in window
    ) {

        const galleryObserver =
            new IntersectionObserver(
                entries => {

                    entries.forEach(
                        entry => {

                            if (
                                entry.isIntersecting
                            ) {

                                const card =
                                    entry.target;


                                const index =
                                    Number(
                                        card.dataset.index
                                    );


                                const imagePath =
                                    galleryImages[index];


                                if (imagePath) {

                                    card.style.backgroundImage =
                                        `url("${imagePath}")`;


                                    card.classList.add(
                                        "loaded"
                                    );
                                }


                                galleryObserver.unobserve(
                                    card
                                );
                            }
                        }
                    );

                },
                {
                    rootMargin: "200px",
                    threshold: 0.01
                }
            );


        galleryCards.forEach(
            (card, index) => {

                card.dataset.index =
                    index;

                setupGalleryCard(
                    card,
                    index
                );

                galleryObserver.observe(
                    card
                );
            }
        );


    } else {

        galleryCards.forEach(
            (card, index) => {

                const imagePath =
                    galleryImages[index];


                if (!imagePath) return;


                card.style.backgroundImage =
                    `url("${imagePath}")`;


                card.classList.add(
                    "loaded"
                );


                setupGalleryCard(
                    card,
                    index
                );
            }
        );
    }


    function closeLightbox() {

        if (!galleryLightbox) return;


        galleryLightbox.classList.remove(
            "active"
        );


        document.body.style.overflow =
            "";
    }


    if (lightboxClose) {

        lightboxClose.addEventListener(
            "click",
            closeLightbox
        );
    }


    if (galleryLightbox) {

        galleryLightbox.addEventListener(
            "click",
            event => {

                if (
                    event.target ===
                    galleryLightbox
                ) {

                    closeLightbox();
                }
            }
        );
    }


    document.addEventListener(
        "keydown",
        event => {

            if (
                event.key === "Escape" &&
                galleryLightbox &&
                galleryLightbox.classList.contains(
                    "active"
                )
            ) {

                closeLightbox();
            }
        }
    );


    /* =========================================================
       🎵 MUSIC PLAYER
       + AUDIO REACTIVE ICON
    ========================================================= */

    const audio =
        document.getElementById("bgAudio");


    const playBtn =
        document.getElementById("playBtn");


    const playIcon =
        document.getElementById("playIcon");


    const musicIcon =
        document.getElementById("musicIcon");


    const musicStatus =
        document.getElementById("musicStatus");


    const musicRay =
        document.getElementById("musicRay");


    const songTitle =
        document.getElementById("songTitle");


    /* =========================================================
       PLAYLIST 3 LAGU
    ========================================================= */

    const playlist = [

        {
            title: "Call of Silence (Remix)",
            file: "Call of Silence（Remix）.mp3",
            effect: "leaves"
        },

        {
            title: "One Last Time",
            file: "One Last Time - Ariana Grande.mp3",
            effect: "sparkles"
        },

        {
            title: "Good Life",
            file: "Good Life - Kehlani.mp3",
            effect: "bubbles"
        }

    ];


    let currentSong = 0;


    let effectContainer =
        document.getElementById(
            "musicEffectContainer"
        );


    if (!effectContainer) {

        effectContainer =
            document.createElement("div");

        effectContainer.id =
            "musicEffectContainer";

        document.body.appendChild(
            effectContainer
        );
    }


    let leafInterval = null;
    let effectInterval = null;


    function clearMusicEffects() {

        if (leafInterval) {

            clearInterval(
                leafInterval
            );

            leafInterval = null;
        }


        if (effectInterval) {

            clearInterval(
                effectInterval
            );

            effectInterval = null;
        }


        if (effectContainer) {

            effectContainer.innerHTML =
                "";
        }
    }


    /* =========================================================
       EFEK 1 — DAUN
    ========================================================= */

    function createLeaf() {

        const leaf =
            document.createElement("div");


        leaf.classList.add(
            "falling-leaf"
        );


        const leaves = [
            "🍃",
            "🌿",
            "🍂",
            "🍁"
        ];


        leaf.innerText =
            leaves[
                Math.floor(
                    Math.random() *
                    leaves.length
                )
            ];


        leaf.style.left =
            Math.random() * 100 + "vw";


        const duration =
            Math.random() * 4 + 4;


        leaf.style.animationDuration =
            duration + "s";


        leaf.style.fontSize =
            (Math.random() * 1 + 1) +
            "rem";


        effectContainer.appendChild(
            leaf
        );


        setTimeout(() => {

            leaf.remove();

        }, duration * 1000);
    }


    function startLeaves() {

        clearMusicEffects();


        createLeaf();


        leafInterval =
            setInterval(
                createLeaf,
                300
            );
    }


    /* =========================================================
       EFEK 2 — SPARKLE
    ========================================================= */

    function createSparkle() {

        const sparkle =
            document.createElement("div");


        sparkle.classList.add(
            "music-sparkle"
        );


        const symbols = [
            "✦",
            "✧",
            "✨",
            "⋆",
            "✦"
        ];


        sparkle.innerText =
            symbols[
                Math.floor(
                    Math.random() *
                    symbols.length
                )
            ];


        sparkle.style.left =
            Math.random() * 100 + "vw";


        sparkle.style.top =
            (Math.random() * 85 + 5) +
            "vh";


        const size =
            Math.random() * 0.8 + 0.6;


        sparkle.style.fontSize =
            size + "rem";


        const duration =
            Math.random() * 2 + 2;


        sparkle.style.animationDuration =
            duration + "s";


        effectContainer.appendChild(
            sparkle
        );


        setTimeout(() => {

            sparkle.remove();

        }, duration * 1000);
    }


    function startSparkles() {

        clearMusicEffects();


        createSparkle();


        effectInterval =
            setInterval(
                createSparkle,
                220
            );
    }


    /* =========================================================
       EFEK 3 — BUBBLE / LIGHT
    ========================================================= */

    function createBubble() {

        const bubble =
            document.createElement("div");


        bubble.classList.add(
            "music-bubble"
        );


        bubble.style.left =
            Math.random() * 100 + "vw";


        bubble.style.bottom =
            "-30px";


        const size =
            Math.random() * 18 + 8;


        bubble.style.width =
            size + "px";


        bubble.style.height =
            size + "px";


        const duration =
            Math.random() * 4 + 4;


        bubble.style.animationDuration =
            duration + "s";


        effectContainer.appendChild(
            bubble
        );


        setTimeout(() => {

            bubble.remove();

        }, duration * 1000);
    }


    function startBubbles() {

        clearMusicEffects();


        createBubble();


        effectInterval =
            setInterval(
                createBubble,
                280
            );
    }


    function startCurrentEffect() {

        clearMusicEffects();


        const effect =
            playlist[currentSong].effect;


        if (effect === "leaves") {

            startLeaves();

        } else if (effect === "sparkles") {

            startSparkles();

        } else if (effect === "bubbles") {

            startBubbles();
        }
    }


    function stopMusicEffects() {

        clearMusicEffects();
    }


    /* =========================================================
       GANTI LAGU
    ========================================================= */

    function updateSongTitle() {

        if (songTitle) {

            songTitle.textContent =
                playlist[currentSong].title;
        }
    }


    function loadSong(index) {

        if (!audio) return;


        currentSong =
            index % playlist.length;


        audio.src =
            playlist[currentSong].file;


        audio.load();


        updateSongTitle();


        startCurrentEffect();
    }


    /* =========================================================
       WEB AUDIO API
       ANALISIS FREKUENSI REAL
    ========================================================= */

    let audioCtx;
    let analyser;
    let source;
    let dataArray;


    let rayAngle = 0;
    let audioAnimId = null;


    function setupAudioAnalyser() {

        if (audioCtx) return;


        audioCtx =
            new (
                window.AudioContext ||
                window.webkitAudioContext
            )();


        analyser =
            audioCtx.createAnalyser();


        source =
            audioCtx.createMediaElementSource(
                audio
            );


        source.connect(
            analyser
        );


        analyser.connect(
            audioCtx.destination
        );


        analyser.fftSize = 64;


        dataArray =
            new Uint8Array(
                analyser.frequencyBinCount
            );
    }


    function animateAudioReactive() {

        if (
            !analyser ||
            !musicRay
        ) return;


        analyser.getByteFrequencyData(
            dataArray
        );


        const bassRange =
            dataArray.slice(
                0,
                8
            );


        const bassAvg =
            bassRange.reduce(
                (a, b) => a + b,
                0
            ) /
            bassRange.length;


        const bassNorm =
            bassAvg / 255;


        const scale =
            1 + bassNorm * 0.6;


        const opacity =
            0.35 +
            bassNorm * 0.65;


        rayAngle =
            (rayAngle + 1.2) % 360;


        musicRay.style.transform =
            `rotate(${rayAngle}deg) scale(${scale})`;


        musicRay.style.opacity =
            opacity;


        const hueShift =
            (
                rayAngle +
                bassNorm * 180
            ) % 360;


        musicRay.style.filter =
            `hue-rotate(${hueShift}deg) saturate(1.5)`;


        if (musicIcon) {

            const glow =
                6 + bassNorm * 20;


            musicIcon.style.boxShadow =
                `0 0 ${glow}px ${glow / 2}px var(--accent-glow)`;
        }


        audioAnimId =
            requestAnimationFrame(
                animateAudioReactive
            );
    }


    function stopAudioReactive() {

        if (audioAnimId) {

            cancelAnimationFrame(
                audioAnimId
            );

            audioAnimId = null;
        }


        if (musicRay) {

            musicRay.style.transform =
                "scale(1) rotate(0deg)";


            musicRay.style.opacity =
                0.35;


            musicRay.style.filter =
                "none";
        }


        if (musicIcon) {

            musicIcon.style.boxShadow =
                "none";
        }
    }


    /* =========================================================
       MUSIC PLAY / PAUSE
    ========================================================= */

    if (playBtn && audio) {

        playBtn.addEventListener(
            "click",
            async () => {

                if (audio.paused) {

                    try {

                        setupAudioAnalyser();


                        if (
                            audioCtx.state ===
                            "suspended"
                        ) {

                            await audioCtx.resume();
                        }


                        await audio.play();


                        if (playIcon) {

                            playIcon.textContent =
                                "❚❚";
                        }


                        if (musicIcon) {

                            musicIcon.classList.add(
                                "playing"
                            );
                        }


                        /*
                         * 🌌 AMBIENT PARTICLE MATI
                         * SAAT MUSIK DIPUTAR
                         */
                        document.body.classList.add(
                            "music-playing"
                        );


                        if (musicStatus) {

                            musicStatus.textContent =
                                "Playing...";
                        }


                        startCurrentEffect();


                        animateAudioReactive();


                    } catch (error) {

                        console.warn(
                            "Audio gagal diputar:",
                            error
                        );


                        if (musicStatus) {

                            musicStatus.textContent =
                                "Audio tidak ditemukan";
                        }
                    }


                } else {

                    audio.pause();


                    if (playIcon) {

                        playIcon.textContent =
                            "▶";
                    }


                    if (musicIcon) {

                        musicIcon.classList.remove(
                            "playing"
                        );
                    }


                    /*
                     * 🌌 AMBIENT PARTICLE HIDUP LAGI
                     * SAAT MUSIK DI-PAUSE
                     */
                    document.body.classList.remove(
                        "music-playing"
                    );


                    if (musicStatus) {

                        musicStatus.textContent =
                            "Paused";
                    }


                    stopAudioReactive();


                    stopMusicEffects();
                }

            }
        );


        /* =====================================================
           AUTO NEXT SONG
        ===================================================== */

        audio.addEventListener(
            "ended",
            async () => {

                stopAudioReactive();


                stopMusicEffects();


                currentSong =
                    (currentSong + 1) %
                    playlist.length;


                loadSong(
                    currentSong
                );


                try {

                    if (
                        audioCtx &&
                        audioCtx.state ===
                        "suspended"
                    ) {

                        await audioCtx.resume();
                    }


                    await audio.play();


                    if (playIcon) {

                        playIcon.textContent =
                            "❚❚";
                    }


                    if (musicIcon) {

                        musicIcon.classList.add(
                            "playing"
                        );
                    }


                    /*
                     * Particle tetap mati karena
                     * lagu berikutnya otomatis dimainkan.
                     */
                    document.body.classList.add(
                        "music-playing"
                    );


                    if (musicStatus) {

                        musicStatus.textContent =
                            "Playing...";
                    }


                    startCurrentEffect();


                    animateAudioReactive();


                } catch (error) {

                    console.warn(
                        "Lagu berikutnya gagal diputar:",
                        error
                    );


                    if (playIcon) {

                        playIcon.textContent =
                            "▶";
                    }


                    if (musicIcon) {

                        musicIcon.classList.remove(
                            "playing"
                        );
                    }


                    /*
                     * Jika gagal memutar lagu,
                     * particle dinyalakan kembali.
                     */
                    document.body.classList.remove(
                        "music-playing"
                    );


                    if (musicStatus) {

                        musicStatus.textContent =
                            "Click play to listen";
                    }
                }
            }
        );


        /* Pastikan judul lagu pertama tampil */
        updateSongTitle();
    }


    /* =========================================================
       🔊 UI HOVER SOUND
       📱 MOBILE SCROLL ANIMATION
    ========================================================= */

    let uiAudioCtx = null;
    let lastHoverSound = 0;


    function initUISound() {

        try {

            if (!uiAudioCtx) {

                const AudioContextClass =
                    window.AudioContext ||
                    window.webkitAudioContext;


                if (!AudioContextClass) return;


                uiAudioCtx =
                    new AudioContextClass();
            }


            if (
                uiAudioCtx.state ===
                "suspended"
            ) {

                uiAudioCtx
                    .resume()
                    .catch(() => {});
            }


        } catch (error) {

            console.warn(
                "UI sound tidak tersedia:",
                error
            );
        }
    }


    function playHoverSound() {

        if (!uiAudioCtx) return;


        const nowMs =
            performance.now();


        if (
            nowMs -
            lastHoverSound <
            100
        ) return;


        lastHoverSound =
            nowMs;


        try {

            const now =
                uiAudioCtx.currentTime;


            const oscillator =
                uiAudioCtx.createOscillator();


            const gainNode =
                uiAudioCtx.createGain();


            oscillator.type =
                "sine";


            oscillator.frequency.setValueAtTime(
                850,
                now
            );


            oscillator.frequency.exponentialRampToValueAtTime(
                1200,
                now + 0.045
            );


            gainNode.gain.setValueAtTime(
                0.0001,
                now
            );


            gainNode.gain.exponentialRampToValueAtTime(
                0.07,
                now + 0.006
            );


            gainNode.gain.exponentialRampToValueAtTime(
                0.0001,
                now + 0.055
            );


            oscillator.connect(
                gainNode
            );


            gainNode.connect(
                uiAudioCtx.destination
            );


            oscillator.start(now);


            oscillator.stop(
                now + 0.06
            );


        } catch (error) {

            console.warn(
                "Hover sound gagal:",
                error
            );
        }
    }


    document.addEventListener(
        "pointerdown",
        initUISound,
        {
            passive: true
        }
    );


    document.addEventListener(
        "keydown",
        initUISound
    );


    const hoverSoundElements =
        document.querySelectorAll(
            "a, button, .badge, .project-card, .skill-card, .timeline-card, .about-item, .gallery-card, .video-card"
        );


    hoverSoundElements.forEach(
        element => {

            element.addEventListener(
                "mouseenter",
                () => {

                    initUISound();

                    playHoverSound();
                }
            );
        }
    );


    /* =========================================================
       📱 MOBILE SCROLL REVEAL
    ========================================================= */

    if (
        window.innerWidth <= 768 &&
        "IntersectionObserver" in window
    ) {

        const mobileRevealElements =
            document.querySelectorAll(
                ".section-heading, .about-card, .skill-card, .timeline-card, .project-card, .gallery-card, .progress-card, .creation-section, .video-card"
            );


        mobileRevealElements.forEach(
            element => {

                element.classList.add(
                    "mobile-scroll-reveal"
                );
            }
        );


        const mobileObserver =
            new IntersectionObserver(
                entries => {

                    entries.forEach(
                        entry => {

                            if (
                                entry.isIntersecting
                            ) {

                                entry.target.classList.add(
                                    "mobile-scroll-show"
                                );


                                mobileObserver.unobserve(
                                    entry.target
                                );
                            }
                        }
                    );

                },
                {
                    threshold: 0.15,
                    rootMargin:
                        "0px 0px -50px 0px"
                }
            );


        mobileRevealElements.forEach(
            element => {

                mobileObserver.observe(
                    element
                );
            }
        );
    }


    /* =========================================================
       NAVBAR & HAMBURGER
       Mobile animation fix
    ========================================================= */

    const hamburgerBtn =
        document.getElementById(
            "hamburgerBtn"
        );


    const navLinksContainer =
        document.getElementById(
            "navLinks"
        );


    const navLinks =
        document.querySelectorAll(
            ".nav-links a"
        );


    if (
        hamburgerBtn &&
        navLinksContainer
    ) {

        hamburgerBtn.addEventListener(
            "click",
            () => {

                const isOpening =
                    !navLinksContainer.classList.contains(
                        "active"
                    );


                /* Bersihkan status animasi lama */
                navLinks.forEach(
                    link => {

                        link.classList.remove(
                            "clicked"
                        );


                        link.style.animation =
                            "none";
                    }
                );


                /*
                 * Paksa browser membaca ulang style
                 * supaya animasi opening selalu
                 * dimulai dari awal.
                 */
                void navLinksContainer
                    .offsetHeight;


                navLinks.forEach(
                    link => {

                        link.style.animation =
                            "";
                    }
                );


                /* Buka / tutup menu */
                navLinksContainer.classList.toggle(
                    "active",
                    isOpening
                );


                hamburgerBtn.classList.toggle(
                    "open",
                    isOpening
                );


                hamburgerBtn.setAttribute(
                    "aria-expanded",
                    String(isOpening)
                );
            }
        );
    }


    /* =========================================================
       NAV LINK
    ========================================================= */

    navLinks.forEach(
        link => {

            link.addEventListener(
                "click",
                event => {

                    const targetId =
                        link.getAttribute(
                            "href"
                        );


                    /* Hanya animasi pilihan menu di mobile */
                    if (
                        window.innerWidth <= 768
                    ) {

                        navLinks.forEach(
                            item => {

                                item.classList.remove(
                                    "clicked"
                                );
                            }
                        );


                        link.classList.add(
                            "clicked"
                        );


                        /*
                         * Hapus class setelah animasi selesai.
                         */
                        setTimeout(
                            () => {

                                link.classList.remove(
                                    "clicked"
                                );

                            },
                            360
                        );
                    }


                    /* Tutup menu setelah animasi */
                    setTimeout(
                        () => {

                            if (
                                navLinksContainer
                            ) {

                                navLinksContainer.classList.remove(
                                    "active"
                                );
                            }


                            if (
                                hamburgerBtn
                            ) {

                                hamburgerBtn.classList.remove(
                                    "open"
                                );


                                hamburgerBtn.setAttribute(
                                    "aria-expanded",
                                    "false"
                                );
                            }


                            navLinks.forEach(
                                item => {

                                    item.classList.remove(
                                        "clicked"
                                    );
                                }
                            );

                        },
                        window.innerWidth <= 768
                            ? 280
                            : 0
                    );


                    /* Smooth scroll */
                    if (
                        targetId &&
                        targetId.startsWith("#")
                    ) {

                        const section =
                            document.querySelector(
                                targetId
                            );


                        if (section) {

                            event.preventDefault();


                            setTimeout(
                                () => {

                                    section.scrollIntoView(
                                        {
                                            behavior:
                                                "smooth",
                                            block:
                                                "start"
                                        }
                                    );

                                },
                                window.innerWidth <= 768
                                    ? 280
                                    : 0
                            );
                        }
                    }

                }
            );
        }
    );


    console.log(
        "🌿 Portfolio Willy Alfaro D.P berhasil dimuat."
    );

});


/* =========================================================
   PAGE LOADER HANDLER
========================================================= */

window.addEventListener(
    "load",
    () => {

        const pageLoader =
            document.getElementById(
                "pageLoader"
            );


        if (pageLoader) {

            setTimeout(
                () => {

                    pageLoader.classList.add(
                        "hide"
                    );


                    setTimeout(
                        () => {

                            pageLoader.remove();

                        },
                        700
                    );

                },
                500
            );
        }
    }
);