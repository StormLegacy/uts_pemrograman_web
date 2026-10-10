<?php
/**
 * login.php — Halaman Login Nasabah BSU FMIPA UNM
 * Terhubung ke database bsu_mipa (tabel: users)
 */

session_start();
require_once 'koneksi.php';

$error_msg   = '';
$success_msg = '';

// Jika sudah login, redirect langsung ke profile.php
if (isset($_SESSION['nasabah_id'])) {
    header("Location: profile.php");
    exit;
}

// Proses form login (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim      = trim($_POST['nim'] ?? '');
    $password = $_POST['password'] ?? '';
    $peran    = $_POST['peran'] ?? '';

    // Validasi input tidak boleh kosong
    if (empty($nim) || empty($password)) {
        $error_msg = "NIM/NIP/Username dan Kata Sandi wajib diisi.";
    } else {
        $stmt = mysqli_prepare($koneksi,
            "SELECT id_user, nama_lengkap, nim_nip, password, role, status_civitas, prodi_unit FROM users WHERE nim_nip = ? LIMIT 1"
        );
        mysqli_stmt_bind_param($stmt, "s", $nim);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user   = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);

        if ($user) {
            // Verifikasi kecocokan password
            $pass_valid = ($password === $user['password']);

            if ($pass_valid) {
                $_SESSION['nasabah_id']    = $user['id_user'];
                $_SESSION['nasabah_nama']  = $user['nama_lengkap'];
                $_SESSION['nasabah_nim']   = $user['nim_nip'];
                $_SESSION['nasabah_peran'] = $user['role'];
                $_SESSION['nasabah_prodi'] = $user['prodi_unit'];

                header("Location: profile.php");
                exit;
            } else {
                $error_msg = "Kata sandi salah. Silakan periksa kembali sandi Anda.";
            }
        } else {
            $error_msg = "NIM/NIP atau Username tidak ditemukan dalam sistem BSU.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk / Login - Bank Sampah Unit FMIPA UNM</title>
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
                    <a href="login.php" class="btn btn-auth-nav btn-sm px-3 active">
                        <i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Masuk / Login
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Main Login Content -->
    <div class="container my-5 py-4">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-5">
                
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="p-4 p-md-5 bg-white">
                        
                        <div class="text-center mb-4">
                            <img src="images/logo_BSU.png" alt="Logo BSU" class="mb-3" style="height: 55px; width: auto; object-fit: contain;">
                            <h4 class="fw-bold text-dark mb-1">Masuk Akun BSU FMIPA</h4>
                            <p class="text-muted small mb-0">Portal Layanan Nasabah &amp; Panel Pengelola Administrator</p>
                        </div>

                        <!-- Pesan Error / Sukses dari PHP -->
                        <?php if (!empty($error_msg)): ?>
                        <div class="alert alert-danger d-flex align-items-center small py-2 px-3 mb-4 rounded-3" role="alert">
                            <i class="fa-solid fa-circle-exclamation fs-5 me-2"></i>
                            <div><?= htmlspecialchars($error_msg) ?></div>
                        </div>
                        <?php elseif (!empty($success_msg)): ?>
                        <div class="alert alert-success d-flex align-items-center small py-2 px-3 mb-4 rounded-3" role="alert">
                            <i class="fa-solid fa-circle-check fs-5 me-2"></i>
                            <div><?= htmlspecialchars($success_msg) ?></div>
                        </div>
                        <?php else: ?>
                        <div class="alert alert-success d-flex align-items-center small py-2 px-3 mb-4 rounded-3" role="alert">
                            <i class="fa-solid fa-circle-info text-success fs-5 me-2"></i>
                            <div>
                                Masuk untuk memantau saldo tabungan sampah, total poin reward, dan riwayat penyetoran Anda.
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Form Login -->
                        <form id="standaloneLoginForm" method="POST" action="login.php">
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-dark">NIM / NIP / Username</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-success border-end-0"><i class="fa-solid fa-id-card"></i></span>
                                    <input type="text" class="form-control border-start-0" 
                                           id="loginPageNIM" name="nim" 
                                           placeholder="Contoh: 210101502001" 
                                           value="<?= htmlspecialchars($_POST['nim'] ?? '') ?>"
                                           required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-bold text-dark">Kata Sandi</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-success border-end-0"><i class="fa-solid fa-lock"></i></span>
                                    <input type="password" class="form-control border-start-0" 
                                           id="loginPagePassword" name="password" 
                                           placeholder="••••••••" required>
                                    <button class="btn btn-outline-secondary border-start-0" type="button" id="togglePassword" title="Tampilkan/Sembunyikan sandi">
                                        <i class="fa-solid fa-eye" id="eyeIcon"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="d-grid gap-2 mt-4 mb-3">
                                <button type="submit" class="btn btn-green fw-bold py-2 shadow-sm">
                                    <i class="fa-solid fa-right-to-bracket me-2"></i> Masuk Sekarang
                                </button>
                            </div>
                        </form>

                        <div class="text-center pt-3 border-top mt-4">
                            <p class="small text-muted mb-2">Belum memiliki akun nasabah BSU?</p>
                            <a href="register.php" class="btn btn-sm btn-outline-success fw-bold">
                                <i class="fa-solid fa-user-plus me-1"></i> Daftar Akun Baru Disini
                            </a>
                            <p>Atau</p>
                            <a href="contact.php" class="btn btn-sm btn-outline-success fw-bold">
                                <i class="fa-solid fa-envelope me-1"></i> Hubungi Pengurus BSU
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

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
                        <span class="small text-light d-block fw-semibold mb-1"><i class="fa-solid fa-shield-halved text-success me-1"></i> Keamanan Akun Nasabah</span>
                        <span class="small text-secondary">Data penimbangan dan saldo tabungan nasabah tersimpan secara aman dan terintegrasi di sistem BSU.</span>
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
    <script>
        // Toggle lihat/sembunyikan kata sandi
        document.getElementById('togglePassword')?.addEventListener('click', function () {
            const passInput = document.getElementById('loginPagePassword');
            const eyeIcon   = document.getElementById('eyeIcon');
            if (passInput.type === 'password') {
                passInput.type = 'text';
                eyeIcon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passInput.type = 'password';
                eyeIcon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    </script>
</body>
</html>
