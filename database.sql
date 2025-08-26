-- Database: kepegawaian


CREATE DATABASE IF NOT EXISTS kepegawaian;
USE kepegawaian;

CREATE TABLE IF NOT EXISTS jabatan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_jabatan VARCHAR(100) NOT NULL,
    gaji BIGINT NOT NULL
);

CREATE TABLE IF NOT EXISTS pegawai (
    id_pegawai INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    alamat TEXT,
    tgl_lahir DATE,
    id_jabatan INT,
    FOREIGN KEY (id_jabatan) REFERENCES jabatan(id)
);

CREATE TABLE IF NOT EXISTS kontrak (
    id_kontrak INT AUTO_INCREMENT PRIMARY KEY,
    id_pegawai INT,
    tgl_mulai DATE,
    tgl_selesai DATE,
    status ENUM('Aktif','Nonaktif') DEFAULT 'Aktif',
    FOREIGN KEY (id_pegawai) REFERENCES pegawai(id_pegawai)
);

-- Insert sample data
INSERT INTO jabatan (nama_jabatan, gaji) VALUES 
('Manager', 8000000),
('Supervisor', 6000000),
('Staff', 4000000),
('Admin', 3500000);

INSERT INTO pegawai (nama, alamat, tgl_lahir, id_jabatan) VALUES 
('Ahmad Rizki', 'Jl. Merdeka No. 10, Jakarta', '1990-05-15', 1),
('Siti Nurhaliza', 'Jl. Sudirman No. 25, Bandung', '1988-12-20', 2),
('Budi Santoso', 'Jl. Diponegoro No. 5, Surabaya', '1992-03-08', 3),
('Dewi Lestari', 'Jl. Ahmad Yani No. 15, Yogyakarta', '1985-09-12', 1),
('Eko Prasetyo', 'Jl. Gatot Subroto No. 30, Semarang', '1991-07-22', 4),
('Fitri Handayani', 'Jl. Kartini No. 8, Malang', '1989-11-05', 3),
('Gunawan Wijaya', 'Jl. Pahlawan No. 12, Medan', '1987-04-18', 2),
('Hesti Purnamasari', 'Jl. Pemuda No. 20, Denpasar', '1993-01-30', 4);

INSERT INTO kontrak (id_pegawai, tgl_mulai, tgl_selesai, status) VALUES 
(1, '2023-01-15', '2025-01-14', 'Aktif'),
(2, '2022-06-01', '2024-05-31', 'Aktif'),
(3, '2023-03-10', '2025-03-09', 'Aktif'),
(4, '2021-09-01', '2023-08-31', 'Nonaktif'),
(5, '2023-07-15', '2025-07-14', 'Aktif'),
(6, '2022-11-20', '2024-11-19', 'Aktif'),
(7, '2023-02-05', '2025-02-04', 'Aktif'),
(8, '2022-08-12', '2024-08-11', 'Aktif');
