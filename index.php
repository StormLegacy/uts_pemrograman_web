<?php
session_start();
require_once 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Bank Sampah Unit FMIPA UNM</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/Logo-UNM 2.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- CSS Eksternal -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark-custom shadow-sm sticky-top">
        <div class="container-fluid px-4">
            <a class="navbar-brand" href="index.php">
                <img src="images/logo_BSU.png" alt="logo BSU">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="work.php">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="news.php">Berita</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Lainnya
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="about.php">Tentang Kami</a></li>
                            <li><a class="dropdown-item" href="testimoni.php">Testimoni</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="contact.php">Hubungi Kami</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex me-2 my-2 my-lg-0" role="search">
                    <input class="form-control me-2" type="search" placeholder="Cari sesuatu..." aria-label="Search">
                    <button class="btn btn-green" type="submit"><i class="fa-solid fa-magnifying-glass me-1"></i>Cari</button>
                </form>
                <div class="auth-nav-container">
                    <a href="login.php" class="btn btn-auth-nav btn-sm px-3">
                        <i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Masuk / Login
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Carousel Banner -->
    <div class="container my-4">
        <div id="carouselExampleAutoplaying" class="carousel slide carousel-container-box overflow-hidden position-relative" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/img1 (2).jpeg" class="d-block w-100 mx-auto" alt="Dokumentasi BSU 1">
                </div>
                <div class="carousel-item">
                    <img src="images/img1 (1).jpeg" class="d-block w-100 mx-auto" alt="Dokumentasi BSU 2">
                </div>
                <div class="carousel-item">
                    <img src="images/img1 (11).jpeg" class="d-block w-100 mx-auto" alt="Dokumentasi BSU 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Kotak Statistik Pencapaian -->
    <div class="container my-4">
        <div class="stats-box p-4 shadow-sm border">
            <div class="row text-center g-4">
                <!-- 1. Statistik Jumlah Sampah (Utama) -->
                <div class="col-6 col-lg-3 border-end">
                    <div class="stat-item">
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <i class="fa-solid fa-scale-balanced text-success fs-3 me-2"></i>
                            <span class="stat-number">1.850</span><span class="fs-5 fw-bold text-success ms-1">Kg</span>
                        </div>
                        <div class="fw-bold text-dark small text-uppercase">Jumlah Sampah Terkelola</div>
                        <div class="text-muted small">780 Kg Organik &amp; 1.070 Kg Anorganik</div>
                    </div>
                </div>

                <!-- 2. Statistik Nasabah Aktif Civitas -->
                <div class="col-6 col-lg-3 border-end">
                    <div class="stat-item">
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <i class="fa-solid fa-users text-success fs-3 me-2"></i>
                            <span class="stat-number">520+</span><span class="fs-5 fw-bold text-success ms-1">Org</span>
                        </div>
                        <div class="fw-bold text-dark small text-uppercase">Nasabah Aktif Civitas</div>
                        <div class="text-muted small">Mahasiswa, Dosen &amp; Tendik MIPA</div>
                    </div>
                </div>

                <!-- 3. Statistik Saldo Tabungan Terbina -->
                <div class="col-6 col-lg-3 border-end">
                    <div class="stat-item">
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <i class="fa-solid fa-coins text-success fs-3 me-2"></i>
                            <span class="stat-number">14.5</span><span class="fs-5 fw-bold text-success ms-1">Jt</span>
                        </div>
                        <div class="fw-bold text-dark small text-uppercase">Saldo Tabungan Terbina</div>
                        <div class="text-muted small">Total Rp 14.500.000 Nilai Sirkular</div>
                    </div>
                </div>

                <!-- 4. Statistik Kontribusi Reduksi Karbon -->
                <div class="col-6 col-lg-3">
                    <div class="stat-item">
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <i class="fa-solid fa-seedling text-success fs-3 me-2"></i>
                            <span class="stat-number">850</span><span class="fs-5 fw-bold text-success ms-1">Kg</span>
                        </div>
                        <div class="fw-bold text-dark small text-uppercase">Reduksi Emisi Karbon</div>
                        <div class="text-muted small">Kontribusi Nyata Green Campus</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tagline Section -->
    <section class="tagline-section text-center py-4">
        <div class="container">
            <p class="lead mb-3">Sustainable Waste Management Part of FMIPA UNM <a href="https://www.instagram.com/fmipaunm/" target="_blank" class="text-success text-decoration-none fw-bold">@fmipaunm</a></p>
            <div>
                <a href="news.php" class="btn btn-green btn-lg px-4 me-2"><i class="fa-solid fa-newspaper me-1"></i> SELENGKAPNYA</a>
                <a href="contact.php" class="btn btn-outline-green btn-lg px-4"><i class="fa-solid fa-phone me-1"></i> HUBUNGI KAMI</a>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="container my-5 py-4">
        <div class="text-center mb-5">
            <span class="badge bg-success-subtle text-success px-3 py-2 text-uppercase fw-bold mb-2">Program Unggulan</span>
            <h2 class="fw-bold text-dark">Layanan Pengelolaan Sampah Kami</h2>
            <p class="text-muted">Solusi terpadu pemilahan dan daur ulang sampah kampus demi keberlanjutan lingkungan</p>
        </div>
        <div class="row g-4">
            <!-- Service 1 -->
            <div class="col-md-4">
                <div class="service-card">
                    <div class="text-success mb-3"><i class="fa-solid fa-seedling fa-2x"></i></div>
                    <h4 class="fw-bold text-dark">Pemilahan Sampah Organik</h4>
                    <p class="text-muted small mb-0">Proses pemilahan dan pengelolaan limbah yang berasal dari sisa makhluk hidup (seperti sisa makanan atau dedaunan) agar diolah kembali menjadi produk bermanfaat seperti kompos atau eco-enzyme.</p>
                </div>
            </div>
            <!-- Service 2 -->
            <div class="col-md-4">
                <div class="service-card">
                    <div class="text-success mb-3"><i class="fa-solid fa-recycle fa-2x"></i></div>
                    <h4 class="fw-bold text-dark">Menerima Sampah Anorganik</h4>
                    <p class="text-muted small mb-0">Layanan pengumpulan dan penerimaan sampah non-organik (seperti botol plastik, kertas, karton kardus, atau logam) bernilai tabungan rupiah guna mengurangi timbunan sampah kampus.</p>
                </div>
            </div>
            <!-- Service 3 -->
            <div class="col-md-4">
                <div class="service-card">
                    <div class="text-success mb-3"><i class="fa-solid fa-trash-can fa-2x"></i></div>
                    <h4 class="fw-bold text-dark">Layanan Internal &amp; Eksternal</h4>
                    <p class="text-muted small mb-0">Fasilitas penerimaan sampah yang terbuka bagi seluruh civitas akademika FMIPA UNM (internal) maupun masyarakat luas serta mitra binaan sekitar Parantambung (eksternal).</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Berita Section -->
    <section class="news-section py-5">
        <div class="container">
            <div class="d-flex align-items-center mb-5">
                <h2 class="fw-bold text-dark mb-0 me-3">Berita Terkini</h2>
                <div class="flex-grow-1 border-bottom border-2"></div>
            </div>

            <div class="row g-4">
                <!-- Berita 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="news-card shadow-sm d-flex flex-column h-100">
                        <div class="overflow-hidden">
                            <img src="https://analisishmjkimiafmipaunmgroup.wordpress.com/wp-content/uploads/2026/06/10004205548049966543220286412.jpg" class="news-img" alt="Berita 1">
                        </div>
                        <div class="p-4 d-flex flex-column flex-grow-1 bg-white">
                            <span class="news-date mb-2 text-success fw-semibold"><i class="fa-regular fa-calendar-days me-2"></i>JUNI 29, 2026</span>
                            <a href="https://analisishmjkimiafmipaunmgroup.wordpress.com/2026/06/29/merajut-sirkularitas-menumbuhkan-kebermanfaatan-langkah-bsu-fmipa-unm-kelola-sampah-kampus/" target="_blank" class="news-title mb-3 text-decoration-none">Merajut Sirkularitas, Menumbuhkan Kebermanfaatan: Langkah BSU FMIPA UNM Kelola Sampah Kampus</a>
                        </div>
                    </div>
                </div>

                <!-- Berita 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="news-card shadow-sm d-flex flex-column h-100">
                        <div class="overflow-hidden">
                            <img src="https://analisishmjkimiafmipaunmgroup.wordpress.com/wp-content/uploads/2026/06/1000420406214933337720257808.jpg?w=1440" class="news-img" alt="Berita 2">
                        </div>
                        <div class="p-4 d-flex flex-column flex-grow-1 bg-white">
                            <span class="news-date mb-2 text-success fw-semibold"><i class="fa-regular fa-calendar-days me-2"></i>JUNI 29, 2026</span>
                            <a href="https://analisishmjkimiafmipaunmgroup.wordpress.com/2026/06/29/bsu-fmipa-unm-perluas-partisipasi-sivitas-akademika-lewat-program-nasabah-bank-sampah/" target="_blank" class="news-title mb-3 text-decoration-none">BSU FMIPA UNM Perluas Partisipasi Sivitas Akademika Lewat Program Nasabah Bank Sampah</a>
                        </div>
                    </div>
                </div>

                <!-- Berita 3 -->
                <div class="col-md-6 col-lg-3">
                    <div class="news-card shadow-sm d-flex flex-column h-100">
                        <div class="overflow-hidden">
                            <img src="https://mediabioma.com/wp-content/uploads/2026/06/WhatsApp-Image-2026-06-11-at-16.44.23.jpeg" class="news-img" alt="Berita 3">
                        </div>
                        <div class="p-4 d-flex flex-column flex-grow-1 bg-white">
                            <span class="news-date mb-2 text-success fw-semibold"><i class="fa-regular fa-calendar-days me-2"></i>JUNI 11, 2026</span>
                            <a href="https://mediabioma.com/fmipa-unm-resmikan-bank-sampah-unit-wujud-nyata-kampus-peduli-lingkungan-dan-berkelanjutan/" target="_blank" class="news-title mb-3 text-decoration-none">FMIPA UNM Resmikan Bank Sampah Unit, Wujud Nyata Kampus Peduli Lingkungan dan Berkelanjutan</a>
                        </div>
                    </div>
                </div>

                <!-- Berita 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="news-card shadow-sm d-flex flex-column h-100">
                        <div class="overflow-hidden">
                            <img src="images/img1 (7).jpeg" class="news-img" alt="Berita 4">
                        </div>
                        <div class="p-4 d-flex flex-column flex-grow-1 bg-white">
                            <span class="news-date mb-2 text-success fw-semibold"><i class="fa-regular fa-calendar-days me-2"></i>ARSIP</span>
                            <a href="https://fmipa.unm.ac.id/category/news/" target="_blank" class="news-title mb-3 text-decoration-none">Selengkapnya Mengenai Berita Fakultas MIPA UNM</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Berita Section -->

    <!-- About Us Section (Profil BSU) -->
    <section class="about-dark">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <span class="badge bg-success px-3 py-2 text-uppercase mb-3"><i class="fa-solid fa-leaf me-1"></i> Profil BSU</span>
                    <h2 class="fw-bold mb-3">Tentang BSU FMIPA UNM</h2>
                    <p class="text-light-50 mb-3">Bank Sampah Unit (BSU) FMIPA UNM adalah fasilitas pengelolaan sampah mandiri yang diresmikan untuk mewujudkan kampus yang peduli lingkungan dan berkelanjutan. Berbasis pada konsep <strong>ekonomi sirkular</strong> dan <strong>Tujuan Pembangunan Berkelanjutan (SDGs)</strong>, unit ini mengumpulkan serta memilah sampah dari seluruh sivitas akademika untuk diolah kembali menjadi produk bermanfaat seperti kompos, eco-enzyme, maupun bernilai tabungan rupiah.</p>
                    <p class="text-light-50 mb-4">Dengan dukungan pimpinan fakultas serta partisipasi aktif mahasiswa, dosen, dan tenaga kependidikan, BSU FMIPA UNM terus berkomitmen memfasilitasi gerakan pemilahan sampah demi terciptanya lingkungan kampus yang bersih, asri, dan produktif.</p>

                    <a href="about.php" class="btn btn-green px-4 py-2 fw-semibold me-2"><i class="fa-solid fa-circle-info me-2"></i>Selengkapnya Tentang Kami</a>
                    <a href="work.php" class="btn btn-outline-light px-4 py-2 fw-semibold"><i class="fa-solid fa-hand-holding-dollar me-2"></i>Lihat Layanan Kami</a>
                </div>
                <div class="col-lg-5 text-center">
                    <img src="images/logo_BSU.png" alt="About Us" class="rounded-circle img-fluid border border-4 border-success shadow-lg" style="width: 240px; height: 240px; object-fit: cover;">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-5">
                    <h5>Hubungi Kami</h5>
                    <p class="small text-light mb-2"><i class="fa-solid fa-location-dot me-2 text-success"></i>Lokasi <br>
                    FMIPA UNM Kampus Parantambung, Jl. Daeng Tata, Makassar, Sulawesi Selatan, Indonesia</p>
                    <p class="small text-light mb-1"><i class="fa-solid fa-phone me-2 text-success"></i>+62 853-4001-2245 (Humaerah)</p>
                    <p class="small text-light mb-2"><i class="fa-solid fa-phone me-2 text-success"></i>+62 853-1470-0612 (Amel)</p>
                    <p class="small text-light mb-3"><i class="fa-solid fa-envelope me-2 text-success"></i>demo@gmail.com</p>
                    <div class="social-icons d-flex gap-2">
                        <a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a>
                        <a href="https://www.instagram.com/bsu.fmipa_unm/" target="_blank" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3">
                    <h5>Navigasi Cepat</h5>
                    <ul class="list-unstyled small mb-0">
                        <li class="mb-2"><a href="index.php">Beranda</a></li>
                        <li class="mb-2"><a href="about.php">Tentang Kami</a></li>
                        <li class="mb-2"><a href="work.php">Layanan</a></li>
                        <li class="mb-2"><a href="news.php">Berita</a></li>
                        <li class="mb-2"><a href="testimoni.php">Testimoni</a></li>
                        <li class="mb-2"><a href="contact.php">Hubungi Kami</a></li>
                        <li><a href="https://medigrafia.com/edukasi-pengelolaan-sampah-membangun-kesadaran-lingkungan/#gsc.tab=0" target="_blank">Edukasi Sampah</a></li>
                    </ul>
                </div>

                <div class="col-lg-5 col-md-4">
                    <h5>Tentang BSU FMIPA</h5>
                    <p class="small text-light lh-base mb-3">Bank Sampah Unit (BSU) FMIPA UNM diresmikan sebagai sarana edukasi dan pengelolaan limbah mandiri civitas akademika menuju kampus hijau dan ekonomi sirkular berkelanjutan.</p>
                    <div class="footer-highlight-box">
                        <span class="small text-light d-block fw-semibold mb-1"><i class="fa-solid fa-leaf text-success me-1"></i> Ekonomi Sirkular Kampus</span>
                        <span class="small text-secondary">Mengubah limbah organik dan anorganik menjadi bernilai ekonomis dan ramah lingkungan.</span>
                    </div>
                </div>
            </div>

            <hr class="border-secondary my-4">
            <div class="text-center text-light small">
                &copy; 2026 Bank Sampah Unit (BSU) FMIPA UNM. All Rights Reserved.
            </div>
        </div>
    </footer>
    <!-- Akhir Footer -->

    <!-- CDN jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
