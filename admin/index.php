<?php
session_start();
if (!isset($_SESSION['login_admin'])) {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f4f7fa;
    }

    .sidebar {
        height: 100vh;
        background: linear-gradient(180deg, #2C3E50, #3498DB);
        padding-top: 20px;
    }

    .sidebar a {
        color: white;
        display: block;
        padding: 15px;
        text-decoration: none;
        transition: 0.3s;
    }

    .sidebar a:hover,
    .sidebar a.active {
        background-color: #1ABC9C;
    }

    .content {
        padding: 30px;
    }

    .navbar {
        background: linear-gradient(90deg, #2C3E50, #3498DB);
    }

    .navbar-brand,
    .navbar .btn {
        color: white !important;
    }

    .card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        transition: 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg shadow">
        <div class="container-fluid">
            <a class="navbar-brand ms-3" href="#">Dashboard Admin</a>
            <div class="d-flex me-3">
                <a href="logout.php" class="btn btn-danger"><i class="fa-solid fa-right-from-bracket me-1"></i>
                    Logout</a>
            </div>
        </div>
    </nav>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <a href="index.php" class="active"><i class="fa-solid fa-house me-2"></i> Beranda</a>
            <a href="profile.php"><i class="fa-solid fa-building me-2"></i> Pengaturan Profile Instansi</a>
            <a href="pengumuman.php"><i class="fa-solid fa-bullhorn me-2"></i> Pengumuman</a>
            <a href="kontak.php"><i class="fa-solid fa-envelope me-2"></i> Kontak</a>
            <a href="kunjungan.php"><i class="fa-solid fa-book me-2"></i> Buku Tamu</a>
        </div>

        <!-- Content -->
        <div class="content flex-grow-1">
            <h3>Selamat Datang, <?php echo $_SESSION['username']; ?>!</h3>
            <p>Gunakan menu di sebelah kiri untuk mengelola website Puskesmas.</p>

            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card text-center">
                        <i class="fa-solid fa-building fa-3x mb-3 text-primary"></i>
                        <h5>Profile Instansi</h5>
                        <a href="profile.php" class="btn btn-outline-primary mt-3">Kelola</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <i class="fa-solid fa-bullhorn fa-3x mb-3 text-success"></i>
                        <h5>Pengumuman</h5>
                        <a href="pengumuman.php" class="btn btn-outline-success mt-3">Kelola</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <i class="fa-solid fa-envelope fa-3x mb-3 text-danger"></i>
                        <h5>Pesan Kontak</h5>
                        <a href="kontak.php" class="btn btn-outline-danger mt-3">Kelola</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>