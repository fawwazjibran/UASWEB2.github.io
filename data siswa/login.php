<?php
include 'koneksi.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $koneksi->query("SELECT * FROM users WHERE username='$username' AND password='$password'");

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $username;

        // Redirect berdasarkan role
        switch ($user['role']) {
            case 'admin':
                header('Location: admin/index.php');
                break;
            case 'siswa':
                header('Location: siswa/index.php');
                break;
            case 'guru':
                header('Location: guru/index.php');
                break;
            case 'pimpinan':
                header('Location: pimpinan/index.php');
                break;
            default:
                header('Location: index.php');
                break;
        }

        exit();
    } else {
        $error = "Username atau password salah";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('login.jpg'); /* Ganti dengan URL gambar Anda */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: black; /* Ganti warna teks jika perlu */
        }

        .container {
            max-width: 400px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
            background-color: rgba(255, 255, 255, 0.8); /* Warna latar belakang konten */
        }

        .btn-primary {
            width: 100%;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #0069d9;
        }

        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4 text-center">Login</h2>
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form action="" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <div class="container text-end mt-3">
            <p>Belum punya akun? <a href="registrasi.php">Registrasi disini</a></p>
            </div>
        </form>
    </div>

    <!-- Gunakan CDN Bootstrap JS dan Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

