<?php
include 'koneks.php';

$sql = "SELECT 
    transaksi_penjualan.id_transaksi,
    master_pelanggan.nama_pelanggan,
    master_produk.nama_produk,
    transaksi_penjualan.jumlah,
    transaksi_penjualan.total_harga,
    transaksi_penjualan.tanggal_transaksi,
    transaksi_penjualan.status_pembayaran,
    transaksi_penjualan.metode_pembayaran,
    transaksi_penjualan.diskon,
    transaksi_penjualan.catatan
FROM transaksi_penjualan
JOIN master_pelanggan ON transaksi_penjualan.id_pelanggan = master_pelanggan.id_pelanggan
JOIN master_produk ON transaksi_penjualan.id_produk = master_produk.id_produk
ORDER BY transaksi_penjualan.tanggal_transaksi DESC";

$result = $conn->query($sql);
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
    <title>Tampil Data Transaksi</title>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="mt-4">Data Transaksi</h3>
                <form method="POST" action="downloadfile.php">
                    <input type="hidden" name="kategori" value="excel">
                    <input type="submit" name="download" class="btn btn-danger" value="Download">
                </form>
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover table-responsive">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID Transaksi</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
                                    <th>Status Pembayaran</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Diskon</th>
                                    <th>Catatan</th>
                                    <th>Tanggal Transaksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($result->num_rows > 0) { ?>
                                    <?php while ($row = $result->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?= $row['id_transaksi']; ?></td>
                                            <td><?= $row['nama_pelanggan']; ?></td>
                                            <td><?= $row['nama_produk']; ?></td>
                                            <td><?= $row['jumlah']; ?></td>
                                            <td><?= $row['total_harga']; ?></td>
                                            <td><?= $row['status_pembayaran']; ?></td>
                                            <td><?= $row['metode_pembayaran']; ?></td>
                                            <td><?= $row['diskon']; ?></td>
                                            <td><?= $row['catatan']; ?></td>
                                            <td><?= $row['tanggal_transaksi']; ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="10">Tidak ada transaksi ditemukan.</td>
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
