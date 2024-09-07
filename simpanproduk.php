<?php
include 'koneks.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];

    // Handle file upload
    $gambar_produk = $_FILES['gambar_produk']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($gambar_produk);

    if (move_uploaded_file($_FILES['gambar_produk']['tmp_name'], $target_file)) {
        // File successfully uploaded
    } else {
        $gambar_produk = null;
    }

    // SQL query to insert the product data into the master_produk table
    $sql = "INSERT INTO master_produk (nama_produk, harga, deskripsi, kategori, stok, gambar_produk)
            VALUES ('$nama', '$harga', '$deskripsi', '$kategori', '$stok', '$gambar_produk')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data produk berhasil disimpan')</script>";
        echo "<script>window.location.href='tambahproduk.php';</script>";
    } else {
        echo "<script>alert('Data produk Gagal disimpan')</script>";
        echo "<script>window.location.href='tambahproduk.php';</script>";
    }

    $conn->close();
}
?>
