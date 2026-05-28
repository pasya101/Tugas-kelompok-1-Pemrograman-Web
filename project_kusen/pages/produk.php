<?php include 'config/koneksi.php'; ?>

<section class="produk-section" style="padding-top: 64px;">
    <div class="container">

        <div class="text-center mb-5" data-aos="fade-up">
            <div class="section-tag"><i class="fa-solid fa-box fa-xs"></i> Katalog Lengkap</div>
            <h2 class="section-title">Semua Produk Kami</h2>
            <p class="section-desc">Furniture dan kusen berkualitas tinggi dengan desain modern yang dapat dikustomisasi sesuai kebutuhan Anda.</p>
        </div>

        <?php
        $query = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC");
        $produk_all = [];
        if ($query) while ($r = mysqli_fetch_assoc($query)) $produk_all[] = $r;
        $badges = ['Terlaris','Baru','Promo','Premium','Pilihan','Hot','Unggulan','Eksklusif'];
        ?>

        <?php if (count($produk_all) > 0): ?>
        <div class="produk-grid" data-aos="fade-up" data-aos-delay="80">
            <?php foreach ($produk_all as $i => $data): ?>
            <div class="produk-card">
                <span class="produk-badge"><?= $badges[$i % count($badges)] ?></span>
                <div class="produk-img-wrap">
                    <img src="upload/produk/<?= htmlspecialchars($data['gambar']) ?>"
                        class="produk-img"
                        alt="<?= htmlspecialchars($data['nama_produk']) ?>"
                        onerror="this.src='assets/images/carousel/carousel_kusen.jpg'">
                    <div class="produk-overlay">
                        <a href="https://wa.me/6281572076865?text=Halo%20Admin,%20saya%20tertarik%20dengan%20<?= urlencode($data['nama_produk']) ?>%20seharga%20Rp%20<?= number_format($data['harga'], 0, ',', '.') ?>.%20Apakah%20masih%20tersedia?"
                            class="btn-overlay-pesan" target="_blank" rel="noopener">
                            <i class="fa-brands fa-whatsapp"></i> Pesan Sekarang
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($data['nama_produk']) ?></h5>
                    <div class="produk-price">Rp <?= number_format($data['harga'], 0, ',', '.') ?></div>
                    <p class="produk-desc"><?= htmlspecialchars($data['deskripsi']) ?></p>
                    <a href="https://wa.me/6281572076865?text=Halo%20Admin,%20saya%20tertarik%20dengan%20<?= urlencode($data['nama_produk']) ?>%20seharga%20Rp%20<?= number_format($data['harga'], 0, ',', '.') ?>.%20Apakah%20masih%20tersedia?"
                        class="btn-pesan" target="_blank" rel="noopener">
                        <i class="fa-brands fa-whatsapp"></i> Pesan Sekarang
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-5 pt-2" data-aos="fade-up">
            <p style="color:var(--gray); font-size:15px; margin-bottom:16px;">Tidak menemukan yang Anda cari? Kami menerima pesanan custom.</p>
            <a href="https://wa.me/6281572076865?text=Halo%20Admin,%20saya%20ingin%20memesan%20produk%20custom"
                class="btn-primary-wood" target="_blank" rel="noopener" style="display:inline-flex;">
                <i class="fa-brands fa-whatsapp"></i> Pesan Custom
            </a>
        </div>

        <?php else: ?>
        <div class="empty-state">
            <i class="fa-solid fa-box-open"></i>
            <h5 class="mt-2 fw-700">Belum ada produk tersedia</h5>
            <p>Produk akan segera ditambahkan.</p>
            <a href="https://wa.me/6281572076865" class="btn-primary-wood mt-3 d-inline-flex" target="_blank" rel="noopener">
                <i class="fa-brands fa-whatsapp"></i> Tanya via WhatsApp
            </a>
        </div>
        <?php endif; ?>

    </div>
</section>
