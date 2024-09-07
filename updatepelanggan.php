<?php
// Koneksi ke database
include 'koneks.php';

// Ambil data dari form
$id_pelanggan = $_POST['id_pelanggan'];
$nama_pelanggan = $_POST['nama_pelanggan'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];
$alamat = $_POST['alamat'];

// Query untuk mengupdate data pelanggan
$sql = "UPDATE master_pelanggan SET 
        nama_pelanggan='$nama_pelanggan', 
        jenis_kelamin='$jenis_kelamin', 
        tanggal_lahir='$tanggal_lahir', 
        email='$email', 
        no_telp='$telepon', 
        alamat='$alamat' 
        WHERE id_pelanggan='$id_pelanggan'";

// Eksekusi query update
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Update data pelanggan berhasil disimpan')</script>";
    echo "<script>window.location.href='viewpelanggan.php';</script>";
} else {
    echo "<script>alert('Update data pelanggan gagal')</script>";
    echo "<script>window.location.href='viewpelanggan.php';</script>";
}

$conn->close();
?>
