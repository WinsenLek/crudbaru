<?php 
$conn = new mysqli("localhost", "root", "", "latihan");

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_GET ['username'])){
	$delete = mysqli_query($conn, " DELETE FROM mahasiswa WHERE username ='".$_GET ['username']."' ");
	$deletes = mysqli_query($conn, " DELETE FROM users WHERE username ='".$_GET ['username']."' ");
    if (!$deletes) {
        die('Error: ' . mysqli_error($conn));
    }
    
	header('location:mahasiswa.php?');
}
?>