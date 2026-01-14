<?php
include "../../config/koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $koneksi->prepare("
    SELECT id_user, username, password, role, nama_lengkap
    FROM users
    WHERE username = :username AND password = :password
");

$stmt->execute([
    ':username' => $username,
    ':password' => $password
]);

$row = $stmt->fetch();

if ($row) {
    session_start();
    $_SESSION['user_id'] = $row['id_user'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['nama_lengkap'] = $row['nama_lengkap'];

    if ($row['role'] === 'admin') {
        header("Location: ../../views/admin/dashboard_admin.php");
    } else {
        header("Location: ../../views/dashboard.php");
    }
    exit;
} else {
    header("Location: ../../views/login.php?error=1");
    exit;
}
