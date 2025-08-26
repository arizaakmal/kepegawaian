<!DOCTYPE html>
<html>

<head>
    <title>Edit Kontrak</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Edit Kontrak</h4>
                    </div>
                    <div class="card-body">
                        <form action="kontrak.php?action=update&id=<?= $data['id_kontrak'] ?>" method="POST">
                            <div class="mb-3">
                                <label for="nama_pegawai" class="form-label">Pegawai</label>
                                <input type="text" class="form-control" id="nama_pegawai"
                                    value="<?= htmlspecialchars($data['nama_pegawai']) ?>" disabled>

                                <input type="hidden" name="id_pegawai" value="<?= $data['id_pegawai'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="tgl_mulai" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai"
                                    value="<?= $data['tgl_mulai'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                                <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai"
                                    value="<?= $data['tgl_selesai'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="tipe_kontrak" class="form-label">Tipe Kontrak</label>
                                <select class="form-select" id="tipe_kontrak" name="tipe_kontrak" required>
                                    <option value="">Pilih Tipe Kontrak</option>
                                    <option value="Tetap" <?= $data['tipe_kontrak'] == 'Tetap' ? 'selected' : '' ?>>Tetap</option>
                                    <option value="Kontrak" <?= $data['tipe_kontrak'] == 'Kontrak' ? 'selected' : '' ?>>Kontrak</option>
                                    <option value="Magang" <?= $data['tipe_kontrak'] == 'Magang' ? 'selected' : '' ?>>Magang</option>
                                    <option value="Freelance" <?= $data['tipe_kontrak'] == 'Freelance' ? 'selected' : '' ?>>Freelance</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="">Pilih Status</option>
                                    <option value="Aktif" <?= $data['status'] == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
                                    <option value="Nonaktif" <?= $data['status'] == 'Nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="kontrak.php" class="btn btn-secondary">Kembali</a>
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