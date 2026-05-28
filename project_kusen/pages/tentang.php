<!-- ===== TENTANG – ASYMMETRIC ===== -->
<section class="tentang-section">
    <div class="container-fluid px-0">
        <div class="row g-0 align-items-center">

            <!-- Image – keluar dari container -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="tentang-img-outer">
                    <div class="tentang-texture"></div>
                    <div class="tentang-img-wrap">
                        <img src="assets/images/carousel/carousel_kusen.jpg" alt="Rizz Furniture Workshop">
                        <div class="tentang-img-badge">
                            <span>10+</span>
                            Tahun Pengalaman
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="px-4 px-lg-5 py-5">
                    <div class="section-tag"><i class="fa-solid fa-circle-info fa-xs"></i> Tentang Kami</div>
                    <h2 class="section-title">Solusi Furniture & Kusen Modern Berkualitas</h2>
                    <p style="color:var(--gray); line-height:1.85; margin-bottom:16px; font-size:15.5px;">
                        Kami adalah perusahaan yang bergerak di bidang pembuatan kusen modern
                        dengan desain minimalis, elegan, dan berkualitas tinggi. Berdiri sejak lebih dari
                        satu dekade lalu, kami telah melayani ratusan klien di seluruh Jawa Barat.
                    </p>
                    <p style="color:var(--gray); line-height:1.85; margin-bottom:36px; font-size:15.5px;">
                        Dengan pengalaman dan tenaga profesional, kami berkomitmen memberikan produk terbaik
                        untuk rumah, kantor, cafe, maupun bangunan komersial — sesuai kebutuhan dan konsep impian Anda.
                    </p>

                    <div class="row g-3 mb-4">
                        <div class="col-6"><div class="stat-mini"><h3>10+</h3><p>Tahun Pengalaman</p></div></div>
                        <div class="col-6"><div class="stat-mini"><h3>500+</h3><p>Project Selesai</p></div></div>
                        <div class="col-6"><div class="stat-mini"><h3>300+</h3><p>Klien Puas</p></div></div>
                        <div class="col-6"><div class="stat-mini"><h3>100%</h3><p>Garansi Kualitas</p></div></div>
                    </div>

                    <div class="d-flex flex-wrap gap-3">
                        <a href="https://wa.me/6281572076865?text=Halo%20Admin,%20saya%20ingin%20konsultasi"
                            class="btn-primary-wood" target="_blank" rel="noopener">
                            <i class="fa-brands fa-whatsapp"></i> Konsultasi Gratis
                        </a>
                        <a href="?page=produk" class="btn-outline-wood">
                            <i class="fa-solid fa-box"></i> Lihat Produk
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ===== KEUNGGULAN ===== -->
<section class="keunggulan-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <div class="section-tag" style="background:rgba(240,180,41,0.12); color:var(--amber-light);">
                <i class="fa-solid fa-trophy fa-xs"></i> Keunggulan
            </div>
            <h2 class="section-title text-white">Kenapa Memilih Kami?</h2>
            <p class="section-desc" style="color:rgba(255,255,255,0.45);">Kami memberikan kualitas terbaik untuk setiap produk dan layanan.</p>
        </div>
        <div class="row g-4">
            <?php
            $keunggulan = [
                ['fa-medal','Bahan Berkualitas','Material premium pilihan yang tahan lama, anti karat, dan ramah lingkungan.'],
                ['fa-house','Desain Modern','Tampilan minimalis dan elegan untuk rumah, kantor, dan bangunan modern.'],
                ['fa-user-shield','Garansi Produk','Setiap produk dilengkapi garansi resmi sebagai jaminan kualitas kami.'],
                ['fa-pencil-ruler','Custom Order','Dikustomisasi sesuai ukuran, warna, dan konsep yang Anda inginkan.'],
                ['fa-truck-fast','Pengiriman Cepat','Pengiriman dan pemasangan profesional ke seluruh wilayah Cirebon.'],
                ['fa-headset','Konsultasi Gratis','Tim ahli kami siap membantu konsultasi desain tanpa biaya tambahan.'],
            ];
            foreach ($keunggulan as $i => $k):
            ?>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 80 ?>">
                <div class="keunggulan-card">
                    <div class="keunggulan-icon"><i class="fa-solid <?= $k[0] ?>"></i></div>
                    <h5><?= $k[1] ?></h5>
                    <p><?= $k[2] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===== VISI MISI ===== -->
<section style="padding: 96px 0; background: var(--cream-2);">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <div class="section-tag"><i class="fa-solid fa-bullseye fa-xs"></i> Komitmen Kami</div>
            <h2 class="section-title">Visi & Misi</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-6" data-aos="fade-right">
                <div class="visi-card">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="keunggulan-icon" style="background:rgba(181,69,27,0.1); color:var(--terra); width:52px; height:52px; font-size:20px; border-radius:14px; margin:0;">
                            <i class="fa-solid fa-eye"></i>
                        </div>
                        <h5 class="fw-700 mb-0" style="color:var(--wood-dark);">Visi</h5>
                    </div>
                    <p style="color:var(--gray); line-height:1.85; margin:0; font-size:15px;">
                        Menjadi perusahaan furniture dan kusen terpercaya di Jawa Barat yang dikenal
                        atas kualitas produk, inovasi desain, dan kepuasan pelanggan yang tak tertandingi.
                    </p>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <div class="visi-card">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div class="keunggulan-icon" style="background:rgba(181,69,27,0.1); color:var(--terra); width:52px; height:52px; font-size:20px; border-radius:14px; margin:0;">
                            <i class="fa-solid fa-bullseye"></i>
                        </div>
                        <h5 class="fw-700 mb-0" style="color:var(--wood-dark);">Misi</h5>
                    </div>
                    <ul style="color:var(--gray); line-height:2.1; margin:0; padding-left:20px; font-size:15px;">
                        <li>Menghadirkan produk berkualitas tinggi dengan harga kompetitif.</li>
                        <li>Memberikan layanan konsultasi dan pemasangan yang profesional.</li>
                        <li>Terus berinovasi dalam desain dan teknologi produksi.</li>
                        <li>Membangun hubungan jangka panjang dengan setiap pelanggan.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
