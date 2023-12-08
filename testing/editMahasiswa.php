<?php
$conn = new mysqli("localhost", "root", "", "latihan");

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
$data_edit = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim= '" . $_GET['nim'] . "' ");
$result = mysqli_fetch_array($data_edit);

if (isset($_POST['edit'])) {
    $update = mysqli_query($conn, "UPDATE mahasiswa SET username = '" . $_POST['username'] . "',
    telepon = '" . $_POST['telp'] . "', email = '" . $_POST['email'] . "', jurusan = '" . $_POST['jurusan'] . "' WHERE nim = '" . $_GET['nim'] . "' ");
    if ($update) {
        
        header('Location: mahasiswa.php');
    } else {
        echo 'Gagal edit';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            height: 100%;
            width: 200px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #111;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 16px;
            text-decoration: none;
            font-size: 20px;
            color: white;
            display: block;
        }

        .sidebar a:hover {
            background-color: #444;
        }

        .content {
            margin-left: 220px;
            padding: 16px;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <a href="dashboard.php">Dashboard</a>
        <a href="mahasiswa.php">Mahasiswa</a>
        <a href="admin.php">Admin</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="content">
    <h2>Edit data mahasiswa</h2>
    <a href="index.php" style="padding: 0.4% 0.8%; background-color: #009900; color:#fff; border-radius:2px;text-decoration: none;">Data Mahasiswa</a><br><br>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Nim</td>
                <td>:</td>
                <td><input type="text" name="nim" value="<?php echo $result['nim'] ?>" readonly></td>
            </tr>
            <tr>
                <td>Nama lengkap</td>
                <td>:</td>
                <td><input type="text" name="username" value="<?php echo $result['username'] ?>" required></td>
            </tr>
            <tr>
                <td>No telepon</td>
                <td>:</td>
                <td><input type="text" name="telp" value="<?php echo $result['telepon'] ?>" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><input type="text" name="email" value="<?php echo $result['email'] ?>" required></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td>
                    <select name="jurusan">
                        <option value="Teknik Informatika" <?php if ($result['jurusan'] == 'Teknik Informatika') echo 'selected' ?>>Teknik Informatika</option>
                        <option value="Sistem Informasi" <?php if ($result['jurusan'] == 'Sistem Informasi') echo 'selected' ?>>Sistem Informasi</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="edit" value="Simpan" required></td>
            </tr>
        </table>
    </form>
    </div>
</body>

</html>

