<?php
session_start();
if (!isset($_SESSION['login_admin'])) {
    header("Location: ../login.php");
    exit();
}

include '../koneksi.php';

// Tambah pengumuman
if (isset($_POST['tambah'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $tanggal = date('Y-m-d');

    mysqli_query($koneksi, "INSERT INTO pengumuman (judul, isi, tanggal) VALUES ('$judul', '$isi', '$tanggal')");
    echo "<script>alert('Pengumuman berhasil ditambahkan!'); window.location='pengumuman.php';</script>";
    exit();
}

// Hapus pengumuman
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM pengumuman WHERE id_pengumuman = '$id'");
    echo "<script>alert('Pengumuman berhasil dihapus!'); window.location='pengumuman.php';</script>";
    exit();
}

// Ambil semua pengumuman
$pengumuman = mysqli_query($koneksi, "SELECT * FROM pengumuman ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pengumuman</title>
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
            <a href="pengumuman.php" class="active"><i class="fa-solid fa-bullhorn me-2"></i> Pengumuman</a>
            <a href="kontak.php"><i class="fa-solid fa-envelope me-2"></i> Kontak</a>
            <a href="kunjungan.php"><i class="fa-solid fa-book me-2"></i> Buku Tamu</a>
        </div>

        <!-- Content -->
        <div class="content">
            <h3 class="mb-4">Data Pengumuman</h3>

            <!-- Form Tambah Pengumuman -->
            <div class="card mb-4">
                <h5 class="mb-3 text-success"><i class="fa-solid fa-plus me-2"></i>Tambah Pengumuman</h5>
                <form method="POST">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Pengumuman</label>
                        <input type="text" name="judul" id="judul" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi Pengumuman</label>
                        <textarea name="isi" id="isi" class="form-control" rows="3" required></textarea>
                    </div>
                    <button type="submit" name="tambah" class="btn btn-primary"><i
                            class="fa-solid fa-save me-2"></i>Tambah</button>
                </form>
            </div>

            <!-- Tabel Pengumuman -->
            <div class="card">
                <h5 class="mb-3 text-primary"><i class="fa-solid fa-table me-2"></i>Daftar Pengumuman</h5>
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        while ($row = mysqli_fetch_array($pengumuman)) { ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $row['judul']; ?></td>
                            <td><?php echo $row['isi']; ?></td>
                            <td><?php echo date('d-m-Y', strtotime($row['tanggal'])); ?></td>
                            <td>
                                <a href="pengumuman.php?id=<?php echo $row['id_pengumuman']; ?>"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus pengumuman ini?')"><i
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