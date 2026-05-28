<?php
session_start();
if (isset($_SESSION['login'])) { header('Location: ../dashboard.php'); exit; }
include '../../config/koneksi.php';

$error = '';

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = md5($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['login']    = true;
        $_SESSION['username'] = $username;
        header('Location: ../dashboard.php');
        exit;
    } else {
        $error = 'Username atau password salah.';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Admin – Rizz Furniture</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
body {
    font-family: 'Plus Jakarta Sans', sans-serif;
    min-height: 100vh;
    background: linear-gradient(135deg, #3d2b1f 0%, #6b4226 50%, #3d2b1f 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    position: relative;
    overflow: hidden;
}

body::before {
    content: '';
    position: absolute;
    top: -100px; left: -100px;
    width: 400px; height: 400px;
    background: radial-gradient(circle, rgba(212,134,11,0.15), transparent 70%);
    border-radius: 50%;
}

body::after {
    content: '';
    position: absolute;
    bottom: -80px; right: -80px;
    width: 300px; height: 300px;
    background: radial-gradient(circle, rgba(193,68,14,0.12), transparent 70%);
    border-radius: 50%;
}

.login-wrap { width: 100%; max-width: 420px; position: relative; z-index: 1; }

.login-card {
    background: #fff;
    border-radius: 20px;
    padding: 40px 36px;
    box-shadow: 0 24px 60px rgba(0,0,0,0.35);
}

.brand { font-size: 22px; font-weight: 800; color: #0f172a; margin-bottom: 4px; }
.brand span { color: #c1440e; }
.brand-sub { font-size: 13px; color: #64748b; margin-bottom: 28px; }

.form-label { font-size: 13px; font-weight: 600; color: #374151; margin-bottom: 6px; }

.form-control {
    border-radius: 10px;
    border: 1.5px solid #e2e8f0;
    padding: 11px 14px;
    font-size: 14px;
    font-family: inherit;
    transition: all 0.25s;
}

.form-control:focus {
    border-color: #a0522d;
    box-shadow: 0 0 0 3px rgba(160,82,45,0.12);
    outline: none;
}

.input-group .form-control { border-radius: 10px 0 0 10px; }

.btn-eye {
    border: 1.5px solid #e2e8f0;
    border-left: none;
    border-radius: 0 10px 10px 0;
    background: #f8fafc;
    color: #64748b;
    padding: 0 14px;
    cursor: pointer;
    transition: all 0.25s;
}

.btn-eye:hover { background: #f1f5f9; }

.btn-login {
    background: linear-gradient(135deg, #a0522d, #3d2b1f);
    color: #fff;
    border: none;
    border-radius: 10px;
    padding: 13px;
    font-weight: 700;
    font-size: 15px;
    width: 100%;
    transition: all 0.25s;
    box-shadow: 0 6px 20px rgba(61,43,31,0.35);
    font-family: inherit;
    cursor: pointer;
}

.btn-login:hover { transform: translateY(-2px); box-shadow: 0 10px 28px rgba(61,43,31,0.45); }

.error-box {
    background: #fff5f5;
    border: 1px solid #fecaca;
    border-left: 4px solid #ef4444;
    color: #dc2626;
    border-radius: 10px;
    padding: 12px 14px;
    font-size: 13.5px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.back-link { text-align: center; margin-top: 18px; font-size: 13px; color: rgba(255,255,255,0.5); }
.back-link a { color: #f5c842; text-decoration: none; font-weight: 600; }
.back-link a:hover { text-decoration: underline; }
</style>
</head>
<body>

<div class="login-wrap">
    <div class="login-card">
        <div class="brand">Rizz<span>.</span>Furniture</div>
        <p class="brand-sub">Panel Admin — Masuk untuk melanjutkan</p>

        <?php if ($error): ?>
        <div class="error-box">
            <i class="fa-solid fa-circle-exclamation"></i>
            <?= htmlspecialchars($error) ?>
        </div>
        <?php endif; ?>

        <form method="POST" autocomplete="off">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control"
                    placeholder="Masukkan username" required
                    value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
            </div>

            <div class="mb-4">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" name="password" id="pwInput"
                        class="form-control" placeholder="Masukkan password" required>
                    <button type="button" class="btn-eye" onclick="togglePw()">
                        <i class="fa-solid fa-eye" id="eyeIcon"></i>
                    </button>
                </div>
            </div>

            <button type="submit" name="login" class="btn-login">
                <i class="fa-solid fa-right-to-bracket me-2"></i>Masuk
            </button>
        </form>
    </div>

    <div class="back-link">
        <a href="../../index.php"><i class="fa-solid fa-arrow-left me-1"></i>Kembali ke Website</a>
    </div>
</div>

<script>
function togglePw() {
    const i = document.getElementById('pwInput');
    const e = document.getElementById('eyeIcon');
    if (i.type === 'password') { i.type = 'text'; e.className = 'fa-solid fa-eye-slash'; }
    else { i.type = 'password'; e.className = 'fa-solid fa-eye'; }
}
</script>
</body>
</html>
