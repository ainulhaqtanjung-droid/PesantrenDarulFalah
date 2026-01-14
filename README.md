# PSB_Pesantren

Create database

create database db_psbpesantren;

create table users
CREATE TABLE users (
id_user INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50) NOT NULL UNIQUE,
password VARCHAR(255) NOT NULL,
nama_lengkap VARCHAR(100) NOT NULL,
role ENUM('admin', 'santri') NOT NULL DEFAULT 'santri',
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

insert data users
INSERT INTO users (username, password, nama_lengkap, role)
VALUES
('adminpsb', 'adminpsb', 'Admin PSB', 'admin'),
('santri01', 'santri01', 'Budi Ramadhan', 'santri');

create table santri
CREATE TABLE santri (
id_santri INT AUTO_INCREMENT PRIMARY KEY,
id_user INT NOT NULL,
nama_santri VARCHAR(100),
jenis_kelamin ENUM('Laki-laki','Perempuan'),
tempat_lahir VARCHAR(100),
tanggal_lahir DATE,
alamat TEXT,
nama_ayah VARCHAR(100),
nama_ibu VARCHAR(100),
no_hp_orang_tua VARCHAR(20),
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
FOREIGN KEY (id_user) REFERENCES users(id_user)
);

alter table talbe santri add column
ALTER TABLE santri
ADD status_verifikasi ENUM('pending', 'verified', 'rejected')
DEFAULT 'pending';

alter table table santri add column
ALTER TABLE santri
ADD nilai_ujian INT DEFAULT NULL,
ADD status_kelulusan ENUM('Lulus','Tidak Lulus','Belum Ujian') DEFAULT 'Belum Ujian';

create table soal Ujian
CREATE TABLE soal_ujian (
id_soal INT AUTO_INCREMENT PRIMARY KEY,
pertanyaan TEXT NOT NULL,
opsi_a VARCHAR(255) NOT NULL,
opsi_b VARCHAR(255) NOT NULL,
opsi_c VARCHAR(255) NOT NULL,
opsi_d VARCHAR(255) NOT NULL,
jawaban ENUM('a','b','c','d') NOT NULL
);

insert data soal ujian
INSERT INTO soal_ujian
(pertanyaan, opsi_a, opsi_b, opsi_c, opsi_d, jawaban)
VALUES
('Rukun Islam yang pertama adalah?',
'Puasa', 'Syahadat', 'Shalat', 'Zakat', 'b'),

('Kitab suci umat Islam adalah?',
'Injil', 'Taurat', 'Al-Qur''an', 'Zabur', 'c'),

('Nabi terakhir yang diutus Allah adalah?',
'Nabi Isa', 'Nabi Musa', 'Nabi Ibrahim', 'Nabi Muhammad SAW', 'd'),

('Shalat wajib dalam sehari semalam sebanyak?',
'3 waktu', '4 waktu', '5 waktu', '6 waktu', 'c'),

('Puasa Ramadhan hukumnya adalah?',
'Wajib', 'Sunnah', 'Makruh', 'Mubah', 'a'),

('Hari raya umat Islam setelah puasa Ramadhan adalah?',
'Idul Adha', 'Idul Fitri', 'Tahun Baru Hijriah', 'Maulid Nabi', 'b'),

('Menghormati kedua orang tua adalah perintah untuk?',
'Durhaka', 'Berbuat baik', 'Mengabaikan', 'Menyakiti', 'b'),

('Kalimat "La ilaha illallah" disebut?',
'Tasbih', 'Tahlil', 'Tahmid', 'Takbir', 'b'),

('Kiblat umat Islam ketika shalat adalah?',
'Masjid Nabawi', 'Ka''bah', 'Masjid Al-Aqsa', 'Langit', 'b'),

('Puasa berarti menahan diri dari?',
'Makan, minum, dan hawa nafsu',
'Tidur',
'Berbicara',
'Belajar',
'a');

add column bukti_pembayaran to table santri
ALTER TABLE santri ADD bukti_pembayaran VARCHAR(255) NULL;
