<?php
include "../../config/koneksi.php";

$username       = $_POST['username'];
$password       = $_POST['password']; // tidak hashing
$nama_lengkap   = $_POST['nama_lengkap'];
$role           = $_POST['role'];

$stmt = $koneksi->prepare("
    INSERT INTO users (username, password, nama_lengkap, role)
    VALUES (:username, :password, :nama_lengkap, :role)
");

$success = $stmt->execute([
    ':username'     => $username,
    ':password'     => $password,
    ':nama_lengkap' => $nama_lengkap,
    ':role'         => $role
]);

if ($success) {
    header("Location: ../../views/login.php?success=1");
    exit;
} else {
    echo "Gagal menyimpan data.";
}
