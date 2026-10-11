<?php
session_start();
require_once 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Bank Sampah Unit FMIPA UNM</title>
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
                        <a class="nav-link" href="news.php">Berita</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Lainnya
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item active" href="about.php">Tentang Kami</a></li>
                            <li><a class="dropdown-item" href="testimoni.php">Testimoni</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="contact.php">Hubungi Kami</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex me-2 my-2 my-lg-0" role="search" style="max-width: 200px;">
                    <input class="form-control form-control-sm me-1" type="search" placeholder="Cari..." aria-label="Search">
                    <button class="btn btn-green btn-sm" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
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

    <!-- Tagline Halaman Tentang Kami -->
    <div class="container my-4">
        <div class="banner-box-style shadow-sm">
            <div class="banner-content-custom">
                <span class="badge bg-success px-3 py-2 text-uppercase mb-2"><i class="fa-solid fa-circle-info me-1"></i> Profil Lengkap</span>
                <h1 class="display-5 fw-bold mb-3 text-white">Tentang BSU FMIPA UNM</h1>
                <p class="lead mb-0 text-white">
                    Mengenal lebih dekat sejarah, tata kelola, dan struktur organisasi pengurus Bank Sampah Unit FMIPA UNM 
                    <a href="https://www.instagram.com/fmipaunm/" target="_blank" class="text-success text-decoration-none fw-bold">@fmipaunm</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Profil & Latar Belakang -->
    <section class="container my-5 py-3">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="badge bg-success-subtle text-success px-3 py-2 text-uppercase fw-bold mb-2">Profil Organisasi</span>
                <h2 class="fw-bold text-dark mb-3">Solusi Berkelanjutan Pengelolaan Sampah Kampus Parantambung</h2>
                <p class="text-secondary lh-lg mb-3">
                    <strong>Bank Sampah Unit (BSU) FMIPA UNM</strong> diresmikan pada hari Rabu, 9 Juni 2026 sebagai sarana pengelolaan sampah mandiri dan terintegrasi di lingkungan Fakultas Matematika dan Ilmu Pengetahuan Alam Universitas Negeri Makassar.
                </p>
                <p class="text-secondary lh-lg mb-4">
                    Berangkat dari kesadaran pentingnya kelestarian lingkungan dan implementasi <em>Sustainable Development Goals (SDGs)</em>, BSU FMIPA UNM hadir mengadopsi model ekonomi sirkular yang mengubah paradigma sampah dari beban lingkungan menjadi sumber daya bernilai ekonomis dan ekologis bagi seluruh civitas akademika.
                </p>
                <div class="d-flex gap-3 flex-wrap">
                    <div class="p-3 bg-white rounded-3 border text-center flex-fill shadow-sm">
                        <i class="fa-solid fa-calendar-day text-success fs-3 mb-1"></i>
                        <div class="fw-bold small text-dark">Diresmikan</div>
                        <div class="text-muted small">10 Juni 2026</div>
                    </div>
                    <div class="p-3 bg-white rounded-3 border text-center flex-fill shadow-sm">
                        <i class="fa-solid fa-location-dot text-success fs-3 mb-1"></i>
                        <div class="fw-bold small text-dark">Lokasi</div>
                        <div class="text-muted small">Kampus Parantambung</div>
                    </div>
                    <div class="p-3 bg-white rounded-3 border text-center flex-fill shadow-sm">
                        <i class="fa-solid fa-leaf text-success fs-3 mb-1"></i>
                        <div class="fw-bold small text-dark">Fokus</div>
                        <div class="text-muted small">Zero Waste &amp; Sirkular</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img src="images/fmipaUNM.jpg" alt="Kampus FMIPA UNM" class="img-fluid rounded-4 shadow-lg border border-3 border-success" style="max-height: 380px; width: 100%; object-fit: cover;">
            </div>
        </div>
    </section>

    <!-- Struktur Organisasi Hirarki BSU FMIPA UNM -->
    <section class="container my-5 py-4 border-top">
        <div class="text-center mb-5">
            <span class="badge bg-success-subtle text-success px-3 py-2 text-uppercase fw-bold mb-2">Bagan Hirarki</span>
            <h2 class="fw-bold text-dark">Struktur Organisasi BSU FMIPA UNM</h2>
            <p class="text-muted">Susunan kepengurusan Bank Sampah Unit Fakultas Matematika dan Ilmu Pengetahuan Alam UNM</p>
        </div>

        <div class="org-chart-wrapper">

            <!-- TINGKAT 1: Pembina, Pengarah, Penanggungjawab -->
            <div class="org-divider-title">
                <span>Tingkat Pengarah &amp; Penasihat</span>
            </div>
            <div class="row g-4 justify-content-center mb-4">
                <!-- Pembina -->
                <div class="col-md-4">
                    <div class="org-card org-level-pimpinan">
                        <span class="org-role-badge">Pembina</span>
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center mx-auto my-2" style="width: 60px; height: 60px; font-size: 1.5rem;">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Dekan FMIPA UNM</h6>
                        <small class="text-muted">Pelindung &amp; Pembina Utama Kebijakan Green Campus</small>
                    </div>
                </div>

                <!-- Pengarah -->
                <div class="col-md-4">
                    <div class="org-card org-level-pimpinan">
                        <span class="org-role-badge">Pengarah</span>
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center mx-auto my-2" style="width: 60px; height: 60px; font-size: 1.5rem;">
                            <i class="fa-solid fa-compass"></i>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Wakil Dekan Bidang Kemahasiswaan &amp; Kerjasama</h6>
                        <small class="text-muted">Pengarah Strategis Program Lingkungan &amp; Kemitraan</small>
                    </div>
                </div>

                <!-- Penanggungjawab -->
                <div class="col-md-4">
                    <div class="org-card org-level-pimpinan">
                        <span class="org-role-badge">Penanggungjawab</span>
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center mx-auto my-2" style="width: 60px; height: 60px; font-size: 1.5rem;">
                            <i class="fa-solid fa-user-shield"></i>
                        </div>
                        <h6 class="fw-bold text-dark mb-1">Ketua Tim Pengelola Lingkungan Hidup FMIPA</h6>
                        <small class="text-muted">Penanggungjawab Operasional &amp; Pelaporan Fakultas</small>
                    </div>
                </div>
            </div>

            <!-- TINGKAT 2: KETUA -->
            <div class="org-divider-title">
                <span>Pimpinan Pengurus Harian</span>
            </div>
            <div class="row justify-content-center mb-4">
                <div class="col-md-6 col-lg-4">
                    <div class="org-card org-level-ketua shadow-sm">
                        <span class="org-role-badge bg-success text-white">Ketua Umum</span>
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center mx-auto my-2" style="width: 70px; height: 70px; font-size: 1.8rem;">
                            <i class="fa-solid fa-user-tie"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-1">Ketua BSU</h5>
                        <p class="small text-muted mb-0">Memimpin koordinasi seluruh program kerja, kemitraan, dan tata kelola unit bank sampah</p>
                    </div>
                </div>
            </div>

            <!-- TINGKAT 2.1: SEKRETARIAT & KEBENDAHARAAN -->
            <div class="row g-4 mb-4">
                <!-- Blok Sekretariat -->
                <div class="col-lg-6">
                    <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                        <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom">
                            <i class="fa-solid fa-file-signature text-success fs-5"></i>
                            <h6 class="fw-bold text-dark mb-0">Sekretariat BSU</h6>
                        </div>
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="org-card org-level-sekretariat">
                                    <span class="org-role-badge bg-success text-white">Sekretaris</span>
                                    <h6 class="fw-bold text-dark mb-1">Sekretaris Utama</h6>
                                    <small class="text-muted">Manajemen administrasi, korespondensi, dan pengarsipan berkas BSU</small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="org-card org-level-sekretariat">
                                    <span class="org-role-badge">Wakil Sekretaris 1</span>
                                    <h6 class="fw-bold text-dark mb-1">Wakil Sekretaris 1</h6>
                                    <small class="text-muted">Administrasi data anggota &amp; nasabah</small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="org-card org-level-sekretariat">
                                    <span class="org-role-badge">Wakil Sekretaris 2</span>
                                    <h6 class="fw-bold text-dark mb-1">Wakil Sekretaris 2</h6>
                                    <small class="text-muted">Dokumentasi notulensi &amp; pelaporan berkala</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Blok Kebendaharaan -->
                <div class="col-lg-6">
                    <div class="p-4 bg-white rounded-4 border shadow-sm h-100">
                        <div class="d-flex align-items-center gap-2 mb-3 pb-2 border-bottom">
                            <i class="fa-solid fa-wallet text-success fs-5"></i>
                            <h6 class="fw-bold text-dark mb-0">Kebendaharaan &amp; Keuangan</h6>
                        </div>
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="org-card org-level-bendahara">
                                    <span class="org-role-badge bg-success text-white">Bendahara</span>
                                    <h6 class="fw-bold text-dark mb-1">Bendahara Utama</h6>
                                    <small class="text-muted">Pengelolaan keuangan, kas unit, dan pembukuan sirkulasi saldo tabungan</small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="org-card org-level-bendahara">
                                    <span class="org-role-badge">Wakil Bendahara 1</span>
                                    <h6 class="fw-bold text-dark mb-1">Wakil Bendahara 1</h6>
                                    <small class="text-muted">Pencatatan konversi rupiah &amp; poin nasabah</small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="org-card org-level-bendahara">
                                    <span class="org-role-badge">Wakil Bendahara 2</span>
                                    <h6 class="fw-bold text-dark mb-1">Wakil Bendahara 2</h6>
                                    <small class="text-muted">Pencairan saldo, transaksi kas &amp; logistik</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TINGKAT 3: UNIT KERJA (4 DIVISI) -->
            <div class="org-divider-title">
                <span>Unit Kerja Operasional</span>
            </div>
            <div class="row g-4">
                <!-- Divisi 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="org-card org-level-divisi">
                        <span class="org-role-badge">Unit Kerja 1</span>
                        <div class="text-success mb-2"><i class="fa-solid fa-scale-balanced fa-2x"></i></div>
                        <h6 class="fw-bold text-dark mb-2">Divisi Penimbangan &amp; Pencatatan</h6>
                        <p class="small text-muted mb-0">Operasional penimbangan sampah, kalibrasi timbangan, dan pencatatan buku tabungan digital nasabah.</p>
                    </div>
                </div>

                <!-- Divisi 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="org-card org-level-divisi">
                        <span class="org-role-badge">Unit Kerja 2</span>
                        <div class="text-success mb-2"><i class="fa-solid fa-boxes-packing fa-2x"></i></div>
                        <h6 class="fw-bold text-dark mb-2">Divisi Pemilahan &amp; Pengepakan</h6>
                        <p class="small text-muted mb-0">Sortir sampah organik dan anorganik, pengepakan kardus &amp; botol, serta proses kompos dan eco-enzyme.</p>
                    </div>
                </div>

                <!-- Divisi 3 -->
                <div class="col-md-6 col-lg-3">
                    <div class="org-card org-level-divisi">
                        <span class="org-role-badge">Unit Kerja 3</span>
                        <div class="text-success mb-2"><i class="fa-solid fa-handshake fa-2x"></i></div>
                        <h6 class="fw-bold text-dark mb-2">Divisi Promosi &amp; Kemitraan</h6>
                        <p class="small text-muted mb-0">Menjalin kerjasama dengan Bank Sampah Induk (BSI), pengepul daur ulang, sekolah binaan, dan UMKM.</p>
                    </div>
                </div>

                <!-- Divisi 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="org-card org-level-divisi">
                        <span class="org-role-badge">Unit Kerja 4</span>
                        <div class="text-success mb-2"><i class="fa-solid fa-bullhorn fa-2x"></i></div>
                        <h6 class="fw-bold text-dark mb-2">Divisi Sosialisasi &amp; Edukasi</h6>
                        <p class="small text-muted mb-0">Edukasi civitas akademika lewat seminar, workshop zero waste, pelatihan eco-enzyme, dan media sosial.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Galeri Foto Dokumentasi Kegiatan (Format 4:3) -->
    <section class="container my-5 py-4 border-top">
        <div class="text-center mb-5">
            <span class="badge bg-success-subtle text-success px-3 py-2 text-uppercase fw-bold mb-2">Dokumentasi</span>
            <h2 class="fw-bold text-dark">Galeri Kegiatan BSU FMIPA UNM</h2>
            <p class="text-muted">Dokumentasi momen edukasi, penimbangan, dan pengelolaan sampah di Kampus Parantambung</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4 col-sm-6">
                <div class="rounded-4 overflow-hidden shadow-sm h-100 border bg-white p-2">
                    <img src="images/img1 (1).jpeg" alt="Kegiatan BSU 1" class="gallery-img-4-3">
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="rounded-4 overflow-hidden shadow-sm h-100 border bg-white p-2">
                    <img src="images/img1 (5).jpeg" alt="Kegiatan BSU 2" class="gallery-img-4-3">
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="rounded-4 overflow-hidden shadow-sm h-100 border bg-white p-2">
                    <img src="images/img1 (10).jpeg" alt="Kegiatan BSU 3" class="gallery-img-4-3">
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="rounded-4 overflow-hidden shadow-sm h-100 border bg-white p-2">
                    <img src="images/img1 (8).jpeg" alt="Kegiatan BSU 4" class="gallery-img-4-3">
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="rounded-4 overflow-hidden shadow-sm h-100 border bg-white p-2">
                    <img src="images/img1 (9).jpeg" alt="Kegiatan BSU 5" class="gallery-img-4-3">
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="rounded-4 overflow-hidden shadow-sm h-100 border bg-white p-2">
                    <img src="images/img1 (12).jpeg" alt="Kegiatan BSU 6" class="gallery-img-4-3">
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
                        <span class="small text-light d-block fw-semibold mb-1"><i class="fa-solid fa-sitemap text-success me-1"></i> Struktur Tata Kelola</span>
                        <span class="small text-secondary">Dikelola secara terstruktur dan transparan demi keberlanjutan program bank sampah kampus.</span>
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
    <script src="js/script.js?v=2.2"></script>
</body>
</html>

