<?php
/**
 * Koneksi Database - BSU FMIPA UNM
 * Database: bsu_mipa
 */

$host     = 'localhost';
$user     = 'root';
$password = '';           // sesuaikan jika ada password MySQL kamu
$database = 'bsu_mipa';

// Buat koneksi
$koneksi = mysqli_connect($host, $user, $password, $database);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Set charset agar mendukung karakter Indonesia
mysqli_set_charset($koneksi, 'utf8');
?>
