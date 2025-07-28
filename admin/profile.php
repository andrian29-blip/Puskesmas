<?php
session_start();
if (!isset($_SESSION['login_admin'])) {
    header("Location: ../login.php");
    exit();
}

include '../koneksi.php';

// Ambil data profile
$profileQuery = mysqli_query($koneksi, "SELECT * FROM profile_instansi LIMIT 1");
$profile = mysqli_fetch_array($profileQuery);

// Update profile jika form dikirim
if (isset($_POST['update'])) {
    $nama_instansi = $_POST['nama_instansi'];
    $alamat = $_POST['alamat'];
    $pelayanan = $_POST['pelayanan'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];

    mysqli_query($koneksi, "UPDATE profile_instansi SET 
        nama_instansi='$nama_instansi',
        alamat='$alamat',
        pelayanan='$pelayanan',
        telepon='$telepon',
        email='$email'
        WHERE id_profile = '{$profile['id_profile']}'");

    echo "<script>alert('Profile berhasil diperbarui!'); window.location='profile.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pengaturan Profile Instansi</title>
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
            <a href="profile.php" class="active"><i class="fa-solid fa-building me-2"></i> Pengaturan Profile
                Instansi</a>
            <a href="pengumuman.php"><i class="fa-solid fa-bullhorn me-2"></i> Pengumuman</a>
            <a href="kontak.php"><i class="fa-solid fa-envelope me-2"></i> Kontak</a>
            <a href="kunjungan.php"><i class="fa-solid fa-book me-2"></i> Buku Tamu</a>
        </div>

        <!-- Content -->
        <div class="content">
            <h3 class="mb-4">Pengaturan Profile Instansi</h3>

            <!-- Informasi Profile -->
            <div class="card mb-4" id="infoCard">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="text-primary"><i class="fa-solid fa-building me-2"></i>Informasi Profile</h5>
                    <button id="btnEdit" class="btn btn-sm btn-warning"><i class="fa-solid fa-pencil"></i></button>
                </div>
                <p><strong>Nama Instansi:</strong> <?php echo $profile['nama_instansi']; ?></p>
                <p><strong>Alamat:</strong> <?php echo $profile['alamat']; ?></p>
                <p><strong>Jam Pelayanan:</strong> <?php echo $profile['pelayanan']; ?></p>
                <p><strong>Telepon:</strong> <?php echo $profile['telepon']; ?></p>
                <p><strong>Email:</strong> <?php echo $profile['email']; ?></p>
            </div>

            <!-- Form Update -->
            <div class="card" id="formUpdate" style="display: none;">
                <h5 class="mb-3 text-success"><i class="fa-solid fa-pen-to-square me-2"></i>Update Profile Instansi</h5>
                <form method="POST">
                    <div class="mb-3">
                        <label for="nama_instansi" class="form-label">Nama Instansi</label>
                        <input type="text" name="nama_instansi" id="nama_instansi" class="form-control" required
                            value="<?php echo $profile['nama_instansi']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Instansi</label>
                        <textarea name="alamat" id="alamat" class="form-control" rows="3"
                            required><?php echo $profile['alamat']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="pelayanan" class="form-label">Jam Pelayanan</label>
                        <input type="text" name="pelayanan" id="pelayanan" class="form-control" required
                            value="<?php echo $profile['pelayanan']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" name="telepon" id="telepon" class="form-control" required
                            value="<?php echo $profile['telepon']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required
                            value="<?php echo $profile['email']; ?>">
                    </div>
                    <button type="submit" name="update" class="btn btn-primary"><i
                            class="fa-solid fa-save me-2"></i>Update Profile</button>
                </form>
            </div>
        </div>
    </div>

    <script>
    const btnEdit = document.getElementById('btnEdit');
    const infoCard = document.getElementById('infoCard');
    const formUpdate = document.getElementById('formUpdate');

    btnEdit.addEventListener('click', () => {
        infoCard.style.display = 'none';
        formUpdate.style.display = 'block';
        window.scrollTo(0, 0);
    });
    </script>
</body>

</html>