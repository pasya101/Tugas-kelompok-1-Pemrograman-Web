<?php
session_start();
if (!isset($_SESSION['login'])) { header('Location: auth/login.php'); exit; }
include '../config/koneksi.php';

$errors  = [];
$success = false;

if (isset($_POST['simpan'])) {
    $nama_produk = trim($_POST['nama_produk']);
    $harga       = (int) $_POST['harga'];
    $deskripsi   = trim($_POST['deskripsi']);

    if (empty($nama_produk))          $errors[] = 'Nama produk wajib diisi.';
    if ($harga <= 0)                  $errors[] = 'Harga harus lebih dari 0.';
    if (empty($_FILES['gambar']['name'])) $errors[] = 'Gambar produk wajib diunggah.';

    if (empty($errors)) {
        $allowed = ['jpg','jpeg','png','webp'];
        $ext     = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed)) {
            $errors[] = 'Format gambar tidak didukung. Gunakan JPG, PNG, atau WEBP.';
        } elseif ($_FILES['gambar']['size'] > 5 * 1024 * 1024) {
            $errors[] = 'Ukuran gambar maksimal 5MB.';
        } else {
            $namaBaru   = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $_FILES['gambar']['name']);
            $uploadPath = '../upload/produk/' . $namaBaru;

            if (move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadPath)) {
                $stmt = $conn->prepare("INSERT INTO produk (nama_produk, harga, deskripsi, gambar) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("siss", $nama_produk, $harga, $deskripsi, $namaBaru);
                if ($stmt->execute()) {
                    header('Location: produk.php?added=1');
                    exit;
                } else {
                    $errors[] = 'Gagal menyimpan ke database.';
                }
            } else {
                $errors[] = 'Gagal mengunggah gambar. Periksa izin folder upload.';
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
<title>Tambah Produk – Rizz Furniture Admin</title>
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
        <h5 class="fw-700 mb-0" style="font-size:16px;">Tambah Produk Baru</h5>
        <p class="text-muted mb-0" style="font-size:13px;">Isi form di bawah untuk menambahkan produk ke katalog.</p>
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
          placeholder="Contoh: Kusen Aluminium Minimalis"
          value="<?= htmlspecialchars($_POST['nama_produk'] ?? '') ?>" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Harga <span class="text-danger">*</span></label>
        <div class="input-group">
          <span class="input-group-text">Rp</span>
          <input type="number" name="harga" class="form-control"
            placeholder="Contoh: 1500000" min="1"
            value="<?= htmlspecialchars($_POST['harga'] ?? '') ?>" required>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4"
          placeholder="Deskripsikan produk secara singkat..."><?= htmlspecialchars($_POST['deskripsi'] ?? '') ?></textarea>
      </div>

      <div class="mb-4">
        <label class="form-label">Gambar Produk <span class="text-danger">*</span></label>
        <div class="preview-upload mb-2" onclick="document.getElementById('inputGambar').click()">
          <div class="upload-placeholder" id="uploadPlaceholder">
            <i class="fa-solid fa-cloud-arrow-up"></i>
            <span>Klik untuk pilih gambar<br><small>JPG, PNG, WEBP – Maks. 5MB</small></span>
          </div>
          <img id="previewImg" src="" alt="" style="display:none;">
        </div>
        <input type="file" name="gambar" id="inputGambar" accept="image/*"
          style="display:none;" required onchange="previewGambar(this)">
        <small class="text-muted">Format: JPG, PNG, WEBP. Ukuran maksimal 5MB.</small>
      </div>

      <div class="d-flex gap-3">
        <button type="submit" name="simpan" class="btn btn-primary rounded-pill px-4 fw-600">
          <i class="fa-solid fa-floppy-disk me-2"></i>Simpan Produk
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
