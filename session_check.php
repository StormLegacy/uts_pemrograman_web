<?php
/**
 * session_check.php — API endpoint untuk cek status login via AJAX
 * Dipanggil oleh script.js di setiap halaman HTML
 * Response: JSON
 */
session_start();
header('Content-Type: application/json');
header('Cache-Control: no-cache, no-store, must-revalidate');

if (isset($_SESSION['nasabah_id'])) {
    echo json_encode([
        'loggedIn' => true,
        'id'       => $_SESSION['nasabah_id'],
        'nama'     => $_SESSION['nasabah_nama']  ?? '',
        'nim'      => $_SESSION['nasabah_nim']   ?? '',
        'peran'    => $_SESSION['nasabah_peran'] ?? '',
        'prodi'    => $_SESSION['nasabah_prodi'] ?? '',
    ]);
} else {
    echo json_encode(['loggedIn' => false]);
}
?>

