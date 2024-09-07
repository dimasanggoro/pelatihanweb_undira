<?php
include 'koneks.php';

// Query to get customers
$sql = "SELECT id_pelanggan, nama_pelanggan FROM master_pelanggan";
$result = $conn->query($sql);

// Query to get products
$sql2 = "SELECT id_produk, nama_produk FROM master_produk";
$result2 = $conn->query($sql2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="image/logo.png" type="image/x-icon">
    <title>Tambah Transaksi</title>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <h3 style="text-align:center;">Tambah Transaksi</h3>
                        <form action="simpantransaksi.php" method="POST">
                            <div class="mb-3">
                                <label for="pelanggan">Pelanggan:</label>
                                <select name="id_pelanggan" class="form-control">
                                    <option value="">Pilih Pelanggan</option>
                                    <?php while ($row = $result->fetch_assoc()) { ?>
                                        <option value="<?= $row['id_pelanggan']; ?>"><?= $row['nama_pelanggan']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="produk">Produk:</label>
                                <select name="id_produk" class="form-control">
                                    <option value="">Pilih Produk</option>
                                    <?php while ($row2 = $result2->fetch_assoc()) { ?>
                                        <option value="<?= $row2['id_produk']; ?>"><?= $row2['nama_produk']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="status_pembayaran">Status Pembayaran:</label>
                                <select name="status_pembayaran" class="form-control">
                                    <option value="">Pilih Status Pembayaran</option>
                                    <option value="Belum Lunas">Belum Lunas</option>
                                    <option value="Lunas">Lunas</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="metode_pembayaran">Metode Pembayaran:</label>
                                <input type="text" name="metode_pembayaran" id="metode_pembayaran" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="diskon">Diskon:</label>
                                <input type="number" name="diskon" id="diskon" value="0.00" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="catatan">Catatan:</label>
                                <textarea name="catatan" id="catatan" class="form-control"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
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
