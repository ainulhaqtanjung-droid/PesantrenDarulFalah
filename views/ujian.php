<?php
include "../middleware/auth.php";
include "layouts/header.php";
include "layouts/navbar.php";
include "../config/koneksi.php";

$id_user = $_SESSION['user_id'];

$stmt = $koneksi->query("SELECT * FROM soal_ujian ORDER BY id_soal ASC");
$soalQuery = $stmt->fetchAll();
?>

<div class="container py-5">
    <div class="card shadow-lg p-4 border-0 rounded-4">
        <h3 class="fw-semibold mb-4">Ujian Masuk Santri Baru</h3>

        <form action="../controllers/ujian/proses_ujian.php" method="POST">

            <?php $no = 1;
            foreach ($soalQuery as $row) : ?>
                <div class="mb-4">
                    <p class="fw-semibold"><?= $no++ ?>. <?= $row['pertanyaan'] ?></p>

                    <div class="ms-3">
                        <div><label><input type="radio" name="jawaban[<?= $row['id_soal'] ?>]" value="a"> <?= $row['opsi_a'] ?></label></div>
                        <div><label><input type="radio" name="jawaban[<?= $row['id_soal'] ?>]" value="b"> <?= $row['opsi_b'] ?></label></div>
                        <div><label><input type="radio" name="jawaban[<?= $row['id_soal'] ?>]" value="c"> <?= $row['opsi_c'] ?></label></div>
                        <div><label><input type="radio" name="jawaban[<?= $row['id_soal'] ?>]" value="d"> <?= $row['opsi_d'] ?></label></div>
                    </div>
                </div>
            <?php endforeach; ?>

            <button class="btn btn-primary w-100 py-2 fw-semibold rounded-3 mt-3">
                Kumpulkan Jawaban
            </button>
        </form>
    </div>
</div>

<?php include "layouts/footer.php"; ?>
