<?php
include 'koneks.php';
$data = mysqli_query($conn, "SELECT * FROM master_pelanggan");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" href="image/logo.png" type="image/x-icon">
    <title>View Pelanggan</title>
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
                                    <th>ID Pelanggan</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>No. Telepon</th>
                                    <th>Email</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($data->num_rows > 0) { ?>
                                    <?php while ($ambil = mysqli_fetch_object($data)) { ?>
                                        <tr>
                                            <td><?= $ambil->id_pelanggan ?></td>
                                            <td><?= $ambil->nama_pelanggan ?></td>
                                            <td><?= $ambil->alamat ?></td>
                                            <td><?= $ambil->no_telp ?></td>
                                            <td><?= $ambil->email ?></td>
                                            <td><?= $ambil->tanggal_lahir ?></td>
                                            <td><?= $ambil->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan'; ?></td>
                                            <td>
                                                <a href="editpelanggan.php?id=<?= $ambil->id_pelanggan ?>" class="btn btn-info">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="deletepelanggan.php?id=<?= $ambil->id_pelanggan ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?')">
                                                    <i class="fa fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="8">Tidak ada pelanggan ditemukan.</td>
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
