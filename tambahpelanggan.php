<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="image/logo.png" type="image/x-icon">
    <title>Halaman Tambah Pelanggan</title>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <h3 style="text-align:center;">Tambah Pelanggan</h3>
                        <form action="simpanpelanggan.php" method="POST">
                            <div class="mb-3">
                                <label for="nama">Nama Pelanggan:</label>
                                <input type="text" class="form-control" name="nama_pelanggan" id="nama" required>
                            </div>

                            <div class="mb-3">
                                <label for="alamat">Alamat:</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" required>
                            </div>

                            <div class="mb-3">
                                <label for="no_telp">No. Telepon:</label>
                                <input type="text" class="form-control" name="no_telp" id="no_telp">
                            </div>

                            <div class="mb-3">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_lahir">Tanggal Lahir:</label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                            </div>

                            <div class="mb-3">
                                <label for="jenis_kelamin">Jenis Kelamin:</label>
                                <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-info">Simpan</button>
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
