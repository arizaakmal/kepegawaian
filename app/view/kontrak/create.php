<!DOCTYPE html>
<html>

<head>
    <title>Tambah Kontrak</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Tambah Kontrak</h4>
                    </div>
                    <div class="card-body">
                        <form action="kontrak.php?action=store" method="POST">
                            <div class="mb-3">
                                <label for="id_pegawai" class="form-label">Pegawai</label>
                                <select class="form-select" id="id_pegawai" name="id_pegawai" required>
                                    <option value="">Pilih Pegawai</option>
                                    <?php if (empty($pegawai)): ?>
                                        <option value="" disabled>Tidak ada pegawai yang tersedia</option>
                                    <?php else: ?>
                                        <?php foreach ($pegawai as $p): ?>
                                            <option value="<?= $p['id_pegawai'] ?>"><?= htmlspecialchars($p['nama']) ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <?php if (empty($pegawai)): ?>
                                    <div class="form-text text-muted">
                                        <small>Semua pegawai sudah memiliki kontrak aktif</small>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="tgl_mulai" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" required>
                            </div>

                            <div class="mb-3">
                                <label for="tgl_selesai" class="form-label">Tanggal Selesai</label>
                                <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" required>
                            </div>

                            <div class="mb-3">
                                <label for="tipe_kontrak" class="form-label">Tipe Kontrak</label>
                                <select class="form-select" id="tipe_kontrak" name="tipe_kontrak" required>
                                    <option value="">Pilih Tipe Kontrak</option>
                                    <option value="Tetap">Tetap</option>
                                    <option value="Kontrak">Kontrak</option>
                                    <option value="Magang">Magang</option>
                                    <option value="Freelance">Freelance</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status" required>
                                    <option value="">Pilih Status</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Nonaktif">Nonaktif</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="kontrak.php" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary" <?= empty($pegawai) ? 'disabled' : '' ?>>
                                    Simpan
                                </button>
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