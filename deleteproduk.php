<?php
// Koneksi ke database
include 'koneks.php';

// Ambil ID produk dari URL
$id_produk = $_GET['id'];

// Query untuk mengambil data produk berdasarkan ID (untuk menghapus file gambar jika diperlukan)
$result = mysqli_query($conn, "SELECT gambar_produk FROM master_produk WHERE id_produk = $id_produk");

if ($result->num_rows > 0) {
    $produk = mysqli_fetch_array($result);
    $gambar_produk = $produk['gambar_produk'];

    // Hapus file gambar dari server jika ada
    if (file_exists("uploads/" . $gambar_produk)) {
        unlink("uploads/" . $gambar_produk);
    }

    // Query untuk menghapus data produk dari tabel transaksi_penjualan
    $sql_transaksi = mysqli_query($conn, "DELETE FROM transaksi_penjualan WHERE id_produk = $id_produk");

    // Query untuk menghapus data produk dari master_produk
    $sql_delete = mysqli_query($conn, "DELETE FROM master_produk WHERE id_produk = $id_produk");

    if ($sql_delete === TRUE) {
        echo "<script>alert('Delete data berhasil')</script>";
        echo "<script>window.location.href='viewproduk.php';</script>";
    } else {
        echo "<script>alert('Delete data gagal')</script>";
        echo "<script>window.location.href='viewproduk.php';</script>";
    }
} else {
    echo "<script>alert('Produk tidak ditemukan.')</script>";
    echo "<script>window.location.href='viewproduk.php';</script>";
}

$conn->close();
?>
