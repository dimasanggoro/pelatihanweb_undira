<?php
include 'koneks.php';
$data = mysqli_query($conn, "SELECT * FROM master_produk");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" href="image/logo.png" type="image/x-icon">
    <title>View Produk</title>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-responsive table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th>Kategori</th>
                                    <th>Stok</th>
                                    <th>Gambar Produk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($data->num_rows > 0) { ?>
                                    <?php while ($ambil = mysqli_fetch_object($data)) { ?>
                                        <tr>
                                            <td><?= $ambil->id_produk ?></td>
                                            <td><?= $ambil->nama_produk ?></td>
                                            <td><?= $ambil->harga ?></td>
                                            <td><?= $ambil->deskripsi ?></td>
                                            <td><?= $ambil->kategori ?></td>
                                            <td><?= $ambil->stok ?></td>
                                            <td><img src="uploads/<?= $ambil->gambar_produk ?>" alt="Gambar Produk" width="100" height="100" style="display: block; margin: auto;"></td>
                                            <td>
                                                <a href="editproduk.php?id=<?= $ambil->id_produk ?>" class="btn btn-info">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="deleteproduk.php?id=<?= $ambil->id_produk ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                                    <i class="fa fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="8">Tidak ada produk ditemukan.</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
