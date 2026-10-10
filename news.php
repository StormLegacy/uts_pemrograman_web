<?php
session_start();
require_once 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita - Bank Sampah Unit FMIPA UNM</title>
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
                        <a class="nav-link" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="work.php">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="news.php">Berita</a>
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

    <!-- Tagline Halaman Berita -->
    <div class="container my-4">
        <div class="banner-box-style shadow-sm">
            <div class="banner-content-custom">
                <span class="badge bg-success px-3 py-2 text-uppercase mb-2"><i class="fa-solid fa-newspaper me-1"></i> Publikasi Resmi</span>
                <h1 class="display-5 fw-bold mb-3 text-white">Berita &amp; Pembaruan</h1>
                <p class="lead mb-0 text-white">
                    Publikasi kegiatan, inovasi lingkungan, dan dokumentasi BSU FMIPA UNM 
                    <a href="https://www.instagram.com/fmipaunm/" target="_blank" class="text-success text-decoration-none fw-bold">@fmipaunm</a>
                </p>
            </div>
        </div>
    </div>

    <!-- 1. Daftar Artikel & Pembaruan Kegiatan Terbaru BSU FMIPA UNM -->
    <section class="news-section py-5">
        <div class="container">
            <div class="d-flex align-items-center mb-4">
                <div>
                    <span class="badge bg-success-subtle text-success px-3 py-2 text-uppercase fw-bold mb-1">Kabar BSU Terkini</span>
                    <h2 class="fw-bold text-dark mb-0">Daftar Artikel &amp; Pembaruan Kegiatan BSU FMIPA UNM</h2>
                </div>
            </div>

            <div class="row g-4">
                <!-- Berita 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="news-card shadow-sm d-flex flex-column h-100">
                        <div class="overflow-hidden">
                            <img src="https://analisishmjkimiafmipaunmgroup.wordpress.com/wp-content/uploads/2026/06/10004205548049966543220286412.jpg" class="news-img" alt="Berita 1">
                        </div>
                        <div class="p-4 d-flex flex-column flex-grow-1 bg-white">
                            <span class="news-date mb-2 text-success fw-semibold"><i class="fa-regular fa-calendar-days me-2"></i>29 JUNI 2026</span>
                            <a href="https://analisishmjkimiafmipaunmgroup.wordpress.com/2026/06/29/merajut-sirkularitas-menumbuhkan-kebermanfaatan-langkah-bsu-fmipa-unm-kelola-sampah-kampus/" target="_blank" class="news-title mb-2 text-decoration-none">Merajut Sirkularitas, Menumbuhkan Kebermanfaatan: Langkah BSU FMIPA UNM Kelola Sampah Kampus</a>
                            <p class="text-muted small mb-3">Langkah nyata BSU FMIPA UNM dalam mengolah sampah organik dan anorganik kampus untuk membangun sirkularitas ramah lingkungan.</p>
                            <span class="text-success small fw-bold mt-auto">Baca Artikel Selengkapnya <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i></span>
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
                            <span class="news-date mb-2 text-success fw-semibold"><i class="fa-regular fa-calendar-days me-2"></i>29 JUNI 2026</span>
                            <a href="https://analisishmjkimiafmipaunmgroup.wordpress.com/2026/06/29/bsu-fmipa-unm-perluas-partisipasi-sivitas-akademika-lewat-program-nasabah-bank-sampah/" target="_blank" class="news-title mb-2 text-decoration-none">BSU FMIPA UNM Perluas Partisipasi Sivitas Akademika Lewat Program Nasabah Bank Sampah</a>
                            <p class="text-muted small mb-3">Peluncuran program buku tabungan sampah digital untuk memotivasi mahasiswa dan dosen berpartisipasi aktif menabung sampah.</p>
                            <span class="text-success small fw-bold mt-auto">Baca Artikel Selengkapnya <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i></span>
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
                            <span class="news-date mb-2 text-success fw-semibold"><i class="fa-regular fa-calendar-days me-2"></i>11 JUNI 2026</span>
                            <a href="https://mediabioma.com/fmipa-unm-resmikan-bank-sampah-unit-wujud-nyata-kampus-peduli-lingkungan-dan-berkelanjutan/" target="_blank" class="news-title mb-2 text-decoration-none">FMIPA UNM Resmikan Bank Sampah Unit, Wujud Nyata Kampus Peduli Lingkungan dan Berkelanjutan</a>
                            <p class="text-muted small mb-3">Peresmian resmi BSU FMIPA UNM oleh pimpinan fakultas sebagai wujud implementasi Green Campus dan Tujuan SDGs.</p>
                            <span class="text-success small fw-bold mt-auto">Baca Artikel Selengkapnya <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i></span>
                        </div>
                    </div>
                </div>

                <!-- Berita 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="news-card shadow-sm d-flex flex-column h-100">
                        <div class="overflow-hidden">
                            <img src="images/img1 (3).jpeg" class="news-img" alt="Berita 4">
                        </div>
                        <div class="p-4 d-flex flex-column flex-grow-1 bg-white">
                            <span class="news-date mb-2 text-success fw-semibold"><i class="fa-regular fa-calendar-days me-2"></i>18 AGUSTUS 2026</span>
                            <a href="work.php#organik" class="news-title mb-2 text-decoration-none">Pelatihan Fermentasi Eco-Enzyme Limbah Buah Kantin Bersama Pengurus BSU</a>
                            <p class="text-muted small mb-3">Sosialisasi teknik pembuatan eco-enzyme dari kulit buah kantin yang berhasil menghasilkan puluhan liter disinfektan alami lab.</p>
                            <span class="text-success small fw-bold mt-auto">Lihat Rincian Program <i class="fa-solid fa-arrow-right ms-1"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. Arsip Berita Fakultas MIPA UNM -->
    <section class="container my-5 py-4 border-top">
        <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap gap-2">
            <div>
                <span class="badge bg-success-subtle text-success px-3 py-2 text-uppercase fw-bold mb-1">Portal Berita Kampus</span>
                <h3 class="fw-bold mb-0 text-dark">Arsip Berita Fakultas MIPA UNM</h3>
                <p class="text-muted small mb-0">Pusat dokumentasi informasi resmi dan publikasi kegiatan ilmiah di Kampus Parantambung</p>
            </div>
            <a href="https://fmipa.unm.ac.id/category/news/" target="_blank" class="btn btn-outline-green fw-semibold">
                Kunjungi Portal Resmi FMIPA <i class="fa-solid fa-arrow-up-right-from-square ms-1"></i>
            </a>
        </div>

        <div class="row g-4">
            <!-- Arsip Card 1 -->
            <div class="col-md-4">
                <div class="card h-100 border rounded-4 shadow-sm p-4 bg-white">
                    <div class="text-success mb-2"><i class="fa-solid fa-newspaper fa-2x"></i></div>
                    <span class="badge bg-success-subtle text-success w-auto mb-2" style="max-width: fit-content;">Akademik &amp; Lingkungan</span>
                    <h5 class="fw-bold text-dark">Program Inisiatif Green Campus &amp; SDGs FMIPA UNM</h5>
                    <p class="text-muted small">Peningkatan fasilitas pemilahan sampah di tiap jurusan (Matematika, Fisika, Kimia, Biologi, Geografi, dan IPA) menuju fakultas ramah lingkungan tingkat nasional.</p>
                    <a href="https://fmipa.unm.ac.id/category/news/" target="_blank" class="btn btn-sm btn-link text-success p-0 text-decoration-none fw-bold mt-auto">
                        Buka Arsip Fakultas <i class="fa-solid fa-chevron-right ms-1"></i>
                    </a>
                </div>
            </div>

            <!-- Arsip Card 2 -->
            <div class="col-md-4">
                <div class="card h-100 border rounded-4 shadow-sm p-4 bg-white">
                    <div class="text-success mb-2"><i class="fa-solid fa-flask fa-2x"></i></div>
                    <span class="badge bg-success-subtle text-success w-auto mb-2" style="max-width: fit-content;">Riset &amp; Inovasi</span>
                    <h5 class="fw-bold text-dark">Pemanfaatan Kompos Hasil Olahan BSU untuk Kebun Botani</h5>
                    <p class="text-muted small">Kerjasama penelitian dosen dan mahasiswa Biologi dalam menguji efektivitas pupuk kompos BSU terhadap pertumbuhan tanaman obat langka di Parantambung.</p>
                    <a href="https://fmipa.unm.ac.id/category/news/" target="_blank" class="btn btn-sm btn-link text-success p-0 text-decoration-none fw-bold mt-auto">
                        Buka Arsip Fakultas <i class="fa-solid fa-chevron-right ms-1"></i>
                    </a>
                </div>
            </div>

            <!-- Arsip Card 3 -->
            <div class="col-md-4">
                <div class="card h-100 border rounded-4 shadow-sm p-4 bg-white">
                    <div class="text-success mb-2"><i class="fa-solid fa-users-rays fa-2x"></i></div>
                    <span class="badge bg-success-subtle text-success w-auto mb-2" style="max-width: fit-content;">Pengabdian Masyarakat</span>
                    <h5 class="fw-bold text-dark">Edukasi Zero Waste Civitas Akademika ke Warga Sekitar</h5>
                    <p class="text-muted small">Dokumentasi kegiatan bakti sosial dan sosialisasi pemilahan sampah kering oleh pengurus BSU bersama mahasiswa KKN di wilayah Daeng Tata Makassar.</p>
                    <a href="https://fmipa.unm.ac.id/category/news/" target="_blank" class="btn btn-sm btn-link text-success p-0 text-decoration-none fw-bold mt-auto">
                        Buka Arsip Fakultas <i class="fa-solid fa-chevron-right ms-1"></i>
                    </a>
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
                        <span class="small text-light d-block fw-semibold mb-1"><i class="fa-solid fa-newspaper text-success me-1"></i> Publikasi &amp; Berita</span>
                        <span class="small text-secondary">Mengabarkan kegiatan pengelolaan sampah, peresmian program, serta capaian lingkungan hidup FMIPA UNM.</span>
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
