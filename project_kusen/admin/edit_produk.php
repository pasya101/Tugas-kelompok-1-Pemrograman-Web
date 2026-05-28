<?php
session_start();
if (!isset($_SESSION['login'])) { header('Location: auth/login.php'); exit; }
include '../config/koneksi.php';

$id = (int)($_GET['id'] ?? 0);
if (!$id) { header('Location: produk.php'); exit; }

$produk = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM produk WHERE id = $id"));
if (!$produk) { header('Location: produk.php'); exit; }

$errors = [];

if (isset($_POST['update'])) {
    $nama_produk = trim($_POST['nama_produk']);
    $harga       = (int) $_POST['harga'];
    $deskripsi   = trim($_POST['deskripsi']);

    if (empty($nama_produk)) $errors[] = 'Nama produk wajib diisi.';
    if ($harga <= 0)         $errors[] = 'Harga harus lebih dari 0.';

    if (empty($errors)) {
        $gambar_baru = $produk['gambar'];

        // Jika ada gambar baru
        if (!empty($_FILES['gambar']['name'])) {
            $allowed = ['jpg','jpeg','png','webp'];
            $ext     = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));

            if (!in_array($ext, $allowed)) {
                $errors[] = 'Format gambar tidak didukung.';
            } elseif ($_FILES['gambar']['size'] > 5 * 1024 * 1024) {
                $errors[] = 'Ukuran gambar maksimal 5MB.';
            } else {
                $gambar_baru = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $_FILES['gambar']['name']);
                if (!move_uploaded_file($_FILES['gambar']['tmp_name'], '../upload/produk/' . $gambar_baru)) {
                    $errors[] = 'Gagal mengunggah gambar.';
                    $gambar_baru = $produk['gambar'];
                } else {
                    // Hapus gambar lama jika bukan gambar bawaan
                    $bawaan = ['carousel_kusen.jpg','carousel1.png','carousel2.png','kayu.jpg','alumunium.jpg'];
                    if (!in_array($produk['gambar'], $bawaan) && file_exists('../upload/produk/' . $produk['gambar'])) {
                        unlink('../upload/produk/' . $produk['gambar']);
                    }
                }
            }
        }

        if (empty($errors)) {
            $stmt = $conn->prepare("UPDATE produk SET nama_produk=?, harga=?, deskripsi=?, gambar=? WHERE id=?");
            $stmt->bind_param("sissi", $nama_produk, $harga, $deskripsi, $gambar_baru, $id);
            if ($stmt->execute()) {
                header('Location: produk.php?updated=1');
                exit;
            } else {
                $errors[] = 'Gagal menyimpan perubahan.';
            }
        }
    }
}

$username = $_SESSION['username'] ?? 'Admin';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Produk – Rizz Furniture Admin</title>
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

  <div class="form-card">

    <div class="d-flex align-items-center gap-3 mb-4">
      <a href="produk.php" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
        <i class="fa-solid fa-arrow-left me-1"></i>Kembali
      </a>
      <div>
        <h5 class="fw-700 mb-0" style="font-size:16px;">Edit Produk</h5>
        <p class="text-muted mb-0" style="font-size:13px;">Ubah data produk ID #<?= $id ?></p>
      </div>
    </div>

    <?php if (!empty($errors)): ?>
    <div class="alert alert-danger mb-4">
      <i class="fa-solid fa-circle-exclamation me-2"></i><strong>Terjadi kesalahan:</strong>
      <ul class="mb-0 mt-1 ps-3">
        <?php foreach ($errors as $e): ?><li><?= htmlspecialchars($e) ?></li><?php endforeach; ?>
      </ul>
    </div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">

      <div class="mb-3">
        <label class="form-label">Nama Produk <span class="text-danger">*</span></label>
        <input type="text" name="nama_produk" class="form-control"
          value="<?= htmlspecialchars($_POST['nama_produk'] ?? $produk['nama_produk']) ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Harga <span class="text-danger">*</span></label>
        <div class="input-group">
          <span class="input-group-text">Rp</span>
          <input type="number" name="harga" class="form-control" min="1"
            value="<?= htmlspecialchars($_POST['harga'] ?? $produk['harga']) ?>" required>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4"><?= htmlspecialchars($_POST['deskripsi'] ?? $produk['deskripsi']) ?></textarea>
      </div>

      <div class="mb-4">
        <label class="form-label">Gambar Produk</label>
        <div class="d-flex gap-3 align-items-start flex-wrap">
          <!-- Preview gambar saat ini -->
          <div>
            <p class="text-muted mb-1" style="font-size:12px;">Gambar saat ini:</p>
            <img src="../upload/produk/<?= htmlspecialchars($produk['gambar']) ?>"
              id="currentImg"
              style="width:120px; height:90px; object-fit:cover; border-radius:10px; border:1px solid #e2e8f0;"
              onerror="this.src='../assets/images/carousel/carousel_kusen.jpg'"
              alt="Gambar produk">
          </div>
          <!-- Upload baru -->
          <div class="flex-grow-1">
            <p class="text-muted mb-1" style="font-size:12px;">Ganti gambar (opsional):</p>
            <div class="preview-upload" style="height:90px;" onclick="document.getElementById('inputGambar').click()">
              <div class="upload-placeholder" id="uploadPlaceholder">
                <i class="fa-solid fa-cloud-arrow-up" style="font-size:22px;"></i>
                <span style="font-size:12px;">Klik untuk pilih gambar baru</span>
              </div>
              <img id="previewImg" src="" alt="" style="display:none;">
            </div>
            <input type="file" name="gambar" id="inputGambar" accept="image/*"
              style="display:none;" onchange="previewGambar(this)">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
          </div>
        </div>
      </div>

      <div class="d-flex gap-3">
        <button type="submit" name="update" class="btn btn-warning rounded-pill px-4 fw-600">
          <i class="fa-solid fa-floppy-disk me-2"></i>Simpan Perubahan
        </button>
        <a href="produk.php" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
      </div>

    </form>
  </div>

</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function previewGambar(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('previewImg').src = e.target.result;
            document.getElementById('previewImg').style.display = 'block';
            document.getElementById('uploadPlaceholder').style.display = 'none';
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
</body>
</html>
