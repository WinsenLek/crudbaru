<?php
// Simpan ini di file database.php dan atur parameter koneksi sesuai dengan database Anda
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "latihan";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>