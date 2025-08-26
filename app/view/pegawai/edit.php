<!DOCTYPE html>
<html>

<head>
    <title>Edit Pegawai</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Edit Pegawai</h4>
                    </div>
                    <div class="card-body">
                        <form action="pegawai.php?action=update&id=<?= $data['id'] ?>" method="POST">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?= htmlspecialchars($data['alamat']) ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="id_jabatan" class="form-label">Jabatan</label>
                                <select class="form-select" id="id_jabatan" name="id_jabatan" required>
                                    <option value="">Pilih Jabatan</option>
                                    <?php foreach ($jabatan as $jab): ?>
                                        <option value="<?= $jab['id'] ?>" <?= $jab['id'] == $data['id_jabatan'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($jab['nama_jabatan']) ?> - Rp <?= number_format($jab['gaji'], 0, ',', '.') ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="pegawai.php" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>