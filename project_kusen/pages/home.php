<?php include 'config/koneksi.php'; ?>

<!-- ===== HERO SPLIT LAYOUT ===== -->
<section class="hero-section">
    <div class="container-fluid px-0">
        <div class="row g-0 align-items-stretch" style="min-height: calc(100vh - 72px);">

            <!-- Left: Content -->
            <div class="col-lg-6 d-flex align-items-center">
                <div class="hero-left px-4 px-lg-5 ms-lg-4" data-aos="fade-right">
                    <div class="hero-eyebrow">
                        <span class="dot"></span>
                        Cirebon, Jawa Barat
                    </div>
                    <h1 class="hero-title">
                        Wujudkan<br>
                        <span class="line-accent">Hunian Impian</span><br>
                        Anda
                    </h1>
                    <p class="hero-desc">
                        Kusen modern, furniture custom, dan interior berkualitas premium.
                        Dirancang elegan, dibuat tahan lama — sesuai konsep Anda.
                    </p>
                    <div class="hero-actions">
                        <a href="?page=produk" class="btn-primary-wood">
                            <i class="fa-solid fa-box"></i> Lihat Katalog
                        </a>
                        <a href="?page=kontak" class="btn-outline-wood">
                            <i class="fa-solid fa-phone"></i> Konsultasi Gratis
                        </a>
                    </div>
                    <div class="hero-trust">
                        <div class="hero-trust-avatars">
                            <div class="av">A</div>
                            <div class="av" style="background:linear-gradient(135deg,#c1440e,#8b4513);">S</div>
                            <div class="av" style="background:linear-gradient(135deg,#4a7c59,#2c5f3e);">B</div>
                            <div class="av" style="background:linear-gradient(135deg,#d4860b,#8b4513);">R</div>
                        </div>
                        <div class="hero-trust-text">
                            <div><strong>300+ klien puas</strong> mempercayai kami</div>
                            <div style="display:flex; align-items:center; gap:4px; margin-top:2px;">
                                <i class="fa-solid fa-star" style="color:#f0b429; font-size:12px;"></i>
                                <i class="fa-solid fa-star" style="color:#f0b429; font-size:12px;"></i>
                                <i class="fa-solid fa-star" style="color:#f0b429; font-size:12px;"></i>
                                <i class="fa-solid fa-star" style="color:#f0b429; font-size:12px;"></i>
                                <i class="fa-solid fa-star" style="color:#f0b429; font-size:12px;"></i>
                                <span style="font-size:12px; color:var(--gray); margin-left:4px;">5.0 rating</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Image -->
            <div class="col-lg-6 d-none d-lg-block position-relative" style="min-height:600px;">
                <img src="assets/images/carousel/carousel_kusen.jpg"
                    class="hero-img-main" alt="Rizz Furniture">
                <!-- Float Card 1 -->
                <div class="hero-float-card card-1" data-aos="fade-right" data-aos-delay="400">
                    <div class="float-icon wood"><i class="fa-solid fa-medal"></i></div>
                    <div>
                        <div class="float-num">500+</div>
                        <div class="float-lbl">Project Selesai</div>
                    </div>
                </div>
                <!-- Float Card 2 -->
                <div class="hero-float-card card-2" data-aos="fade-right" data-aos-delay="600">
                    <div class="float-icon terra"><i class="fa-solid fa-star"></i></div>
                    <div>
                        <div class="float-num">10+</div>
                        <div class="float-lbl">Tahun Pengalaman</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ===== BRAND STRIP ===== -->
<div class="brand-strip">
    <div class="brand-strip-inner">
        <?php
        $items = [
            ['fa-medal','Kualitas Premium'],['fa-shield-halved','Garansi Resmi'],
            ['fa-truck-fast','Pengiriman Cepat'],['fa-pencil-ruler','Custom Order'],
            ['fa-headset','Konsultasi Gratis'],['fa-star','5.0 Rating'],
            ['fa-medal','Kualitas Premium'],['fa-shield-halved','Garansi Resmi'],
            ['fa-truck-fast','Pengiriman Cepat'],['fa-pencil-ruler','Custom Order'],
            ['fa-headset','Konsultasi Gratis'],['fa-star','5.0 Rating'],
        ];
        foreach ($items as $item):
        ?>
        <div class="brand-strip-item">
            <i class="fa-solid <?= $item[0] ?>"></i>
            <span><?= $item[1] ?></span>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- ===== STATS STRIP ===== -->
<section class="stats-strip">
    <div class="container">
        <div class="row g-0">
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="0">
                <div class="stat-item">
                    <div class="stat-number">10+</div>
                    <div class="stat-label">Tahun Pengalaman</div>
                </div>
            </div>
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="80">
                <div class="stat-item">
                    <div class="stat-number">500+</div>
                    <div class="stat-label">Project Selesai</div>
                </div>
            </div>
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="160">
                <div class="stat-item">
                    <div class="stat-number">300+</div>
                    <div class="stat-label">Klien Puas</div>
                </div>
            </div>
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="240">
                <div class="stat-item">
                    <div class="stat-number">100%</div>
                    <div class="stat-label">Garansi Kualitas</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== PRODUK UNGGULAN – FEATURED LAYOUT ===== -->
<section class="produk-section">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-5 flex-wrap gap-3" data-aos="fade-up">
            <div>
                <div class="section-tag"><i class="fa-solid fa-star fa-xs"></i> Koleksi Terbaik</div>
                <h2 class="section-title mb-0">Produk Unggulan</h2>
            </div>
            <a href="?page=produk" class="btn btn-outline-secondary rounded-pill px-4 fw-600" style="font-size:14px; color:var(--wood-dark); border-color:var(--cream-3);">
                Lihat Semua <i class="fa-solid fa-arrow-right ms-2"></i>
            </a>
        </div>

        <?php
        $query = mysqli_query($conn, "SELECT * FROM produk ORDER BY id DESC LIMIT 6");
        $produk_all = [];
        if ($query) while ($r = mysqli_fetch_assoc($query)) $produk_all[] = $r;
        $badges = ['Terlaris','Baru','Promo','Premium','Pilihan','Hot'];
        ?>

        <?php if (count($produk_all) > 0): ?>

        <!-- Featured: 1 besar + 2 kecil -->
        <?php if (count($produk_all) >= 3): ?>
        <div class="produk-featured-grid mb-5" data-aos="fade-up" data-aos-delay="80">
            <?php foreach (array_slice($produk_all, 0, 3) as $i => $data): ?>
            <div class="produk-card">
                <?php if ($i === 0): ?><span class="produk-badge"><?= $badges[0] ?></span><?php endif; ?>
                <div class="produk-img-wrap">
                    <img src="upload/produk/<?= htmlspecialchars($data['gambar']) ?>"
                        class="produk-img"
                        alt="<?= htmlspecialchars($data['nama_produk']) ?>"
                        onerror="this.src='assets/images/carousel/carousel_kusen.jpg'">
                    <div class="produk-overlay">
                        <a href="https://wa.me/6281572076865?text=Halo%20Admin,%20saya%20tertarik%20dengan%20<?= urlencode($data['nama_produk']) ?>"
                            class="btn-overlay-pesan" target="_blank" rel="noopener">
                            <i class="fa-brands fa-whatsapp"></i> Pesan Sekarang
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($data['nama_produk']) ?></h5>
                    <div class="produk-price">Rp <?= number_format($data['harga'], 0, ',', '.') ?></div>
                    <p class="produk-desc"><?= htmlspecialchars($data['deskripsi']) ?></p>
                    <a href="https://wa.me/6281572076865?text=Halo%20Admin,%20saya%20tertarik%20dengan%20<?= urlencode($data['nama_produk']) ?>"
                        class="btn-pesan" target="_blank" rel="noopener">
                        <i class="fa-brands fa-whatsapp"></i> Pesan Sekarang
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <!-- Regular grid: produk 4-6 -->
        <?php if (count($produk_all) > 3): ?>
        <div class="produk-grid" data-aos="fade-up" data-aos-delay="120">
            <?php foreach (array_slice($produk_all, 3) as $i => $data): ?>
            <div class="produk-card">
                <span class="produk-badge"><?= $badges[$i + 3] ?? 'Pilihan' ?></span>
                <div class="produk-img-wrap">
                    <img src="upload/produk/<?= htmlspecialchars($data['gambar']) ?>"
                        class="produk-img"
                        alt="<?= htmlspecialchars($data['nama_produk']) ?>"
                        onerror="this.src='assets/images/carousel/carousel_kusen.jpg'">
                    <div class="produk-overlay">
                        <a href="https://wa.me/6281572076865?text=Halo%20Admin,%20saya%20tertarik%20dengan%20<?= urlencode($data['nama_produk']) ?>"
                            class="btn-overlay-pesan" target="_blank" rel="noopener">
                            <i class="fa-brands fa-whatsapp"></i> Pesan Sekarang
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($data['nama_produk']) ?></h5>
                    <div class="produk-price">Rp <?= number_format($data['harga'], 0, ',', '.') ?></div>
                    <p class="produk-desc"><?= htmlspecialchars($data['deskripsi']) ?></p>
                    <a href="https://wa.me/6281572076865?text=Halo%20Admin,%20saya%20tertarik%20dengan%20<?= urlencode($data['nama_produk']) ?>"
                        class="btn-pesan" target="_blank" rel="noopener">
                        <i class="fa-brands fa-whatsapp"></i> Pesan Sekarang
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php else: ?>
        <div class="empty-state">
            <i class="fa-solid fa-box-open"></i>
            <h5 class="mt-2 fw-700">Belum ada produk</h5>
            <p>Produk akan segera tersedia.</p>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- ===== PROSES – TIMELINE ===== -->
<section class="proses-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <div class="section-tag"><i class="fa-solid fa-list-check fa-xs"></i> Cara Kerja</div>
            <h2 class="section-title">Proses Mudah & Transparan</h2>
            <p class="section-desc">Dari konsultasi hingga pemasangan, kami memastikan setiap langkah berjalan sempurna.</p>
        </div>
        <div class="timeline-wrap" data-aos="fade-up" data-aos-delay="80">
            <div class="timeline-item">
                <div class="timeline-num">01</div>
                <div class="timeline-icon"><i class="fa-solid fa-comments"></i></div>
                <div class="timeline-title">Konsultasi</div>
                <p class="timeline-desc">Ceritakan kebutuhan dan konsep Anda kepada tim kami secara gratis.</p>
            </div>
            <div class="timeline-item">
                <div class="timeline-num">02</div>
                <div class="timeline-icon"><i class="fa-solid fa-pencil-ruler"></i></div>
                <div class="timeline-title">Desain & Estimasi</div>
                <p class="timeline-desc">Tim kami menyiapkan desain dan estimasi harga yang transparan.</p>
            </div>
            <div class="timeline-item">
                <div class="timeline-num">03</div>
                <div class="timeline-icon"><i class="fa-solid fa-screwdriver-wrench"></i></div>
                <div class="timeline-title">Produksi</div>
                <p class="timeline-desc">Produk dibuat menggunakan material premium dengan standar kualitas tinggi.</p>
            </div>
            <div class="timeline-item">
                <div class="timeline-num">04</div>
                <div class="timeline-icon"><i class="fa-solid fa-truck-fast"></i></div>
                <div class="timeline-title">Pengiriman & Pasang</div>
                <p class="timeline-desc">Pengiriman tepat waktu dan pemasangan profesional oleh tim berpengalaman.</p>
            </div>
        </div>
    </div>
</section>

<!-- ===== TESTIMONI ===== -->
<section class="testimoni-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <div class="section-tag"><i class="fa-solid fa-heart fa-xs"></i> Testimoni</div>
            <h2 class="section-title">Apa Kata Pelanggan Kami</h2>
            <p class="section-desc">Kepuasan pelanggan adalah prioritas utama kami dalam setiap pekerjaan.</p>
        </div>
        <div class="testi-track" data-aos="fade-up" data-aos-delay="80">
            <div class="testi-card">
                <div class="testi-stars">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <p class="testi-text">Kusen aluminium yang dipasang sangat rapi dan hasilnya melebihi ekspektasi. Tim pemasangannya profesional dan tepat waktu.</p>
                <div class="d-flex align-items-center gap-3">
                    <div class="testi-avatar">A</div>
                    <div>
                        <div class="testi-name">Ahmad Fauzi</div>
                        <div class="testi-loc"><i class="fa-solid fa-location-dot fa-xs me-1"></i>Cirebon</div>
                        <div class="testi-verified"><i class="fa-solid fa-circle-check fa-xs me-1"></i>Pelanggan Terverifikasi</div>
                    </div>
                </div>
            </div>
            <div class="testi-card">
                <div class="testi-stars">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <p class="testi-text">Furniture custom untuk cafe saya hasilnya sangat bagus. Desainnya sesuai konsep yang saya minta dan kualitas materialnya premium.</p>
                <div class="d-flex align-items-center gap-3">
                    <div class="testi-avatar" style="background:linear-gradient(135deg,#c1440e,#8b4513);">S</div>
                    <div>
                        <div class="testi-name">Siti Rahayu</div>
                        <div class="testi-loc"><i class="fa-solid fa-location-dot fa-xs me-1"></i>Indramayu</div>
                        <div class="testi-verified"><i class="fa-solid fa-circle-check fa-xs me-1"></i>Pelanggan Terverifikasi</div>
                    </div>
                </div>
            </div>
            <div class="testi-card">
                <div class="testi-stars">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <p class="testi-text">Harga kompetitif dengan kualitas yang tidak mengecewakan. Konsultasinya sangat membantu dalam menentukan pilihan yang tepat.</p>
                <div class="d-flex align-items-center gap-3">
                    <div class="testi-avatar" style="background:linear-gradient(135deg,#4a7c59,#2c5f3e);">B</div>
                    <div>
                        <div class="testi-name">Budi Santoso</div>
                        <div class="testi-loc"><i class="fa-solid fa-location-dot fa-xs me-1"></i>Kuningan</div>
                        <div class="testi-verified"><i class="fa-solid fa-circle-check fa-xs me-1"></i>Pelanggan Terverifikasi</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== CTA ===== -->
<section class="cta-section">
    <div class="container">
        <div class="cta-inner" data-aos="fade-up">
            <div class="row align-items-center g-4 position-relative" style="z-index:2;">
                <div class="col-md-8">
                    <div class="section-tag" style="background:rgba(240,180,41,0.15); color:var(--amber-light);">
                        <i class="fa-solid fa-bolt fa-xs"></i> Mulai Sekarang
                    </div>
                    <h2 class="fw-800 text-white mb-2" style="font-size:clamp(24px,3.5vw,38px); letter-spacing:-0.8px;">
                        Siap Mewujudkan<br>Hunian Impian Anda?
                    </h2>
                    <p class="mb-0" style="color:rgba(255,255,255,0.65); font-size:16px; line-height:1.7;">
                        Konsultasikan kebutuhan furniture dan interior Anda bersama tim ahli kami. Gratis, tanpa komitmen.
                    </p>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="https://wa.me/6281572076865?text=Halo%20Admin,%20saya%20ingin%20konsultasi%20gratis"
                        class="btn btn-warning btn-lg px-4 rounded-pill fw-700" target="_blank" rel="noopener"
                        style="color:var(--wood-dark); box-shadow:0 8px 24px rgba(212,134,11,0.4);">
                        <i class="fa-brands fa-whatsapp me-2"></i>Konsultasi Gratis
                    </a>
                    <div class="mt-3" style="color:rgba(255,255,255,0.45); font-size:13px;">
                        <i class="fa-solid fa-clock me-1"></i>Respon dalam 5 menit
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
