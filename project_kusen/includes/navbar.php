<?php $current_page = $_GET['page'] ?? 'home'; ?>

<nav class="navbar navbar-expand-lg fixed-top custom-navbar" id="mainNav">
    <div class="container">

        <a class="navbar-brand" href="index.php">
            <img src="assets/images/logo.svg" alt="Rizz Furniture Logo" width="36" height="36" style="border-radius:9px;">
            Rizz<span class="brand-dot">.</span>Furniture
        </a>

        <button class="navbar-toggler border-0 shadow-none" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars" style="color: var(--wood-dark); font-size: 18px;"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto align-items-center gap-1">
                <li class="nav-item">
                    <a class="nav-link <?= !isset($_GET['page']) ? 'active' : '' ?>" href="index.php">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $current_page === 'tentang' ? 'active' : '' ?>" href="?page=tentang">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $current_page === 'produk' ? 'active' : '' ?>" href="?page=produk">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $current_page === 'kontak' ? 'active' : '' ?>" href="?page=kontak">Kontak</a>
                </li>
            </ul>
            <div class="d-flex align-items-center gap-2">
                <a href="?page=produk" class="btn btn-sm btn-outline-secondary rounded-pill px-3 d-none d-lg-flex" style="font-size:13px; color:var(--wood-dark); border-color:var(--cream-3);">
                    <i class="fa-solid fa-box me-1"></i>Katalog
                </a>
                <a href="https://wa.me/6281572076865?text=Halo%20Admin,%20saya%20ingin%20bertanya%20tentang%20produk%20Rizz%20Furniture"
                    class="btn-wa-nav nav-link" target="_blank" rel="noopener">
                    <i class="fa-brands fa-whatsapp me-1"></i>Hubungi Kami
                </a>
            </div>
        </div>

    </div>
</nav>
