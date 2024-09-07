<?php
include 'koneks.php';
$id_produk = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM master_produk WHERE id_produk = $id_produk");
$produk = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="image/logo.png" type="image/x-icon">
    <title>Edit Produk</title>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <h3 style="text-align:center;">Edit Produk</h3>
                        <form action="updateproduk.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id_produk" value="<?= $produk['id_produk']; ?>">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nama_produk" class="form-label">Nama Produk</label>
                                        <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="<?= $produk['nama_produk']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="harga" class="form-label">Harga</label>
                                        <input type="number" class="form-control" name="harga" id="harga" value="<?= $produk['harga']; ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="stok" class="form-label">Stok</label>
                                        <input type="number" class="form-control" name="stok" id="stok" value="<?= $produk['stok']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="kategori" class="form-label">Kategori</label>
                                        <input type="text" class="form-control" name="kategori" id="kategori" value="<?= $produk['kategori']; ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" name="deskripsi" id="deskripsi" required><?= $produk['deskripsi']; ?></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="gambar_produk" class="form-label">Gambar Produk</label>
                                        <input type="file" class="form-control" name="gambar_produk" id="gambar_produk">
                                        <img src="uploads/<?= $produk['gambar_produk']; ?>" alt="Gambar Produk" width="100px" height="100px" style="display:block; margin-top:10px;">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Produk</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
