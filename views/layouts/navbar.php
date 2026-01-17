<?php require_once __DIR__ . '/../../init.php'; ?>

<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .navbar {
        background: rgba(13, 110, 253, 0.85);
        backdrop-filter: blur(10px);
    }

    .navbar-brand,

    .card {
        border-radius: 1rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }
    
    .logo-navbar {
        height: 40px;
        width: auto;
        object-fit: contain;
    }

    .table thead {
        background-color: #0d6efd;
        color: #fff;
    }

    .table-hover tbody tr:hover {
        background-color: #e9f2ff;
    }

    .tab-content {
        margin-top: 20px;
    }

    .tab-pane {
        padding: 20px;
        background: #fff;
        border-radius: 1rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    .nav-tabs .nav-link {
        color: #0d6efd;
        /* teks biru */
        background-color: #ffffff;
        /* tab putih */
        border: 1px solid #dee2e6;
        border-bottom: none;
        /* hilangkan border bawah agar menempel ke konten */
        border-radius: .5rem .5rem 0 0;
        margin-right: 2px;
        transition: all 0.3s;
    }

    /* Hover effect */
    .nav-tabs .nav-link:hover {
        color: #0b5ed7;
        background-color: #e2e6ea;
    }

    /* Tab aktif */
    .nav-tabs .nav-link.active {
        color: #fff;
        /* teks putih */
        background-color: #0d6efd;
        /* biru */
        border-color: #0d6efd #0d6efd #fff;
    }
</style>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="navbar-brand"
           href="<?php echo $_SESSION['role'] == 'admin' ? "dashboard_admin.php" : "dashboard.php"; ?>">

            <img src="<?= BASE_URL ?>public/logo.jpg"
                 alt="Logo Pesantren"
                 class="logo-navbar">

            <span class="navbar-brand text-white fw-bold">PSB Pesantren Darul Falah</span>
        </a>

        <!-- Buttons -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarButtons">
            <div class="d-flex gap-2">
                <a href="<?php echo $_SESSION['role'] == 'admin' ? "dashboard_admin.php" : "dashboard.php" ?>" class="btn btn-outline-light">Dashboard</a>
                <?php if ($_SESSION['role'] == 'santri') : ?>
                <a href="<?= BASE_URL ?>views/profil.php" class="btn btn-outline-light">Profile Pesantren</a>
                <?php endif ?>
                <a href="<?= BASE_URL ?>views/logout.php" class="btn btn-danger text-white">Logout</a>
            </div>
        </div>
    </div>
</nav>