<?php
/**
 * proses_setor.php — Handler CRUD data penyetoran sampah
 * Aksi: tambah | edit | hapus
 */
session_start();
require_once 'koneksi.php';

// Pastikan sudah login
if (!isset($_SESSION['nasabah_id'])) {
    header('Location: login.php');
    exit;
}

$nasabah_id = (int) $_SESSION['nasabah_id'];
$aksi       = $_POST['aksi'] ?? $_GET['aksi'] ?? '';

// ─────────────────────────────────────────────────
// Helper: hitung tarif & poin berdasarkan jenis
// ─────────────────────────────────────────────────
function hitungTarif(string $kategori, string $jenis): array {
    $kategori = strtolower(trim($kategori));
    $jenis    = strtolower($jenis);

    if ($kategori === 'organik') {
        return ['tarif' => 1000, 'poin_per_kg' => 3];
    }
    // Anorganik
    if (str_contains($jenis, 'kaleng') || str_contains($jenis, 'aluminium') || str_contains($jenis, 'logam')) {
        return ['tarif' => 10000, 'poin_per_kg' => 20];
    }
    if (str_contains($jenis, 'kardus') || str_contains($jenis, 'kertas') || str_contains($jenis, 'hvs')) {
        return ['tarif' => 3000, 'poin_per_kg' => 6];
    }
    if (str_contains($jenis, 'gelas')) {
        return ['tarif' => 3500, 'poin_per_kg' => 7];
    }
    return ['tarif' => 4000, 'poin_per_kg' => 8]; // default botol plastik
}

// ─────────────────────────────────────────────────
// AKSI: TAMBAH data baru
// ─────────────────────────────────────────────────
if ($aksi === 'tambah') {
    $kategori    = trim($_POST['kategori']     ?? '');
    $jenis       = trim($_POST['jenis_sampah'] ?? '');
    $berat       = (float) ($_POST['berat']    ?? 0);
    $tanggal     = date('Y-m-d');

    if ($kategori === '' || $jenis === '' || $berat <= 0) {
        header('Location: profile.php?pesan=error_input');
        exit;
    }

    $t          = hitungTarif($kategori, $jenis);
    $nilai      = (float) round($berat * $t['tarif']);
    $poin       = (int) round($berat * $t['poin_per_kg']);

    // Insert ke tabel setor_sampah
    $ins = mysqli_prepare($koneksi,
        "INSERT INTO setor_sampah (id_user, tanggal, kategori, jenis_sampah, berat, nilai_saldo, poin)
         VALUES (?, ?, ?, ?, ?, ?, ?)"
    );
    mysqli_stmt_bind_param($ins, 'isssddi', $nasabah_id, $tanggal, $kategori, $jenis, $berat, $nilai, $poin);
    mysqli_stmt_execute($ins);
    mysqli_stmt_close($ins);

    // Update saldo & poin di tabel users
    $upd = mysqli_prepare($koneksi,
        "UPDATE users SET saldo = saldo + ?, poin = poin + ? WHERE id_user = ?"
    );
    mysqli_stmt_bind_param($upd, 'dii', $nilai, $poin, $nasabah_id);
    mysqli_stmt_execute($upd);
    mysqli_stmt_close($upd);

    header('Location: profile.php?pesan=tambah_ok');
    exit;
}

// ─────────────────────────────────────────────────
// AKSI: EDIT (update) data yang sudah ada
// ─────────────────────────────────────────────────
if ($aksi === 'edit') {
    $id_setor    = (int) ($_POST['id_setor']    ?? 0);
    $kategori    = trim($_POST['kategori']       ?? '');
    $jenis       = trim($_POST['jenis_sampah']   ?? '');
    $berat_baru  = (float) ($_POST['berat']      ?? 0);
    $tanggal     = trim($_POST['tanggal']        ?? date('Y-m-d'));

    if ($id_setor <= 0 || $kategori === '' || $jenis === '' || $berat_baru <= 0) {
        header('Location: profile.php?pesan=error_input');
        exit;
    }

    // Ambil data lama untuk hitung selisih saldo & poin
    $old = mysqli_prepare($koneksi,
        "SELECT berat, nilai_saldo, poin FROM setor_sampah WHERE id_setor = ? AND id_user = ?"
    );
    mysqli_stmt_bind_param($old, 'ii', $id_setor, $nasabah_id);
    mysqli_stmt_execute($old);
    $res_old = mysqli_stmt_get_result($old);
    $data_lama = mysqli_fetch_assoc($res_old);
    mysqli_stmt_close($old);

    if (!$data_lama) {
        header('Location: profile.php?pesan=tidak_ditemukan');
        exit;
    }

    $t           = hitungTarif($kategori, $jenis);
    $nilai_baru  = (float) round($berat_baru * $t['tarif']);
    $poin_baru   = (int) round($berat_baru * $t['poin_per_kg']);

    $selisih_saldo = $nilai_baru - (float)$data_lama['nilai_saldo'];
    $selisih_poin  = $poin_baru  - (int)$data_lama['poin'];

    // Update baris di setor_sampah
    $upd = mysqli_prepare($koneksi,
        "UPDATE setor_sampah SET tanggal=?, kategori=?, jenis_sampah=?, berat=?, nilai_saldo=?, poin=?
         WHERE id_setor=? AND id_user=?"
    );
    mysqli_stmt_bind_param($upd, 'sssddiii', $tanggal, $kategori, $jenis, $berat_baru, $nilai_baru, $poin_baru, $id_setor, $nasabah_id);
    mysqli_stmt_execute($upd);
    mysqli_stmt_close($upd);

    // Sesuaikan saldo & poin di tabel users (selisih)
    $upd_user = mysqli_prepare($koneksi,
        "UPDATE users SET saldo = saldo + ?, poin = poin + ? WHERE id_user = ?"
    );
    mysqli_stmt_bind_param($upd_user, 'dii', $selisih_saldo, $selisih_poin, $nasabah_id);
    mysqli_stmt_execute($upd_user);
    mysqli_stmt_close($upd_user);

    header('Location: profile.php?pesan=edit_ok');
    exit;
}

// ─────────────────────────────────────────────────
// AKSI: HAPUS data
// ─────────────────────────────────────────────────
if ($aksi === 'hapus') {
    $id_setor = (int) ($_POST['id_setor'] ?? $_GET['id_setor'] ?? 0);

    if ($id_setor <= 0) {
        header('Location: profile.php?pesan=error_input');
        exit;
    }

    // Ambil data untuk rollback saldo & poin
    $sel = mysqli_prepare($koneksi,
        "SELECT nilai_saldo, poin FROM setor_sampah WHERE id_setor = ? AND id_user = ?"
    );
    mysqli_stmt_bind_param($sel, 'ii', $id_setor, $nasabah_id);
    mysqli_stmt_execute($sel);
    $res_sel = mysqli_stmt_get_result($sel);
    $data_hapus = mysqli_fetch_assoc($res_sel);
    mysqli_stmt_close($sel);

    if (!$data_hapus) {
        header('Location: profile.php?pesan=tidak_ditemukan');
        exit;
    }

    // Hapus baris dari setor_sampah
    $del = mysqli_prepare($koneksi,
        "DELETE FROM setor_sampah WHERE id_setor = ? AND id_user = ?"
    );
    mysqli_stmt_bind_param($del, 'ii', $id_setor, $nasabah_id);
    mysqli_stmt_execute($del);
    mysqli_stmt_close($del);

    // Kurangi saldo & poin di tabel users
    $rollback_saldo = -(float)$data_hapus['nilai_saldo'];
    $rollback_poin  = -(int)$data_hapus['poin'];

    $upd_user = mysqli_prepare($koneksi,
        "UPDATE users SET saldo = saldo + ?, poin = poin + ? WHERE id_user = ?"
    );
    mysqli_stmt_bind_param($upd_user, 'dii', $rollback_saldo, $rollback_poin, $nasabah_id);
    mysqli_stmt_execute($upd_user);
    mysqli_stmt_close($upd_user);

    header('Location: profile.php?pesan=hapus_ok');
    exit;
}

// Fallback jika aksi tidak dikenal
header('Location: profile.php');
exit;
?>
