<?php
include "../middleware/auth.php";
include "layouts/header.php";
include "layouts/navbar.php";
?>

<div class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
    <div class="col-md-6">
        <div class="card shadow-lg border-0 rounded-4 p-4">
            <h3 class="text-center mb-4 fw-semibold">Form Data Lengkap Santri</h3>

            <form action="../controllers/santri/store.php" method="POST">

                <div class="form-floating mb-3">
                    <input type="text" name="nama_santri" class="form-control" placeholder="Nama Santri">
                    <label>Nama Lengkap Santri</label>
                </div>

                <div class="form-floating mb-3">
                    <select name="jenis_kelamin" class="form-select">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <label>Jenis Kelamin</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                    <label>Tempat Lahir</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="date" name="tanggal_lahir" class="form-control">
                    <label>Tanggal Lahir</label>
                </div>

                <div class="form-floating mb-3">
                    <textarea class="form-control" name="alamat" style="height: 90px"></textarea>
                    <label>Alamat Lengkap</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="nama_ayah" class="form-control" placeholder="Nama Ayah">
                    <label>Nama Ayah</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu">
                    <label>Nama Ibu</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="no_hp_orang_tua" class="form-control" placeholder="No HP Orang Tua">
                    <label>No HP Orang Tua</label>
                </div>

                <button class="btn btn-primary w-100 rounded-3 fw-semibold py-2">
                    Simpan Data Santri
                </button>
            </form>
        </div>
    </div>
</div>

<?php include "layouts/footer.php"; ?>