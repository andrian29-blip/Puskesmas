<?php
include 'koneksi.php';

// Ambil data profile
$profileQuery = mysqli_query($koneksi, "SELECT * FROM profile_instansi LIMIT 1");
$profile = mysqli_fetch_array($profileQuery);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puskesmas Kopeta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: flex;
        flex-direction: column;
        background-color: #f4f7fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .main-content {
        flex: 1;
    }

    .navbar {
        background: linear-gradient(90deg, #2C3E50, #3498DB);
    }

    .navbar-brand {
        font-weight: bold;
        color: white !important;
    }

    .nav-link {
        color: white !important;
    }

    .nav-link.active {
        background-color: #1ABC9C !important;
    }

    .top-info {
        background-color: #ecf6fc;
        padding: 12px 0;
        text-align: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        font-weight: 500;
    }

    .container-content {
        margin-top: 30px;
        margin-bottom: 30px;
    }

    .tab-content .card {
        background-color: #ffffff;
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: 0.3s;
    }

    .tab-content .card:hover {
        transform: translateY(-5px);
        cursor: pointer;
    }

    button[type="submit"] {
        background: linear-gradient(90deg, #1ABC9C, #16A085);
        border: none;
    }

    button[type="submit"]:hover {
        background: linear-gradient(90deg, #16A085, #1ABC9C);
    }

    footer {
        background-color: #2C3E50;
        color: white;
        padding: 20px 0;
    }

    footer a {
        color: white;
        margin: 0 10px;
        transition: 0.3s;
    }

    footer a:hover {
        color: #1ABC9C;
    }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fa-solid fa-house-medical me-2"></i>Puskesmas Kopeta</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav nav nav-pills" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                            type="button" role="tab"><i class="fa-solid fa-house me-1"></i>Beranda</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="service-tab" data-bs-toggle="tab" data-bs-target="#service"
                            type="button" role="tab"><i class="fa-solid fa-notes-medical me-1"></i>Pelayanan</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="announcement-tab" data-bs-toggle="tab"
                            data-bs-target="#announcement" type="button" role="tab"><i
                                class="fa-solid fa-bullhorn me-1"></i>Pengumuman</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                            type="button" role="tab"><i class="fa-solid fa-envelope me-1"></i>Kontak</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Info Alamat dan Jam Pelayanan -->
    <div class="top-info">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 mb-2">
                    <i class="fa-solid fa-location-dot me-2 text-primary"></i><strong>Alamat:</strong>
                    <?php echo $profile['alamat']; ?>
                </div>
                <div class="col-md-4 mb-2">
                    <i class="fa-solid fa-clock me-2 text-success"></i><strong>Jam Pelayanan:</strong>
                    <?php echo $profile['pelayanan']; ?>
                </div>
                <div class="col-md-4 mb-2">
                    <i class="fa-solid fa-calendar-days me-2 text-danger"></i><strong>Tanggal:</strong> <span
                        id="tanggal"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container container-content tab-content" id="myTabContent">

            <!-- Beranda -->
            <div class="tab-pane fade show active" id="home" role="tabpanel">
                <h2 class="text-center mb-4 text-primary">Selamat Datang di Puskesmas Kopeta</h2>
                <div class="text-center">
                    <img src="bg.png" class="img-fluid rounded shadow" alt="Beranda">
                </div>
                <p class="mt-4 text-center">Kami siap memberikan pelayanan kesehatan terbaik untuk Anda dan keluarga.
                </p>
            </div>

            <!-- Pelayanan -->
            <div class="tab-pane fade" id="service" role="tabpanel">
                <h2 class="text-center mb-4 text-success">Pelayanan Kami</h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card text-center shadow-sm p-3">
                            <i class="fa-solid fa-user-doctor fa-3x mb-3 text-primary"></i>
                            <h5>Pemeriksaan Umum</h5>
                            <p>Pelayanan pemeriksaan kesehatan untuk semua usia.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center shadow-sm p-3">
                            <i class="fa-solid fa-syringe fa-3x mb-3 text-success"></i>
                            <h5>Imunisasi Lengkap</h5>
                            <p>Layanan imunisasi dasar dan lanjutan secara gratis dan terjadwal.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center shadow-sm p-3">
                            <i class="fa-solid fa-truck-medical fa-3x mb-3 text-danger"></i>
                            <h5>Pelayanan Gawat Darurat</h5>
                            <p>Penanganan cepat dan tepat untuk kondisi darurat.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pengumuman -->
            <div class="tab-pane fade" id="announcement" role="tabpanel">
                <h2 class="text-center mb-4 text-warning">Pengumuman</h2>
                <ul class="list-group">
                    <?php
                    $pengumumanQuery = mysqli_query($koneksi, "SELECT * FROM pengumuman ORDER BY tanggal DESC");
                    while ($pengumuman = mysqli_fetch_array($pengumumanQuery)) {
                        echo '<li class="list-group-item"><strong>' . date('d-m-Y', strtotime($pengumuman['tanggal'])) . ':</strong> ' . $pengumuman['isi'] . '</li>';
                    }
                    ?>
                </ul>
            </div>

            <!-- Kontak -->
            <div class="tab-pane fade" id="contact" role="tabpanel">
                <h2 class="text-center mb-4 text-danger">Hubungi Kami</h2>
                <form class="mx-auto" style="max-width: 500px;" action="simpan_kontak.php" method="POST">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Aktif</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="pesan" class="form-label">Pesan</label>
                        <textarea class="form-control" id="pesan" name="pesan" rows="4" required></textarea>
                    </div>
                    <!-- Input tanggal otomatis -->
                    <input type="hidden" name="tanggal" value="<?php echo date('Y-m-d'); ?>">

                    <button type="submit" class="btn btn-primary w-100"><i
                            class="fa-solid fa-paper-plane me-2"></i>Kirim Pesan</button>
                </form>

            </div>

        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5">
        <div class="container">
            <p>&copy; 2024 Puskesmas Kopeta | All Rights Reserved</p>
            <div>
                <a href="#"><i class="fa-brands fa-facebook fa-lg"></i></a>
                <a href="#"><i class="fa-brands fa-instagram fa-lg"></i></a>
                <a href="#"><i class="fa-brands fa-twitter fa-lg"></i></a>
                <a href="#"><i class="fa-brands fa-whatsapp fa-lg"></i></a>
            </div>
        </div>
    </footer>

    <script>
    // Tanggal otomatis
    const today = new Date();
    const options = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    };
    document.getElementById('tanggal').textContent = today.toLocaleDateString('id-ID', options);
    </script>
</body>

</html>