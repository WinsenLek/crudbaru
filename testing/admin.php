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
    <div class="sidebar">
        <a href="dashboard.php">Dashboard</a>
        <a href="mahasiswa.php">Mahasiswa</a>
        <a href="admin.php">Admin</a>
        <a href="logout.php">Logout</a>
    </div>
    <div class="content">
    </div>
</body>

</html>