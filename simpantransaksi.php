<?php
include 'koneks.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_produk = $_POST['id_produk'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $jumlah = $_POST['jumlah'];
    $status_pembayaran = $_POST['status_pembayaran'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $diskon = $_POST['diskon'];
    $catatan = $_POST['catatan'];

    // Fetch the product price
    $sql = "SELECT harga FROM master_produk WHERE id_produk = $id_produk";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $harga = $row['harga'];

    // Calculate the total price after applying the discount
    $total_harga = ($harga * $jumlah) - $diskon;

    // Insert transaction data into the transaksi_penjualan table
    $sql2 = "INSERT INTO transaksi_penjualan (id_produk, id_pelanggan, jumlah, total_harga, tanggal_transaksi, status_pembayaran, metode_pembayaran, diskon, catatan)
             VALUES ('$id_produk', '$id_pelanggan', '$jumlah', '$total_harga', NOW(), '$status_pembayaran', '$metode_pembayaran', '$diskon', '$catatan')";

    if ($conn->query($sql2) === TRUE) {
        echo "<script>alert('Data transaksi berhasil disimpan')</script>";
        echo "<script>window.location.href='tambahtransaksi.php';</script>";
    } else {
        echo "<script>alert('Data transaksi gagal disimpan')</script>";
        echo "<script>window.location.href='tambahtransaksi.php';</script>";
    }

    $conn->close();
}
?>
