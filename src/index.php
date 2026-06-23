<?php
// Portfolio Data - Edit sesuai kebutuhan Anda
$profile = [
    'name'       => 'Abeil Rafli Aldhani',
    'title'      => 'IT Enthusiast',
    'tagline'    => 'Membangun pengalaman digital yang bermakna',
    'email'      => 'abeilrfl@gmail.com',
    'phone'      => '+62 851-6274-1144',
    'location'   => 'Jakarta, Indonesia',
    'github'     => 'https://github.com/Unknown7529',
    'linkedin'   => 'https://linkedin.com/in/abeil-rafli',
    'avatar_initials' => 'ARA',
    'about'      => 'Saya adalah fresh graduate dengan latar belakang IT dan pengalaman dalam pengembangan web. Saya memiliki minat yang kuat dalam membangun aplikasi yang efisien dan user-friendly, serta selalu bersemangat untuk belajar teknologi baru dan berkolaborasi dalam tim.',];

$skills = [
    ['name' => 'PHP',        'level' => 90, 'category' => 'Backend'],
    ['name' => 'JavaScript', 'level' => 88, 'category' => 'Frontend'],
    ['name' => 'React',      'level' => 80, 'category' => 'Frontend'],
    ['name' => 'MySQL',      'level' => 82, 'category' => 'Database'],
    ['name' => 'Docker',     'level' => 75, 'category' => 'DevOps'],
    ['name' => 'CSS / Tailwind', 'level' => 85, 'category' => 'Frontend'],
    ['name' => 'Git',        'level' => 88, 'category' => 'DevOps'],
];

$experiences = [
    [
        'role'    => 'Senior Full Stack Developer',
        'company' => 'PT Digital Nusantara',
        'period'  => '2022 – Sekarang',
        'desc'    => 'Memimpin tim 5 developer dalam membangun platform e-commerce skala besar dengan 100k+ pengguna aktif.',
    ],
    [
        'role'    => 'Full Stack Developer',
        'company' => 'Startup Kreatif Indonesia',
        'period'  => '2020 – 2022',
        'desc'    => 'Mengembangkan aplikasi SaaS berbasis Laravel dan Vue.js untuk klien dari berbagai industri.',
    ],
    [
        'role'    => 'Junior Web Developer',
        'company' => 'CV Teknologi Maju',
        'period'  => '2018 – 2020',
        'desc'    => 'Membangun dan memelihara website perusahaan serta sistem internal berbasis PHP.',
    ],
];

$projects = [
    [
        'title' => 'E-Commerce Platform',
        'tech'  => ['PHP', 'Laravel', 'MySQL', 'Vue.js'],
        'desc'  => 'Platform belanja online lengkap dengan fitur pembayaran, manajemen inventori, dan analitik real-time.',
        'color' => '#6C63FF',
        'icon'  => '🛒',
        'link'  => '#',
    ],
    [
        'title' => 'Task Management App',
        'tech'  => ['React', 'Node.js', 'PostgreSQL'],
        'desc'  => 'Aplikasi manajemen tugas kolaboratif dengan fitur drag-and-drop, notifikasi real-time, dan laporan produktivitas.',
        'color' => '#FF6584',
        'icon'  => '✅',
        'link'  => '#',
    ],
    [
        'title' => 'API Gateway Service',
        'tech'  => ['PHP', 'Docker', 'Redis', 'Nginx'],
        'desc'  => 'Gateway API terpusat dengan rate limiting, autentikasi JWT, dan monitoring performa terintegrasi.',
        'color' => '#43B89C',
        'icon'  => '⚡',
        'link'  => '#',
    ],
    [
        'title' => 'Analytics Dashboard',
        'tech'  => ['JavaScript', 'Chart.js', 'PHP', 'MySQL'],
        'desc'  => 'Dashboard analitik bisnis interaktif dengan visualisasi data real-time dan laporan yang dapat diekspor.',
        'color' => '#F7A072',
        'icon'  => '📊',
        'link'  => '#',
    ],
];

// Handle form submission
$form_message = '';
$form_success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_submit'])) {
    $name    = htmlspecialchars(trim($_POST['name'] ?? ''));
    $email   = htmlspecialchars(trim($_POST['email'] ?? ''));
    $subject = htmlspecialchars(trim($_POST['subject'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    if ($name && $email && $message && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Di sini Anda bisa menambahkan logic pengiriman email (mail(), PHPMailer, dsb.)
        $form_success = true;
        $form_message = "Terima kasih, $name! Pesan Anda telah berhasil dikirim. Saya akan segera menghubungi Anda.";
    } else {
        $form_message = 'Mohon lengkapi semua kolom dengan benar.';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $profile['name'] ?> — Portfolio</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>

<!-- ======= NAVBAR ======= -->
<nav class="navbar" id="navbar">
    <div class="nav-inner">
        <a href="#home" class="nav-logo"><?= $profile['avatar_initials'] ?></a>
        <ul class="nav-links" id="navLinks">
            <li><a href="#about">Tentang</a></li>
            <li><a href="#skills">Keahlian</a></li>
            <li><a href="#experience">Pengalaman</a></li>
            <li><a href="#projects">Proyek</a></li>
            <li><a href="#contact">Kontak</a></li>
        </ul>
        <button class="nav-toggle" id="navToggle" aria-label="Toggle menu">
            <span></span><span></span><span></span>
        </button>
    </div>
</nav>

<!-- ======= HERO ======= -->
<section class="hero" id="home">
    <div class="hero-bg">
        <div class="grid-overlay"></div>
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
    </div>
    <div class="hero-content">
        <div class="hero-badge">
            <span class="badge-dot"></span>
            Tersedia untuk proyek baru
        </div>
        <h1 class="hero-name"><?= $profile['name'] ?></h1>
        <p class="hero-title"><?= $profile['title'] ?></p>
        <p class="hero-tagline"><?= $profile['tagline'] ?></p>
        <div class="hero-actions">
            <a href="#projects" class="btn btn-primary">Lihat Proyek</a>
            <a href="#contact" class="btn btn-outline">Hubungi Saya</a>
        </div>
        <div class="hero-stats">
            <div class="stat"><span class="stat-num" data-target="5">0</span><span>+</span><p>Tahun Pengalaman</p></div>
            <div class="stat-divider"></div>
            <div class="stat"><span class="stat-num" data-target="40">0</span><span>+</span><p>Proyek Selesai</p></div>
            <div class="stat-divider"></div>
            <div class="stat"><span class="stat-num" data-target="20">0</span><span>+</span><p>Klien Puas</p></div>
        </div>
    </div>
    <div class="scroll-indicator">
        <div class="scroll-mouse"><div class="scroll-wheel"></div></div>
        <p>Scroll</p>
    </div>
</section>

<!-- ======= ABOUT ======= -->
<section class="section" id="about">
    <div class="container">
        <div class="section-header">
            <span class="section-label">01 / Tentang Saya</span>
            <h2 class="section-title">Siapa Saya?</h2>
        </div>
        <div class="about-grid">
            <div class="about-avatar">
                <div class="avatar-ring">
                    <div class="avatar-circle"><?= $profile['avatar_initials'] ?></div>
                </div>
                <div class="about-info-cards">
                    <div class="info-card">
                        <span class="info-icon">📍</span>
                        <span><?= $profile['location'] ?></span>
                    </div>
                    <div class="info-card">
                        <span class="info-icon">✉️</span>
                        <span><?= $profile['email'] ?></span>
                    </div>
                    <div class="info-card">
                        <span class="info-icon">📱</span>
                        <span><?= $profile['phone'] ?></span>
                    </div>
                </div>
            </div>
            <div class="about-text">
                <p class="about-lead"><?= $profile['about'] ?></p>
                <div class="about-highlights">
                    <div class="highlight"><span>🎯</span><p>Fokus pada kualitas kode yang bersih dan terstruktur</p></div>
                    <div class="highlight"><span>🚀</span><p>Selalu mengikuti perkembangan teknologi terbaru</p></div>
                    <div class="highlight"><span>🤝</span><p>Kolaborasi tim yang kuat dan komunikasi terbuka</p></div>
                </div>
                <div class="about-socials">
                    <a href="<?= $profile['github'] ?>" target="_blank" class="social-btn">GitHub</a>
                    <a href="<?= $profile['linkedin'] ?>" target="_blank" class="social-btn">LinkedIn</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ======= SKILLS ======= -->
<section class="section section-alt" id="skills">
    <div class="container">
        <div class="section-header">
            <span class="section-label">02 / Keahlian</span>
            <h2 class="section-title">Tech Stack Saya</h2>
        </div>
        <div class="skills-grid">
            <?php foreach ($skills as $skill): ?>
            <div class="skill-card" data-aos="fade-up">
                <div class="skill-header">
                    <span class="skill-name"><?= $skill['name'] ?></span>
                    <span class="skill-badge"><?= $skill['category'] ?></span>
                </div>
                <div class="skill-bar-track">
                    <div class="skill-bar-fill" data-level="<?= $skill['level'] ?>"></div>
                </div>
                <span class="skill-percent"><?= $skill['level'] ?>%</span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ======= EXPERIENCE ======= -->
<section class="section" id="experience">
    <div class="container">
        <div class="section-header">
            <span class="section-label">03 / Pengalaman</span>
            <h2 class="section-title">Perjalanan Karir</h2>
        </div>
        <div class="timeline">
            <?php foreach ($experiences as $i => $exp): ?>
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-card">
                    <span class="timeline-period"><?= $exp['period'] ?></span>
                    <h3 class="timeline-role"><?= $exp['role'] ?></h3>
                    <p class="timeline-company"><?= $exp['company'] ?></p>
                    <p class="timeline-desc"><?= $exp['desc'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ======= PROJECTS ======= -->
<section class="section section-alt" id="projects">
    <div class="container">
        <div class="section-header">
            <span class="section-label">04 / Proyek</span>
            <h2 class="section-title">Karya Terbaik Saya</h2>
        </div>
        <div class="projects-grid">
            <?php foreach ($projects as $project): ?>
            <div class="project-card">
                <div class="project-icon" style="background: <?= $project['color'] ?>22; color: <?= $project['color'] ?>">
                    <?= $project['icon'] ?>
                </div>
                <h3 class="project-title"><?= $project['title'] ?></h3>
                <p class="project-desc"><?= $project['desc'] ?></p>
                <div class="project-tech">
                    <?php foreach ($project['tech'] as $tech): ?>
                    <span class="tech-tag"><?= $tech ?></span>
                    <?php endforeach; ?>
                </div>
                <a href="<?= $project['link'] ?>" class="project-link">
                    Lihat Detail <span>→</span>
                </a>
                <div class="project-accent" style="background: <?= $project['color'] ?>"></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ======= CONTACT ======= -->
<section class="section" id="contact">
    <div class="container">
        <div class="section-header">
            <span class="section-label">05 / Kontak</span>
            <h2 class="section-title">Mari Berkolaborasi</h2>
            <p class="section-subtitle">Punya proyek menarik? Saya siap membantu mewujudkannya.</p>
        </div>
        <div class="contact-grid">
            <div class="contact-info">
                <h3>Hubungi Langsung</h3>
                <div class="contact-item">
                    <div class="contact-icon">✉</div>
                    <div><p class="contact-label">Email</p><p><?= $profile['email'] ?></p></div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">📱</div>
                    <div><p class="contact-label">WhatsApp</p><p><?= $profile['phone'] ?></p></div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon">📍</div>
                    <div><p class="contact-label">Lokasi</p><p><?= $profile['location'] ?></p></div>
                </div>
            </div>
            <div class="contact-form-wrap">
                <?php if ($form_message): ?>
                <div class="form-alert <?= $form_success ? 'alert-success' : 'alert-error' ?>">
                    <?= $form_message ?>
                </div>
                <?php endif; ?>
                <form class="contact-form" method="POST" action="#contact" id="contactForm">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="name" placeholder="John Doe" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat Email</label>
                            <input type="email" name="email" placeholder="john@email.com" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Subjek</label>
                        <input type="text" name="subject" placeholder="Diskusi Proyek Web">
                    </div>
                    <div class="form-group">
                        <label>Pesan</label>
                        <textarea name="message" rows="5" placeholder="Ceritakan proyek Anda..." required></textarea>
                    </div>
                    <button type="submit" name="contact_submit" class="btn btn-primary btn-full">
                        Kirim Pesan →
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- ======= FOOTER ======= -->
<footer class="footer">
    <div class="container">
        <div class="footer-inner">
            <p class="footer-logo"><?= $profile['avatar_initials'] ?></p>
            <p class="footer-copy">© <?= date('Y') ?> <?= $profile['name'] ?>. Dibuat dengan ❤️ menggunakan PHP & Docker.</p>
            <div class="footer-links">
                <a href="<?= $profile['github'] ?>" target="_blank">GitHub</a>
                <a href="<?= $profile['linkedin'] ?>" target="_blank">LinkedIn</a>
            </div>
        </div>
    </div>
</footer>

<div class="back-to-top" id="backToTop">↑</div>

<script src="js/main.js"></script>
</body>
</html>
