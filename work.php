<?php
session_start();
require_once 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan - Bank Sampah Unit FMIPA UNM</title>
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
                        <a class="nav-link active" aria-current="page" href="work.php">Layanan</a>
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

    <!-- Tagline / Banner Halaman Layanan -->
    <div class="container my-4">
        <div class="banner-box-style shadow-sm">
            <div class="banner-content-custom">
                <span class="badge bg-success px-3 py-2 text-uppercase mb-2"><i class="fa-solid fa-recycle me-1"></i> Pengelolaan Terpadu</span>
                <h1 class="display-5 fw-bold mb-3 text-white">Layanan Bank Sampah Unit</h1>
                <p class="lead mb-0 text-white">
                    Program dan fasilitas pengelolaan limbah berkelanjutan di Bank Sampah Unit FMIPA UNM 
                    <a href="https://www.instagram.com/fmipaunm/" target="_blank" class="text-success text-decoration-none fw-bold">@fmipaunm</a>
                </p>
            </div>
        </div>
    </div>
    <!-- Akhir Tagline -->

    <!-- Ringkasan Layanan Kami -->
    <section class="container my-5 py-2">
        <div class="text-center mb-5">
            <span class="badge bg-success-subtle text-success px-3 py-2 text-uppercase fw-bold mb-2">Program Utama</span>
            <h2 class="fw-bold text-dark">Ringkasan Layanan Kami</h2>
            <p class="text-muted">Komitmen BSU FMIPA UNM dalam menghadirkan solusi sirkularitas sampah terintegrasi</p>
        </div>
        <div class="row g-4 align-items-stretch">
            <!-- Service 1 -->
            <div class="col-md-4">
                <div class="service-card shadow-sm d-flex flex-column">
                    <div class="text-success mb-3"><i class="fa-solid fa-seedling fa-2x"></i></div>
                    <h4 class="fw-bold text-dark">Pemilahan Sampah Organik</h4>
                    <p class="text-muted small mb-4 flex-grow-1">Proses pemilahan dan pengelolaan limbah sisa makhluk hidup (seperti sisa makanan kantin atau daun gugur) agar diolah kembali menjadi produk berharga seperti kompos atau eco-enzyme.</p>
                    <a href="#organik" class="btn btn-outline-green btn-sm fw-semibold mt-auto">Lihat Detail Organik <i class="fa-solid fa-arrow-down ms-1"></i></a>
                </div>
            </div>
            <!-- Service 2 -->
            <div class="col-md-4">
                <div class="service-card shadow-sm d-flex flex-column">
                    <div class="text-success mb-3"><i class="fa-solid fa-recycle fa-2x"></i></div>
                    <h4 class="fw-bold text-dark">Menerima Sampah Anorganik</h4>
                    <p class="text-muted small mb-4 flex-grow-1">Layanan pengumpulan dan penerimaan sampah non-organik (seperti plastik, kertas, karton, dan kaleng/logam) yang dapat didaur ulang dan dikonversi menjadi saldo tabungan rupiah serta poin reward.</p>
                    <a href="#anorganik" class="btn btn-outline-green btn-sm fw-semibold mt-auto">Lihat Detail Anorganik <i class="fa-solid fa-arrow-down ms-1"></i></a>
                </div>
            </div>
            <!-- Service 3 -->
            <div class="col-md-4">
                <div class="service-card shadow-sm d-flex flex-column">
                    <div class="text-success mb-3"><i class="fa-solid fa-people-roof fa-2x"></i></div>
                    <h4 class="fw-bold text-dark">Cakupan Internal &amp; Eksternal</h4>
                    <p class="text-muted small mb-4 flex-grow-1">Fasilitas penerimaan sampah yang melayani seluruh sivitas akademika di lingkungan FMIPA UNM (internal) maupun pihak luar seperti masyarakat sekitar Parantambung dan mitra sekolah (eksternal).</p>
                    <a href="#cakupan" class="btn btn-outline-green btn-sm fw-semibold mt-auto">Lihat Detail Cakupan <i class="fa-solid fa-arrow-down ms-1"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- DETAIL 1: Pemilahan Sampah Organik (Kompos / Eco-enzyme) -->
    <section class="container my-5 py-4 border-top" id="organik">
        <div class="d-flex align-items-center mb-4">
            <div class="p-2 bg-success text-white rounded-3 me-3"><i class="fa-solid fa-seedling fs-4"></i></div>
            <div>
                <h3 class="fw-bold text-dark mb-1">Detail Pemilahan Sampah Organik</h3>
                <p class="text-muted small mb-0">Inovasi pengolahan limbah organik menjadi Kompos Padat &amp; Eco-Enzyme serbaguna</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4" style="background-color: #f7faf7; border-left: 5px solid var(--bsu-green) !important;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="fw-bold text-success mb-0"><i class="fa-solid fa-vial-circle-check me-2"></i>Produk Kompos Organik</h4>
                        <span class="badge bg-success">Pupuk Alami</span>
                    </div>
                    <p class="text-muted small mb-3">
                        BSU FMIPA UNM memanfaatkan potensi sampah biomassa kampus, terutama dedaunan kering gugur dari kawasan rindang Parantambung serta sisa sayuran kantin, yang diproses melalui bio-komposter aerobik.
                    </p>
                    <ul class="list-unstyled small mb-4">
                        <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i><strong>Bahan Baku:</strong> Dedaunan gugur, ampas kelapa, sisa sayuran mentah, dan serbuk gergaji.</li>
                        <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i><strong>Waktu Pematangan:</strong> 4 - 6 minggu menggunakan bio-aktivator lokal.</li>
                        <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i><strong>Pemanfaatan:</strong> Pupuk penyubur tanaman taman FMIPA UNM serta media praktikum mahasiswa.</li>
                    </ul>
                    <div class="p-3 bg-white rounded-3 border">
                        <span class="small fw-bold text-dark"><i class="fa-solid fa-circle-exclamation text-success me-1"></i> Syarat Penyetoran:</span>
                        <p class="small text-muted mb-0">Pastikan limbah organik terbebas dari plastik pembungkus, staples, atau zat kimia berbahaya.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm rounded-4 p-4" style="background-color: #f2fbf4; border-left: 5px solid var(--bsu-green-dark) !important;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="fw-bold text-success mb-0"><i class="fa-solid fa-flask-vial me-2"></i>Eco-Enzyme Ramah Lingkungan</h4>
                        <span class="badge bg-success-subtle text-success">Fermentasi Alami</span>
                    </div>
                    <p class="text-muted small mb-3">
                        Cairan alami serbaguna hasil fermentasi sampah organik basah seperti kulit buah-buahan segar (jeruk, nanas, apel) dicampur dengan gula merah/molase dan air dengan rasio 3 : 1 : 10 selama 90 hari.
                    </p>
                    <ul class="list-unstyled small mb-4">
                        <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i><strong>Bahan Utama:</strong> Kulit buah segar (tidak berjamur) dari kantin kampus dan konsumsi mahasiswa.</li>
                        <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i><strong>Aplikasi Praktis:</strong> Pembersih lantai laboratorium FMIPA, disinfektan alami, dan pupuk cair.</li>
                        <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i><strong>Edukasi &amp; Workshop:</strong> Pelatihan rutin pembuatan eco-enzyme bagi civitas dan kader lingkungan.</li>
                    </ul>
                    <div class="p-3 bg-white rounded-3 border">
                        <span class="small fw-bold text-dark"><i class="fa-solid fa-gift text-success me-1"></i> Nilai Nasabah:</span>
                        <p class="small text-muted mb-0">Setiap penyetoran kulit buah segar menghasilkan saldo tabungan dan poin reward untuk ditukar produk eco-enzyme siap pakai.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- DETAIL 2: Penerimaan Sampah Anorganik (Plastik, Kertas, Logam) -->
    <section class="container my-5 py-4 border-top" id="anorganik">
        <div class="d-flex align-items-center mb-4">
            <div class="p-2 bg-success text-white rounded-3 me-3"><i class="fa-solid fa-recycle fs-4"></i></div>
            <div>
                <h3 class="fw-bold text-dark mb-1">Detail Penerimaan Sampah Anorganik</h3>
                <p class="text-muted small mb-0">Pengumpulan sampah non-organik bernilai ekonomis (Plastik, Kertas, dan Logam)</p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Plastik -->
            <div class="col-md-4">
                <div class="card h-100 border rounded-4 shadow-sm p-4 bg-white">
                    <div class="text-success mb-3"><i class="fa-solid fa-bottle-water fa-2x"></i></div>
                    <h5 class="fw-bold text-dark">Kategori Plastik (PET &amp; HDPE)</h5>
                    <p class="small text-muted mb-3">Botol plastik air mineral bersih, gelas cup minuman dingin, tutup botol, jerigen bekas deterjen/minyak.</p>
                    <div class="border-top pt-3 mt-auto">
                        <div class="d-flex justify-content-between small text-muted mb-1">
                            <span>Kondisi Ideal:</span>
                            <span class="fw-semibold text-dark">Bersih, Kosong &amp; Pipih</span>
                        </div>
                        <div class="d-flex justify-content-between small text-muted mb-1">
                            <span>Estimasi Nilai:</span>
                            <span class="fw-bold text-success">Rp 2.500 - 4.500 / Kg</span>
                        </div>
                        <div class="d-flex justify-content-between small text-muted">
                            <span>Poin Reward:</span>
                            <span class="fw-bold text-success">+8 Poin / Kg</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kertas -->
            <div class="col-md-4">
                <div class="card h-100 border rounded-4 shadow-sm p-4 bg-white">
                    <div class="text-success mb-3"><i class="fa-solid fa-box-archive fa-2x"></i></div>
                    <h5 class="fw-bold text-dark">Kategori Kertas &amp; Karton</h5>
                    <p class="small text-muted mb-3">Kardus tebal paket, lembaran kertas HVS sisa laporan/skripsi, buku tulis bekas, dan koran.</p>
                    <div class="border-top pt-3 mt-auto">
                        <div class="d-flex justify-content-between small text-muted mb-1">
                            <span>Kondisi Ideal:</span>
                            <span class="fw-semibold text-dark">Kering &amp; Terikat Rapi</span>
                        </div>
                        <div class="d-flex justify-content-between small text-muted mb-1">
                            <span>Estimasi Nilai:</span>
                            <span class="fw-bold text-success">Rp 1.500 - 3.200 / Kg</span>
                        </div>
                        <div class="d-flex justify-content-between small text-muted">
                            <span>Poin Reward:</span>
                            <span class="fw-bold text-success">+6 Poin / Kg</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Logam -->
            <div class="col-md-4">
                <div class="card h-100 border rounded-4 shadow-sm p-4 bg-white">
                    <div class="text-success mb-3"><i class="fa-solid fa-cubes-stacked fa-2x"></i></div>
                    <h5 class="fw-bold text-dark">Kategori Logam &amp; Kaleng</h5>
                    <p class="small text-muted mb-3">Kaleng minuman softdrink aluminium, kaleng susu kental manis, peralatan perkakas besi ringan tak terpakai.</p>
                    <div class="border-top pt-3 mt-auto">
                        <div class="d-flex justify-content-between small text-muted mb-1">
                            <span>Kondisi Ideal:</span>
                            <span class="fw-semibold text-dark">Tidak Berisi Cairan</span>
                        </div>
                        <div class="d-flex justify-content-between small text-muted mb-1">
                            <span>Estimasi Nilai:</span>
                            <span class="fw-bold text-success">Rp 4.000 - 12.000 / Kg</span>
                        </div>
                        <div class="d-flex justify-content-between small text-muted">
                            <span>Poin Reward:</span>
                            <span class="fw-bold text-success">+20 Poin / Kg</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- DETAIL 3: Detail Cakupan Layanan (Internal Kampus & Eksternal Masyarakat) -->
    <section class="container my-5 py-4 border-top" id="cakupan">
        <div class="d-flex align-items-center mb-4">
            <div class="p-2 bg-success text-white rounded-3 me-3"><i class="fa-solid fa-map-location-dot fs-4"></i></div>
            <div>
                <h3 class="fw-bold text-dark mb-1">Detail Cakupan Layanan</h3>
                <p class="text-muted small mb-0">Jangkauan layanan terpadu untuk civitas kampus maupun masyarakat luas</p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Cakupan Internal -->
            <div class="col-md-6">
                <div class="p-4 rounded-4 bg-white border shadow-sm h-100">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="p-3 bg-success-subtle text-success rounded-circle fs-4">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold text-dark mb-0">Internal Kampus FMIPA UNM</h5>
                            <span class="badge bg-success small">Prioritas Akademik</span>
                        </div>
                    </div>
                    <p class="text-muted small">
                        Layanan yang dirancang khusus untuk mempermudah seluruh elemen civitas akademika dalam menjaga kebersihan lingkungan kampus Parantambung:
                    </p>
                    <ul class="list-unstyled small text-secondary">
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i><strong>Mahasiswa:</strong> Menabung sampah kos/kampus untuk menambah saldo tabungan &amp; kebutuhan kuliah.</li>
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i><strong>Dosen &amp; Laboratorium:</strong> Pengelolaan limbah kertas praktikum, karton kemasan bahan, dan daun taman fakultas.</li>
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i><strong>Lembaga Kemahasiswaan (LK/HMJ):</strong> Penjemputan sampah pasca-kegiatan seminar, kaderisasi, atau event kampus.</li>
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i><strong>Kantin &amp; Tenaga Kebersihan (Tendik):</strong> Penyetoran harian sisa makanan organik dan botol plastik minuman.</li>
                    </ul>
                </div>
            </div>

            <!-- Cakupan Eksternal -->
            <div class="col-md-6">
                <div class="p-4 rounded-4 bg-white border shadow-sm h-100">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="p-3 bg-success-subtle text-success rounded-circle fs-4">
                            <i class="fa-solid fa-city"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold text-dark mb-0">Eksternal Masyarakat &amp; Mitra</h5>
                            <span class="badge bg-success small">Pengabdian Masyarakat</span>
                        </div>
                    </div>
                    <p class="text-muted small">
                        Wujud nyata tri dharma perguruan tinggi melalui edukasi dan penerimaan sampah masyarakat luas di sekitar kampus:
                    </p>
                    <ul class="list-unstyled small text-secondary">
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i><strong>Masyarakat Sekitar Parantambung:</strong> Warga Jl. Daeng Tata dan sekitarnya dapat menjadi nasabah binaan BSU.</li>
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i><strong>Sekolah Binaan:</strong> Kolaborasi program Adiwiyata bagi SD, SMP, dan SMA di Kota Makassar.</li>
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i><strong>Mitra Bank Sampah Induk (BSI):</strong> Kerjasama distribusi daur ulang skala kota dengan DLH Makassar.</li>
                        <li class="mb-2"><i class="fa-solid fa-circle-check text-success me-2"></i><strong>UMKM &amp; Komunitas:</strong> Edukasi zero waste dan penyerapan kemasan bekas pelaku usaha lokal.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Alur 4 Langkah Menabung Sampah -->
    <section class="container my-5 py-4">
        <div class="text-center mb-5">
            <span class="badge bg-success-subtle text-success px-3 py-2 text-uppercase fw-bold mb-2">Panduan Alur</span>
            <h3 class="fw-bold text-dark">4 Langkah Mudah Menabung Sampah</h3>
            <p class="text-muted">Prosedur sederhana dari pemilahan sampah hingga pencairan saldo tabungan Anda</p>
        </div>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="step-card text-center">
                    <div class="step-number">1</div>
                    <h6 class="fw-bold text-dark mb-2">Pilah dari Sumber</h6>
                    <p class="text-muted small mb-0">Pisahkan sampah organik (kulit buah/daun) dan anorganik (botol/kertas) dalam wadah kering.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="step-card text-center">
                    <div class="step-number">2</div>
                    <h6 class="fw-bold text-dark mb-2">Bawa ke Pos BSU</h6>
                    <p class="text-muted small mb-0">Kunjungi Pos BSU di Kampus Parantambung FMIPA UNM Jl. Daeng Tata pada jam kerja.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="step-card text-center">
                    <div class="step-number">3</div>
                    <h6 class="fw-bold text-dark mb-2">Timbang &amp; Catat</h6>
                    <p class="text-muted small mb-0">Petugas menimbang secara akurat dan menginput nominal saldo &amp; poin ke akun nasabah Anda.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="step-card text-center">
                    <div class="step-number">4</div>
                    <h6 class="fw-bold text-dark mb-2">Cek Saldo &amp; Tarik</h6>
                    <p class="text-muted small mb-0">Pantau buku tabungan melalui menu <strong>Profil Saya</strong> dan cairkan dana kapan saja!</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-5">
            <a href="login.php" onclick="checkProfileAccess(event)" class="btn btn-green px-4 py-2 fw-semibold me-2"><i class="fa-solid fa-id-card me-2"></i>Buka Profil &amp; Cek Saldo</a>
            <a href="contact.php" class="btn btn-outline-green px-4 py-2 fw-semibold"><i class="fa-solid fa-phone me-2"></i>Tanya Petugas BSU</a>
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
                        <span class="small text-light d-block fw-semibold mb-1"><i class="fa-solid fa-recycle text-success me-1"></i> Layanan Terpadu BSU</span>
                        <span class="small text-secondary">Pengolahan kompos organik, penerimaan anorganik, dan pendampingan nasabah ramah lingkungan.</span>
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

