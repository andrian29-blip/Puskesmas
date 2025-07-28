<?php
session_start();
if (!isset($_SESSION['login_admin'])) {
    header("Location: ../login.php");
    exit();
}

include '../koneksi.php';

// Tambah data buku tamu
if (isset($_POST['tambah'])) {
    $nama_tamu = $_POST['nama_tamu'];
    $keperluan = $_POST['keperluan'];
    $tanggal = date('Y-m-d');

    mysqli_query($koneksi, "INSERT INTO buku_tamu (nama_tamu, keperluan, tanggal) VALUES ('$nama_tamu', '$keperluan', '$tanggal')");
    echo "<script>alert('Data buku tamu berhasil ditambahkan!'); window.location='kunjungan.php';</script>";
    exit();
}

// Hapus data buku tamu
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM buku_tamu WHERE id_buktam = '$id'");
    echo "<script>alert('Data buku tamu berhasil dihapus!'); window.location='kunjungan.php';</script>";
    exit();
}

// Ambil semua data buku tamu
$bukuTamu = mysqli_query($koneksi, "SELECT * FROM buku_tamu ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Manajemen Buku Tamu</title>
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
        flex-grow: 1;
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

    button[type="submit"] {
        background: linear-gradient(90deg, #1ABC9C, #16A085);
        border: none;
    }

    button[type="submit"]:hover {
        background: linear-gradient(90deg, #16A085, #1ABC9C);
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg shadow">
        <div class="container-fluid">
            <a class="navbar-brand ms-3" href="index.php">Dashboard Admin</a>
            <div class="d-flex me-3">
                <a href="logout.php" class="btn btn-danger"><i class="fa-solid fa-right-from-bracket me-1"></i>
                    Logout</a>
            </div>
        </div>
    </nav>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <a href="index.php"><i class="fa-solid fa-house me-2"></i> Beranda</a>
            <a href="profile.php"><i class="fa-solid fa-building me-2"></i> Pengaturan Profile Instansi</a>
            <a href="pengumuman.php"><i class="fa-solid fa-bullhorn me-2"></i> Pengumuman</a>
            <a href="kontak.php"><i class="fa-solid fa-envelope me-2"></i> Kontak</a>
            <a href="kunjungan.php" class="active"><i class="fa-solid fa-book me-2"></i> Buku Tamu</a>
        </div>

        <!-- Content -->
        <div class="content">
            <h3 class="mb-4">Data Buku Tamu</h3>

            <!-- Form Tambah Buku Tamu -->
            <div class="card mb-4">
                <h5 class="mb-3 text-success"><i class="fa-solid fa-plus me-2"></i>Tambah Buku Tamu</h5>
                <form method="POST">
                    <div class="mb-3">
                        <label for="nama_tamu" class="form-label">Nama Tamu</label>
                        <input type="text" name="nama_tamu" id="nama_tamu" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="keperluan" class="form-label">Keperluan</label>
                        <textarea name="keperluan" id="keperluan" class="form-control" rows="3" required></textarea>
                    </div>
                    <button type="submit" name="tambah" class="btn btn-primary"><i
                            class="fa-solid fa-save me-2"></i>Tambah</button>
                </form>
            </div>

            <!-- Tabel Buku Tamu -->
            <div class="card">
                <h5 class="mb-3 text-primary"><i class="fa-solid fa-table me-2"></i>Daftar Buku Tamu</h5>
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Tamu</th>
                            <th>Keperluan</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        while ($row = mysqli_fetch_array($bukuTamu)) { ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['nama_tamu']; ?></td>
                            <td><?php echo $row['keperluan']; ?></td>
                            <td><?php echo date('d-m-Y', strtotime($row['tanggal'])); ?></td>
                            <td>
                                <a href="kunjungan.php?hapus=<?php echo $row['id_buktam']; ?>"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')"><i
                                        class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>

</html>