<?php
include 'koneks.php';

// Ambil data dari form
$id_produk = $_POST['id_produk'];
$nama_produk = $_POST['nama_produk'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$kategori = $_POST['kategori'];
$stok = $_POST['stok'];

// Periksa apakah ada file gambar baru yang diupload
if ($_FILES['gambar_produk']['name'] != "") {
    $gambar_produk = $_FILES['gambar_produk']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($gambar_produk);

    // Lakukan upload file
    if (move_uploaded_file($_FILES['gambar_produk']['tmp_name'], $target_file)) {
        // Update query dengan gambar baru
        $sql = "UPDATE master_produk SET nama_produk='$nama_produk', harga='$harga', deskripsi='$deskripsi', 
                kategori='$kategori', stok='$stok', gambar_produk='$gambar_produk' WHERE id_produk='$id_produk'";
    } else {
        echo "<script>alert('Gagal mengupload gambar.')</script>";
        echo "<script>window.location.href='viewproduk.php';</script>";
        exit;
    }
} else {
    // Update query tanpa mengubah gambar
    $sql = "UPDATE master_produk SET nama_produk='$nama_produk', harga='$harga', deskripsi='$deskripsi', 
            kategori='$kategori', stok='$stok' WHERE id_produk='$id_produk'";
}

// Eksekusi query update
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Update data berhasil disimpan')</script>";
    echo "<script>window.location.href='viewproduk.php';</script>";
} else {
    echo "<script>alert('Update data gagal disimpan')</script>";
    echo "<script>window.location.href='viewproduk.php';</script>";
}

$conn->close();
?>
