<?php
session_start();
require_once 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami - Bank Sampah Unit FMIPA UNM</title>
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
                            <li><a class="dropdown-item" href="testimoni.php">Testimoni</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item active" href="contact.php">Hubungi Kami</a></li>
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

    <!-- Tagline Kotak -->
    <div class="container my-4">
        <div class="banner-box-style shadow-sm">
            <div class="banner-content-custom">
                <span class="badge bg-success px-3 py-2 text-uppercase mb-2"><i class="fa-solid fa-headset me-1"></i> Layanan Informasi</span>
                <h1 class="display-5 fw-bold mb-3 text-white">Hubungi Kami</h1>
                <p class="lead mb-0 text-white">
                    Terhubung langsung dengan pengurus Bank Sampah Unit Fakultas MIPA UNM 
                    <a href="https://www.instagram.com/fmipaunm/" target="_blank" class="text-success text-decoration-none fw-bold">@fmipaunm</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Akhir Tagline -->

    <!-- Contact Section -->
    <section class="container my-5 py-4">
        <div class="row g-5">
            <!-- Kolom Informasi Kontak -->
            <div class="col-lg-6">
                <div class="p-4 bg-white rounded-4 border h-100 shadow-sm d-flex flex-column justify-content-between">
                    <div>
                        <h3 class="fw-bold text-dark mb-4"><i class="fa-solid fa-address-book text-success me-2"></i>Informasi Kontak &amp; Lokasi</h3>
                        
                        <!-- Lokasi -->
                        <div class="d-flex align-items-start mb-4">
                            <div class="text-success fs-4 me-3"><i class="fa-solid fa-location-dot"></i></div>
                            <div>
                                <h6 class="fw-bold mb-1 text-dark">Lokasi Bank Sampah Unit (BSU)</h6>
                                <p class="text-muted small mb-1">Gedung BSU, FMIPA UNM Kampus Parantambung, Jl. Daeng Tata, Parang Tambung, Kec. Tamalate, Kota Makassar, Sulawesi Selatan 90224, Indonesia.</p>
                                <span class="badge bg-success-subtle text-success small"><i class="fa-regular fa-clock me-1"></i>Jam Operasional: Senin - Jumat (08.30 - 16.00 WITA)</span>
                            </div>
                        </div>

                        <!-- Daftar Kontak Pengurus -->
                        <div class="d-flex align-items-start mb-4">
                            <div class="text-success fs-4 me-3"><i class="fa-solid fa-phone"></i></div>
                            <div class="w-100">
                                <h6 class="fw-bold mb-2 text-dark">Daftar Kontak Pengurus</h6>
                                
                                <!-- Humaerah -->
                                <div class="p-3 mb-2 bg-light rounded-3 border d-flex justify-content-between align-items-center flex-wrap gap-2">
                                    <div>
                                        <div class="fw-bold small text-dark">Humaerah</div>
                                        <div class="text-muted small">+62 853-4001-2245</div>
                                    </div>
                                    <a href="https://wa.me/6285340012245?text=Halo%20Kak%20Humaerah,%20saya%20ingin%20bertanya%20seputar%20BSU%20FMIPA%20UNM" target="_blank" class="btn btn-whatsapp btn-sm px-3">
                                        <i class="fa-brands fa-whatsapp me-1"></i> Chat WhatsApp
                                    </a>
                                </div>

                                <!-- Amel -->
                                <div class="p-3 mb-2 bg-light rounded-3 border d-flex justify-content-between align-items-center flex-wrap gap-2">
                                    <div>
                                        <div class="fw-bold small text-dark">Amel</div>
                                        <div class="text-muted small">+62 853-1470-0612</div>
                                    </div>
                                    <a href="https://wa.me/6285314700612?text=Halo%20Kak%20Amel,%20saya%20ingin%20bertanya%20seputar%20tabungan%20sampah%20BSU%20FMIPA%20UNM" target="_blank" class="btn btn-whatsapp btn-sm px-3">
                                        <i class="fa-brands fa-whatsapp me-1"></i> Chat WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="d-flex align-items-start mb-4">
                            <div class="text-success fs-4 me-3"><i class="fa-solid fa-envelope"></i></div>
                            <div>
                                <h6 class="fw-bold mb-1 text-dark">Email Resmi</h6>
                                <p class="text-muted small mb-0">demo@gmail.com</p>
                            </div>
                        </div>

                        <!-- Medsos -->
                        <h6 class="fw-bold mb-2 text-dark">Media Sosial Resmi</h6>
                        <div class="d-flex gap-2 mb-4">
                            <a href="#" class="btn btn-outline-green btn-sm rounded-circle" style="width:36px;height:36px;display:inline-flex;align-items:center;justify-content:center;"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#" class="btn btn-outline-green btn-sm rounded-circle" style="width:36px;height:36px;display:inline-flex;align-items:center;justify-content:center;"><i class="fa-brands fa-twitter"></i></a>
                            <a href="https://www.instagram.com/bsu.fmipa_unm/" target="_blank" class="btn btn-outline-green btn-sm rounded-circle" style="width:36px;height:36px;display:inline-flex;align-items:center;justify-content:center;"><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>

                    <!-- Embed Peta Lokasi -->
                    <div class="rounded-4 overflow-hidden border shadow-sm mt-2">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1893.6132477917843!2d119.4282022!3d-5.1864005!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee27a4279744d%3A0xa2bf38a72585b647!2sUNM%20Parangtambung%20Makassar!5e1!3m2!1sid!2sid!4v1790862069945!5m2!1sid!2sid"
                            width="100%" 
                            height="200" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>

            <!-- Kolom Formulir Kirim Pesan / Saran Pengunjung -->
            <div class="col-lg-6">
                <div class="p-4 bg-white rounded-4 border h-100 shadow-sm">
                    <h3 class="fw-bold text-dark mb-2"><i class="fa-solid fa-paper-plane text-success me-2"></i>Formulir Pesan &amp; Saran</h3>
                    <p class="text-muted small mb-4">Sampaikan pertanyaan, usulan program, kritik, atau saran untuk kemajuan tata kelola Bank Sampah Unit FMIPA UNM.</p>
                    
                    <form class="contact-form-custom">
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama lengkap Anda" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Alamat Email</label>
                            <input type="email" class="form-control" placeholder="nama@email.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Topik Pesan</label>
                            <select class="form-select">
                                <option>Penyetoran Sampah Baru</option>
                                <option>Pendaftaran Akun Nasabah</option>
                                <option>Konsultasi Eco-Enzyme &amp; Kompos</option>
                                <option>Kemitraan Bank Sampah &amp; Edukasi</option>
                                <option>Saran &amp; Masukan Pengelolaan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Pesan atau Saran</label>
                            <textarea class="form-control" rows="5" placeholder="Tuliskan isi pertanyaan, usulan jadwal penjemputan sampah, atau saran Anda secara rinci di sini..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-green w-100 py-2 fw-bold">
                            <i class="fa-solid fa-paper-plane me-1"></i> Kirimkan Pesan / Saran
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Contact Section -->

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
                        <span class="small text-light d-block fw-semibold mb-1"><i class="fa-solid fa-headset text-success me-1"></i> Layanan Konsultasi &amp; Mitra</span>
                        <span class="small text-secondary">Siap melayani pertanyaan, jadwal penyetoran, dan kolaborasi bank sampah civitas.</span>
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

