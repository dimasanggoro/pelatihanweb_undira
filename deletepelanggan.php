<?php
// Koneksi ke database
include 'koneks.php';

// Ambil id pelanggan dari URL
$id_pelanggan = $_GET['id'];

// Query untuk menghapus data pelanggan berdasarkan ID dari tabel transaksi_penjualan terlebih dahulu
$sql_transaksi = mysqli_query($conn, "DELETE FROM transaksi_penjualan WHERE id_pelanggan = $id_pelanggan");

// Query untuk menghapus data pelanggan dari tabel master_pelanggan
$sql = mysqli_query($conn, "DELETE FROM master_pelanggan WHERE id_pelanggan = $id_pelanggan");

if ($sql === TRUE) {
    echo "<script>alert('Delete data pelanggan berhasil')</script>";
    echo "<script>window.location.href='viewpelanggan.php';</script>";
} else {
    echo "<script>alert('Delete data pelanggan gagal')</script>";
    echo "<script>window.location.href='viewpelanggan.php';</script>";
}

$conn->close();
?>
