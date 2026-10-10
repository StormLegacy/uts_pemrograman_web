/**
 * script.js - Interaktivitas & Fungsionalitas BSU FMIPA UNM
 * Mendukung autentikasi session PHP, pencarian global, modal, dan efek antarmuka.
 */

// ==========================================
// 1. AUTENTIKASI NASABAH BERBASIS SESSION PHP
// ==========================================

// Cache session agar tidak melakukan fetch berulang kali dalam satu pemuatan halaman
let _bsuSession = null;

/**
 * Cek status login via session PHP (fetch ke session_check.php).
 * Mengembalikan Promise: { loggedIn, id, nama, nim, peran, prodi }
 */
async function checkPHPSession() {
    if (_bsuSession !== null) return _bsuSession;
    try {
        const res = await fetch('session_check.php', { credentials: 'same-origin' });
        _bsuSession = await res.json();
    } catch (e) {
        _bsuSession = { loggedIn: false };
    }
    return _bsuSession;
}

/**
 * Logout pengguna: konfirmasi lalu alihkan ke logout.php
 */
function logoutBSU() {
    if (confirm("Apakah Anda yakin ingin keluar dari akun Nasabah BSU FMIPA UNM?")) {
        window.location.href = "logout.php";
    }
}

/**
 * Handler tombol "Profil & Saldo" — cek session PHP terlebih dahulu
 */
async function checkProfileAccess(event) {
    if (event) event.preventDefault();
    const session = await checkPHPSession();
    window.location.href = session.loggedIn ? 'profile.php' : 'login.php';
}

// ==========================================
// 2. RENDER NAVBAR AUTH (BERBASIS SESSION PHP)
// ==========================================

/**
 * Render tombol navbar sesuai status login session PHP secara konsisten.
 * - Login  -> dropdown nama nasabah + link Profil & Saldo + Logout
 * - Belum  -> tombol "Masuk / Login" -> login.php
 */
async function updateNavbarAuth() {
    const authContainers = document.querySelectorAll(".auth-nav-container");
    if (!authContainers.length) return;

    const session = await checkPHPSession();

    authContainers.forEach(container => {
        if (session.loggedIn) {
            const firstName = (session.nama || 'Nasabah').split(' ')[0];
            const isAdmin = (session.peran && session.peran.toLowerCase() === 'admin') || (session.nama && session.nama.toLowerCase().includes('admin'));
            const profileLabel = isAdmin ? 'Profil Administrator' : 'Profil &amp; Saldo';
            container.innerHTML = `
                <div class="dropdown">
                    <button class="btn btn-outline-light btn-sm dropdown-toggle d-flex align-items-center gap-2"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-circle-user text-success fs-5"></i>
                        <span class="d-none d-sm-inline fw-semibold">${firstName}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow">
                        <li><a class="dropdown-item py-2" href="profile.php">${profileLabel}</a></li>
                        <li><hr class="dropdown-divider my-1"></li>
                        <li>
                            <a class="dropdown-item py-2 text-danger" href="logout.php"
                               onclick="return confirm('Yakin ingin keluar dari akun BSU?')">
                                Keluar (Logout)
                            </a>
                        </li>
                    </ul>
                </div>
            `;
        } else {
            container.innerHTML = `
                <a href="login.php" class="btn btn-auth-nav btn-sm px-3">
                    <i class="fa-solid fa-arrow-right-to-bracket me-1"></i> Masuk / Login
                </a>
            `;
        }
    });
}

// ==========================================
// 3. MODAL & PENCARIAN GLOBAL
// ==========================================

function injectUniversalModals() {
    if (document.getElementById("searchResultModal")) return;

    const modalHTML = `
    <!-- Modal Hasil Pencarian Global -->
    <div class="modal fade" id="searchResultModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-4 border-0 shadow">
                <div class="modal-header border-bottom">
                    <h5 class="modal-title fw-bold text-dark" id="searchModalLabel">
                        <i class="fa-solid fa-magnifying-glass text-success me-2"></i>Hasil Pencarian
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <p class="text-muted small" id="searchKeywordSummary">Menampilkan hasil untuk kata kunci...</p>
                    <div class="list-group" id="searchResultsList"></div>
                </div>
            </div>
        </div>
    </div>
    `;

    document.body.insertAdjacentHTML("beforeend", modalHTML);
}

function initGlobalSearch() {
    const searchForms = document.querySelectorAll('form[role="search"]');

    const SEARCH_INDEX = [
        { title: "Pemilahan Sampah Organik (Kompos & Eco-enzyme)", desc: "Pengolahan limbah sisa makanan, daun kering kampus menjadi kompos & eco-enzyme.", url: "work.php#organik" },
        { title: "Penerimaan Sampah Anorganik (Plastik, Kertas, Logam)", desc: "Pengumpulan botol plastik, kardus, kaleng aluminium untuk didaur ulang bernilai rupiah.", url: "work.php#anorganik" },
        { title: "Cakupan Layanan Internal & Eksternal", desc: "Melayani mahasiswa, dosen, tendik, kantin FMIPA UNM dan masyarakat sekitar Parantambung.", url: "work.php#cakupan" },
        { title: "Berita & Kegiatan BSU FMIPA UNM", desc: "Artikel peresmian BSU, inovasi ekonomi sirkular, dan pembaruan kegiatan civitas.", url: "news.php" },
        { title: "Profil & Struktur Organisasi BSU FMIPA UNM", desc: "Sejarah, latar belakang ekonomi sirkular, dan struktur organisasi pengurus.", url: "about.php" },
        { title: "Testimoni Nasabah & Civitas Akademika", desc: "Pengalaman mahasiswa, dosen, dan pengelola kantin menabung sampah di BSU.", url: "testimoni.php" },
        { title: "Kontak Pengurus (Humaerah & Amel)", desc: "Nomor WhatsApp, telepon, lokasi kampus Parantambung Jl. Daeng Tata Makassar.", url: "contact.php" },
        { title: "Profil Saya (Saldo & Riwayat Penyetoran)", desc: "Informasi saldo tabungan rupiah, total poin, dan riwayat setoran sampah.", url: "profile.php" },
        { title: "Masuk / Login Akun Nasabah", desc: "Halaman autentikasi civitas akademika untuk mengakses buku tabungan sampah.", url: "login.php" }
    ];

    searchForms.forEach(form => {
        form.addEventListener("submit", function (e) {
            e.preventDefault();
            const input = form.querySelector('input[type="search"]');
            if (!input) return;
            const query = input.value.trim().toLowerCase();
            if (!query) {
                alert("Silakan masukkan kata kunci pencarian terlebih dahulu.");
                return;
            }

            const results = SEARCH_INDEX.filter(item => 
                item.title.toLowerCase().includes(query) || item.desc.toLowerCase().includes(query)
            );

            const listEl = document.getElementById("searchResultsList");
            const summaryEl = document.getElementById("searchKeywordSummary");
            if (summaryEl) summaryEl.innerHTML = `Ditemukan <strong>${results.length}</strong> hasil untuk pencarian "<em>${query}</em>":`;

            if (listEl) {
                if (results.length === 0) {
                    listEl.innerHTML = `
                        <div class="text-center py-4 text-muted">
                            <i class="fa-regular fa-face-meh fs-1 mb-2 text-secondary"></i>
                            <p>Tidak ditemukan hasil untuk "${query}". Coba kata kunci seperti: <em>organik, anorganik, kontak, saldo, testimoni</em>.</p>
                        </div>
                    `;
                } else {
                    listEl.innerHTML = results.map(r => `
                        <a href="${r.url}" class="list-group-item list-group-item-action p-3 rounded-3 mb-2 border">
                            <div class="d-flex w-100 justify-content-between align-items-center">
                                <h6 class="mb-1 text-success fw-bold"><i class="fa-solid fa-link me-2"></i>${r.title}</h6>
                                <span class="badge bg-success-subtle text-success small">Buka</span>
                            </div>
                            <p class="mb-1 text-muted small">${r.desc}</p>
                        </a>
                    `).join("");
                }
            }

            const modalElement = document.getElementById("searchResultModal");
            if (modalElement) {
                const searchModal = bootstrap.Modal.getOrCreateInstance(modalElement);
                searchModal.show();
            }
        });
    });
}

// ==========================================
// 4. FEEDBACK FORMULIR PESAN & SARAN
// ==========================================
function initGeneralFormFeedback() {
    const forms = document.querySelectorAll(".contact-form-custom");
    forms.forEach(form => {
        form.addEventListener("submit", function (e) {
            e.preventDefault();
            alert("Terima kasih! Pesan atau saran Anda telah berhasil dikirimkan ke pengurus BSU FMIPA UNM.");
            form.reset();
        });
    });
}

// ==========================================
// 5. INISIALISASI SAAT DOM SIAP
// ==========================================
document.addEventListener("DOMContentLoaded", function () {
    // Efek hover kartu layanan
    const serviceCards = document.querySelectorAll(".service-card");
    serviceCards.forEach(card => {
        card.addEventListener("mouseenter", function () {
            this.style.transform = "translateY(-6px)";
            this.style.boxShadow = "0 12px 25px rgba(40, 167, 69, 0.18)";
            this.style.borderColor = "#218838";
        });

        card.addEventListener("mouseleave", function () {
            this.style.transform = "translateY(0)";
            this.style.boxShadow = "0 4px 6px rgba(0, 0, 0, 0.05)";
            this.style.borderColor = "#28a745";
        });
    });

    injectUniversalModals();
    updateNavbarAuth();
    initGlobalSearch();
    initGeneralFormFeedback();
});
