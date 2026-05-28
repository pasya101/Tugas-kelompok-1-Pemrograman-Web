<?php
$current = basename($_SERVER['PHP_SELF']);
?>
<aside class="sidebar" id="sidebar">

    <div class="sidebar-brand">
        <a href="dashboard.php" class="brand-name">Rizz<span>.</span>Furniture</a>
        <small>Panel Admin</small>
    </div>

    <nav class="sidebar-nav">

        <div class="nav-section-label">Menu Utama</div>

        <a href="dashboard.php" class="sidebar-link <?= $current === 'dashboard.php' ? 'active' : '' ?>">
            <i class="fa-solid fa-gauge"></i> Dashboard
        </a>

        <a href="produk.php" class="sidebar-link <?= $current === 'produk.php' ? 'active' : '' ?>">
            <i class="fa-solid fa-box"></i> Data Produk
        </a>

        <a href="tambah_produk.php" class="sidebar-link <?= $current === 'tambah_produk.php' ? 'active' : '' ?>">
            <i class="fa-solid fa-plus-circle"></i> Tambah Produk
        </a>

        <?php if (file_exists(__DIR__ . '/../edit_produk.php')): ?>
        <a href="edit_produk.php" class="sidebar-link <?= $current === 'edit_produk.php' ? 'active' : '' ?>">
            <i class="fa-solid fa-pen-to-square"></i> Edit Produk
        </a>
        <?php endif; ?>

        <div class="nav-section-label">Website</div>

        <a href="../index.php" class="sidebar-link" target="_blank">
            <i class="fa-solid fa-globe"></i> Lihat Website
        </a>

        <a href="https://wa.me/6281572076865" class="sidebar-link" target="_blank">
            <i class="fa-brands fa-whatsapp"></i> WhatsApp
        </a>

    </nav>

    <div class="sidebar-footer">
        <a href="auth/logout.php" class="sidebar-link" style="color:#fca5a5 !important;">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>
    </div>

</aside>
