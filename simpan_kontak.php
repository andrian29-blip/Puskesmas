<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];
    $tanggal = $_POST['tanggal'];

    $query = "INSERT INTO komentar (nama, email, pesan, tanggal) VALUES ('$nama', '$email', '$pesan', '$tanggal')";
    mysqli_query($koneksi, $query);

    echo "<script>alert('Pesan berhasil dikirim!'); window.location='index.php';</script>";
    exit();
}
?>