<?php
include 'dbConnect.php';
if (isset($_POST['simpan'])) {
    $insert = mysqli_query($conn, "INSERT INTO mahasiswa VALUES
			('" . $_POST['nim'] . "',
			'" . $_POST['username'] . "',
			'" . $_POST['telp'] . "',
			'" . $_POST['email'] . "',
            '" . $_POST['semester'] . "',
			'" . $_POST['jurusan'] . "')");
    if ($insert) {
        echo 'pendi';
    } else {
        "Gagal disimpan" . mysqli_error($conn);
    }
}

$error = "";
$registerResult = "";

// Tangkap data dari form pendaftaran
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error)) {
    $registerUsername = $_POST['username'];
    $registerPassword = $_POST['password'];
    $confirmedPassword = $_POST['confirmed_password'];

    // Check if passwords match
    if ($registerPassword !== $confirmedPassword) {
        $error = "Passwords do not match.";
    } else {
        $registerRole = 'user';

        // Hash the password
        $hashedPassword = password_hash($registerPassword, PASSWORD_DEFAULT);

        // Insert data ke tabel pengguna
        $sql = "INSERT INTO users (username, password, role) VALUES ('$registerUsername', '$hashedPassword', '$registerRole')";

        if ($conn->query($sql) === TRUE) {
            $registerResult = "Registration successful";
            header("Location: mahasiswa.php");
            exit();
        } else {
            $error = "Error: " . $sql . "<br>" . $conn->error;
        }
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
            margin-left: 200px;
            padding: 16px;
        }


        h2 {
            color: #000;
        }

        form {
            width: 100%;
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            padding: 10px;
            background-color: #3081D0;
            color: #fff;
            border: none;
            border-radius: 2px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #1f5b8b;
        }

        .link {
            display: inline-block;
            padding: 4px 16px;
            color: #fff;
            border-radius: 2px;
            text-decoration: none;
            background-color: #1f5b8b;
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
        <h2>Halaman input data</h2>
        <form action="" method="POST">
            <label for="nim">Nim:</label>
            <input type="text" id="nim" name="nim" placeholder="Nim" autocomplete="off" required>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Nama lengkap" autocomplete="off" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" autocomplete="off" required>

            <label for="confirmed_password">Confirmed Password:</label>
            <input type="password" id="confirmed_password" name="confirmed_password" autocomplete="off" required>

            <label for="telp">No telepon:</label>
            <input type="text" id="telp" name="telp" placeholder="No telepon" autocomplete="off" required>

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" placeholder="Email" autocomplete="off" required>

            <label for="semester">Semester:</label>
            <select id="semester" name="semester">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select>

            <label for="jurusan">Program Studi:</label>
            <select id="jurusan" name="jurusan">
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
            </select>

            <input type="submit" name="simpan" value="Simpan">
        </form>
    </div>
</body>

</html>