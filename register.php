<?php
/**
 * register.php — Halaman Pendaftaran Akun Nasabah BSU FMIPA UNM
 */

session_start();
require_once 'koneksi.php';

$error_msg   = '';
$success_msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim_nip      = trim($_POST['nim_nip'] ?? '');
    $password     = $_POST['password'] ?? '';
    $nama_lengkap = trim($_POST['nama_lengkap'] ?? '');
    $status_civ   = $_POST['status_civitas'] ?? 'Mahasiswa Aktif';
    $prodi_unit   = trim($_POST['prodi_unit'] ?? '');
    $email        = trim($_POST['email'] ?? '');
    $no_hp        = trim($_POST['no_hp'] ?? '');

    if (empty($nim_nip) || empty($password) || empty($nama_lengkap)) {
        $error_msg = "NIM/NIP/Username, Kata Sandi, dan Nama Lengkap wajib diisi.";
    } else {
        // Cek apakah NIM/NIP sudah terdaftar
        $stmt_check = mysqli_prepare($koneksi, "SELECT id_user FROM users WHERE nim_nip = ? LIMIT 1");
        mysqli_stmt_bind_param($stmt_check, "s", $nim_nip);
        mysqli_stmt_execute($stmt_check);
        mysqli_stmt_store_result($stmt_check);

        if (mysqli_stmt_num_rows($stmt_check) > 0) {
            $error_msg = "NIM/NIP/Username tersebut sudah terdaftar dalam sistem.";
        } else {
            mysqli_stmt_close($stmt_check);

            // Insert data user baru ke tabel users (tanpa kolom id_fakultas)
            $role = 'nasabah';
            $stmt_ins = mysqli_prepare($koneksi, "INSERT INTO users (nim_nip, password, nama_lengkap, status_civitas, prodi_unit, email, no_hp, role, saldo, poin) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 0.00, 0)");
            mysqli_stmt_bind_param($stmt_ins, "ssssssss", $nim_nip, $password, $nama_lengkap, $status_civ, $prodi_unit, $email, $no_hp, $role);
            
            if (mysqli_stmt_execute($stmt_ins)) {
                $success_msg = "Pendaftaran berhasil! Silakan masuk (login) menggunakan akun Anda.";
            } else {
                $error_msg = "Terjadi kesalahan sistem. Gagal mendaftarkan akun.";
            }
            mysqli_stmt_close($stmt_ins);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Nasabah - Bank Sampah Unit FMIPA UNM</title>
    <link rel="icon" type="image/png" href="images/Logo-UNM 2.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">

    <div class="container my-5 py-3">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="p-4 p-md-5 bg-white">
                        
                        <div class="text-center mb-4">
                            <img src="images/logo_BSU.png" alt="Logo BSU" class="mb-3" style="height: 60px; width: auto; object-fit: contain;">
                            <h4 class="fw-bold text-dark mb-1">Daftar Akun Nasabah Baru</h4>
                            <p class="text-muted small mb-0">Bergabung dengan Bank Sampah Unit FMIPA UNM</p>
                        </div>

                        <?php if (!empty($error_msg)): ?>
                        <div class="alert alert-danger small py-2 px-3 mb-4 rounded-3" role="alert">
                            <i class="fa-solid fa-circle-exclamation me-2"></i><?= htmlspecialchars($error_msg) ?>
                        </div>
                        <?php elseif (!empty($success_msg)): ?>
                        <div class="alert alert-success small py-2 px-3 mb-4 rounded-3" role="alert">
                            <i class="fa-solid fa-circle-check me-2"></i><?= htmlspecialchars($success_msg) ?>
                            <div class="mt-2"><a href="login.php" class="btn btn-sm btn-success fw-bold">Masuk ke Halaman Login</a></div>
                        </div>
                        <?php endif; ?>

                        <form method="POST" action="register.php">
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-dark">NIM / NIP / No. Identitas / Username</label>
                                <input type="text" class="form-control" name="nim_nip" placeholder="Contoh: 250210500030 atau umum01" value="<?= htmlspecialchars($_POST['nim_nip'] ?? '') ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-bold text-dark">Kata Sandi</label>
                                <input type="password" class="form-control" name="password" placeholder="••••••••" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-bold text-dark">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" placeholder="Contoh: Sitti Aisyah" value="<?= htmlspecialchars($_POST['nama_lengkap'] ?? '') ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-bold text-dark">Status / Peran Civitas</label>
                                <select class="form-select" name="status_civitas">
                                    <option value="Mahasiswa Aktif">Mahasiswa Aktif</option>
                                    <option value="Dosen">Dosen</option>
                                    <option value="Tenaga Kependidikan">Tenaga Kependidikan (Tendik)</option>
                                    <option value="Masyarakat Umum">Masyarakat Umum</option>
                                    <option value="Mitra Eksternal">Mitra Eksternal</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-bold text-dark">Program Studi / Instansi / Alamat</label>
                                <input type="text" class="form-control" name="prodi_unit" placeholder="Contoh: Teknik Komputer" value="<?= htmlspecialchars($_POST['prodi_unit'] ?? '') ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-bold text-dark">Email (Opsional)</label>
                                <input type="email" class="form-control" name="email" placeholder="nama@email.com" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-bold text-dark">Nomor WhatsApp / HP</label>
                                <input type="text" class="form-control" name="no_hp" placeholder="081234567890" value="<?= htmlspecialchars($_POST['no_hp'] ?? '') ?>">
                            </div>

                            <div class="d-grid gap-2 mt-4 mb-3">
                                <button type="submit" class="btn btn-green fw-bold py-2 shadow-sm">
                                    <i class="fa-solid fa-user-plus me-2"></i> Daftar Sekarang
                                </button>
                            </div>
                        </form>

                        <div class="text-center pt-3 border-top mt-4">
                            <p class="small text-muted mb-2">Sudah memiliki akun nasabah?</p>
                            <a href="login.php" class="btn btn-sm btn-outline-secondary">
                                <i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Masuk / Login Disini
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>