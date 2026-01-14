<?php include "layouts/header.php"; ?>

<div class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
    <div class="col-md-4">
        <div class="card shadow-lg border-0 rounded-4 p-4">
            <h3 class="text-center mb-4 fw-semibold">Daftar Akun Baru</h3>

            <form action="../controllers/auth/register.php" method="POST">
                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control rounded-3" placeholder="Username" required>
                    <label>Username</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control rounded-3" placeholder="Password" required>
                    <label>Password</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="nama_lengkap" class="form-control rounded-3" placeholder="Nama Lengkap" required>
                    <label>Nama Lengkap</label>
                </div>

                <input type="hidden" name="role" value="santri">

                <button class="btn btn-success rounded-3 py-2 w-100 fw-semibold">
                    Daftar
                </button>

                <p class="mt-3 text-center small">
                    Sudah punya akun? <a href="login.php" class="text-decoration-none fw-semibold">Masuk</a>
                </p>
            </form>

        </div>
    </div>
</div>

<?php include "layouts/scripts.php"; ?>
<?php include "layouts/footer.php"; ?>