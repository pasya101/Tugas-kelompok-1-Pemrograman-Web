<?php
$username = $_SESSION['username'] ?? 'Admin';
$page_titles = [
    'dashboard.php'     => ['Dashboard', 'Ringkasan data toko Anda'],
    'produk.php'        => ['Data Produk', 'Kelola semua produk'],
    'tambah_produk.php' => ['Tambah Produk', 'Tambahkan produk baru'],
    'edit_produk.php'   => ['Edit Produk', 'Ubah data produk'],
];
$current = basename($_SERVER['PHP_SELF']);
$title    = $page_titles[$current][0] ?? 'Admin Panel';
$subtitle = $page_titles[$current][1] ?? '';
?>
<header class="topbar">
    <div class="topbar-left">
        <h5><?= $title ?></h5>
        <?php if ($subtitle): ?><p><?= $subtitle ?></p><?php endif; ?>
    </div>
    <div class="topbar-right">
        <a href="../index.php" target="_blank" class="topbar-btn" title="Lihat Website">
            <i class="fa-solid fa-globe"></i>
        </a>
        <a href="auth/logout.php" class="topbar-user" title="Logout">
            <div class="user-avatar"><?= strtoupper(substr($username, 0, 1)) ?></div>
            <span><?= htmlspecialchars($username) ?></span>
            <i class="fa-solid fa-chevron-down fa-xs ms-1" style="color:var(--gray);"></i>
        </a>
    </div>
</header>
