<?php
include "../middleware/auth.php";
include "layouts/header.php";
include "layouts/navbar.php";
?>

<style>
    .hero-bg {
        background: linear-gradient(135deg, #0d6efd, #0a58ca);
        color: #fff;
    }

    .hero-bg p {
        opacity: 0.9;
    }

    .section-title {
        position: relative;
        padding-left: 12px;
    }

    .section-title::before {
        content: "";
        position: absolute;
        left: 0;
        top: 4px;
        width: 4px;
        height: 100%;
        background-color: #0d6efd;
        border-radius: 2px;
    }

    .card-hover {
        transition: all 0.3s ease;
    }

    .card-hover:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, .12);
    }

    .icon-box {
        width: 48px;
        height: 48px;
        background: rgba(13, 110, 253, .1);
        color: #0d6efd;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        font-size: 22px;
        margin-bottom: 10px;
    }
</style>

<div class="container py-5">

    <!-- Hero -->
    <div class="card hero-bg border-0 rounded-4 p-4 mb-4 shadow">
        <h3 class="fw-semibold mb-2">Pondok Pesantren Darul Falah</h3>

        <p class="mb-2">
            Membentuk generasi Islami yang berilmu, beriman, dan berakhlaqul karimah
        </p>

        <div class="d-flex align-items-start gap-2">
            <i class="bi bi-geo-alt-fill"></i>
            <small>
                JL. Teratai No. 12 Dusun 1 Desa Aek Songsongan<br>
                Kec. Aek Songsongan, Kab. Asahan – Sumatera Utara
            </small>
        </div>

        <hr class="border-light my-3">

        <div class="row small text-white">

            <!-- KIRI : HUBUNGI KAMI -->
            <div class="col-md-6 mb-3">
                <div class="row g-1">
                    <div class="col-12 mb-1">
                        <strong>Hubungi Kami</strong>
                    </div>

                    <div class="col-12">
                        <i class="bi bi-whatsapp me-2"></i>
                        <a href="https://wa.me/6281234567890" target="_blank" class="text-white text-decoration-none">
                            Whatsapp: +62 814-1004-1704
                        </a>
                    </div>

                    <div class="col-12">
                        <i class="bi bi-telephone-fill me-2"></i>
                        <a href="tel:+6281234567890" class="text-white text-decoration-none">
                            No HP: 0812-3456-7890
                        </a>
                    </div>

                    <div class="col-12">
                        <i class="bi bi-envelope-fill me-2"></i>
                        <a href="mailto:info@darulfalah.sch.id" class="text-white text-decoration-none">
                            Email: darulfalah.@gmail.com
                        </a>
                    </div>
                </div>
            </div>

            <!-- KANAN : MEDIA SOSIAL -->
            <div class="col-md-6 mb-3">
                <div class="row g-1">
                    <div class="col-12 mb-1">
                        <strong>Media Sosial</strong>
                    </div>

                    <div class="col-12">
                        <i class="bi bi-youtube me-2"></i>
                        <a href="https://facebook.com/darulfalah" target="_blank" class="text-white text-decoration-none">
                            Facebook: Pesantren Darul Falah
                        </a>
                    </div>

                    <div class="col-12">
                        <i class="bi bi-facebook me-2"></i>
                        <a href="https://instagram.com/darulfalah" target="_blank" class="text-white text-decoration-none">
                            Instagram: @pesantrendarulfalah
                        </a>
                    </div>

                    <div class="col-12">
                        <i class="bi bi-instagram me-2"></i>
                        <a href="https://youtube.com/@darulfalah" target="_blank" class="text-white text-decoration-none">
                            Youtube: Darul Falah Aek Songsongan
                        </a>
                    </div>
                </div>
            </div>

        </div>


        <small class="d-block mt-2">
            <h6>Selamat Datang, <strong><?= $_SESSION['nama_lengkap']; ?></strong></h6>
    </div>


    <!-- Sejarah -->
    <div class="card shadow-sm border-0 rounded-4 p-4 mb-4 card-hover">
        <h5 class="fw-semibold mb-3 section-title">Sejarah Yayasan Al Falah</h5>

        <p class="text-muted text-justify">
            Berawal dari sebuah ide brilian seorang putra daerah Kecamatan Aek Songsongan
            untuk memajukan pendidikan Agama Islam di tanah kelahirannya, berdirilah
            Yayasan Al Falah Aek Songsongan yang bergerak di bidang pendidikan agama dan sosial.
        </p>

        <p class="text-muted text-justify">
            Pada <strong>11 Agustus 2010</strong> didirikan TPA Raudhatul Falah. Melihat
            antusiasme masyarakat, yayasan berkembang menjadi lembaga pendidikan yang
            profesional dan terakreditasi.
        </p>

        <p class="text-muted mb-0 text-justify">
            Hingga akhirnya pada <strong>15 Juli 2011</strong> berdirilah
            <strong>Pondok Pesantren Darul Falah</strong>, yang terus berkhidmat
            dalam mencetak generasi Islami.
        </p>
    </div>

    <!-- Visi & Misi -->
    <div class="row g-4 mb-4">

        <!-- VISI -->
        <div class="col-md-6">
            <div class="vm-card">
                <div class="vm-icon">
                    <i class="bi bi-eye-fill"></i>
                </div>
                <h5 class="vm-title">Visi</h5>
                <p class="vm-text">
                    Terwujudnya generasi Islam yang berilmu, beriman, dan bertaqwa
                    untuk memperoleh ridho Allah Ta’ala.
                </p>
            </div>
        </div>

        <!-- MISI -->
        <div class="col-md-6">
            <div class="vm-card">
                <div class="vm-icon">
                    <i class="bi bi-bullseye"></i>
                </div>
                <h5 class="vm-title">Misi</h5>
                <ul class="vm-list ps-3">
                    <li>Pusat pengkajian dan pengamalan ilmu agama</li>
                    <li>Membentuk akhlaqul karimah</li>
                    <li>Mengembangkan bakat dan kreativitas santri</li>
                </ul>
            </div>
        </div>

    </div>


    <!-- Program Pendidikan -->
    <div class="card shadow-sm border-0 rounded-4 p-4 card-hover">
        <h5 class="fw-semibold mb-3 section-title">Program Pendidikan</h5>

        <p class="text-muted">
            Mengacu pada kurikulum Departemen Agama dan Departemen Pendidikan Nasional
            dengan masa pendidikan <strong>6 tahun</strong>.
        </p>

        <div class="row mt-3">

            <div class="col-md-4">
                <h6 class="fw-semibold text-primary">Agama Islam</h6>
                <p class="text-muted small">
                    Tafsir, Hadist, Tauhid, Fiqih, Bahasa Arab, Nahwu, Sharaf, Balaghah, Mantiq.
                </p>
            </div>

            <div class="col-md-4">
                <h6 class="fw-semibold text-primary">Pendidikan Umum</h6>
                <p class="text-muted small">
                    Matematika, IPA, IPS, PKN, Bahasa Indonesia, Bahasa Inggris.
                </p>
            </div>

            <div class="col-md-4">
                <h6 class="fw-semibold text-primary">Bakat & Minat</h6>
                <p class="text-muted small">
                    Tilawah, Kaligrafi, Nasyid, Pidato, Karya Tulis, Menjahit, Berkebun, Bela Diri.
                </p>
            </div>

        </div>

        <p class="mt-3 text-muted">
            Seluruh kegiatan dibimbing oleh <strong>ustadz dan ustadzah berkompeten</strong>.
        </p>
    </div>

</div>

<?php include "layouts/scripts.php"; ?>
<?php include "layouts/footer.php"; ?>