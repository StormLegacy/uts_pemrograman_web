<?php
session_start();
require_once 'koneksi.php';

// Proteksi halaman — wajib login
if (!isset($_SESSION['nasabah_id'])) {
    header('Location: login.php');
    exit;
}

$nasabah_id = (int)$_SESSION['nasabah_id'];

// 1. Ambil data utama pengguna (saldo & poin) dari tabel 'users'
$q = mysqli_prepare($koneksi, 'SELECT nama_lengkap, nim_nip, role, status_civitas, prodi_unit, email, no_hp, saldo, poin FROM users WHERE id_user = ? LIMIT 1');
mysqli_stmt_bind_param($q, 'i', $nasabah_id);
mysqli_stmt_execute($q);
$result = mysqli_stmt_get_result($q);
$user = mysqli_fetch_assoc($result);
mysqli_stmt_close($q);

if (!$user) {
    session_destroy();
    header('Location: login.php');
    exit;
}

// 2. Ambil total akumulasi berat sampah organik dan anorganik dari tabel 'setor_sampah'
$q_sampah = mysqli_prepare($koneksi, 'SELECT kategori, SUM(berat) as total_berat FROM setor_sampah WHERE id_user = ? GROUP BY kategori');
mysqli_stmt_bind_param($q_sampah, 'i', $nasabah_id);
mysqli_stmt_execute($q_sampah);
$res_sampah = mysqli_stmt_get_result($q_sampah);

$total_organik = 0;
$total_anorganik = 0;

while ($row_s = mysqli_fetch_assoc($res_sampah)) {
    $kat = trim(strtolower($row_s['kategori']));
    if ($kat === 'organik') {
        $total_organik = floatval($row_s['total_berat']);
    } elseif ($kat === 'anorganik') {
        $total_anorganik = floatval($row_s['total_berat']);
    }
}
mysqli_stmt_close($q_sampah);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tabungan - Bank Sampah Unit FMIPA UNM</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/Logo-UNM 2.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- CSS Eksternal -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">

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
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="profile.php">
                            <i class="fa-solid fa-id-badge me-1 text-success"></i>Profil Saya
                        </a>
                    </li>
                </ul>
                <form class="d-flex me-2 my-2 my-lg-0" role="search">
                    <input class="form-control me-2" type="search" placeholder="Cari sesuatu..." aria-label="Search">
                    <button class="btn btn-green" type="submit"><i class="fa-solid fa-magnifying-glass me-1"></i>Cari</button>
                </form>
                <div class="auth-nav-container">
                    <div class="dropdown">
                        <button class="btn btn-outline-light btn-sm dropdown-toggle d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-circle-user text-success fs-5"></i>
                            <span class="d-none d-sm-inline fw-semibold"><?= htmlspecialchars(explode(' ', $user['nama_lengkap'])[0]) ?></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow">
                            <li><h6 class="dropdown-header text-muted"><i class="fa-solid fa-id-card me-1 text-success"></i><?= htmlspecialchars($user['nim_nip']) ?></h6></li>
                            <li><span class="dropdown-header text-muted" style="font-size:.75rem;display:block;padding:0 1rem .25rem;"><?= htmlspecialchars($user['status_civitas']) ?></span></li>
                            <li><a class="dropdown-item" href="profile.php"><i class="fa-solid fa-user me-2 text-success"></i>Profil &amp; Saldo</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="logout.php" onclick="return confirm('Yakin ingin keluar dari akun BSU?')"><i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Keluar (Logout)</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Notifikasi Pesan -->
    <?php
    $pesan = $_GET['pesan'] ?? '';
    $notif = [
        'tambah_ok'       => ['success', 'fa-circle-check',       'Data penyetoran sampah berhasil ditambahkan dan saldo telah diperbarui!'],
        'edit_ok'         => ['success', 'fa-pen-to-square',      'Data penyetoran sampah berhasil diperbarui dan saldo telah disesuaikan.'],
        'hapus_ok'        => ['success', 'fa-trash-can',          'Data penyetoran sampah berhasil dihapus dan saldo telah dikurangi.'],
        'error_input'     => ['danger',  'fa-circle-exclamation', 'Input tidak valid. Pastikan semua kolom terisi dengan benar.'],
        'tidak_ditemukan' => ['danger',  'fa-circle-exclamation', 'Data tidak ditemukan atau Anda tidak memiliki akses ke data ini.'],
    ];
    if ($pesan && isset($notif[$pesan])):
        [$warna, $ikon, $teks] = $notif[$pesan];
    ?>
    <div class="container mt-3">
        <div class="alert alert-<?= $warna ?> alert-dismissible fade show d-flex align-items-center gap-2 rounded-3 shadow-sm border" role="alert">
            <i class="fa-solid <?= $ikon ?> fs-5 text-<?= $warna ?>"></i>
            <span class="fw-medium"><?= $teks ?></span>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
        </div>
    </div>
    <?php endif; ?>

    <!-- Dashboard Container -->
    <div class="container my-4" id="profileDashboardContainer">
        
        <!-- Header Banner Dashboard -->
        <div class="banner-box-style p-4 p-md-5 mb-4 shadow-sm">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <span class="badge bg-success px-3 py-2 text-uppercase mb-2"><i class="fa-solid fa-shield-halved me-1"></i> Area Nasabah Terverifikasi</span>
                    <h2 class="fw-bold mb-1 text-white">Buku Tabungan Sampah Civitas MIPA</h2>
                    <p class="text-light opacity-75 mb-0 small">Pantau saldo tabungan rupiah, perolehan poin reward, dan catatan histori penyetoran sampah Anda secara transparan.</p>
                </div>
                <div>
                    <button class="btn btn-green fw-bold px-4 py-2 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalSetorSampah">
                        <i class="fa-solid fa-plus-circle me-1"></i> Setor Sampah Baru
                    </button>
                </div>
            </div>
        </div>

        <div class="row g-4">
            
            <!-- 1. BIODATA CIVITAS AKADEMIKA -->
            <div class="col-lg-4">
                <div class="profile-card p-4 h-100">
                    <div class="text-center pb-4 border-bottom mb-4">
                        <div class="position-relative d-inline-block mb-3">
                            <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center mx-auto shadow" style="width: 90px; height: 90px; font-size: 2.2rem; font-weight: bold;">
                                <i class="fa-solid fa-user-graduate"></i>
                            </div>
                        </div>
                        <h5 class="fw-bold text-dark mb-1"><?= htmlspecialchars($user['nama_lengkap']) ?></h5>
                        <span class="badge bg-success-subtle text-success fw-semibold px-3 py-1"><?= htmlspecialchars($user['status_civitas']) ?></span>
                        <div class="text-muted small mt-2">No. Rekening BSU: <span class="fw-bold font-monospace text-dark">BSU-MIPA-<?= str_pad($nasabah_id, 4, '0', STR_PAD_LEFT) ?></span></div>
                    </div>

                    <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-id-card text-success me-2"></i>Biodata Nasabah</h6>
                    
                    <!-- Bagian Biodata di profile.php -->
                    <div class="mb-3">
                        <div class="text-muted small">NIM / NIP / No. Identitas</div>
                        <div class="fw-bold text-dark" id="profileNIM"><?= htmlspecialchars($user['nim_nip']) ?></div>
                    </div>

                    <div class="mb-3">
                        <div class="text-muted small">Program Studi / Instansi</div>
                        <div class="fw-bold text-dark" id="profileProdi"><?= htmlspecialchars($user['prodi_unit'] ?? 'Umum') ?></div>
                    </div>

                    <div class="mb-3">
                        <div class="text-muted small">Fakultas / Unit Kerja</div>
                        <div class="fw-bold text-dark"><?= htmlspecialchars($user['nama_fakultas'] ?? 'Bank Sampah Unit (BSU) FMIPA UNM') ?></div>
                    </div>

                    <div class="mb-3">
                        <div class="text-muted small">Nomor WhatsApp / HP</div>
                        <div class="fw-bold text-dark"><?= htmlspecialchars($user['no_hp'] ?? '-') ?></div>
                    </div>
                </div>
            </div>

            <!-- 2. KARTU STATISTIK & SALDO TABUNGAN SAMPAH -->
            <div class="col-lg-8">
                
                <div class="row g-3 mb-4">
                    <!-- Saldo Tabungan (Hijau Utama) -->
                    <div class="col-md-6">
                        <div class="stat-card-custom stat-card-green">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-uppercase small fw-bold opacity-75">Saldo Tabungan Sampah</span>
                                <i class="fa-solid fa-wallet fs-3 opacity-75"></i>
                            </div>
                            <h2 class="fw-bold mb-1">Rp <?= number_format($user['saldo'], 0, ',', '.') ?></h2>
                            <p class="small opacity-75 mb-0">Tersedia untuk ditarik atau ditransfer</p>
                        </div>
                    </div>

                    <!-- Total Poin Reward (Hijau Emerald) -->
                    <div class="col-md-6">
                        <div class="stat-card-custom stat-card-emerald">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-uppercase small fw-bold opacity-75">Total Poin Reward</span>
                                <i class="fa-solid fa-coins fs-3 opacity-75"></i>
                            </div>
                            <h2 class="fw-bold mb-1"><?= number_format($user['poin'], 0, ',', '.') ?> Poin</h2>
                            <p class="small opacity-75 mb-0">Tukarkan produk eco-enzyme / bibit tanaman</p>
                        </div>
                    </div>

                    <!-- Akumulasi Sampah Organik (Hijau Segar) -->
                    <div class="col-md-6">
                        <div class="stat-card-custom stat-card-forest">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-uppercase small fw-bold opacity-75">Sampah Organik Disetor</span>
                                <i class="fa-solid fa-leaf fs-3 opacity-75"></i>
                            </div>
                            <h3 class="fw-bold mb-1"><?= number_format($total_organik, 1, ',', '.') ?> Kg</h3>
                            <p class="small opacity-75 mb-0">Diproses menjadi kompos &amp; eco-enzyme</p>
                        </div>
                    </div>

                    <!-- Akumulasi Sampah Anorganik (Dark Navy Elegan) -->
                    <div class="col-md-6">
                        <div class="stat-card-custom stat-card-dark">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-uppercase small fw-bold opacity-75">Sampah Anorganik Disetor</span>
                                <i class="fa-solid fa-recycle fs-3 opacity-75"></i>
                            </div>
                            <h3 class="fw-bold mb-1"><?= number_format($total_anorganik, 1, ',', '.') ?> Kg</h3>
                            <p class="small opacity-75 mb-0">Botol plastik, kardus, dan kaleng aluminium</p>
                        </div>
                    </div>
                </div>

                <!-- 3. RIWAYAT PENYETORAN SAMPAH -->
                <div class="profile-card p-4">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
                        <div>
                            <h5 class="fw-bold text-dark mb-0"><i class="fa-solid fa-clock-rotate-left text-success me-2"></i>Riwayat Penyetoran Sampah</h5>
                            <small class="text-muted">Daftar transaksi penimbangan dan konversi saldo tabungan Anda</small>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="small">Tanggal</th>
                                    <th class="small">ID Setor</th>
                                    <th class="small">Kategori</th>
                                    <th class="small">Rincian Jenis</th>
                                    <th class="small text-end">Berat</th>
                                    <th class="small text-end">Nilai Saldo</th>
                                    <th class="small text-end">Poin</th>
                                    <th class="small text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $q_hist = mysqli_prepare($koneksi, "SELECT * FROM setor_sampah WHERE id_user = ? ORDER BY tanggal DESC, id_setor DESC");
                                mysqli_stmt_bind_param($q_hist, 'i', $nasabah_id);
                                mysqli_stmt_execute($q_hist);
                                $res_hist = mysqli_stmt_get_result($q_hist);

                                if (mysqli_num_rows($res_hist) > 0) {
                                    while ($row = mysqli_fetch_assoc($res_hist)) {
                                        $badge = strtolower($row['kategori']) === 'organik'
                                            ? 'bg-success-subtle text-success'
                                            : 'badge-anorganik';
                                        $id    = (int)$row['id_setor'];
                                        $kat   = htmlspecialchars($row['kategori']);
                                        $jenis = htmlspecialchars($row['jenis_sampah']);
                                        $berat = htmlspecialchars($row['berat']);
                                        $tgl   = htmlspecialchars($row['tanggal']);
                                        echo "
                                        <tr>
                                            <td class='small'>{$tgl}</td>
                                            <td class='small fw-bold font-monospace text-dark'>STR-" . str_pad($id, 4, '0', STR_PAD_LEFT) . "</td>
                                            <td class='small'><span class='badge {$badge} px-2 py-1'>{$kat}</span></td>
                                            <td class='small'>{$jenis}</td>
                                            <td class='small text-end fw-bold'>" . number_format($row['berat'], 1, ',', '.') . " Kg</td>
                                            <td class='small text-end text-success fw-bold'>Rp " . number_format($row['nilai_saldo'], 0, ',', '.') . "</td>
                                            <td class='small text-end text-success fw-bold'>+" . (int)$row['poin'] . "</td>
                                            <td class='small text-center'>
                                                <div class='btn-group btn-group-sm'>
                                                    <button type='button'
                                                        class='btn btn-outline-green btn-edit'
                                                        title='Edit data ini'
                                                        data-id='{$id}'
                                                        data-tanggal='{$tgl}'
                                                        data-kategori='" . htmlspecialchars($row['kategori'], ENT_QUOTES) . "'
                                                        data-jenis='" . htmlspecialchars($row['jenis_sampah'], ENT_QUOTES) . "'
                                                        data-berat='{$berat}'
                                                        data-bs-toggle='modal'
                                                        data-bs-target='#modalEditSetor'>
                                                        <i class='fa-solid fa-pen-to-square'></i>
                                                    </button>
                                                    <button type='button'
                                                        class='btn btn-outline-danger btn-hapus'
                                                        title='Hapus data ini'
                                                        data-id='{$id}'
                                                        data-jenis='{$jenis}'
                                                        data-bs-toggle='modal'
                                                        data-bs-target='#modalHapusSetor'>
                                                        <i class='fa-solid fa-trash-can'></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='8' class='text-center text-muted small py-4'>
                                        <i class='fa-solid fa-inbox fs-3 d-block mb-2 text-secondary'></i>
                                        Belum ada riwayat penyetoran sampah.
                                    </td></tr>";
                                }
                                mysqli_stmt_close($q_hist);
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-between align-items-center pt-3 mt-3 border-top flex-wrap gap-2">
                        <small class="text-muted"><i class="fa-solid fa-circle-info text-success me-1"></i> Klik <strong>Edit</strong> untuk mengubah data atau <strong>Hapus</strong> untuk membatalkan penyetoran.</small>
                        <button class="btn btn-green btn-sm fw-bold" data-bs-toggle="modal" data-bs-target="#modalSetorSampah">
                            <i class="fa-solid fa-plus-circle me-1"></i> Input Setor Sampah
                        </button>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- ══════════════════════════════════════════
         MODAL 1: TAMBAH DATA SETOR SAMPAH
    ══════════════════════════════════════════ -->
    <div class="modal fade" id="modalSetorSampah" tabindex="-1" aria-labelledby="modalSetorLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow">
                <div class="modal-header border-bottom bg-success-subtle">
                    <h5 class="modal-title fw-bold text-success" id="modalSetorLabel">
                        <i class="fa-solid fa-plus-circle me-2"></i>Input Penyetoran Sampah Baru
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form method="POST" action="proses_setor.php">
                        <input type="hidden" name="aksi" value="tambah">

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Kategori Sampah</label>
                            <select class="form-select" name="kategori" required>
                                <option value="Anorganik" selected>Sampah Anorganik (Plastik, Kertas, Logam)</option>
                                <option value="Organik">Sampah Organik (Sisa Buah, Sayur, Dedaunan)</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Rincian Jenis Sampah</label>
                            <select class="form-select" name="jenis_sampah" required>
                                <option value="Botol Plastik PET Bersih" selected>Botol Plastik PET Bersih (Rp 4.000/Kg | +8 Poin)</option>
                                <option value="Gelas Plastik Mineral">Gelas Plastik Mineral (Rp 3.500/Kg | +7 Poin)</option>
                                <option value="Kardus Bekas Paket Tebal">Kardus Bekas Paket Tebal (Rp 3.000/Kg | +6 Poin)</option>
                                <option value="Kertas HVS Bekas Laporan/Ujian">Kertas HVS Bekas Laporan/Ujian (Rp 2.500/Kg | +5 Poin)</option>
                                <option value="Kaleng Minuman Aluminium">Kaleng Minuman Aluminium (Rp 10.000/Kg | +20 Poin)</option>
                                <option value="Sisa Kulit Buah Segar (Bahan Eco-Enzyme)">Sisa Kulit Buah Segar – Eco-Enzyme (Rp 1.000/Kg | +3 Poin)</option>
                                <option value="Dedaunan Kering Gugur Kampus">Dedaunan Kering Gugur Kampus (Rp 1.000/Kg | +3 Poin)</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold">Berat Sampah (Kilogram / Kg)</label>
                            <div class="input-group">
                                <input type="number" step="0.1" min="0.1" class="form-control" name="berat" placeholder="Contoh: 3.5" required>
                                <span class="input-group-text bg-light fw-bold text-success">Kg</span>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-green w-100 py-2 fw-bold">
                            <i class="fa-solid fa-circle-check me-1"></i> Catat &amp; Tambahkan ke Buku Tabungan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ══════════════════════════════════════════
         MODAL 2: EDIT DATA SETOR SAMPAH
    ══════════════════════════════════════════ -->
    <div class="modal fade" id="modalEditSetor" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0 shadow">
                <div class="modal-header border-bottom bg-success-subtle">
                    <h5 class="modal-title fw-bold text-success" id="modalEditLabel">
                        <i class="fa-solid fa-pen-to-square me-2"></i>Edit Data Penyetoran
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="alert alert-success-subtle border border-success-subtle rounded-3 small mb-3 d-flex gap-2 align-items-start">
                        <i class="fa-solid fa-circle-info text-success mt-1"></i>
                        <span>Perubahan data akan otomatis menghitung ulang selisih saldo dan poin Anda.</span>
                    </div>
                    <form method="POST" action="proses_setor.php">
                        <input type="hidden" name="aksi"     value="edit">
                        <input type="hidden" name="id_setor" id="editIdSetor">

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Tanggal Setor</label>
                            <input type="date" class="form-control" name="tanggal" id="editTanggal" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Kategori Sampah</label>
                            <select class="form-select" name="kategori" id="editKategori" required>
                                <option value="Anorganik">Sampah Anorganik (Plastik, Kertas, Logam)</option>
                                <option value="Organik">Sampah Organik (Sisa Buah, Sayur, Dedaunan)</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Rincian Jenis Sampah</label>
                            <select class="form-select" name="jenis_sampah" id="editJenis" required>
                                <option value="Botol Plastik PET Bersih">Botol Plastik PET Bersih (Rp 4.000/Kg | +8 Poin)</option>
                                <option value="Gelas Plastik Mineral">Gelas Plastik Mineral (Rp 3.500/Kg | +7 Poin)</option>
                                <option value="Kardus Bekas Paket Tebal">Kardus Bekas Paket Tebal (Rp 3.000/Kg | +6 Poin)</option>
                                <option value="Kertas HVS Bekas Laporan/Ujian">Kertas HVS Bekas Laporan/Ujian (Rp 2.500/Kg | +5 Poin)</option>
                                <option value="Kaleng Minuman Aluminium">Kaleng Minuman Aluminium (Rp 10.000/Kg | +20 Poin)</option>
                                <option value="Sisa Kulit Buah Segar (Bahan Eco-Enzyme)">Sisa Kulit Buah Segar – Eco-Enzyme (Rp 1.000/Kg | +3 Poin)</option>
                                <option value="Dedaunan Kering Gugur Kampus">Dedaunan Kering Gugur Kampus (Rp 1.000/Kg | +3 Poin)</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label small fw-bold">Berat Sampah (Kilogram / Kg)</label>
                            <div class="input-group">
                                <input type="number" step="0.1" min="0.1" class="form-control" name="berat" id="editBerat" required>
                                <span class="input-group-text bg-light fw-bold text-success">Kg</span>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-outline-secondary flex-fill" data-bs-dismiss="modal">
                                Batal
                            </button>
                            <button type="submit" class="btn btn-green flex-fill fw-bold">
                                <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ══════════════════════════════════════════
         MODAL 3: KONFIRMASI HAPUS
    ══════════════════════════════════════════ -->
    <div class="modal fade" id="modalHapusSetor" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content rounded-4 border-0 shadow">
                <div class="modal-header border-bottom bg-danger-subtle">
                    <h5 class="modal-title fw-bold text-danger" id="modalHapusLabel">
                        <i class="fa-solid fa-trash-can me-2"></i>Hapus Data
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4 text-center">
                    <i class="fa-solid fa-circle-exclamation text-danger fs-1 mb-3 d-block"></i>
                    <p class="fw-bold mb-1 text-dark">Yakin ingin menghapus data penyetoran ini?</p>
                    <p class="text-muted small mb-0">Jenis: <strong id="hapusJenis" class="text-dark">-</strong></p>
                    <p class="text-muted small">Saldo dan poin terkait akan dikurangi secara otomatis.</p>
                    <p class="text-danger small fw-bold"><i class="fa-solid fa-triangle-exclamation me-1"></i>Tindakan ini tidak dapat dibatalkan!</p>

                    <form method="POST" action="proses_setor.php">
                        <input type="hidden" name="aksi"     value="hapus">
                        <input type="hidden" name="id_setor" id="hapusIdSetor">
                        <div class="d-flex gap-2 mt-3">
                            <button type="button" class="btn btn-outline-secondary flex-fill" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger flex-fill fw-bold">
                                <i class="fa-solid fa-trash-can me-1"></i>Hapus
                            </button>
                        </div>
                    </form>
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
                        <span class="small text-light d-block fw-semibold mb-1"><i class="fa-solid fa-shield-halved text-success me-1"></i> Rekapitulasi Nasabah Digital</span>
                        <span class="small text-secondary">Data saldo dan riwayat setoran diperbarui secara otomatis setiap transaksi selesai diproses.</span>
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

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
    <script>
    // Populate Modal Edit saat tombol edit diklik
    document.querySelectorAll('.btn-edit').forEach(function(btn) {
        btn.addEventListener('click', function() {
            document.getElementById('editIdSetor').value  = this.dataset.id;
            document.getElementById('editTanggal').value  = this.dataset.tanggal;
            document.getElementById('editBerat').value    = this.dataset.berat;

            // Set select Kategori
            const selKat = document.getElementById('editKategori');
            for (let opt of selKat.options) {
                opt.selected = (opt.value === this.dataset.kategori);
            }

            // Set select Jenis
            const selJenis = document.getElementById('editJenis');
            let found = false;
            for (let opt of selJenis.options) {
                if (opt.value === this.dataset.jenis) {
                    opt.selected = true;
                    found = true;
                } else {
                    opt.selected = false;
                }
            }
            if (!found) {
                selJenis.options[0].text  = this.dataset.jenis;
                selJenis.options[0].value = this.dataset.jenis;
                selJenis.selectedIndex    = 0;
            }
        });
    });

    // Populate Modal Hapus saat tombol hapus diklik
    document.querySelectorAll('.btn-hapus').forEach(function(btn) {
        btn.addEventListener('click', function() {
            document.getElementById('hapusIdSetor').value = this.dataset.id;
            document.getElementById('hapusJenis').textContent = this.dataset.jenis;
        });
    });

    // Auto-dismiss alert setelah 5 detik
    setTimeout(function() {
        document.querySelectorAll('.alert.fade.show').forEach(function(el) {
            const bsAlert = bootstrap.Alert.getOrCreateInstance(el);
            bsAlert.close();
        });
    }, 5000);
    </script>
</body>
</html>