/* =========================================================
   🌿 PORTFOLIO JAVASCRIPT
   Modern Glass • Nature • Responsive
========================================================= */

const portfolio = {
    nama: "Willy Alfaro D.P",
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
    if (element) element.textContent = value;
}

document.addEventListener("DOMContentLoaded", () => {
    /* HERO */
    setText("nama", portfolio.nama);
    setText("username", portfolio.username);
    setText("bio", portfolio.bio);
    setText("lokasi", `📍 ${portfolio.lokasi}`);

    /* FOTO PROFILE */
    const fotoProfil = document.getElementById("fotoProfil");
    if (fotoProfil) {
        fotoProfil.src = portfolio.foto;
        fotoProfil.alt = `Foto profil ${portfolio.nama}`;
        fotoProfil.onerror = () => {
            console.warn(`Foto profil "${portfolio.foto}" tidak ditemukan.`);
        };
    }

    /* ABOUT */
    setText("namaAbout", portfolio.nama);
    setText("namaAboutCard", portfolio.nama);
    setText("usernameAbout", portfolio.username);
    setText("roleAbout", portfolio.role);
    setText("lokasiAbout", portfolio.lokasi);
    setText("footerName", portfolio.nama);

    /* SKILLS */
    const skillsContainer = document.getElementById("skillsContainer");
    if (skillsContainer) {
        skillsContainer.innerHTML = portfolio.skills.map(skill => `
            <article class="skill-card">
                <div class="skill-icon">${skill.icon}</div>
                <div class="skill-info">
                    <h3>${skill.nama}</h3>
                    <span>${skill.level}</span>
                </div>
            </article>
        `).join("");
    }

    /* EDUCATION */
    const educationContainer = document.getElementById("educationContainer");
    if (educationContainer) {
        educationContainer.innerHTML = portfolio.education.map(edu => `
            <article class="timeline-card">
                <div class="timeline-icon">${edu.icon}</div>
                <div class="timeline-content">
                    <span class="timeline-year">${edu.tahun}</span>
                    <h3>${edu.sekolah}</h3>
                    <h4>${edu.jurusan}</h4>
                    <p>${edu.description}</p>
                </div>
            </article>
        `).join("");
    }

    /* EXPERIENCE */
    const experienceContainer = document.getElementById("experienceContainer");
    if (experienceContainer) {
        experienceContainer.innerHTML = portfolio.experience.map(exp => `
            <article class="timeline-card">
                <div class="timeline-icon">${exp.icon}</div>
                <div class="timeline-content">
                    <span class="timeline-year">${exp.tahun}</span>
                    <h3>${exp.posisi}</h3>
                    <h4>${exp.tempat}</h4>
                    <p>${exp.description}</p>
                </div>
            </article>
        `).join("");
    }

    /* PROJECTS */
    const projectsContainer = document.getElementById("projectsContainer");
    if (projectsContainer) {
        projectsContainer.innerHTML = portfolio.projects.map((project, index) => `
            <article class="project-card">
                <div class="project-number">${String(index + 1).padStart(2, "0")}</div>
                <div class="project-icon">${project.icon}</div>
                <h3>${project.title}</h3>
                <p>${project.description}</p>
                <div class="tech-list">${project.tech.map(t => `<span>${t}</span>`).join("")}</div>
                <a href="${project.link}" class="project-link">View Project ↗</a>
            </article>
        `).join("");
    }

    /* LEARNING PROGRESS */
    setText("learningTitle", portfolio.learning.title);
    setText("learningPercent", `${portfolio.learning.percent}%`);
    setText("learningDescription", portfolio.learning.description);

    const progressBar = document.getElementById("progressBar");
    const progressTrack = document.querySelector(".progress-track");

    if (progressBar) {
        progressBar.style.width = "0%";
        setTimeout(() => {
            progressBar.style.width = `${portfolio.learning.percent}%`;
        }, 300);
    }

    if (progressTrack) {
        progressTrack.setAttribute("aria-valuenow", portfolio.learning.percent);
    }

    /* THEME TOGGLE */
    const themeBtn = document.getElementById("themeBtn");

    function updateThemeIcon() {
        if (!themeBtn) return;
        const isDark = document.body.classList.contains("dark");
        themeBtn.textContent = isDark ? "☀️" : "🌙";
        themeBtn.title = isDark ? "Aktifkan mode terang" : "Aktifkan mode gelap";
    }

    if (themeBtn) {
        const savedTheme = localStorage.getItem("theme");
        if (savedTheme === "light") {
            document.body.classList.remove("dark");
        } else {
            document.body.classList.add("dark");
        }
        updateThemeIcon();

        themeBtn.addEventListener("click", () => {
            document.body.classList.toggle("dark");
            const isDark = document.body.classList.contains("dark");
            localStorage.setItem("theme", isDark ? "dark" : "light");
            updateThemeIcon();
        });
    }

    /* TYPING EFFECT */
    const roleElement = document.getElementById("role");
    if (roleElement) {
        const roles = ["Student", "Web Developer", "Game Developer"];
        let roleIndex = 0;
        let charIndex = 0;
        let isDeleting = false;

        function typeEffect() {
            const currentRole = roles[roleIndex];
            charIndex = isDeleting ? charIndex - 1 : charIndex + 1;
            roleElement.textContent = currentRole.substring(0, charIndex);

            let speed = isDeleting ? 50 : 100;

            if (!isDeleting && charIndex === currentRole.length) {
                speed = 1800;
                isDeleting = true;
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                roleIndex = (roleIndex + 1) % roles.length;
                speed = 500;
            }

            setTimeout(typeEffect, speed);
        }

        typeEffect();
    }

    /* GALLERY & LIGHTBOX */
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

    const galleryCards = document.querySelectorAll(".gallery-card .img");
    const galleryLightbox = document.getElementById("galleryLightbox");
    const lightboxImage = document.getElementById("lightboxImage");
    const lightboxClose = document.getElementById("lightboxClose");

    galleryCards.forEach((card, index) => {
        const imagePath = galleryImages[index];
        if (!imagePath) return;

        card.style.backgroundImage = `url("${imagePath}")`;
        card.style.backgroundSize = "cover";
        card.style.backgroundPosition = "center";
        card.classList.add("has-image");

        if (galleryLightbox && lightboxImage) {
            card.addEventListener("click", () => {
                lightboxImage.src = imagePath;
                lightboxImage.alt = `Gallery ${index + 1}`;
                galleryLightbox.classList.add("active");
                document.body.style.overflow = "hidden";
            });
        }
    });

    function closeLightbox() {
        if (!galleryLightbox) return;
        galleryLightbox.classList.remove("active");
        document.body.style.overflow = "";
    }

    if (lightboxClose) lightboxClose.addEventListener("click", closeLightbox);
    if (galleryLightbox) {
        galleryLightbox.addEventListener("click", event => {
            if (event.target === galleryLightbox) closeLightbox();
        });
    }

    document.addEventListener("keydown", event => {
        if (event.key === "Escape" && galleryLightbox && galleryLightbox.classList.contains("active")) {
            closeLightbox();
        }
    });

    /* MUSIC PLAYER & FALLING LEAVES */
    const audio = document.getElementById("bgAudio");
    const playBtn = document.getElementById("playBtn");
    const playIcon = document.getElementById("playIcon");
    const musicIcon = document.getElementById("musicIcon");
    const musicStatus = document.getElementById("musicStatus");

    let leafContainer = document.getElementById("leafContainer");
    if (!leafContainer) {
        leafContainer = document.createElement("div");
        leafContainer.id = "leafContainer";
        document.body.appendChild(leafContainer);
    }

    let leafInterval = null;

    function createLeaf() {
        const leaf = document.createElement("div");
        leaf.classList.add("falling-leaf");
        const leaves = ["🍃", "🌿", "🍂", "🍁"];
        leaf.innerText = leaves[Math.floor(Math.random() * leaves.length)];
        leaf.style.left = Math.random() * 100 + "vw";
        const duration = Math.random() * 4 + 4;
        leaf.style.animationDuration = duration + "s";
        leaf.style.fontSize = (Math.random() * 1 + 1) + "rem";

        leafContainer.appendChild(leaf);

        setTimeout(() => {
            leaf.remove();
        }, duration * 1000);
    }

    function startLeaves() {
        if (!leafInterval) leafInterval = setInterval(createLeaf, 300);
    }

    function stopLeaves() {
        if (leafInterval) {
            clearInterval(leafInterval);
            leafInterval = null;
        }
    }

    if (playBtn && audio) {
        playBtn.addEventListener("click", async () => {
            if (audio.paused) {
                try {
                    await audio.play();
                    if (playIcon) playIcon.textContent = "❚❚";
                    if (musicIcon) musicIcon.classList.add("playing");
                    if (musicStatus) musicStatus.textContent = "Playing...";
                    startLeaves();
                } catch (error) {
                    console.warn("Audio gagal diputar:", error);
                    if (musicStatus) musicStatus.textContent = "Audio tidak ditemukan";
                }
            } else {
                audio.pause();
                if (playIcon) playIcon.textContent = "▶";
                if (musicIcon) musicIcon.classList.remove("playing");
                if (musicStatus) musicStatus.textContent = "Paused";
                stopLeaves();
            }
        });

        audio.addEventListener("ended", () => {
            if (playIcon) playIcon.textContent = "▶";
            if (musicIcon) musicIcon.classList.remove("playing");
            if (musicStatus) musicStatus.textContent = "Click play to listen";
            stopLeaves();
        });
    }

    /* NAVBAR & HAMBURGER */
    const hamburgerBtn = document.getElementById("hamburgerBtn");
    const navLinksContainer = document.getElementById("navLinks");
    const navLinks = document.querySelectorAll(".nav-links a");

    if (hamburgerBtn && navLinksContainer) {
        hamburgerBtn.addEventListener("click", () => {
            const isOpen = navLinksContainer.classList.toggle("active");
            hamburgerBtn.classList.toggle("open", isOpen);
            hamburgerBtn.setAttribute("aria-expanded", isOpen);
        });
    }

    navLinks.forEach(link => {
        link.addEventListener("click", event => {

            const targetId = link.getAttribute("href");

            /* ✨ Animasi saat pilihan menu ditekan */
            if (window.innerWidth <= 768) {
                link.classList.add("clicked");
            }

            /*
            Beri waktu animasi berjalan sebelum
            menu mobile ditutup.
            */
            setTimeout(() => {

                if (navLinksContainer) {
                    navLinksContainer.classList.remove("active");
                }

                if (hamburgerBtn) {
                    hamburgerBtn.classList.remove("open");
                    hamburgerBtn.setAttribute("aria-expanded", false);
                }

            }, window.innerWidth <= 768 ? 280 : 0);


            if (targetId && targetId.startsWith("#")) {
                const section = document.querySelector(targetId);

                if (section) {
                    event.preventDefault();

                    setTimeout(() => {
                        section.scrollIntoView({
                            behavior: "smooth",
                            block: "start"
                        });
                    }, window.innerWidth <= 768 ? 280 : 0);
                }
            }
        });
    });

    console.log("🌿 Portfolio Willy Alfaro D.P berhasil dimuat.");
});