<?php include "layouts/header.php"; ?>


<div class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
    <div class="col-md-4">
        <div class="card shadow-lg border-0 rounded-4 p-4">
            <h3 class="text-center mb-4 fw-semibold">Login PSB Pesantren Darul Falah</h3>

            <form action="../controllers/auth/login.php" method="POST">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control rounded-3" name="username" placeholder="Username">
                    <label for="username">Username</label>
                </div>

                <div class="form-floating mb-4">
                    <input type="password" class="form-control rounded-3" name="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>

                <button class="btn btn-primary rounded-3 py-2 w-100 fw-semibold">
                    Masuk
                </button>

                <p class="mt-3 text-center small">
                    Belum punya akun? <a href="register.php" class="text-decoration-none fw-semibold">Daftar akun</a>
                </p>
            </form>
        </div>
    </div>
</div>

<?php include "layouts/scripts.php"; ?>

<?php include "layouts/footer.php"; ?>