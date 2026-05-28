<?php
include 'includes/header.php';
include 'includes/navbar.php';

// Whitelist halaman yang diizinkan
$allowed_pages = ['home', 'tentang', 'produk', 'kontak'];
$page = $_GET['page'] ?? 'home';

if (!in_array($page, $allowed_pages)) {
    $page = 'home';
}

include 'pages/' . $page . '.php';

include 'includes/footer.php';
?>
