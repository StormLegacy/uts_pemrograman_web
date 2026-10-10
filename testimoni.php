<?php
session_start();
require_once 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimoni - Bank Sampah Unit FMIPA UNM</title>
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
                            <li><a class="dropdown-item" href="about.php">Tentang Kami</a></li>
                            <li><a class="dropdown-item active" href="testimoni.php">Testimoni</a></li>
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

    <!-- Tagline Halaman Testimoni -->
    <div class="container my-4">
        <div class="banner-box-style shadow-sm">
            <div class="banner-content-custom">
                <span class="badge bg-success px-3 py-2 text-uppercase mb-2"><i class="fa-solid fa-comments me-1"></i> Pengalaman Nasabah</span>
                <h1 class="display-5 fw-bold mb-3 text-white">Testimoni &amp; Pengalaman Nasabah</h1>
                <p class="lead mb-0 text-white">
                    Ulasan nyata dari sivitas akademika FMIPA UNM dan masyarakat tentang manfaat Bank Sampah Unit 
                    <a href="https://www.instagram.com/fmipaunm/" target="_blank" class="text-success text-decoration-none fw-bold">@fmipaunm</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Testimonials Grid -->
    <section class="container my-5 py-3">
        <div class="text-center mb-5">
            <span class="badge bg-success-subtle text-success px-3 py-2 text-uppercase fw-bold mb-2">Suara Civitas Akademika</span>
            <h2 class="fw-bold text-dark">Apa Kata Mereka Tentang BSU FMIPA UNM?</h2>
            <p class="text-muted">Partisipasi aktif mahasiswa, dosen, tendik, dan mitra dalam menciptakan kampus berkelanjutan</p>
        </div>

        <div class="row g-4">
            <!-- Testimoni 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card">
                    <div>
                        <div class="star-rating mb-3">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-secondary small fst-italic mb-4">
                            "Sejak ada BSU FMIPA, botol plastik air mineral dan draft skripsi bekas praktikum tidak terbuang percuma. Setiap akhir semester saldonya lumayan banget untuk uang saku dan beli perlengkapan kuliah!"
                        </p>
                    </div>
                    <div class="d-flex align-items-center pt-3 border-top">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 45px; height: 45px; font-weight: bold;">
                            NA
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0 text-dark">Nur Azizah S.</h6>
                            <small class="text-muted">Mahasiswi Pendidikan Kimia FMIPA</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimoni 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card">
                    <div>
                        <div class="star-rating mb-3">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-secondary small fst-italic mb-4">
                            "Inovasi fermentasi eco-enzyme dan komposter daun di BSU sangat menginspirasi. Pupuk komposnya kami gunakan untuk riset tanaman obat di kebun botani jurusan Biologi."
                        </p>
                    </div>
                    <div class="d-flex align-items-center pt-3 border-top">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 45px; height: 45px; font-weight: bold;">
                            SR
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0 text-dark">Dr. Ir. Sitti Rahma, M.Si.</h6>
                            <small class="text-muted">Dosen Jurusan Biologi FMIPA UNM</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimoni 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card">
                    <div>
                        <div class="star-rating mb-3">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-secondary small fst-italic mb-4">
                            "Dulu kulit buah dan botol es menumpuk di tong sampah kantin. Sekarang tiap sore petugas BSU menimbang langsung. Kantin jadi bersih dan kami dapat pemasukan ekstra!"
                        </p>
                    </div>
                    <div class="d-flex align-items-center pt-3 border-top">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 45px; height: 45px; font-weight: bold;">
                            DB
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0 text-dark">Pak Daeng Baso</h6>
                            <small class="text-muted">Pengelola Kantin Parantambung</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimoni 4 -->
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card">
                    <div>
                        <div class="star-rating mb-3">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-secondary small fst-italic mb-4">
                            "Setelah kegiatan seminar dan pengaderan jurusan, kami himpun kardus dan botol konsumsi. Tabungan sampah langsung masuk ke kas lembaga HMJ. Sangat solutif dan edukatif!"
                        </p>
                    </div>
                    <div class="d-flex align-items-center pt-3 border-top">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 45px; height: 45px; font-weight: bold;">
                            MF
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0 text-dark">Muhammad Fajar</h6>
                            <small class="text-muted">Ketua Himpunan Mahasiswa Fisika</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimoni 5 -->
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card">
                    <div>
                        <div class="star-rating mb-3">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-secondary small fst-italic mb-4">
                            "Pengurus BSU, Kak Humaerah dan Kak Amel, selalu ramah dan sigap saat kami menyetor berkas arsip kampus yang sudah kedaluwarsa. Sistem pencatatan digitalnya transparan."
                        </p>
                    </div>
                    <div class="d-flex align-items-center pt-3 border-top">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 45px; height: 45px; font-weight: bold;">
                            HS
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0 text-dark">Ibu Hasnah, S.Sos.</h6>
                            <small class="text-muted">Tenaga Kependidikan (Tendik) FMIPA</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimoni 6 -->
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card">
                    <div>
                        <div class="star-rating mb-3">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <p class="text-secondary small fst-italic mb-4">
                            "Senang sekali BSU membuka layanan bagi masyarakat umum sekitar Parantambung. Sampah kaleng dan kardus rumah tangga sekarang kami bawa ke BSU daripada menumpuk di TPS liar."
                        </p>
                    </div>
                    <div class="d-flex align-items-center pt-3 border-top">
                        <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 45px; height: 45px; font-weight: bold;">
                            WP
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0 text-dark">Wahyudi Pratama</h6>
                            <small class="text-muted">Warga Sekitar Jl. Daeng Tata Makassar</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Form Kirim Testimoni -->
    <section class="container my-5 py-4 border-top">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="p-4 p-md-5 bg-white rounded-4 border shadow-sm">
                    <div class="text-center mb-4">
                        <i class="fa-solid fa-comment-dots text-success fs-1 mb-2"></i>
                        <h3 class="fw-bold text-dark">Bagikan Pengalaman Anda</h3>
                        <p class="text-muted small">Punya pengalaman menabung sampah atau menggunakan produk BSU FMIPA UNM? Tuliskan ulasan Anda di sini.</p>
                    </div>
                    <form class="contact-form-custom">
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Nama Lengkap</label>
                                <input type="text" class="form-control" placeholder="Contoh: Rahmat Hidayat" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Status Civitas / Umum</label>
                                <select class="form-select" required>
                                    <option value="" selected disabled>Pilih Status Anda</option>
                                    <option>Mahasiswa FMIPA UNM</option>
                                    <option>Dosen FMIPA UNM</option>
                                    <option>Tenaga Kependidikan</option>
                                    <option>Pengelola Kantin / Koperasi</option>
                                    <option>Warga / Masyarakat Sekitar</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Rating Pengalaman</label>
                            <select class="form-select text-warning fw-bold">
                                <option value="5">⭐⭐⭐⭐⭐ (Sangat Puas - 5 Bintang)</option>
                                <option value="4">⭐⭐⭐⭐ (Puas - 4 Bintang)</option>
                                <option value="3">⭐⭐⭐ (Cukup - 3 Bintang)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Ulasan &amp; Cerita Pengalaman Anda</label>
                            <textarea class="form-control" rows="4" placeholder="Ceritakan bagaimana BSU FMIPA UNM membantu Anda dalam memilah sampah..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-green w-100 py-2 fw-bold">
                            <i class="fa-solid fa-paper-plane me-1"></i> Kirim Ulasan Testimoni
                        </button>
                    </form>
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
                        <span class="small text-light d-block fw-semibold mb-1"><i class="fa-solid fa-comments text-success me-1"></i> Suara Civitas &amp; Nasabah</span>
                        <span class="small text-secondary">Apresiasi dan dampak positif pengelolaan sampah bagi civitas akademika FMIPA UNM.</span>
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
