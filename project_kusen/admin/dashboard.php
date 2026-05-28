<?php
session_start();
if (!isset($_SESSION['login'])) { header('Location: auth/login.php'); exit; }
include '../config/koneksi.php';

$total_produk   = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM produk"))['total'] ?? 0;
$produk_terbaru = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC LIMIT 5");
$username       = $_SESSION['username'] ?? 'Admin';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard – Rizz Furniture Admin</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/admin-panel.css">
</head>
<body>
<div class="admin-wrapper">

<?php include 'includes/sidebar.php'; ?>

<div class="admin-main">
<?php include 'includes/topbar.php'; ?>

<div class="admin-content">

  <!-- Welcome Banner -->
  <div class="welcome-banner mb-4">
    <div>
      <h4 class="mb-1">Selamat datang, <?= htmlspecialchars($username) ?>! 👋</h4>
      <p class="mb-0">Berikut ringkasan data toko Anda — <?= date('l, d F Y') ?></p>
    </div>
    <a href="tambah_produk.php" class="btn btn-light rounded-pill px-4 fw-600" style="color:var(--wood-dark); font-weight:700;">
      <i class="fa-solid fa-plus me-2"></i>Tambah Produk
    </a>
  </div>

  <!-- Stat Cards -->
  <div class="row g-3 mb-4">
    <div class="col-lg-4 col-md-6">
      <div class="stat-card stat-wood">
        <div class="stat-icon"><i class="fa-solid fa-box"></i></div>
        <div>
          <div class="stat-num"><?= $total_produk ?></div>
          <div class="stat-label">Total Produk</div>
        </div>
        <div class="sparkline-wrap">
          <div class="spark-bar" style="height:40%"></div><div class="spark-bar" style="height:60%"></div>
          <div class="spark-bar" style="height:45%"></div><div class="spark-bar" style="height:80%"></div>
          <div class="spark-bar" style="height:65%"></div><div class="spark-bar" style="height:100%"></div>
        </div>
        <a href="produk.php" class="stat-link">Kelola Produk <i class="fa-solid fa-arrow-right fa-xs"></i></a>
      </div>
    </div>
    <div class="col-lg-4 col-md-6">
      <div class="stat-card stat-terra">
        <div class="stat-icon"><i class="fa-solid fa-star"></i></div>
        <div>
          <div class="stat-num">5.0</div>
          <div class="stat-label">Rating Toko</div>
        </div>
        <div class="sparkline-wrap">
          <div class="spark-bar" style="height:80%"></div><div class="spark-bar" style="height:90%"></div>
          <div class="spark-bar" style="height:85%"></div><div class="spark-bar" style="height:95%"></div>
          <div class="spark-bar" style="height:88%"></div><div class="spark-bar" style="height:100%"></div>
        </div>
        <span class="stat-link" style="color:var(--gray); cursor:default;">Dari pelanggan</span>
      </div>
    </div>
    <div class="col-lg-4 col-md-6">
      <div class="stat-card stat-amber">
        <div class="stat-icon"><i class="fa-solid fa-tags"></i></div>
        <div>
          <div class="stat-num"><?= $total_produk > 0 ? 'Aktif' : 'Kosong' ?></div>
          <div class="stat-label">Status Katalog</div>
        </div>
        <div class="sparkline-wrap">
          <div class="spark-bar" style="height:60%"></div><div class="spark-bar" style="height:75%"></div>
          <div class="spark-bar" style="height:55%"></div><div class="spark-bar" style="height:90%"></div>
          <div class="spark-bar" style="height:70%"></div><div class="spark-bar" style="height:85%"></div>
        </div>
        <a href="tambah_produk.php" class="stat-link">Tambah Produk <i class="fa-solid fa-arrow-right fa-xs"></i></a>
      </div>
    </div>
  </div>

  <!-- Recent Products – full width -->
  <div class="row g-3">
    <div class="col-12">
      <div class="admin-card">
        <div class="d-flex justify-content-between align-items-center admin-card-title">
          <span>Produk Terbaru</span>
          <a href="produk.php" class="btn btn-sm btn-outline-primary rounded-pill px-3" style="font-size:12px; font-weight:600;">Lihat Semua</a>
        </div>
        <?php if ($produk_terbaru && mysqli_num_rows($produk_terbaru) > 0): ?>
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0">
            <thead>
              <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_assoc($produk_terbaru)): ?>
              <tr>
                <td>
                  <div class="d-flex align-items-center gap-3">
                    <img src="../upload/produk/<?= htmlspecialchars($row['gambar']) ?>"
                      class="produk-thumb"
                      onerror="this.src='../assets/images/carousel/carousel_kusen.jpg'"
                      alt="<?= htmlspecialchars($row['nama_produk']) ?>">
                    <div>
                      <div class="fw-600" style="font-size:13.5px; color:var(--dark);"><?= htmlspecialchars($row['nama_produk']) ?></div>
                      <div style="font-size:12px; color:var(--gray);">ID #<?= $row['id'] ?></div>
                    </div>
                  </div>
                </td>
                <td><span class="price-badge">Rp <?= number_format($row['harga'], 0, ',', '.') ?></span></td>
                <td>
                  <a href="edit_produk.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-warning rounded-pill me-1 px-3" style="font-size:12px;">Edit</a>
                  <a href="produk.php?hapus=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger rounded-pill px-3" style="font-size:12px;"
                    onclick="return confirm('Hapus produk ini?')">Hapus</a>
                </td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
        <?php else: ?>
        <div class="text-center py-5 text-muted">
          <i class="fa-solid fa-box-open fa-2x mb-3 d-block" style="color:#e2e8f0;"></i>
          <p class="mb-2">Belum ada produk.</p>
          <a href="tambah_produk.php" class="btn btn-primary btn-sm rounded-pill px-4">Tambah Sekarang</a>
        </div>
        <?php endif; ?>
      </div>
    </div>

  </div>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
