<?php
// Konfigurasi koneksi database MySQL
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'kepegawaian';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Koneksi gagal: ' . $conn->connect_error);
}
