<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="image/logo.png" type="image/x-icon">
    <title>Halaman Tambah Produk</title>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <h3 style="text-align:center;">Tambah Produk</h3>
                        <form action="simpanproduk.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nama">Nama Produk:</label>
                                <input type="text" class="form-control" name="nama_produk" id="nama" required>
                            </div>

                            <div class="mb-3">
                                <label for="harga">Harga:</label>
                                <input type="number" class="form-control" step="0.01" name="harga" id="harga" required>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi">Deskripsi:</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="kategori">Kategori:</label>
                                <input type="text" class="form-control" name="kategori" id="kategori">
                            </div>

                            <div class="mb-3">
                                <label for="stok">Stok:</label>
                                <input type="number" class="form-control" name="stok" id="stok" value="0">
                            </div>

                            <div class="mb-3">
                                <label for="gambar_produk">Gambar Produk:</label>
                                <input type="file" class="form-control" name="gambar_produk" id="gambar_produk">
                            </div>

                            <button type="submit" class="btn btn-warning">Simpan</button>
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
