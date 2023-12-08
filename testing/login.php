<?php
$conn = new mysqli("localhost", "root", "", "latihan");

// Periksa koneksi
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
// Periksa apakah formulir login disubmit
// Inisialisasi pesan error dan hasil login
$error = "";
$loginResult = "";

// Periksa apakah formulir login disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginUsername = $_POST['login_username'];
    $loginPassword = $_POST['login_password'];

    // Ambil data pengguna dari database berdasarkan username
    $result = $conn->query("SELECT * FROM users WHERE username='$loginUsername'");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($loginPassword, $row['password'])) {
            // Simpan informasi pengguna dalam sesi
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];

            $loginResult = "Login successful";
            // header("Location: index.php"); 

            if ($row['role'] == 'admin') {
                header('Location: dashboard.php');
            } else {
                header('Location: admin_dashboard.php');
            }
            exit();
        } else {
            $error = "Incorrect password";
        }
    } else {
        $error = "Username not found";
    }
}

// Tutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            max-width: 300px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="login.php" method="post">
            <h2>Login</h2>
            <label for="login_username">Username:</label>
            <input type="text" id="login_username" name="login_username" required>
            <label for="login_password">Password:</label>
            <input type="password" id="login_password" name="login_password" required>
            <button type="submit">Login</button>
        </form>
        <?php
        // Display error message, if any
        if (!empty($error)) {
            echo "<p class='error'>$error</p>";
        }
        ?>

        <p>register here <a href="register.php">click here</a></p>

    </div>
</body>

</html>
