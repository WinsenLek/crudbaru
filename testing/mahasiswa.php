<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
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

        table {
            width: 100%;
            border: 1px solid black;
        }

        table td {
            border: 1px solid black;
        }

        table th {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <a href="dashboard.php">Dashboard</a>
            <a href="mahasiswa.php">Mahasiswa</a>
            <a href="admin.php">Admin</a>
            <?php
            session_start();

            // Check if the user clicked the "Logout" link
            if (isset($_GET['logout']) && $_GET['logout'] == 1) {
                // Destroy the session
                session_destroy();

                // Redirect to the login page or any other desired location
                header("Location: login.php");
                exit();
            }
            ?>
            <a href="login.php?logout=1">Logout</a>
        </div>
        <div class="content">
            <h2>Data Mahasiswa</h2>
            <a href="createMahasiswa.php" style="padding: 0.4% 0.8%; background-color: #009900; color:#fff; border-radius:2px;text-decoration: none;">Tambah Data</a><br><br>
            <table border="1" cellspacing="0" width="100%">
                <tr style="text-align: center;font-weight: bold; background-color: #eee;">
                    <td>No</td>
                    <td>Nim</td>
                    <td>Nama</td>
                    <td>No Telp</td>
                    <td>Email</td>
                    <td>Jurusan</td>
                    <td>Opsi</td>
                </tr>
                <?php
                include 'dbConnect.php';
                $no = 1;
                $select = mysqli_query($conn, "SELECT * FROM mahasiswa");
                if (mysqli_num_rows($select) > 0) {

                    while ($hasil = mysqli_fetch_array($select)) {
                ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $hasil['nim'] ?></td>
                            <td><?php echo $hasil['username'] ?></td>
                            <td><?php echo $hasil['telepon'] ?></td>
                            <td><?php echo $hasil['email'] ?></td>
                            <td><?php echo $hasil['jurusan'] ?></td>
                            <td>
                                <a href="editMahasiswa.php?nim=<?php echo $hasil['nim'] ?>">Edit</a>
                                <a href="deleteMahasiswa.php?username=<?php echo $hasil['username'] ?>">Hapus</a>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="7" align="center">Data Kosong</td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</body>

</html>
