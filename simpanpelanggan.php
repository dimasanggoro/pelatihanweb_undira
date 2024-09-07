<?php
include 'koneks.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    // SQL query to insert the customer data into the master_pelanggan table
    $sql = "INSERT INTO master_pelanggan (nama_pelanggan, alamat, no_telp, email, tanggal_lahir, jenis_kelamin)
            VALUES ('$nama', '$alamat', '$no_telp', '$email', '$tanggal_lahir', '$jenis_kelamin')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data pelanggan berhasil disimpan')</script>";
        echo "<script>window.location.href='tambahpelanggan.php';</script>";
    } else {
        echo "<script>alert('Data pelanggan gagal disimpan')</script>";
        echo "<script>window.location.href='tambahpelanggan.php';</script>";
    }

    $conn->close();
}
?>
