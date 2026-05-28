<?php
session_start();
if (!isset($_SESSION['login'])) { header('Location: auth/login.php'); exit; }
include '../config/koneksi.php';

// Hapus produk
if (isset($_GET['hapus'])) {
    $id = (int)$_GET['hapus'];
    $res = mysqli_query($conn, "SELECT gambar FROM produk WHERE id = $id");
    if ($row = mysqli_fetch_assoc($res)) {
        $file = '../upload/produk/' . $row['gambar'];
        if (file_exists($file) && !in_array($row['gambar'], ['carousel_kusen.jpg','carousel1.png','carousel2.png','kayu.jpg','alumunium.jpg'])) {
            unlink($file);
        }
    }
    mysqli_query($conn, "DELETE FROM produk WHERE id = $id");
    header('Location: produk.php?deleted=1');
    exit;
}

$query    = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC");
$username = $_SESSION['username'] ?? 'Admin';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Data Produk – Rizz Furniture Admin</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="../assets/css/admin-panel.css">
</head>
<body>
<div class="admin-wrapper">

<?php include 'includes/sidebar.php'; ?>

<div class="admin-main">
<?php include 'includes/topbar.php'; ?>

<div class="admin-content">

  <?php if (isset($_GET['deleted'])): ?>
  <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
    <i class="fa-solid fa-circle-check me-2"></i>Produk berhasil dihapus.
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
  <?php endif; ?>

  <?php if (isset($_GET['added'])): ?>
  <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
    <i class="fa-solid fa-circle-check me-2"></i>Produk berhasil ditambahkan.
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
  <?php endif; ?>

  <?php if (isset($_GET['updated'])): ?>
  <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
    <i class="fa-solid fa-circle-check me-2"></i>Produk berhasil diperbarui.
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
  <?php endif; ?>

  <div class="admin-card">
    <div class="d-flex justify-content-between align-items-center admin-card-title">
      <div>
        <span style="font-size:15px; font-weight:700;">Daftar Produk</span>
        <p class="mb-0 mt-1" style="font-size:13px; color:var(--gray); font-weight:400;">Kelola semua produk yang tampil di website.</p>
      </div>
      <a href="tambah_produk.php" class="btn btn-primary rounded-pill px-4 fw-600" style="font-size:13.5px;">
        <i class="fa-solid fa-plus me-2"></i>Tambah Produk
      </a>
    </div>

    <div class="table-responsive">
      <table class="table table-hover align-middle" id="tableProduk">
        <thead>
          <tr>
            <th width="50">No</th>
            <th width="70">Gambar</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th width="120">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; while ($data = mysqli_fetch_assoc($query)): ?>
          <tr>
            <td class="text-muted" style="font-size:13px;"><?= $no++ ?></td>
            <td>
              <img src="../upload/produk/<?= htmlspecialchars($data['gambar']) ?>"
                class="produk-thumb"
                onerror="this.src='../assets/images/carousel/carousel_kusen.jpg'"
                alt="<?= htmlspecialchars($data['nama_produk']) ?>">
            </td>
            <td>
              <div class="fw-600" style="font-size:13.5px;"><?= htmlspecialchars($data['nama_produk']) ?></div>
            </td>
            <td><span class="price-badge">Rp <?= number_format($data['harga'], 0, ',', '.') ?></span></td>
            <td style="max-width:200px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; font-size:13px; color:var(--gray);">
              <?= htmlspecialchars($data['deskripsi']) ?>
            </td>
            <td>
              <a href="edit_produk.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-outline-warning rounded-pill me-1 px-3" style="font-size:12px;">
                <i class="fa-solid fa-pen fa-xs"></i>
              </a>
              <button class="btn btn-sm btn-outline-danger rounded-pill px-3" style="font-size:12px;"
                onclick="confirmHapus(<?= $data['id'] ?>, '<?= htmlspecialchars(addslashes($data['nama_produk'])) ?>')">
                <i class="fa-solid fa-trash fa-xs"></i>
              </button>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function () {
    $('#tableProduk').DataTable({
        language: {
            search: "Cari:", lengthMenu: "Tampilkan _MENU_ data",
            info: "Menampilkan _START_–_END_ dari _TOTAL_ produk",
            paginate: { previous: "‹", next: "›" },
            emptyTable: "Tidak ada data produk"
        }
    });
});

function confirmHapus(id, nama) {
    Swal.fire({
        title: 'Hapus Produk?',
        html: `Produk <strong>${nama}</strong> akan dihapus permanen.`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#64748b',
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal',
        borderRadius: '14px'
    }).then(r => { if (r.isConfirmed) window.location.href = 'produk.php?hapus=' + id; });
}
</script>
</body>
</html>
