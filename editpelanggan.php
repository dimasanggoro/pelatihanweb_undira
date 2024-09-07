<?php
include 'koneks.php';
$id_pelanggan = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM master_pelanggan WHERE id_pelanggan = $id_pelanggan");
$pelanggan = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" href="image/logo.png" type="image/x-icon">
    <title>Edit Pelanggan</title>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <h3 style="text-align: center;">Edit Pelanggan</h3>
                        <form action="updatepelanggan.php" method="POST">
                            <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan']; ?>">

                            <div class="mb-3">
                                <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                                <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" value="<?= $pelanggan['nama_pelanggan']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="L" <?= $pelanggan['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                                    <option value="P" <?= $pelanggan['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?= $pelanggan['tanggal_lahir']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="<?= $pelanggan['email']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="telepon" class="form-label">No. Telepon</label>
                                <input type="text" class="form-control" name="no_telp" id="telepon" value="<?= $pelanggan['no_telp']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" required><?= $pelanggan['alamat']; ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Data</button>
                            <a href="viewpelanggan.php" class="btn btn-secondary">Kembali</a>
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
